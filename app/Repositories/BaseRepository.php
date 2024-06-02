<?php

namespace App\Repositories;

use App\Http\Requests\Request;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    public Builder $query;
    public Builder $model;
    public Request $request;

    public function create(Request $request): Model
    {
        return $this->model->create($request->validated());
    }

    public function update(Request $request, Model $model): Model
    {
        $this->model->update($request->validated());
        return $model->refresh();
    }

    public function setOrder(string $orderBy = null): self
    {
        $this->query = $this->query->orderBy(
            $orderBy ?? $this->request->input('order_by', 'id'),
            $this->request->input('order', 'ASC')
        );
        return $this;
    }

    public function setPaginate(): Paginator
    {
        return $this->query->simplePaginate(
            (int)$this->request->input('per_page', -1),
            ['*'],
            'page',
            (int)$this->request->input('current_page', 1)
        );
    }

    public function destroy(Model $model): void
    {
        $model->delete();
    }
}

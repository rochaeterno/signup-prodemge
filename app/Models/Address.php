<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'cep',
        'street',
        'number',
        'neighborhood',
        'uf',
        'city',
        'type',
        'complement',
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y h:i',
        'updated_at' => 'datetime:d/m/Y h:i',
        'deleted_at' => 'datetime:d/m/Y h:i',
    ];

    public function people(): BelongsToMany
    {
        return $this->belongsToMany(Person::class)->withPivot('_is_active');
    }
}

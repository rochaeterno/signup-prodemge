<?php

namespace App\Providers;

use app\Contracts\Services\AddressRepositoryInterface;
use app\Contracts\Services\AddressServiceInterface;
use app\Contracts\Services\PersonRepositoryInterface;
use app\Contracts\Services\PersonServiceInterface;
use App\Repositories\AddressRepository;
use App\Repositories\PersonRepository;
use App\Services\AddressService;
use App\Services\PersonService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Laravel\Telescope\TelescopeServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }

        $this->app->bind(PersonRepositoryInterface::class, PersonRepository::class);
        $this->app->bind(AddressRepositoryInterface::class, AddressRepository::class);
        $this->app->bind(PersonServiceInterface::class, PersonService::class);
        $this->app->bind(AddressServiceInterface::class, AddressService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale($this->app->getLocale());
        Validator::extend('phone', static function ($attr, $val, $param, $validator) {
            $validator->addReplacer(
                'phone',
                fn($message, $attr, $rule, $param) => 'O telefone inserido é invalido.'
            );
            return preg_match('/\+\d{12,13}$/', $val);
        });
    }
}

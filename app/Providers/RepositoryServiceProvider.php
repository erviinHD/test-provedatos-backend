<?php

namespace App\Providers;

use App\Interfaces\ProvincesRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\ProvincesRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(ProvincesRepositoryInterface::class,ProvincesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

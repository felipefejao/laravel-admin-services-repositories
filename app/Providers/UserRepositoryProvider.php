<?php

namespace App\Providers;

use App\Repositories\UserRepository\Contract\UserRepositoryContract;
use App\Repositories\UserRepository\UserRepository;
use Illuminate\Support\ServiceProvider;

class UserRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function provides(): array
    {
        return [UserRepositoryContract::class];
    }
}

<?php

namespace App\Providers;

use App\Models\User;
use App\Services\UserService\Contract\UserServiceContract;
use App\Services\UserService\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserServiceContract::class, UserService::class);
    }

    /**
     * Bootstrap services.
     */
    public function provides(): array
    {
        return [UserServiceContract::class];
    }
}

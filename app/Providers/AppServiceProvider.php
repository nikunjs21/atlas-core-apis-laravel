<?php

namespace App\Providers;

use App\Application\Services\Interfaces\AuthServiceInterface;
use App\Application\Services\Interfaces\UserServiceInterface;
use App\Application\Services\AuthService;
use App\Application\Services\Interfaces\TaskServiceInterface;
use App\Application\Services\Interfaces\WorkspaceServiceInterface;
use App\Application\Services\TaskService;
use App\Application\Services\UserService;
use App\Application\Services\WorkspaceService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(WorkspaceServiceInterface::class, WorkspaceService::class);
        $this->app->bind(TaskServiceInterface::class, TaskService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}

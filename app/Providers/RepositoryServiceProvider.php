<?php

namespace App\Providers;

use App\Models\MaritalStatus;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\GenderRepositoryInterface;
use App\Repositories\Contracts\LogRepositoryInterface;
use App\Repositories\Contracts\MaritalStatusRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\GenderRepository;
use App\Repositories\Eloquent\LogRepository;
use App\Repositories\Eloquent\MaritalStatusRepository;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(GenderRepositoryInterface::class, GenderRepository::class);
        $this->app->bind(MaritalStatusRepositoryInterface::class, MaritalStatusRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(LogRepositoryInterface::class, LogRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

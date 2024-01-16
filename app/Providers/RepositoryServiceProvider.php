<?php

namespace App\Providers;

use App\Repositories\Concretes\TodoRepository;
use App\Repositories\Interfaces\ITodoRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\ICategoryRepository;
use App\Repositories\Concretes\CategoryRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(ICategoryRepository::class, CategoryRepository::class);
        $this->app->bind(ITodoRepository::class, TodoRepository::class);

    }
        /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

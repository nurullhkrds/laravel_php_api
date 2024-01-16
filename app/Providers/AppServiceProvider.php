<?php

namespace App\Providers;

use App\Service\Concretes\TodosManager;
use App\Service\Interfaces\ITodosService;
use Illuminate\Support\ServiceProvider;
use App\Service\Interfaces\ICategoryService;
use App\Service\Concretes\CategoryManager;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ICategoryService::class, CategoryManager::class);
        $this->app->bind(ITodosService::class, TodosManager::class);
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}

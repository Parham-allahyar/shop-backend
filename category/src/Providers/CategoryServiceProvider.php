<?php

namespace Category\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . './../Routes/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../DataBase/Migrations');
    }


    public function register()
    {
    }
}

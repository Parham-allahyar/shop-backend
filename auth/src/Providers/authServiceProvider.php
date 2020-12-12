<?php

namespace AdminAuth\Providers;



use Illuminate\Support\ServiceProvider;

use Auth\Repositories\UserRepository;
class AuthServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . './../Routes/routes.php');
        //$this->loadMigrationsFrom(__DIR__ . './../DataBase/Migrations');
    }


    public function register()
    {
        $this->userProvider();
    }


    public function userProvider()
    {
        $this->app->bind('userProviderFacade', function () {
            return new UserRepository();
        });
    }




}

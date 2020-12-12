<?php

namespace AdminAuth\Providers;



use Illuminate\Support\ServiceProvider;
use AdminAuth\implement\storeCode;
use AdminAuth\implement\UserRepository;
class AdminAuthServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . './../Routes/routes.php');
        //$this->loadMigrationsFrom(__DIR__ . './../DataBase/Migrations');
    }


    public function register()
    {
        
    }


  




}

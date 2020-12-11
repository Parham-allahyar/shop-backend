<?php

namespace Notification;

use Illuminate\Support\ServiceProvider;
use Notification\Notification;
class notificationServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }


    public function register()
    {
        


        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('NotificationFacade', 'Notification\Facades\Notificationtest');
    }
}

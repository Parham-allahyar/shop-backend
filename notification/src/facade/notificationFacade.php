<?php

namespace Notification\Facade;

use Illuminate\Support\Facades\Facade;

class notificationFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Notification';
    }
}

<?php

namespace Uploadfile\Facades;

use Illuminate\Support\Facades\Facade;

class uploadFileFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'uploadFileFacade';  
    }
}

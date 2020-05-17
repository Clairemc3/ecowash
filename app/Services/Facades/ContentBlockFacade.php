<?php

namespace App\Services\Facades;

use Illuminate\Support\Facades\Facade;

class ContentBlockFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'contentBlock';
    }
}

<?php

namespace App\Services\Facades;

use Illuminate\Support\Facades\Facade;

class DisplayContentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'displayContent';
    }
}

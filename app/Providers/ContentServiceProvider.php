<?php

namespace App\Providers;

use App\Services\DisplayContent;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('displayContent', function () {
            return new DisplayContent;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

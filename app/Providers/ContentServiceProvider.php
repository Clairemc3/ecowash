<?php

namespace App\Providers;

use App\Services\ContentBlock;
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
        App::bind('contentBlock', function () {
            return new ContentBlock();
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

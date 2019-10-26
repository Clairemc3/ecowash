<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Register components
        Blade::include('components.hamburger', 'hamburger');
        Blade::include('components.caret', 'caret');
        Blade::include('backend.partials.authenticationLinks', 'authenticationLinks');
    }
}

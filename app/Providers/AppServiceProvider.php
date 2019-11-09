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
        Blade::include('icons.hamburger', 'hamburger');
        Blade::include('icons.trash', 'trashIcon');
        Blade::include('icons.edit', 'editIcon');
        Blade::include('icons.caret', 'caret');
        Blade::include('backend.partials.authenticationLinks', 'authenticationLinks');
    }
}

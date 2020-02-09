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
        // Register components and includes

        $this->registerInputComponents();
        $this->registerTableComponents();

        // Icons
        Blade::include('icons.hamburger', 'hamburger');
        Blade::include('icons.trash', 'trashIcon');
        Blade::include('icons.edit', 'editIcon');
        Blade::include('icons.caret', 'caret');


        // Resources
        Blade::include('backend.partials.resourceIndexHeader', 'resourceIndexHeader');
        Blade::include('tables.resourceTable', 'resourceTable');

        // Menus
        Blade::include('backend.partials.authenticationLinks', 'authenticationLinks');
    }


    /**
     * Registers all input components
     *
     * @return void
     */
    private function registerInputComponents()
    {
        Blade::component('components.inputs.text', 'inputText');
        Blade::component('components.inputs.number', 'inputNumber');
        Blade::component('components.inputs.wysiwyg', 'inputWysiwyg');
        Blade::component('components.inputs.date', 'inputDate');
    }


    /**
     * Registers table components
     *
     * @return void
     */
    private function registerTableComponents()
    {
        Blade::component('tables.table', 'tbl');
        Blade::component('tables.tableHead', 'tblHead');
        Blade::component('tables.actions', 'tblActions');
        Blade::component('tables.tableBody', 'tblBody');
        Blade::component('tables.row', 'tblRow');
        Blade::component('tables.cell', 'cell');
    }
}

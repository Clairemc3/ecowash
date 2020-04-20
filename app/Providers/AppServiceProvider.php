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
     * Registers all input components.
     *
     * @return void
     */
    private function registerInputComponents()
    {
        Blade::aliasComponent('components.inputs.text', 'inputText');
        Blade::aliasComponent('components.inputs.number', 'inputNumber');
        Blade::aliasComponent('components.inputs.wysiwyg', 'inputWysiwyg');
        Blade::aliasComponent('components.inputs.date', 'inputDate');
    }

    /**
     * Registers table components.
     *
     * @return void
     */
    private function registerTableComponents()
    {
        Blade::aliasComponent('tables.table', 'tbl');
        Blade::aliasComponent('tables.tableHead', 'tblHead');
        Blade::aliasComponent('tables.actions', 'tblActions');
        Blade::aliasComponent('tables.tableBody', 'tblBody');
        Blade::aliasComponent('tables.row', 'tblRow');
        Blade::aliasComponent('tables.cell', 'cell');
    }
}

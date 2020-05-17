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
        Blade::include('components.table.resourceTable', 'resourceTable');

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
        Blade::aliasComponent('components.table.table', 'tbl');
        Blade::aliasComponent('components.table.head', 'tblHead');
        Blade::aliasComponent('components.table.actions', 'tblActions');
        Blade::aliasComponent('components.table.body', 'tblBody');
        Blade::aliasComponent('components.table.row', 'tblRow');
        Blade::aliasComponent('components.table.cell', 'cell');
    }
}

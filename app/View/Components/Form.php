<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{

    public $action;
    public $method;
    public $cancelRoute;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $action, $method = 'POST')
    {
        $this->action = $action;
        $this->method = $method;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form');
    }
}

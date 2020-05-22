<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Promotion extends Component
{

	/**
	 * @var \App\Promotion
	 */
	public $promotion;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $slug)
    {
        $this->setPromotion($slug);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
    	if ($this->promotion->active)
	    {
		    return view('components.promotion');
	    }
    }

    private function setPromotion(string $slug)
    {
    	$this->promotion = \App\Promotion::where('slug', $slug)->first();
    }
}

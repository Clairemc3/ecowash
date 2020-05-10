<?php

namespace App\Http\Controllers;

use App\Alert;
use App\Machine;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewBag = [
            'machines' => Machine::all(),
            'alert' => Alert::active()->first(),
            'slides' => Slider::get(['image_source', 'text']),
        ];

        return view('frontend.home', $viewBag);
    }

    public function cssPractice()
    {
        return view('backend.cssPractice');
    }
}

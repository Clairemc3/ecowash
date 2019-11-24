<?php

namespace App\Http\Controllers;

use App\Machine;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {

        $viewBag = [
            'machines' => Machine::all()
        ];
        return view('frontend.home', $viewBag);

    }


    public function cssPractice() 
    {
        return view('backend.cssPractice');

    }
}

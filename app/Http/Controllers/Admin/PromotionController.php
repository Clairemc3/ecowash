<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Show all promotions
     *
     * @return void
     */
    public function index()
    {
        $promotions = Promotion::all();

        return view('backend.promotions.index', compact('promotions'));
    }

    /**
     * Create a promotion
     *
     * @return void
     */
    public function create()
    {
        //
    }
}

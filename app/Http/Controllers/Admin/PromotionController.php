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
        return view('backend.promotions.create');
    }


    /**
     * Store a machine.
     *
     * @return void
     */
    public function store(Request $request)
    {
        Promotion::create($request->all());

        return redirect()->route('admin.promotion.index');
    }


    /**
     * Edit a promotion
     *
     * @return void
     */
    public function edit(Promotion $promotion)
    {
        $viewBag = [
            'promotion' => $promotion,
        ];

        return view('backend.promotions.edit', $viewBag);
    }


    /**
     * Update a promotion.
     *
     * @return void
     */
    public function update(Request $request, Promotion $promotion)
    {
        $promotion->update($request->all());

        return redirect()->route('admin.promotion.index');
    }
}
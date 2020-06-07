<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePromotionRequest;
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
        $promotion = Promotion::create($request->all());
	    $promotion->active = $request->active;
	    $promotion->save();

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
    public function update(UpdatePromotionRequest $request, Promotion $promotion)
    {
    	$promotion->active = $request->active;
    	$promotion->save();
        $promotion->update($request->all());

        return redirect()->route('admin.promotion.index');
    }


	/**
	 * Update a promotion.
	 *
	 * @return void
	 */
	public function destroy( Promotion $promotion)
	{
		$promotion->delete();

		return redirect()->route('admin.promotion.index');
	}
}

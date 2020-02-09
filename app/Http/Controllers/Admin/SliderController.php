<?php

namespace App\Http\Controllers\Admin;
use  App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.P
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('backend.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Slider::create($request->all());

        return redirect()->route('admin.slider.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $viewBag = [
            'slider' => $slider
        ];

        return view('backend.sliders.edit', $viewBag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $slider->update($request->all());

        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

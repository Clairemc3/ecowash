<?php

namespace App\Http\Controllers\Admin;

use App\Alert;
use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlertRequest;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alerts = Alert::orderBy('start_date', 'asc')
            ->get()->sortBy('statusOrder');

        return view('backend.alerts.index', compact('alerts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.alerts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlertRequest $request)
    {
        Alert::create($request->all());

        return redirect()->route('admin.alert.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Alert $alert
     * @return \Illuminate\Http\Response
     */
    public function edit(Alert $alert)
    {
        $viewBag = [
            'alert' => $alert
        ];

        return view('backend.alerts.edit', $viewBag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Alert $alert
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAlertRequest $request, Alert $alert)
    {
        $alert->update($request->all());

        return redirect()->route('admin.alert.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Alert $alert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alert $alert)
    {
        $alert->delete();

        return redirect()->route('admin.alert.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMachineRequest;
use App\Http\Requests\UpdateMachineRequest;
use App\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Show all machines
     *
     * @return void
     */
    public function index()
    {
        $machines = Machine::all();

        return view('machines.index', compact('machines'));

    }

    /**
     * Store a machine
     *
     * @return void
     */
    public function store(StoreMachineRequest $request)
    {   
        Machine::create($request->all());

        return redirect('/machines');

    }

    /**
     * Update a machine
     *
     * @return void
     */
    public function update(UpdateMachineRequest $request, Machine $machine)
    {
        $machine->update($request->all());

        return redirect('/machines');
    }



}

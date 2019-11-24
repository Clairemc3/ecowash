<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreMachineRequest;
use App\Http\Requests\UpdateMachineRequest;
use App\Machine;
use  App\Http\Controllers\Controller;

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

        return view('backend.machines.index', compact('machines'));
    }

    /**
     * Create a machines
     *
     * @return void
     */
    public function create()
    {
        return view('backend.machines.create');
    }

    /**
     * Store a machine
     *
     * @return void
     */
    public function store(StoreMachineRequest $request)
    {   
        Machine::create($request->all());

        return redirect()->route('admin.machine.index');

    }

    /**
     * Update a machine
     *
     * @return void
     */
    public function edit(Machine $machine)
    {
        $viewBag = [
            'machine' => $machine
        ];

        return view('backend.machines.edit', $viewBag);
    }


    /**
     * Update a machine
     *
     * @return void
     */
    public function update(UpdateMachineRequest $request, Machine $machine)
    {
        $machine->update($request->all());

        return redirect()->route('admin.machine.index');
    }


    /**
     * Destroy a machine
     *
     * @return void
     */
    public function destroy(Machine $machine)
    {
        $machine->delete();

        return redirect()->route('admin.machine.index');
    }



}

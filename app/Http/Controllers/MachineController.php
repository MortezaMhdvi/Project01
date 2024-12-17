<?php

namespace App\Http\Controllers;

use App\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{

    public function index()
    {
        $machines = Machine::all();
        return view('machines.index', compact('machines'));
    }

    public function create()
    {
        return view('machines.create');
    }

    public function store(Request $request)
    {
        $machine = new Machine();
        $machine->title = $request->input('title');
        $machine->start_time = $request->input('start_time');
        $machine->end_time = $request->input('end_time');
        $machine->is_production = $request->input('is_production');
        $machine->save();

        return redirect()->route('machine.index');
    }

    public function show(Machine $machine)
    {
    }

    public function edit(Machine $machine)
    {
        return view('machines.edit', compact('machine'));
    }

    public function update(Request $request, Machine $machine)
    {
        $machine->title = $request->input('title');
        $machine->start_time = $request->input('start_time');
        $machine->end_time = $request->input('end_time');
        $machine->is_production = $request->input('is_production');
        $machine->save();

        return redirect()->route('machine.index');
    }

    public function destroy(Machine $machine)
    {
        $machine->delete();
        return redirect()->route('machine.index');
    }
}

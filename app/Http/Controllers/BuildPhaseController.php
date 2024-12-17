<?php

namespace App\Http\Controllers;

use App\BuildPhase;
use Illuminate\Http\Request;

class BuildPhaseController extends Controller
{
    public function index()
    {
        $buildPhase = BuildPhase::all();
        return view('buildPhases.index', compact('buildPhase'));
    }

    public function create()
    {
        return view('buildPhases.create');
    }

    public function store(Request $request)
    {
        $buildPhase = new BuildPhase();
        $buildPhase->title = $request->input('title');
        $buildPhase->order = $request->input('order');
        $buildPhase->save();
        return redirect()->route('buildPhase.index');
    }

    public function show(BuildPhase $buildPhase)
    {
    }

    public function edit(BuildPhase $buildPhase)
    {
        return view('buildPhases.edit', compact('buildPhase'));
    }

    public function update(Request $request, BuildPhase $buildPhase)
    {
        $buildPhase->title = $request->input('title');
        $buildPhase->order = $request->input('order');
        $buildPhase->save();
        return redirect()->route('buildPhase.index');
    }

    public function destroy(BuildPhase $buildPhase)
    {
        if($buildPhase->phaseProfile()->exists()){
            return redirect()->route('buildPhase.index')->with('error','این مرحله تولید را نمیتوانید حذف کنید');
        }
        $buildPhase->delete();
        return redirect()->route('buildPhase.index');
    }
}

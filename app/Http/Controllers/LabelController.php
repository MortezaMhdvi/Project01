<?php

namespace App\Http\Controllers;

use App\Barcode;
use App\BuildPhase;
use App\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function index()
    {
        $label = Label::all();
        return view('labels.index', compact('label'));
    }

    public function create()
    {
        $barcode = Barcode::all();
        $build_phase = BuildPhase::all();
        return view('labels.create',compact('barcode','build_phase'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $label = new Label();
        $label->barcode_id = $request->input('barcode_id');
        $label->build_phase_id = $request->input('build_phase_id');
        $label->title = $request->input('title');
        $label->save();
        return redirect()->route('label.index');
    }

    public function edit(Label $label)
    {
        $barcode = Barcode::all();
        $build_phase = BuildPhase::all();
        return view('labels.edit', compact('label','barcode','build_phase'));
    }

    public function update(Request $request, Label $label)
    {
//        dd($request->all());
        $label->barcode_id = $request->input('barcode_id');
        $label->build_phase_id = $request->input('build_phase_id');
        $label->title = $request->input('title');
        $label->save();
        return redirect()->route('label.index');
    }

    public function destroy(Label $label)
    {
        $label->delete();
        return redirect()->route('label.index');
    }
}

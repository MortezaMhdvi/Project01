<?php

namespace App\Http\Controllers;

use App\Parameter;
use Illuminate\Http\Request;

class ParameterController extends Controller
{

    public function index()
    {
        $parameters = Parameter::all();
        return view('parameters.index', compact('parameters'));
    }

    public function create()
    {
        return view('parameters.create');
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $parameter = new Parameter();
        $parameter->title = $request->input('title');
        $parameter->save();

        return redirect()->route('parameter.index');
    }

    public function show(Parameter $parameter)
    {
    }

    public function edit(Parameter $parameter)
    {
        return view('parameters.edit', compact('parameter'));
    }

    public function update(Request $request, Parameter $parameter)
    {
        $parameter->title = $request->input('title');
        $parameter->save();
        return redirect()->route('parameter.index');
    }

    public function destroy(Parameter $parameter)
    {
        $parameter->delete();
        return redirect()->route('parameter.index');
    }
}

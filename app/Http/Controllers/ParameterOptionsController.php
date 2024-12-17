<?php

namespace App\Http\Controllers;

use App\ParameterOptions;
use Illuminate\Http\Request;

class ParameterOptionsController extends Controller
{

    public function index(Request $request)
    {
        $parameter_id = $request->route()->parameters('parameter_id')['parameter_id'];
        $parameterOptions = ParameterOptions::where('parameter_id', $parameter_id)->get();

//        dd($parameterOptions);
        return view('parameterOptions.index', compact('parameterOptions', 'parameter_id'));
    }

    public function create()
    {
        $parameter_id = request()->route()->parameters('parameter_id')['parameter_id'];
        return view('parameterOptions.create', compact('parameter_id'));
    }

    public function store(Request $request)
    {
        $parameterOptions = new ParameterOptions();
        $parameterOptions->parameter_id = $request->route()->parameters('parameter_id')['parameter_id'];
        $parameterOptions->title = $request->input('title');
        $parameterOptions->save();

        return redirect()->route('parameterOptions.index', ['parameter_id' => $request->route()->parameters('parameter_id')['parameter_id']]);
    }

    public function show(ParameterOptions $parameterOptions)
    {
    }

    public function edit($parameter_id, ParameterOptions $parameterOption)
    {
        return view('parameterOptions.edit', compact('parameter_id', 'parameterOption'));
    }

    public function update(Request $request,$parameter_id, ParameterOptions $parameterOption)
    {
        $parameterOption->title = $request->input('title');
        $parameterOption->save();

        return redirect()->route('parameterOptions.index', ['parameter_id' => $request->route()->parameters('parameter_id')['parameter_id']]);
    }

    public function destroy($parameter_id,ParameterOptions $parameterOption)
    {
        $parameterOption->delete();
        return redirect()->route('parameterOptions.index', compact('parameter_id'));
    }
}

<?php

namespace App\Http\Controllers;

use App\BuildPhase;
use App\PhaseProfile;
use Illuminate\Http\Request;

class PhaseProfileController extends Controller
{

    public function index()
    {
        $phaseProfile = PhaseProfile::all();
        return view('phaseProfiles.index', compact('phaseProfile'));
    }

    public function create()
    {
        $buildPhase= BuildPhase::all();
        return view('phaseProfiles.create',compact('buildPhase'));
    }

    public function store(Request $request)
    {
        $phaseProfile = new PhaseProfile();
        $phaseProfile->title = $request->input('title');
        $phaseProfile->save();
        $phaseProfile->buildPhase()->attach($request->input('buildPhase_id'));

        return redirect()->route('phaseProfile.index');
    }

    public function show(PhaseProfile $phaseProfile)
    {
    }

    public function edit(PhaseProfile $phaseProfile)
    {
        $buildPhase= BuildPhase::all();
        return view('phaseProfiles.edit',compact('phaseProfile','buildPhase'));
    }

    public function update(Request $request, PhaseProfile $phaseProfile)
    {
        $phaseProfile->title = $request->input('title');
        $phaseProfile->save();
        $phaseProfile->buildPhase()->sync($request->input('buildPhase_id'));

        return redirect()->route('phaseProfile.index');
    }

    public function destroy(PhaseProfile $phaseProfile)
    {
        $phaseProfile->delete();
        $phaseProfile->buildPhase()->detach();
        return redirect()->route('phaseProfile.index');
    }
}

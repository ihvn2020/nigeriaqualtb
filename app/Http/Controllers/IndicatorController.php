<?php

namespace App\Http\Controllers;

use App\Models\indicators;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    // Display all indicators
    public function index()
    {
        $indicators = indicators::all();
        return view('indicators', compact('indicators'));
    }

    // Show the form for creating or editing an indicator
    public function create()
    {
        return view('indicators_form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'indicator' => 'required|max:500',
            'ncode' => 'required|max:30',
            'ntext' => 'required|max:500',
            'dcode' => 'required|max:30',
            'dtext' => 'required|max:500',
        ]);

        indicators::create($validated);

        return redirect()->route('indicators.index')->with('success', 'Indicator added successfully.');
    }

    public function edit(indicators $indicator)
    {
        return view('indicators_form', compact('indicator'));
    }

    public function update(Request $request, indicators $indicator)
    {
        $validated = $request->validate([
            'indicator' => 'required|max:500',
            'ncode' => 'required|max:30',
            'ntext' => 'required|max:500',
            'dcode' => 'required|max:30',
            'dtext' => 'required|max:500',
        ]);

        $indicator->update($validated);

        return redirect()->route('indicators.index')->with('success', 'Indicator updated successfully.');
    }

    public function destroy(indicators $indicator)
    {
        $indicator->delete();
        return redirect()->route('indicators')->with('success', 'Indicator deleted successfully.');
    }
}

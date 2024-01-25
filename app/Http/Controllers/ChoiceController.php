<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use Illuminate\Http\Request;

class ChoiceController extends Controller
{
    public function index()
    {
        $history = Choice::latest()->paginate(5);

        return view('pages.terserah.index')->with([
            'history' => $history
        ]);
    }


    public function selectRandom(Request $request)
    {
        $choices = explode(',', $request->input('choices'));

        if (count($choices) < 2) {
            return redirect('/random-choice')->with('error', 'Please enter at least 2 choices.');
        }

        $randomChoice = $choices[array_rand($choices)];

        // Save choice to database
        Choice::create(['choice' => $randomChoice]);

        return redirect('/random-choice')->with([
            'randomChoice' => $randomChoice,
            'history' => Choice::latest()->paginate(5),
        ]);
    }

    public function returnToPrevious()
    {
        $previousChoice = Choice::latest()->first();

        return view('pages.terserah.index', [
            'randomChoice' => $previousChoice ? $previousChoice->choice : null,
            'history' => Choice::all(),
        ]);
    }
}

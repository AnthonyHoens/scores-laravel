<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Participation;
use App\Models\Team;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index() {
        $matches = Match::with('teams')->get();

        return view('dashboard.index', compact( 'matches'));
    }

    public function store() {
        Validator::make($input, [
            'match-date' => ['required'],
            'home-team' => ['required'],
            'home-team-goals' => ['required'],
            'away-team' => ['required'],
            'away-team-goals' => ['required'],

        ])->validate();

        Match::create([
            'match-date' => $input['match-date'],
        ]);

        Participation::create([
            'team_id' => $input['home-team'],
            'goals' => $input['home-team-goals'],
            'is_home' => 1,
        ]);

        Participation::create([
            'team_id' => $input['away-team'],
            'goals' => $input['away-team-goals'],
            'is_home' => 0,
        ]);

        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Participation;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request) {
        $request->validate([
            'match-date' => ['required'],
            'home-team' => ['required'],
            'home-team-goals' => ['required', 'string'],
            'away-team' => ['required'],
            'away-team-goals' => ['required', 'string'],
        ]);

        $match = Match::create([
            'date' => $request['match-date'],
            'slug' => 'HCEITC',
        ]);

        $homeTeam = Participation::create([
            'match_id' => $match->id,
            'team_id' => $request['home-team'],
            'goals' => $request['home-team-goals'],
            'is_home' => 1,
        ]);

        $awayTeam = Participation::create([
            'match_id' => $match->id,
            'team_id' => $request['away-team'],
            'goals' => $request['away-team-goals'],
            'is_home' => 0,
        ]);

        return redirect(route('home_page'));
    }

    public function create() {
        $teams = Team::orderBy('name')->get();

        return view('match.create', compact('teams'));
    }
}

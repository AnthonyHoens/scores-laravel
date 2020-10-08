<?php

namespace App\Http\Controllers;

use App\Events\MatchCreated;
use App\Http\Requests\StoreMatchRequest;
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

    public function store(StoreMatchRequest $request) {
        $validatedData = $request->validated();

        $match = new Match();
        $match->date = $validatedData['match-date'];
        $match->save();

        $homeTeam = new Participation();
        $homeTeam->match_id = $match->id;
        $homeTeam->team_id = $validatedData['home-team'];
        $homeTeam->goals = $validatedData['home-team-goals'];
        $homeTeam->is_home = 1;
        $homeTeam->save();

        $awayTeam = new Participation();
        $awayTeam->match_id = $match->id;
        $awayTeam->team_id = $validatedData['away-team'];
        $awayTeam->goals = $validatedData['away-team-goals'];
        $awayTeam->is_home = 0;
        $awayTeam->save();

        $homeTeamSlug = Team::find($validatedData['home-team'])->slug;
        $awayTeamSlug = Team::find($validatedData['away-team'])->slug;

        $match->slug = $homeTeamSlug . $awayTeamSlug;
        $match->save();

        event(MatchCreated::class);

        return redirect(route('home_page'));
    }

    public function create() {
        $teams = Team::orderBy('name')->get();

        return view('match.create', compact('teams'));
    }
}

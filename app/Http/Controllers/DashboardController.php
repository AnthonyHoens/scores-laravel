<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Participation;
use App\Models\Team;
use App\Models\TeamStat;
use Illuminate\Support\Facades\Validator;
use function Sodium\compare;

class DashboardController extends Controller
{
    public function index() {
        $teamStatsRequest = request('s');
        $matchTableRequest = request('m');

        if ($teamStatsRequest) {
            $teamStats = TeamStat::with('teams')
                ->orderBy($teamStatsRequest, 'DESC')
                ->orderBy('goals_difference', 'DESC')
                ->get();

            $matches = Match::with('teams')
                ->orderBy('date', 'ASC')
                ->get();
        } elseif ($matchTableRequest) {
            $matches = Match::with('teams')
                ->orderBy($matchTableRequest, 'DESC')
                ->orderBy('date', 'DESC')
                ->get();

            $teamStats = TeamStat::with('teams')
                ->orderBy('points', 'DESC')
                ->orderBy('goals_difference', 'ASC')
                ->get();
        } else {
            $teamStats = TeamStat::with('teams')
                ->orderBy('points', 'DESC')
                ->orderBy('goals_difference', 'ASC')
                ->get();

            $matches = Match::with('teams')
                ->orderBy('date', 'ASC')
                ->get();
        }

        return view('dashboard.index', compact( 'matches', 'teamStats'));
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

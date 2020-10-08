<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatchRequest;
use App\Models\Match;
use App\Models\Participation;
use App\Models\Team;
use App\Models\TeamStat;
use Illuminate\Support\Facades\Validator;
use function Sodium\compare;

class DashboardController extends Controller
{
    public function index() {
        $teamStatsTableRequest = request('s');
        $matchTableRequest = request('m');

        $teamStatsOrder = $teamStatsTableRequest ? $teamStatsTableRequest: 'points';
        $matchOrder = $matchTableRequest ? $matchTableRequest : 'date';

        $teamStats = TeamStat::with('teams')
            ->orderByDesc('goals_difference')
            ->get();

        $matches = Match::with('teams')
            ->get();

        $matches = $matches->sortByDesc($matchOrder);
        $teamStats = $teamStats->sortByDesc($teamStatsOrder);

        return view('dashboard.index', compact( 'matches', 'teamStats', 'teamStatsOrder', 'matchOrder'));
    }
}

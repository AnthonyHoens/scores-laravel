<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $teams = Team::all();
        $match = Match::find(1);

        return view('dashboard.index', compact('teams'));
    }
}

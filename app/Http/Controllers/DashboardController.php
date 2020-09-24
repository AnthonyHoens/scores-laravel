<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $user = User::first();
        $teams = Team::all();

        return view('dashboard.index', compact('user', 'teams'));
    }
}

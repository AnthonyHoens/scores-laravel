<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Models\Team;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(StoreTeamRequest $request) {
        $validatedData = $request->validated();

        $team = new Team();

        $team->name = request('name');
        $team->slug = request('slug');

        $team->save();

        return redirect(route('store_team'));
    }

    public function create() {
        $teams = Team::orderBy('name')->get();

        return view('team.create', compact('teams'));
    }
}

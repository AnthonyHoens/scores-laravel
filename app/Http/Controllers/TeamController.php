<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    protected function validateTeam(): void
    {
        request()->validate([
            'name' => ['required', 'alpha', 'string', 'unique:name', 'max:255'],
            'slug' => ['required', 'alpha', 'string', 'unique:slug', 'max:3'],
            'file_name' => ['required', 'file', 'image', 'string']
        ]);
    }

    public function store() {
        $this->validateTeam();

        $team = new Team();

        $team->name = request('name');
        $team->slug = strtoupper(request('slug'));
        $team->file_name = request('logo');

        $team->save();

        return redirect('/');
    }

    public function create() {
        return view('team.create');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Team;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    protected function validateMatch(): void
    {
        request()->validate([
            'match-date' => ['required', 'alpha', 'string', 'unique:name', 'max:255'],
            'dashboard-team-unlisted' => ['required', 'alpha', 'string', 'unique:slug', 'max:3'],
            'dashboard-team-goals' => ['required', 'file', 'image', 'string'],
            'away-team-unlisted' => ['required', 'alpha', 'string', 'unique:slug', 'max:3'],
            'away-team-goals' => ['required', 'file', 'image', 'string'],
        ]);
    }

    public function store() {
        $this->validateMatch();



        return redirect('/');
    }
}

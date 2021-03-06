<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Models\Match;
use App\Models\Team;
use App\upload\UploadImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    use UploadImage;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $teams = Team::orderBy('name', 'ASC')
            ->get();

        return view('team.index', compact('teams'));
    }

    public function show(Team $team) {
        $teamMatches = Team::with('matches.teams')
            ->where('id', '=', $team->id)
            ->first();

        return view('team.show', compact('team', 'teamMatches'));
    }

    public function store(StoreTeamRequest $request) {
        $validatedData = $request->validated();

        $team = new Team();
        $team->name = $validatedData['name'];
        $team->slug = Str::upper($validatedData['slug']);
        $team->file_name = strtolower(str_replace(' ', '_', $validatedData['name'])). '.'. $request->file('img')->extension();
        $team->save();

        $this->HandleImage($request, $team->file_name);

        return redirect(route('create_team'));
    }

    public function create() {
        $teams = Team::orderBy('name')->get();

        return view('team.create', compact('teams'));
    }

    public function edit(Team $team) {
        return view('team.edit', compact('team'));
    }

    public function update(Team $team, StoreTeamRequest $request) {
        Rule::unique('teams')->ignore($team->name);
        Rule::unique('teams')->ignore($team->slug);
        $validatedData = $request->validated();

        $team->name = $validatedData['name'];
        $team->slug = Str::upper($validatedData['slug']);
        if ($request->hasFile('img')) {
            $team->file_name = strtolower(str_replace(' ', '_', $validatedData['name'])). '.'. $request->file('img')->extension();
            $this->HandleImage($request, $team->file_name);
        }
        $team->save();

        return redirect('team/'. $team->slug);
    }
}

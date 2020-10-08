<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Models\Team;
use App\upload\UploadImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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
        return view('team.show', compact('team'));
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

    public function update(Team $team) {

        return redirect('team/'. $team->slug);
    }
}

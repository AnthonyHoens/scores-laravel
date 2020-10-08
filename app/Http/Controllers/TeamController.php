<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function HandleImage($request, $newName) {
        if ($request->hasFile('img')) {
            $file = $request->file('img');

            Storage::makeDirectory('/images/small/');

            $path = '/images/small/' . $newName;
            $resize = Image::make($file)->resize(40, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode();
            $resize->save(public_path($path));


            Storage::makeDirectory('/images/big/');

            $path = '/images/big/' . $newName;
            $resize = Image::make($file)->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode();
            $resize->save(public_path($path));
        }
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
}

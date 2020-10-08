<?php

namespace Database\Seeders;

use App\Models\Match;
use App\Models\Participation;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ParticipationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = Team::all();

        foreach ($teams as $team) {
            $homeTeam = $team;
            $awayTeam = $teams[rand(0, count($teams))];
            $match = Match::create([
                'date' => Carbon::now('Europe/Paris'),
                'slug' => $homeTeam->slug . $awayTeam->slug,
            ]);

            Participation::create([
                'match_id' => $match->id,
                'team_id' => $homeTeam->id,
                'goals' => rand(0, 5),
                'is_home' => 1,
            ]);

            Participation::create([
                'match_id' => $match->id,
                'team_id' => $awayTeam->id,
                'goals' => rand(0, 5),
                'is_home' => 0,
            ]);
        }
    }
}

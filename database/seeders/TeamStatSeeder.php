<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\TeamStat;
use Illuminate\Database\Seeder;

class TeamStatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = Team::with('matches')->get();

        foreach ($teams as $team) {
            $wins = rand(0, $team->matches->count());
            $looses = rand(0, $wins);
            $draws = rand(0, $looses);
            $points = ($wins * 3) - $looses + $draws;
            $goals_against = rand(0,8);
            $team_goals = 0;
            foreach ($team->matches as $match) {
                $team_goals += $match->pivot->goals;
                $goals_difference = abs($team_goals - $goals_against);
            }
            TeamStat::create([
                'team_id' => $team->id,
                'games' => $team->matches->count(),
                'points' => $points,
                'wins' => $wins,
                'looses' => $looses,
                'draws' => $draws,
                'goals_for' => $team_goals,
                'goals_against' => $goals_against,
                'goals_difference' => $goals_difference,
            ]);
        }
    }
}

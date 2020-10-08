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
        $teams = Team::with('matches.teams')->get();

        foreach ($teams as $team) {
            $team_goals = 0;
            $against_goals = 0;
            $goals_difference = 0;
            $wins = 0;
            $looses = 0;
            $draws = 0;
            foreach ($team->matches as $match) {
                if ($team->id == $match->teams[0]->id) {
                    $actual_team = $match->teams[0];
                    $opponent_team = $match->teams[1];

                    $actual_goals = $actual_team->pivot->goals;
                    $opponent_goals = $opponent_team->pivot->goals;

                    if ($actual_goals == $opponent_goals) {
                        $draws = $draws + 1;
                    } elseif ($actual_goals > $opponent_goals) {
                        $wins = $wins + 1;
                    } elseif ($actual_goals < $opponent_goals) {
                        $looses = $looses + 1;
                    }

                    $team_goals += $actual_goals;
                    $against_goals += $opponent_goals;
                } else {
                    $actual_team = $match->teams[1];
                    $opponent_team = $match->teams[0];

                    $actual_goals = $actual_team->pivot->goals;
                    $opponent_goals = $opponent_team->pivot->goals;

                    if ($actual_goals == $opponent_goals) {
                        $draws = $draws + 1;
                    } elseif ($actual_goals > $opponent_goals) {
                        $wins = $wins + 1;
                    } elseif ($actual_goals < $opponent_goals) {
                        $looses = $looses + 1;
                    }

                    $team_goals += $actual_goals;
                    $against_goals += $opponent_goals;
                }
            }
            $goals_difference = $team_goals - $against_goals;
            $points = ($wins * 3) + $draws;
            TeamStat::create([
                'team_id' => $team->id,
                'games' => $team->matches->count(),
                'points' => $points,
                'wins' => $wins,
                'looses' => $looses,
                'draws' => $draws,
                'goals_for' => $team_goals,
                'goals_against' => $against_goals,
                'goals_difference' => $goals_difference,
            ]);
        }
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = ['date'];

    public function teams() {
        return $this->belongsToMany(Team::class, 'participations')->withPivot('goals', 'is_home');
    }

    public function getDateFormatAttribute() {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $this->date)->locale('fr_FR');
        return $date->isoFormat('LLLL');
    }

    public function getHomeTeamNameAttribute() {
        return $this->teams->filter(function($team) {
            return $team->pivot->is_home === 1;
        })->first()->name;
    }

    public function getAwayTeamNameAttribute() {
        return $this->teams->filter(function($team) {
            return $team->pivot->is_home === 0;
        })->first()->name;
    }

    public function getHomeTeamGoalsAttribute() {
        return $this->teams->filter(function($team) {
            return $team->pivot->is_home === 1;
        })->first()->pivot->goals;
    }

    public function getAwayTeamGoalsAttribute() {
        return $this->teams->filter(function($team) {
            return $team->pivot->is_home === 0;
        })->first()->pivot->goals;
    }
}

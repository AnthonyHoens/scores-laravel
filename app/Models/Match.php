<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function teams() {
        return $this->belongsToMany(Team::class, 'participations')->withPivot('goals', 'is_home');
    }

    public function getHomeTeamNameAttribute() {
        return $this->teams->filter(function($team) {
            return $team->pivot->is_home === 1;
        })->first()->name;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamStat extends Model
{
    use HasFactory;

    protected $table = 'team_stats';

    public function teams() {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }

    public function getNameAttribute() {
        return $this->teams->name;
    }
}

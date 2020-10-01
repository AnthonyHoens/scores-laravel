<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamStat extends Model
{
    use HasFactory;

    protected $table = 'teams_stats';

    public function teams() {
        return $this->belongsTo(Team::class);
    }
}

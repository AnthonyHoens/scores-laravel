<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'teams';

    protected $fillable = ['name', 'slug'];

    public function teamstat() {
        return $this->belongsTo(TeamStat::class);
    }

    public function matches() {
        return $this->belongsToMany('App\Models\Match', 'participations')->withPivot('goals', 'is_home');
    }
}

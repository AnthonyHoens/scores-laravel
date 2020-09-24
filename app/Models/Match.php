<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function teams() {
        return $this->belongsToMany('App\Models\Team', 'participations')->withPivot('goals');
    }
}

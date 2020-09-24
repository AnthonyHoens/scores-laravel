<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;

    public function participations() {
        return $this->belongsToMany('App\Models\Team', 'participations')->withPivot();
    }
}

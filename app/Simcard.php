<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Simcard extends Model
{
    public function devices()
    {
        return $this->belongsToMany('App\Device')->withTimestamps();
    }
}

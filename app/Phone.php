<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    public function devices()
    {
        return $this->belongsToMany('App\Device')->withTimestamps();
    }
}

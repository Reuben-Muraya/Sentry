<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function clients()
    {
        return $this->belongsToMany('App\Client')->withTimestamps();
    }

    public function devices()
    {
        return $this->belongsToMany('App\Device')->withTimestamps();
    }
}
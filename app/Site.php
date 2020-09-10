<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public function clients()
    {
        return $this->belongsToMany('App\Client')->withTimestamps();
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withTimestamps();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function clients()
    {
        return $this->belongsToMany('App\Client')->withTimestamps();
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withTimestamps();
    }

    public function phones()
    {
        return $this->belongsToMany('App\Phone')->withTimestamps();
    }

    public function simcards()
    {
        return $this->belongsToMany('App\Simcard')->withTimestamps();
    }
}

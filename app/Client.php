<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product')->withTimestamps();
    }

    public function devices()
    {
        return $this->belongsToMany('App\Device')->withTimestamps();
    }

    public function contacts()
    {
        return $this->belongsToMany('App\Contact')->withTimestamps();
    }

    public function sites()
    {
        return $this->belongsToMany('App\Site')->withTimestamps();
    }
}

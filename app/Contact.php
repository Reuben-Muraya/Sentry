<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function clients()
    {
        return $this->belongsToMany('App\Client')->withTimestamps();
    }

    public function sites()
    {
        return $this->belongsToMany('App\Site')->withTimestamps();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    public function prices()
    {
        return $this->hasMany('App\Price');
    }

}

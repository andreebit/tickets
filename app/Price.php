<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function carts()
    {
        return $this->hasMany('App\Cart');
    }
    
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }    

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function price()
    {
        return $this->belongsTo('App\Price');
    }

}

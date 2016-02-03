<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

}

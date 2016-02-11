<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function price() {
        return $this->belongsTo('App\Price');
    }
}

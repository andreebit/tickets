<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function tickets() {
        return $this->hasMany('App\Ticket');
    }
    
    public function scopeWithData($query) {
        return $query->whereNotNull('data')->where('data', '<>', '');
    }
    
    public function scopeWithTickets($query) {
        $query->has('tickets');
    }
}

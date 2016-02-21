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
    
    public function getNumberAttribute() {
        return "PED" . str_pad($this->id, 10, '0', STR_PAD_LEFT);
    }
}

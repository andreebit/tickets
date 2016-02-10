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

    
    public static function getComingSoonEvents() {
        return self::where('date_hour', '<=', date('Y-m-d H:i:s'))->orderBy('date_hour')->limit(10)->get();
    }
    
    public function imageFullPath() {
        return url('/uploads/events/images/' . $this->image);
    }
    
    public function bannerFullPath() {
        return url('/uploads/events/banners/' . $this->banner);
    }    
    
    public function formattedTime() {
        $carbon = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->date_hour);
        return $carbon->toFormattedDateString() . ' ' . $carbon->toTimeString();
    }
    
}

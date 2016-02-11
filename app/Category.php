<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', '=', $slug);
    }

    public function scopeWithEvents($query)
    {
        return $query->has('events');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    
    public function imageFullPath() {
        return url('/uploads/sliders/' . $this->image);
    }
    
}

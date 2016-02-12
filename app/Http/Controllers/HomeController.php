<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slider;
use App\Category;
use App\Event;

class HomeController extends Controller
{

    public function index()
    {

        $data = [
            'slides' => Slider::all(),
            'categories' => Category::withEvents()->get(),
            'events' => Event::getComingSoonEvents()
        ];
        $data['quantity_slides'] = count($data['slides']);

        return view('site.home.index', $data);
    }   

}

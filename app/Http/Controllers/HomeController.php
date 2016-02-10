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
        $slides = Slider::all();
        $quantitySlides = count($slides);
        $categories = Category::all();
        $events = Event::getComingSoonEvents();
        
        return view('site.home.index', [
            'slides' => $slides,
            'categories' => $categories,
            'quantity_slides' => $quantitySlides,
            'events' => $events
            ]
        );
    }

}

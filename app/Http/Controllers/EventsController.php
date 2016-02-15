<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Category;

class EventsController extends Controller
{

    public function show($slug)
    {
        $event = \App\Event::slug($slug)->first();
        if (!is_null($event)) {
            $data = [
                'categories' => Category::withEvents()->get(),
                'event' => $event,
                'prices' => $event->prices
            ];

            return view('site.events.show', $data);
        } else {
            return abort(404);
        }
    }

    public function listByCategory($slug)
    {
        $category = Category::slug($slug)->withEvents()->first();
        if (!is_null($category)) {
            $data = [
                'category' => $category,
                'categories' => Category::withEvents()->get(),
                'events' => $category->events
            ];

            return view('site.events.list-by-category', $data);
        } else {
            return abort(404);
        }
    }

}

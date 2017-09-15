<?php

use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = \App\Event::orderBy('id', '=', \DB::raw('rand()'))->limit(5)->get();

        foreach ($events as $event) {
            $url = 'http://tickets.dev/e/' . $event->slug;
            $title = $event->name;
            factory(App\Slider::class)->create(['title' => $title, 'url' => $url]);
        }
    }
}

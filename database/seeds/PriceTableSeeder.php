<?php

use Illuminate\Database\Seeder;

class PriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = \App\Event::all();

        foreach ($events as $event) {
            factory(App\Price::class, rand(2, 4))->create(['event_id' => $event->id]);
        }
    }
}

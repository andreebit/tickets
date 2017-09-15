<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    $carbon = \Carbon\Carbon::now();
    $city = $faker->city;
    $name = $faker->name . ' en ' . $city;
    return [
        'category_id' => rand(1, 5),
        'name' => $name,
        'slug' => \Illuminate\Support\Str::slug($name),
        'description' => $faker->words(150, true),
        'image' => 'http://lorempixel.com/600/420/?v' . uniqid(),
        'banner' => 'http://lorempixel.com/1920/500/?v' . uniqid(),
        'summary' => $faker->words(10, true),
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'date_hour' => $carbon->addDays(rand(10, 100))->toDateTimeString(),
        'address' => $faker->address,
        'place' => $city
    ];
});

$factory->define(App\Price::class, function (Faker\Generator $faker) {
    return [
        'event_id' => null,
        'value' => $faker->numberBetween(50, 200),
        'description' => $faker->words(2, true)
    ];
});

$factory->define(App\Slider::class, function (Faker\Generator $faker) {
    return [
        'url' => null,
        'title' => null,
        'target' => 'self',
        'image' => 'http://lorempixel.com/1920/500/?v' . uniqid()
    ];
});
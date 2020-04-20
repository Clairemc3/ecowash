<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Slider;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) {
    return [
        'text' => $faker->sentence(5),
        'image_source' => $faker->url,
        'order' => $faker->numberBetween($min = 1, $max = 3),
    ];
});

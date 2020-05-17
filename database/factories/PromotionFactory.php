<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promotion;
use Faker\Generator as Faker;

$factory->define(Promotion::class, function (Faker $faker) {
    return [
        'slug' => $faker->slug(2),
        'name' => $faker->words(3, true),
        'body' => $faker->paragraph(),
        'active' => $faker->boolean(100),
        'theme' => $faker->randomElement(['green', 'red']),
    ];
});

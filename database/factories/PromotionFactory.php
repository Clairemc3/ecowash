<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promotion;
use Faker\Generator as Faker;

$factory->define(Promotion::class, function (Faker $faker) {
    return [
        'position' => $faker->slug(2),
        'body' => $faker->paragraph(),
        'help_text' => $faker->sentence(),
        'active' => $faker->boolean(100),
    ];
});

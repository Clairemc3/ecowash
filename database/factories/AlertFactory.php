<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Alert;
use Faker\Generator as Faker;

$factory->define(Alert::class, function (Faker $faker) {
    return [
        'short_text' => $faker->sentence(5),
        'long_text' => $faker->paragraph(4),
        'start_date' => $faker->dateTimeBetween('now', '+7days'),
        'end_date' =>  $faker->dateTimeBetween('+8days', '+20days'),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Alert;
use Faker\Generator as Faker;

$factory->define(Alert::class, function (Faker $faker) {
    return [
        'short_text' => $faker->text(60),
        'long_text' => $faker->paragraph(4),
        'starts_at' => $faker->dateTimeBetween('now', '+7days'),
        'ends_at' =>  function ($alert) use ($faker) {
            return $faker->dateTimeInInterval($alert['starts_at'], '+7days');
        },
    ];
});

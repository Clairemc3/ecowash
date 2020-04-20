<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Content;
use Faker\Generator as Faker;

$factory->define(Content::class, function (Faker $faker) {
    return [
        'slug' => $faker->slug(2),
        'help_text' => $faker->sentence(),
        'body' => $faker->paragraph(),
    ];
});

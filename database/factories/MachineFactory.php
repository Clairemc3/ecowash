<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Machine;
use Faker\Generator as Faker;

$factory->define(Machine::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'price' => $faker->sentence(2),
        'description' => $faker->sentence(5),
    ];
});

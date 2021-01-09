<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'identification' => rand(1000000,9999999),
        'name' => $faker->name,
        'address' => 'Calle '.rand(0,999) .' Número '. rand(0,999) .' '. Str::random(1) .' - ' .rand(0,999),
        'phone' => '31'.rand(1000000,9999999),
        'email' => $faker->unique()->safeEmail,
    ];
});

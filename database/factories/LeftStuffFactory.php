<?php

use Faker\Generator as Faker;

$factory->define(App\LeftStuff::class, function (Faker $faker) {
    return [
        'stuff_name' => $faker->name,
        'location_id' => random_int(1,6),
        'who_posted' => $faker->name,
        'admin_id' => 2,
        'status' => "0",
        'who_taken' => $faker->name,
        'admin_taken_id' => 1,
        'taken_at' => null
    ];
});
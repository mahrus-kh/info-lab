<?php

use Faker\Generator as Faker;

$factory->define(App\StudentCard::class, function (Faker $faker) {
    return [
        'nim' => random_int(14101075,14201075),
        'name' => $faker->name,
        'prodi_id' => random_int(1,5),
        'place_of_birth' => $faker->address,
        'date_of_birth' => $faker->dateTime,
        'address' => $faker->address,
        'city' => $faker->city,
        'phone' => $faker->phoneNumber,
        'etc' => $faker->text,
        'photo_number' => random_int(3235,5674),
        'photo_image' => $faker->text,
        'card_status' => "0",
        'print_status' => "0",
        'taken_status' => "0",
        'admin_id' => random_int(1,2),
        'taken_at' => $faker->dateTime,
        'admin_taken_id' => null
    ];
});
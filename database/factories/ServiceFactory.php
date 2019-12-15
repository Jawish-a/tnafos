<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        //         'name', 'description', 'rate','unit', 'type', 'category_id'
        'name' => $faker->name,
        'description' => $faker->text($maxNbChars = 20),
        'rate' => $faker->randomDigit,
        'unit' => $faker->name,
        'type' => $faker->randomElement(['Hourly','Project']),
        'category_id' => Category::all()->random()->id,
    ];
});

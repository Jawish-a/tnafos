<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        //

        /*
        'name', 'type', 'cr', 'vat', 'establishment_year', 'total_employees', 'bio',
        'telephone', 'fax', 'email', 'website', 'country', 'city', 'po_box', 'zip_code',
        'address', 'location','admin'
        */

        'name' => $faker->name,
        'type' => $faker->randomElement(['Company','Establishment','Organization']),
        'cr' => $faker->randomDigit,
        'vat' => $faker->randomDigit,
        'establishment_year' => $faker->numberBetween($min = 1900, $max = 2020),
        'total_employees' => $faker->numberBetween($min = 1, $max = 999),
        'bio' => $faker->text($maxNbChars = 100),
        'telephone' => $faker->unique()->phoneNumber,
        'fax' => $faker->unique()->phoneNumber,
        'email' => $faker->unique()->email,
        'website' => $faker->url,
        'country' => $faker->country,
        'city' => $faker->name,
        'po_box' => $faker->postcode,
        'zip_code' => $faker->postcode,
        'address' => $faker->address,
        'location' => $faker->latitude.', '.$faker->longitude,
        'admin_id' => App\User::all()->random()->id,
        'category_id' => App\Category::all()->random()->id,

    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        // 'gender', 'birth_date', 'mobile'
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'gender' => $faker->randomElement(['m','f']),
        //'birth_date' => $faker->date,
        'mobile' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('aJ5181991@'), // password
        'remember_token' => Str::random(10),
        'company_id' => App\Company::all()->random()->id
    ];
});

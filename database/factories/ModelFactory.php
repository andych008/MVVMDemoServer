<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(App\Card::class, 'female', function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstNameFemale,
        'last_name' => $faker->lastName,
        'gender' => 0,
        'age' => $faker->numberBetween(19, 45),
        'height' => $faker->numberBetween(155, 175),
        'weight' => $faker->numberBetween(45, 55),
        'head_url' => $faker->imageUrl(128, 128)
    ];
});

$factory->defineAs(App\Card::class, 'male', function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'gender' => 1,
        'age' => $faker->numberBetween(23, 80),
        'height' => $faker->numberBetween(168, 185),
        'weight' => $faker->numberBetween(50, 80),
        'head_url' => $faker->imageUrl(128, 128)
    ];
});

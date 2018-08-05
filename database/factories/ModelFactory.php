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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Model\user\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->name,
        'slug' => ean8,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Model\user\blogpost::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->name,
        'subtitle' => $faker->name,
        'slug' => $faker->ean8,
        'body' => $faker->paragraph(200)
    ];
});

$factory->define(App\Model\user\categorie::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'slug' => $faker->ean8
    ];
});

$factory->define(App\Model\user\tag::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'slug' => $faker->ean8
    ];
});

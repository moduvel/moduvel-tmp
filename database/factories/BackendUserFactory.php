<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Moduvel\Core\Entities\BackendUser;

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

$factory->define(BackendUser::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('secret'), // secret
        'remember_token' => str_random(10),
    ];
});

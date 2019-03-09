<?php

use App\Models\Animal;
use App\Models\UserAnimalAttribute;
use Faker\Generator as Faker;

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

$factory->define(Animal::class, function (Faker $faker) {
    return [
        'image_path' => $faker->imageUrl()
    ];
});

$factory->define(UserAnimalAttribute::class, function (Faker $faker) {
    return [];
});

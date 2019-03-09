<?php

use App\Models\User;
use App\Models\UserAnimal;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(UserAnimal::class, function (Faker $faker) {
    do {
        /** @var User $user */
        $user = (new User())->query()->inRandomOrder()->first();
    } while ($user->animal()->exists());

    return [
        'animal_id' => (new \App\Models\Animal())->query()->inRandomOrder()->first()->id,
        'user_id' => $user->id,
        'name' => $faker->name,
    ];
});

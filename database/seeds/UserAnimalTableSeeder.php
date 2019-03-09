<?php

use Illuminate\Database\Seeder;

class UserAnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\UserAnimal::class, round(\App\Models\User::query()->count()/2))->create();
    }
}

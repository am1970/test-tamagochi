<?php

use Illuminate\Database\Seeder;

class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'dog',
                'title' => 'Dog'
            ],
            [
                'name' => 'cat',
                'title' => 'Cat'
            ],
            [
                'name' => 'raccoon',
                'title' => 'Raccoon'
            ],
            [
                'name' => 'penguin',
                'title' => 'Penguin'
            ],
        ])->each(function ($data) {
            factory(\App\Models\Animal::class, 1)->create($data);
        });

    }
}

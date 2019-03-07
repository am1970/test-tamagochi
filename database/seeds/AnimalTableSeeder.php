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
                'title' => 'Собака'
            ],
            [
                'name' => 'cat',
                'title' => 'Кот'
            ],
            [
                'name' => 'raccoon',
                'title' => 'Енот'
            ],
            [
                'name' => 'penguin',
                'title' => 'Пингвин'
            ],
        ])->each(function ($data) {
            factory(\App\Models\Animal::class, 1)->create($data);
        });

    }
}

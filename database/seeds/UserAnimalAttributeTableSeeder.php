<?php

use Illuminate\Database\Seeder;

class UserAnimalAttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAnimals = \App\Models\UserAnimal::query()->get();
        $attributes = \App\Models\Attribute::query()->get();

        $userAnimals->each(function ($userAnimal) use ($attributes) {
            $attributes->each(function ($attribute) use ($userAnimal) {
                /**
                 * @var \App\Models\UserAnimal $userAnimal
                 * @var \App\Models\Attribute $attribute
                 */
                $userAnimal->animalAttributes()->create([ 'attribute_id' => $attribute->id ]);
            });
        });

    }
}

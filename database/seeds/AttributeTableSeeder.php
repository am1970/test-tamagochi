<?php

use Illuminate\Database\Seeder;

class AttributeTableSeeder extends Seeder
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
                'name' => 'hunger',
                'title' => 'Hunger',
                'description' => 'Если​ ​голод​ упал​​ до​​ <5,​​ у​ юзера​​ есть​ 1 час,​ чтобы​ накормить питомца.​​ В​ противном случае​ ​игрок​ проигрывает,​ ​а​ питомец погибает.',
                'timeout' => 5,
            ],
            [
                'name' => 'sleep',
                'title' => 'Sleep',
                'description' => 'Если​ ​сон​ ​упал​ ​до​ ​<5,​ ​забота​ ​начинает​ уменьшаться​ ​в ​3 ​раза​ ​быстрее​ ​(1​ ​ед.​ ​раз​ ​в ​5 минут).',
                'timeout' => 10,
            ],
            [
                'name' => 'care',
                'title' => 'Care',
                'timeout' => 7,
            ]
        ])->each(function ($data) {
            factory(\App\Models\Attribute::class, 1)->create($data);
        });
    }
}

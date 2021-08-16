<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        \DB::table('categories')->insert($this->getData());
    }

    /**
     * @throws \Exception
     */
    public function getData() : array
    {
        $faker = Factory::create('ru_RU');
        $data = [];
        for($i=0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->realText(10),
                'content' => $faker->realText(random_int(100, 150)),
                'status_id' => random_int(1,3),
                'seo_title' =>$faker->realText(10),
                'seo_description' => $faker->realTextBetween(),
            ];
        }

        return $data;
    }
}

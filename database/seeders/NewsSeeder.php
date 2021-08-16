<?php

namespace Database\Seeders;
use Exception;
use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }

    /**
     * @throws Exception
     */
    public function getData() : array
    {
        $faker = Factory::create('ru_RU');
        $data = [];
        for($i=0; $i < 400; $i++) {
            $data[] = [
                'category_id' => random_int(1,10),
                'user_id' => 1,
                'title' => $faker->realText(10),
                'content' => $faker->realText(random_int(1000,5000)),
                'status_id' => random_int(1,3),
                'seo_title' =>$faker->realText(10),
                'seo_description' => $faker->realTextBetween(),
            ];
        }

        return $data;
    }
}

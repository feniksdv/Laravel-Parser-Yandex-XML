<?php

namespace Database\Seeders;

use Exception;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        \DB::table('pages')->insert($this->getData());
    }

    /**
     * @throws Exception
     */
    public function getData() : array
    {
        $faker = Factory::create();
        $data = [];
        for($i=0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->sentence(3,10),
                'content' => $faker->text(),
                'status_id' => random_int(1,3),
                'seo_title' =>$faker->sentence(3,10),
                'seo_description' => $faker->text(50),
            ];
        }

        return $data;
    }
}

<?php

namespace Database\Seeders;

use Exception;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run(): void
    {
        \DB::table('customers')->insert($this->getData());
    }

    /**
     * @throws Exception
     */
    public function getData() : array
    {
        $faker = Factory::create('ru_RU');
        $data = [];
        for($i=0; $i < 10; $i++) {
            $data[] = [
                'user_id' => random_int(1,10),
                'is_admin' => 0,
                'is_author' => 0,
                'tel' => $faker->phoneNumber(),
                'telegram' => '@'.$faker->userName(),
            ];
        }

        return $data;
    }
}

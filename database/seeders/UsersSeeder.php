<?php

namespace Database\Seeders;

use Exception;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run(): void
    {
        \DB::table('users')->insert($this->getData());
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
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => $faker->password(6,20)
            ];
        }

        return $data;
    }
}

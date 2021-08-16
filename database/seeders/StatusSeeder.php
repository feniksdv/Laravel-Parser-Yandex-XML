<?php

namespace Database\Seeders;

use Exception;
use Faker\Factory;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run(): void
    {
        \DB::table('statuses')->insert($this->getData());
    }

    /**
     * @throws Exception
     */
    public function getData() : array
    {
        $faker = Factory::create('ru_RU');
        $status = [
            'Черновик',
            'На доработку',
            'Опубликована',
            'Удалена',
            'На рассмотрении',
            'В работе',
            'Выполнен',
        ];

        $data = [];
        for($i=0; $i < 7; $i++) {
            $data[] = [
                'name' => $status[$i]
            ];
        }

        return $data;
    }

}

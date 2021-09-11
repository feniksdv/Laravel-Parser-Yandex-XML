<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    /**
     * Проверяем, что отдается статус 200
     */
//    public function test_dashboard_controller_status(): void
//    {
//        $response = $this->get(route('admin.dashboard'));
//        $response->assertStatus(200);
//    }

        //вопрос -
        //Как проверить с помощью теста, что переменая(масив) передана в шаблон из контролера? У нас есть в
        // HomeController масссив $arr = [1,2,3] мы его выводим в шаблон. Теперь с помощью теста я хочу проверить
        // что массив $arr непустой и выводится на странице. Как это сделать?
        //У меня тут получается фаил сохраняется, а тесты как то видать по другому работают с файлами...
}

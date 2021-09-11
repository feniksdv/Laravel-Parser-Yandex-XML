<?php

namespace Tests\Feature;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * Проверяем, что отдается статус 200
     */
    public function test_home_controller_status(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Проверяем, что отдается статус 200 другим способом
     */
    public function test_home_controller_status_200(): void
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    /**
     * Проверяем, что в блоке Банер загрузился H3 соответствующий этой странице
     */
    public function test_home_controller_see_h3(): void
    {
        $response = $this->get('/');

        $response->assertSee('Главная', $escaped = true);
    }

    /**
     * Проверяем, что сайдбар загрузился
     */
    public function test_home_controller_see_sidebar(): void
    {
        $response = $this->get('/');

        $response->assertSeeText('Категории', $escaped = true);
    }

    /**
     * Проверяем, что новости загрузились на Главной станицы
     */
    public function test_home_controller_see_listNews(): void
    {
        $response = $this->get('/');

        $response->assertDontSeeText('Данных нет', $escaped = true);
    }

    /**
     * Проверяем, что по URL отдался указанный шаблон
     */
    public function test_home_controller_view_home(): void
    {
        $response = $this->get('/');

        $response->assertViewIs('home');
    }

    /**
     * Проверяем, что по маршруту отдался указанный шаблон
     */
    public function test_home_controller_list_is_view(): void
    {
        $response = $this->get(route('home'));

        $response->assertViewIs('home');
    }
}

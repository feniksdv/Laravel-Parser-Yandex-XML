<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    /**
     * Проверяем, что отдается статус 200
     */
    public function test_order_controller_status(): void
    {
        $response = $this->get(route('order'));

        $response->assertStatus(200);
    }

    /**
     * Проверяем, что отдается статус 200 другим способом
     */
    public function test_order_controller_status_200(): void
    {
        $response = $this->get(route('order'));

        $response->assertOk();
    }

    /**
     * Проверяем, что в блоке Банер загрузился H3 соответствующий этой странице
     */
    public function test_order_controller_see_h3(): void
    {
        $response = $this->get(route('order'));

        $response->assertSee('Услуги', $escaped = true);
    }

    /**
     * Проверяем, что по URL отдался указанный шаблон
     */
    public function test_order_controller_view_home(): void
    {
        $response = $this->get(route('order'));

        $response->assertViewIs('main.order');
    }

    /**
     * Проверяем, что по маршруту отдался указанный шаблон
     */
    public function test_order_controller_list_is_view(): void
    {
        $response = $this->get(route('order'));

        $response->assertViewIs('main.order');
    }
}

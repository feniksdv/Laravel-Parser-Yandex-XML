<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    /**
     * Проверяем, что отдается статус 200
     */
    public function test_contact_controller_status(): void
    {
        $response = $this->get(route('contact'));

        $response->assertStatus(200);
    }

    /**
     * Проверяем, что отдается статус 200 другим способом
     */
    public function test_contact_controller_status_200(): void
    {
        $response = $this->get(route('contact'));

        $response->assertOk();
    }

    /**
     * Проверяем, что в блоке Банер загрузился H3 соответствующий этой странице
     */
    public function test_contact_controller_see_h3(): void
    {
        $response = $this->get(route('contact'));

        $response->assertSee('Контакты', $escaped = true);
    }


    /**
     * Проверяем, что по URL отдался указанный шаблон
     */
    public function test_contact_controller_view_home(): void
    {
        $response = $this->get(route('contact'));

        $response->assertViewIs('main.contact');
    }

    /**
     * Проверяем, что по маршруту отдался указанный шаблон
     */
    public function test_contact_controller_list_is_view(): void
    {
        $response = $this->get(route('contact'));

        $response->assertViewIs('main.contact');
    }
}

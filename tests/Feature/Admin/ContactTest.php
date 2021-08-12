<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * Проверяем, что отдается статус 200
     */
    public function test_contact_controller_status(): void
    {
        $response = $this->get(route('admin.contact.index'));

        $response->assertStatus(200);
    }

    /**
     * Проверяем, что отдается статус 200 другим способом
     */
    public function test_contact_controller_status_200(): void
    {
        $response = $this->get('/admin/contact');

        $response->assertOk();
    }

    /**
     * Проверяем, что новости загрузились на Главной станицы
     */
    public function test_contact_controller_see_listNews(): void
    {
        $response = $this->get('/admin/contact');

        $response->assertDontSeeText('Сообщений не найдено', $escaped = true);
    }

    /**
     * Проверяем, что по URL отдался указанный шаблон
     */
    public function test_contact_controller_view_home(): void
    {
        $response = $this->get('/admin/contact');

        $response->assertViewIs('admin.contact.index');
    }

    /**
     * Проверяем, что по маршруту отдался указанный шаблон
     */
    public function test_contact_controller_list_is_view(): void
    {
        $response = $this->get(route('admin.contact.index'));

        $response->assertViewIs('admin.contact.index');
    }
}

<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * Проверяем, что отдается статус 200
     */
    public function test_news_controller_status(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    /**
     * Проверяем, что отдается статус 200 другим способом
     */
    public function test_news_controller_status_200(): void
    {
        $response = $this->get('/admin/news');

        $response->assertOk();
    }

    /**
     * Проверяем, что новости загрузились на Главной станицы
     */
    public function test_news_controller_see_listNews(): void
    {
        $response = $this->get('/admin/news');

        $response->assertDontSeeText('Новостей не найдено', $escaped = true);
    }

    /**
     * Проверяем, что по URL отдался указанный шаблон
     */
    public function test_news_controller_view_home(): void
    {
        $response = $this->get('/admin/news');

        $response->assertViewIs('admin.news.index');
    }

    /**
     * Проверяем, что по маршруту отдался указанный шаблон
     */
    public function test_news_controller_list_is_view(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertViewIs('admin.news.index');
    }
}

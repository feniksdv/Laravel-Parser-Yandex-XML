<?php

namespace Tests\Feature;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /* * * * *
    * index  *
    * * * * */

    /**
     * Проверяем, что отдается статус 200
     */
    public function test_news_controller_status(): void
    {
        $response = $this->get(route('news'));

        $response->assertStatus(200);
    }

    /**
     * Проверяем, что отдается статус 200 другим способом
     */
    public function test_news_controller_status_200(): void
    {
        $response = $this->get(route('news'));

        $response->assertOk();
    }

    /**
     * Проверяем, что в блоке Банер загрузился H3 соответствующий этой странице
     */
    public function test_news_controller_see_h3(): void
    {
        $response = $this->get(route('news'));

        $response->assertSee('Новости', $escaped = true);
    }

    /**
     * Проверяем, что сайдбар загрузился
     */
    public function test_news_controller_see_sidebar(): void
    {
        $response = $this->get(route('news'));

        $response->assertSeeText('Категории', $escaped = true);
    }

    /**
     * Проверяем, что Новости загрузились на станице
     */
    public function test_news_controller_see_listNews(): void
    {
        $response = $this->get(route('news'));

        $response->assertDontSeeText('Данных нет', $escaped = true);
    }

    /**
     * Проверяем, что по URL отдался указанный шаблон
     */
    public function test_news_controller_view_home(): void
    {
        $response = $this->get(route('news'));

        $response->assertViewIs('main.news.index');
    }

    /**
     * Проверяем, что по маршруту отдался указанный шаблон
     */
    public function test_news_controller_list_is_view(): void
    {
        $response = $this->get(route('news'));

        $response->assertViewIs('main.news.index');
    }

    /* * * * *
    * Show   *
    * * * * */

    /**
     * Проверяем, что отдается статус 200
     */
    public function test_news_controller_status_route_show(): void
    {
        $obj = new Controller();

        foreach ($obj->getCategoryList() as $category){
            $response = $this->get("news/show/{$category['id']}");
            $response->assertStatus(200);
        }
    }

    /**
     * Проверяем, что отдается статус 200 другим способом
     */
    public function test_news_controller_status_200_route_show(): void
    {
        $obj = new Controller();

        foreach ($obj->getCategoryList() as $category){
            $response = $this->get("news/show/{$category['id']}");
            $response->assertOk();
        }
    }

    /**
     * Проверяем, что в блоке Банер загрузился H3 соответствующий этой странице
     */
    public function test_news_controller_see_h3_route_show(): void
    {
        $obj = new Controller();

        foreach ($obj->getCategoryList() as $category) {
            $response = $this->get("news/show/{$category['id']}");
            $response->assertSeeText('Статья', $escaped = true);
        }
    }

    /**
     * Проверяем, что сайдбар загрузился
     */
    public function test_news_controller_see_sidebar_route_show(): void
    {
        $obj = new Controller();

        foreach ($obj->getCategoryList() as $category) {
            $response = $this->get("news/show/{$category['id']}");
            $response->assertSeeText('Категории', $escaped = true);
        }
    }

    /**
     * Проверяем, что Рубрики загрузились на станице
     */
    public function test_news_controller_see_listNews_route_show(): void
    {
        $obj = new Controller();

        foreach ($obj->getCategoryList() as $category) {
            $response = $this->get("news/show/{$category['id']}");
            $response->assertDontSeeText('Данных нет', $escaped = true);
        }
    }

    /**
     * Проверяем, что по URL отдался указанный шаблон
     */
    public function test_news_controller_view_news_route_show(): void
    {
        $obj = new Controller();

        foreach ($obj->getCategoryList() as $category) {
            $response = $this->get("news/show/{$category['id']}");
            $response->assertViewIs('main.news.show');
        }
    }

    /**
     * Проверяем, что по маршруту отдался указанный шаблон
     */
    public function test_news_controller_list_is_view_route_show(): void
    {
        $obj = new Controller();

        foreach ($obj->getCategoryList() as $category) {
            $response = $this->get("news/show/{$category['id']}");
            $response->assertViewIs('main.news.show');
        }
    }
}

<?php

namespace Tests\Feature;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /* * * * *
    * index  *
    * * * * */

    /**
     * Проверяем, что отдается статус 200
     */
    public function test_category_controller_status(): void
    {
        $response = $this->get(route('category'));

        $response->assertStatus(200);
    }

    /**
     * Проверяем, что отдается статус 200 другим способом
     */
    public function test_category_controller_status_200(): void
    {
        $response = $this->get(route('category'));

        $response->assertOk();
    }

    /**
     * Проверяем, что в блоке Банер загрузился H3 соответствующий этой странице
     */
    public function test_category_controller_see_h3(): void
    {
        $response = $this->get(route('category'));

        $response->assertSee('Рубрики', $escaped = true);
    }

    /**
     * Проверяем, что сайдбар загрузился
     */
    public function test_category_controller_see_sidebar(): void
    {
        $response = $this->get(route('category'));

        $response->assertSeeText('Категории', $escaped = true);
    }

    /**
     * Проверяем, что Рубрики загрузились на станице
     */
    public function test_category_controller_see_listNews(): void
    {
        $response = $this->get(route('category'));

        $response->assertDontSeeText('Данных нет', $escaped = true);
    }

    /**
     * Проверяем, что по URL отдался указанный шаблон
     */
    public function test_category_controller_view_home(): void
    {
        $response = $this->get(route('category'));

        $response->assertViewIs('main.category.index');
    }

    /**
     * Проверяем, что по маршруту отдался указанный шаблон
     */
    public function test_category_controller_list_is_view(): void
    {
        $response = $this->get(route('category'));

        $response->assertViewIs('main.category.index');
    }

    /* * * * *
    * Show   *
    * * * * */

    /**
     * Проверяем, что отдается статус 200
     */
    public function test_category_controller_status_route_show(): void
    {
        $obj = new Controller();

        foreach ($obj->getCategoryList() as $category){
            $response = $this->get("category/show/{$category['id']}");
            $response->assertStatus(200);
        }
    }

    /**
     * Проверяем, что отдается статус 200 другим способом
     */
    public function test_category_controller_status_200_route_show(): void
    {
        $obj = new Controller();

        foreach ($obj->getCategoryList() as $category){
            $response = $this->get("category/show/{$category['id']}");
            $response->assertOk();
        }
    }

    /**
     * Проверяем, что в блоке Банер загрузился H3 соответствующий этой странице
     */
    public function test_category_controller_see_h3_route_show(): void
    {
        $obj = new Controller();

        foreach ($obj->getCategoryList() as $category) {
            $response = $this->get("category/show/{$category['id']}");
            $response->assertSee($category['title'], $escaped = true);
        }
    }

    /**
     * Проверяем, что сайдбар загрузился
     */
    public function test_category_controller_see_sidebar_route_show(): void
    {
        $obj = new Controller();

        foreach ($obj->getCategoryList() as $category) {
            $response = $this->get("category/show/{$category['id']}");
            $response->assertSeeText('Категории', $escaped = true);
        }
    }

    /**
     * Проверяем, что Рубрики загрузились на станице
     */
    public function test_category_controller_see_listNews_route_show(): void
    {
        $obj = new Controller();

        foreach ($obj->getCategoryList() as $category) {
            $response = $this->get("category/show/{$category['id']}");
            $response->assertDontSeeText('Данных нет', $escaped = true);
        }
    }

    /**
     * Проверяем, что по URL отдался указанный шаблон
     */
    public function test_category_controller_view_category_route_show(): void
    {
        $obj = new Controller();

        foreach ($obj->getCategoryList() as $category) {
            $response = $this->get("category/show/{$category['id']}");
            $response->assertViewIs('main.category.show');
        }
    }

    /**
     * Проверяем, что по маршруту отдался указанный шаблон
     */
    public function test_category_controller_list_is_view_route_show(): void
    {
        $obj = new Controller();

        foreach ($obj->getCategoryList() as $category) {
            $response = $this->get("category/show/{$category['id']}");
            $response->assertViewIs('main.category.show');
        }
    }
}

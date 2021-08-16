<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    /**
     * Выводит список всех новостей
     *
     * @param Request $request
     * @return view
     */
    public function index(Request $request) : view
    {
        $objNews = new News();
        $objCategory = new Category();

        return view('main.news.index', [
            'listNews' => $objNews->getNews(),
            'listCategory' => $objCategory->getCategories(),
            'id' => 0
        ]);
    }

    /**
     * Выводит конкретную новость
     *
     * @param int $id
     * @return View
     */
    public function show(int $id) :view
    {
        $objNews = new News();
        $objCategory = new Category();

        return view('main.news.show', [
            'listNews' => $objNews->getNewsById($id),
            'listCategory' => $objCategory->getCategories(),
            'id' => $id
        ]);
    }
}

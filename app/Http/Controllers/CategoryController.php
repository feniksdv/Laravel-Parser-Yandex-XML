<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Показать все категории
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request) : view
    {
        $objCategory = new Category();
        $objNews = new News();
        
        return view('main.category.index', [
            'listCategory' => $objCategory->getCategories(),
            'id' => 0,
            'countNewsInCategory' => $objNews->getCountNewsInCategories()
        ]);
    }

    /**
     * Показывает список новостей в конкретной категории
     *
     * @param int $id
     * @return View
     */
    public function show(int $id) : view
    {
        $objNews = new News();
        $objCategory = new Category();

        return view('main.category.show', [
            'listNews' => $objNews->getNews(),
            'listCategory' => $objCategory->getCategories(),
            'id' => $id,
            'countNewsInCategory' => $objNews->getCountNewsInCategories()
        ]);
    }
}

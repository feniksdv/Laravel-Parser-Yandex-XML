<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\View;
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
        $sidebarCategory = Category::all();
        $listNews = News::all();
        $listCategory = Category::paginate(
            config('paginate.main.categories')
        );

        $countNewsInCategory = [];
        for ($i=0; $i <= $sidebarCategory->count(); $i++) {
            $countNewsInCategory[] = $listNews->where('category_id', '=', $i)->count();
        }
        unset($countNewsInCategory[0]);


        return view('main.category.index', [
            'listCategory' => $listCategory,
            'sidebarCategory' => $sidebarCategory,
            'countNewsInCategory' => $countNewsInCategory,
        ]);
    }

    /**
     * Показывает список новостей в конкретной категории
     *
     * @param Category $category
     * @return View
     */
    public function show(Category $category) : view
    {
        $listNewsByIdCategory = News::where('category_id', '=', $category['id'])
        ->paginate(
            config('paginate.main.news')
        );
        $listCategory = Category::all();

        $countNewsInCategory = [];
        for ($i=0; $i <= $listCategory->count(); $i++) {
            $countNewsInCategory[] = News::where('category_id', '=', $i)->count();
        }
        unset($countNewsInCategory[0]);

        $categoryId = $category['id'];

        return view('main.category.show', [
            'listNews' => $listNewsByIdCategory,
            'listCategory' => $listCategory,
            'countNewsInCategory' => $countNewsInCategory,
            'categoryId' => $categoryId
        ]);
    }
}

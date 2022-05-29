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
        $listNews = News::with('users')->paginate(
            config('paginate.main.news')
        );
        $listCategory = Category::all();

        $countNewsInCategory = [];
        for ($i=0; $i <= $listCategory->count(); $i++) {
            $countNewsInCategory[] = News::where('category_id', '=', $i)->count();
        }
        unset($countNewsInCategory[0]);

        return view('main.news.index', [
            'listNews' => $listNews,
            'listCategory' => $listCategory,
            'countNewsInCategory' => $countNewsInCategory
        ]);
    }

    /**
     * Выводит конкретную новость
     *
     * @param Request $request
     * @param News $news
     * @return View
     */
    public function show(Request $request, News $news) :view
    {
        $listNews = News::all();
        $listCategory = Category::all();
        $countNewsInCategory = [];
        for ($i=0; $i <= $listCategory->count(); $i++) {
            $countNewsInCategory[] = $listNews->where('category_id', '=', $i)->count();
        }
        unset($countNewsInCategory[0]);

        $categoryId = $news['id'];

        return view('main.news.show', [
            'listNews' => $news,
            'listCategory' => $listCategory,
            'countNewsInCategory' => $countNewsInCategory,
            'categoryId' => $categoryId
        ]);
    }
}

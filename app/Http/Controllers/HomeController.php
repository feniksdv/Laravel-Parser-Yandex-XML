<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request) : view
    {
        $listNews = News::paginate(
            config('paginate.main.news')
        );
        $listCategory = Category::all();

        $countNewsInCategory = [];
        for ($i=0; $i <= $listCategory->count(); $i++) {
            $countNewsInCategory[] = News::where('category_id', '=', $i)->count();
        }
        unset($countNewsInCategory[0]);

        return view('home', [
            'listNews' => $listNews,
            'listCategory' => $listCategory,
            'countNewsInCategory' => $countNewsInCategory
        ]);
    }
}

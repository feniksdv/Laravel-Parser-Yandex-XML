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
        $objNews = new News();
        $objCategory = new Category();

        return view('home', [
            'listNews' => $objNews->getNews(),
            'listCategory' => $objCategory->getCategories(),
            'countNewsInCategory' => $objNews->getCountNewsInCategories()
        ]);
    }
}

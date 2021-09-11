<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Показать все категории
     *
     * @return View
     */
    public function index() : view
    {
        return view('main.category.index', [
            'listCategory' => $this->getCategoryList(),
            'id' => 0
        ]);
    }

    /**
     * Показывает список новостей в конкретной категории
     *
     * @param int $id
     */
    public function show(int $id)
    {
        $newsList = [];
        foreach($this->getNewsList() as $news) {
            if($news['idCategory'] === $id) {
                $newsList[] = $news;
            }
        }

        if(empty($newsList)) {
            abort(404);
        }

        return view('main.category.show', [
            'listNews' => $newsList,
            'listCategory' => $this->getCategoryList(),
            'id' => $id
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    /**
     * Выводит список всех новостей
     *
     * @return view
     */
    public function index() : view
    {
        return view('news.index', [
            'news' => $this->getNewsList()
        ]);
    }

    /**
     * Выводит конкретную новость
     *
     * @param int $id
     */
    public function show(int $id)
    {
        $newsList = [];
        foreach($this->getNewsList() as $news) {
            if($news['id'] === $id) {
                $newsList = $news;
            }
        }

        if(empty($newsList)) {
            abort(404);
        }

        return view('news.show', [
            'newsList' => $newsList
        ]);
    }
}

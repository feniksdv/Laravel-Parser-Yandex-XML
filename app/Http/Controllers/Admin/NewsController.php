<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Выводит список всех новостей
     *
     * @return View
     */
    public function index(): view
    {
        $objNews = new News();
        return view('admin.news.index', [
            'listNews'=>$objNews->getNews()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.news.create', ['listCategories' => $this->getCategoryList()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        return view('admin.news.edit', ['listCategories' => $this->getCategoryList(),'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

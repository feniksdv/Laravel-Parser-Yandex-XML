<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
        $objNews = News::with(['statuses', 'users', 'category'])->paginate(
            config('paginate.admin.news')
        );
        return view('admin.news.index', [
            'listNews'=>$objNews
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
     * Показывает выбранную статью
     *
     * @param News $news
     * @return View
     */
    public function show(News $news): View
    {
        $categories = Category::all();

        $countNewsInCategory = [];
        for ($i=0; $i <= $categories->count(); $i++) {
            $countNewsInCategory[] = News::where('category_id', '=', $i)->count();
        }
        unset($countNewsInCategory[0]);

        return view('main.news.show', [
            'listNews' => $news,
            'listCategory' => $categories,
            'countNewsInCategory' => $countNewsInCategory,
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
     * Тихое удаление, не удаляем из БД данные а меня статус на delete
     *
     * @param Request $request
     * @param News $news
     * @return RedirectResponse
     */
    public function destroy(Request $request, News $news): RedirectResponse
    {
        News::where('id','=', $news->id)->update(['status'=> 'delete']);

        $news_ = Category::with('statuses')
            ->paginate(
                config('paginate.admin.news')
            );

        return redirect()->route('admin.news.index')->with('success', 'Новость удаленна!');
    }
}

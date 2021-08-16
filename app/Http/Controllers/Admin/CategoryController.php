<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Выводит список Категорий
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): view
    {
        $objCategory = new Category();
        return view("admin.categories.index", ['listCategories' => $objCategory->getCategories()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.categories.create');
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
     * Показывает выбранную категорию и статьи которые в ней есть
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): view
    {
        $objCategory = new Category();
        $objNews = new News();

        return view('main.category.show', [
            'listCategory' => $objCategory->getCategories(),
            'listNews' => $objNews->getNewsByIdCategory($id)
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
        return view('admin.categories.edit', ['listCategories' => $this->getCategoryList(),'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return View
     */
    public function destroy(int $id): view
    {
//        $objCategory = new Category();
//        $objCategory->destroyCategoryById($id);
//        return view("admin.categories.index", ['listCategories' => $objCategory->getCategories()]);
    }
}

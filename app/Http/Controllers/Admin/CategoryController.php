<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Status;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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
        $category = Category::with('statuses')
            ->paginate(
                config('paginate.admin.categories')
            );

        return view("admin.categories.index", [
            'listCategories' => $category,
        ]);
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
     * @param Category $category
     * @return View
     */
    public function show(Category $category): view
    {
        $categories = Category::all();
        $news = News::where('category_id', '=', $category->id)->paginate(
            config('paginate.main.categories')
        );

        $countNewsInCategory = [];
        for ($i=0; $i <= $categories->count(); $i++) {
            $countNewsInCategory[] = News::where('category_id', '=', $i)->count();
        }
        unset($countNewsInCategory[0]);

        return view('main.category.show', [
            'listCategory' => $categories,
            'listNews' => $news,
            'countNewsInCategory' => $countNewsInCategory
        ]);
    }

    /**
     * Показать форму для редактирования указанного ресурса.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): view
    {
        $objCategory = new Category();

        return view('admin.categories.edit', [
            'listCategory' => $objCategory->getCategoryById($id)
        ]);
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
     * Тихое удаление, не удаляем из БД данные а меня статус на delete
     *
     * @param Request $request
     * @param Category $category
     */
    public function destroy(Request $request, Category $category)
    {
        //1. Тыкнуть на кнопку
        //2. Отправить через аякс запрос на сервер
        //3. Вернуть ответ что данные удалились
        //4. проверка если тыкаем второй раз

        Category::where('id','=', $category->id)->update(['status'=> 'delete']);

        $categories = Category::with('statuses')
            ->paginate(
                config('paginate.admin.categories')
            );

        return redirect()->route('admin.categories.index')->with('success', 'Категория удаленна!');
    }
}

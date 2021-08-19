<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Status;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
     * @return View
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
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

        $categoryId = $category['id'];

        return view('main.category.show', [
            'listCategory' => $categories,
            'listNews' => $news,
            'countNewsInCategory' => $countNewsInCategory,
            'categoryId' => $categoryId
        ]);
    }

    /**
     * Показать форму для редактирования указанного ресурса.
     *
     * @param int $id
     * @return View
     */
    public function edit(Category $category): view
    {
        $listCategory = Category::find($category->id);
        $listStatuses = Status::find([1,2,3,4]);

        return view('admin.categories.edit', [
            'listCategory' => $listCategory,
            'listStatuses' => $listStatuses,
        ]);
    }

    /**
     * Обновить категорию по нажатию на кнопку Сохранить
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category): RedirectResponse
    {

        $request->validate([
            'title' => ['required', 'string'],
            'status_id' => ['required', 'not_in:0']
        ]);

        $category = $category->fill(
            $request->only([
                'status_id',
                'title',
                'content',
                'seo_title',
                'seo_description'
            ])
        )->save();

        if($category) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Категория успешно сохранена');
        }
        return back()->withInput()->with('error', 'Не удалось сохранить категорию');
    }

    /**
     * Тихое удаление, не удаляем из БД данные а меня статус на delete
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Request $request, Category $category): RedirectResponse
    {
        Category::where('id','=', $category->id)->update(['status'=> 'delete']);

        $categories = Category::with('statuses')
            ->paginate(
                config('paginate.admin.categories')
            );

        return redirect()->route('admin.categories.index')->with('success', 'Категория удаленна!');
    }
}

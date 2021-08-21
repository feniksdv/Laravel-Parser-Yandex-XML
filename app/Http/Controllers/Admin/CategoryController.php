<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Status;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
     * Показывает форму по созданию новой категории
     *
     * @return View
     */
    public function create(): View
    {
        $listStatuses = Status::find([1,2,3,4]);

        return view('admin.categories.create', [
            'listStatuses' => $listStatuses
        ]);
    }

    /**
     * Сохраняем новую категорию в БД
     *
     * @param StoreCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $category = Category::create($request->validated())->save();

        if($category) {
            return redirect()->route('admin.categories.index')->with('success', __('messages.admin.category.store.success'));
        }
        return back()->withInput()->with('error', __('messages.admin.category.store.error'));
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
     * Показать форму для редактирования выбранной категории
     *
     * @param Category $category
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
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $category_ = $category->fill($request->validated())->save();

        if($category_) {
            return redirect()->route('admin.categories.index')
                ->with('success', __('messages.admin.category.update.success'));
        }
        return back()->withInput()->with('error', __('messages.admin.category.update.error'));
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

        return redirect()->route('admin.categories.index')->with('success', __('messages.admin.category.destroy.success'));
    }
}

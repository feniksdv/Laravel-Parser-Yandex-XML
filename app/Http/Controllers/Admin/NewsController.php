<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreNewsRequest;
use App\Http\Requests\Admin\UpdateNewsRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\News;
use App\Models\Status;
use App\Models\User;
use Cassandra\Custom;
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
     * Показывает форму по созданию новой новости
     *
     * @return Application|Factory|View
     */
    public function create(Request $request, News $news)
    {
        $listStatuses = Status::find([1,2,3,4]);
        $listCategory = Category::all();
        $listAuthors = Customer::where('is_author','=', 1)->get();

        return view('admin.news.create', [
            'listStatuses' => $listStatuses,
            'listNews' => $news,
            'listCategory' => $listCategory,
            'listAuthors' => $listAuthors,
        ]);
    }

    /**
     * Сохраняем новую новость в БД
     *
     * @param StoreNewsRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function store(StoreNewsRequest $request, News $news): RedirectResponse
    {
        $news = $news->create($request->validated())->save();

        if($news) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.store.success'));
        }
        return back()->withInput()->with('error', __('messages.admin.news.store.error'));
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
     * Показать форму для редактирования выбранной новости.
     *
     * @param News $news
     * @return View
     */
    public function edit(News $news): View
    {
        $listCategory = Category::all();
        $listStatuses = Status::find([1,2,3,4]);
        $listAuthors = Customer::where('is_author','=', 1)->get();

        return view('admin.news.edit', [
            'listNews' => $news,
            'listCategory' => $listCategory,
            'listStatuses' => $listStatuses,
            'listAuthors' => $listAuthors,
        ]);
    }

    /**
     * Обновить новость по нажатию на кнопку Сохранить
     *
     * @param UpdateNewsRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(UpdateNewsRequest $request, News $news): RedirectResponse
    {
        $news_ = $news->fill($request->validated())->save();

        if($news_) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.update.success'));
        }
        return back()->withInput()->with('error', __('messages.admin.news.update.error'));
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

        return redirect()->route('admin.news.index')->with('success', __('messages.admin.news.destroy.success'));
    }
}

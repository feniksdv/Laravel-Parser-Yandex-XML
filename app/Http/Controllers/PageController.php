<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    /**
     * Выводит все страницы
     * @return View
     */
    public function index(): view
    {
        $listPage = Page::paginate(
            config('paginate.main.page')
        );
        return view('main.page.index',
            ['listPage' => $listPage]
        );
    }

    /**
     * Выводит конкретную страницу
     *
     * @param Page $page
     * @return View
     */
    public function show(Page $page): view
    {
        return view('main.page.show',
            ['listPage' => $page]
        );
    }
}

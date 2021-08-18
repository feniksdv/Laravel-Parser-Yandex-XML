<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Message;
use App\Models\News;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Контролер одного действия - выводим информацию в дашбоард
     *
     * @param Request $request
     * @return view
     */
    public function __invoke(Request $request) : view
    {
        $objNews =  News::all();
        $objCategory = Category::all();
        $objOrder = Order::all();
        $objMessage = Message::all();

        return view('admin.dashboard.index', [
            'listNews' => count($objNews),
            'listCategories' => count($objCategory),
            'listOrder' => count($objOrder),
            'listMessages' => count($objMessage)
        ]);
    }
}

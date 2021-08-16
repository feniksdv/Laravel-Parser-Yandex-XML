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
        $objNews = new News();
        $objCategory = new Category();
        $objOrder = new Order();
        $objMessage = new Message();

        return view('admin.dashboard.index', [
            'listNews' => count($objNews->getNews()),
            'listCategories' => count($objCategory->getCategories()),
            'listOrder' => count($objOrder->getOrders()),
            'listMessages' => count($objMessage->getMessages())
        ]);
    }
}

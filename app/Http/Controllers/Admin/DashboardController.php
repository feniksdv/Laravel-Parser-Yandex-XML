<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('admin.dashboard.index', [
            'listNews' => count($this->getNewsList()),
            'listCategories' => count($this->getCategoryList()),
            'listOrder' => count($this->getOrder()),
            'listMessages' => count($this->getMessages())
        ]);
    }
}

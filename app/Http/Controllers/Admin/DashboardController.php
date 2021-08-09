<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $listNews = count($this->getNewsList());
        $listCategories = count($this->getCategoryList());
        return view('admin.dashboard.index', ['listNews' => $listNews, 'listCategories' => $listCategories]);
    }
}

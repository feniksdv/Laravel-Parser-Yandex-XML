<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\News;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Вывести список всех пользователей
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $listUsers = User::with('customer')->paginate(
            config('paginate.admin.user')
        );
        return view('admin.user.index', ['listUsers' => $listUsers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Обновить настройки у выбранного пользователя
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user): RedirectResponse
    {
        $isAdmin = Customer::where('user_id','=', $user->id)->first();
        Customer::where('user_id','=', $user->id)->update(['is_admin' => !$isAdmin->is_admin]);
        if(!$isAdmin->is_admin){
            return redirect()->route('admin.user.index')->with('success', __('messages.admin.user.edit.on'));
        }
        return redirect()->route('admin.user.index')->with('error', __('messages.admin.user.edit.off'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit()
    {
        //
    }

    /**
     *
     */
    public function update()
    {
        //
     }

    /**
     * Тихое удаление, поставить выбранному пользователю статус delete
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(Request $request, User $user): RedirectResponse
    {
        Customer::where('user_id','=', $user->id)->update(['status'=> 'delete']);

        return redirect()->route('admin.user.index')->with('success', __('messages.admin.user.destroy.success'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Message;
use App\Models\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


class OrderController extends Controller
{
    /**
     * Выводит весь список заказов
     *
     * @param Request $request
     * @param Order $order
     * @return View
     */
    public function index(Request $request, Order $order ): View
    {
//        $listOrders = Order::with(['user','customers'])->paginate(
        $listOrders = Order::paginate(
            config('paginate.admin.order')
        );

        return view('admin.order.index', [
            'listOrders'=>$listOrders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        //Сохраняем данные в файл, если тел. такой же то дописываем в конец файла
        Storage::append(
            "/public/{$request->input('tel')}.log",
            $request->input('name')."\n".
            $request->input('tel')."\n".
            $request->input('email')."\n".
            $request->input('massage')."\n
            *********************************************************************"
        );
        return response($request->input('name').", Заказ обрабатывается, ожидайте!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Тихое удаление, не удаляем из БД данные а меня статус на delete
     *
     * @param Request $request
     * @param Order $order
     * @return RedirectResponse
     */
    public function destroy(Request $request, Order $order): RedirectResponse
    {
        $order->where('id','=', $order->id)->update(['status'=> 'delete']);

        return redirect()->route('admin.order.index')->with('success', 'Заказ удаленно!');
    }
}

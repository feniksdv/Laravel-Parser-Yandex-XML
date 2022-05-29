<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


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
        $listOrders = Order::with(['users','customers'])->paginate(
            config('paginate.admin.order')
        );

        return view('admin.order.index', [
            'listOrders'=>$listOrders
        ]);
    }

    /**
     * Форма для создания нового заказ в админке этого не делается,
     * заказа создается пользователем на фронте http://localhost/order
     */
    public function create()
    {
        //
    }

    public function store()
    {
       //
    }

    /**
     * Отображает выбранный заказ
     *
     * @param Order $order
     * @return View
     */
    public function show(Order $order): View
    {
        return view('admin.order.show', [
            'listOrder' => $order
        ]);
    }

    /**
     * Отображает форму для редактирования выбранного заказа
     *
     * @param Order $order
     * @return View
     */
    public function edit(Order $order): View
    {
        return view('admin.order.edit', [
            'listOrder' => $order,
        ]);
    }

    /**
     * Обновляет данные в БД по окончанию редактирования заказа
     *
     * @param UpdateOrderRequest $request
     * @param Order $order
     * @return RedirectResponse
     */
    public function update(UpdateOrderRequest $request, Order $order): RedirectResponse
    {
        $order_ = $order->fill($request->validated())->save();

        if($order_) {
            return redirect()->route('admin.order.index')
                ->with('success', __('messages.admin.order.update.success'));
        }
        return back()->withInput()->with('error', __('messages.admin.order.update.error'));
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

        return redirect()->route('admin.order.index')->with('success', __('messages.admin.order.destroy.success'));
    }
}

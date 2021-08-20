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
        $listOrders = Order::with(['users','customers'])->paginate(
            config('paginate.admin.order')
        );

        return view('admin.order.index', [
            'listOrders'=>$listOrders
        ]);
    }

    /**
     * Форма для создания нового заказ
     *
     * @return Response
     */
    public function create()
    {
        //в админке это не нужно, для этого есть форма http://localhost/order
    }

    /**
     * Сохраняет в БД отправленные данные через форму http://localhost/order
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
     * @param Request $request
     * @param Order $order
     * @return RedirectResponse
     */
    public function update(Request $request, Order $order): RedirectResponse
    {
        $request->validate([
            'content' => ['required', 'string']
        ]);

        $order = $order->fill(
            $request->only([
                'status',
                'content',
            ])
        )->save();

        if($order) {
            return redirect()->route('admin.order.index')
                ->with('success', 'Заказ успешно сохранен');
        }
        return back()->withInput()->with('error', 'Не удалось сохранить заказ');
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

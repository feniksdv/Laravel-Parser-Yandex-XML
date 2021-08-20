<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Message;
use App\Models\Order;
use App\Models\User;
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
        try {
            $request->validate([
                'name'      => ['required', 'string'],
                'email'     => ['required', 'email'],
                'tel'     => ['required', 'integer'],
                'massage'   => ['required', 'string']
            ]);

            //Найдем такого пользователя в БД
            $findUser = User::firstWhere('email', $request->input('email'));

            //если пользователь нашелся то добавляем запись в БД
            if($findUser){
                Order::create([
                    'user_id' => $findUser->id,
                    'content' => $request->input('massage'),
                    'status_id' => 5,
                ]);
                return response("Сообщение отправлено!", 200);
            }

            //Если пользователя нет, то создадим его и добавим его сообщение
            $faker = \Faker\Factory::create('ru_RU');
            $userAdd = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $faker->password(6,20)
            ]);

            Order::create([
                'user_id' => $userAdd->id,
                'content' => $request->input('massage'),
                'status_id' => 5,
            ]);
            return response("Сообщение отправлено!", 200);
        }
        catch (Exception $e) {
            response ("Сообщение не отправлено!");
        }
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

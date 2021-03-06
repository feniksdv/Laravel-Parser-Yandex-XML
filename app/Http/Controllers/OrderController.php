<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Отображает main.order.blade (форма Заказа связи)
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view('main.order');
    }

    /**
     * Получает данные от main.order.blade (форма Заказа) и сохраняет их в БД
     *
     * @param StoreOrderRequest $request
     * @return RedirectResponse
     */
    public function store(StoreOrderRequest $request): RedirectResponse
    {
        //Найдем такого пользователя в БД
        $findUser = User::firstWhere('email', $request->input('email'));

        //если пользователь нашелся то добавляем запись в БД
        if($findUser){
            Order::create([
                'user_id' => $findUser->id,
                'content' => $request->input('massage'),
                'status_id' => 5,
            ]);
            return redirect()->route('order')->with("success",__('messages.front.order.store.success'));
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
        return redirect()->route('order')->with("success",__('messages.front.order.store.success'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Message;
use App\Models\User;
use Exception;
use Faker\Factory;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class ContactController extends Controller
{
    /**
     * Отображает main.contact.blade (форма обратной связи)
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view('main.contact');
    }

    /**
     * Получает данные от main.contact.blade (форма обратной связи) и сохраняет их в БД
     *
     * @param StoreContactRequest $request
     * @return RedirectResponse
     */
    public function store(StoreContactRequest $request): RedirectResponse
    {
        //Найдем такого пользователя в БД
        $findUser = User::firstWhere('email', $request->input('email'));

        //если пользователь нашелся то добавляем запись в БД
        if($findUser){
            Message::create([
                'user_id' => $findUser->id,
                'content' => $request->input('massage'),
                'status_id' => 5,
            ]);
            return redirect()->route('contact')->with("success",__('messages.front.contact.store.success'));
        }
        //Если пользователя нет, то создадим его и добавим его сообщение
        $faker = Factory::create('ru_RU');
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $faker->password(6, 20)
        ]);

        Message::create([
            'user_id' => 2,
            'content' => $request->input('massage'),
            'status_id' => 5,
        ]);
        return redirect()->route('contact')->with("success",__('messages.front.contact.store.success'));
    }
}

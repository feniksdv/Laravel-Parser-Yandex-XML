<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Exception;
use Faker\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    /**
     * Выводит список всех сообщений
     *
     * @param Request $request
     * @param Message $message
     * @return view
     */
    public function index(Request $request, Message $message): View
    {
        $listMessage = Message::with(['user','customers'])->paginate(
            config('paginate.admin.message')
        );

        return view('admin.contact.index', [
            'listMessages' => $listMessage
        ]);
    }

    /**
     * Показывает форму по созданию нового сообщения
     *
     * @param Message $message
     * @return View
     */
    public function create(Message $message): view
    {
        //Зачем админу это, это делается через форму http://localhost/contact
    }

    /**
     * Сохраняем в БД отправленные данные через форму контактов http://localhost/contact
     *
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function store(Request $request): Response
    {
        try {
            $request->validate([
                'name'      => ['required', 'string'],
                'email'     => ['required', 'email'],
                'massage'   => ['required', 'string']
            ]);

            //Найдем такого пользователя в БД
            $findUser = User::firstWhere('email', $request->input('email'));

            //если пользователь нашелся то добавляем запись в БД
            if($findUser){
                Message::create([
                    'user_id' => $findUser->id,
                    'content' => $request->input('massage'),
                    'status_id' => 5,
                ]);
                return response("Сообщение отправлено!", 200);
            }

            //Если пользователя нет, то создадим его и добавим его сообщение
            $faker = Factory::create('ru_RU');
            $userAdd = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $faker->password(6,20)
            ]);

            Message::create([
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
     * Показать выбранное сообщение
     *
     * @param Request $request
     * @param Message $contact
     * @return View
     */
    public function show(Request $request, Message $contact): view
    {
        return view('admin.contact.show', [
            'listMessage' => $contact
        ]);
    }

    /**
     * Показать форму дял редактирования выбранного сообщения
     *
     * @param Request $request
     * @param Message $contact
     * @return View
     */
    public function edit(Request $request, Message $contact): view
    {
        return view('admin.contact.edit', [
            'listContact' => $contact,
        ]);
    }

    /**
     * Обновляет данные в БД через редактирование в админке
     *
     * @param Request $request
     * @param Message $contact
     * @return RedirectResponse
     */
    public function update(Request $request, Message $contact): RedirectResponse
    {
        $request->validate([
            'content' => ['required', 'string']
        ]);

        $contact = $contact->fill(
            $request->only([
                'status',
                'content',
            ])
        )->save();

        if($contact) {
            return redirect()->route('admin.contact.index')
                ->with('success', 'Сообщение успешно сохранено');
        }
        return back()->withInput()->with('error', 'Не удалось сохранить сообщение');
    }

    /**
     * Тихое удаление, не удаляем из БД данные а меня статус на delete
     *
     * @param Message $contact
     * @return RedirectResponse
     */
    public function destroy(Message $contact): RedirectResponse
    {
        $contact->where('id','=', $contact->id)->update(['status'=> 'delete']);

        return redirect()->route('admin.contact.index')->with('success', 'Сообщение удаленно!');
    }
}

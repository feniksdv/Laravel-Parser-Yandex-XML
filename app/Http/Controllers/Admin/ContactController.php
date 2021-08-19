<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Message;
use App\Models\Status;
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
     * Показывает форму по созданию новой категории
     *
     * @param Message $message
     * @return View
     */
    public function create(Message $message): view
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
        //Сохраняем в БД отправленные данные через форму контактов
        return response($request->input('name').", сообщение отправлено!");
    }

    /**
     * Показать выбранное сообщение
     *
     * @param Message $message
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
     * Update the specified resource in storage.
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

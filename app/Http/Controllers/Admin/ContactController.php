<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreContactRequest;
use App\Http\Requests\Admin\UpdateContactRequest;
use App\Models\Message;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
     * Новое сообщение создается не в админки, а на фронте http://localhost/contact пользователем
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
     * @param UpdateContactRequest $request
     * @param Message $contact
     * @return RedirectResponse
     */
    public function update(UpdateContactRequest $request, Message $contact): RedirectResponse
    {
        $contact_ = $contact->fill($request->validated())->save();

        if($contact_) {
            return redirect()->route('admin.contact.index')
                ->with('success', __('messages.admin.contact.update.success'));
        }
        return back()->withInput()->with('error', __('messages.admin.contact.update.error'));
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

        return redirect()->route('admin.contact.index')->with('success', __('messages.admin.contact.destroy.success'));
    }
}

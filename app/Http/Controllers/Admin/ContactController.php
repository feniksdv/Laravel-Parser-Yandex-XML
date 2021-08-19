<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Contracts\View\View;
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

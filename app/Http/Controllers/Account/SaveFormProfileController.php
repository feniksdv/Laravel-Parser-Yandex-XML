<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\FormProfileRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class SaveFormProfileController extends Controller
{
    /**
     * Обновляем БД User and Customers через форму
     *
     * @param FormProfileRequest $request
     * @param User $profile
     * @return RedirectResponse
     */
    public function __invoke(FormProfileRequest $request, User $profile): RedirectResponse
    {

        $editUser_ = $profile->fill($request->validated())->save();

        if($editUser_) {
            Customer::where('user_id',$profile->id)
                ->update([
                'tel' => $request->tel,
                'telegram' => $request->telegram,

            ]);
            return redirect()->route('account')
                ->with('success', __('messages.admin.account.update.success'));
        }
        return back()->withInput()->with('error', __('messages.admin.account.update.error'));

    }
}

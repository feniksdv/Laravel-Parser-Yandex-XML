<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\FormPasswordRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class SaveFormPasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param FormPasswordRequest $request
     * @param User $password
     * @return RedirectResponse
     */
    public function __invoke(FormPasswordRequest $request, User $password): RedirectResponse
    {
        $UserPassword = auth()->user()->password;
        $passwordOld = $request->input('password-old');

        if(!Hash::check($passwordOld,$UserPassword)) {
            return back()->withInput()->with('error', __('messages.admin.account.update.failed'));
        }

        $editUser_ = $password->update(['password' => Hash::make($request->input('password'))]);

        if($editUser_) {
            return redirect()->route('account')
                ->with('success', __('messages.admin.account.update.success'));
        }
        return back()->withInput()->with('error', __('messages.admin.account.update.error'));
    }
}

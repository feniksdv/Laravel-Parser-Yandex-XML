<?php

namespace App\Http\Controllers;

use App\Contracts\Social;
use App\Http\Requests\Account\SocialServiceUpdateUserRequest;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function init(string $socialAll)
    {
        return Socialite::driver($socialAll)->redirect();
    }

    public function callback(Social $social, string $socialAll, SocialServiceUpdateUserRequest $request)
    {
        $validation = $request->validated();
        return redirect($social->saveUser($validation, Socialite::driver($socialAll)->user()));
    }
}

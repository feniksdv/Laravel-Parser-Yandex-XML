<?php

namespace App\Http\Controllers;

use App\Contracts\Social;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function init(string $socialAll)
    {
        return Socialite::driver($socialAll)->redirect();
    }

    public function callback(Social $social, string $socialAll)
    {
        return redirect($social->saveUser(Socialite::driver($socialAll)->user()));
    }
}

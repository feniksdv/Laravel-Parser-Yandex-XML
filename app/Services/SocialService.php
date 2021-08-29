<?php

namespace App\Services;

use App\Contracts\Social;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User;
use \App\Models\User as Model;

class SocialService implements Social
{
    /**
     * Обновляем найденного или создаем нового пользователя
     *
     * @param User $user
     * @return string
     */
    public function saveUser(User $user): string
    {
        $currentUser = Model::where('email', $user->getEmail())->with('customer')->first();

        if($currentUser) {
            $currentUser->name = $user->getName();
            $currentUser->save();

            Customer::where('user_id',$currentUser->customer[0]->user_id)->update([
                'avatar' => $user->getAvatar()
            ]);

            \Auth::loginUsingId($currentUser->id);

            return route( 'account');
        } else {

            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

            $userId = Model::create([
                'name'      => $user->getName(),
                'email'     => $user->getEmail(),
                'password'  => Hash::make(substr(str_shuffle($chars), 0, 8)),
                'email_verified_at' => date('Y-m-d H:i:s'),
            ]);

            Customer::create([
                'user_id' => $userId->id,
                'avatar'  => $user->getAvatar(),
            ]);

            \Auth::loginUsingId($userId->id);

            return route( 'account');
        }
    }
}

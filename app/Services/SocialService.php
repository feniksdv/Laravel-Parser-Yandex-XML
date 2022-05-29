<?php

namespace App\Services;

use App\Contracts\Social;
use App\Events\UserSendMailEvent;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User;
use \App\Models\User as Model;

class SocialService implements Social
{
    /**
     * Обновляем найденного или создаем нового пользователя
     *
     * @param $validation
     * @param User $user
     * @return string
     */
    public function saveUser($validation, User $user): string
    {
        //Почему я получаю пустой массив?
//        dd($validation);
        $currentUser = Model::where('email', $user->getEmail())->with('customer')->first();

        if($currentUser) {
            $currentUser->name = $user->getName();
            $currentUser->save();

            Customer::where('user_id',$currentUser->customer[0]->user_id)->update([
                'avatar' => $user->getAvatar()
            ]);

            \Auth::loginUsingId($currentUser->id);

            return route( 'account');
        }

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $passwordUserSocialNew = substr(str_shuffle($chars), 0, 8);

        $userId = Model::create([
            'name'      => $user->getName(),
            'email'     => $user->getEmail(),
            'password'  => Hash::make($passwordUserSocialNew),
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

        Customer::create([
            'user_id' => $userId->id,
            'avatar'  => $user->getAvatar(),
        ]);

        \Auth::loginUsingId($userId->id);

        //Send Email Password
        event(new UserSendMailEvent($passwordUserSocialNew, $user->getEmail()));

        return route( 'account');
    }
}

<?php

namespace App\Listeners;

use App\Mail\OrderShipped;
use App\Models\User;
use App\Services\SocialService;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Mail\Mailer;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserSendEmailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if(isset($event->userEmail)){
            Mail::to($event->userEmail)->send(new OrderShipped($event->passwordUserSocialNew));
        }
    }
}

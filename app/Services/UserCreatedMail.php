<?php

namespace App\Services;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $user;

    public function __construct(array $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Ваш аккаунт создан на платформе')
                    ->markdown('email.user_created')
                    ->with(['user' => $this->user]);
    }
}

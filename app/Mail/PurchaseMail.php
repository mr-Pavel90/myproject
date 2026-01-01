<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\NutritionItem;

class PurchaseMail extends Mailable
{
     use Queueable, SerializesModels;

    public function __construct(public NutritionItem $item) {}

    public function build()
    {
        return $this
            ->subject('Your purchase')
            ->view('email.purchase');
    }
}
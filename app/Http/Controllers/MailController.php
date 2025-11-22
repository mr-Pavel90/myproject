<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Services\MailService;

class MailController extends Controller
{
 public function send(Request $request)
    {
        $request->validate([
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        $data = [
            'messageBody' => $request->message,
        ];

        try {
            Mail::to($request->email)->send(new MailService($data));

            // ✅ sucess send
            return redirect()
                ->back()
                ->with('success', '✅ massage successfully sent!');
        } catch (\Exception $e) {
            // ⚠️ bug to send
            return redirect()
                ->back()
                ->with('error', '❌ bug to send: ' . $e->getMessage());
        }
    }
}

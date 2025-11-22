<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\MailService;
use App\Services\UserCreatedMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        try {
                 Mail::to($user->email)->send(
                    new UserCreatedMail($user->toArray())
                );

                // ✅ sucess send
                return redirect()
                    ->back()
                    ->with('success', '✅ user successfully created!');
            } catch (\Exception $e) {
                // ⚠️ bug to send
                return redirect()
                    ->back()
                    ->with('error', '❌ bug to send mail: ' . $e->getMessage());
        }
    }
}

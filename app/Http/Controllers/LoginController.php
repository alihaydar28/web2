<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('email', $googleUser->email)->first();

        if ($user) {
            Auth::login($user);
        } else {
            $nameParts = explode(' ', $googleUser->user['name'] ?? '');

            $user = User::create([
                'firstname' => $nameParts[0] ?? '',
                'lastname' => $nameParts[1] ?? '',
                'email' => $googleUser->email,
                'password' => bcrypt(Str::random(16)),
                'role_id' => 1,
            ]);

            Auth::login($user);
        }

        return redirect()->route('Teacher.index');
    }



}

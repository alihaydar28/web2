<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    // logout User
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','you have been logged out!');
    }

    // show Login form
    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request) {


        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $user = auth()->user();


            // Check if the user has roleId of 2 (student role)
            if ($user->role_id == 2) {

                $request->session()->regenerate();
                return redirect(route('dashboard'))->with('message', 'You are now logged in as a student!');
            }


            // If not a student, log the user out
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('message', 'You are not authorized as a student. You have been logged out.');

        }
        return back()->withErrors(['password' => 'Invalid Credentials'])->onlyInput('email');
    }



}

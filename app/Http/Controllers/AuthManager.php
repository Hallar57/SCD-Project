<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthManager extends Controller
{

    function registrationPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|max:255',
        ]);

        $data = $request->all();

        $user = User::create($data);
        if (!$user) {
        return redirect(route('registration'))->with('error', 'Registration failed');
        }
        return redirect(route('login'))->with('success', 'Registration successful');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            //'g-recaptcha-response' => 'required|captcha',
        ]);
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.home');
            }
            return redirect()->route('home');
        }
        return redirect(route('login'))->with("error","Login failed");
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'))->with("success","Logged out successfully");
    }
}

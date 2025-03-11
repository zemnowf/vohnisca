<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        return view('register');
    }

    public function login(Request $request)
    {
        return view('login');
    }

    public function completeRegister(Request $request)
    {
        User::create($request->only('email', 'password', 'name'));
        return redirect('login');
    }

    public function authenticate(Request $request)
    {
        $arr = $request->only('email', 'password');
        Auth::attempt($arr);
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}

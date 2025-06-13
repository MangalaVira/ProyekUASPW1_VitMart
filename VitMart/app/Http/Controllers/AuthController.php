<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function login()
    {
        $user = Auth::user();

        if ($user) {
            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            } else if ($user->level == 'User') {
                return redirect()->intended('User');
            }
        }

        return view('login');
    }

    function do_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::User();

            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            } else if ($user->level == 'User') {
                return redirect()->intended('User');
            }

            return redirect()->intended('/');
        }

        return redirect('login')
            ->withErrors([
                'failed' => 'User tidak ditemukan atau password yang anda masukkan salah'
            ])
            ->withInput();
    }

    function showLogin()
    {
        return view('login');
    }

    function register()
    {
        return view("register");
    }

    function do_register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8'
            ]
        );

        if ($validator->fails()) {
            return redirect("register")
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = 'user';
        $user->save();

        return redirect('login');
    }

    function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}

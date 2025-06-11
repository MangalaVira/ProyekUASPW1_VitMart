<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
{
    if ($user->role == 'admin') {
        return redirect('/admin');
    } elseif ($user->role == 'user') {
        return redirect('/user');
    }

    return redirect('/'); // fallback jika tidak ada role cocok
}

}

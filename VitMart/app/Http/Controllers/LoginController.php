<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
{
    if ($user->level == 'admin') {
        return redirect('/admin');
    } elseif ($user->level == 'User') {
        return redirect('/User');
    }

    return redirect('/');
}

}

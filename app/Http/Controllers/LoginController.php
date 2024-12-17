<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $username = User::query()->where('username', $request->input("username"))->first();
        $password = User::query()->where('password', $request->input("password"))->first();
        if ($username && $password) {
            auth()->loginUsingId($username->id);
            return redirect('/users');
        } else {
            return redirect('/login')->with('error', 'کاربری با این نام کاربری وجود ندارد');
        }

    }
}

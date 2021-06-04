<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserAuthController extends Controller
{
    function login()
    {
        return view('auth.login');
    }

    function register()

    {
        return view('auth.register');
    }

    // function check(Request $request)
    // {
    //     // return $request->input();
    //     $request->validate([
    //         'name' => 'required|name',
    //         'email' => 'required|email',
    //         'google_id' => 'required|id',
    //         'username' => 'required|name',
    //         'password' => 'required|min:4|max:12'
    //     ]);

    //     $user = User::where('username', '=', $request->username)->first();
    //     if ($user) {
    //         if (Hash::check($request->password, $user->password)) {

    //             $request->session()->put('LoggedUser', $user->id);
    //             return redirect('/home');
    //         } else {
    //             return back()->with('fail', 'Password Salah');
    //         }
    //     } else {
    //         return back()->with('fail', 'Username Salah');
    //     }
    // }
}

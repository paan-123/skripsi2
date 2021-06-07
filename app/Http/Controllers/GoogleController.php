<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {


        try {
            $user = Socialite::driver('google')->user();
            // dd($user);

            $finduser = User::where('google_id', $user->getId())->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('home');
            } else {
                $newUser = User::create([
                    'google_id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => bcrypt('12345678')
                ]);

                Auth::login($newUser);
                return redirect()->intended('home');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

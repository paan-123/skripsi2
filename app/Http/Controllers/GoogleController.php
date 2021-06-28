<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
        // dd("lalalla");

        try {
            $user = Socialite::driver('google')->user();
            // dd($user);

            $finduser = User::where('google_id', $user->getId())->first();
            if ($finduser) {
                Auth::login($finduser);
                switch (Auth::user()->role) {
                    case Role::ADMIN:
                        return redirect()->to('/home');
                        break;
                    case Role::KRT:
                        return redirect()->to('/kt');
                        break;
                    case Role::PKK:
                        return redirect()->to('/pkk');
                        break;
                    case Role::RW:
                        return redirect()->to('/rw');
                        break;
                }
                // return redirect()->intended('home');




            } else {
                // $newUser = User::create([
                //     'google_id' => $user->id,
                //     'name' => $user->name,
                //     'email' => $user->email,
                //     'password' => bcrypt('12345678'),
                //     'role' => '2',
                // ]);

                // Auth::login($newUser);
                // return redirect()->intended('home');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

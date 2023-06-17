<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;



class GoogleController extends Controller
{
    public function handleGoogleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        // try {
        $user = Socialite::driver('google')->user();
        $userExisted = User::where('google_id', $user->id)->first();

        if ($userExisted) {
            Auth::login($userExisted);
            return redirect()->intended('/');
        } else {
            $newUser = User::create([
                'fullName' => $user->name,
                'email' => $user->email,
                'password' => Hash::make($user->email),
                'google_id' => $user->id,
            ]);
            Auth::login($newUser);
            return redirect()->intended('/');
        }
        // } catch (\Exception $e) {
        //     // Handle the exception, log the error, or display an error message
        //     // For example:
        //     return redirect()->route('login')->with('error', 'Failed to authenticate with Google.');
        // }
    }
}

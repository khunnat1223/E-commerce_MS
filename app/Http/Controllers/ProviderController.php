<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider){
         return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){
        try {
          $socialUser = Socialite::driver($provider)->user();
          $user= User::updateOrCreate([
           'provider_id' => $socialUser->id,
           'provider'=>$provider
            ],
             [
           'name' => $socialUser->name,
           'email' => $socialUser->email,
           'provider_token' => $socialUser->token,
           'email_verified_at' => now()
          ]);
        Auth::login($user);

        return redirect('/dashboard');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('success','This email is used, Login different email. hhhh');
    }
 }
}

<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class DiscordController extends Controller
{
    /**
     * Redirect the user to the Discord authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('discord')->redirect();
    }

    /**
     * Obtain the user information from Discord.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $dUser = Socialite::driver('discord')->user();
        
        if ($dUser->email) {
            $user = User::where('email', $dUser->email)->first();
            if ($user) {
                Auth::login($user);
                return redirect()->route('buddy');
            } else {
                $firstTimeDiscordMsg = 'Local registration required for the first time discord login!';
                return redirect()->route('register')->with(['firstTimeDiscordMsg'=>$firstTimeDiscordMsg]);
            }
        }
        return redirect()->route('home');
    }
}

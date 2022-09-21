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
        $discordID = $dUser->id;
       // dd($dUser);
        // dd($dUser);
        /*
        ^ Laravel\Socialite\Two\User {#1315 ▼
          +id: "945677715401474128"
          +nickname: null
          +name: "Eudora Zheng"
          +email: "eudoraneves@outlook.com"
          +avatar: "https://cdn.discordapp.com/avatars/945677715401474128/cabe02e24c2a66ef74c07fd1edebf12c.png"
          +user: array:14 [▶]
          +token: "rE2C0zF87Bk4vXhdQl7tOGLAxmTlVf"
          +refreshToken: "X4VMiYtjqP8kvax4QCQxihu80sKnd5"
          +expiresIn: 604800
          +approvedScopes: array:2 [▶]}
         */
        if ($dUser->email) {
            $user = User::where('email', $dUser->email)->first();
            if ($user) {
                $user->discord_id = $dUser->id;
                $user->save();
                Auth::login($user);
                return view('layouts.home');
            } else {
                $firstTimeDiscordMsg = 'Local registration required for the first time discord login!';
                return redirect()->route('register')->with(['firstTimeDiscordMsg' => $firstTimeDiscordMsg]);
            }
        }
        return redirect()->route('home');
    }
}

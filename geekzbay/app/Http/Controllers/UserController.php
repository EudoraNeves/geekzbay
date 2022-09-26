<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserBuddies;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class UserController extends Controller
{
    //BUDDIES
    //get: show user's my-buddies list
    public function index_my_buddies()
    {
        if (Auth::check()) {
            $myBuddies = Auth::user()->buddies;
            return view('layouts.my-buddies', ['myBuddies' => $myBuddies]);
        } else {
            return view('auth.requireLogin');
        }
    }

    //get: find random buddy
    public function show_random_buddy(/*$id*/)
    {
        $user = auth()->user();
        //Exclude buddies that's NOT ME and NOT ALREADY MY BUDDIES
        $buddyIds = array_values(array_merge($user->buddies->pluck('id')->toArray(), [$user->id]));
        $randomUser = User::whereNotIn('id', $buddyIds)->inRandomOrder()->first();
        if ($randomUser) {
            return view('layouts.buddy', ['randomBuddy' => $randomUser]);
        } else {
            //if the user already have all other users as buddies
            return view('layouts.buddy', ['noMoreBuddyToFind' => 'Awesome:) You\'ve friended all geeks!']);
        }
    }

    //get: add buddy to user's buddy list
    public function addBuddy($buddy_id)
    {
        $buddy = User::where('id', $buddy_id)->first();
        //if user is logged in
        if (Auth::check()) {
            //if the random buddy is already inside the user's buddy list
            if (UserBuddies::where([['user_id', auth()->user()->id], ['buddy_id', $buddy_id]])->first()) {
                return view('layouts.buddy', ['buddyAdddedSuccessfully' => "You've added $buddy->name successfully!"]);
            } else {
                //if the random buddy is not in the user's buddy list
                UserBuddies::create([
                    'user_id' => Auth::user()->id,
                    'buddy_id' => $buddy_id
                ]);
                return view('layouts.buddy', ['buddyAdddedSuccessfully' => "You've added $buddy->name successfully!"]);
            }
        } else {
            //if user is not logged in
            return view('auth.requireLogin');
        }
    }



    //MY PROFILE
    //get: show my profile
    public function showMyProfile()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('layouts.my-profile', ['user' => $user]);
        } else {
            return view('auth.requireLogin');
        }
    }
    //get: show the form to edit my profile
    public function editMyProfile()
    {
        $user = Auth::user();
        return view('layouts.my-profile_form', ['user' => $user]);
    }

    //post: update my profile
    public function updateMyProfile(UpdateProfileRequest $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        //check if new profile picture is added
        if ($request->file('profilePicture') != null) {
            $user->profilePicture = base64_encode(file_get_contents($request->file('profilePicture')->getRealPath()));
        }
        $user->birthDate = $request->birthDate;
        $user->desc = $request->desc;
        $user->save();
        return redirect()->route('my-profile');
    }


    public function destroy($id)
    {
        //
    }

    //post: change password
    public function changePassword(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('my-profile');
    }
}

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_my_buddies()
    {
        if (Auth::check()) {
            $myBuddies = Auth::user()->buddies;
            return view('layouts.my-buddies', ['myBuddies' => $myBuddies]);
        } else {
            return view('auth.requireLogin');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function changePassword(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('my-profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    public function addBuddy($buddy_id)
    {
        $buddy = User::where('id', $buddy_id)->first();
        if (Auth::check()) {
            if (UserBuddies::where([['user_id', auth()->user()->id], ['buddy_id', $buddy_id]])->first()) {
                // do nothing
                return view('layouts.buddy', ['buddyAdddedSuccessfully' => "You've added $buddy->name successfully!"]);
            } else {
                UserBuddies::create([
                    'user_id' => Auth::user()->id,
                    'buddy_id' => $buddy_id
                ]);
                return view('layouts.buddy', ['buddyAdddedSuccessfully' => "You've added $buddy->name successfully!"]);
            }
        } else {
            return view('auth.requireLogin');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMyProfile()
    {
        if (Auth::check()) {
            $user = Auth::user();
            //dd($user);
            return view('layouts.my-profile', ['user' => $user]);
        } else {
            return view('auth.requireLogin');
        }
    }
    public function editMyProfile()
    {
        $user = Auth::user();
        return view('layouts.my-profile_form', ['user' => $user]);
    }
    public function updateMyProfile(UpdateProfileRequest $request)
    {
        //   dd('here');
        // $user = Auth::user();
        $user = User::where('id', auth()->user()->id)->first();

        if ($request->file('profilePicture') != null) {
            $user->profilePicture = base64_encode(file_get_contents($request->file('profilePicture')->getRealPath()));
        }
        $user->birthDate = $request->birthDate;
        $user->desc = $request->desc;
        $user->save();
        return redirect()->route('my-profile');
    }


    public function edit()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('layouts.my-profile_edit', ['user' => $user]);
            // return redirect()->route('my-profile.edit', ['user' => $user]);
        } else {
            return redirect()->route('my-profile');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

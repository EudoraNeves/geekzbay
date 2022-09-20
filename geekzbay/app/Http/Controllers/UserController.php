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
    public function index()
    {
        $myBuddies = Auth::user()->buddies;
        return view('layouts.my-buddies', ['myBuddies' => $myBuddies]);
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
    public function show(/*$id*/)
    {


        // $user = auth()->user();
        // dd($user->buddies);

        // $randomUser = User::all()->random(1)[0];
        $randomUser = User::where('id', '<>', auth()->user()->id)->inRandomOrder()->first();
        // dd($randomUser);
        return view('layouts.buddy', ['randomBuddy' => $randomUser]);
        // return view('layouts.buddy');
    }

    public function addBuddy()
    {
        UserBuddies::create([
            'user_id' => Auth::user()->id,
            'buddy_id' => request()->buddy_id
        ]);
        return $this->index();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMyProfile()
    {
        $user = Auth::user();
        //dd($user);
        return view('layouts.my-profile', ['user' => $user]);
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
        $user = Auth::user();
        return view('layouts.my-profile_edit', ['user' => $user]);

        // return redirect()->route('my-profile.edit', ['user' => $user]);
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

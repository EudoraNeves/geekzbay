<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UsersInMeetups;

class UsersInMeetupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user_id = Auth::id();
        $meetup_id = $request->route('id');


        $errors = [];
        if(empty($user_id) || !is_numeric($user_id)) {
            $errors[] += "User not found";
        } else {
            $user_id = (integer) $user_id;
        }
        if(empty($meetup_id) || !is_numeric($meetup_id)) {
            $errors[] += "Meetup not found";
        } else {
            $meetup_id = (integer) $meetup_id;
        }
        if(empty($request->status) || !(in_array($request->status,["Can't go","Maybe","Going"]))) {
            $errors[] += "Status doesn't fit values";
        }

        if(count($errors)) {
            dd($errors);
            return 'Problem registering';
        }

        $usersInMeetups = UsersInMeetups::updateOrCreate(['user_id' => $user_id, 'meetup_id' => $meetup_id],['status' => $request->status]);
        if($usersInMeetups)
            return redirect('/meetups')->with('success', 'Event registered successfully');
        else
            return 'Problem registering';

        dd($usersInMeetups);



        redirect("/meetups/" . $request->route('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
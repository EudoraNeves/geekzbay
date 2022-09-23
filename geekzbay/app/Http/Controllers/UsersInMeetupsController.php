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
        $request->user_id = Auth::id();
        $request->meetup_id = (integer) $request->route('id');

        $request->validate([
            'user_id' => 'required',
            'meetup_id' => 'required',
            'status' => 'required|in:Can&apos;t go,Maybe,Going'
        ]);

        $usersInMeetups = new UsersInMeetups;
        $usersInMeetups->user_id = $request->user_id;
        $usersInMeetups->meetup_id = $request->meetup_id;
        $usersInMeetups->status = $request->status;

        if($usersInMeetups->save())
            return redirect('meetups', ['id' => $request->meetup_id])->with('success', 'Event registered successfully');
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

<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Location;
use App\Models\Meetup;
use App\Http\Middleware\EnsureUserIsLoggedIn;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MeetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $locations = Location::all();
        $communities = Community::all();
        return view('layouts.meetup', ['locations' => $locations, 'communities' => $communities]);
    }

    public function showMyMeetups() {
        $meetup = Meetup::all();
        return view('layouts.my-meetups', ['meetup' => $meetup]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insert_meetup');
    }

    public function addMeetup()
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
        $request->validate([
            'name' => 'required|min:3|max:50',
            'date' => 'required|date',
            'desc' => 'required|min:3|max:2000',
            'location_id' => 'required',
            'community_id' => 'required'
        ]);

        $meetup = new Meetup;
        $meetup->name = $request->name;
        $meetup->date = $request->date;
        $meetup->desc = $request->desc;
        $meetup->eventadmin_id = Auth::id();
        $meetup->location_id = $request->location_id;
        $meetup->community_id = $request->community_id;

        if($meetup->save())
            return redirect('meetup')->with('success', 'Event registered successfully');
        else
            return 'Problem registering';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meetup = Meetup::find($id);
        $location = Location::find($meetup->location_id);
        $community = Community::find($meetup->community_id);

        return view('layouts.meetup-details', ['meetup' => $meetup, 'location' => $location, 'community' => $community]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $meetup = Meetup::find($id);

        return view('update-event', ['event' => $meetup]);
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
        $meetup = Meetup::destroy($id);


        if ($meetup) {
            return back()->with('success', 'Event was deleted');
        } else

            return back()->with('error', 'Deleting didnt worked.');
    }
}

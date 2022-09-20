<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meetup;
use App\Http\Middleware\EnsureUserIsLoggedIn;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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
        return view('');
        $meetup = Meetup::all();
        return view('layouts.my-meetups', ['meetup' => $meetup]); {

            $event = Meetup::all();
            return view('meetup', ['meetup' => $event]);
        }
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
        if (Auth::check()) {
            Meetup::create([
                'user_id' => Auth::user()->id,
                'buddy_id' => request()->buddy_id
            ]);
            return $this->index();
        } else {
            return view('auth.requireLogin');
        }
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
            'location' => 'required',
        ]);

        $meetup = new Meetup;
        $meetup->name = $meetup->name;
        $meetup->date = $request->date;

        if ($meetup->save())
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
    public function show(/*$id*/)
    {
        //
        return view('layouts.meetup');
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
        $request->validate([
            'name' => 'required|min:3|max:50',
            'date' => 'required|date',
            'location' => 'required'
        ]);

        $meetup = Meetup::find($id);

        $meetup->name = $request->name;
        $meetup->price = $request->price;;

        if ($meetup->save())
            return 'Updated successfully';
        else
            return 'Problem updating';
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

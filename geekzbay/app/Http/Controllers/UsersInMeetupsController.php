<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UsersInMeetups;

class UsersInMeetupsController extends Controller
{
    //my-meetup list
    public function index()
    {
        $myMeetups = UsersInMeetups::select('users_in_meetups.status', 'meetups.id AS meetup_id', 'meetups.name AS meetup_name', 'meetups.date', 'locations.name AS location_name')
        ->join('meetups','meetups.id','=', 'users_in_meetups.meetup_id')
        ->join('locations','meetups.location_id','=','locations.id')
        ->where('users_in_meetups.user_id','=',Auth::id())
        ->get();
        $myGoings = [];
        $myMaybes = [];
        $myNopes = [];
        foreach($myMeetups as $meetup) {
            switch($meetup->status) {
                case 'Going':
                    $myGoings[] = $meetup;
                    break;
                case 'Maybe':
                    $myMaybes[] = $meetup;
                    break;
                default:
                    $myNopes[] = $meetup;
                    break;
            }
        }

        return view('layouts.my-meetups', ['myGoings' => $myGoings, 'myMaybes' => $myMaybes, 'myNopes' => $myNopes]);
    }

    public function create()
    {
        //
    }

    //add user to a meetup
    public function store(Request $request)
    {
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
            return redirect('/meetups/'.$meetup_id)->with('success', 'Event registered successfully');
        else
            return 'Problem registering';

        dd($usersInMeetups);



        redirect("/meetups/" . $request->route('id'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

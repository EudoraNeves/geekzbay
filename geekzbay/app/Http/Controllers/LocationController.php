<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $addresses = DB::select(DB::raw('SELECT address_city, COUNT(*) as locationSum FROM locations GROUP BY address_city'));
        return view('layouts.locations', ['addresses' => $addresses, 'user' => auth()->user()]);
    }
    public function index_my_locations()
    {
        $user = User::with('locations')->where('id', Auth::user()->id)->first();
        $my_locations = $user->locations()->get();
        return view('layouts.my-locations', ['my_locations' => $my_locations]);
    }

    public function add_to_my_locations(Request $request)
    {
        $user = User::find($request->user_id);
        $location_id = $request->get('location_id');
        $user = User::with('locations')->where('id', $user->id)->first();
        $user->locations()->attach([$location_id]);
        return response()->json(['success' => true]);
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
    public function show($id)
    {
        //
        $locationDetails = Location::find($id);
        return view('layouts.location-details', ['locationDetails' => $locationDetails]);
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

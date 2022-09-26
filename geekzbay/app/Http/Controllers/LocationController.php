<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    //list: name of locations and qty of addresses
    public function index()
    {
        $addresses = DB::select(DB::raw('SELECT address_city, COUNT(*) as locationSum FROM locations GROUP BY address_city'));
        return view('layouts.locations', ['addresses' => $addresses, 'user' => auth()->user()]);
    }

    //my-locations list
    public function index_my_locations()
    {
        $user = User::with('locations')->where('id', Auth::user()->id)->first();
        $my_locations = $user->locations()->get();
        return view('layouts.my-locations', ['my_locations' => $my_locations]);
    }

    //<api.php>: route('add_to_my_locations') POST
    public function add_to_my_locations(Request $request)
    {
        $user = User::find($request->user_id);
        $location_id = $request->get('location_id');
        $user = User::with('locations')->where('id', $user->id)->first();
        $user->locations()->attach([$location_id]);
        return response()->json(['success' => true]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
        $locationDetails = Location::find($id);
        return view('layouts.location-details', ['locationDetails' => $locationDetails]);
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

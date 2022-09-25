<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_community()
    {
        return view('layouts.community');
    }
    public function index_myCommunities($request)
    {
        $user = User::find($request->user_id);
        $community_id = $request->get('community_id');
        $user = User::with('communities')->where('id', $user->id)->first();
        $myCommunities = $user->communities()->get();
    }
    public function getExistedCommunities($user_id)
    {
        $user = User::find($user_id);
        $user = User::with('communities')->where('id', $user->id)->first();
        $myCommunities = $user->communities()->get();
        return response()->json(['myCommunities'=> $myCommunities]);
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
    public function checkIfExists_in_my_communities(Request $request)
    {
        $user = User::find($request->user_id);
        $community_id = $request->get('community_id');
        $user = User::with('communities')->where('id', $user->id)->first();
        $isExists = $user->communities()->where('community_id', $community_id)->exists();
        if ($isExists) {
            return response()->json(['exsits' => true]);
        } else {
            return response()->json(['exsits' => false]);
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
        //
    }

    public function add_to_my_communities(Request $request)
    {
        $user = User::find($request->user_id);
        $community_id = $request->get('community_id');
        $user = User::with('communities')->where('id', $user->id)->first();
        $user->communities()->attach([$community_id]);
        // DB::table('users_in_communities')->insert([
        //     'user_id'=>$request->user_id,
        //     'community_id'=>$request->community_id
        // ]);
        return response()->json(['success' => true]);
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
        $categories = DB::table('categories')->select('name', 'id')->get();
        return view('layouts.community', ['categories' => $categories]);
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
    public function remove_from_my_communities(Request $request)
    {
        $user = User::find($request->user_id);
        $community_id = $request->get('community_id');
        $user = User::with('communities')->where('id', $user->id)->first();
        $user->communities()->detach([$community_id]);
        // DB::table('users_in_communities')->insert([
        //     'user_id'=>$request->user_id,
        //     'community_id'=>$request->community_id
        // ]);
        return response()->json(['success' => true]);
    }
}

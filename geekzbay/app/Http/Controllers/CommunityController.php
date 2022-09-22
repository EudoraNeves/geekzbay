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
    public function index_myCommunities()
    {
        $user = User::with('communities')->where('id', Auth::user()->id)->first();
        $user->communities()->attach([2]);
        return view('layouts.my-communities');
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
        //
        $categories = DB::table('categories')->select('name', 'id')->get();
        $startupPage = `
            <h1> <i>Trending Communities</i></h1>
            <h2>Here you can find the community you are interested</h2>
        `;

        foreach($categories as $category) {
            $startupPage .= <<< HEREDOC
                <div="category-header">$category->name</div>
                HEREDOC;

                $data = DB::table('communities')->where('category_id','=',$category->id)->limit(5)->get();
                foreach($data as $location) {
                    $trimmedDesc = substr($data->desc,0,200);
                    $startupPage .= <<< HEREDOC
                        <div class="d-flex proj-flex-adapt" id="proj-comcard">

                            <div class="proj-img" width="150px">
                                <img src="asset('Assets/Images/$data->image')" width="150px">
                            </div>

                            <div class="d-flex flex-column" id="proj_card_desc">
                                <div class="proj-name">
                                    $data->name
                                </div>
                                <div class="proj-categ d-flex flex-row justify-content-between">
                                    <div>Category: <span>$data->category->name</span></div>

                                </div>


                                <div class="proj-desc d-flex flex-column">

                                <div>
                                    <span>Description: </span>
                                    <div>$trimmedDesc</div>
                                </div>
                                <div class="proj-discord d-flex flex-row justify-content-between">

                                    <div class="discord" >
                                        <a href="$data->discordLink" class="btn btn-dark ">
                                            <img src="{{ asset('Discord_icon.svg') }}" height="30px">
                                            Discord
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    HEREDOC;
                }
        }

        dd($startupPage);

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
}

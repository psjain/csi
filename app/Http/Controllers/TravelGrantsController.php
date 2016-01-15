<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Auth;
use App\Http\Controllers\Controller;

class TravelGrantsController extends Controller
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
		return view('frontend.dashboard.travelgrant_user');
    }
	
	/**
     * Show the form for all the grantes user has requested.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewgrant()
    {
		$id = Auth::user()->user()->id; // user id of logged in user
		$travel = DB::table('travelgrants')->where('travelgrants.memid', '=', $id)->get();

        return view('frontend.dashboard.travelGrantMyGrant',compact('travel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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

    public function viewAll()
    {
		
	$id = Auth::user()->user()->id; // user id of logged in user, this only works when a user is logged in.
	$travel = DB::table('travelgrants')->join('travelversions', 'travelversions.grantid', '=', 'travelgrants.id')->where('travelgrants.memid', '=', $id)->get();
        return view('frontend.dashboard.travelGrantListingAll',compact('travel'));
    }

    /**
     * Show the form for editing the exiting requests.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$user_id = Auth::user()->user()->id; // user id of logged in user
		$travel = DB::table('travelgrants')->join('travelroles', 'travelroles.id', '=', 'travelgrants.roleid')->where('travelgrants.memid', '=', $user_id)->where('travelgrants.id','=', $id )->first();

		return view('frontend.dashboard.travelgrant_edit', compact('travel'));
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

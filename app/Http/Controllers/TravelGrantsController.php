<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Auth;
use App\Http\Controllers\Controller;
use App\Travelgrant;
use Input;
use App\Traveldocs;
use App\Travelversion;

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
    public function storedoc($filename)
    {
        $user = Auth::user()->user();
        $grant = DB::table('travelgrants')->where('travelgrants.memid',$user->id )->first();
        $doc= new Traveldocs;
        $doc->grantid = $grant->id;
        $doc->document = 'uploads/travel_grant_proposals/'.$filename;
        $doc->save();

        $ver = new travelversion;
        $ver->grantid = $grant->id;
        $ver->status = 'pending';
        $ver->save();
    }
    public function store(Request $request)
    {
        $user = Auth::user()->user();
        $travelrequest = new Travelgrant;
        $travelrequest->memid = $user->id;
        $travelrequest->eventname = $request->input('travel_event_name');
        $travelrequest->date = $request->input('travel_event_date');
        $travelrequest->venue = $request->input('travel_event_venue');
        $role=($request->input('travel_event_member_role'));
        $travelrole = DB::table('travelroles')->where('travelroles.role', 'like',$role)->first();
        $travelrequest->roleid = $travelrole->id;
        $travelrequest->justification = $request->input('travel_event_request_justification');
        $travelrequest->mode = $request->input('travel_event_mode');
        $travelrequest->grantrequested = $request->input('travel_event_grant_requested');
        $travelrequest->amountgranted= '00';
        $travelrequest->save();


        $filename = $user['id'].'.';
        $filename.= Input::file('travel_event_member_document')->getClientOriginalExtension();
        Input::file('travel_event_member_document')->move(storage_path('uploads/travel_grant_proposals'), $filename);

       $this->storedoc($filename); 
       return redirect('/travelgrantmygrant');       
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

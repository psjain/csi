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
use App\Http\Requests\TravelGrantsRequest;

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
		$travel = DB::table('travelgrants')->join('travelversions', 'travelversions.grantid', '=', 'travelgrants.id')->where('travelgrants.memid', '=', $id)->get();

        return view('frontend.dashboard.travelGrantMyGrant',compact('travel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storedoc($filename,$travelrequest)
    {
        
        $doc= Traveldocs::create([
            'grantid'=>$travelrequest->id,
            'document'=>'uploads/travel_grant_proposals/'.$filename,
            ]);

        $ver = travelversion::create([
            'grantid'=> $travelrequest->id,
            'status'=>'pending',
            'comments'=>null,
            ]);
    }
    public function store(TravelGrantsRequest $request)
    {
        
        $memid = Auth::user()->user()->id;
        $eventname = Input::get('travel_event_name');
        $date = Input::get('travel_event_date');
        $venue = Input::get('travel_event_venue');
        $role=Input::get('travel_event_member_role');
        $travelrole = DB::table('travelroles')->where('travelroles.role', 'like',$role)->first();
        $roleid = $travelrole->id;
        $justification = Input::get('travel_event_request_justification');
        $mode = Input::get('travel_event_mode');
        $grantrequested = Input::get('travel_event_grant_requested');
        $amountgranted= null;
        
        $travelrequest = Travelgrant::create([
                    'memid' => $memid, 
                    'eventname' => $eventname, 
                    'date' => $date, 
                    'venue' => $venue, 
                    'roleid' => $roleid, 
                    'justification' => $justification, 
                    'mode' => $mode, 
                    'grantrequested' => $grantrequested,
                    ]);
        

        $filename = $memid.'.';
        $filename.= Input::file('travel_event_member_document')->getClientOriginalExtension();
        Input::file('travel_event_member_document')->move(storage_path('uploads/travel_grant_proposals'), $filename);

       $this->storedoc($filename,$travelrequest); 
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
    public function editgrant($id)
    {
		$user = Auth::user()->user()->id; // user id of logged in user
		$travel = DB::table('travelgrants')->where('id','=',$id)->get();
		return view('frontend.dashboard.travelgrant_edit',['travels'=>$travel]);
        //
    }
	
	

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updategrant(Request $request, $id)
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

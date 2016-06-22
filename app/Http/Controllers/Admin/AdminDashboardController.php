<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TravelGrant;
use App\TravelVersion;
use App\TravelRequestStatus;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending = TravelVersion::where('travel_request_status_id',1)->distinct('travel_grant_id')->count();
       

        return view('backend.index',compact('pending'));
    }

    public function travelGrantRequests($value)
    {
        $statuses= TravelRequestStatus::all();       
        $search=0;
        $search_text="";
        $fromDate="";
        $toDate="";
        $rows =  15;         // how many rows for pagination        
        $page =  1;
        if($value==1)
        {
            $travel = TravelVersion::select('travel_grant_id')->where('travel_request_status_id',1)->get();
            $travel=TravelGrant::whereIn('id',$travel)->orderBy('id','desc')->paginate($rows);
            $checkbox_array=[1];

        }
        if($value==2)
        {
            $checkbox_array=[2];        // current page   
            $travel = TravelVersion::select('travel_grant_id')->where('travel_request_status_id',2)->get();
            $travel=TravelGrant::whereIn('id',$travel)->orderBy('id','desc')->paginate($rows);

        }
        if($value==3)
        {
            $checkbox_array=[3];        // current page   
            $travel = TravelVersion::select('travel_grant_id')->where('travel_request_status_id',3)->get();
            $travel=TravelGrant::whereIn('id',$travel)->orderBy('id','desc')->paginate($rows);

        }
        if($value==4) //revised
        {
            $checkbox_array=[4];        // current page   
            $travel = TravelVersion::select('travel_grant_id')->where('travel_request_status_id',4)->get();
            $travel=TravelGrant::whereIn('id',$travel)->orderBy('id','desc')->paginate($rows);

        }
        if($value==5)
        {
            $checkbox_array=array();        // current page   
            $travel = TravelVersion::select('travel_grant_id')->distinct('travel_grant_id')->get();
            $travel=TravelGrant::whereIn('id',$travel)->orderBy('id','desc')->paginate($rows);

        }

                
                  
        return view('backend.travelgrants.adminTravelGrant',compact('travel','page','rows', 'search_text','statuses','checkbox_array','search','fromDate','toDate'));
    
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

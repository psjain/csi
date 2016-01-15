<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class adminTravelGrantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	//	$id = Auth::user()->user()->id; // user id of logged in user, this only works when a user is logged in.
	//	$travel = DB::table('travelgrants')->join('travelversions', 'travelversions.grantid', '=', 'travelgrants.id')->where('travelgrants.memid', '=', $id)->get();
	
		$travel = DB::table('travelgrants')->join('travelversions', 'travelversions.grantid', '=', 'travelgrants.id')->join('individuals', 'individuals.member_id', '=', 'travelgrants.memid')->where('travelversions.status', '=', 'pending')->get();

        return view('backend.travelgrants.adminTravelGrant',compact('travel'));
    }

    public function approve()
    {
         return view('backend.travelgrants.adminTravelGrantApproved');
   

    }
    public function reject()
    {
         return view('backend.travelgrants.adminTravelGrantRejected');
   

    }
      public function view($id)
    {
		
	//	$user_id = Auth::user()->user()->id; // user id of logged in user
		$travel = DB::table('travelgrants')->join('travelroles', 'travelroles.id', '=', 'travelgrants.roleid')->where('travelgrants.id','=', $id )->first();
        return view('backend.travelgrants.adminTravelGrantViewForm',compact('travel'));
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

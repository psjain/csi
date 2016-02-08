<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Input;
use DB;
use App\Travelgrant;
use App\TravelVersion;
use App\Member;
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
        $rows = (Input::exists('row'))? (Input::get('row') < 5)?5:Input::get('row'): 15;          // how many rows for pagination

        $cat_select_options = [
            0=>'all request',
            1=>'pending',
            2=>'approved',
            3=>'rejected'
        ];

        // filters
        $cat_selected = (Input::exists('cat'))? Input::get('cat'): 0;       // category
        $page = (Input::exists('page'))? abs(Input::get('page')): 1;        // current page

        $pending_requests = [];
        $approved_requests = [];
        $rejected_requests = [];

        $travel=Travelgrant::paginate($rows);

        foreach ($travel as $travels) {
            $travelstatus=TravelVersion::getLatestVersionsByGrantID($travels->id)->getLatestVersionStatus();
            $travels->status=$travelstatus;
        }

        foreach ($travel as $key => $travels) {

            if($travels->status=="pending"){
                array_push($pending_requests, $key);
            } 
            elseif($travels->status=="approved"){
                array_push($approved_requests, $key);
            }
            elseif($travels->status=="rejected"){
                array_push($rejected_requests, $key);
            }
        }

        if($cat_selected==1){
            $travel->forget($approved_requests);
            $travel->forget($rejected_requests);
        }
        if($cat_selected==2){
            $travel->forget($pending_requests);
            $travel->forget($rejected_requests);
        }
        if($cat_selected==3){
            $travel->forget($approved_requests);
            $travel->forget($pending_requests);
        }

       return view('backend.travelgrants.adminTravelGrant',compact('travel','page','rows','cat_selected', 'cat_select_options', 'search_text'));
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
    public function profile($id)
    {
		$travel=Travelgrant::where('memid',$id)->first();
        $user = Member::find($id);

        return view('backend.travelgrants.adminTravelGrantMemberProfile',compact('travel', 'user'));
    }
}

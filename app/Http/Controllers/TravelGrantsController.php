<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Auth;
use Response;
use App\Http\Controllers\Controller;
use App\TravelGrant;
use Input;
use App\TravelDoc;
use App\TravelVersion;
use App\TravelRole;
use App\TravelRequestStatus;
use App\Http\Requests\TravelGrantsRequest;
use App\Http\Requests\TravelGrantsEditRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\pagination;
use Redirect;
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
     * 
     */
    public function create()
    {
        
        return view('frontend.dashboard.travelgrant_user');
    }    
    /**
     * Show the form for all the grantes user has requested.
     *
     * 
     */
    
    public function viewAll()
    {
        $rows = (Input::exists('rows'))?abs(Input::get('rows')): 15;
        $page = (Input::exists('page'))? abs(Input::get('page')): 1;
        $status = Input::get('status');
        $id = Auth::user()->user()->id;
        if(count($status))
        {
            $checkbox_array=Input::get('status');
            $travel = TravelVersion::select('travel_grant_id')->where('travel_request_status_id',$status)->get();
            $travel=TravelGrant::whereIn('id',$travel)->where('member_id',$id)->latest()->paginate($rows);
        }

        else
        {
             $checkbox_array=array();
             $checkbox_array=[];
             $travel = TravelGrant::where('member_id',$id)->paginate($rows);
        }              
       
        $grant_status_types = TravelRequestStatus::find([1,2,3,4,5]);
        
        return view('frontend.dashboard.travelGrantListingAll',compact('travel','grant_status_types','rows','page','checkbox_array'));
    }

    public function storedoc($file,$ver)
    {
        
        $doc= TravelDoc::create([
        'travel_version_id'=>$ver->id, 
            'document'=>$file,
            ]);
    }
    
    public function store(TravelGrantsRequest $request)
    {
       $member_id = Auth::user()->user()->id;
        $event_name = Input::get('travel_event_name');
        $event_date = Input::get('travel_event_date');
        $event_venue = Input::get('travel_event_venue');
        $event_details = Input::get('travel_event_details');
        $journey_start_date = Input::get('travel_start_date');
        $journey_end_date = Input::get('travel_end_date');
        $members_count = Input::get('travel_members_count');
        $travel_role_id = Input::get('travel_event_member_role');
        $justification = Input::get('travel_event_request_justification');
        $travel_mode = Input::get('travel_event_mode');
        $requested_amount = Input::get('travel_event_grant_requested');
        $granted_amount= null;
       
        $travelrequest = TravelGrant::create([
                    'member_id' => $member_id, 
                    'event_name' => $event_name,
                    'event_details' => $event_details,
                    'event_date' => $event_date, 
                    'event_venue' => $event_venue, 
                    'journey_start_date' => $journey_start_date,
                    'journey_end_date' => $journey_end_date,
                    'member_count' => $members_count,
                    'travel_role_id' => $travel_role_id, 
                    'justification' => $justification, 
                    'travel_mode' => $travel_mode, 
                    'requested_amount' => $requested_amount,
                    ]);
        $ver = TravelVersion::create([                          
            'travel_grant_id'=> $travelrequest->id,
            'travel_request_status_id'=>1,
            'comments'=>null,              
            ]);

        $filename = '_'.$member_id.'_'.$travelrequest->id.'_'.$ver->id.'.'; 
        $filename.= Input::file('travel_event_member_document')->getClientOriginalExtension();
        $file=$member_id.'_'.$travelrequest->id.'_'.$ver->id.'.';
        $file.=Input::file('travel_event_member_document')->getClientOriginalExtension();
        Input::file('travel_event_member_document')->move(storage_path('uploads/travel_grant_proposals'), $filename);
        $doc= TravelDoc::create([
        'travel_version_id'=>$ver->id, //Changed to version_id
            'document'=>$file,
            ]); 
        return redirect('/travelgrantviewall');       
    }
    /**
     * Show the form for editing the exiting requests.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editgrant($id)
    {
        $mid = Auth::user()->user()->id; // user id of logged in user
        $travel = TravelGrant::find($id);
        return view('frontend.dashboard.travelgrant_edit',compact('travel'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function deletegrant($id)
    {
        
        $verid=TravelVersion::where('travel_grant_id','=',$id)->update(['travel_request_status_id'=>5]);
        TravelDoc::where('travel_version_id', '=', $verid)->delete();
        TravelVersion::where('travel_grant_id','=',$id)->delete();
        TravelGrant::find($id)->delete();
        
        return redirect('/travelgrantviewall');
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function updategrant(TravelGrantsEditRequest $request, $id)
    {
        $member_id = Auth::user()->user()->id;
        $grantrequestid = TravelGrant::find($id);
        $grantrequestid->event_name = Input::get('travel_event_name');
        $grantrequestid->event_date = Input::get('travel_event_date');
        $grantrequestid->event_venue = Input::get('travel_event_venue');
        $grantrequestid->event_details = Input::get('travel_event_details');
        $grantrequestid->journey_start_date = Input::get('travel_start_date');
        $grantrequestid->journey_end_date = Input::get('travel_end_date');
        $grantrequestid->member_count = Input::get('travel_members_count');
        $grantrequestid->travel_role_id = Input::get('travel_event_member_role');
        $grantrequestid->justification = Input::get('travel_event_request_justification');
        $grantrequestid->travel_mode = Input::get('travel_event_mode');
        $grantrequestid->requested_amount = Input::get('travel_event_grant_requested');
        $grantrequestid->save();


        
      
        $verid = TravelVersion::where('travel_grant_id','=',$id)->value('id');
       
        $prev_filename=TravelDoc::where('travel_version_id', '=', $verid)->value('document');
        TravelDoc::where('travel_version_id', '=', $verid)->delete();
        TravelVersion::where('travel_grant_id','=',$id)->delete();
        $ver = travelVersion::create([
            'travel_grant_id'=> $id,
            'travel_request_status_id'=>1,
            'comments'=>null,
            ]);

        if(Input::hasFile('travel_event_member_document'))
        {
            $filename = '_'.$member_id.'_'.$id.'_'.$ver->id.'.pdf';
           
            $file=$member_id.'_'.$id.'_'.$ver->id.'.pdf';
            
            $request->travel_event_member_document->move(storage_path('uploads/travel_grant_proposals'), $filename);
            $doc= TravelDoc::create([
            'travel_version_id'=>$ver->id,
            'document'=>$file,
            ]);
        }
        else{
            $doc= TravelDoc::create([
            'travel_version_id'=>$ver->id,
            'document'=>$prev_filename,
            ]);
        }
        return redirect('/travelgrantviewall');
    }

    public function showDocument($file)
    {
        $location='uploads\travel_grant_proposals\_'.$file;
        $path = storage_path($location);
        $response= Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$file,
        ]);
    return $response; 
    }
}
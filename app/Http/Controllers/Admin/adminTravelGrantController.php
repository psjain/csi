<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Input;
use DB;
use App\TravelGrant;
use App\TravelVersion;
use App\TravelDoc;
use App\TravelRequestStatus;
use App\TravelRole;
use App\Member;
use App\Institution;
use App\Individual;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Redirect;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\pagination;

class adminTravelGrantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        
       
      
        $statuses= TravelRequestStatus::all();
        $rows = (Input::exists('rows'))?abs(Input::get('rows')): 15;         // how many rows for pagination        
        $page = (Input::exists('page'))? abs(Input::get('page')): 1;        // current page 
        $search=(Input::exists('search'))?abs(Input::get('search')):'' ;
        $search_text=(Input::exists('search_text'))?(Input::get('search_text')):'';
        $status=Input::get('status'); 
        $fromDate=(Input::exists('request_from_date'))?(Input::get('request_from_date')):'';
        $toDate=(Input::exists('request_to_date'))?(Input::get('request_to_date')):'';
        if(count($status)){
          $checkbox_array=Input::get('status');
        }else{
          $checkbox_array=array();
        } 
        
        //there is some search text){
      if($search)
      {
        switch($search)
        {
          case 1: $travel= TravelGrant::where('id',$search_text)->latest()->paginate($rows);
                  break;
          case 2: if(count($status))
                  {
                    $travel = TravelVersion::select('travel_grant_id')->whereIn('travel_request_status_id',$status)->get();
                    $travel= TravelGrant::where('member_id',$search_text)->whereIn('id',$travel)->latest()->paginate($rows);
                  }
                  else
                  {
                    $travel=TravelGrant::where('member_id',$search_text)->latest()->paginate($rows);

                  }
                  break;
          case 3: if(count($status))
                  {
                    $member_id=Individual::select('member_id')->where('first_name','like','%'.$search_text.'%')->get();
                    $travel = TravelVersion::select('travel_grant_id')->whereIn('travel_request_status_id',$status)->get();
                    $travel= TravelGrant::whereIn('member_id',$member_id)->whereIn('id',$travel)->latest()->paginate($rows);
                  }
                  else
                  {
                    $member_id=Individual::select('member_id')->where('first_name','like','%'.$search_text.'%')->get();
                    $travel=TravelGrant::whereIn('member_id',$member_id)->latest()->paginate($rows);

                  }
                  break;
          case 4: if(count($status))
                  {
                    $member_id=Institution::select('member_id')->where('name','like','%'.$search_text.'%')->get();
                    $travel = TravelVersion::select('travel_grant_id')->whereIn('travel_request_status_id',$status)->get();
                    $travel= TravelGrant::whereIn('member_id',$member_id)->whereIn('id',$travel)->latest()->paginate($rows);
                  }
                  else
                  {
                    $member_id=Institution::select('member_id')->where('name','like','%'.$search_text.'%')->get();
                    $travel=TravelGrant::whereIn('member_id',$member_id)->latest()->paginate($rows);

                  }
                  break;
          case 5: if(count($status))
                  {
                    $member_id=Member::select('id')->where('email','like','%'.$search_text.'%')->get();
                    $travel = TravelVersion::select('travel_grant_id')->whereIn('travel_request_status_id',$status)->get();
                    $travel= TravelGrant::whereIn('member_id',$member_id)->whereIn('id',$travel)->latest()->paginate($rows);
                  }
                  else
                  {
                    $member_id=Member::select('id')->where('email','like','%'.$search_text.'%')->get();
                    $travel=TravelGrant::whereIn('member_id',$member_id)->latest()->paginate($rows);

                  }
                  break;
        }       
         
      }
      else
      {
        if(count($status))
        {
          $travel = TravelVersion::select('travel_grant_id')->whereIn('travel_request_status_id',$status)->get();
          $travel=TravelGrant::whereIn('id',$travel)->latest()->paginate($rows);
        }
        else
        {
          $travel=TravelVersion::select('travel_grant_id')->distinct('travel_grant_id')->get();
          $travel=TravelGrant::whereIn('id',$travel)->latest()->paginate($rows);

        }
          
      }


        
        //here you get status wise tuples, do query for dates
        $from_date_records = array();
        $to_date_records = array();
        foreach ($travel as $key => $travels) {
            if($fromDate){
              if($travels->created_at <= $fromDate ){ //lower bound
                array_push($from_date_records, $key);
              }
            }
            if($toDate){
              if($travels->created_at >= $toDate ){ //upper bound
                array_push($to_date_records, $key);
              }
            }       
        

        if(!empty($fromDate)){
          //we need intersection of both the filters 
          $travel->forget($from_date_records);
        } 

        if(!empty($toDate))
          $travel->forget($to_date_records);
        }       

        // }
                
            
                  
        return view('backend.travelgrants.adminTravelGrant',compact('travel','page','rows', 'search_text','statuses','checkbox_array','search','fromDate','toDate'));
    
    }
    
    


 public function approve(Request $request)
    {    
        $amountreq= TravelGrant::where('id',$request->travel_grant_id)->value('requested_amount');
                   
        if($request->granted_amount<=$amountreq)
        {

            TravelVersion::where('travel_grant_id','=', $request->travel_grant_id )->UpdateStatus(2);
            TravelVersion::where('travel_grant_id','=', $request->travel_grant_id )->update(['comments'=>$request->feedback]);
             TravelGrant::find( $request->travel_grant_id)->update(['granted_amount'=>$request->granted_amount]);

        }                
                $user = Member::find($request->member_id);  
                $travel= TravelGrant::find($request->travel_grant_id);            
                
                return Redirect::route('adminTravelGrantMemberProfile',[$request->member_id,$request->travel_grant_id])->with('travel', $travel)->with('user', $user); 
      }

   public function reject(Request $request)
    {
                TravelVersion::where('travel_grant_id','=', $request->travel_grant_id)->update(['comments'=>$request->feedback]);
                TravelVersion::where('travel_grant_id','=', $request->travel_grant_id )->where('travel_request_status_id','=', 1)->update(['travel_request_status_id'=>3]);          
              
                $user = Member::find($request->member_id);  
                $travel= TravelGrant::find($request->travel_grant_id);            
                
                return Redirect::route('adminTravelGrantMemberProfile',[$request->member_id,$request->travel_grant_id])->with('travel', $travel)->with('user', $user); 
   

    }
    public function revise(Request $request)
    {                
                TravelVersion::where('travel_grant_id','=', $request->travel_grant_id)->update(['comments'=>$request->feedback]);
                TravelVersion::where('travel_grant_id','=', $request->travel_grant_id )->where('travel_request_status_id','=', 1)->update(['travel_request_status_id'=>4]);      
                $user = Member::find($request->member_id);  
                $travel= TravelGrant::find($request->travel_grant_id);            
                
                return Redirect::route('adminTravelGrantMemberProfile',[$request->member_id,$request->travel_grant_id])->with('travel', $travel)->with('user', $user);   
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
    public function profile($travel_grant_id)
    { 
        $member_id=TravelGrant::find($travel_grant_id)->value('member_id');
		    $previous=TravelGrant::where('member_id',$member_id)->where('id','<>',$travel_grant_id)->get();
        $grant_history=TravelVersion::withTrashed()->where('travel_grant_id','=',$travel_grant_id)->get();
        //return $grant_history;        
        $travel= TravelGrant::find($travel_grant_id);      
        $user = Member::find($member_id);        
        return view('backend.travelgrants.adminTravelGrantMemberProfile',compact('travel','user','previous','grant_history'));       
    }
    public function g1()
    {
        return view('backend.travelgrants.g1');
    }
    
   








}

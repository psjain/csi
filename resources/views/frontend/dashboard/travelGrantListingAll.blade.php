  @extends('frontend.master')
  @section('title', 'All Grants')
  @section('section-after-mainMenu')
  @endsection
  @section('main')
    <section>
        <div id="filter">
          <div class="row">
            <div class="col-md-12">
              
              
             {!! Form::open(['route' => 'viewalltravel', 'method' => 'get','class' => 'form-inline']) !!}
              @foreach($grant_status_types as $status)
                @if(in_array($status->id,$checkbox_array))

                         {!! Form::checkbox('status[]',$status->id,true) !!}
                @else

                         {!! Form::checkbox('status[]',$status->id) !!}
                @endif
                         {!! Form::label('status',$status->status) !!}
              @endforeach

           &nbsp;&nbsp;
              <div class="form-group">
                  <label for="rows">Number of Records per page*</label>
                &emsp;
                  <input type="number" class="form-control" name="rows" id="rows" value="{{ $rows }}">
              </div>
           
           &nbsp;&nbsp;
           <button type="submit" class="btn btn-default pull-right">Search</button>
          {!! Form::close() !!}
        </div>
    </div>
  </div>

  <h3>All Travel Grants Requests</h3>

        <div class="container-fluid">
              <div class="panel panel-default panel-list">

                  <!-- start panel heading -->
                  <div class="panel-heading compact-pagination ">
                    <div class="row">
                      <div class="col-md-9">
                        {{-- other content --}}
                      </div>
                      <div class="col-md-3">{!! $travel->appends(array_except(Request::query(), ['page']) )->render() !!}
                          
                        
                      </div>
                    </div>
                 </div>
                  <!-- ending panel-heading -->

                  {{-- starting list items --}}
                  <div class="panel-body">

                      <div class="listing-items">
                        
                  @if(!($travel->isEmpty()))

        @foreach ($travel as $travels)   
          
                                <div class="row">
                      <div class="col-md-7">
                       <table cellpadding="15" cellspacing="20">
                  <tr>  
                   
                   <td width="300px">
                   
                       <b>Event Name: </b>    {{ $travels->event_name }} 
    
  </td>

  <td width="240px"><b> Start Of Journey:</b>{{$travels->journey_start_date}} </td>
  <td><b>Grant ID: </b> {{$travels->id}} <br></td>
                                   
   </tr>
     <tr> 
      <td><b> Event Venue:</b>{{$travels->event_venue}}<br></td>
          <!-- ->format('d M Y') -->
         <td><b> End Of Journey: </b>{{$travels->journey_end_date}} &nbsp; &nbsp; &nbsp;</td>
          <td> <b> Date Of Request:</b> {{$travels->created_at->format('d M Y')}} <br> </td>
     </tr>
                     
       <tr>  
     <td><b>Event Date:</b>{{$travels->event_date}}</td>  
     <td><b>No. Of Members: </b> {{$travels->member_count}} </td>
          <td> <b> Requested Amount: </b>{{$travels->requested_amount}} &nbsp; &nbsp; &nbsp; &nbsp;</td>
       </tr>

                    <tr>

                      <td> <b> Event Details:</b>{{$travels->event_details}}</td>
                      <td> @if($travels->travelversions->first()->travel_request_status_id==2)
                    <td> <b> Granted Amount:</b>{{$travels->granted_amount}} <br>  </td>
                    @endif
                  </td>
                    </tr>
                  </table>
                      </div>
                      <div class="col-md-2" style="padding-top: 15px;">
                        <table>
                        <tr> 
                          <td> </td>
                        </tr>
                        <tr>
                         <td> </td>
                      <td>  @if($travels->travelversions->first()->travel_request_status_id==2)
                    <h5 class="label label-success">Approved</h5>
                  @elseif($travels->travelversions->first()->travel_request_status_id==3)
                    <h5 class="label label-danger">Rejected</h5>
                  @elseif($travels->travelversions->first()->travel_request_status_id==1)
                     <h5 class="label label-primary">Pending</h5>
                  @elseif($travels->travelversions->first()->travel_request_status_id==4)
                     <h5 class="label label-warning">Revision</h5>
                  @elseif($travels->travelversions->first()->travel_request_status_id==5)
                     <h5 class="label label-default">Cancelled</h5>
                  @endif
                  </td>
                </tr>
                </table>
                  
                </b>
                      </div>
                  <div class="col-md-3" style="padding-top: 15px;">
                   <ul class="list-unstyled" style="font-size: 16px">
                    <li>
                      


   @if($travels->travelversions->first()->travel_request_status_id==4)
  <a href="{{ route('editgrant', $travels->id) }}" class="btn btn-sm btn-primary">Edit</a>

  @endif                                   
   


  @if($travels->travelversions->first()->travel_request_status_id==4||$travels->travelversions->first()->travel_request_status_id==1)
   <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete">Cancel</a></h5>
   <div class="modal fade" id="delete" role="dialog">

   
    <!-- Trigger the modal with a button -->

      
                  <!-- Modal content-->
                  <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">
                     <div>
                  <p><center><b><h4>Want to Cancel the Request?</h4>-</b></center></p>
                       </div>
                       <br>
              </div>
              <div class="modal-footer">

                 <a href="{{ route('deletegrant', $travels->id) }}" class="btn btn-large btn-danger" >Confirm</a>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   
              </div>
              </div>
          </div>
        @endif
                                    </li>
                                  </ul>
                                </div>
                             </div>
                             <br>
                             @if($travels->travelversions->first()->travel_request_status_id==2||$travels->travelversions->first()->travel_request_status_id==3||$travels->travelversions->first()->travel_request_status_id==4)
                             <div class="row">
                              @if(empty($travels->travelversions->first()->comments))                              
                              <b>No Feedback Available</b>                               
                               @else
                              <b>Feedback:-</b>{{$travels->travelversions->first()->comments}}
                              @endif
                             </div>
                             @endif

                            
    
            
             
        
         
               <hr>   
      @endforeach
      @else
        <p>No records</p>
      @endif
    </div>
     
             
                  {{-- ending list items --}}

                    <!-- panel-footer -->
                  <div class="panel-footer compact-pagination">
                      <div class="row">
                        <div class="col-md-9">
                          {{-- other content --}}
                        </div>
                        <div class="col-md-3">
                            {!! $travel->appends(array_except(Request::query(), ['page']) )->render() !!}
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- /.panel -->
            <!-- Add anything till here -->
          </div>
    </section>
  @endsection
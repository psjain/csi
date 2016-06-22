<style >    
  .modal.modal-wide .modal-dialog {
    width: 90%;
  }
  .modal-wide .modal-body {
    overflow-y: auto;
  }

  #tallModal .modal-body p { margin-bottom: 900px }

  $(".modal-wide").on("show.bs.modal", function() {
    var height = $(window).height() - 200;
    $(this).find(".modal-body").css("max-height", height);
  });

  </style>

<div class="col-md-12 col-sm-12 col-xs-12"> <!-- div grant details -->
  <div class="panel panel-default" id="payment-list">
    <div class="panel-heading">
    <h3>
                       #Travel Grant-ID :  {{ $travel->id }}
                      </h3>
                      <h4>
                        #Member-ID :  {{ $travel->member_id }}
                      </h4>







                      <a data-toggle="modal" href="#previous"><h6> <b> Previous Requests </b></h6></a>





<div class="modal modal-wide fade" id="previous" role="dialog">
 <div class="modal-dialog modal-lg">                 
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><b><center>Previous Requests Made By Member ID: {{ $travel->member_id }}</center></b></h4>
    </div>
   <div class="modal-body">
    <div class="panel panel-default panel-list">
       <div class="panel-body">
        
        @if(!($previous->isEmpty()))
        @foreach($previous as $prev)
           <div class="card">
            <div class="row">
              <div class="col-md-8" >
                 <table cellpadding="15" cellspacing="15" >
                <tr>
                  <td><b>Event Name :</b>{{ $prev->event_name }}</td><td><b>Grant ID : </b>{{$prev->id}} </td>
                <td><b>StartDate of Journey:</b>{{$prev->journey_start_date}}</td>
              </tr>
              <tr>  
               <td><b>Event Date :</b>{{ $prev->event_date }}  &nbsp; &nbsp; &nbsp; &nbsp;</td>                  
               <td><b>Date of Request :</b>{{$prev->created_at->format(' d M Y')}} &nbsp; &nbsp; &nbsp; </td>
               <td><b>EndDate of Journey :</b>{{$prev->journey_end_date}}<br></td>
             </tr>
             <tr>  
              <td><b>Venue : </b>{{$prev->event_venue}} </td> 
              <td> <b> Requested Amount : </b>{{$prev->requested_amount}} &nbsp; &nbsp; &nbsp; &nbsp;</td>                                     
            </tr>
           <tr>
        <td width="300px"><b>Event Details:</b>{{ $prev->event_details }}&nbsp; &nbsp; &nbsp; &nbsp; </td>                        
      <td> @if($prev->travelversions->first()->travel_request_status_id==2)<b> Granted Amount:</b>{{$prev->granted_amount}} <br>  @endif</td>
    </tr>
    <br>
  </table>
              </div>
              <div class="col-md-1" style="padding-top: 15px;">
                @if($prev->travelversions->first()->travel_request_status_id==2)<h5 class="label label-success">Approved</h5>                  
    @elseif($prev->travelversions->first()->travel_request_status_id==3)<h5 class="label label-danger">Rejected</h5>                  
    @elseif($prev->travelversions->first()->travel_request_status_id==1)<h5 class="label label-primary">Pending</h5>                  
    @elseif($prev->travelversions->first()->travel_request_status_id==4) <h5 class="label label-warning">Revision</h5>
    @else($prev->travelversions->first()->travel_request_status_id==5) <h5 class="label label-default">Cancelled</h5>                 
    @endif
    
              </div>
              <div class="col-md-1" style="padding-top: 15px;">
          
           <a target="_blank" href="{{ route('adminTravelGrantMemberDocument',$prev->travelversions->first()->versiondocument->document)}}"> <i class="fa fa-file-pdf-o" style="font-size:36px;color:red"></i></a>
          </div>
            </div>
            <br>            
            <div class="row">
              @if(empty($prev->travelversions->first()->comments))                              
                <b>No Feedback Available</b>                               
              @else
                <b>Feedback:-</b>{{ $prev->travelversions->first()->comments }}
              @endif
            </div>
            <hr>
            </div>   
             
                            
            @endforeach
          @else
            <p>No records</p>
          @endif
                
        </div>
      </div></div>
    </div>  <!-- card khtm -->

   </div>
 </div>
 <div  class="row">

      <div class="col-md-6 col-sm-6 col-xs-6">
        <p>
          <b>Event Name:</b>
            <a data-toggle="modal" href="#event">
            <b>{{ $travel->event_name }}</b>
            </a>            
          <span><b>Event Date :</b> {{ $travel->event_date }}</span>
          <span><b>Event Venue :</b> {{ $travel->event_venue}} </span>
          <span><b>Role :</b> {{ $travel->getRole($travel->travel_role_id)}} </span>
          <span><b>Justification :</b> {{ $travel->justification }} </span>
          <span><b>Mode of Transport :</b> {{ $travel->travel_mode }} </span>
          <span><b>Amount Requested :</b> {{ $travel->requested_amount }} </span>          
                         
       
      </p>
      <div class="modal fade" id="event" role="dialog">
            <div class="modal-dialog">            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"> <center>{{ $travel->event_name }} </center></h4>
                </div>
                <div class="modal-body">
                  <span> <b>Event Date :</b> {{ $travel->event_date }}</span>
                 <br>
                 <!--  <span> <b>Event Category :</b> !!! To be done !!!</span>
                 <br> -->
                  <span><b>Event Venue :</b> {{ $travel->event_venue}} </span>
                   <br>

                  <span><b>Event Details :</b> {{ $travel->event_details}} </span>
                   <br>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>              
            </div>          
            </div>
    </div>
     <div class="col-md-4 col-sm-4 col-xs-4">
        <span><b>Status :</b>@if($travel->travelversions->first()->travel_request_status_id==2)<h5 class="label label-success">Approved</h5>                  
              @elseif($travel->travelversions->first()->travel_request_status_id==3)<h5 class="label label-danger">Rejected</h5>                  
              @elseif($travel->travelversions->first()->travel_request_status_id==1)<h5 class="label label-primary">Pending</h5>                  
              @elseif($travel->travelversions->first()->travel_request_status_id==4) <h5 class="label label-warning">Revision</h5>
              @elseif($travel->travelversions->first()->travel_request_status_id==5) <h5 class="label label-default">Cancelled</h5>                 
              @endif 
          </span>  <br><br>

        <b>Document uploaded</b>
        <a target="_blank" href="{{ route('adminTravelGrantMemberDocument',$travel->travelversions->first()->versiondocument->document)}}"> <i class="fa fa-file-pdf-o" style="font-size:48px;color:red"></i></a>
      </div>
  </div>
  <div  class="row">
      <div class="col-md-8 col-sm-8 col-xs-8">
        @if($travel->travelversions->first()->travel_request_status_id==2)
             <h5><b>Amount Granted:</b></h5>
         <div class="col-md-12">
           <div class="input-group">
        <h5><span ><b>${{$travel->granted_amount}}</b></span></h5>
           </div>
              </div>
          @endif          
    
           @if($travel->travelversions->first()->travel_request_status_id!=1)
           @if($travel->travelversions->first()->travel_request_status_id==3)
           <h5><b>Reason For Rejection: </b></h5>
           <div class="col-md-12">
           <div class="input-group">
       <h5>@if(empty($travel->travelversions->first()->comments))                              
                <b>No Feedback Available</b>                               
              @else
                {{$travel->travelversions->first()->comments}}
              @endif </h5>
           </div>
              </div>

           @elseif($travel->travelversions->first()->travel_request_status_id==4)<h4><b>Reason For Previous Revision</b></h4>
 
           <div class="col-md-12">
           <div class="input-group">
       <h5>@if(empty($travel->travelversions->first()->comments))                              
                <b>No Feedback Available</b>                               
              @else
                {{$travel->travelversions->first()->comments}}
              @endif </h5>
           </div>
              </div>
              @else<br><h4><b>Feedback</b></h4>
 
           <div class="col-md-12">
           <div class="input-group">
       <h5>@if(empty($travel->travelversions->first()->comments))                              
                <b>No Feedback Available</b>                               
              @else
                {{$travel->travelversions->first()->comments}}
              @endif </h5>
           </div>
              </div>
           @endif  
           @endif
        
      </div>
     
    </div>
    </div>
    
  <div class="panel-body">
    
    
    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        @if($travel->travelversions->first()->travel_request_status_id==1)
       

          <!-- Approve Start -->

        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#approve">Approve</button>

             <!-- Modal -->
            <div class="modal fade" id="approve" role="dialog">
              <div class="modal-dialog">
    
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                
                 {!! Form::open(['route' => 'adminTravelGrantApproved','method'=>'post']) !!}
                    

                <p> <font size="4"><b>   Requested Amount: </b> {{$travel->requested_amount}} </font> </p>
                   
                     </br>
                   <font size="4"> <b> Amount to be Granted: </b><input name="granted_amount" type="text"/> </font></br></br>
                   <font size="4"> </br><b> Feedback: </b><textarea class="form-control" name="feedback" style="min-width: 100%"></textarea>

            </div>
            <div class="modal-footer">
                 
               <input type="hidden" name="travel_grant_id" value="{{ $travel->id }}" />
               <input type="hidden" name="member_id" value="{{ $travel->member_id }}" />

              
              <center> {!! Form::submit('Save',['class'=>"btn btn-default"]) !!} </center>
              
            {!! Form::close() !!}
              
            </div>
            </div>
        </div>
            </div>   <!--Approve End -->



        <!-- Rejection Start -->

        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#reject">Reject</button>

              <!-- Modal -->
            <div class="modal fade" id="reject" role="dialog">
              <div class="modal-dialog">
    
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                
                  {!! Form::open(['route' => 'adminTravelGrantRejected','method'=>'post']) !!}
            
                   <div>
                <p> <center><b><u> Reason for Rejection</u>-</b></center></p>
                     </div>
                   <br>
                     <textarea class="form-control" name="feedback" style="min-width: 100%"></textarea>

            </div>
            <div class="modal-footer">
                 
               <input type="hidden" name="travel_grant_id" value="{{ $travel->id }}" />
               <input type="hidden" name="member_id" value="{{ $travel->member_id }}" />

              
              <center> {!! Form::submit('Save',['class'=>"btn btn-default"]) !!} </center>
              
            {!! Form::close() !!}
              
            </div>
            </div>
        </div>
            </div>   <!--Rejection End -->





        <!-- Revision start -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#revision">Revision</button>

              <!-- Modal -->
            <div class="modal fade" id="revision" role="dialog">
              <div class="modal-dialog">
    
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                
                 {!! Form::open(['route' => 'adminTravelGrantRevised','method'=>'post']) !!}
            
                   <div>
                <p> <center><b><u> Reason for Revision</u>-</b></center></p>
                     </div>
                   <br>
                     <textarea class="form-control" name="feedback" style="min-width: 100%"></textarea>

            </div>
            <div class="modal-footer">
                 
               <input type="hidden" name="travel_grant_id" value="{{ $travel->id }}" />
               <input type="hidden" name="member_id" value="{{ $travel->member_id }}" />

              
              <center> {!! Form::submit('Save',['class'=>"btn btn-default"]) !!} </center>
              
            {!! Form::close() !!}
              
            </div>
            </div>
        </div>
            </div>   <!--Revision End -->
            @endif
          













      </div>

    </div>

    <div class="row">
      
       <div class="panel-body">
        <h4><b>Grant Status History</b></h4>
         @if(!($grant_history->isEmpty()))
           @foreach($grant_history as $grant)
           <div class="card">
            <div class="row">
              <div class="col-md-9" >
                <table cellpadding="15" >
                  <tr>
                    <td width="200px"><b>Event Name :</b>{{ $travel->event_name }}</td>                                    
                    <td width="250px"><b>Grant ID : </b>{{$travel->id}} </td>
                    <td><b>StartDate of Journey:</b>{{date('F d, Y', strtotime($travel->journey_start_date))}}</td>
                  </tr>
                  <tr>  
                    <td ><b>Event Date :</b>{{ $travel->event_date }}  &nbsp; &nbsp; &nbsp; &nbsp;</td>                  
                    <td><b>Date of Request :</b>{{date('F d, Y', strtotime($travel->created_at))}} &nbsp; &nbsp; &nbsp; </td>
                    <td><b>EndDate of Journey :</b>{{date('F d, Y', strtotime($travel->journey_end_date))}}<br></td>
                  </tr>
                  <tr>  
                    <td><b>Venue : </b>{{$travel->event_venue}} </td> 
                    <td> <b> Requested Amount : </b>{{$travel->requested_amount}} &nbsp; &nbsp; &nbsp; &nbsp;</td>                                     
                  </tr>
                  <tr>
                    <td></td>                        
                    <td> @if($grant->travel_request_status_id==2)<b> Granted Amount:</b>{{$travel->granted_amount}} <br>  @endif</td>
                  </tr>
                  <br>
                </table>
              </div>
              <div class="col-md-1" style="padding-top: 15px;">
                @if($grant->travel_request_status_id==2)<h5 class="label label-success">Approved</h5>                  
                @elseif($grant->travel_request_status_id==3)<h5 class="label label-danger">Rejected</h5>                  
                @elseif($grant->travel_request_status_id==1)<h5 class="label label-primary">Pending</h5>                  
                @elseif($grant->travel_request_status_id==4) <h5 class="label label-warning">Revision</h5>
                @elseif($grant->travel_request_status_id==5) <h5 class="label label-default">Cancelled</h5>                 
                @endif
              </div>
              <div class="col-md-1" style="padding-top: 15px;">
                <a target="_blank" href="{{ route('adminTravelGrantMemberDocument',$grant->first()->versiondocument->document)}}"> <i class="fa fa-file-pdf-o" style="font-size:36px;color:red"></i></a>
              </div>
            </div>
            <br>            
            <div class="row">
              @if(empty($grant->comments))                              
                <b>No Feedback Available</b>                               
              @else
                <b>Feedback:-</b>{{$grant->comments}}
              @endif
            </div>
            <hr>
            </div>   
             
                            
            @endforeach
          @else
            <p>No records</p>
          @endif
                
        </div>
      




    </div>



           
  
    
        
           
    
       
    </div>
    

           
  
    
        
           
    
          
    </div>
</div>
</div> <!-- div grant details-->
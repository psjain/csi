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
                         <div><h3>
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
                                                                                  <table cellpadding="15" >
                                                                                    <tr>
                                                                                      <td><b>Event Name :</b><a data-toggle="modal" href="#prevevent">{{ $prev->event_name }}</a></td>                                    
                                                                                    <td><b>Grant ID : </b>{{$prev->id}} </td>
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
                                                                            <td></td>                        
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
                                                                        

                                                                            </b>
                                                                              </div>

                                                                          <div class="col-md-2" style="padding-top: 15px;">
                                                                            <ul class="list-unstyled" style="font-size: 16px">
                                                                              <li>
                                                                                <a data-toggle="modal" href="#prevcomments"><span class="btn btn-info" > Feedback</span></a>
                                                                                
                                                                            </div>
                                                                            <div class="col-md-1" style="padding-top: 15px;">
                                                                              
                                                                               <a target="_blank" href="{{ route('adminTravelGrantMemberDocument',$prev['document'])}}"> <i class="fa fa-file-pdf-o" style="font-size:36px;color:red"></i></a>
                                                                              </div>


                                                                          </div>
                                                                        </div>  <!-- card khtm -->

                                                                       </div>
                                                                           <hr>         
                                                                        
                                                                        @endforeach
                                                                        @else
                                                                        <p>No records</p>
                                                                        @endif    
                                                                      </div>
                                                                    </div> <!-- Modal Body khtm -->
                                                                      <div class="modal-footer">
                                                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                      </div>  <!-- Prev Req Modal khtm -->



                                                      <div class="modal fade" id="prevevent" role="dialog">
                                                                                         <div class="modal-dialog">

                                                                                           <div class="modal-content">
                                                                                             <div class="modal-header">
                                                                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                               <h4 class="modal-title"> <center>{{ $prev->event_name }} </center></h4>
                                                                                             </div>
                                                                                             <div class="modal-body">
                                                                                               <span> <b>Event Date :</b> {{ $prev->event_date }}</span>
                                                                                               <br>
                                                                                               <span><b>Event Venue :</b> {{ $prev->event_venue}} </span>
                                                                                               <br>
                                                                                               <span><b>Event Details :</b> {{ $prev->event_details}} </span>
                                                                                               <br>
                                                                                             </div>
                                                                                             <div class="modal-footer">
                                                                                              <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
                                                                                           
                                                                                            </div>


                                                                                          </div>

                                                                                        </div>
                                                                                      </div><br>
                                                                                  
                                                                                    <div class="modal fade" id="prevcomments" role="dialog">
                                                                                 <div class="modal-dialog">
                                                     
                                                                                  <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                      <h4 class="modal-title"> <center>FEEDBACK </center></h4>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                      <span> {{ $prev->travelversions->first()->comments }}</span>
                                                                                      <br>

                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                    </div>
                                                                                  </div>

                                                                                </div>
                                                                              </div>







                    </div>
                    <br>
                                                         <div>
                                                          <div float="left">
                                                            
                                                          <b>Event Name:</b>
                                                          <a data-toggle="modal" href="#event">
                                                          <b>{{ $travel->event_name }}</b>
                                                          </a>
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
                                                      
                                                          <br>
                                                       
                                                          


                                                      

                                                                      


                                                                                

                                                        <div  class="row">
                                                          <div class="col-md-6 col-sm-6 col-xs-6">
                                                            <p>
                                                              <span><b>Event Date :</b> {{ $travel->event_date }}</span>
                                                              <span><b>Event Venue :</b> {{ $travel->event_venue}} </span>
                                                              <span><b>Role :</b> {{ $travel->travel_role_id}} </span>
                                                              <span><b>Justification :</b> {{ $travel->justification }} </span>
                                                              <span><b>Mode of Transport :</b> {{ $travel->travel_mode }} </span>
                                                              <span><b>Amount Requested :</b> {{ $travel->requested_amount }} </span>
                                                              <span><a data-toggle="modal" href="#grantHistory"> <b> Grant Status History </b></a></span>
                                                               <span><b>Status :&nbsp;&nbsp;&nbsp;</b>@if($travel->travelversions->first()->travel_request_status_id==2)<h5 class="label label-success">Approved</h5>                  
                                                                    @elseif($travel->travelversions->first()->travel_request_status_id==3)<h5 class="label label-danger">Rejected</h5>                  
                                                                    @elseif($travel->travelversions->first()->travel_request_status_id==1)<h5 class="label label-primary">Pending</h5>                  
                                                                    @elseif($travel->travelversions->first()->travel_request_status_id==4) <h5 class="label label-warning">Revision</h5>
                                                                    @elseif($travel->travelversions->first()->travel_request_status_id==5) <h5 class="label label-default">Cancelled</h5>                 
                                                                    @endif </span>

                                                              
                                                          <div class="modal modal-wide fade" id="grantHistory" role="dialog">
                                                                     <div class="modal-dialog modal-lg">                 
                                                                      <div class="modal-content">
                                                                        <div class="modal-header">
                                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                          <h4 class="modal-title"><b><center>Previous Statuses of<b>Grant ID : </b>{{$travel->id}}</center></b></h4>
                                                                        </div>
                                                                       <div class="modal-body">
                                                                         <div class="panel panel-default panel-list">                      
                                                                           <div class="panel-body">
                                                                            @if(!($grant_history->isEmpty()))
                                                                            @foreach($grant_history as $grant)
                                                                             <div class="card">
                                                                              <div class="row">
                                                                              <div class="col-md-8" >
                                                                                  <table cellpadding="15" >
                                                                                    <tr>
                                                                                      <td><b>Event Name :</b>{{ $travel->event_name }}</td>                                    
                                                                                    <td><b>Grant ID : </b>{{$travel->id}} </td>
                                                                                    <td><b>StartDate of Journey:</b>{{$travel->journey_start_date}}</td>
                                                                                  </tr>
                                                                                  <tr>  
                                                                                   <td><b>Event Date :</b>{{ $travel->event_date }}  &nbsp; &nbsp; &nbsp; &nbsp;</td>                  
                                                                                   <td><b>Date of Request :</b>{{$travel->created_at->format(' d M Y')}} &nbsp; &nbsp; &nbsp; </td>
                                                                                   <td><b>EndDate of Journey :</b>{{$travel->journey_end_date}}<br></td>
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
                                                                        

                                                                            </b>
                                                                              </div>

                                                                          <div class="col-md-2" style="padding-top: 15px;">
                                                                            <ul class="list-unstyled" style="font-size: 16px">
                                                                              <li>
                                                                                <a data-toggle="modal" href="#grantcomments"><span class="btn btn-info" > Feedback</span></a>
                                                                                
                                                                            </div>
                                                                            <div class="col-md-1" style="padding-top: 15px;">
                                                                              
                                                                               <a target="_blank" href="{{ route('adminTravelGrantMemberDocument',$grant['document'])}}"> <i class="fa fa-file-pdf-o" style="font-size:36px;color:red"></i></a>
                                                                              </div>


                                                                          </div>
                                                                        </div>  <!-- card khtm -->

                                                                       </div>
                                                                           <hr>         
                                                                        
                                                                        @endforeach
                                                                        @else
                                                                        <p>No records</p>
                                                                        @endif    
                                                                      </div>
                                                                    </div> <!-- Modal Body khtm -->
                                                                      <div class="modal-footer">
                                                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                      </div>  <!-- Grant Req Modal khtm -->
                                                             
                                                            </p>
                                                          </div>
                                                          <br>
                                                                                    
                                                                                    <div class="modal fade" id="grantcomments" role="dialog">
                                                                                 <div class="modal-dialog">
                                                     
                                                                                  <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                      <h4 class="modal-title"> <center>FEEDBACK </center></h4>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                      <span> {{ $grant->comments }}</span>
                                                                                      <br>


                                                          


                                                              











                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                    </div>
                                                                                  </div>

                                                                                </div>
                                                                              </div>
                                                          <div float="right" >
                                                           <h6> <b>Document uploaded:</b></h6>
                                                          
                                                          <a target="_blank" href="{{ route('adminTravelGrantMemberDocument',$travel->travelversions->first()->versiondocument->document)}}"> <i class="fa fa-file-pdf-o" style="font-size:48px;color:red"></i></a>
                                                          </div>
  </div>                                                      </div>
  </div>
  </div>
    
  <div class="panel-body">
            @if($travel->travelversions->first()->travel_request_status_id==1)
            <div>
              <h4>
       <!--   <a href="{{ route('adminTravelGrantApproved', $travel->id) }}" >APPROVE</a>
                  <a href="{{ route('adminTravelGrantRejected', $travel->id) }}" >REJECT</a></h4> -->
             <div class="container">
 
             <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#approve">Approve</button>

              <!-- Modal -->
            <div class="modal fade" id="approve" role="dialog">
              <div class="modal-dialog"   vertical-align: middle;>
    
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"> <center> <b> <u> Grant Amount</u> : </b></center></h4>
                    </div>
            <div class="modal-body">
              {!! Form::open(['route' => 'adminTravelGrantApproved','method'=>'post']) !!}
                   <div>

                <p> <b> <font size="4">  Requested Amount: </b> {{$travel->requested_amount}} </font> </p>
                     </div>
                     </br>
                   <font size="4"> <b> Amount to be Granted: </b><input name="granted_amount" type="text"/> </font></br></br>
                   <font size="4"> </br><b> Feedback: </b><textarea class="form-control" name="feedback" style="min-width: 100%"></textarea>

            </div>
            <div class="modal-footer">
              
               <input type="hidden" name="travel_grant_id" value="{{ $travel->id }}" />
               <input type="hidden" name="member_id" value="{{ $travel->member_id }}" />

              <br>
              
              <center> {!! Form::submit('Save',['class'=>"btn btn-default"]) !!} 
              
            {!! Form::close() !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></center>
             </div>
            
            </div>
        </div>
            </div>

            
 
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
                <p><center><b><u>Reason for Rejection</u>-</b></center></p>
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
            </div>



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
            </div>
          
            </div>

 @endif
              @if($travel->travelversions->first()->travel_request_status_id==2)
             <h4><b>Amount Granted:</b></h4>
         <div class="col-md-12">
           <div class="input-group">
        <h4><span ><b>${{$travel->granted_amount}}</b></span></h4>
           </div>
              </div>
          @endif          
    
           @if($travel->travelversions->first()->travel_request_status_id!=1)
           @if($travel->travelversions->first()->travel_request_status_id==3)
           <h4><b>Reason For Rejection: </b></h4>
           <div class="col-md-12">
           <div class="input-group">
       <h5> <span >{{$travel->travelversions->first()->comments}}</span> </h5>
           </div>
              </div>

           @elseif($travel->travelversions->first()->travel_request_status_id==4)<h4><b>Reason For Previous Revision</b></h4>
 
           <div class="col-md-12">
           <div class="input-group">
       <h5> <span >{{$travel->travelversions->first()->comments}}</span></h5>
           </div>
              </div>
              @else<br><br><br><br><h4><b>Feedback</b></h4>
 
           <div class="col-md-12">
           <div class="input-group">
       <h5> <span > {{$travel->travelversions->first()->comments}} </span></h5>
           </div>
              </div>
           @endif  
           @endif

          
</div>
</div> <!-- div grant details-->
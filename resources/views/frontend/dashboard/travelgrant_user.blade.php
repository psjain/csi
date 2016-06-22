@extends('frontend.master')
@section('title', 'New Request')
@section('main')

   <section id="main">
         <div class="container">
            <div class="row">
            <div class="col-md-2">
            </div>
            <div class ="col-md-8">
              <div>
                 <h1 class="section-header-style">Travel Grant Request</h1>
              </div>

               @if ( $errors->any() )
                     <ul class="no-style">
                     @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
                     </ul>
               @endif
               <div class="page-header">
               <div class="col-md-2">
               </div>
                <div class="col-md-6">
                    <p style=" align-content: center;   font-size: 14px;    margin: 35px 15px; color: RED;font-weight: bold;letter-spacing: 1px;">
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    field with * are required</p>
                </div>
              </div>
              <br>
              <br>
               {!! Form::open(['url' => ['travelgrantsave'],'files'=> true]) !!}
                  <div class="form-group">
                     <label for="travel_event_name">Event Name*</label>
                     {!! Form::text('travel_event_name', null, ['class'=>'form-control', 'id'=>'travel_event_name'])  !!}
                  </div>
      
                  <div class="form-group">
                     <label for="travel_event_date">Event Date*</label>
                     {!! Form::text('travel_event_date', null, ['class'=>'form-control', 'id'=>'travel_event_date'])!!}
                     <span class="help-text"></span>
                  </div>

                  <div class="form-group">
                  <label for="travel_event_venue">Event Venue*</label>
                     {!! Form::text('travel_event_venue', null, ['class'=>'form-control', 'id'=>'travel_event_venue'])!!}
                  </div>
                    
                  <div class="form-group">
                  <label for="travel_event_details">Event's Other Details (Provide url / information of the event)*</label>
                       {!! Form::textarea('travel_event_details', '', ['class'=>'form-control', 'id' => 'travel_event_details' , 'rows'=>3,'cols'=>8]) !!} 
                     
                  </div>
                  
                  <div class="form-group">
                     <label for="travel_start_date">Start Date of travel*</label>
                     {!! Form::text('travel_start_date', null, ['class'=>'form-control', 'id'=>'travel_start_date'])!!}
                     <span class="help-text"></span>
                  </div>

                  <div class="form-group">
                     <label for="travel_end_date">End Date of travel*</label>
                     {!! Form::text('travel_end_date', null, ['class'=>'form-control', 'id'=>'travel_end_date'])!!}
                     <span class="help-text"></span>
                  </div>

                  <div class="form-group">
                     <label for="travel_members_count">Number of members to travel*</label>
                     {!! Form::text('travel_members_count', null, ['class'=>'form-control', 'id'=>'travel_members_count'])!!}
                  </div>

                  <div class="form-group">
                     <label for="travel_event_member_role" >Member Role*</label><br>
               {!! Form::select('travel_event_member_role', array('0' => 'Please select a member role', '1' => 'Presenter', '2' => 'Researcher','3'=>'Attendee')); !!}
               <br>
               </div>

                  <div class="form-group">
                  <label for="travel_event_request_justification">Request Justification*</label>
                       {!! Form::textarea('travel_event_request_justification', '', ['class'=>'form-control', 'id' => 'travel_event_request_justification' , 'rows'=>3,'cols'=>8]) !!} 
                     
                  </div>

                  <div class="form-group">
                     <label for="travel_event_mode">Transportation Mode*</label>
                     {!! Form::text('travel_event_mode', null, ['class'=>'form-control', 'id'=>'travel_event_mode'])!!}                  
                  </div>

                  <div class="form-group">
                     <label for="travel_event_grant_requested" >Amount Requested*</label>
                     {!! Form::text('travel_event_grant_requested', null, ['class'=>'form-control', 'id'=>'travel_event_grant_requested'])!!}
                     
                  </div>
                  <div class="form-group">
                     <label for="travel_event_member_document">Documents to be Attached*</label>
                     <input type="file" name="travel_event_member_document" id="travel_event_member_documents">
                     <p class="help-block">Please upload your documents.(Only PDF are allowed)</p>
                     
                  </div>
                  </br>
                  <div class="form-group">
                       <center><button type="button" data-toggle="modal" data-target="#submit">Submit</button>
                       <div class="modal fade" id="submit" role="dialog">
                        <div class="modal-dialog"   vertical-align: left;>
              
                          <!-- Modal content-->
                          <div class="modal-content">
                          <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"> <center> <b> <u> Confirm your request details</u> : </b></center></h4>
                          </div>

                          <div class="modal-body">
                          
                            <p> <b> <font size="4">Are you sure you have entered all correct information?</font></b></p>                          
                          </div>                      
                          <br>
                          <br>
                          <div class="modal-footer">

                            <center> {!! Form::submit('Save and Continue',['class'=>"btn btn=primary btn-lg"]) !!} &emsp;
                            <button type="button" class="btn btn-default" data-dismiss="modal">Back</button></center>

                          </div>
                          </div>
                      </div>
                      </div>
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                       <input type="button" value="Cancel" onclick="location.href='{{ route('viewalltravel') }}'"></center>
                  </div>
                 {!! Form::Close() !!}
               </div>
            </div>
          <div class="col-md-2">
          </div>
         </div>
         <br/>
         <br/>
         <br/>
         <br/>
         <br/>
         <br/>
         <br/>
         <br/>
         <br/>
         <br/>
         <br/>
         <br/>
         <br/>
         <br/>
         <br/>
         <br/>
         <br/>
         <br/>
         <br/>
      </section>
@endsection
@section('footer-scripts')
   <script>
  $(function() {
    $( "#travel_event_date" ).datepicker({
      dateFormat : 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
    }).val();

    $( "#travel_start_date" ).datepicker({
      dateFormat : 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
    }).val();

    $( "#travel_end_date" ).datepicker({
      dateFormat : 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
    }).val();
  });
  </script>
  
  <script src={{ asset("js/validateit.js") }}></script>  
@endsection
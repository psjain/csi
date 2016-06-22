@extends('frontend.master')
@section('title', 'Edit Request')
@section('main')
<style>

.control:checked ~ .conditional,
      #immigrant:checked ~ .conditional,
      #required-2:checked ~ .conditional
      #option-2:checked ~ .conditional {
        clip: auto;
        height: auto;
        margin: 0;
        overflow: visible;
        position: static;
        width: auto;
      }

      .control:not(:checked) ~ .conditional,
      #immigrant:not(:checked) ~ .conditional,
      #required-2:not(:checked) ~ .conditional,
      #option-2:not(:checked) ~ .conditional {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
      }
</style>
   <section id="main">
         <div class="container">
            <div class="row">
              <div class="col-md-2">
              </div>
              <div class ="col-md-8">
                 <h1 class="section-header-style">Travel Grant Edit Request</h1>

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
               {!! Form::open(array('route' => array('updatetravelgrant', $travel->id),'files'=> true)) !!}
                  
                  <div class="form-group">
                     <label for="travel_event_name">Event Name*</label>
                     {!! Form::text('travel_event_name', $travel->event_name, ['class'=>'form-control', 'id'=>'travel_event_name']) !!}
                  </div>
                     
                  <div class="form-group">
                     <label for="travel_event_date">Event Date*</label>
                     {!! Form::text('travel_event_date', $travel->event_date, ['class'=>'form-control', 'id'=>'travel_event_date'])!!}
                     <span class="help-text"></span>
                  </div>

                  <div class="form-group">
                  <label for="travel_event_venue">Event Venue*</label>
                     {!! Form::text('travel_event_venue', $travel->event_venue, ['class'=>'form-control', 'id'=>'travel_event_venue'])!!}
                  </div>
                  
                  <div class="form-group">
                  <label for="travel_event_details">Event's Other Details (URL / information of the event)*</label>
                       {!! Form::textarea('travel_event_details',$travel->event_details, ['class'=>'form-control', 'id' => 'travel_event_details' , 'rows'=>3,'cols'=>8]) !!} 
                     
                  </div>
                 
                  <div class="form-group">
                     <label for="travel_start_date">Start Date of travel*</label>
                     {!! Form::text('travel_start_date', $travel->journey_start_date, ['class'=>'form-control', 'id'=>'travel_start_date'])!!}
                     <span class="help-text"></span>
                  </div>

                  <div class="form-group">
                     <label for="travel_end_date">End Date of travel*</label>
                     {!! Form::text('travel_end_date', $travel->journey_end_date, ['class'=>'form-control', 'id'=>'travel_end_date'])!!}
                     <span class="help-text"></span>
                  </div>

                  <div class="form-group">
                     <label for="travel_members_count">Number of members to travel*</label>
                     {!! Form::text('travel_members_count', $travel->member_count, ['class'=>'form-control', 'id'=>'travel_members_count'])!!}
                  </div>


                  <div class="form-group">
                     <label for="travel_event_member_role" >Member Role*</label><br>
               {!! Form::select('travel_event_member_role', array('0' => 'Please select a member role', '1' => 'Presenter', '2' => 'Researcher','3'=>'Attendee'),$travel->travel_role_id); !!}
               <br>
               </div>

                  <div class="form-group">
                  <label for="travel_event_request_justification">Request Justification*</label>
                       {!! Form::textarea('travel_event_request_justification',$travel->justification, ['class'=>'form-control', 'id' => 'travel_event_request_justification' , 'rows'=>3,'cols'=>8]) !!} 
                     
                  </div>
                  <div class="form-group">
                     <label for="travel_event_mode">Transportation Mode*</label>
                     {!! Form::text('travel_event_mode', $travel->travel_mode, ['class'=>'form-control', 'id'=>'travel_event_mode'])!!}   
                  </div>
                  <div class="form-group">
                     <label for="travel_event_grant_requested" >Amount Requested*</label>
                     {!! Form::text('travel_event_grant_requested',$travel->requested_amount, ['class'=>'form-control', 'id'=>'travel_event_grant_requested'])!!}
                     
                  </div>
                  <div class="form-group">
                  Attached document:    <a target="_blank" href="{{ route('TravelGrantMemberDocument',$travel->travelversions->first()->versiondocument->document)}}">{{ $travel->travelversions->first()->versiondocument->document }}</a>
                  </div>

      <fieldset>
                    <label for="upload_document_request">Want to upload new document?</label>
                    <br>
                      <input type="radio" id="doc" value='1' default='' class="control">
                           <label for="doc"> Yes.</label>
                          <fieldset class="conditional">
       <label for="travel_event_member_document"> Select documents to be Attached*</label>
                     <input type="file" name="travel_event_member_document" id="travel_event_member_documents">
                     <p class="help-block">Please upload your documents.(file types allowed are doc/pdf)</p>
            </fieldset>
      </fieldset>
    
                </br>
                <div class="form-group">
                       <center><button type="submit">Submit</button> 
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                       <input type="button" value="Cancel" onclick="location.href='{{ route('viewalltravel') }}'"></center>
                </div>
               {!! Form::Close() !!}
              </div>
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
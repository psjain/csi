@extends('frontend.master')
@section('title', 'Register')
@section('main')
<section id="main">
         <div class="container">
            <div class="row">
               <div>
                 <h1 class="section-header-style">Confirm Request Details</h1>
               </div>

               <div class="form-group">

               		<p> <b> <font size="4">  Event Name: </b>{{ $confirm->event_name }}</font> </p>

                    <p> <b> <font size="4">  Event Date: </b>{{ $confirm->event_date }}</font> </p>

                    <p> <b> <font size="4">  Event Venue: </b>{{ $confirm->event_venue }}</font> </p>

                    <p> <b> <font size="4">  Event Details: </b>{{ $confirm->event_details }}</font> </p>
                    
                    <p> <b> <font size="4">  Start Date of Travel:</b>{{ $confirm->jounrney_start_date }}</font> </p>

                    <p> <b> <font size="4">  End Date of Travel:</b>{{ $confirm->journey_end_date }}</font> </p>

                    <p> <b> <font size="4">  Number of members to travel:</b>{{ $confirm->member_count }}</font> </p>

                    @if($confirm->travel_role == '1')

                    	<p> <b> <font size="4">  Member Role:</b>Presenter</font> </p>

                    @elseif($confirm->travel_role=='2')

                    	<p> <b> <font size="4">  Member Role:</b>Researcher</font> </p>

                    @else
                    	<p> <b> <font size="4">  Member Role:</b>Attendee</font> </p>

                    @endif
                    <p> <b> <font size="4">  Request Justification:</b>{{ $confirm->justification }} </font></p>

                    <p> <b> <font size="4">  Transportation Mode:</b>{{ $confirm->travel_mode }}</font> </p>

                    <p> <b> <font size="4">  Amount Requested:</b>{{ $confirm->requested_amount }} </font> </p>

                    {!! Form::open(array('action' => array('TravelGrantsController@store','request'=>$confirm),'files'=> true)) !!}
                    
                    <div class="form-group">
                    <center> 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {!! Form::submit('Save and Continue',['class'=>"btn btn=primary btn-lg"]) !!} &emsp;
                            
                    <button type="button" class="btn btn-default" onclick="goBack()">Back</button></center>
                    </center>
                  	</div>
                      
               		{!! Form::Close() !!}
               
               </div>
            </div>
        </div>

@endsection
@section('footer-scripts')
<script>
function goBack() {
    window.history.back();
}
</script>
@endsection
@extends('frontend.master')
@section('title', 'Edit')
@section('main')
	<section id="main">
   		<div class="container">
   			<div class="row">
   				
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

   					{!! Form::open(['url' => 'travelgrant']) !!}
					  	
						<div class="form-group">
							<label for="exampleInputPassword1">Event Name</label>
        					<input type="text" class="form-control"  name="travel_event_name" value="{{ $travel->eventname }}">

						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Event Date</label>
        					<input type="text" class="form-control"  name="travel_event_date" value="{{ $travel->date }}">

						</div>
                  <div class="form-group">
                     <label for="exampleInputPassword1">Event Venue</label>
                     <input type="text" class="form-control"  name="travel_event_venue" value="{{ $travel->venue }}">
                     
                  </div>
                  <div class="form-group">
                     <label for="exampleInputPassword1">Member Role</label>
					 <input type="text" class="form-control"  name="travel_event_role" value="{{ $travel->role }}">
                 
                  </div>
                  <div class="form-group">
                     <label for="exampleInputPassword1">Request Justification</label>
                   {!! Form::textarea('travel_event_request_justification', $travel->justification, ['class'=>'form-control','rows'=>3,'cols'=>8]) !!} 
                     
                  </div>
                  <div class="form-group">
                     <label for="exampleInputPassword1">Transportation Mode</label>
                     <input type="text" class="form-control"  name="travel_event_mode" value="{{ $travel->mode }}">
                     
                  </div>
                  <div class="form-group">
                     <label for="exampleInputPassword1">Amount Requested</label>
                     <input type="text" class="form-control"  name="travel_event_grant_requested" value="{{ $travel->grantrequested }}">
                     
                  </div>
				 
                  <div class="form-group">
                     <label for="exampleInputPassword1">Documents to be Attached</label>
					 <input type="file" name="travel_event_member_documents" id="travel_event_member_documents">
                     <p class="help-block">Please upload your documents.(file types allowed are doc/pdf</p>
                     
                  </div>
					    <div>
					        <button type="submit">Submit</button>
					    </div>
		
					{!! Form::Close() !!}
   				
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
	<script src={{ asset("js/validateit.js") }}></script>
	<script src={{ asset('js/function7.js') }}></script>
@endsection
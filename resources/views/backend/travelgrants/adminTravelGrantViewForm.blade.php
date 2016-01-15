@extends('backend.master')

@section('page-header')
    <h4>Memberships</h4>
@endsection

@section('main')
	<section id="main">
   		<div class="container">
   			<div class="row">
   				
   					<div>
					  <h1 class="section-header-style">Travel Grant Request Form</h1>
					</div>

					@if ( $errors->any() )
   						<ul class="no-style">
   						@foreach ($errors->all() as $error)
   							<li>{{ $error }}</li>
   						@endforeach
   						</ul>
   				@endif

   					{!! Form::open(['url' => '#']) !!}
					  	
						<div class="form-group">
							<label for="exampleInputPassword1">Event Name</label>
							<label for="exampleInputPassword1">{{ $travel->eventname }}</label>
        					
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Event Date</label>
        					<label for="exampleInputPassword1">{{ $travel->date }}</label>
        					
						</div>
                  		<div class="form-group">
                    		 <label for="exampleInputPassword1">Event Venue</label>
                     		<label for="exampleInputPassword1">{{ $travel->venue }}</label>
        					
                 		 </div>
                	  <div class="form-group">
                    		 <label for="exampleInputPassword1">Member Role</label>
                    		 <label for="exampleInputPassword1">{{ $travel->role }}</label>
        							
                 	 </div>
                  <div class="form-group">
                     <label for="exampleInputPassword1">Request Justification</label>
					   {!! Form::textarea('travel_event_request_justification', $travel->justification, ['class'=>'form-control','rows'=>3,'cols'=>8]) !!} 
                     
                  </div>

                 <div class="form-group">
                 		 <label for="exampleInputPassword1">Attached Documents</label>
                 		 <a href="#">click here</a>
                    

                 </div> 
                  <div class="form-group">
                     <label for="exampleInputPassword1">Transportation Mode</label>
                    <label for="exampleInputPassword1">{{ $travel->mode }}</label>
        					 
                  </div>
                  <div class="form-group">
                     <label for="exampleInputPassword1">Amount Requested</label>
                    <label for="exampleInputPassword1">{{ $travel->grantrequested }}</label>
        					 
                  </div>
                  
                  <div class="form-group">
                     <label for="exampleInputPassword1" class="req">Status</label>
                    <div class="radio">
							    <label class="radio-inline">
								 <input type="radio" name="status" id="status" value="1"> Accepted
						
								</label>
								<label class="radio-inline">
								<input type="radio" name="status" id="status" value="2"> Rejected
						
								</label>
								<label class="radio-inline">
								<input type="radio" name="status" id="status" value="3"> Revision Required
								</label>
					 </div>
                  </div>
                  <div class="form-group">
                     <label for="exampleInputPassword1">Amount Granted</label>
                       {!! Form::textarea('travel_event_request_amount granted', '', ['class'=>'form-control','rows'=>1,'cols'=>8]) !!} 
                     
                  </div>
                  

                  <div class="form-group">
                     <label for="exampleInputPassword1">Reason for Rejection</label>
                       {!! Form::textarea('travel_event_rejection', '', ['class'=>'form-control','rows'=>3,'cols'=>8]) !!} 
                     
                  </div>
				  
				  <div class="form-group">
                     <a class="btn btn-default" for="exampleInputPassword1" type="submit" action="">Submit</a>                     
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
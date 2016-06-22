@extends('backend.master')

@section('page-header')
    <h4>Travel Grants</h4>

@endsection
 
<style type="text/css">
	.ui-datepicker {
	background-color: #fff;
	border: 1px solid #66AFE9;
	border-radius: 4px;
	box-shadow: 0 0 8px rgba(102,175,233,.6);
	display: none;
	margin-top: 4px;
	padding: 10px;
	width: 240px;
}
.ui-datepicker a,
.ui-datepicker a:hover {
	text-decoration: none;
}
.ui-datepicker a:hover,
.ui-datepicker td:hover a {
	color: #2A6496;
	-webkit-transition: color 0.1s ease-in-out;
	   -moz-transition: color 0.1s ease-in-out;
	     -o-transition: color 0.1s ease-in-out;
	        transition: color 0.1s ease-in-out;
}
.ui-datepicker .ui-datepicker-header {
	margin-bottom: 4px;
	text-align: center;
}
.ui-datepicker .ui-datepicker-title {
	font-weight: 700;
}
.ui-datepicker .ui-datepicker-prev,
.ui-datepicker .ui-datepicker-next {
	cursor: default;
	font-family: 'Glyphicons Halflings';
	-webkit-font-smoothing: antialiased;
	font-style: normal;
	font-weight: normal;
	height: 20px;
	line-height: 1;
	margin-top: 2px;
	width: 30px;
}
.ui-datepicker .ui-datepicker-prev {
	float: left;
	text-align: left;
}
.ui-datepicker .ui-datepicker-next {
	float: right;
	text-align: right;
}
.ui-datepicker .ui-datepicker-prev:before {
	content: "\e079";
}
.ui-datepicker .ui-datepicker-next:before {
	content: "\e080";
}
.ui-datepicker .ui-icon {
	display: none;
}
.ui-datepicker .ui-datepicker-calendar {
  table-layout: fixed;
	width: 100%;
}
.ui-datepicker .ui-datepicker-calendar th,
.ui-datepicker .ui-datepicker-calendar td {
	text-align: center;
	padding: 4px 0;
}
.ui-datepicker .ui-datepicker-calendar td {
	border-radius: 4px;
	-webkit-transition: background-color 0.1s ease-in-out, color 0.1s ease-in-out;
	   -moz-transition: background-color 0.1s ease-in-out, color 0.1s ease-in-out;
	     -o-transition: background-color 0.1s ease-in-out, color 0.1s ease-in-out;
	        transition: background-color 0.1s ease-in-out, color 0.1s ease-in-out;
}
.ui-datepicker .ui-datepicker-calendar td:hover {
	background-color: #eee;
	cursor: pointer;
}
.ui-datepicker .ui-datepicker-calendar td a {
	text-decoration: none;
}
.ui-datepicker .ui-datepicker-current-day {
	background-color: #4289cc;
}
.ui-datepicker .ui-datepicker-current-day a {
	color: #fff
}
.ui-datepicker .ui-datepicker-calendar .ui-datepicker-unselectable:hover {
	background-color: #fff;
	cursor: default;
}
</style>
@section('main')

	<div id="filter">
		<div class="row">
			<div class="col-md-12">
           		
           		
	          
               {!! Form::open(['route' => 'adminTravelGrantView', 'method' => 'get','class' => 'form-inline']) !!}  <!--himanshu -->
         @foreach($statuses as $status)
         @if(in_array($status->id,$checkbox_array))

                         {!! Form::checkbox('status[]',$status->id,true) !!}
        @else

                         {!! Form::checkbox('status[]',$status->id) !!}
        @endif
                         {!! Form::label('status',$status->status) !!}
                        @endforeach

           &nbsp;&nbsp;
          <font size="4.5px"><b>{!! Form::label('search','Search By-') !!}</b></font>&emsp;
           {!! Form::select('search', ['0'=>'Select','1' => 'Travel Grant id',  '2' => 'Member id', '3' => 'Member Name','4' => 'Institution Name','5'=>'Email id'],$search) !!}
           &emsp;
           {!! Form::text('search_text',$search_text,['class'=>'form-control','placeholder'=>'Search text']) !!}
           &emsp;&emsp;
           <div class="form-group">
                <label for="travel_start_date"><b>Requests from date:-</b></label>
                &emsp;
                {!! Form::text('request_from_date', $fromDate, ['class'=>'form-control', 'id'=>'request_from_date','placeholder'=>'From Date'])!!}
                <span class="help-text"></span>
           </div>

           <div class="form-group">
                <label for="travel_start_date"><b>Requests upto date:-</b></label>
                &emsp;
                {!! Form::text('request_to_date', $toDate, ['class'=>'form-control', 'id'=>'request_to_date','placeholder'=>'To Date'])!!}
                <span class="help-text"></span>
           </div>

			<div class="form-group">
				 <label for="rows"><b>Records per page</b></label>
                &emsp;
				<input type="number" name="rows"  class="form-control" id="rows" value="{{ $rows }}">
			</div>

            <button type="submit" class="btn btn-default pull-right">Search</button>
		  	{!! Form::close() !!}
		  		
		  		
		    </div>
		</div>
	</div>

	<h3>Travel Grants Requests</h3>
 
    <div class="panel panel-default panel-list">
		<div class="panel-heading compact-pagination ">
	    	<div class="row">
	            <div class="col-md-9">
	            	{{-- other content --}}
	            </div>
				
				<div class="col-md-3">
					{!! $travel->appends(array_except(Request::query(), ['page']) )->render() !!}
	            </div>
	        </div>
	    </div>

		<!-- panel-body -->
		<div class="panel-body">
			@if(!($travel->isEmpty()))
			@foreach ($travel as $travels)
			<div class="card">
                	<div class="row">
						<div class="col-md-8">
								<table cellpadding="15">
               					<tr>	
									<td width="350px"> <b> @if($travels->member->membership_id==1)Institution Name : @else Member Name : @endif </b>@if($travels->member->membership_id==1) {{$travels->member->institution->name}} @else {{$travels->member->individual->first_name}}{{$travels->member->individual->middle_name}}{{$travels->member->individual->last_name}}  @endif&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; </td>
									<td width="300px"><b>Event Name:</b>{{$travels->event_name}}	&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;</td>
									<td width="300px"><b>Grant ID: </b> {{$travels->id}} <br></td>
									
									
									
								</tr>

								<tr>	
									<td> <b> Member ID: </b> {{$travels->member_id}} <br>	</td>
									<td><b>Event Venue: </b>{{$travels->event_venue}} <br></td>
									<td><b>Date of Request :</b>{{date('F d, Y', strtotime($travels->created_at))}}</td>
								
									

								</tr>
								<tr>	
									
									<!-- <td> <b> Number Of Members:</b> {{$travels->member_count}} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br></td>	 -->
									<td><b>Category: </b>@if($travels->member->membership_id==1)Institution @else Individual @endif <br></td>	

									<td><b> Event Date:</b>{{date('F d, Y', strtotime($travels->event_date))}}&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;</td>
									<td><b>StartDate :</b>{{date('F d, Y', strtotime($travels->journey_start_date))}}</td>
									
									
									
									
								</tr>

								<tr>	
									<td><b>Phone : </b>@if($travels->member->membership_id==1) {{$travels->member->institution->mobile}} @else @foreach($travels->member->phones as $phone)&nbsp;{{$phone->mobile}} @endforeach @endif&nbsp;&nbsp;&nbsp;</td>						
									
									<td><b>Member Role :</b>{{$travels->getRole($travels->travel_role_id)}}</td>
									<td><b>EndDate :</b>{{date('F d, Y', strtotime($travels->journey_end_date))}}</td>
									
									
									
								
								</tr>

									<tr>	
									<td><b>Email: </b>{{$travels->member->email}}<br></td>	
									<td></td>
									<td> <b> Requested Amount: </b>{{$travels->requested_amount}} &nbsp; &nbsp; &nbsp; &nbsp;</td>	
													
									</tr>

									<tr>
										<td></td>
										<td></td>
										@if($travels->travelversions->first()->travel_request_status_id==2)
									<td> <b> Granted Amount:</b>Granted:{{$travels->granted_amount}} <br>	</td>
									@endif
                				</table>
								
	                    </div>

						<div class="col-md-1" style="padding-top: 15px;">
							
								
	                			@if($travels->travelversions->first()->travel_request_status_id==2)
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
								<br>
							
								
							</b>
						</div> 

	                    <div class="col-md-2" style="padding-top: 15px;">
	                    	<ul class="list-unstyled" style="font-size: 16px">
	                    		<li>
	                    			<a href="{{ route('adminTravelGrantMemberProfile',$travels->id)}}">
	                    				<span class="btn btn-info" >View Details</span></a>
	                    			
	                    		</li>
	                    	</ul>
	                    </div>
	                </div>
            </div>
            <hr>
				
			@endforeach

			@else
			<p>No records</p>
		@endif	
	    </div>
	
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
@endsection

@section('footer-scripts')
   <script>
  $(function() {
    $( "#request_to_date" ).datepicker({
       inline: true,
      dateFormat : 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
    }).val();

    $( "#request_from_date" ).datepicker({
       inline: true,
      dateFormat : 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
    }).val();
});
  </script>
 <script src={{ asset("js/validateit.js") }}></script>  
@endsection
@extends('backend.master')

@section('page-header')
    <h4>Memberships</h4>
@endsection

@section('main')

	<div id="filter">
		<div class="row">
			<div class="col-md-12">
           		{!! Form::open(['route' => ['adminTravelGrantView'], 'method' => 'get', 'class' => 'form-inline' ]) !!}
           		
	            <div class="form-group">
					{!! Form::select('cat', $cat_select_options, $cat_selected) !!}
		  		</div>
		  		{!! Form::hidden('page', $page) !!}
						<button type="submit" class="btn btn-default pull-right">Search</button>
		  		{!! Form::close() !!}
		    </div>
		</div>
	</div>

	<h3>Travel Grants Requests</h3>
 
    <div class="panel panel-default panel-list">
		<div class="panel-heading compact-pagination ">
	    	<div class="row">
	            <div class="col-md-3">
	            	{{-- other content --}}
	            </div>
				
				<div class="col-md-9">
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
							<h6>{{ $travels->individual->getName()}}</h6>
							<p>
								<span>
									{{$travels->eventname}}	: {{$travels->venue}}
								</span>
							</p>
						</div>

						<div class="col-md-1">
							<h5>
								@if($travels->status=="approved")
									<span class="glyphicon glyphicon-ok-sign"></span>
								@elseif($travels->status=="rejected")
									<span class="glyphicon glyphicon-remove-sign"></span>
								@elseif($travels->status=="pending")
									<span class="glyphicon glyphicon-question-sign"></span>
								@endif
							</h5>
						</div>

						<div class="col-md-3" style="padding-top: 15px;">
							<ul class="list-unstyled" style="font-size: 16px">
								<li>
									<a href="{{ route('adminTravelGrantMemberProfile', $travels->memid)}}"><span class="glyphicon glyphicon-user"></span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			@endforeach
		@else
			<p>No records</p>
		@endif
		
	    </div>
	
        <!-- panel-footer -->

		<div class="panel-footer compact-pagination">
          	<div class="row">
       			<div class="col-md-3">
       				{{-- other content --}}
       			</div>
				<div class="col-md-9">
       				{!! $travel->appends(array_except(Request::query(), ['page']) )->render() !!}
       			</div>
      		</div>
        </div>
                    
@endsection 
@extends('backend.master')

@section('page-header')
  <h4>Travel Grant Profile</h4>
@endsection

@section('main')

    <div class="row">
		<div class="col-md-3"> 
		<!-- profile right area -->
			@include('backend.partials._profileSidebar')
        </div> <!-- profile left area -->

        <!-- profile area right -->
        <div class="col-md-9">
           @include('backend.travelgrants._memberGrantProfile')
        </div>
        
    </div>
@endsection
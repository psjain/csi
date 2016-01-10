@extends('backend.master')

@section('page-header')
    <h4>Memberships</h4>
@endsection

@section('main')


	
			<h3>Travel Grants Requests</h3>
			
			
	                
	                <div class="panel panel-default panel-list">


	                	<div class="panel-heading compact-pagination ">
	                		<div class="row">
	                			
								<div class="col-md-3">
										<h5> <b> List of Approved requests</b> </h5>
	                			</div>
	                		</div>
	                	</div>



	                    <!-- panel-body -->
	                    <div class="panel-body">
								<div class="card">
		                        	<div class="row">
										
										<div class="col-md-2">
											<h5> User Name </h5>
										</div>
					                    
					                    <div class="col-md-3">
											<h5> Event Name </h5>
										</div>

										<div class="col-md-3">
											<h5> Amount Requested </h5>
										</div>

										<div class="col-md-2">
											<h5> Amount Granted </h5>
										</div>

									</div>
		                        </div>
			            </div>



	                    <!-- panel-footer -->
	                    <div class="panel-footer compact-pagination">
	                    	<div class="row">
								<div class="col-md-3">
									<h3> ... </h3>
	                			</div>
	                		</div>
	                    </div>

	                </div>
                    
@endsection
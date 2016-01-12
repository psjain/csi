@extends('frontend.master')

@section('title', 'Sample')

@section('section-after-mainMenu')

@endsection

@section('main')
	<section>
		  <div class="container-fluid">
         
        
          <!-- Add anything from here -->

            <div class="panel panel-default panel-list">
                <!-- start panel heading -->
                <div class="panel-heading compact-pagination ">
                  <div class="row">
                    <div class="col-md-9">
                      {{-- other content --}}
                    </div>
                    <div class="col-md-3">
                        <!-- some data -->
                        <div class="btn-toolbar pull-right">
                          <div class="btn-group">
                            <a href="#" class="btn btn-default">1</a>
                            <a href="#" class="btn btn-default">2</a>
                            <a href="#" class="btn btn-default">3</a>
                          </div>
                        </div>
                    </div>
                  </div>
               </div>
                <!-- ending panel-heading -->

                {{-- starting list items --}}
                <div class="panel-body">
                    <div class="listing-items">
                      <div class="row">
                        <div class="col-md-4">
                          <h5>EVENT NAME</h5>
                      </div>
                       <div class="col-md-3">
                           <h5>DATE OF REQUEST</h5>
                      </div>
                      <div class="col-md-3">
                           <h5>AMOUNT REQUESTED</h5>
                      </div>
                      <div class="col-md-2">
                           <h5>STATUS</h5>
                      </div>
                      
                    </div>
                  </div>
                </div>
                {{-- ending list items --}}

                  <!-- panel-footer -->
                <div class="panel-footer compact-pagination">
                    <div class="row">
                      <div class="col-md-9">
                        {{-- other content --}}
                      </div>
                      <div class="col-md-3">
                          {{-- some data --}}
                      </div>
                    </div>
                  </div>
                </div>
              <!-- /.panel -->
				  <!-- Add anything till here -->
        </div>
	</section>
@endsection
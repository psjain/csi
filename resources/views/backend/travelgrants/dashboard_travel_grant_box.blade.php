
<div class="col-md-6">
      <h2>Travel Grant Requests</h2>    
      <!-- /.row -->
      <div class="row">
         <div class="col-md-12">
            <div class="panel dashboard-divs panel-primary">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col-md-12">
                        <h5 style="color: #fff">Travel Grants</h5>
                        <p>There are <span class="badge">{{$pending}}</span> request pending</p>
                     </div>
                  </div> <!-- row -->
                  <div class="row">
                     <div class="col-md-12">
                        <hr style="border-top: dashed 1px #444444"; />
                        <a href="{{ url('admin/travel-grants/view?search=0&search_text=&request_from_date=&request_to_date=&rows=15') }}" style="color:#fff">
                           <span class="pull-left">Click here to View All Travel Requests</span>
                           <span class="pull-right glyphicon glyphicon-chevron-right"></span>
                           <div class="clearfix"></div>
                        </a>
                        <hr style="border-top: dashed 1px #444444"; />
                        <a href="{{ url('admin/travel-grants/view?status%5B%5D=1&search=0&search_text=&request_from_date=&request_to_date=&rows=15') }}" style="color:#fff">
                           <span class="pull-left">Click here to process Pending Travel Requests</span>
                           <span class="pull-right glyphicon glyphicon-chevron-right"></span>
                           <div class="clearfix"></div>
                        </a>
                        <hr style="border-top: dashed 1px #444444"; />
                        <a href="{{ url('admin/travel-grants/view?status%5B%5D=2&search=0&search_text=&request_from_date=&request_to_date=&rows=15') }}" style="color:#fff">
                           <span class="pull-left">Click here to View Accepted Travel Requests</span>
                           <span class="pull-right glyphicon glyphicon-chevron-right"></span>
                           <div class="clearfix"></div>
                        </a>
                         <hr style="border-top: dashed 1px #444444"; />
                        <a href="{{ url('admin/travel-grants/view?status%5B%5D=3&search=0&search_text=&request_from_date=&request_to_date=&rows=15') }}" style="color:#fff">
                           <span class="pull-left">Click here to View Rejected Travel Requests</span>
                           <span class="pull-right glyphicon glyphicon-chevron-right"></span>
                           <div class="clearfix"></div>
                        </a>
                        <hr style="border-top: dashed 1px #444444"; />
                        <a href="{{ url('admin/travel-grants/view?status%5B%5D=4&search=0&search_text=&request_from_date=&request_to_date=&rows=15') }}" style="color:#fff">
                           <span class="pull-left">Click here to View Revised Travel Requests</span>
                           <span class="pull-right glyphicon glyphicon-chevron-right"></span>
                           <div class="clearfix"></div>
                        </a>
                        
                     </div>
                  </div> <!-- row -->
                  
               </div> <!-- panel-heading -->
            </div>   <!-- panel -->
         </div>   <!-- div.md-4 -->         
      </div> <!-- /.row -->
    </div><!--col-->
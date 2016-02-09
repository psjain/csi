<div class="col-md-12 col-sm-12 col-xs-12"> <!-- div grant details -->
	<div class="panel panel-default" id="payment-list">
    <div class="panel-heading">
		<h3>
			#Travel Grant-ID :  {{ $travel->id }}
		</h3>
		<p class="lead">
			<b>Event Name  :</b> {{ $travel->eventname }}
		</p>
		
		<div  class="row">
			<div class="col-md-8 col-sm-8 col-xs-8">
				<p>
					<span><b>Event Date :</b> {{ $travel->date }}</span>
					<span><b>Event Venue :</b> {{ $travel->venue}} </span>
					<span><b>Role :</b> {{ $travel->getRole->role}} </span>
					<span><b>Justification :</b> {{ $travel->justification }} </span>
					<span><b>Mode of Transport :</b> {{ $travel->mode }} </span>
					<span><b>Amount Requested :</b> {{ $travel->grantrequested }} </span>
				</p>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4">
				<p>Show Documents uploaded by user here</p>
			</div>
		</div>
    </div>
    
	<div class="panel-body">
		<h4>Amount To Be Granted </h4>     
        <div class="input-group">
			<span class="input-group-addon">$</span>
			<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
			<span class="input-group-addon">.00</span>
        </div>

        <h4>Any Comments!</h4>     
        <div class="form-group">
			<textarea class="form-control" rows="5" id="comment"></textarea>
        </div>    
        <input type="submit" class="btn btn-success" value="Submit Button" allign="center">
    </div>
</div>
</div> <!-- div grant details-->
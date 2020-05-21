@extends('management')

@section('title','Manage Rentals')
@section('content')


<div class="row">
	<div  class="col-md-6 mb-3">
		<div class="card borderlessCard">
			<div class="card-header">
				<h3>Scheduled Rentals</h3>
				<small>View all scheduled rentals here</small>
			</div>
			<div id="rentalSection" class="card-body">
				@if($rentals->count() > 0)
				@foreach($rentals as $rental)
				  <label class="categoryLabel">
				    <input id="rental{{$rental->id}}" type="radio" name="rental" class="request-card-input-element d-none" data-id="{{$rental->id}}" value="{{$rental->id}}">
				    <div class="card">
				    	<div class="card-header">
				    		<div class="form-row">
				   	    		<div class="col-md-6">
				   		    		<h6 class="mb-0">{{$rental->request->user->name}}</h6>
				   		    		<small>{{$rental->request->request_code}} | </small>
				   		    		<small>{{$rental->status->title}}</small>
				   		    	</div>
				   		    	<div class="col-md-6 text-right">
				   		    		<h6 class="mb-0">PHP {{$rental->request->total_rates}}</h6>
				   		    		<small>Total Rate</small>
				   		    	</div>
				    		</div>
				    	</div>
				        <div class="card-body">
				        	   <div class="form-row requestCardBody">
				    	    	   <span>
				    	    	   	<h6>Schedule</h6>
				    	    	   	<p class="pl-2">From {{$rental->request->start_date}} to {{$rental->request->end_date}}</p>
				    	    	   	<h6>Models Rented</h6>
				    	    	    <ul class="pl-2">
					    	    	    @foreach($rental->request->types as $type)
					    	    	    	<li>{{$type->pivot->quantity}} of {{$type->model}}</li>
					    	    	    @endforeach
				    	    	    </ul>
				    	    	   	<h6>Assigned Fleet</h6>
				    	    	   		@foreach($rental->assets as $asset)
				    	    	   			<h6 class="pl-2 mt-3 mb-0">{{$asset->type->model}}</h6>
				    	    	   			<small class="pl-2">{{$asset->type->make->brand}} | {{$asset->type->year}} | {{$asset->type->trim}} | {{$asset->type->body}}</small>
				    	    	   			
				    	    	   		@endforeach
				    	    	  </span>
				    	    	</div>
				        </div>
				    </div>
				    
				  </label>
				@endforeach
				@else
					<h6 class="text-muted text-center">No scheduled rentals as of the moment</h6>
				@endif
			</div>
			<div class="card-footer">
				<button id="btnOngoing" class="btn btn-primary">Start rental</button>
				{{-- <button id="btnDelete" class="btn btn-danger">Cancel</button> --}}
			</div>
		</div>
		
	</div>
	<div class="col-md-6">
		<div class="card borderlessCard">
			<div class="card-header">
				<h3>Ongoing Rentals</h3>
				<small>All ongoing rentals here</small>
			</div>
			<div id="ongoingSection" class="card-body">
			 @if($ongoingRentals->count() > 0)
				@foreach($ongoingRentals as $ongoingRental)
				  <label class="categoryLabel">
				    <input id="ongoingRental{{$ongoingRental->id}}" type="radio" name="ongoingRental" class="request-card-input-element d-none" data-id="{{$ongoingRental->id}}" value="{{$ongoingRental->id}}">
				    <div class="card">
				    	<div class="card-header">
				    		<div class="form-row">
				   	    		<div class="col-md-6">
				   		    		<h6 class="mb-0">{{$ongoingRental->request->user->name}}</h6>
				   		    		<small>{{$ongoingRental->request->request_code}} | </small>
				   		    		<small>{{$ongoingRental->status->title}}</small>
				   		    	</div>
				   		    	<div class="col-md-6 text-right">
				   		    		<h6 class="mb-0">PHP {{$ongoingRental->request->total_rates}}</h6>
				   		    		<small>Total Rate</small>
				   		    	</div>
				    		</div>
				    	</div>
				        <div class="card-body">
				        	   <div class="form-row requestCardBody">
				    	    	   <span>
				    	    	   	<h6>Schedule</h6>
				    	    	   	<p class="pl-2">From {{$ongoingRental->request->start_date}} to {{$ongoingRental->request->end_date}}</p>
				    	    	   	<h6>Models Rented</h6>
				    	    	    <ul class="pl-2">
					    	    	    @foreach($ongoingRental->request->types as $type)
					    	    	    	<li>{{$type->pivot->quantity}} of {{$type->model}}</li>
					    	    	    @endforeach
				    	    	    </ul>
				    	    	   	<h6>Assigned Fleet</h6>
				    	    	   		@foreach($ongoingRental->assets as $asset)
				    	    	   			<h6 class="pl-2 mt-3 mb-0">{{$asset->type->model}} | {{$asset->plate_no}}</h6>
				    	    	   			<small class="pl-2">{{$asset->type->make->brand}} | {{$asset->type->year}} | {{$asset->type->trim}} | {{$asset->type->body}}</small>
				    	    	   			
				    	    	   		@endforeach
				    	    	  </span>
				    	    	</div>
				        </div>
				    </div>
				    
				  </label>
				@endforeach
				@else
					<h6 class="text-muted text-center">No ongoing rentals as of the moment</h6>
				@endif
			</div>
			<div class="card-footer">
				<button id="btnComplete" class="btn btn-primary">Complete</button>
			</div>
		</div>
	</div>
	
	{{-- @foreach($requests as $request)
		<p>{{$request->approval->title}}</p>
		<p>{{$request->user->name}}</p>
		<p>{{$request->total_rates}}</p>
			<ul>
				@foreach($request->types as $type)
					<li>{{$type->model}} {{$type->pivot->quantity}}</li>
				@endforeach
			</ul>
	@endforeach --}}


</div>

@stop

@section('specificJS')
	<script type="text/javascript" src="{{asset('/js/manage_rental.js')}}"></script>
@endsection
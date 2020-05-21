@extends('management')

@section('title','Manage Requests')
@section('content')


<div class="row">
	<div  class="col-md-6 mb-3">
		<div class="card borderlessCard">
			<div class="card-header">
				<h3>Manage Requests</h3>
				<small>All pending requests here</small>
			</div>
			<div id="requestSection" class="card-body">
				@foreach($requests as $request)
				  <label class="categoryLabel">
				    <input id="request{{$request->id}}" type="radio" name="request" class="request-card-input-element d-none" data-id="{{$request->id}}" value="{{$request->id}}">
				    <div class="card">
				    	<div class="card-header">
				    		<div class="form-row">
				   	    		<div class="col-md-6">
				   		    		<h6 class="mb-0">{{$request->user->name}}</h6>
				   		    		<small>{{$request->request_code}}</small>
				   		    		<small>{{$request->approval->title}}</small>
				   		    	</div>
				   		    	<div class="col-md-6 text-right">
				   		    		<h6 class="mb-0">PHP {{$request->total_rates}}</h6>
				   		    		<small>Total Rate</small>
				   		    	</div>
				    		</div>
				    	</div>
				        <div class="card-body">
				        	   <div class="form-row requestCardBody">
				    	    	   <span>
				    	    	   	<h6>Schedule</h6>
				    	    	   	<p class="pl-2">From {{$request->start_date}} to {{$request->end_date}}</p>
				    	    	   	<h6>Contact</h6>
				    	    	   	<p class="pl-2">{{$request->user->mobile_no}}</p> 
				    	    	   	<h6>Requesting</h6>
				    	    	    <ul class="pl-2">
					    	    	    @foreach($request->types as $type)
					    	    	    	<li>{{$type->pivot->quantity}} of {{$type->model}}</li>
					    	    	    @endforeach
				    	    	    </ul>
				    	    	  </span>
				    	    	</div>
				        </div>
				    </div>
				    
				  </label>
				@endforeach
			</div>
			<div class="card-footer">
				
			</div>
		</div>
		
	</div>
	<div class="col-md-6">
		<div class="card borderlessCard">
			<div class="card-header">
				<h3>Available Vehicles</h3>
				<small>All available vehicles here</small>
			</div>
			<div id="fleetSection" class="card-body">
			 @if($assets != null)
				@foreach($assets as $model => $fleets)

				  <h5 class="mb-3">{{$model}}</h5>	
				  @if($fleets->count() > 0)
				  @foreach($fleets as $fleet)
					   <label class="categoryLabel">
					    <input type="checkbox" name="fleet" class="card-input-element d-none" id="fleet{{$fleet->id}}" data-id="{{$fleet->id}}" value="{{$fleet->id}}">
					    <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
					         <span>
					         	<p>{{$fleet->plate_no}}</p>
					         	<small>{{$fleet->vin}}</small>
					         </span>
					    </div>
					  </label>
				  @endforeach
				  @else
				  	<h6 class="text-muted text-center">No Vehicles</h6>
				  @endif
				  <hr class="mt-0">
				@endforeach
			@else
				<h6 class="text-muted text-center">Please select a request</h6>
			@endif
				
			</div>
			<div class="card-footer text-center">
				<button id="btnApprove" class="btn btn-primary">Approve and Assign Vehicles</button>
				<button id="btnReject" class="btn btn-danger">Reject</button>
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
	<script type="text/javascript" src="{{asset('/js/manage_request.js')}}"></script>
@endsection
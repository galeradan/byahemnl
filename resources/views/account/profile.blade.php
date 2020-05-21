@extends('main')

@section('title', 'Profile');

@section('content')



<div class="container">
	<div class="row mt-3">
		<div class="col-md-12">
			<h1 id="h1" class="title">Profile</h1>
			<p>Welcome back!</p>
			<hr>
		</div>
		
	</div>

	<div class="row">	
		@foreach($userRequests as $request)
		<div class="col-md-4">
			  <label class="categoryLabel">
			    {{-- <input id="request{{$request->id}}" type="radio" name="request" class="request-card-input-element d-none" data-id="{{$request->id}}" value="{{$request->id}}"> --}}
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
			    	    	   	Schedule
			    	    	   	<p>From {{$request->start_date}} to {{$request->end_date}}</p>
			    	    	    <ul>
				    	    	    @foreach($request->types as $type)
				    	    	    	<li>{{$type->pivot->quantity}} of {{$type->model}}</li>
				    	    	    @endforeach
			    	    	    </ul>
			    	    	  </span>
			    	    	</div>
			        </div>
			    </div>
			    
			  </label>
		</div>
		@endforeach
	</div>	
</div>

@endsection
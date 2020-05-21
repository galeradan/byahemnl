@extends('main')

@section('title', 'Reservation')

@section('content')

<div class="container mb-3">
	<div class="row mb-3 mt-3 d-flex justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div id="requestHeader" class="card-header">
					<h3>Request</h3>
					<small>Provide the information of your request</small>
				</div>
				<div id="requestBody">
					<div class="card-body">
						<div class="form-row d-flex justify-content-center">
							<div class="col-md-9">
								<h5 class="text-center m-0">On these dates</h5 >
								<p class="text-center">
								<small class="text-muted">Enter the dates below. Minimum of 1 day (24hrs)</small>
								</p>
								<p class="text-right m-0"><small class="text-muted"><strong id="days">0</strong> days selected</small></p>
								<input id="date" type="text" name="date" class="form-control" placeholder="Set start and end date here">
							</div>
						</div>
						<div class="form-row mt-3 d-flex justify-content-center">
							<div class="col-md-9">
								<h5 class="text-center m-0">I want to rent a</h5>
								<p class="text-center"><small class="text-muted">Select one below</small></p>
								@foreach($categories as $category)
								  <label class="categoryLabel">
								    <input type="radio" name="category" class="card-input-element d-none" id="category{{$category->id}}" data-id="{{$category->id}}" value="{{$category->id}}">
								    <div class="card card-body d-flex flex-row justify-content-between align-items-center">
								         <h6 class="m-0">{{$category->title}}</h6>
								    </div>
								  </label>
								@endforeach
							</div>
						</div>
						
					</div>
					<div id="requestFooter" class="card-footer text-center">
						<button id="btnProceedRequest" class="btn btn-primary">Proceed</button>
						
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="row mb-3 d-flex justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div id="chooseHeader" class="card-header">
					<h3>Choose</h3>
					<small>Select the models you want to rent</small>
				</div>
				<div id="chooseBody">
					
					<div class="card-body ">
						<div class="form-row mt-3 d-flex justify-content-center">
							<div class="col-md-8">
								<h5 class="text-center">What model(s) would you like to rent?</h5 >
								<p class="text-center"><small class="text-muted">Choose one or multiple and set the quantity</small></p>
								@foreach($models as $model)
								  <label class="categoryLabel">
								    <input type="checkbox" name="model" class="card-input-element d-none" id="model{{$model->id}}" data-id="{{$model->id}}" value="{{$model->id}}">
								    <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
								    	<div class="form-row">
								    		<div class="col">
								    	 	<span class="d-flex flex-column">
								    	     
								    	      <h6 class="m-0">{{$model->model}} </h6>
								    	      <small> {{$model->make->brand}} | {{$model->year}} | {{$model->trim}} {{$model->body}}</small>
								    			 <input id="quantityInput{{$model->id}}" type="number" name="quantity" class="form-control qtyInput" placeholder="Set quantity">
								    		</span>
								    		
								    		</div>
								    	</div>

								    	<h6>PHP {{$model->rates}}</h6>
								    	

								    </div>								         

								  </label>
								@endforeach
							</div>
						</div>

					</div>
					
				</div>
				<div id="chooseFooter" class="card-footer text-center">
					<button id="btnBackChoose" class="btn btn-primary">Back</button>
					<button id="btnProceedChoose" class="btn btn-primary">Proceed</button>
					
				</div>

			</div>
		</div>
	</div>
	<div class="row mb-3 d-flex justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div id="confirmHeader" class="card-header">
					<h3>Confirm</h3>
					<small>Read carefully the details below before you submit the request</small>
				</div>
				<div id="confirmBody" class="card-body ">
					@if($models_cart != null)
					<div class="form-row mt-3 d-flex justify-content-center">
						<div class="col-md-12">
							<h4 class="">Schedule Date</h4>
							<p>{{$startDate." - ".$endDate}}</p>
							{{-- <h4>Category: Bus</h4> --}}
							<h4>Models</h4>
							<hr>
							<ul class="list-group list-group-flush">
								@foreach($models_cart as $model)
								<li class="list-group-item d-flex justify-content-between">
									<span>
										<h6 class="m-0">{{$model->quantity." x ".$model->model}}</h6>
										<small>{{$model->make->brand}} | {{$model->year}} | {{$model->trim}} | {{$model->body}}</small>
									</span>
									<span class="text-right">
										<small>sub-total</small>
										<p class="text-right mb-0"><strong>{{$model->subtotal}}</strong></p>
										<small class="text-muted">{{$model->rates."/day x ".$days." days"}}</small>
									</span>
								</li>
								@endforeach
							</ul>
							<hr>
							<span class="d-flex justify-content-between">
								<h4>Total</h4>
								<h4 id="total">{{$totals}}</h4>
							</span>
						</div>
					</div>
					@endif
				</div>
				<div id="confirmFooter" class="card-footer text-center">
					<button id="btnBackConfirm" class="btn btn-primary">Edit</button>
					<button id="btnSubmitConfirm" class="btn btn-primary">Submit</button>
					
				</div>

			</div>
		</div>
	</div>
</div>
	

@endsection


@section('specificJS')
	<script type="text/javascript" src="{{asset('/js/reservation.js')}}"></script>
@endsection
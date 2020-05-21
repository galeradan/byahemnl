
@extends('main')


@section('title', 'Home');

@section('content')

<div class="container">

	<div class="row">
		<div class="col-md-8">
			<h1>Rates</h1>
			<small>View all rates here. <a href="/reservation" class="btn btn-primary">Reserve Now</a></small>
		</div>
		<div class="col-md-4"></div>

	</div>
	

	<hr>
	<div class="row mb-3 d-flex justify-content-center">


	@foreach($models as $model)
		<div class="col-md-3">
			<div class="card">
				<div  class="card-header">
					<h3>{{$model->model}} </h3>
					<small>{{$model->category->title}}</small>
					<small> {{$model->make->brand}} | {{$model->year}} | {{$model->trim}} {{$model->body}}</small>
				</div>
				<div >
					
				<div class="card-body ">
					<div class="form-row">
						<div class="col">
					 	<span class="d-flex flex-column">
					     
					      <h6>PHP {{$model->rates}} / Day</h6>
					      
					
						</span>
						
						</div>
					</div>

					
					
				</div>

			</div>
		</div>
	</div>
		@endforeach

	</div>


</div>


@endsection

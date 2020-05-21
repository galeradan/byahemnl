
@extends('main')


@section('title', 'Home');

@section('content')

<div class="container-fluid">
	<div class="home vh-90 row justify-content-center">
				{{-- <div class="col-md-4 d-flex flex-column justify-content-center">
					<img src="../assets/images/svg3.svg" class="img-fluid img-max-h">
				</div> --}}
				<div class="col-md-5 d-flex flex-column justify-content-center">
					<h4 class="font-neutralb text-center">Vehicle Rental Made Easy</h4>
					<button id="btnScreen" class="btn btn-styling bg-accent font-neutralw">See Rates</button>
				</div>
			</div>
</div>


@endsection

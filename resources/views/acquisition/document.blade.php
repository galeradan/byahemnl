@extends('management')

@section('title','Make')
@section('content')


<div class="jumbotron">
	<h1 id="h1" class="title">Documents</h1>
	<p>Welcome, to Documents</p>
</div>

@stop

@push('externalJS')
<script type="text/javascript" src="{{asset('/js/make.js')}}"></script>
@endpush
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">


	<title>ByaheMNL | @yield('title')</title>

	{{-- Google Fonts --}}
	{{-- <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600&display=swap" rel="stylesheet"> --}}
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Rubik:wght@500&family=Source+Sans+Pro&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	{{-- fontawesome --}}
	<script src="https://kit.fontawesome.com/8a9df979a3.js" crossorigin="anonymous"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	{{-- External CSS --}}
	<link rel="stylesheet" type="text/css" href="{{asset('/css/style.css')}}">


</head>
<body>

	{{-- navbar --}}
	<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
	  <a class="navbar-brand" href="#">ByaheMNL</a>
	  {{-- <span class="mr-auto">Admin</span> --}}
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	  	<ul class="navbar-nav ml-auto">
	  	@guest
	  		<li class="nav-item active">
	  		  <a class="nav-link" href="/rates">Rates</a>
	  		</li>
	  		<li class="nav-item active">
	  		  <a class="nav-link" href="/reservation">Reservation</a>
	  		</li>
	  	    <li class="nav-item">
	  	        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
	  	    </li>
	  	    @if (Route::has('register'))
	  	        <li class="nav-item">
	  	            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
	  	        </li>
	  	    @endif

	  	@else
	  		<li class="nav-item active">
	  		  <a class="nav-link" href="/rates">Rates</a>
	  		</li>
	  		<li class="nav-item active">
	  		  <a class="nav-link" href="/reservation">Reservation</a>
	  		</li>
	  		@if(Auth::user()->role_id==1)
	  			<li class="nav-item active">
	  			  <a class="nav-link" href="/dashboard">Manage</a>
	  			</li>
	  		@endif
	  		<li class="nav-item active">
	  			  <a class="nav-link" href="/profile">Profile</a>
	  			</li>
	  	    <li class="nav-item dropdown">
	  	        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	  	            {{ Auth::user()->name }} <span class="caret"></span>
	  	        </a>

	  	        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	  	            <a class="dropdown-item" href="{{ route('logout') }}"
	  	               onclick="event.preventDefault();
	  	                             document.getElementById('logout-form').submit();">
	  	                {{ __('Logout') }}
	  	            </a>

	  	            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	  	                @csrf
	  	            </form>
	  	        </div>
	  	    </li>
	  	@endguest

	    
	      
	    </ul>
	  </div>
	</nav>
	{{-- end of navbar --}}

	<div class="wrapper after-nav d-flex flex-column align-items-stretch">
		<main class="container-fluid px-0">
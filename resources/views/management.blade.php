@include('partials.header')

@section('title','Management')

		{{-- start of page-wrapper: sidebar & content --}}
		<div class="page-wrapper toggled">
		  <a id="show-sidebar" class="btn btn-sm" href="#">
		    {{-- <i class="fas fa-bars"></i> --}}
		    <span>Menu</span>
		  </a>

		  <nav id="sidebar" class="sidebar-wrapper mb-auto">
		    <div class="sidebar-content mt-3">
		     {{-- Sidebar: Brand and Close  --}}
		      <div class="sidebar-brand mx-3 d-flex justify-content-between">
		        <h4 href="#" class="mb-0">Menu</h4>
		        <div id="close-sidebar">
		          <i class="fas fa-times"></i>
		        </div>
		      </div>

		      <hr>
		     {{-- End of Sidebar: Brand and Close --}}
		      
		      <div class="sidebar-menu">
		        <ul class="list-group">

		       	  <li class="list-group-item sidebar-dropdown">
			          <a class="sidenav-main-link" href="/dashboard">
			              <i class="fas fa-chart-line"></i>
			              <span>Dashboard</span>
			              {{-- <span class="badge badge-pill badge-primary">Beta</span> --}}
			          </a>
		          </li>    
		          <li class="list-group-item sidebar-dropdown">
		            <a class="sidenav-main-link" href="#">
		              <i class="fas fa-plus-square"></i>
		              <span>Acquisition</span>
		              {{-- <span class="badge badge-pill badge-warning">New</span> --}}
		            </a>
		            <div class="sidebar-submenu">
		              <ul class="list-group">
		                <li class="sublist-group-item">
		                  <a class="sidenav-link" href="/makes">Make
		                    {{-- <span class="badge badge-pill badge-success"></span> --}}
		                  </a>
		                </li>
		                <li class="sublist-group-item">
		                  <a class="sidenav-link " href="/models">Model & Rates</a>
		                </li>
		                <li class="sublist-group-item">
		                  <a class="sidenav-link" href="/garages">Garages</a>
		                </li>
		                <li class="sublist-group-item">
		                  <a class="sidenav-link" href="/fleets">Fleet</a>
		                </li>
		               {{--  <li class="sublist-group-item">
		                  <a class="sidenav-link" href="/documents">Documents</a>
		                </li> --}}
		              </ul>
		            </div>
		          </li>
		          {{-- <li class="list-group-item sidebar-dropdown">
		            <a class="sidenav-main-link" href="#">
		              <i class="fas fa-tools"></i>
		              <span>Maintenance</span>
		              <span class="badge badge-pill badge-danger">3</span>
		            </a>
		            <div class="sidebar-submenu">
		              <ul class="list-group">
		                <li class="sublist-group-item">
		                  <a href="#">View

		                  </a>
		                </li>
		                <li class="sublist-group-item">
		                  <a href="#">Records</a>
		                </li>
		                <li class="sublist-group-item">
		                  <a href="#">Checklist</a>
		                </li>
		              </ul>
		            </div>
		          </li> --}}
		          <li class="list-group-item sidebar-dropdown">
		            <a class="sidenav-main-link" href="#">
		              <i class="fas fa-bus"></i>
		              <span>Rentals</span>
		            </a>
		            <div class="sidebar-submenu">
		              <ul class="list-group">
		                <li class="sublist-group-item">
		                  <a href="/rentals">Manage</a>
		                </li>
		                {{-- <li class="sublist-group-item">
		                  <a href="#">Available</a>
		                </li> --}}
		              </ul>
		            </div>
		          </li>
		          <li class="list-group-item sidebar-dropdown">
		            <a class="sidenav-main-link" href="#">
		              <i class="fas fa-clipboard-list"></i>
		              <span>Requests</span>
		            </a>
		            <div class="sidebar-submenu">
		              <ul class="list-group">
		                <li class="sublist-group-item">
		                  <a href="/requests">Manage</a>
		                </li>
		                <li class="sublist-group-item">
		                  <a href="#">History</a>
		                </li>
		                
		              </ul>
		            </div>
		          </li>
		        </ul>
		      </div>
		      <!-- sidebar-menu  -->
		    </div>
		  </nav>
		  <!-- sidebar-wrapper  -->


			  <main class="page-content">
			    <div class="container content">

			    	@yield('content')
			    	
			    </div>
			  </main>
			  <!-- end of page-content" -->
		  
		  	<!-- start of footer -->
		   </div>
		   <!-- end of page-wrapper -->



@push('externalJS')
	<script type="text/javascript" src="{{asset('/js/management.js')}}"></script>
@endpush
	

@include('partials.footer-management')

	


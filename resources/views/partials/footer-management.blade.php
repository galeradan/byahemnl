		</main>
		<!-- end of main content -->
	
	</div>
	<!-- end of main wrapper -->

	
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	{{-- External JS --}}
	<script type="text/javascript" src="{{asset('/js/script.js')}}"></script>

	{{-- External JS per yield --}}
	@stack('externalJS')

	@yield('specificJS')

</body>
</html>

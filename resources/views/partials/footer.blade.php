		</main>
		<!-- end of main content -->
	

		<!-- start-footer -->
	 	<footer class="footer bg-footer mt-auto">
	      <div class="container-fluid py-3 font-neutralw">
	        <div class="row justify-content-center font-neutralw">

	          <div class="col-md-4">
	            <h6 class="footer-h6"><strong>About Byahe</strong></h6>
	            <p class="mb-0">
	              <small class="footer-small">ByaheMNL is an asset management system develop for companies that has a fleet that they want to be rented especially during the pandemic</a></small>
	            </p>
	          </div>

	    
	          <!-- start of disclaimer -->
	          <div class="col-md-4">
	            <h6 class="footer-h6"><strong>Content disclaimer</strong></h6>
	            <p class="mb-0">
	              <small class="footer-small">
	                This website is for educational purposes only and not for commercial use. 
	              </small>
	            </p>
	          </div>
	          <!-- end disclaimer -->
	          
	        </div>
	        
	         
	        <!-- <div class="row justify-content-center mt-3">
	          <div class="col-md-12">
	            <div class="alert alert-footer" role="alert">
	              This is for educational purposes only. Not for sale.
	            </div>
	          </div>
	        </div> -->
	        

	      </div>
	    </footer>
	</div>
	<!-- end of main wrapper -->


	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	{{-- Javascript for datepicker --}}
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

	{{-- css for date picker --}}
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

	{{-- External JS --}}
	<script type="text/javascript" src="{{asset('/js/script.js')}}"></script>

	{{-- External JS per yield --}}
	@stack('externalJS')

	@yield('specificJS')

</body>
</html>



$(document).ready(function(){

 let requestID;

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$(document).on("change","input[name='rental']", function(){
		    // Do something interesting here
		    rentalID = $(this).val();
		    // alert(rentalID);
		    // $.ajax({
			   //        url: "/requests/"+requestID,
			   //        type: 'get',
			   //        data: {
			   //        	'_token': $('input[name=_token]').val(),
			   //        	id:requestID,
			   //        },
			   //        success: function(result) {
			   //            // Do something with the result
			   //            // $('#chooseBody').load(document.URL +  ' #chooseBody');
			   //            var data = $('<div />').append(result).find('#fleetSection').html();
			   //                        $('#fleetSection').html(data);

			   //            // console.log(result);
			   //            // window.location.href = "/models"
			   //        }
			   //    });
		});


	$(document).on('click', '#btnOngoing', function( event) {

		event.preventDefault();
		// alert(requestID);
		let id = rentalID;
		let status_id = 1;
		// $("#confirmModal").modal('show');
		// $("#modalDelete").hide();
		// $("#modalSave").show();
		// $(".modal-title").text('Confirm Changes');
		// $(".modal-text").html('Are you sure you want to save new info?');
		$.ajax({
	          url: "/rentals/"+rentalID,
	          type: 'PATCH',
	          data: {
	          	'_token': $('input[name=_token]').val(),
	          	id:id,
	          	status_id:status_id,
	          },
	          success: function(result) {
	              // Do something with the result
	              // alert(result.message);
	              
	              $('#rentalSection').load(document.URL +  ' #rentalSection > *');
	              // $('#fleetSection').load(document.URL +  ' #fleetSection > *');
	              // $('#alert-add').html('<strong>Successfully Updated!</strong> Please check it on the list below');
	              // $('#alert-add').fadeIn(200, function(){
	              // });
	          }
	      }); 
	});


	$(document).on("change","input[name='ongoingRental']", function(){
		    // Do something interesting here
		    ongoingRentalID = $(this).val();
		    // alert(rentalID);
		    // $.ajax({
			   //        url: "/requests/"+requestID,
			   //        type: 'get',
			   //        data: {
			   //        	'_token': $('input[name=_token]').val(),
			   //        	id:requestID,
			   //        },
			   //        success: function(result) {
			   //            // Do something with the result
			   //            // $('#chooseBody').load(document.URL +  ' #chooseBody');
			   //            var data = $('<div />').append(result).find('#fleetSection').html();
			   //                        $('#fleetSection').html(data);

			   //            // console.log(result);
			   //            // window.location.href = "/models"
			   //        }
			   //    });
		});

	$(document).on('click', '#btnComplete', function( event) {

		event.preventDefault();
		// alert(requestID);
		let id = ongoingRentalID;
		let status_id = 3;
		// $("#confirmModal").modal('show');
		// $("#modalDelete").hide();
		// $("#modalSave").show();
		// $(".modal-title").text('Confirm Changes');
		// $(".modal-text").html('Are you sure you want to save new info?');
		$.ajax({
	          url: "/rentals/"+ongoingRentalID,
	          type: 'PATCH',
	          data: {
	          	'_token': $('input[name=_token]').val(),
	          	id:id,
	          	status_id:status_id,
	          },
	          success: function(result) {
	              // Do something with the result
	              // alert(result.message);
	              
	              $('#rentalSection').load(document.URL +  ' #rentalSection > *');
	              $('#ongoingSection').load(document.URL +  ' #ongoingSection > *');
	              // $('#fleetSection').load(document.URL +  ' #fleetSection > *');
	              // $('#alert-add').html('<strong>Successfully Updated!</strong> Please check it on the list below');
	              // $('#alert-add').fadeIn(200, function(){
	              // });
	          }
	      }); 
	});

});

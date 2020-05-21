

$(document).ready(function(){

 let requestID;

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$(document).on("change","input[name='request']", function(){
		    // Do something interesting here
		    requestID = $(this).val();
		    // alert(requestID);
		    $.ajax({
			          url: "/requests/"+requestID,
			          type: 'get',
			          data: {
			          	'_token': $('input[name=_token]').val(),
			          	id:requestID,
			          },
			          success: function(result) {
			              // Do something with the result
			              // $('#chooseBody').load(document.URL +  ' #chooseBody');
			              var data = $('<div />').append(result).find('#fleetSection').html();
			                          $('#fleetSection').html(data);

			              // console.log(result);
			              // window.location.href = "/models"
			          }
			      });
		});


	$(document).on('click', '#btnReject', function( event) {

		event.preventDefault();
		// alert(requestID);
		let id = requestID;
		let approval_id = 3;
		// $("#confirmModal").modal('show');
		// $("#modalDelete").hide();
		// $("#modalSave").show();
		// $(".modal-title").text('Confirm Changes');
		// $(".modal-text").html('Are you sure you want to save new info?');
		$.ajax({
	          url: "/requests/"+requestID,
	          type: 'PATCH',
	          data: {
	          	'_token': $('input[name=_token]').val(),
	          	id:id,
	          	approval_id:approval_id,
	          },
	          success: function(result) {
	              // Do something with the result
	              // alert(result.message);
	              
	              $('#requestSection').load(document.URL +  ' #requestSection > *');
	              $('#fleetSection').load(document.URL +  ' #fleetSection > *');
	              // $('#alert-add').html('<strong>Successfully Updated!</strong> Please check it on the list below');
	              // $('#alert-add').fadeIn(200, function(){
	              // });
	          }
	      }); 
	});


	$(document).on('click', '#btnApprove', function( event) {

		event.preventDefault();
		// alert(requestID);
		let id = requestID;
		let approval_id = 2;
		let models = {};
		$.each($("input[name='fleet']:checked"), function(){
		    // models.push($(this).val());
		    let modelID = $(this).val();
		    models[modelID] = parseInt(modelID);
		});

		// console.log({models});
		// $("#confirmModal").modal('show');
		// $("#modalDelete").hide();
		// $("#modalSave").show();
		// $(".modal-title").text('Confirm Changes');
		// $(".modal-text").html('Are you sure you want to save new info?');
		$.ajax({
	          url: "/rentals",
	          type: 'POST',
	          data: {
	          	'_token': $('input[name=_token]').val(),
	          	id:id,
	          	approval_id:approval_id,
	          	models:models,
	          },
	          success: function(result) {
	              // Do something with the result
	              // alert(result.message);
	              
	              $('#requestSection').load(document.URL +  ' #requestSection > *');
	              $('#fleetSection').load(document.URL +  ' #fleetSection > *');
	              // $('#alert-add').html('<strong>Successfully Updated!</strong> Please check it on the list below');
	              // $('#alert-add').fadeIn(200, function(){
	              // });
	          }
	      }); 
	});




});

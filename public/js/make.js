

$(document).ready(function(){

	// Swal.fire({
	//   // position: 'top-end',
	//   target: 'body',
	//   icon: 'success',
	//   toast: true,
	//   title: 'Successfully Saved!',
	//   showConfirmButton: false,
	//   timer: 1500
	// })

	$('#showForm').click(function(){
		$('#showForm').fadeOut(200, function(){
			$("#alert-add").fadeOut(400,function(){
				$('#addForm').slideDown(400);
			});
		});
	});

	$('#btnCancel').click(function(){
		$('#addForm').slideUp(200, function(){
			$("#brand").val("");
			$("#contact").val("");
			$("#dealer").val("");
			$('#showForm').fadeIn(400);
		});
	});


	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	
	$('.editInput').hide();
	$('.save').hide();
	$('.cancel').hide();
	
	

	$('#btnSave').click(function(){
	    	var brand = $("#brand").val();
	    	var contact = $("#contact").val();
	    	var dealer = $("#dealer").val();

	    	// alert(brand);
	    	if (brand != null && contact !=null && dealer != null) {
	    		$.ajax({
	    		    url:'/makes',
	    		    type:'POST',
	    		    data:{
	    		    	'_token': $('input[name=_token]').val(),
	    		        brand:brand,
	    		        contact:contact,
	    		        dealer:dealer
	    		        // ctgr:ctgr
	    		    },
	    		    success:function(data){


	    		    	$('#table-container').load(document.URL +  ' #table-container');
	    		    	$("#brand").val("");
	    		    	$("#contact").val("");
	    		    	$("#dealer").val("");
	    		    	
	    		    	$('#addForm').slideUp(200, function(){

	    		    		$('#alert-add').html('<strong>Successfully added!</strong> Please check it on the list below');
	    		    		$('#alert-add').fadeIn(200, function(){
	    		    		});
	    		    			$("#showForm").fadeIn(200);
	    		    		
	    		    	});
	    		       	    
	    		    },
	    		    error:function(error){
	    		    	console.log('error' + error);
	    		    }
	    		});
	    	}
	    	else{
	    		alert('error dito');
	    	}

	    	$('.editInput').hide();
	    	$('.save').hide();
	    	$('.cancel').hide();
	});
	// end of btnSave


	$(document).on('change', '#filterBy', function(event) {
		let filterValue = $("#filterBy").children("option:selected").val()
		// alert(filterValue);


		$.ajax({
	          url: "/makes",
	          type: 'get',
	          data: {
	          	'_token': $('input[name=_token]').val(),
	          	filterValue:filterValue
	          },
	          success: function(result) {
	              // Do something with the result
	              // $('#table-container').load(document.URL +  ' #table-container');
	              var data = $('<div />').append(result).find('#table-container').html();
	                          $('#table-container').html(data);
	              // console.log("Okay naman" + result);
	              // window.location.href = "/models"
	          }
	      }); 
	});


	$(document).on('click', '.edit', function(event) {

		event.preventDefault();

		var itemID = $(this).data('id');
		var brand = $("#brand"+itemID).html();
		var contact = $("#contact"+itemID).html();
		var dealer = $("#dealer"+itemID).html();

		$("#brandInput"+itemID).val(brand);
		$("#contactInput"+itemID).val(contact);
		$("#dealerInput"+itemID).val(dealer);

		
		$('.editSpan'+itemID).fadeOut(300,function(){
			$('.editItem'+itemID).fadeIn(300);
		});
		
		$('.editBtn'+itemID).fadeOut(300, function(){
			$('.saveItem'+itemID).fadeIn(300);
		});

		$('.deleteItem'+itemID).fadeOut(300, function(){
			$('.cancelEdit'+itemID).fadeIn(300);
		})
	
	});

	$(document).on('click', '.cancel', function( event) {

		event.preventDefault();
		var itemID = $(this).data('id');

		$('.editItem'+itemID).fadeOut(300, function(){
			$('.editSpan'+itemID).fadeIn(300);
		});

		$('.saveItem'+itemID).fadeOut(300, function(){
			$('.editBtn'+itemID).fadeIn(300);
		});

		$('.cancelEdit'+itemID).fadeOut(300,function(){
			$('.deleteItem'+itemID).fadeIn(300);
		});
	
	 });

	
	var itemID;


	$(document).on('click', '.partial-save', function( event) {
		itemID = $(this).data('id');
		$("#confirmModal").modal('show');
		$("#modalDelete").hide();
		$("#modalSave").show();
		$(".modal-title").text('Confirm Changes');
		$(".modal-text").html('Are you sure you want to save new info?');
	});


	$('.modal-footer').on('click', '#modalSave', function( event) {

	event.preventDefault();
	// var itemID = $(this).data('id');
	var urlTarget = '/makes/'+itemID;

	var newBrand = $("#brandInput"+itemID).val();
	var newContact = $("#contactInput"+itemID).val();
	var newDealer = $("#dealerInput"+itemID).val();

	$("#confirmModal").modal('hide');
	// alert(url);
	      $.ajax({
	          url: urlTarget,
	          type: 'PATCH',
	          data: {
	          	'_token': $('input[name=_token]').val(),
	          	itemID:itemID,
	          	newBrand:newBrand,
	          	newContact:newContact,
	          	newDealer:newDealer
	          },
	          success: function(result) {
	              // Do something with the result
	              // alert(result.message);
	              $('#table-container').load(document.URL +  ' #table-container');
	              $('#alert-add').html('<strong>Successfully Updated!</strong> Please check it on the list below');
	              $('#alert-add').fadeIn(200, function(){
	              });
	          }
	      });  
	
	 });

	$(document).on('click', '.partial-delete', function( event) {
		itemID = $(this).data('id');
		$("#confirmModal").modal('show');
		$("#modalDelete").show();
		$("#modalSave").hide();
		$(".modal-title").text('Confirm Delete');
		$(".modal-text").html('Are you sure you want to delete '+ $("#brand"+itemID).html() + '?');
	});


	$('.modal-footer').on('click', '#modalDelete', function(event) {

	event.preventDefault();

	var urlTarget = '/makes/'+itemID;

	$("#confirmModal").modal('hide');
	// alert(url);
	      $.ajax({
	          url: urlTarget,
	          type: 'DELETE',
	          data: {
	          	'_token': $('input[name=_token]').val(),
	          },
	          success: function(result) {
	              // Do something with the result
	              $('.item'+itemID).fadeOut(500, function(){
	             		 $('.item'+itemID).remove();
	               });
	          }
	      });  
	
	 });
	// end of edit button

	// start of search
		$("#searchTable").on("keyup", function() {
		  var value = $(this).val().toLowerCase();
		  $('#alert-add').fadeOut(200);
		  $("#table-result tr").filter(function() {
		    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		  });
		});
	// end of search
	
	
	
});
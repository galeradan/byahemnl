

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
			$("#model").prop('selectedIndex',0);
			$("#vin").val("");
			$("#plate").val("");
			$("#garage").prop('selectedIndex',0);
			
			$("#phase").prop("selectedIndex",0);
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
	    	var model = $("#model").children("option:selected").val()
	    
	    	var vin = $("#vin").val();
	    	var plate = $("#plate").val();
	    	
	    	var garage = $("#garage").children("option:selected").val()
	    	
	    	var phase = $("#phase").children("option:selected").val()

	    	// alert(model);
	    	// alert(year);
	    	// alert(trim);
	    	// alert(body);
	    	// alert(vin);
	    	// alert(plate);
	    	// alert(garage);
	  
	    	// alert(phase);
	    	if (model != 0 && vin != null && plate != null && garage != 0 && phase != 0) {
	    		$.ajax({
	    		    url:'/fleets',
	    		    type:'POST',
	    		    data:{
	    		    	'_token': $('input[name=_token]').val(),
	    		        model:model,
	    		        vin:vin,
	    		        plate:plate,
	    		        garage:garage,
	    		        phase:phase
	    		        // ctgr:ctgr
	    		    },
	    		    success:function(data){


	    		    	$('#table-container').load(document.URL +  ' #table-container');
	    		    	$("#model").prop('selectedIndex',0);
	    		    	
	    		    	$("#vin").val("");
	    		    	$("#plate").val("");
	    		    	$("#garage").prop('selectedIndex',0);
	    		    	
	    		    	$("#phase").prop("selectedIndex",0);
	    		    	
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
	    		// alert('error dito');
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
	          url: "/fleets",
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

		// get data
		var itemID = $(this).data('id');
		// var brand = $("#brand"+itemID).html();
		var vin = $("#vin"+itemID).html();
		var plate = $("#plate"+itemID).html();
		

		// $("#brandInput"+itemID).val(brand);
		$("#modelInput").children("option:selected").val()
		$("#vinInput"+itemID).val(vin);
		$("#plateInput"+itemID).val(plate);
		$("#garageInput").children("option:selected").val()
		
		$("#phaseInput").children("option:selected").val()

		
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
	var urlTarget = '/fleets/'+itemID;

	var model = $("#modelInput"+itemID).children("option:selected").val();
	var vin = $("#vinInput"+itemID).val();
	var plate = $("#plateInput"+itemID).val();
	
	var garage = $("#garageInput"+itemID).children("option:selected").val();
	
	var phase = $("#phaseInput"+itemID).children("option:selected").val();

	$("#confirmModal").modal('hide');
	// alert(model);
	// alert(vin);
	// alert(plate);
	// alert(year);
	// alert(trim);
	// alert(body);
	// alert(garage);
	// alert(category);
	// alert(phase);
	      $.ajax({
	          url: urlTarget,
	          type: 'PATCH',
	          data: {
	          	'_token': $('input[name=_token]').val(),
	          	itemID:itemID,
	          	model:model,
	          	vin:vin,
	          	plate:plate,
	          	garage:garage,
	          	phase:phase,
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
		$(".modal-text").html('Are you sure you want to delete '+ $("#name"+itemID).html() + '?');
	});


	$('.modal-footer').on('click', '#modalDelete', function(event) {

	event.preventDefault();

	var urlTarget = '/fleets/'+itemID;

	$("#confirmModal").modal('hide');
	// alert(url);
	      $.ajax({
	          url: urlTarget,
	          type: 'DELETE',
	          data: {
	          	'_token': $('input[name=_token]').val(),
	          	itemID:itemID,
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
		  // console.log(value);
		  $("#table-result tr").filter(function() {
		    $(this).toggle($(this).children().children().not(".editInput").text().toLowerCase().indexOf(value) > -1);
		  });

		 

		  
		});
	// end of search
	
	
	
});
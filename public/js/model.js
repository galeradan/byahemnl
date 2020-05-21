

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
			$("#brand").prop('selectedIndex',0)
			$("#name").val("");
			$("#year").val("");
			$("#trim").val("");
			$("#body").val("");
			$("#category").prop('selectedIndex',0)
			$("#rate").val("");
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
	    	var name = $("#name").val();
	    	var year = $("#year").val();
	    	var trim = $("#trim").val();
	    	var body = $("#body").val();
	    	var rate = $("#rate").val();
	    	var category = $("#category").children("option:selected").val()
	    	// alert(brand);
	    	// alert(name);
	    	// alert(rate);
	    	if (brand != null && name != null && rate != null && category != 0) {
	    		$.ajax({
	    		    url:'/models',
	    		    type:'POST',
	    		    data:{
	    		    	'_token': $('input[name=_token]').val(),
	    		        brand:brand,
	    		        name:name,
	    		        year:year,
	    		        trim:trim,
	    		        body:body,
	    		        category:category,
	    		        rate:rate
	    		        // ctgr:ctgr
	    		    },
	    		    success:function(data){


	    		    	$('#table-container').load(document.URL +  ' #table-container');
	    		    	$("#brand").prop('selectedIndex',0)
	    		    	$("#name").val("");
	    		    	$("#year").val("");
	    		    	$("#trim").val("");
	    		    	$("#body").val("");
	    		    	$("#category").prop('selectedIndex',0)
	    		    	$("#rate").val("");
	    		    	
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
	          url: "/models",
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
		var rate = $("#rate"+itemID).html();
		var year = $("#year"+itemID).html();
		var trim = $("#trim"+itemID).html();
		var body = $("#body"+itemID).html();
		var name = $("#name"+itemID).html();

		// $("#brandInput"+itemID).val(brand);
		$("#brand").children("option:selected").val()
		$("#rateInput"+itemID).val(rate);
		$("#yearInput"+itemID).val(year);
		$("#trimInput"+itemID).val(trim);
		$("#bodyInput"+itemID).val(body);
		$("#nameInput"+itemID).val(name);
		$("#categoryInput").children("option:selected").val()


		
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
	var urlTarget = '/models/'+itemID;

	var brand = $("#brandInput"+itemID).children("option:selected").val();
	var name = $("#nameInput"+itemID).val();
	var year = $("#yearInput"+itemID).val();
	var trim = $("#trimInput"+itemID).val();
	var body = $("#bodyInput"+itemID).val();
	var category = $("#categoryInput"+itemID).children("option:selected").val();
	var rate = $("#rateInput"+itemID).val();

	$("#confirmModal").modal('hide');
	// alert(brand);
	// alert(name);
	// alert(rate);
	      $.ajax({
	          url: urlTarget,
	          type: 'PATCH',
	          data: {
	          	'_token': $('input[name=_token]').val(),
	          	itemID:itemID,
	          	brand:brand,
	          	name:name,
	          	year:year,
	          	trim:trim,
	          	body:body,
	          	category:category,
	          	rate:rate
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

	var urlTarget = '/models/'+itemID;

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
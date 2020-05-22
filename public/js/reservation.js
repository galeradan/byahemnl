$(document).ready(function(){
	let setStartDate;
	let setEndDate;
	let userID;
	let days;
	let category;
	
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});


	$('input[name="date"]').daterangepicker();



	$('#date').on('apply.daterangepicker', function(ev, picker) {
	  setStartDate = picker.startDate.format('YYYY-MM-DD');
	  setEndDate = picker.endDate.format('YYYY-MM-DD');
	  days = moment(setEndDate).diff(moment(setStartDate), 'days');
	  $('#days').text(days);
	});

	$('#date').on('cancel.daterangepicker', function(ev, picker) {
	  $(this).val('')
	});


	$('#chooseHeader').addClass('border-none');
	$('#confirmHeader').addClass('border-none');

	$('#btnProceedRequest').on('click',function(e){
		e.preventDefault();
		userID = 1;
		category =  $("input[name='category']:checked").val();

		if (setStartDate != null && setEndDate != null && days != 0 && category != null) {
			// alert(userID);
			// alert(setStartDate);
			// alert(setEndDate);
			// alert(days);
			// alert(category);

				$.ajax({
			          url: "/reservation/"+category,
			          type: 'get',
			          data: {
			          	'_token': $('input[name=_token]').val(),
			          	category:category
			          },
			          success: function(result) {
			              // Do something with the result
			              // $('#chooseBody').load(document.URL +  ' #chooseBody');
			              var data = $('<div />').append(result).find('#chooseBody').html();
			                          $('#chooseBody').html(data);
			              // console.log(result);
			              // window.location.href = "/models"
			          }
			      });



			$('#requestFooter').fadeOut(200,function(){
				$('#requestBody').slideUp(500,function(){
					$('#requestHeader').addClass('border-none');
					$('#chooseBody').slideDown(500);
					$('#chooseFooter').slideDown(500);
					$('#chooseHeader').removeClass('border-none');
				});

			});
		}else{
			alert("Please select a date range 24 hours or greater")
		}
		
	});


	// Back to Request info -> hides Choose
	$('#btnBackChoose').on('click',function(){
		$('#chooseBody').slideUp(500,function(){
			$('#requestBody').slideDown(500);
		});
		$('#chooseFooter').slideUp(200);
		$('#requestFooter').fadeIn(200)
		$('#requestHeader').removeClass('border-none');
		$('#chooseHeader').addClass('border-none');

		
	});


	let proceed=false;
	// Proceed to Confirmation

	$('#btnProceedChoose').on('click',function(){


		var models = {};
		$.each($("input[name='model']:checked"), function(){
		    // models.push($(this).val());
		    let modelID = $(this).val();
		    let qty = $("#quantityInput"+modelID).val();
		    models[modelID] = parseInt($("#quantityInput"+modelID).val());
		    // console.log($("#quantityInput"+modelID).val());
		    if(qty != "" && qty != 0){
		    	proceed=true;
		    }else{
		    	proceed=false;
		    }

		});

		// console.log({models,setStartDate,setEndDate,userID,days});

		
		// console.log(proceed);

		if(proceed==true){
				$.ajax({
			          url: "/reservation",
			          type: 'post',
			          data: {
			          	'_token': $('input[name=_token]').val(),
			          	userID:userID,
			          	setStartDate:setStartDate,
			          	setEndDate:setEndDate,
			          	days:days,
			          	models:models
			          },
			          success: function(result) {
			              // Do something with the result
			              // $('#chooseBody').load(document.URL +  ' #chooseBody');
			              var data = $('<div />').append(result).find('#confirmBody').html();
			                          $('#confirmBody').html(data);
			              // console.log(result);
			              // window.location.href = "/models"
			              
			          }
			      });


				$('#chooseBody').slideUp(500,function(){
					$('#confirmBody').slideDown(500);
				});
				$('#chooseFooter').slideUp(200);
				$('#confirmFooter').fadeIn(200)
				$('#confirmHeader').removeClass('border-none');
				$('#chooseHeader').addClass('border-none');
		}
		else{
			alert("Please choose one");
		}

			
		
		// $.each(models, function(key,value){
		// 	console.log(key + " " + value);
		// });



		
		
	});

	$('#btnBackConfirm').on('click',function(){
		$('#confirmBody').slideUp(500,function(){
			$('#chooseBody').slideDown(500);
		});
		$('#confirmFooter').slideUp(500);
		$('#chooseFooter').fadeIn(200)
		$('#chooseHeader').removeClass('border-none');
		$('#confirmHeader').addClass('border-none');
	});



	$('#btnSubmitConfirm').on('click',function(){
		// console.log({models,setStartDate,setEndDate,userID,days});

			let total = $('#total').text();
			// alert(total);
			$.ajax({
		          url: "/requests",
		          type: 'post',
		          data: {
		          	'_token': $('input[name=_token]').val(),
		          	userID:userID,
		          	setStartDate:setStartDate,
		          	setEndDate:setEndDate,
		          	days:days,
		          	total:total
		          	// models:models
		          },
		          success: function(result) {
		              // Do something with the result
		              // $('#chooseBody').load(document.URL +  ' #chooseBody');
		              // var data = $('<div />').append(result).find('#confirmBody').html();
		                          // $('#confirmBody').html(data);
		              // console.log(result);
		              // window.location.href = "/models"

		              window.location.href = "/profile";
		          }
		      });
		
		// $.each(models, function(key,value){
		// 	console.log(key + " " + value);
		// });



		$('#chooseBody').slideUp(500,function(){
			$('#confirmBody').slideDown(500);
		});
		$('#chooseFooter').slideUp(200);
		$('#confirmFooter').fadeIn(200)
		$('#confirmHeader').removeClass('border-none');
		$('#chooseHeader').addClass('border-none');
		
	});

});



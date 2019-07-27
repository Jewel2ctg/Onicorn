<script >
				$(document).on('click','.wishdelete',function(){
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});




					var id=$(this).attr('id');
					console.log(id);

					$.ajax({
						type: 'get',
						dataType: 'html',
						url:"{{ url('/') }}"+"/wish/delete/"+id,
						success: function (response) {

							$('#wishbody').html(response);
							wishtotalitem();
							priceupdate();
							tableshowhide();
						}

					});

				});


				$(document).on('click','.movetocart',function(){
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});




					var id=$(this).attr('id');
					console.log(id);

					$.ajax({
						type: 'get',
						dataType: 'html',
						url:"{{ url('/') }}"+"/wish/movetocart/"+id,
						success: function (response) {

							$('#wishbody').html(response);
							wishtotalitem();
							priceupdate();
							tableshowhide();
							carttotalitem();
						}

					});

				});
				



				$(document).on('click','.wish_down',function(){
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});




					var id=$(this).attr('id');
					console.log(id);

					$.ajax({
						type: 'get',
						dataType: 'html',
						url:"{{ url('/') }}"+"/wish/update-quantity/"+id+"/-1",
						success: function (response) {

							$('#wishbody').html(response);
							wishtotalitem();
							priceupdate();
							tableshowhide();
						}

					});

				});
				$(document).on('click','.wish_up',function(){
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});




					var id=$(this).attr('id');
					console.log(id);


					$.ajax({
						type: 'get',
						dataType: 'html',
						url:"{{ url('/') }}"+"/wish/update-quantity/"+id+"/1",
						success: function (response) {

							$('#wishbody').html(response);

							wishtotalitem();
							priceupdate();
							tableshowhide();


						}


					});





				});
				function carttotalitem(){
					$.ajax({
						type: 'get',
						dataType: 'html',
						url:"{{ url('/') }}"+"/get-totalitem",
						success: function (response) {
							console.log(response)
							$('#totalItems').html(response);




						}


					});
				}

				function wishtotalitem(){
					$.ajax({
						type: 'get',
						dataType: 'html',
						url:"{{ url('/') }}"+"/get-wishtotalitem",
						success: function (response) {
							console.log(response)
							$('#totalWishItems').html(response);




						}


					});
				}

				function priceupdate(){

				}
				function tableshowhide(){
					
	var th = new showHideText('.my-message', {
		charQty     : 50,
		ellipseText : "...",
	});

				}



				


			</script>
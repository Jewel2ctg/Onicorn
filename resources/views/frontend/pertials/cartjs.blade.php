<script >
				$(document).on('click','.cartdelete',function(){
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
						url:"{{ url('/') }}"+"/carts/delete/"+id,
						success: function (response) {

							$('#cartbody').html(response);
							carttotalitem();
							priceupdate();
							tableshowhide();
						}

					});

				});
				


$(document).on('click','.movetowish',function(){
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
						url:"{{ url('/') }}"+"/carts/movetowish/"+id,
						success: function (response) {

							$('#cartbody').html(response);
							carttotalitem();
							priceupdate();
							tableshowhide();
							wishtotalitem()
						}

					});

				});
				



				$(document).on('click','.cart_down',function(){
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
						url:"{{ url('/') }}"+"/carts/update-quantity/"+id+"/-1",
						success: function (response) {

							$('#cartbody').html(response);
							carttotalitem();
							priceupdate();
							tableshowhide();
						}

					});

				});
				$(document).on('click','.cart_up',function(){
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
						url:"{{ url('/') }}"+"/carts/update-quantity/"+id+"/1",
						success: function (response) {

							$('#cartbody').html(response);

							carttotalitem();
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
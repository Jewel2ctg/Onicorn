
@extends('frontend.layouts.master')
@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Check out</li>
			</ol>
		</div><!--/breadcrums-->



<hr>


		<form method="POST" action="{{ route('checkout.store') }}">
			@csrf
			
			<div class="shopper-informations">
				<div class="row">

					<div class="col-sm-5 col-sm-offset-1">
						<div class="signup-form">
							<h2>Billing Address</h2>
							<div class="form-group">
								<input name="billingname" id="billingname" value="{{$user->first_name}} {{$user->last_name}}" type="text" placeholder="Billing Name" class="form-control"  disabled>
							</div>
							<div class="form-group">
								<input name="billingemail" id="billingemail" value="{{$user->email}}" type="text" placeholder="Billing Email" class="form-control"disabled>
							</div>
							<div class="form-group">
								<input name="billingphone" id="billingphone" value="{{$user->phone_no}}" type="text" placeholder="Billing Phone" class="form-control"disabled>
							</div>
							<div class="form-group">
								<input name="billingaddress" id="billingaddress" value="{{$user->street_address}}" type="text" placeholder="Billing Address" class="form-control"disabled>
							</div>
							<div class="form-group">
								<select class="form-control" name="billingcountry" id="billingcountry" disabled>
									<option value="">Please select your country</option>
									@foreach ($countries as $country)
									<option value="{{ $country->id }}"{{ $user->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
									@endforeach
								</select>



							</div>
							<div class="form-group">
								<select class="form-control" name="billingdivision" id="billingdivision" disabled>
									<option value="">Please select your division</option>
									@foreach ($divisions as $division)
									<option value="{{ $division->id }}"{{ $user->division_id == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
									@endforeach
								</select>


							</div>
							<div class="form-group">
								<select class="form-control" name="billingdistrict" id="billingdistrict" disabled>
									<option value="">Please select your district</option>
									@foreach ($districts as $district)
									<option value="{{ $district->id }}"{{ $user->district_id == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
									@endforeach
								</select>

							</div>
							<div class="form-check">
								<input value="" type="checkbox" class="form-check-input" id="copyAddress" name="">
								<label class="dorm-check-level" for="copyAddress">Shipping Address same as Billing Address</label>
							</div>
						</div>
					</div>

					<div class="col-sm-5 ">
						<div class="signup-form">
							<h2>Shipping Address</h2>
							<div class="form-group">
								<input name="shippingname" id="shippingname" value="" type="text" placeholder="Shipping Name" class="form-control" required>
							</div>
							<div class="form-group">
								<input name="shippingemail" id="shippingemail" value="" type="text" placeholder="Shipping Email" class="form-control" required>
							</div>
							<div class="form-group">
								<input name="shippingphone" id="shippingphone" value="" type="text" placeholder="Shipping Phone" class="form-control" required>
							</div>
							<div class="form-group">
								<input name="shippingaddress" id="shippingaddress" value="" type="text" placeholder="Shipping Address" class="form-control" required>
							</div>
							<div class="form-group">
								<select class="form-control" name="country_id" id="country_id" required>
									<option value="">Please select your country</option>
									@foreach ($countries as $country)
									<option value="{{ $country->id }}">{{ $country->name }}</option>
									@endforeach
								</select>

							</div>

							<div class="form-group">

								<select class="form-control" name="division_id" id="division-area" required>
									<option value="">Please select your division</option>
									@foreach ($divisions as $division)
									<option value="{{ $division->id }}">{{ $division->name }}</option>
									@endforeach
								</select>
							</div>



							<div class="form-group ">

								<select class="form-control" name="district_id" id="district-area" required>
									<option value="">Please select your district</option>
									@foreach ($districts as $district)
									<option value="{{ $district->id }}">{{ $district->name }}</option>
									@endforeach
								</select>

							</div>
							<div class="form-group">
								<textarea name="shippingmsg" placeholder="Message" class="form-control"></textarea>
							</div>

						</div>
					</div>




				</div>
			</div>

		

		<hr>
		<div class="review-payment">
			<h2>Review & Payment</h2>
		</div>

		<div id="cartbody">

			@include('frontend.pages.cart_body')
		</div>

		<table class="table table-condensed total-result">

			<tr>
				<td>
					@include('backend.pertials.messages')

					<div class="chose_area">
						
								<label >Coupon Code</label>


								<input type="text"  name="code" id="couponcode" aria-describedby="emailHelp" placeholder="Enter Coupon Code" >
								<button type="button" id="couponcodeapply">Apply</button>


							</div>
							<br>
							<br>

							<div class="chose_area" >
								<label >Payment Methode</label><br>
								<fieldset id="group1">
						
						<span>
							<label><input type="radio" value="1" name="group1" checked> Online Payment</label>
						</span>
						<span>
							<label><input type="radio" value="2" name="group1" > Cash on Delivery</label>
						</span>
					</fieldset>
					</div>

						</td>
						<td >
							<table class="table table-condensed total-result">

								<tr>
									<td>Cart Sub Total</td>
									<td >

										<input type="number" name="carttotalamount" class="no-spinners" readonly  id="carttotalamount"> BDT</td>
									</tr>



									<tr>
										<td>Coupon Discount</td>
										<td><input type="number" name="couponcodediscount"   class="no-spinners" id="couponcodediscount"  readonly> BDT</td>
									</tr>

									<tr>
										<td>Shipping Cost</td>
										<td><input type="number" name="shippingcost"   class="no-spinners"  readonly id="shippingcost">  BDT</td>
									</tr>
									<tr>
										<td>Total</td>
										<td ><input type="number" name="grandtotal"  class="no-spinners " id="grandtotal" readonly> BDT</td>
									</tr>


								</table>
							</td>
						</tr>
						<tr>
							<td >
								
							</td>
							<td style="text-align: right;" >
								<button type="submit" class="btn btn-default">Check Out</button>
								
							</td>
						</tr>

					</table>

					</form>


				</div>
			</section> <!--/#cart_items-->
			@endsection

			@section('footerSection')







			@include('frontend.pertials.cartjs')

			<script >
				$( document ).ready(function() {
					$("#carttotalamount").val($("#total_cart_price").val());
					$("#shippingcost").val(0);
					$("#couponcodediscount").val(0);
					$("#grandtotal").val($("#total_cart_price").val());
					tableshowhide();
				});

				function priceupdate(){
					$("#carttotalamount").val($("#total_cart_price").val());
					a=(Number($("#carttotalamount").val())+Number($("#shippingcost").val()));
					b=(Number($("#couponcodediscount").val()));

					$("#grandtotal").val(a-b);

				}
				

				$("#couponcodeapply").click(function(){
					var couponcode = $("#couponcode").val();
					var carttotalamount = $("#total_cart_price").val();

// Send an ajax request to server with this division
$("#couponcodediscount").html("");

var url="{{ url('/') }}";

$.get( url+"/get-discount/"+couponcode, function( data ) {

	data = JSON.parse(data);
	data.forEach( function(element) {
		if(element.type==2){
			option = element.amount;
		}
		else
		{
			option = Math.ceil((carttotalamount*element.amount)/100);

		}
	});

	$("#couponcodediscount").val(option);
	priceupdate();

});

});

				$("#district-area").change(function(){
					var district_id = $("#district-area").val();
					$("#shippingcost").html("");
					var url="{{ url('/') }}";

					$.get( url+"/get-shipping/"+district_id, function( data ) {

						data = JSON.parse(data);
						data.forEach( function(element) {

							option = element.amount;

						});

						$("#shippingcost").val(option);
						priceupdate();

					});

				});
				$("#copyAddress").click(function(){

					if(this.checked){
						$("#shippingname").val($("#billingname").val());
						$("#shippingemail").val($("#billingemail").val());
						$("#shippingphone").val($("#billingphone").val());
						$("#shippingaddress").val($("#billingaddress").val());
						$("#country_id").val($("#billingcountry").val());


						$("#division-area").val($("#billingdivision").val());
						$("#district-area").val($("#billingdistrict").val());
						$("#district-area").change();


					}
				});
			</script>
			@include('frontend.pertials.countrydivisiondistrictajax')
			@endsection






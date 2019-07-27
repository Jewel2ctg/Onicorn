
@extends('frontend.layouts.master')
@section('content')
@php
          $total_price = 0;
          @endphp
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			
			

			

			<div class="shopper-informations">
				<div class="row">

					<div class="col-sm-4 col-sm-offset-1">
					<div class="signup-form">
						<h2>Billing Address</h2>
					<div class="form-group">
						<input name="billingname" id="billingname" value="{{$user->first_name}} {{$user->last_name}}" type="text" placeholder="Billing Name" class="form-control">
					</div>
					<div class="form-group">
						<input name="billingemail" id="billingemail" value="{{$user->email}}" type="text" placeholder="Billing Email" class="form-control">
					</div>
					<div class="form-group">
						<input name="billingphone" id="billingphone" value="{{$user->phone_no}}" type="text" placeholder="Billing Phone" class="form-control">
					</div>
					<div class="form-group">
						<input name="billingaddress" id="billingaddress" value="{{$user->street_address}}" type="text" placeholder="Billing Address" class="form-control">
					</div>
					<div class="form-group">
						<input name="billingdivision" id="billingdivision" value="{{$user->division->name}}" type="text" placeholder="Billing Division" class="form-control">
					</div>
					<div class="form-group">
						<input name="billingdistrict" id="billingdistrict" value="{{$user->district->name}}" type="text" placeholder="Billing District" class="form-control">
					</div>
					<div class="form-check">
						<input value="" type="checkbox" class="form-check-input" id="copyAddress" name="">
						<label class="dorm-check-level" for="copyAddress">Shipping Address same as Billing Address</label>
					</div>
					</div>
					</div>
					<div class="col-sm-4 ">
					<div class="signup-form">
						<h2>Shipping Address</h2>
					<div class="form-group">
						<input name="shippingname" id="shippingname" value="" type="text" placeholder="Shipping Name" class="form-control">
					</div>
					<div class="form-group">
						<input name="shippingemail" id="shippingemail" value="" type="text" placeholder="Shipping Email" class="form-control">
					</div>
					<div class="form-group">
						<input name="shippingphone" id="shippingphone" value="" type="text" placeholder="Shipping Phone" class="form-control">
					</div>
					<div class="form-group">
						<input name="shippingaddress" id="shippingaddress" value="" type="text" placeholder="Shipping Address" class="form-control">
					</div>
					<div class="form-group">
						<input name="shippingdivision" id="shippingdivision" value="" type="text" placeholder="Shipping Division" class="form-control">
					</div>
					<div class="form-group">
						<input name="shippingdistrict" id="shippingdistrict" value="" type="text" placeholder="Shipping District" class="form-control">
					</div>
					<div class="form-group">
						<textarea name="shippingmsg" placeholder="Message" class="form-control"></textarea>
					</div>
					</div>
					</div>
					<div class="col-sm-4 ">
						dsfsfasdfsdafsd
					</div>



							
				</div>
			</div>
				
			
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">SL</td>
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						

						
						@if (App\Model\User\Cart::totalItems() > 0)

						
          @foreach (App\Model\User\Cart::totalCarts() as $cart)

						<tr>
							<td>
                {{ $loop->index + 1 }}
              </td>
							<td class="cart_product">
								@if ($cart->product->images->count() > 0)
								<a href="{{ route('product_details', $cart->product->slug) }}"><img src="{{ asset('Admin/images/products/'. $cart->product->images->first()->image) }}" alt="$cart->product->title " height="80px" width="80px"></a>
								@endif
							</td>
							<td class="cart_description">
								<h4><a href="{{ route('product_details', $cart->product->slug) }}">{{ $cart->product->title }}</a></h4>
								 <div class="my-message">{{ $cart->product->description }}</div>
							</td>
							<td class="cart_price">
								<p>{{ $cart->product->price }} BDT</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="{{url('carts/update-quantity/'.$cart->id.'/1')}}"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->product_quantity }}" autocomplete="off" size="2" >
									@if($cart->product_quantity>1)
									<a class="cart_quantity_down" href="{{url('carts/update-quantity/'.$cart->id.'/-1')}}"> - </a>
									@endif
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"> 
									@php
                $total_price += $cart->product->price * $cart->product_quantity;
                @endphp

                {{ $cart->product->price * $cart->product_quantity }} BDT
            </p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{url('carts/delete/'.$cart->id)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>


						@endforeach
						<tr>
							<td colspan="5" align="right">
								<h4>Cart Sub Total</h4>
								
							</td>
							<td class="cart_total_price">{{ $total_price }} BDT</td>
						</tr>
						
						@else
     <tr><td> 
        <strong>There is no item in your cart.</strong>
        <br>
        <br>
        <a href="{{ route('product') }}" class="btn btn-default btn-warning">Continue Shopping..</a>
      </td></tr>
    @endif




						<tr>
							<td colspan="4">
								@include('admin.pertials.messages')
								
								<div class="chose_area">
								<ul class="user_option">
									<li>
              <label >Coupon Code</label>
             <form action="{{url('carts/applycoupon')}}" method="get">
             	@csrf

             <input type="hidden" value="{{ $total_price }}" name="totalamount">
              <input type="text"  name="code" id="code" aria-describedby="emailHelp" placeholder="Enter Coupon Code" required>
              <input type="submit" value="Apply" class="btn btn-success">
          </form>
            </li></ul></div>

							</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									@if(!empty(Session::get('finalamount')))
									<tr>
										<td>Cart Sub Total</td>
										<td>{{ $total_price }} BDT</td>
									</tr>
									


									<tr>
										<td>Coupon Discount</td>
										<td>{{Session::get('couponamount')}} BDT</td>
									</tr>
									
									<tr>
										<td>Total</td>
										<td><span>{{Session::get('finalamount')}} BDT</span></td>
									</tr>
									@else
									<tr>
										<td>Total</td>
										<td><span>{{ $total_price }} BDT</span></td>
									</tr>
									@endif
								</table>
							</td>
						</tr>
						<tr>
							<td colspan="6" align="right">
							<a class="btn btn-default check_out" href="">Check Out</a>
						</td>
					</tr>
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->
	@endsection

	@section('footerSection')
	<script >
	$("#copyAddress").click(function(){

	if(this.checked){
	$("#shippingname").val($("#billingname").val());
	$("#shippingemail").val($("#billingemail").val());
	$("#shippingphone").val($("#billingphone").val());
	$("#shippingaddress").val($("#billingaddress").val());
	$("#shippingdivision").val($("#billingdivision").val());
	$("#shippingdistrict").val($("#billingdistrict").val());
	

}
});</script>
<script>
        var th = new showHideText('.my-message', {
            charQty     : 50,
            ellipseText : "...",
        });
    </script>
	@endsection

	

	

	
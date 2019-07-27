@php
$total_price = 0;
@endphp
<div class="table-responsive cart_info">
	<table class="table table-condensed">
		<thead>
			<tr class="cart_menu">
				<td class="image">SL</td>
				<td class="image">Item</td>
				<td class="description"></td>
				<td class="price">Price</td>
				<td class="quantity">Quantity</td>
				<td class="total" style="text-align: center;">Total</td>
				<td style="text-align: center;">Action</td>
			</tr>
		</thead>
		<tbody>



			@if (App\Model\Frontend\Cart::totalItems() > 0)


			@foreach (App\Model\Frontend\Cart::totalCarts() as $cart)

			<tr>
				<td>
					{{ $loop->index + 1 }}
				</td>
				<td class="cart_product">
					@if ($cart->product->images->count() > 0)
					<a href="{{ route('product_details', $cart->product->slug) }}"><img src="{{ asset('Backend/images/products/'. $cart->product->images->first()->image) }}" alt="$cart->product->title " height="80px" width="80px"></a>
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
						<a class="cart_quantity_up cart_up" style="cursor: pointer;" id="{{$cart->id}}" data-toggle="tooltip" title="Increment Quantity"> + </a>
						<input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->product_quantity }}" autocomplete="off" size="2" readonly >
						@if($cart->product_quantity>1)
						<a class="cart_quantity_down cart_down" style="cursor: pointer;" id="{{$cart->id}}" data-toggle="tooltip" title="Decrement Quantity!"> - </a>
						@endif
					</div>
				</td>
				<td class="cart_total" style="text-align: right;">
					<p class="cart_total_price"> 
						@php
						$total_price += $cart->product->price * $cart->product_quantity;
						@endphp

						{{ $cart->product->price * $cart->product_quantity }} BDT
					</p>
				</td>
				<td class="cart_delete">
					<a class="cart_quantity_delete movetowish" style="cursor: pointer;" id="{{$cart->id}}" data-toggle="tooltip" title="Move to Wishlist!" ><i class="far fa-heart"></i></a>
					<a class="cart_quantity_delete cartdelete" style="cursor: pointer;" id="{{$cart->id}}" data-toggle="tooltip" title="Delete from Cart!"><i class="far fa-trash-alt"></i></a>
				</td>
			</tr>


			@endforeach
			<tr>
				<td colspan="5" align="right">
					<h4>Cart Sub Total</h4>

				</td>
				<td class="cart_total_price" style="text-align: right;"><input type="number" name="total_cart_price"  value="{{ $total_price }}"  class="no-spinners cart_total_price" style="text-align: right; max-width:150px;"  disabled id="total_cart_price">
				BDT</td>
			</tr>

			@else
			<tr><td> 
				<strong>There is no item in your cart.</strong>
				<br>
				<br>
				<a href="{{ route('product') }}" class="btn btn-default btn-warning">Continue Shopping..</a>
			</td></tr>
			@endif
		</tbody>
	</table>


</div>







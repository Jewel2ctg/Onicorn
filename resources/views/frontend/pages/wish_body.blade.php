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



			@if (App\Model\Frontend\Wish::totalWishItems() > 0)


			@foreach (App\Model\Frontend\Wish::totalWish() as $wish)

			<tr>
				<td>
					{{ $loop->index + 1 }}
				</td>
				<td class="cart_product">
					@if ($wish->product->images->count() > 0)
					<a href="{{ route('product_details', $wish->product->slug) }}"><img src="{{ asset('Backend/images/products/'. $wish->product->images->first()->image) }}" alt="$wish->product->title " height="80px" width="80px"></a>
					@endif
				</td>
				<td class="cart_description">
					<h4><a href="{{ route('product_details', $wish->product->slug) }}">{{ $wish->product->title }}</a></h4>
					<div class="my-message">{{ $wish->product->description }}</div>
				</td>
				<td class="cart_price">
					<p>{{ $wish->product->price }} BDT</p>
				</td>
				<td class="cart_quantity">

					<div class="cart_quantity_button">
						<a class="cart_quantity_up wish_up" style="cursor: pointer;" id="{{$wish->id}}" data-toggle="tooltip" title="Increment Quantity"> + </a>
						<input class="cart_quantity_input" type="text" name="quantity" value="{{ $wish->product_quantity }}" autocomplete="off" size="2" readonly>
						@if($wish->product_quantity>1)
						<a class="cart_quantity_down wish_down" style="cursor: pointer;" id="{{$wish->id}}" data-toggle="tooltip" title="Decrement Quantity!"> - </a>
						@endif
					</div>
				</td>
				<td class="cart_total" style="text-align: right;">
					<p class="cart_total_price"> 
						@php
						$total_price += $wish->product->price * $wish->product_quantity;
						@endphp

						{{ $wish->product->price * $wish->product_quantity }} BDT
					</p>
				</td>
				<td class="cart_delete">
					<a class="cart_quantity_delete movetocart" style="cursor: pointer;" id="{{$wish->id}}" data-toggle="tooltip" title="Move to Cart!"><i class="fas fa-cart-plus"></i></a>
					<a class="cart_quantity_delete wishdelete" style="cursor: pointer;" id="{{$wish->id}}" data-toggle="tooltip" title="Delete from Wishlist!"><i class="far fa-trash-alt"></i></a>
				</td>
			</tr>


			@endforeach
			<tr>
				<td colspan="5" align="right">
					<h4>Wish Sub Total</h4>

				</td>
				<td class="cart_total_price" style="text-align: right;"><input type="number" name="total_cart_price"  value="{{ $total_price }}"  class="no-spinners cart_total_price" style="text-align: right; max-width:150px;"  disabled id="total_cart_price">
				BDT</td>
			</tr>

			@else
			<tr><td> 
				<strong>There is no item in your wish.</strong>
				<br>
				<br>
				<a href="{{ route('product') }}" class="btn btn-default btn-warning">Continue Shopping..</a>
			</td></tr>
			@endif
		</tbody>
	</table>


</div>







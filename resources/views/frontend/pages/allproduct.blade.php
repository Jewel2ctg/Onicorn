

<div class="col-sm-9 padding-right" >
	<div class="features_items" id="updateDiv"><!--features_items-->
		
		<h2 class="title text-center">
			
			{{$pageheading}}
		</h2>
		

@if($products->isEmpty())
		sorry product not found
		@else


		@foreach ($products as $product)

		<div class="col-sm-4">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						@php $i = 1; @endphp

						@foreach ($product->images as $image)
						@if ($i > 0)

						<img src="{!! asset('backend/images/products/'.$image->image) !!}" alt="{{ $product->title }}" height="200" />
						@endif

						@php $i--; @endphp
						@endforeach
						<h2>{{$product->price}} BDT</h2>
						<p>{{$product->title}}</p>
						<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>

					</div>

					<div class="product-overlay">
						<div class="overlay-content">
							<h2>{{$product->price}} BDT</h2>
							<p>{{$product->title}}</p>
							@include('frontend.pertials.button.cart-button')

							@include('frontend.pertials.button.viewdetails')

							
						</div>
					</div>
					@foreach($product->tags as $tag)
					@if($tag->name=="New")
					<img src="{!! asset('backend/images/home/new.png') !!}" class="new" alt="" />
					@endif
					@endforeach

				</div>
				<div class="choose">
					<ul class="nav nav-pills nav-justified">
						<li>@include('frontend.pertials.button.wish-button')</li>
						<li>@include('frontend.pertials.button.compare-button')</li>
					</ul>
				</div>
			</div>
		</div>
		

		@endforeach
		@endif
		
	</div><!--features_items-->
	<div class="mt-4 pagination ">
	{{ $products->links() }}
</div>
</div>



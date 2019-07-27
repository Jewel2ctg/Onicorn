

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
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>

							<a href="{!! route('product_details', $product->id) !!}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View Details</a>
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
						<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
						<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
					</ul>
				</div>
			</div>
		</div>
		

		@endforeach
		@endif
		
		
	
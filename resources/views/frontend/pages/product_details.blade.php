
@extends('frontend.layouts.master')
@section('headerSection')
<link rel="stylesheet" href="{{ asset('frontend/css/xzoom.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/source/jquery.fancybox.css') }}">

<style>
.comparetable {
  border-collapse: collapse;
  width: 95%;
  margin: 20px;
}

.comparetable th {
  
  text-transform: uppercase;
  padding: 8px;
  background-color: #f2f2f2;
}
.comparetable td {
  text-align: left;
  padding: 8px;
}

.comparetable tr:nth-child(even) {background-color: #f2f2f2;}
</style>




@endsection
@section('footerSection')


<script src="{{ asset('frontend/js/xzoom.min.js')}}"></script>

<script src="{{ asset('frontend/source/jquery.fancybox.js')}}"></script>
<script src="{{ asset('frontend/js/setup.js')}}"></script>
<script >
	$( document ).ready(function() {
		/* calling script */
		$(".xzoom").xzoom({tint: '#333', Xoffset: 15});
	});

      	$('.carousel[data-type="multi"] .item').each(function() {
var totalItems1 = $('.carousel[data-type="multi"] .item').length;
      		
      		 var itemsPerSlide1 = 3;
      		
	var next = $(this).next();
	if (!next.length) {
		next = $(this).siblings(':first');
	}
	next.children(':first-child').clone().appendTo($(this));
if(totalItems1>2){
	for (var i = 0; i <itemsPerSlide1- 2; i++) {
		next = next.next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}

		next.children(':first-child').clone().appendTo($(this));
	}}
});
</script>

@endsection
@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				@include('frontend.pertials.leftslidebar')
			</div>

			<div class="col-sm-9 padding-right">
				<div class="product-details"><!--product-details-->
					<div class="col-sm-5">
						<section id="fancy">



							<div class="xzoom-container">
								@php $i = 1; @endphp

								@foreach ($product->images as $image)
								@if ($i > 0)

								<img class="xzoom4" id="xzoom-fancy" src="{!! asset('backend/images/products/'.$image->image) !!}" xoriginal="{!! asset('backend/images/products/'.$image->image) !!}" alt="{{ $product->title }}"  width="350" height="350" />
								@endif
								@php $i--; @endphp
								@endforeach



								<div class="xzoom-thumbs" >

									@foreach ($product->images as $image)
									<a href="{!! asset('backend/images/products/'.$image->image) !!}"><img class="xzoom-gallery4" width="60" height="80" src="{!! asset('backend/images/products/'.$image->image) !!}"  xpreview="{!! asset('backend/images/products/'.$image->image) !!}" title=""></a>
									@endforeach
								</div>


							</div>          



						</section>

					</div>
					<div class="col-sm-7">
						<div class="product-information"><!--/product-information-->

							@foreach($product->tags as $tag)
							@if($tag->name=="New")
							<img src="{!! asset('admin/images/home/new.png') !!}" class="new" alt="" />
							@endif
							@endforeach


							<h2>{{$product->title}}</h2>
							<p>{{$product->description}}</p>
							
						@for($i=1;$i<=5;$i++)

						@if($i<=$avgrating)

						<span class="fa fa-star " style="color: Orange " ></span>
						@else
						<span class="far fa-star " ></span>
						@endif

						@endfor



							

							
							<span>
								<span>{{$product->price}} BDT</span>
								<label>Quantity:</label>
								<input type="text" value="1" />
								<button type="button" class="btn btn-fefault cart">
									<i class="fa fa-shopping-cart"></i>
									Add to cart
								</button>
							</span>
							<p><b>Availability:</b> In Stock</p>
							<p><b>Condition:</b> New</p>
							<p><b>Brand:</b> {{$product->brand->name}}</p>
							@include('frontend.pertials.socialshare')
						</div><!--/product-information-->
					</div>
				</div><!--/product-details-->

				<div class="category-tab shop-details-tab"><!--category-tab-->
					<div class="col-sm-12">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#details" data-toggle="tab">Details</a></li>

							<li ><a href="#reviews" data-toggle="tab">Reviews ({{count($ratings)}})</a></li>
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane fade active in " id="details" >
							<div style="border: 1px solid #F0EAE9; padding: 10px">
							<table class="comparetable">
								<thead>
									<th>Specification</th>
									<th>Values</th>
								</thead>
								<tbody>
									@foreach($product->specification as $specification)
				@php
					$i=$loop->index;
				@endphp
				<tr>
					
					<td>{{$product->specification[$i]->attributes['name']}}</td>
					
					<td>{{$product->specification[$i]->value}}</td>
					
				</tr>
				@endforeach
				<tr>
					<td>price</td>
					
					<td>{{$product->price}} BDT</td>
					
				</tr>
								</tbody>

							</table>
							</div>
							
						</div>



						<div class="tab-pane fade " id="reviews" >
							<div class="col-sm-12">
								@foreach ($ratings as $rating)
								<div style="border: 1px solid #F0EAE9;padding: 10px">
								<ul>
									<li><a ><i class="fa fa-user"></i>{{ $rating->user->first_name }} {{ $rating->user->last_name }}</a></li>
									<li><a ><i class="fa fa-clock-o"></i>{{ $rating->created_at->diffForHumans() }}</a></li>
									<li><a ><i >Rating :</i>
										@for($i=1;$i<=5;$i++)

						@if($i<=$rating->rating)

						<span class="fa fa-star " style="color: Orange " ></span>
						@else
						<span class="far fa-star " ></span>
						@endif

						@endfor
										

										

									</a></li>
								</ul>
								<p>{!! $rating->review !!}</p>
								</div>
								@endforeach
								<br>
								<p><b>Write Your Review</b></p>
								@include('backend.pertials.messages')

								<form action="{{ route('rating.store') }}" method="post" enctype="multipart/form-data">
            @csrf
									<input type="hidden" name="productid" value="{{$product->id}}">
									<textarea name="ratingmessage" required ></textarea>
									<fieldset class="rating">
										@for($i=5;$i>=1;$i--)
										<input type="radio" id="{{'rating'.$i}}" name="rating" value="{{$i}}"  required/><label for="{{'rating'.$i}}" title="{{$i.' stars!'}}">{{$i}} stars</label>
@endfor
</fieldset>
									<button type="Submit" class="btn btn-default pull-right">
										Submit
									</button>
								</form>
							</div>
						</div>

					</div>
				</div><!--/category-tab-->


			</div>
		</div>
	</div>
				<div class="recommended_items container" ><!--recommended_items-->
					<h2 class="title text-center">Similer items</h2>

					<div class="col-sm-12">
								<div id="carousel" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="2500">
				<div class="carousel-inner" style="left: -4%;">
					@foreach ($similars as $product)
						
						<div class="item {{ $loop->index == 0 ? 'active' : '' }}">
						<div class="carousel-col">	

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
						<li>@include('frontend.pertials.button.wish-button')</li>
						<li>@include('frontend.pertials.button.compare-button')</li>
					</ul>
				</div>
			</div>
		</div>

						</div>
						</div>
						@endforeach



						</div>
						<a class="left recommended-item-control" href="#carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>	
						</div>	
									
								</div>
				</div><!--/recommended_items-->
</section>


@endsection





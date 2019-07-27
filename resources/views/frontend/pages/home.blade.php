@extends('frontend.layouts.master')
@section('content')
@include('frontend.pertials.slider')
@section('headerSection')
@include('frontend.pertials.slickstyle')
@endsection

<div style="background-color:  rgba(240,242,245,1)">
<div class="container" >
	<h1 class="title text-center mt-2">Shop by Categories</h1>
	<hr>
	<div class="row ">
		@foreach ($categories as $category)
		@if(!is_null($categories))
		@php
			$catcount=count($categories);
			$lastrow=fmod($catcount,3);
		@endphp
			
		@if($loop->index+1<=($catcount-$lastrow))
		<div class="col-md-4" >
			<div class="category">
				<div class="myChild" onclick="location.href='{{route('parentcategoryproduct.show',$category->id)}}';" style="cursor:pointer;">

				<img src="{!! asset('backend/images/categories/'.$category->image) !!}" alt="{{$category->name}}"  />
				</div>
				<div class="categorydetails" >
					<a href="" class="btn btn-default">{{$category->name}}</a>
				</div>
			</div>
		</div>
		@endif

		@if($loop->index+1>($catcount-$lastrow))
		
@if($lastrow==2 && $loop->index+1==($catcount-1))
		<div class="col-md-4 col-md-offset-2" >
			@elseif($lastrow==2 && $loop->index+1==($catcount))
			<div class="col-md-4">
				@elseif($lastrow==1)
				<div class="col-md-4 col-md-offset-4" >
			@endif

			<div class="category">
				<div class="myChild" onclick="location.href='{{route('parentcategoryproduct.show',$category->id)}}';" style="cursor:pointer;">

				<img src="{!! asset('backend/images/categories/'.$category->image) !!}" alt="{{$category->name}}"  />
				</div>
				<div class="categorydetails" >
					<a href="" class="btn btn-default">{{$category->name}}</a>
				</div>
			</div>
		</div>


		
		@endif
		@endif
		@endforeach
	</div>
	</div>
</div>

<div class="container" style="margin-top: 20px">
	

<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#bestsale" data-toggle="tab">T-Shirt</a></li>
								<li><a href="#toprated" data-toggle="tab">Blazers</a></li>
								<li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
								<li><a href="#kids" data-toggle="tab">Kids</a></li>
								<li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="bestsale" >
								<div class="col-sm-12">
								<div id="bestsalecarousel" class="carousel slide" data-ride="carousel" data-type="multi3" data-interval="2500">
				<div class="carousel-inner" style="left: -4%;">
					@foreach ($topsales as $topsale)

					@php
						 $product=$topsale->product
					@endphp
						
						<div class="item {{ $loop->index == 0 ? 'active' : '' }}">
						<div class="carousel-col">	

						<div class="col-sm-3" style="background-color: white">
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
						<h4 align="left" style="padding-left:  10px">{{$product->title}}</h4>
						<p align="left" style="padding-left:  10px">Price : {{$product->price}} BDT<br>
						Brand : {{$product->brand->name}}
						<div align="left" style="padding-left: 10px">Raiting : 
						
						@php
						$rait=App\Model\Frontend\Rating::where('product_id', $product->id)->get()->avg('rating');
						@endphp
						@for($i=1;$i<=5;$i++)

						@if($i<=$rait)

						<span class="fa fa-star " style="color: Orange " ></span>
						@else
						<span class="far fa-star " ></span>
						@endif

						@endfor
						</div>
						<br>
						@include('frontend.pertials.button.allbutton')
						
					</p>
						
					</div>

					
					@foreach($product->tags as $tag)
					@if($tag->name=="New")
					<img src="{!! asset('backend/images/home/new.png') !!}" class="new" alt="" />
					@endif
					@endforeach

				</div>
				
			</div>
		</div>

						</div>
						</div>
						@endforeach



						</div>
						<a class="left recommended-item-control" href="#bestsalecarousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#bestsalecarousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>	
						</div>	
									
								</div>
							</div>
							
							<div class="tab-pane fade" id="toprated" >
								<div class="col-sm-12">
								<div id="topratedcarousel" class="carousel slide" data-ride="carousel" data-type="multi4" data-interval="2500">
				<div class="carousel-inner" style="left: -4%;">
					@foreach ($topsales as $topsale)

					@php
						 $product=$topsale->product
					@endphp
						
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
						<a class="left recommended-item-control" href="#topratedcarousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#topratedcarousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>	
						</div>	
									
								</div>
							</div>
							
							<div class="tab-pane fade" id="sunglass" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="kids" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="poloshirt" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!--/category-tab-->
					

				</div>



				<div class="container">
  <h2>Our  Partners</h2>
   
</div>

							
							
<div style="background-color:black; margin-bottom: 20px; padding: 20px">
<div class="container"  >
	<h1 class="title text-center mt-2">Testomonials</h1>
	<hr>
	<section class="testomonials slider" >
   <div>
      <figure class="testimonial">
        <blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          <div class="btn"></div>
        </blockquote>
        <img src="http://pbs.twimg.com/profile_images/829191018331385858/jxsj-ZmD.jpg" alt="Maksim Goffin" />
        <div class="peopl">
          <h3>Neil Patel</h3>
          <p class="indentity">SEO Expert</p>
        </div>
      </figure>
    </div>
 
    <div>
      <figure class="testimonial">
        <blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          <div class="btn"></div>
        </blockquote>
        <img src="https://secure.gravatar.com/avatar/24a495e3a7316e619af62445f1a86886?s=96&d=mm&r=g" alt="Maksim Goffin" />
        <div class="peopl">
          <h3>Shaan</h3>
          <p class="indentity">Web Developer</p>
        </div>
      </figure>
    </div>
 
    <div>
      <figure class="testimonial">
        <blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          <div class="btn"></div>
        </blockquote>
        <img src="https://yt3.ggpht.com/a/AGF-l7_ESQtd3r7nPdFdP_mmyxn65RFy9JlGT0dGyA=s900-mo-c-c0xffffffff-rj-k-no" alt="Maksim Goffin" />
        <div class="peopl">
          <h3>Brian Dean</h3>
          <p class="indentity">SEO / Blogger</p>
        </div>
      </figure>
    </div>
 
    <div>
      <figure class="testimonial">
        <blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          <div class="btn" style="padding: 6px 2px !important"></div>
        </blockquote>
        <img src="https://design.sva.edu/wp-content/uploads/2018/08/Sagmeister.jpg" alt="Maksim Goffin" />
        <div class="peopl">
          <h3>Stefan Sagmeister</h3>
          <p class="indentity">Graphic Designer</p>
        </div>
      </figure>
    </div>
</section>
						</div>			
						</div>	


						<div style="background-color:#F8F8FF; margin-bottom: 20px; padding: 20px">
<div class="container"  >
	

	<h1 class="title text-center mt-2">Shop by Brands</h1>
	<hr>
	<section class="brands-logos slider">
   	@foreach ($brands as $brand)
					
						<div class="slide">	
						<a href="{!! route('brandproduct.show', $brand->id) !!}">
						
									<div class="branddispaly">
								<img src="{{ asset('backend/images/brands/'.$brand->image) }}" alt="{{$brand->name}}">
								<div class="displaytext">
									{{$brand->name}}
								</div>
							</div>
								</a>


						</div>
						
						@endforeach


      
      
   </section>
						</div>			
						</div>			
@endsection
@section('footerSection')
<script>
         var res = $('.myChild').width();
         $('.myChild').css({
            'height': res + 'px'
         });
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    $('.brands-logos').slick({

        slidesToShow: 6,
        slidesToScroll: -1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: true,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
    $('.testomonials').slick({

        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: true,
       responsive: [{
		breakpoint: 850,
		settings: {
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
		}
		}]
    });
});
</script>
    
      @include('frontend.pertials.homepagecorosal')
@endsection
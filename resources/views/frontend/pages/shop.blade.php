
			@extends('frontend.layouts.master')
@section('content')

	
	<!-- <section id="advertisement">
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section> -->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('frontend.pertials.leftslidebar')
				</div>
				
				@include('frontend.pages.allproduct')
				

			</div>

		</div>

	</section>
	
	@endsection
	@section('footerSection')
	 
	@endsection
	
	
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
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
<div id="wishbody">

			@include('frontend.pages.wish_body')
		</div>

			

			</div>
	</section> <!--/#cart_items-->

	

	@endsection
	@section('footerSection')
	@include('frontend.pertials.wishjs')
	<script>
        var th = new showHideText('.my-message', {
            charQty     : 50,
            ellipseText : "...",
        });
    </script>
    @endsection
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
<div id="cartbody">

			@include('frontend.pages.cart_body')
		</div>

			<p style="text-align: right;"><a class="btn btn-default check_out" href="{{route('checkout')}}">Check Out</a></p>

			</div>
	</section> <!--/#cart_items-->

	

	@endsection
	@section('footerSection')
	@include('frontend.pertials.cartjs')
	<script>
        var th = new showHideText('.my-message', {
            charQty     : 50,
            ellipseText : "...",
        });
    </script>
    @endsection
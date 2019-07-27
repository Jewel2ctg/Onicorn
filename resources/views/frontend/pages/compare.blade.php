@extends('frontend.layouts.master')
@section('content')
@section('headerSection')
<style>
.comparetable {
  border-collapse: collapse;
  width: 100%;
  margin: 20px;
}

.comparetable th {
  text-align: center;
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
<div class="container">
	<h1 style="text-transform: uppercase;text-align: center">comparison table</h1>
	<hr>
	@if(!is_null($products))
<div style="float: right"><a href="{{route('compare.deleteall')}}" class="btn btn-default">Delete All</a></div>
<br>
	<table  class="comparetable">
		<thead  >
			<th  >Spec</th>
			@foreach ($products as $product)
			<th >{{$product->title}}

<a href="{{route('compare.delete',$product->id)}}" style="float: right;"><i class="fa fa-times"></i></a>
			</th>
			@endforeach
			</thead>
			<tbody>
				<tr>
					<td>Image</td>
					@foreach($products as $product)
					<td>
 @php $i = 1; @endphp

        @foreach ($product->images as $image)
          @if ($i > 0)

										<img  src="{!! asset('backend/images/products/'.$image->image) !!}" alt="{{ $product->title }}"  width="150" height="150" />
@endif
          @php $i--; @endphp
        @endforeach
					</td>
					@endforeach
				</tr>
				
				@foreach($product->specification as $specification)
				@php
					$i=$loop->index;
				@endphp
				<tr>
					@foreach($products as $product)
					@if($loop->index==0)
					<td>{{$product->specification[$i]->attributes['name']}}</td>
					@endif
					<td>{{$product->specification[$i]->value}}</td>
					@endforeach
				</tr>
				@endforeach
				<tr>
					<td>price</td>
					@foreach($products as $product)
					<td>{{$product->price}} BDT</td>
					@endforeach
				</tr>

			</tbody>
	</table>
	@else
	<h2>There are no product to compare! Please add product first</h2>
	@endif
</div>

@endsection
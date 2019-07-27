<div class="row">
	<div class="col-md-10">
	<div class="col-md-3" >
<form  action="{{ route('carts.store' ) }}" method="post">
  @csrf
  <input type="hidden" name="product_id" value="{{ $product->id }}">
  <button type="button" class="add-to-cart " onclick="addToCart({{ $product->id }})" data-toggle="tooltip" title=" Add to cart!" style="background-color: transparent;color: #99A3A4" ><i class="fa fa-shopping-cart"></i></button>
</form>
</div>
<div class="col-md-3" style="border-left: 1px solid">
<form  action="{{ route('compare.store' ) }}" method="post">
  @csrf
  <input type="hidden" name="product_id" value="{{ $product->id }}">
  <a  class="add-to-compare" style="cursor: pointer;color:#99A3A4" onclick="addToCompare({{ $product->id }})" data-toggle="tooltip" title="Add to compare!" ><i class="fa fa-balance-scale"></i></a>
  
</form>
</div>
<div class="col-md-3" style="border-left: 1px solid">

<a href="{!! route('product_details', $product->id) !!}" class="add-to-cart" style="background-color: transparent;color: #99A3A4" data-toggle="tooltip" title="View Details!"><i class="fa fa-eye"></i></a>
</div>
<div class="col-md-3" style="border-left: 1px solid">

<form  action="{{ route('wish.store' ) }}" method="post">
  @csrf
  <input type="hidden" name="product_id" value="{{ $product->id }}">
  <a  class="add-to-wish" style="cursor: pointer; color:#99A3A4" onclick="addToWish({{ $product->id }})" data-toggle="tooltip" title="Add to Wish!"><i class="far fa-heart"></i></a>
  
</form>
</div>
</div>
</div>



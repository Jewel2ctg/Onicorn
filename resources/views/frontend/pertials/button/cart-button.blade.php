<form class="form-inline" action="{{ route('carts.store' ) }}" method="post">
  @csrf
  <input type="hidden" name="product_id" value="{{ $product->id }}">
  <button type="button" class="btn btn-default add-to-cart " onclick="addToCart({{ $product->id }})"  ><i class="fa fa-shopping-cart"></i> Add to cart</button>
</form>





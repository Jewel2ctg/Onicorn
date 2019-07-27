<form class="form-inline" action="{{ route('wish.store' ) }}" method="post">
  @csrf
  <input type="hidden" name="product_id" value="{{ $product->id }}">
  <a  class="add-to-wish" style="cursor: pointer" onclick="addToWish({{ $product->id }})"><i class="far fa-heart"></i>Add to Wish</a>
  
</form>





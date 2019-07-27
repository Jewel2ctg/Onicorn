<form class="form-inline" action="{{ route('compare.store' ) }}" method="post">
  @csrf
  <input type="hidden" name="product_id" value="{{ $product->id }}">
  <a  class="add-to-compare" style="cursor: pointer" onclick="addToCompare({{ $product->id }})"><i class="fa fa-balance-scale"></i>Add to compare</a>
  
</form>





<script src="{{ asset('frontend/js/jquery.js')}}"></script>

<script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{ asset('frontend/js/show-hide-text.js')}}"></script>
<script src="{{ asset('frontend/js/price-range.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{ asset('frontend/js/main.js')}}"></script>


<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<script >
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }

    });
    function addToCart(product_id){
       
        var url = "{{ url('/') }}";
		$.post( url+"/carts", 
			{ 
				product_id: product_id 
			})
		  .done(function( data ) {
		  	data = JSON.parse(data);
		    if(data.status == 'success'){
              alertify.set('notifier','position', 'top-center');
				alertify.success('Item added to cart successfully !! Total Items: '+data.totalItems+ '<br />To checkout <a href="{{route('cart')}}">go to checkout page</a>');
  
		    	$("#totalItems").html(data.totalItems);
          $("#totalWishItems").html(data.totalWishItems);
           }
        })
          .fail(function (jqXHR, textStatus, errorThrown) { 
            
                    window.location = '{{ route('login') }}'
                   });
    };
    </script>
<script >
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }

    });
    function addToWish(product_id){
       
        var url = "{{ url('/') }}";

    $.post( url+"/wish", 
      { 
        product_id: product_id 
      })
      .done(function( data ) {
        data = JSON.parse(data);
        console.log(data);
        if(data.status == 'success'){
          console.log('yes');
              alertify.set('notifier','position', 'top-center');
        alertify.success(data.Message+' !! Total Items: '+data.totalWishItems+ '<br />To check <a href="{{route('wish')}}">go to wish page</a>');
  
          $("#totalWishItems").html(data.totalWishItems);
           }
        })
          .fail(function (jqXHR, textStatus, errorThrown) { 
            
            
                    window.location = '{{ route('login') }}'
                   });
    };
    </script>
    <script >
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        }

    });
    function addToCompare(product_id){
       
        var url = "{{ url('/') }}";
    $.post( url+"/compare", 
      { 
        product_id: product_id 
      })
      .done(function( data ) {
        data = JSON.parse(data);
        if(data.status == 'success'){
              alertify.set('notifier','position', 'top-center');
        alertify.success(data.Message+' !! Total Items: '+data.totalCompareItems+ '<br />To compare <a href="{{route('compare')}}">go to compare page</a>');
  
          $("#totalCompareItems").html(data.totalCompareItems);
           }
        });
         }; 
    </script>
    <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

 @section('footerSection')
    @show
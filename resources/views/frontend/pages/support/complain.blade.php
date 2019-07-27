@extends('frontend.layouts.master')
@section('content')
@include('frontend.pertials.styleother')
<div class="container">
	<div class="row justify-content-center" >
	<div class="col-md-6 ">
     <div class="card">
                <div class="card-header">{{ __('Please type your complain here') }}</div>

                <div class="card-body">

<form  action="{{ route('complain.store' ) }}" method="post" enctype="multipart/form-data">
  @csrf

  <textarea name="complaingmessage" required rows="5" placeholder="Please Type your Complain"></textarea>

   <div class="form-group">
              <input name="publish" type="checkbox" value="yes">
              <label for="publish">Close (N.B. Not Check on close until you Satisfied)</label>
              
            </div>

  

   <div class="form-inline">

   	<div class="captcha">
   	<input type="captcha" type="text"  name="captcha" placeholder="Enter Captcha" required>
   		<span id="captcha">
   		{!! captcha_img() !!}</span>
   		<button type="button" class="btn btn-success btn-refresh"><i class="fa fa-refresh"></i></button>
   	
   </div>
@if ($errors->has('captcha'))
<span class="help-block">
<strong>{{($errors->first('captcha'))}}</strong>
</span>
@endif
   	</div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection

@section('footerSection')
<script type="text/javascript">
	$(".btn-refresh").click(function(){
		$.ajax({
			type:'GET',
			url:"{{ url('/') }}"+'/refreshcaptcha',
			success:function(data){
				

				$("#captcha").html(data.captcha);
			}
		});
	});
</script>

@endsection
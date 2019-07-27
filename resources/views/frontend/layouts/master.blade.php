<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Onicorn Limited</title>
   @include('frontend.pertials.styles')

</head>
<body >
  <!-- style="background-image: url({!! asset('frontend/images/home/background.png') !!}); background-repeat: no-repeat;  background-size: cover;" -->  
@include('frontend.pertials.header')
 
 
      <!-- Main content -->
      @section('content')
      @show
      <!-- /.content -->
   

   @include('frontend.pertials.footer')

  
    @include('frontend.pertials.scripts')

</body>
</html>

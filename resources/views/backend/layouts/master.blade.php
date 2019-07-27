<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  @include('backend.pertials.styles')

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    @include('backend.pertials.header') 
    <!-- Left side column. contains the logo and sidebar -->

    @include('backend.pertials.sidebar') 
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


      <!-- Main content -->
      @section('content')
      @show
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('backend.pertials.footer')
    @include('backend.pertials.control_sidebar')

  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  @include('backend.pertials.scripts')

</body>
</html>

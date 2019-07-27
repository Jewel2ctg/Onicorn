
@extends('backend.layouts.master')
@section('content')

<div class="box">
 @include('backend.pertials.messages')
 <div class="box-header">
  <h3 class="box-title">Coupon Table</h3>
  <a href="{{ route('coupons.create') }}" class="btn btn-success col-lg-offset-3">Add New</a>

</div>
<!-- /.box-header -->
<div class="box-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
     <tr>
      <th>SL</th>
      <th>Coupon Code</th>
      <th>Type</th>
      <th>Amount</th>
      <th>Expiry Date</th>

      <th>Action</th>
    </tr>
  </thead>
  <tbody>

   @foreach ($coupons as $coupon)
   <tr>
    <td>{{ $loop->index + 1 }}</td>
    <td>{{ $coupon->code }}</td>
    <td>
      @if( $coupon->type ==1)
      {{"Percentage"}}
      @else
      {{"Fixed"}}
      @endif
    </td>

<td>{{ $coupon->amount }}</td>
<td>{{ date('d-M-Y', strtotime($coupon->expiredate)) }} </td>
    <td>

      <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>

      <form id="delete-form-{{ $coupon->id }}" method="post" action="{{ route('coupons.destroy',$coupon->id) }}" style="display: none">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
      </form>
      <a href="" onclick="
      if(confirm('Are you sure, You Want to delete this?'))
      {
        event.preventDefault();
        document.getElementById('delete-form-{{ $coupon->id }}').submit();
      }
      else{
        event.preventDefault();
      }" class="btn btn-success" ><span class="glyphicon glyphicon-trash"></span></a>

    </td>
  </tr>
  @endforeach
</tbody>
<tfoot>
 <tr>
  <th>SL</th>
  <th>Coupon Code</th>
  <th>Type</th>
  <th>Amount</th>
  <th>Expiry Date</th>

  <th>Action</th>
</tr>
</tfoot>
</table>
</div>
<!-- /.box-body -->
</div>
<!-- page script -->


@endsection
@section('footerSection')

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection

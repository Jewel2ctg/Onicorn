
@extends('backend.layouts.master')
@section('content')

<div class="box">
  @include('backend.pertials.messages')
            <div class="box-header">
              <h3 class="box-title">District Table</h3>
 <a href="{{ route('districts.create') }}" class="btn btn-success col-lg-offset-3">Add New</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
              <th>SL</th>
              <th>District</th>
              <th>Division</th>
              <th>Country</th>
              
              <th>Action</th>
            </tr>
                </thead>
                <tbody>
                
                 @foreach ($districts as $district)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $district->name }}</td>
                
                <td>{{ $district->division->name }}</td>
                <td>{{ $district->division->country->name }}</td>
                <td>
                 
                  <a href="{{ route('districts.edit', $district->id) }}" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>

                  <form id="delete-form-{{ $district->id }}" method="post" action="{{ route('districts.destroy',$district->id) }}" style="display: none">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                </form>
                                <a href="" onclick="
                                if(confirm('Are you sure, You Want to delete this?'))
                                    {
                                      event.preventDefault();
                                      document.getElementById('delete-form-{{ $district->id }}').submit();
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
              <th>District</th>
              <th>Division</th>
              <th>Country</th>
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


@extends('backend.layouts.master')
@section('content')

<div class="box">
  @include('backend.pertials.messages')
            <div class="box-header">
              <h3 class="box-title">Division Table</h3>
 <a href="{{ route('divisions.create') }}" class="btn btn-success col-lg-offset-3">Add New</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
              <th>SL</th>
              <th>Division Name</th>
              <th>Country Name</th>
              <th>Priority</th>
              
              <th>Action</th>
            </tr>
                </thead>
                <tbody>
                
                 @foreach ($divisions as $division)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $division->name }}</td>
                <td>{{ $division->country->name }}</td>
                
                <td>{{ $division->priority }}</td>
                <td>
                 
                  <a href="{{ route('divisions.edit', $division->id) }}" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>

                  <form id="delete-form-{{ $division->id }}" method="post" action="{{ route('divisions.destroy',$division->id) }}" style="display: none">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                </form>
                                <a href="" onclick="
                                if(confirm('Are you sure, You Want to delete this?'))
                                    {
                                      event.preventDefault();
                                      document.getElementById('delete-form-{{ $division->id }}').submit();
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
              <th>Division Name</th>
              <th>Country Name</th>
              <th>Priority</th>
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

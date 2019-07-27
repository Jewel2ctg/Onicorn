
@extends('backend.layouts.master')
@section('content')

<div class="box">
  @include('backend.pertials.messages')
            <div class="box-header">
              <h3 class="box-title">Attributes Table</h3>
 <a href="{{ route('attributes.create') }}" class="btn btn-success col-lg-offset-3">Add New</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
              <th>SL</th>
              <th>Attribute Name</th>
              <th>Attribute Priority</th>
              
              <th>Action</th>
            </tr>
                </thead>
                <tbody>
                
                 @foreach ($attributes as $attribute)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $attribute->name }}</td>
                
                <td>{{ $attribute->priority }}</td>
                <td>
                 
                  <a href="{{ route('attributes.edit', $attribute->id) }}" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>

                  <form id="delete-form-{{ $attribute->id }}" method="post" action="{{ route('attributes.destroy',$attribute->id) }}" style="display: none">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                </form>
                                <a href="" onclick="
                                if(confirm('Are you sure, You Want to delete this?'))
                                    {
                                      event.preventDefault();
                                      document.getElementById('delete-form-{{ $attribute->id }}').submit();
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
             <th>Attribute Name</th>
              <th>Attribute Priority</th>
              
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

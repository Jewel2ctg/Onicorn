
@extends('backend.layouts.master')
@section('content')

<div class="box">
   @include('backend.pertials.messages')
            <div class="box-header">
              <h3 class="box-title">Type Table</h3>
 <a href="{{ route('types.create') }}" class="btn btn-success col-lg-offset-3">Add New</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
              <th>SL</th>
              <th>Type Name</th>
              <th>Type Attribute</th>
              
              <th>Action</th>
            </tr>
                </thead>
                <tbody>
                
                 @foreach ($types as $type)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $type->name }}</td>
                
                <td>
                @foreach ($type->attributes as $attribute)
                <small class="pull-left" style="margin-right: 20px;border-radius: 5px;border: 1px solid gray;padding: 5px;">  
                                    {{ $attribute->name }}
                                </small></a>
                @endforeach

                </td>
                <td>
                 
                  <a href="{{ route('types.edit', $type->id) }}" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>

                  <form id="delete-form-{{ $type->id }}" method="post" action="{{ route('types.destroy',$type->id) }}" style="display: none">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                </form>
                                <a href="" onclick="
                                if(confirm('Are you sure, You Want to delete this?'))
                                    {
                                      event.preventDefault();
                                      document.getElementById('delete-form-{{ $type->id }}').submit();
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
             <th>Type Name</th>
              <th>Type Attribute</th>
              
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

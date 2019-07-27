
@extends('backend.layouts.master')
@section('content')

<div class="box">
   @include('backend.pertials.messages')
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
 <a href="{{ route('category.create') }}" class="btn btn-success col-lg-offset-3">Add New</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
              <th>SL</th>
              <th>Category Name</th>
              <th>Category Image</th>
              <th>Parent Category</th>
              <th>Action</th>
            </tr>
                </thead>
                <tbody>
                
                 @foreach ($categories as $category)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $category->name }}</td>
                <td>
                  <img src="{!! asset('backend/images/categories/'.$category->image) !!}" width="100">
                </td>
                <td>
                  @if ($category->parent_id == NULL)
                    Primary Category
                  @else
                    {{ $category->parent->name }}
                  @endif
                </td>
                <td>
                 
                  <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>

                  <form id="delete-form-{{ $category->id }}" method="post" action="{{ route('category.destroy',$category->id) }}" style="display: none">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                </form>
                                <a href="" onclick="
                                if(confirm('Are you sure, You Want to delete this?'))
                                    {
                                      event.preventDefault();
                                      document.getElementById('delete-form-{{ $category->id }}').submit();
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
              <th>Category Name</th>
              <th>Category Image</th>
              <th>Parent Category</th>
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

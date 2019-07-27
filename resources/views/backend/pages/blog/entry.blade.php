
@extends('backend.layouts.master')
@section('content')


      <div class="row">
        <div class="col-md-12">
          <br>
          <!-- general form elements -->
          <div class="box box-primary col-md-10">    

      <div class="card">
        <div class="card-header">
         <h1> Add Post</h1>
        </div>
        <div class="card-body">
          <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('backend.pertials.messages')
            
            <div class="row">
            <div class="form-group col-md-4">
              <label for="title">Post Title</label>
              <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter Post Title">
            </div>

            <div class="form-group col-md-4">
              <label for="postbaner">Post Banner Image </label>
              <input type="file" class="form-control" name="postbaner" id="postbaner" >
            </div>
            
              <div class="form-group col-md-4" >
                                <label>Select Tags</label>
                                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tag[]">
                                @foreach ($tags as $tag)
                                  <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                                </select>
                              </div>
            </div>

            


            <div class="form-group">
              <label for="exampleInputPassword1">Post Body</label>
              <textarea name="description" rows="8" cols="80" class="form-control" id="description"></textarea>

            </div>

             <div class="form-group">
              <input name="publish" type="checkbox" value="yes">
              <label for="publish">Publish</label>
              
            </div>

            


            <button type="submit" class="btn btn-primary">Add Post</button>
            <a href="{{route('blog.index')}}" class="btn btn-warning">Back</a>
          </form>
            <br>
        </div>
      </div>
</div>
</div>
</div>
    

@endsection


@section('footerSection')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
  window.onload = function() {
    CKEDITOR.replace( 'description', {
      filebrowserUploadUrl: '{{ route('upload',['_token' => csrf_token() ]) }}'
    });
  };
</script>


<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>
@endsection

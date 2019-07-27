
@extends('backend.layouts.master')
@section('content')


      <div class="row">
        <div class="col-md-12">
          <br>
          <!-- general form elements -->
          <div class="box box-primary col-md-10">    

      <div class="card">
        <div class="card-header">
          Add Types
        </div>
        <div class="card-body">
          <form action="{{ route('types.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('backend.pertials.messages')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Types Name">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea name="description" rows="8" cols="80" class="form-control"></textarea>

            </div>
            


             <div class="form-group" style="margin-top:18px;">
                                <label>Select Attributes</label>
                                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="attribute[]">
                                @foreach ($attributes as $attribute)
                                  <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                @endforeach
                                </select>
                              </div>

            
            


            <button type="submit" class="btn btn-primary">Add Types</button>
            <a href="{{route('types.index')}}" class="btn btn-warning">Back</a>
          </form>
            <br>
        </div>
      </div>
</div>
</div>
</div>
    

@endsection


@section('footerSection')

<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>
@endsection

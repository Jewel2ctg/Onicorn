
@extends('backend.layouts.master')
@section('content')


      <div class="row">
        <div class="col-md-12">
          <br>
          <!-- general form elements -->
          <div class="box box-primary col-md-10">    

      <div class="card">
        <div class="card-header">
          Add Attributes
        </div>
        <div class="card-body">
          <form action="{{ route('attributes.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('backend.pertials.messages')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Attributes Name">
            </div>

             <div class="form-group">
              <label for="name">Priority</label>
              <input type="number" class="form-control" name="priority" id="priority" aria-describedby="emailHelp" placeholder="Enter Priority">
            </div>

            
            


            <button type="submit" class="btn btn-primary">Add Attributes</button>
            <a href="{{route('attributes.index')}}" class="btn btn-warning">Back</a>
          </form>
            <br>
        </div>
      </div>
</div>
</div>
</div>
    

@endsection

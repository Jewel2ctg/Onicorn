
@extends('backend.layouts.master')
@section('content')


      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary col-md-10">    

      <div class="card">
        <div class="card-header">
          Add Attribute
        </div>
        <div class="card-body">
         <form action="{{ route('attributes.update', $attribute->id) }}" method="post" enctype="multipart/form-data">
            @csrf
             {{ method_field('PUT') }}
            @include('backend.pertials.messages') 
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Attribute Name" value="{{$attribute->name}}">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Priority</label>
               <input type="number" class="form-control" name="priority" id="priority" aria-describedby="emailHelp" placeholder="Enter priority" value="{{$attribute->priority}}">

            </div>

           
            


            <button type="submit" class="btn btn-success">Update Attribute</button>
            <a href="{{route('attributes.index')}}" class="btn btn-warning">Back</a>
          </form>
            <br>
        </div>
      </div>
</div>
</div>
</div>
    

@endsection

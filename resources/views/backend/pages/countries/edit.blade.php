
@extends('backend.layouts.master')
@section('content')


      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <br>
          <!-- general form elements -->
          <div class="box box-primary col-md-10">    

      <div class="card">
        <div class="card-header">
          Add Country
        </div>
        <div class="card-body">
         <form action="{{ route('countries.update', $country->id) }}" method="post" enctype="multipart/form-data">
            @csrf
             {{ method_field('PUT') }}
            @include('backend.pertials.messages') 
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Country Name" value="{{$country->name}}">
            </div>

            

           
            


            <button type="submit" class="btn btn-success">Update Country</button>
            <a href="{{route('countries.index')}}" class="btn btn-warning">Back</a>
          </form>
            <br>
        </div>
      </div>
</div>
</div>
</div>
    

@endsection

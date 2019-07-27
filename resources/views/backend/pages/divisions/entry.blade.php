
@extends('backend.layouts.master')
@section('content')


      <div class="row">
        <div class="col-md-12">
          <br>
          <!-- general form elements -->
          <div class="box box-primary col-md-10">    

      <div class="card">
        <div class="card-header">
          Add Division
        </div>
        <div class="card-body">
          <form action="{{ route('divisions.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('backend.pertials.messages')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Division Name">
            </div>

             <div class="form-group">
              <label for="country_id">Select a country for this division</label>
              <select class="form-control" name="country_id">
                <option value="">Please select a country for the division</option>
                @foreach ($countries as $country)
                  <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="priority">priority</label>
              <input type="text" class="form-control" name="priority" id="priority" aria-describedby="emailHelp" placeholder="Enter Division priority">
            </div>


            <button type="submit" class="btn btn-primary">Add Division</button>
            <a href="{{route('divisions.index')}}" class="btn btn-warning">Back</a>
          </form>
            <br>
        </div>
      </div>
</div>
</div>
</div>
    

@endsection

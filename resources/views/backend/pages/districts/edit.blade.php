
@extends('backend.layouts.master')
@section('content')


      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary col-md-10">    

      <div class="card">
        <div class="card-header">
          Edit District
        </div>
        <div class="card-body">
          <form action="{{ route('districts.update', $district->id) }}" method="post" enctype="multipart/form-data">
            @csrf
             {{ method_field('PUT') }}
            @include('backend.pertials.messages')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $district->name }}">
            </div>

            <div class="form-group">
              <label for="country_id">Select a country for this District</label>
              <select class="form-control" name="country_id" id="country_id">
                <option value="">Please select a country for the District</option>
                @foreach ($countries as $country)
                  <option value="{{ $country->id }}"{{ $district->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group ">
                <label for="division_id" >Select a Division</label>

                
                  <select class="form-control" name="division_id" id="division-area">
                    @foreach ($divisions as $division)
                <option value="{{ $division->id }}" {{ $district->division_id == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
              @endforeach
                  </select>
                
              </div>


            <button type="submit" class="btn btn-success">Update District</button>
            <a href="{{route('districts.index')}}" class="btn btn-warning">Back</a>
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


    $("#country_id").change(function(){
        var country = $("#country_id").val();
        //console.log(country);
        // Send an ajax request to server with this division
        $("#division-area").html("");
        var option = "";
        var url="{{ url('/') }}";

        $.get( url+"/get-division/"+country, function( data ) {

            data = JSON.parse(data);
            data.forEach( function(element) {
              option += "<option value='"+ element.id +"'>"+ element.name +"</option>";
            });

          $("#division-area").html(option);

        });
    })
</script>
@endsection

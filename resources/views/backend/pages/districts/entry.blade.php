
@extends('backend.layouts.master')
@section('content')


      <div class="row">
        <div class="col-md-12">
          <br>
          <!-- general form elements -->
          <div class="box box-primary col-md-10">    

      <div class="card">
        <div class="card-header">
          Add District
        </div>
        <div class="card-body">
          <form action="{{ route('districts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('backend.pertials.messages')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter District Name">
            </div>

            <div class="form-group">
              <label for="country_id">Select a country for this District</label>
              <select class="form-control" name="country_id" id="country_id">
                <option value="">Please select a country for the District</option>
                @foreach ($countries as $country)
                  <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group ">
                <label for="division_id" >Select a Division</label>

                
                  <select class="form-control" name="division_id" id="division-area">
                  </select>
                
              </div>

            <button type="submit" class="btn btn-primary">Add District</button>
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

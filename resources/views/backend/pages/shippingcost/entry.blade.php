
@extends('backend.layouts.master')
@section('content')


      <div class="row">
        <div class="col-md-12">
          <br>
          <!-- general form elements -->
          <div class="box box-primary col-md-10">    

      <div class="card">
        <div class="card-header">
          Add Shipping Cost
        </div>
        <div class="card-body">
          <form action="{{ route('shippingcost.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('backend.pertials.messages')
            

             <div class="form-group">
              <label for="district_id">Select a district</label>
              <select class="form-control" name="district_id">
                <option value="">Please select a district</option>
                @foreach ($districts as $district)
                  <option value="{{ $district->id }}">{{ $district->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="amount">Shipping Cost</label>
              <input type="text" class="form-control" name="amount" id="amount" aria-describedby="emailHelp" placeholder="Enter Shippingcost">
            </div>


            <button type="submit" class="btn btn-primary">Add Shipping Cost</button>
            <a href="{{route('shippingcost.index')}}" class="btn btn-warning">Back</a>
          </form>
            <br>
        </div>
      </div>
</div>
</div>
</div>
    

@endsection

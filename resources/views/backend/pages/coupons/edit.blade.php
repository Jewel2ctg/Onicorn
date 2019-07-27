
@extends('backend.layouts.master')
@section('content')


      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <br>
          <!-- general form elements -->
          <div class="box box-primary col-md-10">    

      <div class="card">
        <div class="card-header">
          Add Coupon
        </div>
        <div class="card-body">
         <form action="{{ route('coupons.update', $coupon->id) }}" method="post" enctype="multipart/form-data">
            @csrf
             {{ method_field('PUT') }}
            @include('backend.pertials.messages') 
            <div class="form-group">
              <label for="code">Code</label>
              <input type="text" class="form-control" name="code" id="code" aria-describedby="emailHelp" placeholder="Enter Coupon Code" value="{{ $coupon->code }}">
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Select Type</label>
              <select class="form-control" name="type">
                <option value="">Please select coupon type</option>
                 <option value="1" {{ 1 == $coupon->type ? 'selected' : '' }}>Percentage</option>
                  <option value="2" {{ 2 == $coupon->type ? 'selected' : '' }}>Fixed</option>
                
              </select>
            </div>
            <div class="form-group">
              <label for="amount">Amount</label>
              <input type="number" class="form-control" name="amount" id="amount" aria-describedby="emailHelp" placeholder="Amount" value="{{ $coupon->amount }}">
            </div>
            


            <div class="form-group">
                <label>Expire Date</label>

                <div class="input-group ">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control pull-right" id="datepicker" name="expiredate" style="line-height: 15px;" value="{{$coupon->expiredate}}">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

            

           
            


            <button type="submit" class="btn btn-success">Update Coupon</button>
            <a href="{{route('coupons.index')}}" class="btn btn-warning">Back</a>
          </form>
            <br>
        </div>
      </div>
</div>
</div>
</div>
    

@endsection

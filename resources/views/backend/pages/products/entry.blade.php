
@extends('backend.layouts.master')
@section('content')


    
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary col-md-10">    

      <div class="card">
        <div class="card-header">
          Add Product
        </div>
        <div class="card-body">
          <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('backend.pertials.messages') 
            <div class="row">
              <div class="col-md-6">
                
             
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Name">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea name="description" rows="8" cols="80" class="form-control"></textarea>

            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Price</label>
              <input type="number" class="form-control" name="price" id="exampleInputEmail1">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Quantity</label>
              <input type="number" class="form-control" name="quantity" id="exampleInputEmail1">
            </div>
</div>
            
<div class="col-md-6">


            <div class="form-group">
              <label for="exampleInputEmail1">Select Category</label>
              <select class="form-control" name="category_id">
                <option value="">Please select a category for the product</option>
               
                @foreach (App\Model\Backend\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)

                  @foreach (App\Model\Backend\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
                    <option value="{{ $child->id }}"> {{ $child->name }}</option>

                  @endforeach

                @endforeach
              </select>
            </div>


 

            <div class="form-group">
              <label for="exampleInputEmail1">Select Brand</label>
              <select class="form-control" name="brand_id">
                <option value="">Please select a brand for the product</option>
                @foreach (App\Model\Backend\Brand::orderBy('name', 'asc')->get() as $brand)
                  <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Select Type</label>
              <select class="form-control" name="type_id" id="typesid">
                <option value="">Please select a type for the product</option>
                @foreach (App\Model\Backend\Types::orderBy('name', 'asc')->get() as $type)
                  <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
              </select>
            </div>

              <div class="form-group" style="margin-top:18px;">
                                <label>Select Tags</label>
                                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tag[]">
                                @foreach ($tags as $tag)
                                  <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                                </select>
                              </div>


            <div class="form-group">
              <label for="product_image">Product Image</label>

              <div class="row">
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
              </div>
            </div>
<table  class="table table-bordered table-striped">

  <thead>
                 <tr>
              <th>SL</th>

              <th>Attribute</th>
              <th>Value</th>
              
            </tr>
                </thead>
                <tbody id="typeattribute">
                   </tbody>
                <tfoot>
                 <tr>
              <th>SL</th>
              
              <th>Attribute</th>
              <th>Value</th>
            </tr>
                </tfoot>
           
              </table>

            <button type="submit" class="btn btn-primary">Add Product</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  </div>
    
</div></div>
@endsection
@section('footerSection')

<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>


  <script>

    $("#typesid").change(function(){
        var type = $("#typesid").val();
        // Send an ajax request to server with this type
        $("#typeattribute").html("");
        var option = "";
        var i=0;
        var url="{{ url('/') }}";


        $.get( url+"/get-attributes/"+type, function( data ) {

            data = JSON.parse(data);
           
            data.forEach( function(element) {
              i++;
              option += 



               '<tr>'+
              '<td>' + i + '</td>' +

                            '<td class="hidden"> <input type="hidden" name="attribute[]" value="'+element.id+'" class="form-control" /></td>' +
                            '<td>' + element.name + '</td>' +
                            '<td><input type="text" name="spec[]" class="form-control" /></td>';
        
                            
                        '</tr>';



              
            });

          $("#typeattribute").html(option);

        });
    })

    
  </script>
@endsection
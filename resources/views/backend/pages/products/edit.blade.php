
@extends('backend.layouts.master')
@section('content')


      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary col-md-10">    

      <div class="card">
        <div class="card-header">
          Add Brand
        </div>
        <div class="card-body">
         <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
             {{ method_field('PUT') }}
            @include('backend.pertials.messages') 
            <div class="row">
              <div class="col-md-6">
                
             
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Name" value="{{$product->title}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea name="description" rows="8" cols="80" class="form-control">{!!$product->description!!}</textarea>

            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Price</label>
              <input type="number" class="form-control" name="price" id="exampleInputEmail1" value="{{$product->price}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Quantity</label>
              <input type="number" class="form-control" name="quantity" id="exampleInputEmail1" value="{{$product->quantity}}">
            </div>
</div>
            
<div class="col-md-6">


            <div class="form-group">
              <label for="exampleInputEmail1">Select Category</label>
              <select class="form-control" name="category_id">
                <option value="">Please select a category for the product</option>
               
                @foreach (App\Model\Backend\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)

                  @foreach (App\Model\Backend\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
                    <option value="{{ $child->id }}" {{ $child->id == $product->category->id ? 'selected' : '' }}> {{ $child->name }}</option>

                  @endforeach

                @endforeach
              </select>
            </div>


 
<div class="form-group">
              <label for="exampleInputEmail1">Select Brand</label>
              <select class="form-control" name="brand_id">
                <option value="">Please select a brand for the product</option>
                @foreach (App\Model\Backend\Brand::orderBy('name', 'asc')->get() as $br)
                  <option value="{{ $br->id }}" {{ $br->id == $product->brand->id ? 'selected' : '' }}>{{ $br->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Select Type</label>
              <select class="form-control" name="type_id" id="typesid">
                <option value="">Please select a type for the product</option>
                @foreach (App\Model\Backend\Types::orderBy('name', 'asc')->get() as $ty)
                  <option value="{{ $ty->id }}"{{ $ty->id == $product->type->id ? 'selected' : '' }}>{{ $ty->name }}</option>
                @endforeach
              </select>
            </div>

              <div class="form-group" style="margin-top:18px;">
                                <label>Select Tags</label>
                                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tag[]">
                              
                              @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}"
                      @foreach ($product->tags as $ta)
                        @if ($ta->id == $tag->id)
                          selected
                        @endif
                      @endforeach
                    >{{ $tag->name }}</option>
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
                  @foreach($product->specification as $spec)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td class="hidden"><input type="hidden" name="attribute[]" value="{{$spec->attributes->id}}" class="form-control" />
                      </td>
                    <td>{{$spec->attributes->name}}</td>
                    <td><input type="text" name="spec[]" class="form-control" value="{{$spec->value}}" required /></td>
                  </tr>
                  @endforeach

                   </tbody>
                <tfoot>
                 <tr>
              <th>SL</th>
              
              <th>Attribute</th>
              <th>Value</th>
            </tr>
                </tfoot>
            
              </table>


            <button type="submit" class="btn btn-success">Update Brand</button>
            <a href="{{route('brands.index')}}" class="btn btn-warning">Back</a>
          </div>
      </div>
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
                            '<td><input type="text" name="spec[]" class="form-control" required/></td>';
        
                            
                        '</tr>';



              
            });

          $("#typeattribute").html(option);

        });

    })

    
  </script>
@endsection
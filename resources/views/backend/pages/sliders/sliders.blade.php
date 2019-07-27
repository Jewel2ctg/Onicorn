
@extends('backend.layouts.master')
@section('content')
<br>
<div class="card">
        <div class="card-header">
          Manage Sliders
        </div>
        <div class="card-body">
            @include('backend.pertials.messages')

            <a href="#addSliderModal" data-toggle="modal" class="btn btn-info float-right mb-2">
              <i class="fa fa-plus"></i> Add New Slider
            </a>
            <div class="clearfix"></div>
            
            <!-- Add Modal -->
            <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form action="{!! route('sliders.store') !!}"  method="post" enctype="multipart/form-data">

                      {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-md-6">
                        <div class="form-group">
                        <label for="title">Slider Title <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Slider Title" required>
                      </div>

                      <div class="form-group">
                        <label for="subtitle">Slider Sub Title <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Slider Sub Title" required>
                      </div>

<div class="form-group">
                        <label for="description">Slider Description <small class="text-danger">(required)</small></label>
                        <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
                      </div>

                      </div>
                      <div class="col-md-6">
                         <div class="form-group">
                        <label for="image">Slider Image <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Slider Image" required>
                      </div>

                      <div class="form-group">
                        <label for="price">Price <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="Price" required>
                      </div>

                      <div class="form-group">
                        <label for="button_text">Slider Button Text <small class="text-info">(optional)</small></label>
                        <input type="text" class="form-control" name="button_text" id="button_text" placeholder="Slider Button Text (if need)">
                      </div>

                      <div class="form-group">
                        <label for="button_link">Slider Button Link <small class="text-info">(optional)</small></label>
                        <input type="url" class="form-control" name="button_link" id="button_link" placeholder="Slider Button Text (if need)">
                      </div>

                      <div class="form-group">
                        <label for="priority">Slider Priority <small class="text-info">(required)</small></label>
                        <input type="number" class="form-control" name="priority" id="priority" placeholder="Slider Priority; e.g: 10" value="10" required>
                      </div>
                      </div>
                    </div>
                  </div>
                      

                     

                      <button type="submit" class="btn btn-success">Add New</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                    </form>

                  </div>
                </div>
              </div>
            </div>


          <table class="table table-hover table-striped">
            <tr>
              <th>#</th>
              <th>Slider Title</th>
              <th>Slider Image</th>
              <th>Slider Priority</th>
              <th>Action</th>
            </tr>

            @foreach ($sliders as $slider)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $slider->title }}</td>
                <td>
                  <img src="{{ asset('backend/images/sliders/'.$slider->image) }}" width="40">
                </td>
                <td>{{ $slider->priority }}</td>

                <td>
                  <a href="#editModal{{ $slider->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{ $slider->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('sliders.destroy', $slider->id) !!}"  method="post">
                            {{ csrf_field() }}                             
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Permanent Delete</button>
                          </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Edit Modal -->
                  <div class="modal fade" id="editModal{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('sliders.update', $slider->id) !!}"  method="post" enctype="multipart/form-data">

                           {{ csrf_field() }}
                          {{ method_field('PUT') }}
                          <div class="row">
                    <div class="col-md-12">
                      <div class="col-md-6">


                          <div class="form-group">
                            <label for="title">Slider Title <small class="text-danger">(required)</small></label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Slider Title" required value="{{ $slider->title }}">
                          </div>
                          <div class="form-group">
                        <label for="subtitle">Slider Sub Title <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Slider Sub Title" required value="{{ $slider->subtitle }}">
                      </div>

<div class="form-group">
                        <label for="description">Slider Description <small class="text-danger">(required)</small></label>
                        <textarea name="description" rows="8" cols="80" class="form-control">{!!$slider->description!!}</textarea>
                      </div>

                      </div>
                      <div class="col-md-6">

                          <div class="form-group">
                            <label for="image">Slider Image 
                              <a href="{{ asset('backend/images/sliders/'.$slider->image) }}" target="_blank">
                                Previous Image
                              </a>

                              <small class="text-danger">(required)</small></label>
                            <input type="file" class="form-control" name="image" id="image" placeholder="Slider Image">
                          </div>
                          <div class="form-group">
                        <label for="price">Price <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="Price" required value="{{ $slider->price }}">
                      </div>

                          <div class="form-group">
                            <label for="button_text">Slider Button Text <small class="text-info">(optional)</small></label>
                            <input type="text" class="form-control" name="button_text" id="button_text" placeholder="Slider Button Text (if need)"  value="{{ $slider->button_text }}">
                          </div>

                          <div class="form-group">
                            <label for="button_link">Slider Button Link <small class="text-info">(optional)</small></label>
                            <input type="url" class="form-control" name="button_link" id="button_link" placeholder="Slider Button Text (if need)"  value="{{ $slider->button_link }}">
                          </div>

                          <div class="form-group">
                            <label for="priority">Slider Priority <small class="text-info">(required)</small></label>
                            <input type="number" class="form-control" name="priority" id="priority" placeholder="Slider Priority; e.g: 10" required  value="{{ $slider->priority }}">
                          </div>
                        </div>
                      </div>
                    </div>

                          <button type="submit" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                        </form>
                        </div>
                      </div>
                    </div>
                  </div>


                </td>
              </tr>
            @endforeach

          </table>
        </div>
      </div>
@endsection

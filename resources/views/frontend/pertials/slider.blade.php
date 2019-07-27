

		 <section id="slider"><!--slider-->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              @foreach ($sliders as $slider)
              <li data-target="#slider-carousel" data-slide-to="{{ $loop->index}}" class="{{ $loop->index == 0 ? 'active' : '' }}"></li>
              @endforeach
            </ol>
            
            <div class="carousel-inner">
              @foreach ($sliders as $slider)
              <div class="item {{ $loop->index == 0 ? 'active' : '' }}">
                <div class="col-sm-6">
                  <h1>{{$slider->title}}</h1>
                  <h2>{{$slider->subtitle}}</h2>
                  <p>{!!$slider->description!!}</p>
                  @if ($slider->button_text)
                  <a href="{{ $slider->button_link }}" target="_blank" class="btn btn-danger">{{ $slider->button_text }}</a> 

                  @endif
                </div>
                <div class="col-sm-6">
                  <img src="{{ asset('backend/images/sliders/'.$slider->image) }}" alt="{{ $slider->title }}" class="girl img-responsive"  />
                  <div  class="pricing">

                    <div id="outer-circle">
  <div id="inner-circle">
  <div id="inner-circle1">
    <div style="margin: 15px">
      <h2 align="center">Only <span style="color: orange;font-weight: normal;">{{$slider->price}}</span> BDT</h2>
    </div>
</div>
  </div>
</div></div>
                </div>
              </div>

               @endforeach
              
              
            </div>
            
            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
          </div>
          
        </div>
      </div>
    </div>
  </section><!--/slider-->
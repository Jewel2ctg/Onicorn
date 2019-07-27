<div class="left-sidebar">
	<h2>Category</h2>
	<div class="panel-group category-products" id="accordian"><!--category-productsr-->
		@foreach (App\Model\Backend\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)

		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordian" href="#main-{{ $parent->id }}"

						aria-expanded="true" aria-controls="main-{{ $parent->id }}"

						>
						<span class="badge pull-right"><i class="fa fa-plus"></i></span>
						{{ $parent->name }}
					</a>
				</h4>
			</div>
			<div id="main-{{ $parent->id }}" class="panel-collapse <?php
			if (Route::is('categoryproduct.show')){
				if ($category->parent_id!=$parent->id){
					echo "collapse";
				}

				}
				else
				{
					echo "collapse";
				}
				?>" >

				<div class="panel-body">
					<ul>
						@foreach (App\Model\Backend\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)




						<li><a href="{!! route('categoryproduct.show', $child->id) !!}">


							{{ $child->name }} </a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			@endforeach

		</div><!--/category-products-->

		<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach(App\Model\Backend\Brand::orderBy('name', 'asc')->get() as $brand )

									<li ><a href="{!! route('brandproduct.show', $brand->id) !!}"> <span class="pull-right">({{count(App\Model\Backend\Product::where('brand_id',$brand->id)->get())}})</span>{{$brand->name}}
									</a> 

									</li>
									@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->

		<!--<div class="price-range">
			<h2>Price Range</h2>
			<div class="well text-center">
				<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
				<b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
			</div>
				</div>  price-range-->
		 
		@if(Route::is('categoryproduct.show') || Route::is('brandproduct.show') || Route::is('parentcategoryproduct.show') ) 
		 <div class="price-range"><!--price-range-->

                                <div class="well">
                                   <h2>Price Range</h2>
                                    <div id="slider-range"></div>
                                    <br>
                                    <b class="pull-left">$
                                        <input size="2" type="text" id="amount_start" name="start_price"
                                               value="15" style="border:0px; font-weight: bold; color:green" readonly="readonly" /></b>

                                    <b class="pull-right">$
                                        <input size="2" type="text" id="amount_end" name="end_price" value="65"
                                               style="border:0px; font-weight: bold; color:green" readonly="readonly"/></b>
                                   </div>

                            </div><!--/price-range-->

                            

                                <div class="well">
                                   <h2>Sort By</h2>
                                   <select id="sortby">
                                   	<option >
                                   		Select
                                   	</option>
                                   	<option value="'price', 'asc'">
                                   		By price (A-Z)
                                   	</option>
                                   	<option value="'price', 'desc'">
                                   		By price (Z-A)
                                   	</option>
                                   	<option value="'created_at', 'asc'">
                                   		By Arival (A-Z) 
                                   	</option>
                                   	<option value="'created_at', 'desc'">
                                   		By Arival (Z-A) 
                                   	</option>
                                   	<option value="'category_id', 'asc'">
                                   		By category (A-Z)
                                   	</option>
                                   	<option value="'category_id', 'desc'">
                                   		By category (Z-A)
                                   	</option>
                                   	<option value="'brand_id', 'asc'">
                                   		By Brand (A-Z)
                                   	</option>
                                   	<option value="'brand_id', 'desc'">
                                   		By Brand (Z-A)
                                   	</option>
                                   </select>
                                    
                                   </div>
		
		@endif

                            

		<div class="shipping text-center"><!--shipping-->
			<img src="images/home/shipping.jpg" alt="" />
		</div><!--/shipping-->

	</div>

	@section('footerSection')
@include('frontend.pages.jsforproductshow')
@endsection





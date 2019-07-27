<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +88 018 777 25 151</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@onicornbd.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fab fa-facebook"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fab fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fab fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="{{route('index')}}"><img src="{!! asset('frontend/images/home/logo.png') !!}" height="50px" width="50px" alt="" /></a>
						</div>
						<div class="btn-group pull-right clearfix">
							
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">

								<li><a href="{{route('compare')}}"><i class="fa fa-balance-scale"></i> Compare
									
								 <span class="badge" id="totalCompareItems">@if(!is_null(Session('compare')))
								 	{{ count(Session('compare')) }}
								 @else
								 0
								 @endif
								</span>
								</a></li>
								<li><a href="{{route('wish')}}"><i class="far fa-heart"></i>Wishlist <span class="badge" id="totalWishItems">{{ App\Model\Frontend\Wish::totalWishItems() }}</span></a></li>
								
								<li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i> Cart <span class="badge" id="totalItems">{{ App\Model\Frontend\Cart::totalItems() }}</span></a></li>
								@if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    
                                   
              <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif 
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{ route('index') }}" >Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu ">
                                        <li ><a href="{{ route('product') }}">Products</a></li>
										
										<li><a href="{{ route('checkout') }}">Checkout</a></li> 
										<li><a href="{{ route('cart') }}">Cart</a></li> 

										
										
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{ route('blog') }}">Blog List</a></li>
										<li><a href="{{ route('blogpost') }}">Blog Single</a></li>
                                    </ul>
                                </li> 
								
								<li><a href="{{ route('contact_us') }}">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<form class="form-inline my-2 my-lg-0" action="{!! route('search') !!}" method="get">
            
            <div class="search_box pull-right">
							<input type="text" class="form-control" name="search" placeholder="Search Products" style="color: black" />
						</div>



          </form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
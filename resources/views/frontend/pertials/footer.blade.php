<footer id="footer"><!--Footer-->
		{{-- <div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Support</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Complain</a></li>
								<li><a href="#">Feedback</a></li>
								<li><a href="#">Live Chat</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Contsct US</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quick Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								
								@foreach (App\Model\Backend\Category::where('parent_id', null)->orderBy('name','asc')->get() as $category)
								<li><a href="{{route('parentcategoryproduct.show',$category->id)}}">{{$category->name}}</a></li>
								
								@endforeach
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Payment System</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Why Onicorn</a></li>
								
								<li><a href="#">Other Services</a></li>
								<li><a href="#">Events</a></li>
								<li><a href="#">Media</a></li>
								<li><a href="#">Blog</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Get In Touch</h2>
<ul class="nav nav-pills nav-stacked">
							<li><a href="#"><i class="fas fa-map-marker-alt"></i>
</i>House # 10/12 (2nd floor), Road # 5, Block # G, Halishahar, Chittagong, Bangladesh</a></li>
								<li>
							<a href="#"><i class="fa fa-phone"></i> +88 018 777 25 151</a></li>
							<li><a href="#"><i class="fa fa-envelope"></i> info@onicornbd.com</a></li>
</ul>
							
						
					
						
							
							<div>
							<form action="#" class="form-inline my-2 my-lg-0">
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								
							</form>
							</div>

							<ul class="nav navbar-nav" >
								<li ><a href="#" style="font-size: 30px;"><i class="fab fa-facebook"></i></a></li>
								<li><a href="#" style="font-size: 30px;"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#" style="font-size: 30px;"><i class="fab fa-linkedin"></i></a></li>
								<li><a href="#" style="font-size: 30px;"><i class="fab fa-dribbble"></i></a></li>
								<li><a href="#" style="font-size: 30px;"><i class="fab fa-google-plus" style="font-size: 30px;"></i></a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2017 Onicorn Limited. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="">ONICORN</a></span></p>
				</div>
			</div>
		</div>
		<!-- Load Facebook SDK for JavaScript -->
		
	</footer><!--/Footer-->
	
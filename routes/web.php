<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/






// Route::get('/admin/',function(){
// 	return view('admin.pages.home');
// });

//Route::get('/','User\PagesController@index')->name('index'); 

Route::get('/search', 'Frontend\PagesController@search')->name('search');



Route::get('/category/{id}', 'Frontend\PagesController@categoryshow')->name('categoryproduct.show');
Route::get('/parentcategory/{id}', 'Frontend\PagesController@parentcategoryshow')->name('parentcategoryproduct.show');
 Route::get('/brand/{id}', 'Frontend\PagesController@brandshow')->name('brandproduct.show');
Route::get('/product_details/{id}','Frontend\PagesController@product_details')->name('product_details');
Route::get('/shop','Frontend\PagesController@product')->name('product');





Route::get('/contact_us','Frontend\PagesController@contact_us')->name('contact_us');
Route::get('/blog','Frontend\PagesController@blog')->name('blog');
Route::get('/blogpost','Frontend\PagesController@blogpost')->name('blogpost');



Route::get('/checkout','Frontend\CheckoutController@index')->name('checkout');
Route::post('/checkout/store','Frontend\CheckoutController@store')->name('checkout.store');



Route::group(['namespace' => 'Frontend'],function(){
Route::get('/carts','CartController@index')->name('cart');
Route::post('/carts','CartController@store')->name('carts.store');
Route::get('/carts/update-quantity/{id}/{quantity}','CartController@updateCartQuantity');
Route::post('/carts/update/{id}', 'CartController@update')->name('carts.update');
  Route::get('/carts/delete/{id}', 'CartController@destroy')->name('carts.delete');
  Route::get('/carts/movetowish/{id}', 'CartController@movetowish')->name('carts.movetowish');
  
});
Route::group(['namespace' => 'Frontend'],function(){
Route::get('/wish','WishController@index')->name('wish');
Route::post('/wish','WishController@store')->name('wish.store');
Route::get('/wish/update-quantity/{id}/{quantity}','WishController@updateWishQuantity');
Route::post('/wish/update/{id}', 'WishController@update')->name('wish.update');
  Route::get('/wish/delete/{id}', 'WishController@destroy')->name('wish.delete');
  Route::get('/wish/movetocart/{id}', 'WishController@movetocart')->name('wish.movetocart');
  
});

Route::group(['namespace' => 'Frontend'],function(){
Route::get('/compare','CompareController@index')->name('compare');
Route::post('/compare','CompareController@store')->name('compare.store');
Route::get('/compare/deleteall','CompareController@deleteall')->name('compare.deleteall');
Route::get('/compare/update-quantity/{id}/{quantity}','CompareController@updateCartQuantity');
Route::post('/compare/update/{id}', 'CompareController@update')->name('compare.update');
  Route::get('/compare/delete/{id}', 'CompareController@destroy')->name('compare.delete');
  
});

Route::resource('/rating','Frontend\RatingController');




Route::group(['prefix' => 'backend','namespace' => 'Backend'],function(){
	Route::get('/dashboard','PagesController@index')->name('admin.dashboard')->middleware('admin.verified');
	Route::resource('/category','CategoriesController');
	Route::resource('/brands','BrandsController');
	Route::resource('/tags','TagsController');
	Route::resource('/attributes','AttributesController');
	Route::resource('/types','TypesController');
	Route::resource('/products','ProductsController');
	Route::resource('/divisions','DivisionController');
	Route::resource('/districts','DistrictsController');
	Route::resource('/sliders','SlidersController');
	Route::resource('/coupons','CouponController');
	Route::resource('/countries','CountryController');
	Route::resource('/shippingcost','ShippingcostController');
	Route::resource('/blog','BlogController');
	

	
	});
Route::get('/get-attributes/{id}',  function($id){
  return json_encode(App\Model\Backend\Types::with('attributes')->where('id',$id)->first()->attributes);
});

Route::get('get-districts/{id}', function($id){
  return json_encode(App\Model\Backend\District::where('division_id', $id)->get());
});

Route::get('get-division/{id}', function($id){
  return json_encode(App\Model\Backend\Division::where('country_id', $id)->get());
});



Route::get('get-discount/{couponcode}', function($couponcode){
  return json_encode(App\Model\Backend\Coupon::where('code', $couponcode)->get());
});

Route::get('get-shipping/{district_id}', function($district_id){
  return json_encode(App\Model\Backend\Shippingcost::where('district_id', $district_id)->get());
});
Route::get('get-totalitem', function(){
  return json_encode(App\Model\Frontend\Cart::totalItems());
});
Route::get('get-wishtotalitem', function(){
  return json_encode(App\Model\Frontend\Wish::totalWishItems());
});


// SSLCOMMERZ Start
	Route::get('/pay', 'sslcom\PublicSslCommerzPaymentController@index')->name('payment');
 	Route::POST('/success', 'sslcom\PublicSslCommerzPaymentController@success');
 	Route::POST('/fail', 'sslcom\PublicSslCommerzPaymentController@fail');
 	Route::POST('/cancel', 'sslcom\PublicSslCommerzPaymentController@cancel');
 	Route::POST('/ipn', 'sslcom\PublicSslCommerzPaymentController@ipn');

//SSLCOMMERZ END

Auth::routes(['verify'=>true]);

Route::get('/', 'Frontend\PagesController@index')->name('index');



//admin authentication system
Route::group(['prefix' => 'backend/'], function(){
	Route::get('', 'Admin\HomeController@index')->name('admin.home');
// Authentication Routes...
Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('login', 'Admin\LoginController@login');
Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
// Registration Routes...

Route::get('register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('register', 'Admin\RegisterController@register');
Route::get('password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('password/reset', 'Admin\ResetPasswordController@reset')->name('admin.password.update');
Route::get('email/verify', 'Admin\VerificationController@show')->name('admin.verification.notice');
Route::get('email/verify/{id}', 'Admin\VerificationController@verify')->name('admin.verification.verify');
Route::get('email/resend', 'Admin\VerificationController@resend')->name('admin.verification.resend');
});








Route::post('backend/upload_image','Backend\BlogController@uploadImage')->name('upload');

//facebook messenger bot
Route::get('facebook_messenger_api','MessengerController@index');
Route::post('facebook_messenger_api','MessengerController@index');



//footer route
Route::get('/complain','Frontend\SuportContrller@complain')->name('complain');
Route::post('/complain','Frontend\SuportContrller@complainstore')->name('complain.store');
Route::get('/refreshcaptcha','Frontend\SuportContrller@refreshcaptcha')->name('complain.refreshcaptcha');


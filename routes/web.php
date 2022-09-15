<?php

use Illuminate\Support\Facades\Route;

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
// Font End
Route::get('/','HomeController@index');
Route::get('/trang_chu','HomeController@index');

//Danh Mục trang chủ
Route::get('/category-product/{category_id}','CategoryProduct@show_category_home');
Route::get('/brand-product/{brand_id}','CategoryProduct@show_brand_home');
//Detail product
Route::get('/detail-product/{product_id}','productController@detail_product');




//Back End
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashbord','AdminController@dashboard');


//Category 
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');

Route::get('/unactive-category_product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/ative-category_product/{category_product_id}','CategoryProduct@active_category_product');

//add category
Route::post('/save-category-product','CategoryProduct@save_category_product');

//edit category
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::post('/update-category-product/{category_id}','CategoryProduct@update_category_product');


//delete category
Route::get('/detete-category-product/{categor_id}','CategoryProduct@delete_category_product' );
Route::get('product-category/{category_id}','CategoryProduct@show_product_category');

//Brand
    Route::get('/add-brand-product','brandProduct@add_brand_product');
    Route::get('/all-brand-product','brandProduct@all_brand_product');

    Route::get('/unactive-brand-product/{brand_product_id}','brandProduct@unactive_brand_product');
    Route::get('/ative-brand-product/{brand_product_id}','brandProduct@active_brand_product');
    //add Brand
    Route::post('/save-brand-product','brandProduct@save_brand_product');

    //edit Brand
    Route::get('/edit-brand-product/{brand_product_id}','brandProduct@edit_brand_product');
    Route::post('/update-brand-product/{brand_id}','brandProduct@update_brand_product');

    //brand product
    Route::get('product-brand/{brand_product_id}','brandProduct@product_brand');
//send mail
route::post('/send-mail','HomeController@send-mail');


//Login facebook
Route::get('/login-facebook','AdminController@login_facebook');
Route::get('/admin/callback','AdminController@callback_facebook');

//Login google
Route::get('/login-google','AdminController@login_google');
Route::get('/google/callback','AdminController@callback_google');


//SIZE
    Route::get('/add-size-product','sizeProduct@add_size_product');
    Route::get('/all-size-product','sizeProduct@all_size_product');
    //add size
    Route::post('/save-size-product','sizeProduct@save_size_product');

//Product
Route::post('/save-product','productController@save_product');
Route::get('/add-product','productController@add_product_product');
Route::get('/all-product','productController@all_product');
Route::get('/unactive-product/{product_id}','productController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');
Route::get('/detete-product/{product_id}','ProductController@delete_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');

Route::post('update-product/{product_id}','ProductController@update_product');
//edit image prouct
Route::get('/edit-image-product/{image}','ProductController@edit_product_image');
Route::post('/update-image-product/{image_id}','ProductController@update_product_image');

//cart
Route::post('/save-cart','CartController@save_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::post('/update-cart-qty','CartController@update_cart_qty');

//checkout
Route::get('/login-checkout','CheckOutController@login_checkout');
Route::post('/add-customer','CheckOutController@add_customer');
Route::get('/checkout','CheckOutController@checkout');
Route::get('/logout-checkout','CheckOutController@logout_checkout');
Route::post('/login-customer','CheckOutController@login_customer');
// Route::get('/checkout','CheckOutController@checkout');
Route::post('save-check-out-customer','CheckOutController@save_check_out_customer');

Route::get('/payment','CheckOutController@payment');
Route::post('/order-plade','CheckOutController@order_plade');

Route::post('/update-order/{order_id}','CheckOutController@update_order');


 Route::get('/logout-checkout','CheckoutController@logout_user');
//Order
Route::get('/manage-order','OrderController@manage_order');
Route::get('/view-order/{orderId}','OrderController@view_order');
Route::get('/print-order/{checkout_code}','OrderController@print_order');
//search
Route::post('/seach','HomeController@search');

//contac us
Route::get('/contac-us','HomeController@contac_us');

//user người dung
Route::get('/all-user','Usercontroller@all_user');


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers;
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

Route::prefix('')->group(function(){
Route::get('/index','View\MainController@index')->name('show.main');
Route::get('','View\MainController@show')->name('show.product');
Route::get('productdetail/{id}', 'View\MainController@showdetail')->name('show.productdetail');
Route::get('productbycategory/{id}','View\MainController@showbycategory')->name('show.productcategory');

//cart
Route::get('/add-to-cart','CartController@addToCart')->name('add.to.cart');
Route::post('add-cart', 'CartController@index');
Route::get('carts', 'CartController@show')->name('show.cart');
Route::post('update-cart',  'CartController@update');
Route::get('delete-cart/{id}','CartController@remove')->name('delete.cart');
Route::post('carts', 'CartController@addCart')->name('add.carts');
//search
Route::get('/livesearch', 'SearchController@search')->name('livesearch');
Route::get('/filter', 'SearchController@filter')->name('filter');
});

Route::prefix('admin')->group(function(){

    // login
    Route::get('/login','LoginController@index')->name('show.login');
    Route::post('login','LoginController@login')->name('login.login');
});
// register
Route::get('/register', 'RegisterController@index')->name('show.register');
Route::post('register', 'RegisterController@create')->name('register.create');
// forget password

Route::get('forget-password', 'PasswordResetController@showForgetPasswordForm')->name('forget.password.get');
Route::post('forget-password', 'PasswordResetController@submitForgetPasswordForm')->name('forget.password.post');
Route::get('reset-password/{token}', 'PasswordResetController@showResetPasswordForm')->name('reset.password.get');
Route::post('reset-password', 'PasswordResetController@submitResetPasswordForm')->name('loading.reset');

Route::middleware('admin.login')->group(function(){
    Route::get('logout','LoginController@logout')->name('admin.logout');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin','Admin\AdminController@index')->name('admin.home');


    // category
    Route::prefix('category')->group(function () {
        Route::get('show', 'Admin\CategoryController@index')->name('category.show');
        Route::get('add', 'Admin\CategoryController@create')->name('category.add');
        Route::post('add', 'Admin\CategoryController@store')->name('category.store');
        Route::get('edit/{id}', 'Admin\CategoryController@edit')->name('category.show.edit')->middleware('permission:edit category');
        Route::post('edit', 'Admin\CategoryController@update')->name('category.edit')->middleware('permission:edit category');
        Route::get('delete/{id}', 'Admin\CategoryController@destroy')->name('category.delete')->middleware('permission:delete category');
        Route::get('changeStatus', 'Admin\CategoryController@changeStatus')->name('changeStatus');
        Route::get('showproduct/{id}','Admin\ProductController@showproduct');
        Route::get('search', 'Admin\SearchController@searchcategory')->name('category.search');
    });
    // banner
    Route::prefix('banner')->group(function ()
    {
        Route::get('show','Admin\BannerController@index')->name('banner.index');
        Route::get('add','Admin\BannerController@create')->name('banner.showCreate');
        Route::post('add','Admin\BannerController@store')->name('banner.store');
        Route::get('edit/{id}', 'Admin\BannerController@edit')->name('banner.show.edit');
        Route::post('edit', 'Admin\BannerController@update')->name('banner.update');
        Route::get('delete/{id}', 'Admin\BannerController@destroy')->name('banner.delete');
    });

    // product
    Route::prefix('product')->group(function () {
        Route::get('show','Admin\ProductController@index')->name('product.show');
        Route::get('add', 'Admin\ProductController@create')->name('product.add')->middleware('permission:add product');;
        Route::post('add', 'Admin\ProductController@store')->name('product.store')->middleware('permission:add product');
        Route::get('edit/{id}','Admin\ProductController@edit')->name('product.show.edit')->middleware('permission:edit product');
        Route::post('edit','Admin\ProductController@update')->name('product.update')->middleware('permission:edit product');;
        Route::get('delete/{id}', 'Admin\ProductController@destroy')->name('product.delete')->middleware('permission:delete product');
        Route::get('/searchinadmin', 'Admin\SearchController@search')->name('product.search')->middleware('permission:search product');;
        Route::get('adddetail/{id}', 'Admin\ProductController@showadddetail')->name('product.adddetail');
        Route::post('adddeatail', 'Admin\ProductController@storedetail')->name('product.storedetail');
        Route::get('productdetail/{id}','Admin\ProductController@showdetail')->name('product.showdetail');
        Route::get('productimage/{id}','Admin\ProductController@showimage')->name('product.showimage');
        Route::get('addimage/{id}','Admin\ProductController@showaddimage')->name('product.addimage');
        Route::post('addimage', 'Admin\ProductController@storeimg')->name('product.storeimg');
        Route::get('deleteimg/{id}', 'Admin\ProductController@destroyimg');

    });
    //order
    Route::get('contacts', 'Admin\OrderController@index')->name('show.orders');
    Route::get('contacts/view/{order}', 'Admin\OrderController@show')->name('view.orders');
    Route::get('contacts/delete/{id}', 'Admin\OrderController@destroy')->name('delete.orders');
    Route::get('status/{id}', 'Admin\OrderController@status')->name('order.status');
    Route::post('status','Admin\OrderController@updateStatus')->name('order.status.update');
    //user
    Route::resource('/user','UserController')->middleware('role:admin');
    Route::get('delete/{id}', 'UserController@destroy')->name('user.delete');
    Route::get('edit/{id}', 'UserController@edit')->name('users.edit')->middleware('permission:edit user');;
    Route::post('edit', 'UserController@update')->name('users.update')->middleware('permission:edit user');;
    Route::get('role/{id}', 'UserController@role')->name('users.role')->middleware('permission:role user');;
    Route::get('permission/{id}', 'UserController@permission')->name('users.permission')->middleware('permission:set permission');
    Route::post('insert/{id}', 'UserController@insert_role')->name('users.role.insert');
    Route::post('insertper/{id}', 'UserController@insert_permission')->name('users.permission.insert');

    Route::prefix('filter')->group(function(){
        Route::get('show','Admin\FilterController@index')->name('filter.show');
        Route::get('filter','Admin\FilterController@filter')->name('filter.product');
    });


});
Route::controller(QAndAController::class)->group(function(){
    Route::get('qa', 'index');
    Route::get('qa-export', 'export')->name('users.export');
    Route::post('qa-import', 'import')->name('users.import');
    Route::get('api', 'api')->name('qa.api');
});

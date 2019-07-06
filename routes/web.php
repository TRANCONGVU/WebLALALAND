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

Route::get('/', [
	'as' =>'home',
	'uses' => 'Controller_1@get_trangchu'
]);
Route::get('/home', [
    'as' =>'home1',
    'uses' => 'Controller_1@get_trangchu'
]);
Route::post('/lienhe', 'Controller_1@lienhe')->name('lienhe');

Route::get('trang-chu', [
	'as' =>'trang-chu',
	'uses' => 'Controller_1@get_trangchu'
]);

Route::get('loaitin/{slug}', [
    'as' =>'tinkhuyenmai',
    'uses' => 'Controller_1@get_loaitin'
]);




Route::get('product', [
	'as' =>'product',
	'uses' => 'Controller_1@get_product'
]);

Route::get('bosuutap', [
	'as' =>'bosuutap',
	'uses' => 'Controller_1@get_bosuutap'
]);
Route::get('gioithieu', [
	'as' =>'gioithieu',
	'uses' => 'Controller_1@get_gioithieu'
]);
Route::get('lienhe', [
	'as' =>'lienhe',
	'uses' => 'Controller_1@get_lienhe'
]);
Route::get('cauhoi', [
	'as' =>'cauhoi',
	'uses' => 'Controller_1@get_cauhoi'
]);

Route::get('tintuc', [
	'as' =>'tintuc',
	'uses' => 'Controller_1@get_tintuc'
]);
Route::get('tinkhuyenmai', [
	'as' =>'tinkhuyenmai',
	'uses' => 'Controller_1@get_tinkhuyenmai'
]);

Route::get('tinthoitrang', [
	'as' =>'tinthoitrang',
	'uses' => 'Controller_1@get_tinthoitrang'
]);

Route::get('tinsukien', [
	'as' =>'tinsukien',
	'uses' => 'Controller_1@get_tinsukien'
]);

Route::get('huongdan', [
	'as' =>'huongdan',
	'uses' => 'Controller_1@get_huongdan'
]);
Route::get('giohang', [
	'as' =>'giohang',
	'uses' => 'Controller_1@get_giohang'
]);
Route::get('chitietsanpham', [
	'as' =>'chitietsanpham',
	'uses' => 'Controller_1@get_chitietsanpham'
]);

Route::get('cart', [
	'as' =>'cart',
	'uses' => 'Controller_1@get_cart'
]);
Route::get('form', [
	'as' =>'form',
	'uses' => 'Controller_1@get_form'
]);
Route::get('dangky', [
	'as' =>'dangky  ',
	'uses' => 'Controller_1@get_dangky'
]);
Route::get('dangnhap', [
	'as' =>'dangnhap  ',
	'uses' => 'Controller_1@get_dangnhap'
]);

Route::post('createuser', 'Auth\UserLoginController@createuser')->name('createuser');
Route::post('loginuser', 'Auth\UserLoginController@loginuser')->name('loginuser');
Route::get('sale', [
	'as' =>'sale  ',
	'uses' => 'Controller_1@get_sale'
]);
Route::post('createuser', 'Controller_1@createuser')->name('createuser');




//Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admincp')->group(function () {


    // Route phần đăng nhập
    Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
    Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
    //Route dùng để đăng xuất
	Route::get('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');

	//slider
	Route::prefix('/')->middleware('auth:admins')->group(function () {

		Route::get('/', 'Auth\Admin\AdminController@index')->name('admin.index');
		
		Route::group(['prefix'=>'slider'],function(){
			//add
			Route::get('addslider','SliderController@addSlider');
			Route::post('addslider','SliderController@postSlider');
			//list
			Route::get('listslider','SliderController@listSlider')->name('listslider');
			//delete
			Route::get('delete/{id}','SliderController@deleteSlider');
			//edit
			Route::get('edit/{id}','SliderController@editSlider');
			Route::post('edit/{id}','SliderController@postEditSlider');
		});

		Route::get('introduce','IntroduceController@intro');
	
		Route::group(['prefix' => 'cateproduct'], function (){
			Route::get('/','CateProductController@index')->name('list.cateproduct');
			Route::get('/create','CateProductController@create')->name('create.cateproduct');
			Route::post('create-cateproduct','CateProductController@store')->name('store.cateproduct');
			Route::get('edit-cateproduct','CateProductController@edit')->name('edit.cateproduct');
			Route::post('edit-cateproduct','CateProductController@update')->name('update.cateproduct');
			Route::get('detail-cateproduct','CateProductController@show')->name('show.cateproduct');
		});
		Route::group(['prefix' => 'useraccount'], function (){
            route::get('/','useraccountcontroller@index')->name('list.useraccount');

            route::get('/create','useraccountcontroller@create')->name('create.useraccount');
            route::post('/store','useraccountcontroller@store')->name('store.useraccount');

            route::get('edit/{id}','useraccountcontroller@edit')->name('edit.useraccount');
            route::post('update/{id}','useraccountcontroller@update')->name('update.useraccount');

            route::get('setactive/{id}/{status}','useraccountcontroller@active')->name('active.useraccount');
        });
        Route::group(['prefix' => 'adminaccount'], function (){
            route::get('/','adminaccountcontroller@index')->name('list.adminaccount');

            route::get('/create','adminaccountcontroller@create')->name('create.adminaccount');
            route::post('/store','adminaccountcontroller@store')->name('store.adminaccount');

            route::post('update/{id}','adminaccountcontroller@update')->name('update.adminaccount');

            route::get('setactive/{id}/{status}','adminaccountcontroller@active')->name('active.adminaccount');

		});
		Route::group(['prefix' => 'catenews'], function (){
            Route::get('/','catenewsController@index')->name('list.catenews');

            Route::post('/store','catenewsController@store')->name('store.catenews');

            Route::post('update/{id}','catenewsController@update')->name('update.catenews');
            Route::get('delete/{id}','catenewsController@destroy')->name('destroy.catenews');

        });

    });

      
});
Auth::routes();

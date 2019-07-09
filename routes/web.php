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
Route::get('tintuc/{slug}', [
    'as' =>'tintuc',
    'uses' => 'Controller_1@get_tin'
]);

    Route::group(['prefix' => 'profile'], function (){
        Route::get('/{id}', 'Controller_1@profile')->name('profile');
        Route::post('changeinfor/{id}', 'Controller_1@changeinfor')->name('changeinfor');

        Route::get('checkpass/{id}/{value}', 'Controller_1@checkpass')->name('checkpass');
        Route::post('changepass/{id}', 'Controller_1@changepass')->name('changepass');
    });

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

		//gioi thieu
		Route::group(['prefix' => 'introduce'],function(){
			//add intro
			Route::get('introduce','IntroduceController@intro');
			Route::post('introduce','IntroduceController@postIntro');
			//lít intro
			Route::get('listintroduce','IntroduceController@listIntro')->name('listintro');
			//xoa
			Route::get('delete/{id}','IntroduceController@delete');
			//edit
			Route::get('editIntro/{id}','IntroduceController@edit');
			Route::post('editIntro/{id}','IntroduceController@postEdit');
		});
	
		//category product
		Route::group(['prefix' => 'cateproduct'], function (){
			Route::get('/','CateProductController@index')->name('list.cateproduct');
			Route::get('/create','CateProductController@create')->name('create.cateproduct');
			Route::post('create','CateProductController@store')->name('store.cateproduct');
			Route::get('edit/{id}','CateProductController@edit')->name('edit.cateproduct');
			Route::post('edit/{id}','CateProductController@update')->name('update.cateproduct');
			Route::get('detail','CateProductController@show')->name('show.cateproduct');
			Route::get('destroy/{id}/{value}','CateProductController@destroy')->name('destroy.cateproduct');
		});
        //product type
		Route::group(['prefix' => 'producttype'],function (){
            Route::get('/','ProductTypeController@index')->name('list.producttype');
            Route::get('/create','ProductTypeController@create')->name('create.producttype');
            Route::post('create','ProductTypeController@store')->name('store.producttype');
            Route::get('edit/{id}','ProductTypeController@edit')->name('edit.producttype');
            Route::post('edit/{id}','ProductTypeController@update')->name('update.producttype');
            Route::get('detail','ProductTypeController@show')->name('show.producttype');
            Route::get('destroy','ProductTypeController@destroy')->name('destroy.producttype');
        });
        //product
        Route::group(['prefix' => 'product'],function (){
            Route::get('/','ProductController@index')->name('list.product');
            Route::get('/create','ProductController@create')->name('create.product');
            Route::post('create','ProductController@store')->name('store.product');
            Route::get('edit/{id}','ProductController@edit')->name('edit.product');
            Route::post('edit/{id}','ProductController@update')->name('update.product');
            Route::get('detail','ProductController@show')->name('show.product');
            Route::get('destroy','ProductController@destroy')->name('destroy.product');
        });

		Route::group(['prefix' => 'useraccount'], function (){
            route::get('/','useraccountcontroller@index')->name('list.useraccount');

            route::get('/create','useraccountcontroller@create')->name('create.useraccount');
            route::post('/store','useraccountcontroller@store')->name('store.useraccount');

            route::get('edit/{id}','useraccountconedit-cateproducttroller@edit')->name('edit.useraccount');
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
        Route::group(['prefix' => 'news'], function (){
            route::get('/','NewsController@index')->name('list.news');

            route::get('/create','NewsController@create')->name('create.news');
            route::post('/store','NewsController@store')->name('store.news');

            route::get('edit/{id}','NewsController@edit')->name('edit.news');
            route::post('update/{id}','NewsController@update')->name('update.news');

            Route::get('delete/{id}','NewsController@destroy')->name('delete.news');
        });

		Route::get('addslider','SliderController@addSlider');
		Route::get('listslider','SliderController@listSlider');

	});

	
});
Auth::routes();

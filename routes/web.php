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
	'as' =>'trang-chu',
	'uses' => 'Controller_1@get_trangchu'
]);

Route::get('trang-chu', [
	'as' =>'trang-chu',
	'uses' => 'Controller_1@get_trangchu'
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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
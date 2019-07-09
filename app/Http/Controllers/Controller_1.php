<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class Controller_1 extends Controller
{
    public function __construct()
    {
        $cate_news=DB::table('cate_news')->get();
        View::share('cate_news', $cate_news);
    }

    public  function get_trangchu(){
    	return view('pages.trangchu');
    }


    /*
     * tin tức
     * */
    public function get_loaitin($slug){
        $data['cates'] = DB::table('cate_news')->where('slug', $slug)->first();
        $data['news'] = DB::table('news')->where('cate_id', $data['cates']->id)->paginate('4');

        return view('pages.loaitin', $data);
    }


    public  function get_product(){
    	return view('pages.product');
    }
    public  function get_bosuutap(){
    	return view('pages.bosuutap');
    }
    public  function get_gioithieu(){
        $data['introduce'] = DB::table('introduce')->orderBy('id','desc')->limit(1)->get();
    	return view('pages.gioithieu',$data);
    }
    public  function get_lienhe(){
    	return view('pages.lienhe');
    }
    public  function get_cauhoi(){
    	return view('pages.cauhoi');
    }
    public  function get_tintuc(){
    	return view('pages.tintuc');
    }

    public  function get_tinkhuyenmai(){
    	return view('pages.tinkhuyenmai');
    }

    public  function get_tinthoitrang(){
    	return view('pages.tinthoitrang');
    }

    public  function get_tinsukien(){
    	return view('pages.tinsukien');
    }
    public  function get_huongdan(){
    	return view('pages.huongdan');
    }
    public  function get_giohang(){
    	return view('pages.giohang');
    }
    public  function get_chitietsanpham(){
    	return view('pages.chitietsanpham');
    }
    public  function get_cart(){
    	return view('pages.cart');
    }
    public  function get_form(){
    	return view('pages.form');
    }
    public  function get_dangky(){
    	return view('pages.dangky');
    }
    public  function get_dangnhap(){
    	return view('pages.dangnhap');
    }
    public  function get_sale(){
        return view('pages.sale');
    }


    public function lienhe(Request $request){
        $input=$request->all();

        DB::table('contacts')->insert([
           'name' => $input['name_message'],
           'email' => $input['email_message'],
           'phone' => $input['phone_message'],
           'content' => $input['content_message'],
        ]);

        return redirect()->back()->with('thongbao', 'Cảm ơn bạn đã để lại lời nhắn! chúng tôi sẽ phản hôi trong thời gian sớm nhất!');
    }
}

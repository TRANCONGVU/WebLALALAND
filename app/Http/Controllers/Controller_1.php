<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class Controller_1 extends Controller
{
    public  function get_trangchu(){
    	return view('pages.trangchu');
    }
    public  function get_product(){
    	return view('pages.product');
    }
    public  function get_bosuutap(){
    	return view('pages.bosuutap');
    }
    public  function get_gioithieu(){
    	return view('pages.gioithieu');
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

    public function createuser(Request $request){

        $this->validate($request,[
            'email'		=>'unique:users,email',
        ]);
        $input= $request->all();
        $birth = $input['year'].'-'.$input['month'].'-'.$input['day'];
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . "_avatar_" . $name;
            while (file_exists('images/avatar/' . $avatar)) {
                $Hinh = str_random(4) . "_avatar_" . $name;
            }
            $file->move('images/avatar/', $avatar);
            $file_name = $avatar;
        }
        else{
            if($input['gender']==0){
                $file_name='male.png';
            }
            else{
                $file_name='female.png';
            }
        }

         DB::table('users')->insert([
            'name' => $input['name'],
            'birth' => $birth,
            'avatar' => $file_name,
            'gender' => $input['gender'],
            'email' => $input['email'],
            'password' => bcrypt($input['password_confirmation'])
         ]);

        if(Auth::guard('web')-> attempt(['email' => $request->email, 'password' => $request->password], $request -> remember)){

            //nếu thành công thì chuyển hướng về view dashboard của admin
            return redirect()-> intended(route('home'))->with('thongbao','Create account success');

        }
        else {

            //thất bại
            return redirect()->back()->withInput($req->only('email', 'remember'));
        }
    }
}

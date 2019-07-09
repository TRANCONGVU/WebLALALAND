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
        $new_post = DB::table('news')->orderBy('id', 'desc')->limit(4)->get();
        View::share('new_posts', $new_post);

    }

    public  function get_trangchu(){
    	return view('pages.trangchu');
    }


    /*
     * tin tức
     * */
    public function get_loaitin($slug){
        if($slug=='all'){
            $data['news'] = DB::table('news')->orderBy('id', 'desc')->paginate('4');
        }
        else {
            $data['cates'] = DB::table('cate_news')->where('slug', $slug)->first();
            $data['news'] = DB::table('news')->where('cate_id', $data['cates']->id)->paginate('4');
        }

        return view('pages.loaitin', $data);
    }
    public function get_tin($slug){
        $max = DB::table('news')->max('id');
        $min = DB::table('news')->min('id');

        $data['new'] = DB::table('news')
            ->select('news.*', 'cate_news.name as cate')
            ->join('cate_news','cate_news.id','news.cate_id')
            ->where('news.slug', $slug)->first();
        if($data['new']->id<$max) {
            $next = $data['new']->id;
            do {
                $next++;
                $data['next'] = DB::table('news')->where('id', $next)->first();
            } while ($data['next'] == null);
        }
        if($data['new']->id>$min) {
            $pre = $data['new']->id;

            do {
                $pre--;
                $data['pre'] = DB::table('news')->where('id', $pre)->first();
            } while ($data['pre'] == null);
        }
        $data['new'] = DB::table('news')->where('slug', $slug)->first();
        $data['pre'] = DB::table('news')->where('id', $data['new']->id-1)->first();
        $data['next'] = DB::table('news')->where('id', $data['new']->id+1)->first();
        $data['tags'] = DB::table('tagnews')->where('news_id', $data['new']->id)->limit(10)->get();
        return view('pages.chitiettin', $data);

    }
    /*
     * user
     * */
    public function profile($id){
        $data['user'] = DB::table('users')->where('id', $id)->first();
//        dd($data['user']);
        return view('pages.profile', $data);

    }
    public function changeinfor(Request $request, $id){
//        dd($request->all());
        $input= $request->all();

        if ($request->hasFile('avataruser')) {
            $old= DB::table('users')->find($id);
//            dd($old->avatar);
            $file = $request->file('avataruser');
            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . "_avatar_" . $name;
            while (file_exists('images/avatar/' . $avatar)) {
                $Hinh = str_random(4) . "_avatar_" . $name;
            }
            $file->move('images/avatar/', $avatar);
            if($old->avatar!='male.png' && $old->avatar!='female.png' && file_exists('images/avatar/' . $old->avatar)){
                unlink('images/avatar/' . $old->avatar);
            }
            $file_name = $avatar;
        }
        else{
            $file_name = $input['old-file'];
        }
        DB::table('users')->where('id', $id)->update([
            'name' => $input['username'],
            'birth' => $input['birthuser'],
            'avatar' => $file_name,
            'gender' => $input['genderuser'],
            'email' => $input['emailuser'],
        ]);

        return redirect()->back()->with('thongbao', 'update acount without change password success');
    }
    public function checkpass($id, $value){
        $user=DB::table('users')->find($id);

        if (password_verify($value,$user->password)) {

        }else{
            echo 'This old pasword dose not match';
        }
    }
    public function changepass(Request $request, $id){
        $input=$request->all();

            DB::table('users')->where('id', $id)->update([
                'password' => bcrypt($input['repass']),
            ]);
            return redirect()->back()->with('thongbao','Change password success');
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

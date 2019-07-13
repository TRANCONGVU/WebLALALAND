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
        $cate_products = DB::table('cate_products')->orderBy('id', 'desc')->limit(4)->get();
        View::share('cate_products', $cate_products);

    }

    public  function get_trangchu(){
        $data['sliders']=DB::table('sliders')->limit(3)->orderBy('id','desc')->get();
        $data['product_hots']=DB::table('products')
            ->limit(4)->orderBy('pay','desc')->get();
        $data['product_news']=DB::table('products')
            ->limit(4)->orderBy('id','desc')->get();
        //dd($data['product_hots']);

    	return view('pages.trangchu', $data);
    }
    /*
     * sản phẩm
     * */
    public  function get_chitietsanpham($slug){
        $data['product']=DB::table('products')
            ->where('slug', $slug)->first();
        $data['colors'] = DB::table('product_details')
            ->select('color.id as colorid','product_details.id as detailid', 'color.name')
            ->join('color', 'color.id', '=', 'product_details.color_id')
            ->where('product_details.product_id',$data['product']->id)
            ->get();
        $data['lienquan'] = DB::table('products')
            ->where('category_id',  $data['product']->category_id)->limit(5)->get();
        $data['product_hot']=DB::table('products')
            ->limit(4)->orderBy('pay','desc')->first();
//        dd($data['colors']);

        return view('pages.chitietsanpham', $data);
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

    public  function get_form(){
        $data['cart'] = \Cart::getContent();
        $data['tong']=0;
        foreach ($data['cart'] as $value){
            $data['tong'] += $value->quantity*$value->price;
        }
        $data['pays'] = DB::table('payment_methods')->get();

        return view('pages.form', $data);
    }

    public function postthanhtoan(Request $request){
        $carts = \Cart::getContent();

        $input = $request->all();
        //dd($request->all());
        DB::table('carts')->insert([
           'code' => $input['code'],
           'name' => $input['name'],
           'email' => $input['email'],
           'phone' => $input['phone'],
           'address' => $input['address'],
           'payment_method_id' => $input['payment_methods'],
           'total' => $input['tong'],
           'day' => now(),
        ]);

        $cartid = DB::table('carts')->where('code', $input['code'])->first();
        foreach ($carts as $value){
            DB::table('cart_details')->insert([
                'cart_id' => $cartid->id,
                'name' => $value->name,
                'price' => $value->price,
                'quantity' => $value->quantity,
                'money' => $value->price*$value->quantity,
            ]);
        }
        echo 'ok';


    }
    public function createuser(Request $request){
        dd($request->all());
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

    public  function get_cart(){
        $data['cart'] = \Cart::getContent();
        $data['tong']=0;
        foreach ($data['cart'] as $value){
            $data['tong'] += $value->quantity*$value->price;
        }
//                dd($data['tong']);
    	return view('pages.cart', $data);
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

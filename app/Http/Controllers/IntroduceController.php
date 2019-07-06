<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IntroduceController extends Controller
{
    //add intro
    public function intro(){
        return view('admincp.introduce.introduce');
    }
    public function postIntro(Request $request){
        $this->validate($request,[
            
            'content'=>'required'
        ],
        [
            'content.required'=>'Vui lòng không để trống nội dung'
        ]);

        DB::table('introduce')->insert([
            'content' =>$request ->content
        ]);
        return redirect()->route('listintro')->with('thongbao','Thêm thông tin giới thiệu thành công!!!');
        // return redirect()->back()->with('thongbao','Thêm thông tin giới thiệu thành công!!!'); 
    }

    //list intro
    public function listIntro(){
        $data['introduce'] = DB::table('introduce')->get();
        return view('admincp.introduce.list_intro',$data);
    }
}

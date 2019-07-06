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
        $data['introduce'] = DB::table('introduce')->orderby('id','desc')->get();
        return view('admincp.introduce.list_intro',$data);
    }

    //xoa
    public function delete($id){
        DB::table('introduce')->where('id',$id)->delete();
        return redirect()->route('listintro')->with('thongbao','ĐÃ XÓA!!!');
    }

    //edit
    public function edit($id){
        $data['introduce'] = DB::table('introduce')->where('id',$id)->get();
        // dd($data);   
        return view('admincp.introduce.edit_intro',$data);

    }
    public function postEdit(Request $request,$id){
        $this->validate($request,[
            
            'content'=>'required'
        ],
        [
            'content.required'=>'Vui lòng không để trống nội dung'
        ]);

        DB::table('introduce')->where('id',$id)->update([
            'content' =>$request ->content
        ]);
        return redirect()->route('listintro')->with('thongbao','Sửa thông tin giới thiệu thành công!!!');
        // return redirect()->back()->with('thongbao','Thêm thông tin giới thiệu thành công!!!'); 
    }
}

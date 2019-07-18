<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectionsController extends Controller
{
    //

    public function index(){

        $data['collections'] = DB::table('collections')
            ->orderBy('status', 'desc')
            ->orderBy('id', 'desc')->get();

        return view('admincp.collections.list', $data);
    }

    public function store(Request $request){

        $input=$request->all();


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . "_collections_" . $name;
            while (file_exists('images/collections/' . $avatar)) {
                $Hinh = str_random(4) . "_collections_" . $name;
            }
            $file->move('images/collections/', $avatar);
            $file_name = $avatar;
        }
        else{
            $file_name = 'collections.jpg';
        }

        DB::table('collections')->insert([
           'name' => $input['name'],
           'slug' => $this->slug($input['name']),
           'image' => $file_name,
        ]);

        return redirect()->back()->with('thongbao', 'Thêm Mới Bộ Sưu Tập thành công');
    }

    public function update(Request $request, $id){

        $input=$request->all();


        if ($request->hasFile('image')) {
            $old = DB::table('collections')->find($id);
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . "_collections_" . $name;
            while (file_exists('images/collections/' . $avatar)) {
                $Hinh = str_random(4) . "_collections_" . $name;
            }
            $file->move('images/collections/', $avatar);
            if($old->avatar!='collections.jpg' && file_exists('images/collections/' . $old->avatar)){
                unlink('images/collections/' . $old->avatar);
            }
            $file_name = $avatar;
        }
        else{
            $file_name = $input['old-file'];
        }

        DB::table('collections')->where('id', $id)->update([
            'name' => $input['name'],
            'slug' => $this->slug($input['name']),
            'image' => $file_name,
        ]);

        return redirect()->back()->with('thongbao', 'Sửa Bộ Sưu Tập thành công');
    }

    public function destroy($id, $value){
        DB::table('collections')->where('id', $id)->update([
            'status' => $value
        ]);
        return redirect()->back();
    }
}

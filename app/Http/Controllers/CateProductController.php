<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class CateProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cateproduct = DB::table('cate_products')->orderBy('id','desc')->paginate(5);
//        dd($cateproduct);
        return view('admincp.cate-product.list',compact('cateproduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.cate-product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:cate_products,name|min:3'
        ],
        [
            'name.required'=>'Vui lòng không để trống.',
            'name.unique' => 'Thể loại đã tồn tại.',
            'name.min' => 'Vui lòng nhập trên 3 từ.',
        ]);
        DB::table('cate_products')->insert([
            'name' => $request->name,
            'slug' => $this->slug($request->name),
            'active' => $request->status,
        ]);
        return redirect()->route('list.cateproduct')->with('thongbao','Tạo danh mục sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('cate_products')->find($id);
//        dd($data);
        return view('admincp.cate-product.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|min:3'
        ],
        [
            'name.required'=>'Vui lòng không để trống.',
            'name.min' => 'Vui lòng nhập trên 3 từ.',
        ]);

        DB::table('cate_products')->where('id',$request->id)->update([
            'name'=> $request->name,
            'slug'=> $this->slug($request->name),
            'active' => $request->status,
        ]);
        return redirect()->route('list.cateproduct')->with('thongbao','Cập nhật danh mục sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('cate_products')->where('id',$request->id)->update([
            'active'=> 0,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products']=DB::table('products')
            ->select('products.id','products.code', 'products.name as product_name', 'cate_products.name as cate','collections.name as collection', 'products.price', 'products.sale')
            ->join('cate_products','cate_products.id', '=', 'products.category_id')
            ->join('collections','collections.id', '=', 'products.collections_id')
            ->orderBy('products.id', 'desc')
            ->get();
//        dd($data['products']);

        return view('admincp.product.list', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cates'] = DB::table('cate_products')->get();
        $data['collections'] = DB::table('collections')->get();
        $data['sizes'] = DB::table('size')->get();
        $data['colors'] = DB::table('color')->get();

        return view('admincp.product.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request->all());
        $input= $request->all();
        if($input['sale']==''){
            $sale=0;
        }
        else{
            $sale=$input['sale'];
        }
        if ($request->hasFile('file-0-0')) {
            $file = $request->file('file-0-0');
            $name = $file->getClientOriginalName();
            $avatar = str_random(4) . "_product_" . $name;
            while (file_exists('images/products/' . $avatar)) {
                $Hinh = str_random(4) . "_product_" . $name;
            }
            $file->move('images/products/', $avatar);
            $file_name1 = $avatar;
        }
        DB::table('products')->insert([
            'name' => $input['name'],
            'slug' => $this->slug($input['name']),
            'code' => str_random(7),
            'price'=> $input['price'],
            'sale'=> $sale,
            'category_id' => $input['cate'],
            'collections_id' => $input['collections'],
            'image' => $file_name1,
            'created_at' =>now()
        ]);

        $product= DB::table('products')->where('name', $input['name'])->orderBy('id', 'desc')->first();

        for($i=1; $i<=$input['color-number']; $i++){
            if(isset($input['color'.$i])) {

                $file_name="";
                for($k=1; $k<=3; $k++) {
                    if ($request->hasFile('file-'.$i.'-'.$k)) {
                        $file = $request->file('file-'.$i.'-'.$k);
                        $name = $file->getClientOriginalName();
                        $avatar = str_random(4) . "_product_" . $name;
                        while (file_exists('images/products/' . $avatar)) {
                            $Hinh = str_random(4) . "_product_" . $name;
                        }
                        $file->move('images/products/', $avatar);
                        $file_name .= $avatar.',';
                    }
                }
                //dd($file_name);
                DB::table('product_details')->insert([
                    'product_id'=> $product->id,
                    'color_id' => $input['color'.$i],
                    'image' => $file_name
                ]);
                $details = DB::table('product_details')->where('image', $file_name)->orderBy('id', 'desc')->first();

                if(isset($input['sizenumber'.$input['color'.$i]])) {
                    for ($j = 1; $j <= $input['sizenumber' . $input['color'.$i]]; $j++) {
                        DB::table('color_size')->insert([
                            'detail_id' => $details->id,
                            'size_id' => $input['size-name-' . $input['color'.$i] . '-' . $j],
                            'quantity' => $input['quantity-' . $input['color'.$i] . '-' . $j]
                        ]);
                    }
                }
            }
        }
      return redirect()->route('list.product')->with('thongbao','Thêm Mới Sản Phẩm thành Công');


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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

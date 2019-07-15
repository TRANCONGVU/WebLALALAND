<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\DB;

class ajaxController extends Controller
{
    //
    public function selectsize($id){
        $size = DB::table('color_size')
            ->select('size.id','size.name')
            ->join('size', 'size.id', '=', 'color_size.size_id')
            ->where([
                ['color_size.detail_id', $id],
                ['color_size.quantity','>',0]
            ])
            ->get();
        $html='';

        foreach ($size as $value) {
            $html .= "<option value='".$value->id."'>".$value->name."</option>";
        }
        echo $html;
    }
    public function selectcolor($colorid, $productid){

        $product = DB::table('product_details')
            ->select('product_details.image')
            ->where([
                ['product_id', '=', $productid],
                ['color_id', '=', $colorid]
            ])
            ->first();

        $images = explode(',', $product->image);
        $html = '<ol class="carousel-indicators">';
        foreach ($images as $key => $image){
            if($key==0){
                $url= asset('images/products/'.$image);
                $html .= '<li data-target="#product-carousel" data-slide-to="0" class="active" style="background-image: url('.asset('images/products/'.$image).');"></li>';
            }
            elseif($image!=''){
                $html .= '<li data-target="#product-carousel" data-slide-to="'.$key.'" class="" style="background-image: url('.asset('images/products/'.$image).');"></li>';

            }
        }
        $html.= '</ol>';
        //dd($html);
        $html .='<div class="carousel-inner">';
        foreach ($images as $key => $image){
            if($key==0){

                $html .= '<div class="carousel-item active">';
                $html .= '<img src="'.asset('images/products/'.$image).'" alt="">';
                $html .= '</div>';
            }
            elseif($image!=''){
                $html .= '<div class="carousel-item">';
                $html .= '<img src="'.asset('images/products/'.$image).'" alt="">';
                $html .= '</div>';}
        }
        $html .='</div>';
        $html .='<a class="carousel-control-prev" href="#product-carousel" role="button" data-slide="prev">';
        $html .='<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
        $html .='<span class="sr-only">Previous</span>';
        $html .='</a>';
        $html .='<a class="carousel-control-next" href="#product-carousel" role="button" data-slide="next">';
        $html .='<span class="carousel-control-next-icon" aria-hidden="true"></span>';
        $html .='<span class="sr-only">Next</span>';
        $html .='</a>';
        echo $html;

    }
    public function addcart(Request $request){

        session_start();
        //dd($request->all());
        $input=$request->all();

        $product= DB::table('products')->find($input['id']);
        $size= DB::table('size')->find($input['size']);
        $color= DB::table('color')->find($input['color']);
        //dd($product);

        /* echo "<pre>";
           print_r($product);
         echo "</pre>";

         die();*/
        \Cart::add(array(
            array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->sale,
                'quantity' => $input['quantity'],
                'attributes' => array(
                    'sizeid' => $size->id,
                    'sizename' => $size->name,
                    'colorid' => $color->id,
                    'colorname' => $color->name,
                    'image' => $product->image
                )

            ),
        ));

//        dd(\Cart::getContent());
    }
    public function updatecart(Request $request){
        $input=$request->all();

//        dd($input['quantity']);

        \Cart::update($input['id'], array(
            'quantity' => $input['quantity'], // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));
        $cart = \Cart::getContent();
        $tong=0;
        foreach ($cart as $value){
            $tong += $value->quantity*$value->price;
        }
        echo number_format($tong).' VNĐ';
    }

    public function deletecart($id){
        \Cart::remove($id);

        return redirect()->route('cart');
    }


    /*
     * color
     * */

    public function editcolor($productid, $colorid){
        $colors= DB::table('product_details')
            ->where([
                ['product_id','=',$productid],
                ['color_id','=',$colorid],
            ])
            ->first();
        $sizes = DB::table('size')
            ->where(DB::raw('(select count(*) from color_size WHERE color_size.size_id=size.id AND detail_id='.$colors->id.')'),'=', 0)
            ->get();
        $sizehas=DB::table('color_size')
            ->select('size.name', 'color_size.quantity')
            ->join('size','size.id', '=', 'color_size.size_id')
            ->where('detail_id', $colors->id)
            ->get();
        $images = explode(',', $colors->image);
        //dd($images);


        $html="<div id='' style='border: black dotted 1px; border-radius: 10px'>";

        $html.="<div style='text-align: right'><a onclick='huychon(".$colorid.")'><i class='fa fa-times' ></i></a> </div>";
        $html.="<h4>Thêm màu</h4>";
        $html.="<hr>";
        $html.="<input name='color' class='form-control' type='text' value='".$colorid."'>";
        foreach ($images as $key => $image) {
            if($image!='') {
                $html .= "<input name='file-" . $colorid . "-1' id='file-".$key."-" . $colorid . "' class='form-control' type='file' required onchange='fileValidation(this)'>";
                $html .= "<div id='imagePreviewfile-".$key."-" . $colorid . "'>";
                $html .= "<img style='width:200px;' src='" . asset('images/products/' . $image) . "'/>";
                $html .= "</div>";
            }
        }
        $html.="<h5>Chọn Size:</h5>";
        $html.="<select id='".$colorid."' onchange='chonsize(this)' required>";
        foreach($sizes as $value){
            $html.="<option value='".$value->id."'>".$value->name."</option>";
        }
        $html.="</select>";
        $html.="<hr>";
        $html.="<div id='soluong".$colorid."'>";
        $html.="<input name='sizenumber".$colorid."' id='sizenumber".$colorid."' class='form-control' type='text' value='0'>";
        $html.="</div>";

        $html.="</div>";
        echo $html;
    }
}

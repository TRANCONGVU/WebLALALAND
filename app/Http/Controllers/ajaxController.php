<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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



}

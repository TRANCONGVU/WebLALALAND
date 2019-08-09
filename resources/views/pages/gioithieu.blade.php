@extends('master-layout')
@section('content')
<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="{{asset('')}}hay/engine1/style.css" />
<script type="text/javascript" src="{{asset('')}}hay/engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
<div class="container gioithieu d-flex flex-column">
    <h4 class="text-left text-uppercase">Giới thiệu</h4>
    <span>{!! $introduce->content !!}</span>

    {{-- <span>Công ty chúng tôi luôn mang đến giá trị tốt nhất cho bạn</span>
    <span>
        Nội dung Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias accusantium ipsam, voluptates
        officiis sequi
        sit. Ullam, consequuntur! Alias et impedit saepe vel quidem ab temporibus, expedita consequuntur aliquam ullam
        dicta.

    </span>
    <a href="#" class="my-2 text-uppercase ">Hệ thống cửa hàng của chúng tôi</a>
    <div class="cuahang">
        <ul>
            <li>Cơ sở chính</li>
            <li>Địa chỉ : 34 , Phạm văn đồng , hà nội </li>
            <li>SDT : 01223423255 </li>
        </ul>
        <ul>
            <li>Của hàng số 1</li>
            <li>Địa chỉ : 34 , Phạm văn đồng , hà nội </li>
            <li>SDT : 01223423255 </li>
        </ul>
        <ul>
            <li>Của hàng số 2</li>
            <li>Địa chỉ : 34 , Phạm văn đồng , hà nội </li>
            <li>SDT : 01223423255 </li>
        </ul>

    </div>--}}
</div>
<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
    <div class="ws_images"><ul>
            <li><img src="{{asset('')}}hay/data1/images/dangcap.png" alt="dangcap" title="dangcap" id="wows1_0"/></li>
            <li><a href="http://wowslider.com"><img src="data1/images/ducbeach.png" alt="jquery slider" title="ducbeach" id="wows1_1"/></a></li>
            <li><img src="{{asset('')}}hay/data1/images/ducxe.png" alt="ducxe" title="ducxe" id="wows1_2"/></li>
        </ul></div>
        <div class="ws_bullets"><div>
            <a href="#" title="dangcap"><span><img src="{{asset('')}}hay/data1/tooltips/dangcap.png" alt="dangcap"/>1</span></a>
            <a href="#" title="ducbeach"><span><img src="{{asset('')}}hay/data1/tooltips/ducbeach.png" alt="ducbeach"/>2</span></a>
            <a href="#" title="ducxe"><span><img src="{{asset('')}}hay/data1/tooltips/ducxe.png" alt="ducxe"/>3</span></a>
        </div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com">wowslideshow</a> by WOWSlider.com v8.5</div>
    <div class="ws_shadow"></div>
    </div>	
    <script type="text/javascript" src="{{asset('')}}hay/engine1/wowslider.js"></script>
    <script type="text/javascript" src="{{asset('')}}hay/engine1/script.js"></script>
    <!-- End WOWSlider.com BODY section -->
@endsection

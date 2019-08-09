@extends('master-layout')
@section('title')
    Video về chúng tôi
@endsection
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col sidebar my-4">
                <div class="sidebar-content">
                    <div class="title-sidebar">
                        <span>danh mục sản phẩm</span>
                        <div class="tintuc-sidebar">
                            @foreach($cate_products as $value)
                                <a href="{{ url('loaisanpham/'.$value->slug) }}">{{ $value->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="sidebar-content">
                    <div class="title-sidebar">
                        <span>sản phẩm nổi bật</span>
                    </div>
                    @foreach($headerproducts as $key => $value)
                        @if($key==0)
                            <a href="{{ url('sanpham/'.$value->slug) }}"> <img src="{{ asset('images/products/'.$value->image) }}" alt=""></a>
                        @endif
                    @endforeach
                </div>
                <div class="sidebar-content">
                    <div class="title-sidebar">
                        <span>Về chúng tôi</span>
                    </div>
                    <span>
                        {{ $introduce->summary }}
                    </span>

                </div>
            </div>
            <div class="col-md-9 col-12 product-page d-flex flex-column">
                <h4 class="text-uppercase mt-3 ">Video về chúng tôi</h4>

                <div class="row xapsep">
                    <div class="col-12 video  " id="vv">
                      {!! $introduce->video !!}

                    </div>


                </div>
                @if($introduce->youtube=='null')
                   <div class="show-more text-center mb-3">
                       <a target="_blank" href="{{ $introduce->youtube }}">Xem thêm</a>
                   </div>
                @endif
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="js/danhsach.js"></script>
<script type="text/javascript" src="lib/jquery.min.js"></script>
<script type="text/javascript" src="lib/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/carousel.js"></script>
@endsection

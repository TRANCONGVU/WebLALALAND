@extends('master-layout')
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col sidebar my-4">
                <div class="sidebar-content">
                    <div class="title-sidebar">
                        <span>danh mục sản phẩm</span>
                        <hr>
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
                    <img src="images/product-1.jpg" alt="">
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
                @isset($cate)
                    <h4 class="text-uppercase mt-3 ">{{ $cate->name }}</h4>
                @else
                    <h4 class="text-uppercase mt-3 ">Tất cả sản phẩm</h4>
                @endisset

                <div class="product-menu d-flex justify-content-between">
                    <div class="d-flex">

                        <span class="mx-4 mt-2">Xem như</span>


                        <div class="select-show">
                            <a id="menu" onclick="menu" class="btn"><i class="fas fa-th grid"></i></a>
                            <a id="danhsach" onclick="danhsach" class="btn"><i class=" fas fa-bars list ml-3"></i></a>
                        </div>

                    </div>
                    <div class="chose d-flex">
                        <div>
                            <span>hiển thị</span>
                            <select>
                                <option>0</option>
                                <option>16</option>
                                <option>32</option>

                            </select>
                        </div>
                        <div>
                            <span>sắp xếp theo</span>
                            <select>
                                <option>Nổi Bật</option>
                                <option>Giá, Tăng Dần</option>
                                <option>Giá, Giảm Dần</option>
                                <option>Thứ tự, A-Z</option>
                                <option>Thứ tự, Z-A</option>
                                <option>Cũ Nhất</option>
                                <option>Mới Nhất</option>
                                <option>Bán Chạy Nhất</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="row xapsep">
                    @foreach($products as $value)
                    <div class="col-md-3  col-sm-6 col-6 new-product " id="vv">
                        <div class="product-img">
                            <img src="{{asset('images/products/'.$value->image)}}" alt="">
                            <div class="over-lay d-flex flex-column justify-content-center">
                                <a href=""><i class="far fa-heart"></i></a>
                                <a href="{{ url( 'sanpham/'.$value->slug )}}">Mua ngay</a>
                            </div>

                        </div>
                        <div class="info-product d-flex flex-column justify-content-center">
                            <a href="{{url( 'sanpham/'.$value->slug )}}">{{ $value->name }}</a>
                            <a href="{{url( 'sanpham/'.$value->slug )}}">Mã hàng : {{ $value->code }}</a>
                            <a href="{{url( 'sanpham/'.$value->slug )}}">{{ number_format($value->sale)." VNĐ" }}</a>
                            <a href="{{url( 'sanpham/'.$value->slug )}}">Mua ngay</a>
                        </div>
                    </div>
                 @endforeach

                </div>
                <div class="show-more text-center mb-3">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/danhsach.js"></script>
    <script type="text/javascript" src="lib/jquery.min.js"></script>
    <script type="text/javascript" src="lib/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/carousel.js"></script>
    <script type="text/javascript" src="js/menu-mobile.js"></script>
    @endsection

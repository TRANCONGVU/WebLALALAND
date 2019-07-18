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
                    @isset($collections)
                        <h4 class="text-uppercase mt-3 ">{{ $collections->name }}</h4>
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
                                            <select id="hienthi" onchange="hienthisanpham(this)">
                                                <option>--hiển thị--</option>
                                                <option value="8">8</option>
                                                <option value="16">16</option>
                                                <option value="32">32</option>
                                            </select>
                                            <script>
                                                 function hienthisanpham(obj) {
                                                     //alert(obj.value);
                                                     $.get('{{ url('showproduct/') }}/' + obj.value, function (data) {
                                                         $("#sanpham").html(data);
                                                         $("#links").hide() ;
                                                     });
                                                 }
                                                 function sapxep(obj) {
                                                     var x= obj.value.split(',');
                                                     //alert(x[1]);
                                                     $.get('{{ url('sapxep/') }}/' + x[0]+'/'+x[1], function (data) {
                                                         $("#sanpham").html(data);
                                                         $("#links").hide() ;
                                                     });
                                                 }
                                            </script>
                                        </div>
                                        <div>
                                            <span>sắp xếp theo</span>
                                            <select onchange="sapxep(this)">
                                                <option>--sắp xếp theo--</option>
                                                <option value="pay,desc">Bán Chạy Nhất</option>
                                                <option value="sale,desc">Giá, Tăng Dần</option>
                                                <option value="sale,asc">Giá, Giảm Dần</option>
                                                <option value="name,desc">Thứ tự, A-Z</option>
                                                <option value="name,asc">Thứ tự, Z-A</option>
                                                <option value="id,asc">Cũ Nhất</option>
                                                <option value="id,desc">Mới Nhất</option>

                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="row xapsep" id="sanpham">
                                    @foreach($products as $value)
                                        <div class="col-md-3  col-sm-6 col-6 new-product " id="vv">
                                            <div class="product-img">
                                                <img src="{{asset('images/products/'.$value->image)}}" alt="" style="height: 310px;">
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
                                <div class="show-more text-center mb-3" id="links">
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

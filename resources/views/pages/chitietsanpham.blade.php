@extends('master-layout')
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col sidebar my-4">
                <div class="sidebar-content">
                    <div class="title-sidebar">
                        <span>danh mục sản phẩm</span>
                        <div class="tintuc-sidebar">
                            <a href="#">áo len</a>
                            <a href="#">áo dài</a>
                            <a href="#">quần jean</a>
                            <a href="#">áo khoác</a>
                            <a href="#">phụ kiện</a>
                            <a href="#">hàng mới</a>
                            <a href="#">thời trang dạ tiệc</a>
                            <a href="#">áo dài</a>
                            <a href="#">đầm</a>
                            <a href="#">khuyến mãi</a>
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo velit aliquam sint dolorum placeat
                        fugiat itaque nostrum veniam ipsam alias libero odio nesciunt optio, possimus qui voluptate illo
                        atque deleniti!
                    </span>

                </div>
            </div>
            <div class="col-md-9 col-12 product-page d-flex flex-column">
                <h4 class="text-uppercase my-3 ">Sản phẩm chi tiết</h4>

                <div class="responve-caroulsel">
                    <div class="col-md-5">
                        <div id="product-carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#product-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#product-carousel" data-slide-to="1"></li>
                                <li data-target="#product-carousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="images/product-1.jpg" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="images/product-1.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="images/product-1.jpg" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#product-carousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#product-carousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>
                    <div class="col-md-6  text-left d-flex flex-column">
                        <h4>ÁO DÀI CÁCH TÂN ĐÍNH HOA MÀU</h4>
                        <span class="gia">Đơn giá : 1 999 999 đ</span>
                        <span>Mã hàng : 124454059</span>
                        <div class="form-group mt-3">
                            <label for="1">Màu sắc</label>
                            <select class="form-control my-3" id="1">
                                <option>Red</option>
                                <option>Green</option>
                            </select>
                            <label for="1">Kích cỡ</label>
                            <select class="form-control" id="1">
                                <option>S</option>
                                <option>M</option>
                                <option>L</option>
                                <option>XL</option>
                                <option>XXL</option>
                            </select>
                        </div>
                        <h6>Số lượng</h6>
                        <div class="soluong d-flex justify-content-between">
                            <button class="btn"><i class="fas fa-minus"></i></button>
                            <span>1</span>
                            <button class="btn"><i class="fas fa-plus"></i></button>
                        </div>
                        <h6>
                            Số tiền :<span> 100.000đ </span>
                        </h6>

                    </div>
                </div>
                <div class="show-more text-center mb-3">
                    <a href="#"  data-toggle="modal" data-target="#modal1">Thêm vào giỏ hàng</a>
                </div>
                <div class="container border-line">
                    <span> # Sản phẩm liên quan </span>
                </div>
                <div class="sp-lienquan owl-carousel owl-theme">
                    <div class="item">
                        <div class="over-lay d-flex flex-column justify-content-center">
                            <a href=""><i class="far fa-heart"></i></a>
                            <a href="">Mua ngay</a>
                        </div>
                        <img src="images/product-3.jpg" alt="">
                        <div class="info-product d-flex flex-column justify-content-center">
                            <a href="#">váy đầm trẻ</a>
                            <a href="#">Mã hàng : 1234jdfk12</a>
                            <a href="#">440,000 Đ</a>
                        </div>
                    </div>
                </div>



            </div>


        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content text-center ">
            <div class="row">
                <div class="col-4 modal-img">
                    <img src="images/product-2.jpg" alt="">
                </div>
                <div class="col-8 modal-title d-flex flex-column">
                    <span>Bạn vừa thêm sản phẩm vào giỏ hàng</span>
                    <div class="modal-link">
                            <a href="{{ url('trang-chu') }}">Tiếp tục mua sắm</a>
                            <a href="{{ url('cart') }}">Tới giỏ hàng</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="lib/    jquery.min.js"></script>
<script type="text/javascript" src="lib/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/carousel.js"></script>
@endsection

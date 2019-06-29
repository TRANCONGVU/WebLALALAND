@extends('master-layout')
@section('content')
<div class="container">
    <h5 class="text-uppercase">Giỏ hàng của tôi</h5>
    <div class="row">
        <div class="col-md-8 cart-sp">
            <div class="cart-top">
                <span>sản phẩm</span>
            </div>
            <div class="cart-content">
                <img src="images/product-3.jpg" alt="">
                <div class="cart-rigt">
                    <span>áo dài cách tân đính hoa màu</span>
                    <span>Giá: 1,999,999 Đ </span>
                    <span>Size : S</span>
                    <span>Màu : Tím</span>
                    <div class="d-flex komuonlamnua">
                        <input class="form-control text-center" value="1" type="number">
                        <i class="far fa-trash-alt ml-3 mt-2"></i>
                        <a class="ml-3 mt-2" href="#">Cập nhật giỏ hàng của bạn</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="cart-top">
                <span>Tổng số</span>
            </div>
            <div class="cart-gia d-flex justify-content-center">
                <span>1,999,999 Đ</span>
            </div>
            <div class="container border-line">

                </div>
                <label for="coment">ý kiến của bạn</label>
                <textarea class="form-control" id="coment" rows="5"></textarea>
                <a href="{{ url('form') }}"><button class="thanhtoan">thanh toán</button></a>

        </div>
    </div>

</div>

@endsection

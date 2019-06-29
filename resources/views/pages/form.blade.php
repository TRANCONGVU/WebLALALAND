@extends('master-layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-1 form-muahang">
            <form class="form-thanhtoan">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="Họ và Tên">Email</label>
                        <input type="name" class="form-control" id="name" placeholder="Họ và Tên">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="Số Điện Thoại">Password</label>
                        <input type="phone" class="form-control" id="phone" placeholder="Số điện thoại">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Địa chỉ">Address</label>
                    <input type="text" class="form-control" id="address"
                        placeholder="235 Hoàng Quốc Việt , Từ Liêm , Hà Nội">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="1">
                        <label class="form-check-label" for="1">
                            Thanh toán khi nhận hàng
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="2">
                        <label class="form-check-label" for="2">
                            Thanh toán qua ATM
                        </label>
                    </div>
                </div>
                <a id="click" class="btn btn-primary">Đặt hàng</a>
            </form>
            <div class="xacnhan">
                <div>
                    <i class="fas fa-check-circle mt-2"></i>
                    <span>Đơn hàng của bạn đã đươc xác nhận</span>
                </div>
                <div class="tt-donhang">
                    <span>Họ và tên : </span>
                    <span>Số Điên Thoại :</span>
                    <span>Địa chỉ : 235 hoàn quốc việt từ liên hà nội việt nam</span>
                    <span>hình thức thanh toán</span>
                    <span>thanh toán khi nhận hàng</span>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ url('cauhoi') }}" style="font-size : 13px; margin-top : 20px" href="#">Bạn cần hỗ trợ
                        ??</a>

                    <a href="{{ url('trang-chu') }}" class="btn btn-primary mt-3">Tiếp tục mua sắm</a>
                </div>


            </div>
        </div>
        <div class="col-md-4 thanhtoan-sp">
            <div class="thanhtoan-left d-flex justify-content-between    ">
                <div>
                    <img src="images/product-4.jpg" alt="">
                    <span> đầm ren đuôi cá</span>
                </div>

                <div class="name-sp">
                    <span> 1,999,999 Đ</span>
                </div>
            </div>
            <div class="container border-line">

            </div>
            <div class="total-pay d-flex justify-content-between">
                <span>Tổng</span>
                <span>1,999,999 Đ</span>
            </div>
            <div class="container border-line">

            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    var button = document.getElementById("click");
    var box2= document.querySelector(".xacnhan");
    var box = document.querySelector(".form-thanhtoan");
    var tt = true;
    button.addEventListener('click', function () {
        if (tt === true) {
            box.classList.add('form-thanhtoan2');
            box2.classList.add('xacnhan2');
            box.classList.remove('form-thanhtoan');
            box.classList.remove('xacnhan');
        }
        else{
            console.log('hihi')
        }

    });

</script>
@endsection

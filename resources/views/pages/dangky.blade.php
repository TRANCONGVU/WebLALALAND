@extends('master-layout')
@section('content')
<div class="container">
    <form>
        <div class="row form-dangky">
            <div class="form col-md-6 d-flex flex-column">
                <div class="form-group ">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input type="name" class="form-control" id="name" placeholder="Họ và Tên">
                </div>
                <div class="form-group">
                    <label for="phone">Số điên thoại</label>
                    <input type="phone" class="form-control" id="phone" placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                    <label for="birt">Ngày sinh</label>
                    <input type="birt" class="form-control" id="birt" placeholder="DD / MM /YY">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="check">
                    <label class="form-check-label" for="check">Đồng ý với điều khoản của chúng tôi</label>

                </div>
            </div>
            <div class="col-md-6">
                <img src="images/logo2.png" alt="">
            </div>
        </div>
        <div class="d-flex justify-content-start">
            <button class="btn btn-primary">Đăng ký</button>

        </div>


    </form>
</div>
@endsection

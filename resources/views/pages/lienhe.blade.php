@extends('master-layout')
@section('content')
<div class="container-fluid d-flex justify-content-start">
    <div class="row">
        <div class="col-md-6 lienhe">
            <h4>Liên hệ ngay với chúng tôi</h4>
            <span> Nếu bạn chưa thấy hài lòng với dịch vụ của chúng tôi hoặc bạn muốn tìm hiểu các thông tin khác, xin
                hãy
                gửi thông tin cho chúng tôi:</span>
            <div class="container border-line"></div>
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="sdt">Phone</label>
                    <input type="text" class="form-control" id="sdt" placeholder="Phone">
                </div>
                <div class="form-group">
                    <label for="text">Nội dung</label>
                    <textarea class="form-control" id="text" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-secondary">Gửi thông tin</button>
                </div>
            </form>
        </div>
        <div class="col-md-4 lienhe lienhe-right">
            <h4 class="text-left">Thông tin liên hệ</h4>
            <div class="content">
                <span>Bạn thấy hài lòng với chúng tôi, xin hãy chia sẻ cho bạn bè của bạn để họ có thể nhận được những
                    giá
                    trị mà
                    chúng tôi mang lại cho bạn. Nếu bạn chưa thấy hài lòng với dịch vụ của chúng tôi hoặc bạn muốn tìm
                    hiểu
                    các
                    thông tin khác, xin hãy gửi thông tin cho chúng tôi:</span>
            </div>
            <span>Hệ thống cửa hàng của chúng tôi</span>
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

            </div>
            <div class="container border-line"></div>
            <span>Thời gian làm việc 8:00 am - 17:30 pm</span>
        </div>

    </div>



</div>
<div class="col-12 map">


    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3722.8580470816996!2d105.78534501457999!3d21.07833109146081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aacbe6b051d3%3A0x99154d3da13e19eb!2zNDMgUGjhuqFtIFbEg24gxJDhu5NuZywgWHXDom4gxJDhu4luaCwgVOG7qyBMacOqbSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1561690516089!5m2!1svi!2s"
        width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
@endsection

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
            <form action="{{ route('lienhe') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name_message" id="name_message" placeholder="Name" onclick="an(this)">
                    <div style="color: red;" id="error_name_message"></div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email_message" id="email_message" placeholder="Email" onclick="an(this)">
                    <div style="color: red;" id="error_email_message"></div>
                </div>
                <div class="form-group">
                    <label for="sdt">Phone</label>
                    <input type="text" class="form-control" name="phone_message" id="sdt_message" placeholder="Phone" onclick="an(this)">
                    <div style="color: red;" id="error_sdt_message"></div>
                </div>
                <div class="form-group">
                    <label for="text">Nội dung</label>
                    <textarea class="form-control" id="content_message" name="content_message" rows="5" onclick="an(this)"></textarea>
                    <div style="color: red;" id="error_content_message"></div>
                </div>
                <div class="form-group">
                    <button class="btn btn-secondary" onclick="return sendmessage()">Gửi thông tin</button>
                    <script>
                        function sendmessage() {
                            if($('#name_message').val() === ''){
                                $('#error_name_message').html('Bạn cần nhập tên để có thể gửi tin nhắn cho Shop');
                                return false;
                            }
                            if($('#email_message').val() === ''){
                                $('#error_email_message').html('Bạn cần nhập email để có thể gửi tin nhắn cho Shop');
                                return false;
                            }
                            if($('#sdt_message').val() === ''){
                                $('#error_sdt_message').html('Bạn cần nhập số điện thoại để có thể gửi tin nhắn cho Shop');
                                return false;
                            }
                            if($('#content_message').val() === ''){
                                $('#error_content_message').html('Bạn cần nhập nội dung tin nhắn');
                                return false;
                            }
                        }
                        function an(obj) {
                            $('#error_'+obj.id).html('');
                        }
                    </script>
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
                @foreach($showroms as $value)
                    <ul>
                        <li><b>{{ $value->name }}</b></li>
                        <li>Địa chỉ : {{ $value->address }}</li>
                        <li>SĐT : {{ $value->phone }} </li>
                    </ul>
                    <hr>
                @endforeach

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

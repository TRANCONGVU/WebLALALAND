<div class="container-fluid footer">
    <div class="container">
        <div class="container border-line"></div>
        <div class="row text-left">
            <div class="col-md-8 d-flex justify-content-around text-left">
                <div class="d-flex flex-column footer-contact">
                    <h6>Thông tin cửa hàng</h6>
                    <a href="{{ url('loaisanpham/all') }}">Sản phẩm nổi bật</a>
                    <a href="{{ url('showrom') }}">Hệ thống cửa hàng</a>
                    <a href="{{ url('bosuutap/all') }}">Lookbook / Bộ sưu tập</a>
                    <img class="mt-5" src="images/dathongbao.png" alt="">
                </div>
                <div class="d-flex flex-column footer-contact">
                    <h6>dịch vụ khách hàng</h6>
                    <a href="{{ url('cart') }}">Đơn hàng</a>
                    <a href="{{ url('cauhoi') }}">Câu hỏi thường gặp</a>
                    <a href="{{ url('lienhe') }}">Liên hệ với chúng tôi</a>
                    <a href="{{ url('tuyendung') }}">Tuyển dụng</a>
                    <a href="{{ url('gioithieu') }}">Về chúng tôi</a>
                </div>
                <div class="d-flex flex-column footer-contact">
                    <h6>dịch vụ khách hàng</h6>
                    <a href="">Điều khoản mua hàng</a>
                    <a href="">Chính sách khách hàng ưu tiên</a>
                    <a href="">Chính sách thanh toán</a>
                    <a href="">Chính sách vận chuyển</a>
                    <a href="">Chính sách bảo mật</a>
                </div>


            </div>
            <div class="col-md-4 conect-bottom d-flex flex-column ">
                <h6 class="">kết nối với chúng tôi</h6>
                <div class="conect">
                    @if($introduce->facebook!='')
                        <a target="_blank" href="{{ $introduce->facebook }}"><img src="images/fb-icon.png" alt=""></a>
                    @endif
                    @if($introduce->youtube!='')
                        <a target="_blank" href="{{ $introduce->youtube }}"><img src="images/youtube-icon.png" alt=""></a>
                    @endif
                    @if($introduce->instagram!='')
                        <a target="_blank" href="{{ $introduce->instagram }}"><img src="images/instar-icon.png" alt=""></a>
                    @endif
                    @if($introduce->twitter!='')
                        <a target="_blank" href="{{ $introduce->twitter }}"><img src="images/twitter.png" alt=""></a>
                    @endif
                </div>
                <h6 class="mt-3">Đăng ký nhận tin</h6>
                <form action="" class="form-inline">
                    <input type="text" class="form-control" id="text" placeholder="Nhập email của bạn">
                    <button class="btn btn-secondary ml-3">Gửi thông tin</button>
                </form>
            </div>
        </div>
        <div class="d-flex flex-column bot-footer text-left">
            <span><i class="fas fa-copyright"></i> Coppy right Talent Wins Teachnology</span>
            <span>Số điện thoại: <a href="tel:0927151535">0927 151 535</a> - Email: contact@talentwins.co</span>
            <span>Địa chỉ:Tòa CT2, Khu đô thi Thái Hà Constrexim, 43 Phạm Văn Đồng, Hà Nội</span>
            <span>Giấy chứng nhận đăng kí kinh doanh số được cấp bởi Sở Kế hoạch và Đầu tư thành phố Hà Nội</span>
        </div>
    </div>

</div>
<div class="container-flui" style="position : relative">
    <div class="box-up">
        <a id="hihi" onclick="hihi">
            <div class="box-up-item bacham">
                <i class="fas fa-ellipsis-h"></i>
            </div>
        </a>
        <div class="hide">
            <a href="#">
                <div class="box-up-item">
                    <a href="mailto:{{ $introduce->email }}"><img src="images/mail-icon.png" alt=""></a>
                </div>
            </a>
            <a href="">
                <div class="box-up-item">
                    <img src="images/messager-icon.png" alt="">
                </div>
            </a>
            <a href="">
                <div class="box-up-item">
                    <a href="tel:{{ $introduce->phone }}"><img src="images/phone-icon.png" alt=""></a>
                </div>
            </a>

        </div>

    </div>
</div>
<script type="text/javascript">
    var lk = document.getElementById("hihi");
    var hihi = document.querySelector(".hide");
    var hidett = true;
    lk.addEventListener('click', function () {
        if (hidett === true) {
            hihi.classList.add('show');
            hihi.classList.remove('hide');
            return hidett = false;
            console.log(hidett);
        } else {
            hihi.classList.add('hide');
            hihi.classList.remove('show');
            return hidett = true;
            console.log(hidett);
        }
    });

</script>

<section class="back-to-top">
    <div class="back-to-top-button"><i class="fas fa-angle-double-up"></i></div>
</section>
<script type="text/javascript" src="js/backtotop.js"></script>

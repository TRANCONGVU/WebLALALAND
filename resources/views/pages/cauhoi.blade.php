@extends('master-layout')
@section('content')



<div class="container question text-center">
    <h3>Các câu hỏi thường gặp :</h3>
    <div class="container border-line"></div>
    <span>Nếu bạn có câu hỏi thắc mắc về dịch vụ của chúng tôi, sau đây là một số câu hỏi mà các khách hàng chúng tôi
        hay
        hỏi để các bạn tham khảo, nếu bạn chưa tìm thấy câu hỏi phù hợp, xin hãy gửi email về: </span>
    <div class="d-flex flex-column">

        <div id="accordion">
            <div class="card">
                <div class="card-header" id="question1">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse1"
                            aria-expanded="true" aria-controls="collapse1">
                            <span>các cửa hàng của chúng tôi</span>
                        </button>
                    </h5>
                </div>

                <div id="collapse1" class="collapse" aria-labelledby="question1" data-parent="#accordion">
                    <div class="card-body text-center">
                       <li>236 Hoàng Quốc Việt , Từ Liêm , Hà Nôi</li>
                       <li>236 Phạm Văn Đồng , Từ Liêm , Hà Nôi</li>
                    </div>
                </div>
            </div>



            <div class="card">
                <div class="card-header" id="question2">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse2"
                            aria-expanded="true" aria-controls="collapse2">
                            <span>Thanh toán qua thẻ</span>
                        </button>
                    </h5>
                </div>

                <div id="collapse2" class="collapse" aria-labelledby="question2" data-parent="#accordion">
                    <div class="card-body text-left">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi vero, earum, similique eius
                        tempora ad exercitationem tenetur repellat ipsam itaque dicta rem eos quia veniam dolores id
                        laudantium numquam sapiente.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="question3">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse3"
                            aria-expanded="true" aria-controls="collapse3">
                            <span>sau bao lâu nhận được hàng</span>
                        </button>
                    </h5>
                </div>

                <div id="collapse3" class="collapse" aria-labelledby="question3" data-parent="#accordion">
                    <div class="card-body text-left">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi vero, earum, similique eius
                        tempora ad exercitationem tenetur repellat ipsam itaque dicta rem eos quia veniam dolores id
                        laudantium numquam sapiente.
                    </div>
                </div>
            </div>
            <div class="card">
                    <div class="card-header" id="question4">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse4"
                                aria-expanded="true" aria-controls="collapse4">
                                <span>sua bao lâu nhận được hàng</span>
                            </button>
                        </h5>
                    </div>

                    <div id="collapse4" class="collapse" aria-labelledby="question4" data-parent="#accordion">
                        <div class="card-body text-left">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi vero, earum, similique eius
                            tempora ad exercitationem tenetur repellat ipsam itaque dicta rem eos quia veniam dolores id
                            laudantium numquam sapiente.
                        </div>
                    </div>
                </div>

        </div>


    </div>
</div>



@endsection

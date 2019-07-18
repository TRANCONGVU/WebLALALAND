@extends('master-layout')
@section('content')
<div class="container gioithieu d-flex flex-column">
    <h4 class="text-left text-uppercase">Giới thiệu</h4>
    <span>{!! $introduce->content !!}</span>

    {{-- <span>Công ty chúng tôi luôn mang đến giá trị tốt nhất cho bạn</span>
    <span>
        Nội dung Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias accusantium ipsam, voluptates
        officiis sequi
        sit. Ullam, consequuntur! Alias et impedit saepe vel quidem ab temporibus, expedita consequuntur aliquam ullam
        dicta.

    </span>
    <a href="#" class="my-2 text-uppercase ">Hệ thống cửa hàng của chúng tôi</a>
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

    </div>--}}
</div>

@endsection

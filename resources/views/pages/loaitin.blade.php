@extends('master-layout')
@section('title')
    {{ $cates->name }}
@endsection
@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col sidebar my-4">
                <div class="sidebar-content">
                    <div class="title-sidebar">
                        <span>Bài viết gần đây</span>
                    </div>
                    <div class="tintuc-sidebar">
                        <a href="#">xu hướng thời trang 2019</a>
                        <a href="#">sự kiện 2019</a>
                        <a href="#">thời trang 2019</a>
                        <a href="#">sản phẩm giá rẻ , chất lượng tốt 2019</a>
                        <a href="#">du lịch </a>
                        <a href="#"></a>
                    </div>
                </div>
                <div class="sidebar-content">
                    <div class="title-sidebar">
                        <span>xu hướng thời trang 2019</span>
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
                <h4 class="text-uppercase mt-3 ">{{ $cates->name }}</h4>
                @foreach($news as $new)
                    <div class="tintuc-item">
                        <a href="{{ url('tintuc/'.$new->slug) }}">{{ $new->title }}</a>
                        <span>{{ $new->summary }}</span>
                        <span>{{ $new->created_at }}</span>
                        <img src="{{ asset('images/news/'.$new->image) }}" alt="">
                        <div class="show-more text-center mt-3">
                            <a href="{{ url('tintuc/'.$new->slug) }}">Xem thêm</a>
                        </div>
                    </div>
                @endforeach
                {{--
                <div class="tintuc-item">
                    <a href="#">cuộc sống</a>
                    <span>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus dolor aperiam, alias
                        beatae, enim eius est dolorum sunt assumenda, quasi placeat officiis quibusdam exercitationem id
                        doloribus? Eos possimus voluptates quasi! Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Maiores beatae tempora nemo dicta, harum inventore velit quos nisi fugit deserunt placeat
                        obcaecati dolor illum non rerum reprehenderit voluptatum, ex odit.
                    </span>
                    <span>
                        GMT + 7 , 21 / 07 / 2019 , Hà Nội
                    </span>
                    <img src="images/new1.jpg" alt="">
                    <div class="show-more text-center mt-3">
                        <a href="#">Xem thêm</a>
                    </div>
                </div>
                <div class="tintuc-item">
                    <a href="#">Du lich 2019 </a>
                    <span>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus dolor aperiam, alias
                        beatae, enim eius est dolorum sunt assumenda, quasi placeat officiis quibusdam exercitationem id
                        doloribus? Eos possimus voluptates quasi! Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Maiores beatae tempora nemo dicta, harum inventore velit quos nisi fugit deserunt placeat
                        obcaecati dolor illum non rerum reprehenderit voluptatum, ex odit.
                    </span>
                    <span>
                        GMT + 7 , 21 / 07 / 2019 , Hà Nội
                    </span>
                    <img src="images/new1.jpg" alt="">
                    <div class="show-more text-center mt-3">
                        <a href="#">Xem thêm</a>
                    </div>
                </div>
                <div class="tintuc-item">
                    <a href="#">Thời trang 2019 </a>
                    <span>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus dolor aperiam, alias
                        beatae, enim eius est dolorum sunt assumenda, quasi placeat officiis quibusdam exercitationem id
                        doloribus? Eos possimus voluptates quasi! Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Maiores beatae tempora nemo dicta, harum inventore velit quos nisi fugit deserunt placeat
                        obcaecati dolor illum non rerum reprehenderit voluptatum, ex odit.
                    </span>
                    <span>
                        GMT + 7 , 21 / 07 / 2019 , Hà Nội
                    </span>
                    <img src="images/new1.jpg" alt="">
                    <div class="show-more text-center mt-3">
                        <a href="#">Xem thêm</a>
                    </div>
                </div>--}}

                <nav aria-label="Page">
                        {{--<ul class="pagination">
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                              <span class="sr-only">Previous</span>
                            </a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                              <span class="sr-only">Next</span>
                            </a>
                          </li>
                        </ul>--}}
                    {{ $news->links() }}
                </nav>

            </div>


        </div>

    </div>
</div>

<script type="text/javascript" src="lib/jquery.min.js"></script>
<script type="text/javascript" src="lib/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/carousel.js"></script>

@endsection

@extends('master-layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('xzoom/xzoom.css') }}">
    <style>
        .quantity{
            width: 100%;
            text-align: center;
            background: none;
            border: none;
            color: white;
        }
    </style>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col sidebar my-4">
                <div class="sidebar-content">
                    <div class="title-sidebar">
                        <span>danh mục sản phẩm</span>
                        <div class="tintuc-sidebar">
                            @foreach($cate_products as $value)
                                <a href="{{ url('loaisanpham/'.$value->slug) }}">{{ $value->name }}</a>
                            @endforeach
                           {{--
                            <a href="#">áo dài</a>
                            <a href="#">quần jean</a>
                            <a href="#">áo khoác</a>
                            <a href="#">phụ kiện</a>
                            <a href="#">hàng mới</a>
                            <a href="#">thời trang dạ tiệc</a>
                            <a href="#">áo dài</a>
                            <a href="#">đầm</a>
                            <a href="#">khuyến mãi</a>--}}
                        </div>
                    </div>
                </div>
                <div class="sidebar-content">
                    <div class="title-sidebar">
                        <span>sản phẩm nổi bật</span>
                    </div>
                    <img src="{{ asset('images/products/'.$product_hot->image) }}" alt="">
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
                   {{-- <div class="col-md-5">
                    <div class="carousel-item active">
                        <img src="{{asset('images/products/'.$product->image)}}" alt="">
                    </div>
                    </div>--}}


                     <div class="col-md-5" id="imageproduct">
                        <div id="product-carousel" class="carousel slide" data-ride="carousel">
                           {{-- <ol class="carousel-indicators">
                                <li data-target="#product-carousel" data-slide-to="0" class="active" style=" background-image: url('{{ asset('images/product-1.jpg') }}');"></li>
                                <li data-target="#product-carousel" data-slide-to="1" style=" background-image: url('{{ asset('images/product-1.jpg') }}');"></li>
                                <li data-target="#product-carousel" data-slide-to="2" style=" background-image: url('{{ asset('images/product-1.jpg') }}');"></li>
                            </ol>--}}
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="xzoom" src="{{asset('images/products/'.$product->image)}}" alt="">
                                </div>
                               {{-- <div class="carousel-item">
                                    <img class="d-block w-100" src="images/product-1.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="images/product-1.jpg" alt="Third slide">
                                </div>--}}
                            </div>
                           {{-- <a class="carousel-control-prev" href="#product-carousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#product-carousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>--}}
                        </div>

                    </div>
                   {{-- <form action="#" method="post" name="">
                        @csrf
                        <input type="hidden" name="productid" value="{{ $product->id }}" />--}}
                    <div class="col-md-6  text-left d-flex flex-column">
                        <h4>{{ $product->name }}</h4>
                        <span class="gia">Giá Khuyến Mại : {{ number_format($product->sale)." VNĐ" }}</span>
                        Giá cũ : <p class="" style="  text-decoration: line-through;">{{ number_format($product->price)." VNĐ" }}</p>
                        <span>Mã hàng : {{ $product->code }}</span>
                        <div class="form-group mt-3">
                            <label for="1">Màu sắc</label>
                            <select class="form-control my-3" name="productcolor" id="productcolor"  onchange="selectsize(this)">
                                <option value="0">--Màu--</option>
                                @foreach($colors as $color)
                                    <option value="{{ $color->colorid }}" id="{{ $color->detailid }}">{{ $color->name }}</option>
                                @endforeach
                                    <script>
                                        function selectsize(obj){
                                            var options = obj.children;
                                            var x = obj.value;
                                            if(x==="0"){
                                                   $("#sizeproduct").html('');
                                               }
                                               else {
                                                for (var i = 0; i < options.length; i++) {
                                                    if (options[i].selected) {
                                                        $.get('{{ url('selectsize/') }}/' + options[i].id, function (data) {
                                                            $("#sizeproduct").html(data);
                                                        });
                                                    }
                                                }
                                                   $.get('{{ url('selectcolor/') }}/' + obj.value + '/{{ $product->id }}', function (data) {
                                                       $("#product-carousel").html(data);
                                                   });

                                                }
                                        };
                                    </script>
                                {{--<option>Green</option>--}}
                            </select>
                            <label for="1">Kích cỡ</label>
                            <select class="form-control" id="sizeproduct" name="productsize">

                            </select>
                        </div>
                        <h6>Số lượng</h6>
                        <div class="soluong d-flex justify-content-between">
                            @csrf
                            <button class="btn" onclick="minus()"><i class="fas fa-minus"></i></button>
                            <input name="quantity" class="quantity" id="quantity" type="number" value="1" onchange="cost(this)">
                            <input id="sale" type="hidden" value="{{ $product->sale }}">
                            <button class="btn" onclick="plus()"><i class="fas fa-plus"></i></button>
                            <script>
                                function plus(){
                                    var number=parseInt($('#quantity').val())+1;
                                    $('#quantity').val(number);
                                    var total = number*parseInt($('#sale').val());

                                    document.getElementById('total').innerHTML= total.toLocaleString()+' VNĐ';
                                }
                                function minus() {
                                    if(parseInt($('#quantity').val()) > 1){
                                        var number = parseInt($('#quantity').val()) - 1;

                                        $('#quantity').val(number);
                                        var total = number * parseInt($('#sale').val());

                                        document.getElementById('total').innerHTML = total.toLocaleString() + ' VNĐ';
                                    }
                                }
                                function cost(obj) {
                                    //alert(obj.value);
                                    if(obj.value <1){
                                        alert('bạn không thể chọn số lượng nhỏ hơn 1');
                                        obj.value= 1;
                                    }
                                    else{
                                        var total = parseInt(obj.value) * parseInt($('#sale').val());

                                        document.getElementById('total').innerHTML = total.toLocaleString() + ' VNĐ';
                                    }
                                }
                            </script>
                        </div>
                        <h6>
                            Số tiền :   <span id="total"> {{ number_format($product->sale). " VNĐ" }}</span>
                        </h6>
                        <div id="result"></div>
                    </div>

                </div>
                <div class="show-more text-center mb-3">
                    <button class="btn btn-outline-success"   data-toggle="modal" data-target="#modal1" onclick="addcart()">Thêm vào giỏ hàng</button>
                </div>
                <script>
                    function addcart() {
                        if($('#productcolor').val() === '0'){
                            alert('bạn chưa chọn size');
                        }
                        else {
                            var agrs = {
                                url: "{{ url('addcart') }}", // gửi ajax đến file result.php
                                type: "post", // chọn phương thức gửi là post
                                dataType: "text", // dữ liệu trả về dạng text
                                data: { // Danh sách các thuộc tính sẽ gửi đi
                                    _token: '{{ csrf_token() }}',
                                    id: {{ $product->id }},
                                    color: $('#productcolor').val(),
                                    size: $('#sizeproduct').val(),
                                    quantity: $('#quantity').val(),
                                },
                                success: function (result) {
                                    // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
                                    // đó vào thẻ div có id = result
                                    $('#result').html(result);
                                }
                            };

                            // Truyền object vào để gọi ajax
                            $.ajax(agrs);
                        }
                    }

                </script>
                <div class="container border-line">
                    <span> # Sản phẩm liên quan </span>
                </div>
                <div class="sp-lienquan owl-carousel owl-theme">
                @foreach($lienquan as $product)

                        <div class="item">
                            <div class="over-lay d-flex flex-column justify-content-center">
                                <a href=""><i class="far fa-heart"></i></a>
                                <a href="">Mua ngay</a>
                            </div>
                            <img src="{{asset('images/products/'.$product->image)}}" alt="" width="208px" height="280px">
                            <div class="info-product d-flex flex-column justify-content-center">
                                <a href="{{ url('sanpham/'.$product->slug) }}">{{ $product->name }}</a>
                                <a href="{{ url('sanpham/'.$product->slug) }}">Mã hàng : {{ $product->code }}</a>
                                <a href="{{ url('sanpham/'.$product->slug) }}">{{ $product->sale }}</a>
                            </div>
                        </div>

                @endforeach
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
<script type="text/javascript" src="lib/jquery.min.js"></script>
<script type="text/javascript" src="lib/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/carousel.js"></script>
    <script type="text/javascript" src="{{asset('xzoom/xzoom.min.js')}}"></script>

@endsection

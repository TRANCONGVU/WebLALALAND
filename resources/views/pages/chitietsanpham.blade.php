@extends('master-layout')
@section('title')
    {{ $product->name }}
@endsection
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
                       {{ $introduce->summary }}
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
                        <span class="gia">{{ number_format($product->sale)." VNĐ" }}</span>
                        <input id="sale" type="hidden" value="{{ $product->sale }}">
                        <span class="">Sale :  {{ 100-($product->sale/$product->price)*100 }}%</span>
                        <b>Giá cũ :</b> <p class="" style="  text-decoration: line-through;">{{ number_format($product->price)." VNĐ" }}</p>
                        <span>Mã hàng : {{ $product->code }}</span>
                        <div class="form-group mt-3">
                            <label for="1">Mô tả:</label>
                            <div class="describe">
                                {{ $product->describe }}
                            <hr>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="1">Màu sắc:</label>
                            @foreach($colors as $color)
                            <button class="btn has-color" id="color{{$color->colorid}}" onclick="selectcolor({{ $color->colorid }})">{{ $color->name }}</button>
                            @endforeach
                            <input id="selectcolor" type="hidden" value="">
                                    <script>
                                        function selectcolor(colorid){
                                            var x= document.querySelector('.active-color');
                                            if(x!=null) {
                                                x.classList.remove('active-color');
                                            }
                                            var chosesize= document.querySelector('#chosesize');
                                            $.get('{{ url('selectsize/') }}/' + colorid, function (data) {
                                                $("#sizeproduct").html(data)
                                                chosesize.classList.remove('hide');
                                            });
                                           $.get('{{ url('selectcolor/') }}/' + colorid + '/{{ $product->id }}', function (data) {
                                               $("#product-carousel").html(data);
                                           });
                                           $('#selectcolor').val(colorid);
                                           document.querySelector('#color'+colorid).classList.add('active-color');
                                        };
                                    </script>
                                {{--<option>Green</option>--}}
                            <div id="chosesize" class="hide">
                            <label for="1">Kích cỡ:</label>
                            <div id="sizeproduct" >

                            </div>

                                <input id="quantitynow" type="hidden" value="0">
                            <script>
                                function quantity(obj) {
                                    var quantity = document.querySelector('#quantityselect');
                                    var error = document.querySelector('#errorquantity');
                                    //$('#quantitynow').val(obj.value);
                                    var agrs = {
                                        url: "{{ url('quantity') }}", // gửi ajax đến file result.php
                                        type: "post", // chọn phương thức gửi là post
                                        dataType: "text", // dữ liệu trả về dạng text
                                        data: { // Danh sách các thuộc tính sẽ gửi đi
                                            _token: '{{ csrf_token() }}',
                                            product: '{{ $product->id }}',
                                            color: $('#productcolor').val(),
                                            size: obj.value,
                                        },
                                        success: function (result) {
                                            quantity.classList.remove('hide');
                                            error.classList.remove('alert');
                                            error.classList.remove('alert-danger');
                                            error.innerHTML='';
                                            $('#quantitynow').val(result);
                                            document.getElementById('quantity').value=1;
                                            document.getElementById('total').innerHTML = '{{ number_format($product->sale) }}' + ' VNĐ'
                                        }
                                    };
                                    $.ajax(agrs);
                                }
                            </script>
                            </div>
                        </div>


                        <div id="quantityselect" class="hide">
                            @csrf
                            <h6>Số lượng</h6>
                            <input name="quantity" class="form-control" id="quantity" type="number" value="1" onchange="cost(this)">
                            <script>

                                function cost(obj) {
                                    var error = document.querySelector('#errorquantity');
                                    //alert($('#quantitynow').val());
                                    if(obj.value <1){
                                        error.classList.remove('hide');
                                        error.classList.add('alert');
                                        error.classList.add('alert-danger');
                                        error.innerHTML='bạn không thể chọn số lượng nhỏ hơn 1';
                                        obj.value= 1;
                                    }
                                    else if(obj.value > $('#quantitynow').val() ) {
                                        error.classList.remove('hide');
                                        error.classList.add('alert');
                                        error.classList.add('alert-danger');
                                        error.innerHTML='Sản phảm trong kho không đủ!';
                                        obj.value= $('#quantitynow').val();
                                    }else{
                                        error.classList.add('hide');
                                        var total = parseInt(obj.value) * parseInt($('#sale').val());
                                        document.getElementById('total').innerHTML = total.toLocaleString() + ' VNĐ';
                                    }
                                }
                            </script>
                            <h6>
                                Số tiền :   <span id="total"> {{ number_format($product->sale). " VNĐ" }}</span>
                            </h6>
                        </div>
                        <div id="errorquantity"></div>
                    </div>

                </div>
                <hr>
                <div id="errorcart"></div>
                <div class="show-more text-center mb-3" id="actionaddcart">
                    <button class="btn btn-outline-success" onclick="addcart()">Thêm vào giỏ hàng</button>
                </div>
                <div id="addcartsuccess" style="text-align: center" class="hide">
                    <a class="btn btn-outline-primary" href="{{ url('trang-chu') }}">Tiếp tục mua sắm</a>
                    <a class="btn btn-outline-success" href="{{ url('cart') }}">Tới giỏ hàng</a>
                </div>

                <script>
                    function addcart() {
                        var errorcart= document.querySelector('#errorcart');
                        var actionaddcart= document.querySelector('#actionaddcart');
                        var done= document.querySelector('#addcartsuccess');
                        errorcart.classList.add('alert');
                        if($('#productcolor').val() === '0'){
                            errorcart.classList.remove('alert-success');
                            errorcart.classList.add('alert-danger');
                            errorcart.innerHTML='Bạn chưa chọn Màu!';
                        }
                        if($('#sizeproduct').val() === '0'){
                            errorcart.classList.remove('alert-success');
                            errorcart.classList.add('alert-danger');
                            errorcart.innerHTML='Bạn chưa chọn size!';
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
                                    errorcart.classList.remove('alert-danger');
                                    errorcart.classList.add('alert-success');
                                    errorcart.innerHTML='Thêm vào giỏ hàng thành công!';
                                    done.classList.remove('hide');
                                    actionaddcart.classList.add('hide');

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

  <div class="header">
      <div class="container head d-flex justify-content-end mt-3">
          <span>Đặt hàng online hoặc gọi cho chúng tôi (+84) 12341413</span>
          <div class="flag ml-3">
              <img src="images/vn-flag.png" alt="">
              <i class="fas fa-caret-down"></i>
              {{--  <div class="flag-hover">
                <a href="#"></a><div class="d-flex justify-content-bettwen">
                        <img src="images/uk-flag.jpg" alt="">
                        <span class="mr-3">English</span>
                    </div>
                </a>

            </div>  --}}
          </div>
          <div class="search ml-2">
              <input class="form-control" type="text" placeholder="Tìm kiếm">
              <i class="fas fa-search"></i>
          </div>
      </div>
      <div class="container head-2 d-flex justify-content-between ">
          <img src="images/logo3.png" alt="">
          <div class="d-flex flex-column mt-4 head-2-left ">
              <span class="text-uppercase">miễn phí giao hàng toàn quốc từ 100k</span>
              <div class="mt-2">
                  <a href="{{ url('cart') }}" class="mr-5"><i class="fas fa-cart-plus mr-1"></i>Giỏ hàng<div
                          class="cart pt-1">
                          <span>10</span>
                      </div></a>
                  <span><i class="far fa-heart mx-3"></i>Sản phẩm yêu thích</span>
                  <a href="{{ url('dangnhap') }}">Đăng nhập</a>
                  <span>hoặc</span>
                  <a href="{{ url('dangky') }}">Đăng ký</a>
              </div>
          </div>
      </div>
  </div>
  <nav class="nav-horizontal container-fluid">
      <div class="nav-horizontal-container container">
          <div class="nav-horizontal-content">
              <ul class="nav-ul-lv-1">
                  <li><a href="{{ url('trang-chu') }}">Trang chủ</a></li>
                  <li class="sanpham" style="position : unset">
                      <a href="{{ url('product') }}">Sản phẩm<i class="fas fa-caret-down"></i></a>
                      <div class="sp-hover">
                          <div class="row">
                              <div class="col text-left px-5">
                                  <div class="hover-item hover-item1 d-flex flex-column justify-content-start">
                                      <a href="">Áo</a>
                                      <a href="#">jacket</a>
                                      <a href="#">sơ mi</a>
                                      <a href="#">hello</a>
                                  </div>
                                  <div class="hover-item d-flex flex-column justify-content-start">
                                      <a href="">Quần</a>
                                      <a href="#">joger</a>
                                      <a href="#">jean</a>
                                      <a href="#">thể thao</a>
                                  </div>


                              </div>
                              <div class="col text-left px-5">
                                  <div class="hover-item hover-item1 d-flex flex-column justify-content-start">
                                      <a href="">Đầm</a>
                                      <a href="#">đầm 1</a>
                                      <a href="">đầm 2</a>
                                      <a href="">đầm 3</a>

                                  </div>
                                  <div class="hover-item d-flex flex-column justify-content-start">
                                      <a href="">Phụ kiện</a>
                                      <a href="">phụ kiện 1</a>
                                      <a href="">phụ kiện 2</a>
                                      <a href="">phụ kiện 3</a>

                                  </div>


                              </div>
                              <div class="col text-left px-5">
                                  <div class="hover-item hover-item1 d-flex flex-column justify-content-start">
                                      <a href="">Chân váy</a>
                                      <a href="">chân váu 1</a>
                                      <a href="">chân vay 2</a>

                                  </div>
                                  <div class="hover-item d-flex flex-column justify-content-start">
                                      <a href="">Công sở</a>
                                      <a href="">quần jeep</a>
                                      <a href="">sơ mi</a>

                                  </div>


                              </div>
                              <div class="col text-left px-5">
                                  <div class="hover-item hover-item1 d-flex flex-column justify-content-start">
                                      <a href="">hot</a>
                                      <a href="">xem nhiều</a>

                                  </div>
                                  <div class="hover-item d-flex flex-column justify-content-start">
                                      <a href="">mới</a>
                                      <a href="">mới 2019</a>

                                  </div>


                              </div>
                              <div class="col text-left px-5">
                                  <img src="https://kenh14cdn.com/2018/4/13/photo-4-1523613034062930366784.jpg" alt="">


                              </div>




                          </div>
                      </div>

                  </li>
                  <li><a href="#">Sale</a></li>
                  <li>
                      <a href="{{ url('bosuutap') }}">Bộ sưu tập<i class="fas fa-caret-down"></i></a>
                      <ul class="nav-ul-lv-2">
                          <li><a href="#">Bộ sưu tâp 1</a></li>
                          <li><a href="#">Bộ sưu tập 2</a></li>
                          <li><a href="#">Bộ sưu tập 3</a></li>
                      </ul>
                  </li>
                  <li class="lienhe-led"><a href="{{ url('gioithieu') }}">giới thiệu</a></li>
                  <li class="lienhe-led">
                      <a href="{{ url('lienhe') }}">Liên hệ<i class="fas fa-caret-down"></i></a>
                      <ul class="nav-ul-lv-2">
                          <li><a href="{{ url('lienhe') }}">Liên hệ</a></li>
                          <li><a href="{{ url('cauhoi') }}">Câu hỏi thường gặp</a></li>
                          <li><a href="{{ url('gioithieu') }}">Hệ thống cửa hàng</a></li>
                      </ul>

                  </li>
                  <li class="lienhe-led"><a href="{{ url('huongdan') }}">Hướng dẫn</a></li>
                  <li class="lienhe-led"><a href="{{ url('tintuc') }}">Tin tức<i class="fas fa-caret-down"></i>
                          <ul class="nav-ul-lv-2">
                              <li><a href="{{ url('tinkhuyenmai') }}">Tin khuyến mãi</a></li>
                              <li><a href="{{ url('tinthoitrang') }}">Tin Thời trang</a></li>
                              <li><a href="{{ url('tinsukien') }}">Tin sự kiện</a></li>
                          </ul>
                      </a></li>

              </ul>
              <div class="menu-mobile-button">
                  <i class="fas fa-bars"></i>
              </div>
              <div class="menu-mobile">
                  <a href="{{ url('dangnhap') }}"><i class="fas fa-user-friends"></i></a>
              </div>
              <div class="menu-mobile" onclick="search" id="search">
                  <a><i class="fas fa-search-plus"></i></a>
                  <form class="search2" action="search">
                      <input class="form-control" type="text" placeholder="tìm kiếm">
                      <i class="fas fa-search"></i>

                  </form>

              </div>
              <div class="menu-mobile">
                  <a href="{{ url('cart') }}"><i class="fas fa-shopping-cart"></i></a>
                </div>
          </div>
      </div>
  </nav>
  <script type="text/javascript" src="js/nav-horizontal.js"></script>

  <section class="menu-mobile">
      <div class="menu-mobile-bg"></div>
      <div class="menu-mobile-box">
          <div class="menu-mobile-info">

          </div>
          <div class="menu-mobile-content">
              <div class="menu-left">
                  <div class="menu-left-title">
                      <h3>Menu</h3>
                  </div>
                  <div class="menu-left-content">

                      <ul class="menu-left-ul-lv-1">
                          <li><a href="{{ url('trang-chu') }}">Trang chủ</a></li>
                          <li><a href="{{ url('gioithieu') }}">Giới thiệu</a></li>
                          <li><a href="{{ url('product') }}">Sản Phẩm</a></li>
                          <li><a href="{{ url('khuyenmai') }}">Khuyến mãi</a></li>
                          <li><a href="{{ url('lienhe') }}">Liên hệ</a></li>
                          <li><a href="{{ url('huongdan') }}">Hướng Dẫn</a></li>
                          <li><a href="{{ url('tintuc') }}">Tin Tức</a></li>

                      </ul>

                  </div> <!-- menu-left-content -->
              </div> <!-- menu-left -->
              <script type="text/javascript" src="js/menu-left-js.js"></script>
          </div>
      </div>
      <script type="text/javascript" src="js/menu-mobile.js"></script>
  </section>

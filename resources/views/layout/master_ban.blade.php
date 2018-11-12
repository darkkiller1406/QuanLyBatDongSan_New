<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Bán đất Thành phố Hồ Chí Minh</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('img/core-img/favicon.ico')}}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('css/style_ban.css')}}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <meta property="fb:app_id" content="353941732045822" />
    <meta property="fb:admins" content="100002872078058"/>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <link rel="stylesheet" href="{{asset('ckeditor/plugins/easyimage/styles/easyimage.css')}}">
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="south-load"></div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="southNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="index.html"><img src="{{asset('img/logo.png')}}" alt="" style="margin-left: 40px;margin-top: 20px;"><p>LIGHTZ REAL ESTATE</p></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="{{route('view_trangchu')}}" class="{{ (\Request::route()->getName() == 'view_trangchu') ? 'active' : '' }}">Trang chủ</a></li>
                                <li><a href="{{route('view_dsDat')}}" class="{{ (\Request::route()->getName() == 'view_dsDat') ? 'active' : '' }}">Đất bán</a>
                                    <ul class="dropdown">
                                        @foreach ($menuCongTy as $ct)
                                        <li><a href="{{asset('danhsachdat/'.$ct->Link)}}">{{$ct->TenCongTy}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{route('view_DSCongTy')}}" class="{{ (\Request::route()->getName() == 'view_DSCongTy') ? 'active' : '' }}">Thành viên</a>
                                </li>
                                <li><a href="{{route('view_dichvu')}}" class="{{ (\Request::route()->getName() == 'view_dichvu') ? 'active' : '' }}">Phí dịch vụ</a></li>
                                <li><a href="{{route('view_vechungtoi')}}" class="{{ (\Request::route()->getName() == 'view_vechungtoi') ? 'active' : '' }}">Về chúng tôi</a></li>
                                <li><a href="{{route('view_lienlac')}}" class="{{ (\Request::route()->getName() == 'view_lienlac') ? 'active' : '' }}">Liên hệ</a></li>
                                <?php if(Auth::check()) { ?>
                                <li><a>XIN CHÀO {{Auth::user()->Ten}}</a>
                                    <ul class="dropdown">
                                        <li><a href="{{route('index')}}" target="_blank">QUẢN LÝ</a></li>
                                        <li><a href="{{route('giahan')}}">GIA HẠN/NÂNG CẤP</a></li>
                                        <li><a href="{{route('dangxuat')}}">ĐĂNG XUẤT</a></li>
                                    </ul>
                                </li>
                                <?php }else { ?>
                                <li><a data-toggle="modal" data-target="#myModal">ĐĂNG NHẬP</a></li>
                                <li><a href="{{route('DangKy')}}">ĐĂNG KÝ</a></li>
                                <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>

        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                    <h4 class="modal-title" style="font-weight: bold;">ĐĂNG NHẬP</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <label style="font-size: 16px;">Địa chỉ truy cập</label>
                    <input type="text" class="form-control" name="link" id="link" placeholder="Nhập địa chỉ truy cập">
                    <div id="ktlink" class="sub" style="color: red"></div>
                </div>
                <div class="form-group">
                    <label style="font-size: 16px;">ID</label>
                    <input type="text" class="form-control" name="id" id="id" placeholder="Nhập ID">
                    <div id="ktid" class="sub" style="color: red"></div>
                </div>
                <div class="form-group">
                    <label style="font-size: 16px;">Password</label>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Nhập Password">
                    <div id="ktpass" class="sub" style="color: red"></div>
                    <div id="ktdn" style="font-size:15px;color: red"></div>
                </div>
                <div class="row">
                    <diV class="col-md-4"></diV>
                    <button type="button" class="btn south-btn" style="font-size: 13px;" onclick="dangnhap()">Đăng nhập</button>
                </div>
               </div>
            </div>
          </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### BODY ##### -->
    @yield('content')
    <!-- ##### BODY End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area section-padding-100-0 bg-img gradient-background-overlay" style="background-image: url({{asset('img/bg-shawdow.jpg)')}};">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-xl-6">
                        <div class="footer-widget-area mb-100">
                            <!-- Widget Title -->
                            <div class="widget-title">
                                <h6>VỀ CHÚNG TÔI</h6>
                            </div>
                            <p>Với hơn 15 năm kinh nghiệm làm nghề ký gửi nhà đất, Công ty cổ phần bất động sản LightZ RealEstate đã có hơn 2.375 khách hàng đã và đang sữ dụng dịch vụ ký gửi của chúng tôi và tất cả khách hàng điều hài lòng về phong cách phục vụ cũng như sự hiệu quả của việc ký gửi mang lại.
                            </p>
                            <p>Nhằm cung ứng một giải pháp hiệu quả cho nhu cầu này, LightZ Real Estate đã phát triển dịch vụ KÝ GỬI NHÀ ĐẤT để giúp người bán nhà, cho thuê bất động sản một cách NHANH CHÓNG và HIỆU QUẢ NHẤT.</p>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-xl-6">
                        <div class="footer-widget-area mb-100">
                            <!-- Widget Title -->
                            <div class="widget-title">
                                <h6>Giờ làm việc</h6>
                            </div>
                            <!-- Office Hours -->
                            <div class="weekly-office-hours">
                                <ul>
                                    <li class="d-flex align-items-center justify-content-between"><span>Thứ hai - Thứ sáu</span> <span>08 AM - 19 PM</span></li>
                                    <li class="d-flex align-items-center justify-content-between"><span>Thứ bảy</span> <span>08 AM - 14 PM</span></li>
                                    <li class="d-flex align-items-center justify-content-between"><span>Chủ nhật</span> <span>Đóng cửa</span></li>
                                </ul>
                            </div>
                            <!-- Address -->
                            <div class="address">
                                <h6><img src="{{asset('img/icons/phone-call.png')}}" alt="">0569 885 811</h6>
                                <h6><img src="{{asset('img/icons/envelope.png')}}" alt=""> lightz.realestate@gmail.com</h6>
                                <h6><img src="{{asset('img/icons/location.png')}}" alt="" style="margin-top: -5px;"> 169 Tô Hiến Thành, Phường 13, Quận 10, TP.HCM</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/classy-nav.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('js/active.js')}}"></script>
    
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function dangnhap()
    {
        var id = $('#id').val();
        var pass = $('#pass').val();
        var link = $('#link').val();
        var check = 0;
        if(id == '')
            {
              document.getElementById("id").style.marginBottom = "0";
              $('#ktid').html('*Vui lòng nhập tên đăng nhập');
              check++;
              return false;
            }
            else
            {
                document.getElementById("id").style.marginBottom = "20px";
                $('#ktid').html('');
            }
        if(link == '')
            {
              document.getElementById("link").style.marginBottom = "0";
              $('#ktlink').html('*Vui lòng nhập địa chỉ truy cập');
              check++;
              return false;
            }
            else
            {
                document.getElementById("link").style.marginBottom = "20px";
                $('#ktlink').html('');
            }
        if(pass == '')
            {
              document.getElementById("pass").style.marginBottom = "0";
              $('#ktpass').html('*Vui lòng nhập mật khẩu');
              check++;
            }
            else
            {
                document.getElementById("pass").style.marginBottom = "20px";
              $('#ktpass').html('');
            }
        if(check == 0)
        {
            $.ajax({
                type:'post',
                url:'{{url("dangnhap")}}',
                data: {
                    id: id,
                    pass: pass,
                    link: link
                },
                async: true,
                success:function(html){
                if (html == 1)
                {
                    document.getElementById("ktdn").style.marginTop = "-20px";
                    $('#ktdn').html('Đăng nhập không thành công');
                }
                else
                {
                    document.getElementById("ktdn").style.marginTop = "0";
                    $('#myModal').modal('toggle');
                    window.location='{{url("trangchu")}}';

                }
               }
             });
        }
    }

    </script>
    <!-- ##### Scip single page ##### -->
    @yield('script')
    <!-- ##### End scip ##### -->

</body>

</html>
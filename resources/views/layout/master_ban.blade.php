<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bán đất Thành phố Hồ Chí Minh</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}" />
	<link rel="stylesheet" href="{{asset('css/style_ban.css')}}"/>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
	<script src="{{asset('js/script.js')}}"></script>


	<!-- Owl stylesheet -->
	<link rel="stylesheet" href="{{asset('owl-carousel/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('owl-carousel/owl.theme.css')}}">
	<script src="{{asset('owl-carousel/owl.carousel.js')}}"></script>
	<!-- Owl stylesheet -->

	
	<!-- slitslider -->
	<link rel="stylesheet" type="text/css" href="{{asset('slitslider/css/style.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('slitslider/css/custom.css')}}" />
	<script type="text/javascript" src="{{asset('slitslider/js/modernizr.custom.79639.js')}}"></script>
	<script type="text/javascript" src="{{asset('slitslider/js/jquery.ba-cond.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('slitslider/js/jquery.slitslider.js')}}"></script>
	<!-- slitslider -->
	<title>@yield('title')</title>
	@yield('css')
</head>

<body>


	<!-- Header Starts -->
	<div class="container-fluid Header">
		<div class="container Header-content">

			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="logo1"><img src="{{asset('img/logo.png')}}" alt=""><span class="logo2"><a href="{{route('view_trangchu')}}">LightZ</a></span><br>
							<span class="logo3"><a>Real Estate</a></span></div> 

					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="{{route('view_trangchu')}}" class="{{ (\Request::route()->getName() == 'view_trangchu') ? 'active' : '' }}">TRANG CHỦ</a></li>
							<li><a href="{{route('view_dsDat')}}" class="{{ (\Request::route()->getName() == 'view_dsDat') ? 'active' : '' }}">ĐẤT BÁN</a>
							
							</li>
							<li><a href="{{route('view_dsPhong')}}" class="{{ (\Request::route()->getName() == 'view_dsPhong') ? 'active' : '' }}">PHÒNG CHO THUÊ</a>
							<ul class="sub-menu">
								<li style="margin-top: 10px;padding-left: 10px;"><a href="{{route('view_dsPhong_map')}}">XEM TRÊN MAP</li></a>
							</ul>
							</li>
							<li><a href="{{route('view_vechungtoi')}}" class="{{ (\Request::route()->getName() == 'view_vechungtoi') ? 'active' : '' }}">VỀ CHÚNG TÔI</a>
							</li>
							<li><a href="{{route('view_lienlac')}}" class="{{ (\Request::route()->getName() == 'view_lienlac') ? 'active' : '' }}">LIÊN HỆ</a>
							</li>
							</li>
							<?php if(Auth::check()) { ?>
									<li><a>XIN CHÀO {{Auth::user()->Ten}}</a>
										<ul class="sub-menu">
											<li style="margin-top: 10px;padding-left: 10px;">TIỀN: {{number_format(Auth::user()->Tien)}} VNĐ</li>
											<hr>
											<li><a href="{{route('view_trangcanhan')}}" style="padding-bottom: 20px;padding-left: 35px;">TÀI KHOẢN</a></li>
											<hr>
											<li><a href="{{route('view_dangtin')}}" class="{{ (\Request::route()->getName() == 'view_dangtin') ? 'active' : '' }}" style="padding-left: 40px;">ĐĂNG TIN</a>
												<hr>
											<li><a href="./dangxuat" style="padding-top: 20px;padding-left: 35px">ĐĂNG XUẤT</a></li>
										</li>
									</ul>
									</li>
							<?php }else	{ ?>
							<li><a data-toggle="modal" data-target="#myModal">ĐĂNG NHẬP</a></li>
							<?php } ?>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>

		</div>

	</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="text-align: center;font-weight: bold;">ĐĂNG NHẬP</h4>
      </div>
      <div class="modal-body">
				<div class="form-group">
					<label style="font-size: 16px;">ID</label>
					<input type="text" class="form-control col-sm-3" name="id" id="id" placeholder="Nhập ID">
					<div id="ktid" class="sub"></div>
				</div>
				<div class="form-group">
					<label style="font-size: 16px;">Password</label>
					<input type="password" class="form-control" name="pass" id="pass" placeholder="Nhập Password">
					<div id="ktpass" class="sub"></div>
				</div>
				<button type="button" class="btn btn-detail" style="font-size: 18px;" onclick="dangnhap()">Đăng nhập</button>
				<div class="checkbox center">
					<label>
						<a href="{{route('DangKy')}}" style="font-size: 16px;color: #DAA520;margin-left: -20px;text-decoration: underline;">Đăng ký ngay</a>
					</label>
					<div id="ktdn" style="margin-top: 10px;font-size:20px;color: red"></div>
				</div>	
      </div>
    </div>

  </div>
</div>
	@yield('content')
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->


	@yield('script')
	<!-- footer -->
	<div class="footer">

		<div class="container">



			<div class="row">

				<div class="col-lg-3 col-sm-3">
				</div>


				<div class="col-lg-6 col-sm-6" style="text-align: center;padding-top: 10px;">	
					<span class="glyphicon glyphicon-map-marker"></span> 163 Tô Hiến Thành, Quận 10, Hồ Chí Minh </br>
					<span class="glyphicon glyphicon-envelope"></span> minh.1406.nt@lightestate.com </br>
					<span class="glyphicon glyphicon-earphone"></span> 01869885811 <br></br>
				</div>

			</div>


		</div>
	</div>
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
        if(pass == '')
            {
              document.getElementById("pass").style.marginBottom = "0";
              $('#ktpass').html('*Vui lòng nhập mật khẩu');
              check++;
            }
            else
            {
            	document.getElementById("pass").style.marginBottom = "20px;";
              $('#ktpass').html('');
            }
        if(check == 0)
        {
        	$.ajax({
                type:'post',
                url:'{{url("dangnhap")}}',
                data: {
                	id: id,
                	pass: pass
                },
                async: true,
                success:function(html){
               	if (html == 1)
               	{
                 $('#ktdn').html('Đăng nhập không thành công');
               	}
               	else
               	{
               		$('#myModal').modal('toggle');
               		window.location='{{url("trangchu")}}';

               	}
               }
             });
        }
	}

</script>




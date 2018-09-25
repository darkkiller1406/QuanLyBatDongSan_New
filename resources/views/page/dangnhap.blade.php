<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng nhập</title>

	<!-- Bootstrap core CSS -->
	<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
	<!--external css-->
	<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" />

	<!-- Custom styles for this template -->
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link href="{{asset('css/style-responsive.css')}}" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

      <div id="login-page">
      	<div class="container">

      		<form class="form-login" action="../page/dangnhap" method="post">
      			<h2 class="form-login-heading">Đăng nhập</h2>
      			<div class="login-wrap">
      					<input type="hidden" name="_token" value="{{ csrf_token() }}">
      					<input type="text" name="id" class="form-control" placeholder="User ID" autofocus>
      					<br>
      					<input type="password" name="pass" class="form-control" placeholder="Password">
      					<label class="checkbox">
      					</label>
      					<button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i>ĐĂNG NHẬP NGAY</button>
      				@if(count($errors) > 0)
      				<div class="alert alert-danger" style="font-size: 0.9em;text-align: center;margin-top: 20px;">
      					@foreach($errors->all() as $err)
      					{{ $err }}<br>
      					@endforeach
      				</div>
      				@endif

      				@if(session('thongbao'))
      				<div class="alert alert-danger" style="font-size: 0.9em;text-align: center;margin-top: 20px;">
      					{{ session('thongbao') }}
      				</div>
      				@endif
      			</div>

      			<!-- Modal -->
      			<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
      				<div class="modal-dialog">
      					<div class="modal-content">
      						<div class="modal-header">
      							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      							<h4 class="modal-title">Forgot Password ?</h4>
      						</div>
      						<div class="modal-body">
      							<p>Enter your e-mail address below to reset your password.</p>
      							<input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

      						</div>
      						<div class="modal-footer">
      							<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
      							<button class="btn btn-theme" type="button">Submit</button>
      						</div>
      					</div>
      				</div>
      			</div>
      			<!-- modal -->

      		</form>	  	

      	</div>
      </div>

      <!-- js placed at the end of the document so the pages load faster -->
      <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script> 
      <script src="{{asset('js/bootstrap.min.js')}}"></script>

      <!--BACKSTRETCH-->
      <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
      <script type="text/javascript" src="{{asset('js/jquery.backstretch.min.js')}}"></script>
      <script>
      	$.backstretch("{{asset('img/login_bg.jpg')}}", {speed: 500});
      </script>


  </body>
  </html>

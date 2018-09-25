@section('title','Đăng nhập')
@extends('layout.master_ban')
@section('content')
<!-- banner -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">

		<div class="item active">
			<img src="{{asset('img/banner-2.jpg')}}" alt="Los Angeles" style="width:100%;">
			<div class="carousel-caption">
			</div>
		</div>

		<div class="item">
			<img src="{{asset('img/banner-3.jpg')}}" alt="Chicago" style="width:100%;">
			<div class="carousel-caption">
			</div>
		</div>
	</div>
</div>
<div class="inside-banner">
  <div class="container"> 
    <h2>Đăng nhập</h2>
</div>
</div>
<div class="container">
	<div class="spacer">
		<div class="col-sm-3"></div>
		<div class="col-sm-6 login">
			<form class="login" role="form">
				<div class="form-group">
					<label for="email" style="font-size: 16px;" class="col-sm-3">Email</label>
					<input type="email" class="form-control col-sm-3" id="email" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="email" style="font-size: 16px;" class="col-sm-3">Password</label>
					<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
				</div>
				<button type="submit" class="btn btn-success" style="font-size: 18px;">Đăng nhập</button>
				<div class="checkbox center">
					<label>
						<a style="font-size: 16px;">Đăng ký ngay</a>
					</label>
				</div>
			</form>          
		</div>
	</div>
</div>
@endsection

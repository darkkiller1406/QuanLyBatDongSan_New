@section('title','Đăng ký')
@extends('layout.master_ban')
@section('content')
<section class="breadcumb-area bg-img" style="background-image: url({{asset('img/bg-img/hero1.jpg')}});">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-12">
				<div class="breadcumb-content">

				</div>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<div class="spacer">
		<div class="row register">
			<section class="south-contact-area section-padding-100">
				@if(isset($canhbao))
				<div class="alert alert-warning"
				style="font-size: 0.9em;text-align: center;margin-top: 20px;">
				{{$canhbao}}
				</div>
				@endif
				<div class="container">
					<div class="row">
						<h5>Mail kích hoạt đã được gửi vào email của bạn. Vui lòng check email để kích hoạt tài khoản. Nếu bạn chưa nhận được mail, click vào <a href="{{asset('guimail')}}">ĐÂY</a> để gửi lại mail.</h5>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">

</script>
@endsection
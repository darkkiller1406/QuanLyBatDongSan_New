@section('title','Đăng ký')
@extends('layout.master_ban')
@section('content')
<section class="breadcumb-area bg-img" style="background-image: url(../img/bg-img/hero1.jpg);">
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
				<div class="container">
					<div class="row">
						<h5>Chúc mừng bạn đã đăng ký thành công. Bạn đã trở thành một trong những thành viên của sàn giao dịch. Click vào <a href="{{asset('page/dangnhap/'.$congty[0]->Link)}}">ĐÂY</a> để bắt đầu đăng nhập vào hệ thống. Hệ thống sẽ tự chuyển về trang chủ sau 10 giây.</h5>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
function Redirect(){
  window.location.href = "{{route('index')}}";
}
setTimeout(Redirect(), 10000);
</script>
@endsection
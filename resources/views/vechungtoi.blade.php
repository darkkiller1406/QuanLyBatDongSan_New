@section('title','Về chúng tôi')
@extends('layout.master_ban')
@section('content')
<div class="inside-banner">
  <div class="container"> 
    <h2>Về Chúng Tôi</h2>
</div>
</div>
<div class="container">
	<div class="spacer">
		<div class="row">
			<div class="col-lg-8  col-lg-offset-2">
				<img src="{{asset('img/about.jpg')}}" class="img-responsive thumbnail"  alt="realestate">
				<h3>Ký Gửi Nhà Đất</h3>
				<p>Với hơn 15 năm kinh nghiệm làm nghề ký gửi nhà đất, Công ty cổ phần bất động sản LightZ Real Estate đã có hơn 2.375 khách hàng đã và đang sữ dụng dịch vụ ký gửi của chúng tôi và tất cả khách hàng điều hài lòng về phong cách phục vụ cũng như sự hiệu quả của việc ký gửi mang lại.<br>
				Hiện nay, Công ty chúng tôi có rất nhiều Khách hàng có nhu cầu tìm Mua & Bán : Đất nền, Đất thổ cư, Đất nền dự án, Đất xây dựng nhà xưởng, Nhà kho, Nhà xưởng, Nhà cho thuê, Văn phòng cho thuê, Mặt bằng cho thuê, Nhà cấp 4, Nhà trọ, Nhà nghỉ, Khách sạn, Resort…tại các quận trong TP. Hồ Chí Minh cũng như các khu vực lân cận. Ngoài ra LightZ Real Estate còn tư vấn đầu tư, hỗ trợ pháp lý, đo vẽ, thiết kế, xây dựng, hợp thức hóa nhà đất cho khách hàng.</p>
				<h3>Ký gửi nhà đất Uy Tính-Hiệu Quả!</h3>
				<p>Light Estate là công ty chuyên nghiệp trong lĩnh vực môi giới bất động sản, chúng tôi làm việc trên tinh thần hợp tác lâu dài và minh bạch giúp Người Bán nhanh chóng bán được bất động sản theo giá mình mong muốn thỏa thuận trực tiếp với Người Mua trên phạm vi Toàn Cầu mà không bị môi giới tự do đẩy giá quá cao dẫn đến khó bán, thậm chí không thể bán được.<br>
				Nhằm cung ứng một giải pháp hiệu quả cho nhu cầu này, LightZ Real Estate đã phát triển dịch vụ KÝ GỬI NHÀ ĐẤT để giúp người bán nhà, cho thuê bất động sản một cách NHANH CHÓNG và HIỆU QUẢ NHẤT.</p>
				<h3>Light Estate Cam Kết khi Ký Gửi</h3>
				<p>
				Không kê giá bán - Mua bán Chính Chủ - Pháp lý hoàn thiện.</p>
			</div>
		</div>
	</div>
	<div class="spacer">
		<div class="row">
			<div class="col-lg-8  col-lg-offset-2">
				<h3>Bảng Giá Đăng Tin</h3>
				<table class="table-gia table-responsive">
				<tr>
					<th>Loại tin</th>
					<th>Thông tin</th>
					<th>Giá</th> 
				</tr>
				@foreach($loaitin as $l)
				<tr>
					<td>{{$l->LoaiTin}}</td>
					<td>{{$l->ThongTin}}</td>
					<td>{{number_format($l->Gia)}} VNĐ</td>
				</tr>
				@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
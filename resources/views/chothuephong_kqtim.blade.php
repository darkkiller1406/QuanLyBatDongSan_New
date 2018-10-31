@section('title','Danh sách đất')
@extends('layout.master_ban')
@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-12">
				<div class="breadcumb-content">
					<h3 class="breadcumb-title">DANH SÁCH PHÒNG CHO THUÊ</h3>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Advance Search Area Start ##### -->
@include('layout.search_sub')
<!-- ##### Advance Search Area End ##### -->

<!-- ##### Listing Content Wrapper Area Start ##### -->
<section class="listings-content-wrapper section-padding-100">
	<div class="container">
		<div class="row">
			@foreach ($kq as $p)
			<?php if($p->TrangThai == 1 && $p->LoaiTin == 1) { ?>
				<!-- Single Featured Property -->
				<div class="col-12 col-md-6 col-xl-4">
					<div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
						<!-- Property Thumbnail -->
						<div class="property-thumb">
							<img src="<?php echo asset('img/ThuePhong/'.srcImg($p->HinhAnh)) ?>" alt="" style="height: 250px; width: 100%">
							<div class="tag">
								<span>VIP 1</span>
							</div>
							<div class="list-price">
								<p style="font-size: 15px;">{{$p->Gia}} Triệu/Tháng</p>
							</div>
						</div>
						<!-- Property Content -->
						<div class="property-content">
							<h6 style="font-size: 14px; text-align: center;"><a href="chitietphong/{{$p->idphong}}">{{$p->TieuDe}}</a></h6>
							<p class="location"><img src="img/icons/location.png" alt="">
								{{$p->TenQuan}}, {{$p->TenThanhPho}}
							</p>
							<p><b>Diện tích:</b> {{$p->DienTich}} m2&nbsp;&nbsp;&nbsp;
								<b>Ngày đăng:</b><?php $date = date_create($p->created_at); ?> {{$date->format('d/m/Y')}}
							</p>
						</div>
					</div>
				</div>
			<?php } ?>
			@endforeach
			@foreach ($kq as $p)
			<?php if($p->TrangThai == 1 && $p->LoaiTin == 2) { ?>
				<!-- Single Featured Property -->
				<div class="col-12 col-md-6 col-xl-4">
					<div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
						<!-- Property Thumbnail -->
						<div class="property-thumb">
							<?php $array =  (explode(';', $p->HinhAnh)); $hinh = $array[0]; ?>
							<img src="<?php echo asset('img/ThuePhong/'.$hinh) ?>" alt="" style="height: 250px; width: 100%">
							<div class="tag">
								<span>VIP 2</span>
							</div>
							<div class="list-price">
								<p style="font-size: 15px;">{{$p->Gia}} Triệu/Tháng</p>
							</div>
						</div>
						<!-- Property Content -->
						<div class="property-content">
							<h6 style="font-size: 14px; text-align: center;"><a href="chitietphong/{{$p->idphong}}">{{$p->TieuDe}}</a></h6>
							<p class="location"><img src="img/icons/location.png" alt="">
								{{$p->TenQuan}}, {{$p->TenThanhPho}}
							</p>
							<p><b>Diện tích:</b> {{$p->DienTich}} m2&nbsp;&nbsp;&nbsp;
								<b>Ngày đăng:</b><?php $date = date_create($p->created_at); ?> {{$date->format('d/m/Y')}}
							</p>
						</div>
					</div>
				</div>
			<?php } ?>
			@endforeach
			@foreach ($kq as $p)
			<?php if($p->TrangThai == 1 && $p->LoaiTin == 3) { ?>
				<!-- Single Featured Property -->
				<div class="col-12 col-md-6 col-xl-4">
					<div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
						<!-- Property Thumbnail -->
						<div class="property-thumb">
							<?php $array =  (explode(';', $p->HinhAnh)); $hinh = $array[0]; ?>
							<img src="<?php echo asset('img/ThuePhong/'.$hinh) ?>" alt="" style="height: 250px; width: 100%">
							<div class="tag">
								<span>VIP 3</span>
							</div>
							<div class="list-price">
								<p style="font-size: 15px;">{{$p->Gia}} Triệu/Tháng</p>
							</div>
						</div>
						<!-- Property Content -->
						<div class="property-content">
							<h6 style="font-size: 14px; text-align: center;"><a href="chitietphong/{{$p->idphong}}">{{$p->TieuDe}}</a></h6>
							<p class="location"><img src="img/icons/location.png" alt="">
								{{$p->TenQuan}}, {{$p->TenThanhPho}}
							</p>
							<p><b>Diện tích:</b> {{$p->DienTich}} m2&nbsp;&nbsp;&nbsp;
								<b>Ngày đăng:</b><?php $date = date_create($p->created_at); ?> {{$date->format('d/m/Y')}}
							</p>
						</div>
					</div>
				</div>
			<?php } ?>
			@endforeach
		</div>

<!-- 		<div class="row">
			<div class="col-12">
				<div class="south-pagination d-flex justify-content-end">
					<nav aria-label="Page navigation">
						<ul class="pagination">
							<li class="page-item"><a class="page-link active" href="#">01</a></li>
							<li class="page-item"><a class="page-link" href="#">02</a></li>
							<li class="page-item"><a class="page-link" href="#">03</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div> -->
	</div>
</section>
<!-- ##### Listing Content Wrapper Area End ##### -->
<?php
function _substr($str, $length, $minword = 3)
{
	$sub = '';
	$len = 0;
	foreach (explode(' ', $str) as $word)
	{
		$part = (($sub != '') ? ' ' : '') . $word;
		$sub .= $part;
		$len += strlen($part);
		if (strlen($word) > $minword && strlen($sub) >= $length)
		{
			break;
		}
	}
	return $sub . (($len < strlen($str)) ? '...' : '');
}
function srcImg($array) {
	if(!empty($array)){
		$hinh =  (explode(';', $array)); 
		$hinh = $hinh[0];
		return $hinh;
	} else {
		return 'default.jpg';
	}
}
?>
@endsection
@section('script')
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$( document ).ready(function() {
		$('#quan').on('change',function(){
			if(quan){
				$.ajax({
					type:'get',
					url:'{{ url("timphuong") }}',
					data:{quan:$(this).val()},
					async: true,
					success:function(html){
						$('#select').html(html);
					}
				}); 
			}else{
				$('#phuong').html('<option value="0">Chọn quận/huyện</option>');
			}
		});
	});
</script>
@endsection
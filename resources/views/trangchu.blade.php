@section('title','Trang chủ')
@extends('layout.master_ban')
@section('content')
<div class="">


	<div id="slider" class="sl-slider-wrapper">

		<div class="sl-slider">

			<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
				<div class="sl-slide-inner">
					<div class="bg-img bg-img-1"></div>
				</div>
			</div>

			<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
				<div class="sl-slide-inner">
					<div class="bg-img bg-img-2"></div>
				</div>
			</div>

			<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
				<div class="sl-slide-inner">
					<div class="bg-img bg-img-3"></div>
				</div>
			</div>

		</div><!-- /sl-slider -->



		<nav id="nav-dots" class="nav-dots">
			<span class="nav-dot-current"></span>
			<span></span>
			<span></span>
		</nav>

	</div><!-- /slider-wrapper -->
</div>



<div class="banner-search">

</div>
<!-- banner -->
<div class="container">
	<div class="properties-listing spacer"><a href="{{route('view_dsDat')}}" class="pull-right viewall">View All Listing</a>
		<h3>ĐẤT BÁN</h3>
		<div id="owl-example" class="owl-carousel">
			@foreach ($dat as $d)
			<div class="properties">
				<?php $array =  (explode(';', $d->HinhAnh)); $hinh = $array[0]; ?>
				<div class="image-holder"><img src="<?php echo asset('img/'.$hinh) ?>" class="img-responsive" alt="properties"/>
					<?php if ($d->TrangThai == 2) {?><div class="overlay-sold"><div class="text">Đã bán</div></div><?php } ?>
					<?php if ($d->TrangThai == 1) {?><div class="overlay-order"><div class="text">Đang giao dịch</div></div><?php }?>
					<?php if($d->TrangThai != 1 && $d->TrangThai!=2) { ?>
						<div class="overlay-price"><p class="price">Giá: {{number_format(($d->DienTich)*($d->DonGia))}} VNĐ</p>
							<div class="listing-detail">
								Diện tích: {{$d->DienTich}} m2 <br>
								Hướng: {{$d->Huong}} <br>
								Địa chỉ: {{$d->quan->TenQuan}}
							</div>
						</div>
					<?php } ?>
				</div>
				
				<a class="btn btn-detail" href="chitiet/{{$d->id}}">XEM CHI TIẾT</a>
			</div>
			@endforeach
		</div>
	</div>
	<div class="properties-listing spacer" style=";height: 50%">
		<h3>TIN NỔI BẬT</h3>
		<div id="myCarousel-a" class="carousel slide">
			<ol class="carousel-indicators">
				<?php $i = 0; ?>
				@foreach ($phong as $p)
				<?php if($p->LoaiTin == 1 && $p->TrangThai == 1) { ?>
				<li data-target="#myCarousel-a" data-slide-to="{{$i++}}" class="active"></li>
				<?php } ?>
				@endforeach
			</ol>
			<!-- Carousel items -->
			<div class="carousel-inner">
				<?php $a = 0; ?>
					@foreach ($phong as $p)
					<?php if($p->LoaiTin == 1 && $p->TrangThai == 1) { ?>
					<div class="item <?php if ($a==0) { echo 'active' ;} ?>">
						<div class="col-lg-12 col-sm-12" style="padding-bottom: 15px">
								<div class="properties" style="text-align: left;">
									<div class="col-lg-2 col-sm-2"><?php $array_thue =  (explode(';', $p->HinhAnh)); $hinh_thue = $array_thue[0]; ?>
									<img src="<?php echo asset('img/ThuePhong/'.$hinh_thue) ?>" class="img-responsive" alt="properties"/>
								</div>
								<div class="col-lg-10 col-sm-10">
									<p class="price-rent"><a  href="chitietphong/{{$p->id}}" class="vip-2">{{$p->TieuDe}}</a></p>
									<div class="listing-detail">
										<div class="row">
											<div class="col-md-3">
												<b>Diện tích:</b> {{$p->DienTich}} m2
											</div>
											<div class="col-md-5">
												<b>Khu vực:</b>
												@foreach ($quan as $q)
												<?php if ($q->id == $p->phuong->ThuocQuan){
													echo $q->TenQuan.', ';
													$tam = $q->ThuocThanhPho;
												} ?>
												@endforeach
												@foreach ($thanhpho as $tp)
												<?php
												if($tp->id == $tam){
													echo $tp->TenThanhPho;
												}
												?>
												@endforeach
											</div>
											<div class="col-md-4">
												<?php $date = $p->created_at; ?>
												<b>Ngày đăng</b>: {{$date->format('d/m/Y')}}
											</div>
											<div class="col-md-12"><p class="price-red" style="color: #ccac00">Giá: {{$p->Gia}} Triệu/Tháng</p></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php $a++;} ?>
					@endforeach
				</div>
			</div>
		</div>
	<div class="spacer">
		<div class="row">
			<div class="col-lg-6 col-sm-9 recent-view">
				<h3>VỀ CHÚNG TÔI</h3>
				<p>Với hơn 15 năm kinh nghiệm làm nghề ký gửi nhà đất, Công ty cổ phần bất động sản LightZ RealEstate đã có hơn 2.375 khách hàng đã và đang sữ dụng dịch vụ ký gửi của chúng tôi và tất cả khách hàng điều hài lòng về phong cách phục vụ cũng như sự hiệu quả của việc ký gửi mang lại.<br><a href="about.php">Xem thêm</a></p>

			</div>
			<div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
				<h3>Đề xuất</h3>
				<div id="myCarousel" class="carousel slide">
					<ol class="carousel-indicators">
						<?php $i = 0; ?>
						@foreach ($dat as $d)
						<li data-target="#myCarousel" data-slide-to="{{$i++}}" class="active"></li>
						@endforeach
						</ol>
						<!-- Carousel items -->
						<div class="carousel-inner">
							<?php $a = 0; ?>
							@foreach ($dat as $d)
							<div class="item <?php if ($a==0) { echo 'active' ;} ?>">
								<div class="row">
									<div class="col-lg-4"><img src="<?php echo asset('img/'.$hinh) ?>" class="img-responsive"/></div>
									<div class="col-lg-8">
										<h5><a href="property-detail.php">Đất {{$d->quan->TenQuan}}</a></h5>
										<p class="price">{{number_format(($d->DienTich)*($d->DonGia))}} VNĐ</p>
										<a href="property-detail.php" class="more">Xem chi tiêt</a> 
									</div>
								</div>
							</div>
							<?php $a++; ?>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection
@section('script')
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$(document).ready(function(){
		$('#tp').on('change',function(){
			if(tp){
				$.ajax({
                type:'get',
                url:'{{ url("timquan") }}',
                data:{tp:$(this).val()},
                async: true,
                success:function(html){
                    $('#quan').html(html);
                }
            }); 
			}else{
				$('#quan').html('<option value="0">Chọn thành phố</option>');
			}
		});
	});
</script>
@endsection
@section('title','Chi tiết')
@extends('layout.master_ban')
@section('content')
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
    <h2>Danh sách các tin đăng</h2>
  </div>
</div>
<div class="container">
	<div class="properties-listing spacer">

		<div class="row">
			<?php
			 $i=0; ?>
			@foreach ($kq as $d) <?php if($d->TrangThai == 1) {$i++;} ?> @endforeach
			<div class="col-lg-9 col-sm-8">
				<div class="sortby clearfix">
					<div class="pull-left result">Hiển thị: <?php echo $i; ?> </div>
				</div>
				<div class="row"">
					<!-- properties -->
					<?php $a=0; ?>
					@foreach ($kq as $p)
					<?php if($p->TrangThai == 1 && $p->LoaiTin == 1) { ?>
					<div class="<?php if($a==0){echo 'col-lg-12 col-sm-12 khung1';$a++;} else { echo 'col-lg-12 col-sm-12 khung-1'; } ?>" style="padding-top: 25px;padding-bottom: 0px">
						<div class="properties" style="text-align: left;">
							<div class="col-lg-4"><?php $array =  (explode(';', $p->HinhAnh)); $hinh = $array[0]; ?>
							<img src="<?php echo asset('img/ThuePhong/'.$hinh) ?>" class="img-responsive" alt="properties"/>
							</div>
							<div class="col-lg-8">
								<p class="price-rent"><a  href="chitietphong/{{$p->id}}" class="vip1">{{$p->TieuDe}}</a></p>
								<div class="listing-detail">
									<div class="row">
										<div class="col-md-12" style="padding-bottom: 10px;">
											{{$p->MoTa}}
										</div>
										<div class="col-md-3">
											<b>Diện tích:</b> {{$p->DienTich}} m2
										</div>
										<div class="col-md-5">
											<b>Khu vực:</b>
											{{$p->TenQuan}}, {{$p->TenThanhPho}}
										</div>
										<div class="col-md-4">
											<?php $date = date_create( $p->NgayBatDau); ?>
											<b>Ngày đăng</b>: {{$date->format('d/m/Y')}}
										</div>
										<div class="col-md-12"><p class="price-red">Giá: {{$p->Gia}} Triệu/Tháng</p></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				@endforeach
				@foreach ($kq as $p)
					<?php if($p->TrangThai == 1 && $p->LoaiTin == 2) { ?>
					<div class="<?php if($a==0){echo 'col-lg-12 col-sm-12 khung2';$a++;} else { echo 'col-lg-12 col-sm-12 khung-2'; } ?>" style="padding-top: 25px;padding-bottom: 0px">
						<div class="properties" style="text-align: left;">
							<div class="col-lg-4"><?php $array =  (explode(';', $p->HinhAnh)); $hinh = $array[0]; ?>
							<img src="<?php echo asset('img/ThuePhong/'.$hinh) ?>" class="img-responsive" alt="properties"/>
							</div>
							<div class="col-lg-8">
								<p class="price-rent"><a  href="chitietphong/{{$p->id}}" class="vip2">{{$p->TieuDe}}</a></p>
								<div class="listing-detail">
									<div class="row">
										<div class="col-md-12" style="padding-bottom: 10px;">
											{{$p->MoTa}}
										</div>
										<div class="col-md-3">
											<b>Diện tích:</b> {{$p->DienTich}} m2
										</div>
										<div class="col-md-5">
											<b>Khu vực:</b>
											{{$p->TenQuan}}, {{$p->TenThanhPho}}
										</div>
										<div class="col-md-4">
											<?php $date = date_create( $p->NgayBatDau); ?>
											<b>Ngày đăng</b>: {{$date->format('d/m/Y')}}
										</div>
										<div class="col-md-12"><p class="price-red">Giá: {{$p->Gia}} Triệu/Tháng</p></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				@endforeach
				@foreach ($kq as $p)
					<?php if($p->TrangThai == 1 && $p->LoaiTin == 3) { ?>
					<div class="<?php if($a==0){echo 'col-lg-12 col-sm-12 khung3';$a++;} else { echo 'col-lg-12 col-sm-12 khung-3'; } ?>" style="padding-top: 25px;padding-bottom: 0px">
						<div class="properties" style="text-align: left;">
							<div class="col-lg-4"><?php $array =  (explode(';', $p->HinhAnh)); $hinh = $array[0]; ?>
							<img src="<?php echo asset('img/ThuePhong/'.$hinh) ?>" class="img-responsive" alt="properties"/>
							</div>
							<div class="col-lg-8">
								<p class="price-rent"><a  href="chitietphong/{{$p->id}}" class="vip3">{{$p->TieuDe}}</a></p>
								<div class="listing-detail">
									<div class="row">
										<div class="col-md-12" style="padding-bottom: 10px;">
											{{$p->MoTa}}
										</div>
										<div class="col-md-3">
											<b>Diện tích:</b> {{$p->DienTich}} m2
										</div>
										<div class="col-md-5">
											<b>Khu vực:</b>
											{{$p->TenQuan}}, {{$p->TenThanhPho}}
										</div>
										<div class="col-md-4">
											<?php $date = date_create( $p->NgayBatDau); ?>
											<b>Ngày đăng</b>: {{$date->format('d/m/Y')}}
										</div>
										<div class="col-md-12"><p class="price-red">Giá: {{$p->Gia}} Triệu/Tháng</p></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				@endforeach
			</div>
		</div>
		<div class="col-lg-3 col-sm-4 ">
				<div class="search-form"><h4><span class="glyphicon glyphicon-search"></span>Tìm kiếm</h4>
					<div class="row">
						<form method="post" action="{{route('timPhong')}}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="col-lg-6 col-sm-12 ">
								<select class="form-control" name="loaichothue">
									@foreach ($loaichothue as $tp)
									<option value="{{$tp->id}}">{{$tp->LoaiChoThue}}</option>
									@endforeach 
								</select>
							</div>
							<div class="col-lg-6 col-sm-12 ">
								<select class="form-control" name="tp" id="tp">
									<option value="0">Thành phố</option>
									@foreach ($thanhpho as $tp)
									<option value="{{$tp->id}}">{{$tp->TenThanhPho}}</option>
									@endforeach 
								</select>
							</div>
							<div class="col-lg-6 col-sm-12">
								<select class="form-control" name="quan" id="quan">
									<option value="0">Quận/Huyện</option>
								</select>
							</div>
							<div class="col-lg-6 col-sm-12">
								<select class="form-control" name="phuong" id="phuong">
									<option value="0">Phường</option>
								</select>
							</div>
							<div class="col-lg-6 col-sm-12">
								<select class="form-control" name="dt">
									<option value="0">Diện tích</option>
									<option value="1">Dưới 20m2</option>
									<option value="2">20 - 30m2</option>
									<option value="3">30 - 40m2</option>
									<option value="4">40 - 50m2</option>
									<option value="5">50 - 60m2</option>
									<option value="6">60 - 70m2</option>
									<option value="7">Trên 70m2</option>
								</select>
							</div>
							<div class="col-lg-6 col-sm-12">
								<select class="form-control" name="gia">
									<option value="0">Khoảng giá</option>
									<option value="1">2 - 3 triệu</option>
									<option value="2">3 - 5 triệu</option>
									<option value="3">5 - 7 triệu</option>
									<option value="4">7 - 10 triệu</option>
									<option value="5">Trên 10 triệu</option>
								</select>
							</div>
							<div class="col-lg-12 col-sm-12">
								<button class="btn btn-detail" style="margin-top: 0px;font-size: 18px;color:white;">Tìm kiếm</button>
							</div>
						</form>
					</div>
				</div>
			</div>
	</div>
</div>
</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
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
	$('#quan').on('change',function(){
            if(quan){
              $.ajax({
                type:'get',
                url:'{{ url("timphuong") }}',
                data:{quan:$(this).val()},
                async: true,
                success:function(html){
                  $('#phuong').html(html);
                }
              }); 
            }else{
              $('#phuong').html('<option value="0">Chọn quận/huyện</option>');
            }
          });
</script>
@endsection
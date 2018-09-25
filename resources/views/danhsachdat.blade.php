@section('title','Danh sách đất')
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
    <h2>Danh sách các lô đất</h2>
  </div>
</div>
<div class="container">
	<div class="properties-listing spacer">

		<div class="row">
			<div class="col-lg-3 col-sm-4 ">

				<div class="search-form"><h4><span class="glyphicon glyphicon-search"></span>Tìm kiếm</h4>
					<div class="row">
						<form method="post" action="{{route('timDat_ban')}}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="col-lg-6 col-sm-6 ">
								<select class="form-control" name="tp" id="tp">
									<option value="0">Chọn thành phố</option>
									@foreach ($thanhpho as $tp)
									<option value="{{$tp->id}}">{{$tp->TenThanhPho}}</option>
									@endforeach 
								</select>
							</div>
							<div class="col-lg-6 col-sm-6">
								<select class="form-control" name="quan" id="quan">
									<option value="0">Chọn thành phố</option>
								</select>
							</div>
							<div class="col-lg-6 col-sm-6">
								<select class="form-control" name="dt">
									<option value="0">Diện tích</option>
									<option value="1">Dưới 50m2</option>
									<option value="2">50 - 80m2</option>
									<option value="3">80 - 120m2</option>
									<option value="4">120 - 160m2</option>
								</select>
							</div>
							<div class="col-lg-6 col-sm-6">
								<select class="form-control" name="gia">
									<option value="0">Khoảng giá</option>
									<option value="1">Dưới 800 triệu</option>
									<option value="2">800 triệu - 1,5 tỷ</option>
									<option value="3">1,5 tỷ - 2,5 tỷ</option>
									<option value="4">2,5 tỷ - 4 tỷ</option>
								</select>
							</div>
							<div class="col-lg-12 col-sm-12">
								<select class="form-control" name="huong">
									<option value="0">Hướng đất</option>
									<option value="1">Đông</option>
									<option value="2">Tây</option>
									<option value="3">Nam</option>
									<option value="4">Bắc</option>
									<option value="5">Đông-Nam</option>
									<option value="6">Đông-Bắc</option>
									<option value="7">Tây-Nam</option>
									<option value="8">Tây-Bắc</option>
								</select>
							</div>
							<div class="col-lg-12 col-sm-12">
								<button class="btn btn-detail" style="margin-top: 0px;font-size: 18px;color:white;">Tìm kiếm</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php $i=0; ?>
			@foreach ($dat as $d) <?php $i++; ?> @endforeach
			<div class="col-lg-9 col-sm-8">
				<div class="sortby clearfix">
					<div class="pull-right result">Hiển thị: <?php echo $i; ?> 
				</div>
			</div>
			<div class="row">
				<!-- properties -->

				@foreach ($dat as $d)
				<div class="col-lg-4 col-sm-6">
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
				</div>
				@endforeach

			</div>
			
			<!-- properties -->
			<div class="center">
				<ul class="pagination">
					{!! $dat->render() !!}
				</ul>
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
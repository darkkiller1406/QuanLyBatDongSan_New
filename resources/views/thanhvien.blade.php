@section('title','Về chúng tôi')
@extends('layout.master_ban')
@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img" style="background-image: url(../img/bg-img/hero1.jpg);">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-12">
				<div class="breadcumb-content">
					<h3 class="breadcumb-title">{{$congty->TenCongTy}}</h3>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### About Content Wrapper Start ##### -->
<section class="about-content-wrapper section-padding-40">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-12">
				
				<div class="single-blog-area mb-50">
					<!-- Post Content -->
					@if(isset($gioithieu))
					<div class="post-content">
						<!-- Date -->
						<div class="post-date">
							<a>
								<?php
								$date=date_create($gioithieu->created_at);
								echo date_format($date,"d-m-Y");
								?>
							</a>
						</div>
						<!-- Headline -->
						<a href="#" class="headline">{{$gioithieu->TieuDe}}</a>
						<!-- Post Meta -->
						<div class="post-meta">
							<p>By <a href="#">{{$congty->TenCongTy}}</a></p>
						</div>
						<?php echo html_entity_decode($gioithieu->NoiDung) ?>
						<!-- Read More btn -->
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
	
</section>
@endsection
@section('script')
  <script type="text/javascript">
           $('#quan').on('change', function () {
           	alert('aa');
            if (quan) {
                $.ajax({
                    type: 'get',
                    url: '{{ url("timphuong") }}',
                    data: {quan: $(this).val()},
                    async: true,
                    success: function (html) {
                        console.log(html);
                        $('#phuong').html(html);
                    }
                });
            } else {
                $('#phuong').html('<select class="form-control" name="phuong" id="phuong"><option value="0">Chọn quận</option></select>');
            }
        });
 </script>
@endsection
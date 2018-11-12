@section('title','Trang chủ')
@extends('layout.master_ban')
@section('content')
<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
    <div class="hero-slides owl-carousel">
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img" style="background-image: url(img/1.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">Tiện lợi</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img" style="background-image: url(img/2.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">Nhanh chóng</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img" style="background-image: url(img/3.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">Uy tín</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Hero Area End ##### -->

@include('layout.search')

<!-- ##### Featured Properties Area Start ##### -->
<section class="featured-properties-area section-padding-100-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading wow fadeInUp">
                    <h2>ĐẤT BÁN</h2>
                    <p>Có rất nhiều lô đất đẹp đang đợi bạn chọn.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($dat as $d)
            <!-- Single Featured Property -->
            
            <div class="col-12 col-md-6 col-xl-4">
                <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                    <!-- Property Thumbnail -->
                    <a href="chitiet/{{$d->id}}">
                    <div class="property-thumb">
                        <?php $array =  (explode(';', $d->HinhAnh)); $hinh = $array[0]; ?>
                        <img src="<?php echo asset('img/'.$hinh) ?>" alt="" style="height: 250px; width: 100%">
                        <div class="tag">
                            <?php if ($d->TrangThai === 1) { ?> <span>Đang giao dịch</span> <?php } else {?><span>Đang bán</span> <?php } ?>
                        </div>
                        <div class="list-price">
                            <p>{{number_format(($d->DienTich)*($d->DonGia))}} VNĐ</p>
                        </div>
                    </div>
                    <!-- Property Content -->
                    <div class="property-content">
                        <?php $tenQuan = $d->TenQuan($d->Phuong) ?>
                        <h5>Đất quận {{$tenQuan}}</h5>
                        <p class="location"><img src="img/icons/location.png" alt="" style="margin-top: -10px;">{{$d->DiaChi}}</p>
                        <p><b>Diện tích:</b> {{$d->DienTich}} m2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Hướng:</b> {{$d->Huong}}</p>
                    </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-5">
            </div>
            <!-- Submit -->
            <div class="form-group">
                <a href="danhsachdat" class="btn south-btn">Xem thêm</a>
            </div>
        </div>
    </div>
</section>
<!-- ##### Featured Properties Area End ##### -->

<!-- ##### Call To Action Area Start ##### -->
<section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url(img/bg-shawdow.jpg)">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-12">
                <div class="cta-content text-center">
                    <h2 class="wow fadeInUp" data-wow-delay="300ms">Tham gia ngay với chúng tôi</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Call To Action Area End ##### -->

<!-- ##### Featured Properties Area Start ##### -->
<section class="featured-properties-area section-padding-100-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading wow fadeInUp">
                    <h2>THÀNH VIÊN CỦA SÀN GIAO DỊCH</h2>
                    <p>Có nhất nhiều công ty đã tin tưởng sử dụng sàn giao dịch của chúng tôi.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($congty as $ct)
            <!-- Single Featured Property -->
            <div class="col-12 col-md-6 col-xl-4">
                <a href="thanhvien/{{$ct->Link}}">
                <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                    <!-- Property Thumbnail -->
                    
                    <div class="property-thumb">
                        <img src="<?php echo asset('img/logo/'.$ct->Logo) ?>" alt="" style="height: 250px; width: 100%">
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-5">
            </div>
            <!-- Submit -->
            <div class="form-group">
                <a href="danhsachthanhvien" class="btn south-btn btn-3">Xem thêm</a>
            </div>
        </div>
    </div>
</section>
<!-- ##### Featured Properties Area End ##### -->
@endsection
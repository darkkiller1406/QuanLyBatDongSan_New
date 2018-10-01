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
            <?php if ($d->TrangThai != 2) { ?>
            <div class="col-12 col-md-6 col-xl-4">
                <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                    <!-- Property Thumbnail -->
                    <div class="property-thumb">
                        <?php $array =  (explode(';', $d->HinhAnh)); $hinh = $array[0]; ?>
                        <img src="<?php echo asset('img/'.$hinh) ?>" alt="" style="height: 250px; width: 100%">
                        <div class="tag">
                            <?php if ($d->TrangThai === 1) { ?> <span>Đang giao dịch</span> <?php } else {?><span>Đang bán</span> <?php } ?>
                        </div>
                        <div class="list-price">
                            <a href="chitiet/{{$d->id}}"><p>{{number_format(($d->DienTich)*($d->DonGia))}} VNĐ</p></a>
                        </div>
                    </div>
                    <!-- Property Content -->
                    <div class="property-content">
                        <h5>Đất quận {{$d->quan->TenQuan}}</h5>
                        <p class="location"><img src="img/icons/location.png" alt="" style="margin-top: -10px;">{{$d->quan->TenQuan}}</p>
                        <p><b>Diện tích:</b> {{$d->DienTich}} m2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Hướng:</b> {{$d->Huong}}</p>
                    </div>
                </div>
            </div>
            <?php } ?>
            @endforeach
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
                    <h2 class="wow fadeInUp" data-wow-delay="300ms">Bạn đang tìm phòng cho thuê ?</h2>
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
                    <h2>PHÒNG CHO THUÊ</h2>
                    <p>Có nhất nhiều phòng trọ đang đợi bạn chọn.</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($phong as $d)
            <?php if($d->LoaiTin == 1 && $d->TrangThai == 1) { ?>
                <!-- Single Featured Property -->
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <?php $array =  (explode(';', $d->HinhAnh)); $hinh = $array[0]; ?>
                            <img src="<?php echo asset('img/ThuePhong/'.$hinh) ?>" alt="" style="height: 250px; width: 100%">
                            <div class="tag">
                            <span>TIN VIP</span>
                            </div>
                            <div class="list-price">
                                <p style="font-size: 15px;"><a href="chitietphong/{{$d->id}}">{{$d->Gia}} Triệu/Tháng</a></p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h6 style="font-size: 14px; text-align: center;">{{$d->TieuDe}}</h6>
                            <p class="location"><img src="img/icons/location.png" alt="" style="margin-top: -10px;">
                                @foreach ($quan as $q)
                                <?php if ($q->id == $d->phuong->ThuocQuan) {
                                    echo $q->TenQuan.', ';
                                    $tam = $q->ThuocThanhPho;
                                } ?>
                                @endforeach
                                @foreach ($thanhpho as $tp)
                                <?php
                                if($tp->id == $tam) {
                                    echo $tp->TenThanhPho;
                                } ?>
                            @endforeach</p>
                            <p><b>Diện tích:</b> {{$d->DienTich}} m2&nbsp;&nbsp;&nbsp;
                                <b>Ngày đăng:</b><?php $date = $d->created_at; ?> {{$date->format('d/m/Y')}}
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?> 
            @endforeach
        </div>
    </div>
</section>
<!-- ##### Featured Properties Area End ##### -->
@endsection
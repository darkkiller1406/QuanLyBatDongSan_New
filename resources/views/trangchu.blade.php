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

<!-- ##### Advance Search Area Start ##### -->
<div class="south-search-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="advanced-search-form">
                    <!-- Search Title -->
                    <div class="search-title">
                        <p>Tìm kiếm</p>
                    </div>
                    <!-- Search Form -->
                    <form action="#" method="post" id="advanceSearch">
                        <div class="row">

                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" id="cities">
                                        <option>Tất cả quận</option>
                                        @foreach ($quan as $q)
                                        <option value="{{$q->id}}">{{$q->TenQuan}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" id="dt" name="dt">
                                        <option value="0">Diện tích</option>
                                        <option value="1">Dưới 50m2</option>
                                        <option value="2">50 - 80m2</option>
                                        <option value="3">80 - 120m2</option>
                                        <option value="4">120 - 160m2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" id="dt" name="gia">
                                        <option value="0">Khoảng giá</option>
                                        <option value="1">Dưới 800 triệu</option>
                                        <option value="2">800 triệu - 1,5 tỷ</option>
                                        <option value="3">1,5 tỷ - 2,5 tỷ</option>
                                        <option value="4">2,5 tỷ - 4 tỷ</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" id="dt" name="gia">
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
                            </div>

                            <div class="col-7 d-flex justify-content-between align-items-end">
                                <!-- More Filter -->
                                <div class="col-md-4">
                                </div>
                                <!-- Submit -->
                                <div class="form-group">
                                    <button type="submit" class="btn south-btn">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Advance Search Area End ##### -->

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
                            <p style="font-size: 15px;">{{number_format(($d->DienTich)*($d->DonGia))}} VNĐ</p>
                        </div>
                    </div>
                    <!-- Property Content -->
                    <div class="property-content">
                        <h5>Đất quận {{$d->quan->TenQuan}}</h5>
                        <p class="location"><img src="img/icons/location.png" alt="">{{$d->quan->TenQuan}}</p>
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
                                <p style="font-size: 15px;">{{$d->Gia}} Triệu/Tháng</p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h6 style="font-size: 14px; text-align: center;"><a href="">{{$d->TieuDe}}</a></h6>
                            <p class="location"><img src="img/icons/location.png" alt="">
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
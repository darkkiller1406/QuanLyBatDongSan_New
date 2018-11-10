@section('title','Phí dịch vụ')
@extends('layout.master_ban')
@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <div class="breadcumb-content">
          <h3 class="breadcumb-title">PHÍ DỊCH VỤ</h3>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="south-contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-heading">
                        <h6>Phí dịch vụ</h6>
                    </div>
                </div>
            </div>
            <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-4">
      <div class="pricing-table text-center">
        <h2><i class="fa fa-plane" aria-hidden="true"></i></h2>
        <h3>GÓI CƠ BẢN</h3>
        <div class="plan-content">
          <p>KHÔNG GIỚI HẠN TÍNH NĂNG</p>
          <p>MIỄN PHÍ THÁNG ĐẦU TIÊN</p>
          <p>GIỚI HẠN NGƯỜI DÙNG (3 người/account)</p>
        </div>
        <div class="pricing"><span>120.000 VND</span>
          <P class="price-text">một tháng</P>
        </div>
        <div class="choose-plan"><a class="btn south-btn" style="color: white" href="{{route('DangKy')}}">Thử ngay</a></div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="pricing-table text-center">
        <h2><i class="fa fa-plane" aria-hidden="true"></i></h2>
        <h3>GÓI NÂNG CAO</h3>
        <div class="plan-content">
          <p>KHÔNG GIỚI HẠN TÍNH NĂNG</p>
          <p>MIỄN PHÍ THÁNG ĐẦU TIÊN</p>
          <p>KHÔNG GIỚI HẠN NGƯỜI DÙNG</p>
        </div>
        <div class="pricing"><span>180.000 VND</span>
          <P class="price-text">một tháng</P>
        </div>
        <div class="choose-plan"><a class="btn south-btn" style="color: white" href="{{route('DangKy')}}">Thử ngay</a></div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection
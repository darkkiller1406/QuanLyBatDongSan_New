@section('title','Quản lý tin')
@extends('layout.master_ban')
@section('content')
<section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <div class="breadcumb-content">
          <h3 class="breadcumb-title">Danh sách tin đã đăng</h3>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="south-contact-area section-padding-100">
  <div class="container">
    <div class="row">
      <div class="contact-heading">
        <h6>Tin đã đăng</h6>
      </div>
    </div>
    <div class="col-lg-12 col-sm-12">
      <div class="row"">
        <!-- properties -->
        <?php $a=0; ?>
        @foreach ($tindadang as $p)
        <?php if($p->TrangThai == 0) { ?>
          <div class="col-md-12 col-lg-12">
            <div class="contact-realtor-wrapper" style="margin-top: 30px;">
              <div class="realtor-info">
                <div class="realtor---info">
                  <p class="price-rent"><a  href="chitietphong/{{$p->ID}}" class="size-detail">{{$p->TieuDe}}</a></p>
                  <div class="listing-detail size-body">
                    <div class="row">
                      <div class="col-md-12" style="padding-bottom: 10px;">
                        {{$p->MoTa}}
                      </div>
                      <div class="col-md-3">
                        <b>Diện tích:</b> {{$p->DienTich}} m2
                      </div>
                      <div class="col-md-5">
                        <b>Khu vực:</b> {{$p->TenQuan}}, {{$p->TenThanhPho}}
                      </div>
                      <div class="col-md-4">
                        <?php $date = date_create($p->ngaydang); ?>
                        <b>Ngày đăng</b>: {{$date->format('d/m/Y')}}
                      </div>
                      <div class="col-md-12"><p class="price-red">Giá: {{$p->GiaThue}} Triệu/Tháng</p></div>
                      <div class="col-md-5"></div>
                      <div class="col-md-2"><a class="btn south-btn" href="chinhsuatindang/{{$p->ID}}">CHỈNH SỬA</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        @endforeach
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="contact-heading" style="margin-top: 50px;">
        <h6>Tin chưa đăng</h6>
      </div>
    </div>
    <div class="col-lg-12 col-sm-12">
      <div class="row"">
        <!-- properties -->
        <?php $a=0; ?>
        @foreach ($tindadang as $p)
        <?php if($p->TrangThai == 1) { ?>
          <div class="col-md-12 col-lg-12">
            <div class="contact-realtor-wrapper" style="margin-top: 30px;">
              <div class="realtor-info">
                <div class="realtor---info">
                  <p class="price-rent"><a  href="chitietphong/{{$p->ID}}" class="size-detail">{{$p->TieuDe}}</a></p>
                  <div class="listing-detail size-body">
                    <div class="row">
                      <div class="col-md-12" style="padding-bottom: 10px;">
                        {{$p->MoTa}}
                      </div>
                      <div class="col-md-3">
                        <b>Diện tích:</b> {{$p->DienTich}} m2
                      </div>
                      <div class="col-md-5">
                        <b>Khu vực:</b> {{$p->TenQuan}}, {{$p->TenThanhPho}}
                      </div>
                      <div class="col-md-4">
                        <?php $date = date_create($p->ngaydang); ?>
                        <b>Ngày đăng</b>: {{$date->format('d/m/Y')}}
                      </div>
                      <div class="col-md-12"><p class="price-red">Giá: {{$p->GiaThue}} Triệu/Tháng</p></div>
                      <div class="col-md-5"></div>
                      <div class="col-md-2"><a class="btn south-btn" href="chinhsuatindang/{{$p->ID}}">CHỈNH SỬA</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        @endforeach
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
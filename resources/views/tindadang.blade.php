@section('title','Quản lý tin')
@extends('layout.master_ban')
@section('content')
<div class="inside-banner">
  <div class="container"> 
    <h2>Danh sách các tin đã đăng</h2>
  </div>
</div>
<div class="container">
  <div class="properties-listing spacer">
    <div class="row">
     <div class="panel panel-default">
      <div class="panel-heading" style="font-size: 20px;font-weight: bold;">TIN ĐANG ĐƯỢC ĐĂNG</div>
      <div class="panel-body">
        <div class="col-lg-12 col-sm-12">
          <div class="row"">
            <!-- properties -->
            <?php $a=0; ?>
            @foreach ($tindadang as $p)
            <?php if($p->TrangThai == 1) { ?>
              <?php if($a==0) {$a++;} else { ?> <hr> <?php } ?>
              <div class="col-lg-12 col-sm-12">
                <div class="properties" style="text-align: left;">
                  <p class="price-rent"><a  href="chitietphong/{{$p->ID}}" class="vip">{{$p->TieuDe}}</a></p>
                  <div class="listing-detail">
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
                      <div class="col-md-2"><a class="btn btn-basic" href="chinhsuatindang/{{$p->ID}}">CHỈNH SỬA</a></div>
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
  <div class="panel panel-default">
    <div class="panel-heading" style="font-size: 20px;font-weight: bold;">TIN CHƯA ĐĂNG</div>
    <div class="panel-body">
      <div class="col-lg-12 col-sm-12">
        <div class="row"">
          <!-- properties -->
          <?php $a=0; ?>
          @foreach ($tindadang as $p)
          <?php if($p->TrangThai == 2) { ?>
            <?php if($a==0) {$a++;} else { ?> <hr> <?php } ?>
            <div class="col-lg-12 col-sm-12" style="padding-bottom: 15px;">
              <div class="properties" style="text-align: left;">
                <p class="price-rent"><a  href="chitietphong/{{$p->ID}}" class="vip">{{$p->TieuDe}}</a></p>
                <div class="listing-detail">
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
                    <div class="col-md-2"><a class="btn btn-basic" href="chinhsuatindang/{{$p->ID}}">CẬP NHẬT</a></div>
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
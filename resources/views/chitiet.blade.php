@section('title','Chi tiết')
@extends('layout.master_ban')
@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img" style="background-image: url(../img/bg-img/hero1.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <div class="breadcumb-content">
          <h3 class="breadcumb-title">Chi tiết lô đất</h3>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Advance Search Area Start ##### -->
@include('layout.search')
<!-- ##### Advance Search Area End ##### -->
<!-- ##### Listings Content Area Start ##### -->
<section class="listings-content-wrapper section-padding-100">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <!-- Single Listings Slides -->
        <div class="single-listings-sliders owl-carousel">
          <?php $array =  (explode(';', $chitiet->HinhAnh)); $t= 0; $i=0; ?>
          <!-- Single Slide -->
          <?php for($a=0;$a<(count($array)-1);$a++) { ?>
           <img  src="<?php echo asset('img/'.$array[$a]) ?>" class="img-responsive" alt="properties" />
         <?php }?>
       </div>
     </div>
   </div>
   <!-- Get map -->
   <input type="hidden" id="vitri" value="{{$chitiet->Map}}">
   <div class="row justify-content-center">
    <div class="col-12 col-lg-8">
      <div class="listings-content">
        <!-- Price -->
        <div class="list-price">
          <p>{{number_format(($chitiet->DienTich)*($chitiet->DonGia))}} VNĐ</p>
        </div>
        <h5>Bán đất {{$chitiet->TenQuan($chitiet->Phuong)}}</h5>
        <p class="location" style="margin-top: -5px;"><img src="../img/icons/location.png" alt=""> {{$chitiet->phuong->TenPhuong}}, {{$chitiet->TenQuan($chitiet->Phuong)}}, {{$chitiet->TenThanhPho($chitiet->Phuong)}}</p>
        <table class="table table-condensed">
            <tr>
              <td>Hướng</td>
              <td>{{$chitiet->Huong}}</td>
            </tr>
            <tr>
              <td>Rộng</td>
              <td>{{$chitiet->Rong}}m</td>
            </tr>
            <tr>
              <td>Dài</td>
              <td>{{$chitiet->Dai}}m</td>
            </tr>
            <tr>
              <td>Nở hậu</td>
              <td>{{$chitiet->NoHau}}m</td>
            </tr>
            <tr>
              <td>Diện tích</td>
              <td>{{$chitiet->DienTich}}m2</td>
            </tr>
            <tr>
              <td>Mô tả</td>
              <td><?php $array_mota =  (explode('.', $chitiet->GhiChu));?>
              @foreach ($array_mota as $a)
              {{$a}}.<br>
              @endforeach
              </td>
            </tr>
        </table>
      </div>
    </div>
   <div class="col-12 col-md-6 col-lg-4">
    <div class="contact-realtor-wrapper">
        <?php if($chitiet->TrangThai ==0 ) { ?>
        <div class="realtor-info">
          <div class="realtor---info" style="margin-bottom: -20px;">
          <h2>Gửi yêu cầu</h2>
          </div>
          <div class="realtor--contact-form">
            <form action="{{route('ThemYeuCau')}}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="iddat" value="{{$chitiet->id}}">
              <div class="form-group">
                <input type="text" class="form-control" id="realtor-name" name="ten" placeholder="Tên đầy đủ" required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="realtor-number" name="email" placeholder="Email" required>
              </div>
              <div class="form-group">
                <input type="number" class="form-control" id="realtor-email" name="dt" id="dt" placeholder="Điện thoại liên lạc" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" id="realtor-message" cols="30" rows="10" name="noidung" placeholder="Yêu cầu" required></textarea>
              </div>
              <button type="submit" class="btn south-btn">Gửi</button>
            </form>
          </div>
        </div>
        <?php } elseif($chitiet->TrangThai ==1 ){ ?>
          <div class="alert alert-warning" style="font-size: 2em;text-align: center;">
            Đang giao dịch
          </div>
        <?php } else {?>   
          <div class="alert alert-danger" style="font-size: 2em;text-align: center;">
            Đã bán
          </div> 
        <?php }?>     
        @if(count($errors) > 0)
        <div class="alert alert-danger" style="font-size: 0.9em;text-align: center;">
          @foreach($errors->all() as $err)
          {{ $err }}<br>
          @endforeach
        </div>
        @endif

        @if(session('thongbao'))
        <div class="alert alert-success" style="font-size: 0.9em;text-align: center;">
          {{ session('thongbao') }}
        </div>
        @endif
        @if(session('canhbao'))
        <div class="alert alert-danger" style="font-size: 0.9em;text-align: center;">
          {{ session('canhbao') }}
        </div>
        @endif
    </div>
  </div>
</div>
<!-- Listing Maps -->
<div class="row">
  <div class="col-12">
    <div class="listings-maps mt-100">
      <h5 id="change-map"><img src="<?php echo asset('img/icons/location.png') ?>" alt="" style="margin-top: -10px"> Địa điểm </h5>
      <div class="well" id="map" style="width:100%;height:500px"></div>
    </div>
  </div>
</div>
</div>
</section>
<!-- ##### Listings Content Area End ##### -->
@endsection
@section('script')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE&callback=initMap"
type="text/javascript"></script>
<script type="text/javascript">
  function initMap() {

    var location =  $('#vitri').val();

    location = location.split(";");
    var mapCanvas = document.getElementById("map");
    var myCenter = new google.maps.LatLng(location[0], location[1]); 
    var mapOptions = {center: myCenter, zoom: 18};
    var map = new google.maps.Map(mapCanvas, mapOptions);
    var marker = new google.maps.Marker({
      map: map,
      position: myCenter,
      icon: "../img/gps.png",
      animation: google.maps.Animation.BOUNCE
    });

  }
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  function checkPhoneNumber() {
    var flag = false;
    var phone = $('#sdt').val().trim(); // ID của trường Số điện thoại
    phone = phone.replace('(+84)', '0');
    phone = phone.replace('+84', '0');
    phone = phone.replace('0084', '0');
    phone = phone.replace(/ /g, '');
    if (phone != '') {
      var firstNumber = phone.substring(0, 2);
      if ((firstNumber == '09' || firstNumber == '08' || firstNumber == '03' || firstNumber == '07' || firstNumber == '05') && phone.length == 10) {
        if (phone.match(/^\d{10}/)) {
          flag = true;
        }
      } else if (firstNumber == '01' && phone.length == 11) {
        if (phone.match(/^\d{11}/)) {
          flag = true;
        }
      }
    }
    return flag;
  }
  $(document).ready(function(){
    $('#dt').on('change',function(){
      if (!checkPhoneNumber()) {
        alert('Vui lòng nhập đúng định dạng số điện thoại');
        document.getElementById("submit").disabled = true; 
      }
      else
      {
       document.getElementById("submit").disabled = false; 
     }
   });
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
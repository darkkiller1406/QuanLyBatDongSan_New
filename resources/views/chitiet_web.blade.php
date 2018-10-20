@section('title','Chi tiết')
@extends('layout.master_ban')
@section('content')
<?php
function _substr($str, $length, $minword = 3)
{
  $sub = '';
  $len = 0;
  foreach (explode(' ', $str) as $word)
  {
    $part = (($sub != '') ? ' ' : '') . $word;
    $sub .= $part;
    $len += strlen($part);
    if (strlen($word) > $minword && strlen($sub) >= $length)
    {
      break;
    }
  }
  return $sub . (($len < strlen($str)) ? '...' : '');
}
?>

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
        
          <!-- Single Slide -->
           <img  src="<?php echo $result[8] ?>" class="img-responsive" alt="properties" width="100%" />

     </div>
   </div>

   <!-- Get map -->
   <input type="hidden" id="vitri" value="<?php echo $result[4] ?>">
   <div class="row justify-content-center">
    <div class="col-12 col-lg-8">
      <div class="listings-content">
        <!-- Price -->
        <div class="list-price">
          <p><?php echo $result[6] ?></p>
        </div>
        <h5><?php echo $result[1] ?></h5>
        <p class="location" style="margin-top: -5px;"><img src="../img/icons/location.png" alt=""><?php echo $result[3] ?></p>
        <p>
          - <b>Hướng:</b> <br>
          - <b>Rộng:</b> <br>
          - <b>Dài:</b> <br>
          - <b>Nở hậu:</b> <br>
          - <b>Diện tích:</b> <?php echo $result[5] ?> <br>
          - <b>Mô tả:</b> 
          <?php echo _substr($result[7], (strlen($result[7]) - 200)) ?>
        </p>
      </div>
    </div>
   <div class="col-12 col-md-6 col-lg-4">
    <div class="contact-realtor-wrapper">
        <div class="realtor-info">
          <div class="realtor---info" style="margin-bottom: -20px;">
          <h2>Gửi yêu cầu</h2>
          </div>
          <div class="realtor--contact-form">
            <form action="{{route('ThemYeuCau')}}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="iddat" value="<?php echo $result[10] ?>">
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
                <textarea name="message" class="form-control" id="realtor-message" cols="30" rows="10" name="yeucau" placeholder="Yêu cầu" required></textarea>
              </div>
              <button type="submit" class="btn south-btn">Gửi</button>
            </form>
          </div>
        </div>
<!--           <div class="alert alert-warning" style="font-size: 2em;text-align: center;">
            Đang giao dịch
          </div>
          <div class="alert alert-danger" style="font-size: 2em;text-align: center;">
            Đã bán
          </div> 
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
        @endif -->
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

    var vitri =  $('#vitri').val();
    <?php $arrlatlng = explode(',', $result[4]); ?>
    var mapCanvas = document.getElementById("map");
    var myCenter = new google.maps.LatLng(<?php echo $arrlatlng[0].','.$arrlatlng[1] ?>); 
    var mapOptions = {center: myCenter, zoom: 17};
    var map = new google.maps.Map(mapCanvas,mapOptions);
    //var geocoder = new google.maps.Geocoder();
    //geocodeAddress(geocoder,map,vitri);
    var marker = new google.maps.Marker({
    position: myCenter,
    animation: google.maps.Animation.BOUNCE,
    icon: "../img/gps.png",
    });
    marker.setMap(map);
  }
  function geocodeAddress(geocoder, resultsMap,vitri) {
    var address = vitri;
    geocoder.geocode({'address': address}, function(results, status) {
      if (status === 'OK') {
        resultsMap.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
          map: resultsMap,
          position: results[0].geometry.location,
        });
      } else {
        alert('Geocode was not successful for the following reason: ' + address);
      }
    });   
  }
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  function checkPhoneNumber() {
    var flag = false;
    var phone = $('#dt').val().trim(); // ID của trường Số điện thoại
    phone = phone.replace('(+84)', '0');
    phone = phone.replace('+84', '0');
    phone = phone.replace('0084', '0');
    phone = phone.replace(/ /g, '');
    if (phone != '') {
      var firstNumber = phone.substring(0, 2);
      if ((firstNumber == '09' || firstNumber == '08') && phone.length == 10) {
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
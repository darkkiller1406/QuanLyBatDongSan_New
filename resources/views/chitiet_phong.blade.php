@section('title','Chi tiết')
@extends('layout.master_ban')
@section('content')
<section class="breadcumb-area bg-img" style="background-image: url(../img/bg-img/hero1.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <div class="breadcumb-content">
          <h3 class="breadcumb-title">Chi tiết phòng cho thuê</h3>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ##### Advance Search Area Start ##### -->
@include('layout.search')
<!-- ##### Advance Search Area End ##### -->

<!-- ##### Listings Content Area Start ##### -->
<section class="listings-content-wrapper section-padding-100">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php $array =  (explode(';', $chitiet->HinhAnh)); $t=0; $i=0; ?>
        <!-- Single Listings Slides -->
        <div class="single-listings-sliders owl-carousel">
          <!-- Single Slide -->
          <?php for($a=0;$a<(count($array)-1);$a++) { ?>
            <img  src="<?php echo asset('img/ThuePhong/'.$array[$a]) ?>" class="img-responsive" alt="properties" />
          <?php }?>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-12 col-lg-8">
        <div class="listings-content">
          <!-- Map lng -->
          <input type="hidden" id="pos" value="{{$chitiet->Map}}">
          <!-- Price -->
          <div class="list-price">
            <p style="font-size: 17px; margin-bottom: 5px;">{{$chitiet->Gia}} Triệu/Tháng</p>
          </div>
          <h6>{{$chitiet->TieuDe}}</h6>
          <p class="location"><img src="<?php echo asset('img/icons/location.png') ?>" style="margin-top: -8px" alt=""><?php $tam = ''; ?>
          {{$chitiet->DiaChi}}, {{$chitiet->phuong->TenPhuong}},
          @foreach ($quan as $q)
          <?php if ($q->id == $chitiet->phuong->ThuocQuan){
            echo $q->TenQuan.', ';
            $tam = $q->ThuocThanhPho;
          } ?>
          @endforeach
          @foreach ($thanhpho as $tp)
          <?php
          if($tp->id == $tam){
            echo $tp->TenThanhPho;
          } ?>
          </p>
          @endforeach
          <!-- Listings Btn Groups -->
          <div class="listings-btn-groups">
          <p><b>Mô tả:</b> {{$chitiet->MoTa}}</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <div class="contact-realtor-wrapper">
        <div class="realtor-info">
          <div class="realtor---info">
            <h2>{{$chitiet->TenLienHe}}</h2>
            <p>Chủ nhà</p>
            <p><b>Người đăng:</b> {{$chitiet->nguoidang->Ten}}<br>
              <b>Loại tin rao:</b> {{$chitiet->loaichothue->LoaiChoThue}}<br>
              <b>Ngày đăng:</b> <?php $date1 =  date_create( $chitiet->NgayBatDau); ?> {{$date1->format('d/m/Y H:i:s')}}<br>
              <b>Ngày hết hạn:</b> <?php $date2 =  date_create( $chitiet->NgayKetThuc); ?> {{$date2->format('d/m/Y H:i:s')}}<br>
              <b>Diện tích:</b> {{$chitiet->DienTich}} m2<br>
            </p>
            <h6><img src="<?php echo asset('img/icons/phone-call.png') ?>" alt=""> {{$chitiet->DienThoaiLienLac}}</h6>
            <h6><img src="<?php echo asset('img/icons/envelope.png') ?>" alt=""> {{$chitiet->Email}}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Listing Maps -->
  <div class="row">
    <div class="col-12">
      <div class="listings-maps mt-100">
        <div>
          <h5 id="change-map"><img src="<?php echo asset('img/icons/location.png') ?>" alt="" style="margin-top: -10px"> Địa điểm </h5>
          <div class="well" id="map" style="width:100%;height:500px"></div>
        </div>
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
  var checkMap = false;
  $( "#change-map" ).click(function() {
    if (checkMap === false) {
      checkMap = true;
      $( "#change-map" ).html('<img src="<?php echo asset('img/icons/location.png') ?>" alt=""> Tìm đường');
      initMap();
    }
    else {
      checkMap = false;
      $( "#change-map" ).html('<img src="<?php echo asset('img/icons/location.png') ?>" alt=""> Địa điểm');
      initMap();
    }
  });
  function initMap() {
    if( checkMap === false) {
      var arrlatlng = $('#pos').val();
      var vitri = $('#vitri').val();
      arrlatlng = arrlatlng.split(";");
      var mapCanvas = document.getElementById("map");
      var myCenter = new google.maps.LatLng(arrlatlng[0], arrlatlng[1]); 
      var mapOptions = {center: myCenter, zoom: 17};
      var map = new google.maps.Map(mapCanvas,mapOptions);
      var marker = new google.maps.Marker({
        map: map,
        position: myCenter,
        icon: "../img/gps.png",
        animation: google.maps.Animation.BOUNCE
      });
      var infowindow = new google.maps.InfoWindow({
        content: 'Địa chỉ ' + vitri
      });
      marker.addListener('click', function() {
        infowindow.open(map, marker);
      });
    }
    else {
      var directionsService = new google.maps.DirectionsService;
      var directionsDisplay = new google.maps.DirectionsRenderer;
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: {lat: 10.769444, lng: 106.681944},
        icon: "../img/gps.png",
      });
      directionsDisplay.setMap(map);

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            calculateAndDisplayRoute(directionsService, directionsDisplay, pos);
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }
    }
    var map, infoWindow, pos;
    function calculateAndDisplayRoute(directionsService, directionsDisplay, pos) {
      var arrlatlng = $('#pos').val();
      arrlatlng = arrlatlng.split(";");
      var b = new google.maps.LatLng(arrlatlng[0], arrlatlng[1]);
      var a = new google.maps.LatLng(pos['lat'], pos['lng']);
      var distance = google.maps.geometry.spherical.computeDistanceBetween (a, b);
      distance = distance/1000;
      console.log(distance);
      directionsService.route({
        origin: a,
        destination: b,
        travelMode: 'DRIVING'
      }, function(response, status) {
        if (status === 'OK') {
          directionsDisplay.setDirections(response);
        } else {
          window.alert('Directions request failed due to ' + status);
        }
      });
    }
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
      infoWindow.setPosition(pos);
      infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
      infoWindow.open(map);
    }
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
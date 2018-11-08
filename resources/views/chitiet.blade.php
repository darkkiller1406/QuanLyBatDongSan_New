@section('title','Chi tiết')
@extends('layout.master_ban')
@section('content')
<!-- ##### Breadcumb Area Start ##### -->
 <div id="fb-root"></div>
 <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=353941732045822&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
   <input type="hidden" id="pos" value="{{$chitiet->Map}}">
   <input type="hidden" id="vitri" value="{{$chitiet->DiaChi}}">
   <div class="row justify-content-center">
    <div class="col-12 col-lg-8">
      <div class="listings-content">
        <!-- Price -->
        <div class="list-price">
          <p>{{number_format(($chitiet->DienTich)*($chitiet->DonGia))}} VNĐ</p>
        </div>
        <h5>Bán đất {{$chitiet->TenQuan($chitiet->Phuong)}}</h5>
        <p class="location" style="margin-top: -5px;"><img src="../img/icons/location.png" alt="">{{$chitiet->DiaChi}}, {{$chitiet->phuong->TenPhuong}}, {{$chitiet->TenQuan($chitiet->Phuong)}}, {{$chitiet->TenThanhPho($chitiet->Phuong)}}</p>
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-6">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><i class="far fa-building"></i> <b>Thuộc công ty:</b> <span style="padding-left: 15px;">{{$chitiet->congty->TenCongTy}}</span></li>
              <li class="list-group-item"><i class="fas fa-location-arrow"></i> <b>Hướng:</b> <span style="padding-left: 130px;">{{$chitiet->Huong}}</span></li>
              <li class="list-group-item"><i class="fas fa-ruler"></i> <b>Rộng:</b> <span style="padding-left: 140px;">{{$chitiet->Rong}}m</span></li>
              <li></li>
            </ul>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><i class="fas fa-phone"></i> <b>SDT:</b> <span style="padding-left: 85px;">{{$chitiet->congty->SDT}}</span></li>
              <li class="list-group-item"><i class="fas fa-ruler"></i> <b>Dài:</b> <span style="padding-left: 115px;">{{$chitiet->Dai}}m</span></li>
              <li class="list-group-item"><i class="fas fa-ruler"></i> <b>Nở hậu:</b> <span style="padding-left: 90px;">{{$chitiet->NoHau}}m</span></li>
            </ul>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-12">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><i class="fas fa-pen"></i> <b>Mô tả:</b> <div style="margin-top:10px;"> <?php $array_mota =  (explode('.', $chitiet->GhiChu));?>
              @foreach ($array_mota as $a)
              {{$a}}.<br>
            @endforeach</div>
          </li>
        </ul>
      </div>
      </div>
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
  <div class="col-md-12">
    <div class="listings-maps mt-30">
        <h5 id="change-map"><img src="<?php echo asset('img/icons/location.png') ?>" alt=""
         style="margin-top: -10px"> Địa điểm </h5>
         <div class="well" id="map" style="width:100%;height:500px"></div>
     </div>
   </div>
 </div>
 <div class="row">
  <div class="col-md-12">
    <div class="contact-heading mt-50">
      <h6>Tin liên quan</h6>
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
                        <p class="location"><img src="../img/icons/location.png" alt="" style="margin-top: -10px;">{{$d->phuong->TenPhuong}}, {{$tenQuan}}</p>
                        <p><b>Diện tích:</b> {{$d->DienTich}} m2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Hướng:</b> {{$d->Huong}}</p>
                    </div>
                  </a>
                </div>
            </div>
            @endforeach
        </div>
 <div class="row">
  <div class="col-10">
    <div class="listings-maps mt-100" style="margin-top: 35px;">
      <div class="contact-heading" style="margin-bottom: 10px;">
        <h6>Bình luận</h6>
      </div>
      <div class="fb-comments" data-href="{{asset('chitiet/'.$chitiet->id)}}" data-width="80%" data-numposts="10"></div>
   </div>
 </div>
</div>
</section>
<!-- ##### Listings Content Area End ##### -->
@endsection
@section('script')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE&libraries=places&callback=initMap" async defer></script>
    <script type="text/javascript">
        var checkMap = false;
        $("#change-map").click(function () {
            if (checkMap === false) {
                checkMap = true;
                $("#change-map").html('<img src="<?php echo asset('img/icons/location.png') ?>" alt="" style="margin-top: -10px"> Tìm đường');
                initMap();
            }
            else {
                checkMap = false;
                $("#change-map").html('<img src="<?php echo asset('img/icons/location.png') ?>" alt="" style="margin-top: -10px"> Địa điểm');
                initMap();
            }
        });
        var map2;
        var infowindow;

      function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
            console.log(results[i]);
            createMarker(results[i]);

          }
        }
      }

      function createMarker(place) {
        var iconBase = '../img/icons/';
        var icons = {
          hospital: {
            icon: iconBase + 'hospital.png'
          },
          school: {
            icon: iconBase + 'school.png'
          },
          info: {
            icon: iconBase + 'shopping.png'
          }
        };
        var placeLoc = place.geometry.location;
        var type = place.types;
        var index1 = type.indexOf("establishment");
        if (index1 !== -1) type.splice(index1, 1);
        var index2 = type.indexOf("point_of_interest");
        if (index2 !== -1) type.splice(index2, 1);
        var marker = new google.maps.Marker({
          map: map2,
          position: place.geometry.location,
          icon: icons[place.types[0]].icon
        });



        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
        });
      }
        function initMap() {
            if (checkMap === false) {
                var arrlatlng = $('#pos').val();
                var vitri = $('#vitri').val();
                arrlatlng = arrlatlng.split(";");

                var pyrmont = {lat: 10.782843, lng: 106.67134699999997};

                map2 = new google.maps.Map(document.getElementById('map'), {
                  center: pyrmont,
                  zoom: 17
                });
                infowindow = new google.maps.InfoWindow();
                var myCenter = new google.maps.LatLng(arrlatlng[0], arrlatlng[1]);
                var mapOptions = {center: myCenter, zoom: 17};
                var marker2 = new google.maps.Marker({
                  map: map2,
                  position: myCenter,
                  icon: "../img/gps.png",
                  animation: google.maps.Animation.BOUNCE
                });
                var service = new google.maps.places.PlacesService(map2);
                service.nearbySearch({
                  location: pyrmont,
                  radius: 500,
                  type: ["school"]
                }, callback);
                service.nearbySearch({
                  location: pyrmont,
                  radius: 500,
                  type: ["hospital"]
                }, callback);
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
                    navigator.geolocation.getCurrentPosition(function (position) {
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
            var distance = google.maps.geometry.spherical.computeDistanceBetween(a, b);
            distance = distance / 1000;
            console.log(distance);
            directionsService.route({
                origin: a,
                destination: b,
                travelMode: 'DRIVING'
            }, function (response, status) {
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
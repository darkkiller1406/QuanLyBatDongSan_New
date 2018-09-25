@section('title','Chi tiết')
@extends('layout.master_ban')
@section('content')
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">

    <div class="item active">
      <img src="{{asset('img/banner-2.jpg')}}" alt="Los Angeles" style="width:100%;">
      <div class="carousel-caption">
      </div>
    </div>

    <div class="item">
      <img src="{{asset('img/banner-3.jpg')}}" alt="Chicago" style="width:100%;">
      <div class="carousel-caption">
      </div>
    </div>
  </div>
</div>
<div class="banner-search">
  <div class="container"> 
    <!-- banner -->
    <div class="searchbar">
      <div class="row">      
        <form method="post" action="{{route('timPhong')}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="col-lg-2 col-sm-2 ">
            <select class="form-control" name="loaichothue">
              @foreach ($loaichothue as $tp)
              <option value="{{$tp->id}}">{{$tp->LoaiChoThue}}</option>
              @endforeach 
            </select>
          </div>
          <div class="col-lg-2 col-sm-2">
            <select class="form-control" name="tp" id="tp">
              <option value="0">Thành phố</option>
              @foreach ($thanhpho as $tp)
              <option value="{{$tp->id}}">{{$tp->TenThanhPho}}</option>
              @endforeach 
            </select>
          </div>
          <div class="col-lg-2 col-sm-2">
            <select class="form-control" name="quan" id="quan">
              <option value="0">Quận/Huyện</option>
            </select>
          </div>
          <div class="col-lg-2 col-sm-2">
            <select class="form-control" name="phuong" id="phuong">
              <option value="0">Phường</option>
            </select>
          </div>
          <div class="col-lg-2 col-sm-2">
            <select class="form-control" name="gia">
              <option value="0">Khoảng giá</option>
              <option value="1">2 - 3 triệu</option>
              <option value="2">3 - 5 triệu</option>
              <option value="3">5 - 7 triệu</option>
              <option value="4">7 - 10 triệu</option>
              <option value="5">Trên 10 triệu</option>
            </select>
          </div>
          <div class="col-lg-2 col-sm-2">
            <button class="btn btn-success" style="margin-bottom: 10px;">Tìm kiếm</button>
          </div>
        </form>
      </div>


    </div>
  </div>
</div>
</div>
<div class="container">
  <div class="properties-listing spacer">

    <div class="row">
      <div class="col-lg-3 col-sm-4 hidden-xs">
        <div class="hot-properties hidden-xs">
          <h4 style="text-align: center;font-weight:bold;">TIN NỔI BẬT</h4>
          <hr>
          @foreach ($top as $d)
          <?php 
          $array =  (explode(';', $d->HinhAnh)); $hinh = $array[0]; ?>
          
          <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="<?php echo asset('img/ThuePhong/'.$hinh) ?>" class="img-responsive rounded" alt="properties"/></div>
            <div class="col-lg-8 col-sm-7">
              <a href="../chitietphong/{{$d->id}}" class="title">{{$d->TieuDe}}</a>
              <p>{{$d->Gia}} Triệu/Tháng</p> </div>
            </div>
            <hr>
            @endforeach

          </div>
          <input type="hidden" id="pos" value="{{$chitiet->Map}}">
          <input type="hidden" id="vitri" value="{{$chitiet->DiaChi}},{{$chitiet->phuong->TenPhuong}},
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
          }
          ?>
          @endforeach
          ">
        </div>

        <div class="col-lg-9 col-sm-8 ">
          <h3 style="padding-bottom: 20px;text-transform: uppercase;font-size: 20px; font-weight: bold; color: red ">{{$chitiet->TieuDe}} </h3>
          <div class="row">
            <div class="col-lg-8">
              <!-- Slider Starts -->
              <?php $array =  (explode(';', $chitiet->HinhAnh)); $t=0; $i=0; ?>
              <div id="myCarousel-room" class="carousel slide">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <?php for($a=0;$a<(count($array)-1);$a++) { ?>
                    <li data-target="#myCarousel-room" data-slide-to="{{$i++}}" class="active">
                    </li>
                  <?php } ?>
                </ol>
                <div class="carousel-inner">
                  <!-- Item 1 -->
                  <?php for($a=0;$a<(count($array)-1);$a++) { ?>
                    <div class="item <?php if ($t==0) { echo 'active' ;} ?>">
                      <img  src="<?php echo asset('img/ThuePhong/'.$array[$a]) ?>" class="img-responsive" alt="properties" />
                    </div>
                    <?php $t++; }?>
                  </div>
                  <a class="left carousel-control" href="#myCarousel-room" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel-room" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                </div>
                
                <div class="spacer">
                  <h4><span class="glyphicon glyphicon-th-list"></span> Mô tả</h4>
                  <ul class="list-group">
                    <li class="list-group-item">

                      {{$chitiet->MoTa}}

                    </li>
                  </ul>
                </div>
                <div><h4 id="change-map"><span class="glyphicon glyphicon-map-marker"></span> Địa điểm </h4>

                  <div class="well" id="map" style="width:100%;height:500px"></div>
                </div>
              </div>   
              <div class="col-lg-4">
                <h4><span class="glyphicon glyphicon-info-sign"></span>Thông tin </h4>
                <ul class="list-group">
                  <li class="list-group-item">
                    <?php $tam = ''; ?>
                    <p><b>Địa chỉ:</b> {{$chitiet->DiaChi}}, {{$chitiet->phuong->TenPhuong}},
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
                    }
                    ?>
                    @endforeach
                  </p>
                  <p><b>Người đăng:</b> {{$chitiet->nguoidang->Ten}}</p>
                  <p><b>Loại tin rao:</b> {{$chitiet->loaichothue->LoaiChoThue}}</p>
                  <p><b>Ngày đăng:</b> <?php $date1 =  date_create( $chitiet->NgayBatDau); ?> {{$date1->format('d/m/Y H:i:s')}}</p>
                  <p><b>Ngày hết hạn:</b> <?php $date2 =  date_create( $chitiet->NgayKetThuc); ?> {{$date2->format('d/m/Y H:i:s')}}</p>
                  <p><b>Giá cho thuê:</b> {{$chitiet->Gia}} Triệu/Tháng</p>
                  <p><b>Diện tích:</b> {{$chitiet->DienTich}} m2</p>
                </li>
              </ul>
              <h4><span class="glyphicon glyphicon-info-sign"></span>Liên hệ </h4>
              <ul class="list-group">
                <li class="list-group-item">
                  <?php $tam = ''; ?>
                  <p><b>Tên người liên hệ:</b> {{$chitiet->TenLienHe}}</p>
                  <p><b>Địa chỉ liên lạc:</b> {{$chitiet->DiaChiLienLac}}</p>
                  <p><b>Email:</b> {{$chitiet->Email}}</p>
                </li>
              </ul>
              <p class="phone"><span class="glyphicon glyphicon-phone"></span> {{$chitiet->DienThoaiLienLac}}</p>
            </div>
          </div>




        </div>

      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE&callback=initMap"
type="text/javascript"></script>
<script type="text/javascript">
  var checkMap = false;
  $( "#change-map" ).click(function() {
    if (checkMap === false) {
      checkMap = true;
      $( "#change-map" ).html('<span class="glyphicon glyphicon-map-marker"></span> Tìm đường');
      initMap();
    }
    else {
      checkMap = false;
      $( "#change-map" ).html('<span class="glyphicon glyphicon-map-marker"></span> Địa điểm');
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
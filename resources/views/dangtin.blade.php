@section('title','Đăng ký')
@extends('layout.master_ban')
@section('content')
<div class="inside-banner">
  <div class="container"> 
    <h2>Đăng tin</h2>
  </div>
</div>
<!-- banner -->

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
  <div class="spacer">
    <div class="row register">
     @if(count($errors) > 0)
     <div class="alert alert-danger" style="font-size: 1.2em;text-align: center;margin-top: 20px;">
      @foreach($errors->all() as $err)
      {{ $err }}<br>
      @endforeach
    </div>
    @endif

    @if(session('thongbao'))
    <div class="alert alert-success" style="font-size: 1.2em;text-align: center;margin-top: 20px;">
      {{ session('thongbao') }}
    </div>
    @endif
    @if(session('canhbao'))
    <div class="alert alert-danger" style="font-size: 1.2em;text-align: center;margin-top: 20px;">
      {{ session('canhbao') }}
    </div>
    @endif
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 Sửa tin /////////-->
 <?php if(isset($kq)) { 
  $Phuong = $kq->Phuong;
  foreach ($quan as $q)
  {
    if ($q->id == $kq->phuong->ThuocQuan){
      $Quan = $q->id;
      $tam = $q->ThuocThanhPho;
    }
  }
  foreach ($thanhpho as $tp)
  {
    if($tp->id == $tam){
      $ThanhPho =  $tp->id;
    }
  }
  $array =  (explode(';', $kq->Map));
  $lat = $array[0];
  $lng = $array[1];   
  ?>
  <div class="col-lg-12 col-sm-12 col-xs-12 ">
    <input type="hidden" name="idnguoitao" id="nguoidang" value="{{ Auth::user()->id }}">
    <div class="panel panel-default">
      <div class="panel-heading" style="font-size: 20px;font-weight: bold;">THÔNG TIN CƠ BẢN</div>
      <input type="hidden" name="idtin" value="{{$kq->id}}" id="idtin" required>
      <input type="hidden" value="{{$kq->TrangThai}}" id="trangthai" >
      <div class="panel-body">
       <div class="col-lg-12">
         <label class="col-lg-2 lease-label margin-lable">Tiêu đề</label>
         <input type="text" name="tieude" class="lease-input form-control" value="{{$kq->TieuDe}}" id="tieude" required>
         <div class="class="col-lg-2"></div>
         <div id="kttieude" class="sub"></div>
       </div>
       <div class="col-lg-6">
         <label class="col-lg-4 lease-label">Loại cho thuê</label>
         <select class="form-control lease-select" name="loaichothue" id="loaichothue">
          @foreach ($loaichothue as $l)
          <?php if($l->id == $kq->LoaiChoThue) { ?>
            <option value="{{$l->id}}" selected>{{$l->LoaiChoThue}}</option>
          <?php }else { ?>
            <option value="{{$l->id}}">{{$l->LoaiChoThue}}</option>
          <?php } ?>
          @endforeach
        </select>
      </div>
      <div class="col-lg-6">
        <label class="col-lg-4 lease-label">Thành phố</label>
        <select class="form-control lease-select" name="tp" id="tp">
          <option value="0">Chọn Thành phố</option>
          @foreach ($thanhpho as $tp)
          <?php if($tp->id == $ThanhPho) { ?>
            <option value="{{$tp->id}}" selected>{{$tp->TenThanhPho}}</option>
          <?php }else { ?>
            <option value="{{$tp->id}}">{{$tp->TenThanhPho}}</option>
          <?php } ?>
          @endforeach 
        </select>
        <div id="kttp" class="sub"></div>
      </div>
      <div class="col-lg-6">
        <label class="col-lg-4 lease-label">Quận/Huyện</label>
        <select class="form-control lease-select" name="quan" id="quan">
         @foreach ($quan as $q)
         <?php if($q->id == $Quan) { ?>
          <option value="{{$q->id}}">{{$q->TenQuan}}</option>
        <?php } ?>
        @endforeach 
      </select>
      <div id="ktquan" class="sub"></div>
    </div>
    <div class="col-lg-6">
     <label class="col-lg-4 lease-label">Phường</label>
     <select class="form-control lease-select" name="phuong" id="phuong">
      @foreach ($phuong as $p)
      <?php if($p->id == $Phuong) { ?>
        <option value="{{$p->id}}">{{$p->TenPhuong}}</option>
      <?php } ?>
      @endforeach 
    </select>
    <div id="ktphuong" class="sub"></div>
  </div>
  <div class="col-lg-12">
    <label class="col-lg-2 lease-label margin-lable">Địa chỉ:</label>
    <input type="text" id="diachi" class="lease-input form-control" value="{{$kq->DiaChi}}" />
    <div class="class="col-lg-2"></div>
    <div id="ktdiachi" class="sub"></div>
    <input type="hidden" id="txtaddress" name="txtaddress" value=""  class="form-control"  />
    <input type="hidden" id="txtlat" value="{{$lat}}" name="txtlat"  class="form-control"  />
    <input type="hidden" id="txtlng"  value="{{$lng}}" name="txtlng" class="form-control" />
  </div>
  <div class="col-md-11" style="margin-left: 40px">
   <p><i class="far fa-bell"></i> Nếu địa chỉ hiển thị bên bản đồ không đúng bạn có thể điều chỉnh bằng cách kéo điểm màu xanh trên bản đồ tới vị trí chính xác.</p>
   <div id="map-canvas" style="width: auto; height: 400px;margin-bottom: 20px;padding-left: 30px;border: 1px solid black;"></div>
 </div>
 <div class="col-lg-6">
   <label class="col-lg-4 lease-label">Diện tích</label>
   <input type="number" min="0" class="form-control lease-select" value="{{$kq->DienTich}}" name="dientich" id="dientich">
   <div id="ktdt" class="sub"></div>
 </div>
 <div class="col-lg-6">
   <label class="col-lg-4 lease-label">Giá tiền</label>
   <input type="number" min="0" class="lease-select form-control" value="{{$kq->Gia}}" name="gia" id="gia">
   <div id="ktgia" class="sub"></div>
 </div>
 <div class="col-lg-12">
   <label class="col-lg-2 lease-label margin-lable">Hình ảnh</label>
   <input type="file" id='file' class="lease-input form-control" name="image[]" accept="image/*" multiple>
 </div>

 <div class="col-lg-12">
   <label class="col-lg-2 lease-label margin-lable" >Mô tả</label>
   <textarea class="lease-input form-control" name="mota" id="mota">{{$kq->MoTa}}</textarea>
 </div>
</div>
</div>
<div class="panel panel-default">
  <div class="panel-heading" style="font-size: 20px;font-weight: bold;">LIÊN HỆ</div>
  <div class="panel-body">
    <div class="col-lg-12">
     <label class="col-lg-2 lease-label margin-lable">Tên liên hệ</label>
     <input type="text" class="lease-input form-control" value="{{$kq->TenLienHe}}" name="lienhe" id="tenlienhe" >
     <div class="class="col-lg-2"></div>
     <div id="ktlienhe" class="sub"></div>
   </div>
   <div class="col-lg-12">
     <label class="col-lg-2 lease-label margin-lable">Địa chỉ liên lạc</label>
     <input type="text" class="lease-input form-control" value="{{$kq->DiaChiLienLac}}" name="diachill" id="diachill" >
     <div class="class="col-lg-2"></div>
     <div id="ktdiachill" class="sub"></div>
   </div>
   <div class="col-lg-12">
     <label class="col-lg-2 lease-label margin-lable">Điện thoại</label>
     <input type="text" class="lease-input form-control" value="{{$kq->DienThoaiLienLac}}" name="dtdd" id="dienthoai">
     <div class="class="col-lg-2"></div>
     <div id="ktdtdd" class="sub"></div>
   </div>
   <div class="col-lg-12">
     <label class="col-lg-2 lease-label margin-lable">Email</label>
     <input type="email" class="lease-input form-control" value="{{$kq->Email}}" name="email" id="email">
     <div class="class="col-lg-2"></div>
     <div id="ktemail" class="sub"></div>
   </div>
 </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading" style="font-size: 20px;font-weight: bold;">LOẠI TIN</div>
  <div class="panel-body">
    <div class="col-lg-12">
      <div class="col-lg-4">
       <label class=" lease-label">Loại tin</label>
       <select class="form-control " style="height: 50px;" name="loaitin" id="loaitin">
        <option value="0">Loại tin</option>
        @foreach ($loaitin as $l)
        <?php if($kq->LoaiTin == $l->id){ $gia = $l->Gia;
                      $date = new DateTime($kq->NgayBatDau); //
                      $date1 = $date->format('Y-m-d');
                      $date2 = new DateTime($kq->NgayKetThuc);//date(‘Y-m-d’);
                      $date3 = $date2->format('Y-m-d');
                      $songaydang = (strtotime($date3) - strtotime($date1)) / (60 * 60 * 24);
                      ?>
                      <option value="{{$l->id}};{{$l->Gia}}" selected>{{$l->LoaiTin}}</option>
                    <?php }else{ ?>
                      <option value="{{$l->id}};{{$l->Gia}}">{{$l->LoaiTin}}</option>
                    <?php } ?>
                    @endforeach
                  </select>
                  <div id="ktloaitin" class="sub"></div>
                </div>
                <?php if ($kq->TrangThai == 1){ ?>
                  <div class="col-lg-4">
                   <label class="lease-label">Số ngày muốn gia hạn thêm</label>
                   <input type="number" class=" form-control" name="ngaygiahan" id="ngaygiahan" value="0">
                   <input type="hidden" class=" form-control" name="ngayketthuc" id="ngayketthuc" value="<?php echo date('Y-m-d',strtotime($kq->NgayKetThuc)) ?>">
                   <input type="hidden" class=" form-control" name="ngaybatdau" id="ngaybatdau" value="<?php echo date('Y-m-d',strtotime($kq->NgayBatDau)) ?>">
                 </div>
                 <div class="col-lg-4">
                   <label class="lease-label">Ngày kết thúc</label>
                   <input type="date" class=" form-control" name="ngayketthuc" id="ngayketthuc" disabled="disabled" value="<?php echo date('Y-m-d',strtotime($kq->NgayKetThuc)) ?>">
                   <div id="ktngayketthuc" class="sub"></div>
                 </div>
               <?php }else{ ?>
                 <div class="col-lg-4">
                   <label class="lease-label">Ngày bắt đầu</label>
                   <input type="date" class=" form-control" name="ngaybatdau" id="ngaybatdau" value="<?php echo date('Y-m-d',strtotime($kq->NgayBatDau)) ?>">
                 </div>
                 <div class="col-lg-4">
                   <label class="lease-label">Ngày kết thúc</label>
                   <input type="date" class=" form-control" name="ngayketthuc" id="ngayketthuc" value="<?php echo date('Y-m-d',strtotime($kq->NgayKetThuc)) ?>">
                   <div id="ktngayketthuc" class="sub"></div>
                 </div>
               <?php } ?>
             </div>
             <div class="col-lg-12">
               <label class="col-lg-4 lease-label" id="dongia">Đơn giá: {{number_format($gia)}} VNĐ</label>
               <label class="col-lg-4 lease-label" id="songaydang">Số ngày đăng: {{number_format($songaydang)}}</label>
               <label class="col-lg-4 lease-label" id="tongtien">Tổng tiền: {{number_format($kq->TongTien)}}</label>
               <input type="hidden" name="tongtien" value="{{$kq->TongTien}}" id="tongtiencu" required>
               <input type="hidden" name="giacu" value="{{$gia}}" id="giacu" required>
             </div>
           </div>
         </div>
         <div class="col-lg-12">
           <div class="col-lg-5"></div>
           <button class="btn btn-detail" name="Submit" onClick="SuaTin()" style="width: 20%;font-size: 18px">CẬP NHẬT</button>
         </div>
       </div>
     <?php  } else { ?>
      <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
      <div class="col-lg-12 col-sm-12 col-xs-12 ">
        <input type="hidden" name="idnguoitao" id="nguoidang" value="{{ Auth::user()->id }}">
        <div class="panel panel-default">
          <div class="panel-heading" style="font-size: 20px;font-weight: bold;">THÔNG TIN CƠ BẢN</div>
          <div class="panel-body">
           <div class="col-lg-12">
             <label class="col-lg-2 lease-label margin-lable">Tiêu đề</label>
             <input type="text" name="tieude" class="lease-input form-control" placeholder="Tên đầy đủ" id="tieude" required>
             <div class="class="col-lg-2"></div>
             <div id="kttieude" class="sub"></div>
           </div>
           <div class="col-lg-6">
             <label class="col-lg-4 lease-label">Loại cho thuê</label>
             <select class="form-control lease-select" name="loaichothue" id="loaichothue">
              @foreach ($loaichothue as $l)
              <option value="{{$l->id}}">{{$l->LoaiChoThue}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-lg-6">
            <label class="col-lg-4 lease-label">Thành phố</label>
            <select class="form-control lease-select" name="tp" id="tp">
              <option value="0">Chọn Thành phố</option>
              @foreach ($thanhpho as $tp)
              <option value="{{$tp->id}}">{{$tp->TenThanhPho}}</option>
              @endforeach 
            </select>
            <div id="kttp" class="sub"></div>
          </div>
          <div class="col-lg-6">
            <label class="col-lg-4 lease-label">Quận/Huyện</label>
            <select class="form-control lease-select" name="quan" id="quan">
              <option value="0">Chọn Quận/Huyện</option>
            </select>
            <div id="ktquan" class="sub"></div>
          </div>
          <div class="col-lg-6">
           <label class="col-lg-4 lease-label">Phường</label>
           <select class="form-control lease-select" name="phuong" id="phuong">
            <option value="0">Chọn Phường</option>
          </select>
          <div id="ktphuong" class="sub"></div>
        </div>
        <div class="col-lg-12">
          <label class="col-lg-2 lease-label margin-lable">Địa chỉ:</label>
          <input type="text" id="diachi" class="lease-input form-control" value="" />
          <div class="class="col-lg-2"></div>
          <div id="ktdiachi" class="sub"></div>
          <input type="hidden" id="txtaddress" name="txtaddress" value=""  class="form-control"  />
          <input type="hidden" id="txtlat" value="" name="txtlat"  class="form-control"  />
          <input type="hidden" id="txtlng"  value="" name="txtlng" class="form-control" />
        </div>
        <div class="col-md-11" style="margin-left: 40px">
         <p><i class="far fa-bell"></i> Nếu địa chỉ hiển thị bên bản đồ không đúng bạn có thể điều chỉnh bằng cách kéo điểm màu xanh trên bản đồ tới vị trí chính xác.</p>
         <div id="map-canvas" style="width: auto; height: 400px;margin-bottom: 20px;padding-left: 30px;border: 1px solid black;"></div>
       </div>
       <div class="col-lg-6">
         <label class="col-lg-4 lease-label">Diện tích</label>
         <input type="number" min="0" class="form-control lease-select" placeholder="Diện tích (m2)" name="dientich" id="dientich">
         <div id="ktdt" class="sub"></div>
       </div>
       <div class="col-lg-6">
         <label class="col-lg-4 lease-label">Giá tiền</label>
         <input type="number" min="0" class="lease-select form-control" placeholder="Giá tiền (triệu/tháng)" name="gia" id="gia">
         <div id="ktgia" class="sub"></div>
       </div>
       <div class="col-lg-12">
         <label class="col-lg-2 lease-label margin-lable">Hình ảnh</label>
         <input type="file" id='file' class="lease-input form-control" name="image[]" accept="image/*" multiple>
       </div>

       <div class="col-lg-12">
         <label class="col-lg-2 lease-label margin-lable" >Mô tả</label>
         <textarea class="lease-input form-control" name="mota" id="mota"></textarea>
       </div>
     </div>
   </div>
   <div class="panel panel-default">
    <div class="panel-heading" style="font-size: 20px;font-weight: bold;">LIÊN HỆ</div>
    <div class="panel-body">
      <div class="col-lg-12">
       <label class="col-lg-2 lease-label margin-lable">Tên liên hệ</label>
       <input type="text" class="lease-input form-control" placeholder="Liên hệ" name="lienhe" id="tenlienhe" >
       <div class="class="col-lg-2"></div>
       <div id="ktlienhe" class="sub"></div>
     </div>
     <div class="col-lg-12">
       <label class="col-lg-2 lease-label margin-lable">Địa chỉ liên lạc</label>
       <input type="text" class="lease-input form-control" placeholder="Địa chỉ" name="diachill" id="diachill" >
       <div class="class="col-lg-2"></div>
       <div id="ktdiachill" class="sub"></div>
     </div>
     <div class="col-lg-12">
       <label class="col-lg-2 lease-label margin-lable">Điện thoại</label>
       <input type="text" class="lease-input form-control" placeholder="Điện thoại di động" name="dtdd" id="dienthoai">
       <div class="class="col-lg-2"></div>
       <div id="ktdtdd" class="sub"></div>
     </div>
     <div class="col-lg-12">
       <label class="col-lg-2 lease-label margin-lable">Email</label>
       <input type="email" class="lease-input form-control" placeholder="Email" name="email" id="email">
       <div class="class="col-lg-2"></div>
       <div id="ktemail" class="sub"></div>
     </div>
   </div>
 </div>
 <div class="panel panel-default">
  <div class="panel-heading" style="font-size: 20px;font-weight: bold;">LOẠI TIN</div>
  <div class="panel-body">
    <div class="col-lg-12">
      <div class="col-lg-4">
       <label class=" lease-label">Loại tin</label>
       <select class="form-control " style="height: 50px;" name="loaitin" id="loaitin">
        <option value="0">Loại tin</option>
        @foreach ($loaitin as $l)
        <option value="{{$l->id}};{{$l->Gia}}">{{$l->LoaiTin}}</option>
        @endforeach
      </select>
      <div id="ktloaitin" class="sub"></div>
    </div>
    <div class="col-lg-4">
     <label class="lease-label">Ngày bắt đầu</label>
     <input type="date" class=" form-control" name="ngaybatdau" id="ngaybatdau">
   </div>
   <div class="col-lg-4">
     <label class="lease-label">Ngày kết thúc</label>
     <input type="date" class=" form-control" name="ngayketthuc" id="ngayketthuc">
     <div id="ktngayketthuc" class="sub"></div>
   </div>
 </div>
 <div class="col-lg-12">
   <label class="col-lg-4 lease-label" id="dongia">Đơn giá</label>
   <label class="col-lg-4 lease-label" id="songaydang">Số ngày đăng</label>
   <label class="col-lg-4 lease-label" id="tongtien">Tổng tiền</label>
 </div>
</div>
</div>
<div class="col-lg-12">
 <div class="col-lg-5"></div>
 <button class="btn btn-detail" name="Submit" onClick="DangTin()" style="width: 20%;font-size: 18px">ĐĂNG TIN</button>
</div>
</div>
<?php  } ?>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
</div>
</div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE&callback=initialize&libraries=geometry,places" async defer></script>
<script type="text/javascript">
  // test map
  var map;
  var marker;
  function initialize(){
    mapOptions = {
      center: {lat: 12.256442, lng: 109.171656},
      zoom: 17
    };
    map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
  // Get GEOLOCATION
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
        position.coords.longitude);
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({
        'latLng': pos
      }, function (results, status) {
        if (status ==
          google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            console.log(results[0].formatted_address);
          } else {
            console.log('No results found');
          }
        } else {
          console.log('Geocoder failed due to: ' + status);
        }
      });
      map.setCenter(pos);
      marker = new google.maps.Marker({
        position: pos,
        map: map,
        draggable: true
      });
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
  function handleNoGeolocation(errorFlag) {
    if (errorFlag) {
      var content = 'Error: The Geolocation service failed.';
    } else {
      var content = 'Error: Your browser doesn\'t support geolocation.';
    }
    var lat = $('#txtlat').val();
    var lng = $('#txtlng').val();
    var options;
    if(lat != '' && lng != '')
    {
      options = {
        map: map,
        zoom: 17,
        position: new google.maps.LatLng(lat,lng),
        content: content
      };

    }
    else
    {
      options = {
        map: map,
        zoom: 17,
        position: new google.maps.LatLng(10.769444,106.681944),
        content: content
      };
    }

    map.setCenter(options.position);
    marker = new google.maps.Marker({
      position: options.position,
      map: map,
      zoom: 19,
      icon: "{{url("img/gps.png")}}",
      draggable: true
    });
    /* Dragend Marker */ 
    google.maps.event.addListener(marker, 'dragend', function() {
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            $('#diachi').val(results[0].formatted_address);
            $('#txtaddress').val(results[0].formatted_address);
            $('#txtlat').val(marker.getPosition().lat());
            $('#txtlng').val(marker.getPosition().lng());
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);
          }
        }
      });
    });
    /* End Dragend */

  }

  // get places auto-complete when user type in diachi
  var input = /** @type {HTMLInputElement} */
  (
    document.getElementById('diachi'));
  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  var infowindow = new google.maps.InfoWindow();
  marker = new google.maps.Marker({
    map: map,
    icon: "{{url("img/gps.png")}}",
    anchorPoint: new google.maps.Point(0, -29),
    draggable: true
  });

  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    infowindow.close();
    marker.setVisible(false);
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      return;
    }
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({'latLng': place.geometry.location}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          $('#txtaddress').val(results[0].formatted_address);
          infowindow.setContent(results[0].formatted_address);
          infowindow.open(map, marker);
        }
      }
    });
    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17); // Why 17? Because it looks good.
    }
    marker.setIcon( /** @type {google.maps.Icon} */ ({
      url: "{{url("img/gps.png")}}"
    }));
    document.getElementById('txtlat').value = place.geometry.location.lat();
    document.getElementById('txtlng').value = place.geometry.location.lng();
    console.log(place.geometry.location.lat());
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);


    var address = '';
    if (place.address_components) {
      address = [
      (place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }
    /* Dragend Marker */ 
    google.maps.event.addListener(marker, 'dragend', function() {
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            $('#diachi').val(results[0].formatted_address);
            $('#txtlat').val(marker.getPosition().lat());
            $('#txtlng').val(marker.getPosition().lng());
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);

          }
        }
      });
    });
    /* End Dragend */
  });

}
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
  var changeday1=false,changeday2=false;tienthaydoi=false;
  function DangTin()
  {
    var data = new FormData();
    var check = 0;
    var dem = 0;
    jQuery.each(jQuery('#file')[0].files, function(i, file) {
      data.append('file'+i, file);
      dem++;
    });
    data.append('dem', dem);
    if($('#tieude').val() == '')
    {
      document.getElementById("tieude").style.marginBottom = "0";
      $('#kttieude').html('*Vui lòng nhập tiêu đề');
      check++;
    }
    if($('#dientich').val() == '' || $('#dientich').val() <=0)
    {
      document.getElementById("dientich").style.marginBottom = "0";
      $('#ktdt').html('*Vui lòng nhập diện tích');
      check++;
    }
    if($('#gia').val() == '' || $('#gia').val() <=0 )
    {
      document.getElementById("gia").style.marginBottom = "0";
      $('#ktgia').html('*Vui lòng nhập giá cho thuê');
      check++;
    }
    if($('#tenlienhe').val() == '')
    {
      document.getElementById("tenlienhe").style.marginBottom = "0";
      $('#ktlienhe').html('*Vui lòng nhập tên liên hệ');
      check++;
    }
    if($('#diachi').val() == '')
    {
      document.getElementById("diachi").style.marginBottom = "0";
      $('#ktdiachi').html('*Vui lòng nhập địa chỉ liên lạc');
      check++;
    }
    if($('#dienthoai').val() == '')
    {
      document.getElementById("dienthoai").style.marginBottom = "0";
      $('#ktdtdd').html('*Vui lòng nhập điện thoại liên lạc');
      check++;
    }
    else
    {
      var sdt = document.getElementById('dienthoai').value;
      if (!checkPhoneNumber()) {
        document.getElementById("dienthoai").style.marginBottom = "0";
        $('#ktdtdd').html('*Vui lòng nhập đúng định dạng điện thoại');
      }
      else
      {
        document.getElementById("dienthoai").style.marginBottom = "20px";
        $('#ktdtdd').html('');
      }
    }
    if($('#email').val() != '')
    {
      var email = document.getElementById('email'); 
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
      if (!filter.test(email.value)) { 
        document.getElementById("email").style.marginBottom = "0";
        $('#ktemail').html('*Hãy nhập địa chỉ email hợp lệ.Example@gmail.com');
        check++;
      }
      else
      {
        $('#ktemail').html('');
      }
    }
    if($('#loaitin').val() == 0)
    { 
     document.getElementById("loaitin").style.marginBottom = "0";
     $('#ktloaitin').html('*Vui lòng chọn loại tin');
     check++;
   }
   if($('#ngayketthuc').val() == 0)
   { 
     document.getElementById("ngayketthuc").style.marginBottom = "0";
     $('#ktngayketthuc').html('*Vui lòng chọn ngày kết thúc');
     check++;
   }
   if($('#tp').val() == 0)
   { 
     document.getElementById("tp").style.marginBottom = "0";
     $('#kttp').html('*Vui lòng chọn thành phố');
     check++;
   }
   if($('#quan').val() == 0)
   { 
     document.getElementById("quan").style.marginBottom = "0";
     $('#ktquan').html('*Vui lòng chọn quận');
     check++;
   }
   if($('#phuong').val() == 0)
   { 
     document.getElementById("phuong").style.marginBottom = "0";
     $('#ktphuong').html('*Vui lòng chọn phường');
     check++;
   }

   if(check == 0)
   {
    var tongtien,kt;
    var gia = $('#loaitin').val().substring(2);
    var d2 = new Date($('#ngayketthuc').val());
    var d1 = new Date($('#ngaybatdau').val());
    var offset = d2.getTime() - d1.getTime();
    var totalDays = Math.round(offset / 1000 / 60 / 60 / 24);
    if($('#loaitin').val() != 0)
    {
      tongtien = gia*totalDays;
    }
    loaitin =  $('#loaitin').val().substring(0,1);
    data.append('tieude', $('#tieude').val());
    data.append('loaichothue', $('#loaichothue').val());
    data.append('tp', $('#tp').val());
    data.append('tieude', $('#tieude').val());
    data.append('loaichothue', $('#loaichothue').val());
    data.append('quan', $('#quan').val());
    data.append('phuong', $('#phuong').val());
    data.append('dientich', $('#dientich').val());
    data.append('gia', $('#gia').val());
    data.append('mota', $('#mota').val());
    data.append('tenlienhe', $('#tenlienhe').val());
    data.append('diachill', $('#diachill').val());
    data.append('dienthoai', $('#dienthoai').val());
    data.append('ngaybatdau', $('#ngaybatdau').val());
    data.append('ngayketthuc', $('#ngayketthuc').val());
    data.append('tongtien', tongtien);
    data.append('loaitin', loaitin);
    data.append('email', $('#email').val());
    data.append('nguoidang', $('#nguoidang').val());
    data.append('tongngay',totalDays);
    var string = $('#txtaddress').val();
    diachi = string.substring(0,string.indexOf(","));
    data.append('diachi', diachi);
    diachichinhxac = $('#txtlat').val() + ';' + $('#txtlng').val();
    data.append('map',diachichinhxac);
    $.ajax({
      type:'get',
      url:'{{ url("kiemtratien") }}',
      data:{tongtien:tongtien},
      async: true,
      success:function(html){
        kt = html;
        if(kt == 1)
        {
          alert('Bạn không đủ tiền để thực hiện việc đăng bài. Vui lòng nạp thêm tiền.')
        }
        else
        {
          $.ajax({
            type:'post',
            url:'{{url("postdangtin")}}',
            data: data,
            processData: false, contentType: false,
            async: true,
            success:function(html){
             alert(JSON.stringify(html));
           }
         });
        }
      }
    });
  }
}
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        function SuaTin()
        {
          var data = new FormData();
          var check = 0;
          var dem = 0;
          jQuery.each(jQuery('#file')[0].files, function(i, file) {
            data.append('file'+i, file);
            dem++;
          });
          data.append('dem', dem);
          if($('#tieude').val() == '')
          {
            document.getElementById("tieude").style.marginBottom = "0";
            $('#kttieude').html('*Vui lòng nhập tiêu đề');
            check++;
          }
          if($('#dientich').val() == '')
          {
            document.getElementById("dientich").style.marginBottom = "0";
            $('#ktdt').html('*Vui lòng nhập diện tích');
            check++;
          }
          if($('#gia').val() == '')
          {
            document.getElementById("gia").style.marginBottom = "0";
            $('#ktgia').html('*Vui lòng nhập giá cho thuê');
            check++;
          }
          if($('#tenlienhe').val() == '')
          {
            document.getElementById("tenlienhe").style.marginBottom = "0";
            $('#ktlienhe').html('*Vui lòng nhập tên liên hệ');
            check++;
          }
          if($('#diachi').val() == '')
          {
            document.getElementById("diachi").style.marginBottom = "0";
            $('#ktdiachi').html('*Vui lòng nhập địa chỉ liên lạc');
            check++;
          }
          if($('#dienthoai').val() == '')
          {
            document.getElementById("dienthoai").style.marginBottom = "0";
            $('#ktdtdd').html('*Vui lòng nhập điện thoại liên lạc');
            check++;
          }
          else
          {
            var sdt = document.getElementById('dienthoai').value;
            var filter = /^[0-9-+]+$/;
            if (!filter.test(sdt)) {
              document.getElementById("dienthoai").style.marginBottom = "0";
              $('#ktdtdd').html('*Vui lòng nhập đúng định dạng điện thoại');
            }
            else
            {
              document.getElementById("dienthoai").style.marginBottom = "20px";
              $('#ktdtdd').html('');
            }
          }
          if($('#email').val() != '')
          {
            var email = document.getElementById('email'); 
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
            if (!filter.test(email.value)) { 
              document.getElementById("email").style.marginBottom = "0";
              $('#ktemail').html('*Hãy nhập địa chỉ email hợp lệ.Example@gmail.com');
              check++;
            }
            else
            {
              $('#ktemail').html('');
            }
          }
          if($('#loaitin').val() == 0)
          { 
           document.getElementById("loaitin").style.marginBottom = "0";
           $('#ktloaitin').html('*Vui lòng chọn loại tin');
           check++;
         }
         if($('#ngayketthuc').val() == 0)
         { 
           document.getElementById("ngayketthuc").style.marginBottom = "0";
           $('#ktngayketthuc').html('*Vui lòng chọn ngày kết thúc');
           check++;
         }
         if($('#tp').val() == 0)
         { 
           document.getElementById("tp").style.marginBottom = "0";
           $('#kttp').html('*Vui lòng chọn thành phố');
           check++;
         }
         if($('#quan').val() == 0)
         { 
           document.getElementById("quan").style.marginBottom = "0";
           $('#ktquan').html('*Vui lòng chọn quận');
           check++;
         }
         if($('#phuong').val() == 0)
         { 
           document.getElementById("phuong").style.marginBottom = "0";
           $('#ktphuong').html('*Vui lòng chọn phường');
           check++;
         }
         if(check == 0)
         {
          var tongtien;
          var gia = $('#loaitin').val().substring(2);
          var giacu = $('#giacu').val();
          var d2 = new Date($('#ngayketthuc').val());
          var d1 = new Date($('#ngaybatdau').val());
          var offset = d2.getTime() - d1.getTime();
          var totalDays;
          var kt;
           // xac dinh tong tien neu tang gia loai tin, tang ngay,      
          if($('#loaitin').val() != 0)
          {
            if($('#trangthai').val() == 1)
            {
              var today = new Date();
              var tgconlai = d2.getTime() - today.getTime();
              var tongngayconlai = Math.round(tgconlai / 1000 / 60 / 60 / 24);
              if($('#ngaygiahan').val() != 0)
              {
                var totalDays = $('#ngaygiahan').val();
                tongtien = gia*totalDays;
                giatien = gia*tongngayconlai;
                tienthem = giatien - (giacu*tongngayconlai);
                tongtien = tongtien+tienthem;
              }
              else
              {
                totalDays = Math.round(offset / 1000 / 60 / 60 / 24);
                tongtien = gia*totalDays;
                giatien = gia*tongngayconlai;
                tienthem = giatien - (giacu*tongngayconlai);
              }
            }
            else
            {
              totalDays = Math.round(offset / 1000 / 60 / 60 / 24);
              tongtien = gia*totalDays;
              tienthem = (gia*totalDays) - (giacu*totalDays);
            }
          }
          loaitin =  $('#loaitin').val().substring(0,1);
          data.append('tieude', $('#tieude').val());
          data.append('loaichothue', $('#loaichothue').val());
          data.append('tp', $('#tp').val());
          data.append('tieude', $('#tieude').val());
          data.append('loaichothue', $('#loaichothue').val());
          data.append('quan', $('#quan').val());
          data.append('phuong', $('#phuong').val());
          data.append('dientich', $('#dientich').val());
          data.append('gia', $('#gia').val());
          data.append('mota', $('#mota').val());
          data.append('tenlienhe', $('#tenlienhe').val());
          data.append('diachill', $('#diachill').val());
          data.append('dienthoai', $('#dienthoai').val());
          data.append('ngaybatdau', $('#ngaybatdau').val());
          data.append('ngayketthuc', $('#ngayketthuc').val());
          data.append('tongtien', tongtien);
          data.append('loaitin', loaitin);
          data.append('email', $('#email').val());
          data.append('nguoidang', $('#nguoidang').val());
          data.append('idtin', $('#idtin').val());
          data.append('giatin', gia);
          var string = $('#txtaddress').val();

          if(string == '')
          {
            data.append('diachi', $('#diachi').val());
          }
          else
          {
            diachi = string.substring(0,string.indexOf(","));
            data.append('diachi', diachi);
          }
          diachichinhxac = $('#txtlat').val() + ';' + $('#txtlng').val();
          data.append('map',diachichinhxac);
          if(changeday2 == true || $('#ngaygiahan').val() != undefined && $('#ngaygiahan').val() != 0)
          {
            data.append('ngaygiahan', gia);
            $.ajax({
              type:'get',
              url:'{{ url("kiemtratien") }}',
              data:{tongtien:tongtien},
              async: true,
              success:function(html){
                kt = html;
                if(kt == 1)
                {
                  alert('Bạn không đủ tiền để thực hiện việc đăng bài. Vui lòng nạp thêm tiền.')
                }
                else
                {
                  data.append('tam', 1);
                  $.ajax({
                    type:'post',
                    url:'{{url("postsuatin")}}',
                    data: data,
                    processData: false, contentType: false,
                    async: true,
                    success:function(html){
                     alert(JSON.stringify(html));
                     window.location='{{url("tindadang")}}';
                   }
                 });
                }
              }
            });
          }
          else
          {
            var today = new Date();
            var ngaytam = $('#ngayketthuc').val();
            var ngaytam_date =  new Date($('#ngayketthuc').val());
            if(today < ngaytam_date)
            {
             if(tienthaydoi == true)
             {
              data.append('tienthaydoi', tienthem );
            }
            data.append('tam', 0);
            $.ajax({
              type:'post',
              url:'{{url("postsuatin")}}',
              data: data,
              processData: false, contentType: false,
              async: true,
              success:function(html){
               alert(JSON.stringify(html));
               window.location='{{url("tindadang")}}';
             }
           });
          }
          else
          {
            alert('Bạn chưa thực hiện gia hạn.');
          }
        }

      }
    }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $(document).ready(function(){ 
          var trangthai = $('#trangthai').val();
          var totalDays,gia,checkdate = false,ngaytam;
          var today = new Date();
          ngaytam = $('#ngayketthuc').val();
          ngaytam_date =  new Date($('#ngayketthuc').val());
          
          var tam = $('#ngaybatdau').val();
          var tam_date =  new Date($('#ngaybatdau').val())
          if( trangthai == 2 && (tam_date>today))
          {
            $('#ngaybatdau').attr('disabled', 'disabled');
            $('#ngayketthuc').attr('disabled', 'disabled');
          }
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
          $('#gia').on('change',function(){
            if($('#gia').val() <= 0)
            {
              $('#gia').val('1');
            }
            if($('#gia').val() > 100)
            {
              $('#gia').val('100');
            }
          });
          $('#ngaygiahan').on('change',function(){
            if($('#ngaygiahan').val() > 100)
            {
              $('#ngaygiahan').val('100');
            }
            if($('#ngaygiahan').val() < 0)
            {
              $('#ngaygiahan').val('0');
            }
            if($('#ngaygiahan').val() != 0)
            {
              var today = new Date();
              var giacu = $('#giacu').val();
              var d2 = new Date($('#ngayketthuc').val());
              var d1 = new Date($('#ngaybatdau').val());
              var tgconlai = d2.getTime() - today.getTime();
              var tongngayconlai = Math.round(tgconlai / 1000 / 60 / 60 / 24);
              var totalDays = $('#ngaygiahan').val();
              tongtien = gia*totalDays;
              giatien = gia*tongngayconlai;
              tienthem = giatien - (giacu*tongngayconlai);
              tongtien = Number(tongtien)+Number(tienthem);
              gia = $('#loaitin').val().substring(2);
              totalDays = $('#ngaygiahan').val();
              $('#songaydang').html("Số ngày gia hạn thêm: " + totalDays + " ngày");
              if($('#loaitin').val() != 0)
              {
                var tongtien = gia*totalDays;
                tongtien = format_number(tongtien,0,'.','.');
                $('#tongtien').html('Tổng tiền thêm: ' +tongtien+' VND');
              }
            }
          });
          $('#dientich').on('change',function(){
            if($('#dientich').val() <= 0)
            {
              $('#dientich').val('1');
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
          $('#ngaybatdau').on('change',function(){
            var tam = new Date($('#ngaybatdau').val());
            changeday1 = true;
            if(ngaytam == '')
            {
              if(tam < today)
              {
                alert('Vui lòng chọn ngày bắt đầu từ hôm nay');
                document.getElementById("ngaybatdau").valueAsDate = new Date();
              }
            }
            else
            {
              if ($('#ngaybatdau').val() <= $('#ngayketthuc').val() && $('#ngayketthuc').val() != '' && ngaytam_date > today)
              {
                alert('Vui lòng chọn ngày bắt đầu sau ngày kết thúc trước đó');
                $('#ngaybatdau').val($('#ngayketthuc').val());
                $('#ngayketthuc').val('');
              }
              else
              {
                if(tam < today)
                {
                  alert('Vui lòng chọn ngày bắt đầu từ hôm nay');
                  document.getElementById("ngaybatdau").valueAsDate = new Date();
                  $('#ngayketthuc').val('');
                }
              }
            }
            if ($('#ngaybatdau').val() >= $('#ngayketthuc').val() && $('#ngayketthuc').val() != '' && checkdate == true)
            {
              alert('Vui lòng chọn ngày bắt đầu trước ngày kết thúc');
              $('#ngayketthuc').val('');
            }
          });
          // $('#ngaybatdau-sua').on('change',function(){
          //   var today = new Date();
          //   var tam = new Date($('#ngaybatdau').val());
          //   if ($('#ngaybatdau').val() > $('#ngayketthuc').val() && $('#ngayketthuc').val() != '')
          //     {
          //       alert('Vui lòng chọn ngày bắt đầu trước ngày kết thúc');
          //       $('#ngayketthuc').val('');
          //     }
          // });
          $('#ngayketthuc').on('change',function(){
            if($('#ngaybatdau').val() == '' || changeday1 == false)
            {
              if(ngaytam != '')
              {
                alert('Vui lòng chọn ngày bắt đầu trước');
                $('#ngayketthuc').val(ngaytam);
              }
              else
              {
                alert('Vui lòng chọn ngày bắt đầu trước');
                $('#ngayketthuc').val('');
              }
            }
            else
            {
              if ($('#ngaybatdau').val() >= $('#ngayketthuc').val())
              {
                alert('Vui lòng chọn ngày kết thúc sau ngày bắt đầu');
                $('#ngayketthuc').val('');
              }
              else
              {
                gia = $('#loaitin').val().substring(2);
                var d2 = new Date($('#ngayketthuc').val());
                var d1 = new Date($('#ngaybatdau').val());
                var offset = d2.getTime() - d1.getTime();
                totalDays = Math.round(offset / 1000 / 60 / 60 / 24);
                $('#songaydang').html("Số ngày đăng: " + totalDays + " ngày");
                if($('#loaitin').val() != 0)
                {
                  var tongtien = gia*totalDays;
                  tongtien = format_number(tongtien,0,'.','.');
                  $('#tongtien').html('Tổng tiền: ' +tongtien+' VND');
                }
                changeday2 = true;
                checkdate = true;
              }
            }
          });

          function format_number(number, decimals, dec_point, thousands_sep)
          {
            var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
            var d = dec_point == undefined ? "," : dec_point;
            var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
            var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
            return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
          }

          var loaitin = $('#loaitin').val()
          var loaitindau =  $('#loaitin').val().substring(0,1);

          $('#loaitin').on('change',function(){
            gia = $(this).val().substring(2);
            var loaitinsau = $(this).val().substring(0,1);
            if(loaitin < loaitinsau && $('#trangthai').val() == 1)
            {
              alert('Bạn không thể hạ loại tin thấp hơn');
              $(this).val(loaitin);
            }
            else
            {
              if($('#ngaygiahan').val() != 0 && $('#ngaygiahan').val() != undefined)
              {
                gia_tam = format_number(gia,0,'.','.');
                $('#dongia').html('Đơn giá: '+gia_tam+' VND');
                var today = new Date();
                var giacu = $('#giacu').val();
                var d2 = new Date($('#ngayketthuc').val());
                var d1 = new Date($('#ngaybatdau').val());
                var tgconlai = d2.getTime() - today.getTime();
                var tongngayconlai = Math.round(tgconlai / 1000 / 60 / 60 / 24);
                var totalDays = $('#ngaygiahan').val();
                tongtien = gia*totalDays;
                giatien = gia*tongngayconlai;
                tienthem = giatien - (giacu*tongngayconlai);
                tongtien = Number(tongtien)+Number(tienthem);
                gia = $('#loaitin').val().substring(2);
                totalDays = $('#ngaygiahan').val();
                $('#songaydang').html("Số ngày gia hạn thêm: " + totalDays + " ngày");
                if($('#loaitin').val() != 0)
                {
                  tongtien = format_number(tongtien,0,'.','.');
                  $('#tongtien').html('Tổng tiền thêm: ' +tongtien+' VND');
                }
                alert();
              }
              else
              {
                gia_tam = format_number(gia,0,'.','.');
                $('#dongia').html('Đơn giá: '+gia_tam+' VND');
                if($('#ngayketthuc').val() != '' && $('#ngaybatdau').val() != '')
                {
                  var tgconlai;
                  var today = new Date();
                  var d2 = new Date($('#ngayketthuc').val());
                  var d1 = new Date($('#ngaybatdau').val());
                  if(d1 < today)
                  {
                    tgconlai = d2.getTime() - today.getTime();
                  }
                  else
                  {
                     tgconlai = d2.getTime() - d1.getTime();
                  } 
                  var tongngayconlai = Math.round(tgconlai / 1000 / 60 / 60 / 24);
                  var giacu = $('#giacu').val();
                  var offset = d2.getTime() - d1.getTime();
                  total = Math.round(offset / 1000 / 60 / 60 / 24);
                  if(changeday2 == false && loaitindau != loaitinsau && $('#trangthai').val() != 2 )
                  {
                    giatien = gia*tongngayconlai;
                    tienthem = giatien - (giacu*tongngayconlai);
                    tienthaydoi = true;
                    tongtien = format_number(tienthem,0,'.','.');
                    $('#tongtien').html('Tổng tiền thêm: ' +tongtien+' VND');
                  }
                  else
                  {
                    $('#songaydang').html("Số ngày đăng: " + total + " ngày");
                    var tongtien = gia*total;
                    tongtienin = format_number(tongtien,0,'.','.');
                    $('#tongtien').html('Tổng tiền: ' +tongtienin+' VND');
                  }
                }
              }
            }
          });
          
        });
      </script>
      @endsection
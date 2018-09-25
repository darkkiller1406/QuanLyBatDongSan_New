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
        <form method="post" action="{{route('timDat_ban')}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="col-lg-2 col-sm-2 ">
            <select class="form-control" name="tp" id="tp">
              <option value="0">Chọn thành phố</option>
              @foreach ($thanhpho as $tp)
              <option value="{{$tp->id}}">{{$tp->TenThanhPho}}</option>
              @endforeach 
            </select>
          </div>
          <div class="col-lg-2 col-sm-2">
            <select class="form-control" name="quan" id="quan">
              <option value="0">Chọn thành phố</option>
            </select>
          </div>
          <div class="col-lg-2 col-sm-2">
            <select class="form-control" name="dt">
              <option value="0">Diện tích</option>
              <option value="1"> < 50 m2</option>
              <option value="2">50 - 80m2</option>
              <option value="3">80 - 120m2</option>
              <option value="4">120 - 160m2</option>
            </select>
          </div>
          <div class="col-lg-2 col-sm-2">
            <select class="form-control" name="gia">
              <option value="0">Khoảng giá</option>
              <option value="1">< 800 triệu</option>
              <option value="2">800 triệu - 1,5 tỷ</option>
              <option value="3">1,5 tỷ - 2,5 tỷ</option>
              <option value="4">2,5 tỷ - 4 tỷ</option>
            </select>
          </div>
          <div class="col-lg-2 col-sm-2">
            <select class="form-control" name="huong">
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
          <h4>LỰA CHỌN HOT</h4>
          <hr>
          @foreach ($top as $d)
          <?php 
          $array =  (explode(';', $d->HinhAnh)); $hinh = $array[0]; ?>

          <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="<?php echo asset('img/'.$hinh) ?>" class="img-responsive" class="img-responsive img-circle" alt="properties"/></div>
            <div class="col-lg-8 col-sm-7">
              <h5><a href="../chitiet/{{$d->id}}">Đất {{$d->TenQuan}}</a></h5>
              <p class="price">{{number_format(($d->DienTich)*($d->DonGia))}} VNĐ</p> </div>
            </div>
            <hr>
            @endforeach

          </div>
          @foreach ($thanhpho as $tp)
          <?php
          if($tp->id == $chitiet->quan->ThuocThanhPho){
           $idtam = $tp->id;
           $tentam = $tp->TenThanhPho;
         }
         ?>
         @endforeach
         <input type="hidden" id="vitri" value="{{$chitiet->DiaChi}},{{$chitiet->quan->TenQuan}},{{$tentam}}">
       </div>

       <div class="col-lg-9 col-sm-8 ">
        <h2>Bán đất {{$chitiet->quan->TenQuan}} </h2>
        <div class="row">
          <div class="col-lg-8">
            <div class="property-images">
              <!-- Slider Starts -->
              <?php $array =  (explode(';', $chitiet->HinhAnh)); $t= 0; $i=0; ?>
              <div id="myCarousel-dat" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators hidden-xs">
                  <?php for($a=0;$a<(count($array)-1);$a++) { ?>
                    <li data-target="#myCarousel-dat" data-slide-to="{{$i++}}" class="active"></li>
                  <?php } ?>
                </ol>
                <div class="carousel-inner">
                  <!-- Item 1 -->
                  <?php for($a=0;$a<(count($array)-1);$a++) { ?>
                    <div class="item <?php if ($t==0) { echo 'active' ;} ?>">
                      <img  src="<?php echo asset('img/'.$array[$a]) ?>" class="img-responsive" alt="properties" />
                    </div>
                    <?php $t++; }?>
                  </div>
                  <a class="left carousel-control" href="#myCarousel-dat" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel-dat" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                </div>
              </div>   
              <!-- #Slider Ends -->






              <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span>Mô tả</h4>
                <?php $array_mota =  (explode('.', $chitiet->GhiChu));?>
                @foreach ($array_mota as $a)
                <p>{{$a}}<br><p>
                  @endforeach


                </div>
                <div><h4><span class="glyphicon glyphicon-map-marker"></span> Location </h4>
                  <div class="well" id="map" style="width:100%;height:500px"></div>
                </div>

              </div>
              <div class="col-lg-4">
                <div class="col-lg-12  col-sm-6">
                  <div class="property-info">
                    <p class="price">{{number_format(($chitiet->DienTich)*($chitiet->DonGia))}} VNĐ</p>          
                  </div>
                  <br>
                  <h6><span class="glyphicon glyphicon-info-sign"></span>THÔNG TIN</h6>
                  <ul class="list-group">
                    <li class="list-group-item">
                      <p><b>Địa chỉ:</b> {{$chitiet->DiaChi}}, {{$chitiet->quan->TenQuan}}, {{$tentam}}</p>
                      <div class="listing-detail">
                        <b>Hướng:</b> {{$chitiet->Huong}} <br>
                        <b>Rộng:</b> {{$chitiet->Rong}}m <br>
                        <b>Dài:</b> {{$chitiet->Dai}}m <br>
                        <b>Nở hậu:</b> {{$chitiet->NoHau}}m <br>
                        <b>Diện tích:</b> {{$chitiet->DienTich}}m2
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-12 col-sm-6 ">
                  <?php if($chitiet->TrangThai ==0 )
                  { ?>
                    <div class="enquiry">
                      <h6><span class="glyphicon glyphicon-envelope"></span>GỬI YÊU CẦU</h6>
                      <form role="form" method="post" action="{{route('ThemYeuCau')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="iddat" value="{{$chitiet->id}}">
                        <input type="text" class="form-control" name="ten" placeholder="Tên đầy đủ" required />
                        <input type="mail" class="form-control" name="email" placeholder="Email" required />
                        <input type="text" class="form-control" name="dt" id="dt" placeholder="Điện thoại liên lạc" required />
                        <textarea rows="6" class="form-control" name="yeucau" placeholder="Yêu cầu" required></textarea>
                        <button type="submit" class="btn btn-primary" id="submit" name="Submit">Gửi</button>
                      </form>
                    </div>

                  <?php } elseif($chitiet->TrangThai ==1 ){ ?>
                    <div class="alert alert-warning" style="font-size: 2em;text-align: center;margin-top: 20px;">
                      Đang giao dịch
                    </div>
                  <?php } else {?>   
                    <div class="alert alert-danger" style="font-size: 2em;text-align: center;margin-top: 20px;">
                      Đã bán
                    </div> 
                  <?php }?>     
                  @if(count($errors) > 0)
                  <div class="alert alert-danger" style="font-size: 0.9em;text-align: center;margin-top: 20px;">
                    @foreach($errors->all() as $err)
                    {{ $err }}<br>
                    @endforeach
                  </div>
                  @endif

                  @if(session('thongbao'))
                  <div class="alert alert-success" style="font-size: 0.9em;text-align: center;margin-top: 20px;">
                    {{ session('thongbao') }}
                  </div>
                  @endif
                  @if(session('canhbao'))
                  <div class="alert alert-danger" style="font-size: 0.9em;text-align: center;margin-top: 20px;">
                    {{ session('canhbao') }}
                  </div>
                  @endif
                </div>

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
    function initMap() {

      var vitri =  $('#vitri').val();
      var mapCanvas = document.getElementById("map");
      var myCenter = new google.maps.LatLng(10.769444,106.681944); 
      var mapOptions = {center: myCenter, zoom: 17};
      var map = new google.maps.Map(mapCanvas,mapOptions);
      var geocoder = new google.maps.Geocoder();
      geocodeAddress(geocoder,map,vitri);

    }
    function geocodeAddress(geocoder, resultsMap,vitri) {
      var address = vitri;
      geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
          resultsMap.setCenter(results[0].geometry.location);
          var marker = new google.maps.Marker({
            map: resultsMap,
            position: results[0].geometry.location

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
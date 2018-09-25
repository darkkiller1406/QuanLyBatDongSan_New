@section('title','Quản lý dự án')
@extends('layout.master')
@section('content')
<section id="main-content">
  <section class="wrapper">
    <h3>QUẢN LÝ DỰ ÁN</h3>

    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel">
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
          <div class="form-group">
            <div class="col-md-2 col-sm-2 control-label"></div>
            <div class="col-md-6">
             <div id="custom-search-input">
              <div class="input-group col-md-12">
               <input type="text" id="search" class="form-control input-md" placeholder="Tìm kiếm" />
               <span class="input-group-btn">
                <button class="btn btn-info btn-lg">
                 <i class="glyphicon glyphicon-search"></i>
               </button>
             </span>
           </div>
         </div>
       </div>
       <div class="col-md-3 col-sm-2 control-label"><button type="button" class="btn btn-theme" data-toggle="modal" data-target="#themda"><i class="fa fa-plus"></i></button></div>
     </div>
     <table id="dtable" class="table table-striped table-advance table-hover table-ed">
       <hr>
       <thead>
        <tr>
         <th>STT</th>
         <th>Mã dự án</th>
         <th>Tên dự án</th>
         <th>Vị trí</th>
         <th>Tổng số lô</th>
         <th>Diện tích mỗi lô đất</th>
         <th></th>
       </tr>
     </thead>
     <tbody>
      <?php $i=0 ?>
       @foreach($duan as $da)
       <tr>
         <td>{{++$i}}</td>
         <td>{{$da->MaDuAn}}</td>
         <td>{{$da->TenDuAn}}</td>
         <td>{{$da->ViTri}}</td>
         <td>{{$da->TongSoLo}}</td>
         <td>{{$da->DienTichLo}} m2</td>
         <td></td>
         <td>
          <button class="btn btn-success btn-xs" 
          data-idda="{{$da->id}}"
          data-mada="{{$da->MaDuAn}}"
          data-tenda="{{$da->TenDuAn}}"
          data-vitri="{{$da->ViTri}}"
          data-tongdt="{{$da->TongDienTich}}"
          data-dtlo="{{$da->DienTichLo}}"
          data-tonglo="{{$da->TongSoLo}}"
          data-chudautu="{{$da->ChuDauTu}}"
          data-hinh='<?php echo asset('img/'.$da->HinhAnh) ?>'
          data-ngaytao='
          <?php $date=date_create($da->created_at);
          echo date_format($date,"d/m/Y H:i:s") ?>'
          data-ngaycapnhat='
          <?php $date=date_create($da->updated_at);
          echo date_format($date,"d/m/Y H:i:s") ?>'
          data-nguoitao="{{$da->nguoitao->TenNhanVien}}"
          data-toggle="modal" data-target="#chitiet"><i class="fas fa-info"></i></button>
          <button class="btn btn-primary btn-xs"
          data-idda="{{$da->id}}"
          data-mada="{{$da->MaDuAn}}"
          data-tenda="{{$da->TenDuAn}}"
          data-vitri="{{$da->ViTri}}"
          data-tongdt="{{$da->TongDienTich}}"
          data-dtlo="{{$da->DienTichLo}}"
          data-tonglo="{{$da->TongSoLo}}"
          data-chudautu="{{$da->ChuDauTu}}"
          data-hinh='<?php echo asset('img/'.$da->HinhAnh) ?>'
          data-ngaytao='
          <?php $date=date_create($da->created_at);
          echo date_format($date,"d/m/Y H:i:s") ?>'
          data-ngaycapnhat='
          <?php $date=date_create($da->updated_at);
          echo date_format($date,"d/m/Y H:i:s") ?>'
          data-nguoitao="{{$da->NguoiTao}}"
          data-toggle="modal" data-target="#suada"><i class="fas fa-edit"></i></button>
          <button class="btn btn-danger btn-xs classXoa" idbd="{{$da->id}}" id="{{$da->id}}" onClick="reply_click(this.id)"><i class="fas fa-trash"></i></button>
          <input type="hidden" >
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div><!-- /content-panel -->
</div><!-- /col-md-12 -->
</div><!-- /row -->

</section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->

<!--main content end-->
<!-- Modal chi tiết -->
<div class="modal fade" id="chitiet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">CHI TIẾT DỰ ÁN</h4>
      </div>
      <div class="modal-body">
       <!-- BASIC FORM ELELEMNTS -->
       <div class="row">
        <div class="col-md-12">
          <table class="table table-hover">
            <thead>
              <tr>
                <td>Ảnh dự án</td>
                <td><a id="link" href="" target="_blank"><img src="" id="hinh" width='200'></a></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Mã dự án</td>
                <td id='mada'></td>
              </tr>
              <tr>
                <td>Tên dự án</td>
                <td id="tenda"></td>
              </tr>
              <tr>
                <td>Tổng diện tích</td>
                <td id="tongdt"></td>
              </tr>
              <tr>
                <td>Diện tích mỗi lô đất</td>
                <td id="dtlo"></td>
              </tr>
              <tr>
                <td>Tổng số lô đất</td>
                <td id="tonglo"></td>
              </tr>
              <tr>
                <td>Chủ đầu tư</td>
                <td id="chudautu"></td>
              </tr>
              <tr>
                <td>Ngày tạo</td>
                <td id="created_at"></td>
              </tr>
              <tr>
                <td>Ngày cập nhật</td>
                <td id="updated_at"></td>
              </tr>
              <tr>
                <td>Người tạo</td>
                <td id="nguoitao"></td>
              </tr>
              <tr>
                <td>Vị trí</td>
                <td id="vitri"></td>
              </tr>
              <tr>
                <td>Vị trí trên bản đồ</td>
                <td class="col-md-10" ><div id="map" style="width:100%;height:500px"></div></td>
              </tr>
            </tbody>
          </table>
        </div><!-- /col-md-12 -->   
      </div><!-- /row -->
    </div>
  </div>
</div>
</div>              
</div><!-- /showback -->
</section>
<!-- Modal Thêm -->
<div class="modal fade" id="themda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">THÊM DỰ ÁN</h4>
      </div>
      <div class="modal-body">
       <!-- BASIC FORM ELELEMNTS -->
       <div class="row">
        <div class="col-lg-12">
          <div class="form-panel">
            <form class="form-horizontal style-form" method="post" action="{{route('post_ThemDA')}}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="idnguoitao" value="{{ Auth::user()->id }}">
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Tên dự án</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name='tenda' required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Tổng diện tích</label>
                <div class="col-sm-9">
                  <input type="number" name="tongdt" class="form-control" required>
                </div>
                <label class="col-sm-1 control-label">m2</label>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Tổng số lô</label>
                <div class="col-sm-10">
                  <input type="number" name="tonglo" id="tonglo" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Vị trí</label>
                <div class="col-sm-10">
                  <input type="text" name="vitri" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Diện tích mỗi lô</label>
                <div class="col-sm-9">
                  <input type="text" name="dtlo" id="dtlo" class="form-control" required>
                </div>
                <label class="col-sm-1 control-label">m2</label>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Chủ đầu tư</label>
                <div class="col-sm-10">
                  <input type="text" name="chudautu" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Hình ảnh</label>
                <div class="col-sm-10">
                  <input type="file" name="image" class="form-control" required />
                </div>
              </div>
              <div class="col-md-6"></div>
              <button type="submit" id="submitbtn" name="submitbtn" class="btn btn-primary" >Thêm</button>
            </form>
          </div>
        </div><!-- col-lg-12-->       
      </div><!-- /row -->
    </div>
  </div>
</div>
</div>              
</div><!-- /showback -->
<!-- Modal Sửa -->
<div class="modal fade" id="suada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">SỬA THÔNG TIN DỰ ÁN</h4>
      </div>
      <div class="modal-body">
       <!-- BASIC FORM ELELEMNTS -->
       <div class="row">
        <div class="col-lg-12">
          <div class="form-panel">
            <form class="form-horizontal style-form" method="post" action="{{route('post_SuaDA')}}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="idnguoitao" value="{{ Auth::user()->id }}">
              <input type="hidden" name="idda" id="idda" >
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Tên dự án</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name='tenda' id="tenda" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Tổng diện tích</label>
                <div class="col-sm-9">
                  <input type="number" name="tongdt" class="form-control" id="tongdt" required>
                </div>
                <label class="col-sm-1 control-label">m2</label>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Tổng số lô</label>
                <div class="col-sm-10">
                  <input type="number" name="tonglo" class="form-control" id="tonglo" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Vị trí</label>
                <div class="col-sm-10">
                  <input type="text" name="vitri" class="form-control" id="vitri">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Diện tích mỗi lô</label>
                <div class="col-sm-9">
                  <input type="text" name="dtlo" class="form-control" id="dtlo" required>
                </div>
                <label class="col-sm-1 control-label">m2</label>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Chủ đầu tư</label>
                <div class="col-sm-10">
                  <input type="text" name="chudautu" class="form-control" id="chudautu" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Hình ảnh</label>
                <div class="col-sm-10">
                  <input type="file" name="image" class="form-control"/>
                </div>
              </div>
              <div class="col-md-5"></div>
              <button type="submit" id="submitbtn" name="submitbtn" class="btn btn-primary" >Cập nhật</button>
            </form>
          </div>
        </div><!-- col-lg-12-->       
      </div><!-- /row -->
    </div>
  </div>
</div>
</div>              
</div><!-- /showback -->
@endsection
@section('script')
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('js/common-scripts.js')}}"></script>
<script type="text/javascript">
      // chi tiết
      function initMap(vitri) {
        var mapCanvas = document.getElementById("map");
        var myCenter = new google.maps.LatLng(10.769444,106.681944); 
        var mapOptions = {center: myCenter, zoom: 15};
        var map = new google.maps.Map(mapCanvas,mapOptions);
        var marker = new google.maps.Marker({
          position: myCenter,
          animation: google.maps.Animation.BOUNCE,
          mapTypeId: google.maps.MapTypeId.HYBRID
        });
        marker.setMap(map);
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
      $('#chitiet').on('show.bs.modal', function (event) {
        console.log('open');
        var button = $(event.relatedTarget) // Button that triggered the modal
        var mada = button.data('mada')
        var tenda = button.data('tenda')
        var vitri = button.data('vitri')
        var tongdt = button.data('tongdt')
        var dtlo = button.data('dtlo')
        var tonglo = button.data('tonglo')
        var chudautu = button.data('chudautu')
        var hinh = button.data('hinh')
        var created_at = button.data('ngaytao')
        var updated_at = button.data('ngaycapnhat')
        var nguoitao = button.data('nguoitao')
        var modal = $(this)
        modal.find('.modal-body #mada').html(mada);
        modal.find('.modal-body #tenda').html(tenda);
        modal.find('.modal-body #vitri').html(vitri);
        modal.find('.modal-body #tongdt').html(tongdt+"m2");
        modal.find('.modal-body #dtlo').html(dtlo+"m2");
        modal.find('.modal-body #tonglo').html(tonglo);
        modal.find('.modal-body #chudautu').html(chudautu);
        modal.find('.modal-body #created_at').html(created_at);
        modal.find('.modal-body #updated_at').html(updated_at);
        modal.find('.modal-body #nguoitao').html(nguoitao);
        document.getElementById("link").href = hinh;
        document.getElementById("hinh").src = hinh;
        initMap(vitri);
       })
        // sua
        $('#suada').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var idda = button.data('idda')// Extract info from data-* attributes
        var mada = button.data('mada')
        var tenda = button.data('tenda')
        var vitri = button.data('vitri')
        var tongdt = button.data('tongdt')
        var dtlo = button.data('dtlo')
        var tonglo = button.data('tonglo')
        var chudautu = button.data('chudautu')
        var created_at = button.data('ngaytao')
        var updated_at = button.data('ngaycapnhat')
        var nguoitao = button.data('nguoitao')
        var modal = $(this)
        modal.find('.modal-body #idda').val(idda);
        modal.find('.modal-body #mada').html(mada);
        modal.find('.modal-body #tenda').val(tenda);
        modal.find('.modal-body #vitri').val(vitri);
        modal.find('.modal-body #tongdt').val(tongdt);
        modal.find('.modal-body #dtlo').val(dtlo);
        modal.find('.modal-body #tonglo').val(tonglo);
        modal.find('.modal-body #chudautu').val(chudautu);
        })
        // map
        
        /// ajax
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        function reply_click(clicked_id)
        {
          var kq=  confirm('Bạn muốn xóa không ?');
          if(kq==true){
            var id = clicked_id;
            location.href='xoada/'+id;
          }
        }
        $(document).ready(function(){
          $("#search").keyup(function() {
            $.ajax({
              type:'get',
              url: '{{ url("page/timda") }}',
              data: {name:$("#search").val()},
              async: true,
              success: function(data){
                $("#dtable").html(data);
              }
            });
          });
        });
      </script>

      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnYFDJ7BW8yaet9yNSAA-A0eBBFULQf40"
  type="text/javascript"></script>
      @endsection
@section('title','Quản lý đất')
@extends('layout.master')
@section('content')
<section id="main-content">
  <section class="wrapper">
    <h3>QUẢN LÝ ĐẤT</h3>

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
       <div class="col-md-3 col-sm-2 control-label"><button type="button" class="btn btn-theme" data-toggle="modal" data-target="#them"><i class="fa fa-plus"></i></button></div>
     </div>
     <table id="dtable" class="table table-striped table-advance table-hover table-ed">
       <hr>
       <thead>
        <tr>
         <th>STT</th>
         <th>Ký hiệu lô đất</th>
         <th>Đơn giá đất</th>
         <th>Tổng giá trị lô đất</th>
         <th>Vị trí</th>
         <th>Trạng thái</th>
         <th></th>
       </tr>
     </thead>
     <tbody>
      <?php $i=0;$idtam; $tentam ?>
       @foreach($dat as $d)
       <!--  -->
          @foreach ($thanhpho as $tp)
                      <?php
                      if($tp->id == $d->quan->ThuocThanhPho){
                         $idtam = $tp->id;
                         $tentam = $tp->TenThanhPho;
                      }
                      ?>
                      @endforeach
          <!--  -->
       <tr>
         <td>{{++$i}}</td>
         <td>{{$d->KyHieuLoDat}}</td>
         <td>{{number_format($d->DonGia)}} VND/m2</td>
         <td>{{number_format($d->Gia)}} VND</td>
         <td>{{$d->DiaChi}},{{$d->quan->TenQuan}},{{$tentam}}</td>
         <td><?php 
          if ($d->TrangThai == 0){echo 'Hiện có';}
          if ($d->TrangThai == 1){echo 'Đang giao dịch';}
          if ($d->TrangThai == 2){echo 'Đã bán';}
          ?></td>
         <td></td>
         <td>
          <button class="btn btn-success btn-xs" 
          data-iddat="{{$d->id}}"
          data-mald="{{$d->KyHieuLoDat}}"
          data-dongia="{{number_format($d->DonGia)}}"
          data-gia = "{{number_format($d->Gia)}}"
          data-rong="{{$d->Rong}}"
          data-dientich= "{{$d->DienTich}}"
          data-dai="{{$d->Dai}}"
          data-nohau="{{$d->NoHau}}"
          data-huong="{{$d->Huong}}"
          data-sohuu="{{$d->khachhang->HoVaTenDem}} {{$d->khachhang->Ten}}"
          data-hinh="{{$d->HinhAnh}}"
          data-trangthai="{{$d->TrangThai}}"
          data-ghichu="{{$d->GhiChu}}"
          data-luotxem="{{$d->LuotXem}}"
          data-vitri="{{$d->DiaChi}},{{$d->quan->TenQuan}},{{$tentam}}"
          data-ngaytao='
          <?php $date=date_create($d->created_at);
          echo date_format($date,"d/m/Y H:i:s") ?>'
          data-ngaycapnhat='
          <?php $date=date_create($d->updated_at);
          echo date_format($date,"d/m/Y H:i:s") ?>'
          data-toggle="modal" data-target="#chitiet"><i class="fas fa-info"></i></button>
          <?php if ($d->TrangThai == 0) { ?>
          <button class="btn btn-primary btn-xs"
          data-iddat="{{$d->id}}"
          data-mald="{{$d->KyHieuLoDat}}"
          data-dongia="{{($d->DonGia)}}"
          data-gia = "{{($d->Gia)}}"
          data-rong="{{$d->Rong}}"
          data-dientich= "{{$d->DienTich}}"
          data-dai="{{$d->Dai}}"
          data-nohau="{{$d->NoHau}}"
          data-huong="{{$d->Huong}}"
          data-sohuu="{{$d->SoHuu}}"
          data-hinh="{{$d->HinhAnh}}"
          data-trangthai="{{$d->TrangThai}}"
          data-ghichu="{{$d->GhiChu}}"
          data-luotxem="{{$d->LuotXem}}"
          data-diachi="{{$d->DiaChi}}"
          data-quan="{{$d->Quan}}"
          data-thanhpho="{{$idtam}}"
          data-ngaytao='
          <?php $date=date_create($d->created_at);
          echo date_format($date,"d/m/Y H:i:s") ?>'
          data-ngaycapnhat='
          <?php $date=date_create($d->updated_at);
          echo date_format($date,"d/m/Y H:i:s") ?>'
          data-nguoitao="{{$d->NguoiTao}}"
          data-toggle="modal" data-target="#sua"><i class="fas fa-edit"></i></button>
        <?php } ?>
          <button class="btn btn-danger btn-xs classXoa" idbd="{{$d->id}}" id="{{$d->id}}" onClick="reply_click(this.id)"><i class="fas fa-trash"></i></button>
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
        <h4 class="modal-title" id="myModalLabel">Chi tiết đât</h4>
      </div>
      <div class="modal-body">
       <!-- BASIC FORM ELELEMNTS -->
       <div class="row">
        <div class="col-md-12">
          <table class="table table-hover">
            <thead>
              <tr>
                <td class="col-md-2">Ký hiệu lô đất</td>
                <td id='mald'></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="col-md-2">Đơn giá đât</td>
                <td id="dongia"></td>
              </tr>
              <tr>
                <td class="col-md-2">Tổng giá trị lô đất</td>
                <td id="gia"></td>
              </tr>
              <tr>
                <td class="col-md-2">Chiều rộng</td>
                <td id="rong"></td>
              </tr>
              <tr>
                <td class="col-md-2">Chiều dài</td>
                <td id="dai"></td>
              </tr>
              <tr>
                <td class="col-md-2">Nở hậu</td>
                <td id="nohau"></td>
              </tr>
              <tr>
                <td class="col-md-2">Diện tích</td>
                <td id="dt"></td>
              </tr>
              <tr>
                <td class="col-md-2">Hướng</td>
                <td id="huong"></td>
              </tr>
              <tr>
                <td class="col-md-2">Vị trí</td>
                <td id="vitri"></td>
              </tr>
              <tr>
                <td class="col-md-2">Người sở hữu</td>
                <td id="sohuu"></td>
              </tr>
              <tr>
                <td class="col-md-2">Trạng thái</td>
                <td id="trangthai"></td>
              </tr>
              <tr>
                <td class="col-md-2">Lượt xem</td>
                <td id="luotxem"></td>
              </tr>
              <tr>
                <td class="col-md-2">Mô tả</td>
                <td id="ghichu"></td>
              </tr>
              <tr>
                <td class="col-md-2">Hình ảnh</td>
                <td >
                  <div class="row">
                    <div class="col-md-4" >
                          <img src="" alt="Lights" id="hinh0" style="display:none;">
                    </div>
                    <div class="col-md-4">
                          <img src="" id="hinh1" style="display:none;">
                    </div>
                    <div class="col-md-4">
                          <img src=""  id="hinh2" style="display:none;">
                    </div>
                  </div>
                </td>
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
<div class="modal fade" id="them" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">ĐẤT</h4>
      </div>
      <div class="modal-body">
       <!-- BASIC FORM ELELEMNTS -->
       <div class="row">
        <div class="col-lg-12">
          <div class="form-panel">
            <form id="upload" class="form-horizontal style-form" method="post" action="{{route('post_ThemDAT')}}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="idnguoitao" value="{{ Auth::user()->id }}">
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Ký hiệu lô đất</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name='mald' id="mald" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Địa chỉ</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name='diachi' required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Quận</label>
                <div class="col-sm-10">
                  <select class="form-control" name="quan">
                    @foreach ($quan as $l)
                    <option value="{{$l->id}}">{{$l->TenQuan}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Thành phố</label>
                <div class="col-sm-10">
                  <select class="form-control" name="tp">
                    @foreach ($thanhpho as $tp)
                    <option value="{{$tp->id}}">{{$tp->TenThanhPho}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Người sở hữu</label>
                <div class="col-sm-10">
                  <select class="form-control" name="sohuu">
                    @foreach ($khachhang as $kh)
                    <option value="{{$kh->id}}">{{$kh->HoVaTenDem}} {{$kh->Ten}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Đơn giá</label>
                <div class="col-sm-9">
                  <input type="number" name="dongia" id="dongiathem" class="form-control" required>
                </div>
                <label class="col-sm-1 control-label">VND/m2</label>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Chiều rộng</label>
                <div class="col-sm-9">
                  <input type="number" name="rong" id="rongthem" class="form-control" required>
                </div>
                <label class="col-sm-1 control-label">m</label>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Chiều dài</label>
                <div class="col-sm-9">
                  <input type="number" name="dai" id="daithem" class="form-control" required>
                </div>
                <label class="col-sm-1 control-label">m</label>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Nở hậu</label>
                <div class="col-sm-9">
                  <input type="number" name="nohau" id="nohauthem" class="form-control" required>
                </div>
                <label class="col-sm-1 control-label">m</label>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Hướng</label>
                <div class="col-sm-10">
                  <select class="form-control" name="huong">
                  <option value="Đông">Đông</option>
                  <option value="Tây">Tây</option>
                  <option value="Nam">Nam</option>
                  <option value="Bắc">Bắc</option>
                  <option value="Đông-Nam">Đông-Nam</option>
                  <option value="Đông-Bắc">Đông-Bắc</option>
                  <option value="Tây-Nam">Tây-Nam</option>
                  <option value="Tây-Bắc">Tây-Bắc</option>
                </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Mô tả</label>
                <div class="col-sm-10">
                  <textarea type="textarea" name="ghichu" class="form-control"></textarea>
                </div>
              </div>
               <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Hình ảnh</label>
                <div class="col-sm-10">
                  <input type="file" name="image[]" multiple class="form-control" required />
                </div>
              </div>
              <div class="col-md-6">
              </div>
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
<div class="modal fade" id="sua" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">SỬA THÔNG TIN LÔ ĐẤT</h4>
      </div>
      <div class="modal-body">
       <!-- BASIC FORM ELELEMNTS -->
       <div class="row">
        <div class="col-lg-12">
          <div class="form-panel">
            <form class="form-horizontal style-form" method="post" action="{{route('post_SuaDAT')}}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="idnguoitao" value="{{ Auth::user()->id }}">
              <input type="hidden" name="iddat" id="iddat">
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Ký hiệu lô đất</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name='mald' id="mald" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Địa chỉ</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name='diachi' id="diachi" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Quận</label>
                <div class="col-sm-10">
                  <select class="form-control" name="quan" id="quan">
                    @foreach ($quan as $l)
                    <option value="{{$l->id}}">{{$l->TenQuan}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Thành phố</label>
                <div class="col-sm-10">
                  <select class="form-control" name="tp" id="tp">
                    @foreach ($thanhpho as $tp)
                    <option value="{{$tp->id}}">{{$tp->TenThanhPho}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Người sở hữu</label>
                <div class="col-sm-10">
                  <select class="form-control" name="sohuu" id="sohuu">
                    @foreach ($khachhang as $kh)
                    <option value="{{$kh->id}}">{{$kh->HoVaTenDem}} {{$kh->Ten}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Đơn giá</label>
                <div class="col-sm-9">
                  <input type="number" name="dongia" id="dongia" class="form-control" required>
                </div>
                <label class="col-sm-1 control-label">VND/m2</label>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Chiều rộng</label>
                <div class="col-sm-9">
                  <input type="number" name="rong" id="rong" class="form-control" required>
                </div>
                <label class="col-sm-1 control-label">m</label>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Chiều dài</label>
                <div class="col-sm-9">
                  <input type="number" name="dai" id="dai" class="form-control" required>
                </div>
                <label class="col-sm-1 control-label">m</label>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Nở hậu</label>
                <div class="col-sm-9">
                  <input type="number" name="nohau" id="nohau" class="form-control" required>
                </div>
                <label class="col-sm-1 control-label">m</label>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Hướng</label>
                <div class="col-sm-10">
                  <select class="form-control" name="huong" id="huong">
                  <option value="Đông">Đông</option>
                  <option value="Tây">Tây</option>
                  <option value="Nam">Nam</option>
                  <option value="Bắc">Bắc</option>
                  <option value="Đông-Nam">Đông-Nam</option>
                  <option value="Đông-Bắc">Đông-Bắc</option>
                  <option value="Tây-Nam">Tây-Nam</option>
                  <option value="Tây-Bắc">Tây-Bắc</option>
                </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Mô tả</label>
                <div class="col-sm-10">
                  <textarea type="textarea" name="ghichu" id="ghichu" class="form-control"></textarea>
                </div>
              </div>
               <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Hình ảnh</label>
                <div class="col-sm-10">
                  <input type="file" name="image[]" class="form-control"/>
                </div>
              </div>
              <div class="col-md-5">
              </div>
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
      // chi tiết
      $('#chitiet').on('show.bs.modal', function (event) {
        console.log('open');
        for(var i = 0; i < 3; i++)
        {
          document.getElementById("hinh"+i).src = "";
        }
        var button = $(event.relatedTarget) // Button that triggered the modal
        var mald = button.data('mald')
        var rong = button.data('rong')
        var dongia = button.data('dongia')
        var vitri = button.data('vitri')
        var dai = button.data('dai')
        var dientich = button.data('dientich')
        var nohau = button.data('nohau')
        var huong = button.data('huong')
        var sohuu = button.data('sohuu')
        var ghichu = button.data('ghichu')
        var trangthai = button.data('trangthai')
        var luotxem = button.data('luotxem')
        var created_at = button.data('ngaytao')
        var updated_at = button.data('ngaycapnhat')
        var hinhanh = button.data('hinh')
        var gia = button.data('gia')
        var splitted = hinhanh.split(";");
        var modal = $(this)
        for(var i = 0; i < (splitted.length-1); i++)
        {
          document.getElementById("hinh"+i).src = "../img/"+splitted[i];
          document.getElementById("hinh"+i).style = "width:100% ";
        }
        modal.find('.modal-body #mald').html(mald);
        modal.find('.modal-body #gia').html(gia+' VND');
        modal.find('.modal-body #dt').html(dientich+'m2');
        modal.find('.modal-body #dongia').html(dongia+' VND/m2')
        modal.find('.modal-body #rong').html(rong+'m');
        modal.find('.modal-body #dai').html(dai+'m');
        modal.find('.modal-body #nohau').html(nohau+'m');
        modal.find('.modal-body #huong').html(huong);
        modal.find('.modal-body #vitri').html(vitri);
        if (trangthai == 2)
        {
          modal.find('.modal-body #trangthai').html('Đã bán');
        }
        if (trangthai == 1)
        {
          modal.find('.modal-body #trangthai').html('Đang giao dịch');
        }
        if (trangthai == 0)
        {
          modal.find('.modal-body #trangthai').html('Hiện có');
        }
        modal.find('.modal-body #luotxem').html(luotxem);
        modal.find('.modal-body #sohuu').html(sohuu);
        modal.find('.modal-body #ghichu').html(ghichu);
        modal.find('.modal-body #created_at').html(created_at);
        modal.find('.modal-body #updated_at').html(updated_at);
        initMap(vitri);
      })
        // sua
        $('#sua').on('show.bs.modal', function (event) {
          console.log('opensua');
        var button = $(event.relatedTarget) // Button that triggered the modal
        var iddat = button.data('iddat') // Extract info from data-* attributes
        var mald = button.data('mald')
        var rong = button.data('rong')
        var dongia = button.data('dongia')
        var vitri = button.data('vitri')
        var dai = button.data('dai')
        var dientich = button.data('dientich')
        var nohau = button.data('nohau')
        var huong = button.data('huong')
        var sohuu = button.data('sohuu')
        var ghichu = button.data('ghichu')
        var trangthai = button.data('trangthai')
        var diachi = button.data('diachi')
        var quan = button.data('quan')
        var thanhpho = button.data('thanhpho')
        var luotxem = button.data('luotxem')
        var created_at = button.data('ngaytao')
        var updated_at = button.data('ngaycapnhat')
        var hinhanh = button.data('hinh')
        var gia = button.data('gia')
        var modal = $(this)
        modal.find('.modal-body #iddat').val(iddat);
        modal.find('.modal-body #mald').val(mald);
        modal.find('.modal-body #dongia').val(dongia)
        modal.find('.modal-body #gia').val(gia)
        modal.find('.modal-body #rong').val(rong);
        modal.find('.modal-body #dai').val(dai);
        modal.find('.modal-body #nohau').val(nohau);
        modal.find('.modal-body #huong').val(huong);
        modal.find('.modal-body #diachi').val(diachi);
        modal.find('.modal-body #quan').val(quan);
        modal.find('.modal-body #thanhpho').val(tp);
        modal.find('.modal-body #ghichu').val(ghichu);
        modal.find('.modal-body #created_at').val(created_at);
        modal.find('.modal-body #updated_at').val(updated_at);
        })
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
            location.href='xoadat/'+id;
          }
        }
        $(document).ready(function(){
           $('#dongia').on('change',function(){
            if($('#dongia').val() <= 0)
            {
              $('#dongia').val('1');
            }
          });
           $('#rong').on('change',function(){
            if($('#rong').val() <= 0)
            {
              $('#rong').val('1');
            }
          });
           $('#dai').on('change',function(){
            if($('#dai').val() <= 0)
            {
              $('#dai').val('1');
            }
          });
           $('#nohau').on('change',function(){
            alert($('#nohau').val());
            if($('#nohau').val() < 0)
            {
              $('#nohau').val('0');
            }
          });
          $('#dongiathem').on('change',function(){
            if($('#dongiathem').val() <= 0)
            {
              $('#dongiathem').val('1');
            }
          });
           $('#daithem').on('change',function(){
            if($('#daithem').val() <= 0)
            {
              $('#daithem').val('1');
            }
          });
           $('#nohauthem').on('change',function(){
            if($('#nohauthem').val() < 0)
            {
              $('#nohauthem').val('0');
            }
          });
           $('#rongthem').on('change',function(){
            if($('#rongthem').val() <= 0)
            {
              $('#rongthem').val('1');
            }
          });

          $("#search").keyup(function() {
            $.ajax({
              type:'get',
              url: '{{ url("page/timdat") }}',
              data: {name:$("#search").val()},
              async: true,
              success: function(data){
                $("#dtable").html(data);
              }
            });
          });
        });
      </script>
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE"
  type="text/javascript"></script>
      @endsection
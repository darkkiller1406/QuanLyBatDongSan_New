@section('title','Quản lý yêu cầu')
@extends('layout.master')
@section('content')
<section id="main-content">
  <section class="wrapper">
    <h3>QUẢN LÝ YÊU CẦU</h3>

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
          <form method="post" action="{{route('TKTD')}}">
            {{csrf_field()}}
            <div class="form-group">
              <div class="col-md-3 col-sm-1 control-label"></div>
              <div class="col-md-5">
                <div class="form-group">
                  <input type="date" name="ngay" class="form-control" value="<?php echo date('Y-m-d') ?>">
                </div>
              </div>
              <div class="col-md-1 col-sm-1 control-label"><button type="submit" class="btn btn-theme"><i class="fas fa-search"></i></button></div>
            </div>
          </form>
      <?php if(isset($kq)) { ?>
          <table id="dtable" class="table table-striped table-advance table-hover table-ed">
       <hr>
       <thead>
        <tr>
         <th>STT</th>
         <th>Nguời đăng tin</th>
         <th>Địa chỉ</th>
         <th>Loại tin</th>
         <th>Loại cho thuê</th>
         <th>Thời gian gửi</th>
         <th>Trạng thái</th>
         <th></th>
       </tr>
     </thead>
     <tbody>
      <?php $i=0;
      ?>
      @foreach($kq as $p)
      <tr>
       <td>{{++$i}}</td>
       <td>{{$p->name}}</td>
       <td>{{$p->DiaChi}}, {{$p->TenPhuong}}, {{$p->TenQuan}}, {{$p->TenThanhPho}}</td>
       <td>{{$p->loaitin}}</td>
       <td>{{$p->loaichothue}}</td>
       <td><?php $date=date_create($p->ngaydang);
       echo date_format($date,"d/m/Y H:i:s") ?></td>
       <th><?php if(($p->TrangThai) == 1) {echo "Đang đăng";}else{echo "Đã ngừng đăng";} ?></th>
       <td></td>
       <td>
        <button class="btn btn-info btn-xs" 
        data-idphong="{{$p->id}}"
        data-tieude="{{$p->TieuDe}}"
        data-diachi="{{$p->DiaChi}}, {{$p->TenPhuong}}, {{$p->TenQuan}}, {{$p->TenThanhPho}}"
        data-dientich="{{$p->DienTich}}"
        data-gia="{{$p->Gia}}"
        data-mota="{{$p->MoTa}}"
        data-hinhanh="{{$p->HinhAnh}}"
        data-loaitin="{{$p->loaitin}}"
        data-loaichothue="{{$p->loaichothue}}"
        data-nguoidang="{{$p->name}}"
        data-trangthai="{{$p->TrangThai}}"
        data-tongtien="{{$p->TongTien}}"
        data-ngaybatdau='
        <?php $date=date_create($p->NgayBatDau);
        echo date_format($date,"d/m/Y H:i:s") ?>'
        data-ngayketthuc='
        <?php $date=date_create($p->NgayKetThuc);
        echo date_format($date,"d/m/Y H:i:s") ?>'
        data-tenlienhe="{{$p->TenLienHe}}"
        data-diachilienlac="{{$p->DiaChiLienLac}}"
        data-dienthoai="{{$p->DienThoaiLienLac}}"
        data-email="{{$p->Email}}"
        data-ngaytao='
        <?php $date=date_create($p->ngaydang);
        echo date_format($date,"d/m/Y H:i:s") ?>'
        data-ngaycapnhat='
        <?php $date=date_create($p->ngaycapnhat);
        echo date_format($date,"d/m/Y H:i:s") ?>'
        data-toggle="modal" data-target="#chitiet"><i class="fas fa-info"></i></button>
        <button class="btn btn-danger btn-xs classXoa"  id="{{$p->id}}" onClick="del_click(this.id)"><i class="fas fa-trash"></i></button>
      </td>
    </tr>
  </tbody>
    @endforeach
</table>
      <?php } else { ?>
     <table id="dtable" class="table table-striped table-advance table-hover table-ed">
       <hr>
       <thead>
        <tr>
         <th>STT</th>
         <th>Nguời đăng tin</th>
         <th>Địa chỉ</th>
         <th>Loại tin</th>
         <th>Loại cho thuê</th>
         <th>Thời gian gửi</th>
         <th>Trạng thái</th>
         <th></th>
       </tr>
     </thead>
     <tbody>
      <?php $i=0;
      ?>
      @foreach($phong as $p)
      <tr>
       <td>{{++$i}}</td>
       <td>{{$p->nguoidang->name}}</td>
       <td>{{$p->DiaChi}}, {{$p->phuong->TenPhuong}},
                     @foreach ($quan as $q)
                        <?php if ($q->id == $p->phuong->ThuocQuan){
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
                     @endforeach</td>
       <td>{{$p->loaitin->LoaiTin}}</td>
       <td>{{$p->loaichothue->LoaiChoThue}}</td>
       <td><?php $date=date_create($p->created_at);
       echo date_format($date,"d/m/Y H:i:s") ?></td>
       <th><?php if(($p->TrangThai) == 1) {echo "Đang đăng";}else{echo "Đã ngừng đăng";} ?></th>
       <td></td>
       <td>
        <button class="btn btn-info btn-xs" 
        data-idphong="{{$p->id}}"
        data-tieude="{{$p->TieuDe}}"
        data-diachi="{{$p->DiaChi}}, {{$p->phuong->TenPhuong}},
                     @foreach ($quan as $q)
                        <?php if ($q->id == $p->phuong->ThuocQuan){
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
                     @endforeach"
        data-dientich="{{$p->DienTich}}"
        data-gia="{{$p->Gia}}"
        data-mota="{{$p->MoTa}}"
        data-hinhanh="{{$p->HinhAnh}}"
        data-loaitin="{{$p->loaitin->LoaiTin}}"
        data-loaichothue="{{$p->loaichothue->LoaiChoThue}}"
        data-nguoidang="{{$p->nguoidang->name}}"
        data-trangthai="{{$p->TrangThai}}"
        data-tongtien="{{$p->TongTien}}"
        data-ngaybatdau='
        <?php $date=date_create($p->NgayBatDau);
        echo date_format($date,"d/m/Y H:i:s") ?>'
        data-ngayketthuc='
        <?php $date=date_create($p->NgayKetThuc);
        echo date_format($date,"d/m/Y H:i:s") ?>'
        data-tenlienhe="{{$p->TenLienHe}}"
        data-diachilienlac="{{$p->DiaChiLienLac}}"
        data-dienthoai="{{$p->DienThoaiLienLac}}"
        data-email="{{$p->Email}}"
        data-ngaytao='
        <?php $date=date_create($p->created_at);
        echo date_format($date,"d/m/Y H:i:s") ?>'
        data-ngaycapnhat='
        <?php $date=date_create($p->updated_at);
        echo date_format($date,"d/m/Y H:i:s") ?>'
        data-toggle="modal" data-target="#chitiet"><i class="fas fa-info"></i></button>
        <button class="btn btn-danger btn-xs classXoa"  id="{{$p->id}}" onClick="del_click(this.id)"><i class="fas fa-trash"></i></button>
      </td>
    </tr>
  </tbody>
  @endforeach
</table>
<?php } ?>
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
        <h4 class="modal-title" id="myModalLabel">Chi tiết tin đăng</h4>
      </div>
      <div class="modal-body">
       <!-- BASIC FORM ELELEMNTS -->
       <div class="row">
        <div class="col-md-12">
          <table class="table table-hover">
            <thead>
              <tr>
                <td class="col-md-2">Tiêu đề</td>
                <td id='tieude'></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="col-md-2">Địa chỉ</td>
                <td id='diachi'></td>
              </tr>
              <tr>
                <td class="col-md-2">Diện tích</td>
                <td id='dientich'></td>
              </tr>
              <tr>
                <td class="col-md-2">Giá</td>
                <td id="gia"></td>
              </tr>
              <tr>
                <td class="col-md-2">Mô tả</td>
                <td id="mota"></td>
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
                    <div class="col-md-4" style="margin-top: 10px;">
                          <img src=""  id="hinh3" style="display:none;">
                    </div>
                    <div class="col-md-4" style="margin-top: 10px;">
                          <img src=""  id="hinh4" style="display:none;">
                    </div>
                    <div class="col-md-4" style="margin-top: 10px;">
                          <img src=""  id="hinh5" style="display:none;">
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="col-md-2">Loại tin</td>
                <td id="loaitin"></td>
              </tr>
              <tr>
                <td class="col-md-2">Loại cho thuê</td>
                <td id="loaichothue"></td>
              </tr>
              <tr>
                <td class="col-md-2">Người đăng</td>
                <td id="nguoidang"></td>
              </tr>
              <tr>
                <td class="col-md-2">Tổng tiền</td>
                <td id="tongtien"></td>
              </tr>
              <tr>
                <td class="col-md-2">Ngày bắt đầu</td>
                <td id="ngaybatdau"></td>
              </tr>
              <tr>
                <td class="col-md-2">Ngày kết thúc</td>
                <td id="ngayketthuc"></td>
              </tr>
              <tr>
                <td class="col-md-2">Ngày tạo</td>
                <td id="created_at"></td>
              </tr>
              <tr>
                <td class="col-md-2">Ngày cập nhật</td>
                <td id="updated_at"></td>
              </tr>
              <tr>
                <td class="col-md-2">Tên người liên lạc</td>
                <td id="tenlienhe"></td>
              </tr>
              <tr>
                <td class="col-md-2">Địa chỉ liên lạc</td>
                <td id="diachi"></td>
              </tr>
              <tr>
                <td class="col-md-2">Điện thoại liên lạc</td>
                <td id="dienthoai"></td>
              </tr>
              <tr>
                <td class="col-md-2">Email liên lạc</td>
                <td id="email"></td>
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
        var button = $(event.relatedTarget) // Button that triggered the modal
        var tieude = button.data('tieude')
        var diachi = button.data('diachi')
        var dientich = button.data('dientich')
        var gia = button.data('gia')
        var mota = button.data('mota')
        var hinhanh = button.data('hinhanh')
        var loaitin = button.data('loaitin')
        var loaichothue = button.data('loaichothue')
        var nguoidang = button.data('nguoidang')
        var tongtien = button.data('tongtien')
        var ngayketthuc = button.data('ngayketthuc')
        var ngaybatdau = button.data('ngaybatdau')
        var tenlienhe = button.data('tenlienhe')
        var diachilienlac = button.data('diachilienlac')
        var dienthoai = button.data('dienthoai')
        var email = button.data('email')
        var created_at = button.data('ngaytao')
        var updated_at = button.data('ngaycapnhat')
        var splitted = hinhanh.split(";");
        var modal = $(this)
        for(var i = 0; i < (splitted.length-1); i++)
        {
          document.getElementById("hinh"+i).src = "../img/ThuePhong/"+splitted[i];
          document.getElementById("hinh"+i).style = "width:100% ";
        }
      modal.find('.modal-body #tieude').html(tieude);
      modal.find('.modal-body #diachi').html(diachi);
      modal.find('.modal-body #dientich').html(dientich);
      modal.find('.modal-body #gia').html(gia);
      modal.find('.modal-body #mota').html(mota);
      modal.find('.modal-body #loaitin').html(loaitin);
      modal.find('.modal-body #loaichothue').html(loaichothue);
      modal.find('.modal-body #nguoidang').html(nguoidang);
      modal.find('.modal-body #tongtien').html(tongtien);
      modal.find('.modal-body #ngaybatdau').html(ngaybatdau);
      modal.find('.modal-body #ngayketthuc').html(ngayketthuc);
      modal.find('.modal-body #tenlienhe').html(tenlienhe);
      modal.find('.modal-body #diachilienlac').html(diachi);
      modal.find('.modal-body #dienthoai').html(dienthoai);
      modal.find('.modal-body #email').html(email);
      modal.find('.modal-body #created_at').html(created_at);
      modal.find('.modal-body #updated_at').html(updated_at);
      initMap(diachi);
    })
        /// ajax
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        function del_click(clicked_id)
        {
          var kq=  confirm('Bạn có muốn xóa không ?');
          if(kq==true){
            var id = clicked_id;
            location.href='xoaycll/'+id;
          }
        }
      </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnYFDJ7BW8yaet9yNSAA-A0eBBFULQf40"
  type="text/javascript"></script>
      @endsection
@section('title','Quản lý tin đăng')
@extends('layout.master')
@section('content')
<section id="main-content">
  <section class="wrapper">
    <h3>QUẢN LÝ TIN ĐĂNG</h3>

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
            <div class="col-md-4 col-sm-4 control-label"></div>
            <div class="col-md-4">
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
     </div>
     <form method="post" action="{{route('post_LocTin')}}">
      {{csrf_field()}}
      <div class="form-group">
        <div class="col-md-3"></div>
        <div class="col-md-2">
          <select class="form-control" id="quan" name="quan">
            <option value="0">Tất cả quận</option>
            @foreach ($quan as $q)
            <option value="{{$q->id}}">{{$q->TenQuan}}</option>
            @endforeach 
          </select>
        </div>
        <div class="col-md-2">
          <select class="form-control" id="trangthai" name="trangthai">
            <option value="4">Trạng thái</option>
            <option value="0">Đang đăng bán</option>
            <option value="1">Đang giao dịch</option>
            <option value="2">Đã bán</option>
            <option value="3">Hiện có</option>
          </select>
        </div>
        <div class="col-md-2">
          <select class="form-control" id="giatien" name="giatien">
            <option value="0">Khoảng giá</option>
            <option value="1">Dưới 800 triệu</option>
            <option value="2">800 triệu - 1,5 tỷ</option>
            <option value="3">1,5 tỷ - 2,5 tỷ</option>
            <option value="4">2,5 tỷ - 4 tỷ</option>
          </select>
        </div>
        <div class="col-md-1 col-sm-1 control-label"><button type="submit" class="btn btn-theme"><i class="fas fa-search"></i></button></div>
      </div>
    </form>
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
    <?php $i = 0; ?>
  @foreach($dat_loc as $d)
   <tr>
     <td>{{++$i}}</td>
     <td>{{$d->KyHieuLoDat}}</td>
     <td>{{number_format($d->DonGia)}} VND/m2</td>
     <td>{{number_format($d->Gia)}} VND</td>
     <td>{{$d->diaChi}}</td>
     <td><?php 
       if ($d->TrangThai == 0) {
        echo 'Đang đăng bán';
      }
      if ($d->TrangThai == 1) {
        echo 'Đang giao dịch';
      }
      if ($d->TrangThai == 2) {
        echo 'Đã bán';
      }
      if ($d->TrangThai == 3) {
        echo 'Hiện có';
      }
     ?></td>
     <td></td>
     <td>
      <?php if ($d->TrangThai == 3) { ?>
        <button class="btn btn-warning btn-xs" id="{{$d->id}}"
          onClick="dangtin(this.id)" ata-toggle="tooltip" data-placement="top" title="Đăng tin"><i class="fas fa-caret-square-up"></i></button>
        <?php } ?>
      <button class="btn btn-success btn-xs" 
      data-iddat="{{$d->iddat}}"
      data-mald="{{$d->KyHieuLoDat}}"
      data-map = "{{$d->Map}}"
      data-dongia="{{number_format($d->DonGia)}}"
      data-gia = "{{number_format($d->Gia)}}"
      data-rong="{{$d->Rong}}"
      data-dientich= "{{$d->DienTich}}"
      data-dai="{{$d->Dai}}"
      data-nohau="{{$d->NoHau}}"
      data-huong="{{$d->Huong}}"
      data-sohuu="{{$d->TenCongTy}}"
      data-hinh="{{$d->HinhAnh}}"
      data-trangthai="{{$d->TrangThai}}"
      data-ghichu="{{$d->GhiChu}}"
      data-luotxem="{{$d->LuotXem}}"
      data-vitri="{{$d->diaChi}},{{$d->TenPhuong}},{{$d->TenQuan}},{{$d->TenThanhPho}}"
      data-ngaytao='
      <?php $date=date_create($d->ngaytao);
      echo date_format($date,"d/m/Y H:i:s") ?>'
      data-ngaycapnhat='
      <?php $date=date_create($d->ngaycapnhat);
      echo date_format($date,"d/m/Y H:i:s") ?>'
      data-toggle="modal" data-target="#chitiet"><i class="fas fa-info"></i></button>
      
      @if ($d->TrangThai == 0)
      <button class="btn btn-danger btn-xs classXoa" idbd="{{$d->iddat}}" id="{{$d->iddat}}"
        onClick="reply_click(this.id)"><i class="fas fa-trash"></i></button>
        @endif
    </td>
  </tr>
</tbody>
@endforeach
</table>
</div><!-- /content-panel -->
</div><!-- /col-md-12 -->
</div><!-- /row -->
@if(!empty($dat_loc->links()))
{{ $dat_loc->links() }}
@endif
</section><!-- /MAIN CONTENT -->
</section>
<!--main content end-->
<!-- Modal chi tiết -->
<div class="modal fade" id="chitiet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-detail"
aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Chi tiết đât</h4>
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
                                <td class="col-md-2">Ngày tạo</td>
                                <td id="created_at"></td>
                            </tr>
                            <tr>
                                <td class="col-md-2">Ngày cập nhật</td>
                                <td id="updated_at"></td>
                            </tr>
                            <tr>
                                <td class="col-md-2">Hình ảnh</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="" alt="Lights" id="hinh0" style="display:none;">
                                        </div>
                                        <div class="col-md-4">
                                            <img src="" id="hinh1" style="display:none;">
                                        </div>
                                        <div class="col-md-4">
                                            <img src="" id="hinh2" style="display:none;">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Vị trí trên bản đồ</td>
                                <td>
                                    <div id="map" style="width:100%;height:500px"></div>
                                </td>
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE"
type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
    function initMap(Lat, Lng) {
        var mapCanvas = document.getElementById("map");
        var myCenter = new google.maps.LatLng(Lat, Lng);
        var mapOptions = {center: myCenter, zoom: 15};
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({
            map: map,
            position: myCenter,
            icon: "../img/gps.png",
            animation: google.maps.Animation.BOUNCE
        });
    }

    function geocodeAddress(geocoder, vitri) {
        geocoder.geocode({'address': vitri}, function (results, status) {
            if (status === 'OK') {
                var result = (results[0].geometry.location.lat() + ';' + results[0].geometry.location.lng())
                $("#map-add").val(result);
                $("#map-edit").val(result);
                console.log($("#map-add").val())
                console.log($("#map-edit").val())
            }
        });
    }

        // chi tiết
        $('#chitiet').on('show.bs.modal', function (event) {
            for (var i = 0; i < 3; i++) {
                document.getElementById("hinh" + i).src = "";
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
            var ghichu = button.data('ghichu')
            var trangthai = button.data('trangthai')
            var luotxem = button.data('luotxem')
            var created_at = button.data('ngaytao')
            var updated_at = button.data('ngaycapnhat')
            var hinhanh = button.data('hinh')
            var gia = button.data('gia')
            var map = button.data('map')
            map = map.split(";");
            var splitted = hinhanh.split(";");
            var modal = $(this)
            for (var i = 0; i < (splitted.length - 1); i++) {
                document.getElementById("hinh" + i).src = "../img/" + splitted[i];
                document.getElementById("hinh" + i).style = "width:100% ";
            }
            modal.find('.modal-body #mald').html(mald);
            modal.find('.modal-body #gia').html(gia + ' VND');
            modal.find('.modal-body #dt').html(dientich + 'm2');
            modal.find('.modal-body #dongia').html(dongia + ' VND/m2')
            modal.find('.modal-body #rong').html(rong + 'm');
            modal.find('.modal-body #dai').html(dai + 'm');
            modal.find('.modal-body #nohau').html(nohau + 'm');
            modal.find('.modal-body #huong').html(huong);
            modal.find('.modal-body #vitri').html(vitri);
            if (trangthai == 2) {
                modal.find('.modal-body #trangthai').html('Đã bán');
            }
            if (trangthai == 1) {
                modal.find('.modal-body #trangthai').html('Đang giao dịch');
            }
            if (trangthai == 0) {
                modal.find('.modal-body #trangthai').html('Hiện có');
            }
            modal.find('.modal-body #luotxem').html(luotxem);
            modal.find('.modal-body #ghichu').html(ghichu);
            modal.find('.modal-body #created_at').html(created_at);
            modal.find('.modal-body #updated_at').html(updated_at);
            initMap(map[0], map[1]);
        })
        /// ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function reply_click(clicked_id) {
            var kq = confirm('Bạn muốn hủy đăng tin này không ?');
            if (kq == true) {
                var id = clicked_id;
                location.href = 'xoatin/' + id;
            }
        }

        $(document).ready(function () {
            $("#search").keyup(function () {
                $.ajax({
                    type: 'get',
                    url: '{{ url("page/timtindang") }}',
                    data: {name: $("#search").val()},
                    async: true,
                    success: function (data) {
                        $("#dtable").html(data);
                    }
                });
            });
        });
    </script>


    @endsection
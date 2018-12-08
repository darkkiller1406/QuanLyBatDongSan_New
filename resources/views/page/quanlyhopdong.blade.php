@section('title','Quản lý hợp đồng')
@extends('layout.master')
@section('content')
<section id="main-content">
  <section class="wrapper">
    <h3>QUẢN LÝ HỢP ĐỒNG</h3>

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
          <div class="alert alert-warning" style="font-size: 0.9em;text-align: center;margin-top: 20px;">
            {{ session('canhbao') }}
          </div>
          @endif
          <div class="form-group">
            <div class="col-md-3 col-sm-3 control-label"></div>
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
       @if(Auth::user()->Quyen == 1)
       <div class="col-md-3 col-sm-2 control-label"><button type="button" class="btn btn-theme" data-toggle="modal" data-target="#upload" data-toggle="tooltip" data-placement="top" title="Upload mẫu hợp đồng"><i class="fas fa-cloud-upload-alt"></i></button></div>
       @endif
     </div>
     <table id="dtable" class="table table-striped table-advance table-hover table-ed">
       <hr>
       <thead>
        <tr>
         <th>STT</th>
         <th>Mã hợp đồng</th>
         <th>Lô đất</th>
         <th>Tên khách hàng mua</th>
         <th>Giá bán</th>
         <th>Tiền cọc</th>
         <th>Tiền còn lại</th>
         <th>Trạng thái</th>
         <th>File hợp đồng</th>
         <th></th>
       </tr>
     </thead>
     <tbody>
      <?php $i=0 ?>
       @foreach($hopdong as $hd)
       <tr>
         <td>{{++$i}}</td>
         <td>{{$hd->MaHopDong}}</td>
         <td>{{$hd->dat->KyHieuLoDat}}</td>
         <td>{{$hd->khachhang->HoVaTenDem}} {{$hd->khachhang->Ten}}</td>
         <td>{{number_format($hd->Gia)}} VNĐ</td>
         <td>{{number_format($hd->TienDatCoc)}} VNĐ</td>
         <td>{{number_format(($hd->Gia)-($hd->TienDatCoc))}} VNĐ</td>
          @if ($hd->TrangThai == 1)
          <td>Đang xử lý</td>
          @else
          <td>Đã hoàn thành</td>
          @endif
          @if(Auth::user()->id == $hd->NguoiLap || Auth::user()->Quyen == 1)
         <td><a href='../{{$hd->FileHopDong}}'>HopDong_{{$hd->MaHopDong}}.docx - Download</a></td>
         <td>
         <button class="btn btn-success btn-xs" 
          data-mahopdong="{{$hd->MaHopDong}}"
          data-kihieulodat="{{$hd->dat->KyHieuLoDat}}"
          data-tenkh="{{$hd->khachhang->HoVaTenDem}} {{$hd->khachhang->Ten}}"
          data-giaban="{{number_format($hd->dat->Gia)}}"
          data-tiendatcoc="{{number_format($hd->TienDatCoc)}}"
          data-tienconlai="{{number_format(($hd->dat->Gia)-($hd->TienDatCoc))}}"
          data-phuongthucthanhtoan="{{$hd->PhuongThucThanhToan}}"
          data-ngaythanhtoan="<?php $date=date_create($hd->NgayThanhToan); echo date_format($date,'d/m/Y') ?>"
          data-ngaylap="<?php $date=date_create($hd->created_at); echo date_format($date,'d/m/Y') ?>"
          data-nguoilap="{{$hd->user->name}}"
          data-toggle="modal" data-target="#chitiet"><i class="fas fa-info"></i>
         </button>
         @if($hd->TrangThai == 1)
         <button class="btn btn-warning btn-xs" data-idhd='{{$hd->id}}' data-toggle="modal" data-target="#xacnhan" data-toggle="tooltip" data-placement="top" title="Hoàn tất hợp đồng"><i class="fas fa-check-square"></i></button>
         <a class="btn btn-primary btn-xs classXoa" href='suahopdong/{{$hd->id}}'><i class="fas fa-edit"></i></a>
         @endif
         @if(Auth::user()->Quyen == 1)
          <button class="btn btn-danger btn-xs classXoa" idbd="{{$hd->id}}" id="{{$hd->id}}" onClick="reply_click(this.id)"><i class="fas fa-trash"></i></button>
         @endif
        </td>
        @else
        <td>Bạn không đủ quyền để xem file hợp đồng</td>
        @endif
      </tr>
    </tbody>
    @endforeach
  </table>
</div><!-- /content-panel -->
</div><!-- /col-md-12 -->
</div><!-- /row -->
@if(!empty($hopdong->links()))
{{ $hopdong->links() }}
@endif
</section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->
<div class="modal fade" id="chitiet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">THÔNG TIN CHI TIẾT KHÁCH HÀNG</h4>
      </div>
      <div class="modal-body">
       <!-- BASIC FORM ELELEMNTS -->
       <div class="row">
        <div class="col-md-12">
          <table class="table table-hover">
            <thead>
              <tr>
                <td>Mã hợp đồng</td>
                <td id='mahd'></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Lô đất</td>
                <td id='kihieulodat'></td>
              </tr>
              <tr>
                <td>Tên khách hàng</td>
                <td id="tenkh"></td>
              </tr>
              <tr>
                <td>Giá bán</td>
                <td id="giaban"></td>
              </tr>
              <tr>
                <td>Tiền cọc</td>
                <td id="tiendatcoc"></td>
              </tr>
              <tr>
                <td>Tiền còn lại</td>
                <td id="tienconlai"></td>
              </tr>
              <tr>
                <td>Ngày thanh toán</td>
                <td id="ngaythanhtoan"></td>
              </tr>
              <tr>
                <td>Phương thức thanh toán</td>
                <td id="phuongthuc"></td>
              </tr>
              <tr>
                <td>Người lập hợp đồng</td>
                <td id="nguoilap"></td>
              </tr>
              <tr>
                <td>Ngày lập hợp đồng</td>
                <td id="ngaylap"></td>
              </tr>
            </tbody>
          </table>
        </div><!-- /col-md-12 -->   
      </div><!-- /row -->
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">UPLOAD MẪU HỢP ĐỒNG</h4>
      </div>
      <div class="modal-body">
       <!-- BASIC FORM ELELEMNTS -->
       <div class="row">
          <div class="form-group">
              <div class="col-md-12">
                <div class="alert alert-warning" style="font-size: 1em;text-align: center;margin-top: 20px;text-transform: uppercase;">
                    Bạn vui lòng upload file hợp đồng theo format dưới đây.
                </div>
              </div>
          </div>
          <div class="form-group">
              <div class="col-md-3 col-sm-3 control-label"></div>
              <div class="col-md-3 col-sm-3 control-label">
                  <a href='../HopDong/form/FormHopDong.docx' class='btn btn-info'>Download format hợp đồng</a>
              </div>
              <div class="col-md-3 col-sm-3 control-label">
                  <a href='uploadmauhopdong' class='btn btn-primary'>Upload form hợp đồng</a>
              </div>
          </div>  
      </div><!-- /row -->
    </div>
  </div>
</div>
</div>         
</div><!-- /showback -->
<div class="modal fade" id="xacnhan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">HOÀN TẤT HỢP ĐỒNG</h4>
      </div>
      <div class="modal-body">
       <!-- BASIC FORM ELELEMNTS -->
       <div class="row">
        <div class="col-lg-12">
          <div class="form-panel">
            <form class="form-horizontal style-form" method="post" enctype="multipart/form-data" action="{{route('post_XacNhanHD')}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="idhd" id="idhd">
              <div class="form-group">
                  <label class="col-sm-3 col-sm-3 control-label">File hợp đồng</label>
                  <div class="col-sm-9">
                    <input type="file" name="hopdong[]" accept="application/msword, .doc, .docx, application/pdf" class="form-control" required >
                  </div>
                </div>
              <div class="col-md-5">
              </div>
              <button type="submit" id="submitbtn-add" name="submitbtn" class="btn btn-primary" type="hidden">Cập nhật</button>
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
        $('#xacnhan').on('show.bs.modal', function (event) {
          console.log('open');
          var button = $(event.relatedTarget)
          var idhd = button.data('idhd')
          var modal = $(this)
          modal.find('.modal-body #idhd').val(idhd);
        })
        $('#chitiet').on('show.bs.modal', function (event) {
          console.log('open');
          var button = $(event.relatedTarget) // Button that triggered the modal
          var mahd = button.data('mahopdong') // Extract info from data-* attributes
          var kihieulodat = button.data('kihieulodat')
          var tenkh = button.data('tenkh')
          var giaban = button.data('giaban')
          var tiendatcoc = button.data('tiendatcoc')
          var tienconlai = button.data('tienconlai')
          var phuongthuchthanhtoan = button.data('phuongthucthanhtoan')
          var ngaythanhtoan = button.data('ngaythanhtoan')
          var ngaylap = button.data('ngaylap')
          var nguoilap = button.data('ngaylap')
          if (phuongthuchthanhtoan == 1) {
            phuongthuchthanhtoan = 'Tiền mặt';
          } else {
            phuongthuchthanhtoan = 'Chuyển khoản';
          }
          var modal = $(this)
          modal.find('.modal-body #mahd').html(mahd);
          modal.find('.modal-body #kihieulodat').html(kihieulodat);
          modal.find('.modal-body #tenkh').html(tenkh);
          modal.find('.modal-body #giaban').html(giaban + ' VND');
          modal.find('.modal-body #tiendatcoc').html(tiendatcoc + ' VND');
          modal.find('.modal-body #tienconlai').html(tienconlai + ' VND');
          modal.find('.modal-body #phuongthuc').html(phuongthuchthanhtoan);
          modal.find('.modal-body #ngaythanhtoan').html(ngaythanhtoan);
          modal.find('.modal-body #ngaylap').html(ngaylap);
          modal.find('.modal-body #nguoilap').html(nguoilap);
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
            location.href='xoahd/'+id;
          }
        }
        $(document).ready(function(){
          $("#search").keyup(function() {
            $.ajax({
              type:'get',
              url: '{{ url("page/timhd") }}',
              data: {name:$("#search").val()},
              async: true,
              success: function(data){
                $("#dtable").html(data);
              }
            });
          });

        });
      </script>
      @endsection
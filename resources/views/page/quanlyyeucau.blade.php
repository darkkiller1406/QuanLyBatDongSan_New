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
          <form method="post" action="{{route('TKYC')}}">
            {{csrf_field()}}
            <div class="form-group">
              <div class="col-md-4 col-sm-4 control-label"></div>
              <div class="col-md-4">
               <div id="custom-search-input">
                <div class="input-group col-md-12">
                  @if(isset($ngay))
                  <input type="date" name="ngay" class="form-control" value="{{$ngay}}">
                  @else
                  <input type="date" name="ngay" class="form-control" value="<?php echo date('Y-m-d') ?>">
                  @endif
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-2 control-label"><button type="submit" class="btn btn-theme"><i class="fas fa-search"></i></button></div>
          </div>
        </form>
     <table id="dtable" class="table table-striped table-advance table-hover table-ed">
       <hr>
       <thead>
        <tr>
         <th>STT</th>
         <th>Mã yêu cầu</th>
         <th>Tên khách</th>
         <th>Email</th>
         <th>Số điện thoại</th>
         <th>Loại yêu cầu</th>
         <th>Thời gian gửi</th>
         <th></th>
       </tr>
     </thead>
     <tbody>
      <?php $i=0;
      ?>
      @foreach($yeucau as $yc)
      <tr>
       <td>{{++$i}}</td>
       <td>{{$yc->MaYeuCau}}</td>
       <td>{{$yc->TenKhach}}</td>
       <td>{{$yc->Email}}</td>
       <td>{{$yc->DienThoai}}</td>
       <td><?php 
       if($yc->LoaiYeuCau== 1)  {echo 'Yêu cầu mua đất';} else {echo 'Yêu cầu liên lạc';}
       ?></td>
       <td><?php $date=date_create($yc->created_at);
       echo date_format($date,"d/m/Y H:i:s") ?></td>
       <td></td>
       <td>
        <button class="btn btn-info btn-xs" 
        data-idyc="{{$yc->id}}"
        data-mayc="{{$yc->MaYeuCau}}"
        data-tenkh="{{$yc->TenKhach}}"
        data-email="{{$yc->Email}}"
        data-dt="{{$yc->DienThoai}}"
        data-loaiyc="{{$yc->LoaiYeuCau}}"
        data-nd="{{$yc->NoiDung}}"
        <?php if(isset($yc->dat->KyHieuLoDat)){ ?>
          data-dat="{{$yc->dat->KyHieuLoDat}}"
        <?php } ?>
        <?php if(isset($yc->dat->TrangThai)){ ?>
          data-trangthai="{{$yc->dat->TrangThai}}"
        <?php } else { ?>data-trangthai = 3 <?php } ?>
        data-ngaytao='
        <?php $date=date_create($yc->created_at);
        echo date_format($date,"d/m/Y H:i:s") ?>'
        data-ngaycapnhat='
        <?php $date=date_create($yc->updated_at);
        echo date_format($date,"d/m/Y H:i:s") ?>'
        data-toggle="modal" data-target="#chitiet"><i class="fas fa-info"></i></button>
        <?php if(isset($yc->dat->TrangThai)){ ?>
          <?php if ($yc->dat->TrangThai == 1){ ?>
            <button class="btn btn-success btn-xs"
            data-iddat = "{{$yc->dat->id}}"
            data-gia = "{{number_format($yc->dat->Gia)}}"
            data-idyc="{{$yc->id}}"
            data-kyhieudat = "{{$yc->dat->KyHieuLoDat}}"
            data-toggle="modal" data-target="#sua"><i class="fas fa-check-square"></i></button>
          <?php } ?>
        <?php } ?>
        <?php if(isset($yc->dat->KyHieuLoDat)){ ?>
        <button class="btn btn-danger btn-xs classXoa"  id="{{$yc->id}}" onClick="reply_click(this.id)"><i class="fas fa-trash"></i></button>
      <?php } else { ?>
        <button class="btn btn-danger btn-xs classXoa"  id="{{$yc->id}}" onClick="del_click(this.id)"><i class="fas fa-trash"></i></button>
      <?php } ?>
      </td>
    </tr>
  </tbody>
  @endforeach
</table>
</div><!-- /content-panel -->
</div><!-- /col-md-12 -->
</div><!-- /row -->
@if(!empty($yeucau->links()))
{{ $yeucau->links() }}
@endif
</section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->

<!--main content end-->
<!-- Modal chi tiết -->
<div class="modal fade" id="chitiet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Chi tiết yêu cầu</h4>
      </div>
      <div class="modal-body">
       <!-- BASIC FORM ELELEMNTS -->
       <div class="row">
        <div class="col-md-12">
          <table class="table table-hover">
            <thead>
              <tr>
                <td class="col-md-2">Mã yêu cầu</td>
                <td id='mayc'></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="col-md-2">Tên khách</td>
                <td id='tenkh'></td>
              </tr>
              <tr>
                <td class="col-md-2">Email</td>
                <td id='email'></td>
              </tr>
              <tr>
                <td class="col-md-2">SĐT</td>
                <td id="dt"></td>
              </tr>
              <tr>
                <td class="col-md-2">Loại Yêu Cầu</td>
                <td id="loaiyc"></td>
              </tr>
              <tr>
                <td class="col-md-2">Lô đất muốn mua</td>
                <td id="dat"></td>
              </tr>
              <tr>
                <td class="col-md-2">Nội dung</td>
                <td id="nd"></td>
              </tr>
              <tr>
                <td class="col-md-2">Trạng thái</td>
                <td id="trangthai"></td>
              </tr>
              <tr>
                <td class="col-md-2">Ngày tạo</td>
                <td id="created_at"></td>
              </tr>
              <tr>
                <td class="col-md-2">Ngày cập nhật</td>
                <td id="updated_at"></td>
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
<!-- Modal Sửa -->
<?php if(isset($yc->dat->KyHieuLoDat)) { ?>  
<div class="modal fade" id="sua" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">XÁC NHẬN MUA/BÁN</h4>
      </div>
      <div class="modal-body">
       <!-- BASIC FORM ELELEMNTS -->
       <div class="row">
        <div class="col-lg-12">
          <div class="form-panel">
            <form class="form-horizontal style-form" method="post" action="{{route('post_ThemHD')}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="iddat" id="iddat" value="">
              <div class="form-group">
                <label class="col-sm-3 col-sm-3 control-label">Lô đất</label>
                <div class="col-sm-9">
                  <label class=" control-label" id="kyhieudat"></label>
                </div>
              </div>
             <div class="form-group">
              <label class="col-sm-3 col-sm-3 control-label">Giá lô đất</label>
              <div class="col-sm-9">
                <label class=" control-label" id="gia"></label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 col-sm-3 control-label">Tên khách hàng mua</label>
              <div class="col-sm-9">
                <select class="form-control" name="khmua" id="khmua">
                  @foreach ($khachhang as $kh)
                    <option value="{{$kh->id}}">{{$kh->HoVaTenDem}} {{$kh->Ten}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 col-sm-3 control-label">Mã hợp đồng</label>
              <div class="col-sm-9">
                <input type="number" name="maHopDong" id="maHopDong" class="form-control" required>
              </div>
            </div>
            <div class="col-md-5">
            </div>
            <button type="submit" id="submitbtn" name="submitbtn" class="btn btn-primary" >Xác nhận</button>
          </form>
        </div>
      </div><!-- col-lg-12-->       
    </div><!-- /row -->
  </div>
</div>
</div>
</div>              
</div><!-- /showback -->
<?php } ?>
@endsection
@section('script')
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('js/common-scripts.js')}}"></script>
<script type="text/javascript">
      // chi tiết
      $('#chitiet').on('show.bs.modal', function (event) {
        console.log('open');
        var button = $(event.relatedTarget) // Button that triggered the modal
        var mayc = button.data('mayc')
        var tenkh = button.data('tenkh')
        var email = button.data('email')
        var dt = button.data('dt')
        var dat = button.data('dat')
        var loaiyc = button.data('loaiyc')
        var nd = button.data('nd')
        var trangthai = button.data('trangthai')
        var created_at = button.data('ngaytao')
        var updated_at = button.data('ngaycapnhat')
        var modal = $(this)
        if(trangthai == 1)
        {
         modal.find('.modal-body #trangthai').html('Đang xử lý');
       }
       if(trangthai == 2)
       {
         modal.find('.modal-body #trangthai').html('Đã hoàn thành');
       }
       if(trangthai == 3)
       {
         modal.find('.modal-body #trangthai').html('Đang đợi liên lạc');
       }
       if(loaiyc == 1)
       {
        modal.find('.modal-body #loaiyc').html('Yêu cầu mua đất');
      }
      else
      {
        modal.find('.modal-body #loaiyc').html('Yêu cầu liên lạc');
      }
      modal.find('.modal-body #tenkh').html(tenkh);
      modal.find('.modal-body #mayc').html(mayc);
      modal.find('.modal-body #dat').html(dat);
      modal.find('.modal-body #email').html(email);
      modal.find('.modal-body #dt').html(dt);
      modal.find('.modal-body #nd').html(nd);
      modal.find('.modal-body #created_at').html(created_at);
      modal.find('.modal-body #updated_at').html(updated_at);
    })
    $('#sua').on('show.bs.modal', function (event) {
        console.log('open');
        var button = $(event.relatedTarget) // Button that triggered the modal
        var idyc = button.data('idyc')
        var gia = button.data('gia')
        var iddat = button.data('iddat')
        var kyhieudat = button.data('kyhieudat')
        var modal = $(this)
        if(trangthai == 1)
        {
         modal.find('.modal-body #trangthai').html('Đang xử lý');
       }
       if(trangthai == 2)
       {
         modal.find('.modal-body #trangthai').html('Đã hoàn thành');
       }
       if(trangthai == 3)
       {
         modal.find('.modal-body #trangthai').html('Đang đợi liên lạc');
       }
       if(loaiyc == 1)
       {
        modal.find('.modal-body #loaiyc').html('Yêu cầu mua đất');
      }
      else
      {
        modal.find('.modal-body #loaiyc').html('Yêu cầu liên lạc');
      }
      modal.find('.modal-body #idyc').val(idyc);
      modal.find('.modal-body #gia').html(gia);
      modal.find('.modal-body #iddat').val(iddat);
      modal.find('.modal-body #kyhieudat').html(kyhieudat);
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
            location.href='xoayc/'+id;
          }
        }
        function del_click(clicked_id)
        {
          var kq=  confirm('Bạn có muốn xóa không ?');
          if(kq==true){
            var id = clicked_id;
            location.href='xoaycll/'+id;
          }
        }
        $(document).ready(function(){
          $('#sotien').on('change',function(){
            if($('#sotien').val() <= 0)
            {
              $('#sotien').val('1');
            }
            var tien = ($('#sotientam').val())*30/100;
            if($('#sotien').val() > tien)
            {
              $('#sotien').val(tien);
            }
          });
          $("#search").keyup(function() {
            $.ajax({
              type:'post',
              url: '{{ url("page/timyc") }}',
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
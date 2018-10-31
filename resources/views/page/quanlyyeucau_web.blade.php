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
              <div class="col-md-3 col-sm-1 control-label"></div>
              <div class="col-md-5">
                <div class="form-group">
                  <input type="date" name="ngay" class="form-control" value="<?php echo date('Y-m-d') ?>">
                </div>
              </div>
              <div class="col-md-1 col-sm-1 control-label"><button type="submit" class="btn btn-theme"><i class="fas fa-search"></i></button></div>
            </div>
          </form>
          <table id="dtable" class="table table-striped table-advance table-hover table-ed">
           <hr>
           <thead>
            <tr>
             <th>STT</th>
             <th>Link đất</th>
             <th>Tên khách</th>
             <th>Email</th>
             <th>Số điện thoại</th>
             <th>Thời gian gửi</th>
             <th></th>
           </tr>
         </thead>
         <tbody>
          <?php $i=0;
          ?>
          @foreach($dat_web as $d)
          @if ($d->TrangThai == 1)
          <tr>
           <td>{{++$i}}</td>
           <td>{{$d->link}}</td>
           <td>{{$d->TenKhach}}</td>
           <td>{{$d->Email}}</td>
           <td>{{$d->DienThoai}}</td>
           <td><?php $date=date_create($d->created_at);
           echo date_format($date,"d/m/Y H:i:s") ?></td>
           <td></td>
           <td>
            <button class="btn btn-info btn-xs" 
            data-idyc="{{$d->id}}"
            data-link="http://www.muabannhadat.vn/dat-ban-dat-tho-cu-3532/{{$d->link}}"
            data-link_web="{{asset('chitietdat/')}}{{$d->link}}"
            data-tenkh="{{$d->TenKhach}}"
            data-trangthai="{{$d->TrangThai}}"
            data-email="{{$d->Email}}"
            data-dt="{{$d->DienThoai}}"
            data-nd="{{$d->NoiDung}}"
            data-ngaytao='
            <?php $date=date_create($d->created_at);
            echo date_format($date,"d/m/Y H:i:s") ?>'
            data-ngaycapnhat='
            <?php $date=date_create($d->updated_at);
            echo date_format($date,"d/m/Y H:i:s") ?>'
            data-toggle="modal" data-target="#chitiet"><i class="fas fa-info"></i></button>
            <button class="btn btn-success btn-xs"
            data-toggle="modal" data-target="#sua" data-link="{{$d->link}}"><i class="fas fa-check-square"></i></button>
            <button class="btn btn-danger btn-xs classXoa"  id="{{$d->id}}" onClick="del_click(this.id)"><i class="fas fa-trash"></i></button>
          </td>
        </tr>
      </tbody>
      @endif
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
        <h4 class="modal-title" id="myModalLabel">Chi tiết yêu cầu</h4>
      </div>
      <div class="modal-body">
       <!-- BASIC FORM ELELEMNTS -->
       <div class="row">
        <div class="col-md-12">
          <table class="table table-hover">
            <tbody>
              <tr>
                <td class="col-md-2">Link</td>
                <td id='link'></td>
              </tr>
              <tr>
                <td class="col-md-2">Link trên web</td>
                <td id='link_web'></td>
              </tr>
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
              <input type="hidden" name="sotientam" id="sotientam" value="">
              <input type="hidden" name="link" id="link" value="">
              <input type="hidden" name="iddat" id="iddat" value="">              
              <div class="form-group">
                <label class="col-sm-3 col-sm-3 control-label">Lô đất</label>
                <div class="col-sm-9">
                  <select class="form-control" name="dat" id="dat">
                    <option value="0" >Chọn lô đất</option>
                    @foreach ($dat as $d)
                    <option value="{{$d->id}};{{$d->SoHuu}};{{$d->Gia}}" >{{$d->KyHieuLoDat}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 col-sm-3 control-label">Tên người sở hữu đất</label>
                <div class="col-sm-9">
                  <label class="control-label" id="kh_sohuu">
                </label>         
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
              <label class="col-sm-3 col-sm-3 control-label">Tiền môi giới</label>
              <div class="col-sm-9">
                <input type="number" name="sotien" id="sotien" class="form-control" required>
              </div>
            </div>
            <div class="col-md-5">
            </div>
            <button type="submit" id="submitbtn" name="submitbtn" class="btn btn-primary" type="hidden" >Xác nhận</button>
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
      $('#chitiet').on('show.bs.modal', function (event) {
        console.log('open');
        var button = $(event.relatedTarget) // Button that triggered the modal
        var tenkh = button.data('tenkh')
        var email = button.data('email')
        var link = button.data('link')
        var link_web = button.data('link_web')
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
       modal.find('.modal-body #link').html(link);
       modal.find('.modal-body #link_web').html(link_web);
       modal.find('.modal-body #tenkh').html(tenkh);
       modal.find('.modal-body #email').html(email);
       modal.find('.modal-body #dt').html(dt);
       modal.find('.modal-body #nd').html(nd);
       modal.find('.modal-body #created_at').html(created_at);
       modal.find('.modal-body #updated_at').html(updated_at);
     })
      $('#sua').on('show.bs.modal', function (event) {
        console.log('open');
        var button = $(event.relatedTarget)
        var link = button.data('link')
        var modal = $(this)
        modal.find('.modal-body #link').val(link);
        if($('#dat').val() == 0) {
               $("#submitbtn").hide();
           } else {
               $("#submitbtn").show();
           }
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
            location.href='xoaycweb/'+id;
          }
        }
        $(document).ready(function(){
          $('#dat').on('change',function(){
           var value = $(this).val().split(";");
           sohuu = value[1];
           gia = value[2];
           dat = value[0];
           <?php echo 'var khach = '.$khachhang.';' ; ?>
           for (k in khach) {
              var data = khach[k];
              if(data.id == sohuu) {
                $('#kh_sohuu').html(data.HoVaTenDem + ' ' +data.Ten);
                $('#gia').html(gia.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                $('#sotientam').val(gia);
                $('#iddat').val(dat);
              }
           }
           if($(this).val() == 0) {
               $("#submitbtn").hide();
           } else {
               $("#submitbtn").show();
           }
         });
          Number.prototype.format = function(n, x) {
            var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
            return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
          };
          $('#sotien').on('change',function(){
            if($('#sotien').val() <= 0)
            {
              $('#sotien').val('1');
            }
            var tien = ($('#sotientam').val())*30/100;
            if($('#sotien').val() > tien)
            {
              $('#sotien').val(tien);
              $('#sotien').html(tien);
            }
          });
          $("#search").keyup(function() {
            $.ajax({
              type:'get',
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
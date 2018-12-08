@section('title','Quản lý khách hàng')
@extends('layout.master')
@section('content')
<section id="main-content">
  <section class="wrapper">
    <h3>QUẢN LÝ KHÁCH HÀNG</h3>

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
       <div class="col-md-3 col-sm-2 control-label"><button type="button" class="btn btn-theme" data-toggle="modal" data-target="#themnv"><i class="fa fa-plus"></i></button></div>
     </div>
     <table id="dtable" class="table table-striped table-advance table-hover table-ed">
       <hr>
       <thead>
        <tr>
         <th>STT</th>
         <th>Mã khách hàng</th>
         <th>Họ và tên đệm</th>
         <th>Tên khách hàng</th>
         <th>ĐTDD</th>
         <th>Email</th>
       </tr>
     </thead>
     <tbody>
      <?php $i=0 ?>
      @foreach($khachhang as $kh)
      <tr>
       <td><?php echo ++$i; ?></td>
       <td>{{$kh->MaKhachHang}}</td>
       <td>{{$kh->HoVaTenDem}}</td>
       <td>{{$kh->Ten}}</td>
       <td>{{$kh->DTDD}}</td>
       <td>{{$kh->Email}}</td>
       <td></td>
       <td>
        <button class="btn btn-success btn-xs" 
        data-makh="{{$kh->MaKhachHang}}"
        data-hokh="{{$kh->HoVaTenDem}}"
        data-tenkh="{{$kh->Ten}}"
        data-cmnd="{{$kh->CMND}}"
        data-diachi="{{$kh->DiaChi}}"
        data-email="{{$kh->Email}}"
        data-dtdd="{{$kh->DTDD}}"
        data-dtcd="{{$kh->DTCD}}"
        data-noicap="{{$kh->NoiCap}}"
        data-ngaytao='
        <?php $date=date_create($kh->created_at);
        echo date_format($date,"d/m/Y H:i:s") ?>'
        data-ngaycapnhat='
        <?php $date=date_create($kh->updated_at);
        echo date_format($date,"d/m/Y H:i:s") ?>'
        data-ngaysinh='
        <?php $date=date_create($kh->NgaySinh);
        echo date_format($date,"d/m/Y") ?>'
        data-ngaycap='
        <?php $date=date_create($kh->NgayCap);
        echo date_format($date,"d/m/Y") ?>'
        data-toggle="modal" data-target="#chitiet"><i class="fas fa-info"></i></button>
        <button class="btn btn-primary btn-xs"
        data-idkh="{{$kh->id}}"
        data-makh="{{$kh->MaKhachHang}}"
        data-hokh="{{$kh->HoVaTenDem}}"
        data-tenkh="{{$kh->Ten}}"
        data-cmnd="{{$kh->CMND}}"
        data-diachi="{{$kh->DiaChi}}"
        data-email="{{$kh->Email}}"
        data-ngaysinh="{{$kh->NgaySinh}}"
        data-ngaycap="{{$kh->NgayCap}}"
        data-noicap="{{$kh->NoiCap}}"
        data-dtdd="{{$kh->DTDD}}"
        data-dtcd="{{$kh->DTCD}}"
        data-toggle="modal" data-target="#suanv"><i class="fas fa-edit"></i></button>
        <button class="btn btn-danger btn-xs classXoa" idbd="{{$kh->id}}" id="{{$kh->id}}" onClick="reply_click(this.id)"><i class="fas fa-trash"></i></button>
      </td>
    </tr>
  </tbody>
  @endforeach
</table>
</div><!-- /content-panel -->
</div><!-- /col-md-12 -->
</div><!-- /row -->
@if(!empty($khachhang->links()))
{{ $khachhang->links() }}
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
        <h4 class="modal-title" id="myModalLabel">THÔNG TIN CHI TIẾT KHÁCH HÀNG</h4>
      </div>
      <div class="modal-body">
       <!-- BASIC FORM ELELEMNTS -->
       <div class="row">
        <div class="col-md-12">
          <table class="table table-hover">
            <thead>
              <tr>
                <td>Mã khách hàng</td>
                <td id='makh'></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Họ và tên đệm</td>
                <td id='hokh'></td>
              </tr>
              <tr>
                <td>Tên khách hàng</td>
                <td id="tenkh"></td>
              </tr>
              <tr>
                <td>Ngày sinh</td>
                <td id="ngaysinh"></td>
              </tr>
              <tr>
                <td>CMND</td>
                <td id="cmnd"></td>
              </tr>
              <tr>
                <td>Ngày cấp</td>
                <td id="ngaycap"></td>
              </tr>
              <tr>
                <td>Nơi cấp</td>
                <td id="noicap"></td>
              </tr>
              <tr>
                <td>Địa chỉ</td>
                <td id="diachi"></td>
              </tr>
              <tr>
                <td>Email</td>
                <td id="email"></td>
              </tr>
              <tr>
                <td>Điện thoại di dộng</td>
                <td id="dtdd"></td>
              </tr>
              <tr>
                <td>Điện thoại cố định</td>
                <td id="dtcd"></td>
              </tr>
              <tr>
                <td>Ngày tạo</td>
                <td id="created_at"></td>
              </tr>
              <tr>
                <td>Ngày cập nhật</td>
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
<!-- Modal Thêm -->
<div class="modal fade" id="themnv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">THÊM KHÁCH HÀNG MỚI</h4>
      </div>
      <div class="modal-body">
       <!-- BASIC FORM ELELEMNTS -->
       <div class="row">
        <div class="col-lg-12">
          <div class="form-panel">
            <form class="form-horizontal style-form" method="post" action="{{route('post_ThemKH')}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Họ và tên đệm</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name='hokh' required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Tên khách hàng</label>
                <div class="col-sm-10">
                  <input type="text" name="tenkh" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Ngày sinh</label>
                <div class="col-sm-10">
                  <input type="date" id="ngaysinh-add" name="ngaysinh" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">CMND</label>
                <div class="col-sm-10">
                  <input type="text" name="cmnd" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Ngày cấp</label>
                <div class="col-sm-10">
                  <input type="date" id="ngaycap-add" name="ngaycap" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nơi cấp</label>
                <div class="col-sm-10">
                  <input type="text" id="noicap-add" name="noicap" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">ĐTDD</label>
                <div class="col-sm-10">
                  <input type="text" name="dtdd" id="dtdd-add" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">ĐTCĐ</label>
                <div class="col-sm-10">
                  <input type="text" name="dtcd" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Địa chỉ</label>
                <div class="col-sm-10">
                  <input type="text" name="diachi" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" name="email" class="form-control" required>
                </div>
              </div>
              <div class="col-md-6">
              </div>
              <button type="submit" id="submitbtn-add" name="submitbtn" class="btn btn-primary" type="hidden">Thêm</button>
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
<div class="modal fade" id="suanv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">SỬA THÔNG TIN KHÁCH HÀNG</h4>
      </div>
      <div class="modal-body">
       <!-- BASIC FORM ELELEMNTS -->
       <div class="row">
        <div class="col-lg-12">
          <div class="form-panel">
            <form class="form-horizontal style-form" method="post" action="{{route('post_SuaKH')}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id" id="idkh">
              <div class="form-group">
                <label class="col-sm-2  control-label">Họ và tên đệm</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="hokh" name='hokh' required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tên khách hàng</label>
                <div class="col-sm-10">
                  <input type="text" id="tenkh" name="tenkh" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Ngày sinh</label>
                <div class="col-sm-10">
                  <input type="date" id="ngaysinh-edit" name="ngaysinh" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">CMND</label>
                <div class="col-sm-10">
                  <input type="text" id="cmnd" name="cmnd" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Ngày cấp</label>
                <div class="col-sm-10">
                  <input type="date" id="ngaycap-edit" name="ngaycap" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nơi cấp</label>
                <div class="col-sm-10">
                  <input type="text" id="noicap-edit" name="noicap" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2  control-label">ĐTDD</label>
                <div class="col-sm-10">
                  <input type="text" id="dtdd-edit" name="dtdd" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2  control-label">ĐTCĐ</label>
                <div class="col-sm-10">
                  <input type="text" id="dtcd" name="dtcd" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Địa chỉ</label>
                <div class="col-sm-10">
                  <input type="text" id="diachi" name="diachi" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" id="email" name="email" class="form-control" required>
                </div>
              </div>
              <div class="col-md-5">
              </div>
              <button type="submit" id="submitbtn-edit" name="submitbtn" class="btn btn-primary" type="hidden" >Cập nhật</button>
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
        var makh = button.data('makh') // Extract info from data-* attributes
        var hokh = button.data('hokh')
        var tenkh = button.data('tenkh')
        var cmnd = button.data('cmnd')
        var diachi = button.data('diachi')
        var email = button.data('email')
        var dtdd = button.data('dtdd')
        var dtcd = button.data('dtcd')
        var ngaysinh = button.data('ngaysinh')
        var ngaycap = button.data('ngaycap')
        var created_at = button.data('ngaytao')
        var updated_at = button.data('ngaycapnhat')
        var noicap = button.data('noicap')
        var modal = $(this)
        modal.find('.modal-body #makh').html(makh);
        modal.find('.modal-body #hokh').html(hokh);
        modal.find('.modal-body #tenkh').html(tenkh);
        modal.find('.modal-body #email').html(email);
        modal.find('.modal-body #cmnd').html(cmnd);
        modal.find('.modal-body #diachi').html(diachi);
        modal.find('.modal-body #dtdd').html(dtdd);
        modal.find('.modal-body #dtcd').html(dtcd);
        modal.find('.modal-body #ngaysinh').html(ngaysinh);
        modal.find('.modal-body #ngaycap').html(ngaycap);
        modal.find('.modal-body #created_at').html(created_at);
        modal.find('.modal-body #updated_at').html(updated_at);
        modal.find('.modal-body #noicap').html(noicap)
      })
        // sua
        $('#suanv').on('show.bs.modal', function (event) {
          console.log('opensua');
        var button = $(event.relatedTarget) // Button that triggered the modal
        var idkh = button.data('idkh')
        var makh = button.data('makh') // Extract info from data-* attributes
        var hokh = button.data('hokh')
        var tenkh = button.data('tenkh')
        var cmnd = button.data('cmnd')
        var diachi = button.data('diachi')
        var email = button.data('email')
        var dtdd = button.data('dtdd')
        var dtcd = button.data('dtcd')
        var ngaysinh = button.data('ngaysinh')
        var ngaycap = button.data('ngaycap')
        var created_at = button.data('ngaytao')
        var updated_at = button.data('ngaycapnhat')
        var noicap = button.data('noicap')
        var modal = $(this)
        modal.find('.modal-body #idkh').val(idkh);
        modal.find('.modal-body #makh').html(makh);
        modal.find('.modal-body #hokh').val(hokh);
        modal.find('.modal-body #tenkh').val(tenkh);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #cmnd').val(cmnd);
        modal.find('.modal-body #diachi').val(diachi);
        modal.find('.modal-body #dtdd-edit').val(dtdd);
        modal.find('.modal-body #dtcd').val(dtcd);
        modal.find('.modal-body #ngaysinh-edit').val(ngaysinh);
        modal.find('.modal-body #ngaycap-edit').val(ngaycap);
        modal.find('.modal-body #noicap-edit').val(noicap);
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
            location.href='xoakh/'+id;
          }
        }
        function checkPhoneNumber(phone) {
            var flag = false;
            var phone = phone.trim(); // ID của trường Số điện thoại
            phone = phone.replace('(+84)', '0');
            phone = phone.replace('+84', '0');
            phone = phone.replace('0084', '0');
            phone = phone.replace(/ /g, '');
            if (phone != '') {
                var firstNumber = phone.substring(0, 2);
                if ((firstNumber == '09' || firstNumber == '08' || firstNumber == '03' || firstNumber == '07' || firstNumber == '05') && phone.length == 10) {
                    if (phone.match(/^\d{10}/)) {
                        flag = true;
                    }
                }
            }
            return flag;
        }
        $(document).ready(function(){
          $("#submitbtn-add").hide();
          $("#ngaysinh-add").change(function() {
              var namhientai = new Date();
              var namsinh = new Date($("#ngaysinh-add").val());
              if( (namhientai.getFullYear() - namsinh.getFullYear()) < 18 ) {
                var namSinh =  namhientai.getFullYear() - 18;
                $("#ngaysinh-add").val(namSinh + '-01-01');
              }
              if($("#ngaycap-add").val() != '') {
                var namcap = new Date($("#ngaycap-add").val());
                var namsinh = new Date($("#ngaysinh-add").val());
                var now = new Date();
                if( (namcap.getFullYear() - namsinh.getFullYear()) < 14 ) {
                  var namCap =  namcap.getFullYear() + 14;
                  $("#ngaycap-add").val(namCap + '-01-01');
                }
                if(ngaycap > now) {
                document.getElementById("ngaycap-add").valueAsDate = new Date();
                }
              }
          });
          $("#ngaycap-add").change(function() {
              var ngaycap = new Date($("#ngaycap-add").val());
              var ngaysinh = new Date($("#ngaysinh-add").val());
              var now = new Date();
              if( (ngaycap.getFullYear() - ngaysinh.getFullYear()) < 14 ) {
                var namCap =  ngaysinh.getFullYear() + 14;
                $("#ngaycap-add").val(namCap + '-01-01');
              }
              if(ngaycap > now) {
                document.getElementById("ngaycap-add").valueAsDate = new Date();
              }
          });
          $("#ngaysinh-edit").change(function() {
              var namhientai = new Date();
              var namsinh = new Date($("#ngaysinh-edit").val());
              if( (namhientai.getFullYear() - namsinh.getFullYear()) < 18 ) {
                var namSinh =  namhientai.getFullYear() - 18;
                $("#ngaysinh-edit").val(namSinh + '-01-01');
              }
              if($("#ngaycap-edit").val() != '') {
                var namcap = new Date($("#ngaycap-edit").val());
                var namsinh = new Date($("#ngaysinh-edit").val());
                var now = new Date();
                if( (namcap.getFullYear() - namsinh.getFullYear()) < 14 ) {
                  var namCap =  namcap.getFullYear() + 14;
                  $("#ngaycap-edit").val(namCap + '-01-01');
                }
                if(ngaycap > now) {
                document.getElementById("ngaycap-edit").valueAsDate = new Date();
                }
              }
          });
          $("#ngaycap-edit").change(function() {
              var ngaycap = new Date($("#ngaycap-edit").val());
              var ngaysinh = new Date($("#ngaysinh-edit").val());
              var now = new Date();
              if( (ngaycap.getFullYear() - ngaysinh.getFullYear()) < 14 ) {
                var namCap =  ngaysinh.getFullYear() + 14;
                $("#ngaycap-edit").val(namCap + '-01-01');
              }
              if(ngaycap > now) {
                document.getElementById("ngaycap-edit").valueAsDate = new Date();
              }
          });
          $("#search").keyup(function() {
            $.ajax({
              type:'get',
              url: '{{ url("page/timkh") }}',
              data: {name:$("#search").val()},
              async: true,
              success: function(data){
                $("#dtable").html(data);
              }
            });
          });
          $()
          $('#dtdd-add').keyup('change', function () {
              if(checkPhoneNumber($('#dtdd-add').val())) {
                 $("#submitbtn-add").show();
              } else {
                 $("#submitbtn-add").hide();
              }
          });
          $('#dtdd-edit').keyup('change', function () {
              if(checkPhoneNumber($('#dtdd-edit').val())) {
                 $("#submitbtn-edit").show();
              } else {
                 $("#submitbtn-edit").hide();
              }
          })
        });
      </script>
      @endsection
@section('title','Quản lý thông tin cá nhân')
@extends('layout.master_ban')
@section('content')
<div class="inside-banner">
  <div class="container"> 
    <h2>Quản lý thông tin tài khoản</h2>
  </div>
</div>
<div class="container">
  <div class="properties-listing spacer">
    <div class="row">
     <div class="panel panel-default">
      <div class="panel-heading" style="font-size: 20px;font-weight: bold;">THÔNG TIN</div>
      <div class="panel-body">
        <div class="col-lg-12 col-sm-12">
          <div class="row"">
            <!-- properties -->
            <?php $a=0; ?>
            <div class="col-md-7 thongtin">
              <p>Tên tài khoản: {{$thongtin->name}}</p>
              <p>Password: *******</p>
              <p>Email: {{$thongtin->email}}</p>
              <p> <a href="{{route('view_tindadang')}}">Tin đã đăng</a></p>
            </div>
            <div class="col-md-5 thongtin">
              <p>Ngày tạo: <?php $date=date_create($thongtin->created_at);echo date_format($date,"d/m/Y H:i:s") ?></p>    
              <p>Số bài đăng: {{$sobaidang}}</p>
              <p>Tiền hiện có: {{number_format($thongtin->Tien)}} VNĐ</p>
              <p><a href="lichsugiaodich/{{Auth::user()->id}}">Lịch sử giao dịch</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" style="font-size: 20px;font-weight: bold;">NẠP TIỀN</div>
      <div class="panel-body">
        <div class="col-lg-12 col-sm-12">
          <div class="row"">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="iduser" id="iduser" value=" {{ Auth::user()->id }} ">
            <div class="form-group">
              <label class="col-sm-2 control-label-form">Chọn mệnh giá</label>
              <div class="col-sm-9">
                <select class="form-control" name="menhgia" id="menhgia">
                    <option value="20000">20.000 VND</option>
                    <option value="50000">50.000 VND</option>
                    <option value="100000">100.000 VND</option>
                    <option value="500000">500.000 VND</option>
                  </select>
              </div>
            </div>
           <div class="form-group">
              <label class="col-sm-2 control-label-form">Mật khẩu</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="pass" id="password">
                <div id="ktmk1" class="sub"></div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label-form">Nhập lại mật khẩu</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="repass" id="repass">
                <div id="ktmk2" class="sub"></div>
              </div>
            </div>
            <div class="col-md-5"></div>
            <div class="col-md-2"><button type="button" onclick="capnhattien()" id="submitbtn" name="submitbtn" class="btn btn-basic" >NẠP TIỀN</button></div>
          </form>
            
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" style="font-size: 20px;font-weight: bold;">ĐỔI MẬT KHẨU</div>
      <div class="panel-body">
        <div class="col-lg-12 col-sm-12">
          <div class="row"">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="iduser" value=" {{ Auth::user()->id }} ">
            <div class="form-group">
              <label class="col-sm-2   control-label-form">Mật khẩu cũ</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="passold" id="passold" required>
                <div id="ktmk3" class="sub"></div>
              </div>
            </div>
           <div class="form-group">
              <label class="col-sm-2 control-label-form">Mật khẩu mới</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="passnew" id="passnew">
                <div id="ktmk4" class="sub"></div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label-form">Nhập lại mật khẩu mới</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="repass" id="repassnew">
                <div id="ktmk5" class="sub"></div>
              </div>
            </div>
            <div class="col-md-5"></div>
            <div class="col-md-2"><button type="button" onclick="capnhatmatkhau()" id="submitbtn" name="submitbtn" class="btn btn-basic" >CẬP NHẬT</button></div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
  function capnhattien()
  {
    iduser = $('#iduser').val();
    pass = $('#password').val();
    repass = $('#repass').val();
    tien = $('#menhgia').val();
    check = 0;
    if(pass == '')
    {
      document.getElementById("password").style.marginBottom = "0";
      check++;
      $('#ktmk1').html('*Mật khẩu không được để trống');
    }
    if(repass == '')
    {
      document.getElementById("repass").style.marginBottom = "0";
      check++;
      $('#ktmk2').html('*Mật khẩu không được để trống');
    }
    if(pass != repass)
    {
      document.getElementById("repass").style.marginBottom = "0";
      check++;
      $('#ktmk2').html('*Mật khẩu nhập lại không khớp');
    }
    if(check ==0)
    {
      $.ajax({
        type:'post',
        url:'{{ url("naptien") }}',
        data:{
          iduser: iduser,
          pass: pass,
          repass: repass,
          tien: tien,
        },
        async: true,
        success:function(html){
          if(html == 1)
          {
            alert('Nạp tiền thành công');
            window.location='{{url("quanlytrangcanhan")}}';
          }
          else
          {
            alert('Mật khẩu nhập không đúng.');
            $('#password').val('');
            $('#repass').val('');
          }
        }
      }); 
    }         
  }
  function capnhatmatkhau()
  {
    iduser = $('#iduser').val();
    passold = $('#passold').val();
    repass = $('#repassnew').val();
    passnew = $('#passnew').val();
    check = 0;
    if(passold == '')
    {
      document.getElementById("passold").style.marginBottom = "0";
      check++;
      $('#ktmk3').html('*Mật khẩu không được để trống');
    }
    if(repass == '')
    {
      document.getElementById("repassnew").style.marginBottom = "0";
      check++;
      $('#ktmk5').html('*Mật khẩu không được để trống');
    }
    if(passnew == '')
    {
      document.getElementById("passnew").style.marginBottom = "0";
      check++;
      $('#ktmk4').html('*Mật khẩu không được để trống');
    }
    if(passnew != repass)
    {
      document.getElementById("repassnew").style.marginBottom = "0";
      check++;
      $('#ktmk5').html('*Mật khẩu nhập lại không khớp');
    }
    if(check ==0)
    {
      $.ajax({
        type:'post',
        url:'{{ url("naptien") }}',
        data:{
          iduser: iduser,
          pass: pass,
          repass: repass,
          tien: tien,
        },
        async: true,
        success:function(html){
          if(html == 1)
          {
            alert('Cập nhật mật khẩu thành công');
            window.location='{{url("quanlytrangcanhan")}}';
          }
          else
          {
            alert('Mật khẩu nhập không đúng.');
            $('#password').val('');
            $('#repass').val('');
          }
        }
      }); 
    }         
  }
</script>
@endsection
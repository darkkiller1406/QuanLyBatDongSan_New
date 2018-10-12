@section('title','Quản lý thông tin cá nhân')
@extends('layout.master_ban')
@section('content')
<section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <div class="breadcumb-content">
          <h3 class="breadcumb-title">QUẢN LÝ THÔNG TIN CÁ NHÂN</h3>
        </div>
      </div>
    </div>
  </div>
</section>
<?php if(isset($thongbao)) echo '<script type="text/javascript">alert("'.$thongbao.'");</script>'; ?>
<section class="south-contact-area section-padding-100">
  <div class="container">
    <div class="row">
      <div class="contact-heading">
        <h6>Thông tin</h6>
      </div>
    </div>
    <div class="col-lg-12 col-sm-12">
      <div class="row"">
        <!-- properties -->
        <?php $a=0; ?>
        <div class="col-md-7">
          <p>Tên tài khoản: {{$thongtin->name}}</p>
          <p>Password: *******</p>
          <p>Email: {{$thongtin->email}}</p>
          <p> <a class="btn south-btn" href="{{route('view_tindadang')}}">Tin đã đăng</a></p>
        </div>
        <div class="col-md-5">
          <p>Ngày tạo: <?php $date=date_create($thongtin->created_at);echo date_format($date,"d/m/Y H:i:s") ?></p>    
          <p>Số bài đăng: {{$sobaidang}}</p>
          <p>Tiền hiện có: {{number_format($thongtin->Tien)}} VNĐ</p>
          <p><a class="btn south-btn" href="lichsugiaodich/{{Auth::user()->id}}">Lịch sử giao dịch</a></p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="contact-heading" style="margin-top: 50px;">
        <h6>Nạp tiền</h6>
      </div>
    </div>
    <div class="row"">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="iduser" id="iduser" value=" {{ Auth::user()->id }} ">
      <input type="hidden" name="nameuser" id="nameuser" value=" {{ Auth::user()->name }} ">
      <label class="col-sm-2">Chọn mệnh giá</label>
      <div class="col-sm-9">
        <select class="form-control" name="menhgia" id="menhgia">
          <option value="20000">20.000 VND</option>
          <option value="50000">50.000 VND</option>
          <option value="100000">100.000 VND</option>
          <option value="500000">500.000 VND</option>
        </select>
      </div>
      <label class="col-sm-2 control-label-form">Mật khẩu</label>
      <div class="col-sm-9">
        <input type="password" class="form-control" name="pass" id="password">
        <div id="ktmk1" class="sub"></div>
      </div>
      <label class="col-sm-2 control-label-form">Nhập lại mật khẩu</label>
      <div class="col-sm-9">
        <input type="password" class="form-control" name="repass" id="repass">
        <div id="ktmk2" class="sub"></div>
      </div>
      <div class="col-md-5"></div>
      <div class="col-md-2"><button type="button" onclick="capnhattien()" id="submitbtn" name="submitbtn" class="btn south-btn" >CẬP NHẬT</button></div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="contact-heading" style="margin-top: 50px;">
        <h6>Đổi mật khẩu</h6>
      </div>
    </div>
    <div class="row"">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="iduser" value=" {{ Auth::user()->id }} ">
      <label class="col-sm-2   control-label-form">Mật khẩu cũ</label>
      <div class="col-sm-9">
        <input type="password" class="form-control" name="passold" id="passold" required>
        <div id="ktmk3" class="sub"></div>
      </div>
      <label class="col-sm-2 control-label-form">Mật khẩu mới</label>
      <div class="col-sm-9">
        <input type="password" class="form-control" name="passnew" id="passnew">
        <div id="ktmk4" class="sub"></div>
      </div>
      <label class="col-sm-2 control-label-form">Nhập lại mật khẩu mới</label>
      <div class="col-sm-9">
        <input type="password" class="form-control" name="repass" id="repassnew">
        <div id="ktmk5" class="sub"></div>
      </div>
      <div class="col-md-5"></div>
      <div class="col-md-2"><button type="button" onclick="capnhatmatkhau()" id="submitbtn" name="submitbtn" class="btn south-btn" >CẬP NHẬT</button></div>
    </div>
  </div>
</section>
@endsection
@section('script')
<script type="text/javascript">
  function capnhattien()
  {
    nameuser = $('#nameuser').val();
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
      var return_url = '{{ url("naptien")}}';
      $.ajax({
        type: 'post',
        url: '{{ url("naptien")}}',
        data:{
          nameuser: nameuser,
          iduser: iduser,
          pass: pass,
          repass: repass,
          tien: tien,
        },
        async: true,
        success:function(html){
          if(html == 1) {
            alert('Nạp tiền thành công');
            window.location='{{url("quanlytrangcanhan")}}';
          } else if(html == 0) {
            window.open("https://sandbox.nganluong.vn:8088/nl35/button_payment.php?receiver=minh.1406.nt@gmail.com&product_name=(Mã đơn đặt hàng)&price=" + tien + "&return_url="+return_url+"&comments=(Ghi chú về đơn hàng)", '_blank');
            $('#password').val('');
            $('#repass').val('');
          } else {
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
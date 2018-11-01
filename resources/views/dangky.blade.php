@section('title','Đăng ký')
@extends('layout.master_ban')
@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img" style="background-image: url(img/bg-img/hero1.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <div class="breadcumb-content">
          <h3 class="breadcumb-title">Đăng ký</h3>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ##### Breadcumb Area End ##### -->


<div class="container">
  <div class="spacer">
    <div class="row register">
      @if(count($errors) > 0)
      <div class="alert alert-danger" style="font-size: 1.2em;text-align: center;margin-top: 20px;">
        @foreach($errors->all() as $err)
        {{ $err }}<br>
        @endforeach
      </div>
      @endif

      @if(session('thongbao'))
      <div class="alert alert-success" style="font-size: 1.2em;text-align: center;margin-top: 20px;">
        {{ session('thongbao') }}
      </div>
      @endif
      @if(session('canhbao'))
      <div class="alert alert-danger" style="font-size: 1.2em;text-align: center;margin-top: 20px;">
        {{ session('canhbao') }}
      </div>
      @endif
      <section class="south-contact-area section-padding-100">
        <div class="container">
          <div class="row">
            <div class="contact-heading">
              <h6>Thông tin cơ bản</h6>
            </div>
            <div class="col-lg-12">
              <input type="text" class="form-control" placeholder="Tên đầy đủ" name="ten" id="ten" required>
              <div class="col-lg-2"></div>
              <div id="ktTen" class="sub"></div>
            </div>
            <div class="col-lg-12">
              <input type="text" class="form-control" placeholder="Tên đăng nhập" name="username" id="username" required>
              <div class="col-lg-2"></div>
              <div id="ktTenDangNhap" class="sub"></div>
            </div>  
            <div class="col-lg-12">
              <input type="password" class="form-control" placeholder="Mật khẩu" name="password" id="password" required>
              <div class="col-lg-2"></div>
              <div id="ktMatKhau" class="sub"></div>
            </div>
            <div class="col-lg-12">
              <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="passwordAgain" id="passwordAgain" required>
              <div class="col-lg-2"></div>
              <div id="ktMatKhauNhapLai" class="sub"></div>
            </div>
          </div>
          <div class="row">
            <div class="contact-heading">
              <h6>Thông tin công ty</h6>
            </div>
            <div class="col-lg-12">
              <input type="text" class="form-control" placeholder="Tên công ty" name="tenCongTy" id="tenCongTy" required>
              <div class="col-lg-2"></div>
              <div id="ktTenCongTy" class="sub"></div>
            </div>
            <div class="col-lg-12">
              <input type="text" class="form-control" placeholder="Địa chỉ" name="diaChi" id="diaChi" required>
              <div class="col-lg-2"></div>
              <div id="ktDiaChi" class="sub"></div>
            </div>
            <div class="col-lg-12">
              <input type="text" class="form-control" placeholder="Số điện thoại" name="sdt" id="sdt" required>
              <div class="col-lg-2"></div>
              <div id="ktSDT" class="sub"></div>
            </div>
            <div class="col-lg-12">
              <input type="text" class="form-control" placeholder="Email công ty" name="emailCongTy" id="emailCongTy" required>
              <div class="col-lg-2"></div>
              <div id="ktEmailCongTy" class="sub"></div>
            </div>
              <div class="col-sm-3"></div>
              <button type="button" class="btn south-btn" name="Submit" onclick="dangky()" style="width: 50%;font-size: 18px">
                Đăng ký
              </button>
          </div>
        </div>
        </section>
      </div>
    </div>
  </div>
  

    @endsection
@section('script')
    <script type="text/javascript">
      $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });
  function dangky()
  {

      var name = $('#ten').val();
      var id = $('#username').val();
      var pass = $('#password').val();
      var repass = $('#passwordAgain').val();
      var emailCongTy = $('#emailCongTy').val();
      var sdt = $('#sdt').val();
      var tenCongTy = $('#tenCongTy').val();
      var diaChi = $('#diaChi').val();
      var check = 0;
      if(name == '')
      {
        document.getElementById("ten").style.marginBottom = "0";
        $('#ktTen').html('*Vui lòng nhập tên');
        check++;
      }
      else
      {
        document.getElementById("ten").style.marginBottom = "20px";
        $('#ktTen').html('');
      }
      if(tenCongTy == '')
      {
        document.getElementById("tenCongTy").style.marginBottom = "0";
        $('#ktTenCongTy').html('*Vui lòng nhập tên');
        check++;
      }
      else
      {
        document.getElementById("tenCongTy").style.marginBottom = "20px";
        $('#ktTenCongTy').html('');
      }
      if(diaChi == '')
      {
        document.getElementById("diaChi").style.marginBottom = "0";
        $('#ktDiaChi').html('*Vui lòng nhập địa chỉ');
        check++;
      }
      else
      {
        document.getElementById("diaChi").style.marginBottom = "20px";
        $('#ktDiaChi').html('');
      }
      if ($('#sdt').val() == '') {
        document.getElementById("sdt").style.marginBottom = "0";
        $('#ktSDT').html('*Vui lòng nhập điện thoại liên lạc');
        check++;
      }
      else {
        if (this.checkPhoneNumber() == false) {
          document.getElementById("sdt").style.marginBottom = "0";
          $('#ktSDT').html('*Vui lòng nhập đúng định dạng điện thoại');
          check++;
        }
        else {
          document.getElementById("sdt").style.marginBottom = "20px";
          $('#ktSDT').html('');
        }
      }
      if(id == '')
      {
        document.getElementById("username").style.marginBottom = "0";
        $('#ktTenDangNhap').html('*Vui lòng nhập tên đăng nhập');
        check++;
      }
      else
      {
        if(id.length < 3)
        {
          document.getElementById("username").style.marginBottom = "0";
          $('#ktTenDangNhap').html('*Vui lòng nhập tên đăng nhập lớn hơn 3 ký tự');
          check++;
        }
        else
        {
          document.getElementById("username").style.marginBottom = "20px";
          $('#ktTenDangNhap').html('');
        }
      }
      if(pass == '')
      {
        document.getElementById("password").style.marginBottom = "0";
        $('#ktMatKhau').html('*Vui lòng nhập mật khẩu');
        check++;
      }
      else
      {
        if(pass.length < 6)
        {
          document.getElementById("password").style.marginBottom = "0";
          $('#ktMatKhau').html('*Vui lòng nhập mật khẩu lớn hơn hoặc bằng 6 ký tự');
          check++;
        }
        else
        {
          document.getElementById("password").style.marginBottom = "20px;";
          $('#ktMatKhau').html('');
        }
      }
      if(repass == '')
      {
        document.getElementById("passwordAgain").style.marginBottom = "0";
        document.getElementById("ktMatKhauNhapLai").style.marginBottom = "20px";
        $('#ktMatKhauNhapLai').html('*Vui lòng nhập lại mật khẩu');
        check++;
      }
      else
      {
        if(repass != pass)
        {
         document.getElementById("passwordAgain").style.marginBottom = "0";
         document.getElementById("ktMatKhauNhapLai").style.marginBottom = "20px";
         $('#ktMatKhauNhapLai').html('*Vui lòng nhập lại mật khẩu đúng với mật khẩu đã nhập');
         check++;
       }
       else
       {
        document.getElementById("passwordAgain").style.marginBottom = "20px;";
        document.getElementById("ktMatKhauNhapLai").style.marginBottom = "0";
        $('#ktMatKhauNhapLai').html('');
      }
    }
    if($('#emailCongTy').val() == '')
    {
      document.getElementById("emailCongTy").style.marginBottom = "0";
      $('#ktEmailCongTy').html('*Vui lòng nhập email');
      check++;
    }
    else
    {
      var email = document.getElementById('emailCongTy'); 
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
      if (!filter.test(email.value)) { 
        document.getElementById("emailCongTy").style.marginBottom = "0";
        $('#ktEmailCongTy').html('*Hãy nhập địa chỉ email hợp lệ.Example@gmail.com');
        check++;
      }
      else
      {
        $('#ktEmailCongTy').html('');
      }
    }
    if(check == 0)
    {
      $.ajax({
        type:'post',
        url:"{{route('postDangKy')}}",
        data: {
          name: name,
          username: id,
          password: pass,
          passwordAgain: repass,
          email: emailCongTy,
          sdt: sdt,
          tenCongTy: tenCongTy,
          diaChi: diaChi,
        },
        async: true,
        success:function(html){
          //window.location.href = "http://stackoverflow.com";
        },
        error : function() {
          alert('Bạn nhập hoặc tên công ty hoặc email hoặc SDT đã có trong hệ thống');
        }
      });
    }
  }
  function checkPhoneNumber() {
    var flag = false;
    var phone = $('#sdt').val().trim(); // ID của trường Số điện thoại
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
      } else if (firstNumber == '01' && phone.length == 11) {
        if (phone.match(/^\d{11}/)) {
          flag = true;
        }
      }
    }
    return flag;
  }
</script>
@endsection
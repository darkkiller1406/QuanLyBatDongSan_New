@section('title','Đăng ký')
@extends('layout.master_ban')
@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img" style="background-image: url({{asset('img/bg-img/hero1.jpg')}});">
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
            <div class="col-lg-12">
              <select class="form-control" id="loaiTaiKhoan" name="loaiTaiKhoan">
                <option value="1">Gói cơ bản</option>
                <option value="2">Gói nâng cao</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="contact-heading">
              <h6>Thông tin công ty </h6>
            </div>
            <div class="col-lg-12">
              <input type="text" class="form-control" placeholder="Tên công ty" name="tenCongTy" id="tenCongTy" required>
              <div class="col-lg-2"></div>
              <div id="ktTenCongTy" class="sub"></div>
            </div>
            <div class="col-lg-12">
              <input type="text" class="form-control" placeholder="Địa chỉ truy cập" name="diaChiTruyCap" id="diaChiTruyCap" required>
              <div class="col-lg-2"></div>
              <div id="ktDiaChiTruyCap" class="sub"></div>
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
            <div class="col-lg-12" style="margin-top: -10px;">
              <label>Logo công ty</label>
              <input type="file" name="image[]" class="form-control" id="img" required/>
              <div class="col-lg-2"></div>
              <div id="ktLogo" class="sub"></div>
            </div>
              <div class="col-sm-5"></div>
              <div class="col-sm-3"><button type="button" class="btn south-btn" name="Submit" onclick="dangky()" style="width: 50%;font-size: 18px">Đăng ký</button>  
              </div>
          </div>
        </div>
        </section>
      </div>
    </div>
  </div>
  

@endsection
@section('script')
<script src="js/dangky.js"></script>
<script>
  $('#diaChiTruyCap').on('keyup', function () {
    var diachi = $('#diaChiTruyCap').val().replace('/', '');
    $('#diaChiTruyCap').val(diachi);
    <?php echo 'var temp = "'.asset('page/dangnhap').'";'; ?>
    document.getElementById("diaChiTruyCap").style.marginBottom = "0";
    document.getElementById("ktDiaChiTruyCap").style.marginBottom = "20px";
    document.getElementById("ktDiaChiTruyCap").style.color = "green";
    $('#ktDiaChiTruyCap').html(temp + '/' + diachi);
  });
  $('#emailCongTy').on('keyup', function () {
    document.getElementById("emailCongTy").style.marginBottom = "0";
    document.getElementById("ktEmailCongTy").style.marginBottom = "20px";
    document.getElementById("ktEmailCongTy").style.color = "#D2691E";
    $('#ktEmailCongTy').html('Chú ý: Sử dụng địa chỉ email thật để kích hoạt tài khoản.');
  });
</script>
@endsection
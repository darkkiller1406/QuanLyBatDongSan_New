
$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  function dangky()
  {
      var data = new FormData()
      var loaiTaiKhoan = $('#loaiTaiKhoan').val();
      var name = $('#ten').val();
      var id = $('#username').val();
      var pass = $('#password').val();
      var repass = $('#passwordAgain').val();
      var emailCongTy = $('#emailCongTy').val();
      var sdt = $('#sdt').val();
      var tenCongTy = $('#tenCongTy').val();
      var diaChi = $('#diaChi').val();
      var diaChiTruyCap = $('#diaChiTruyCap').val();
      var check = 0;
      data.append("logo", $("#img")[0].files[0]);
      data.append("username", id);
      data.append("name", name);
      data.append("password", pass);
      data.append("passwordAgain", repass);
      data.append("email", emailCongTy);
      data.append("sdt", sdt);
      data.append("tenCongTy", tenCongTy);
      data.append("diaChi", diaChi);
      data.append("diaChiTruyCap", diaChiTruyCap);
      data.append("loaiTaiKhoan", loaiTaiKhoan);
      data.append("tien", tien);
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
        $('#ktTenCongTy').html('*Vui lòng nhập tên công ty');
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
      if(diaChiTruyCap == '')
      {
        document.getElementById("diaChiTruyCap").style.marginBottom = "0";
        document.getElementById("ktDiaChiTruyCap").style.color = "red";
        $('#ktDiaChiTruyCap').html('*Vui lòng nhập địa chỉ truy cập');
        check++;
      }
      else
      {
         document.getElementById("diaChiTruyCap").style.marginBottom = "20px";
         $('#ktDiaChiTruyCap').html('');
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
        re1 = /[0-9]/;
        re2 = /[a-z]/;
        re3 = /[A-Z]/;
        if(pass.length < 6)
        {
          document.getElementById("password").style.marginBottom = "0";
          $('#ktMatKhau').html('*Vui lòng nhập mật khẩu lớn hơn hoặc bằng 6 ký tự');
          check++;
        } 
        else if(!re1.test(pass))
        {
          document.getElementById("password").style.marginBottom = "0";
          $('#ktMatKhau').html('*Vui lòng nhập mật khẩu có ít nhất một số (0-9)');
          check++;
        } 
        else if(!re2.test(pass))
        {
          document.getElementById("password").style.marginBottom = "0";
          $('#ktMatKhau').html('*Vui lòng nhập mật khẩu có ít nhất một kí tự viết thường (a-z)');
          check++;
        }
        else if(!re3.test(pass))
        {
          document.getElementById("password").style.marginBottom = "0";
          $('#ktMatKhau').html('*Vui lòng nhập mật khẩu có ít nhất một kí tự viết hoa (A-Z)');
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
      var tien;
      if($('#loaiTaiKhoan').val() == 1) {
        tien = 120000;
      } else {
        tien = 180000;
      }
      $.ajax({
        type:'post',
        url:"checkunique",
        data: {
          link: diaChiTruyCap,
          username: id,
          mail: emailCongTy,
          tenCongTy: tenCongTy,
          diaChi: diaChi,
          diaChiTruyCap: diaChiTruyCap,
          sdt: sdt
        },
        async: true,
        success:function(html){
            var check = 0 ;
            console.log(html);
            if(html['email'] == 1) {
              document.getElementById("emailCongTy").style.marginBottom = "0";
              $('#ktEmailCongTy').html('*Email đã có trong hệ thống');
              check ++;
            }
            if(html['tenCongTy'] == 1) {
              document.getElementById("tenCongTy").style.marginBottom = "0";
              $('#ktTenCongTy').html('*Tên công ty đã có trong hệ thống');
              check++;
            }
            if(html['link'] == 1) {
              document.getElementById("diaChiTruyCap").style.marginBottom = "0";
              document.getElementById("ktDiaChiTruyCap").style.color = "red";
              $('#ktDiaChiTruyCap').html('*Địa chỉ truy cập đã có trong hệ thống');
              check++;
            }
            if(html['diaChi'] == 1) {
              document.getElementById("diaChi").style.marginBottom = "0";
              $('#ktDiaChi').html('*Địa chỉ đã có trong hệ thống');
              check++;
            }
            if(html['sdt'] == 1) {
              document.getElementById("sdt").style.marginBottom = "0";
              $('#ktSDT').html('*SDT đã có trong hệ thống');
              check++;
            }
            if (check == 0) {
              $.ajax({
                type:'post',
                url:"postdangky",
                data: data,
                processData: false, contentType: false,
                async: true,
                success:function(data){
                  window.location.href = data;
                },
                error : function() {
                  alert('Không kết nối được với máy chủ ! Vui lòng thử lại sau');
                }
              });
            }
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
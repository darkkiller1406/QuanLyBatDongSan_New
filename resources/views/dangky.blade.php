@section('title','Đăng ký')
@extends('layout.master_ban')
@section('content')
<div class="inside-banner">
  <div class="container"> 
    <h2>Register</h2>
</div>
</div>
<!-- banner -->


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
          <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
            <form method="post" action="{{route('postDangKy')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" class="form-control" placeholder="Tên đầy đủ" name="form_name">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <input type="text" class="form-control" placeholder="Tên đăng nhập" name="name">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <input type="password" class="form-control" placeholder="Nhập lại password" name="passwordAgain">
                <div class="col-sm-3"></div>
                <button type="submit" class="btn btn-detail" name="Submit" style="width: 50%;font-size: 18px">Đăng ký</button>
            </form>  
        </div>
  
</div>
</div>
</div>
@endsection
<!-- @section('script')
<script type="text/javascript">
  $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });
  function dangky()
  {
      var name = $('#form_name').val();
      var id = $('#name').val();
      var pass = $('#password').val();
      var repass = $('#passwordAgain').val();
      var email = $('#email').val();
      var check = 0;
      if(name == '')
      {
        document.getElementById("form_name").style.marginBottom = "0";
        $('#ktten').html('*Vui lòng nhập tên');
        check++;
      }
      else
      {
        document.getElementById("form_name").style.marginBottom = "20px";
        $('#ktten').html('');
      }
      if(id == '')
      {
        document.getElementById("name").style.marginBottom = "0";
        $('#kttendangnhap').html('*Vui lòng nhập tên đăng nhập');
        check++;
      }
      else
      {
        if(id.length < 3)
        {
          document.getElementById("name").style.marginBottom = "0";
          $('#kttendangnhap').html('*Vui lòng nhập tên đăng nhập lớn hơn 3 ký tự');
          check++;
        }
        else
        {
          document.getElementById("name").style.marginBottom = "20px";
          $('#kttendangnhap').html('');
        }
      }
      if(pass == '')
      {
        document.getElementById("password").style.marginBottom = "0";
        $('#ktpassword').html('*Vui lòng nhập mật khẩu');
        check++;
      }
      else
      {
        if(pass.length < 6)
        {
          document.getElementById("password").style.marginBottom = "0";
          $('#ktpassword').html('*Vui lòng nhập mật khẩu lớn hơn hoặc bằng 6 ký tự');
          check++;
        }
        else
        {
          document.getElementById("password").style.marginBottom = "20px;";
          $('#ktpassword').html('');
        }
      }
      if(repass == '')
      {
        document.getElementById("passwordAgain").style.marginBottom = "0";
        $('#ktrepass').html('*Vui lòng nhập lại mật khẩu');
        check++;
      }
      else
      {
        if(repass != pass)
        {
         document.getElementById("passwordAgain").style.marginBottom = "0";
         $('#ktrepass').html('*Vui lòng nhập lại mật khẩu đúng với mật khẩu đã nhập');
         check++;
       }
       else
       {
        document.getElementById("passwordAgain").style.marginBottom = "20px;";
        $('#ktrepass').html('');
      }
    }
    if($('#email').val() == '')
    {
      document.getElementById("email").style.marginBottom = "0";
      $('#ktemail').html('*Vui lòng nhập email');
      check++;
    }
    else
    {
      var email = document.getElementById('email'); 
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
      if (!filter.test(email.value)) { 
        document.getElementById("email").style.marginBottom = "0";
        $('#ktemail').html('*Hãy nhập địa chỉ email hợp lệ.Example@gmail.com');
        check++;
      }
      else
      {
        $.ajax({
                type:'post',
                url:"{{route('postDangKy')}}",
                data: {
                  name: $('#name').val(),
                  password: $('#password').val(),
                  email: $('#email').val(),
                  ten: $('#form_name').val()
                },
                async: true,
                success:function(html){
                alert(html);
               }
             });
        $('#ktemail').html('');
      }
    }
        if(check == 0)
        {
          $.ajax({
                type:'post',
                url:"{{route('postDangKy')}}",
                data: {
                  name: $('#name').val(),
                  password: $('#password').val(),
                  email: $('#email').val(),
                  ten: $('#form_name').val()
                },
                async: true,
                success:function(html){
                alert(html);
               }
             });
        }
  }
</script>
@endsection -->
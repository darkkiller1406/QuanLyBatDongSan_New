<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <div id="login-page">
        <div class="container">

          <form method="POST" action="{{ route('password.request') }}">
            <h2 class="form-login-heading">Quên mật khẩu ?</h2>
            <div class="login-wrap">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

             @if ($errors->has('email'))
             <span class="invalid-feedback">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
            <span class="invalid-feedback">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
                                @endif
             <br>
             <input type="hidden" name="link" value="{{$link}}">
             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
             <label class="checkbox">
            </label>
            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Xác nhận</button>
             @if(count($errors) > 0)
             <div class="alert alert-danger" style="font-size: 0.9em;text-align: center;margin-top: 20px;">
               @foreach($errors->all() as $err)
               {{ $err }}<br>
               @endforeach
             </div>
             @endif

             @if(session('thongbao'))
             <div class="alert alert-danger" style="font-size: 0.9em;text-align: center;margin-top: 20px;">
               {{ session('thongbao') }}
             </div>
             @endif
           </div>
         </form>      

</div>
</div>

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script> 
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="{{asset('js/jquery.backstretch.min.js')}}"></script>
<script>
     $.backstretch("{{asset('img/login_bg.jpg')}}", {speed: 500});
</script>


</body>
</html>

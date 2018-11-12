<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">
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

            <form class="form-login" method="POST" action="{{ route('password.email') }}">
                <h2 class="form-login-heading">Quên mật khẩu ?</h2>
                <div class="login-wrap">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
             @if (session('status'))
             <div class="alert alert-success">
              {{ session('status') }}
            </div>
            @endif
            @if(count($errors) > 0)
             <div class="alert alert-danger" style="font-size: 0.9em;text-align: center">
               @foreach($errors->all() as $err)
               {{ $err }}<br>
               @endforeach
             </div>
             @endif
             <p>Nhập email của bạn để reset password.</p>
             <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
             <br>
             <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i>Reset Password</button>
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

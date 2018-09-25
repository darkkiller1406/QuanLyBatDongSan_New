<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('icon/css/fontawesome.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/gritter/css/jquery.gritter.css')}}" />  
    <link rel="stylesheet" type="text/css" href="{{asset('icon/css/fontawesome-all.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet">
    <script src="{{asset('js/chart-master/Chart.js')}}"></script>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>   
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{asset('js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.sparkline.js')}}"></script>
    
    <title>@yield('title')</title>
    @yield('css')
  </head>
  <body>
  @include('layout.menu')
	@yield('content')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    

    @yield('script')
  </body>

</html>
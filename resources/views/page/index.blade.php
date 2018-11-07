@section('title','Trang chủ')
@extends('layout.master')
@section('content')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<!--MAIN CONTENT
  *********************************************************************************************************************************************************** -->
  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">

      <div class="row">
        <div class="col-lg-12 main-chart">

         <div class="row mtbox">
          <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
           <div class="box1">
            <i class="fas fa-clipboard" style="font-size: 70px"></i>
            <h5>{{$thongke["hopdong"]}} hợp đồng</h5>
          </div>
        </div>
        <div class="col-md-2 col-sm-2 box0">
         <div class="box1">
          <i class="fas fa-map" style="font-size: 70px"></i>
          <h5>{{$thongke["dat"]}} lô đất</h5>
        </div>
      </div>
      <div class="col-md-2 col-sm-2 box0">
       <div class="box1">
        <i class="fas fa-clipboard-list" style="font-size: 70px"></i>
        <h5>{{$thongke["yeucau"]}} yêu cầu</h5>
      </div>
      <p></p>
    </div>
    <div class="col-md-2 col-sm-2 box0">
     <div class="box1">
      <i class="fas fa-users" style="font-size: 70px"></i>
      <h5>{{$thongke["khachhang"]}} khách hàng.</h5>
    </div>
    <p></p>
  </div>
  <div class="col-md-2 col-sm-2 box0">
   <div class="box1">
    <i class="fas fa-user" style="font-size: 70px"></i>
    <h5>{{$thongke["nguoisudung"]}} người dụng.</h5>
  </div>
  <p></p>
</div>
</div>
@if ($thongke["dattondong"] > 0)
<div class="col-lg-2"></div>
<div class="col-lg-8">
<div class="alert alert-warning" role="alert" style="text-align: center;">
    Đang có <b>{{$thongke["dattondong"]}}</b> lô đất tồn đọng trong hệ thống
</div>
</div>
@endif
</div>

</div><!-- /row mt -->
</section>
</section>

<!--main content end-->
</section>

@endsection
@section('script')
<!-- js placed at the end of the document so the pages load faster -->
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!--common script for all pages-->
<script src="{{asset('js/common-scripts.js')}}"></script>

<!--script for this page-->
<script src="{{asset('js/sparkline-chart.js')}}"></script>    

@endsection
@section('title','Trang chủ')
@extends('layout.master')
@section('content')
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
            <h3></h3>
          </div>
          <p> hợp đồng đã được hoành thanh</p>
        </div>
        <div class="col-md-2 col-sm-2 box0">
         <div class="box1">
          <i class="far fa-clipboard" style="font-size: 70px"></i>
          <h3></h3>
        </div>
        <p> hợp đồng đang được xử lý</p>
      </div>
      <div class="col-md-2 col-sm-2 box0">
       <div class="box1">
        <i class="fas fa-building" style="font-size: 70px"></i>
        <h3></h3>
      </div>
      <p>Hiện có  dự án đang được giao dịch.</p>
    </div>
    <div class="col-md-2 col-sm-2 box0">
     <div class="box1">
      <i class="fas fa-users" style="font-size: 70px"></i>
      <h3></h3>
    </div>
    <p>Đang có  khách hàng.</p>
  </div>
  <div class="col-md-2 col-sm-2 box0">
   <div class="box1">
    <i class="fas fa-user" style="font-size: 70px"></i>
    <h3></h3>
  </div>
  <p>Tổng số lượng nhân viên là .</p>
</div>

</div><!-- /row mt -->	
</section>
</section>

<!--main content end-->
</section>

@endsection
@section('script')
<!-- js placed at the end of the document so the pages load faster -->



<!--common script for all pages-->
<script src="{{asset('js/common-scripts.js')}}"></script>

<!--script for this page-->
<script src="{{asset('js/sparkline-chart.js')}}"></script>    

@endsection
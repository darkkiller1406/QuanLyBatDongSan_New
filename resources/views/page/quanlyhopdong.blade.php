@section('title','Quản lý hóa đơn')
@extends('layout.master')
@section('content')
<section id="main-content">
  <section class="wrapper">
    <h3>QUẢN LÝ HÓA ĐƠN</h3>

    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel">
          @if(count($errors) > 0)
          <div class="alert alert-danger" style="font-size: 0.9em;text-align: center;margin-top: 20px;">
            @foreach($errors->all() as $err)
            {{ $err }}<br>
            @endforeach
          </div>
          @endif

          @if(session('thongbao'))
          <div class="alert alert-success" style="font-size: 0.9em;text-align: center;margin-top: 20px;">
            {{ session('thongbao') }}
          </div>
          @endif
          @if(session('canhbao'))
          <div class="alert alert-danger" style="font-size: 0.9em;text-align: center;margin-top: 20px;">
            {{ session('canhbao') }}
          </div>
          @endif
          <div class="form-group">
            <div class="col-md-3 col-sm-3 control-label"></div>
            <div class="col-md-6">
             <div id="custom-search-input">
              <div class="input-group col-md-12">
               <input type="text" id="search" class="form-control input-md" placeholder="Tìm kiếm" />
               <span class="input-group-btn">
                <button class="btn btn-info btn-lg">
                 <i class="glyphicon glyphicon-search"></i>
               </button>
             </span>
           </div>
         </div>
       </div>
     </div>
     <table id="dtable" class="table table-striped table-advance table-hover table-ed">
       <hr>
       <thead>
        <tr>
         <th>STT</th>
         <th>Mã hóa đơn</th>
         <th>Lô đất</th>
         <th>Tên khách hàng bán</th>
         <th>Tên khách hàng mua</th>
         <th>Phí môi giới</th>
         <th>Ngày lập</th>
         <th></th>
       </tr>
     </thead>
     <tbody>
      <?php $i=0 ?>
       @foreach($hopdong as $hd)
       <tr>
         <td>{{++$i}}</td>
         <td>{{$hd->MaHopDong}}</td>
         <td>{{$hd->dat->KyHieuLoDat}}</td>
         <td>@foreach ($khachhang as $kh)
                      <?php if($kh->id == $hd->dat->SoHuu) { 
                         echo $kh->HoVaTenDem.' '.$kh->Ten;
                      } ?>
                      @endforeach</td>
         <td>{{$hd->khachhang->HoVaTenDem}} {{$hd->khachhang->Ten}}</td>
         <td>{{number_format($hd->PhiMoiGioi)}}</td>
         <td><?php $date=date_create($hd->created_at);
          echo date_format($date,"d/m/Y H:i:s") ?></td>
         <td></td>
         <td>
          <button class="btn btn-danger btn-xs classXoa" idbd="{{$hd->id}}" id="{{$hd->id}}" onClick="reply_click(this.id)"><i class="fas fa-trash"></i></button>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div><!-- /content-panel -->
</div><!-- /col-md-12 -->
</div><!-- /row -->

</section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->


@endsection
@section('script')
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('js/common-scripts.js')}}"></script>
<script type="text/javascript">
        /// ajax
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        function reply_click(clicked_id)
        {
          var kq=  confirm('Bạn muốn xóa không ?');
          if(kq==true){
            var id = clicked_id;
            location.href='xoahd/'+id;
          }
        }
        $(document).ready(function(){
          $("#search").keyup(function() {
            $.ajax({
              type:'get',
              url: '{{ url("page/timhd") }}',
              data: {name:$("#search").val()},
              async: true,
              success: function(data){
                $("#dtable").html(data);
              }
            });
          });

        });
      </script>
      @endsection
@section('title','Thống kê doanh thu')
@extends('layout.master')
@section('content')
<section id="main-content">
  <section class="wrapper">
    <h3>THỐNG KÊ DOANH THU</h3>

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
          <div class="col-md-10">
          <form method="post" action="{{route('TKDT')}}">
            {{csrf_field()}}
            <div class="form-group">
              <div class="col-md-3 col-sm-3 control-label"></div>
              <div class="col-md-2">
                <div class="form-group">
                  <select class="form-control" name="thang">
                    <option value="13">Tất cả tháng</option>
                    <?php for($i=1;$i<=12;$i++)
                    {?>
                      <option value="{{$i}}" <?php if ($i==$month) echo 'selected' ?>>Tháng {{$i}}</option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <select class="form-control" name="nam">
                    <?php for($i=2018;$i<=date('Y');$i++)
                    {?>
                      <option value="{{$i}}" <?php if ($i==$year) echo 'selected' ?>>Năm {{$i}}</option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-sm-2 control-label"><button type="submit" class="btn btn-theme"><i class="fas fa-search"></i></button></div>
            </div>
          </form>
        </div>
          <div class="col-md-2">
            <div class="col-md-8"></div>
            <div class="form-group">
            <form method="post" action="{{route('inDT')}}">
              {{csrf_field()}}
              <input type="hidden" name="thangin" value="{{$month}}">
              <input type="hidden" name="namin" value="{{$year}}">
              <div class="col-md-1 col-sm-1 control-label"><button type="submit" class="btn btn-theme"><i class="fas fa-print"></i></button></div>
            </div>
          </form>
          </div>
          <table id="dtable" class="table table-striped table-advance table-hover table-ed">
           <hr>
           <thead>
            <tr>
             <th>STT</th>
             <th>Mã hóa đơn</th>
             <th>Lô đất</th>
             <th>Tên khách hàng mua</th>
             <th>Tên khách hàng mua</th>
             <th>Ngày lập</th>
             <th>Phí môi giới</th>
           </tr>
         </thead>
         <tbody>
          <?php $i=0;$tong =0; ?>
          @foreach($thongkedoanhthu as $hd)
          <tr>
           <td>{{++$i}}</td>
           <td>{{$hd->MaHopDong}}</td>
           <td>{{$hd->KyHieuLoDat}}</td>
           <td>@foreach ($khachhang as $kh)
            <?php if($kh->id == $hd->SoHuu) { 
             echo $kh->HoVaTenDem.' '.$kh->Ten;
           } ?>
         @endforeach</td>
         <td>{{$hd->HoVaTenDem}} {{$hd->Ten}}</td>
         <td><?php $date=date_create($hd->ngaylap);
         echo date_format($date,"d/m/Y H:i:s") ?></td>
         <td>{{number_format($hd->PhiMoiGioi)}}VNĐ</td>
          </tr>
          <?php $tong = $tong + ($hd->PhiMoiGioi) ?>
          @endforeach
          <td colspan="6" style="font-weight: bold;text-align: right;">Tổng doanh thu:</td>
          <td colspan="1" style="font-weight: bold;font-style: italic;">{{number_format($tong)}}VNĐ</td>
        </tbody>
    
  </table>
</div><!-- /content-panel -->
</div><!-- /col-md-12 -->
</div><!-- /row -->

</section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->


@endsection
@section('script')
<script src="{{asset('js/common-scripts.js')}}"></script>
@endsection
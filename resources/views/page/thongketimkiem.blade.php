@section('title','Thống kê tìm kiếm')
@extends('layout.master')
@section('content')
<?php
// percent
$array = array();
$i = 0;
foreach ($thongketimkiem as $key_timkiem) {
  array_push($array, $key_timkiem->Quan);
  $i++;
}
$array_count = array_count_values($array);
?>
<section id="main-content">
  <section class="wrapper">
    <h3>THỐNG KÊ TÌM KIẾM</h3>

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
            <form method="post" action="{{route('TKTK')}}">
              {{csrf_field()}}
              <div class="form-group">
                <div class="col-md-4 col-sm-4 control-label"></div>
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
                <div class="col-md-2 col-sm-2 control-label"><button type="submit" class="btn btn-theme"><i class="fas fa-search"></i></button></div>
              </div>
            </form>
          </div>
          <div class="col-md-2">
            <div class="col-md-8"></div>
              <div class="form-group">
                <form method="post" action="{{route('inGD')}}">
                  {{csrf_field()}}
                  <input type="hidden" name="thangin" value="{{$month}}">
                  <input type="hidden" name="namin" value="{{$year}}">
                  <div class="col-md-1 col-sm-1 control-label"><button type="submit" class="btn btn-theme"><i class="fas fa-print"></i></button></div>
                </form>
              </div>
          </div>
          <?php if($thongketimkiem != null) { ?><div id="container-chart"></div><?php } else { ?>
          Hiện tại vẫn chưa có cơ sở dữ liệu tìm kiếm<?php } ?>
        </div><!-- /content-panel -->
      </div><!-- /col-md-12 -->
    </div><!-- /row -->
  </section>
</section>

@endsection
@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="{{asset('js/common-scripts.js')}}"></script>
<script type="text/javascript">
  // Radialize the colors
  Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
      return {
        radialGradient: {
          cx: 0.5,
          cy: 0.3,
          r: 0.7
        },
        stops: [
        [0, color],
        [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
        ]
      };
    })
  });
// Build the chart
Highcharts.chart('container-chart', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'Thống kê tìm kiếm Quận trong tháng' + '<?php echo $month.', '.$year ?>'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        },
        connectorColor: 'silver'
      }
    }
  },
  series: [{
    name: 'Share',
    data: [
    @foreach ($quan as $quan)
    <?php
    if(isset($array_count[$quan->id]))
    {
      $percent = ($array_count[$quan->id]/$i)*100;
      ?> { name: '{{$quan->TenQuan}}', y: {{$percent}} }, <?php
    }
    else
    {
      $percent = 0;
      ?> { name: '{{$quan->TenQuan}}', y: {{$percent}} }, <?php
    }
    ?>
    @endforeach
    ]
  }]
});
</script>
@endsection
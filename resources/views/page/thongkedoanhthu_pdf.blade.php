<!DOCTYPE html>
<html>
<head>
  <title>Test</title>
  <style type="text/css">
  body{font-family: DejaVu Sans, sans-serif;}
.table-gia{
    width: 100%;
    font-size: 13px;
    border-collapse: collapse;
}
.table-gia th,td{
    padding:7px 15px;
     border:1px solid gray;
    border-collapse: collapse;
    text-align: center;
}
.table-gia th{
    background-color: #3c3c3c;
    color:#FFD700
}
.table-gia tr:nth-child(even){
   background-color: #F0F0F0;
}
.table-gia tr:hover{
    background-color: #ddd;
}
</style>
</head>
<body>
  <h3 style="text-align: center;">THỐNG KÊ DOANH THU THÁNG {{$thang}} NĂM {{$nam}}</h3>
  <table class="table-gia">
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
          <tr>
          <td colspan="6" style="font-weight: bold;text-align: right;">Tổng doanh thu:</td>
          <td colspan="1" style="font-weight: bold;font-style: italic;">{{number_format($tong)}}VNĐ</td></tr>
</tbody>

</table>
</body>
</html>
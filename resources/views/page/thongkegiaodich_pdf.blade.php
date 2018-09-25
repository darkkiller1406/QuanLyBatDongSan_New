<!DOCTYPE html>
<html>
<head>
  <title>Test</title>
  <style type="text/css">
  body{font-family: DejaVu Sans, sans-serif;}
.table-gia{
    width: 100%;
    font-size: 12px;
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
  <h3 style="text-align: center;">THỐNG KÊ GIAO DỊCH THÁNG {{$thang}} NĂM {{$nam}}</h3>
  <table class="table-gia">
   <thead>
    <tr>
     <th>STT</th>
     <th>Giao dịch</th>
     <th>Người thực hiện</th>
     <th>Ngày lập</th>
     <th>Số tiền</th>
   </tr>
 </thead>
 <tbody>
  <?php $i=0;$tong =0; ?>
  @foreach($thongkegiaodich as $hd)
  <tr>
   <td>{{++$i}}</td>
   <td>{{$hd->GiaoDich}}</td>
   <td>{{$hd->Ten}}</td>
   <td><?php $date=date_create($hd->ngaylap);
   echo date_format($date,"d/m/Y H:i:s") ?></td>
   <td>{{number_format($hd->TienGiaoDich)}}VNĐ</td>
 </tr>
 <?php $tong = $tong + ($hd->TienGiaoDich) ?>
 @endforeach
 <tr>
 <td colspan="4" style="font-weight: bold;text-align: right;">Tổng doanh thu:</td>
 <td colspan="1" style="font-weight: bold;font-style: italic;">{{number_format($tong)}}VNĐ</td></tr>
</tbody>

</table>
</body>
</html>
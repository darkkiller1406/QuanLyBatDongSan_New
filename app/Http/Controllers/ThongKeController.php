<?php

namespace App\Http\Controllers;
use App\ThongKe;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    //
    public function getThongKeDoanhThu(Request $request)
    {
    	$month=date('n');
    	$year=date('Y');
    	if(isset($request->thang)) {$month = $request->thang;$year = $request->nam;}
    	$ThongKe = new ThongKe();
    	$thongkedoanhthu= $ThongKe->getdoanhthu($month,$year);
    	return view('page/thongkedoanhthu',['thongkedoanhthu'=>$thongkedoanhthu, 'month'=>$month,'year'=>$year]);
    }
    public function getThongKeGiaoDich(Request $request)
    {
        $month=date('n');
        $year=date('Y');
        if(isset($request->thang)) {$month = $request->thang;$year = $request->nam;}
        $ThongKe = new ThongKe();
        $thongkedoanhthu= $ThongKe->getgiaodich($month,$year);
        return view('page/thongkegiaodich',['thongkegiaodich'=>$thongkedoanhthu, 'month'=>$month,'year'=>$year]);
    }
}

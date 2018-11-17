<?php

namespace App\Http\Controllers;
use App\ThongKe;
use App\ThongKeTimKiem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ThongKeController extends Controller
{
    //
    public function getThongKeDoanhThu(Request $request)
    {
        if(Auth::user()->Quyen == 1) {
           $month=date('n');
           $year=date('Y');
           if(isset($request->thang)) {$month = $request->thang;$year = $request->nam;}
           $ThongKe = new ThongKe();
           $thongkedoanhthu= $ThongKe->getdoanhthu($month,$year);
           return view('page/thongkedoanhthu',['thongkedoanhthu'=>$thongkedoanhthu, 'month'=>$month,'year'=>$year]);
        }
        return back();
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
    public function getThongKeTimKiem(Request $request)
    {
        if(Auth::user()->Quyen == 1) {
            $month=date('n');
            $year=date('Y');
            if(isset($request->thang)) {$month = $request->thang;$year = $request->nam;}
            $ThongKe = new ThongKeTimKiem();
            $thongketimkiem= $ThongKe->gettimkiem($month,$year);
            return view('page/thongketimkiem',['thongketimkiem'=>$thongketimkiem, 'month'=>$month,'year'=>$year]);
        }
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThongKe;
use PDF;
use Illuminate\Support\Facades\Auth;
class PDFController extends Controller
{
    //
    public function pdf_giaodich(Request $request)
    {
    	$month=date('n');
        $year=date('Y');
        if(isset($request->thangin)) {$month = $request->thangin;$year = $request->namin;}
        $ThongKe = new ThongKe();
        $thongkedoanhthu= $ThongKe->getgiaodich($month, $year, Auth::user()->ThuocCongTy);
    	$pdf = PDF::loadView('page/thongkegiaodich_pdf',['thongkegiaodich'=>$thongkedoanhthu,'thang'=>$month,'nam'=>$year, '']);
    	return $pdf->download('thongkegiaodich.pdf');
    }
    public function pdf_doanhthu(Request $request)
    {
    	$month=date('n');
        $year=date('Y');
        if(isset($request->thangin)) {$month = $request->thangin;$year = $request->namin;}
    	$ThongKe = new ThongKe();
    	$thongkedoanhthu= $ThongKe->getdoanhthu($month, $year, Auth::user()->ThuocCongTy);
    	$pdf = PDF::loadView('page/thongkedoanhthu_pdf',['thongkedoanhthu'=>$thongkedoanhthu,'thang'=>$month,'nam'=>$year]);
    	return $pdf->download('thongkegdoanhthu.pdf');
    }
}

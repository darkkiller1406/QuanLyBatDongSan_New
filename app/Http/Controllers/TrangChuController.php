<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrangChu;
use App\Dat;
use App\CongTy;
use App\ThongKe;
use Illuminate\Support\Facades\Auth;
class TrangChuConTroller extends Controller
{
    //
    public function getIndex()
    {
    	$thongkeindex = new TrangChu();
        $thongke = $thongkeindex->thongketrangchu(Auth::user()->ThuocCongTy);
    	return view('page/index', ['thongke' => $thongke]);
    }
    public function getIndexAdmin()
    {
        $thongkeindex = new TrangChu();
        $thongke = $thongkeindex->thongketrangchuadmin();
        $year = date("Y");
        $array = array();
        for ($i = 1; $i <= 12; $i++) {
            $doanhthu = new ThongKe();
            $doanhthu = $doanhthu->getgiaodich($i, $year);
            $tien = 0;
            foreach ($doanhthu as $t) {
                $tien = $tien + $t->TienGiaoDich;
            }
            $array[] = $tien/1000000;
        }
        return view('page/index_sub', ['thongke' => $thongke, 'doanhthu' => $array]);
    }
    public function getView_Ban()
    {
        $dat = Dat::where('TrangThai', '<', 2)->take(6)->get();
        $congty = CongTy::where('id', '>', 0)->take(6)->get();
        return view('trangchu', ['dat' => $dat, 'congty' => $congty]);
    }
    public function getView_vechungtoi()
    {
        return view('vechungtoi');
    }
    public function getView_lienlac()
    {
        return view('lienlac');
    }
        public function getView_dichvu()
    {
        return view('dichvu');
    }
}

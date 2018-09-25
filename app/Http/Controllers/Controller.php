<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use App\KhachHang;
use App\TaiKhoan;
use App\DuAn;
use App\Dat;
use App\HopDong;
use App\Quan;
use App\ThanhPho;
use App\YeuCau;
use App\PhongChoThue;
use App\Phuong;
use App\LoaiChoThue;
use App\LoaiTin;
use App\LichSuGiaoDich;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function __construct()
    {
        $this->capnhat();
    	$khachhang = KhachHang::all();
        $taikhoan = TaiKhoan::all();
        $dat = Dat::all();
        $hopdong = HopDong::all();
        $quan = Quan::all();
        $thanhpho = ThanhPho::all();
        $yeucau = YeuCau::all();
        $phong = PhongChoThue::all();
        $phuong = Phuong::all();
        $loaichothue = LoaiChoThue::all();
        $loaitin = LoaiTin::all();
        $lichsugiaodich = LichSuGiaoDich::all();
    	view()->share('khachhang',$khachhang);
        view()->share('taikhoan',$taikhoan);
        view()->share('dat',$dat);
        view()->share('thanhpho',$thanhpho);
        view()->share('quan',$quan);
        view()->share('hopdong',$hopdong);
        view()->share('yeucau',$yeucau);
        view()->share('phong',$phong);
        view()->share('phuong',$phuong);
        view()->share('loaichothue',$loaichothue);
        view()->share('loaitin',$loaitin);
        view()->share('lichsugiaodich',$lichsugiaodich);
    }
    function capnhat()
    {
        $capnhat = new PhongChoThue();
        $capnhat->capnhat();
    }
}

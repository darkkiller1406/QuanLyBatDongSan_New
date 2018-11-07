<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use App\KhachHang;
use App\TaiKhoan;
use App\Dat;
use App\HopDong;
use App\Quan;
use App\ThanhPho;
use App\YeuCau;
use App\Phuong;
use App\CongTy;
use App\LichSuGiaoDich;
use App\ThongKeTimKiem;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function __construct()
    {
        $this->update();
    	$khachhang = KhachHang::all();
        $taikhoan = TaiKhoan::all();
        $dat = Dat::all();
        $hopdong = HopDong::all();
        $congty = CongTy::all();
        $quan = Quan::all();
        $thanhpho = ThanhPho::all();
        $yeucau = YeuCau::all();
        $phuong = Phuong::all();
        $lichsugiaodich = LichSuGiaoDich::all();
        $thongketimkiem = ThongKeTimKiem::all();
    	view()->share('khachhang',$khachhang);
        view()->share('taikhoan',$taikhoan);
        view()->share('dat',$dat);
        view()->share('thanhpho',$thanhpho);
        view()->share('quan',$quan);
        view()->share('congty', $congty);
        view()->share('hopdong',$hopdong);
        view()->share('yeucau',$yeucau);
        view()->share('phuong',$phuong);
        view()->share('lichsugiaodich',$lichsugiaodich);
        view()->share('thongketimkiem',$thongketimkiem);
    }
    function update() 
    {
        $taikhoan = new TaiKhoan();
        $taikhoan->updateLoaiTaiKhoan();
    }
}

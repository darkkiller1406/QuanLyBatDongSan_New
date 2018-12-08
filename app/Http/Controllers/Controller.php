<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use File;
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
        $menuCongTy = new CongTy;
        $menuCongTy = $menuCongTy->getCongTy();
        view()->share('menuCongTy',$menuCongTy);
    }
    function update() 
    {
        $taikhoan = new TaiKhoan();
        $congty = $taikhoan->getCongTyKhongHoatDong();
        if(!is_null($congty)) {
            $this->_delete_dir(public_path().'/HopDong/'.str_replace(' ','',$congty));
        }
        $taikhoan->updateLoaiTaiKhoan();
    }
    function _delete_dir($path) {
        if (!is_dir($path)) {
            throw new InvalidArgumentException("$path must be a directory");
        }
        if (substr($path, strlen($path) - 1, 1) != DIRECTORY_SEPARATOR) {
            $path .= DIRECTORY_SEPARATOR;
        }
        $files = glob($path . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
              _delete_dir($file);
            }  else {
              unlink($file);
            }
        }
        rmdir($path);
    }
}

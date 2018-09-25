<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ThongKe extends Model
{
    //
    public function getdoanhthu($thang,$nam)
    {
    	
    	if(isset($thang)&&isset($nam)){
    		return DB::select("SELECT *,hopdong.created_at as ngaylap  FROM hopdong,khachhang,dat WHERE MONTH(hopdong.created_at) = '$thang' and hopdong.ID_Dat = dat.id and hopdong.ID_KhachHang_Mua = khachhang.id and YEAR(hopdong.created_at) = '$nam'");
    	}
    	return DB::select("SELECT *,hopdong.created_at as ngaylap FROM hopdong,khachhang,dat WHERE MONTH(hopdong.created_at) = MONTH(now()) and YEAR(hopdong.created_at) = YEAR(now()) and hopdong.ID_Dat = dat.id and hopdong.ID_KhachHang_Mua = khachhang.id");
    }
    public function getgiaodich($thang,$nam)
    {
    	
    	if(isset($thang)&&isset($nam)){
    		return DB::select("SELECT *,lichsugiaodich.created_at as ngaylap  FROM lichsugiaodich,users WHERE MONTH(lichsugiaodich.created_at) = '$thang' and  YEAR(lichsugiaodich.created_at) = '$nam' and lichsugiaodich.NguoiThucHien = users.id and lichsugiaodich.LoaiGiaoDich = 1 ");
    	}
    	return DB::select("SELECT *,lichsugiaodich.created_at as ngaylap  FROM lichsugiaodich,users WHERE MONTH(lichsugiaodich.created_at) = MONTH(now()) and YEAR(lichsugiaodich.created_at) = YEAR(now()) and lichsugiaodich.NguoiThucHien = users.id and lichsugiaodich.LoaiGiaoDich = 1");
    }
}

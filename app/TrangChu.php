<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class TrangChu extends Model
{
    //
    function hd_dahoanthanh()
    {
    	return DB::select("SELECT count(*) as slht FROM hopdong where hopdong.trangthai = '1'");
    }
    function hd_chuahoanthanh()
    {
    	return DB::select("SELECT count(*) as slcht FROM hopdong where hopdong.trangthai = '2'");
    }
    function nhanvien()
    {
    	return DB::select("SELECT count(*) as slnv FROM nhanvien");
    }
    function khachhang()
    {
    	return DB::select("SELECT count(*) as slkh FROM khachhang");
    }
    function duan()
    {
    	return DB::select("SELECT count(*) as slda FROM duan");
    }
}

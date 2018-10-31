<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class TrangChu extends Model
{
    //
    function thongketrangchu()
    {
        $phong = DB::select("SELECT count(*) as slp FROM phongthue where phongthue.trangthai = '1'");
    	$hopdong = DB::select("SELECT count(*) as slht FROM hopdong");
        $khachhang = DB::select("SELECT count(*) as slkh FROM khachhang");
        $dat = DB::select("SELECT count(*) as sld FROM dat where dat.trangthai < 2");
        $nguoisudung = DB::select("SELECT count(*) as slu FROM users where users.quyen = '2'");
        $array = array("phong" => $phong[0]->slp, "hopdong" => $hopdong[0]->slht, "khachhang" => $khachhang[0]->slkh, "dat" => $dat[0]->sld, "nguoisudung" => $nguoisudung[0]->slu);
        return $array;
    }    
}

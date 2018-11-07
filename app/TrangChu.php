<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
class TrangChu extends Model
{
    //
    function thongketrangchu($congty)
    {
    	$hopdong = DB::select("SELECT count(*) as slht FROM hopdong,dat where dat.id = hopdong.ID_Dat and dat.SoHuu =".$congty);
        $khachhang = DB::select("SELECT count(*) as slkh FROM khachhang where ThuocCongTy =".$congty);
        $dat = DB::select("SELECT count(*) as sld FROM dat where SoHuu = ".$congty);
        $yeucau = DB::select("SELECT count(*) as slyc FROM yeucau,dat where dat.id = yeucau.id_dat and dat.SoHuu =".$congty);
        $nguoisudung = DB::select("SELECT count(*) as slu FROM users where users.ThuocCongTy = ".$congty);
        $dattondong = DB::select("SELECT count(*) as datdu FROM dat where DATEDIFF(NOW(), updated_at) > 60 and SoHuu = ".$congty);
        $array = array("hopdong" => $hopdong[0]->slht, "khachhang" => $khachhang[0]->slkh, "dat" => $dat[0]->sld, "nguoisudung" => $nguoisudung[0]->slu, "dattondong" => $dattondong[0]->datdu, "yeucau" => $yeucau[0]->slyc);
        return $array;
    }
    function thongketrangchuadmin()
    {
        $congty = DB::select("SELECT count(*) as congty FROM congty where congty.id > 0");
        $coban = DB::select("SELECT count(*) as coban FROM congty, users where congty.id > 0 and congty.id = users.ThuocCongTy and users.LoaiTaiKhoan = 1 and users.Quyen = 1");
        $nangcao = DB::select("SELECT count(*) as nangcao FROM congty, users where congty.id > 0 and congty.id = users.ThuocCongTy and users.LoaiTaiKhoan = 2 and users.Quyen = 1");
        $users = DB::select("SELECT count(*) as users FROM users where id > 0");
        $array = array("congty" => $congty[0]->congty, "coban" => $coban[0]->coban, "nangcao" => $nangcao[0]->nangcao, "users" => $users[0]->users);
        return $array;
    }    
}

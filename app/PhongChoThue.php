<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class PhongChoThue extends Model
{
    //
    protected $table = 'phongthue';
    public function phuong()
    {
        return $this->belongsTo('App\Phuong','Phuong','id');
    }
    public function loaitin()
    {
        return $this->belongsTo('App\LoaiTin','LoaiTin','id');
    }
    public function nguoidang()
    {
        return $this->belongsTo('App\TaiKhoan','NguoiDang','id');
    }
    public function loaichothue()
    {
        return $this->belongsTo('App\LoaiChoThue','LoaiChoThue','id');
    }
    public function phongnoibat()
    {
    		$k = DB::select("SELECT *, phongthue.id as idphong FROM phongthue,quan,thanhpho,phuong WHERE phongthue.Phuong = phuong.id and phuong.ThuocQuan = quan.id and quan.ThuocThanhPho = thanhpho.id and phongthue.loaitin = 1
            ORDER BY `phongthue`.`id`  DESC LIMIT 5");
            return $k; 
    }
    public function timmax()
    {
        $k = DB::select('select MAX(id) as Ma from phongthue');
        return $k;
    }
    public function timphong($quan,$tp,$gia,$dt,$phuong,$loai)
    {        
        switch ($dt) {
            case '1':
                $dt = 'DienTich<20';
                break;
            case '2':
                $dt = 'DienTich>=20 and DienTich<=30';
                break;
            case '3':
                $dt = 'DienTich>30 and DienTich<=40';
                break;
            case '4':
                $dt = 'DienTich>40 and DienTich<=50';
                break;
             case '5':
                $dt = 'DienTich>50 and DienTich<=60';
                break;
            case '6':
                $dt = 'DienTich>60 and DienTich<=70';
                break;
            case '7':
                $dt = 'DienTich>70';
                break;
            default:
                $dt = 'DienTich>0';
                break;
        }
        switch ($gia) {
            case '1':
                $gia = 'Gia>=2 and Gia <3';
                break;
            case '2':
                $gia = 'Gia>3 and Gia<=5';
                break;
            case '3':
                $gia = 'Gia>5 and Gia<=7';
                break;
            case '4':
                $gia = 'Gia>7 and Gia<=10';
                break;
            case '5':
                $gia = 'Gia>10';
                break;
            default:
                $gia = 'Gia>0';
                break;
        }
        if($tp == 0 )
        {
            $k = DB::select('select *, PhongThue.id as idphong, PhongThue.created_at as ngaydang from PhongThue,ThanhPho,Quan,Phuong,LoaiChoThue where '.$dt.' and '.$gia.' and PhongThue.phuong = Phuong.id and Phuong.ThuocQuan = Quan.id and Quan.ThuocThanhPho = ThanhPho.id and PhongThue.LoaiChoThue = '.$loai.' and PhongThue.loaichothue = LoaiChoThue.id');
            return $k;
        }
        elseif ($quan == 0)
        {
            $k = DB::select('select *, PhongThue.id as idphong, PhongThue.created_at as ngaydang from PhongThue,ThanhPho,Quan,Phuong,LoaiChoThue where '.$dt.' and '.$gia.' and PhongThue.phuong = Phuong.id and Phuong.ThuocQuan = Quan.id and Quan.ThuocThanhPho = ThanhPho.id and Quan.ThuocThanhPho = '.$tp.' and PhongThue.LoaiChoThue = '.$loai.' and PhongThue.loaichothue = LoaiChoThue.id');
            return $k;
        }elseif ($phuong == 0)
        {
            $k = DB::select('select *, PhongThue.id as idphong, PhongThue.created_at as ngaydang from PhongThue,ThanhPho,Quan,Phuong,LoaiChoThue where '.$dt.' and '.$gia.' and PhongThue.phuong = Phuong.id and Phuong.ThuocQuan = Quan.id and Quan.ThuocThanhPho = ThanhPho.id and Phuong.ThuocQuan ='.$quan.' and PhongThue.LoaiChoThue = '.$loai.' and PhongThue.loaichothue = LoaiChoThue.id');
            return $k;
        }
        else
        {
            $k = DB::select('select *, PhongThue.id as idphong, PhongThue.created_at as ngaydang from PhongThue,ThanhPho,Quan,Phuong,LoaiChoThue where '.$dt.' and '.$gia.' and PhongThue.phuong = Phuong.id and Phuong.ThuocQuan = Quan.id and Quan.ThuocThanhPho = ThanhPho.id and PhongThue.Phuong='.$phuong.' and PhongThue.LoaiChoThue = '.$loai.' and PhongThue.loaichothue = LoaiChoThue.id');
            return $k;
        }
    }
    public function getTinDang($tg)
    {
        if(isset($tg)){
            return DB::select("SELECT *,LoaiTin.LoaiTin as loaitin,LoaiChoThue.LoaiChoThue as loaichothue,PhongThue.created_at as ngaydang,PhongThue.updated_at as ngaycapnhat  FROM PhongThue,ThanhPho,Quan,Phuong,LoaiChoThue,LoaiTin,users WHERE phongthue.created_at like '%".$tg."%' and PhongThue.phuong = Phuong.id and Phuong.ThuocQuan = Quan.id and Quan.ThuocThanhPho = ThanhPho.id and PhongThue.loaichothue = LoaiChoThue.id and PhongThue.LoaiTin = LoaiTin.id and users.id = PhongThue.NguoiDang");
        }
    }
    public function TimTin($name)
    {
        if(isset($name)){
            return DB::select("SELECT *,LoaiTin.LoaiTin as loaitin,LoaiChoThue.LoaiChoThue as loaichothue, PhongThue.created_at as ngaydang, PhongThue.id as ID, PhongThue.gia as GiaThue FROM PhongThue,ThanhPho,Quan,Phuong,LoaiChoThue,LoaiTin,users WHERE phongthue.nguoidang = '".$name."' and PhongThue.phuong = Phuong.id and Phuong.ThuocQuan = Quan.id and Quan.ThuocThanhPho = ThanhPho.id and PhongThue.loaichothue = LoaiChoThue.id and PhongThue.LoaiTin = LoaiTin.id and users.id = PhongThue.NguoiDang");
        }
    }
    public function capnhat()
    {
        $k1 = DB::select('SELECT * FROM `phongthue` WHERE NOW() > NgayBatDau');
        foreach ($k1 as $a ) {
            DB::update('UPDATE `phongthue` SET `TrangThai` = 1 WHERE id ='.$a->id);
        }
        $k2 = DB::select('SELECT * FROM `phongthue` WHERE NOW() > NgayKetThuc');
        foreach ($k2 as $a ) {
            DB::update('UPDATE `phongthue` SET `TrangThai` = 2 WHERE id ='.$a->id);
        }
    }
}

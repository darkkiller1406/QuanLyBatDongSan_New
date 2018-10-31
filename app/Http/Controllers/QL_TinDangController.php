<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhongChoThue;
class QL_TinDangController extends Controller
{
    //
     public function getView()
    {
    	return view('page.quanlytindang');
    }
    public function getXoa(Request $r)
    {
        $this->validate($r, [
            'lydo' => 'required',
        ], [
            'lydo.required' => 'Bạn cần nhập lý do để xóa tin đăng',
        ]);
        $id = $r->id;
        $lydo = $r->lydo;
    	$tindang = PhongChoThue::find($id);
        $tindang->TrangThai = '3';
        $tindang->LyDoXoa = $lydo;
        $tindang->save();
        return "redirect('page/quanlytindang')->with('thongbao','Bạn đã xóa thành công!')";
    }
    public function timTD(Request $r)
    {
        $yc = new PhongChoThue();
        $tindang = $yc->getTinDang($r->ngay);
        return view('page.quanlytindang', ['kq'=>$tindang]);
    }
    public function getView_XacNhan()
    {
        return view('page.quanlytindang_xacnhan');
    }
    public function getView_DaXoa()
    {
        return view('page.quanlytindang_daxoa');
    }
    public function getXacNhan($id)
    {
        $tindang = PhongChoThue::find($id);
        $date = date('d');
        $datestart = substr($tindang->ngaybatdau,8);
        if($date == $datestart) {
            $tindang->TrangThai = '1';
        } else {
            $tindang->TrangThai = '2';
        }
        $tindang->save();
        return redirect('page/xacnhantindang')->with('thongbao','Bạn đã xác nhận tin đăng, tin đăng sẽ được đăng trên hệ thống!');
    }
}

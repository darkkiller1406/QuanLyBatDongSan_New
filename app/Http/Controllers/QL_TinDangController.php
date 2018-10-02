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
    public function getXoa($id)
    {
    	$hd = PhongChoThue::find($id);
        $hd -> delete();
        return redirect('page/quanlytindang')->with('thongbao','Bạn đã xóa thành công!');
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
    public function getXacNhan($id)
    {
        $xacnhan = new PhongChoThue();
        $xacnhan -> xacnhan($id);
        return redirect('page/xacnhantindang')->with('thongbao','Bạn đã xác nhận tin đăng, tin đăng sẽ được đăng trên hệ thống!');
    }
}

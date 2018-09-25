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
}

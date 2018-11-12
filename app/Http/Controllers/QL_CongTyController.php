<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\CongTy;
use App\TaiKhoan;
use Illuminate\Support\Facades\DB;
use App\GioiThieu;
class QL_CongTyController extends Controller
{
    //
    public function getView_DSCongTy()
    {
    	$congty = new CongTy;
        $congty = $congty->getCongTy();
    	return view('danhsachcongty', ['congty' => $congty]);
    }

    public function getView()
    {
    	if(Auth::user()->LoaiTaiKhoan == 0) {
    		$congty = new CongTy;
    		$congty = $congty->getCongTy();
    		return view('page/quanlycongty', ['congty' => $congty]);
    	}
    	return redirect('page/index');
    }

    public function huyKichHoat($id)
    {
    	if(Auth::user()->LoaiTaiKhoan == 0) {
    		$congty = CongTy::find($id);
    		$taikhoan = TaiKhoan::where('ThuocCongTy', $congty->id)->get();
    		foreach ($taikhoan as $t) {
    			$user = TaiKhoan::find($t->id);
    			$user->LoaiTaiKhoan = 3;
    			$user->save();
    		}
    		return redirect('page/quanlycongty')->with('thongbao', 'Bạn đã hủy kích hoat thành công tài khoản thuộc công ty '.$congty->TenCongTy);
    	}
    	return redirect('page/index');
    }

    public function resetPass($id)
    {
    	if(Auth::user()->LoaiTaiKhoan == 0) {
    		$congty = CongTy::find($id);
    		$taikhoan = TaiKhoan::where('ThuocCongTy', $congty->id)->get();
    		foreach ($taikhoan as $t) {
    			$user = TaiKhoan::find($t->id);
    			$user->password = bcrypt('12345678x@X');
    			$user->save();
    		}
    		return redirect('page/quanlycongty')->with('thongbao', 'Bạn đã reset password thành công tài khoản thuộc công ty '.$congty->TenCongTy);
    	}
    	return redirect('page/index');
    }

    public function timCongTy(Request $request)
    {
    	$congty = new CongTy;
    	echo $congty->timCongTy($request->name);
    }

    public function getViewGioiThieu() 
    {
        $gioithieu = GioiThieu::where('CongTy', Auth::user()->ThuocCongTy)->first();
        if(!empty($gioithieu)) {
            return view('page/gioithieucongty', ['gioithieu' => $gioithieu]);
        }
        return view('page/gioithieucongty');   
    }

    public function postThemGioiThieu(Request $request) 
    {
        $check = GioiThieu::where('CongTy', Auth::user()->ThuocCongTy)->get();
        if(empty($check)) {
            $gioithieu = new GioiThieu;
            $gioithieu->TieuDe = $request->tieude;
            $gioithieu->NoiDung = $request->noidung;
            $gioithieu->CongTy = Auth::user()->ThuocCongTy;
            $gioithieu->save();
            $gioithieu_new = GioiThieu::where('CongTy', Auth::user()->ThuocCongTy)->get();
            return view('page/gioithieu')->with('thongbao', 'Thêm thành công!');;
        } else {
            $gioithieu = GioiThieu::find($check[0]->id);
            $gioithieu->TieuDe = $request->tieude;
            $gioithieu->NoiDung = $request->noidung;
            $gioithieu->CongTy = Auth::user()->ThuocCongTy;
            $gioithieu->save();
            $gioithieu_new = GioiThieu::where('CongTy', Auth::user()->ThuocCongTy)->get();
            return redirect('page/gioithieu')->with('thongbao', 'Cập nhật thành công!');;
        } 
    }

    public function getViewThanhVien($link) {
        $congty = CongTy::where('link', $link)->first();
        $gioithieu = GioiThieu::where('CongTy', $congty->id)->first();
        if(!empty($gioithieu)) {
            return view('thanhvien', ['congty'=>$congty, 'gioithieu'=>$gioithieu]);
        }
        return view('thanhvien', ['congty'=>$congty]);
        
    }
}

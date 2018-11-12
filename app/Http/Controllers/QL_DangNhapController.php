<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\CongTy;
class QL_DangNhapConTroller extends Controller
{
    //
    public function getView($id)
    {
        $link = $id;
    	return view('page.dangnhap', ['link' => $link]);
    }
    public function getViewReset() 
    {
        return view('page.resetpassword');
    }
    public function getDangNhap(Request $r)
    {
    	$this->validate($r,[
            'id'=> 'required',
            'pass'=> 'required',
        ],[
            'id.required'=> 'Bạn chưa nhập tên người dùng',
            'pass.required'=> 'Bạn chưa nhập mật khẩu',
        ]);
        $congty = CongTy::where('link', $r->link)->first();
        if(Auth::attempt(['name'=>$r->id,'password'=>$r->pass,'ThuocCongTy'=>$congty->id])){   
            if (Auth::user()->LoaiTaiKhoan == 4) {
                return redirect('page/dangnhap/'.$r->link)->with('thongbao','Tài khoản chưa kích hoạt');
            }
            if (Auth::user()->LoaiTaiKhoan == 3) {
                return redirect('page/dangnhap/'.$r->link)->with('thongbao','Tài khoản đã hết hạn');
            }
            if (Auth::user()->LoaiTaiKhoan == 0 && Auth::user()->Quyen == 0) {
                return redirect('page/indexadmin');
            }
            return redirect('page/index');
        }
        else
        {
          return redirect('page/dangnhap/'.$r->link)->with('thongbao','Đăng nhập không thành công');
        }
    }
    public function getDangXuat()
    {
            $congty = CongTy::where('id', Auth::user()->ThuocCongTy)->get();
            Auth::logout();
            return redirect('page/dangnhap/'.$congty[0]->Link);
    }
    public function getDN(Request $r)
    { 
        $congty = CongTy::where('link', $r->link)->first();
        if(Auth::attempt(['name'=>$r->id,'password'=>$r->pass,'ThuocCongTy'=>$congty->id])) {
            if (Auth::user()->LoaiTaiKhoan < 3) {
                Auth::logout();
                return 1;
            }
            else {
                return 0;
            }
        }
        else {
            return 1;
        }
    }
    public function getDX()
    {
        Auth::logout();
        return back();
    }
}

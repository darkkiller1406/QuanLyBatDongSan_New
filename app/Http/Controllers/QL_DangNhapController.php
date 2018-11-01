<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
class QL_DangNhapConTroller extends Controller
{
    //
    function __construct()
    {
        view()->share('user_login',Auth::user());
    }
    public function getView()
    {
    	return view('page.dangnhap');
    }
    public function getDangNhap(Request $r)
    {
    	$this->validate($r,[
            'id'=> 'required|min:3',
            'pass'=> 'required|min:3|max:32',
        ],[
            'id.required'=> 'Bạn chưa nhập tên người dùng',
            'id.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
            'pass.required'=> 'Bạn chưa nhập mật khẩu',
            'pass.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
            'pass.max' => 'Mật khẩu chỉ tối đa 32 kí tự',
        ]);
        if(Auth::attempt(['name'=>$r->id,'password'=>$r->pass]))
        	{
                if(Auth::user()->Quyen==1)
                {
                    return redirect('page/index');
                }
        		else
                {
                    return redirect('page/dangnhap')->with('thongbao','Tài khoản của bạn không đủ quyền');
                }
        	}
        else
        	{
        		return redirect('page/dangnhap')->with('thongbao','Đăng nhập không thành công');
        	}
    }
    public function getDangXuat()
    {
        if(Auth::user()->Quyen==1)
            {
                    Auth::logout();
                    return redirect('page/dangnhap');
            }
    }
    public function getViewDK()
    {
        return view('dangky');
    }
    public function getDN(Request $r)
    {
        if(Auth::attempt(['name'=>$r->id,'password'=>$r->pass]))
            {
                if(Auth::user()->Quyen==2)
                {
                    return '0';
                }
                else
                {
                    Auth::logout();
                    return ('1');
                }
            }
        else
            {
                return ('1');
            }
    }
    public function getDX()
    {
        Auth::logout();
        return back();

    }
}

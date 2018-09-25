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
                    return redirect('page/quanlyyeucau');
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
        if(Auth::user()->Quyen==2)
                {
                    Auth::logout();
                    return back();
                }
    }
    public function postDK(Request $request)
    {
         $this->validate($request,[
            'name'=> 'required|min:3|unique:users,name',
            'email'=>'required|email|unique:users,email',
            'password'=> 'required|between:6,20',
            'passwordAgain'=>'required|same:password'
        ],[
            'name.required'=> 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
            'email.required'=> 'Bạn chưa nhập email',
            'email.email'=> 'Bạn chưa nhập đúng định dạng email',
            'email.unique'=>'Email đã tồn tại',
            'name.unique'=>'Tên đăng nhập đã tồn tại',
            'password.required'=> 'Bạn chưa nhập mật khẩu',
            'password.between' => 'Mật khẩu phải có ít nhất 6 kí tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu nhập lại không khớp'
        ]);
        
        $user = new User;
        $user->name = $request->name; 
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->Quyen = '2'; 
        $user->Ten = $request->form_name;
        $user->Tien = '100000'; 
        $user->save();
        return redirect('dangky')->with('thongbao','Chúc mừng bạn đã đăng kí thành công!');
    }
}

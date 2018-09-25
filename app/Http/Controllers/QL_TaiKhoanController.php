<?php

namespace App\Http\Controllers;
use App\User;
use App\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\LichSuGiaoDich;
class QL_TaiKhoanController extends Controller
{
    //
    public function getView()
    {
    	$t = new TaiKhoan();
    	return view('page.quanlytaikhoan');
    }
    public function getXoa($id)
    {
    	
    	$tk = TaiKhoan::find($id);
    	$tk -> delete();
    	return redirect('page/quanlytaikhoan')->with('thongbao','Bạn đã xóa thành công!'); 
    }
    public function postThemTaiKhoan(Request $request)
    {
    	$this->validate($request,[
            'name'=> 'required|unique:users,name',
            'email'=>'required|email|unique:users,email',
            'password'=> 'required',
            'passwordAgain'=>'required|same:password'
        ],[
            'name.required'=> 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
            'email.required'=> 'Bạn chưa nhập email',
            'email.email'=> 'Bạn chưa nhập đúng định dạng email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=> 'Bạn chưa nhập mật khẩu',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu nhập lại không khớp'
        ]);
        
        $user = new User;
        $user->name = $request->name; 
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->Quyen = '1'; 
        $user->save();
        return redirect('page/quanlytaikhoan')->with('thongbao','Chúc mừng bạn đã đăng kí thành công!');
    }
    public function getReset($id)
    {
    	$user = TaiKhoan::find($id);
    	$user->password = bcrypt('123456');
        $user->save();
        return redirect('page/quanlytaikhoan')->with('thongbao','Thay đổi thông tin tài khoản thành công!');
    }
    public function getTim(Request $r)
    {
        $t = new TaiKhoan;
        echo $t -> timtk($r->name);
    }
    public function getViewSuaMK()
    {
        return view('page.doimatkhau');
    }
    public function postSuaMK(Request $request)
    {
        $this->validate($request,[
            'repass'=>'same:passnew',
        ],[
            'repass.same' => 'Mật khẩu nhập lại không khớp',
        ]);
        $id = $request->iduser;
        $passnew = bcrypt($request->passnew);
        $passold = $request->passold;
        $test = new TaiKhoan;
        $t = $test->updateMK($id,$passold,$passnew);
        if($request->passnew == $request->passold)
        {
            return redirect('page/doimatkhau')->with('canhbao','Mật khẩu mới trùng mật khẩu trước đó !');
        }
        else
        {
            if($t ==1)
            {
            return redirect('page/doimatkhau')->with('thongbao','Cập nhật thành công !');
            }
            else
            {
            return redirect('page/doimatkhau')->with('canhbao','Mật khẩu không đúng !');
            }
        }
    }
    public function postCapNhatMK(Request $request)
    {
        $id = $request->iduser;
        $passnew = bcrypt($request->passnew);
        $passold = $request->passold;
        $test = new TaiKhoan;
        $t = $test->updateMK($id,$passold,$passnew);
        return $t;
    }
    public function postNapTien(Request $request)
    {
        $id = $request->iduser;
        $pass = $request->pass;
        $tien = $request->tien;
        $test = new TaiKhoan;
        $t = $test->updateTien($id,$pass,$tien);
        //
        $lichsu = new LichSuGiaoDich();
        $lichsu->TienGiaoDich =  $request->tien;
        $lichsu->LoaiGiaoDich = '2';
        $lichsu->GiaoDich = 'Nạp thêm tiền';
        $lichsu->NguoiThucHien = Auth::user()->id;
        $lichsu->save();
        return $t;
    }
    public function trangcanhan()
    {
        if(isset(Auth::user()->id))
        {
            $thongtin = TaiKhoan::find(Auth::user()->id);
            $sobaidang = new TaiKhoan();
            $sobaidang = $sobaidang->demsobai(Auth::user()->id);
            return view('trangcanhan',['thongtin'=>$thongtin,'sobaidang'=>$sobaidang]);
        }
    }
    public function getLichSu($id)
    {
        $lichsu = new LichSuGiaoDich();
        $lichsu = $lichsu->getLichSuGiaoDich($id);
        return view('lichsugiaodich',['lichsugiaodich'=>$lichsu]);
    }
        
}

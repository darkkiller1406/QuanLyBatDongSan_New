<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhachHang;
class QL_KhachHangController extends Controller
{
    //
    public function getView()
    {
        return view('page.quanlykhachhang');
    }
    public function postThemKhachHang(Request $request)
    {
        $this->validate($request,[
            'email'=>'email|unique:KhachHang,Email',
            'dtdd'=> 'required|digits_between:9,11|unique:KhachHang,DTDD',
            'dtcd'=> 'required|digits_between:9,11|unique:KhachHang,DTCD|max:15',
            'cmnd'=> 'digits:9'
        ],[
            'email.required'=> 'Bạn chưa nhập email',
            'email.email'=> 'Bạn chưa nhập đúng định dạng email',
            'email.unique'=>'Email đã tồn tại',
            'dtdd.unique'=>'SĐT đã tồn tại',
            'dtcd.unique'=>'SĐT đã tồn tại',
            'cmnd.unique'=>'CMND đã tồn tại',
            'dtdd.digits_between'=>'Vui lòng nhập đúng dạng SĐT ',
            'dtcd.digits_between'=>'Vui lòng nhập đúng dạng SĐT ',
            'cmnd.digits'=>'Vui lòng nhập đúng dạng CMND'
        ]);
        
        $kh = new KhachHang;
        $m = new KhachHang;
        $max = $m->timmax();
        foreach ($max as $t)
        {
            $makh = $t->Ma;
        }
        if($makh >10)
        {
            $kh->MaKhachHang = 'KH0'.($makh+1);
        }
        else
        {
            $kh->MaKhachHang = 'KH00'.($makh+1);
        }
        // xử lý ảnh
        //$image = $_FILES[$request->image]['name'];
        //$path = "public/img/".basename($image);
        //
        //move_uploaded_file($_FILES['image']['tmp_name'], $path);
        $kh->HoVaTenDem = $request->hokh;
        $kh->Ten = $request->tenkh;
        $kh->CMND = $request->cmnd;
        $kh->DiaChi = $request->diachi;
        $kh->Email = $request->email;
        $kh->DTDD = $request->dtdd;
        $kh->DTCD = $request->dtcd;
        $kh->XungHo = $request->xungho;
        $kh->save();
       return redirect('page/quanlykhachhang')->with('thongbao','Thêm thành công khách hàng mới !');
    }
    public function getXoa($id)
    {
        $kh = KhachHang::find($id);
        $kh -> delete();
        return redirect('page/quanlykhachhang')->with('thongbao','Bạn đã xóa thành công khách hàng !');
    }
    public function postSuaKhachHang(Request $request)
    {
        $this->validate($request,[
            'email'=>'email',
            'dtdd'=> 'required|digits_between:9,11',
            'dtcd'=> 'required|digits_between:9,11',
            'cmnd'=> 'digits:9',
        ],[
            'email.required'=> 'Bạn chưa nhập email',
            'email.email'=> 'Bạn chưa nhập đúng định dạng email',
            'dtdd.digits_between'=>'Vui lòng nhập đúng dạng SĐT ',
            'dtcd.digits_between'=>'Vui lòng nhập đúng dạng SĐT ',
            'cmnd.digits'=>'Vui lòng nhập đúng dạng CMND'
        ]);
        $kh = KhachHang::find($request->id);
        $kh->HoVaTenDem = $request->hokh;
        $kh->Ten = $request->tenkh;
        $kh->CMND = $request->cmnd;
        $kh->DiaChi = $request->diachi;
        $kh->Email = $request->email;
        $kh->DTDD = $request->dtdd;
        $kh->DTCD = $request->dtcd;
        $kh->XungHo = $request->xungho;
        $kh->save();
        return redirect('page/quanlykhachhang')->with('thongbao','Cập nhật thành công thông tin khách hàng !');
    }
    public function getTim(Request $r)
    {
        $kh = new KhachHang;
        echo $kh ->timkh($r->name);
    }
}

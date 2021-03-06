<?php

namespace App\Http\Controllers;
use App\YeuCau;
use App\Dat_Web;
use Illuminate\Http\Request;
use App\Dat;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
class QL_YeuCauController extends Controller
{
    //
    public function getView()
    {
    	return view('page.quanlyyeucau');
    }
    public function getViewWeb()
    {
        return view('page.quanlyyeucau_web');
    }
    public function getXoa($id)
    {
    	$hd = YeuCau::find($id);
        $d = new Dat();
        $d->capnhat_trangthai($id);
        $hd -> delete();
        return redirect('page/quanlyyeucau')->with('thongbao','Bạn đã xóa thành công!');
    }
    public function getXoaLL($id)
    {
        $hd = YeuCau::find($id);
        $hd -> delete();
        return redirect('page/quanlyyeucau')->with('thongbao','Bạn đã xóa 1 yêu cầu liên lạc!');
    }
    public function getXoaWeb($id)
    {
        $hd = Dat_Web::find($id);
        $dat_web->TrangThai = 0;
        $dat_web->TenKhach = null;
        $dat_web->DienThoai = null;
        $dat_web->Email = null;
        return redirect('page/quanlyyeucauweb')->with('thongbao','Bạn đã xóa thành công!');
    }
    public function ThemYeuCau(Request $r)
    {
        $yeucau = new YeuCau();
        $a = new YeuCau();
        $max = $a->timmax();
        foreach ($max as $t)
        {
            $mayc = $t->Ma;
        }
        if($mayc >10)
        {
            $yeucau->MaYeuCau = 'YC0'.($mayc+1);
        }
        else
        {
            $yeucau->MaYeuCau = 'YC00'.($mayc+1);
        }
        $yeucau->TenKhach = $r->ten;
        $yeucau->Email = $r->email;
        $yeucau->DienThoai = $r->dt;
        $yeucau->LoaiYeuCau = '1';
        $yeucau->id_dat= $r->iddat;
        $yeucau->NoiDung = $r->noidung;
        $yeucau->save();
        $dat = Dat::find($r->iddat);
        $dat->TrangThai = '1';
        $dat->save();
         return redirect('chitiet/'.$r->iddat)->with('thongbao','Gửi yêu cầu thành công !');
    }

    public function ThemYeuCau_Web(Request $r)
    {
        $Dat_Web = new Dat_Web();
        $id = $Dat_Web->findIdByLink($r->iddat);
        $yeucau = Dat_Web::find($id);
        $yeucau->TenKhach = $r->ten;
        $yeucau->Email = $r->email;
        $yeucau->DienThoai = $r->dt;
        $yeucau->TrangThai = '1';
        $yeucau->save();
         return redirect('chitietdat/'.str_replace('http://www.muabannhadat.vn/dat-ban-dat-tho-cu-3532/','',$r->iddat))->with('thongbao','Gửi yêu cầu thành công !');
    }

    public function ThemYeuCauLL(Request $r)
    {
        $yeucau = new YeuCau();
        $a = new YeuCau();
        $max = $a->timmax();
        foreach ($max as $t)
        {
            $mayc = $t->Ma;
        }
        if($mayc >10)
        {
            $yeucau->MaYeuCau = 'YC0'.($mayc+1);
        }
        else
        {
            $yeucau->MaYeuCau = 'YC00'.($mayc+1);
        }
        $yeucau->TenKhach = $r->ten;
        $yeucau->Email = $r->email;
        $yeucau->DienThoai = $r->dt;
        $yeucau->LoaiYeuCau = '2';
        $yeucau->NoiDung = $r->yeucau;
        $yeucau->save();
         return redirect('lienlac')->with('thongbao','Gửi yêu cầu thành công !');
    }
    public function timYC(Request $r)
    {
        $yc = new YeuCau();
        $yeucau = $yc->getYeuCau($r->ngay);
        return view('page.quanlyyeucau', ['yeucau'=>$yeucau]);
    }
    public function guiMail(Request $r)
    {
        $mail = $r->mail;
        $name = $r->name;
        // return $mail;
        $this->mail =$mail;
        Mail::send('mail', array('name'=>$name), function($message){
            $message->from('minh.1406.nt@gmail.com', 'LightZ RealEsate');
            $message->to($this->mail)->subject('Công ty LightZ RealEsate thông báo');
        });
        return 'Gửi mail thành công !';
        // Mail::to('kisivodanh1406@gmail.com')->send(new SendMailable($name));

    }
}

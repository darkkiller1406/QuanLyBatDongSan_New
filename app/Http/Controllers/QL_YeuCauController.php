<?php

namespace App\Http\Controllers;
use App\YeuCau;
use Illuminate\Http\Request;
use App\Dat;
use App\KhachHang;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use App\CongTy;
class QL_YeuCauController extends Controller
{
    //
    public function getView()
    {
        $khachhang = new KhachHang;
        $khachhang = KhachHang::where('ThuocCongTy', Auth::user()->ThuocCongTy)->get();
        $yeucau = YeuCau::where('sohuu', Auth::user()->ThuocCongTy)
                 ->from('dat')
                 ->join('yeucau', 'id_dat', '=', 'dat.id')
                 ->where('TrangThai', 1)
                 ->groupBy('yeucau.id_dat')       
                 ->paginate(15);
        //$yeucau = YeuCau::groupBy('id_dat')->from('yeucau')->paginate(15);
    	return view('page.quanlyyeucau', ['khachhang' => $khachhang, 'yeucau' => $yeucau]);
    }
    public function getXoa($id)
    {
    	$yc = YeuCau::find($id);
        $MaYeuCau = $yc->MaYeuCau;
        $yeucau = YeuCau::where('id_dat', $yc->id_dat)->get();
        $d = Dat::find($yc->id_dat);
        if(count($yeucau) == 1) {
            $d->capnhat_trangthai($d->id);
        }
        
        $yc -> delete();

        activity()
        ->useLog('2')
        ->performedOn($yc)
        ->causedBy(Auth::user()->id)
        ->log('Xóa yêu cầu mua đất - '.$d->KyHieuLoDat);

        return redirect('page/quanlyyeucau')->with('thongbao','Bạn đã xóa thành công!');
    }
    public function getXoaLL($id)
    {
        $yc = YeuCau::find($id);
        $yc -> delete();

        activity()
        ->useLog('3')
        ->performedOn($yc)
        ->causedBy(Auth::user()->id)
        ->log('Xóa yêu cầu liên lạc');

        return redirect('page/quanlyyeucau')->with('thongbao','Bạn đã xóa 1 yêu cầu liên lạc!');
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
                $khachhang = new KhachHang;
        $khachhang = KhachHang::where('ThuocCongTy', Auth::user()->ThuocCongTy)->get();
        $yeucau = YeuCau::where('sohuu', Auth::user()->ThuocCongTy)
                 ->where('yeucau.created_at', 'like', '%'.$r->ngay.'%')
                 ->from('dat')
                 ->join('yeucau', 'id_dat', '=', 'dat.id')
                 ->groupBy('yeucau.id_dat')
                 ->paginate(15);
        return view('page.quanlyyeucau', ['khachhang' => $khachhang, 'yeucau' => $yeucau, 'ngay' => $r->ngay]);
    }
}



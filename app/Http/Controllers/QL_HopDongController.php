<?php

namespace App\Http\Controllers;
use App\HopDong;
use Illuminate\Http\Request;
use App\Dat;
use App\Dat_Web;
class QL_HopDongController extends Controller
{
    //
     public function getView()
    {
    	return view('page.quanlyhopdong');
    }
    public function getXoa($id)
    {
    	$hd = HopDong::find($id);
        $check = new HopDong;
        //
         $tglap = $check->layNam($id);
        if($tglap == 1)
        {
            $hd->delete();
            return redirect('page/quanlyhopdong')->with('thongbao','Bạn đã xóa thành công!');
        }
        else
        {
            return redirect('page/quanlyhopdong')->with('thongbao','Chưa thể xóa hóa đơn!');
        }
        
        
        
    }
    public function postThem(Request $request)
    {
        $hd = new HopDong;
        $m = new HopDong;
        $max = $m->timmax();
        foreach ($max as $t)
        {
            $mahd = $t->Ma;
        }
        if($mahd >10)
        {
            $hd->MaHopDong = 'HD'.($mahd+1);
        }
        else
        {
            $hd->MaHopDong = 'HD0'.($mahd+1);
        }
        $hd->ID_Dat = $request->iddat;
        $hd->ID_KhachHang_Mua = $request->khmua;
        $hd->PhiMoiGioi = $request->sotien;
        $d = Dat::find($request->iddat);
        $d->TrangThai = 2;
        $d->save();
        $hd->save();
        if(isset($request->link)) {
            $dat_web = new Dat_Web();
            $id = $dat_web->findIdByLink($request->link);
            $dat_web = Dat_Web::find($id);
            $dat_web->TrangThai = 2;
            $dat_web->TenKhach = null;
            $dat_web->DienThoai = null;
            $dat_web->Email = null;
            $dat_web->save();
            return redirect('page/quanlyyeucauweb')->with('thongbao','Cập nhật thành công thông tin hợp đồng !');
        }
        return redirect('page/quanlyyeucau')->with('thongbao','Cập nhật thành công thông tin hợp đồng !');
    }
    public function getTim(Request $r)
    {
        $hd = new HopDong;
        echo $hd->timhd($r->name);
    }
}

<?php

namespace App\Http\Controllers;
use App\HopDong;
use App\YeuCau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dat;
class QL_HopDongController extends Controller
{
    //
     public function getView()
    {
        $hopdong = new HopDong;
        $hopdong = HopDong::where('sohuu', Auth::user()->ThuocCongTy)
                 ->from('dat')
                 ->join('hopdong', 'ID_Dat', '=', 'dat.id')
                 ->paginate(15);
    	return view('page.quanlyhopdong', ['hopdong' => $hopdong]);
    }
    public function getXoa($id)
    {
    	$hd = HopDong::find($id);
        $MaHopDong = $hd->MaHopDong;
        $check = new HopDong;
        $tglap = $check->layNam($id);
        if($tglap == 1)
        {
            $hd->delete();

            activity()
            ->useLog('2')
            ->performedOn($hd)
            ->causedBy(Auth::user()->id)
            ->log('Xóa hợp đồng '.$MaHopDong);
            
            return redirect('page/quanlyhopdong')->with('thongbao','Bạn đã xóa thành công!');
        }
        else
        {
            return redirect('page/quanlyhopdong')->with('canhbao','Chưa thể xóa hóa đơn!');
        }
        
    }
    public function postThem(Request $request)
    {
        $hd = new HopDong;
        $this->validate($request, [
            'maHopDong' => 'required|unique:hopdong,MaHopDong',
            'khmua' => 'required'
        ], [
            'maHopDong.required' => 'Bạn cần nhập mã hợp đồng',
            'maHopDong.unique' => 'Mã hợp đồng đã tồn tại',
            'khmua.required' => 'Bạn cần chọn khách mua'
        ]);
        $hd->MaHopDong = $request->maHopDong;
        $hd->ID_Dat = $request->iddat;
        $hd->ID_KhachHang_Mua = $request->khmua;
        $d = Dat::find($request->iddat);
        $d->TrangThai = 2;
        $d->save();
        $hd->save();

        activity()
        ->useLog('1')
        ->performedOn($hd)
        ->causedBy(Auth::user()->id)
        ->log('Thêm hợp đồng '.$request->maHopDong);

        return redirect('page/quanlyyeucau')->with('thongbao','Cập nhật thành công thông tin hợp đồng !');
    }
    public function getTim(Request $r)
    {
        $hd = new HopDong;
        echo $hd->timhd($r->name, Auth::user()->ThuocCongTy);
    }
}

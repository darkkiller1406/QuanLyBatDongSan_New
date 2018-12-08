<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dat;
use Illuminate\Support\Facades\Auth;
class QL_TinDangController extends Controller
{
    //
    public function getView()
    {
        $dat = Dat::where('SoHuu', Auth::user()->ThuocCongTy)
                    ->where('TrangThai', '<', 2)
                    ->paginate(15);
    	return view('page.quanlytindang', ['dat' => $dat]);
    }

    public function getLoc(Request $r) {
        if(isset($r->quan)) {
            $dat = new Dat();
            $dat = $dat->locdat($r->quan, $r->giatien, $r->trangthai, 13, Auth::user()->ThuocCongTy);
            session(['dat' =>$dat]);
        }
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($r->session()->get('dat'));
        $perPage = 15;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $paginatedItems->setPath($r->url());

        return view('page.quanlytindang_loc')->with('dat_loc', $paginatedItems);
    }

    public function getDangTin($id) {
        $dat = Dat::find($id);
        $a = 'TrangThai';
        $dat->$a = 0;
        $dat->save();
        // log activity
        activity()
        ->useLog('4')
        ->performedOn($dat)
        ->causedBy(Auth::user()->id)
        ->withProperties(['TrangThai' => 'Đang đăng'])
        ->log('Đăng tin bán đất');

        return redirect('page/quanlydat')->with('thongbao', 'Bạn đã đăng tin thành công!');
    }

    public function getXoaTin($id) {
        $dat = Dat::find($id);
        if ($dat->TrangThai == 1) {
            return redirect('page/quanlydat')->with('canhbao', 'Lô đất đang đợi giao dịch, không thể xóa !');
        }
        $dat->TrangThai = 3;
        $dat->save();
        // log activity
        activity()
        ->useLog('5')
        ->performedOn($dat)
        ->causedBy(Auth::user()->id)
        ->withProperties(['TrangThai' => '0'])
        ->log('Hủy tin bán đất');

        return redirect('page/quanlytindang')->with('thongbao', 'Bạn đã hủy đăng tin thành công!');
    }

    public function getTimTinDang(Request $r) {
        $dat = new Dat;
        echo $dat->timtindang($r->name, Auth::user()->ThuocCongTy);
    }
}

<?php

namespace App\Http\Controllers;
use App\Dat;
use Illuminate\Support\Facades\Auth;
use App\Phuong;
use App\Quan;
use App\ThongKeTimKiem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
include('Help/simple_html_dom.php');
class QL_DatController extends Controller {
	//
	public function getView() {
		$dat = new Dat();
		$dat = Dat::where('SoHuu', Auth::user()->ThuocCongTy)->get();
		return view('page.quanlydat', ['dat' => $dat]);
	}
	public function getView_DSDatMap()
    {
        return view('danhsachdat_map');
    }
	public function postThem(Request $request) {
		$this->validate($request, [
			'mald' => 'unique:dat,KyHieuLoDat',
		], [
			'mald.unique' => 'Ký hiệu lô đất đã tồn tại',
		]);
		$dat = new Dat;
		//
		if($dat->kiemtraMap($request->map)) {
		// xử lý ảnh
			$file = $request->file('image');
			$i = 0;
			$tam = '';
			foreach ($file as $image) {
				if ($i <= 2) {
					$input['imagename'] = $request->mald . '_' . ++$i . '.' . $image->getClientOriginalExtension();
					$destinationPath = public_path('/img');
					$image->move($destinationPath, $input['imagename']);
					$tam = $input['imagename'] . ';' . $tam;
				}
			}
		//
			$dat->HinhAnh = $tam;
			$dt = ($request->dai) * ($request->rong) + (0.5 * ($request->nohau) * ($request->dai));
			$gia = $dt * ($request->dongia);
			$dat->KyHieuLoDat = $request->mald;
			$dat->SoHuu = $request->sohuu;
			$dat->TrangThai = $request->trangthai;
			$dat->LuotXem = '0';
			$dat->Map = $request->map;
			$dat->DiaChi = $request->diachi;
			$dat->Phuong = $request->phuong;
			//$dat->ThanhPho = $request->tp;
			$dat->Gia = $gia;
			$dat->Dai = $request->dai;
			$dat->Rong = $request->rong;
			$dat->DonGia = $request->dongia;
			$dat->NoHau = $request->nohau;
			$dat->DienTich = $dt;
			$dat->Huong = $request->huong;
			$dat->GhiChu = $request->ghichu;
			$dat->save();
			return redirect('page/quanlydat')->with('thongbao', 'Thêm thành công thông tin lô đất !');
		}
		return redirect('page/quanlydat')->with('canhbao', 'Địa chỉ đã có trong hệ thống');
	}
	public function getXoa($id) {
		$dat = Dat::find($id);
		if ($dat->TrangThai == 1) {
			return redirect('page/quanlydat')->with('canhbao', 'Lô đất đang đợi giao dịch, không thể xóa !');
		}
		if ($dat->TrangThai == 2) {
			return redirect('page/quanlydat')->with('canhbao', 'Lô đất đã có giao dịch trước đó, không thể xóa !');
		}
		$s = $dat->HinhAnh;
		$m = explode(';', $s);
		for ($a = 0; $a < (count($m) - 1); $a++) {
			Storage::delete($m[$a]);
		}
		$dat->delete();
		return redirect('page/quanlydat')->with('thongbao', 'Bạn đã xóa thành công!');
	}
	public function postSua(Request $request) {
		$this->validate($request, [
			'dai' => 'numeric|min:1',
			'rong' => 'numeric|min:1',
			'dongia' => 'numeric|min:1',
			'nohau' => 'numeric|min:0',
		], [
			'dai.min' => 'Độ dài lô đất phải lớn hơn 0',
			'rong.min' => 'Độ rộng lô đất phải lớn hơn 0',
			'dongia.min' => 'Đơn giá lô đất phải lớn hơn 0',
			'nohau.min' => 'Độ nở hậu lô đất phải lớn hơn hoặc bằng 0',
		]);
		$check = new Dat();
		if($check->kiemtraMap($request->Map)) {
			$dat = Dat::find($request->iddat);
			$file = $request->file('image');
			$i = 0;
			$tam = '';
			if ($file != NULL) {
				$s = $dat->HinhAnh;
				$m = explode(';', $s);
				for ($a = 0; $a < (count($m) - 1); $a++) {
					Storage::delete($m[$a]);
				}
				foreach ($file as $image) {
					if ($i <= 2) {
						$input['imagename'] = $request->mald . '_' . ++$i . '.' . $image->getClientOriginalExtension();
						$destinationPath = public_path('/img');
						$image->move($destinationPath, $input['imagename']);
						$tam = $input['imagename'] . ';' . $tam;
					}
				}
				$dat->HinhAnh = $tam;
			}
			$dt = ($request->dai) * ($request->rong) + (0.5 * ($request->nohau) * ($request->dai));
			$gia = $dt * ($request->dongia);
			$dat->KyHieuLoDat = $request->mald;
			$dat->DiaChi = $request->diachi;
			$dat->Phuong = $request->phuong;
			//$dat->ThanhPho = $request->tp;
			$dat->Gia = $gia;
			$dat->Dai = $request->dai;
			$dat->Map = $request->map;
			$dat->Rong = $request->rong;
			$dat->DonGia = $request->dongia;
			$dat->NoHau = $request->nohau;
			$dat->DienTich = $dt;
			$dat->Huong = $request->huong;
			$dat->GhiChu = $request->ghichu;
			//$dat->save();

			return redirect('page/quanlydat')->with('thongbao', 'Cập nhật thành công thông tin lô đất !');
		}
		return redirect('page/quanlydat')->with('canhbao', 'Địa chỉ đã có trong hệ thống');
	}
	public function getTim(Request $r) {
		$dat = new Dat;
		echo $dat->timdat($r->name);
	}
	public function getView_DSDat() {
		$dat = new Dat;
		return view('danhsachdat');	
	}
	public function timDat_ban(Request $r) {
		$dt = $r->dt;
		$gia = $r->gia;
		$huong = $r->huong;
		//$tp = $r->tp; || truong hop lam them nhieu thanh pho
		$tp = 1;
		$quan = $r->quan;
		//search dat
		$dat = new Dat();
		$kq = $dat->timdat_ban($quan, $tp, $gia, $dt, $huong);
		// update db thongketimkiem
		if ($quan != 0 || $huong != "A") {
			$thongketimkiem = new ThongKeTimKiem();
			$thongketimkiem->Quan = $quan;
			$thongketimkiem->Huong = $huong;
			$thongketimkiem->save();
			$thongketimkiem->deleteAfterOneYear();
		}
		return view('danhsachdat_kqtim', ['kq'=>$kq]);
	}
	public function timQuan(Request $r) {
		$quan = new Quan;
		echo $quan->timquan($r->tp);
	}
	public function timPhuong(Request $r) {
		$phuong = new Phuong;
		echo $phuong->timphuong($r->quan);
	}
	public function getLoc(Request $r) {
		$dat = new Dat();
		$dat = $dat->locdat($r->quan, $r->giatien, $r->trangthai, $r->thang);
		return view('page/quanlydat_loc')->with('dat_loc', $dat);
	}
}

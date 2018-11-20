<?php

namespace App\Http\Controllers;
use App\Dat;
use App\CongTy;
use Illuminate\Support\Facades\Auth;
use App\Phuong;
use App\Quan;
use App\ThongKeTimKiem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class QL_DatController extends Controller {
	//
	public function getView() {
		$dat = new Dat();
		$dat = Dat::where('SoHuu', Auth::user()->ThuocCongTy)->paginate(15);
		return view('page.quanlydat', ['dat' => $dat]);
	}

	public function getView_DSDatMap()
    {
        return view('danhsachdat_map');
    }

	public function postThem(Request $request) {
		$this->validate($request, [
			'mald' => 'unique:dat,KyHieuLoDat',
			'diachi' => 'required'
		], [
			'mald.unique' => 'Ký hiệu lô đất đã tồn tại',
			'diachi.required' => 'Bạn cần nhập địa chỉ của lô đất'
		]);
		$dat = new Dat;
		//
		if($dat->kiemtraMap($request->map, $request->diachi)) {
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
			$dat->DonGiaMua = $request->dongiamua;
			$dat->NoHau = $request->nohau;
			$dat->DienTich = $dt;
			$dat->Huong = $request->huong;
			$dat->GhiChu = $request->ghichu;
			$dat->save();

			activity()
			->useLog('1')
			->performedOn($dat)
			->causedBy(Auth::user()->id)
			->log('Thêm lô đất '.$request->mald);
			return redirect('page/quanlydat')->with('thongbao', 'Thêm thành công thông tin lô đất !');
		}
		return redirect('page/quanlydat')->with('canhbao', 'Địa chỉ đã có trong hệ thống');
	}

	public function getXoa($id) {
		$dat = Dat::find($id);
		$kyHieuLoDat = $dat->KyHieuLoDat;
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
		activity()
		->useLog('2')
		->performedOn($dat)
		->causedBy(Auth::user()->id)
		->log('Xóa lô đất '.$kyHieuLoDat);
		return redirect('page/quanlydat')->with('thongbao', 'Bạn đã xóa thành công!');
	}

	public function postSua(Request $request) {
		$this->validate($request, [
			'diachi' => 'required',
			'dai' => 'numeric|min:1',
			'rong' => 'numeric|min:1',
			'dongia' => 'numeric|min:1',
			'nohau' => 'numeric|min:0'
		], [
			'dai.min' => 'Độ dài lô đất phải lớn hơn 0',
			'rong.min' => 'Độ rộng lô đất phải lớn hơn 0',
			'dongia.min' => 'Đơn giá lô đất phải lớn hơn 0',
			'nohau.min' => 'Độ nở hậu lô đất phải lớn hơn hoặc bằng 0',
			'mald.unique' => 'Ký hiệu lô đất đã tồn tại',
			'diachi.required' => 'Bạn cần nhập địa chỉ của lô đất'
		]);
		$check = new Dat();
		$dat = Dat::find($request->iddat);
		if($dat->Map == $request->map || $dat->DiaChi == $request->diachi) {
			$checkMap = true;
		} else {
			$checkMap = $check->kiemtraMap($request->map, $request->diachi);
		}
		if($checkMap) {
			$dat_old = Dat::find($request->iddat);
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
			$dat->DonGiaMua = $request->dongiamua;
			$dat->DienTich = $dt;
			$dat->Huong = $request->huong;
			$dat->GhiChu = $request->ghichu;
			$dat->save();
			$dat_new = Dat::find($request->iddat);
			$arrays = array('KyHieuLoDat', 'Rong', 'Dai', 'NoHau', 'Gia', 'Map', 'DonGia', 'DienTich', 'Huong', 'GhiChu', 'Phuong', 'DiaChi', 'HinhAnh');

			// check field change
			$change = false;
			$fieldChange = [];
			foreach ($arrays as $array) {
				if ($dat_old->$array != $dat_new->$array) {
					$fieldChange[$array] =  $dat_new->$array;
					$change = true;
				}
			}

			// log activity
			if($change) {
				activity()
				->useLog('3')
				->performedOn($dat)
				->causedBy(Auth::user()->id)
				->withProperties($fieldChange)
				->log('Cập nhật thông tin lô đất '.$dat_new->KyHieuLoDat);
			}
			
			return redirect('page/quanlydat')->with('thongbao', 'Cập nhật thành công thông tin lô đất !');
		}
		return redirect('page/sualodat/'.$request->iddat)->with('canhbao', 'Địa chỉ đã có trong hệ thống');
	}

	public function getTim(Request $r) {
		$dat = new Dat;
		echo $dat->timdat($r->name, Auth::user()->ThuocCongTy);
	}

	public function getView_DSDat() {
		$dat = new Dat();
		$dat = Dat::where('TrangThai', '<', '2' )->paginate(15);
		return view('danhsachdat', ['dat' => $dat]);	
	}

	public function timDat_ban(Request $r) {
		$dt = $r->dt;
		$gia = $r->gia;
		$huong = $r->huong;
		$phuong = $r->phuong;
		//$tp = $r->tp; || truong hop lam them nhieu thanh pho
		$tp = 1;
		$quan = $r->quan;
		// update db thongketimkiem
		if ($quan != 0 || $huong != "A") {
			$thongketimkiem = new ThongKeTimKiem();
			$thongketimkiem->Quan = $quan;
			$thongketimkiem->Huong = $huong;
			$thongketimkiem->save();
			$thongketimkiem->deleteAfterOneYear();
		}
		if(isset($r->congty)) {
			if(isset($r->quan)) {
				$dat = new Dat();
				$kq = $dat->timdat_ban($phuong, $quan, $tp, $gia, $dt, $huong, $r->congty);
				session(['dat' =>$kq]);
			}

			$currentPage = LengthAwarePaginator::resolveCurrentPage();
			$itemCollection = collect($r->session()->get('dat'));
			$perPage = 15;
			$currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
			$paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
			$paginatedItems->setPath($r->url());
			if(!empty($kq)) {
				return view('danhsachdat_kqtim', ['kq'=>$paginatedItems]);
			}
			$congty = CongTy::where('id', $r->congty)->get();

			return view('danhsachdat_kqtim', ['kq'=>$congty]);
		} else {
			if(isset($r->quan)) {
				$dat = new Dat();
				$kq = $dat->timdat_ban($phuong, $quan, $tp, $gia, $dt, $huong);
				session(['dat' =>$kq]);
			}

			$currentPage = LengthAwarePaginator::resolveCurrentPage();
			$itemCollection = collect($r->session()->get('dat'));
			$perPage = 15;
			$currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
			$paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
			$paginatedItems->setPath($r->url());

			return view('danhsachdat_kqtim', ['kq'=>$paginatedItems]);
		}
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
		if(isset($r->quan)) {
			$dat = new Dat();
			$dat = $dat->locdat($r->quan, $r->giatien, $r->trangthai, $r->thang, Auth::user()->ThuocCongTy);
			session(['dat' =>$dat]);
		}
		$currentPage = LengthAwarePaginator::resolveCurrentPage();
		$itemCollection = collect($r->session()->get('dat'));
		$perPage = 15;
		$currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
		$paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
		$paginatedItems->setPath($r->url());
		return view('page/quanlydat_loc')->with('dat_loc', $paginatedItems);
	}

	public function getView_DSDat_CTy($link) {
		$dat = new Dat();
		$dat = Dat::where('Link', $link )
				->from('CongTy')
				->join('dat', 'SoHuu', '=', 'congty.id')
				->where('TrangThai', '=', '0')
				->paginate(15);
		if(isset($dat[0]->Map)) {
			return view('danhsachdat', ['dat' => $dat]);
		}
		$congty = CongTy::where('Link', $link)->get();
		return view('danhsachdat', ['dat'=>$congty]);
		
	}

	public function getViewThem() {
		return view('page/themlodat');
	}
	public function getViewSua($id) {
		$dat = Dat::find($id);
		return view('page/sualodat', ['dat' => $dat]);
	}
}

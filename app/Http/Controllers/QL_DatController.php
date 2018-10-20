<?php

namespace App\Http\Controllers;
use App\Dat;
use App\Phuong;
use App\Quan;
use App\ThongKeTimKiem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
include('Help/simple_html_dom.php');
class QL_DatController extends Controller {
	//
	public function getView() {
		return view('page.quanlydat');
	}
	public function postThem(Request $request) {
		$this->validate($request, [
			'mald' => 'unique:dat,KyHieuLoDat',
		], [
			'mald.unique' => 'Ký hiệu lô đất đã tồn tại',
		]);
		$dat = new Dat;
		//
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
		$dat->TrangThai = '0';
		$dat->LuotXem = '0';
		$dat->DiaChi = $request->diachi;
		$dat->Quan = $request->quan;
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
	public function getXoa($id) {
		$dat = Dat::find($id);
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
		$dat->SoHuu = $request->sohuu;
		$dat->DiaChi = $request->diachi;
		$dat->Quan = $request->quan;
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

		return redirect('page/quanlydat')->with('thongbao', 'Cập nhật thành công thông tin lô đất !');
	}
	public function getTim(Request $r) {
		$dat = new Dat;
		echo $dat->timdat($r->name);
	}
	public function getView_DSDat() {
		$datFromOtherPage = $this->findDatFromOtherWeb();
		return view('danhsachdat', ['resultFromWeb'=>$datFromOtherPage]);
	}
	public function timDat_ban(Request $r) {
		$dt = $r->dt;
		$gia = $r->gia;
		$huong = $r->huong;
		//$tp = $r->tp; || truong hop lam them nhieu thanh pho
		$tp = 1;
		$quan = $r->quan;
		//search dat
		$a = new Dat();
		$kq = $a->timdat_ban($quan, $tp, $gia, $dt, $huong);
		// update db thongketimkiem
		if ($quan != 0 || $huong != "A") {
			$thongketimkiem = new ThongKeTimKiem();
			$thongketimkiem->Quan = $quan;
			$thongketimkiem->Huong = $huong;
			$thongketimkiem->save();
			$thongketimkiem->deleteAfterOneYear();
		}
		// tim dat tu trang web khac
		$datFromOtherPage = $this->findDatFromOtherWeb($quan, $gia, $dt);
		session(['datFromOtherPage' => $datFromOtherPage]);
		//return view
		return view('danhsachdat_kqtim', ['kq'=>$kq, 'resultFromWeb'=>$datFromOtherPage]);
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
	public function findDatFromOtherWeb($quan = null, $gia = null, $dt = null, $huong = null) {
		return $this->getDatFromNhaDat($quan, $gia, $dt);
	}
	public function getDatFromNhaDat($quan, $gia, $dt) {
		if ($quan != 0) {
			$timQuan = Quan::find($quan);
			$tagQuan = $timQuan->Tag_muabannhadat;
		}
		else {
			$tagQuan = 's59';
		}
		switch ($dt) {
            case '1':
                $dt = '13847__50';
                break;
            case '2':
                $dt = '13847_50_100';
                break;
            case '3':
                $dt = '13847_100_150';
                break;
            case '4':
                $dt = '13847_150_200';
                break;
            default:
                $dt = '';
                break;
        }
        switch ($gia) {
            case '1':
                $gia = '834__800-trieu,';
                break;
            case '2':
                $gia = '834_800-trieu_1,5-ty,';
                break;
            case '3':
                $gia = '834_1,5-ty_2,5-ty,';
                break;
            case '4':
                $gia = '834_2,5-ty_4-ty,';
                break;
            default:
                $gia = '';
                break;
        }
		$html = file_get_html('http://www.muabannhadat.vn/dat-ban-3515/tp-ho-chi-minh-'.$tagQuan.'?aral='.$gia.$dt , FILE_USE_INCLUDE_PATH);
		$array = array();
		$count = 5;
		for($i=0; $i<$count; $i++) {
			$links = array();
			foreach($html->find('//*[@id="MainContent_ctlList_ctlResults_repList_ctl00_'.$i.'_divListingInformationTitle_'.$i.'"]/a') as $a) {
				$html_sub = file_get_html('http://www.muabannhadat.vn'.$a->href, FILE_USE_INCLUDE_PATH);
				$linkGet = 'http://www.muabannhadat.vn'.$a->href;
				$links[] = str_replace('/dat-ban-dat-tho-cu-3532/','',$a->href);
				// get tieu de
				foreach($html_sub->find('//*[@id="ctl01"]/div[5]/div[2]/div/div/div/div[1]') as $a) {
					$links[] = $a->plaintext;
					break;
				}
				// get dia chi
				foreach($html_sub->find('//*[@id="ctl01"]/div[5]/div[3]/div/div/div[4]/div[1]/div[1]/div[1]') as $a) {
					$vitri = explode('|', $a->plaintext);
					$links[] = $vitri[2];
					$links[] = $vitri[1].', '.$vitri[2].', '.$vitri[2];
					break;
				}
				// get vi tri map
				foreach($html_sub->find('//*[@id="MainContent_ctlDetailBox_lblMapLink"]/a') as $a) {
					$links[] = str_replace('https://maps.google.com/?q=loc:', '', $a->href);
					break;
				}
				// get dien tich
				foreach($html_sub->find('//*[@id="ctl01"]/div[5]/div[3]/div/div/div[4]/div[1]/div[2]/div/div[2]/div[1]/table/tbody/tr[2]/td') as $a) {
					$links[] = $a->plaintext;
					break;
				}
				// get gia tien
				foreach($html_sub->find('//*[@id="MainContent_ctlDetailBox_lblPrice"]') as $a) {
					$links[] = $a->plaintext;
					break;
				}
				// get mo ta
				foreach($html_sub->find('//*[@id="Description"]') as $a) {
					$links[] = $a->plaintext;
					break;
				}
				// get hinh
				foreach($html_sub->find('.swipebox') as $a) {
					$links[] = $a->href;
					break;
				}
				foreach($html_sub->find('//*[@id="MainContent_ctlDetailBox_lblFengShuiDirection"]') as $a) {
					$links[] = $a->plaintext;
					break;
				}
				// get huong 
				$links[] = $linkGet;
				if (count($links) >= 11) {
					$array[$i] = $links;
				}
				else {
					$count++;
				}
				// get hinh 
			}
		}
		return $array;
	}

	public function getDatFromNhaDatNet($quan, $gia, $dt) {
		if ($quan != 0) {
			$timQuan = Quan::find($quan);
			$tagQuan = $timQuan->Tag_nhadat;
		}
		else {
			$tagQuan = 's59';
		}
		switch ($dt) {
            case '1':
                $dt = 'dien-tich:0-50';
                break;
            case '2':
                $dt = 'dien-tich:50-100';
                break;
            case '3':
                $dt = 'dien-tich:100-150';
                break;
            case '4':
                $dt = 'dien-tich:150-200';
                break;
            default:
                $dt = '';
                break;
        }
        switch ($gia) {
            case '1':
                $gia = 'gia:0-800';
                break;
            case '2':
                $gia = 'gia:800-1500';
                break;
            case '3':
                $gia = 'gia:1500-2500';
                break;
            case '4':
                $gia = 'gia:2500-4000';
                break;
            default:
                $gia = '';
                break;
        }
		$html = file_get_html('http://www.muabannhadat.vn/dat-ban-3515/tp-ho-chi-minh-'.$tagQuan.'?aral='.$gia.$dt , FILE_USE_INCLUDE_PATH);
		$array = array();
		$count = 5;
		for($i=0; $i<$count; $i++) {
			$links = array();
			foreach($html->find('//*[@id="MainContent_ctlList_ctlResults_repList_ctl00_'.$i.'_divListingInformationTitle_'.$i.'"]/a') as $a) {
				$html_sub = file_get_html('http://www.muabannhadat.vn'.$a->href, FILE_USE_INCLUDE_PATH);
				$linkGet = 'http://www.muabannhadat.vn'.$a->href;
				$links[] = str_replace('/dat-ban-dat-tho-cu-3532/','',$a->href);
				// get tieu de
				foreach($html_sub->find('//*[@id="ctl01"]/div[5]/div[2]/div/div/div/div[1]') as $a) {
					$links[] = $a->plaintext;
					break;
				}
				// get dia chi
				foreach($html_sub->find('//*[@id="ctl01"]/div[5]/div[3]/div/div/div[4]/div[1]/div[1]/div[1]') as $a) {
					$vitri = explode('|', $a->plaintext);
					$links[] = $vitri[2];
					$links[] = $vitri[1].', '.$vitri[2].', '.$vitri[2];
					break;
				}
				// get vi tri map
				foreach($html_sub->find('//*[@id="MainContent_ctlDetailBox_lblMapLink"]/a') as $a) {
					$links[] = str_replace('https://maps.google.com/?q=loc:', '', $a->href);
					break;
				}
				// get dien tich
				foreach($html_sub->find('//*[@id="ctl01"]/div[5]/div[3]/div/div/div[4]/div[1]/div[2]/div/div[2]/div[1]/table/tbody/tr[2]/td') as $a) {
					$links[] = $a->plaintext;
					break;
				}
				// get gia tien
				foreach($html_sub->find('//*[@id="MainContent_ctlDetailBox_lblPrice"]') as $a) {
					$links[] = $a->plaintext;
					break;
				}
				// get mo ta
				foreach($html_sub->find('//*[@id="Description"]') as $a) {
					$links[] = $a->plaintext;
					break;
				}
				// get hinh
				foreach($html_sub->find('.swipebox') as $a) {
					$links[] = $a->href;
					break;
				}
				foreach($html_sub->find('//*[@id="MainContent_ctlDetailBox_lblFengShuiDirection"]') as $a) {
					$links[] = $a->plaintext;
					break;
				}
				// get huong 
				$links[] = $linkGet;
				if (count($links) >= 11) {
					$array[$i] = $links;
				}
				else {
					$count++;
				}
				// get hinh 
			}
		}
		return $array;
	}
}

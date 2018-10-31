<?php

namespace App\Http\Controllers;
use App\Dat;
use App\Dat_Web;
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
			$dat->SoHuu = $request->sohuu;
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
		$trangthai = $dat->getTrangThaiChucNang();		
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
		// tim dat tu trang web khac
		$trangthai = $dat->getTrangThaiChucNang();
		if( $trangthai == 0 && count($kq) < 9 ) {
			$datFromOtherPage = $this->findDatFromOtherWeb($quan, $gia, $dt);
			return view('danhsachdat_kqtim', ['kq'=>$kq, 'resultFromWeb'=>$datFromOtherPage]);
		} else {
			return view('danhsachdat_kqtim', ['kq'=>$kq]);
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
		$count = 6;
		for($i=0; $i<$count; $i++) {
			$links = array();
			foreach($html->find('//*[@id="MainContent_ctlList_ctlResults_repList_ctl00_'.$i.'_divListingInformationTitle_'.$i.'"]/a') as $a) {
				$html_sub = file_get_html('http://www.muabannhadat.vn'.$a->href, FILE_USE_INCLUDE_PATH);
				$linkGet = 'http://www.muabannhadat.vn'.$a->href;
				//
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
					$links[] = $vitri[1].', '.$vitri[2];
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
					if(strlen($a->plaintext) > 1000) {
						$links[] = $this->substr($a->plaintext, 1000);
					} else {
						$links[] = $a->plaintext;
					}
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
				$links[] = $linkGet;

				// save to DB
				if (count($links) >= 11) {
					$dat = new Dat_Web();
					if($dat->checkLink($links[0])) {
						$dat->link = $links[0];
						$dat->TrangThai = 0;
						$dat->Gia = $links[6];
						$dat->DiaChi = $links[3];
						$dat->DienTich = $links[5];
						$dat->MoTa = $links[7];
						$dat->Map = $links[4];
						$dat->Hinh = $links[8];
						$dat->save();
						$array[$i] = $links;
					} else {
						$id = $dat->findIdByLink($links[0]);
						$dat_web = Dat_Web::find($id);
						if ($dat_web->TrangThai == 2 || $dat_web->TrangThai == 1) {
							$count++;
						} else {
							$array[$i] = $links;
						}
					}
				} else {
					$count++;
				}
			}
		}
		return $array;
	}
	function substr($str, $length, $minword = 3)
	{
	    $sub = '';
	    $len = 0;
	    foreach (explode(' ', $str) as $word) {
	        $part = (($sub != '') ? ' ' : '') . $word;
	        $sub .= $part;
	        $len += strlen($part);
	        if (strlen($word) > $minword && strlen($sub) >= $length) {
	            break;
	        }
	    }
	    return $sub . (($len < strlen($str)) ? '...' : '');
	}
	public function batTatChucNang (Request $r) {
		$dat = new Dat;
		$dat->batTatChucNang($r->check);
		return $r->check;
	}
}

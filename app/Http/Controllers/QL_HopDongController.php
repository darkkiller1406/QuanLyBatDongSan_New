<?php

namespace App\Http\Controllers;
use App\HopDong;
use App\YeuCau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Dat;
use App\CongTy;
use App\KhachHang;
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
        if($hd->TrangThai == 1) {
            $yeucau = YeuCau::where('id_dat', $hd->ID_Dat)->get();
            foreach ($yeucau as $yc) {
                $yc->delete();
            }
            $hd->delete();
            activity()
            ->useLog('2')
            ->performedOn($hd)
            ->causedBy(Auth::user()->id)
            ->log('Xóa hợp đồng '.$MaHopDong);
            
            return redirect('page/quanlyhopdong')->with('thongbao','Bạn đã xóa thành công!');
        } elseif($tglap > 1) {
            $dat = Dat::find($hd->ID_Dat);
            if(!empty($hd->FileHopDong)) {
                unlink($hd->FileHopDong);
            } 
            $dat->delete();
            $hd->delete();
            activity()
            ->useLog('2')
            ->performedOn($hd)
            ->causedBy(Auth::user()->id)
            ->log('Xóa hợp đồng '.$MaHopDong);
            
            return redirect('page/quanlyhopdong')->with('thongbao','Bạn đã xóa thành công!');
        } else {
            return redirect('page/quanlyhopdong')->with('canhbao','Chưa thể xóa hợp đồng!');
        }
        
    }

    public function getThem($id)
    {
        $yeucau = YeuCau::find($id);
        $khachhang = $khachhang = KhachHang::where('ThuocCongTy', Auth::user()->ThuocCongTy)->get();
        return view('page/themhopdong', ['yeucau' => $yeucau, 'khachhang' => $khachhang]);
    }

    public function getSua($id)
    {
        $hopdong = HopDong::find($id);
        return view('page/suahopdong', ['hopdong' => $hopdong]);
    }

    public function getUpLoad()
    {
        return view('page/uploadfilehopdong');
    }

    public function postUpload(Request $request)
    {
        $this->validate($request, [
            'hopdong' => 'required',
        ], [
            'hopdong.required' => 'Bạn cần chọn file hợp đồng để lưu vào hệ thống',
        ]);
        $congty = CongTy::where('id', Auth::user()->ThuocCongTy)->first();
        $file =  $request->file('hopdong');
        $input['filename'] = 'FormHopDong.docx';
        $destinationPath = public_path('HopDong/'.str_replace(' ','',$congty->TenCongTy).'/form');
        $file[0]->move($destinationPath, $input['filename']);
        $url = $destinationPath.'\\'.$input['filename'];
        return redirect('page/quanlyhopdong')->with('thongbao', 'Upload mẫu hợp đồng thành công');
    }

    public function postXacNhan(Request $request) {
        $this->validate($request, [
            'hopdong' => 'required',
        ], [
            'hopdong.required' => 'Bạn cần chọn file hợp đồng để lưu vào hệ thống',
        ]);
        $hd = HopDong::find($request->idhd);
        if (date("Y-m-d") < $hd->NgayThanhToan ) {
            return redirect('page/quanlyhopdong')->with('canhbao', 'Chưa đến ngày thanh toán để kết thúc hợp đồng');
        }
        $congty = CongTy::where('id', Auth::user()->ThuocCongTy)->first();
        $file =  $request->file('hopdong');
        $input['filename'] = 'HopDong_'.$hd->MaHopDong.'.'.$file[0]->getClientOriginalExtension();
        $destinationPath = public_path('HopDong/'.str_replace(' ','',$congty->TenCongTy));
        $file[0]->move($destinationPath, $input['filename']);
        $hd->TrangThai = 2;
        $d = Dat::find($hd->ID_Dat);
        $d->TrangThai = 2;
        $d->Gia = $hd->Gia;
        $d->DonGia = ($hd->Gia)/(($d->Dai) * ($d->Rong) + (0.5 * ($d->NoHau) * ($d->Dai)));
        $yeucau = YeuCau::where('id_dat', $hd->ID_Dat)->get();
        foreach ($yeucau as $yc) {
            $yc->delete();
        }
        $hd->save();
        $d->save();
        activity()
        ->useLog('3')
        ->performedOn($hd)
        ->causedBy(Auth::user()->id)
        ->log('Hoàn tất hợp đồng '.$hd->MaHopDong);
        return redirect('page/quanlyhopdong')->with('thongbao', 'Cập nhật hợp đồng thành công');
    }

    public function postThem(Request $request)
    {
        $this->validate($request, [
            'mahopdong' => 'required|unique:hopdong,MaHopDong',
            'khmua' => 'required',
            'tiendatcoc' => 'required',
            'ngaythanhtoan' => 'required',
            'gia' => 'required'
        ], [
            'mahopdong.required' => 'Bạn cần nhập mã hợp đồng',
            'mahopdong.unique' => 'Mã hợp đồng đã tồn tại',
            'khmua.required' => 'Bạn cần chọn khách mua'
        ]);

        
        $congty = CongTy::where('id', Auth::user()->ThuocCongTy)->first();
        $filecongty = str_replace(' ','',$congty->TenCongTy);
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $domPdfPath = realpath(PHPWORD_BASE_DIR . '/../vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
        $path = public_path()."//HopDong/".$filecongty."/form/FormHopDong.docx";

        if (file_exists($path)) {
            $document = $phpWord->loadTemplate("HopDong/".$filecongty."/form/FormHopDong.docx");
            //ngaythang
            $document->setValue('thu', $this->get_current_weekday());
            $document->setValue('ngay', date('d'));
            $document->setValue('thang', date('m'));
            $document->setValue('nam', date('Y'));
            //thong tin khach
            $kh = KhachHang::where('id', $request->khmua)->first();
            $document->setValue('tenkhach', mb_strtoupper($kh->HoVaTenDem.' '.$kh->Ten, 'UTF-8'));
            $ngaysinh=date_create($kh->NgaySinh);
            $document->setValue('ngaysinh', date_format($ngaysinh,"d/m/Y"));
            $document->setValue('cmnd', $kh->CMND);
            $document->setValue('noicap', $kh->NoiCap);
            $ngaycap=date_create($kh->NgayCap);
            $document->setValue('ngaycap', date_format($ngaycap,"d/m/Y"));
            $document->setValue('sdt', $kh->DTDD);
            $document->setValue('diachi', $kh->DiaChi);
            //thongtindat
            $dat = Dat::where('id', $request->iddat)->first();
            $document->setValue('dientich', $dat->DienTich);
            $document->setValue('thuaso', $dat->ThuaSo);
            $document->setValue('tobando', $dat->ToBanDo);
            $document->setValue('giaychungnhan', $dat->GiayChungNhan);
            $document->setValue('mahopdong', $request->mahopdong.'/'.$dat->KyHieuLoDat);
            $document->setValue('giaban', number_format($request->gia));
            $document->setValue('giaban_chu', $this->convert_number_to_words($request->gia));            
            $document->setValue('tiencoc', number_format($request->tiendatcoc));
            $document->setValue('tiencoc_chu', $this->convert_number_to_words($request->tiendatcoc));
            $document->setValue('tienconlai', number_format(($request->gia)-($request->tiendatcoc)));
            $document->setValue('tienconlai_chu', $this->convert_number_to_words(($request->gia)-($request->tiendatcoc)));
            $ngaythanhtoan = date_create($request->ngaythanhtoan);
            $document->setValue('ngaythanhtoan', date_format($ngaythanhtoan,"d/m/Y"));
            //congty
            $document->setValue('diachicongty', $congty->DiaChi);
            if($request->thanhtoan == 1) {
                $phuongthuc = 'Tiền mặt';
            } else {
                $phuongthuc = 'Chuyển khoản';
            }
            $document->setValue('phuongthucthanhtoan', $phuongthuc);
            // save file
            $name = 'HopDong.docx';
            $document->saveAs($name);
            //rename($name, public_path()."'/HopDong/'.$congty->TenCongTy.'/HopDong_'.$request->MaHopDong.'.docx'");
            // $file= public_path(). "/".$name;
            // $filecongty = str_replace(' ','',$congty->TenCongTy);
            // $destinationPath = public_path()."'/HopDong/'.$filecongty.'/HopDong_'.$request->MaHopDong.'.docx'";
            // $file->move($destinationPath, $name);
            $phpWord = \PhpOffice\PhpWord\IOFactory::load('HopDong.docx');
            $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord);
            $xmlWriter->save('HopDong/'.$filecongty.'/HopDong_'.$request->mahopdong.'.docx');
            unlink($name);

            $congty = CongTy::where('id', Auth::user()->ThuocCongTy)->first();
            $hd = new HopDong;
            $hd->MaHopDong = $request->mahopdong;
            $hd->ID_Dat = $request->iddat;
            $hd->ID_KhachHang_Mua = $request->khmua;
            $hd->TienDatCoc = $request->tiendatcoc;
            $hd->Gia = $request->gia;
            $hd->TrangThai = 1;
            $hd->PhuongThucThanhToan = $request->thanhtoan;
            $hd->NgayThanhToan = $request->ngaythanhtoan;
            $hd->NguoiLap = Auth::user()->id;
            $hd->FileHopDong = "HopDong/".$filecongty."/HopDong_".$request->mahopdong.".docx";
            $hd->save();

            activity()
            ->useLog('1')
            ->performedOn($hd)
            ->causedBy(Auth::user()->id)
            ->log('Thêm hợp đồng '.$request->maHopDong);

            return redirect('page/quanlyhopdong')->with('thongbao', 'Thêm hợp đồng thành công');


        } else {
            return redirect('page/quanlyhopdong')->with('canhbao', 'Bạn chưa upload file hợp đồng cho công ty bạn');
        }
    }

    public function postSua(Request $request)
    {
        $this->validate($request, [
            'tiendatcoc' => 'required',
            'ngaythanhtoan' => 'required',
        ], [
            'tiendatcoc.required' => 'Bạn cần nhập tiền đặt cọc',
            'ngaythanhtoan.required' => 'Bạn cần chọn ngày thanh toán'
        ]);

        $congty = CongTy::where('id', Auth::user()->ThuocCongTy)->first();
        $hdOld = HopDong::find($request->idhd);
        $hdEdit = HopDong::find($request->idhd);
        $hdEdit->TienDatCoc = $request->tiendatcoc;
        $hdEdit->PhuongThucThanhToan = $request->thanhtoan;
        $hdEdit->NgayThanhToan = $request->ngaythanhtoan;
        $hdEdit->save();
        
        $hd = HopDong::find($request->idhd);
        $congty = CongTy::where('id', Auth::user()->ThuocCongTy)->first();
        $filecongty = str_replace(' ','',$congty->TenCongTy);
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $domPdfPath = realpath(PHPWORD_BASE_DIR . '/../vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
        $path = public_path()."//HopDong/".$filecongty."/form/FormHopDong.docx";
        if (file_exists($path)) {
            $document = $phpWord->loadTemplate("HopDong/".$filecongty."/form/FormHopDong.docx");
            //ngaythang
            $document->setValue('thu', $this->get_current_weekday());
            $document->setValue('ngay', date('d'));
            $document->setValue('thang', date('m'));
            $document->setValue('nam', date('Y'));
            //thong tin khach
            $kh = KhachHang::where('id', $hd->ID_KhachHang_Mua)->first();
            $document->setValue('tenkhach', mb_strtoupper($kh->HoVaTenDem.' '.$kh->Ten, 'UTF-8'));
            $ngaysinh=date_create($kh->NgaySinh);
            $document->setValue('ngaysinh', date_format($ngaysinh,"d/m/Y"));
            $document->setValue('cmnd', $kh->CMND);
            $document->setValue('noicap', $kh->NoiCap);
            $ngaycap=date_create($kh->NgayCap);
            $document->setValue('ngaycap', date_format($ngaycap,"d/m/Y"));
            $document->setValue('sdt', $kh->DTDD);
            $document->setValue('diachi', $kh->DiaChi);
            //thongtindat
            $dat = Dat::where('id', $request->iddat)->first();
            $document->setValue('dientich', $dat->DienTich);
            $document->setValue('thuaso', $dat->ThuaSo);
            $document->setValue('tobando', $dat->ToBanDo);
            $document->setValue('giaychungnhan', $dat->GiayChungNhan);
            $document->setValue('mahopdong', $hd->MaHopDong.'/'.$dat->KyHieuLoDat);
            $document->setValue('giaban', number_format($hd->Gia));
            $document->setValue('giaban_chu', $this->convert_number_to_words($hd->Gia));            
            $document->setValue('tiencoc', number_format($hd->TienDatCoc));
            $document->setValue('tiencoc_chu', $this->convert_number_to_words($hd->TienDatCoc));
            $document->setValue('tienconlai', number_format(($hd->Gia)-($hd->TienDatCoc)));
            $document->setValue('tienconlai_chu', $this->convert_number_to_words(($hd->Gia)-($hd->TienDatCoc)));
            $ngaythanhtoan = date_create($hd->NgayThanhToan);
            $document->setValue('ngaythanhtoan', date_format($ngaythanhtoan,"d/m/Y"));
            //congty
            $document->setValue('diachicongty', $congty->DiaChi);
            if($hd->PhuongThucThanhToan == 1) {
                $phuongthuc = 'Tiền mặt';
            } else {
                $phuongthuc = 'Chuyển khoản';
            }
            $document->setValue('phuongthucthanhtoan', $phuongthuc);
            // save file
            $name = 'HopDong.docx';
            $document->saveAs($name);
            // rename($name, public_path()."'HopDong/'.$congty->TenCongTy.'/HopDong_'.$request->MaHopDong.'.pdf'");
            // $file= public_path(). "/HopDong/{$name}";
            $phpWord = \PhpOffice\PhpWord\IOFactory::load('HopDong.docx');
            $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord);
            $xmlWriter->save('HopDong/'.$filecongty.'/HopDong_'.$hd->MaHopDong.'.docx');
            unlink($name);

            $arrays = array('TienDatCoc', 'NgayThanhToan', 'PhuongThucThanhToan');

            // check field change
            $change = false;
            $fieldChange = [];
            foreach ($arrays as $array) {
                if ($hdOld->$array != $hd->$array) {
                    $fieldChange[$array] =  $hdOld->$array.'->'.$hd->$array;
                    $change = true;
                }
            }
            if($change) {
                activity()
                ->useLog('3')
                ->performedOn($hd)
                ->causedBy(Auth::user()->id)
                ->withProperties($fieldChange)
                ->log('Sửa hợp đồng '.$hd->MaHopDong);
            }
            return redirect('page/quanlyhopdong')->with('thongbao', 'Sửa hợp đồng thành công');


        } else {
            return redirect('page/quanlyhopdong')->with('thongbao',$path);
        }
    }
    public function getTim(Request $r)
    {
        $hd = new HopDong;
        echo $hd->timhd($r->name, Auth::user()->ThuocCongTy);
    }
    function convert_number_to_words($num) {
          $ones = array( 
            1 => "một", 
            2 => "hai", 
            3 => "ba", 
            4 => "bốn", 
            5 => "năm", 
            6 => "sáu", 
            7 => "bảy", 
            8 => "tám", 
            9 => "chín", 
            10 => "mười", 
            11 => "mười một", 
            12 => "mười hai", 
            13 => "mười ba", 
            14 => "mười bốn", 
            15 => "mười lăm", 
            16 => "mười sáu", 
            17 => "mười bảy", 
            18 => "mười tám", 
            19 => "mười chín" 
        ); 
          $tens = array( 
            1 => "mười",
            2 => "hai mươi", 
            3 => "ba mươi", 
            4 => "bốn mươi", 
            5 => "năm mươi", 
            6 => "sáu mươi", 
            7 => "bảy mươi", 
            8 => "tám mươi", 
            9 => "chín mươi" 
        ); 
          $hundreds = array( 
            "trăm", 
            "nghìn", 
            "triệu", 
            "tỷ", 
            "nghìn tỷ", 
            "triệu tỉ" 
        ); //limit t quadrillion 
        $num = number_format($num,2,".",","); 
        $num_arr = explode(".",$num); 
        $wholenum = $num_arr[0]; 
        $decnum = $num_arr[1]; 
        $whole_arr = array_reverse(explode(",",$wholenum)); 
        krsort($whole_arr); 
        $rettxt = "";
        $temp = 0;
        foreach($whole_arr as $key => $i){ 
            if($i < 20){
                if($i != 0) {
                    $rettxt .= $ones[$i];
                }
            }elseif($i < 100){ 
                $rettxt .= $tens[substr($i,0,1)]; 
                $rettxt .= " ".$ones[substr($i,1,1)]; 
            }else{ 
                $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0];
                if(!empty(substr($i,1,1))) {
                    $rettxt .= " ".$tens[substr($i,1,1)]; 
                }
                if(!empty(substr($i,2,1))) {
                    $rettxt .= " ".$ones[substr($i,2,1)];
                }
                if(substr($i,2,1) == '0') {
                    $temp = 1;
                }
            }
            if($key > 0){
                if($hundreds[$key] == 'nghìn' && $temp == 1) {
                    $rettxt .= " "; 
                } else {
                    $rettxt .= " ".$hundreds[$key]." "; 
                }
                
            } 
        } 
        if($decnum > 0){ 
            $rettxt .= " and "; 
            if($decnum < 20){ 
                $rettxt .= $ones[$decnum]; 
            }elseif($decnum < 100){ 
                $rettxt .= $tens[substr($decnum,0,1)]; 
                $rettxt .= " ".$ones[substr($decnum,1,1)]; 
            } 
        } 
        return $rettxt; 
    }
    function get_current_weekday() {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $weekday = date("l");
        $weekday = strtolower($weekday);
        switch($weekday) {
            case 'monday':
                $weekday = 'Thứ hai';
                break;
            case 'tuesday':
                $weekday = 'Thứ ba';
                break;
            case 'wednesday':
                $weekday = 'Thứ tư';
                break;
            case 'thursday':
                $weekday = 'Thứ năm';
                break;
            case 'friday':
                $weekday = 'Thứ sáu';
                break;
            case 'saturday':
                $weekday = 'Thứ bảy';
                break;
            default:
                $weekday = 'Chủ nhật';
                break;
        }
        return $weekday;
    }
}

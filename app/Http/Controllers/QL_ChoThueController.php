<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\PhongChoThue;
use App\LienHe;
use App\TaiKhoan;
use App\LichSuGiaoDich;
class QL_ChoThueController extends Controller
{
    //
    public function getView()
    {
    	return view('chothuephong');
    }
    public function getViewDangTin()
    {
    	return view('dangtin');
    }
    public function getView_DSPhongMap()
    {
        return view('danhsachphong_map');
    }
    public function postDangTin(Request $r)
    {
    	$p = new PhongChoThue;
    	$max = $p->timmax();
        foreach ($max as $t)
        {
            $max = $t->Ma;
            $max = $max + 1;
        } 
    	$i=0;
        $tam = '';
        //
        // xử lý ảnh
        $dem = $r->dem;
        if($dem != 0)
        {
        	for($n=0;$n<$dem;$n++)
        	{
        		$file = 'file'.$n;
        		$image =  $r->$file;
        		$input['imagename'] = 'IMG_'.$max.'_'.++$i.'.'.$image->getClientOriginalExtension();
        		$destinationPath = public_path('/img/ThuePhong');
        		$image->move($destinationPath, $input['imagename']);
        		$tam =$input['imagename'].';'.$tam;
        	}
            $p->HinhAnh = $tam;
        }
        //
        $user = TaiKhoan::find(Auth::user()->id);
        $tien = $user->Tien;
        $user->Tien = ($tien - $r->tongtien);
        $user->save();
        //
        $lichsu = new LichSuGiaoDich();
        $lichsu->TienGiaoDich =  $r->tongtien;
        $lichsu->LoaiGiaoDich = '1';
        $lichsu->GiaoDich = 'Thực hiện đăng tin mới';
        $lichsu->NguoiThucHien = Auth::user()->id;
        $lichsu->save();
        //
        $date = date('d');
         $datestart = substr($r->ngaybatdau,8);
        if($date == $datestart)
        {
            $date = date('Y-m-d H:i:s');
            $p->NgayBatDau =  $date;
            $tongtien = ($r->tongtien);
            $tongngay = $r->tongngay;
            $p->NgayKetThuc = date("Y-m-d H:i:s", strtotime($date . "+".$tongngay." day"));
            $p->TrangThai = '1';
        }
        else
        {
            $p->NgayBatDau = $r->ngaybatdau;
            $p->NgayKetThuc = $r->ngayketthuc;
            $p->TrangThai = '2';
        }
        //
        $p->TieuDe = $r->tieude;
        $p->LoaiChoThue = $r->loaichothue;
        $p->Phuong = $r->phuong;
        $p->DienTich = $r->dientich;
        if(isset($r->MoTa)){$p->MoTa = $r->mota;}
        $p->Gia = $r->gia;
        $p->Map = $r->map;
        $p->TongTien = $r->tongtien;
        $p->TienCu = '0';
        $p->Loaitin = $r->loaitin;
        $p->NguoiDang = $r->nguoidang;
        $p->DiaChiLienLac = $r->diachill;
        $p->Email = $r->email;
        $p->DiaChi = $r->diachi;
        $p->TenLienHe = $r->tenlienhe;
        $p->DienThoaiLienLac = $r->dienthoai;
        
        $p->save();
        return ('Đăng tin thành công.');
        
    }
    public function postSuaTin(Request $r)
    {
        $p = PhongChoThue::find($r->idtin);
        $i=0;
        $tam = '';
        //
        // xử lý ảnh
        $dem = $r->dem;
        if($dem != 0)
        {
            $s = $p->HinhAnh;
            $m = explode(';', $s);
            for($a=0;$a<(count($m)-1);$a++)
            {
                Storage::delete($m[$a]);
            }
            for($n=0;$n<$dem;$n++)
            {
                $file = 'file'.$n;
                $image =  $r->$file;
                $input['imagename'] = 'IMG_'.$max.'_'.++$i.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/img/ThuePhong');
                $image->move($destinationPath, $input['imagename']);
                $tam =$input['imagename'].';'.$tam;
            }
            $p->HinhAnh = $tam;
        }
        // xử lý giao dịch và lưu vào lịch sử giao dịch
        if(isset($r->tienthaydoi))
        {
            $user = TaiKhoan::find(Auth::user()->id);
            $tien = $user->Tien;
            $user->Tien = ($tien - $r->tienthaydoi);
            $user->save();
            //
            $lichsu = new LichSuGiaoDich();
            $lichsu->TienGiaoDich =  $r->tienthaydoi;
            $lichsu->LoaiGiaoDich = '1';
            $lichsu->GiaoDich = 'Thực hiện thay đổi loại tin';
            $lichsu->NguoiThucHien = Auth::user()->id;
            $lichsu->save();
            //
            $t = $p->TongTien;
            $p->TongTien = ($p->TongTien)+($r->tienthaydoi);
            $p->TienCu = $t;
        }
        if( $r->tam == 1)
        {
            $user = TaiKhoan::find(Auth::user()->id);
            $tien = $user->Tien;
            $user->Tien = ($tien - $r->tongtien);
            $user->save();
            //
            $lichsu = new LichSuGiaoDich();
            $lichsu->TienGiaoDich =  $r->tongtien;
            $lichsu->LoaiGiaoDich = '1';
            $lichsu->GiaoDich = 'Thực hiện gia hạn ngày đăng' ;
            $lichsu->NguoiThucHien = Auth::user()->id;
            $lichsu->save();
            //
            $t = $p->TongTien;
            $p->TongTien = ($r->tongtien)+($p->TongTien);
            $p->TienCu = $t;
        }
        // xử lý ngày nếu ngày đăng cùng ngày hiện tại
        $date = date('d');
        $datestart = substr($r->ngaybatdau,8);
        if($date == $datestart)
        {
            $date = date('Y-m-d H:i:s');
            $gia = $r->giatin;
            $tongtien = $r->tongtien;
            $tongngay = $tongtien/$gia;
            $p->NgayKetThuc = date("Y-m-d H:i:s", strtotime($date . "+".$tongngay." day"));
        }
        else
        {
            if($p->TrangThai == 2)
            {
                $p->NgayBatDau = $r->ngaybatdau;
                $p->NgayKetThuc = $r->ngayketthuc;
            }
            else
            {
                $p->NgayKetThuc = $r->ngayketthuc;
            }
        }
        // lưu vào csdl
        $p->TieuDe = $r->tieude;
        $p->LoaiChoThue = $r->loaichothue;
        $p->Phuong = $r->phuong;
        $p->DienTich = $r->dientich;
        $p->Gia = $r->gia;
        $p->MoTa = $r->mota;
        $p->Map = $r->map;
        $p->Loaitin = $r->loaitin;  
        $p->NguoiDang = $r->nguoidang;
        $p->DiaChi = $r->diachi;
        $p->TenLienHe = $r->tenlienhe;
        $p->DiaChiLienLac = $r->diachill;
        $p->DienThoaiLienLac = $r->dienthoai;
        $p->Email = $r->email;
        $p->save();
        return ('Cập nhật thành công.');
    }
    public function timPhong(Request $r)
    {
    	$dt = $r->dt;
        $gia = $r->gia;
        $phuong = $r->phuong;
        $tp = $r->tp;
        $quan = $r->quan;
        $loaichothue = $r->loaichothue;
        $a = new PhongChoThue();
        $kq =  $a->timphong($quan,$tp,$gia,$dt,$phuong,$loaichothue);
        return view('chothuephong_kqtim')->with('kq',$kq);
    }
    public function getViewTinDaDang()
    {
        if(isset(Auth::user()->id))
        {
            $name = Auth::user()->id;
            $tim = new PhongChoThue();
            $tindadang = $tim->TimTin($name);
            return view('tindadang',['tindadang'=>$tindadang]);
        }
        else
        {
            return redirect()->route('view_trangchu');
        }
    }
    public function getChinhSua($id)
    {
        $tin = PhongChoThue::find($id);
        return view('dangtin')->with('kq',$tin);
    }
    public function kiemtraTien(Request $r)
    {
        $tongtien = $r->tongtien;
        $tien = Auth::user()->Tien;
        if($tongtien <= $tien )
        {
            return 0;
        }
        else
        {
            return 1;
        }
    }
}

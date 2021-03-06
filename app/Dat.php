<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Dat extends Model
{
    //
    protected $table = 'dat';
    public function phuong()
    {
        return $this->belongsTo('App\Phuong','Phuong','id');
    }
    public function khachhang()
    {
        return $this->belongsTo('App\KhachHang','SoHuu','id');
    }
    public function tenQuan($idPhuong)
    {
        $k = DB::select("SELECT TenQuan FROM phuong, quan where quan.id = phuong.ThuocQuan and phuong.id = '$idPhuong'");
        foreach ($k as $key) {
            return $key->TenQuan;
        }
    }
    public function tenThanhPho($idPhuong)
    {
        $k = DB::select("SELECT TenThanhPho FROM phuong, quan, thanhpho where quan.ThuocThanhPho = thanhpho.id and quan.id = phuong.ThuocQuan and phuong.id = '$idPhuong'");
        foreach ($k as $key) {
            return $key->TenThanhPho;
        }
    }
    public function timdat($id)
    {
        $k = DB::select('SELECT *, dat.id as iddat, thanhpho.id as idtp, quan.id as idquan FROM dat,khachhang,phuong,quan,thanhpho WHERE KyHieuLoDat LIKE "%'.$id.'%" and dat.SoHuu = khachhang.id and dat.Phuong = phuong.id and phuong.ThuocQuan = quan.id and quan.ThuocThanhPho = thanhpho.id ORDER BY dat.id');
        $string = '
        <thead>
        <tr>
        <th>STT</th>
         <th>Ký hiệu lô đất</th>
         <th>Đơn giá đất</th>
         <th>Tổng giá trị lô đất</th>
         <th>Vị trí</th>
         <th>Trạng thái</th>
         <th></th>
        </tr>
        </thead>
        <tbody>';
        $i=0;
        foreach($k as $dat)
        {
            $string.= '<tr>';
            $string.=  '<td>'.++$i.'</td>';
            $string.=  '<td>'.$dat->KyHieuLoDat.'</td>';
            $string.=  '<td>'.number_format($dat->DonGia).' VN
            /m2</td>';
            $string.=  '<td>'.number_format($dat->Gia).' VND</td>';
            $string.=  '<td>'.$dat->DiaChi.','.$dat->TenQuan.','.$dat->TenThanhPho.'</td>';
            if($dat->TrangThai == 0)
            {
                 $string.=  '<td> Hiện có </td>';
            }
            if($dat->TrangThai == 1)
            {
                 $string.=  '<td> Đang giao dịch </td>';
            }
            if($dat->TrangThai == 2)
            {
                 $string.=  '<td> Đã bán </td>';
            }
            $string.=  '<td></td>';
            $string.=  '<td>';
            $string.= '<button class="btn btn-success btn-xs"';
            $string.= 'data-mald="'.$dat->KyHieuLoDat.'"';
            $string.= 'data-dongia="'.number_format($dat->DonGia).'"';
            $string.= 'data-gia="'.number_format($dat->Gia).'"';
            $string.= 'data-dientich="'.$dat->DienTich.'"';
            $string.= 'data-rong="'.$dat->Rong.'"';
            $string.= 'data-dai="'.$dat->Dai.'"';
            $string.= 'data-nohau="'.$dat->NoHau.'"';
            $string.= 'data-huong="'.$dat->Huong.'"';
            $string.= 'data-sohuu="'.$dat->HoVaTenDem.' '.$dat->Ten.'"';
            $string.= 'data-hinh="'.$dat->HinhAnh.'"';
            $string.= 'data-map="'.$dat->Map.'"';
            $string.= 'data-trangthai="'.$dat->TrangThai.'"';
            $string.= 'data-ghichu="'.$dat->GhiChu.'"';
            $string.= 'data-luotxem="'.$dat->LuotXem.'"';
            $string.= 'data-vitri="'.$dat->DiaChi.','.$dat->TenPhuong.','.$dat->TenQuan.','.$dat->TenThanhPho.'"';
            $string.= 'data-ngaytao="'
            .date_format(date_create($dat->created_at),"d/m/Y H:i:s").'"';
            $string.= 'data-ngaycapnhat="'
            .date_format(date_create($dat->updated_at),"d/m/Y H:i:s").'"';
            $string.= 'data-toggle="modal" data-target="#chitiet"><i class="fas fa-info"></i></button>
            ';
            $string.= '<button class="btn btn-primary btn-xs"';
            $string.= 'data-iddat="'.$dat->iddat.'"';
            $string.= 'data-map="'.$dat->Map.'"';
            $string.= 'data-mald="'.$dat->KyHieuLoDat.'"';
            $string.= 'data-dongia="'.$dat->DonGia.'"';
            $string.= 'data-gia="'.$dat->Gia.'"';
            $string.= 'data-dientich="'.$dat->DienTich.'"';
            $string.= 'data-rong="'.$dat->Rong.'"';
            $string.= 'data-dai="'.$dat->Dai.'"';
            $string.= 'data-nohau="'.$dat->NoHau.'"';
            $string.= 'data-huong="'.$dat->Huong.'"';
            $string.= 'data-sohuu="'.$dat->SoHuu.'"';
            $string.= 'data-hinh="'.$dat->HinhAnh.'"';
            $string.= 'data-trangthai="'.$dat->TrangThai.'"';
            $string.= 'data-ghichu="'.$dat->GhiChu.'"';
            $string.= 'data-luotxem="'.$dat->LuotXem.'"';
            $string.= 'data-diachi="'.$dat->DiaChi.'"';
            $string.= 'data-quan="'.$dat->idquan.'"';
            $string.= 'data-phuong="'.$dat->Phuong.'"';
            $string.= 'data-thanhpho="'.$dat->idtp.'"';
            $string.= 'data-ngaytao="'
            .date_format(date_create($dat->created_at),"d/m/Y H:i:s").'"';
            $string.= 'data-ngaycapnhat="'
            .date_format(date_create($dat->updated_at),"d/m/Y H:i:s").'"';
            $string.= 'data-toggle="modal" data-target="#sua"><i class="fas fa-edit"></i></button>
            ';
            $string.= '<button class="btn btn-danger btn-xs classXoa" id="'.$dat->iddat.'" onClick="reply_click(this.id)"><i class="fas fa-trash"></i></button>
            </td>
            </tr>
            </tbody>';
        }
        return $string;
    }
    public function timdat_ban($quan,$tp,$gia,$dt,$huong)
    {
        //
        switch ($huong) {
            case 'Đ':
                $huong = 'Đông';
                break;
            case 'T':
                $huong = 'Tây';
                break;
            case 'N':
                $huong = 'Nam';
                break;
            case 'B':
                $huong = 'Bắc';
                break;
            case 'ĐN':
                $huong = 'Đông-Nam';
                break;
            case 'ĐB':
                $huong = 'Đông-Bắc';
                break;
            case 'TN':
                $huong = 'Tây-Nam';
                break;
            case 'TB':
                $huong = 'Tây-Bắc';
                break;
            default:
                $huong = '';
                break;
        }
        switch ($dt) {
            case '1':
                $dt = 'DienTich<50';
                break;
            case '2':
                $dt = 'DienTich>=50 and DienTich<=100';
                break;
            case '3':
                $dt = 'DienTich>100 and DienTich<=150';
                break;
            case '4':
                $dt = 'DienTich>150 and DienTich<=200';
                break;
            default:
                $dt = 'DienTich>0';
                break;
        }
        switch ($gia) {
            case '1':
                $gia = 'Gia<800000000';
                break;
            case '2':
                $gia = 'Gia>=800000000 and Gia<=1500000000';
                break;
            case '3':
                $gia = 'Gia>=1500000000 and Gia<=2500000000';
                break;
            case '4':
                $gia = 'Gia>=2500000000 and Gia<=4000000000';
                break;
            default:
                $gia = 'Gia>0';
                break;
        }
        if($tp == 0)
        {
            $k = DB::select('select *, dat.id as iddat from Dat,Phuong,ThanhPho,Quan where '.$dt.' and '.$gia.' and Huong like "%'.$huong.'%" and quan.id = phuong.ThuocQuan and dat.Phuong = phuong.id and quan.ThuocThanhPho = ThanhPho.id');
            return $k;
        }
        elseif($quan == 0)
        {
            $k = DB::select('select *, dat.id as iddat from Dat,Phuong,ThanhPho,Quan where '.$dt.' and '.$gia.' and Huong like "%'.$huong.'%" and quan.id = phuong.ThuocQuan and dat.Phuong = phuong.id and quan.ThuocThanhPho = '.$tp);
            return $k;
        }
        else
        {
            $k = DB::select('select *, dat.id as iddat from Dat,Phuong,ThanhPho,Quan where '.$dt.' and '.$gia.' and Huong like "%'.$huong.'%" and quan.id = phuong.ThuocQuan and dat.Phuong = phuong.id and quan.ThuocThanhPho = ThanhPho.id and quan.id = '.$quan);
            return $k;
        }
    }
    public function tangluotxem($id)
    {
        $k  = DB::select('select * from dat where id = '.$id);
        foreach ($k as $m) {
            $a = $m->LuotXem;
            $a++;
            $kq = DB::update('update dat set LuotXem  = '.$a.' where id='.$id);
        }
    }
    public function capnhat_trangthai($id)
    {
        $k  = DB::select('select * from yeucau where id = '.$id);
        foreach ($k as $m) {
            $a = $m->id_dat;
            $kq = DB::update('update dat set TrangThai  = 0 where id='.$a);
        }
        
    }
    public function topdat()
    {
        $k = DB::select("SELECT *, dat.id as iddat FROM dat,khachhang,quan,thanhpho WHERE dat.SoHuu = khachhang.id and dat.Quan = quan.id and quan.ThuocThanhPho = thanhpho.id and TrangThai = '0'
            ORDER BY `dat`.`LuotXem`  DESC LIMIT 5");
        return $k;
    }
    public function locdat($quan,$gia,$trangthai,$thang)
    {
        switch ($gia) {
            case '1':
                $gia = 'Gia<800000000';
                break;
            case '2':
                $gia = 'Gia>=800000000 and Gia<=1500000000';
                break;
            case '3':
                $gia = 'Gia>=1500000000 and Gia<=2500000000';
                break;
            case '4':
                $gia = 'Gia>=2500000000 and Gia<=4000000000';
                break;
            default:
                $gia = 'Gia>0';
                break;
        }
        if($trangthai == 3)
        {
            $trangthai = 'trangthai >= 0';
        }
        else
        {
            $trangthai = 'trangthai = '.$trangthai;
        }
        if($thang == 13)
        {
            $thang =  "MONTH(dat.created_at) > 0";
        }
        else
        {
            $thang = "MONTH(dat.created_at) = ".$thang;
        }
        if($quan == 0)
        {
            $k = DB::select('select *, dat.id as iddat, thanhpho.id as idThanhPho, quan.id as idQuan, dat.Diachi as diaChi from Dat,Phuong,ThanhPho,Quan,KhachHang where '.$gia.' and phuong.id = dat.Phuong and quan.id = phuong.ThuocQuan and quan.ThuocThanhPho = 1 and dat.SoHuu = khachhang.id and '.$trangthai.' and '.$thang);
            return $k;
        }
        else
        {
            $k = DB::select('select *, dat.id as iddat, thanhpho.id as idThanhPho, quan.id as idQuan, dat.Diachi as diaChi from Dat,Phuong,ThanhPho,Quan,KhachHang where '.$gia.' and phuong.id = dat.Phuong and quan.id = phuong.ThuocQuan and dat.SoHuu = khachhang.id and quan.ThuocThanhPho = 1 and '.$trangthai.' and quan.id= '.$quan.' and '.$thang);
            return $k;
        }
    }
    public function kiemtraMap($diaChi) {
        $k = DB::select("SELECT * from dat where Map = '$diaChi'");
        if(empty($k)) {
            return true;
        }
        return false;
    }
    public function batTatChucNang($trangthai) {
        $trangthai = ($trangthai == 'true' ? 0 : 1 ); 
        return DB::update('UPDATE `chucnang` SET `TrangThai` = '.$trangthai.' WHERE `chucnang`.`id` = 0');
    }
    public function getTrangThaiChucNang() {
        $k = DB::select('select TrangThai from chucnang where id=0');
        return $k[0]->TrangThai;
    }
}

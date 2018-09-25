<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Dat extends Model
{
    //
    protected $table = 'dat';
    public function quan()
    {
        return $this->belongsTo('App\Quan','Quan','id');
    }
    public function khachhang()
    {
        return $this->belongsTo('App\KhachHang','SoHuu','id');
    }
    public function timdat($id)
    {
        $k = DB::select('SELECT *, dat.id as iddat FROM dat,khachhang,quan,thanhpho WHERE KyHieuLoDat LIKE "%'.$id.'%" and dat.SoHuu = khachhang.id and dat.Quan = quan.id and dat.ThanhPho = thanhpho.id ORDER BY dat.id');
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
            $string.= 'data-mucdich="'.number_format($dat->Gia).'"';
            $string.= 'data-dientich="'.$dat->DienTich.'"';
            $string.= 'data-rong="'.$dat->Rong.'"';
            $string.= 'data-dai="'.$dat->Dai.'"';
            $string.= 'data-nohau="'.$dat->NoHau.'"';
            $string.= 'data-huong="'.$dat->Huong.'"';
            $string.= 'data-sohuu="'.$dat->HoVaTenDem.' '.$dat->Ten.'"';
            $string.= 'data-hinh="'.$dat->HinhAnh.'"';
            $string.= 'data-trangthai="'.$dat->TrangThai.'"';
            $string.= 'data-ghichu="'.$dat->GhiChu.'"';
            $string.= 'data-luotxem="'.$dat->LuotXem.'"';
            $string.= 'data-vitri="'.$dat->DiaChi.','.$dat->TenQuan.','.$dat->TenThanhPho.'"';
            $string.= 'data-ngaytao="'
            .date_format(date_create($dat->created_at),"d/m/Y H:i:s").'"';
            $string.= 'data-ngaycapnhat="'
            .date_format(date_create($dat->updated_at),"d/m/Y H:i:s").'"';
            $string.= 'data-toggle="modal" data-target="#chitiet"><i class="fas fa-info"></i></button>
            ';
            $string.= '<button class="btn btn-primary btn-xs"';
            $string.= 'data-iddat="'.$dat->iddat.'"';
            $string.= 'data-mald="'.$dat->KyHieuLoDat.'"';
            $string.= 'data-dongia="'.$dat->DonGia.'"';
            $string.= 'data-mucdich="'.$dat->Gia.'"';
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
            $string.= 'data-quan="'.$dat->Quan.'"';
            $string.= 'data-thanhpho="'.$dat->ThanhPho.'"';
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
        switch ($huong) {
            case '1':
                $huong = 'Đông';
                break;
            case '2':
                $huong = 'Tây';
                break;
            case '3':
                $huong = 'Nam';
                break;
            case '4':
                $huong = 'Bắc';
                break;
            case '5':
                $huong = 'Đông-Nam';
                break;
            case '6':
                $huong = 'Đông-Bắc';
                break;
            case '7':
                $huong = 'Tây-Nam';
                break;
            case '8':
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
                $dt = 'DienTich>=50 and DienTich<=80';
                break;
            case '3':
                $dt = 'DienTich>80 and DienTich<=120';
                break;
            case '4':
                $dt = 'DienTich>120 and DienTich<=160';
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
            $k = DB::select('select *, dat.id as iddat from Dat,ThanhPho,Quan where '.$dt.' and '.$gia.' and Huong like "%'.$huong.'%" and quan.id = dat.Quan and quan.ThuocThanhPho = ThanhPho.id');
            return $k;
        }
        elseif($quan == 0)
        {
            $k = DB::select('select *, dat.id as iddat from Dat,ThanhPho,Quan where '.$dt.' and '.$gia.' and Huong like "%'.$huong.'%" and quan.id = dat.Quan and quan.ThuocThanhPho = '.$tp);
            return $k;
        }
        else
        {
            $k = DB::select('select *, dat.id as iddat from Dat,ThanhPho,Quan where '.$dt.' and '.$gia.' and Huong like "%'.$huong.'%" and quan.id = dat.Quan and quan.ThuocThanhPho = ThanhPho.id and dat.quan= '.$quan);
            return $k;
        }
        
    }
    public function tangluotxem($id)
    {
        $k  = DB::select('select * from dat where id = '.$id);
        foreach ($k as $m) {
            $a = $m->LuotXem;
        }
        $a++;
        $kq = DB::update('update dat set LuotXem  = '.$a.' where id='.$id);
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

}

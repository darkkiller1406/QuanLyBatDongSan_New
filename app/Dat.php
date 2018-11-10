<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Dat extends Model
{
    //
    protected $table = 'dat';

    public function getDatBySoHuu($id) {
        return DB::table('dat')->where('SoHuu', $id)->get();
    }

    public function phuong()
    {
        return $this->belongsTo('App\Phuong','Phuong','id');
    }

    public function congty()
    {
        return $this->belongsTo('App\CongTy','SoHuu','id');
    }

    public function tenPhuong($idPhuong)
    {
        $k = DB::select("SELECT TenPhuong FROM phuong, dat where phuong.id = dat.Phuong and phuong.id = '$idPhuong'");
        foreach ($k as $key) {
            return $key->TenPhuong;
        }
    }

    public function idQuan($idPhuong)
    {
        $k = DB::select("SELECT quan.id as id FROM phuong, quan where quan.id = phuong.ThuocQuan and phuong.id = '$idPhuong'");
        return $k[0]->id;
    }

    public function idThanhPho($idPhuong)
    {
        $k = DB::select("SELECT thanhpho.id as id FROM phuong, quan, thanhpho where quan.ThuocThanhPho = thanhpho.id and quan.id = phuong.ThuocQuan and phuong.id = '$idPhuong'");
        return $k[0]->id;
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

    public function timdat($id, $congty)
    {
        $k = DB::select('SELECT *, dat.id as iddat, thanhpho.id as idtp, quan.id as idquan FROM dat,phuong,quan,thanhpho WHERE KyHieuLoDat LIKE "%'.$id.'%" and dat.SoHuu = '.$congty.' and dat.Phuong = phuong.id and phuong.ThuocQuan = quan.id and quan.ThuocThanhPho = thanhpho.id ORDER BY dat.id');
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
            $string.=  '<td>'.$dat->DiaChi.'</td>';
            if($dat->TrangThai == 0)
            {
                 $string.=  '<td> Đang đăng tin </td>';
            }
            if($dat->TrangThai == 1)
            {
                 $string.=  '<td> Đang giao dịch </td>';
            }
            if($dat->TrangThai == 2)
            {
                 $string.=  '<td> Đã bán </td>';
            }
            if($dat->TrangThai == 3)
            {
                 $string.=  '<td> Hiện có </td>';
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
            $string.= 'data-hinh="'.$dat->HinhAnh.'"';
            $string.= 'data-map="'.$dat->Map.'"';
            $string.= 'data-trangthai="'.$dat->TrangThai.'"';
            $string.= 'data-ghichu="'.$dat->GhiChu.'"';
            $string.= 'data-luotxem="'.$dat->LuotXem.'"';
            $string.= 'data-vitri="'.$dat->DiaChi.'"';
            $string.= 'data-ngaytao="'
            .date_format(date_create($dat->created_at),"d/m/Y H:i:s").'"';
            $string.= 'data-ngaycapnhat="'
            .date_format(date_create($dat->updated_at),"d/m/Y H:i:s").'"';
            $string.= 'data-toggle="modal" data-target="#chitiet"><i class="fas fa-info"></i></button>
            ';
            $string.= '<a type="button" class="btn btn-info btn-xs" href="sualodat/'.$dat->id.'" ><i class="fas fa-edit"></i></a> ';
            $string.= '<button class="btn btn-danger btn-xs classXoa" id="'.$dat->iddat.'" onClick="reply_click(this.id)"><i class="fas fa-trash"></i></button>
            </td>
            </tr>
            </tbody>';
        }
        return $string;
    }

    public function timdat_ban($quan,$tp,$gia,$dt,$huong,$congty = null)
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
        if (is_null($congty)) {
            $congty = '> 0';
            $from = 'Dat,Phuong,ThanhPho,Quan';
        } else {
            $congty = '= '.$congty.' and congty.id = dat.SoHuu';
            $from = 'Dat,Phuong,ThanhPho,Quan,CongTy';
        }
        if($tp == 0)
        {
            $k = DB::select('select *, dat.id as iddat, dat.DiaChi as diaChiDat from '.$from.' where '.$dt.' and '.$gia.' and Huong like "%'.$huong.'%" and quan.id = phuong.ThuocQuan and dat.Phuong = phuong.id and quan.ThuocThanhPho = ThanhPho.id and dat.SoHuu'.$congty.' and dat.TrangThai = 0');
            return $k;
        }
        elseif($quan == 0)
        {
            $k = DB::select('select *, dat.id as iddat, dat.DiaChi as diaChiDat from '.$from.' where '.$dt.' and '.$gia.' and Huong like "%'.$huong.'%" and quan.id = phuong.ThuocQuan and dat.Phuong = phuong.id and quan.ThuocThanhPho = '.$tp.' and dat.SoHuu'.$congty.' and dat.TrangThai = 0');
            return $k;
        }
        else
        {
            $k = DB::select('select *, dat.id as iddat, dat.DiaChi as diaChiDat from '.$from.' where '.$dt.' and '.$gia.' and Huong like "%'.$huong.'%" and quan.id = phuong.ThuocQuan and dat.Phuong = phuong.id and quan.ThuocThanhPho = ThanhPho.id and quan.id = '.$quan. ' and dat.SoHuu'.$congty.' and dat.TrangThai = 0');
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
        DB::update('update dat set TrangThai  = 1 where id='.$id);
    }

    public function topdat()
    {
        $k = DB::select("SELECT *, dat.id as iddat FROM dat,khachhang,quan,thanhpho WHERE dat.SoHuu = khachhang.id and dat.Quan = quan.id and quan.ThuocThanhPho = thanhpho.id and TrangThai = '0'
            ORDER BY `dat`.`LuotXem`  DESC LIMIT 5");
        return $k;
    }

    public function locdat($quan,$gia,$trangthai,$thang,$congty)
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
        if($trangthai == 4)
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
            $k = DB::select('select *, dat.id as iddat, thanhpho.id as idThanhPho, quan.id as idQuan, dat.Diachi as diaChi, dat.created_at as ngaytao, dat.updated_at as ngaycapnhat from Dat,Phuong,ThanhPho,Quan,CongTy where '.$gia.' and phuong.id = dat.Phuong and quan.id = phuong.ThuocQuan and quan.ThuocThanhPho = 1 and dat.SoHuu = congty.id and '.$trangthai.' and '.$thang.' and dat.SoHuu = '.$congty);
            return $k;
        }
        else
        {
            $k = DB::select('select *, dat.id as iddat, thanhpho.id as idThanhPho, quan.id as idQuan, dat.Diachi as diaChi, dat.created_at as ngaytao, dat.updated_at as ngaycapnhat from Dat,Phuong,ThanhPho,Quan,CongTy where '.$gia.' and phuong.id = dat.Phuong and quan.id = phuong.ThuocQuan and dat.SoHuu = congty.id and quan.ThuocThanhPho = 1 and '.$trangthai.' and quan.id= '.$quan.' and '.$thang.' and dat.SoHuu = '.$congty);
            return $k;
        }
    }

    public function kiemtraMap($map, $diaChi) {
        $k1 = DB::select("SELECT * from dat where Map = '$map'");
        $k2 = DB::select("SELECT * from dat where DiaChi = '$diaChi'");
        if(empty($k1) && empty($k2)) {
            return true;
        }
        return false;
    }

    public function timtindang($id, $congty)
    {
        $k = DB::select('SELECT *, dat.id as iddat, thanhpho.id as idtp, quan.id as idquan, , dat.created_at as ngaytao, dat.updated_at as ngaycapnhat FROM dat,phuong,quan,thanhpho WHERE KyHieuLoDat LIKE "%'.$id.'%" and dat.SoHuu = '.$congty.' and dat.Phuong = phuong.id and phuong.ThuocQuan = quan.id and quan.ThuocThanhPho = thanhpho.id ORDER BY dat.id');
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
                 $string.=  '<td> Đang đăng tin </td>';
            }
            if($dat->TrangThai == 1)
            {
                 $string.=  '<td> Đang giao dịch </td>';
            }
            if($dat->TrangThai == 2)
            {
                 $string.=  '<td> Đã bán </td>';
            }
            if($dat->TrangThai == 3)
            {
                 $string.=  '<td> Hiện có </td>';
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
            $string.= 'data-hinh="'.$dat->HinhAnh.'"';
            $string.= 'data-map="'.$dat->Map.'"';
            $string.= 'data-trangthai="'.$dat->TrangThai.'"';
            $string.= 'data-ghichu="'.$dat->GhiChu.'"';
            $string.= 'data-luotxem="'.$dat->LuotXem.'"';
            $string.= 'data-vitri="'.$dat->DiaChi.','.$dat->TenPhuong.','.$dat->TenQuan.','.$dat->TenThanhPho.'"';
            $string.= 'data-ngaytao="'
            .date_format(date_create($dat->ngaytao),"d/m/Y H:i:s").'"';
            $string.= 'data-ngaycapnhat="'
            .date_format(date_create($dat->ngaycapnhat),"d/m/Y H:i:s").'"';
            $string.= 'data-toggle="modal" data-target="#chitiet"><i class="fas fa-info"></i></button>
            ';
            if($dat->TrangThai == 0) {
                $string.= '<button class="btn btn-danger btn-xs classXoa" id="'.$dat->iddat.'" onClick="reply_click(this.id)"><i class="fas fa-trash"></i></button>';
            }
            $string .='
            </td>
            </tr>
            </tbody>';
        }
        return $string;
    }
}

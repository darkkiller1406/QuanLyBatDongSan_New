<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    //
    protected $table = 'khachhang';
    public function timmax()
    {
        $k = DB::select('select MAX(id) as Ma from KhachHang');
        return $k;
    }
    public function timkh($id)
    {
        $k = DB::select('SELECT *,khachhang.id as idkh, khachhang.DiaChi as dckh FROM khachhang WHERE khachhang.Ten like "%'.$id.'%" ORDER BY khachhang.id');
        $string = '
        <thead>
        <tr>
        <th>STT</th>
        <th>Mã khách hàng</th>
        <th>Họ và tên đệm</th>
        <th>Tên khách hàng</th>
        <th>ĐTDD</th>
        <th>Email</th>
        <th></th>
        </tr>
        </thead>
        <tbody>';
        $i=0;

        foreach($k as $kh)
        {
            $a = new KhachHang;
            $string.= '<tr>';
            $string.=  '<td>'.++$i.'</td>';
            $string.=  '<td>'.$kh->MaKhachHang.'</td>';
            $string.=  '<td>'.$kh->HoVaTenDem.'</td>';
            $string.=  '<td>'.$kh->Ten.'</td>';
            $string.=  '<td>'.$kh->DTDD.'</td>';
            $string.=  '<td>'.$kh->Email.'</td>';;
            $string.=  '<td></td>';
            $string.=  '<td>';
            $string.= '<button class="btn btn-success btn-xs"';
            $string.= 'data-makh="'.$kh->MaKhachHang.'"';
            $string.= 'data-hokh="'.$kh->HoVaTenDem.'"';
            $string.= 'data-tenkh="'.$kh->Ten.'"';
            $string.= 'data-cmnd="'.$kh->CMND.'"';
            $string.= 'data-xungho="'.$kh->XungHo.'"';
            $string.= 'data-diachi="'.$kh->dckh.'"';
            $string.= 'data-email="'.$kh->Email.'"';
            $string.= 'data-dtdd="'.$kh->DTDD.'"';
            $string.= 'data-dtcd="'.$kh->DTCD.'"';
            $string.= 'data-ngaytao="'
            .date_format(date_create($kh->created_at),"d/m/Y H:i:s").'"';
            $string.= 'data-ngaycapnhat="'
            .date_format(date_create($kh->updated_at),"d/m/Y H:i:s").'"';
            $string.= 'data-toggle="modal" data-target="#chitiet"><i class="fas fa-info"></i></button>
            ';
            $string.= '<button class="btn btn-primary btn-xs"';
            $string.= 'data-idkh="'.$kh->id.'"';
            $string.= 'data-makh="'.$kh->MaKhachHang.'"';
            $string.= 'data-hokh="'.$kh->HoVaTenDem.'"';
            $string.= 'data-tenkh="'.$kh->Ten.'"';
            $string.= 'data-cmnd="'.$kh->CMND.'"';
            $string.= 'data-xungho="'.$kh->XungHo.'"';
            $string.= 'data-diachi="'.$kh->dckh.'"';
            $string.= 'data-email="'.$kh->Email.'"';
            $string.= 'data-dtdd="'.$kh->DTDD.'"';
            $string.= 'data-dtcd="'.$kh->DTCD.'"';
            $string.= 'data-ngaytao="'
            .date_format(date_create($kh->created_at),"d/m/Y H:i:s").'"';
            $string.= 'data-ngaycapnhat="'
            .date_format(date_create($kh->updated_at),"d/m/Y H:i:s").'"';
            $string.= 'data-toggle="modal" data-target="#suanv"><i class="fas fa-edit"></i></button>
            ';
            $string.= '<button class="btn btn-danger btn-xs classXoa" idbd="'.$kh->idkh.'" id="'.$kh->idkh.'" onClick="reply_click(this.id)"><i class="fas fa-trash"></i></button>
            </td>
            </tr>
            </tbody>';
        }
        return $string;
    }
}

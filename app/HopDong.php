<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class HopDong extends Model
{
    //
    protected $table = 'hopdong';
    public function dat()
    {
        return $this->belongsTo('App\Dat','ID_Dat','id');
    }
    public function khachhang()
    {
        return $this->belongsTo('App\KhachHang','ID_KhachHang_Mua','id');
    }
    public function layNam($id)
    {
        $k = DB::select('select created_at from hopdong where id='.$id);
        foreach ($k as $t) {
            $tg = $t->created_at;
        }
        $kq = DB::select('SELECT DATEDIFF(NOW(),"'.$tg.'") as tam');
        foreach ($kq as $y) {
            $date = $y->tam;
        }
        if($date > 730)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    public function timhd($id, $congty)
    {
        $k = DB::select('SELECT *,hopdong.id as idhd, hopdong.created_at as ngaytao FROM hopdong,khachhang,dat WHERE hopdong.MaHopDong LIKE "%'.$id.'%" and hopdong.ID_KhachHang_Mua = khachhang.id and hopdong.ID_Dat = dat.id and dat.SoHuu = '.$congty.' ORDER BY hopdong.id');
        $khachhang = DB::select('select * from khachhang');
        $string = '
        <thead>
        <tr>
         <th>STT</th>
         <th>Mã hợp đồng</th>
         <th>Lô đất</th>
         <th>Tên khách hàng mua</th>
         <th>Ngày lập</th>
         <th>File hợp đồng</th>
         <th></th>
        </tr>
        </thead>
        <tbody>';
        $i=0;
        foreach($k as $hd)
        {
            $string.= '<tr>';
            $string.=  '<td>'.++$i.'</td>';
            $string.=  '<td>'.$hd->MaHopDong.'</td>';
            $string.=  '<td>'.$hd->KyHieuLoDat.'</td>';
            $string.=  '<td>'.$hd->HoVaTenDem.' '.$hd->Ten.'</td>';
            $date=date_create($hd->ngaytao);
            $string.=  '<td>'.date_format($date,"d/m/Y H:i:s").'</td>';
            $string.=  '<td>'.$hd->FileHopDong.'</td>';
            $string.= '<td><button class="btn btn-danger btn-xs classXoa" id="'.$hd->idhd.'" onClick="reply_click(this.id)"><i class="fas fa-trash"></i></button>
            </td>
            </tr>
            </tbody>';
            }
            return $string;
        }
}

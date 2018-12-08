<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
    public function user()
    {
        return $this->belongsTo('App\TaiKhoan','NguoiLap','id');
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
        $k = DB::select('SELECT *,hopdong.id as idhd, hopdong.created_at as ngaytao, hopdong.Gia as gia, khachhang.Ten as ten FROM hopdong,khachhang,dat,users WHERE hopdong.MaHopDong LIKE "%'.$id.'%" and hopdong.ID_KhachHang_Mua = khachhang.id and hopdong.ID_Dat = dat.id and dat.SoHuu = '.$congty.' and hopdong.NguoiLap = users.id ORDER BY hopdong.id');
        $khachhang = DB::select('select * from khachhang');
        $string = '
        <thead>
        <tr>
        <th>STT</th>
        <th>Mã hợp đồng</th>
        <th>Lô đất</th>
        <th>Tên khách hàng mua</th>
        <th>Giá bán</th>
        <th>Tiền cọc</th>
        <th>Tiền còn lại</th>
        <th>Trạng thái</th>
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
            $string.=  '<td>'.$hd->HoVaTenDem.' '.$hd->ten.'</td>';
            $string.=  '<td>'.number_format($hd->gia).' VNĐ</td>';
            $string.=  '<td>'.number_format($hd->TienDatCoc).' VNĐ</td>';
            $string.=  '<td>'.number_format(($hd->Gia)-($hd->TienDatCoc)).' VNĐ</td>';
            if ($hd->TrangThai == 1) {
                $string.=  '<td>Đang xử lý</td>';
            } else {
                $string.=  '<td>Đã hoàn thành</td>';
            }
            if($hd->NguoiLap == Auth::user()->id || Auth::user()->Quyen == 1) {
                $string.=  '<td><a href="../'.$hd->FileHopDong.'">HopDong_'.$hd->MaHopDong.'.docx - Download</a></td>';
                $string.= '<td><button class="btn btn-success btn-xs" 
                            data-mahopdong="'.$hd->MaHopDong.'"
                            data-kihieulodat="'.$hd->KyHieuLoDat.'"
                            data-tenkh="'.$hd->HoVaTenDem.' '.$hd->ten.'"
                            data-giaban="'.number_format($hd->gia).'"
                            data-tiendatcoc="'.number_format($hd->TienDatCoc).'"
                            data-tienconlai="'.number_format(($hd->gia)-($hd->TienDatCoc)).'"
                            data-phuongthucthanhtoan="'.$hd->PhuongThucThanhToan.'"
                            data-ngaythanhtoan="'.date_format(date_create($hd->NgayThanhToan),"d/m/Y").'"
                            data-ngaylap="'.date_format(date_create($hd->ngaytao),"d/m/Y").'"
                            data-nguoilap="'.$hd->name.'"
                            data-toggle="modal" data-target="#chitiet"><i class="fas fa-info"></i>
                        </button> ';
                if ($hd->TrangThai == 1) {
                    $string.= '<button class="btn btn-warning btn-xs" data-idhd="'.$hd->idhd.'" data-toggle="modal" data-target="#xacnhan"><i class="fas fa-check-square"></i></button> ';
                    $string.= '<a class="btn btn-primary btn-xs classXoa" href="suahopdong/'.$hd->id.'"><i class="fas fa-edit"></i></a> ';
                }
                if (Auth::user()->Quyen == 1) {
                    $string.= '<button class="btn btn-danger btn-xs classXoa" id="'.$hd->idhd.'" onClick="reply_click(this.id)"><i class="fas fa-trash"></i></button>';
                }
            } else {
                $string.=  '<td>Bạn không đủ quyền để xem file hợp đồng</td>';
            }
            $string.= '</td>
            </tr>
            </tbody>';
            }
            return $string;
        }
}

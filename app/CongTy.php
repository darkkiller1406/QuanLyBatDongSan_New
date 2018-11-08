<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\TaiKhoan;
class CongTy extends Model
{
    //
    protected $table = 'congty';

    public function getIdByCreatedAt($time) 
    {
    	return DB::table('congty')->where('created_at', $time)->value('id');
    }

    public function getCongTy()
    {
       $congty = CongTy::where('congty.id', '>', 0)
            ->leftJoin('users', 'congty.id', '=', 'users.ThuocCongTy')
            ->select(DB::raw('*, congty.id as idCongTy'))
            ->where('users.Quyen', '=', 1)
            ->where('users.LoaiTaiKhoan', '<', 4)
            ->get();
        return $congty;
    }

    public function timCongTy($name)
    {
        $k = DB::select('select *,congty.id as idCongTy from congty, users where TenCongTy like "%'.$name.'%" and users.ThuocCongTy = congty.id and users.Quyen = 1 ');
        $string='<thead>
        <tr>
        <th>STT</th>
        <th>Tên công ty</th>
        <th>Link</th>
        <th>SDT</th>
        <th>Email</th>
        <th>Trạng thái</th>
        <th>Ngày hết hạn</th>
        <th></th>
        </tr>
        </thead>
        <tbody>';
        $i=0;
        foreach($k as $ct) {
          $string.= '<tr>';
          $string.=  '<td>'.++$i.'</td>';
          $string.=  '<td>'.$ct->TenCongTy.'</td>';
          $string.=  '<td>'.$ct->Link.'</td>';
          $string.=  '<td>'.$ct->SDT.'</td>';
          $string.=  '<td>'.$ct->Email.'</td>';
          if ($ct->LoaiTaiKhoan == 1) $trangthai = 'Người dùng cơ bản';
          if ($ct->LoaiTaiKhoan == 2)  $trangthai = 'Người dùng nâng cao' ;
          if ($ct->LoaiTaiKhoan == 3)  $trangthai = 'Đã ngừng sử dụng' ;
          $string.=  '<td>'.$trangthai.'</td>';
          $string.=  '<td>'.$ct->NgayHetHan.'</td>';
          $string.=  '<td></td>';
          $string.=  '<td>';
          $string.= '<button class="btn btn-warning btn-xs classReset" id="'.$ct->idCongTy.'" onClick="reset_click(this.id)" data-toggle="tooltip" data-placement="top" title="Reset password"><i class="fas fa-redo"></i></button>
          ';
          if ($ct->LoaiTaiKhoan != 3) {
                $string.= '<button class="btn btn-danger btn-xs classXoa" id="'.$ct->idCongTy.'" onClick="huykichhoat(this.id)" data-toggle="tooltip" data-placement="top" title="Hủy kích hoạt"><i class="fas fa-ban"></i></button>';
          }
          $string .= '
          </td>
          </tr>
          </tbody>';
        }
        return $string;
    }
}

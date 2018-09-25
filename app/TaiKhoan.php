<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class TaiKhoan extends Model
{
    //
	protected $table = 'users';
	public function timtk($name)
	{
		$k = DB::select('select *,users.id as idtk,users.created_at as cr, users.updated_at as up from users where name like "%'.$name.'%"');
		$string='<thead>
    <tr>
    <th>STT</th>
    <th>ID tài khoản</th>
    <th>Email</th>
    <th>Ngày tạo</th>
    <th>Ngày cập nhật</th>
    <th></th>
    </tr>
    </thead>
    <tbody>';
    $i=0;
    foreach($k as $tk)
    {
      $string.= '<tr>';
      $string.=  '<td>'.++$i.'</td>';
      $string.=  '<td>'.$tk->name.'</td>';
      $string.=  '<td>'.$tk->email.'</td>';
      $string.=  '<td>'.$tk->cr.'</td>';
      $string.=  '<td>'.$tk->up.'</td>';
      $string.=  '<td></td>';
      $string.=  '<td>';
      $string.= '<button class="btn btn-warning btn-xs classReset" idrs="{{$tk->id}}" id="'.$tk->idtk.'" onClick="reset_click(this.id)"><i class="fas fa-redo"></i></button>
      ';
      $string.= '<button class="btn btn-danger btn-xs classXoa" idbd="'.$tk->idtk.'" id="'.$tk->idtk.'" onClick="reply_click(this.id)"><i class="fas fa-trash"></i></button>
      </td>
      </tr>
      </tbody>';
    }
    return $string;
  }
  public function updateMK($id,$mk,$mkmoi)
  {
    $kq = DB::select("select * from users where  id='".$id."'");
    foreach($kq as $check){
      if(Auth::attempt(['name'=>$check->name,'password'=>$mk])){
        $tam = DB::update("UPDATE `users` SET `password`='".$mkmoi."' WHERE id = '".$check->id."'");
        return '1';
      }
      else{
        return '0';
      }
    }
  }
    public function demsobai($id)
    {
      $kq = DB::select("SELECT count(id) as dem from phongthue where NguoiDang = ".$id);
      foreach ($kq as $key) {
        $a = $key->dem;
        return $a;
      }
    }
    public function updateTien($id,$mk,$tien)
    {
      $kq = DB::select("select * from users where  id='".$id."'");
      foreach($kq as $check){
        if(Auth::attempt(['name'=>$check->name,'password'=>$mk]))
          {
            $tien = ($check->Tien)+$tien;
            $tam = DB::update("UPDATE `users` SET `tien`='".$tien."' WHERE id = '".$check->id."'");
            return '1';
          }
          else
          {
            return '0';
          }
        }
      }
    }

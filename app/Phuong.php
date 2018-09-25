<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Phuong extends Model
{
    //
    protected $table = 'phuong';
    public function quan()
    {
        return $this->belongsTo('App\Quan','ThuocQuan','id');
    }
    public function timphuong($id)
    {
    	$k = DB::select('select * from phuong where ThuocQuan = '.$id);
    	$string = '<option value="0">Chọn Phường</option>';
    	foreach ($k as $q) 
    	{
    		$string .= '<option value="'.$q->id.'">'.$q->TenPhuong.'</option>';
    	}
    	return $string;
    }
}

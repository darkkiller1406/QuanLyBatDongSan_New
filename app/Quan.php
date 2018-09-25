<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Quan extends Model
{
    //
    protected $table = 'Quan';
    public function timquan($id)
    {
    	$k = DB::select('select * from quan where ThuocThanhPho = '.$id);
    	$string = '<option value="0">Chọn Quận/Huyện</option>';
    	foreach ($k as $q) 
    	{
    		$string .= '<option value="'.$q->id.'">'.$q->TenQuan.'</option>';
    	}
    	return $string;
    }
}

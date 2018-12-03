<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Quan extends Model
{
    //
    protected $table = 'quan';
    public function timquan($id)
    {
        if($id != 0) {
            $k = DB::select('select * from quan where ThuocThanhPho = '.$id);
            $string = '<select class="form-control" name="quan" id="quan"> 
            <option value="0">Tất cả quận</option>';
            foreach ($k as $q) 
            {
                $string .= '<option value="'.$q->id.'">'.$q->TenQuan.'</option>';
            }
            $string .= '</select>';
        } else {
            $string = '<select class="form-control" name="quan" id="quan"> 
            <option value="0">Tất cả quận</option>
            </select>';
        }
    	
    	return $string;
    }
}

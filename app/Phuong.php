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
        if($id != 0)
        {
            $k = DB::select('select * from phuong where ThuocQuan = '.$id);
            $string = '<select class="form-control" name="phuong" id="phuong"> 
            <option value="0">Tất cả phường</option>';
            foreach ($k as $q) 
            {
                $string .= '<option value="'.$q->id.'">'.$q->TenPhuong.'</option>';
            }
            $string .= '</select>';
        }
    	else
        {
            $string = '<select class="form-control" name="phuong" id="phuong"> 
            <option value="0">Tất cả phường</option>
            </select>';
        }
        return $string;
    }
}
                                    
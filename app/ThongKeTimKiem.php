<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ThongKeTimKiem extends Model
{
    //
    protected $table = 'thongketimkiem';
    public function nameQuan()
    {
        return $this->belongsTo('App\Quan','Quan','id');
    }
    public function deleteAfterOneYear()
    {
    	$dataSearchs = DB::select("SELECT * FROM `thongketimkiem`");
    	foreach ($dataSearchs as $dataSearch ) {
    		$dataTime = strtotime($dataSearch->updated_at);
    		$now = strtotime(date("Y-m-d H:i:s"));
    		if(($now - $dataTime) > 31536000)
    		{
    			DB::delete("DELETE FROM `thongketimkiem` WHERE id = ".$dataSearch->id);
    		}
    	}
    }
    public function gettimkiem($thang, $nam) 
    {
        if(isset($thang)&&isset($nam)){
            if($thang == 13)
            {
                $thang =  "MONTH(thongketimkiem.created_at) > 0";
            }
            else
            {
                $thang = "MONTH(thongketimkiem.created_at) = ".$thang;
            }
            return DB::select("SELECT *,thongketimkiem.created_at as ngaylap  FROM thongketimkiem, quan WHERE $thang and  YEAR(thongketimkiem.created_at) = '$nam' and thongketimkiem.Quan = Quan.id  ORDER BY thongketimkiem.id DESC");
        }
        return DB::select("SELECT *,thongketimkiem.created_at as ngaylap  FROM thongketimkiem, quan WHERE MONTH(thongketimkiem.created_at) = MONTH(now()) and  YEAR(thongketimkiem.created_at) = YEAR(now()) and thongketimkiem.Quan = Quan.id  ORDER BY thongketimkiem.id DESC");
    }
}

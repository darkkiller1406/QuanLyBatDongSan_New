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
}

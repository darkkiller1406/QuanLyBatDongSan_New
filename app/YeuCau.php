<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class YeuCau extends Model
{
    //
    protected $table = 'YeuCau';
    public function timmax()
    {
    	$k = DB::select('select MAX(id) as Ma from YeuCau');
    	return $k;
    }
    public function dat()
    {
        return $this->belongsTo('App\Dat','id_dat','id');
    }
    public function getYeuCau($tg)
    {
        if(isset($tg)){
            return DB::select("SELECT *,yeucau.created_at as created_at  FROM yeucau,dat WHERE yeucau.created_at like '%".$tg."%' and yeucau.id_dat = dat.id");
        }
    }
}


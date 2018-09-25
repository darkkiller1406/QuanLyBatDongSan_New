<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class LichSuGiaoDich extends Model
{
    //
    protected $table = 'lichsugiaodich';
    public function nguoithuchien()
    {
        return $this->belongsTo('App\TaiKhoan','NguoiThucHien','id');
    }
    public function getLichSuGiaoDich($id)
    {
    	return DB::select("SELECT * FROM lichsugiaodich WHERE lichsugiaodich.NguoiThucHien = ".$id." ORDER BY id DESC" );
    }
}

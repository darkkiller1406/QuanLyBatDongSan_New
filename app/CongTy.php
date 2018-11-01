<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CongTy extends Model
{
    //
    protected $table = 'congty';

    public function getIdByCreatedAt($time) {
    	return DB::table('congty')->where('created_at', $time)->value('id');
    }
}

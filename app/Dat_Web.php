<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dat_Web extends Model
{
    //
    protected $table = 'dat_web';

    public function checkLink($newLink) 
    {
    	$query = DB::select("SELECT link from Dat_Web");
    	foreach ($query as $oldlink) {  
    		if($newLink == $oldlink->link) {		
                return 0;
    		}
    	}
    	return 1;
    }
    public function findIdByLink($link)
    {
        $query = DB::select("SELECT id from Dat_Web where link = '$link'");
        return $query[0]->id;
    }
    public function deleteAfer()
    {
    	$query = DB::delete("DELETE FROM `dat_web` WHERE DATEDIFF(NOW(), updated_at) > 3 and TrangThai = 0 ");
        $query = DB::delete("DELETE FROM `dat_web` WHERE DATEDIFF(NOW(), updated_at) > 100 and TrangThai = 2 ");
    }
}

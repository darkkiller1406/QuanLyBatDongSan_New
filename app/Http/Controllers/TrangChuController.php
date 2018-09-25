<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrangChu;
class TrangChuConTroller extends Controller
{
    //
    public function getIndex()
    {
    	$thongkeindex = new TrangChu();
    	return view('page/index');
    }
    public function getView_Ban()
    {
        return view('trangchu');
    }
    public function getView_vechungtoi()
    {
        return view('vechungtoi');
    }
    public function getView_lienlac()
    {
        return view('lienlac');
    }
    
}

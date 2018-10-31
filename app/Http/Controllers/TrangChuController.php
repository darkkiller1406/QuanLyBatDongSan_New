<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrangChu;
use App\Dat;
class TrangChuConTroller extends Controller
{
    //
    public function getIndex()
    {
    	$thongkeindex = new TrangChu();
        $thongke = $thongkeindex->thongketrangchu();
        $dat = new Dat();
        $trangthaichucnang = $dat->getTrangThaiChucNang();
    	return view('page/index', ['thongke' => $thongke, 'trangthaichucnang' => $trangthaichucnang ]);
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

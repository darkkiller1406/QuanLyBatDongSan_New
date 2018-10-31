<?php

namespace App\Http\Controllers;
use App\Dat;
use App\Dat_Web;
use App\PhongChoThue;
use Illuminate\Http\Request;
Use App\Http\Controllers\QL_DatController;
class ChiTietController extends Controller
{
    //
    public function getView($id)
    {
        $chitiet = Dat::find($id);
        $t = new Dat();
        $t->tangluotxem($id);
    	return view('chitiet',['chitiet'=>$chitiet]);
    }
    public function getViewRoom($id)
    {
        $chitiet = PhongChoThue::find($id);
        $t = new PhongChoThue();
        $top5 = $t->phongnoibat($id);
    	return view('chitiet_phong',['chitiet'=>$chitiet,'top'=>$top5]);
    }
    public function getViewFromOtherWeb($link, Request $request) {
        $dat_web = new Dat_Web();
        $id = $dat_web->findIdByLink($link);
        $data = Dat_Web::find($id);
        return view('chitiet_web', ['chitiet'=>$data]);
    }
}

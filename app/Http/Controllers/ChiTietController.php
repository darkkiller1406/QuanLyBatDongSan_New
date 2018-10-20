<?php

namespace App\Http\Controllers;
use App\Dat;
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
        $top5 = $t->topdat();
    	return view('chitiet',['chitiet'=>$chitiet,'top'=>$top5]);
    }
    public function getViewRoom($id)
    {
        $chitiet = PhongChoThue::find($id);
        $t = new PhongChoThue();
        $top5 = $t->phongnoibat($id);
    	return view('chitiet_phong',['chitiet'=>$chitiet,'top'=>$top5]);
    }
    public function getViewFromOtherWeb($link, Request $request) {
        $results = $request->session()->get('datFromOtherPage');
        foreach ($results as $result) {
            if ($result[0] === $link) {
                return view('chitiet_web',['result'=>$result]);
                break;
            }
        }
    }
}

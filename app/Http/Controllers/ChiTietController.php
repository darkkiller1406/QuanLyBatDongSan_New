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
        $dat = Dat::where('Phuong', $chitiet->Phuong)->take(3)->get();
    	return view('chitiet',['chitiet'=>$chitiet, 'dat'=>$dat]);
    }
}

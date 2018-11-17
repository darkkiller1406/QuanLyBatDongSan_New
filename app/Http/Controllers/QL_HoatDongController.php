<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dat;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
class QL_HoatDongController extends Controller
{
    //
    public function getView()
    {
        if(Auth::user()->Quyen == 1) {
            $activity = Activity::where('ThuocCongTy', Auth::user()->ThuocCongTy)
                     ->from('users')
                     ->join('activity_log', 'causer_id', '=', 'users.id')
                     ->orderByRaw('activity_log.created_at DESC')
                     ->where('activity_log.created_at', 'like', '%'.date('Y-m-d').'%')
                     ->paginate(15);
            return view('page.quanlyhoatdong', ['hoatdong' => $activity]);
        }
        return back();
    }
    public function timHDU(Request $r)
    {
        if(Auth::user()->Quyen == 1) {
            $activity = Activity::where('ThuocCongTy', Auth::user()->ThuocCongTy)
                     ->from('users')
                     ->join('activity_log', 'causer_id', '=', 'users.id')
                     ->orderByRaw('activity_log.created_at DESC')
                     ->where('activity_log.created_at', 'like', '%'.$r->ngay.'%')
                     ->paginate(15);
            return view('page.quanlyhoatdong', ['hoatdong' => $activity, 'ngay' => $r->ngay]);
        }
        return back();
    }
}

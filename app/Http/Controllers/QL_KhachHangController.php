<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\KhachHang;
use App\HopDong;
use Spatie\Activitylog\Models\Activity;
class QL_KhachHangController extends Controller
{
    //
    public function getView()
    {
        $khachhang = new KhachHang();
        $khachhang = KhachHang::where('ThuocCongTy', Auth::user()->ThuocCongTy)->paginate(15);
        return view('page.quanlykhachhang', ['khachhang' => $khachhang]);
    }
    public function postThemKhachHang(Request $request)
    {
        if(isset($request->dtcd)) {
            $this->validate($request,[
                'email'=>'required|email',
                'dtdd'=> 'required|digits_between:9,11',
                'dtcd'=> 'required|digits_between:9,11',
                'cmnd'=> 'required|digits:9',
                'noicap' => 'required',
                'ngaysinh' => 'required',
                'ngaycap' => 'required',
                'diachi' => 'required',
                'hokh' => 'required',
                'tenkh' => 'required'
            ],[
                'email.required'=> 'Bạn chưa nhập email',
                'email.email'=> 'Bạn chưa nhập đúng định dạng email',
                'cmnd.required' => 'Vui lòng nhập CMND',
                'dtdd.digits_between'=>'Vui lòng nhập đúng dạng SĐT ',
                'dtcd.digits_between'=>'Vui lòng nhập đúng dạng SĐT ',
                'cmnd.digits'=>'Vui lòng nhập đúng dạng CMND'
            ]);
        } else {
             $this->validate($request,[
                'email'=>'required|email',
                'dtdd'=> 'required|digits_between:9,11',
                'cmnd'=> 'required|digits:9'
            ],[
                'email.required'=> 'Bạn chưa nhập email',
                'email.email'=> 'Bạn chưa nhập đúng định dạng email',
                'cmnd.required' => 'Vui lòng nhập CMND',
                'dtdd.digits_between'=>'Vui lòng nhập đúng dạng SĐT ',
                'cmnd.digits'=>'Vui lòng nhập đúng dạng CMND'
            ]);
        }
        
        $kh = new KhachHang;
        $m = new KhachHang;
        $max = $m->timmax(Auth::user()->ThuocCongTy);
        foreach ($max as $t)
        {
            $makh = $t->Ma;
        }
        if($makh >10)
        {
            $kh->MaKhachHang = 'KH0'.($makh+1);
            $MaKhachHang = 'KH0'.($makh+1);
        }
        else
        {
            $kh->MaKhachHang = 'KH00'.($makh+1);
            $MaKhachHang = 'KH00'.($makh+1);
        }
        // xử lý ảnh
        $kh->HoVaTenDem = $request->hokh;
        $kh->Ten = $request->tenkh;
        $kh->CMND = $request->cmnd;
        $kh->NgaySinh = $request->ngaysinh;
        $kh->NoiCap = $request->noicap;
        $kh->DiaChi = $request->diachi;
        $kh->Email = $request->email;
        $kh->NgayCap = $request->ngaycap;
        $kh->DTDD = $request->dtdd;
        if(isset($request->dtcd)) {
            $kh->DTCD = $request->dtcd;
        }
        $kh->ThuocCongTy = (Auth::user()->ThuocCongTy);
        $kh->save();

        activity()
        ->useLog('1')
        ->performedOn($kh)
        ->causedBy(Auth::user()->id)
        ->log('Thêm khách hàng '.$MaKhachHang);

       return redirect('page/quanlykhachhang')->with('thongbao','Thêm thành công khách hàng mới !');
    }
    public function getXoa($id)
    {
        $kh = KhachHang::find($id);
        $hd = HopDong::where('ID_KhachHang_Mua', $id)->first();
        if(!empty($hd)) {
            return redirect('page/quanlykhachhang')->with('canhbao','Khách hàng đang có hợp đồng, không thể xóa !');
        }
        $MaKhachHang = $kh->MaKhachHang;
        $Ten =$kh->HoVaTenDem.' '.$kh->Ten;
        $kh -> delete();

        activity()
        ->useLog('2')
        ->performedOn($kh)
        ->causedBy(Auth::user()->id)
        ->log('Xóa khách hàng '.$MaKhachHang.' - '.$Ten);

        return redirect('page/quanlykhachhang')->with('thongbao','Bạn đã xóa thành công khách hàng !');
    }
    public function postSuaKhachHang(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'dtdd'=> 'required|digits_between:9,11',
            'dtcd'=> 'required|digits_between:9,11',
            'cmnd'=> 'required|digits:9',
            'noicap' => 'required',
            'ngaysinh' => 'required',
            'ngaycap' => 'required',
            'diachi' => 'required',
            'hokh' => 'required',
            'tenkh' => 'required'
        ],[
            'email.required'=> 'Bạn chưa nhập email',
            'email.email'=> 'Bạn chưa nhập đúng định dạng email',
            'dtdd.digits_between'=>'Vui lòng nhập đúng dạng SĐT ',
            'dtcd.digits_between'=>'Vui lòng nhập đúng dạng SĐT ',
            'cmnd.digits'=>'Vui lòng nhập đúng dạng CMND'
        ]);
        $kh = KhachHang::find($request->id);
        $kh_old = KhachHang::find($request->id);
        $kh->HoVaTenDem = $request->hokh;
        $kh->Ten = $request->tenkh;
        $kh->CMND = $request->cmnd;
        $kh->DiaChi = $request->diachi;
        $kh->NgayCap = $request->ngaycap;
        $kh->NoiCap = $request->noicap;
        $kh->Email = $request->email;
        $kh->NgaySinh = $request->ngaysinh;
        $kh->DTDD = $request->dtdd;
        $kh->DTCD = $request->dtcd;
        $kh->save();

        $kh_new = KhachHang::find($request->id);
        $arrays = array('HoVaTenDem', 'Ten', 'CMND', 'NgayCap', 'DiaChi', 'Email', 'DTDD', 'DTCD', 'NgaySinh', 'NoiCap');

            // check field change
        $change = false;
        $fieldChange = [];
        foreach ($arrays as $array) {
            if ($kh_old->$array != $kh_new->$array) {
                $fieldChange[$array] =  $kh_old->$array.'->'.$kh_new->$array;
                $change = true;
            }
        }

            // log activity
        if($change) {
            activity()
            ->useLog('3')
            ->performedOn($kh)
            ->causedBy(Auth::user()->id)
            ->withProperties($fieldChange)
            ->log('cập nhật thông tin khách hàng '.$kh_new->MaKhachHang);
        }

        return redirect('page/quanlykhachhang')->with('thongbao','Cập nhật thành công thông tin khách hàng !');
    }
    public function getTim(Request $r)
    {
        $kh = new KhachHang;
        echo $kh ->timkh($r->name, Auth::user()->ThuocCongTy);
    }
}

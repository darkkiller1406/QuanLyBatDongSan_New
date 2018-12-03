<?php

namespace App\Http\Controllers;
use App\User;
use App\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\LichSuGiaoDich;
use App\CongTy;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
class QL_TaiKhoanController extends Controller
{
    //
    public function getView()
    {
        if(Auth::user()->Quyen == 1) {
            $taikhoan = TaiKhoan::where('ThuocCongTy', Auth::user()->ThuocCongTy)->paginate(15);
            return view('page.quanlytaikhoan', ['taikhoan' => $taikhoan]);
        }
    	return back();
    }
    public function getXoa($id)
    {
        if(Auth::user()->Quyen == 1) {
           $tk = TaiKhoan::find($id);
           $email = $tk->email;
           $tk -> delete();

           activity()
           ->useLog('2')
           ->performedOn($tk)
           ->causedBy(Auth::user()->id)
           ->log('Xóa tài khoản '.$email);

           return redirect('page/quanlytaikhoan')->with('thongbao','Bạn đã xóa thành công!');
        }
        return back();
    }
    public function postThemTaiKhoan(Request $request)
    {
        if(Auth::user()->Quyen == 1) {
        	$this->validate($request,[
                'name'=> 'required',
                'email'=>'required|email|unique:users,email',
                'password'=> 'required',
                'passwordAgain'=>'required|same:password'
            ],[
                'name.required'=> 'Bạn chưa nhập tên người dùng',
                'name.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
                'email.required'=> 'Bạn chưa nhập email',
                'email.email'=> 'Bạn chưa nhập đúng định dạng email',
                'email.unique'=>'Email đã tồn tại',
                'password.required'=> 'Bạn chưa nhập mật khẩu',
                'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same' => 'Mật khẩu nhập lại không khớp'
            ]);
            $username = TaiKhoan::where('name', $request->name)
                        ->where('ThuocCongTy', Auth::user()->ThuocCongTy)
                        ->first();
            if(!empty($username)) {
                return redirect('page/quanlytaikhoan')->with('canhbao','Tên đăng nhập đã có trong hệ thống');
            }
            if(Auth::user()->LoaiTaiKhoan == 2) {
                $users = DB::table('users')
                        ->where('ThuocCongTy', Auth::user()->ThuocCongTy)
                        ->count();
                if($users >= 3) {
                    return redirect('page/quanlytaikhoan')->with('canhbao','Bạn đang sử dụng tài khoản thường, vui lòng nâng cấp tài khoản để sử dụng nhiều người dùng hơn');
                }
            }
            $user = new User;
            $user->name = $request->name; 
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->ThuocCongTy = Auth::user()->ThuocCongTy;
            $user->LoaiTaiKhoan = Auth::user()->LoaiTaiKhoan;
            $user->Quyen = 2; 
            $user->save();

            activity()
            ->useLog('1')
            ->performedOn($kh)
            ->causedBy(Auth::user()->id)
            ->log('Thêm tài khoản '.$request->email);

            return redirect('page/quanlytaikhoan')->with('thongbao','Chúc mừng bạn đã đăng kí thành công!');
        }
        return back();
    }
    public function getReset($id)
    {
        if(Auth::user()->Quyen == 1) {
        	$user = TaiKhoan::find($id);
        	$user->password = bcrypt('12345678x@X');
            $user->save();
            return redirect('page/quanlytaikhoan')->with('thongbao','Thay đổi thông tin tài khoản thành công!');
        }
        return back();
    }
    public function getTim(Request $r)
    {
        $t = new TaiKhoan;
        echo $t -> timtk($r->name, Auth::user()->ThuocCongTy);
    }
    public function getViewSuaMK()
    {
        return view('page.doimatkhau');
    }
    public function postSuaMK(Request $request)
    {
        $this->validate($request,[
            'repass'=>'same:passnew',
        ],[
            'repass.same' => 'Mật khẩu nhập lại không khớp',
        ]);
        $id = $request->iduser;
        $passnew = bcrypt($request->passnew);
        $passold = $request->passold;
        $test = new TaiKhoan;
        $t = $test->updateMK($id,$passold,$passnew);
        if($request->passnew == $request->passold)
        {
            return redirect('page/doimatkhau')->with('canhbao','Mật khẩu mới trùng mật khẩu trước đó !');
        }
        else
        {
            if($t ==1)
            {
            return redirect('page/doimatkhau')->with('thongbao','Cập nhật thành công !');
            }
            else
            {
            return redirect('page/doimatkhau')->with('canhbao','Mật khẩu không đúng !');
            }
        }
    }
    public function postCapNhatMK(Request $request)
    {
        $id = $request->iduser;
        $passnew = bcrypt($request->passnew);
        $passold = $request->passold;
        $test = new TaiKhoan;
        $t = $test->updateMK($id,$passold,$passnew);
        return $t;
    }
    public function postKichHoat($check, Request $request)
    {
        if(!empty($request->session()->get('id')) && $check == $request->session()->get('token')) {
            $taikhoan = TaiKhoan::where('ThuocCongTy', $request->session()->get('id'))->get();
            $idTaiKhoan = $taikhoan[0]->id;
            $taikhoan = TaiKhoan::find($idTaiKhoan);
            $ngayhethan = $taikhoan->NgayHetHan;
            $now = (new \DateTime())->format('Y-m-d H:i:s');
            $ngayhethan = date_create($now);
            date_modify($ngayhethan, "+30 days");
            $taikhoan->NgayHetHan = $ngayhethan;
            $taikhoan->LoaiTaiKhoan = $request->session()->get('loaiTaiKhoan');
            $taikhoan->save();
            $congty = CongTy::where('id', $request->session()->get('id'))->get();
            $request->session()->forget('id');
            $request->session()->forget('loaiTaiKhoan');
            $request->session()->forget('email');
            return view('dangkythanhcong',['congty'=>$congty]);
        } else {
            return redirect('trangchu');
        }
    }
    public function getGiaHan()
    {
        if(isset(Auth::user()->id)) {
            return view('giahan', ['ngayhethan' => Auth::user()->NgayHetHan, 'loaitaikhoan' => Auth::user()->LoaiTaiKhoan]);
        }
        return redirect('trangchu');
    }
    public function postGiaHan(Request $request) 
    {
        if(isset(Auth::user()->id)) {
            if (!empty($request->session()->get('thuocCongTy')) && ($request->session()->get('thoigian') < time())) {
                $request->session()->forget('loaiTaiKhoan');
                $request->session()->forget('thuocCongTy');
                $request->session()->forget('thoigian');
                $request->session()->forget('check');
                $request->session()->forget('tien');
            }
            if(empty($request->session()->get('thuocCongTy'))) {
                $taikhoan = TaiKhoan::find(Auth::user()->id);
                $now = (new \DateTime())->format('Y-m-d H:i:s');
                $ngayhethan = $taikhoan->NgayHetHan;
                //không chuyển gói
                if($request->loaiTaiKhoan == $taikhoan->LoaiTaiKhoan) {
                    if($request->loaiTaiKhoan == 1) {
                        $tien = 120000;
                    } else {
                        $tien = 160000;
                    }
                }
                // chuyển gói sử dụng
                if($request->loaiTaiKhoan != $taikhoan->LoaiTaiKhoan) {
                    // trường hợp tài khoản đã hết hạn
                    if($ngayhethan < $now) {
                        if($request->loaiTaiKhoan == 1) {
                            $tien = 120000;
                        } else {
                            $tien = 180000;
                        }
                    } else { 
                    // nâng câp
                        if($request->loaiTaiKhoan > $taikhoan->LoaiTaiKhoan) {
                          $first_date = strtotime($taikhoan->NgayHetHan);
                          $second_date = strtotime($now);
                          $datediff = abs($first_date - $second_date);
                          $tien = floor($datediff / (60*60*24*30))*60000 + 180000;
                        }
                  }
              }
              $thang = $request->thang;
              $tien = $tien*$thang;
              $random = rand(10000,99999);
              $url = "https://sandbox.nganluong.vn:8088/nl35/button_payment.php?receiver=minh.1406.nt@gmail.com&product_name=NT".date('Ymdhis')."&price=".$tien."&return_url=".asset('thuchiengiahan/'.$random)."&comments=Gia hạn".$thang.' tháng';
              echo "<script>window.open('".$url."', '_blank')</script>";
              session(['tien' => $tien]);
              session(['thang' => $thang]);
              session(['loaiTaiKhoan' => $request->loaiTaiKhoan]);
              session(['thuocCongTy' => Auth::user()->ThuocCongTy]);
              $after_5_min = time() + 5*60;
              session(['check' =>$random]);
              session(['thoigian' =>$after_5_min]);
            }
            return view('giahan', ['ngayhethan' => Auth::user()->NgayHetHan, 'loaitaikhoan' => Auth::user()->LoaiTaiKhoan, 'canhbao' => 'Bạn đang thực hiện gia hạn, nếu chưa hoàn thành bạn sẽ mất 5 phút để thực hiện lại việc gia hạn']);
      }
      return redirect('trangchu');
    }
    public function thuchiengiahan($check ,Request $request)
    {
        if(!empty($request->session()->get('thuocCongTy')) && !empty($request->session()->get('loaiTaiKhoan')) && !empty($request->session()->get('thoigian')) && $check == $request->session()->get('check')) {
            $taikhoan = TaiKhoan::where('ThuocCongTy', $request->session()->get('thuocCongTy'))->get();
            $loaiTaiKhoan = $request->session()->get('loaiTaiKhoan');
            foreach ($taikhoan as $t) {
                $taikhoan = TaiKhoan::find($t->id);
                if($t->Quyen == 1) {
                    $idTaiKhoan = $t->id;
                }
                $taikhoan->LoaiTaiKhoan = $loaiTaiKhoan;
                $now = (new \DateTime())->format('Y-m-d H:i:s');
                $ngayhethan = $taikhoan->NgayHetHan;
                if($ngayhethan < $now) {
                    date_modify($now, '+'.(30*$request->session()->get('thang')).' days');
                    $taikhoan->NgayHetHan = $now;
                } else {
                    $ngayhethan = date_create($ngayhethan);
                    date_modify($ngayhethan, '+'.(30*$request->session()->get('thang')).' days');
                    $taikhoan->NgayHetHan = $ngayhethan;
                }
                $taikhoan->save();
            }
            $lichsu = new LichSuGiaoDich();
            $lichsu->TienGiaoDich = $request->session()->get('tien');
            $lichsu->GiaoDich = 'Gia hạn tài khoản';
            $lichsu->LoaiGiaoDich = 2;
            $lichsu->NguoiThucHien = $idTaiKhoan;
            $lichsu->save();
            $request->session()->forget('loaiTaiKhoan');
            $request->session()->forget('thuocCongTy');
            $request->session()->forget('thoigian');
            $request->session()->forget('check');
            $request->session()->forget('tien');
            $request->session()->forget('thang');
            if(isset(Auth::user()->id)) {
                return redirect('giahan') -> with('thongbao', 'Gia hạn thành công');
            }
        }
        return redirect('trangchu');
    }
    public function getViewDK(Request $request)
    {
        $taikhoan = new TaiKhoan();
        $taikhoan->xoaKhongKichHoat();
        return view('dangky');
    }
    public function postDK(Request $request)
    {
         $this->validate($request,[
            'username'=> 'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=> 'required|between:6,20',
            'passwordAgain'=> 'required|same:password',
            'tenCongTy' => 'required|unique:congty,TenCongTy',
            'sdt' => 'unique:congty,SDT',
            'diaChi' => 'unique:congty,DiaChi',
            'diaChiTruyCap' => 'required|unique:congty,Link'
        ],[
            'username.required'=> 'Bạn chưa nhập tên người dùng',
            'username.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
            'email.required'=> 'Bạn chưa nhập email',
            'email.email'=> 'Bạn chưa nhập đúng định dạng email',
            'email.unique'=> 'Email đã tồn tại',
            'username.unique'=>'Tên đăng nhập đã tồn tại',
            'password.required'=> 'Bạn chưa nhập mật khẩu',
            'password.between' => 'Mật khẩu phải có ít nhất 6 kí tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu nhập lại không khớp',
            'tenCongTy.required' => 'Bạn cần nhập tên công ty',
            'tenCongTy.unique' => 'Tên công ty đã tồn tại',
            'sdt.unique' => 'SDT đã được sử dụng',
            'diaChi.unique' => 'Địa chỉ đã tồn tại trong hệ thống'
        ]);

        // // img
         $image =  $request->logo;
         $input['imagename'] = 'logo_'.$request->diaChiTruyCap.'.'.$image->getClientOriginalExtension();
         $destinationPath = public_path('/img/logo');
         $image->move($destinationPath, $input['imagename']);

        //thêm cty
        $congty = new CongTy;
        $congty->TenCongTy = $request->tenCongTy;
        $congty->DiaChi = $request->diaChi;
        $congty->SDT = $request->sdt;
        $congty->Link = $request->diaChiTruyCap;
        $congty->Email = $request->email;
        $now = (new \DateTime())->format('Y-m-d H:i:s');
        $congty->Logo = $input['imagename'];
        $congty->save();

        //thêm người dùng
        $user = new User;
        $user->name = $request->username; 
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->Quyen = 1;
        $user->Ten = $request->name;
        $user->ThuocCongTy = $congty->getIdByCreatedAt($now);
        $user->LoaiTaiKhoan = 4;
        $user->NgayHetHan = $now;
        $user->save();
        $random = rand(10000,99999);
        $token = ($request->header('X-CSRF-TOKEN')).$random;
        // create session
        $congty = CongTy::find($user->ThuocCongTy);
        $tien = $request->tien;
        session(['id' => $congty->getIdByCreatedAt($now)]);
        session(['loaiTaiKhoan' => $request->loaiTaiKhoan]);
        session(['email' => $request->email]);
        session(['ten' => $request->name]);
        session(['token' => $token]);
        $url = asset('guimail');
        return $url;
    }
    public function checkUnique(Request $request) 
    {
        $email = TaiKhoan::where('email', $request->mail)->first();
        $tenCongTy = CongTy::where('TenCongTy', $request->tenCongTy)->first();
        $link = CongTy::where('Link', $request->diaChiTruyCap)->first();
        $diaChi = CongTy::where('DiaChi', $request->diaChi)->first();
        $sdt = CongTy::where('sdt', $request->sdt)->first();
        $arrayName = array('email' => 0, 'tenCongTy' => 0, 'link' => 0, 'diaChi' => 0, 'sdt' => 0 );
        if(!empty($email)){
            $arrayName['email'] = 1;
        }
        if(!empty($tenCongTy)){
            $arrayName['tenCongTy'] = 1;
        }
        if(!empty($link)){
            $arrayName['link'] = 1;
        }
        if(!empty($diaChi)){
            $arrayName['diaChi'] = 1;
        }
        if(!empty($sdt)){
            $arrayName['sdt'] = 1;
        }
        return $arrayName;
    }
    public function guiMail(Request $request)
    {
        if ($request->session()->get('email')) {
            if (!empty($request->session()->get('count')) &&  $request->session()->get('count') > 5) {
                $request->session()->forget('thoigian');
                $request->session()->forget('email');
                $request->session()->forget('count');
                return redirect('trangchu');
            }
            $mail = $request->session()->get('email');
            $name = $request->session()->get('ten');
            // return $mail;
            $this->mail = $mail;
            $after_5_min = time() + 5*60;

            if(!empty($request->session()->get('thoigian')) && $request->session()->get('thoigian') < time()) {
                Mail::send('mail', array('name'=>$name, 'token'=>$request->session()->get('token')), function($message){
                    $message->from('service@lightzrealestate.com', 'LightZ Real Estate');
                    $message->to($this->mail)->subject('Đăng ký tài khoản LightZ Real Estate');
                });
                session(['thoigian' => $after_5_min] );
                $count = $request->session()->get('count') + 1;
                session(['count' => $count ]);
                return view('thongbaoguimail');
            } 

            if(empty($request->session()->get('thoigian'))) {
                Mail::send('mail', array('name'=>$name, 'token'=>$request->session()->get('token')), function($message){
                    $message->from('service@lightzrealestate.com', 'LightZ Real Estate');
                    $message->to($this->mail)->subject('Đăng ký tài khoản LightZ Real Estate');
                });
                session(['thoigian' => $after_5_min ]);
                session(['count' => 1 ]);
                return view('thongbaoguimail');
            }

            if(!empty($request->session()->get('thoigian')) && $request->session()->get('thoigian') > time()) {
                return view('thongbaoguimail', ['canhbao' => "Bạn vừa gửi mail, vui lòng thử lại sau 5 phút"]);
            } 

        } else {
            return redirect('trangchu');
        }
        
        
        // Mail::to('kisivodanh1406@gmail.com')->send(new SendMailable($name));
    }
}

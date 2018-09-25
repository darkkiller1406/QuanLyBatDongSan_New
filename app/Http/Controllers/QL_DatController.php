<?php

namespace App\Http\Controllers;
use App\Dat;
use App\YeuCau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Quan;
use App\Phuong;
class QL_DatController extends Controller
{
    //
    public function getView()
    {
    	return view('page.quanlydat');
    }
    public function postThem(Request $request)
    {
        $this->validate($request,[
            'mald'=>'unique:dat,KyHieuLoDat',
        ],[
            'mald.unique'=>'Ký hiệu lô đất đã tồn tại',
        ]);
        $dat = new Dat;
        //
        // xử lý ảnh
        $file = $request->file('image');
        $i=0;
        $tam = '';
        foreach ($file as $image) {
            if($i <= 2)
            {
                $input['imagename'] = $request->mald.'_'.++$i.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/img');
                $image->move($destinationPath, $input['imagename']);
                $tam =$input['imagename'].';'.$tam;
            }
        }
        //
        $dat->HinhAnh = $tam;
        $dt = ($request->dai)*($request->rong)+(0.5*($request->nohau)*($request->dai));
        $gia = $dt*($request->dongia);
        $dat->KyHieuLoDat = $request->mald;
        $dat->SoHuu = $request->sohuu;
        $dat->TrangThai = '0';
        $dat->LuotXem = '0';
        $dat->DiaChi = $request->diachi;
        $dat->Quan = $request->quan;
        //$dat->ThanhPho = $request->tp;
        $dat->Gia = $gia;
        $dat->Dai = $request->dai;
        $dat->Rong = $request->rong;
        $dat->DonGia = $request->dongia;
        $dat->NoHau = $request->nohau;
        $dat->DienTich = $dt;
        $dat->Huong = $request->huong;
        $dat->GhiChu = $request->ghichu;
        $dat->save();
       return redirect('page/quanlydat')->with('thongbao','Thêm thành công thông tin lô đất !');
    }
    public function getXoa($id)
    {
    	$dat = Dat::find($id);
        $s = $dat->HinhAnh;
            $m = explode(';', $s);
            for($a=0;$a<(count($m)-1);$a++)
            {
                Storage::delete($m[$a]);
            }
        $dat -> delete();
        return redirect('page/quanlydat')->with('thongbao','Bạn đã xóa thành công!');
    }
    public function postSua(Request $request)
    {
         $this->validate($request,[
            'dai'=>'numeric|min:1',
            'rong'=>'numeric|min:1',
            'dongia'=>'numeric|min:1',
            'nohau'=>'numeric|min:0',
        ],[
            'dai.min'=>'Độ dài lô đất phải lớn hơn 0',
            'rong.min'=>'Độ rộng lô đất phải lớn hơn 0',
            'dongia.min'=>'Đơn giá lô đất phải lớn hơn 0',
            'nohau.min'=>'Độ nở hậu lô đất phải lớn hơn hoặc bằng 0',
        ]);
        $dat = Dat::find($request->iddat);
        $file = $request->file('image');
        $i=0;
        $tam = '';
        if($file != NULL)
        {
            $s = $dat->HinhAnh;
            $m = explode(';', $s);
            for($a=0;$a<(count($m)-1);$a++)
            {
                Storage::delete($m[$a]);
            }
            foreach ($file as $image) {
                if($i <= 2)
                {
                $input['imagename'] = $request->mald.'_'.++$i.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/img');
                $image->move($destinationPath, $input['imagename']);
                $tam =$input['imagename'].';'.$tam;
                }
            }
            $dat->HinhAnh = $tam;
        }
        $dt = ($request->dai)*($request->rong)+(0.5*($request->nohau)*($request->dai));
        $gia = $dt*($request->dongia);
        $dat->KyHieuLoDat = $request->mald;
        $dat->SoHuu = $request->sohuu;
        $dat->DiaChi = $request->diachi;
        $dat->Quan = $request->quan;
        //$dat->ThanhPho = $request->tp;
        $dat->Gia = $gia;
        $dat->Dai = $request->dai;
        $dat->Rong = $request->rong;
        $dat->DonGia = $request->dongia;
        $dat->NoHau = $request->nohau;
        $dat->DienTich = $dt;
        $dat->Huong = $request->huong;
        $dat->GhiChu = $request->ghichu;
        $dat->save();

        return redirect('page/quanlydat')->with('thongbao','Cập nhật thành công thông tin lô đất !');
    }
    public function getTim(Request $r)
    {
        $dat = new Dat;
        echo $dat -> timdat($r->name);
    }
    public function getView_DSDat()
    {
        $dat = Dat::paginate(10);
        return view('danhsachdat')->with('dat',$dat);
    }
    public function timDat_ban(Request $r)
    {
        $dt = $r->dt;
        $gia = $r->gia;
        $huong = $r->huong;
        $tp = $r->tp;
        $quan = $r->quan;
        $a = new Dat();
        $kq =  $a->timdat_ban($quan,$tp,$gia,$dt,$huong);
        return view('danhsachdat_kqtim')->with('kq',$kq);
    }
    public function timQuan(Request $r)
    {
        $quan = new Quan;
        echo $quan -> timquan($r->tp);
    }
    public function timPhuong(Request $r)
    {
        $phuong = new Phuong;
        echo $phuong -> timphuong($r->quan);
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// page bán
Route::get('trangchu','TrangChuController@getView_Ban')->name('view_trangchu');

Route::get('chitiet/{id}','ChiTietController@getView');

Route::get('chitietphong/{id}','ChiTietController@getViewRoom');

Route::get('chinhsuatindang/{id}','QL_ChoThueController@getChinhSua');

Route::get('danhsachdat','QL_DatController@getView_DSDat')->name('view_dsDat');

Route::get('danhsachdat/{link}','QL_DatController@getView_DSDat_CTy');

Route::get('danhsachthanhvien','QL_CongTyController@getView_DSCongTy')->name('view_DSCongTy');

Route::get('danhsachphong_map','QL_ChoThueController@getView_DSPhongMap')->name('view_dsPhong_map');

Route::get('danhsachdat_map','QL_DatController@getView_DSDatMap')->name('view_dsDat_map');

Route::get('lienlac','TrangChuController@getView_lienlac')->name('view_lienlac');

Route::get('vechungtoi','TrangChuController@getView_vechungtoi')->name('view_vechungtoi');

Route::get('phidichvu','TrangChuController@getView_dichvu')->name('view_dichvu');

Route::any('timdatban', 'QL_DatController@timDat_ban')->name('timDat_ban');

Route::post('guiyeucau', 'QL_YeuCauController@ThemYeuCau')->name('ThemYeuCau');

Route::post('guiyeucaull', 'QL_YeuCauController@ThemYeuCauLL')->name('ThemYeuCauLL');

Route::get('dangky', 'QL_TaiKhoanController@getViewDK')->name('DangKy');

Route::any('postdangky', 'QL_TaiKhoanController@postDK')->name('postDangKy');

Route::post('kiemtradangky', 'QL_TaiKhoanController@ktDangKy');

Route::any('dangkythanhcong','QL_TaiKhoanController@getDangKyThanhCong');

Route::post('dangnhap', 'QL_DangNhapController@getDN');

Route::get('dangxuat', 'QL_DangNhapController@getDX')->name('dangxuat');

Route::get('danhsachtin','QL_ChoThueController@getView' )->name('view_dsPhong');

Route::get('dangtin','QL_ChoThueController@getViewDangTin' )->name('view_dangtin');

Route::any('postdangtin', 'QL_ChoThueController@postDangTin');

Route::any('postsuatin', 'QL_ChoThueController@postSuaTin');

Route::any('kiemtratien','QL_ChoThueController@kiemtraTien');

Route::any('timquan','QL_DatController@timQuan');

Route::any('timphuong','QL_DatController@timPhuong');

Route::any('quanlytrangcanhan', 'QL_TaiKhoanController@trangcanhan')->name('view_trangcanhan');

Route::any('kichhoat/{token}','QL_TaiKhoanController@postKichHoat');

Route::any('capnhatmk','QL_TaiKhoanController@postCapNhatMK')->name('post_CapNhatMK');

Route::get('giahan','QL_TaiKhoanController@getGiaHan')->name('giahan');

Route::post('giahan','QL_TaiKhoanController@postGiaHan')->name('postgiahan');

Route::any('thuchiengiahan/{check}','QL_TaiKhoanController@thuchiengiahan');

Route::any('checkunique','QL_TaiKhoanController@checkUnique');

Route::any('guimail','QL_TaiKhoanController@guiMail');

Route::get('thanhvien/{link}', 'QL_CongTyController@getViewThanhVien');
//reset password
Route::group(['namespace' => 'Auth'],function(){
    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.token');
    Route::post('password/reset', 'ResetPasswordController@reset');
});
//login
Route::get('page/dangnhap/{id}', 'QL_DangNhapController@getView');
Route::any('page/dangnhap', 'QL_DangNhapController@getDangNhap');
Route::get('page/dangxuat', 'QL_DangNhapController@getDangXuat');
Route::group(['prefix' => 'page','middleware'=>'Adminlogin'], function() {
    
    Route::get('index','TrangChuController@getIndex')->name('index');
    Route::get('indexadmin','TrangChuController@getIndexAdmin')->name('index_sub');
    //quản lý khách hàng
    Route::get('quanlykhachhang','QL_KhachHangController@getView')->name('view_QLKH');
    Route::post('themkhachhang','QL_KhachHangController@postThemKhachHang')->name('post_ThemKH');
    Route::post('suakhachhang','QL_KhachHangController@postSuaKhachHang')->name('post_SuaKH');
    Route::get('xoakh/{id}','QL_KhachHangController@getXoa');
    Route::any('timkh', 'QL_KhachHangController@getTim');
    //quản lý tài khoản
    Route::get('quanlytaikhoan','QL_TaiKhoanController@getView')->name('view_QLTK');
    Route::post('themtaikhoan','QL_TaiKhoanController@postThemTaiKhoan')->name('post_ThemTK');
    Route::post('suataikhoan','QL_TaiKhoanController@postSuaTaiKhoan')->name('post_SuaTK');
    Route::get('resettk/{id}','QL_TaiKhoanController@getReset');
    Route::get('xoatk/{id}','QL_TaiKhoanController@getXoa');
    Route::any('timtk', 'QL_TaiKhoanController@getTim');
    //
    Route::get('doimatkhau', 'QL_TaiKhoanController@getViewSuaMK')->name('view_SuaMK');
    Route::any('suamk','QL_TaiKhoanController@postSuaMK')->name('post_SuaMK');
    //quản lý đất
    Route::get('quanlydat','QL_DatController@getView')->name('view_QLDAT');
    Route::get('themlodat','QL_DatController@getViewThem');
    Route::post('themdat','QL_DatController@postThem')->name('post_ThemDAT');
    Route::post('suadat','QL_DatController@postSua')->name('post_SuaDAT');;
    Route::get('xoadat/{id}','QL_DatController@getXoa');
    Route::get('sualodat/{id}','QL_DatController@getViewSua');
    Route::any('timdat', 'QL_DatController@getTim');
    Route::any('locdat' , 'QL_DatController@getLoc')->name('post_Loc');
    //quản lý hợp đồng
    Route::get('quanlyhopdong','QL_HopDongController@getView')->name('view_QLHD');
    Route::post('themhd','QL_HopDongController@postThem')->name('post_ThemHD');
    Route::post('xacnhan','QL_HopDongController@postXacNhan')->name('post_XacNhanHD');
    Route::post('suahd','QL_HopDongController@postSua')->name('post_SuaHD');
    Route::get('xoahd/{id}','QL_HopDongController@getXoa');
    Route::any('timhd', 'QL_HopDongController@getTim');
    Route::get('themhopdong/{id}','QL_HopDongController@getThem');
    Route::get('suahopdong/{id}','QL_HopDongController@getSua');
    Route::get('uploadmauhopdong', 'QL_HopDongController@getUpLoad');
    Route::post('uploadmauhopdong', 'QL_HopDongController@postUpLoad')->name('uploadHD');
    //Quan ly yeu cau
    Route::get('quanlyyeucau','QL_YeuCauController@getView')->name('view_QLYC');
    Route::get('xoayc/{id}','QL_YeuCauController@getXoa');
    Route::get('xoaycll/{id}','QL_YeuCauController@getXoaLL');
    Route::get('xoaycweb/{id}','QL_YeuCauController@getXoaWeb');
    Route::any('timyeucau', 'QL_YeuCauController@timYC')->name('TKYC');
    // Quan ly tin dang 
    Route::get('quanlytindang','QL_TinDangController@getView')->name('view_QLTD');
    Route::post('loctindang','QL_TinDangController@getLoc')->name('post_LocTin');
    Route::get('xoatin/{id}','QL_TinDangController@getXoaTin');
    Route::get('dangtin/{id}','QL_TinDangController@getDangTin');
    Route::any('timtindang', 'QL_TinDangController@getTimTinDang');
    //
    Route::get('quanlyhoatdong','QL_HoatDongController@getView')->name('view_QLHDU');
    Route::post('timhoatdong','QL_HoatDongController@timHDU')->name('timHDU');
    //
    Route::any('thongkedoanhthu','ThongKeController@getThongKeDoanhThu')->name('TKDT');
    Route::any('thongkegiaodich','ThongKeController@getThongKeGiaoDich')->name('TKGD');
    Route::any('thongketimkiem','ThongKeController@getThongKeTimKiem')->name('TKTK');
    //
    Route::any('pdfgiaodich','PDFController@pdf_giaodich')->name('inGD');
    Route::any('pdfdoanhthu','PDFController@pdf_doanhthu')->name('inDT');
    //
    Route::get('quanlycongty','QL_CongTyController@getView')->name('view_QLCT');
    Route::get('huykichhoat/{id}','QL_CongTyController@huyKichHoat');
    Route::get('resetpass/{id}','QL_CongTyController@resetPass');
    Route::post('timcongty', 'QL_CongTyController@timCongTy');
    //
    Route::get('gioithieu', 'QL_CongTyController@getViewGioiThieu')->name('view_GTCT');
    Route::post('themgioithieu', 'QL_CongTyController@postThemGioiThieu')->name('post_ThemGioiThieu');
    Route::post('upload', 'QL_CongTyController@uploadHinh')->name('uploadHinh');
 });

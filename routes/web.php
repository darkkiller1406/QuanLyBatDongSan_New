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

Route::get('chitiet/{id}','ChiTietController@getView')->name('view_chitiet');

Route::get('chitietphong/{id}','ChiTietController@getViewRoom')->name('view_chitiet');

Route::get('chinhsuatindang/{id}','QL_ChoThueController@getChinhSua');

Route::get('danhsachdat','QL_DatController@getView_DSDat')->name('view_dsDat');

Route::get('danhsachphong_map','QL_ChoThueController@getView_DSPhongMap')->name('view_dsPhong_map');

Route::get('lienlac','TrangChuController@getView_lienlac')->name('view_lienlac');

Route::get('vechungtoi','TrangChuController@getView_vechungtoi')->name('view_vechungtoi');

Route::any('timdat_ban', 'QL_DatController@timDat_ban')->name('timDat_ban');

Route::post('guiyeucau', 'QL_YeuCauController@ThemYeuCau')->name('ThemYeuCau');

Route::post('guiyeucaull', 'QL_YeuCauController@ThemYeuCauLL')->name('ThemYeuCauLL');

Route::get('dangky', 'QL_DangNhapController@getViewDK')->name('DangKy');

Route::any('postdangky', 'QL_DangNhapController@postDK')->name('postDangKy');

Route::post('dangnhap', 'QL_DangNhapController@getDN');

Route::get('dangxuat', 'QL_DangNhapController@getDX');

Route::get('danhsachtin','QL_ChoThueController@getView' )->name('view_dsPhong');

Route::get('dangtin','QL_ChoThueController@getViewDangTin' )->name('view_dangtin');

Route::any('postdangtin', 'QL_ChoThueController@postDangTin');

Route::any('postsuatin', 'QL_ChoThueController@postSuaTin');

Route::any('kiemtratien','QL_ChoThueController@kiemtraTien');

Route::any('timquan','QL_DatController@timQuan');

Route::any('timphuong','QL_DatController@timPhuong');

Route::any('tindadang','QL_ChoThueController@getViewTinDaDang')->name('view_tindadang');

Route::any('timphong', 'QL_ChoThueController@timPhong')->name('timPhong');

Route::any('quanlytrangcanhan', 'QL_TaiKhoanController@trangcanhan')->name('view_trangcanhan');

Route::any('naptien','QL_TaiKhoanController@postNapTien')->name('post_naptien');

Route::any('capnhatmk','QL_TaiKhoanController@postCapNhatMK')->name('post_CapNhatMK');

Route::get('lichsugiaodich/{id}','QL_TaiKhoanController@getLichSu');
// page admin
Route::get('page/dangnhap', 'QL_DangNhapController@getView');
Route::post('page/dangnhap', 'QL_DangNhapController@getDangNhap');
Route::get('page/dangxuat', 'QL_DangNhapController@getDangXuat');
Route::group(['prefix' => 'page','middleware'=>'Adminlogin'], function() {
    
    Route::get('index','TrangChuController@getIndex')->name('index');

    //quản lý khách hàng
    Route::get('quanlykhachhang','QL_KhachHangController@getView')->name('view_QLKH');
    Route::post('themkhachhang','QL_KhachHangController@postThemKhachHang')->name('post_ThemKH');
    Route::post('suakhachhang','QL_KhachHangController@postSuaKhachHang')->name('post_SuaKH');
    Route::get('xoakh/{id}','QL_KhachHangController@getXoa');
    Route::any('timkh', 'QL_KhachHangController@getTim');
    //quản lý tài khoản
    Route::get('quanlytaikhoan','QL_TaiKhoanController@getView')->name('view_QLTK');
    Route::post('themtaikhoan','QL_TaiKhoanController@postThemTaiKhoan')->name('post_ThemTK');
    Route::get('resettk/{id}','QL_TaiKhoanController@getReset');
    Route::get('xoatk/{id}','QL_TaiKhoanController@getXoa');
    Route::any('timtk', 'QL_TaiKhoanController@getTim');
    //
    Route::get('doimatkhau', 'QL_TaiKhoanController@getViewSuaMK')->name('view_SuaMK');
    Route::any('suamk','QL_TaiKhoanController@postSuaMK')->name('post_SuaMK');
    //quản lý đất
    Route::get('quanlydat','QL_DatController@getView')->name('view_QLDAT');
    Route::post('themdat','QL_DatController@postThem')->name('post_ThemDAT');
    Route::post('suadat','QL_DatController@postSua')->name('post_SuaDAT');;
    Route::get('xoadat/{id}','QL_DatController@getXoa');
    Route::any('timdat', 'QL_DatController@getTim');
    //quản lý hợp đồng
    Route::get('quanlyhopdong','QL_HopDongController@getView')->name('view_QLHD');
    Route::post('themhd','QL_HopDongController@postThem')->name('post_ThemHD');
    Route::get('xoahd/{id}','QL_HopDongController@getXoa');
    Route::any('timhd', 'QL_HopDongController@getTim');
    //Quan ly yeu cau
    Route::get('quanlyyeucau','QL_YeuCauController@getView')->name('view_QLYC');
    Route::get('xoayc/{id}','QL_YeuCauController@getXoa');
    Route::get('xoaycll/{id}','QL_YeuCauController@getXoaLL');
    Route::any('timyeucau', 'QL_YeuCauController@timYC')->name('TKYC');
    Route::any('guimail','QL_YeuCauController@guiMail');
    // Quan ly tin dang thue phong
    Route::get('quanlytindang','QL_TinDangController@getView')->name('view_QLTD');
    Route::any('timtindang', 'QL_TinDangController@timTD')->name('TKTD');
    Route::get('xoatd/{id}','QL_TinDangController@getXoa');
    //
    Route::any('thongkedoanhthu','ThongKeController@getThongKeDoanhThu')->name('TKDT');
    Route::any('thongkegiaodich','ThongKeController@getThongKeGiaoDich')->name('TKGD');
    //
    Route::any('pdfgiaodich','PDFController@pdf_giaodich')->name('inGD');
    Route::any('pdfdoanhthu','PDFController@pdf_doanhthu')->name('inDT');
 });

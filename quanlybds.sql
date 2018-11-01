-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 01, 2018 lúc 10:43 AM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlybds`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congty`
--

CREATE TABLE `congty` (
  `id` int(11) NOT NULL,
  `TenCongTy` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DiaChi` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SDT` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `congty`
--

INSERT INTO `congty` (`id`, `TenCongTy`, `DiaChi`, `SDT`, `Email`, `created_at`, `updated_at`) VALUES
(7, 'test', 'test', '01869885811', 'test@gmail.com', '2018-11-01 14:54:34', '2018-11-01 07:54:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dat`
--

CREATE TABLE `dat` (
  `id` int(11) NOT NULL,
  `KyHieuLoDat` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Rong` int(11) NOT NULL,
  `Dai` int(11) NOT NULL,
  `NoHau` int(11) NOT NULL,
  `DienTich` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `Gia` double NOT NULL,
  `SoHuu` int(11) DEFAULT NULL,
  `TrangThai` int(11) NOT NULL,
  `Huong` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Map` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Phuong` int(11) NOT NULL,
  `HinhAnh` varchar(300) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `GhiChu` varchar(1000) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `LuotXem` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `dat`
--

INSERT INTO `dat` (`id`, `KyHieuLoDat`, `Rong`, `Dai`, `NoHau`, `DienTich`, `DonGia`, `Gia`, `SoHuu`, `TrangThai`, `Huong`, `DiaChi`, `Map`, `Phuong`, `HinhAnh`, `GhiChu`, `LuotXem`, `created_at`, `updated_at`) VALUES
(1, '1234', 5, 10, 0, 50, 600000, 30000000, 7, 2, 'Đông', '163/24/92B Tô Hiến Thành', '10.782843;106.67134699999997', 14, 'LK05_1.jpg;LK05_2.jpg;LK05_3.jpg;', NULL, 77, '2018-05-24 07:42:00', '2018-11-01 08:08:37'),
(3, 'LK07', 5, 18, 0, 90, 20000000, 1800000000, 7, 1, 'Bắc', '169/24/92B Tô Hiến Thành', '10.782621; 106.6716778', 14, 'LK05_1.jpg;LK05_2.jpg;LK05_3.jpg;', 'Lô đất năm sau Trung tâm thương mại, khu dân cư quanh đông đúc, gần trường đại học, mặt tiền đường rộng 8m, cơ sở hạ tầng hoàn thiện. Rất thuận tiện việc mua bán , kinh doanh. \r\nDiện tích: 60m2( 5x12) \r\nThương lượng chính chủ, không tiếp cò', 89, '2018-08-07 10:07:54', '2018-11-01 08:08:41'),
(4, 'LK08', 4, 20, 0, 80, 15000000, 1200000000, 7, 1, 'Đông', '169/24/92B Tô Hiến Thành', '10.782621; 106.6716778', 14, 'LK06_1.jpg;LK06_2.jpg;', 'Lô đất năm sau Trung tâm thương mại, khu dân cư quanh đông đúc, gần trường đại học, mặt tiền đường rộng 8m, cơ sở hạ tầng hoàn thiện. Rất thuận tiện việc mua bán , kinh doanh. \r\nDiện tích: 60m2( 5x12) \r\nThương lượng chính chủ, không tiếp cò', 19, '2018-08-07 10:07:54', '2018-11-01 08:08:44'),
(5, 'LK09', 5, 18, 0, 90, 22000000, 1980000000, 7, 0, 'Bắc', '169/24/92B Tô Hiến Thành', '10.782621; 106.6716778', 14, 'LK05_1.jpg;LK05_2.jpg;LK05_3.jpg;', 'Lô đất năm sau Trung tâm thương mại, khu dân cư quanh đông đúc, gần trường đại học, mặt tiền đường rộng 8m, cơ sở hạ tầng hoàn thiện. Rất thuận tiện việc mua bán , kinh doanh. \r\nDiện tích: 60m2( 5x12) \r\nThương lượng chính chủ, không tiếp cò', 49, '2018-08-07 10:07:54', '2018-11-01 08:08:46'),
(6, 'LK10', 4, 20, 0, 80, 15000000, 1200000000, 7, 0, 'Đông', '169/24/92B Tô Hiến Thành', '10.782621; 106.6716778', 14, 'LK06_1.jpg;LK06_2.jpg;', 'Lô đất năm sau Trung tâm thương mại, khu dân cư quanh đông đúc, gần trường đại học, mặt tiền đường rộng 8m, cơ sở hạ tầng hoàn thiện. Rất thuận tiện việc mua bán , kinh doanh. \r\nDiện tích: 60m2( 5x12) \r\nThương lượng chính chủ, không tiếp cò', 53, '2018-08-07 10:07:54', '2018-11-01 08:08:49'),
(7, 'LK013', 4, 15, 0, 60, 12000000, 720000000, 7, 0, 'Nam', '163/24/92B Tô Hiến Thành', '10.782621; 106.6716778', 14, 'LK013_3.jpg;LK013_2.jpg;LK013_1.jpg;', NULL, 8, '2018-08-07 10:07:54', '2018-11-01 08:08:51'),
(8, '123', 10, 120, 0, 1200, 6230250, 7476300000, 7, 0, 'Đông', '256 Trần Văn Đang', '10.7842142;106.67331469999999', 13, '123_1.jpg;', NULL, 6, '2018-10-20 05:44:55', '2018-11-01 08:08:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdong`
--

CREATE TABLE `hopdong` (
  `id` int(11) NOT NULL,
  `MaHopDong` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ID_Dat` int(11) NOT NULL,
  `ID_KhachHang_Mua` int(11) NOT NULL,
  `PhiMoiGioi` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hopdong`
--

INSERT INTO `hopdong` (`id`, `MaHopDong`, `ID_Dat`, `ID_KhachHang_Mua`, `PhiMoiGioi`, `created_at`, `updated_at`) VALUES
(6, 'HD04', 4, 3, 10000000, '2018-06-01 06:38:51', '2018-06-01 06:38:51'),
(7, 'HD07', 1, 1, 10000000, '2018-06-01 10:28:48', '2018-06-01 10:28:48'),
(8, 'HD08', 3, 3, 15000000, '2018-06-01 11:57:49', '2018-06-01 11:57:49'),
(9, 'HD09', 6, 3, 10000, '2018-08-07 07:29:17', '2018-08-07 07:29:17'),
(11, 'HD010', 1, 4, 9000000, '2018-10-28 08:12:58', '2018-10-28 08:12:58'),
(12, 'HD12', 1, 4, 123, '2018-10-28 08:15:34', '2018-10-28 08:15:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `MaKhachHang` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `XungHo` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `HoVaTenDem` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Ten` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DTDD` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DTCD` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `CMND` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `MaKhachHang`, `XungHo`, `HoVaTenDem`, `Ten`, `DTDD`, `DTCD`, `CMND`, `DiaChi`, `Email`, `created_at`, `updated_at`) VALUES
(1, 'KH001', 'Ông', 'Nguyễn Công', 'Minh', '01869885811', '02583812656', '225582114', '163/24/92B Tô Hiến Thành, P13, Q10', 'minh.1406@gmail.com', '2018-05-21 04:50:13', '2018-05-21 08:28:16'),
(3, 'KH002', 'Ông', 'Nguyễn Quang', 'Huy', '0905456781', '02583812654', '22552119', '163/24/92B Tô Hiến Thành, P13, Q10', 'darkkiller1406@yahoo.com', '2018-05-21 09:04:31', '2018-05-21 09:04:31'),
(4, 'KH004', 'Bà', 'Trà', 'Giang', '0905456789', '02583812657', '22552118', '163/24/92B Tô Hiến Thành, P13, Q10', 'darkkiller1407@yahoo.com', '2018-05-21 09:47:00', '2018-05-21 09:47:00'),
(5, 'KH005', 'ông', 'Nguyễn Công', 'Minh', '0905456733', '02583812122', '225522118', '163/24/92B Tô Hiến Thành, P13, Q10', 'darkkiller1423@yahoo.com', '2018-06-28 06:31:04', '2018-06-28 06:31:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsugiaodich`
--

CREATE TABLE `lichsugiaodich` (
  `id` int(11) NOT NULL,
  `TienGiaoDich` double NOT NULL,
  `GiaoDich` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `LoaiGiaoDich` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `NguoiThucHien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsugiaodich`
--

INSERT INTO `lichsugiaodich` (`id`, `TienGiaoDich`, `GiaoDich`, `LoaiGiaoDich`, `created_at`, `updated_at`, `NguoiThucHien`) VALUES
(1, 80000, 'Thực hiện gia hạn ngày đăng', 1, '2018-07-08 13:51:51', '2018-07-12 05:05:52', 2),
(2, 20000, 'Thực hiện thay đổi loại tin', 1, '2018-07-08 15:20:22', '2018-07-12 05:05:52', 2),
(3, 250000, 'Thực hiện gia hạn ngày đăng', 1, '2018-07-08 15:26:19', '2018-07-12 05:05:52', 2),
(4, 120000, 'Thực hiện gia hạn ngày đăng', 1, '2018-07-08 15:43:27', '2018-07-12 05:05:52', 2),
(5, 30000, 'Thực hiện gia hạn ngày đăng', 1, '2018-07-09 12:00:52', '2018-07-12 05:05:52', 2),
(6, 20000, 'Nạp thêm tiền', 2, '2018-07-12 12:06:56', '2018-07-12 05:06:56', 2),
(7, 50000, 'Nạp thêm tiền', 2, '2018-07-12 12:07:05', '2018-07-12 05:07:05', 2),
(8, 100000, 'Nạp thêm tiền', 2, '2018-07-12 12:07:14', '2018-07-12 05:07:14', 2),
(9, 500000, 'Nạp thêm tiền', 2, '2018-07-12 12:07:23', '2018-07-12 05:07:23', 2),
(10, 250000, 'Thực hiện đăng tin mới', 1, '2018-07-12 16:14:38', '2018-07-12 09:14:38', 2),
(11, 250000, 'Thực hiện đăng tin mới', 1, '2018-07-12 16:17:41', '2018-07-12 09:17:41', 2),
(12, 50000, 'Thực hiện đăng tin mới', 1, '2018-07-12 16:20:47', '2018-07-12 09:20:47', 2),
(13, 50000, 'Thực hiện gia hạn ngày đăng', 1, '2018-07-12 16:24:39', '2018-07-12 09:24:39', 2),
(14, 50000, 'Thực hiện gia hạn ngày đăng', 1, '2018-07-12 16:28:59', '2018-07-12 09:28:59', 2),
(15, 30000, 'Thực hiện đăng tin mới', 1, '2018-07-12 16:41:15', '2018-07-12 09:41:15', 2),
(16, 30000, 'Thực hiện đăng tin mới', 1, '2018-07-12 16:41:44', '2018-07-12 09:41:44', 2),
(17, 30000, 'Thực hiện đăng tin mới', 1, '2018-07-12 16:42:45', '2018-07-12 09:42:45', 2),
(18, 30000, 'Thực hiện đăng tin mới', 1, '2018-07-12 16:43:03', '2018-07-12 09:43:03', 2),
(37, 120000, 'Thực hiện gia hạn ngày đăng', 1, '2018-07-13 11:27:55', '2018-07-13 04:27:55', 2),
(38, 80000, 'Thực hiện gia hạn ngày đăng', 1, '2018-07-13 13:27:50', '2018-07-13 06:27:50', 2),
(39, 160000, 'Thực hiện gia hạn ngày đăng', 1, '2018-07-16 20:15:24', '2018-07-16 13:15:24', 2),
(40, 200000, 'Thực hiện gia hạn ngày đăng', 1, '2018-07-16 20:16:04', '2018-07-16 13:16:04', 2),
(41, 200000, 'Thực hiện gia hạn ngày đăng', 1, '2018-07-16 20:19:12', '2018-07-16 13:19:12', 2),
(42, 90000, 'Thực hiện gia hạn ngày đăng', 1, '2018-08-07 07:55:19', '2018-08-07 00:55:19', 2),
(43, 80000, 'Thực hiện gia hạn ngày đăng', 1, '2018-08-07 14:09:49', '2018-08-07 07:09:49', 2),
(44, 20000, 'Thực hiện thay đổi loại tin', 1, '2018-08-07 14:18:25', '2018-08-07 07:18:25', 2),
(45, 80000, 'Thực hiện gia hạn ngày đăng', 1, '2018-09-06 18:38:44', '2018-09-06 11:38:44', 2),
(46, 280000, 'Thực hiện gia hạn ngày đăng', 1, '2018-09-16 09:27:01', '2018-09-16 02:27:01', 2),
(47, 350000, 'Thực hiện gia hạn ngày đăng', 1, '2018-09-16 09:27:25', '2018-09-16 02:27:25', 2),
(48, 210000, 'Thực hiện gia hạn ngày đăng', 1, '2018-09-16 09:27:39', '2018-09-16 02:27:39', 2),
(49, 400000, 'Thực hiện gia hạn ngày đăng', 1, '2018-09-27 19:45:40', '2018-09-27 12:45:40', 2),
(50, 50000, 'Nạp thêm tiền', 2, '2018-10-06 12:35:44', '2018-10-06 05:35:44', 2),
(51, 20000, 'Nạp thêm tiền', 2, '2018-10-06 13:10:07', '2018-10-06 06:10:07', 2),
(52, 50000, 'Nạp thêm tiền', 2, '2018-10-06 13:43:35', '2018-10-06 06:43:35', 2),
(53, 20000, 'Nạp thêm tiền', 2, '2018-10-06 14:49:34', '2018-10-06 07:49:34', 2),
(54, 20000, 'Nạp thêm tiền', 2, '2018-10-06 15:29:30', '2018-10-06 08:29:30', 2),
(55, 20000, 'Nạp thêm tiền', 2, '2018-10-06 15:30:22', '2018-10-06 08:30:22', 2),
(56, 0, 'Nạp thêm tiền', 2, '2018-10-06 16:37:08', '2018-10-06 09:37:08', 2),
(57, 20000, 'Nạp thêm tiền', 2, '2018-10-06 17:28:25', '2018-10-06 10:28:25', 2),
(58, 100000, 'Nạp thêm tiền', 2, '2018-10-06 17:37:27', '2018-10-06 10:37:27', 2),
(59, 50000, 'Nạp thêm tiền', 2, '2018-10-06 17:39:02', '2018-10-06 10:39:02', 2),
(60, 20000, 'Nạp thêm tiền', 2, '2018-10-06 17:40:52', '2018-10-06 10:40:52', 2),
(61, 20000, 'Nạp thêm tiền', 2, '2018-10-06 17:42:31', '2018-10-06 10:42:31', 2),
(62, 100000, 'Thực hiện đăng tin mới', 1, '2018-10-26 09:40:48', '2018-10-26 02:40:48', 2),
(63, 20000, 'Nạp thêm tiền', 2, '2018-10-30 13:41:02', '2018-10-30 06:41:02', 2),
(64, 20000, 'Nạp thêm tiền', 2, '2018-10-30 13:44:36', '2018-10-30 06:44:36', 2),
(65, 20000, 'Nạp thêm tiền', 2, '2018-10-30 13:47:03', '2018-10-30 06:47:03', 2),
(66, 20000, 'Nạp thêm tiền', 2, '2018-10-30 13:48:19', '2018-10-30 06:48:19', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuong`
--

CREATE TABLE `phuong` (
  `id` int(11) NOT NULL,
  `TenPhuong` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ThuocQuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phuong`
--

INSERT INTO `phuong` (`id`, `TenPhuong`, `ThuocQuan`) VALUES
(1, 'Phường 1', 1),
(2, 'Phường 2', 1),
(3, 'Phường 3', 1),
(4, 'Phường 4', 1),
(5, 'Phường 1', 2),
(6, 'Phường 2', 2),
(7, 'Phường 3', 2),
(8, 'Phường 4', 2),
(9, 'Phường 5', 2),
(10, 'Phường 6', 2),
(11, 'Phường Đa Kao', 1),
(12, 'Phường Nguyễn Cư Trinh', 1),
(13, 'Phường 11', 3),
(14, 'Phường 13', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan`
--

CREATE TABLE `quan` (
  `id` int(11) NOT NULL,
  `TenQuan` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ThuocThanhPho` int(11) NOT NULL,
  `Tag_muabannhadat` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Tag_muaban` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `quan`
--

INSERT INTO `quan` (`id`, `TenQuan`, `ThuocThanhPho`, `Tag_muabannhadat`, `Tag_muaban`) VALUES
(1, 'Quận 1', 1, 'quan-1-d293', '1-760'),
(2, 'Quận 2', 1, 'quan-2-d294', '2-769'),
(3, 'Quận 3', 1, 'quan-3-d295', '3-770'),
(4, 'Quận 4', 1, 'quan-4-d296', '4-773'),
(5, 'Quận 5', 1, 'quan-5-d297', '5-774'),
(6, 'Quận 6', 1, 'quan-6-d298', '6-775'),
(7, 'Quận 7', 1, 'quan-7-d299', '7-778'),
(8, 'Quận 8', 1, 'quan-8-d300', '8-776'),
(9, 'Quận 9', 1, 'quan-9-d301', '9-763'),
(10, 'Quận 10', 1, 'quan-10-d302', '10-771');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhpho`
--

CREATE TABLE `thanhpho` (
  `id` int(11) NOT NULL,
  `TenThanhPho` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhpho`
--

INSERT INTO `thanhpho` (`id`, `TenThanhPho`) VALUES
(1, 'Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongketimkiem`
--

CREATE TABLE `thongketimkiem` (
  `id` int(11) NOT NULL,
  `Quan` int(11) NOT NULL,
  `Huong` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thongketimkiem`
--

INSERT INTO `thongketimkiem` (`id`, `Quan`, `Huong`, `created_at`, `updated_at`) VALUES
(4, 10, 'Đ', '2018-09-30 06:17:23', '2018-09-30 06:17:23'),
(5, 1, 'A', '2018-09-30 06:38:44', '2018-09-30 06:38:44'),
(6, 1, 'A', '2018-09-30 06:39:05', '2018-09-30 06:39:05'),
(7, 1, 'A', '2018-09-30 06:47:00', '2018-09-30 06:47:00'),
(8, 3, 'A', '2018-09-30 06:47:41', '2018-09-30 06:47:41'),
(9, 3, 'A', '2018-10-15 06:12:02', '2018-10-15 06:12:02'),
(10, 3, 'A', '2018-10-15 06:12:34', '2018-10-15 06:12:34'),
(11, 2, 'A', '2018-10-15 06:24:35', '2018-10-15 06:24:35'),
(12, 2, 'A', '2018-10-15 06:24:54', '2018-10-15 06:24:54'),
(13, 2, 'A', '2018-10-15 06:25:31', '2018-10-15 06:25:31'),
(14, 3, 'A', '2018-10-21 07:44:46', '2018-10-21 07:44:46'),
(15, 1, 'A', '2018-10-21 07:58:13', '2018-10-21 07:58:13'),
(16, 10, 'A', '2018-10-21 07:58:30', '2018-10-21 07:58:30'),
(17, 10, 'A', '2018-10-21 07:59:16', '2018-10-21 07:59:16'),
(18, 2, 'A', '2018-10-27 04:18:32', '2018-10-27 04:18:32'),
(19, 1, 'A', '2018-10-27 05:04:34', '2018-10-27 05:04:34'),
(20, 3, 'A', '2018-10-27 05:05:15', '2018-10-27 05:05:15'),
(21, 4, 'A', '2018-10-27 05:07:34', '2018-10-27 05:07:34'),
(22, 10, 'A', '2018-10-27 05:08:09', '2018-10-27 05:08:09'),
(23, 1, 'A', '2018-10-27 05:19:31', '2018-10-27 05:19:31'),
(24, 3, 'A', '2018-10-27 05:24:15', '2018-10-27 05:24:15'),
(25, 1, 'A', '2018-10-27 15:59:19', '2018-10-27 15:59:19'),
(26, 1, 'A', '2018-10-30 02:19:48', '2018-10-30 02:19:48'),
(27, 1, 'A', '2018-10-30 02:24:19', '2018-10-30 02:24:19'),
(28, 1, 'A', '2018-10-30 02:24:33', '2018-10-30 02:24:33'),
(29, 1, 'A', '2018-10-30 02:26:49', '2018-10-30 02:26:49'),
(30, 2, 'A', '2018-10-30 02:27:33', '2018-10-30 02:27:33'),
(31, 4, 'A', '2018-10-30 04:37:13', '2018-10-30 04:37:13'),
(32, 4, 'A', '2018-10-30 04:39:43', '2018-10-30 04:39:43'),
(33, 4, 'A', '2018-10-30 04:45:45', '2018-10-30 04:45:45'),
(34, 4, 'A', '2018-10-30 04:47:00', '2018-10-30 04:47:00'),
(35, 6, 'A', '2018-10-30 04:55:10', '2018-10-30 04:55:10'),
(36, 2, 'A', '2018-10-31 02:45:23', '2018-10-31 02:45:23'),
(37, 2, 'A', '2018-10-31 02:45:32', '2018-10-31 02:45:32'),
(38, 1, 'A', '2018-10-31 02:45:40', '2018-10-31 02:45:40'),
(39, 1, 'A', '2018-10-31 02:46:11', '2018-10-31 02:46:11'),
(40, 1, 'A', '2018-10-31 02:47:04', '2018-10-31 02:47:04'),
(41, 1, 'A', '2018-10-31 02:47:55', '2018-10-31 02:47:55'),
(42, 1, 'A', '2018-10-31 02:48:12', '2018-10-31 02:48:12'),
(43, 2, 'A', '2018-10-31 02:48:33', '2018-10-31 02:48:33'),
(44, 1, 'A', '2018-10-31 02:48:47', '2018-10-31 02:48:47'),
(45, 1, 'A', '2018-10-31 02:49:11', '2018-10-31 02:49:11'),
(46, 4, 'A', '2018-10-31 02:49:33', '2018-10-31 02:49:33'),
(47, 5, 'A', '2018-10-31 02:51:12', '2018-10-31 02:51:12'),
(48, 2, 'A', '2018-10-31 09:34:32', '2018-10-31 09:34:32'),
(49, 2, 'A', '2018-10-31 11:40:44', '2018-10-31 11:40:44'),
(50, 5, 'A', '2018-10-31 11:41:15', '2018-10-31 11:41:15'),
(51, 4, 'A', '2018-10-31 11:41:57', '2018-10-31 11:41:57'),
(52, 2, 'A', '2018-10-31 12:08:08', '2018-10-31 12:08:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Quyen` int(11) NOT NULL,
  `Ten` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ThuocCongTy` int(11) NOT NULL,
  `NgayHetHan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `Quyen`, `Ten`, `ThuocCongTy`, `NgayHetHan`) VALUES
(1, 'admin', 'minh.1406.nt@gmail.com', '$2y$10$licDAaU1z3WI.akCBnytmeo59Uw4wj6puHqdW9UFM7tp5bAIPQzm6', 'PcUbJU57IzGo5McoNvHtMOOSQN9wqa85YdZOCJ8qMb06k4WdAWpi4yI5b8kv', '2018-05-21 09:03:26', '2018-11-01 08:12:59', 1, 'Admin', 7, '0000-00-00 00:00:00'),
(2, 'congminh', 'darkkiller1406@yahoo.com', '$2y$10$IuHVECWVhbUpFbMGYMm/UOoLKEVWphneTMvmB6sDGhJj/Q41XIoPS', 'gkgXQJWwgqz28DsVITJKfUTkvhvgon1ZatFEw83lclcnNIv6cc80xToLJgc6', '2018-05-21 09:20:52', '2018-11-01 08:13:03', 2, 'Công Minh', 7, '0000-00-00 00:00:00'),
(4, 'congminh123', 'test@gmail.com', '$2y$10$i7Y8edEvPkebMmAraerAKO96S6fZEzYOhHqLrJpShNJMheCvuD6w2', NULL, '2018-11-01 07:54:34', '2018-11-01 07:54:34', 2, 'Nguyễn Công Minh', 7, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeucau`
--

CREATE TABLE `yeucau` (
  `id` int(11) NOT NULL,
  `MaYeuCau` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TenKhach` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DienThoai` varchar(11) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `LoaiYeuCau` int(11) NOT NULL,
  `NoiDung` varchar(500) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `id_dat` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `yeucau`
--

INSERT INTO `yeucau` (`id`, `MaYeuCau`, `TenKhach`, `Email`, `DienThoai`, `LoaiYeuCau`, `NoiDung`, `id_dat`, `created_at`, `updated_at`) VALUES
(2, 'YC001', 'Nguyễn Công Minh', 'darkkiller1406@yahoo.com', '0905456789', 1, '123', 3, '2018-10-28 07:50:31', '2018-10-28 07:50:31'),
(3, 'YC003', 'Nguyễn Công Minh', 'darkkiller1406@yahoo.com', '0905456789', 1, '123', 4, '2018-10-28 07:51:20', '2018-10-28 07:51:20');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `congty`
--
ALTER TABLE `congty`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dat`
--
ALTER TABLE `dat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SoHuu` (`SoHuu`),
  ADD KEY `Quan` (`Phuong`);

--
-- Chỉ mục cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_Dat` (`ID_Dat`),
  ADD KEY `ID_KhachHang` (`ID_KhachHang_Mua`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lichsugiaodich`
--
ALTER TABLE `lichsugiaodich`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NguoiThucHien` (`NguoiThucHien`);

--
-- Chỉ mục cho bảng `phuong`
--
ALTER TABLE `phuong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ThuocQuan` (`ThuocQuan`);

--
-- Chỉ mục cho bảng `quan`
--
ALTER TABLE `quan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ThuocThanhPho` (`ThuocThanhPho`);

--
-- Chỉ mục cho bảng `thanhpho`
--
ALTER TABLE `thanhpho`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thongketimkiem`
--
ALTER TABLE `thongketimkiem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Quan` (`Quan`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `yeucau`
--
ALTER TABLE `yeucau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dat` (`id_dat`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `congty`
--
ALTER TABLE `congty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `dat`
--
ALTER TABLE `dat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `lichsugiaodich`
--
ALTER TABLE `lichsugiaodich`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `phuong`
--
ALTER TABLE `phuong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `quan`
--
ALTER TABLE `quan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `thanhpho`
--
ALTER TABLE `thanhpho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `thongketimkiem`
--
ALTER TABLE `thongketimkiem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `yeucau`
--
ALTER TABLE `yeucau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dat`
--
ALTER TABLE `dat`
  ADD CONSTRAINT `dat_ibfk_5` FOREIGN KEY (`Phuong`) REFERENCES `phuong` (`id`);

--
-- Các ràng buộc cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD CONSTRAINT `hopdong_ibfk_3` FOREIGN KEY (`ID_Dat`) REFERENCES `dat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hopdong_ibfk_4` FOREIGN KEY (`ID_KhachHang_Mua`) REFERENCES `khachhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lichsugiaodich`
--
ALTER TABLE `lichsugiaodich`
  ADD CONSTRAINT `lichsugiaodich_ibfk_1` FOREIGN KEY (`NguoiThucHien`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phuong`
--
ALTER TABLE `phuong`
  ADD CONSTRAINT `phuong_ibfk_1` FOREIGN KEY (`ThuocQuan`) REFERENCES `quan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `quan`
--
ALTER TABLE `quan`
  ADD CONSTRAINT `quan_ibfk_1` FOREIGN KEY (`ThuocThanhPho`) REFERENCES `thanhpho` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thongketimkiem`
--
ALTER TABLE `thongketimkiem`
  ADD CONSTRAINT `thongketimkiem_ibfk_1` FOREIGN KEY (`Quan`) REFERENCES `quan` (`id`);

--
-- Các ràng buộc cho bảng `yeucau`
--
ALTER TABLE `yeucau`
  ADD CONSTRAINT `yeucau_ibfk_1` FOREIGN KEY (`id_dat`) REFERENCES `dat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

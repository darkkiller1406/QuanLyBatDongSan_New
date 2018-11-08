-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 08, 2018 lúc 10:58 AM
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
  `Link` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Logo` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `DiaChi` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SDT` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `congty`
--

INSERT INTO `congty` (`id`, `TenCongTy`, `Link`, `Logo`, `DiaChi`, `SDT`, `Email`, `created_at`, `updated_at`) VALUES
(0, 'admin', 'admin', NULL, 'admin', '0569885811', 'minh.1406@gmail.com', '2018-11-07 00:00:00', '2018-11-06 08:19:08'),
(7, 'LightZ Real Estate', 'test', 'logo_test.jpg', 'test', '01869885811', 'test@gmail.com', '2018-11-01 14:54:34', '2018-11-08 03:21:31'),
(12, 'New Real Estate', 'test2', 'logo_test2.jpg', '212 phương sài', '0569885812', 'minh.1402.nt@gmail.com', '2018-11-03 12:28:41', '2018-11-08 03:21:35'),
(13, 'HCMGroup', 'test3', 'logo_test3.jpg', 'test3', '0569885813', 'test3@gmail.com', '2018-11-03 12:31:11', '2018-11-08 03:21:38');

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
(1, '1234', 5, 10, 0, 50, 600000, 30000000, 7, 1, 'Đông', '163/24/92B Tô Hiến Thành', '10.782843;106.67134699999997', 14, 'LK05_1.jpg;LK05_2.jpg;LK05_3.jpg;', NULL, 77, '2018-05-24 07:42:00', '2018-11-08 02:46:45'),
(3, 'LK07', 5, 18, 0, 90, 20000000, 1800000000, 7, 1, 'Bắc', '169/24/92B Tô Hiến Thành', '10.782621; 106.6716778', 14, 'LK05_1.jpg;LK05_2.jpg;LK05_3.jpg;', 'Lô đất năm sau Trung tâm thương mại, khu dân cư quanh đông đúc, gần trường đại học, mặt tiền đường rộng 8m, cơ sở hạ tầng hoàn thiện. Rất thuận tiện việc mua bán , kinh doanh. \r\nDiện tích: 60m2( 5x12) \r\nThương lượng chính chủ, không tiếp cò', 174, '2018-08-07 10:07:54', '2018-11-08 09:40:45'),
(4, 'LK08', 4, 20, 0, 80, 15000000, 1200000000, 12, 1, 'Đông', '169/24/92B Tô Hiến Thành', '10.782621; 106.6716778', 14, 'LK06_1.jpg;LK06_2.jpg;', 'Lô đất năm sau Trung tâm thương mại, khu dân cư quanh đông đúc, gần trường đại học, mặt tiền đường rộng 8m, cơ sở hạ tầng hoàn thiện. Rất thuận tiện việc mua bán , kinh doanh. \r\nDiện tích: 60m2( 5x12) \r\nThương lượng chính chủ, không tiếp cò', 84, '2018-08-07 10:07:54', '2018-11-06 08:02:03'),
(5, 'LK09', 5, 18, 0, 90, 22000000, 1980000000, 7, 1, 'Bắc', '169/24/92B Tô Hiến Thành', '10.782621; 106.6716778', 14, 'LK05_1.jpg;LK05_2.jpg;LK05_3.jpg;', 'Lô đất năm sau Trung tâm thương mại, khu dân cư quanh đông đúc, gần trường đại học, mặt tiền đường rộng 8m, cơ sở hạ tầng hoàn thiện. Rất thuận tiện việc mua bán , kinh doanh. \r\nDiện tích: 60m2( 5x12) \r\nThương lượng chính chủ, không tiếp cò', 97, '2018-08-07 10:07:54', '2018-11-08 02:46:52'),
(6, 'LK10', 4, 20, 0, 80, 15000000, 1200000000, 12, 1, 'Đông', '169/24/92B Tô Hiến Thành', '10.782621; 106.6716778', 14, 'LK06_1.jpg;LK06_2.jpg;', 'Lô đất năm sau Trung tâm thương mại, khu dân cư quanh đông đúc, gần trường đại học, mặt tiền đường rộng 8m, cơ sở hạ tầng hoàn thiện. Rất thuận tiện việc mua bán , kinh doanh. \r\nDiện tích: 60m2( 5x12) \r\nThương lượng chính chủ, không tiếp cò', 79, '2018-08-07 10:07:54', '2018-11-08 08:34:30'),
(8, '123', 10, 120, 0, 1200, 6230250, 7476300000, 7, 0, 'Đông', '256 Trần Văn Đang', '10.7842142;106.67331469999999', 13, '123_1.jpg;', NULL, 7, '2018-10-20 05:44:55', '2018-11-03 06:03:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdong`
--

CREATE TABLE `hopdong` (
  `id` int(11) NOT NULL,
  `MaHopDong` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ID_Dat` int(11) NOT NULL,
  `ID_KhachHang_Mua` int(11) NOT NULL,
  `FileHopDong` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

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
  `DTCD` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `CMND` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ThuocCongTy` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `MaKhachHang`, `XungHo`, `HoVaTenDem`, `Ten`, `DTDD`, `DTCD`, `CMND`, `DiaChi`, `Email`, `ThuocCongTy`, `created_at`, `updated_at`) VALUES
(1, 'KH001', 'Ông', 'Nguyễn Công', 'Minh', '01869885811', '02583812656', '225582114', '163/24/92B Tô Hiến Thành, P13, Q10', 'minh.1406@gmail.com', 7, '2018-05-21 04:50:13', '2018-11-02 04:46:41'),
(3, 'KH002', 'Ông', 'Nguyễn Quang', 'Huy', '0905456781', '02583812654', '22552119', '163/24/92B Tô Hiến Thành, P13, Q10', 'darkkiller1406@yahoo.com', 7, '2018-05-21 09:04:31', '2018-11-02 04:46:43'),
(4, 'KH004', 'Bà', 'Trà', 'Giang', '0905456789', '02583812657', '22552118', '163/24/92B Tô Hiến Thành, P13, Q10', 'darkkiller1407@yahoo.com', 7, '2018-05-21 09:47:00', '2018-11-05 06:46:55'),
(5, 'KH005', 'ông', 'Nguyễn Công', 'Minh', '0905456733', '02583812122', '225522118', '163/24/92B Tô Hiến Thành, P13, Q10', 'darkkiller1423@yahoo.com', 7, '2018-06-28 06:31:04', '2018-11-05 06:46:58'),
(6, 'KH004', 'ông', 'Nguyễn Công', 'Minh', '123456781', '123456781', '225582114', '212 Phương Sài', 'minh.1406.nt@gmail.com', 7, '2018-11-02 07:38:55', '2018-11-02 07:41:46');

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
(67, 120000, 'Gia hạn tài khoản', 2, '2018-11-07 11:55:57', '2018-11-07 04:55:57', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(52, 2, 'A', '2018-10-31 12:08:08', '2018-10-31 12:08:08'),
(53, 1, 'A', '2018-11-04 04:00:37', '2018-11-04 04:00:37'),
(54, 1, 'A', '2018-11-04 04:06:00', '2018-11-04 04:06:00'),
(55, 1, 'A', '2018-11-04 04:08:29', '2018-11-04 04:08:29'),
(56, 1, 'A', '2018-11-04 04:09:06', '2018-11-04 04:09:06'),
(57, 1, 'A', '2018-11-04 04:09:39', '2018-11-04 04:09:39'),
(58, 1, 'A', '2018-11-04 04:09:56', '2018-11-04 04:09:56'),
(59, 1, 'A', '2018-11-04 04:10:48', '2018-11-04 04:10:48'),
(60, 1, 'A', '2018-11-04 04:11:35', '2018-11-04 04:11:35'),
(61, 1, 'A', '2018-11-04 04:12:13', '2018-11-04 04:12:13'),
(62, 1, 'A', '2018-11-04 04:12:48', '2018-11-04 04:12:48'),
(63, 1, 'A', '2018-11-04 04:13:07', '2018-11-04 04:13:07'),
(64, 3, 'A', '2018-11-04 04:26:23', '2018-11-04 04:26:23');

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
  `LoaiTaiKhoan` int(11) NOT NULL,
  `NgayHetHan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `Quyen`, `Ten`, `ThuocCongTy`, `LoaiTaiKhoan`, `NgayHetHan`) VALUES
(0, 'admin', 'minh.1406.nt@gmail.com', '$2y$10$licDAaU1z3WI.akCBnytmeo59Uw4wj6puHqdW9UFM7tp5bAIPQzm6', 'XSdJOQQYZb5wGkWsjFjuoHLr0nAeg7Qagv7ojGICu45eiY3KllGvSeit2KdJ', '2018-05-21 09:03:26', '2018-11-07 08:29:37', 0, 'Admin', 0, 0, '2020-01-29 00:00:00'),
(1, 'congminh', 'kisivodanh1406@gmail.com', '$2y$10$mY9k0CwUBAsJtc7dbrmCHOVJ5yIV.xKCgPKFzDeDE0FWql6tNru5y', 'MDLmDEgBYzovMreYdKWR7ldm3UlkWSHPbqBjovDfH9YNypa8NKhh1efnvzzY', '2018-05-21 09:20:52', '2018-11-08 02:36:58', 1, 'Công Minh', 7, 1, '2019-01-29 00:00:00'),
(2, 'congminh123', 'test@gmail.com', '$2y$10$i7Y8edEvPkebMmAraerAKO96S6fZEzYOhHqLrJpShNJMheCvuD6w2', NULL, '2018-11-01 07:54:34', '2018-11-07 03:38:30', 1, 'Nguyễn Công Minh', 12, 1, '2018-12-03 00:00:00'),
(3, 'admin', 'test4@gmail.com', '$2y$10$licDAaU1z3WI.akCBnytmeo59Uw4wj6puHqdW9UFM7tp5bAIPQzm6', 'LVWUFqKsCfuiS5Bd0x64B6eLEEG4Cu6SN3VjYPqEOU7EEiIddWcfnLqAEt9r', '2018-11-04 08:19:01', '2018-11-07 03:38:35', 1, 'Nguyễn Công Minh', 13, 1, '2018-12-29 00:00:00'),
(4, 'test4', 'test4', '$2y$10$licDAaU1z3WI.akCBnytmeo59Uw4wj6puHqdW9UFM7tp5bAIPQzm6', NULL, NULL, '2018-11-07 04:55:57', 2, 'test4', 7, 1, '2019-01-29 00:00:00');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `ThuocCongTy` (`ThuocCongTy`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `ThuocCongTy` (`ThuocCongTy`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `dat`
--
ALTER TABLE `dat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `lichsugiaodich`
--
ALTER TABLE `lichsugiaodich`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
  ADD CONSTRAINT `dat_ibfk_5` FOREIGN KEY (`Phuong`) REFERENCES `phuong` (`id`),
  ADD CONSTRAINT `dat_ibfk_6` FOREIGN KEY (`SoHuu`) REFERENCES `congty` (`id`);

--
-- Các ràng buộc cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD CONSTRAINT `hopdong_ibfk_3` FOREIGN KEY (`ID_Dat`) REFERENCES `dat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hopdong_ibfk_4` FOREIGN KEY (`ID_KhachHang_Mua`) REFERENCES `khachhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`ThuocCongTy`) REFERENCES `congty` (`id`);

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
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ThuocCongTy`) REFERENCES `congty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `yeucau`
--
ALTER TABLE `yeucau`
  ADD CONSTRAINT `yeucau_ibfk_1` FOREIGN KEY (`id_dat`) REFERENCES `dat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

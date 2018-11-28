-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2018 lúc 01:47 PM
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
-- Cấu trúc bảng cho bảng `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) NOT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, '1', 'Đăng tin bán đất', 1, 'App\\Dat', 0, 'App\\User', NULL, '2018-11-08 10:30:55', '2018-11-08 10:30:55'),
(2, '1', 'Đăng tin bán đất', 1, 'App\\Dat', 1, 'App\\User', NULL, '2018-11-08 10:33:11', '2018-11-08 10:33:11'),
(3, '1', 'Đăng tin bán đất', 1, 'App\\Dat', 1, 'App\\User', NULL, '2018-11-09 02:26:52', '2018-11-09 02:26:52'),
(4, '5', 'Hủy tin bán đất', 1, 'App\\Dat', 1, 'App\\User', NULL, '2018-11-09 02:43:49', '2018-11-09 02:43:49'),
(5, '4', 'Đăng tin bán đất', 1, 'App\\Dat', 2, 'App\\User', NULL, '2018-11-09 02:43:55', '2018-11-09 02:43:55'),
(6, '5', 'Hủy tin bán đất', 1, 'App\\Dat', 1, 'App\\User', NULL, '2018-11-09 02:55:32', '2018-11-09 02:55:32'),
(7, '4', 'Đăng tin bán đất', 1, 'App\\Dat', 1, 'App\\User', NULL, '2018-11-09 02:55:54', '2018-11-09 02:55:54'),
(8, '3', 'Cập nhật thông tin lô đất', 1, 'App\\Dat', 1, 'App\\User', '{\"Rong\":1,\"Gia\":60000000,\"Map\":null,\"DonGia\":6000000,\"DienTich\":10}', '2018-11-09 03:01:09', '2018-11-09 03:01:09'),
(9, '3', 'Cập nhật thông tin lô đất', 1, 'App\\Dat', 1, 'App\\User', '{\"Rong\":5,\"Gia\":300000000,\"DienTich\":50,\"GhiChu\":\"abc\"}', '2018-11-09 03:06:16', '2018-11-09 03:06:16'),
(10, '3', 'Cập nhật thông tin lô đất 1234', 1, 'App\\Dat', 1, 'App\\User', '{\"Gia\":3000000000,\"DonGia\":60000000}', '2018-11-09 08:29:56', '2018-11-09 08:29:56'),
(11, '3', 'Cập nhật thông tin lô đất 1234', 1, 'App\\Dat', 1, 'App\\User', '{\"Rong\":6,\"Gia\":3600000000,\"DienTich\":60}', '2018-11-09 08:37:39', '2018-11-09 08:37:39'),
(12, '3', 'Cập nhật thông tin lô đất 123', 1, 'App\\Dat', 1, 'App\\User', '{\"KyHieuLoDat\":\"123\",\"Map\":null,\"GhiChu\":null}', '2018-11-10 08:16:47', '2018-11-10 08:16:47'),
(13, '3', 'Cập nhật thông tin lô đất LK06', 1, 'App\\Dat', 1, 'App\\User', '{\"Map\":\"10.783498236001375;106.67679228808288\",\"DiaChi\":\"236B \\u0110\\u01b0\\u1eddng L\\u00ea V\\u0103n S\\u1ef9, Ph\\u01b0\\u1eddng 1, T\\u00e2n B\\u00ecnh, H\\u1ed3 Ch\\u00ed Minh, Vi\\u1ec7t Nam\"}', '2018-11-10 08:27:36', '2018-11-10 08:27:36'),
(14, '3', 'Cập nhật thông tin lô đất LK06', 1, 'App\\Dat', 1, 'App\\User', '{\"DiaChi\":\"236B \\u0110\\u01b0\\u1eddng L\\u00ea V\\u0103n S\\u1ef9, Ph\\u01b0\\u1eddng 1, T\\u00e2n B\\u00ecnh, H\\u1ed3 Ch\\u00ed Minh\"}', '2018-11-10 08:31:08', '2018-11-10 08:31:08'),
(15, '3', 'Cập nhật thông tin lô đất LK06', 1, 'App\\Dat', 1, 'App\\User', '{\"Map\":\"10.778647485860946;106.66841291542164\",\"Phuong\":13,\"DiaChi\":\"133\\/R\\/111A T\\u00f4 Hi\\u1ebfn Th\\u00e0nh, Ph\\u01b0\\u1eddng 13, Qu\\u1eadn 10, H\\u1ed3 Ch\\u00ed Minh\"}', '2018-11-10 08:35:03', '2018-11-10 08:35:03'),
(16, '3', 'Cập nhật thông tin lô đất LK06', 1, 'App\\Dat', 1, 'App\\User', '{\"Phuong\":14}', '2018-11-10 08:35:18', '2018-11-10 08:35:18'),
(17, '3', 'Cập nhật thông tin lô đất LK07', 3, 'App\\Dat', 1, 'App\\User', '{\"Map\":\"10.781330293476772;106.67061248308107\",\"Huong\":\"\\u0110\\u00f4ng\",\"GhiChu\":null,\"DiaChi\":\"99\\/79\\/16 T\\u00f4 Hi\\u1ebfn Th\\u00e0nh, Ph\\u01b0\\u1eddng 13, Qu\\u1eadn 10, H\\u1ed3 Ch\\u00ed Minh\"}', '2018-11-10 08:38:51', '2018-11-10 08:38:51'),
(18, '3', 'Cập nhật thông tin lô đất LK09', 5, 'App\\Dat', 1, 'App\\User', '{\"Map\":\"10.782578842364318;106.67161342698364\",\"Huong\":\"\\u0110\\u00f4ng\",\"GhiChu\":null,\"DiaChi\":\"24 T\\u00f4 Hi\\u1ebfn Th\\u00e0nh, Ph\\u01b0\\u1eddng 13, Qu\\u1eadn 10, H\\u1ed3 Ch\\u00ed Minh\"}', '2018-11-10 08:39:13', '2018-11-10 08:39:13'),
(19, '3', 'Cập nhật thông tin lô đất LK11', 8, 'App\\Dat', 1, 'App\\User', '{\"Map\":\"10.785647548506581;106.67138350950927\",\"DiaChi\":\"219\\/9\\/6 Tr\\u1ea7n V\\u0103n \\u0110ang, Ph\\u01b0\\u1eddng 11, Qu\\u1eadn 3, H\\u1ed3 Ch\\u00ed Minh\"}', '2018-11-10 08:39:27', '2018-11-10 08:39:27'),
(20, '1', 'Thêm lô đất LK05', 9, 'App\\Dat', 1, 'App\\User', '[]', '2018-11-10 08:41:25', '2018-11-10 08:41:25'),
(21, '3', 'Cập nhật thông tin lô đất LK09', 5, 'App\\Dat', 1, 'App\\User', '{\"Map\":\"10.778877460460928;106.66861100000006\",\"DiaChi\":\"133\\/R\\/111 T\\u00f4 Hi\\u1ebfn Th\\u00e0nh, Ph\\u01b0\\u1eddng 13, Qu\\u1eadn 10, H\\u1ed3 Ch\\u00ed Minh\"}', '2018-11-10 08:47:42', '2018-11-10 08:47:42'),
(22, '3', 'Cập nhật thông tin lô đất LK06', 1, 'App\\Dat', 1, 'App\\User', '{\"Map\":\"10.778888;106.66861100000006\",\"DiaChi\":\"133\\/R\\/111 T\\u00f4 Hi\\u1ebfn Th\\u00e0nh, Ph\\u01b0\\u1eddng 13, Qu\\u1eadn 10, H\\u1ed3 Ch\\u00ed Minh\"}', '2018-11-10 08:47:57', '2018-11-10 08:47:57'),
(23, '3', 'Cập nhật thông tin lô đất LK09', 5, 'App\\Dat', 1, 'App\\User', '{\"Map\":\"10.778888;106.66861100000006\",\"DiaChi\":\"133\\/R\\/111 T\\u00f4 Hi\\u1ebfn Th\\u00e0nh, Ph\\u01b0\\u1eddng 13, Qu\\u1eadn 10, H\\u1ed3 Ch\\u00ed Minh\"}', '2018-11-10 08:54:37', '2018-11-10 08:54:37'),
(24, '3', 'Cập nhật thông tin lô đất LK09', 5, 'App\\Dat', 1, 'App\\User', '{\"Map\":\"10.778719367329806;106.66776342195135\",\"DiaChi\":\"243 T\\u00f4 Hi\\u1ebfn Th\\u00e0nh, Ph\\u01b0\\u1eddng 13, Qu\\u1eadn 10, H\\u1ed3 Ch\\u00ed Minh\"}', '2018-11-10 08:58:43', '2018-11-10 08:58:43'),
(25, '3', 'Cập nhật thông tin lô đất LK05', 9, 'App\\Dat', 1, 'App\\User', '{\"Map\":\"10.7805346;106.66898170000002\",\"Huong\":\"\\u0110\\u00f4ng\"}', '2018-11-10 09:00:20', '2018-11-10 09:00:20'),
(26, '1', 'Thêm lô đất 123', 10, 'App\\Dat', 1, 'App\\User', '[]', '2018-11-10 09:01:25', '2018-11-10 09:01:25'),
(27, '2', 'Xóa lô đất 123', 10, 'App\\Dat', 1, 'App\\User', '[]', '2018-11-10 09:01:35', '2018-11-10 09:01:35'),
(28, '1', 'Thêm lô đất New', 10, 'App\\Dat', 1, 'App\\User', '[]', '2018-11-20 04:53:58', '2018-11-20 04:53:58'),
(29, '4', 'Đăng tin bán đất', 10, 'App\\Dat', 1, 'App\\User', '{\"TrangThai\":\"1\"}', '2018-11-20 04:54:13', '2018-11-20 04:54:13'),
(30, '1', 'Thêm lô đất LK123Test', 11, 'App\\Dat', 1, 'App\\User', '[]', '2018-11-20 12:02:53', '2018-11-20 12:02:53'),
(31, '4', 'Đăng tin bán đất', 11, 'App\\Dat', 1, 'App\\User', '{\"TrangThai\":\"1\"}', '2018-11-20 12:07:32', '2018-11-20 12:07:32'),
(32, '1', 'Thêm hợp đồng 123', 1, 'App\\HopDong', 1, 'App\\User', '[]', '2018-11-20 12:41:15', '2018-11-20 12:41:15'),
(33, '2', 'Xóa yêu cầu mua đất - LK07', 2, 'App\\YeuCau', 1, 'App\\User', '[]', '2018-11-20 12:46:49', '2018-11-20 12:46:49');

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
(0, 'admin', 'admin', NULL, 'admin', '0569885811', 'minh.1406.nt@gmail.com', '2018-11-07 00:00:00', '2018-11-09 10:14:36'),
(7, 'LightZ Real Estate', 'test', 'logo_test.jpg', 'test', '01869885811', 'kisivodanh1406@gmail.com', '2018-11-01 14:54:34', '2018-11-09 10:15:16'),
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
  `DonGiaMua` double NOT NULL,
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

INSERT INTO `dat` (`id`, `KyHieuLoDat`, `Rong`, `Dai`, `NoHau`, `DienTich`, `DonGiaMua`, `DonGia`, `Gia`, `SoHuu`, `TrangThai`, `Huong`, `DiaChi`, `Map`, `Phuong`, `HinhAnh`, `GhiChu`, `LuotXem`, `created_at`, `updated_at`) VALUES
(1, 'LK06', 6, 10, 0, 60, 50000000, 60000000, 3600000000, 7, 0, 'Đông', '133/R/111 Tô Hiến Thành, Phường 13, Quận 10, Hồ Chí Minh', '10.778888;106.66861100000006', 14, 'LK05_1.jpg;LK05_2.jpg;LK05_3.jpg;', NULL, 82, '2018-05-24 07:42:00', '2018-11-20 12:45:15'),
(3, 'LK07', 5, 18, 0, 90, 10000000, 20000000, 1800000000, 7, 0, 'Đông', '99/79/16 Tô Hiến Thành, Phường 13, Quận 10, Hồ Chí Minh', '10.781330293476772;106.67061248308107', 14, 'LK05_1.jpg;LK05_2.jpg;LK05_3.jpg;', NULL, 188, '2018-08-07 10:07:54', '2018-11-20 12:46:15'),
(4, 'LK08', 4, 20, 0, 80, 10000000, 15000000, 1200000000, 12, 0, 'Đông', '169/24/92B Tô Hiến Thành, Phường 13, Quận 10, Hồ Chí Minh', '10.782621; 106.6716778', 14, 'LK06_1.jpg;LK06_2.jpg;', 'Lô đất năm sau Trung tâm thương mại, khu dân cư quanh đông đúc, gần trường đại học, mặt tiền đường rộng 8m, cơ sở hạ tầng hoàn thiện. Rất thuận tiện việc mua bán , kinh doanh. \r\nDiện tích: 60m2( 5x12) \r\nThương lượng chính chủ, không tiếp cò', 85, '2018-08-07 10:07:54', '2018-11-20 11:55:25'),
(5, 'LK09', 5, 18, 0, 90, 12000000, 22000000, 1980000000, 7, 0, 'Đông', '243 Tô Hiến Thành, Phường 13, Quận 10, Hồ Chí Minh', '10.778719367329806;106.66776342195135', 14, 'LK05_1.jpg;LK05_2.jpg;LK05_3.jpg;', NULL, 97, '2018-08-07 10:07:54', '2018-11-20 11:55:32'),
(6, 'LK10', 4, 20, 0, 80, 10000000, 15000000, 1200000000, 12, 0, 'Đông', '169/24/92B Tô Hiến Thành, Phường 13, Quận 10, Hồ Chí Minh', '10.782621; 106.6716778', 14, 'LK06_1.jpg;LK06_2.jpg;', 'Lô đất năm sau Trung tâm thương mại, khu dân cư quanh đông đúc, gần trường đại học, mặt tiền đường rộng 8m, cơ sở hạ tầng hoàn thiện. Rất thuận tiện việc mua bán , kinh doanh. \r\nDiện tích: 60m2( 5x12) \r\nThương lượng chính chủ, không tiếp cò', 79, '2018-08-07 10:07:54', '2018-11-20 11:55:40'),
(8, 'LK11', 10, 120, 0, 1200, 4000000, 6230250, 7476300000, 7, 0, 'Đông', '219/9/6 Trần Văn Đang, Phường 11, Quận 3, Hồ Chí Minh', '10.785647548506581;106.67138350950927', 13, '123_1.jpg;', NULL, 8, '2018-10-20 05:44:55', '2018-11-20 11:59:26'),
(9, 'LK05', 5, 15, 0, 75, 15000000, 20000000, 1500000000, 7, 3, 'Đông', '163 Tô Hiến Thành, Phường 13, Quận 10, Hồ Chí Minh', '10.7805346;106.66898170000002', 14, 'LK05_1.jpg;', NULL, 0, '2018-11-10 08:41:25', '2018-11-20 11:55:56'),
(10, 'New', 5, 10, 0, 50, 10000000, 12000000, 600000000, 7, 0, 'Nam', '236B/1A Đường Lê Văn Sỹ, Phường 1, Tân Bình, Hồ Chí Minh', '10.79616;106.66695700000002', 141, 'New_1.jpg;', NULL, 1, '2018-11-20 04:53:58', '2018-11-20 11:56:02'),
(11, 'LK123Test', 5, 15, 2, 90, 100, 120, 10800, 7, 2, 'Đông', '51/10/9 Cao Thắng, Phường 3, Quận 3, Hồ Chí Minh', '10.770076391507425;106.68116079496758', 7, 'LK123Test_1.jpg;', NULL, 24, '2018-11-20 12:02:53', '2018-11-20 12:41:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gioithieu`
--

CREATE TABLE `gioithieu` (
  `id` int(11) NOT NULL,
  `TieuDe` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `NoiDung` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `CongTy` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `gioithieu`
--

INSERT INTO `gioithieu` (`id`, `TieuDe`, `NoiDung`, `CongTy`, `created_at`, `updated_at`) VALUES
(5, 'Bất động sản LightZ Real Estate - Tổ ấm trong mơ', '<figure class=\"easyimage easyimage-side\"><img alt=\"\" sizes=\"100vw\" src=\"https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg\" srcset=\"https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_210 210w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_420 420w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_630 630w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_840 840w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_1050 1050w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_1260 1260w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_1470 1470w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_1680 1680w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_1890 1890w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_2048 2048w\" width=\"2048\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>Với hơn 15 năm kinh nghiệm l&agrave;m nghề k&yacute; gửi nh&agrave; đất, C&ocirc;ng ty cổ phần bất động sản LightZ Real Estate đ&atilde; c&oacute; hơn 2.375 kh&aacute;ch h&agrave;ng đ&atilde; v&agrave; đang sữ dụng dịch vụ k&yacute; gửi của ch&uacute;ng t&ocirc;i v&agrave; tất cả kh&aacute;ch h&agrave;ng điều h&agrave;i l&ograve;ng về phong c&aacute;ch phục vụ cũng như sự hiệu quả của việc k&yacute; gửi mang lại.<br />\r\nHiện nay, C&ocirc;ng ty ch&uacute;ng t&ocirc;i c&oacute; rất nhiều Kh&aacute;ch h&agrave;ng c&oacute; nhu cầu t&igrave;m Mua &amp; B&aacute;n : Đất nền, Đất thổ cư, Đất nền dự &aacute;n, Đất x&acirc;y dựng nh&agrave; xưởng, Nh&agrave; kho, Nh&agrave; xưởng, Nh&agrave; cho thu&ecirc;, Văn ph&ograve;ng cho thu&ecirc;, Mặt bằng cho thu&ecirc;, Nh&agrave; cấp 4, Nh&agrave; trọ, Nh&agrave; nghỉ, Kh&aacute;ch sạn, Resort&hellip;tại c&aacute;c quận trong TP. Hồ Ch&iacute; Minh cũng như c&aacute;c khu vực l&acirc;n cận. Ngo&agrave;i ra LightZ Real Estate c&ograve;n tư vấn đầu tư, hỗ trợ ph&aacute;p l&yacute;, đo vẽ, thiết kế, x&acirc;y dựng, hợp thức h&oacute;a nh&agrave; đất cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Light Estate l&agrave; c&ocirc;ng ty chuy&ecirc;n nghiệp trong lĩnh vực m&ocirc;i giới bất động sản, ch&uacute;ng t&ocirc;i l&agrave;m việc tr&ecirc;n tinh thần hợp t&aacute;c l&acirc;u d&agrave;i v&agrave; minh bạch gi&uacute;p Người B&aacute;n nhanh ch&oacute;ng b&aacute;n được bất động sản theo gi&aacute; m&igrave;nh mong muốn thỏa thuận trực tiếp với Người Mua tr&ecirc;n phạm vi To&agrave;n Cầu m&agrave; kh&ocirc;ng bị m&ocirc;i giới tự do đẩy gi&aacute; qu&aacute; cao dẫn đến kh&oacute; b&aacute;n, thậm ch&iacute; kh&ocirc;ng thể b&aacute;n được.<br />\r\nNhằm cung ứng một giải ph&aacute;p hiệu quả cho nhu cầu n&agrave;y, LightZ Real Estate đ&atilde; ph&aacute;t triển dịch vụ K&Yacute; GỬI NH&Agrave; ĐẤT để gi&uacute;p người b&aacute;n nh&agrave;, cho thu&ecirc; bất động sản một c&aacute;ch NHANH CH&Oacute;NG v&agrave; HIỆU QUẢ NHẤT.</p>\r\n\r\n<p>Kh&ocirc;ng k&ecirc; gi&aacute; b&aacute;n - Mua b&aacute;n Ch&iacute;nh Chủ - Ph&aacute;p l&yacute; ho&agrave;n thiện.</p>', 7, '2018-11-11 12:05:20', '2018-11-11 12:58:42'),
(8, 'Bất động sản LightZ Real Estate - Tổ ấm trong mơ', '<figure class=\"easyimage easyimage-side\"><img alt=\"\" sizes=\"100vw\" src=\"https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg\" srcset=\"https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_210 210w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_420 420w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_630 630w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_840 840w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_1050 1050w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_1260 1260w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_1470 1470w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_1680 1680w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_1890 1890w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_2048 2048w\" width=\"2048\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>Với hơn 15 năm kinh nghiệm l&agrave;m nghề k&yacute; gửi nh&agrave; đất, C&ocirc;ng ty cổ phần bất động sản LightZ Real Estate đ&atilde; c&oacute; hơn 2.375 kh&aacute;ch h&agrave;ng đ&atilde; v&agrave; đang sữ dụng dịch vụ k&yacute; gửi của ch&uacute;ng t&ocirc;i v&agrave; tất cả kh&aacute;ch h&agrave;ng điều h&agrave;i l&ograve;ng về phong c&aacute;ch phục vụ cũng như sự hiệu quả của việc k&yacute; gửi mang lại.<br />\r\nHiện nay, C&ocirc;ng ty ch&uacute;ng t&ocirc;i c&oacute; rất nhiều Kh&aacute;ch h&agrave;ng c&oacute; nhu cầu t&igrave;m Mua &amp; B&aacute;n : Đất nền, Đất thổ cư, Đất nền dự &aacute;n, Đất x&acirc;y dựng nh&agrave; xưởng, Nh&agrave; kho, Nh&agrave; xưởng, Nh&agrave; cho thu&ecirc;, Văn ph&ograve;ng cho thu&ecirc;, Mặt bằng cho thu&ecirc;, Nh&agrave; cấp 4, Nh&agrave; trọ, Nh&agrave; nghỉ, Kh&aacute;ch sạn, Resort&hellip;tại c&aacute;c quận trong TP. Hồ Ch&iacute; Minh cũng như c&aacute;c khu vực l&acirc;n cận. Ngo&agrave;i ra LightZ Real Estate c&ograve;n tư vấn đầu tư, hỗ trợ ph&aacute;p l&yacute;, đo vẽ, thiết kế, x&acirc;y dựng, hợp thức h&oacute;a nh&agrave; đất cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Light Estate l&agrave; c&ocirc;ng ty chuy&ecirc;n nghiệp trong lĩnh vực m&ocirc;i giới bất động sản, ch&uacute;ng t&ocirc;i l&agrave;m việc tr&ecirc;n tinh thần hợp t&aacute;c l&acirc;u d&agrave;i v&agrave; minh bạch gi&uacute;p Người B&aacute;n nhanh ch&oacute;ng b&aacute;n được bất động sản theo gi&aacute; m&igrave;nh mong muốn thỏa thuận trực tiếp với Người Mua tr&ecirc;n phạm vi To&agrave;n Cầu m&agrave; kh&ocirc;ng bị m&ocirc;i giới tự do đẩy gi&aacute; qu&aacute; cao dẫn đến kh&oacute; b&aacute;n, thậm ch&iacute; kh&ocirc;ng thể b&aacute;n được.<br />\r\nNhằm cung ứng một giải ph&aacute;p hiệu quả cho nhu cầu n&agrave;y, LightZ Real Estate đ&atilde; ph&aacute;t triển dịch vụ K&Yacute; GỬI NH&Agrave; ĐẤT để gi&uacute;p người b&aacute;n nh&agrave;, cho thu&ecirc; bất động sản một c&aacute;ch NHANH CH&Oacute;NG v&agrave; HIỆU QUẢ NHẤT.</p>\r\n\r\n<p>Kh&ocirc;ng k&ecirc; gi&aacute; b&aacute;n - Mua b&aacute;n Ch&iacute;nh Chủ - Ph&aacute;p l&yacute; ho&agrave;n thiện.</p>', 12, '2018-11-11 12:05:20', '2018-11-11 13:25:39'),
(9, 'Bất động sản LightZ Real Estate - Tổ ấm trong mơ', '<figure class=\"easyimage easyimage-side\"><img alt=\"\" sizes=\"100vw\" src=\"https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg\" srcset=\"https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_210 210w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_420 420w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_630 630w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_840 840w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_1050 1050w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_1260 1260w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_1470 1470w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_1680 1680w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_1890 1890w, https://35769.cdn.cke-cs.com/VrXBfVZddj4iO7wgd9UY/images/6e37c6cc457f2350394da2452963a380fb20ea3fa14e1a16_1.jpg/w_2048 2048w\" width=\"2048\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>Với hơn 15 năm kinh nghiệm l&agrave;m nghề k&yacute; gửi nh&agrave; đất, C&ocirc;ng ty cổ phần bất động sản LightZ Real Estate đ&atilde; c&oacute; hơn 2.375 kh&aacute;ch h&agrave;ng đ&atilde; v&agrave; đang sữ dụng dịch vụ k&yacute; gửi của ch&uacute;ng t&ocirc;i v&agrave; tất cả kh&aacute;ch h&agrave;ng điều h&agrave;i l&ograve;ng về phong c&aacute;ch phục vụ cũng như sự hiệu quả của việc k&yacute; gửi mang lại.<br />\r\nHiện nay, C&ocirc;ng ty ch&uacute;ng t&ocirc;i c&oacute; rất nhiều Kh&aacute;ch h&agrave;ng c&oacute; nhu cầu t&igrave;m Mua &amp; B&aacute;n : Đất nền, Đất thổ cư, Đất nền dự &aacute;n, Đất x&acirc;y dựng nh&agrave; xưởng, Nh&agrave; kho, Nh&agrave; xưởng, Nh&agrave; cho thu&ecirc;, Văn ph&ograve;ng cho thu&ecirc;, Mặt bằng cho thu&ecirc;, Nh&agrave; cấp 4, Nh&agrave; trọ, Nh&agrave; nghỉ, Kh&aacute;ch sạn, Resort&hellip;tại c&aacute;c quận trong TP. Hồ Ch&iacute; Minh cũng như c&aacute;c khu vực l&acirc;n cận. Ngo&agrave;i ra LightZ Real Estate c&ograve;n tư vấn đầu tư, hỗ trợ ph&aacute;p l&yacute;, đo vẽ, thiết kế, x&acirc;y dựng, hợp thức h&oacute;a nh&agrave; đất cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Light Estate l&agrave; c&ocirc;ng ty chuy&ecirc;n nghiệp trong lĩnh vực m&ocirc;i giới bất động sản, ch&uacute;ng t&ocirc;i l&agrave;m việc tr&ecirc;n tinh thần hợp t&aacute;c l&acirc;u d&agrave;i v&agrave; minh bạch gi&uacute;p Người B&aacute;n nhanh ch&oacute;ng b&aacute;n được bất động sản theo gi&aacute; m&igrave;nh mong muốn thỏa thuận trực tiếp với Người Mua tr&ecirc;n phạm vi To&agrave;n Cầu m&agrave; kh&ocirc;ng bị m&ocirc;i giới tự do đẩy gi&aacute; qu&aacute; cao dẫn đến kh&oacute; b&aacute;n, thậm ch&iacute; kh&ocirc;ng thể b&aacute;n được.<br />\r\nNhằm cung ứng một giải ph&aacute;p hiệu quả cho nhu cầu n&agrave;y, LightZ Real Estate đ&atilde; ph&aacute;t triển dịch vụ K&Yacute; GỬI NH&Agrave; ĐẤT để gi&uacute;p người b&aacute;n nh&agrave;, cho thu&ecirc; bất động sản một c&aacute;ch NHANH CH&Oacute;NG v&agrave; HIỆU QUẢ NHẤT.</p>\r\n\r\n<p>Kh&ocirc;ng k&ecirc; gi&aacute; b&aacute;n - Mua b&aacute;n Ch&iacute;nh Chủ - Ph&aacute;p l&yacute; ho&agrave;n thiện.</p>', 13, '2018-11-11 12:05:20', '2018-11-11 13:25:39');

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

--
-- Đang đổ dữ liệu cho bảng `hopdong`
--

INSERT INTO `hopdong` (`id`, `MaHopDong`, `ID_Dat`, `ID_KhachHang_Mua`, `FileHopDong`, `created_at`, `updated_at`) VALUES
(1, '123', 11, 1, NULL, '2018-11-20 12:41:15', '2018-11-20 12:41:15');

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
(3, 'KH002', 'Ông', 'Nguyễn Quang', 'Huy', '0905456781', '02583812654', '22552119', '163/24/92B Tô Hiến Thành, P13, Q10', 'darkkiller1406@yahoo.com', 12, '2018-05-21 09:04:31', '2018-11-09 07:38:17'),
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
(1, 'Phường Bến Nghé', 1),
(2, 'Phường Bến Thành', 1),
(3, 'Phường Tân Định', 1),
(4, 'Phường Nguyễn Thái Bình', 1),
(5, 'Phường 1', 3),
(6, 'Phường 2', 3),
(7, 'Phường 3', 3),
(8, 'Phường 4', 3),
(9, 'Phường 5', 3),
(10, 'Phường 6', 3),
(11, 'Phường Đa Kao', 1),
(12, 'Phường Nguyễn Cư Trinh', 1),
(13, 'Phường 11', 3),
(14, 'Phường 13', 10),
(15, 'Phường 1', 10),
(16, 'Phường 3', 10),
(17, 'Phường 5', 10),
(18, 'Phường 7', 10),
(19, 'Phường 9', 10),
(20, 'Phường 10', 10),
(21, 'Phường An Khánh ', 2),
(22, 'Phường An Lợi Đông', 2),
(23, 'Phường An Phú', 2),
(24, 'Phường Bình An', 2),
(25, 'Phường Bình Khánh', 2),
(26, 'Phường Thảo Điền', 2),
(27, 'Phường Thủ Thiên', 2),
(28, 'Phường 12', 4),
(29, 'Phường 15', 4),
(30, 'Phường 16', 4),
(31, 'Phường 3', 4),
(32, 'Phường 5', 4),
(33, 'Phường 9', 4),
(34, 'Phường 1', 5),
(35, 'Phường 10', 5),
(36, 'Phường 11', 5),
(37, 'Phường 12', 5),
(38, 'Phường 8', 5),
(39, 'Phường 5', 5),
(40, 'Phường 1', 6),
(41, 'Phường 12', 6),
(42, 'Phường 14', 6),
(43, 'Phường 5', 6),
(44, 'Phường 7', 6),
(45, 'Phường 9', 6),
(46, 'Phường 3', 6),
(47, 'Phường Bình Thuận', 7),
(48, 'Phường Phú Mỹ', 7),
(49, 'Phường Phú Nhuận', 7),
(50, 'Phường Tân Phú', 7),
(51, 'Phường Tân Thuận Đông', 7),
(52, 'Phường Tân Thuận Tây', 7),
(53, 'Phường Tân Hưng', 7),
(54, 'Phường 5', 8),
(55, 'Phường 2', 8),
(56, 'Phường 6', 8),
(57, 'Phường 8', 8),
(58, 'Phường 4', 8),
(59, 'Phường 15', 8),
(60, 'Phường 13', 8),
(61, 'Phường Hiệp Phú', 9),
(62, 'Phường Long Bình', 9),
(63, 'Phường Long Phú', 9),
(64, 'Phường Phú Hữu', 9),
(65, 'Phường Phước Bình', 9),
(66, 'Phường Phước Long A', 9),
(67, 'Phường Phước Long B', 9),
(68, 'Phường 10', 11),
(69, 'Phường 11', 11),
(70, 'Phường 16', 11),
(71, 'Phường 7', 11),
(72, 'Phường 3', 11),
(73, 'Phường 5', 11),
(74, 'Phường 2', 11),
(75, 'Phường Tân Chánh Hiệp', 12),
(76, 'Phường An Phú Đông', 12),
(77, 'Phường Hiệp Thành', 12),
(78, 'Phường Tân Hưng Thuận', 12),
(79, 'Phường Thạnh Lộc', 12),
(80, 'Phường Thạnh Xuân', 12),
(81, 'Phường Tân Thới Hiệp', 12),
(82, 'Xã An Phú Tây', 22),
(83, 'Xã Bình Chánh', 22),
(84, 'Xã Bình Hưng', 22),
(85, 'Xã Bình Lợi', 22),
(86, 'Xã Hưng Long', 22),
(87, 'Xã Quy Đức', 22),
(88, 'Phường An Lạc', 18),
(89, 'Phường Bình Hưng Hòa', 18),
(90, 'Phường Bình Trị Đông', 18),
(91, 'Phường Tân Tạo', 18),
(92, 'Phường An Lạc A', 18),
(93, 'Phường Bình Hưng Hòa A', 18),
(94, 'Phường Bình Trị Đông A', 18),
(95, 'Phường 2', 14),
(96, 'Phường 14', 14),
(97, 'Phường 17', 14),
(98, 'Phường 19', 14),
(99, 'Phường 21', 14),
(100, 'Phường 22', 14),
(101, 'Phường 24', 14),
(102, 'Xã An Thới Đông', 24),
(103, 'Xã Bình Khánh', 24),
(104, 'Xã Long Hòa', 24),
(105, 'Xã Lý Nhơn', 24),
(106, 'Xã Tam Thôn Hiệp', 24),
(107, 'Xã Thạnh An', 24),
(108, 'Xã An Nhơn Tây', 21),
(109, 'Xã Hòa Phú', 21),
(110, 'Xã Phước Hiệp', 21),
(111, 'Xã Phước Thạnh', 21),
(112, 'Xã Tân Thạnh Đông', 21),
(113, 'Xã Thái Mỹ', 21),
(114, 'Phường 10', 15),
(115, 'Phường 17', 15),
(116, 'Phường 4', 15),
(117, 'Phường 3', 15),
(118, 'Phường 13', 15),
(119, 'Phường 15', 15),
(120, 'Phường 7', 15),
(121, 'Xã Bà Điểm', 20),
(122, 'Xã Đông Thạnh', 20),
(123, 'Xã Nhị Bình', 20),
(124, 'Xã Tân Hiệp', 20),
(125, 'Xã Tân Xuân', 20),
(126, 'Xã Trung Chánh', 20),
(127, 'Xã Hiệp Phước ', 23),
(128, 'Xã Long Thới', 23),
(129, 'Xã Nhơn Đức', 23),
(130, 'Xã Phú Xuân', 23),
(131, 'Xã Phước Kiển', 23),
(132, 'Xã Phước Lộc', 23),
(133, 'Phường 11', 16),
(134, 'Phường 2', 16),
(135, 'Phường 3', 16),
(136, 'Phường 13', 16),
(137, 'Phường 8', 16),
(138, 'Phường 15', 16),
(139, 'Phường 15', 19),
(140, 'Phường 14', 19),
(141, 'Phường 4', 19),
(142, 'Phường 5', 19),
(143, 'Phường 6', 19),
(144, 'Phường 7', 19),
(145, 'Phường Hòa Thạnh', 17),
(146, 'Phường Hiệp Tân', 17),
(147, 'Phường Phú Thạnh', 17),
(148, 'Phường Phú Trung', 17),
(149, 'Phường Sơn Kì', 17),
(150, 'Phường Tân Quý', 17),
(151, 'Phường Bình Chiểu', 13),
(152, 'Phường Bình Thọ', 13),
(153, 'Phường Hiệp Bình Chánh', 13),
(154, 'Phường Hiệp Bình Phước', 13),
(155, 'Phường Linh Chiểu', 13),
(156, 'Phường Linh Đông', 13),
(157, 'Phường Linh Xuân', 13),
(158, 'Phường 1', 19),
(159, 'Phường 3', 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan`
--

CREATE TABLE `quan` (
  `id` int(11) NOT NULL,
  `TenQuan` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ThuocThanhPho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `quan`
--

INSERT INTO `quan` (`id`, `TenQuan`, `ThuocThanhPho`) VALUES
(1, 'Quận 1', 1),
(2, 'Quận 2', 1),
(3, 'Quận 3', 1),
(4, 'Quận 4', 1),
(5, 'Quận 5', 1),
(6, 'Quận 6', 1),
(7, 'Quận 7', 1),
(8, 'Quận 8', 1),
(9, 'Quận 9', 1),
(10, 'Quận 10', 1),
(11, 'Quận 11', 1),
(12, 'Quận 12', 1),
(13, 'Quận Thủ Đức', 1),
(14, 'Quận Bình Thạnh', 1),
(15, 'Quận Gò Vấp', 1),
(16, 'Quận Phú Nhuận', 1),
(17, 'Quận Tân Phú', 1),
(18, 'Quận Bình Tân', 1),
(19, 'Quận Tân Bình', 1),
(20, 'Huyện Hóc Môn', 1),
(21, 'Huyện Củ Chi', 1),
(22, 'Huyện Bình Chánh', 1),
(23, 'Huyện Nhà Bè', 1),
(24, 'Huyện Cần Giờ', 1);

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
(64, 3, 'A', '2018-11-04 04:26:23', '2018-11-04 04:26:23'),
(65, 2, 'A', '2018-11-09 09:12:09', '2018-11-09 09:12:09'),
(66, 2, 'A', '2018-11-09 09:12:42', '2018-11-09 09:12:42'),
(67, 2, 'A', '2018-11-09 09:13:19', '2018-11-09 09:13:19'),
(68, 2, 'A', '2018-11-09 09:13:36', '2018-11-09 09:13:36'),
(69, 10, 'A', '2018-11-09 09:14:18', '2018-11-09 09:14:18'),
(70, 2, 'A', '2018-11-09 09:15:27', '2018-11-09 09:15:27'),
(71, 2, 'A', '2018-11-09 09:15:35', '2018-11-09 09:15:35'),
(72, 3, 'A', '2018-11-09 09:16:17', '2018-11-09 09:16:17'),
(73, 2, 'A', '2018-11-09 09:16:54', '2018-11-09 09:16:54'),
(74, 2, 'A', '2018-11-09 09:18:17', '2018-11-09 09:18:17'),
(75, 2, 'A', '2018-11-09 09:18:56', '2018-11-09 09:18:56'),
(76, 2, 'A', '2018-11-09 09:19:17', '2018-11-09 09:19:17'),
(77, 2, 'A', '2018-11-09 09:19:27', '2018-11-09 09:19:27'),
(78, 1, 'A', '2018-11-10 09:04:42', '2018-11-10 09:04:42'),
(79, 4, 'A', '2018-11-10 09:13:32', '2018-11-10 09:13:32'),
(80, 1, 'A', '2018-11-10 09:13:37', '2018-11-10 09:13:37'),
(81, 3, 'A', '2018-11-10 09:13:41', '2018-11-10 09:13:41'),
(82, 3, 'A', '2018-11-10 09:17:44', '2018-11-10 09:17:44'),
(83, 10, 'A', '2018-11-10 09:22:47', '2018-11-10 09:22:47'),
(84, 10, 'A', '2018-11-10 09:22:56', '2018-11-10 09:22:56'),
(85, 10, 'A', '2018-11-10 09:25:50', '2018-11-10 09:25:50'),
(86, 10, 'A', '2018-11-10 09:26:04', '2018-11-10 09:26:04'),
(87, 10, 'A', '2018-11-10 09:26:13', '2018-11-10 09:26:13'),
(88, 10, 'A', '2018-11-10 09:29:35', '2018-11-10 09:29:35'),
(89, 3, 'A', '2018-11-17 08:04:55', '2018-11-17 08:04:55'),
(90, 3, 'A', '2018-11-17 08:05:19', '2018-11-17 08:05:19'),
(91, 3, 'A', '2018-11-17 08:05:25', '2018-11-17 08:05:25'),
(92, 1, 'A', '2018-11-17 08:06:34', '2018-11-17 08:06:34'),
(93, 3, 'A', '2018-11-17 08:07:02', '2018-11-17 08:07:02'),
(94, 10, 'A', '2018-11-17 08:07:11', '2018-11-17 08:07:11'),
(95, 10, 'A', '2018-11-17 08:07:39', '2018-11-17 08:07:39'),
(96, 1, 'A', '2018-11-17 08:08:12', '2018-11-17 08:08:12'),
(97, 1, 'A', '2018-11-17 08:09:34', '2018-11-17 08:09:34'),
(98, 10, 'A', '2018-11-17 08:09:43', '2018-11-17 08:09:43'),
(99, 1, 'A', '2018-11-17 08:10:48', '2018-11-17 08:10:48'),
(100, 10, 'A', '2018-11-17 08:12:46', '2018-11-17 08:12:46'),
(101, 10, 'A', '2018-11-17 08:13:07', '2018-11-17 08:13:07'),
(102, 1, 'A', '2018-11-20 12:32:13', '2018-11-20 12:32:13'),
(103, 3, 'A', '2018-11-20 12:32:20', '2018-11-20 12:32:20'),
(104, 3, 'A', '2018-11-20 12:33:12', '2018-11-20 12:33:12'),
(105, 10, 'A', '2018-11-20 12:45:59', '2018-11-20 12:45:59');

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
(1, 'congminh', 'kisivodanh1406@gmail.com', '$2y$10$mY9k0CwUBAsJtc7dbrmCHOVJ5yIV.xKCgPKFzDeDE0FWql6tNru5y', 'S0mwJIAon5Dtm5sL7qvicapK0Re43RexLO5kMQL2yaImoDoCDHd8Q5TDkrHU', '2018-05-21 09:20:52', '2018-11-20 12:15:59', 1, 'Công Minh', 7, 1, '2019-01-29 00:00:00'),
(2, 'congminh123', 'test@gmail.com', '$2y$10$licDAaU1z3WI.akCBnytmeo59Uw4wj6puHqdW9UFM7tp5bAIPQzm6', NULL, '2018-11-01 07:54:34', '2018-11-11 06:29:32', 1, 'Nguyễn Công Minh', 12, 1, '2018-12-03 00:00:00'),
(3, 'admin', 'test4@gmail.com', '$2y$10$licDAaU1z3WI.akCBnytmeo59Uw4wj6puHqdW9UFM7tp5bAIPQzm6', 'LVWUFqKsCfuiS5Bd0x64B6eLEEG4Cu6SN3VjYPqEOU7EEiIddWcfnLqAEt9r', '2018-11-04 08:19:01', '2018-11-07 03:38:35', 1, 'Nguyễn Công Minh', 13, 1, '2018-12-29 00:00:00'),
(4, 'test4', 'test5@gmail.com', '$2y$10$licDAaU1z3WI.akCBnytmeo59Uw4wj6puHqdW9UFM7tp5bAIPQzm6', NULL, NULL, '2018-11-10 04:05:30', 2, 'test4', 7, 1, '2019-01-29 00:00:00');

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
(3, 'YC003', 'Nguyễn Công Minh', 'darkkiller1406@yahoo.com', '0905456789', 1, '123', 4, '2018-10-28 07:51:20', '2018-10-28 07:51:20');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `causer_id` (`causer_id`);

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
-- Chỉ mục cho bảng `gioithieu`
--
ALTER TABLE `gioithieu`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT cho bảng `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `congty`
--
ALTER TABLE `congty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `dat`
--
ALTER TABLE `dat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `gioithieu`
--
ALTER TABLE `gioithieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT cho bảng `quan`
--
ALTER TABLE `quan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `thanhpho`
--
ALTER TABLE `thanhpho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `thongketimkiem`
--
ALTER TABLE `thongketimkiem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `yeucau`
--
ALTER TABLE `yeucau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_ibfk_1` FOREIGN KEY (`causer_id`) REFERENCES `users` (`id`);

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

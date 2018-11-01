-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 01, 2018 lúc 03:01 AM
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
-- Cấu trúc bảng cho bảng `chucnang`
--

CREATE TABLE `chucnang` (
  `id` int(11) NOT NULL,
  `ChucNang` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chucnang`
--

INSERT INTO `chucnang` (`id`, `ChucNang`, `TrangThai`) VALUES
(0, 'lấy tin đăng từ web khác', 0);

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
  `SoHuu` int(11) NOT NULL,
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
(1, '1234', 5, 10, 0, 50, 600000, 30000000, 3, 2, 'Đông', '163/24/92B Tô Hiến Thành', '10.782843;106.67134699999997', 14, 'LK05_1.jpg;LK05_2.jpg;LK05_3.jpg;', NULL, 77, '2018-05-24 07:42:00', '2018-10-29 05:01:54'),
(3, 'LK07', 5, 18, 0, 90, 20000000, 1800000000, 1, 1, 'Bắc', '169/24/92B Tô Hiến Thành', '10.782621; 106.6716778', 14, 'LK05_1.jpg;LK05_2.jpg;LK05_3.jpg;', 'Lô đất năm sau Trung tâm thương mại, khu dân cư quanh đông đúc, gần trường đại học, mặt tiền đường rộng 8m, cơ sở hạ tầng hoàn thiện. Rất thuận tiện việc mua bán , kinh doanh. \r\nDiện tích: 60m2( 5x12) \r\nThương lượng chính chủ, không tiếp cò', 89, '2018-08-07 10:07:54', '2018-10-31 09:39:59'),
(4, 'LK08', 4, 20, 0, 80, 15000000, 1200000000, 1, 1, 'Đông', '169/24/92B Tô Hiến Thành', '10.782621; 106.6716778', 14, 'LK06_1.jpg;LK06_2.jpg;', 'Lô đất năm sau Trung tâm thương mại, khu dân cư quanh đông đúc, gần trường đại học, mặt tiền đường rộng 8m, cơ sở hạ tầng hoàn thiện. Rất thuận tiện việc mua bán , kinh doanh. \r\nDiện tích: 60m2( 5x12) \r\nThương lượng chính chủ, không tiếp cò', 19, '2018-08-07 10:07:54', '2018-10-31 02:45:13'),
(5, 'LK09', 5, 18, 0, 90, 22000000, 1980000000, 1, 0, 'Bắc', '169/24/92B Tô Hiến Thành', '10.782621; 106.6716778', 14, 'LK05_1.jpg;LK05_2.jpg;LK05_3.jpg;', 'Lô đất năm sau Trung tâm thương mại, khu dân cư quanh đông đúc, gần trường đại học, mặt tiền đường rộng 8m, cơ sở hạ tầng hoàn thiện. Rất thuận tiện việc mua bán , kinh doanh. \r\nDiện tích: 60m2( 5x12) \r\nThương lượng chính chủ, không tiếp cò', 49, '2018-08-07 10:07:54', '2018-10-31 10:03:45'),
(6, 'LK10', 4, 20, 0, 80, 15000000, 1200000000, 1, 0, 'Đông', '169/24/92B Tô Hiến Thành', '10.782621; 106.6716778', 14, 'LK06_1.jpg;LK06_2.jpg;', 'Lô đất năm sau Trung tâm thương mại, khu dân cư quanh đông đúc, gần trường đại học, mặt tiền đường rộng 8m, cơ sở hạ tầng hoàn thiện. Rất thuận tiện việc mua bán , kinh doanh. \r\nDiện tích: 60m2( 5x12) \r\nThương lượng chính chủ, không tiếp cò', 53, '2018-08-07 10:07:54', '2018-10-31 11:40:04'),
(7, 'LK013', 4, 15, 0, 60, 12000000, 720000000, 1, 0, 'Nam', '163/24/92B Tô Hiến Thành', '10.782621; 106.6716778', 14, 'LK013_3.jpg;LK013_2.jpg;LK013_1.jpg;', NULL, 8, '2018-08-07 10:07:54', '2018-10-22 05:45:30'),
(8, '123', 10, 120, 0, 1200, 6230250, 7476300000, 1, 0, 'Đông', '256 Trần Văn Đang', '10.7842142;106.67331469999999', 13, '123_1.jpg;', NULL, 6, '2018-10-20 05:44:55', '2018-10-27 05:23:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dat_web`
--

CREATE TABLE `dat_web` (
  `id` int(11) NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TrangThai` int(11) NOT NULL,
  `Gia` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DienTich` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MoTa` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Map` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Hinh` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TenKhach` varchar(30) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `DienThoai` varchar(15) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `NoiDung` varchar(500) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `dat_web`
--

INSERT INTO `dat_web` (`id`, `link`, `TrangThai`, `Gia`, `DiaChi`, `DienTich`, `MoTa`, `Map`, `Hinh`, `TenKhach`, `Email`, `DienThoai`, `NoiDung`, `created_at`, `updated_at`) VALUES
(6, 'sang-gap-mat-tien-doan-nguyen-tuan-109tr-100m2-7330247', 2, '109 Triệu VNĐ ', '                   Xã Tân Quý Tây ,                    Huyện Bình Chánh ', '                                      100 m² ', '                      T&#244;i ch&#237;nh chủ cần sang gấp mặt tiền  ĐO&#192;N NGUYỄN TUẤN gần quốc lộ 1A Tiện Kinh doanh \r\n \r\n- Diện t&#237;ch: 100m2 (5x20), thổ cư 100%. \r\n \r\n- Vị tr&#237; thuận lợi kinh doanh c&#243; đầy đủ tiện &#237;ch: Ng&#226;n h&#224;ng ACB, AGRIBANK, Vietcombak..., Trường mầm non, trường THCS - THPT B&#236;nh Ch&#225;nh, Bệnh viện Đa Khoa B&#236;nh Ch&#225;nh, ... \r\n \r\n- Chỉ mất 10 ph&#250;t về  Trung t&#226;m quận 7, Quận 6, B&#236;nh T&#226;n, Quận 1, Quận 5 \r\n- Sổ hồng ri&#234;ng, x&#226;y dựng tự do. Hỗ trợ GPXD, v&#224; thủ tục ho&#224;n c&#244;ng. \r\n \r\nLi&#234;n hệ Anh H&#249;ng: 01234989066 \r\n \r\nXin cảm ơn đ&#227; đọc tin                  ', '10.66439,106.59612', 'http://www.muabannhadat.vn/uploads/images/007/330/247/PivPG0O9J0eFouyEpJLxlg_1.jpg', NULL, NULL, NULL, NULL, '2018-10-28 11:26:09', '2018-10-28 08:15:34'),
(7, 'can-ban-lo-dat-biet-thu-476m2-shr-4-ty-duong-nguye-7810079', 0, '14 Triệu VNĐ ', '                   Phường Phú Mỹ ,                    Quận 7 ', '                                      476 m² ', '                      Đất mặt tiền đường Nguyễn Văn Linh 476m2, SHR, hướng Đ&#244;ng Nam. \r\nĐường rộng lớn 20m \r\nNgay khu d&#226;n cư đ&#244;ng thuận tiện kinh doanh. \r\nGi&#225;: 13tr/m \r\nLh để được đưa đi xem \r\n                  ', '10.70815,106.73828', 'http://www.muabannhadat.vn/uploads/images/007/810/079/yMH7oF1gF0ueXMRB7wD62g_1.jpg', NULL, NULL, NULL, NULL, '2018-10-28 11:26:10', '2018-10-28 04:26:10'),
(8, 'dat-can-ban-gap-4-3m-x-15-5m-tho-cu-shr-7809996', 0, '2,43 Tỷ VNĐ ', '                   Phường Tân Thới Hiệp ,                    Quận 12 ', '                                      66 m² ', '                      Đất cần b&#225;n nhanh.P.TTH.Q12.đường Nguyễn thị kiểu 2 xẹc. \r\n \r\nDT: 4.3m x 15m(thổ cư) hương Bắc.khu d&#226;n tr&#237; cao,c&#225;ch trường học LVT 500m.sổ hồng ri&#234;ng. \r\n \r\nC&#243; Hổ Trợ Vay Vốn Ng&#226;n H&#224;ng. \r\n \r\nGi&#225; : 2 tỷ 430/tr.anh chị em họp t&#225;c nh&#233; \r\n \r\nLH : 0902818155 - 0965613838  \r\n \r\nNh&#224; đất Ngọc ng&#226;n                  ', '10.86603,106.64294', 'http://www.muabannhadat.vn/uploads/images/007/809/996/VeoW62ma9EKZsdOLdy6XgQ_1.jpg', NULL, NULL, NULL, NULL, '2018-10-28 11:26:10', '2018-10-28 04:26:10'),
(9, 'ban-gap-lo-dat-1032-m2-mat-tien-dinh-duc-thien-nga-7808035', 0, '1,55 Tỷ VNĐ ', '                   Xã Bình Chánh ,                    Huyện Bình Chánh ', '                                      320 m² ', '                      Đầu năm 2017, vợ chồng t&#244;i c&#243; mua một mảnh đất mặt tiền đường Đinh Đức Thiện, thuộc B&#236;nh Ch&#225;nh, TP Hồ Ch&#237; Minh \r\nT&#244;i dự t&#237;nh x&#226;y ki ốt để kinh doanh, đồng thời x&#226;y th&#234;m d&#227;y trọ để cho thu&#234;. Tuy nhi&#234;n, do việc l&#224;m ăn kh&#244;ng mấy thuận lợi n&#234;n hiện tại t&#244;i cần sang gấp l&#244; đất n&#224;y cho ai thực sự c&#243; nhu cầu đầu tư kinh doanh hoặc x&#226;y nh&#224; để ở . \r\n \r\nDiện t&#237;ch 10* 32m, thổ cư 100%, sổ hồng ri&#234;ng. \r\nCơ sở hạ tầng ho&#224;n thiện, đường rộng 12m, rải nhựa k&#237;n. Đầy đủ c&#225;c tiện &#237;ch như bệnh viện, trường học, chợ, khu d&#226;n cư,... \r\nGi&#225; 1tỷ 550 ( thương lượng nhẹ) \r\n \r\nDo c&#244;ng việc nhiều, &#237;t c&#243; thời gian rảnh n&#234;n kh&#244;ng muốn tốn thời gian với m&#244;i giới. L&#224;m việc trực tiếp với ai c&#243; thiện ch&#237; mua. \r\n \r\nLi&#234;n hệ 0768863317 (Linh)                  ', '10.69114,106.59674', 'http://www.muabannhadat.vn/uploads/images/007/808/035/01CXP4X0yUWlixk7VRxTvQ_1.jpg', NULL, NULL, NULL, NULL, '2018-10-28 11:26:10', '2018-10-28 04:26:10'),
(10, 'can-ban-gap-lo-dat-cu-chi-90m2-shr-xdtd-tc-100-gia-7776310', 0, '480 Triệu VNĐ ', '                   Xã Tân An Hội ,                    Huyện Củ Chi ', '                                      90 m² ', '                      Đất nằm MT tam t&#226;n xung quanh khu d&#226;n cư đ&#244;ng đ&#250;c \r\n \r\nBao Quanh L&#224; 2 Kcn Nhẹ Rất Th&#237;ch Hợp Để Ở V&#224; X&#226;y Trọ \r\n \r\nC&#225;ch Bệnh Viện Xuy&#234;n &#193;,ubnn T&#226;n An Hội,si&#234;u Thị,trường Học 10p Đi Xe M&#225;y \r\nĐặc Biệt Đ&#227; C&#243; Shr,tc 100% V&#224; Xdtd \r\n \r\nGi&#225; 480tr/ L&#244;                  ', '10.98312,106.48796', 'http://www.muabannhadat.vn/uploads/images/007/776/310/OGOgotcPoEK4XLCdqpbIEA_1.jpg', NULL, NULL, NULL, NULL, '2018-10-28 11:26:10', '2018-10-28 04:26:10'),
(11, 'can-sang-gap-lo-dat-mat-tien-nguyen-thi-nhung-gia-7812109', 0, '1,6 Tỷ VNĐ ', '                   Phường Hiệp Bình Phước ,                    Quận Thủ Đức ', '                                      80 m² ', '                      Đất thổ cư mặt tiền Nguyễn Thị Nhung phường Hiệp B&#236;nh Phước quận Thủ Đức  \r\n \r\nĐất 100% thổ cư , bao sang t&#234;n  \r\nNằm ngay khu d&#226;n cư hiện hữu về ở ngay  \r\nNằm ngay Chợ , trường học , bệnh viện , khu h&#224;nh ch&#237;nh tiện kinh doanh mua b&#225;n  \r\nKhu an ninh  c&#243; lắp đặt  camera an ninh tiện sinh s&#244;ng l&#226;u d&#224;i  \r\nC&#243; sổ ri&#234;ng từng nền , thanh to&#225;n sang t&#234;n ngay trong 7 ng&#224;y  \r\nƯu ti&#234;n gọi trước ng&#224;y 4/11 \r\n \r\nLi&#234;n hệ Anh T&#250; để xem giấy tờ trước  \r\n0327573040 \r\n \r\n \r\n                  ', '0.0,0.0', 'http://www.muabannhadat.vn/uploads/images/007/812/109/a1JljgBnnEqyastnWk8QNw_1.jpg', NULL, NULL, NULL, NULL, '2018-10-29 12:07:34', '2018-10-29 05:07:34'),
(12, 'mo-ban-dat-nen-du-an-kdc-tay-lan-gia-dau-tu-680-tr-7421144', 0, '680 Triệu VNĐ ', '                   Phường Tân Tạo ,                    Quận Bình Tân ', '                                      80 m² ', '                      _ Mở B&#225;n KDC T&#226;y L&#226;n- p. T&#226;n Tạo gi&#225; CĐT, cam kết 20% sau 3 th&#225;ng \r\n \r\n- Nằm ngay Mặt Đường QL1 đi v&#224;o T&#226;y l&#226;n 600m, tại  khu d&#226;n cư hiện hữu quy hoach theo ti&#234;u chuẩn đ&#244; thị mới, rất ph&#249; hợp cho kh&#225;ch h&#224;ng an cư v&#224; đầu tư. \r\n \r\n- ph&#225;p l&#253; r&#245; r&#224;ng minh bạch, x&#226;y dựng tư do. \r\n \r\n- Diện T&#237;ch đa dạng: 64m2, 72m2, 80m2, 96m2, 100m2... \r\n \r\nQu&#225; tuyệt vời khi chỉ cần c&#243; 600trieu kh&#225;ch h&#224;ng c&#243; thể sở hữu ngay 1 nền đất Th&#224;nh Phố. h&#227;y gọi ngay cho ch&#250;ng t&#244;i để được tư vấn kỹ hơn, rất h&#226;n hạnh được phục vụ.                  ', '0.0,0.0', 'http://www.muabannhadat.vn/uploads/images/007/421/144/YrDnhZq_9UCyQ-60aZyAog_1.jpg', NULL, NULL, NULL, NULL, '2018-10-29 12:07:36', '2018-10-29 05:07:36'),
(13, 'v-c-toi-ly-hon-can-ban-gap-100m2-dat-sau-lung-cho-7774244', 0, '130 Triệu VNĐ ', '                   Xã Bình Chánh ,                    Huyện Bình Chánh ', '                                      100 m² ', '                      -Do kẹt vốn kinh doanh cần b&#225;n gấp 1 l&#244; đất ở MT đường Đinh Đức Thiện, B&#236;nh Ch&#225;nh. \r\n \r\n- DT 100m2. Gi&#225; 130tr 1 l&#244; \r\n- S&#225;t b&#234;n khu vực d&#226;n cư đ&#244;ng, th&#237;ch hợp x&#226;y ở ngay hoặc x&#226;y trọ cho thu&#234;. \r\n- Gần b&#234;n c&#243; chợ truyền thống, bệnh viện, ng&#226;n h&#224;ng, thế giới di động... Phục vụ đầy đủ nhu cầu h&#224;ng ng&#224;y. \r\n- Đồng hồ điện, nước m&#225;y đ&#227; xin đến nh&#224;. \r\n- Đi về trung t&#226;m th&#224;nh phố rất nhanh th&#244;ng qua đường Quốc Lộ 1A, Nguyễn Văn Linh, V&#245; Văn Kiệt... \r\n- Đất đ&#227; c&#243; sổ hồng ri&#234;ng, c&#244; sang t&#234;n c&#244;ng chứng ngay cho người mua, c&#243; hỗ trợ xin giấy ph&#233;p x&#226;y dựng. V&#236; kẹt tiền n&#234;n đ&#224;nh b&#225;n gấp miếng đất n&#224;y ai c&#243; nhu cầu li&#234;n hệ gấp- Kh&#244;ng tiếp c&#242; giới trung gian. \r\n \r\nLi&#234;n hệ: 093.266.2078                  ', '10.66044,106.57731', 'http://www.muabannhadat.vn/uploads/images/007/774/244/t2VcXwXKm0CNAz5of4lYgA_1.jpg', NULL, NULL, NULL, NULL, '2018-10-29 12:08:13', '2018-10-29 05:08:13'),
(14, 'ban-gap-dat-mt-duong-so-13-p-binh-trung-tay-q2-so-7814009', 1, '5,9 Tỷ VNĐ ', '                   Phường Bình Trưng Tây ,                    Quận 2 ', '                                      87 m² ', '                      Cần tiền b&#225;n gấp đất ch&#237;nh chủ mặt tiền đường số 13, P. B&#236;nh Trưng T&#226;y, Quận 2 \r\nđất nằm trong KDC hiện hữu, an ninh, sạch sẽ \r\nTừ vị tr&#237; đất c&#243; dễ d&#224;ng di chuyển đến Vin Com, Nh&#224; thiếu nhi Quận 2, BV, trường học .... \r\nSổ đỏ ch&#237;nh chủ \r\n \r\nDT : 4,5 x15 \r\n87m2 \r\nHướng Đ&#244;ng Nam \r\nX&#226;y dựng tối đa 5 tầng \r\nGi&#225; b&#225;n: 5.9 tỷ \r\nThương lượng &#237;t cho kh&#225;ch h&#224;ng thiện ch&#237; \r\n \r\nLi&#234;n hệ ngay : 0908385777 \r\n                  ', '10.78525,106.76687', 'http://www.muabannhadat.vn/uploads/images/007/814/009/vRVyr6ZHxEygJg4UUEbBAw_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 08:51:07', '2018-10-30 01:53:43'),
(15, 'can-nhuong-gap-lo-dat-biet-thu-vuon-506m2-duong-63-7813631', 0, '25 Tỷ VNĐ ', '                   Phường Thảo Ðiền ,                    Quận 2 ', '                                      506 m² ', '                      Hiện t&#244;i cần sang gấp l&#244; đất nằm tr&#234;n đường 63 phường Thảo Điền, quận 2.  \r\n \r\nDiện t&#237;ch tổng thể : ngang 22m, d&#224;i 21 v&#224; 24m \r\nĐ&#227; c&#243; 200m2 thổ cư 300m2 c&#242;n lại đất vườn ( C&#243; thể l&#234;n thổ cư ) \r\nĐất nằm trong khu vực d&#226;n cư hiện hữu, sung t&#250;c. c&#225;ch Cầu S&#224;i G&#242;n 3km \r\nkế b&#234;n chung cư Tropic Garden, xung quanh đầy đủ c&#244;ng tr&#236;nh tiện &#237;ch v&#224; ph&#250;c lợi x&#227; hội, bệnh viện trường học đầy đủ. \r\n \r\nMiễn Trung Gian                  ', '10.80628,106.73505', 'http://www.muabannhadat.vn/uploads/images/007/813/631/Fcfd2vI99kWkTPOv07Xe0A_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 08:51:07', '2018-10-30 01:51:07'),
(16, 'dat-2-mat-tien-825-duong-dinh-duc-thien-binh-chanh-7813451', 0, '1,7 Tỷ VNĐ ', '                   Xã Bình Chánh ,                    Huyện Bình Chánh ', '                                      200 m² ', '                      Đến hạn trả nợ ng&#226;n h&#224;ng t&#244;i cần b&#225;n gấp l&#244; đất 2MT đường Đinh Đức Thiện nằm ngay sau lưng chợ B&#236;nh Ch&#225;nh diện t&#237;ch 8*25 \r\n \r\nĐất nằm vị tr&#237; đẹp thuận lợi cho việc kinh doanh bu&#244;n b&#225;n x&#226;y nh&#224; trọ ..đường nhựa  trước nh&#224; 12m \r\nsổ hồng ri&#234;ng bao sang t&#234;n x&#226;y dựng tự do \r\nD&#226;n cư xung quanh đ&#244;ng đ&#250;C \r\ngi&#225; 1,7 tỷ \r\n \r\nAi c&#243; nhu cầu xin li&#234;n hệ anh B&#236;nh  0963 877 272                   ', '10.69114,106.59674', 'http://www.muabannhadat.vn/uploads/images/007/813/451/mAHTVEto_kSzx9gfPc-wCA_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 08:51:07', '2018-10-30 01:51:07'),
(17, 'ban-gap-lo-dat-210m2-tho-cu-100-bao-giay-to-7812990', 0, '1,05 Tỷ VNĐ ', '                   Xã Hưng Long ,                    Huyện Bình Chánh ', '                                      210 m² ', '                      Cần b&#225;n gấp l&#244; đất 210m2 như h&#236;nh chụp, đ&#227; c&#243; sổ hồng, bao giấy tờ, đường b&#234; t&#244;ng 7m, điện nước đầy đủ, gần trường học, chợ... \r\n \r\nCần b&#225;n gấp n&#234;n ai cần li&#234;n hệ: 0913.740.769. A. Cường.                  ', '10.66544,106.60985', 'http://www.muabannhadat.vn/uploads/images/007/812/990/ryGqTf7g8Ee3ptfcOny2bQ_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 08:51:08', '2018-10-30 01:51:08'),
(18, 'ban-gap-90m2-dat-tho-cu-100-gan-cho-hoc-mon-gia-47-7812731', 0, '475 Triệu VNĐ ', '                   Xã Tân Thới Nhì ,                    Huyện Hóc Môn ', '                                      90 m² ', '                      Vị tr&#237;:  \r\n+ mặt tiền đường tam t&#226;n, H&#243;c M&#244;n. \r\n+ gần chợ H&#243;c m&#244;n, trường học. \r\n \r\nDiện t&#237;ch: \r\n+ 5x18=90 m2 (475 triệu) \r\n \r\n+ x&#226;y dựng tự do, sổ hồng c&#243; sẵn, sang t&#234;n ngay trong ng&#224;y... \r\n+ đường trước nh&#224; rộng 10m, cơ sở hạ tầng ho&#224;n thiện \r\n+ c&#243; hỗ trợ giấy ph&#233;p x&#226;y dựng \r\n                   ', '10.91647,106.56063', 'http://www.muabannhadat.vn/uploads/images/007/812/731/Y48Q4oyrKk27GYXFuN4ZgA_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 08:51:08', '2018-10-30 01:51:08'),
(19, 'ban-dat-tho-cu-100-kdc-ten-lua-2-binh-chanh-duong-4646805', 0, '2,3 Tỷ VNĐ ', '                   Xã Phạn Văn Hai ,                    Huyện Bình Chánh ', '                                      250 m² ', '                      Cần b&#225;n l&#244; đất thổ cư 100%, mặt tiền đường nhựa 20m, vỉa h&#232; 3,5m tại X&#227; Phạm Văn Hai, c&#225;ch đường Tỉnh lộ 10  \r\n- Ph&#225;p l&#253; r&#245; r&#224;ng, sổ hồng ri&#234;ng, kh&#244;ng tranh chấp, c&#244;ng chứng sang t&#234;n được ngay tại ph&#242;ng c&#244;ng chứng nh&#224; nước, bao sang t&#234;n. \r\n- C&#243; thể hỗ trợ GPXD miễn ph&#237;, x&#226;y dựng tự do \r\n- Nằm trong khu vực t&#225;i định cư của dự &#225;n KCN Vĩnh Lộc 2, d&#226;n cư rất đ&#244;ng,  gần chợ, trường học, bệnh viện, ng&#226;n h&#224;ng, thuận tiện ở v&#224; kinh doanh bu&#244;n b&#225;n \r\n \r\n- Diện t&#237;ch 10x25=250m2 \r\n- Gi&#225;: 2ty3  \r\n \r\n- Cần th&#234;m th&#244;ng tin v&#224; dẫn đi xem đất vui l&#242;ng gọi:  0938 44 82 86 gặp A.Duy                  ', '10.81917,106.53676', 'http://www.muabannhadat.vn/uploads/images/004/646/805/GINcSAVBZ0y3-zBXZJQuAA_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 09:19:13', '2018-10-30 02:19:13'),
(20, 'chi-can-450tr-ban-so-huu-ngay-lo-dat-xay-tro-gan-s-4741144', 0, '450 Triệu VNĐ ', '                   Phường Cầu Kho ,                    Quận 1 ', '                                      125 m² ', '                      Đất thổ cư, Diện t&#237;ch 5x26m, mặt tiền đường nhựa 16m \r\n \r\nĐiện Nước Vỉa H&#232; Đầy Đủ, Sổ Hồng Ri&#234;ng, Nằm Gần Bệnh Viện Chợ Rẫy 2 V&#224; Nhi Đồng 3. Gi&#225; 450tr. Tiện &#205;ch V&#249;ng Đầy Đủ, Gần Si&#234;u Thị, Bệnh Viện, Trong Khu Đ&#244;ng D&#226;n Cư Hiện Hữu. \r\n \r\n Ph&#225;p l&#253; r&#245; r&#224;ng, bao sang t&#234;n c&#244;ng chứng. Do định ra nước ngo&#224;i định cư n&#234;n b&#225;n lại .Đặc biệt đất năm ngay trung t&#226;m khu c&#244;ng nghiệp rất thuận lợi để bạn dầu tư x&#226;y nh&#224; trọ : Diện t&#237;ch: 5 x25 (125m2)  \r\n \r\nGI&#193;:450triệu/nền  ( bao sang t&#234;n)  \r\n \r\n- Sổ hồng ri&#234;ng thổ cư 100% .MẶT TIỀN nhựa 16m C&#225;ch bệnh viện quốc tế, trường học, chợ trong v&#242;ng b&#225;n k&#237;nh 1,5 kmTiện kinh doanh nh&#224; trọ v&#224; kiot cho thu&#234; . \r\n \r\n0903335638_Li&#234;n \r\n \r\n                  ', '10.75677,106.68776', 'http://www.muabannhadat.vn/uploads/images/004/741/144/8Kkrfgs-hUi-NRA1XnFETg_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 09:19:57', '2018-10-30 02:19:57'),
(21, 'ban-dat-tho-cu-gan-thi-tran-duong-dong-phu-quoc-si-6803133', 0, '2.000 Tỷ VNĐ ', '                   Phường Tân Ðịnh ,                    Quận 1 ', '                                      100 m² ', 'Tự Tin Nơi Thi&#234;n Đường Nghỉ Dưỡng! \r\n \r\n- Ph&#250; Quốc từ l&#226;u đ&#227; l&#224; mảnh đất của thi&#234;n đường nghỉ dưỡng. Đ&#227; c&#243; rất nhiều chủ đầu tư x&#226;y dựng những khu biệt thự nghỉ dưỡng view biển triệu đ&#244; v&#224; họ đ&#227; rất th&#224;nh c&#244;ng trong khai th&#225;c. Những chủ đầu tư đ&#243; l&#224;: VinGroup, Sun Group, CEO Group, MIK Group... \r\n \r\n- C&#243; thể ch&#250;ng ta kh&#244;ng c&#243; &#253; định cạnh tranh với những chủ đầu tư n&#224;y v&#236; họ l&#224; những tập đo&#224;n t&#224;i ch&#237;nh mạnh. \r\n Tuy nhi&#234;n, ch&#250;ng ta ho&#224;n to&#224;n c&#243; thể l&#224;m &quot;người l&#225;ng giềng&quot; với họ bằng c&#225;ch sở hữu những mảnh đất view đẹp ngay s&#225;t họ. Điều đ&#243; sẽ gi&#250;p ch&#250;ng ta rất tự tin khi gia nhập thi&#234;n đường nghỉ dưỡng n&#224;y d&#249; l&#224; đi du lịch...', '10.79315,106.69044', 'http://www.muabannhadat.vn/uploads/images/006/803/133/TRLtyPCoi0OS_xVE9NiU8Q_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 09:24:23', '2018-10-30 02:24:23'),
(22, 'dung-bo-quan-tin-nay-vi-no-se-giup-ban-tro-thanh-1-7796263', 0, '1,8 Tỷ VNĐ ', '                   Phường Nguyễn Cư Trinh ,                    Quận 1 ', '                                      108 m² ', 'Với sự chuyển m&#236;nh chuẩn bị trở th&#224;nh đặc khu kinh tế Ph&#250; Quốc đ&#227; c&#243; những bước nhảy vọt về du lịch , văn ho&#225; , kinh tế ,.. \r\n \r\nK&#233;o theo đ&#243; l&#224; gi&#225; trị Bất động sản ở Ph&#250; Quốc ng&#224;y c&#224;ng tăng cao  \r\nTrước sự ph&#225;t triển như vậy c&#244;ng ty GoldLand đ&#227; tung ra 29 sản phẩm đất nền cực hiếm với gi&#225; rẻ cho nh&#224; đầu tư như một lời cảm ơn cho 1 năm qua c&#225;c nh&#224; đầu tư đ&#227; đồng h&#224;nh c&#249;ng c&#244;ng ty  \r\nVới quy m&#244; 29 nền với diện t&#237;ch đa dạng : 100-120m2 \r\n \r\nGi&#225; cực rẻ : chỉ 1.8 - 2 tỷ 1 nền \r\nCK l&#234;n đến 10% v&#224; tặng ngay 5 chỉ v&#224;ng cho kh&#225;ch h&#224;ng thanh to&#225;n nhanh \r\nSHR , XDTD , thuộc quy hoạch thổ cư 100% \r\nCơ hội đầu tư n&#224;y chỉ c&#243; một hảy nhanh tay li&#234;n hệ 0164 367 1078 để sở...', '10.77566,106.70042', 'http://www.muabannhadat.vn/uploads/images/007/796/263/xLQC6fu9vE-B4Jxs2JDh4Q_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 09:24:23', '2018-10-30 02:24:23'),
(23, 'dat-mat-tien-duong-tran-dinh-xu-28x46-1157m-2-phuo-7292249', 0, '220 Tỷ VNĐ ', '                   Phường Cô Giang ,                    Quận 1 ', '                                      1157 m² ', '                      Cần B&#225;n Gấp Đất Ch&#237;nh Chủ 100% - 2 Mặt Tiền Đường Trần Đ&#236;nh Xu- Dt 28x46  -1157m/2-  \r\n \r\nKhu Đất V&#224;ng, Vị Tr&#237; Đắc Địa Nhất Sg, Qu&#253; Kh&#225;ch C&#243; Thể X&#226;y Nh&#224; Cao Tầng, Căn Hộ Dịch Vụ, Nh&#224;  \r\nH&#224;ng Kh&#225;c Sạn , Gara Oto, Vvv, Đất 1 Sổ 1 Chủ  \r\nĐứng B&#225;n Giao Dịch Nhanh Gọn Lẹ, Gi&#225; B&#225;n 220 Tỷ Vui L&#242;ng \r\n \r\n Li&#234;n Hệ - 0909.69.3848.0981.186.170. [ho&#224;ng Lam]                  ', '10.76175,106.69508', 'http://www.muabannhadat.vn/uploads/images/007/292/249/g3adYftgskSi6VK_QQhz4w_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 09:24:24', '2018-10-30 02:24:24'),
(24, 'ban-nen-mat-tien-cay-thong-ngoai-ngay-tt-duong-don-7278822', 0, '1,8 Tỷ VNĐ ', '                   Phường Tân Ðịnh ,                    Quận 1 ', '                                      120 m² ', 'Để nhận định ch&#237;nh x&#225;c “gi&#225; trị Bất động sản” cần xem x&#233;t v&#224; đ&#225;nh gi&#225; rất nhiều yếu tố kh&#225;c nhau. Ngo&#224;i quan hệ cung - cầu tr&#234;n thị trường được xem l&#224; chủ chốt th&#236; c&#242;n c&#225;c yếu tố về tự nhi&#234;n, kinh tế x&#227; hội, ch&#237;nh trị ph&#225;p l&#253;,...sẽ trực tiếp định gi&#225; sản phẩm Bất động sản. \r\n \r\n+ Nằm ngay trung t&#226;m thị trấn Dương Đ&#244;ng 2km. \r\n+ KDC hiện hữu, đường nội bộ 7m&#233;t, cơ sở hạ tầng điện nước ho&#224;n thiện. \r\n+ Nằm tr&#234;n trục đường ch&#237;nh Bắc Nam từ Dương Đ&#244;ng về H&#224;m Ninh, giao th&#244;ng mở rộng 20 m&#233;t. \r\n-	DT 100 - 140 m2 (t&#249;y vị tr&#237;) \r\n-	Gi&#225; 1.860 triệu /nền \r\n-	Vị tr&#237;: Đường C&#226;y Th&#244;ng Ngo&#224;i, Cửa Dương, Ph&#250; Quốc, Ki&#234;n Giang. \r\n-	Đ&#227; c&#243; sổ ri&#234;ng...', '10.79315,106.69044', 'http://www.muabannhadat.vn/uploads/images/007/278/822/aocGIHvsBUCiQ9F9UzVhKg_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 09:24:24', '2018-10-30 02:24:24'),
(25, 'nh-agribank-thanh-ly-cuoi-nam-10-lo-dat-nen-tran-n-7803755', 0, '780 Triệu VNĐ ', '                   Phường Bình An ,                    Quận 2 ', '                                      98 m² ', '*** Th&#244;ng tin đất nền *** \r\n \r\n-Vị Tr&#237;:Nằm ngay mặt tiền đường Trần N&#227;o, 12, P. B&#236;nh An, Quận 2. \r\n-Ph&#237;a sau khu biệt thự Caric  \r\nGần Vincom Mega, Metro An Ph&#250;, trạm ga Metro. \r\nDiện t&#237;ch: 80m2, 96m2, 120m2, 100m2. \r\n \r\nTiện &#237;ch: \r\n \r\nD&#226;n cư sầm uất. \r\n- Đất nền đẹp th&#237;ch hợp ở hoặc đầu tư kinh doanh. \r\n- Cơ sở hạ tầng ho&#224;n thiện 100% điện &#226;m, nước m&#225;y, đường trải nhựa rộng 20m. \r\n- C&#225;ch chợ Vincom, v&#224; Paskson Cantavil 650m. \r\n- Di chuyển về Quận 1 chỉ mất 10 ph&#250;t chạy xe theo đường Mai Ch&#237; Thọ qua hầm Thủ Thi&#234;m. \r\n \r\nPh&#225;p l&#253;: \r\n \r\nSổ hồng ri&#234;ng sang t&#234;n trong tuần, thổ cư 100%. \r\n \r\n Thanh To&#225;n: \r\n \r\nTrả Chậm hoặc 95% nhận sổ ngay  \r\n \r\nLH : 0338961539 ( Anh Hải - Trưởng Ph&#242;ng Kinh Doanh) \r\n         0981671602 ( Chị Li&#234;n - Nh&#226;n...', '0.0,0.0', 'http://www.muabannhadat.vn/uploads/images/007/803/755/pGhm2owQvEKdFlFhOnLj5w_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 09:27:39', '2018-10-30 02:27:39'),
(26, 'can-ban-dat-nen-khu-dan-cu-kien-a-cat-lai-quan-2-7783857', 0, 'Giá bảo mật ', '                   Phường Cát Lái ,                    Quận 2 ', '                                      110 m² ', '* Đất nền đ&#227; c&#243; sổ - ph&#225;p l&#253; minh bạch - h&#236;nh ảnh thật - th&#244;ng tin thật. \r\n* Ch&#237;nh chủ b&#225;n + hợp t&#225;c tất cả c&#225;c ACE m&#244;i giới. \r\nL&#244; C5-12-27 - Li&#234;n hệ: 090.130.1966. \r\n \r\nDiện t&#237;ch: 5 x 21.9m. \r\nG&#237;a rẻ ưu đ&#227;i chỉ 40tr/m2. \r\n+ Đầu tư sinh lời cao khi bắt đầu đ&#243;ng cọc cầu nối liền Q. 2 với Nhơn Trạch v&#224;o năm 2020 (đ&#227; c&#243; quyết định + phương &#225;n đầu tư do tỉnh Đồng Nai triển khai). \r\n+ Liền kề khu biệt thự d&#226;n cư Phố Đ&#244;ng Village (C&#249;ng nằm trong khu d&#226;n cư C&#225;t L&#225;i). \r\n+ Điện nước &#226;m, hạ tầng ho&#224;n thiện đầy đủ. \r\n+ Cụm trường học: Mẫu gi&#225;o, tiểu học, trung học. Đại học Quốc Tế UTM (đang x&#226;y dựng). \r\n+ T&#242;a &#225;n nh&#226;n d&#226;n th&#224;nh phố đ&#227; di dời v&#224;o đ&#226;y v&#224; đang...', '10.78047,106.76502', 'http://www.muabannhadat.vn/uploads/images/007/783/857/wOLbdTRPi06sGhZSQsJ8Rw_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 09:27:39', '2018-10-30 02:27:39'),
(27, 'ban-dat-929-259m2-mt-duong-30-binh-trung-dong-q2-7782724', 0, 'Giá bảo mật ', '                   Phường Bình Trưng Ðông ,                    Quận 2 ', '                                      259 m² ', '                      Cần b&#225;n gấp đất thổ cư. Mt đường 30 b&#236;nh trưng đ&#244;ng q2. \r\n \r\n Dt 9&#215;29=259m2. Khu d&#226;n cư hiện hữu.Gần chợ.  \r\n \r\nNh&#224; thờ.si&#234;u thị ng&#226;n h&#224;ng.gi&#225; ưu ti&#234;n kh&#225;ch thiện ch&#237; 42tr/m2  \r\n \r\nLh 0909934409                  ', '10.78375,106.78025', 'http://www.muabannhadat.vn/uploads/images/007/782/724/r05gk50JZU-WQ5h2AlZ7FQ_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 09:27:40', '2018-10-30 02:27:40'),
(28, 'chuyen-nhuong-dat-333-le-van-thinh-190m2-gia-40tr-7770523', 0, '7,56 Tỷ VNĐ ', '                   Phường Bình Trưng Ðông ,                    Quận 2 ', '                                      189 m² ', '                      B&#225;n gấp đất 6&#215;29 nở hậu 6.7m2. \r\n \r\n Khu d&#226;n tr&#237; sầm uất. Gần si&#234;u thị vinmast.  Chợ c&#226;y xo&#224;i . \r\n \r\n Giao th&#244;ng thuận lợi .hướng bắc sổ 2018 \r\n \r\n Lh 0909934409 Đại Kim Thủy &#193;c M&#244;i Giới C&#243; Kh&#225;ch Hợp T&#225;c                  ', '10.78375,106.78025', 'http://www.muabannhadat.vn/uploads/images/007/770/523/BDfFGQb5aUeCjKZn22LY5g_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 09:27:40', '2018-10-30 02:27:40'),
(29, 'ban-dat-100m-mat-tien-duong-42-phuong-binh-trung-d-7781371', 0, '6,7 Tỷ VNĐ ', '                   Phường Bình Trưng Ðông ,                    Quận 2 ', '                                      100 m² ', '                      B&#225;n đất (100m) mặt tiền đường 42, phường B&#236;nh Trưng Đ&#244;ng,  quận 2, c&#225;ch L&#234; Văn Thịnh khoảng 300m. \r\n \r\nĐất thuộc khu d&#226;n cư hiện hữu,  đ&#244;ng d&#226;n cư,  rất thuận tiện để kinh doanh bu&#244;n b&#225;n,  x&#226;y văn ph&#242;ng cho thu&#234;. Tiện &#237;ch xung quanh: gần chợ,  Trường học,  bệnh viện,  si&#234;u thị....  \r\nGi&#225;: 6.7 ty (TL)  \r\n \r\nLh: 0903032359 (Trung Th&#224;nh)                   ', '10.78375,106.78025', 'http://www.muabannhadat.vn/uploads/images/007/781/371/e3C62aVs0EqvXsaXabEACQ_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 09:27:41', '2018-10-30 02:27:41'),
(30, 'can-ban-can-nha-mt-duong-nguyen-duy-trinh-q-2-5039434', 0, '17,5 Tỷ VNĐ ', '                   Phường Bình Trưng Tây ,                    Quận 2 ', '                                      284 m² ', 'Cần B&#225;n Căn Nh&#224; Mặt Tiền Đường Nguyễn Duy Trinh Phường B&#236;nh Trưng Đ&#244;ng Quận 2, Tổng Diện T&#237;ch Nh&#224; Đất 284m, Đầu 7,5m Đu&#244;i Nở Hậu 9,4m D&#224;i 35m Nh&#224; Giấy Tờ Sổ Đỏ Hợp Lệ, Gi&#225; B&#225;n 25 Tỷ, Bao Sang T&#234;n  \r\n \r\nCần B&#225;n Căn Nh&#224; Hướng Đ&#244;ng Nam Mặt Nguyễn Duy Trinh Khu Vực Chung Cư Mười Mẫu Phường B&#236;nh Trưng Đ&#244;ng Quận 2, Tổng Diện T&#237;ch Căn Nh&#224; 100m2 5mx20m 1 Trệt 3 Lầu 4 Ph&#242;ng Ngủ 5wc, S&#226;n Thượng Nh&#224; Giấy Tờ Sổ Hồng Hợp Lệ , Gi&#225; B&#225;n 17,5 Tỷ  Bao Sang T&#234;n \r\n \r\nVị tr&#237; 2 căn nh&#224; ở khu vực d&#226;n cư hiện hữu đ&#244;ng đ&#250;c gần chợ si&#234;u thị chợ trường học, nh&#224; thiếu nhi quận 2, bệnh viện quận 2, vị tr&#237; thuận lợi kinh doanh bu&#244;n b&#225;n mở văn ph&#242;ng c&#244;ng ty, \r\n                    \r\nQu&#253;...', '10.78368,106.75555', 'http://www.muabannhadat.vn/uploads/images/005/039/434/KvvdxX85wUmaJe1zF8o_XQ_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 09:27:41', '2018-10-30 02:27:41'),
(31, 'ban-lo-dat-dt-76m2-lo-goc-2mt-gia-4-6-ty-duong-8m-7313272', 0, '4,6 Tỷ VNĐ ', '                   Phường Bình Trưng Tây ,                    Quận 2 ', '                                      76 m² ', '                      Cần B&#225;n L&#244; Đất Dt 76m2 L&#244; G&#243;c 2mt Gi&#225; 4,6 Tỷ Đường 8m Phường B&#236;nh Trưng T&#226;y Quận 2  \r\n \r\nDT 5x15,2=76m2. Vị tr&#237; hướng T&#226;y thuộc khu d&#226;n cư hiện hữu, an ninh tốt, gần chợ, si&#234;u thị, trường học, TT h&#224;nh ch&#237;nh quận 2, nằm cạnh b&#234;n khu dự &#225;n biệt thự C&#225;t L&#225;i, c&#225;ch Nguyễn Duy Trinh 200m, c&#225;ch cầu Giồng &#212;ng Tố 300m(sổ hồng ri&#234;ng) gi&#225; b&#225;n 4,6 tỷ.  \r\n \r\nLH Mr T&#226;m 0937093938 - Mr Trường 0932005696, tư vấn xem đất miễn ph&#237;                  ', '10.78368,106.75555', 'http://www.muabannhadat.vn/uploads/images/007/313/272/UO9t5XrgF0OH_Qek4uFgOA_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 09:27:41', '2018-10-30 02:27:41'),
(32, 'ban-dat-tho-cu-tinh-lo-10-125m2-gia-860-trieu-duon-6451329', 0, '860 Triệu VNĐ ', '                   Xã Phạn Văn Hai ,                    Huyện Bình Chánh ', '                                      125 m² ', '                      Ch&#237;nh chủ: \r\nT&#244;i c&#243; l&#244; đất 125m2 cần b&#225;n đường Tỉnh Lộ 10, B&#236;nh ch&#225;nh cần b&#225;n \r\nNằm trong khu d&#226;n cư hiện đ&#227; hi&#234;n hữu đ&#244;ng, gần Trường THCS L&#234; Minh Xu&#226;n, bệnh viện đa khoa S&#224;i G&#242;n, trường TH Cầu X&#225;ng, chợ B&#224; L&#225;t. \r\n \r\nĐặc biệt liền kề c&#225;c cụm KCN L&#234; Minh Xu&#226;n 3, An Hạ, T&#226;n Đ&#244;, Hải Sơn, Li&#234;n minh. Th&#237;ch hợp kinh doanh nh&#224; trọ, bu&#244;n b&#225;n \r\n \r\nDiện t&#237;ch: 5x25m = 125m2. \r\n \r\nPh&#225;p l&#253;: Sổ hồng ri&#234;ng, bao sang t&#234;n c&#244;ng chứng, c&#243; GPXD nh&#224; cấp 4. \r\n \r\nGi&#225;: 860 triệu. \r\n \r\nĐường nhựa: 16m. \r\n \r\nLi&#234;n hệ: 0903. 080. 398 Ho&#224;ng Khải.                  ', '10.81917,106.53676', 'http://www.muabannhadat.vn/uploads/images/006/451/329/gndYUTiEEkCsVTRyv3dV-w_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:35:56', '2018-10-30 04:35:56'),
(33, 'can-ban-gap-lo-dat-mt-duong-hoang-phan-thai-xa-bin-7316403', 0, '240 Triệu VNĐ ', '                   Xã Bình Chánh ,                    Huyện Bình Chánh ', '                                      96 m² ', '- Do Nhu Cầu đầu tư cuối năm, T&#244;i Cần B&#225;n L&#244; Đất Ngay Mt đường Ho&#224;ng Phan Th&#225;i.x&#227; B&#236;nh Ch&#225;nh \r\n \r\n- Đất nằm tr&#234;n mặt tiền đường Ho&#224;ng phan th&#225;i, x&#227; b&#236;nh ch&#225;nh, huyện b&#236;nh ch&#225;nh \r\n- Diện T&#237;ch 6x16 ( 96m2) \r\n- Đất thổ cư 100% sổ hồng ri&#234;ng,gia đ&#236;nh t&#244;i bao giấy ph&#233;p x&#226;y dựng v&#224; xd tự do \r\n- Giao th&#244;ng di chuyển thuận lợi về trung t&#226;m th&#224;nh phố qua đại lộ Nguyễn Văn Linh \r\n \r\n- Di chuyển b&#225;n k&#237;nh 2km.c&#243; đầy đủ c&#225;c tiện &#237;ch như chợ b&#236;nh ch&#225;nh.UBND x&#227; b&#236;nh ch&#225;nh \r\n  ,trường cấp 1.2.3 b&#236;nh ch&#225;nh.bệnh viện nhi đồng 3. \r\n- Xung quanh d&#226;n cư hiện hữu.tiện kinh doanh bu&#244;n b&#225;n hoặc x&#226;y nh&#224; trọ \r\n- Bao sang t&#234;n c&#244;ng chứng nh&#224; nước,  \r\n \r\n- LH Đinh Ho&#224;ng Hải...', '10.66858,106.56279', 'http://www.muabannhadat.vn/uploads/images/007/316/403/CJGIvzEaakiKAQ2ow-rqaw_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:35:56', '2018-10-30 04:35:56'),
(34, 'ngay-04-11-2018-mo-ban-dot-1-khu-ten-lua-mo-rong-l-7816311', 0, '879 Triệu VNĐ ', '                   Phường Bình Trị Đông B ,                    Quận Bình Tân ', '                                      105 m² ', 'Th&#244;ng b&#225;o: V&#224;o ng&#224;y 04/11/2018 Mở B&#225;n Đợt  1 Khu D&#226;n Cư T&#234;n Lữa Mở Rộng Với nhiều Ưu Đ&#227;i Hấp Dẫn Cho Qu&#253; Kh&#225;ch H&#224;ng: \r\n \r\n- Vị Trị: Nằm Tr&#234;n Trục Đường Trần Văn Gi&#224;u Cắt Ngang Đường T&#234;n Lữa. \r\n- Ph&#225;p L&#253;: Sổ Ri&#234;ng Từng Nền, Sang T&#234;n c&#244;ng Chứng TRong Ng&#224;y. \r\n-Cơ sở Hạ Tầng Ho&#224;n Thiện: Đường Trải Nhựa 100% Sử Dụng Điện &#194;m Nước M&#225;y C&#243; Đ&#232;n Đường Nội Khu, đương Nội Bộ Nhỏ nhất 14m. \r\n- Chỉ với 879 triệu nhận ngay nền đất 105m2 đường nhựa 16m.  \r\n- D&#226;n cư đ&#244;ng đ&#250;c,an ninh. \r\n- Đối diện bệnh viện chợ rẫy 2 trong khu d&#226;n cư c&#243; đầy đủ tiện &#237;ch như: trường học c&#225;c cấp,si&#234;u thị, chợ...  \r\n- Tri &#226;n kh&#225;ch h&#224;ng:  \r\n+ Chiết khấu 5-10%  \r\n+ Nhận m&#227; bốc thăm tr&#250;ng...', '10.74278,106.60917', 'http://www.muabannhadat.vn/uploads/images/007/816/311/voNfxRQzYEKx5sSKJB9CQg_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:35:57', '2018-10-30 04:35:57'),
(35, 'can-ban-lo-dat-tho-cu-thoi-tam-thon-hoc-mon-tp-hcm-7728707', 0, '5,6 Tỷ VNĐ ', '                   Xã Thới Tam Thôn ,                    Huyện Hóc Môn ', '                                      300 m² ', '                      M&#236;nh đang cần b&#225;n l&#244; đất 10x30,  nở hậu 13m - Thổ cư 292m2.  \r\n \r\nVị tr&#237;: C&#225;ch ng&#227; 3 Đ&#244;ng Quang 500m. Thuộc Thới Tam Th&#244;n, H&#243;c M&#244;n Đường ch&#237;nh nối liền Quận 12 v&#224; H&#243;c M&#244;n. \r\nHiện c&#243; 4 ph&#242;ng trọ đang cho thu&#234;. C&#225;ch đường Nguyễn Thị Thảnh 10m. Gần ng&#227; 3 Phạm Thị Gi&#226;y - Nguyễn Thị Thảnh.  \r\nPh&#249; hợp l&#224;m kho xưởng, x&#226;y nh&#224; trọ, xung quanh khu vực hiện c&#243; rất nhiều nh&#224; xưởng v&#224; nh&#224; trọ. \r\nGi&#225; b&#225;n: 5 tỷ 6(c&#243; thương lượng) \r\n \r\nLi&#234;n hệ Ms H&#224; 0934035568                  ', '10.89233,106.61424', 'http://www.muabannhadat.vn/uploads/images/007/728/707/o3CqTwunoE6J0RPTeGGIkQ_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:35:58', '2018-10-30 04:35:58'),
(36, 'lo-dat-tho-cu-so-rieng-nguyen-van-linh-binh-chanh-7816268', 0, '1,72 Tỷ VNĐ ', '                   Xã Bình Chánh ,                    Huyện Bình Chánh ', '                                      195 m² ', 'Đất nằm tr&#234;n đường T12 gần hương lộ 11, khu chợ đ&#244;ng đ&#250;c, nhiều nh&#224; m&#225;y, x&#237; nghiệp, c&#244;ng ty n&#234;n lượng c&#244;ng nh&#226;n rất đ&#244;ng v&#236; thế n&#234;n gia đ&#236;nh t&#237;nh đầu tư nh&#224; trọ nhưng do chi ph&#237; x&#226;y dựng kh&#244;ng đủ n&#234;n lại th&#244;i. \r\n \r\nC&#225;ch mặt tiền đường lớn khoản 200m. Đường nhựa ph&#237;a trước 6m, chưa t&#237;nh lề, điện nước đầy đủ, kh&#244;ng ngập &#250;ng, xung quanh đ&#227; c&#243; d&#226;n sinh sống.  \r\n \r\nDiện t&#237;ch: 9.75x20 (195m2) thổ cư 100%, c&#243; sổ hồng, x&#226;y dựng tự do. \r\nGi&#225;: 1 tỷ 720tr (Bớt t&#253; cafe cho người thiện ch&#237;, t&#244;i lo giấy tờ c&#225;c thứ nha). \r\n \r\nAi thật sự c&#243; nhu cầu mua th&#236; m&#236;nh gặp nhau trao đổi cụ thể lu&#244;n, tr&#225;nh t&#236;nh trạng mất thời gian với anh em m&#244;i giới.                  ...', '0.0,0.0', 'http://www.muabannhadat.vn/uploads/images/007/816/268/saic3pU3W0eEC58t7CnlJA_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:35:59', '2018-10-30 04:35:59'),
(37, '/dat-ban-dat-cong-nghiep-3534/chinh-chu-can-ban-day-dat-trong-cay-lau-nam-o-xa-n-7095753', 0, '12 Tỷ VNĐ ', '                   Xã Nhuận Ðức ,                    Huyện Củ Chi ', '                                      20000 m² ', '1/ Đất trồng c&#226;y l&#226;u năm c&#243; vườn c&#226;y ăn tr&#225;i( ch&#244;m ch&#244;m, sầu ri&#234;ng, măng cụt). \r\n- Mặt tiền s&#244;ng S&#224;i G&#242;n, đất gi&#225;p 2 mặt tiền đường đất đỏ 8m. \r\n- Diện t&#237;ch 40.000m2. \r\n- Gi&#225; ưu đ&#227;i: 550 ng&#224;n/m2. \r\n- Vị tr&#237;: X&#227; An Ph&#250; Huyện Củ Chi ( gần khu du lịch 1 tho&#225;ng Việt Nam). \r\n \r\n2/ Cần nhượng gấp đất trồng c&#226;y l&#226;u năm đường G&#243;t Ch&#224;ng, Nhuận Đức, H. Củ Chi, gần trường Thiếu Sinh Qu&#226;n, KDL Bến Đ&#236;nh, đường nhựa 10M). \r\n- Diện t&#237;ch: 11.000 m2 - Gi&#225; 500 Ng&#224;n/m2. \r\n \r\n3/ Đất trồng c&#226;y l&#226;u năm. Đường B&#249;i Thị Ngọn, Tường cao 2m bao quanh đất. X&#227; Nhuận Đức, H Củ Chi. \r\n- Diện t&#237;ch: 20.000m2 - Gi&#225; 600.000N/m2. \r\n \r\n4/ Đường Nguyễn Thị R&#224;nh, Dt: 13.500m2 Gi&#225; 1.500.000/m2 \r\n C&#243; Thổ Cư 500m2,...', '11.01056,106.48374', 'http://www.muabannhadat.vn/uploads/images/007/095/753/3HiPGXV9cUONkgtbbjSDEg_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:35:59', '2018-10-30 04:35:59'),
(38, 'can-ban-gap-lo-goc-187-5m2-tho-cu-xay-dung-duoc-ng-7815822', 0, '950 Triệu VNĐ ', '                   Xã Phạn Văn Hai ,                    Huyện Bình Chánh ', '                                      188 m² ', '                       \r\n+ C&#225;ch tỉnh lộ 10 1km, gần UB X&#227; Phạm Văn Hai, KCN L&#234; Minh Xu&#226;n III \r\n \r\n+ Đất đ&#227; l&#234;n thổ cư ho&#224;n to&#224;n, c&#243; GPXD, x&#226;y tự do, c&#243; thầu nhận x&#226;y. \r\nĐất đ&#227; ho&#224;n th&#224;nh nghĩa vụ đ&#243;ng thuế. Đường đ&#227; trải nhựa 20m, đường th&#244;ng. \r\n+ Khu d&#226;n cư đ&#244;ng, sầm uất nằm ngay giữa chợ B&#192; L&#193;T, an ninh văn h&#243;a. \r\n+ Gần KCN Vĩnh Lộc c&#244;ng nh&#226;n đ&#244;ng, tiện kinh doanh mua b&#225;n, mở tiệm, x&#226;y trọ cho thu&#234; hoặc x&#226;y nh&#224; b&#225;n. \r\n+ Khu cao r&#225;o kh&#244;ng ngập nước. \r\n+ Sổ hồng ch&#237;nh chủ, bao sang t&#234;n c&#244;ng chứng. \r\n+ Cần b&#225;n gấp thương lượng A/C thiện ch&#237; mua. \r\n \r\n+ Cần b&#225;n gấp LH: 0938.671.436 A Chương. \r\nXin cảm ơn.                  ', '10.81917,106.53676', 'http://www.muabannhadat.vn/uploads/images/007/815/822/4Y9VAKc3c0yiweLbG591cw_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:35:59', '2018-10-30 04:35:59'),
(39, 'vay-nong-can-tien-tra-no-ban-nhanh-lo-dat-duong-bu-6754523', 0, 'Giá bảo mật ', '                   Thị Trấn Tân Túc ,                    Huyện Bình Chánh ', '                                      120 m² ', '                      - T&#244;i c&#243; miếng đất đường B&#249;i Thanh Khiết diện t&#237;ch 6x20, vu&#244;ng vức, kh&#244;ng ngập  nước. \r\n \r\n- Diện t&#237;ch n&#224;y x&#226;y nh&#224; cũng đẹp m&#224; x&#226;y ph&#242;ng trọ cũng đẹp. \r\n- T&#244;i mua năm 2015 giờ b&#225;n bằng gi&#225; thời điểm mua, gi&#225; b&#225;n nhanh 238tr  \r\n- Gần nh&#224; đầy đủ tiện &#237;ch như: trường học, chợ, nh&#224; s&#225;ch, nh&#224; thiếu nhi... \r\n- C&#225;ch quốc lộ 1A chưa tới 500m, di chuyển thuận tiện về c&#225;c quận trung t&#226;m q5, q6, B&#236;nh T&#226;n... \r\n- Kh&#225;ch thiện ch&#237; mua b&#225;n nhanh c&#243; thể thương lượng đ&#244;i ch&#250;t. \r\n \r\nCảm ơn anh chị đọc tin, cần đi xem đất gọi t&#244;i trước v&#236; t&#244;i vẫn đi l&#224;m 0931.338.318                  ', '10.68159,106.57849', 'http://www.muabannhadat.vn/uploads/images/006/754/523/AcqzTwgKhEWk7lmKOHXBng_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:36:00', '2018-10-30 04:36:00'),
(40, 'ban-dat-cu-chi-shr-dt-115m2-xdtd-ngay-benh-vien-xu-7815655', 0, '800 Triệu VNĐ ', '                   Xã Tân Phú Trung ,                    Huyện Củ Chi ', '                                      115 m² ', '                      B&#225;n Đất Nền Củ Chi ngay Bệnh Viện Xuy&#234;n &#193; Đ&#227; C&#243; Sổ Hồng Ri&#234;ng \r\nGi&#225; 800tr/nền \r\nH&#236;nh thật 100% \r\n \r\n- Diện t&#237;ch: 5x23 , 6x23 \r\nSố lượng: 9 nền \r\n- Bệnh viện xuy&#234;n &#225; \r\n- Chợ T&#226;n Ph&#250; Trung \r\n- Kcn T&#226;n Ph&#250; Trung \r\n- Ủy ban nh&#226;n d&#226;n \r\n- Trường học,ng&#226;n h&#224;ng \r\n- Thế giới di động,điện m&#225;y xanh \r\n \r\nCam kết: \r\n+ Đ&#227; c&#243; sổ hồng ri&#234;ng,bao sang t&#234;n trong ng&#224;y. \r\n+ Đất thuộc Củ Chi - Tp. HCM  \r\n+ Gi&#225; rẻ nhất khu vực \r\n+ Kết nối giao th&#244;ng thuận tiện \r\n+ Kh&#244;ng qua trung gian ( miễn tiếp c&#242; l&#225;i) \r\n \r\nLi&#234;n hệ 0988.544.847 - 0989.422.645 để được tham quan v&#224; nhận qu&#224; miễn ph&#237;                  ', '10.97338,106.47850', 'http://www.muabannhadat.vn/uploads/images/007/815/655/Q6Mq9Kx-qUGvAwPkz5UGzw_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:36:01', '2018-10-30 04:36:01'),
(41, 'thua-lo-ban-272m2-dat-mat-tien-duong-ton-that-thuy-7810394', 0, '1,9 Tỷ VNĐ ', '                   Phường 03 ,                    Quận 4 ', '                                      272 m² ', '                      - C&#226;̀n ti&#234;̀n trả nợ n&#234;n t&#244;i bán gấp l&#244; đất Th&#244;̉ Cư MẶT TI&#202;̀N đường T&#244;n Th&#226;́t Thuy&#234;́t, p.3, qu&#226;̣n 4. Li&#234;n hệ 0388294781 \r\n- Di&#234;̣n tích 272m2, ngang 12m, x&#226;y dựng tự do.  \r\n- Vị trí thu&#226;̣n lợi, đ&#226;̀y đủ dịch vụ từ ng&#226;n hàng, si&#234;u thị, chợ trường học các c&#226;́p, g&#226;̀n ngay TRUNG T&#194;M TP. Thích hợp đ&#226;̀u tư, kinh doanh, mở quán... \r\n- S&#212;̉ H&#212;̀NG RI&#202;NG chính chủ, gi&#226;́y tờ đ&#226;̀y đủ hợp l&#234;̣. \r\n- Giá 1.9 tỷ – Mong ti&#234;́p người thi&#234;̣n chí kh&#244;ng ti&#234;́p cò lái. \r\n \r\n- Vui l&#242;ng li&#234;n hệ 0388294781 \r\n                  ', '10.75296,106.69316', 'http://www.muabannhadat.vn/uploads/images/007/810/394/WD5DpqDN-EiPwzF9RJ6qrA_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:39:53', '2018-10-30 04:39:53'),
(42, 'ban-314m2-dat-mat-tien-duong-nguyen-khoai-q4-so-ho-7810390', 0, '2,1 Tỷ VNĐ ', '                   Phường 02 ,                    Quận 4 ', '                                      314 m² ', '                      + Kẹt ti&#234;̀n t&#244;i c&#226;̀n bán nhanh l&#244; Đ&#226;́t Th&#244;̉ Cư ngay Mặt ti&#234;̀n Đường Nguy&#234;̃n Khoái, p.2, qu&#226;̣n 4. Li&#234;n h&#234;̣: 0388294781 \r\n+ Di&#234;̣n tích 314m2 ngang 12m, đ&#226;́t vu&#244;ng vức si&#234;u đẹp. \r\n+ Vị trí đẹp, g&#226;̀n: Trường học các c&#226;́p, B&#234;̣nh vi&#234;̣n, H&#234;̣ th&#244;́ng si&#234;u thị, Chợ.... Thích hợp kinh doanh, mua bán hoặc đ&#226;̀u tư sinh lời.... \r\n+ Pháp lý rõ ràng – S&#212;̉ H&#212;̀NG RI&#202;NG CHÍNH CHỦ. \r\n+ Giá  2.1 tỷ (thương lượng) cho người thi&#234;̣n chí. \r\n \r\nLi&#234;n h&#234;̣ 0388294781 (chính chủ) mi&#234;̃n trung gian. \r\n                  ', '10.75574,106.69399', 'http://www.muabannhadat.vn/uploads/images/007/810/390/HGrh1AjdGEq3JiQJf5vyRQ_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:39:53', '2018-10-30 04:39:53'),
(43, 'ban-nhanh-254m2-tho-cu-mat-tien-duong-vinh-khanh-s-7810415', 0, '2 Tỷ VNĐ ', '                   Phường 10 ,                    Quận 4 ', '                                      254 m² ', '                      Gia đình đi định cư b&#234;n Úc n&#234;n bán v&#244;̣i l&#244; Đ&#226;́t Th&#244;̉ Cư nằm ngay Mặt Ti&#234;̀n Đường Vĩnh Khánh, p.10, qu&#226;̣n 4. \r\n \r\n- Diện t&#237;ch: 254m2 ngang 10m, nở h&#226;̣u. \r\n- Ph&#225;p l&#253; đ&#227; c&#243; SỔ HỒNG RI&#202;NG, full thổ cư. \r\n- Cơ sở hạ tầng tiện nghi tuy&#234;̣t đ&#244;́i. C&#225;ch trung t&#226;m h&#224;nh ch&#237;nh, trung t&#226;m y tế, trung t&#226;m thương mại, chợ, trường học, c&#244;ng vi&#234;n… chỉ 1 ph&#250;t. D&#226;n cư đ&#244;ng đ&#250;c, sát trung t&#226;m TP n&#234;n l&#224; cơ hội tốt để đ&#226;̀u tư, bu&#244;n b&#225;n, cho thu&#234;.... \r\nGiá bán 2 tỷ (kh&#244;ng thương lượng). \r\n \r\nLi&#234;n h&#234;̣: 0975298785 (kh&#244;ng ti&#234;́p cò, lái) \r\n                  ', '10.76116,106.70524', 'http://www.muabannhadat.vn/uploads/images/007/810/415/nqBMeIgoF023y_dlnonc3w_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:39:56', '2018-10-30 04:39:56'),
(44, 'tin-hot-365m2-dat-mat-tien-hoang-dieu-so-hong-rien-7742035', 0, '3,1 Tỷ VNĐ ', '                   Phường 06 ,                    Quận 4 ', '                                      365 m² ', '                      - Định cư nước ngo&#224;i b&#225;n gấp  l&#244; đất MẶT TIỀN đường Ho&#224;ng Diệu. L&#244; si&#234;u đẹp \r\n- Diện t&#237;ch 365m2, ngang 15m, vu&#244;ng vức  \r\n \r\n- Nằm ngay khu d&#226;n cư hiện hữu, đất thổ cư 100%,  \r\n \r\n- Nằm ngay trung t&#226;m quận 4, gần chợ, si&#234;u thị, bệnh viện, trường học, nh&#224; văn h&#243;a, gần l&#224;ng ẩm thực mở qu&#225;n ăn uống l&#224; si&#234;u lời \r\n \r\n- Thuận tiện di chuyển c&#225;c quận 1, 7, B&#236;nh Thạnh… chỉ mất khoảng 10p – 15p \r\n \r\n- C&#243; Sổ hồng ri&#234;ng \r\n \r\n-Gi&#225; 3,1 tỷ \r\n** Li&#234;n hệ xem đất: 0907278226 \r\n \r\n                  ', '10.76079,106.69992', 'http://www.muabannhadat.vn/uploads/images/007/742/035/mN7o3PA8GkWPu1wZWNMIPg_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:39:57', '2018-10-30 04:39:57'),
(45, 'ban-gap-dat-gan-nguyen-duy-trinh-p-an-phu-gan-vinc-7817075', 0, '1,2 Tỷ VNĐ ', '                   Phường An Phú ,                    Quận 2 ', '                                      100 m² ', '                      Vị tr&#237; đắc địa, tọa lạc đường Song H&#224;nh cao tốc, phường An Ph&#250;, Quận 2. Đối diện khu đ&#244; thị Lakeview City của tập đo&#224;n Novaland. \r\n \r\nDiện t&#237;ch: 5x20m. \r\nTiện &#237;ch: \r\n- Thổ cư, cơ sở hạng tầng điện &#226;m nước m&#225;y, đường trải nhựa. \r\n- D&#226;n cư sầm uất, giao th&#244;ng thuận lợi di chuyển về trung t&#226;m th&#224;nh phố. \r\n- Gần trường học THCS Nguyễn Văn Trỗi, liền kề Vincom quận 2, chợ, căn hộ, bệnh viện.... \r\n- Rất thuận tiện để ở sinh hoạt hay đầu tư, x&#226;y ph&#242;ng trọ cho thu&#234;. \r\n \r\n- Ph&#225;p l&#253;: \r\nSổ hồng ri&#234;ng. \r\n+ Thời gian sang t&#234;n v&#224; nhận sổ theo quy định của nh&#224; nước. \r\n- Gi&#225; chỉ 1,2 tỷ. \r\n \r\nLi&#234;n hệ: 0934.007.232                  ', '10.76451,106.74686', 'http://www.muabannhadat.vn/uploads/images/007/817/075/2ksUokAcFkOMw_5ZTKW-5A_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:42:49', '2018-10-30 04:42:49'),
(46, 'dat-tho-cu-296m2-mat-tien-duong-vinh-hoi-so-hong-r-7810406', 0, '2,1 Tỷ VNĐ ', '                   Phường 04 ,                    Quận 4 ', '                                      296 m² ', '                      + Cần b&#225;n l&#244; đất 296m2 ngang 12m đ&#226;́t Th&#244;̉ Cư nằm ngay MẶT TI&#202;̀N đường Vĩnh H&#244;̣i, p.4, qu&#226;̣n 4. \r\n+ SỔ HỒNG RI&#202;NG chính chủ. Đất sạch kh&#244;ng lộ giới, kh&#244;ng quy hoạch nằm ngay khu vực sằm u&#226;́t có đ&#226;̀y đủ những ti&#234;̣n ích bao quanh: si&#234;u thị, chợ, trường học các c&#226;́p sát Trung T&#226;m Thành Ph&#244;́. \r\n+ Giá 2.1 tỷ (kh&#244;ng thương lượng). \r\n \r\nLi&#234;n hệ 0397165841 chính chủ bán kh&#244;ng ti&#234;́p cò, lái xin đừng làm m&#226;́t thời gian. \r\n                  ', '10.75610,106.70351', 'http://www.muabannhadat.vn/uploads/images/007/810/406/wltm7TIgyUiwTnOZYqtsXw_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:45:51', '2018-10-30 04:45:51'),
(47, 'tin-da-duyet-chinh-chua-can-sang-nhuong-gap-lo-5x2-7812828', 0, '850 Triệu VNĐ ', '                   Phường 13 ,                    Quận 6 ', '                                      100 m² ', '                      Tin đ&#227; duyệt ch&#237;nh chủa - Cần Sang Nhượng gấp L&#244; 5x20 -100m2, Ngay Chợ, Sầm uất. \r\n \r\n- Sang Nhượng b&#225;n lại l&#244; đất như trong h&#236;nh diện t&#237;ch: 100m2 - 5x20m,  Cốt nền bằng mặt tiền đường kh&#244;ng cần sang lấp, x&#226;y nh&#224; được ngay, Khu d&#226;n cư đ&#244;ng đ&#250;c. \r\n- Đất vu&#244;ng vắn g&#243;c cạnh, đẹp cực k&#236;, xem đất l&#224; m&#234;, khu x&#226;y dựng tự do. \r\n- Sổ hồng đứng t&#234;n ch&#237;nh, thủ tục nhanh, bao thủ tục giấy tờ \r\n- Sổ hồng mới 2017, do đợt cấp mới của Th&#224;nh Phố. \r\n \r\n- Ngay Aeon B&#236;nh T&#226;n, l&#224;m g&#236; hay đi đ&#226;u đều tiện, về đ&#226;y kinh doanh l&#224; cực k&#236; tốt, Gần bến xe \r\n- Cảm ơn C&#244;/Ch&#250;/Anh/Chị đ&#227; quan t&#226;m đọc tin. \r\n- Li&#234;n hệ sớm nh&#233; !                  ', '10.75323,106.62963', 'http://www.muabannhadat.vn/uploads/images/007/812/828/yFOoHpmZUkiYgwS1TC-fYQ_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:55:23', '2018-10-30 04:55:23'),
(48, 'can-tien-tra-no-ban-gap-550m2-mat-tien-ba-hom-ngan-7041059', 0, '2,85 Tỷ VNĐ ', '                   Phường 02 ,                    Quận 6 ', '                                      550 m² ', '                      Cần Tiền Trả Nợ B&#225;n Gấp 550m2 Mặt Tiền B&#224; Hom, Ngang Si&#234;u Đẹp, Full Thổ Cư, Sổ hồng ri&#234;ng, 0946299043 \r\n \r\nT&#244;i đang cần tiền trả nợ n&#234;n cần b&#225;n gấp 550m2 đất mặt tiền tr&#234;n đường B&#224; Hom \r\nTr&#234;n mảnh đất của t&#244;i c&#243; căn nh&#224; n&#225;t, c&#243; thể sửa lại ở được \r\n \r\nGi&#225; b&#225;n nhanh CHỈ 2.85 tỷ \r\n \r\nDiện t&#237;ch 550m2 ngang 15m, Full thổ cư, được cấp giấy ph&#233;p x&#226;y dựng tự do \r\nC&#225;ch si&#234;u thị Co.op Mart 300m, gần trường hộc c&#225;c cấp, gần chợ B&#224; Hom,...&#160; \r\nTh&#237;ch hợp mua đầu tư sinh lời, kinh doanh mua b&#225;n \r\n \r\nLi&#234;n hệ ngay Anh Lạc 0946.299.043 gặp Nhật để trao đổi                  ', '0.0,0.0', 'http://www.muabannhadat.vn/uploads/images/007/041/059/l0YiC8okjkS0JAsHd_2fuQ_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:55:23', '2018-10-30 04:55:23'),
(49, 'con-du-hoc-ban-gap-296m2-dat-mat-tien-dang-nguyen-7810388', 0, '1,55 Tỷ VNĐ ', '                   Phường 14 ,                    Quận 6 ', '                                      296 m² ', '                      Con du học b&#225;n gấp 296m2 đ&#226;́t MẶT TIỀN Đặng Nguy&#234;n C&#226;̉n, sổ hồng ri&#234;ng  gi&#225; 1.55 tỷ. \r\n \r\nHiện tại c&#226;̀n ti&#234;̀n lo cho con định cư nước ngo&#224;i b&#225;n gấp 306m2 đất mặt tiền Phan Văn Trị c&#225;ch chợ Phú L&#226;m  300m . \r\n \r\nDiện t&#237;ch:  296m2, ngang 7m,  thổ cư 100%  si&#234;u đẹp . \r\n \r\nKhu n&#224;y d&#226;n cư đ&#244;ng đ&#250;c, gần chợ, trường học,  di chuy&#234;̉n sang qu&#226;̣n huy&#234;̣n khác d&#234;̃ dàng \r\n \r\nGi&#225; b&#225;n gấp 1.55 tỷ trong 4 ng&#224;y	 \r\n \r\nPháp lý: SỔ HỒNG RI&#202;NG kh&#244;ng tiếp m&#244;i giới \r\n \r\nLi&#234;n hệ  Thanh 0912269412  chính chủ \r\n                  ', '10.75845,106.62916', 'http://www.muabannhadat.vn/uploads/images/007/810/388/viytJNgP6kS05ZMmrbDirw_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:55:24', '2018-10-30 04:55:24'),
(50, 'chu-no-ep-qua-ban-gap-542-m2-tho-cu-mat-tien-pham-7810508', 0, '2,6 Tỷ VNĐ ', '                   Phường 07 ,                    Quận 6 ', '                                      542 m² ', '                      Chủ nợ &#233;p qu&#225;!!!! b&#225;n gấp 542 m2 thổ cư, mặt tiền phạm văn ch&#237;, Q.6 gi&#225; rẻ 2,6 tỷ  \r\n-	Diện t&#237;ch 542m2 ngang 14 \r\n-	Vị tr&#237; đẹp MẶT TIỀN  phạm văn ch&#237; c&#225;ch trường tiểu học h&#249;ng vương 100m \r\n-	Gần chợ, gần trường học  \r\n-       ch&#237;nh chủ kh&#244;ng  tranh chấp c&#243; sổ hồng ri&#234;ng   \r\n \r\n-	GI&#193; RẺ 2,6 tỷ                  ', '10.73835,106.63880', 'http://www.muabannhadat.vn/uploads/images/007/810/508/58iIRVL7TUK9mEIMloUy6w_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:55:24', '2018-10-30 04:55:24'),
(51, 'dat-hem-129-ly-chieu-hoang-12x32-5m-gia-cuc-re-7807825', 0, '16 Tỷ VNĐ ', '                   Phường 10 ,                    Quận 6 ', '                                      391 m² ', '                      * Đất hẻm nằm trong khu an ninh, d&#226;n tr&#237; cao, c&#225;ch mặt tiền 100m. Gần ng&#227; 4 An Dương Vương với L&#253; Chi&#234;u Ho&#224;ng. Tiện &#237;ch xung quanh như Metro B&#236;nh Ph&#250;, c&#244;ng vi&#234;n B&#236;nh Ph&#250;, trường học c&#225;c cấp, chợ, Biti&#39;s..... \r\n \r\n- Diện t&#237;ch: 12x32.5m= 391m2, trong đ&#243; c&#243; 301 m2 l&#224; thổ cư, c&#242;n lại l&#224; đất n&#244;ng nghiệp kh&#225;c \r\n \r\n- Gi&#225;: 16 tỷ  \r\n \r\n- Xin c&#225;m ơn                  ', '10.73628,106.62848', 'http://www.muabannhadat.vn/uploads/images/007/807/825/LPLWKEMAxE6LNiqChvh-mw_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:55:25', '2018-10-30 04:55:25');
INSERT INTO `dat_web` (`id`, `link`, `TrangThai`, `Gia`, `DiaChi`, `DienTich`, `MoTa`, `Map`, `Hinh`, `TenKhach`, `Email`, `DienThoai`, `NoiDung`, `created_at`, `updated_at`) VALUES
(52, 'ban-du-an-duong-vo-van-kiet-3-600m2-5383408', 0, '195 Tỷ VNĐ ', '                   Phường 07 ,                    Quận 6 ', '                                      3600 m² ', '                      Vị tr&#237;: \r\nB&#225;n 3.600m2 đất (50m x 70m) đường V&#245; Văn Kiệt phường 7 Quận 6 th&#224;nh phố Hồ Ch&#237; Minh \r\nGần cầu Lồ Gốm \r\nViue s&#244;ng   \r\nC&#225;ch trung t&#226;m quận 1 khoảng 10 ph&#250;t &#244; t&#244; chạy 3km đường th&#244;ng tho&#225;ng kh&#244;ng kẹt xe \r\n \r\nKết cấu: \r\nDự &#225;n đ&#227; c&#243; giấy ph&#233;p x&#226;y dựng, trung t&#226;n thương mại kết hợp căn hộ dịch vụ \r\n25 tầng trong đ&#243; 3 hầm 21 tần + kỹ thuật, chiều cao 92m \r\nMật độ x&#226;y dựng 40% \r\nHệ số sử dụng đất 7 \r\nTổng số căn hộ 190 căn \r\n \r\nPh&#225;p l&#253;: \r\nĐất ở đ&#244; thị, L&#226;u d&#224;i \r\n \r\nGi&#225;: \r\nGi&#225; 195 tỷ cho chủ đầu tư thiện tr&#237; v&#224; c&#243; năng lực (MTG) \r\n \r\nLi&#234;n hệ trực tiếp:  \r\nĐinh Tự: 0983142229 / 0974858627                  ', '10.73835,106.63880', 'http://www.muabannhadat.vn/uploads/images/005/383/408/fKnph5aw4EybHhyGUEuZLQ_1.jpg', NULL, NULL, NULL, NULL, '2018-10-30 11:55:25', '2018-10-30 04:55:25'),
(53, 'ban-gap-lo-dat-tho-cu-244m2-mat-tien-duong-tan-vin-7814700', 0, '4,2 Tỷ VNĐ ', '                   Phường 06 ,                    Quận 4 ', '                                      244 m² ', '                      Cần vốn làm ăn n&#234;n b&#225;n gấp l&#244; đất TH&#212;̉ CƯ mặt tiền đường T&#226;n Vĩnh, P.6, qu&#226;̣n 4.  \r\n \r\n- Di&#234;̣n tích: 244m2, rộng 10m.  \r\n \r\n- S&#244;̉ H&#244;̀ng Ri&#234;ng c&#244;ng chứng ngay. G&#226;̀n Ngay Trung T&#226;m Thành Ph&#244;́, Khu d&#226;n cư rất đ&#244;ng đ&#250;c, sầm uất, chợ, khu thể thao, giải tr&#237;, trường học, bệnh viện đầy đủ n&#234;n ti&#234;̣n Kinh Doanh, Đ&#226;̀u Tư, Bu&#244;n Bán.... \r\n \r\n- Gi&#225; chỉ 4.2 tỷ, thương lượng nhẹ cho người c&#243; thiện chí. \r\n \r\nLi&#234;n h&#234;̣ 0388294781 (kh&#244;ng ti&#234;́p m&#244;i giới). \r\n                  ', '10.75842,106.70087', 'http://www.muabannhadat.vn/uploads/images/007/814/700/gWXRI5jF_kqybNDpsi3rPg_1.jpg', NULL, NULL, NULL, NULL, '2018-10-31 09:49:39', '2018-10-31 02:49:39'),
(54, 'can-tien-ban-gap-dat-so-hong-108-7m-p-binh-an-q-2-7822614', 0, '86 Triệu VNĐ ', '                   Phường Bình An ,                    Quận 2 ', '                                      109 m² ', 'B&#225;n đất sổ hồng 108.7m Q.2 P.B&#236;nh An gần Metro An Ph&#250; ch&#237;nh chủ gi&#225; rẻ 86tr/m thương lượng  \r\n \r\nVị tr&#237; nh&#224; đất thuộc khu vực chưa c&#243; quy hoạch chi tiết. Lộ giới hẻm hướng T&#226;y Bắc l&#224; 6m. \r\n \r\nL&#244; đất sổ hồng 108.7m2 Hướng T&#226;y Bắc,  \r\nMặt hậu gi&#225;p ranh dự &#225;n 131HA sẽ l&#224;m đường (diện t&#237;ch 108,7m2 l&#224; đ&#227; trừ ranh dự &#225;n rồi), tương lai c&#243; th&#234;m mặt tiền đường lớn Hướng Đ&#244;ng Nam, c&#243; thể t&#225;ch sổ để th&#224;nh 2 nh&#224; đ&#226;u lưng nhau. \r\nMặt tiền ngang 4,6m x d&#224;i 23,63m = 108,7m2 rất ph&#249; hợp để t&#225;ch l&#224;m 2 căn 54m2 \r\nVị tr&#237; nh&#224; đất thuộc khu vực chưa c&#243; quy hoạch chi tiết. Lộ giới hẻm hướng T&#226;y Bắc l&#224; 6m, hiện hữu l&#224; đường hẻm b&#234; t&#244;ng 3m. \r\nHai b&#234;n liền kề l&#224;...', '10.79184,106.73191', 'http://www.muabannhadat.vn/uploads/images/007/822/614/ImpWguDK-km21cFHe9XYIA_1.jpg', NULL, NULL, NULL, NULL, '2018-10-31 16:34:55', '2018-10-31 09:34:55'),
(55, 'chinh-chu-ban-gap-11-lo-dat-ngay-duong-tran-nao-ga-7823632', 0, '1,4 Tỷ VNĐ ', '                   Phường Bình An ,                    Quận 2 ', '                                      100 m² ', '                      Do nhu cầu chuyển ra nước ngo&#224;i sinh sống t&#244;i cần b&#225;n gấp 11 l&#244; đất để đầu tư. \r\nCăn g&#243;c cực k&#236; đẹp, để ở hoạc đầu tư đều được. \r\n \r\nDiện t&#237;ch 100m2 \r\nGi&#225; b&#225;n 8ty/ 1 nền \r\n \r\nSổ đỏ ch&#237;nh chủ, c&#244;ng chứng sang t&#234;n nhanh \r\nVị tr&#237; nằm mặt tiền đường số 12, trần n&#227;o, P b&#236;nh an, Quận 2 \r\nNgay khu d&#226;n cư Caric \r\nC&#225;ch chợ 500m \r\nC&#225;ch trường học 50m, c&#244;ng an khu vực 50m \r\n \r\nĐường 10m rộng r&#227;i tho&#225;ng m&#225;t. \r\nĐi qua c&#225;c quận trung t&#226;m rất gần \r\nGi&#225; rẻ n&#234;n chỉ tiếp người thiện ch&#237; \r\nC&#242; l&#225;i xin đừng gọi tốn thời gian đ&#244;i b&#234;n. \r\n \r\nLi&#234;n hệ Anh Minh                  ', '0.0,0.0', 'http://www.muabannhadat.vn/uploads/images/007/823/632/JlVNiTlMcU-KX39Vyc6KLg_1.jpg', NULL, NULL, NULL, NULL, '2018-10-31 18:40:46', '2018-10-31 11:40:46'),
(56, 'ngay-04-11-2018-nh-sacombank-ho-tro-vay-va-thanh-l-7603458', 0, 'Giá bảo mật ', '                   Phường 13 ,                    Quận 5 ', '                                      110 m² ', 'Li&#234;n hệ đặt chỗ v&#224; nhận ch&#237;nh s&#225;ch tốt nhất trong ng&#224;y mở b&#225;n : 0934771173  Mr. Đức \r\n \r\n+ NG&#192;Y:  04/11/2018 \r\n \r\n- Thời gian: 08: 15 đến 10h30. \r\n \r\n- Chi tiết sản phẩm: \r\n+ Đất nền, sổ hồng ri&#234;ng, thổ cư, điện, nước đ&#227; c&#243; sẵn. \r\n+ Khu d&#226;n cư đ&#244;ng đ&#250;c, x&#226;y dựng tự do liền kề c&#225;c cụm khu c&#244;ng nghiệp: tiện kinh doanh, X&#226;y ở, nh&#224; xưởng, nh&#224; kho, trọ... \r\n+ Diện t&#237;ch đa dạng từ 80m2 - 180m2.(5x10, 5x12, 5x16, 5x21, 5x26, ...10x18) \r\n+ Tất cả c&#225;c tuyến đường đều tr&#227;i nhựa: 12m, 16m, 30m. \r\n+ G&#237;a ni&#234;m yết: 1,5 tỷ /nền 110m2. ( từ 13,5 triệu đến 22 triệu/m2) \r\n \r\nƯu đ&#227;i kh&#225;ch h&#224;ng: \r\n- Chiết khấu 7% \r\n- Hỗ trợ vay 60% \r\n- Trả chậm 0 l&#227;i suất \r\n- Bao c&#244;ng chứng sang t&#234;n. \r\n- R&#250;t thăm tr&#250;ng thưởng l&#234;n...', '10.74956,106.65687', 'http://www.muabannhadat.vn/uploads/images/007/603/458/KnN0PLhX-kG3blACdL92SQ_1.jpg', NULL, NULL, NULL, NULL, '2018-10-31 18:41:22', '2018-10-31 11:41:22'),
(57, 'biet-thu-xanh-200m2-mang-thien-nhien-den-gia-dinh-7584511', 0, '3 Tỷ VNĐ ', '                   Phường 07 ,                    Quận 5 ', '                                      200 m² ', '                      Vị tr&#237; v&#224;ng :Nằm ngay cửa ngỏ T&#226;y Nam S&#224;i G&#242;n  \r\n	Mở b&#225;n chỉ 5 nền Biệt Thự vườn trực thuộc Khu H&#224;nh Ch&#237;nh 250HA.  \r\n	View đối diện trực tiếp c&#244;ng vi&#234;n 4000m2. \r\n	Liền kề Showroom oto Trường Hải lớn nhất Miền Nam Việt nam, quy m&#244; 2ha.  \r\n	C&#225;ch Vincom plaza 500m, Honda cuối năm khai trương, hundai,…,  \r\n	L&#253; do n&#234;n Đầu Tư-Nghĩ Dưỡng tại BT Ph&#250; Ho&#224;ng Gia:  \r\n+ Cơ sở hạ tầng ho&#224;ng thiện 100%  \r\n+ D&#226;n cư hiện hữu  \r\n+ G&#237;a gốc từ chủ đầu tư  \r\n+ Thanh to&#225;n: ng&#226;n h&#224;ng BIDV hỗ trợ vay đến 70% trong v&#242;ng 20 năm  \r\n+ Ph&#225;p l&#253;: 100% đ&#227; c&#243; sổ hồng ri&#234;ng từng nền  \r\n+ Sinh lời ngay  \r\n \r\n- G&#237;a : 3 Tỷ/ Nền diện t&#237;ch từ 200-400m2 \r\n \r\nTh&#244;ng tin li&#234;n hệ 0903 861 494 (Ms Duy&#234;n)                  ', '10.76077,106.66167', 'http://www.muabannhadat.vn/uploads/images/007/584/511/L-PaG2rQMkmg8ttvEyUVpg_1.jpg', NULL, NULL, NULL, NULL, '2018-10-31 18:41:29', '2018-10-31 11:41:29'),
(58, 'chinh-chu-can-ban-nha-doan-van-bo-quan-4-dien-tich-7818562', 0, '1,8 Tỷ VNĐ ', '                   Phường 16 ,                    Quận 4 ', '                                      67 m² ', '                      Ch&#237;nh chủ cần b&#225;n nh&#224; Đo&#224;n Văn Bơ ,qu&#226;̣n 4. \r\n \r\n- Diện t&#237;ch: 6.2m (nở hậu 6.9m) x 10m. \r\n- Tổng diện t&#237;ch đất 67.5m2. \r\n- Tổng diện t&#237;ch sử dụng 83.5m2. Nh&#224; cấp 3 gồm 1 trệt, 1 lửng. \r\n- Vị tr&#237; thuận tiện đi Q1, Q5, Q7, Q8 chỉ mất 5ph&#250;t. \r\n- Sổ hồng ch&#237;nh chủ. Giấy tờ ph&#225;p l&#253; hợp lệ. \r\n \r\n- Sang t&#234;n mua b&#225;n nhanh gọn. \r\n- Bao c&#244;ng chứng.                  ', '10.75527,106.71287', 'http://www.muabannhadat.vn/uploads/images/007/818/562/r0Rwt2CSL0KwQ0S_-82wFw_1.jpg', NULL, NULL, NULL, NULL, '2018-10-31 18:42:01', '2018-10-31 11:42:01');

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
-- Cấu trúc bảng cho bảng `loaichothue`
--

CREATE TABLE `loaichothue` (
  `id` int(11) NOT NULL,
  `LoaiChoThue` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loaichothue`
--

INSERT INTO `loaichothue` (`id`, `LoaiChoThue`) VALUES
(1, 'Phòng trọ, nhà trọ'),
(2, 'Nhà cho thuê nguyên căn'),
(3, 'Cho thuê căn hộ'),
(4, 'Tìm bạn ở ghép'),
(5, 'Cho thuê mặt bằng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitin`
--

CREATE TABLE `loaitin` (
  `id` int(11) NOT NULL,
  `LoaiTin` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Gia` double NOT NULL,
  `ThongTin` varchar(2000) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitin`
--

INSERT INTO `loaitin` (`id`, `LoaiTin`, `Gia`, `ThongTin`) VALUES
(1, 'VIP 1', 50000, 'Là loại tin được đăng tiêu đề bằng chữ IN HOA MÀU ĐỎ, khung màu đỏ, nằm ở trên các tin vip 2'),
(2, 'VIP 2', 40000, 'Là loại tin đăng bằng chữ IN HOA MÀU CAM, khung màu cam, nằm bên dưới tin VIP 1 và ở trên các tin VIP 3'),
(3, 'VIP 3', 30000, 'Là loại tin đăng bằng chữ thường màu cam, khung màu cam và luôn nằm dưới tin Vip 2 nhưng luôn luôn hiển thị trên tin thường.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongthue`
--

CREATE TABLE `phongthue` (
  `id` int(11) NOT NULL,
  `TieuDe` varchar(1000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Phuong` int(11) NOT NULL,
  `DiaChi` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Map` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DienTich` int(11) NOT NULL,
  `Gia` double NOT NULL,
  `MoTa` varchar(2000) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `HinhAnh` varchar(500) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `LoaiTin` int(11) NOT NULL,
  `LoaiChoThue` int(11) NOT NULL,
  `NguoiDang` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TrangThai` int(11) NOT NULL,
  `TienCu` double NOT NULL,
  `TongTien` double NOT NULL,
  `NgayBatDau` datetime NOT NULL,
  `NgayKetThuc` datetime NOT NULL,
  `TenLienHe` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DiaChiLienLac` varchar(500) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `DienThoaiLienLac` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `LyDoXoa` varchar(500) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phongthue`
--

INSERT INTO `phongthue` (`id`, `TieuDe`, `Phuong`, `DiaChi`, `Map`, `DienTich`, `Gia`, `MoTa`, `HinhAnh`, `LoaiTin`, `LoaiChoThue`, `NguoiDang`, `created_at`, `updated_at`, `TrangThai`, `TienCu`, `TongTien`, `NgayBatDau`, `NgayKetThuc`, `TenLienHe`, `DiaChiLienLac`, `DienThoaiLienLac`, `Email`, `LyDoXoa`) VALUES
(1, 'Cho người nước ngoài thuê phòng đầy đủ trang bị và tiện ích, trung tâm quận 1', 11, '19 Nguyễn Thị Nghĩa', '10.77048963737413;106.69396025396736', 20, 5, 'Room for rent , full equipments and comforts . In the centre of distric 1 . Place is security and quiet , to much foreigner rent the room .\nThe area 18 , 25 m2 . Payment more electric fee only ( 3000 VNĐ/ Kw) . Wifi , water free . Add more two drinking water cans free . During of rental at least 3 months .', 'IMG_1_1.jpg;IMG_1_2.jpg;IMG_1_3.jpg;IMG_1_4.jpg;', 2, 3, 2, '2018-06-27 23:16:00', '2018-10-31 06:20:51', 1, 700000, 1100000, '2018-07-09 00:00:00', '2018-12-07 00:00:00', 'Minh', '163 Tô Hiến Thành,Phường 13, Quận 10, Hồ Chí Minh', '0569885811', 'darkkiller1406@yahoo.com', NULL),
(3, 'Cho thuê phòng trọ mới, giờ giấc tự do.134 Đinh Tiên Hoàng, Q.1. Liên hệ a.Tâm 0934898020', 1, '134 Đinh Tiên Hoàng', '10.791266;106.69679199999996', 18, 3, 'Nhà còn 10 phòng cho thuê.\r\n* Diện tích 18m2 - 24m2.\r\n* Giá: 3,2tr - 4,2tr/tháng.\r\n* Phòng có máy lạnh,máy nước nóng, ban công, cửa sổ, bếp, wifi, cáp.\r\n* Không chung chủ, giờ giấc tự do thoải mái.\r\n* Chổ đậu xe free và an toàn, lối đi riêng, chỗ phơi đồ.\r\n* Thuận tiện đi lại quận 1,2,3,4 Tân Bình,Gò Vấp,Bình Thạnh.\r\n* Thích hợp cho nhân viên văn phòng, dân trí thức, sinh viên it người ở.\r\n* Điện: 3,5 nghìn/kw.\r\n* Nước: 90 nghìn/người.', 'IMG_2_4.jpeg;IMG_2_3.jpeg;IMG_2_2.jpeg;IMG_2_1.jpeg;', 1, 1, 2, '2018-07-01 02:01:10', '2018-09-28 21:03:01', 1, 260000, 610000, '2018-07-13 00:00:00', '2018-12-23 00:00:00', 'A.Tâm', '134 Đinh Tiên Hoàng-Phường Đa Kao, Q.1', '0934898020', 'minh.1406@gmail.com', NULL),
(4, 'Căn hộ mini 30m2 full nội thất, Trần Hưng Đạo, Q.1', 12, '39 Nguyễn Cư Trinh', '10.7643701;106.69143059999999', 30, 7.5, NULL, 'IMG_4_2.jpg;IMG_4_1.jpg;', 3, 3, 2, '2018-07-12 02:20:47', '2018-09-27 05:47:24', 1, 160000, 370000, '2018-07-11 00:00:00', '2018-12-23 09:27:39', 'A Minh', NULL, '0902864256', NULL, NULL),
(5, 'Cho thuê phòng trọ mới, giờ giấc tự do.134 Đinh Tiên Hoàng, Q.1', 11, '134 Đinh Tiên Hoàng', '10.791266;106.69679199999996', 18, 3, NULL, NULL, 1, 1, 2, '2018-11-02 02:40:48', '2018-10-31 05:54:05', 3, 0, 100000, '2018-10-26 09:40:48', '2018-10-28 09:40:48', 'MInh', NULL, '0934898020', 'darkkiller1406@yahoo.com', 'test xóa');

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
  `Tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `Quyen`, `Ten`, `Tien`) VALUES
(1, 'admin', 'minh.1406.nt@gmail.com', '$2y$10$licDAaU1z3WI.akCBnytmeo59Uw4wj6puHqdW9UFM7tp5bAIPQzm6', 'PcUbJU57IzGo5McoNvHtMOOSQN9wqa85YdZOCJ8qMb06k4WdAWpi4yI5b8kv', '2018-05-21 09:03:26', '2018-10-29 05:07:23', 1, 'Admin', 0),
(2, 'congminh', 'darkkiller1406@yahoo.com', '$2y$10$IuHVECWVhbUpFbMGYMm/UOoLKEVWphneTMvmB6sDGhJj/Q41XIoPS', 'gkgXQJWwgqz28DsVITJKfUTkvhvgon1ZatFEw83lclcnNIv6cc80xToLJgc6', '2018-05-21 09:20:52', '2018-10-30 06:48:19', 2, 'Công Minh', 910000),
(3, 'congminh1406', 'darkkiller146@yahoo.com', '$2y$10$ZrI0KIkzKvn9acQNH8U7HOhGcsm6ICIfMBMPbHt3HkOILnsxDQ4Sq', NULL, '2018-07-16 09:46:44', '2018-07-16 09:46:44', 2, 'Minh Nguyễn', 100000);

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
-- Chỉ mục cho bảng `chucnang`
--
ALTER TABLE `chucnang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dat`
--
ALTER TABLE `dat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SoHuu` (`SoHuu`),
  ADD KEY `Quan` (`Phuong`);

--
-- Chỉ mục cho bảng `dat_web`
--
ALTER TABLE `dat_web`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link` (`link`);

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
-- Chỉ mục cho bảng `loaichothue`
--
ALTER TABLE `loaichothue`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phongthue`
--
ALTER TABLE `phongthue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LienHe` (`LoaiTin`),
  ADD KEY `Phuong` (`Phuong`),
  ADD KEY `NguoiDang` (`NguoiDang`),
  ADD KEY `LoaiTin` (`LoaiTin`),
  ADD KEY `LoaiChoThue` (`LoaiChoThue`);

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
-- AUTO_INCREMENT cho bảng `dat`
--
ALTER TABLE `dat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `dat_web`
--
ALTER TABLE `dat_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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
-- AUTO_INCREMENT cho bảng `loaichothue`
--
ALTER TABLE `loaichothue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `phongthue`
--
ALTER TABLE `phongthue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `dat_ibfk_4` FOREIGN KEY (`SoHuu`) REFERENCES `khachhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
-- Các ràng buộc cho bảng `phongthue`
--
ALTER TABLE `phongthue`
  ADD CONSTRAINT `phongthue_ibfk_2` FOREIGN KEY (`LoaiTin`) REFERENCES `loaitin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phongthue_ibfk_3` FOREIGN KEY (`Phuong`) REFERENCES `phuong` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phongthue_ibfk_4` FOREIGN KEY (`NguoiDang`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phongthue_ibfk_5` FOREIGN KEY (`LoaiChoThue`) REFERENCES `loaichothue` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

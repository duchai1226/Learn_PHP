-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 14, 2025 lúc 10:55 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_nha_hang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_hoa_don`
--

CREATE TABLE `chi_tiet_hoa_don` (
  `ma_hoa_don` int(11) NOT NULL,
  `ma_mon` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` double NOT NULL,
  `mon_thuc_don` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_hoa_don`
--

INSERT INTO `chi_tiet_hoa_don` (`ma_hoa_don`, `ma_mon`, `so_luong`, `don_gia`, `mon_thuc_don`) VALUES
(1, 1, 1, 25000, 1),
(1, 2, 2, 35000, 1),
(2, 9, 1, 0, 1),
(2, 13, 1, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma_hoa_don` int(11) NOT NULL,
  `ma_khach_hang` int(11) NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` double NOT NULL,
  `tien_dat_coc` double NOT NULL,
  `con_lai` double NOT NULL,
  `hinh_thuc_thanh_toan` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`ma_hoa_don`, `ma_khach_hang`, `ngay_dat`, `tong_tien`, `tien_dat_coc`, `con_lai`, `hinh_thuc_thanh_toan`, `ghi_chu`) VALUES
(1, 1, '2018-03-17', 200000, 50000, 150000, 'Tiền mặt', ''),
(2, 1, '2018-03-18', 450000, 50000, 400000, 'Chuyển khoản', ''),
(3, 1, '2018-03-07', 50000, 0, 0, 'Tiền mặt', ''),
(4, 2, '2018-03-05', 75000, 0, 0, 'Tiền mặt', ''),
(5, 2, '2018-03-01', 50000, 0, 0, 'Tiền mặt', ''),
(6, 2, '2018-02-14', 200000, 0, 0, 'Chuyển khoản', ''),
(7, 3, '2018-03-01', 75000, 0, 0, 'Tiền mặt', ''),
(8, 3, '2018-03-03', 50000, 0, 0, 'Tiền mặt', ''),
(9, 4, '2018-02-01', 150000, 0, 0, 'Tiền mặt', ''),
(10, 5, '2018-01-01', 30000, 0, 0, 'Tiền mặt', ''),
(11, 5, '2018-02-27', 50000, 0, 0, 'Tiền mặt', ''),
(12, 6, '2018-02-15', 75000, 0, 0, 'Tiền mặt', ''),
(13, 6, '2018-03-02', 25000, 0, 0, 'Tiền mặt', ''),
(14, 6, '2018-02-14', 25000, 0, 0, 'Tiền mặt', ''),
(15, 6, '2018-02-21', 75000, 0, 0, 'Tiền mặt', ''),
(16, 7, '2018-03-05', 50000, 0, 0, 'Tiền mặt', ''),
(17, 7, '2018-02-14', 50000, 0, 0, 'Tiền mặt', ''),
(18, 8, '2018-02-15', 75000, 0, 0, 'Tiền mặt', ''),
(19, 9, '2018-03-06', 100000, 0, 0, 'Tiền mặt', ''),
(20, 9, '2018-02-20', 50000, 0, 0, 'Tiền mặt', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_khach_hang` int(11) NOT NULL,
  `ten_khach_hang` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dia_chi` varchar(100) NOT NULL,
  `dien_thoai` varchar(20) NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `ghi_chu` varchar(200) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ma_khach_hang`, `ten_khach_hang`, `email`, `dia_chi`, `dien_thoai`, `hinh`, `ghi_chu`) VALUES
(1, 'Nguyễn Hải Yến', 'yennh@cntp.edu.vn', '140 Lê Trọng Tấn', '08123456', 'H1.jpg', ''),
(2, 'Trương Thị Khánh Uyên', 'uyenttk@gmail.com', '123 Lê Trọng Tấn', '090756489', 'H2.jpg', ''),
(3, 'Nguyễn Văn Hòa', 'hoanv@gmail.com', '123 Cầu Xéo', '08987654', 'H2.jpg', ''),
(4, 'Ngô Thị Nguyệt', 'nguyetnt@gmail.com', '458 Tân Kỳ Tân Quý', '08532148', 'H4.jpg', ''),
(5, 'Đình Duy Minh', 'minhdd@gmail.com', '698 Đỗ Thừa Luông', '01234578', 'H5.jpg', ''),
(6, 'Nguyễn Chính Tây', 'taync@gmail.com', '546 Dương Văn Dương', '12345678', 'H6.jpg', ''),
(7, 'Nguyễn Việt Thu', 'thunv@gmail.com', '457 Đỗ Thừa Luông', '090123456', 'H7.jpg', ''),
(8, 'Nguyễn Linh Giang', 'giangnl@gmail.com', '1254 Gò Dầu', '03568745', 'H8.jpg', ''),
(9, 'Trương Thị Thu Hiền', 'hienttt@gmail.com', '54 Lương Thế Vinh', '01234587', 'H9.jpg', ''),
(10, 'Trương Thị Thanh Xuân', 'xuanttx@gmail.com', '1 Trường Chinh', '01248973323', 'tianshu-liu-aqZ3UAjs_M4-unsplash.jpg', 'Penguins.jpg'),
(11, 'Trương Mạnh Hùng', 'hungtm@gmail.com', '123 Gò Dầu', '012489789', 'Penguins.jpg', 'la ba la la ba la la ba la'),
(13, 'Lưu Ngọc Bích', 'ngoclnb@gmail.com', '123 GÒ DẦU', '01234587', 'Tulips.jpg', 'sinh viên 06DHTH'),
(15, '123', 'yenh@cntp.edu.vn', '123', '1234567890', 'H3.jpg', ''),
(16, '123', 'yenh@cntp.edu.vn', '123', '1234625754', 'H9.jpg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_mon_an`
--

CREATE TABLE `loai_mon_an` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mo_ta` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinh` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_mon_an`
--

INSERT INTO `loai_mon_an` (`ma_loai`, `ten_loai`, `mo_ta`, `hinh`) VALUES
(1, 'Món canh', 'Có nước chan', 'Canh1.jpg'),
(2, 'Món cơm', 'Gạo tẻ', 'Com1.jpg'),
(3, 'Món mặn ', 'Món mặn', 'mon_man.jpg'),
(4, 'Ăn sáng', 'Ăn sáng', 'An_sang.jpg'),
(5, 'Món súp', 'Món súp', 'sup.jpg'),
(6, 'Món gỏi', 'Món gỏi', 'Goi.jpg'),
(7, 'Món Xào', 'Món Xào', 'MonXao.jpg'),
(8, 'Tráng miệng', 'Tráng miệng', 'TrangMieng.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon_an`
--

CREATE TABLE `mon_an` (
  `ma_mon` int(11) NOT NULL,
  `ma_loai` int(11) NOT NULL,
  `ten_mon` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung_tom_tat` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung_chi_tiet` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `don_gia` double NOT NULL,
  `don_gia_khuyen_mai` double NOT NULL,
  `khuyen_mai` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Nước ngọt, khăn lạnh',
  `hinh` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngay_cap_nhat` date NOT NULL,
  `dvt` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Đĩa',
  `trong_ngay` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mon_an`
--

INSERT INTO `mon_an` (`ma_mon`, `ma_loai`, `ten_mon`, `noi_dung_tom_tat`, `noi_dung_chi_tiet`, `don_gia`, `don_gia_khuyen_mai`, `khuyen_mai`, `hinh`, `ngay_cap_nhat`, `dvt`, `trong_ngay`) VALUES
(1, 2, 'Cơm Tấm', 'Cơm tấm từ lâu đã là một nét đặc trưng của ẩm thực', 'Cơm Tấm', 25000, 0, 'Nước ngọt, khăn lạnh', 'ComTam.jpg', '2018-03-17', 'Đĩa', 1),
(2, 2, 'Cơm Gà', 'Cơm gà là món ăn được chế biến và trình bày với hì..', 'Cơm Gà', 35000, 30000, 'Nước ngọt, khăn lạnh', 'ComGa.jpg', '2018-03-17', 'Đĩa', 1),
(3, 2, 'Cơm Sườn', 'Cơm tấm là món ăn đặc sản của miền Nam Việt Nam,', 'Cơm Sườn cọng/miếng', 20000, 0, 'Nước ngọt, khăn lạnh', 'ComSuon.jpg', '2018-03-18', 'Đĩa', 1),
(4, 2, 'Cơm Chay', 'Cơm tấm từ lâu đã là một nét đặc trưng của ẩm thực', 'Cơm chay', 10000, 0, 'Nước ngọt, khăn lạnh', 'ComChay.jpg', '2018-03-18', 'Đĩa', 1),
(5, 1, 'Canh rau ngót', 'Cơm tấm từ lâu đã là một nét đặc trưng của ẩm thực', 'Rau ngót thịt bằm', 15000, 0, 'Nước ngọt, khăn lạnh', 'RauNgot.jpg', '2018-03-18', 'Chén', 1),
(6, 1, 'Rau dền', 'Rau dền, thịt băm', 'Rau dền, thịt băm', 15000, 0, 'Nước ngọt, khăn lạnh', 'RauDen.jpg', '2018-03-18', 'Tô', 1),
(7, 1, 'Canh Khổ qua', 'Canh khổ qua nhồi thịt ', 'Canh Khổ qua nhồi thịt', 2000, 0, 'Nước ngọt, khăn lạnh', 'KhoQua.jpg', '2018-03-18', 'Tô', 1),
(8, 1, 'Canh chua cá lóc', 'Canh Chua cá lóc', 'Canh Chua cá lóc', 25000, 0, 'Nước ngọt, khăn lạnh', 'CanhChua.jpg', '2018-03-18', 'Tô', 1),
(9, 1, 'Canh Tần Ô', 'Canh Tần Ô thịt băm', 'Canh Tần Ô thịt băm', 15000, 0, 'Nước ngọt, khăn lạnh', 'CanhTO.jpg', '2018-03-18', 'Tô', 1),
(10, 3, 'Cá Lóc kho', 'Cá Lóc kho', 'Cá Lóc kho', 20000, 0, 'Nước ngọt, khăn lạnh', 'CaKho.jpg', '2018-03-18', 'Đĩa', 1),
(11, 3, 'Thịt Kho Tiêu', 'Thịt Kho Tiêu', 'Thịt Kho Tiêu', 15000, 0, 'Nước ngọt, khăn lạnh', 'ThitKhoTieu.jpg', '2018-03-18', 'Đĩa', 1),
(12, 3, 'Thịt rang tôm', 'Thịt rang tôm', 'Thịt rang rôm', 25000, 0, 'Nước ngọt, khăn lạnh', 'ThitTom.jpg', '2018-03-18', 'Đĩa', 1),
(13, 3, 'Gà Kho Gừng', 'Gà Kho Gừng', 'Gà Kho Gừng', 15000, 0, 'Nước ngọt, khăn lạnh', 'GaGung.jpg', '2018-03-18', 'Đĩa', 1),
(14, 3, 'Gà kho sả', 'Gà kho sả', 'Gà kho sả', 15000, 0, 'Nước ngọt, khăn lạnh', 'GaSa.jpg', '2018-03-18', 'Đĩa', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD PRIMARY KEY (`ma_hoa_don`,`ma_mon`,`mon_thuc_don`) USING BTREE,
  ADD KEY `ma_mon` (`ma_mon`),
  ADD KEY `ma_hoa_don` (`ma_hoa_don`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma_hoa_don`),
  ADD KEY `ma_khach_hang` (`ma_khach_hang`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_khach_hang`);

--
-- Chỉ mục cho bảng `loai_mon_an`
--
ALTER TABLE `loai_mon_an`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Chỉ mục cho bảng `mon_an`
--
ALTER TABLE `mon_an`
  ADD PRIMARY KEY (`ma_mon`),
  ADD KEY `ma_loai` (`ma_loai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma_hoa_don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_khach_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `loai_mon_an`
--
ALTER TABLE `loai_mon_an`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `mon_an`
--
ALTER TABLE `mon_an`
  MODIFY `ma_mon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD CONSTRAINT `chi_tiet_hoa_don_ibfk_1` FOREIGN KEY (`ma_mon`) REFERENCES `mon_an` (`ma_mon`),
  ADD CONSTRAINT `chi_tiet_hoa_don_ibfk_2` FOREIGN KEY (`ma_hoa_don`) REFERENCES `hoa_don` (`ma_hoa_don`);

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`ma_khach_hang`) REFERENCES `khach_hang` (`ma_khach_hang`);

--
-- Các ràng buộc cho bảng `mon_an`
--
ALTER TABLE `mon_an`
  ADD CONSTRAINT `mon_an_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai_mon_an` (`ma_loai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

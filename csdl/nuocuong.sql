-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th3 01, 2023 lúc 08:10 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nuocuong`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `isSell` int(1) NOT NULL DEFAULT 0,
  `isAdmin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `email`, `matkhau`, `isSell`, `isAdmin`) VALUES
(29, 'son@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `iddonhang` int(11) NOT NULL,
  `idthucuong` int(10) UNSIGNED NOT NULL,
  `soluong` int(9) NOT NULL DEFAULT 0,
  `dongia` float NOT NULL,
  `tensp` varchar(50) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `madonhang` varchar(100) NOT NULL,
  `tongdonhang` float NOT NULL,
  `phuongthucthanhtoan` varchar(100) NOT NULL,
  `iduser` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `sodienthoai` varchar(100) NOT NULL,
  `ngaydat` date NOT NULL,
  `xacnhan` int(2) NOT NULL,
  `thanhtoan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `hoten`, `email`, `matkhau`) VALUES
(10, 'Son ne', 'nguyen@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanhoi`
--

CREATE TABLE `phanhoi` (
  `id` int(11) UNSIGNED NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `noidung` varchar(200) NOT NULL,
  `hinhthuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thucuong`
--

CREATE TABLE `thucuong` (
  `id` int(10) UNSIGNED NOT NULL,
  `tieude` varchar(100) NOT NULL,
  `mota` varchar(100) NOT NULL,
  `gia` float NOT NULL,
  `hinhanh` varchar(100) DEFAULT NULL,
  `noibat` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thucuong`
--

INSERT INTO `thucuong` (`id`, `tieude`, `mota`, `gia`, `hinhanh`, `noibat`, `active`) VALUES
(12, 'Trà Chanh', 'Chanh có nhiều dưỡng chất tốt cho mắt', 46000, 'Drink955.jpg', 'Có', 'Còn hàng'),
(13, 'Trà Phúc Bồn Tử', 'Phúc bồn tử là loại quả hiếm rất là ngon', 57000, 'Drink813.jpg', 'Có', 'Còn hàng'),
(14, 'Trà Táo', 'Táo rất ngon và mát', 17000, 'Drink653.jpg', 'Không', 'Còn hàng'),
(15, 'Trà Vải', 'Vải rất mát khi uống lạnh', 32000, 'Drink619.jpg', 'Không', 'Còn hàng'),
(16, 'Trà Việt Quất', 'Việt quất là loại trái cây thiên nhiên rất tốt cho não bộ', 80000, 'Drink87.jpg', 'Không', 'Còn hàng'),
(17, 'Trà Xoài', 'Xoài có nhiều dưỡng chất tốt chống oxi hóa', 15000, 'Drink354.jpg', 'Không', 'Còn hàng'),
(18, 'Trà Sữa Trân Châu', 'Rất là béo thơm ngon', 34000, 'Drink170.png', 'Không', 'Còn hàng'),
(19, 'Trà Sữa Dâu', 'Ngon xoắn lưỡi', 25000, 'Drink997.png', 'Có', 'Còn hàng'),
(20, 'Trà Sữa Khoai Môn', 'Khoai môn cực kì ngon', 37000, 'Drink729.png', 'Có', 'Còn hàng'),
(21, 'Bạc Xĩu', 'Vị gần giống cà phê sữa nhưng thơm béo hơn', 27000, 'Drink249.jpg', 'Không', 'Còn hàng'),
(22, 'Cà Phê Đen', 'Uống vào là tỉnh', 11000, 'Drink466.jpg', 'Không', 'Còn hàng'),
(23, 'Cà phê Latte Đá', 'Latte đá rất thơm mát vào ngày hè', 36000, 'Drink684.png', 'Không', 'Còn hàng'),
(24, 'Nước Ép Cam', 'Cam có vitamin C rất tốt cho não bộ', 245000, 'Drink682.png', 'Không', 'Còn hàng'),
(25, 'Nước Ép Dâu', 'Dâu cực kì ngon', 19000, 'Drink108.jpg', 'Có', 'Còn hàng'),
(26, 'Nước Ép Cà Rốt', 'Cà rốt có caroten tốt cho sức khỏe', 254000, 'Drink116.png', 'Không', 'Hết hàng'),
(27, 'Nước Ép Kiwi', 'Ngon xoắn lưỡi cùng Kiwi', 15000, 'Drink437.jpg', 'Có', 'Hết hàng'),
(28, 'Nước Ép Ổi', 'Ổi tốt cho sức khỏe lắm đó nha', 39000, 'Drink602.jpg', 'Không', 'Hết hàng'),
(29, 'Nước Ép Thơm', 'Thơm ngọt ngon béo giòn tan', 15000, 'Drink777.png', 'Không', 'Hết hàng'),
(30, 'Trà Sữa Ô Lông', 'Kết hợp giữa sữa và Ô Lông cực kì thơm ngon', 25000, 'Drink484.png', 'Có', 'Hết hàng'),
(31, 'Trà Sữa Socola', 'Socola béo ngậy thơm ngon', 25000, 'Drink147.png', 'Không', 'Hết hàng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddonhang` (`iddonhang`),
  ADD KEY `idthucuong` (`idthucuong`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thucuong`
--
ALTER TABLE `thucuong`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `thucuong`
--
ALTER TABLE `thucuong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`iddonhang`) REFERENCES `donhang` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`idthucuong`) REFERENCES `thucuong` (`id`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `khachhang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

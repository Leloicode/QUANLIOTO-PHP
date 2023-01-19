-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 19, 2023 lúc 06:18 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlioto`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_car`
--

CREATE TABLE `book_car` (
  `id` int(30) NOT NULL,
  `car_id` int(30) NOT NULL,
  `creat_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pickup_datetime` date NOT NULL,
  `dropoff_datetime` date NOT NULL,
  `khachhang_id` int(10) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `status` int(2) NOT NULL,
  `price_deposit` int(50) NOT NULL,
  `price_incurred` int(50) NOT NULL,
  `total_price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `car`
--

CREATE TABLE `car` (
  `id` int(10) NOT NULL,
  `plate_car` varchar(10) CHARACTER SET utf32 COLLATE utf32_vietnamese_ci NOT NULL,
  `loaixe_id` int(10) NOT NULL,
  `price` int(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name-category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name-category`) VALUES
(21, 'Xe thể thao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `citizen_identification1` varchar(100) NOT NULL,
  `citizen_identification2` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `name`, `citizen_identification1`, `citizen_identification2`, `phone`) VALUES
(1, 'Thanh Nhật', '1.jpg', '4.jpg', '0357805837'),
(4, 'Lê Lợi', 'lam-chung-minh-nhan-dan.jpg', 'lam-chung-minh-nhan-dan.jpg', '0357805837');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_car`
--

CREATE TABLE `loai_car` (
  `id` int(10) NOT NULL,
  `id_category` int(20) NOT NULL,
  `loai_xe` varchar(100) NOT NULL,
  `doi_xe` int(10) NOT NULL,
  `thietbi` varchar(30) NOT NULL,
  `description_thietbi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_car`
--

INSERT INTO `loai_car` (`id`, `id_category`, `loai_xe`, `doi_xe`, `thietbi`, `description_thietbi`) VALUES
(83, 21, 'Mecxedec', 2022, '7 thì', '123123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `ID` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `citizen_identification1` varchar(100) NOT NULL,
  `citizen_identification2` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `Role_id` int(2) NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`ID`, `name`, `username`, `password`, `citizen_identification1`, `citizen_identification2`, `phone`, `Role_id`, `trangthai`) VALUES
(3, 'Lê Lợi', 'admin', '123', '', '', '0357805837', 1, 0),
(18, 'Mai Văn Cảnh', 'maivancanh', '123', '4.jpg', '', '0123456874', 2, 0),
(19, 'Nguyễn Ngọc Bảo', 'nguyenngocbao', '123', 'lam-chung-minh-nhan-dan.jpg', '', '0123456874', 2, 0),
(20, 'Ngô Duy Hưng', 'duyhung', '123', '1.jpg', '', '0123456789', 2, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `book_car`
--
ALTER TABLE `book_car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `khachhang_id` (`khachhang_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Chỉ mục cho bảng `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaixe_id` (`loaixe_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_car`
--
ALTER TABLE `loai_car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `book_car`
--
ALTER TABLE `book_car`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `car`
--
ALTER TABLE `car`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `loai_car`
--
ALTER TABLE `loai_car`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `book_car`
--
ALTER TABLE `book_car`
  ADD CONSTRAINT `book_car_ibfk_4` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_car_ibfk_5` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_car_ibfk_6` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_7` FOREIGN KEY (`loaixe_id`) REFERENCES `loai_car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `loai_car`
--
ALTER TABLE `loai_car`
  ADD CONSTRAINT `loai_car_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

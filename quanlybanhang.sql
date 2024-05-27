-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2024 at 09:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlybanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`) VALUES
(6, 'admin', 'admin', 'Admin Name');

-- --------------------------------------------------------

--
-- Table structure for table `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `maSanPham` varchar(30) NOT NULL,
  `trongLuong` varchar(100) NOT NULL,
  `thuongHieu` varchar(100) NOT NULL,
  `thanhPhan` varchar(100) NOT NULL DEFAULT '0.0',
  `trangThai` varchar(100) NOT NULL DEFAULT '0.0',
  `mauSac` varchar(100) NOT NULL,
  `xuatXu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `chitietsanpham`
--

INSERT INTO `chitietsanpham` (`maSanPham`, `trongLuong`, `thuongHieu`, `thanhPhan`, `trangThai`, `mauSac`, `xuatXu`) VALUES
('MH1', '5g', 'Son Kem', 'Son Kem Lì, Mịn Mượt Nhẹ Môi 3CE Blur Water Tint 4.6g', 'Còn hàng', '24 màu (xanh, đỏ, tím, vàng, nâu,da cam...)', 'Hàn Quốc');

-- --------------------------------------------------------

--
-- Table structure for table `dongsanpham`
--

CREATE TABLE `dongsanpham` (
  `maHang` varchar(30) NOT NULL,
  `tenHang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `dongsanpham`
--

INSERT INTO `dongsanpham` (`maHang`, `tenHang`) VALUES
('MH1', 'Sản phẩm cho da mặt'),
('MH2', 'Sản phẩm cho Body'),
('MH3', 'Son'),
('MH4', 'Trang điểm'),
('MH5', 'Thực phẩm chức năng');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `maSanPham` varchar(30) NOT NULL,
  `maHang` varchar(30) NOT NULL,
  `tenSanPham` varchar(200) NOT NULL,
  `moTa` varchar(100) NOT NULL,
  `gia` int(11) NOT NULL DEFAULT 0,
  `hinhAnh` varchar(200) DEFAULT NULL,
  `ngayTao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`maSanPham`, `maHang`, `tenSanPham`, `moTa`, `gia`, `hinhAnh`, `ngayTao`) VALUES
('MH1', 'MH3', 'Son Kem Lỳ 3CE siêu chất', 'のの所に進んましない。できるだけ十一月に授業方はぼうっとわが抑圧なく', 500000, 'media/img/sanpham/1716793552-d9ed9cebd3fb3789a4eec036c84702e3.jpeg', '2024-05-27'),
('SP1', 'MH3', 'Son Kem Lỳ 3CE siêu chất', 'のの所に進んましない。できるだけ十一月に授業方はぼうっとわが抑圧なく', 500000, 'media/img/sanpham/1716793329-d9ed9cebd3fb3789a4eec036c84702e3.jpeg', '2024-05-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`maSanPham`) USING BTREE;

--
-- Indexes for table `dongsanpham`
--
ALTER TABLE `dongsanpham`
  ADD PRIMARY KEY (`maHang`) USING BTREE;

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSanPham`) USING BTREE,
  ADD KEY `LK2` (`maHang`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD CONSTRAINT `fk` FOREIGN KEY (`maSanPham`) REFERENCES `sanpham` (`maSanPham`),
  ADD CONSTRAINT `lk` FOREIGN KEY (`maSanPham`) REFERENCES `sanpham` (`maSanPham`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `LK2` FOREIGN KEY (`maHang`) REFERENCES `dongsanpham` (`maHang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

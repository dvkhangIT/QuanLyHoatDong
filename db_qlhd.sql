-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 08:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_qlhd`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoatdong`
--

CREATE TABLE `hoatdong` (
  `hoatDongID` int(11) NOT NULL,
  `tenHoatDong` varchar(100) NOT NULL,
  `thoiGian` date NOT NULL DEFAULT current_timestamp(),
  `moTa` text NOT NULL,
  `soLuong` int(11) NOT NULL,
  `diaDiem` varchar(100) NOT NULL,
  `trangThai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoatdong`
--

INSERT INTO `hoatdong` (`hoatDongID`, `tenHoatDong`, `thoiGian`, `moTa`, `soLuong`, `diaDiem`, `trangThai`) VALUES
(1, 'Hội thảo sinh viên', '2024-01-02', 'Cộng 2 điểm', 19, 'Trường Đại học Kỹ thuật - Công nghệ Cần Thơ', 0),
(2, 'Hỗ trợ tình nguyện hồ sơ nhập học sinh viên', '2024-01-03', 'Cộng 2 điểm rèn luyện', 99, 'Trường Đại học Kỹ thuật - Công nghệ Cần Thơ', 1),
(3, 'Hội thao sinh viên cấp khoa ', '2024-01-03', 'Cộng 3 điểm', 12, 'Trường Đại học Kỹ thuật - Công nghệ Cần Thơ', 1),
(4, 'Sinh viên tình nguyện ', '2024-01-03', 'Cộng 1 điểm', 10, 'Trường Đại học Kỹ thuật - Công nghệ Cần Thơ', 1),
(5, 'Hội thảo khởi nghiệp', '2024-01-03', 'Cộng 5 điểm', 90, 'Khách sạn Mường Thanh', 1),
(6, 'Vòng chung kết khởi nghiệp 2023', '2024-01-05', 'Cộng 0 điểm', 20, 'Khách sạn TTC hotel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `khoaID` int(11) NOT NULL,
  `tenKhoa` varchar(50) NOT NULL,
  `khoaHocID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`khoaID`, `tenKhoa`, `khoaHocID`) VALUES
(1, 'Công Nghệ Thông Tin', 1),
(2, 'Công Nghệ Thông Tin', 2),
(3, 'Công Nghệ Thông Tin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `khoahoc`
--

CREATE TABLE `khoahoc` (
  `khoaHocID` int(11) NOT NULL,
  `khoaHoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoahoc`
--

INSERT INTO `khoahoc` (`khoaHocID`, `khoaHoc`) VALUES
(1, 2020),
(2, 2021),
(3, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `lopID` int(11) NOT NULL,
  `tenLop` varchar(100) NOT NULL,
  `khoaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`lopID`, `tenLop`, `khoaID`) VALUES
(1, 'Công Nghệ Thông Tin 0120', 1),
(2, 'Kỹ Thuật Phầm Mềm 0120\r\n', 1),
(3, 'Công Nghệ Thông Tin 0121', 2),
(4, 'Kỹ Thuật Phần Mềm 0121', 2),
(5, 'Công Nghệ Thông Tin 0122', 3),
(6, 'Kỹ Thuật Phần Mềm 0122', 3);

-- --------------------------------------------------------

--
-- Table structure for table `minhchung`
--

CREATE TABLE `minhchung` (
  `minhChungID` int(11) NOT NULL,
  `hinhAnh` varchar(200) NOT NULL,
  `thoiGian` date DEFAULT current_timestamp(),
  `thamGiaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `minhchung`
--

INSERT INTO `minhchung` (`minhChungID`, `hinhAnh`, `thoiGian`, `thamGiaID`) VALUES
(1, '1704875528_2183784.jpg', '2024-01-05', 2),
(2, '1704961177_computer.png', '2024-01-14', 1),
(3, '1704961629_neon-art-rainbow-5120x2880-12378.jpg', '2024-01-09', 4),
(5, '1705557306_IMG20230805142641.jpg', '2024-01-18', 5),
(6, '1705557362_IMG20230805170129.jpg', '2024-01-18', 6),
(7, '1705576687_IMG20230805170129.jpg', '2024-01-18', 8),
(8, '1705578353_IMG20230805142641.jpg', '2024-01-18', 9),
(9, '1712821033_z3388976955999_49020b0211db26e4a114f97c8166d0ad.jpg', '2024-04-11', 7),
(10, '1713882192_Acer_Wallpaper_01_5000x2814.jpg', '2024-04-23', 10),
(11, '1713884353_Planet9_Wallpaper_5000x2813.jpg', '2024-04-23', 11),
(12, '1713884154_Acer_Wallpaper_03_5000x2814.jpg', '2024-04-23', 12),
(13, '1713884160_z3388976914063_bb0c77fa653a0b3ac2f7bd862f73a91a.jpg', '2024-04-23', 13),
(14, '1713884213_Acer_Wallpaper_01_5000x2814.jpg', '2024-04-23', 14),
(15, '1713884218_z3388976970210_80e7cf152c01cbed38bca4825a9a7565.jpg', '2024-04-23', 15),
(16, '1713884246_Acer_Wallpaper_03_5000x2814.jpg', '2024-04-23', 16),
(17, '1713884251_z3388976914063_bb0c77fa653a0b3ac2f7bd862f73a91a.jpg', '2024-04-23', 17),
(18, '1713884347_Planet9_Wallpaper_5000x2813.jpg', '2024-04-23', 18),
(19, '1713884353_Planet9_Wallpaper_5000x2813.jpg', '2024-04-23', 19);

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MSSV` varchar(20) NOT NULL,
  `hoTen` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `soDienThoai` varchar(10) NOT NULL,
  `lopID` int(11) NOT NULL,
  `trangThai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`MSSV`, `hoTen`, `email`, `soDienThoai`, `lopID`, `trangThai`) VALUES
('2100111', 'Nguyễn Văn An', 'nvan2100111@student.ctuet.edu.vn', '0368392055', 1, 1),
('2100112', 'Lê Thị Anh', 'ltanh2100112@gmail.com', '0368387367', 1, 1),
('2100113', 'Trần Anh Tuấn', 'tatuan@gmail.com', '0367842312', 1, 1),
('2100114', 'Trần Minh Anh', 'tmanh@gmail.com', '0367842457', 2, 1),
('2100115', 'Lê Thị Diễm', 'ltdiem@gmail.com', '0368892457', 2, 1),
('2100116', 'Nguyễn Lê Hải Âu', 'nlhau2100116@student.ctuet.edu.vn', '0123456789', 1, 1),
('2100117', 'Đỗ Hoàng An', 'dhan2100117@gmail.com', '0357123984', 6, 1),
('2100118', 'Nguyễn Hoàng Qui', 'ngqui2100118@gmail.com', '0358164975', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `taiKhoanID` int(11) NOT NULL,
  `tenDangNhap` varchar(50) NOT NULL,
  `matKhau` varchar(50) NOT NULL,
  `vaiTro` varchar(20) NOT NULL,
  `MSSV` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`taiKhoanID`, `tenDangNhap`, `matKhau`, `vaiTro`, `MSSV`) VALUES
(1, '2100111', '7a1656221a2bc067dc1604c69b43d70d', 'sinhvien', '2100111'),
(2, 'admin', '523af537946b79c4f8369ed39ba78605', 'admin', NULL),
(3, '2100112', 'fe0b1f43941ba17065eb0ae7bd564c96', 'sinhvien', '2100112'),
(4, '2100113', '93815d8b217b51471b8aa34345135e46', 'sinhvien', '2100113'),
(5, '2100114', '83d13d89beed9af02d744e8819d941e1', 'sinhvien', '2100114'),
(6, '2100115', '8cf5df5d2086660f5e4a68b04829a489', 'sinhvien', '2100115'),
(7, '2100116', '20082fdf0650af70316dd921070362a2', 'sinhvien', '2100116');

-- --------------------------------------------------------

--
-- Table structure for table `thamgia`
--

CREATE TABLE `thamgia` (
  `thamGiaID` int(11) NOT NULL,
  `MSSV` varchar(20) NOT NULL,
  `hoatDongID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thamgia`
--

INSERT INTO `thamgia` (`thamGiaID`, `MSSV`, `hoatDongID`) VALUES
(1, '2100111', 1),
(2, '2100111', 2),
(4, '2100111', 3),
(5, '2100112', 3),
(6, '2100112', 1),
(7, '2100112', 6),
(8, '2100111', 6),
(9, '2100111', 4),
(10, '2100113', 3),
(11, '2100113', 1),
(12, '2100113', 5),
(13, '2100113', 6),
(14, '2100114', 1),
(15, '2100114', 6),
(16, '2100115', 1),
(17, '2100115', 6),
(18, '2100116', 1),
(19, '2100116', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoatdong`
--
ALTER TABLE `hoatdong`
  ADD PRIMARY KEY (`hoatDongID`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`khoaID`),
  ADD KEY `khoaHocID` (`khoaHocID`);

--
-- Indexes for table `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`khoaHocID`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`lopID`),
  ADD KEY `khoaID` (`khoaID`);

--
-- Indexes for table `minhchung`
--
ALTER TABLE `minhchung`
  ADD PRIMARY KEY (`minhChungID`),
  ADD KEY `thamGiaID` (`thamGiaID`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MSSV`),
  ADD KEY `lopID` (`lopID`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`taiKhoanID`),
  ADD KEY `MSSV` (`MSSV`);

--
-- Indexes for table `thamgia`
--
ALTER TABLE `thamgia`
  ADD PRIMARY KEY (`thamGiaID`),
  ADD KEY `MSSV` (`MSSV`),
  ADD KEY `hoatDongID` (`hoatDongID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hoatdong`
--
ALTER TABLE `hoatdong`
  MODIFY `hoatDongID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `khoaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `khoaHocID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `lopID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `minhchung`
--
ALTER TABLE `minhchung`
  MODIFY `minhChungID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `taiKhoanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `thamgia`
--
ALTER TABLE `thamgia`
  MODIFY `thamGiaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `khoa`
--
ALTER TABLE `khoa`
  ADD CONSTRAINT `khoa_ibfk_1` FOREIGN KEY (`khoaHocID`) REFERENCES `khoahoc` (`khoaHocID`);

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`khoaID`) REFERENCES `khoa` (`khoaID`);

--
-- Constraints for table `minhchung`
--
ALTER TABLE `minhchung`
  ADD CONSTRAINT `minhchung_ibfk_1` FOREIGN KEY (`thamGiaID`) REFERENCES `thamgia` (`thamGiaID`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`lopID`) REFERENCES `lop` (`lopID`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`);

--
-- Constraints for table `thamgia`
--
ALTER TABLE `thamgia`
  ADD CONSTRAINT `thamgia_ibfk_1` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`),
  ADD CONSTRAINT `thamgia_ibfk_2` FOREIGN KEY (`hoatDongID`) REFERENCES `hoatdong` (`hoatDongID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

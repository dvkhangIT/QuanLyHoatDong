-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 12:30 PM
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
  `diaDiem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `khoaID` int(11) NOT NULL,
  `tenKhoa` varchar(50) NOT NULL,
  `khoaHocID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khoahoc`
--

CREATE TABLE `khoahoc` (
  `khoaHocID` int(11) NOT NULL,
  `khoaHoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `lopID` int(11) NOT NULL,
  `tenLop` varchar(100) NOT NULL,
  `khoaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `minhchung`
--

CREATE TABLE `minhchung` (
  `minhChungID` int(11) NOT NULL,
  `hinhAnh` varchar(200) NOT NULL,
  `thoiGian` date DEFAULT NULL,
  `thamGiaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MSSV` varchar(20) NOT NULL,
  `hoTen` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `soDienThoai` varchar(10) NOT NULL,
  `lopID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `taiKhoanID` int(11) NOT NULL,
  `tenDangNhap` varchar(50) NOT NULL,
  `matKhau` varchar(50) NOT NULL,
  `vaiTro` varchar(20) NOT NULL,
  `MSSV` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  MODIFY `hoatDongID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `khoaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `khoaHocID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `lopID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `minhchung`
--
ALTER TABLE `minhchung`
  MODIFY `minhChungID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `taiKhoanID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thamgia`
--
ALTER TABLE `thamgia`
  MODIFY `thamGiaID` int(11) NOT NULL AUTO_INCREMENT;

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

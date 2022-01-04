-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 10:43 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mctarchive`
--

-- --------------------------------------------------------

--
-- Table structure for table `mctarchive`
--

CREATE TABLE `mctarchive` (
  `id` int(4) NOT NULL,
  `std1` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `std2` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `std3` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `std4` varchar(100) NOT NULL,
  `std5` varchar(100) NOT NULL,
  `std6` varchar(100) NOT NULL,
  `thainame` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `engname` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `teacher` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `sec` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `branch` varchar(100) NOT NULL,
  `type_doc` varchar(100) NOT NULL,
  `website` int(1) DEFAULT NULL,
  `video` varchar(200) DEFAULT NULL,
  `pdf` varchar(200) DEFAULT NULL,
  `audio` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mctarchive`
--

INSERT INTO `mctarchive` (`id`, `std1`, `std2`, `std3`, `std4`, `std5`, `std6`, `thainame`, `engname`, `teacher`, `sec`, `branch`, `type_doc`, `website`, `video`, `pdf`, `audio`) VALUES
(1, 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'น้ำ 5 บาท', 'Name 5 Bath', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2560', 'วิชาเทคโนโลยีสื่อดิจิทัล', '1', 1, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(2, 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'น้ำ 5 บาท', 'Name 5 Bath', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2560', 'วิชาเทคโนโลยีสื่อดิจิทัล', '1', 1, '00002021-05-08 21-24-41.mp4', 'EnquireStudentScore_2561_M6_00609284.pdf', 'Operation Pyrite - Jason Walsh ft. Alan Day.mp3'),
(3, 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'น้ำ 5 บาท', 'Name 5 Bath', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2560', 'วิชาเทคโนโลยีสื่อดิจิทัล', '1', 1, '2021-06-12_17-46-35.mp4', 'lel.pdf', ''),
(4, 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'น้ำ 5 บาท', 'Name 5 Bath', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2560', 'วิชาเทคโนโลยีสื่อดิจิทัล', '1', 1, '', 'lel.pdf', 'Mixdown(2).mp3'),
(5, 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'น้ำ 5 บาท', 'Name 5 Bath', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2560', 'วิชาเทคโนโลยีสื่อดิจิทัล', '1', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(6, 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'น้ำ 5 บาท', 'Name 5 Bath', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2560', 'วิชาเทคโนโลยีสื่อดิจิทัล', '1', 1, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(7, 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'น้ำ 5 บาท', 'Name 5 Bath', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2560', 'วิชาเทคโนโลยีสื่อดิจิทัล', '1', 1, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(8, 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'น้ำ 5 บาท', 'Name 5 Bath', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2560', 'วิชาเทคโนโลยีสื่อดิจิทัล', '1', 1, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(9, 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'น้ำ 5 บาท', 'Name 5 Bath', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2560', 'วิชาเทคโนโลยีสื่อดิจิทัล', '1', 1, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(10, 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'น้ำ 5 บาท', 'Name 5 Bath', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2560', 'วิชาเทคโนโลยีสื่อดิจิทัล', '2', 1, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(11, 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'น้ำ 5 บาท', 'Name 5 Bath', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2560', 'วิชาเทคโนโลยีสื่อดิจิทัล', '2', 1, '2021-06-12_17-46-35.mp4', 'lel.pdf', ''),
(12, 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'น้ำ 5 บาท', 'Name 5 Bath', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2560', 'วิชาเทคโนโลยีสื่อดิจิทัล', '2', 1, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(13, 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'น้ำ 5 บาท', 'Name 5 Bath', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2560', 'วิชาเทคโนโลยีสื่อดิจิทัล', '2', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(14, 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'น้ำ 5 บาท', 'Name 5 Bath', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2560', 'วิชาเทคโนโลยีสื่อดิจิทัล', '2', 1, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(15, 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'น้ำ 5 บาท', 'Name 5 Bath', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2560', 'วิชาเทคโนโลยีสื่อดิจิทัล', '2', 1, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(16, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(17, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(18, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(19, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(20, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(21, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(22, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(23, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(24, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(25, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(26, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(27, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(28, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(29, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(30, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(31, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(32, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(33, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(34, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'คิดชื่อไม่ออก', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2563', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(35, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 1', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2563', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', ''),
(36, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 2', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2563', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', ''),
(37, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 3', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2563', 'วิชาเทคโนโลยีการถ่ายภาพและภาพยนตร์', '2', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', ''),
(38, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 4', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2563', 'วิชาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง', '2', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', ''),
(39, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 5', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2563', 'วิชาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง', '2', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', ''),
(40, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 6', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2563', 'วิชาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง', '2', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', ''),
(41, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 7', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2563', 'วิชาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง', '2', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', ''),
(42, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 8', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2563', 'วิชาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง', '2', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', ''),
(43, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 9', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2563', 'วิชาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง', '2', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', ''),
(44, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 10', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2563', 'วิชาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง', '2', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(45, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 11', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2563', 'วิชาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง', '2', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(46, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 12', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2563', 'วิชาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง', '2', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(47, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 13', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2559', 'วิชาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง', '1', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(48, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 14', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2559', 'วิชาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง', '1', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(49, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 15', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2559', 'วิชาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง', '1', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(50, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 16', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2559', 'วิชาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง', '1', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(51, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 17', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2559', 'วิชาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง', '1', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(52, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 18', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2559', 'วิชาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง', '1', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(53, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 19', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2559', 'วิชาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง', '1', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(54, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 20', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2559', 'วิชาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง', '1', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(55, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 21', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2559', 'วิชาเทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง', '1', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(56, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 22', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2559', 'วิชาเทคโนโลยีมัลติมีเดีย', '1', 0, '2021-06-12_17-46-35.mp4', 'lel.pdf', 'Mixdown(2).mp3'),
(57, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 23', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2559', 'วิชาเทคโนโลยีมัลติมีเดีย', '1', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(58, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 24', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2559', 'วิชาเทคโนโลยีมัลติมีเดีย', '1', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(59, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', '', '', '', '', 'โครงการอะไรซักอย่าง 25', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2564', 'วิชาเทคโนโลยีมัลติมีเดีย', '1', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(60, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 26', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2564', 'วิชาเทคโนโลยีมัลติมีเดีย', '1', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(61, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 27', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2564', 'วิชาเทคโนโลยีมัลติมีเดีย', '1', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(62, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 28', '', 'ดร.จิรัฐ มัธยมนันทน์', '2564', 'วิชาเทคโนโลยีมัลติมีเดีย', '1', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(63, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 29', '', 'ดร.จิรัฐ มัธยมนันทน์', '2564', 'วิชาเทคโนโลยีมัลติมีเดีย', '1', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(64, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 30', '', 'ดร.จิรัฐ มัธยมนันทน์', '2564', 'วิชาเทคโนโลยีมัลติมีเดีย', '1', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(65, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 31', '', 'ดร.จิรัฐ มัธยมนันทน์', '2564', 'วิชาเทคโนโลยีมัลติมีเดีย', '1', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(66, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 32', '', 'ดร.จิรัฐ มัธยมนันทน์', '2564', 'วิชาเทคโนโลยีมัลติมีเดีย', '1', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(67, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 33', '', 'ดร.จิรัฐ มัธยมนันทน์', '2564', 'วิชาเทคโนโลยีมัลติมีเดีย', '2', 0, '', 'lel.pdf', 'Mixdown(2).mp3'),
(68, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 34', '', 'ดร.จิรัฐ มัธยมนันทน์', '2564', 'วิชาเทคโนโลยีมัลติมีเดีย', '2', 0, '', 'lel.pdf', ''),
(69, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 35', '', 'ดร.จิรัฐ มัธยมนันทน์', '2564', 'วิชาเทคโนโลยีมัลติมีเดีย', '2', 0, '', 'lel.pdf', ''),
(70, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 36', '', 'ดร.จิรัฐ มัธยมนันทน์', '2564', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(71, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 37', '', 'ดร.จิรัฐ มัธยมนันทน์', '2564', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(72, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 38', '', 'ดร.จิรัฐ มัธยมนันทน์', '2564', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(73, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 39', '', 'ดร.จิรัฐ มัธยมนันทน์', '2564', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(74, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 40', '', 'ดร.จิรัฐ มัธยมนันทน์', '2564', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(75, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 41', '', 'ดร.จิรัฐ มัธยมนันทน์', '2563', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(76, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 42', '', 'ดร.จิรัฐ มัธยมนันทน์', '2563', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(77, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 43', '', 'ดร.จิรัฐ มัธยมนันทน์', '2563', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(78, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 44', '', 'ดร.จิรัฐ มัธยมนันทน์', '2563', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(79, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 45', '', 'ดร.จิรัฐ มัธยมนันทน์', '2563', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '1', 0, '', 'lel.pdf', ''),
(80, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', '', '', '', 'โครงการอะไรซักอย่าง 46', '', 'ดร.จิรัฐ มัธยมนันทน์', '2563', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(81, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', 'ประวิตร วงษ์สุวรรณ', '', '', 'โครงการอะไรซักอย่าง 47', '', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2563', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(82, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', 'ประวิตร วงษ์สุวรรณ', 'ประยุทธ์ จันทร์โอชา', '', 'โครงการอะไรซักอย่าง 48', '', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2563', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(83, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', 'ประวิตร วงษ์สุวรรณ', 'ประยุทธ์ จันทร์โอชา', '', 'โครงการอะไรซักอย่าง 49', '', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2563', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(84, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', 'ประวิตร วงษ์สุวรรณ', 'ประยุทธ์ จันทร์โอชา', '', 'โครงการอะไรซักอย่าง 50', '', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2563', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(85, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', 'ประวิตร วงษ์สุวรรณ', 'ประยุทธ์ จันทร์โอชา', '', 'โครงการอะไรซักอย่าง 51', '', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2563', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(86, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', 'ประวิตร วงษ์สุวรรณ', 'ประยุทธ์ จันทร์โอชา', '', 'โครงการอะไรซักอย่าง 52', '', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2563', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(87, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', 'ประวิตร วงษ์สุวรรณ', 'ประยุทธ์ จันทร์โอชา', '', 'โครงการอะไรซักอย่าง 53', '', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2563', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(88, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', 'ประวิตร วงษ์สุวรรณ', 'ประยุทธ์ จันทร์โอชา', 'ทักษิณ ชินวัตร', 'โครงการอะไรซักอย่าง 54', '', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2563', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(89, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', 'ประวิตร วงษ์สุวรรณ', 'ประยุทธ์ จันทร์โอชา', 'ทักษิณ ชินวัตร', 'โครงการอะไรซักอย่าง 55', '', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2563', 'วิชาเทคโนโลยีการโฆษณาและประชาสัมพันธ์', '2', 0, '', 'lel.pdf', ''),
(90, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', 'ประวิตร วงษ์สุวรรณ', 'ประยุทธ์ จันทร์โอชา', 'ทักษิณ ชินวัตร', 'โครงการอะไรซักอย่าง 56', '', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2562', 'เทคโนโลยีการพิมพ์ดิจิทัลและบรรจุภัณฑ์', '2', 0, '', 'lel.pdf', ''),
(91, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', 'ประวิตร วงษ์สุวรรณ', 'ประยุทธ์ จันทร์โอชา', 'ทักษิณ ชินวัตร', 'โครงการอะไรซักอย่าง 57', '', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2562', 'เทคโนโลยีการพิมพ์ดิจิทัลและบรรจุภัณฑ์', '1', 0, '', 'lel.pdf', ''),
(92, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', 'ประวิตร วงษ์สุวรรณ', 'ประยุทธ์ จันทร์โอชา', 'ทักษิณ ชินวัตร', 'โครงการอะไรซักอย่าง 58', '', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2562', 'เทคโนโลยีการพิมพ์ดิจิทัลและบรรจุภัณฑ์', '1', 0, '', 'lel.pdf', ''),
(93, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', 'ประวิตร วงษ์สุวรรณ', 'ประยุทธ์ จันทร์โอชา', 'ทักษิณ ชินวัตร', 'โครงการอะไรซักอย่าง 59', '', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2562', 'เทคโนโลยีการพิมพ์ดิจิทัลและบรรจุภัณฑ์', '1', 0, '', 'lel.pdf', ''),
(94, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', 'ประวิตร วงษ์สุวรรณ', 'ประยุทธ์ จันทร์โอชา', 'ทักษิณ ชินวัตร', 'โครงการอะไรซักอย่าง 60', '', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2562', 'เทคโนโลยีการพิมพ์ดิจิทัลและบรรจุภัณฑ์', '1', 0, '', 'lel.pdf', ''),
(95, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', 'ประวิตร วงษ์สุวรรณ', 'ประยุทธ์ จันทร์โอชา', 'ทักษิณ ชินวัตร', 'โครงการอะไรซักอย่าง 61', '', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2562', 'เทคโนโลยีการพิมพ์ดิจิทัลและบรรจุภัณฑ์', '1', 0, '', 'lel.pdf', ''),
(96, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', 'ประวิตร วงษ์สุวรรณ', 'ประยุทธ์ จันทร์โอชา', 'ทักษิณ ชินวัตร', 'โครงการอะไรซักอย่าง 62', '', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2562', 'เทคโนโลยีการพิมพ์ดิจิทัลและบรรจุภัณฑ์', '1', 0, '', 'lel.pdf', ''),
(97, 'อิทธิพัทธ์ สายสอาด', 'ประยุทธ์ จันทร์โอชา', 'ชวน หลีกภัย', 'ประวิตร วงษ์สุวรรณ', '', 'ทักษิณ ชินวัตร', 'โครงการอะไรซักอย่าง 63', '', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2562', 'เทคโนโลยีการพิมพ์ดิจิทัลและบรรจุภัณฑ์', '2', 0, '', 'lel.pdf', ''),
(98, 'อภิสิทธิ์ เวชชาชีวะ', 'ทักษิณ ชินวัตร', '', '', '', '', 'โครงการอะไรซักอย่าง 64', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2562', 'เทคโนโลยีการพิมพ์ดิจิทัลและบรรจุภัณฑ์', '1', 0, '', 'lel.pdf', ''),
(99, 'อภิสิทธิ์ เวชชาชีวะ', 'ทักษิณ ชินวัตร', '', '', '', '', 'โครงการอะไรซักอย่าง 65', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2562', 'เทคโนโลยีการพิมพ์ดิจิทัลและบรรจุภัณฑ์', '1', 0, '', 'lel.pdf', ''),
(100, 'อภิสิทธิ์ เวชชาชีวะ', 'ทักษิณ ชินวัตร', '', '', '', '', 'โครงการอะไรซักอย่าง 66', '', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2562', 'เทคโนโลยีการพิมพ์ดิจิทัลและบรรจุภัณฑ์', '1', 0, '', 'lel.pdf', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mctarchive`
--
ALTER TABLE `mctarchive`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 23, 2021 at 06:03 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u584979650_mctarchive`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `no` int(3) NOT NULL,
  `branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`no`, `branch`) VALUES
(1, 'เทคโนโลยีการถ่ายภาพและภาพยนตร์'),
(2, 'เทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง'),
(3, 'เทคโนโลยีสื่อดิจิทัล'),
(4, 'เทคโนโลยีมัลติมีเดีย'),
(5, 'เทคโนโลยีการโฆษณาและประชาสัมพันธ์'),
(6, 'เทคโนโลยีการพิมพ์ดิจิทัลและบรรจุภัณฑ์');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `level`, `name`) VALUES
('admin', 'admin', 'ADMIN', 'แอดมิน'),
('armsiwadol69', 'armsiwadol69', 'USER', 'armsiwadol69'),
('meenthaisub123', 'meenthaisub123', 'ADMIN', 'มีม'),
('pure3000thb', 'pure3000thb', 'ADMIN', 'เพียว'),
('yaimakmak', 'yaimakmak', 'USER', 'Prayut Chan-o-cha');

-- --------------------------------------------------------

--
-- Table structure for table `mctarchive`
--

CREATE TABLE `mctarchive` (
  `id` varchar(10) NOT NULL,
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
  `website` int(1) DEFAULT 0,
  `video` varchar(200) DEFAULT NULL,
  `pdf` varchar(200) DEFAULT NULL,
  `audio` varchar(200) DEFAULT NULL,
  `yt_link` varchar(100) DEFAULT NULL,
  `site_url` varchar(100) DEFAULT NULL,
  `add_by` varchar(100) DEFAULT 'ADMIN',
  `add_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mctarchive`
--

INSERT INTO `mctarchive` (`id`, `std1`, `std2`, `std3`, `std4`, `std5`, `std6`, `thainame`, `engname`, `teacher`, `sec`, `branch`, `type_doc`, `website`, `video`, `pdf`, `audio`, `yt_link`, `site_url`, `add_by`, `add_date`) VALUES
('CHIN69', 'ไม่บอก', '', '', '', '', '', 'วิธีการทำให้ชินฉลาด', 'How to make CHIN hab more INT', 'งานวิจัยอาจารย์', '2564', 'เทคโนโลยีสื่อดิจิทัล', '2', 0, '', 'CHIN69_1667953211.pdf', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://youtu.be/dQw4w9WgXcQ', 'แอดมิน', '2021-06-20 14:16:59'),
('D58001', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 1', 'Sample 1', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2558', 'เทคโนโลยีสื่อดิจิทัล', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('D58002', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 2', 'Sample 2', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2558', 'เทคโนโลยีสื่อดิจิทัล', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('D58003', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 3', 'Sample 3', 'ผศ.ดร.กัญญาณัฐ เปลวเฟื่อง', '2558', 'เทคโนโลยีสื่อดิจิทัล', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('D58004', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 4', 'Sample 4', 'ผศ.ดร.กัญญาณัฐ เปลวเฟื่อง', '2558', 'เทคโนโลยีสื่อดิจิทัล', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('D58005', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 5', 'Sample 5', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2558', 'เทคโนโลยีสื่อดิจิทัล', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('D58006', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 6', 'Sample 6', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2558', 'เทคโนโลยีสื่อดิจิทัล', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('D58007', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 7', 'Sample 7', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2558', 'เทคโนโลยีสื่อดิจิทัล', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('D58008', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 8', 'Sample 8', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2558', 'เทคโนโลยีสื่อดิจิทัล', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('D58009', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 9', 'Sample 9', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2558', 'เทคโนโลยีสื่อดิจิทัล', '2', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('D58010', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 10', 'Sample 10', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2558', 'เทคโนโลยีสื่อดิจิทัล', '2', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('D69001', 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'เขียนโปรแกรมพัฒนา Web Application เพื่อแสดงผลงานหัวข้อโปรเจครุ่น DM68-60 ทั้งส่วนของ Back-End, Front-End Web Application', 'Develop Web Application Back-End&Front-End to Archive DM\'s Projects', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2564', 'เทคโนโลยีสื่อดิจิทัล', '1', 0, 'D69001_1046614147.mp4', 'D69001_1543794355.pdf', 'D69001_1046614147.mp3', 'https://www.youtube.com/embed/NxELvV-V24k', 'http://dmarchive.yongsue.com/', 'แอดมิน', '2021-06-18 17:25:27'),
('D69002', 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'วิธีการหุงข้าวให้กินได้', 'She don\'t love you btw.', 'งานวิจัยอาจารย์', '2560', 'เทคโนโลยีมัลติมีเดีย', '2', 0, '', 'D69002_1361704207.pdf', '', 'https://www.youtube.com/embed/bNagYg_YGbU', 'http://dmarchive.yongsue.com/', 'แอดมิน', '2021-06-18 21:05:53'),
('M10520', 'น้ำ 5 บาท ', 'น้ำ 5 บาท ', 'น้ำ 5 บาท ', 'น้ำ 5 บาท ', 'น้ำ 5 บาท ', 'น้ำ 5 บาท ', 'เผาลงสู่พื้น', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2564', 'เทคโนโลยีการถ่ายภาพและภาพยนตร์', '1', NULL, 'M10520_1698618038.mp4', 'M10520_1698618038.pdf', 'M10520_1698618038.mp3', 'https://www.youtube.com/embed/Wx08V5jPEwg', 'https://www.youtube.com/watch?v=Wx08V5jPEwg', 'จอนห์', '2021-06-16 20:37:26'),
('M6401', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 11', 'Sample 11', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2564', 'เทคโนโลยีมัลติมีเดีย', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('M6402', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 12', 'Sample 12', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2564', 'เทคโนโลยีมัลติมีเดีย', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('M6403', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 13', 'Sample 13', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2564', 'เทคโนโลยีมัลติมีเดีย', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('M6404', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 14', 'Sample 14', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2564', 'เทคโนโลยีมัลติมีเดีย', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('M6405', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 15', 'Sample 15', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2564', 'เทคโนโลยีมัลติมีเดีย', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('M6406', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 16', 'Sample 16', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2564', 'เทคโนโลยีมัลติมีเดีย', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('M6407', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 17', 'Sample 17', 'ดร.จิรัฐ มัธยมนันทน์', '2564', 'เทคโนโลยีมัลติมีเดีย', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('M6408', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 18', 'Sample 18', 'ดร.จิรัฐ มัธยมนันทน์', '2564', 'เทคโนโลยีมัลติมีเดีย', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('M6409', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 19', 'Sample 19', 'ดร.จิรัฐ มัธยมนันทน์', '2564', 'เทคโนโลยีมัลติมีเดีย', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('M6410', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 20', 'Sample 20', 'ดร.จิรัฐ มัธยมนันทน์', '2564', 'เทคโนโลยีมัลติมีเดีย', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('M6411', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 21', 'Sample 21', 'ดร.จิรัฐ มัธยมนันทน์', '2564', 'เทคโนโลยีมัลติมีเดีย', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('M6412', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 22', 'Sample 22', 'อาจารย์ศักดา ส่งเจริญ', '2564', 'เทคโนโลยีมัลติมีเดีย', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('M6413', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 23', 'Sample 23', 'อาจารย์ศักดา ส่งเจริญ', '2564', 'เทคโนโลยีมัลติมีเดีย', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('M6414', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 24', 'Sample 24', 'อาจารย์ศักดา ส่งเจริญ', '2564', 'เทคโนโลยีมัลติมีเดีย', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('M6415', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 25', 'Sample 25', 'อาจารย์ศักดา ส่งเจริญ', '2564', 'เทคโนโลยีมัลติมีเดีย', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('M6416', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 26', 'Sample 26', 'อาจารย์ศักดา ส่งเจริญ', '2564', 'เทคโนโลยีมัลติมีเดีย', '1', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('M6417', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 27', 'Sample 27', 'ไม่มี', '2564', 'เทคโนโลยีมัลติมีเดีย', '2', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('M6418', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 28', 'Sample 28', 'ไม่มี', '2564', 'เทคโนโลยีมัลติมีเดีย', '2', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('M6419', 'นักศึกษา 1', 'นักศึกษา 2', 'นักศึกษา 3', 'นักศึกษา 4', 'นักศึกษา 5', 'นักศึกษา 6', 'ตัวอย่าง 29', 'Sample 29', 'ไม่มี', '2564', 'เทคโนโลยีมัลติมีเดีย', '2', 0, '', '', '', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'ตัวอย่าง', '2021-06-17 19:30:01'),
('P58002', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', '', 'วิธีการนอนให้ครบ 8 ชั่วโมง', 'She don\'t care about u.', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2558', 'เทคโนโลยีการถ่ายภาพและภาพยนตร์', '1', NULL, '', 'P58002_508906420.pdf', '', '', '', 'แอดมิน', '2021-06-18 15:51:56'),
('TV69', 'ศิวดล มะลิซ้อน', '', '', '', '', '', 'การทอดไก่ให้อร่อย', 'How to make she love U', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2558', 'เทคโนโลยีการโฆษณาและประชาสัมพันธ์', '1', NULL, '', 'TV69_1238413572.pdf', '', 'https://www.youtube.com/embed/ZjNUJUgyoOw', 'http://dmarchive.yongsue.com/', 'จอนห์', '2021-06-18 12:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `mctarchive_pre`
--

CREATE TABLE `mctarchive_pre` (
  `id` varchar(10) NOT NULL,
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
  `audio` varchar(200) DEFAULT NULL,
  `yt_link` varchar(100) DEFAULT NULL,
  `site_url` varchar(100) DEFAULT NULL,
  `add_by` varchar(100) DEFAULT 'ADMIN',
  `add_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mctarchive_pre`
--

INSERT INTO `mctarchive_pre` (`id`, `std1`, `std2`, `std3`, `std4`, `std5`, `std6`, `thainame`, `engname`, `teacher`, `sec`, `branch`, `type_doc`, `website`, `video`, `pdf`, `audio`, `yt_link`, `site_url`, `add_by`, `add_date`) VALUES
('YSI1620', '居並ぶ穀物と溜息まじりの運送屋', '', '', '', '', '', '居並ぶ穀物と溜息まじりの運送屋', '居並ぶ穀物と溜息まじりの運送屋', 'ผศ.ดร.กัญญาณัฐ เปลวเฟื่อง', '2560', 'เทคโนโลยีสื่อดิจิทัล', '1', NULL, 'YSI1620_1371928566.mp4', 'YSI1620_1371928566.pdf', 'YSI1620_1371928566.mp3', 'https://www.youtube.com/embed/NxELvV-V24k', 'http://dmarchive.yongsue.com/', 'แอดมิน', '2021-06-16 20:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `var` varchar(15) NOT NULL DEFAULT '0',
  `setting` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`var`, `setting`) VALUES
('free2uplaod', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `no` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`no`, `name`, `date`, `branch`) VALUES
(1, 'ดร.จิรัฐ มัธยมนันทน์', '2021-04-21', 'วิชาเทคโนโลยีสื่อดิจิทัล'),
(2, 'ผศ.ดร.กัญญาณัฐ เปลวเฟื่อง', '2021-04-21', 'วิชาเทคโนโลยีสื่อดิจิทัล'),
(3, 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2021-04-21', 'วิชาเทคโนโลยีสื่อดิจิทัล'),
(4, 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2021-04-21', 'วิชาเทคโนโลยีสื่อดิจิทัล'),
(5, 'อาจารย์ชิรพงษ์ ญานุชิตร', '2021-04-21', 'วิชาเทคโนโลยีสื่อดิจิทัล'),
(6, 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2021-04-21', 'วิชาเทคโนโลยีสื่อดิจิทัล'),
(7, 'อาจารย์ศักดา ส่งเจริญ', '2021-04-23', 'วิชาเทคโนโลยีสื่อดิจิทัล'),
(13, 'งานวิจัยอาจารย์', '2021-06-16', '');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `year` varchar(4) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`year`, `date`) VALUES
('2558', '2021-04-23 01:07:52'),
('2559', '2021-04-23 01:07:55'),
('2560', '2021-04-23 01:07:58'),
('2561', '2021-04-23 01:08:03'),
('2562', '2021-04-23 01:08:05'),
('2563', '2021-04-22 18:51:12'),
('2564', '2021-04-26 11:10:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `mctarchive`
--
ALTER TABLE `mctarchive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mctarchive_pre`
--
ALTER TABLE `mctarchive_pre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`var`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

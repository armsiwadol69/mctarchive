-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 05:17 PM
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
-- Dumping data for table `mctarchive`
--

INSERT INTO `mctarchive` (`id`, `std1`, `std2`, `std3`, `std4`, `std5`, `std6`, `thainame`, `engname`, `teacher`, `sec`, `branch`, `type_doc`, `website`, `video`, `pdf`, `audio`, `yt_link`, `site_url`, `add_by`, `add_date`) VALUES
('D69001', 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'เขียนโปรแกรมพัฒนา Web Application เพื่อแสดงผลงานหัวข้อโปรเจครุ่น DM68-60 ทั้งส่วนของ Back-End, Front-End Web Application', 'Develop Web Application Back-End&Front-End to Archive DM\'s Projects', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2560', 'เทคโนโลยีมัลติมีเดีย', '1', 0, 'D69001_1046614147.mp4', 'D69001_1543794355.pdf', 'D69001_1046614147.mp3', 'https://www.youtube.com/embed/NxELvV-V24k', 'http://dmarchive.yongsue.com/', 'แอดมิน', '2021-06-15 17:25:27'),
('D69002', 'ศิวดล มะลิซ้อน', 'นางสาวณิชาภัทร พรหมศร', 'นางสาวปุณยนุช ตันติเดชามงคล', '', '', '', 'วิธีการหุงข้าวให้กินได้', 'She don\'t love you btw.', 'งานวิจัยอาจารย์', '2560', 'เทคโนโลยีมัลติมีเดีย', '2', 0, '', 'D69002_1361704207.pdf', '', 'https://www.youtube.com/embed/bNagYg_YGbU', 'http://dmarchive.yongsue.com/', 'แอดมิน', '2021-06-15 21:05:53'),
('TV69', 'ศิวดล มะลิซ้อน', '', '', '', '', '', 'การทอดไก่ให้อร่อย', 'How to make she love U', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2558', 'เทคโนโลยีการโฆษณาและประชาสัมพันธ์', '1', NULL, '', 'TV69_1238413572.pdf', '', 'https://www.youtube.com/embed/ZjNUJUgyoOw', 'http://dmarchive.yongsue.com/', 'จอนห์', '2021-06-16 12:31:59');

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
('M10520', 'น้ำ 5 บาท ', 'น้ำ 5 บาท ', 'น้ำ 5 บาท ', 'น้ำ 5 บาท ', 'น้ำ 5 บาท ', 'น้ำ 5 บาท ', 'เผาลงสู่พื้น', 'Brun me to the ground', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2564', 'เทคโนโลยีการถ่ายภาพและภาพยนตร์', '1', NULL, 'M10520_1698618038.mp4', 'M10520_1698618038.pdf', 'M10520_1698618038.mp3', 'https://www.youtube.com/embed/Wx08V5jPEwg', 'https://www.youtube.com/watch?v=Wx08V5jPEwg', 'จอนห์', '2021-06-16 20:37:26'),
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
('free2uplaod', 1);

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

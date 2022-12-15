-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 12:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
  `branch_id` int(10) NOT NULL,
  `branchName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branchName`) VALUES
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
  `user_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`, `level`, `name`) VALUES
(1, 'meenthaisub123', 'meenthaisub123', 'ADMIN', 'มีม'),
(2, 'nut1', 'MQ==', 'ADMIN', 'หำน้อย'),
(3, 'pure3000thb', 'pure3000thb', 'ADMIN', 'เพียว'),
(4, 'yaimakmak', 'yaimakmak', 'USER', 'Prayut Chan-o-cha'),
(6969, 'armsiwadol69', 'armsiwadol69', 'USER', 'armsiwadol69'),
(42069, 'admin', 'YWRtaW4=', 'ADMIN', 'แอดมิน');

-- --------------------------------------------------------

--
-- Table structure for table `mctarchive`
--

CREATE TABLE `mctarchive` (
  `system_id` int(10) NOT NULL COMMENT 'system ref ID of thesis',
  `id` varchar(10) NOT NULL,
  `std1` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `std2` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `std3` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `std4` varchar(100) DEFAULT NULL,
  `std5` varchar(100) DEFAULT NULL,
  `std6` varchar(100) DEFAULT NULL,
  `thainame` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `engname` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `teacher` int(10) DEFAULT NULL,
  `co_teacher` int(10) DEFAULT NULL,
  `sec` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `branch` int(10) DEFAULT NULL,
  `type_doc` varchar(100) NOT NULL,
  `website` int(1) DEFAULT 0,
  `video` varchar(200) DEFAULT NULL,
  `pdf` varchar(200) DEFAULT NULL,
  `audio` varchar(200) DEFAULT NULL,
  `yt_link` varchar(100) DEFAULT NULL,
  `site_url` varchar(100) DEFAULT NULL,
  `add_by` int(10) DEFAULT NULL,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `teacher_id` int(10) NOT NULL,
  `teacherName` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `branch` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacherName`, `date`, `branch`) VALUES
(1, 'ดร.จิรัฐ มัธยมนันทน์', '2021-04-21', 3),
(2, 'ผศ.ดร.กัญญาณัฐ เปลวเฟื่อง', '2021-04-21', 3),
(3, 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2021-04-21', 3),
(4, 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2021-04-21', 3),
(5, 'อาจารย์ชิรพงษ์ ญานุชิตร', '2021-04-21', 3),
(6, 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2021-04-21', 3),
(7, 'อาจารย์ศักดา ส่งเจริญ', '2021-04-23', 3),
(13, 'งานวิจัยอาจารย์', '2021-06-16', NULL);

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
('2564', '2021-04-26 11:10:42'),
('2565', '2022-12-15 14:03:58'),
('2566', '2022-12-15 14:04:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `mctarchive`
--
ALTER TABLE `mctarchive`
  ADD PRIMARY KEY (`system_id`),
  ADD KEY `branch` (`branch`),
  ADD KEY `main_teacher` (`teacher`),
  ADD KEY `co_teacher` (`co_teacher`),
  ADD KEY `c_user` (`add_by`);

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
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `branch_idT` (`branch`);

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
  MODIFY `branch_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mctarchive`
--
ALTER TABLE `mctarchive`
  ADD CONSTRAINT `branch` FOREIGN KEY (`branch`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `c_user` FOREIGN KEY (`add_by`) REFERENCES `login` (`user_id`),
  ADD CONSTRAINT `co_teacher` FOREIGN KEY (`co_teacher`) REFERENCES `teacher` (`teacher_id`),
  ADD CONSTRAINT `main_teacher` FOREIGN KEY (`teacher`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `branch_idT` FOREIGN KEY (`branch`) REFERENCES `branch` (`branch_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

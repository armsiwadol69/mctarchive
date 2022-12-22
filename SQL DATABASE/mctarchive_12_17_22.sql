-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 06:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branchName`) VALUES
(0, 'ไม่มี'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`, `level`, `name`) VALUES
(0, 'siwadol', 'c21vbE5VVFo=', 'ADMIN', 'ศิวดล ม.'),
(42069, 'admin', 'YWRtaW4=', 'ADMIN', 'แอดมิน');

-- --------------------------------------------------------

--
-- Table structure for table `mctarchive`
--

CREATE TABLE `mctarchive` (
  `system_id` int(10) NOT NULL COMMENT 'system ref ID of thesis',
  `id` varchar(10) NOT NULL,
  `std1` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `std2` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `std3` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `std4` varchar(100) DEFAULT NULL,
  `std5` varchar(100) DEFAULT NULL,
  `std6` varchar(100) DEFAULT NULL,
  `thainame` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `engname` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `teacher` int(10) DEFAULT NULL,
  `co_teacher` int(10) DEFAULT NULL,
  `sec` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mctarchive`
--

INSERT INTO `mctarchive` (`system_id`, `id`, `std1`, `std2`, `std3`, `std4`, `std5`, `std6`, `thainame`, `engname`, `teacher`, `co_teacher`, `sec`, `branch`, `type_doc`, `website`, `video`, `pdf`, `audio`, `yt_link`, `site_url`, `add_by`, `add_date`) VALUES
(1671252354, 'DM61203', 'นางสาวชลธิชา นิ่มคำศรี', 'นายไตรภูมิ พรพัฒน์', '', '', '', '', 'การพัฒนาเว็บแอปพลิเคชันเพื่อศึกษาการเลือกสีข้าวพร้อมอาหารของผู้สูงอายุในจังหวัดปทุมธานี', 'Web Application Development to Study The Behavior of Rice Color With Food of The Elderly People in Pathumthani', 4, 0, '2561', 3, '1', 0, '', '1671252354_381552691.pdf', '', '', '', 0, '2022-12-17 04:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `mctarchive_pre`
--

CREATE TABLE `mctarchive_pre` (
  `system_id` int(10) NOT NULL COMMENT 'system ref ID of thesis',
  `id` varchar(10) NOT NULL,
  `std1` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `std2` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `std3` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `std4` varchar(100) DEFAULT NULL,
  `std5` varchar(100) DEFAULT NULL,
  `std6` varchar(100) DEFAULT NULL,
  `thainame` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `engname` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `teacher` int(10) DEFAULT NULL,
  `co_teacher` int(10) DEFAULT NULL,
  `sec` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `var` varchar(15) NOT NULL DEFAULT '0',
  `setting` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacherName`, `date`, `branch`) VALUES
(0, 'ไม่มี', '2022-12-16', 7),
(1, 'ดร.จิรัฐ มัธยมนันทน์', '2021-04-21', 3),
(2, 'ผศ.ดร.กัญญาณัฐ เปลวเฟื่อง', '2021-04-21', 3),
(3, 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2021-04-21', 3),
(4, 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2021-04-21', 3),
(5, 'อาจารย์ชิรพงษ์ ญานุชิตร', '2021-04-21', 3),
(6, 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2021-04-21', 3),
(7, 'อาจารย์ศักดา ส่งเจริญ', '2021-04-23', 3),
(14, 'ผศ.กิตติพร ชูเกียรติ', '2022-12-16', 1),
(15, 'ผศ.ดร.ประภาภร ดลกิจ', '2022-12-16', 1),
(16, 'ผศ.ยุวยง อนุมานราชธน', '2022-12-16', 1),
(17, 'อ.อุกฤษ ณ สงขลา', '2022-12-16', 1),
(18, 'ผศ.ดร.ไวยวุฒิ วุฒิอรรถสาร', '2022-12-16', 1),
(19, 'ผศ.อรสุชา อุปกิจ', '2022-12-16', 1),
(20, 'ผศ.อิทธิพล โพธิพันธุ์', '2022-12-16', 1),
(21, 'ผศ.สุวัฒน์ พื้นผา', '2022-12-16', 1),
(22, 'อ.อนุสรณ์ สาครดี', '2022-12-16', 1),
(23, 'อ.กานต์พิชชา สุวรรณวัฒนเมรี', '2022-12-16', 6),
(24, 'ผศ.ดร.อุรวิศ ตั้งกิจวิวัฒน์', '2022-12-16', 6),
(25, 'ผศ.ดร.อนันต์ ตันวิไลศิริ', '2022-12-16', 6),
(26, 'รศ.ดร.จันทร์ประภา พ่วงสุวรรณ', '2022-12-16', 6),
(27, 'ผศ.ดร.วสันต์ สอนเขียว', '2022-12-16', 6),
(28, 'อ.อัครเดช ทองสว่าง', '2022-12-16', 6),
(29, 'ผศ.ดร.กิติโรจน์ รัตนเกษมสุข', '2022-12-16', 6),
(30, 'ผศ.ดร.สุรชัย ขันแก้ว', '2022-12-16', 6),
(31, 'อ.สุชาดา คันธารส', '2022-12-16', 6),
(32, 'ผศ.วิษณุพร อรุณลักษณ์', '2022-12-16', 2),
(33, 'ผศ.มนชนก มานะกุล', '2022-12-16', 2),
(34, 'ดร.ภัสสร สังข์ศรี', '2022-12-16', 2),
(35, 'ผศ.ดร.จิรศักดิ์ ปรีชาวีรกุล', '2022-12-16', 2),
(36, 'ผศ.ดร.กุลกนิษฐ์ ทองเงา', '2022-12-16', 2),
(37, 'ผศ.คำรณ ย่องซื่อ', '2022-12-16', 2),
(38, 'ผศ.ภาณินี บุญเลิศ', '2022-12-16', 2),
(39, 'อ.ชาลิน นุกูล', '2022-12-16', 2),
(40, 'อ.กุลภัสสร์ กาญจนภรางกูร', '2022-12-16', 2),
(41, 'ผศ.กมล สังข์ทอง', '2022-12-16', 2),
(42, 'ผศ.ดร.วิภาวี วีระวงศ์', '2022-12-16', 2),
(43, 'ผศ.พลอย ศรีสุโร', '2022-12-16', 5),
(44, 'ผศ.นวพรรษ การะเกตุ', '2022-12-16', 5),
(45, 'ผศ.รัตติกาล เจนจัด', '2022-12-16', 5),
(46, 'ผศ.ดร.ณัฐวิกา สินสุวรรณ', '2022-12-16', 5),
(47, 'อ.จารุณี เจริญรส', '2022-12-16', 5),
(48, 'อ.ตปากร พุธเกส', '2022-12-16', 5),
(49, 'อ.ชนิดา ศักดิ์สิริโกศล', '2022-12-16', 5),
(50, 'อ.กนก จินดา', '2022-12-16', 5),
(51, 'ผศ.วิภูษิต เพียรการค้า', '2022-12-16', 4),
(52, 'ผศ.ดร.ศรชัย บุตรแก้ว', '2022-12-16', 4),
(53, 'ผศ.อภิวัฒน์ วงศ์เลิศ', '2022-12-16', 4),
(54, 'อ.กมลทิพย์ ต่อทรัพย์สินชัย', '2022-12-16', 4),
(55, 'อ.เบญนภา พัฒนาพิภัทร', '2022-12-16', 4),
(56, 'อ.นัจภัค มีอุสาห์', '2022-12-16', 4),
(57, 'อ.ธนะภูมิ สงค์ธนาพิทักษ์', '2022-12-16', 4);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `year` varchar(4) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`year`, `date`) VALUES
('2548', '2022-12-16 23:32:49'),
('2549', '2022-12-16 23:34:32'),
('2550', '2022-12-16 23:34:32'),
('2551', '2022-12-16 23:34:32'),
('2552', '2022-12-16 23:34:32'),
('2553', '2022-12-16 23:34:32'),
('2554', '2022-12-16 23:34:32'),
('2555', '2022-12-16 23:34:32'),
('2556', '2022-12-16 23:34:32'),
('2557', '2022-12-16 23:34:32'),
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
  ADD PRIMARY KEY (`system_id`),
  ADD KEY `branch` (`branch`),
  ADD KEY `main_teacher` (`teacher`),
  ADD KEY `co_teacher` (`co_teacher`),
  ADD KEY `c_user` (`add_by`);

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
  MODIFY `teacher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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

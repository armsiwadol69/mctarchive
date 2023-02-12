-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2023 at 01:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

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
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(10) NOT NULL,
  `teacherName` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `branch` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacherName`, `date`, `branch`) VALUES
(0, 'ไม่มี', '2022-12-15 17:00:00', 0),
(1, 'ดร.จิรัฐ มัธยมนันทน์', '2021-04-20 17:00:00', 3),
(2, 'ผศ.ดร.กัญญาณัฐ เปลวเฟื่อง', '2021-04-20 17:00:00', 3),
(3, 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2021-04-20 17:00:00', 3),
(4, 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2021-04-20 17:00:00', 3),
(5, 'อาจารย์ชิรพงษ์ ญานุชิตร', '2021-04-20 17:00:00', 3),
(6, 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2021-04-20 17:00:00', 3),
(7, 'อาจารย์ศักดา ส่งเจริญ', '2021-04-22 17:00:00', 3),
(14, 'ผศ.กิตติพร ชูเกียรติ', '2022-12-15 17:00:00', 1),
(15, 'ผศ.ดร.ประภาภร ดลกิจ', '2022-12-15 17:00:00', 1),
(16, 'ผศ.ยุวยง อนุมานราชธน', '2022-12-15 17:00:00', 1),
(17, 'อ.อุกฤษ ณ สงขลา', '2022-12-15 17:00:00', 1),
(18, 'ผศ.ดร.ไวยวุฒิ วุฒิอรรถสาร', '2022-12-15 17:00:00', 1),
(19, 'ผศ.อรสุชา อุปกิจ', '2022-12-15 17:00:00', 1),
(20, 'ผศ.อิทธิพล โพธิพันธุ์', '2022-12-15 17:00:00', 1),
(21, 'ผศ.สุวัฒน์ พื้นผา', '2022-12-15 17:00:00', 1),
(22, 'อ.อนุสรณ์ สาครดี', '2022-12-15 17:00:00', 1),
(23, 'อ.กานต์พิชชา สุวรรณวัฒนเมรี', '2022-12-15 17:00:00', 6),
(24, 'ผศ.ดร.อุรวิศ ตั้งกิจวิวัฒน์', '2022-12-15 17:00:00', 6),
(25, 'ผศ.ดร.อนันต์ ตันวิไลศิริ', '2022-12-15 17:00:00', 6),
(26, 'รศ.ดร.จันทร์ประภา พ่วงสุวรรณ', '2022-12-15 17:00:00', 6),
(27, 'ผศ.ดร.วสันต์ สอนเขียว', '2022-12-15 17:00:00', 6),
(28, 'อ.อัครเดช ทองสว่าง', '2022-12-15 17:00:00', 6),
(29, 'ผศ.ดร.กิติโรจน์ รัตนเกษมสุข', '2022-12-15 17:00:00', 6),
(30, 'ผศ.ดร.สุรชัย ขันแก้ว', '2022-12-15 17:00:00', 6),
(31, 'อ.สุชาดา คันธารส', '2022-12-15 17:00:00', 6),
(32, 'ผศ.วิษณุพร อรุณลักษณ์', '2022-12-15 17:00:00', 2),
(33, 'ผศ.มนชนก มานะกุล', '2022-12-15 17:00:00', 2),
(34, 'ดร.ภัสสร สังข์ศรี', '2022-12-15 17:00:00', 2),
(35, 'ผศ.ดร.จิรศักดิ์ ปรีชาวีรกุล', '2022-12-15 17:00:00', 2),
(36, 'ผศ.ดร.กุลกนิษฐ์ ทองเงา', '2022-12-15 17:00:00', 2),
(37, 'ผศ.คำรณ ย่องซื่อ', '2022-12-15 17:00:00', 2),
(38, 'ผศ.ภาณินี บุญเลิศ', '2022-12-15 17:00:00', 2),
(39, 'อ.ชาลิน นุกูล', '2022-12-15 17:00:00', 2),
(40, 'อ.กุลภัสสร์ กาญจนภรางกูร', '2022-12-15 17:00:00', 2),
(41, 'ผศ.กมล สังข์ทอง', '2022-12-15 17:00:00', 2),
(42, 'ผศ.ดร.วิภาวี วีระวงศ์', '2022-12-15 17:00:00', 2),
(43, 'ผศ.พลอย ศรีสุโร', '2022-12-15 17:00:00', 5),
(44, 'ผศ.นวพรรษ การะเกตุ', '2022-12-15 17:00:00', 5),
(45, 'ผศ.รัตติกาล เจนจัด', '2022-12-15 17:00:00', 5),
(46, 'ผศ.ดร.ณัฐวิกา สินสุวรรณ', '2022-12-15 17:00:00', 5),
(47, 'อ.จารุณี เจริญรส', '2022-12-15 17:00:00', 5),
(48, 'อ.ตปากร พุธเกส', '2022-12-15 17:00:00', 5),
(49, 'อ.ชนิดา ศักดิ์สิริโกศล', '2022-12-15 17:00:00', 5),
(50, 'อ.กนก จินดา', '2022-12-15 17:00:00', 5),
(51, 'ผศ.วิภูษิต เพียรการค้า', '2022-12-15 17:00:00', 4),
(52, 'ผศ.ดร.ศรชัย บุตรแก้ว', '2022-12-15 17:00:00', 4),
(53, 'ผศ.อภิวัฒน์ วงศ์เลิศ', '2022-12-15 17:00:00', 4),
(54, 'อ.กมลทิพย์ ต่อทรัพย์สินชัย', '2022-12-15 17:00:00', 4),
(55, 'อ.เบญนภา พัฒนาพิภัทร', '2022-12-15 17:00:00', 4),
(56, 'อ.นัจภัค มีอุสาห์', '2022-12-15 17:00:00', 4),
(57, 'อ.ธนะภูมิ สงค์ธนาพิทักษ์', '2022-12-15 17:00:00', 4),
(62, 'ประทุมทอง ไตรรัตน์', '2022-12-18 17:00:00', 6),
(63, 'อรรถพร ศิริเมธากุล', '2022-12-18 17:00:00', 6),
(64, 'กฤษดา กิติสาระกุลชัย', '2022-12-18 17:00:00', 6),
(65, 'ดร.สมพร เจรคุณาวัตน์', '2022-12-18 17:00:00', 6),
(66, 'นิติ วิทยาวิโรจน์', '2022-12-18 17:00:00', 6),
(67, 'เอกชัย โถเหลือง', '2022-12-20 17:00:00', 6),
(68, 'อาจารย์วันชัย แก้วดี', '2022-12-28 17:00:00', 3),
(69, 'ปิยะพงษ์ อิงไธสง', '2023-01-17 17:00:00', 5),
(70, 'วิทยา ไชยวงศ์', '2023-01-17 17:00:00', 6),
(71, 'อนันด์ ดันวิไลศิริ', '2023-01-17 17:00:00', 6),
(72, 'พิศิษฐ์ อู่ศิริกุพาณิชญ์', '2023-01-17 17:00:00', 6),
(73, 'กิตติศักดิ์ ผิวทองงาม', '2023-01-17 17:00:00', 6),
(74, 'จัทร์ประภา พ่วงสุวรรณ', '2023-01-19 17:00:00', 6),
(75, 'ศรศิลป์ ซึมกลาง', '2023-01-19 17:00:00', 6),
(76, 'ปิยะพร กัญชนะ', '2023-01-19 17:00:00', 6),
(77, 'วัชรินทร์ ข่วงทิพย์', '2023-01-19 17:00:00', 6),
(78, 'สุพัฒน์ เรียบร้อย', '2023-01-23 17:00:00', 6),
(79, 'สุรสิทธิ์ วงศ์แสงจันทร์', '2023-01-29 17:00:00', 6),
(80, 'ธาดา ลีเกีบรติกุล', '2023-01-29 17:00:00', 6),
(81, 'ผู้ช่วยศาสตราจารย์ภูรินทร์ อัครกุลธร', '2023-01-30 17:00:00', 6),
(82, 'ผู้ช่วยศาสตราจารย์สุวิมล พุ่มประทีป', '2023-02-05 17:00:00', 5),
(83, 'อาจารย์ถาวร พูลสมบัติ', '2023-02-05 17:00:00', 5),
(84, 'อาจารย์เอกญา แววภักดี', '2023-02-05 17:00:00', 5),
(85, 'อ.ดร.ณัฐปคัลภภ์ กิตติสุนทรพิศาล', '2023-02-05 17:00:00', 5),
(87, 'ยุทธนาพงศ์ แดงเพ็ง', '2023-02-09 17:00:00', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `branch_idT` (`branch`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `branch_idT` FOREIGN KEY (`branch`) REFERENCES `branch` (`branch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 03:22 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`, `level`, `name`) VALUES
(1, 'siwadol', 'c21vbE5VVFo=', 'ADMIN', 'ศิวดล ม.'),
(42069, 'admin', 'YWRtaW4=', 'ADMIN', 'แอดมิน'),
(42070, 'poonyanuch', 'cG9vbnlhbnVjaA==', 'ADMIN', 'ปุณยนุช ต.'),
(42071, 'nichapat', 'TmljaGFwYXQ=', 'ADMIN', 'ณิชาภัทร พ.');

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

--
-- Dumping data for table `mctarchive`
--

INSERT INTO `mctarchive` (`system_id`, `id`, `std1`, `std2`, `std3`, `std4`, `std5`, `std6`, `thainame`, `engname`, `teacher`, `co_teacher`, `sec`, `branch`, `type_doc`, `website`, `video`, `pdf`, `audio`, `yt_link`, `site_url`, `add_by`, `add_date`) VALUES
(1671252354, 'DM61203', 'นางสาวชลธิชา นิ่มคำศรี', 'นายไตรภูมิ พรพัฒน์', '', '', '', '', 'การพัฒนาเว็บแอปพลิเคชันเพื่อศึกษาการเลือกสีข้าวพร้อมอาหารของผู้สูงอายุในจังหวัดปทุมธานี', 'Web Application Development to Study The Behavior of Rice Color With Food of The Elderly People in Pathumthani', 4, 0, '2561', 3, '1', 0, '', '1671252354_381552691.pdf', '', '', '', 1, '2022-12-17 04:47:19'),
(1671263356, 'DM61244', 'นายชัยไมตรี นกฉลาด', 'นางสาวสุพาพร งามสม', 'นายพลพันธุ์ ขันตี', '', '', '', 'การถ่ายทำภาพยนตร์เสมือนจริงแนวสยองขวัญโดยใช้เทคนิคกล้อง 360 องศา', 'THE STUDY OF IMMERSIVE HORROR MOVIES BY USING 360 CAMERA TECHNIQUE', 6, 0, '2562', 3, '1', 0, '1671263356_1344632689.mp4', '1671263356_1344632689.pdf', '', '', '', 42070, '2022-12-17 00:54:10'),
(1671263773, 'DM61214', 'นางสาวอรปรียา พงษ์เผือก', 'นางสาวสุธินันท์ สิงห์บุบผา', '', '', '', '', 'การสร้างสื่อเสมือนจริง เรื่อง ระบบสุริยะ', 'Virtual Reality for Solar System', 3, 0, '2561', 3, '1', 0, '1671263773_1126512381.mp4', '1671263773_1126512381.pdf', '', '', '', 42070, '2022-12-17 00:58:29'),
(1671263944, 'DM61211', 'นางสาวอรวรรณ พวงสำเภา', 'นายศรัณ ดวงอุปมา', '', '', '', '', 'การใช้สื่อเหมือนจริงเพื่อฝึกพูดในที่สาธารณะ', 'VIRTUAL REALITY APPLICATION AS A TOOL FOR PUBLIC SPEAKING PRACTIC', 3, 0, '2561', 3, '1', 0, '1671263944_351466641.mp4', '1671263944_351466641.pdf', '', '', '', 42070, '2022-12-17 01:00:46'),
(1671264163, 'DM61232', 'นางสาวมนธิดา กุยรัมย์', 'นางสาววรรณภา ช้างแก้วมณี', 'นางสาวมณฑิชา ไตรรัตน์แสง', '', '', '', 'การสร้างแผนที่เพื่อแสดงแอนิเมชั่นด้วยภาพ 2 มิติเสมือน 3 มิติผ่านเทคโนโลยี Augmented Reality', '2D VIRTUAL 3D MAP VIA DEVLOPMENT AUGMENTED REALITY TECHNOLOGY', 4, 0, '2561', 3, '1', 0, '1671264163_1589913557.mp4', '1671264163_1589913557.pdf', '', '', '', 42070, '2022-12-17 01:04:53'),
(1671264397, 'DM61208', 'นายสิทธิเดช เบ็ญกูล', 'นายชินพร อัมราภิบาล', '', '', '', '', 'การสร้างเสียงดนตรีบำบัดสำหรับหรับคนที่นอนหลับยากด้วยเทคนิคเสียงสังเคราะห์', 'Synthesis Sound for Sleeping', 3, 0, '2561', 3, '1', 0, '', '1671264397_657681704.pdf', '1671264397_657681704.mp3', '', '', 42070, '2022-12-17 01:08:12'),
(1671264604, 'DM61218', 'นางสาวจิรภิญญา ไชยวงษ์', 'นางสาวธัญญลักษณ์ ระรื่น', '', '', '', '', 'การผลิตสื่อปฏิสัมพันธ์โดยใช้สถานการณ์จำลองสำหรับการฝึกปฐมพยาบาลยื้อชีวิตเบื้องต้น', 'DEVELOPMENT OF INTERACTIVE MEDIA PRODUCTION FOR BASIC CPR TRAINING', 3, 0, '2561', 3, '1', 0, '1671264604_1241276057.mp4', '1671264604_1241276057.pdf', '', '', '', 42070, '2022-12-17 01:12:40'),
(1671264872, 'DM61217', 'นายชญานนท์  ปุ่นวัฒน์', 'นายฐิติวัฒน์  เกิดสว่าง', '', '', '', '', 'การสร้างสื่อโมชันกราฟิกแบบมีปฏิสัมพันธ์เพื่อส่งเสริมทักษะการเขียนพยัญชนะภาษาไทยสำหรับพัฒนาการช้า (เด็ก LD)', 'Creating interactive graphics media to promote Thai alphabet writing skills for LD students', 4, 0, '2561', 3, '1', 0, '1671264872_389730942.mp4', '1671264872_389730942.pdf', '', '', '', 42070, '2022-12-17 01:16:24'),
(1671265974, 'DM61223', 'นายณัฐพล สุดแดง', 'นายพีรวิชญ์ ไชยยะ', 'นางสาวธัญชนก สุวรรณรัต', '', '', '', 'ภาพยนต์สั้น 4 มิติแบบทางเลือก', '4D INTERACTIVE MOVIE', 7, 6, '2561', 3, '1', 0, '', '1671265974_1475204835.pdf', '', '', '', 42069, '2022-12-17 01:34:44'),
(1671266087, 'DM61242', 'นายศรัณยู ช่างปรุง', 'นายชุมพร ดำหมึก', 'นายภูวดล เปรมปรง', '', '', '', 'การนำเสนอโบรชัวร์ของวัดพระศรีรัตนศาสดารามด้วยเทคโนโลยี AR', 'Presenting Brochures Of The Emerald Buddha Temple With AR Technology', 4, 0, '2561', 3, '1', 0, '', '1671266087_1667406582.pdf', '', '', '', 42069, '2022-12-17 01:36:31'),
(1671266196, 'DM61247', 'นางสาวณิชมน อนันตธนรัตน์', 'นางสาวมานิตา ศรีสัจจะกุล', 'นางสาวคันธมาลี สีสุทร', '', '', '', 'การศึกษากระบวนการแสดงด้านดาราศาสตร์โดยใช้เทคนิคโปรเจคชั่นแมพปิ้งบนโดมแบบถอดประกอบและระบบเสียง 5.1', 'Mobile Projection Mapping Planetarium Dome With 5.1 Surround Sound', 7, 0, '2561', 3, '1', 0, '', '1671266196_1797155325.pdf', '', '', '', 42069, '2022-12-17 01:38:45'),
(1671266443, 'DM61250', 'นางสาวกันติณันท์ พิมวิเศษ', 'นายสุพัชระ แดงประดิษฐ', '', '', '', '', 'การผลิตสื่อปฏิสัมพันธ์เพื่อส่งเสริมการมองเห็นของผู้เรียนที่มีความบกพร่องทางสายตาแบบเลือนรางระดับที่ 1-2 ของระดับชั้นประถมศึกษา', 'Production of Interactive media to promote visibility for elementary school students with impaired eyesight, in the form of Level I – II Low Vision', 4, 0, '2561', 3, '1', 0, '', '1671266443_769954861.pdf', '', '', '', 42069, '2022-12-17 08:45:51'),
(1671266756, 'DM61213', 'นางสาววรรณวิมล ปัญญาใส', 'นายอรงค์กรณ์ พ่วงศิริ', '', '', '', '', 'การผลิตสื่อปฏิสัมพันธ์เพื่อจำลองพื้นที่เสมือนจริงรูปแบบ 3 มิติของมหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี', 'The Production of Interactive Media to Simulate 3D Virtual of Rajamangala University Of Technology Thanyaburi', 4, 0, '2561', 3, '1', 0, '', '1671266756_733693987.pdf', '', '', '', 42069, '2022-12-17 08:48:34'),
(1671435329, 'pt46', 'นายศราวุธ แสนหมอยา', '', '', '', '', '', 'โครงการศึกษาค่าความขาวขอกระดาษและค่าความดำของหมึกที่พิมพ์ลงบนกระดาษ เคลือบผิวและกระดาษไม่เคลือบผิวที่ใช้พิมพ์ด้วยระบบดิจิทัลออฟเซต', 'The Study whiteness and black of color to Skin Enamel paper and not Skin Enamel paper of digital offset press', 27, 0, '2549', 5, '1', 0, '', '1671435329_85483262.pdf', '', '', '', 42069, '2022-12-19 07:38:37'),
(1671435567, 'PT49', 'นางสาวพรรษา แสงขำ', 'นายศุภกร วิริยะอัครเดชา', '', '', '', '', 'PT 49 การผลิตกระดาษจากเยื่อยผสมระหว่างเปลือกทุเรียนและกระดาษที่เหลือจากการตัดเจียน', 'The parper manufacture by mixing between a durian\'s exocarp and a rest paper from trimming', 27, 0, '2549', 5, '1', 0, '', '1671435567_170192320.pdf', '', '', '', 42069, '2022-12-19 07:41:20'),
(1671436415, 'PT 49 ', 'นางสาวภุมิริน สายด้วง', '', '', '', '', '', 'การสร้างเครื่องต้นแบบเคลือบลามิเนตสำหรับสิ่งพิมพ์ระบบไม่สัมผัส', 'construction of the Prototype of Laminating for Publishing in Non Impact Printing', 26, 0, '2549', 6, '1', 0, '', '1671436415_1456571783.pdf', '', '', '', 42069, '2022-12-19 07:55:49'),
(1671436562, 'PT 49 ', 'นายภักดิ์ภูมิ เจริญลาภ', '', '', '', '', '', 'การออกแบบโปรแกรมประเมินราคาสิ่งพิมพ์ออฟเซตด้วย โปรแกรม Microsoft Excel', 'Software Design for Price Estimate of Offset Print By Microsoft Excel', 27, 0, '2549', 6, '1', 0, '', '1671436562_1296337024.pdf', '', '', '', 42069, '2022-12-19 07:57:20'),
(1671436748, 'PT 49 ', 'นางสาวกัลยาณี พัดสว่าง', '', '', '', '', '', 'การออกแบบบรรจุภัณฑ์กล่องเค้ก', 'Packaging Design For Cake Box', 62, 0, '2549', 6, '1', 0, '', '1671436748_1316994721.pdf', '', '', '', 42069, '2022-12-19 08:00:10'),
(1671436958, 'PT 49', 'นางสาวนุชติยา ดวงจำปา', '', '', '', '', '', 'การหาสารเคมีอินทรีย์เพื่อทดแทนคลอรีนมาใช้ในการล้างแม่พิมพ์สกรีน', 'TO PREPARATION DESERETE ORGANIC CHEMICAL(DOCS) FOR REPLACEMENT THE CHLORINE ACID FOR CLEANING THE MASTER PRINTING SCREEN', 63, 0, '2549', 6, '1', 0, '', '1671436958_1237461365.pdf', '', '', '', 42069, '2022-12-19 08:03:43'),
(1671437121, 'PT 50 ', 'นายธีรภัทร พันธุ์พิทย์แพทย์', 'นายอธิศ อึ้งอัจจิมากูล', '', '', '', '', 'การใช้โปรแกรมแปลภาษา กรณีศึกษาหนังสือ การพิมพ์ตามความต้องการ วิวัฒนาการในระบบดิจิตอล', 'TRANSLATOR PROGRAME CASE STUDY OF BOOK OF ON-DEMAND PRITING THE REVOLUTION IN DEGITAL AND CUSTOMIZED PRINTING', 64, 0, '2550', 6, '1', 0, '', '1671437121_2141596555.pdf', '', '', '', 42069, '2022-12-19 08:06:26'),
(1671437262, 'PT50', 'นางสาวเพ็ญนภา โอเต็ง', '', '', '', '', '', 'การผลิตหมึกพิมพ์สกรีนฐานน้ำโดยใช้ดีหมึกเป็นสารให้สีจากธรรมชาติ', 'WRITER-BASED SCREEN PRINTING INK PRODUCTION BY USIING SQUID\'S CHOLECYST BARURAL COLORANT', 65, 0, '2550', 6, '1', 0, '', '1671437262_1524027077.pdf', '', '', '', 42069, '2022-12-19 08:10:42'),
(1671437521, 'PT 50', 'นางสาวสุดารัตน์ พันธานนท์', '', '', '', '', '', 'พจนานุกรมออนไลน์ศัพท์บัญญัติวิชาการพิมพ์', 'PRINTING DICTIONARY ONLINE', 66, 0, '2550', 6, '1', 0, '', '1671437521_1568323326.pdf', '', '', '', 42069, '2022-12-19 08:13:30'),
(1671612402, 'PT52', 'นางสาวธิติรัตน์ สุภาฉิม', '', '', '', '', '', 'หมึกพิมพ์สกรีนฐานน้ำโดยใช้ยางก้านบัวเป็นสารยึดติดโดยสารให้สีได้จากธรรมชาติและนำมาสกรีนเพื่อเปรียบเทียบสารยึดติดกับยางกล้วย', 'The study on the Co,parison about the Adhesive of the Water-based Screen Ink between the Use of Lotus Stalk Gum and of Banana Gum', 62, 0, '2552', 6, '1', 0, '', '1671612402_242130585.pdf', '', '', '', 42069, '2022-12-21 08:49:18'),
(1671612651, 'PT 53', 'นายศรายุทธ โกติยะ', '', '', '', '', '', 'การออกแบบบรรจุภัณฑ์เครื่องปั้นนดินเผา กวานอาม่าน', 'Pottery pckaging Design For Kwan Ar Man', 67, 0, '2553', 6, '1', 0, '', '1671612651_1389536438.pdf', '', '', '', 42069, '2022-12-21 08:52:06'),
(1671612746, 'PT 54 ', 'นายอรรถพร มนต์ประสาธน์', '', '', '', '', '', 'การศึกษาค่าความแตกต่างขนาดเม็ดสกรีน ชนิด เอฟเอ็ม บนกระดาษเคลือบผิว', 'The study of various size of FM screening on the coated-paper', 25, 0, '2554', 6, '1', 0, '', '1671612746_1882040225.pdf', '', '', '', 42069, '2022-12-21 09:01:14'),
(1671613282, 'PT 54', 'อุษา พิมพานิตย์', '', '', '', '', '', 'การออกแบบและพัฒนาบรรจุภัณฑ์ประเภทอาหาร หมูกระจกแม่เล็ก จ.สรบุรี', 'The development and design of food packaging for \"Moo Ka Jog Mea Leg Saraburi Province\"\"', 25, 0, '2554', 6, '1', 0, '', '1671613282_130128425.pdf', '', '', '', 42069, '2022-12-21 09:03:07'),
(1671613395, 'PT 55', 'นางสาวปนัดดา อรรถจรูญ', '', '', '', '', '', 'ความคาดหวังของผู้บริโภคต่อผักและผลไม้ตัดแต่งบนบรรจุภัณฑ์สีต่าง ๆ โดยผ่านทางจอภาพชนิดต่างกัน', 'Expectation of consumers of fresh-cut fruits and vegetables n package colors hrough different types of monitors', 62, 65, '2555', 6, '1', 0, '', '1671613395_506992034.pdf', '', '', '', 42069, '2022-12-21 09:04:45'),
(1671613487, 'PT 57', 'นายอมรพันธ์ เตี้ยเตี๊ยะ', 'นายปัญธวัฒน์ กุลเจริญวรวัชร์', '', '', '', '', 'การผลิตเยื่อและบรรจุภัณฑ์จากไม้ดอกไม้ประดับ', 'Production of pulp and packaging from ornamental plants', 62, 65, '2557', 6, '1', 0, '', '1671613487_1239469662.pdf', '', '', '', 42069, '2022-12-21 09:06:28'),
(1671613591, 'PT 57', 'นายณัฐวรรธน์ ศรีสุวรรณ', 'นายศตวรรษ สุดใจ', '', '', '', '', 'ออกแบบและสร้างโมแม่แบบม่ะม่วงเพื่อผลิตบรรจุภัณฑ์กระดาษลดและป้องกันโรคแอนแทรคโนส สำหรับมะม่วงน้ำดอกไม้', 'Design and produce mango mould prototype for produce paper packaging to reduce and prevent anthracnose of Namdokmai mango', 62, 65, '2557', 6, '1', 0, '', '1671613591_948031487.pdf', '', '', '', 42069, '2022-12-21 09:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `mctarchive_pre`
--

CREATE TABLE `mctarchive_pre` (
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

--
-- Dumping data for table `mctarchive_pre`
--

INSERT INTO `mctarchive_pre` (`system_id`, `id`, `std1`, `std2`, `std3`, `std4`, `std5`, `std6`, `thainame`, `engname`, `teacher`, `co_teacher`, `sec`, `branch`, `type_doc`, `website`, `video`, `pdf`, `audio`, `yt_link`, `site_url`, `add_by`, `add_date`) VALUES
(1671454383, 'AAA000', 'ใคร คนหนึ่ง', 'คน แปลกหน้า', 'แปลกหน้า เบอร์สอง', 'แปลกหน้า เบอร์สาม', 'แปลกหน้า เบอร์สี่', 'แปลกหน้า เบอร์ห้า', 'งานอะไรสักงาน', 'Something', 6, 5, '2565', 3, '2', 0, '1671454383_676249155.mp4', '1671454383_676249155.pdf', '', '', '', 42070, '2022-12-19 13:11:32');

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
(0, 'ไม่มี', '2022-12-16', 0),
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
(57, 'อ.ธนะภูมิ สงค์ธนาพิทักษ์', '2022-12-16', 4),
(62, 'ประทุมทอง ไตรรัตน์', '2022-12-19', 6),
(63, 'อรรถพร ศิริเมธากุล', '2022-12-19', 6),
(64, 'กฤษดา กิติสาระกุลชัย', '2022-12-19', 6),
(65, 'ดร.สมพร เจรคุณาวัตน์', '2022-12-19', 6),
(66, 'นิติ วิทยาวิโรจน์', '2022-12-19', 6),
(67, 'เอกชัย โถเหลือง', '2022-12-21', 6);

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
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42073;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
  ADD CONSTRAINT `branch_idT` FOREIGN KEY (`branch`) REFERENCES `branch` (`branch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

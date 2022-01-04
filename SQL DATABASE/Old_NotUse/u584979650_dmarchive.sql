-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 09, 2021 at 02:14 PM
-- Server version: 10.4.14-MariaDB-cll-lve
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
-- Table structure for table `mctarchive`
--

CREATE TABLE `mctarchive` (
  `id` int(4) NOT NULL,
  `std1` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `std2` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `std3` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `thainame` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `engname` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `teacher` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `sec` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `website` int(1) DEFAULT NULL,
  `video` varchar(200) DEFAULT NULL,
  `pdf` varchar(200) DEFAULT NULL,
  `audio` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mctarchive`
--

INSERT INTO `mctarchive` (`id`, `std1`, `std2`, `std3`, `thainame`, `engname`, `teacher`, `sec`, `website`, `video`, `pdf`, `audio`) VALUES
(1, 'นายกิตติบูรณ์ สืบเพ็ง', 'นายศุภวิชญ์ สุขสถิตย์', 'นายสันติธร สะสม', 'การเปรียบเทียบการรับรู้ข่าวสารผ่านวิทยุออนไลน์ของนักศึกษาคณะเทคโนโลยีสื่อสารมวลชน', 'THE COMPARISON OF MASS COMMUNICATION TECHNOLOGY STUDET’S PERCEPTION VIA MCT RADIO NETWORK', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2560', 0, '', '2021_03_29 11_33 Office Lens-min.pdf', NULL),
(2, 'นายพัชระเมศฐ์ ทองสำฤทธิ์', 'นายภัทรภูมิ พันธุเอี่ยม', 'นายสหรัฐ พิมลสวัสดิ์', 'การพัฒนาแอพพลิเคชั่นเพื่อการศึกษาท่าไม้มวยท่าเสาพระยาพิชัยดาบหักโดยใช้เทคนิค Motion Capture', 'THE APPLICATION DEVERLOPMENT FOR THAI BOXING STUDY (THA SAO-PRATAPICHAI\'S BOXING) BY USING MOTION CAPTURE', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2560', 0, '', '2021_03_29 11_39 น. Office Lens-min.pdf', NULL),
(3, 'นางสาววชิรญาณ์ เอกวงษ์', 'นางสาวชฎามาศ สุพรรณภิรมย์', 'นางสาวนพาภรณ์ มั่งนิมิตร', 'การศึกษาพัฒนาแอพพลิเคชั่นแสดงข้อมูลราคาข้าวเปลือกบนระบบปฏิบัติการแอนดรอยด์', 'THE STUDY OF RICE APPLICATION DEVELOPMENT ON ANDROID OPERATING SYSTEM', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2560', 0, '', '2021_03_29 11_42 น. Office Lens-min.pdf', NULL),
(4, 'นายนัทธ์พงศ์ เณรรอด', 'นายบริบูรณ์ พรายจรูญ', 'นายอภิสิทธ์ สท้านธรนิล', 'การพัฒนาระบบบริหารจัดการวัสดุครุภัณฑ์เพื่อการผลิตสื่อกรณีศึกษาคณะเทคโนโลยีสื่อสารมวลชน', 'THE DEVELOPMENT OF CIRCULATION SERVICES MANAGEMENT FOR MEDIA PRODUCTION OF FACULTY OF MASS COMMUNICATION TECHNOLOGY', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2560', 0, '', '2021_03_29 11_46 Office Lens-min.pdf', NULL),
(5, 'นายพชรพล แสงทอง', 'นายธนดล ทรงเจริญ', '', 'การผลิตภาพยนตร์รณรงค์เรื่องการสวมหมวกนิรภัยโดยใช้เทคนิคโมชั่นกราฟฟิค', 'THE PRODUCTION OF SHORT FILM PROMOTING RIDER AWARENESS BY WEARING A HELMET', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2560', 0, '', '2021_03_29 11_49 น. Office Lens-min.pdf', NULL),
(6, 'นายอาชวินท์ ภิรมย์รัก', '', '', 'การศึกษาการสร้างแบบจำลอง 3 มิติด้วยเครื่องสแกน3 มิติเพื่อนำเสนอนิทรรศการศิลปะออนไลน์ ', 'THREE - DIMENSIONAL IMAGING FOR ONLINE ARTS EXHIBITION', 'ผศ.ดร.กัญญาณัฐ เปลวเฟื่อง', '2560', 0, '', '2021_03_29 12_18 Office Lens-min.pdf', NULL),
(7, 'นายพงศกร เรืองวงษ์', 'นายเตวิช เชาวนะ', 'นายพีรณัฐ จำเนียรกาบ', 'การแสดง Live Performance โดยใช้เทคนิค Motion Sensor กรณีศึกษางานเปิดตัวเกม Swagger', 'MOTION SENSOR TECHNOLOGICAL IMPLEMENTED FOR LIVE PERFORMANCE OF SWAGGER GAME OPENING', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2560', 0, '', '2021_03_29 12_22 น. Office Lens-min.pdf', NULL),
(8, 'นายนิธิ ธานา', 'นางสาว ปรีชานุกุล', 'นางสาวดุสิดา แสนทรัพย์', 'การศึกษาแนวทางการแก้ปัญหาการใช้งานระบบบริหารจัดการสื่อกรณีศึกษา คณะเทคโนโลยีสื่อสารมวลชน ', 'THE STUDY OF SOLUTIONS FOR USING MEDIA ASSET MANAGEMENT CASE STUDY OF FACULTY OF MASS COMMUNICATION TECHNOLOGY', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2560', 0, '', '2021_03_29 12_23 Office Lens-min.pdf', NULL),
(9, 'นายธราดล เกสรเทียน', 'นายวรากร พุ้ยน้อย', '', 'การผลิตสื่อโฆษณารณรงค์เพื่อตระหนักถึงการสูบบุหรี่ โดยใช้เทคนิค 3D และเทคนิค Mark Tracking', 'ADVERTISING CAMPAIGN TO INCREASE AWARENESS OF SMOKING BY USING 3D TECHNIQUE AND MARK TRACKING', 'อาจารย์ศักดา ส่งเจริญ', '2560', 0, '', '2021_03_29 12_35 PM Office Lens-min.pdf', NULL),
(10, 'นางสาวชิดชนก ก้อนทอง', 'นางสาวปัฐวิกรณ์ ต่อแต้ม', 'นางสาวปวรา ปฎิทัศน์', 'การพัฒนาแอปพลิเคชันวิทยุออนไลน์', 'THE DEVELOPMENT OF ONLINE RADIO APPLICATION', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2560', 0, '', '2021_03_29 12_44 น. Office Lens-min.pdf', NULL),
(11, 'นางสาวชนิภรณ์ ประดิษฐธำรงค์', 'นางสาวอลิสา สนิทใจ', 'นางสาวสุภาพร ชาญวิชิต', 'การพัฒนาเว็บไซต์แฟ้มสะสมผลงานดิจิทัลของนักศึกษาคณะเทคโนโลยีสื่อสารมวลชน ', 'THE DEVELOPMENT OF DIGITAL PORTFOLIO ARCHIVE FOR MASS COMMUNICATION TECHNOLOGY\'S STUDENT', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2560', 1, '', '2021_03_29 12_46 น. Office Lens-min.pdf', NULL),
(12, 'นายพีรพล พยุงวงค์', 'นายกวินทร์ ดวงตา', '', 'การสร้างภาพ 3 มิติ ความจริงเสริมจริงบนโทรศัพท์มือถือเพื่อการเลือกซื้อเฟอร์นิเจอร์ออนไลน์', '3D Dimension Augmented Reality On Smartphone For Buying Furniture Online', 'ผศ.ดร.กัญญาณัฐ เปลวเฟื่อง', '2561', 0, '', '2021_03_29 12_42 PM Office Lens.pdf', NULL),
(13, 'นายณัฐพล สุดแดง', 'นายพีรวิชญ์ ไชยยะ', 'นางสาวธัญชนก สุวรรณรัต', 'ภาพยนต์สั้น 4 มิติแบบทางเลือก', '4D INTERACTIVE MOVIE', 'อาจารย์ศักดา ส่งเจริญ', '2561', 0, '', '2021_03_29 12_40 PM Office Lens.pdf', NULL),
(14, 'นางสาวธิดาวรรณ ลอดภัย', 'นางสาวศิยาทร ทองสุข', 'นางสาวอัญณิการ์ แพรสกุล', 'การสร้างสื่อการนำเสนอประวัติศาสตร์โบราณสถานปราสาทพิมาย  โดยใช้เทคนิค Projection Mapping', 'THE CREATE MEDIA FOR PRESENTING HISTORY OF PHIMAI HISTORICAL PARK BY USING PROJECTION MAPPING TECHNIQUE', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2561', 0, 'Com_ปราสาทพิมาย Projection Mapping.mp4', '2021_03_29 12_39 PM Office Lens.pdf', NULL),
(15, 'นายศรัณยู ช่างปรุง', 'นายชุมพร ดำหมึก', 'นายภูวดล เปรมปรง', 'การนำเสนอโบรชัวร์ของวัดพระศรีรัตนศาสดารามด้วยเทคโนโลยี AR', 'Presenting Brochures Of The Emerald Buddha Temple With AR Technology', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2561', 0, '', '2021_03_29 12_36 PM Office Lens.pdf', NULL),
(16, 'นางสาวณิชมน อนันตธนรัตน์', 'นางสาวมานิตา ศรีสัจจะกุล', 'นางสาวคันธมาลี สีสุทร', 'การศึกษากระบวนการแสดงด้านดาราศาสตร์โดยใช้เทคนิคโปรเจคชั่นแมพปิ้งบนโดมแบบถอดประกอบและระบบเสียง 5.1', 'Mobile Projection Mapping Planetarium Dome With 5.1 Surround Sound', 'อาจารย์ศักดา ส่งเจริญ', '2561', 0, '', '2021_03_29 12_18 PM Office Lens.pdf', NULL),
(17, 'นางสาวชลธิชา นิ่มคำศรี', 'นายไตรภูมิ พรพัฒน์', '', 'การพัฒนาเว็บแอปพลิเคชันเพื่อศึกษาการเลือกสีข้าวพร้อมอาหารของผู้สูงอายุในจังหวัดปทุมธานี', 'Web Application Development to Study The Behavior of Rice Color With Food of The Elderly People in Pathumthani', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2561', 0, '', '2021_03_29 12_15 PM Office Lens.pdf', NULL),
(18, 'นายชัยไมตรี นกฉลาด', 'นางสาวสุพาพร งามสม', 'นายพลพันธุ์ ขันตี', 'การถ่ายทำภาพยนตร์เสมือนจริงแนวสยองขวัญโดยใช้เทคนิคกล้อง 360 องศา', 'THE STUDY OF IMMERSIVE HORROR MOVIES BY USING 360 CAMERA TECHNIQUE', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2562', 0, 'com4k_20.mp4', '2021_03_29 12_10 PM Office Lens.pdf', NULL),
(19, 'นางสาวอรปรียา พงษ์เผือก', 'นางสาวสุธินันท์ สิงห์บุบผา', '', 'การสร้างสื่อเสมือนจริง เรื่อง ระบบสุริยะ', 'Virtual Reality for Solar System', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2561', 0, 'SolarSystem.mp4', '2021_03_29 12_06 PM Office Lens.pdf', NULL),
(20, 'นางสาวอรวรรณ พวงสำเภา', 'นายศรัณ ดวงอุปมา', '', 'การใช้สื่อเหมือนจริงเพื่อฝึกพูดในที่สาธารณะ', 'VIRTUAL REALITY APPLICATION AS A TOOL FOR PUBLIC SPEAKING PRACTIC', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2561', 0, 'Public_Speaking_Simulator.mp4', '2021_03_29 12_03 PM Office Lens.pdf', NULL),
(21, 'นางสาวมนธิดา กุยรัมย์', 'นางสาววรรณภา ช้างแก้วมณี', 'นางสาวมณฑิชา ไตรรัตน์แสง', 'การสร้างแผนที่เพื่อแสดงแอนิเมชั่นด้วยภาพ 2 มิติเสมือน 3 มิติผ่านเทคโนโลยี Augmented Reality', '2D VIRTUAL 3D MAP VIA DEVLOPMENT AUGMENTED REALITY TECHNOLOGY', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2561', 0, 'allinone.mp4', '2021_03_29 11_57 AM Office Lens.pdf', NULL),
(22, 'นายสิทธิเดช เบ็ญกูล', 'นายชินพร อัมราภิบาล', '', 'การสร้างเสียงดนตรีบำบัดสำหรับหรับคนที่นอนหลับยากด้วยเทคนิคเสียงสังเคราะห์', 'Synthesis Sound for Sleeping', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2561', 0, '', '2021_03_29 11_54 AM Office Lens.pdf', 'Mixdown_123.mp3'),
(23, 'นางสาวกันติณันท์ พิมวิเศษ', 'นายสุพัชระ แดงประดิษฐ', '', 'การผลิตสื่อปฏิสัมพันธ์เพื่อส่งเสริมการมองเห็นของผู้เรียนที่มีความบกพร่องทางสายตาแบบเลือนรางระดับที่ 1-2 ของระดับชั้นประถมศึกษา', 'Production of Interactive media to promote visibility for elementary school students with impaired eyesight, in the form of Level I – II Low Vision', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2561', 0, '', '2021_03_29 11_51 AM Office Lens.pdf', NULL),
(24, 'นางสาวจิรภิญญา ไชยวงษ์', 'นางสาวธัญญลักษณ์ ระรื่น', '', 'การผลิตสื่อปฏิสัมพันธ์โดยใช้สถานการณ์จำลองสำหรับการฝึกปฐมพยาบาลยื้อชีวิตเบื้องต้น', 'DEVELOPMENT OF INTERACTIVE MEDIA PRODUCTION FOR BASIC CPR TRAINING', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2561', 0, 'การช่วยชีวิตขั้นพื้นฐานหรือ CPR.mp4', '2021_03_29 11_38 AM Office Lens.pdf', NULL),
(25, 'นางสาววรรณวิมล ปัญญาใส', 'นายอรงค์กรณ์ พ่วงศิริ', '', 'การผลิตสื่อปฏิสัมพันธ์เพื่อจำลองพื้นที่เสมือนจริงรูปแบบ 3 มิติของมหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี', 'The Production of Interactive Media to Simulate 3D Virtual of Rajamangala University Of Technology Thanyaburi', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2561', 1, '', '2021_03_29 11_35 AM Office Lens.pdf', NULL),
(26, 'นายชญานนท์  ปุ่นวัฒน์', 'นายฐิติวัฒน์  เกิดสว่าง', '', 'การสร้างสื่อโมชันกราฟิกแบบมีปฏิสัมพันธ์เพื่อส่งเสริมทักษะการเขียนพยัญชนะภาษาไทยสำหรับพัฒนาการช้า (เด็ก LD)', 'Creating interactive graphics media to promote Thai alphabet writing skills for LD students', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2561', 0, '44points.mp4', '2021_03_29 11_32 AM Office Lens.pdf', NULL),
(27, 'นางสาวชริดา เสนา', 'นายภาณุวัฒน์ แจ่มรุจี', 'นายสกาย แสงสุระ', 'การออกแบบและพัฒนาระบบยืมคืนครุภัณฑ์การจัดแสงสำหรับงานผลิตสื่อ', 'DESIGN AND DEVELOPMENT OF RETRIEVAL SYSTEM FOR MEDIA PRODUCTION LIGHTING EQUIPMENT', 'อาจารย์ชิรพงษ์ ญานุชิตร', '2561', 1, '', '2021_03_29 11_42 Office Lens.pdf', NULL),
(28, 'นางสาวชาณิดา สีดาว', 'นายจิรายุ สาทอง', 'นางสาวศศินา มาลา', 'การศึกษาการสร้างลวดลายบนพื้นผิวรถยนต์ด้วยเทคนิค 3D Projection Mapping', 'THE STUDY OF CAR\'S TEXTURE SIMULATION BY USING 3D PROJECTION MAPPING TECHNIQUES', 'อาจารย์ศักดา ส่งเจริญ', '2561', 0, 'carmap_com.mp4', '2021_03_29 11_40 Office Lens.pdf', NULL),
(29, 'นายภธรเดช ปิติโชคเดชอุดม', 'นายพีรพล เฉยภิรมย์', '', 'การผลิตสื่อวีดิทัศน์สำหรับประชาสัมพันธ์ศูนย์ฝึกงานการโรงแรมราชบงกชโดยใช้เทคนิค HDR Video บนเว็บไซต์', 'THE VIDEO PRODUCTIONTO PRESENT RAJABONGKOD HOTEL TRAINING CENTER WITH HDR VIDEO TECHNIQUE ON WEBSITE', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2561', 1, 'Final_Rajabongkod_HDRVideo.mp4', '2021_03_29 11_49 Office Lens.pdf', NULL),
(30, 'นายชินกฤต ต้องทรัพย์', 'นายธนากร อรรถกรวิกรัย', 'นายกรองเทพ โตสกุล', 'การนำเสนอแฟชั่นสมัยใหม่ โดยใช้เทคโนโลยี 3D Projection Mapping', 'MODERN FASHION SHOW USING 3D PROJECTION MAPPING TECHNIQUES', 'ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2561', 0, 'com3D Projection Mapping.mp4', '2021_03_29 11_51 Office Lens.pdf', NULL),
(31, 'นางสาวณัฐวรา โสปิยะ', 'นายปิยะ เฟื่องภักดี', '', 'การผลิตสื่อรายการข่าวเพื่อให้ความรู้เกี่ยวกับแผ่นดินไหวโดยใช้เทคนิคอิมเมอร์ซีฟกราฟิก', 'THE PRODUCTION OF NEWS FOR GIVING EARTHQUAKE KNOWLEDGE USING IMMERSIVE GRAPHIC TECHNIQUE', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2561', 0, 'com00-news.mp4', '2021_03_29 11_46 น. Office Lens.pdf', NULL),
(32, 'นายพันธกานต์ โพธิ์ไทรย์', 'นายวีรพงษ์ บัวฉ่ำ', '', 'ดนตรีดิจิทัลผสานเสียงธรรมชาติเพื่อการนอนหลับ', 'Digital Music Composition with Selective Natural Ambient Sampling for Sleeping with ease', 'อาจารย์ศักดา ส่งเจริญ', '2561', 0, '', '2021_03_29 11_56 น. Office Lens.pdf', 'Mixdown_sec_water.mp3'),
(33, 'นายกุลิสร์ สังฆมิตกล', 'นายกัณภัค วิสุทธิมรรค', '', 'การศึกษาความแตกต่างของ BIT DEPTH ของสื่อประชาสัมพันธ์สถานที่ท่องเที่ยวจังหวัดเพชรบูรณ์ ด้วยเทคนิค TIME LAPSE', 'THE STUDY BIT DEPTH DIFFERENCE OF ADVERTISING MEDIA TO PROMOTE TOURIST PLACE IN PHETCHABUN PROVINCE BY USING TIME LAPSE TECHNIQUE', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2561', 0, 'com_1.mp4', '2021_03_29 11_57 Office Lens.pdf', NULL),
(34, 'นายวิริยะ โตเหมือน', 'นายกิตติพล แก้วแกว่งกวาย', '', 'การผลิตสื่อปฏิสัมพันธ์รูปแบบ 3 มิติจำลองสถานที่พุทธคยาจำลอง วัดปัญญานันทาราม บนเว็บไซต์', 'PRODUCTION OF BODH GAYA MODEL 3D INTERACTIVE PANYANANTHARAM TEMPLE ON WEBSITE', 'ผศ.ดร.กัญญาณัฐ เปลวเฟื่อง', '2561', 1, NULL, '2021_03_29 12_14 Office Lens.pdf', NULL),
(35, 'นายจิตตภัทร ปะมะโต', 'นายวิโรจน์ ตั้งประสิทธิ์', 'นายสมเดช คำหม่อม', 'การพัฒนาสื่อในรูปแบบวิดีโอเกม 3 มิติ ด้วยโปรแกรม Unreal Engine', 'DEVELOPMENT MEDIA OF A 3D GAME WITH PROGRAM UNREAL ENGINE', 'ผศ.ดร.กัญญาณัฐ เปลวเฟื่อง', '2561', 0, '', '2021_03_29 12_47 Office Lens.pdf', NULL),
(36, 'นาวสาวปัจรัตน์ ศิลปกอบ', 'นางสาวณัชชา พูลโภคา', 'นางสาววรนุช สง่างาม', 'การสร้างสื่อเพื่อส่งเสริมการเรียนรู้ด้านการสื่อความหมายและการรับรู้ความหมายเพื่อฝึกทักษะการดำรงชีวิตสำหรับเด็กออทิสติก กรณีศึกษา ศูนย์การศึกษาพิเศษประจำจังหวัดปทุมธานี', 'CREATING MEDIA TO SIMULATION COMMUNICATION AND AWARENESS FOR PRACTICAL SKILLS OF LIVING IN AUTISTIC MIDDLE-AGED CHILDREN STUDY CASE OF PATHUM THANI SPECIAL EDUCATION CENTER', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2562', 0, '', '2021_03_29 13_36 Office Lens-min.pdf', NULL),
(37, 'นางสาวนนทวรรณ แสงอรุณฉาย', 'นางสาวปวีณรัตน์ ศรัทธาธรรม', 'นางสาวปวีณรัตน์ ศรัทธาธรรม', 'การสร้างเกมใช้คำผิดและคำถูกในภาษาไทย สำหรับเด็กชั้นประถมศึกษาปีที่ 2', 'THE CREATION OF GAME FOR TEACHING PRIMARY 2 STUDENTSABOUT MISSPELLING WORDS AND CORRECT SPELLING WORDS IN THAI', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2562', 1, '', '2021_03_29 13_38 Office Lens-min.pdf', NULL),
(38, 'นางสาวปฏิภาภรณ์ คุ้มทอง', 'นางสาวจารุภา เกียรติพงษ์', '', 'การสร้างระบบสืบค้นล่ามภาษามืออิเล็กทรอนิกส์เพื่อการติดต่อสื่อสารในรูปแบบตัวละครสามมิติ', 'CREATING THE SEARCH ENGINE SYSTEM FOR THE ELECTRONIC SIGN LANGUAGE INTERPRETER IN THE FORM OF THREE-DIMENSIONAL CHARACTERS', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2562', 0, '', '2021_03_29 13_44 น. Office Lens-min.pdf', NULL),
(39, 'นายปิยะภัทร ศรีเพ็ชร', 'นายเอกชัย คำอ่อง', 'นางสาวนฤมล ฉ่ำนารายณ์', 'การผลิตสื่อโฆษณาเพื่อโปรโมทหลักสูตรเทคโนโลยีสื่อดิจิทัล', 'THE PRODUCTION ADVERTISING MEDIA FOR PROMOTE DIGITAL MEDIA CURRICULUM', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2562', 0, '', '2021_03_29 13_45 Office Lens-min.pdf', NULL),
(40, 'นายภูมิชญา ภู่ระหงษ์', 'นายสืบสกุล นิยม', '', 'การสร้างปฏิทินวันสำคัญทางสิ่งแวดล้อมด้วยเทคนิคภาพเสมือนจริงในรูปแบบโมชันกราฟิก', 'PRODUCTION OF ENVIRONMENT DAY CALENDAR FOR AUGMENTED REALITY WITH MOTION GRAPHIC', 'ผศ.ดร.กัญญาณัฐ เปลวเฟื่อง', '2561', 0, 'lovesekai.mp4', '2021_03_29 12_00 น. Office Lens.pdf', NULL),
(41, 'นายธัญพิสิษฐ์ เพชรคงทอง', 'นายเกริกพล พวงมณี', '', 'การถ่ายทำสารคดีท่องเที่ยวโดยใช้อุปกรณ์ Wiral Lite', 'The Production of Travel Documentary Using Wiral Lite Device', 'อาจารย์ธีรศานต์ ไหลหลั่ง', '2561', 0, 'com_Final Gopro Project.mp4', '2021_03_29 12_17 น. Office Lens.pdf', NULL),
(42, 'นายพงศ์พิสุทธิ์ สวยรูป', 'นางสาวคู่ชนารถ บุญสุวรรณ', '', 'การพัฒนาเว็บไซต์ส่งเสริมการเข้าถึงกิจกรรมในรูปแบบดิจิทัลเพื่อส่งเสริมการท่องเที่ยวเชิงนิเวศ กรณีศึกษา : สวนเกษตรอินทรีย์สวนฟุ้งขจร', 'THE DEVELOPMENT OF A WEBSITE TO SUPPORT DIGITAL MEDIA ACTIVITIES FOR ECOTOURISM CASE STUDY OF \"SUAN FUNG KHA JORN\" ORGANIC FARMING', 'ผศ.ดร.กัญญาณัฐ เปลวเฟื่อง', '2562', 0, '', '2021_03_29 13_47 น. Office Lens-min.pdf', NULL),
(43, 'นางสาวขนิษฐา ลาดเสน', 'นางสาวกันตินันท์ น้อยทรงค์', '', 'การผลิตสื่อภาพเสมือนจริง 3 มิติเพื่อนำเข้าสู่บทเรียนรายวิชา สังคม เรื่อง \"ภูมิศาสตร์ของประเทศไทย\" ของช่วงชั้นประถมศึกษาปีที่ 4 - 6 (ประถมศึกษาตอนปลาย)', 'PRODUCTION OF AUGMENTED REALITY TO PREPARE LEARNING OF SOCIAL STUDIES FOR ELEMENTARY STUDENT (GRADE 4 - 6)', 'ผศ.ดร.กัญญาณัฐ เปลวเฟื่อง', '2561', 0, '', '2021_03_29 12_26 น. Office Lens.pdf', NULL),
(44, 'waiting for data', '', '', 'waiting for data', 'waiting for data', 'ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2563', 1, '', '01 แสงและคลื่นแม่เหล็กไฟฟ้า.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `level`) VALUES
('admin', 'admin', 'ADMIN'),
('meenthaisub123', 'meenthaisub123', 'ADMIN'),
('pure3000thb', 'pure3000thb', 'ADMIN'),
('yaimakmak', 'yaimakmak', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`name`, `date`) VALUES
('ดร.จิรัฐ มัธยมนันทน์', '2021-04-21'),
('ผศ.ดร.กัญญาณัฐ เปลวเฟื่อง', '2021-04-21'),
('ผู้ช่วยศาสตราจารย์วรรณชนก สุนทร', '2021-04-21'),
('ผู้ช่วยศาสตราจารย์สุพรรณิการ์ ย่องซื่อ', '2021-04-21'),
('อาจารย์ชิรพงษ์ ญานุชิตร', '2021-04-21'),
('อาจารย์ธีรศานต์ ไหลหลั่ง', '2021-04-21'),
('อาจารย์ศักดา ส่งเจริญ', '2021-04-23');

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
-- Indexes for table `mctarchive`
--
ALTER TABLE `mctarchive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mctarchive`
--
ALTER TABLE `mctarchive`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

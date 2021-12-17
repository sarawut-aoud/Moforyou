-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 01:55 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_moforyou`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_species`
--

CREATE TABLE `tbl_species` (
  `id` tinyint(4) NOT NULL COMMENT 'รหัสสายพันธุ์',
  `spec_name` varchar(100) NOT NULL COMMENT 'ชื่อสายพันธุ์',
  `spec_detail` varchar(300) NOT NULL COMMENT 'รายละเอียดสายพันธุ์',
  `spec_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_species`
--

INSERT INTO `tbl_species` (`id`, `spec_name`, `spec_detail`, `spec_pic`) VALUES
(1, 'โคพื้นเมือง ', 'โคพื้นเมืองของไทยมีลักษณะใกล้เคียงกับโคพื้นเมืองของประเทศเพื่อนบ้านในแถบเอเชีย ลักษณะรูปร่างกระทัดรัด ลำตัวเล็ก ขาเรียวเล็ก ยาว เพศผู้มีหนอกขนาดเล็ก มีเหนียงคอ แต่ไม่หย่อนยานมาก \r\nหูเล็ก หนังใต้ท้องเรียบ มีสีไม่แน่นอน เช่น สีแดงอ่อน เหลืองอ่อน ดำ ขาวนวล น้ำตาลอ่อน และอาจมีสีประรวมอยู่ด้วย เพศผู้โตเต', 'https://i0.wp.com/breeding.dld.go.th/biodiversity/new%20elearning/native%20cow_clip_image002_0001.jpg?w=960'),
(2, 'โคพันธุ์บราห์มัน', 'มีต้นกำเนิดในประเทศอินเดีย แต่ถูกปรับปรุงพันธุ์ที่ประเทศสหรัฐอเมริกา โคพันธุ์นี้ที่เลี้ยงในบ้านเราส่วนใหญ่นำเข้ามาจากสหรัฐอเมริกา และ ออสเตรเลีย แล้วนำมาคัดเลือกปรับปรุงพันธุ์โดยกรมปศุสัตว์และฟาร์มของเกษตรกรรายใหญ่ในประเทศ เป็นโคที่มีขนาดค่อนข้างใหญ่ ลำตัวกว้าง ยาว และลึก ได้สัดส่วน หลังตรง หนอกใหญ่', 'https://i0.wp.com/www.pornchaiinter.com/Image_s/19-5.jpg?w=960'),
(4, 'โคพันธุ์ซิมเมนทัล ', 'มีถิ่นกำเนิดในประเทศสวิสเซอร์แลนด์ นิยมเลี้ยงกันในประเทศยุโรป ในเยอรมันเรียกว่าพันธุ์เฟลคฟี (Fleckvieh) ได้รับการปรับปรุงพันธุ์เป็นโคกึ่งเนื้อกึ่งนม ในประเทศสหรัฐอเมริกานำไปคัดเลือกปรับปรุงพันธุ์ให้เป็นโคเนื้อ ลำตัวมีสีน้ำตาลหรือแดงเข้มไปจนถึงสีฟางหรือเหลืองทองและมีสีขาวกระจายแทรกทั่วไป หน้าขาว ท้อง', ''),
(9, 'โคพันธุ์ตาก ', 'เป็นโคลูกผสมระหว่างพันธุ์ชาร์โรเล่ส์กับพันธุ์บราห์มัน โดยกรมปศุสัตว์ได้มอบหมายให้ศูนย์วิจัยและบำรุงพันธุ์สัตว์ตาก ทำการคัดเลือกและปรับปรุงพันธุ์ให้เป็นโคเนื้อพันธุ์ใหม่ที่โตเร็ว เนื้อนุ่ม เพื่อทดแทนการนำเข้าพันธุ์โคและะเนื้อโคคุณภาพดีจากต่างประเทศ', 'https://i0.wp.com/breeding.dld.go.th/th/images/pic/Tak22.jpg?w=960'),
(10, 'โคพันธุ์กำแพงแสน ', 'เป็นโคพันธุ์ใหม่ปรับปรุงพันธุ์โดยมหาวิทยาลัยเกษตรศาสตร์ วิทยาเขตกำแพงแสน โดยใช้พันธุ์ชาร์โรเล่ส์กับบราห์มัน คล้ายกับโคพันธุ์ตาก แต่โคพันธุ์กำแพงแสนเริ่มต้นปรับปรุงพันธุ์จากโคพื้นเมือง โคพันธุ์กำแพงแสนมีสายเลือด 25% พื้นเมือง 25% บราห์มัน และ 50% ชาร์โรเล่ส์ ส่วนลักษณะและคุณสมบัติต่างๆ คล้ายกับโคพันธ', 'https://i0.wp.com/www.technologychaoban.com/wp-content/uploads/2019/02/Ko-3-696x464.jpg?resize=696%2C464&ssl=1'),
(11, 'โคพันธุ์ฮินดูบราซิล ', 'เป็นโคที่มีเชื้อสายโคอินเดียเช่นเดียวกับโคบราห์มัน แต่ปรับปรุงพันธุ์ที่ประเทศบราซิล สีมีตั้งแต่สีขาวจนถึงสีเทาเกือบดำ สีแดง แดงเรื่อๆ หรือแดงจุดขาว หน้าผากโหนกกว้างค่อนข้างยาว หูมีขนาดกว้างปานกลางและห้อยยาวมาก ปลายใบหูมักจะบิด เขาแข็งแรงมักจะเอนไปด้านหลัง หนอกมีขนาดใหญ่ ผิวหนังและเหนียงหย่อนยานมาก เ', 'https://i0.wp.com/sites.google.com/site/tnphyung/_/rsrc/1486624797959/waw-bra-si/Rsiamindu21074.jpg?w=960&ssl=1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_species`
--
ALTER TABLE `tbl_species`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_species`
--
ALTER TABLE `tbl_species`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสายพันธุ์', AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

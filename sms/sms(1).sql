-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 16, 2018 at 04:55 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL,
  `passwd` varchar(30) NOT NULL,
  `token` varchar(10) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `passwd`, `token`, `mobile`) VALUES
(1, 'admin', 'admin', '', '7501629082');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

DROP TABLE IF EXISTS `batch`;
CREATE TABLE IF NOT EXISTS `batch` (
  `bid` int(10) NOT NULL AUTO_INCREMENT,
  `time` time NOT NULL,
  `day` varchar(10) NOT NULL,
  `cid` int(10) NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`bid`, `time`, `day`, `cid`) VALUES
(46, '23:00:00', 'Sunday', 19),
(47, '01:30:00', 'Wenesday', 22),
(48, '03:00:00', 'Friday', 19),
(49, '12:00:00', 'Sunday', 19),
(50, '07:30:00', 'Thrusday', 23),
(51, '05:30:00', 'Thrusday', 24),
(52, '05:30:00', 'Monday', 22),
(53, '14:00:00', 'Saturday', 18),
(54, '01:59:00', 'Thrusday', 24),
(55, '23:01:00', 'Tuesday', 18);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `course_name` char(30) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `course_fees` decimal(50,0) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `course_name`, `duration`, `course_fees`) VALUES
(18, 'dtp', '12', '30000'),
(19, 'tally', '6 ', '2500'),
(21, 'photoshop', '6 ', '2050'),
(22, 'ms office', '6 ', '2000'),
(23, 'cca', '6 ', '2500'),
(24, 'web devolop', '12 ', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `fees_type`
--

DROP TABLE IF EXISTS `fees_type`;
CREATE TABLE IF NOT EXISTS `fees_type` (
  `fees_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `fees_type` varchar(20) NOT NULL,
  PRIMARY KEY (`fees_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees_type`
--

INSERT INTO `fees_type` (`fees_type_id`, `fees_type`) VALUES
(5, 'admission'),
(6, 'tuition'),
(7, 'exam'),
(8, 'others');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `sid` int(6) NOT NULL AUTO_INCREMENT,
  `stu_id` varchar(10) NOT NULL,
  `stu_name` varchar(25) NOT NULL,
  `Gur _name` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `aadhar` varchar(20) NOT NULL,
  `gender` char(10) NOT NULL,
  `caste` char(10) NOT NULL,
  `edu_qua` char(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `batch_id` int(10) NOT NULL,
  `photo` varchar(350) NOT NULL,
  `certificate_issue` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`sid`),
  KEY `batch_id` (`batch_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `stu_id`, `stu_name`, `Gur _name`, `address`, `mobile`, `dob`, `aadhar`, `gender`, `caste`, `edu_qua`, `course_id`, `batch_id`, `photo`, `certificate_issue`) VALUES
(34, 'S1', 'Mou Das', 'arabinda das', 'ramgopal sen street,dhaka para ,santipur,westbengal pin 741404', '9614312162', '1990-06-20', '123456789121', 'Female', 'General', 'graduate', 24, 50, 'student_img/photo0046_001_001.jpg', NULL),
(35, 'S35', 'Mampi kundu', 'Nitananda kundu', 'ranaghat nadia wb -741404', '9046223280', '1990-10-20', '235789641235', 'Female', 'Others', 'graduate', 21, 51, 'student_img/Me.JPG', NULL),
(36, 'S36', 'kamal kundu', 'Dip chand kundu', 'barabazar street santipur nadia wb pin-741404', '7501629082', '1986-07-20', '12345544566', 'Male', 'OBC', 'graduate', 24, 51, 'student_img/kamalpic.jpg', NULL),
(38, 'S37', 'SOURAV DAS', 'MONORANJAN DAS', 'SUTRAGARH,SANTIPUR', '9614312162', '1989-07-19', '123456789121', 'Male', 'OBC', 'graduate', 21, 51, 'student_img/1 copy.jpg', NULL),
(39, 'S39', 'amit kundu', 'Dip chand kundu', 'SDFGD', '9614312162', '1988-12-05', '123456789121', 'Male', 'General', 'graduate', 19, 51, 'student_img/amit1 copy.jpg', 'no'),
(40, 'S40', 'pocus saha', 'f das', 'gfh', '8250556320', '2018-08-03', '325622', 'Male', 'General', 'g', 21, 51, 'student_img/WIN_20180819_23_26_51_Pro.jpg', '123456789'),
(41, 'S41', 'raja pal', 'rahul pal', 'dhaka para santipur', '9046223280', '2018-09-11', '00000000', 'Male', 'General', 'g', 23, 46, 'student_img/IMG_20180822_145640.jpg', '000000000'),
(42, 'S42', 'raima sen', 'aparna sen', 'kuthir para santipur', '9046223280', '2018-09-11', '00000000', 'Female', 'OBC', 'g', 22, 47, 'student_img/IMG_20180822_013331.jpg', NULL),
(43, 'S43', 'KOUSHIK', 'KOUSHIK', 'L.K.MOITRA ROAD', '9563061158', '1991-05-18', '426715072718', 'Male', 'SC/ST', 'BTECH', 18, 55, 'student_img/IMG_20180822_145640.jpg', '000000000'),
(44, 'S44', 'rajesh basak', 'rahul basak', 'saragarh,santipur', '7501629082', '2007-11-25', '11111111', 'Male', 'General', 'BTECH', 22, 47, 'student_img/IMG_20180822_145733.jpg', NULL),
(45, 'S45', 'gour nanday', 'rahul pal', 'ggg', '7501629082', '2018-11-15', '00000000', 'Male', 'General', 'BTECH', 24, 51, 'student_img/IMG_20180822_145739.jpg', NULL),
(46, 'S46', 'KOUSHIK', 'rahul pal', 'gggg', '7501629082', '2018-11-13', '11111111', 'Male', 'General', 'BTECH', 19, 46, 'student_img/IMG_20180822_145640.jpg', NULL),
(47, 'S47', 'kamal kundu', 'f das', 'dg', '7501629082', '2018-11-13', '00000000', 'Male', 'General', 'BTECH', 23, 50, 'student_img/IMG_20180822_145640.jpg', NULL),
(48, 'S48', 'kamal kundu', 'f das', 'dg', '7501629082', '2018-11-13', '00000000', 'Male', 'General', 'BTECH', 23, 50, 'student_img/IMG_20180402_121057.jpg', NULL),
(49, 'S49', 'gour kundu', 'f das', 'ss', '7501629082', '2018-11-24', '426715072718', 'Male', 'General', 'g', 24, 51, 'student_img/IMG_20180301_103620.jpg', NULL);

--
-- Triggers `student`
--
DROP TRIGGER IF EXISTS `student_id_trigger`;
DELIMITER $$
CREATE TRIGGER `student_id_trigger` BEFORE INSERT ON `student` FOR EACH ROW SET NEW.stu_id = 
  CONCAT("S",COALESCE((SELECT MAX(sid)+1 from student),1))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `txn_id` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` decimal(5,0) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` year(4) NOT NULL,
  `fees_for` int(11) NOT NULL,
  `sid` int(6) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `sid` (`sid`),
  KEY `fees_for` (`fees_for`)
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `txn_id`, `date`, `amount`, `month`, `year`, `fees_for`, `sid`) VALUES
(182, 'T1', '2018-09-06 22:25:07', '201', 'January', 2018, 6, 36),
(183, 'T183', '2018-09-06 22:25:53', '201', 'January', 2018, 6, 40),
(184, 'T184', '2018-09-06 22:26:27', '201', 'June', 2018, 6, 38),
(185, 'T185', '2018-09-06 22:27:07', '201', 'February', 2018, 5, 34),
(186, 'T186', '2018-09-06 22:31:13', '201', 'December', 2018, 6, 40),
(187, 'T187', '2018-09-06 22:33:46', '201', 'February', 2015, 6, 36),
(188, 'T188', '2018-09-06 22:35:55', '1001', 'February', 2015, 5, 36),
(189, 'T189', '2018-09-08 23:22:43', '1001', 'April', 2018, 7, 36),
(190, 'T190', '2018-09-08 23:46:01', '1001', 'April', 2018, 7, 36),
(191, 'T191', '2018-09-09 00:07:08', '1001', 'April', 2018, 7, 36),
(192, 'T192', '2018-09-09 00:13:53', '10012', 'April', 2018, 7, 36),
(193, 'T193', '2018-09-09 00:15:09', '10012', 'April', 2018, 7, 36),
(194, 'T194', '2018-09-09 00:16:02', '10012', 'April', 2018, 7, 36),
(195, 'T195', '2018-09-10 23:52:09', '201', 'September', 2018, 6, 36),
(196, 'T196', '2018-09-11 00:18:45', '201', 'September', 2018, 6, 36),
(197, 'T197', '2018-09-11 00:28:26', '201', 'September', 2018, 6, 36),
(198, 'T198', '2018-09-11 00:30:59', '201', 'January', 2018, 8, 36),
(199, 'T199', '2018-09-11 00:32:49', '201', 'January', 2018, 8, 36),
(200, 'T200', '2018-09-11 00:33:42', '201', 'January', 2018, 8, 36),
(201, 'T201', '2018-09-11 00:53:32', '500', 'February', 2018, 8, 36),
(202, 'T202', '2018-09-11 00:56:19', '500', 'February', 2018, 8, 36),
(203, 'T203', '2018-09-11 01:47:55', '500', 'February', 2018, 8, 36),
(204, 'T204', '2018-09-11 01:49:29', '500', 'February', 2018, 8, 36),
(205, 'T205', '2018-09-11 01:52:01', '500', 'February', 2018, 8, 36),
(206, 'T206', '2018-09-11 01:52:49', '500', 'February', 2018, 8, 36),
(207, 'T207', '2018-09-11 01:53:43', '500', 'February', 2018, 8, 36),
(208, 'T208', '2018-09-11 01:55:53', '500', 'February', 2018, 8, 36),
(209, 'T209', '2018-09-11 01:57:42', '500', 'February', 2018, 8, 36),
(210, 'T210', '2018-09-11 01:58:41', '500', 'February', 2018, 8, 36),
(211, 'T211', '2018-09-11 01:59:17', '500', 'February', 2018, 8, 36),
(212, 'T212', '2018-09-11 02:00:13', '500', 'February', 2018, 8, 36),
(213, 'T213', '2018-09-11 02:02:46', '500', 'February', 2018, 8, 36),
(214, 'T214', '2018-09-11 02:03:46', '500', 'February', 2018, 8, 36),
(215, 'T215', '2018-09-11 02:03:52', '500', 'February', 2018, 8, 36),
(216, 'T216', '2018-09-11 02:04:13', '500', 'February', 2018, 8, 36),
(217, 'T217', '2018-09-11 02:06:08', '500', 'February', 2018, 8, 36),
(218, 'T218', '2018-09-11 02:08:34', '500', 'February', 2018, 8, 36),
(219, 'T219', '2018-09-11 02:09:30', '500', 'February', 2018, 8, 36),
(220, 'T220', '2018-09-11 02:09:50', '500', 'February', 2018, 8, 36),
(221, 'T221', '2018-09-11 02:10:47', '500', 'February', 2018, 8, 36),
(222, 'T222', '2018-09-11 02:11:45', '500', 'February', 2018, 8, 36),
(223, 'T223', '2018-09-11 02:12:44', '500', 'February', 2018, 8, 36),
(224, 'T224', '2018-09-11 02:13:21', '500', 'February', 2018, 8, 36),
(225, 'T225', '2018-09-11 02:14:04', '500', 'February', 2018, 8, 36),
(226, 'T226', '2018-09-11 13:44:31', '201', 'September', 2018, 6, 40),
(227, 'T227', '2018-09-11 13:45:49', '201', 'September', 2018, 6, 40),
(228, 'T228', '2018-09-11 13:46:28', '201', 'November', 2016, 5, 36),
(229, 'T229', '2018-09-15 22:59:38', '201', 'March', 2016, 6, 36),
(230, 'T230', '2018-09-23 21:43:01', '500', 'March', 2018, 6, 36),
(231, 'T231', '2018-09-25 00:52:12', '1001', 'March', 2017, 5, 36),
(232, 'T232', '2018-09-25 00:55:25', '500', 'April', 2017, 6, 36),
(233, 'T233', '2018-10-02 21:55:51', '1000', 'October', 2018, 6, 43),
(234, 'T234', '2018-10-03 20:06:31', '1000', 'October', 2018, 6, 36);

--
-- Triggers `transaction`
--
DROP TRIGGER IF EXISTS `txn_id_trigger`;
DELIMITER $$
CREATE TRIGGER `txn_id_trigger` BEFORE INSERT ON `transaction` FOR EACH ROW SET NEW.txn_id = 
  CONCAT("T",COALESCE((SELECT MAX(tid)+1 from transaction),1))
$$
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `course` (`cid`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`cid`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`bid`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`fees_for`) REFERENCES `fees_type` (`fees_type_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

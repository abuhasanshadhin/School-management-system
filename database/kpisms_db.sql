-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2018 at 08:25 AM
-- Server version: 10.1.36-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kpisms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission_students`
--

CREATE TABLE `admission_students` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` text CHARACTER SET latin1 NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `result` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf32 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admission_students`
--

INSERT INTO `admission_students` (`id`, `student_name`, `father_name`, `mother_name`, `gender`, `image`, `birth_date`, `mobile`, `result`, `address`) VALUES
(1, 'Md Naim Islam', 'Md Bipul Islam', 'Most Mina Begum', 'Male', 'upload/35da041416fb393fe118b80dff21a7.jpg', '2008-11-13', '01785326987', '5.00', 'kurigram, kurigram, kurigram, kurigram'),
(2, 'Md Kobir Islam', 'Md Mmaun Islam', 'Most Misty Begum', 'Male', 'upload/c7d0df713c625cce2a9a189cc34363.jpg', '2008-11-18', '01785326981', '5.00', 'kurigram, kurigram, kurigram, kurigram'),
(3, 'Md Habib Islam', 'Md Pikul Islam', 'Most Moni Begum', 'Male', 'upload/1e759a5195e68c3e90992a5d83f0f3.jpg', '2009-11-12', '01785326982', '4.89', 'kurigram, kurigram, kurigram, kurigram'),
(4, 'Md Sikander  Islam', 'Md Jobed Islam', 'Most Hasina Begum', 'Male', 'upload/2035232ef331565539af9dc1aaf1c5.jpg', '2009-11-18', '01785326983', '4.60', 'kurigram, kurigram, kurigram, kurigram'),
(5, 'Most Nisat Begum', 'Md Monir Islam', 'Most Bilkis Begum', 'Female', 'upload/608907d3ec44fa4c75183be45a80b1.jpg', '2007-11-21', '01785326984', '5.00', 'kurigram, kurigram, kurigram, kurigram'),
(6, 'Most Bisty Begum', 'Md Sadekul Islam', 'Most Rickta  Begum', 'Female', 'upload/e337034826517b8d6773f6d55edd6a.jpg', '2005-11-23', '01785326989', '5.00', 'kurigram, kurigram, kurigram, kurigram'),
(7, 'Most Asa Moni ', 'Md Asad Islam', 'Md Jahanara Begum', 'Female', 'upload/54646ec71cf0716af4fce2fe07c8c8.jpg', '2015-11-18', '01785326980', '4.68', 'kurigram, kurigram, kurigram, kurigram'),
(8, 'Most Sristy Akter', 'Md Monir Islam', 'Most Bilkis Begum', 'Female', 'upload/908c2561b23c21282c06c6bb71ecf1.jpg', '2014-11-06', '01785326993', '4.89', 'kurigram, kurigram, kurigram, kurigram'),
(9, 'Sumon Islam', 'Bilal Islam', 'Bilkis Begum', 'male', '../soft/uploadCatapult+Summer+Incubator_Headshot_Eric+Zhang_f85.jpg', '11/29/2000', '01723151039', '', 'kurigram,kurigram,kurigram,kurigram'),
(10, 'Sumon Islam', 'Bilal Islam', 'Bilkis Begum', 'male', '../soft/uploadCatapult+Summer+Incubator_Headshot_Eric+Zhang_b3d.jpg', '11/29/2000', '01751359848', '', 'kurigram,kurigram,kurigram,kurigram'),
(11, 'Mr Londoni Junior', 'Mr Londoni Senior', 'Mrs Londoni Senior', 'Male', '../soft/upload/mamun4_13e.jpg', '11/09/2000', '01730233032', '6.00', 'Dabalaya,   Chinai,   Rajarhut,   Kurigram'),
(12, 'Mahamudul Hasan', 'Ali khan', 'Janahanara begum', 'male', '../soft/upload/1fgjhfg_33b.jpg', '11/08/20', '+8801780939904', '', '5yeh,3yheg,heth,ehteheth');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_group` varchar(255) DEFAULT NULL,
  `subject_code` int(11) DEFAULT NULL,
  `subject_name` varchar(255) NOT NULL,
  `theory_marks` int(11) DEFAULT '0',
  `objective_marks` int(11) DEFAULT '0',
  `practical_marks` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `class_name`, `class_group`, `subject_code`, `subject_name`, `theory_marks`, `objective_marks`, `practical_marks`) VALUES
(1, 'Six', '', 101, 'Bangla', 100, 0, 0),
(2, 'Six', '', 103, 'English-1', 100, 0, 0),
(3, 'Six', '', 104, 'Math', 100, 0, 0),
(4, 'Six', '', 102, 'Bangla-2', 100, 0, 0),
(5, 'Six', '', 105, 'Social science', 100, 0, 0),
(6, 'Six', '', 106, 'Science', 100, 0, 0),
(7, 'Six', '', 107, 'Religions', 100, 0, 0),
(8, 'Six', '', 108, 'ICT', 100, 0, 0),
(9, 'Seven', '', 101, 'Bangla-1', 100, 0, 0),
(10, 'Seven', '', 102, 'Bangla-2', 100, 0, 0),
(11, 'Seven', '', 103, 'English', 100, 0, 0),
(12, 'Seven', '', 104, 'English-2', 100, 0, 0),
(13, 'Seven', '', 105, 'Math', 100, 0, 0),
(14, 'Seven', '', 106, 'Social Science', 100, 0, 0),
(15, 'Seven', '', 107, 'Science', 100, 0, 0),
(16, 'Seven', '', 108, 'Religion', 100, 0, 0),
(17, 'Seven', '', 109, 'ICT', 100, 0, 0),
(18, 'Eight', '', 101, 'Bangla-1', 100, 0, 0),
(19, 'Eight', '', 102, 'Bangla-2', 100, 0, 0),
(20, 'Eight', '', 103, 'English-1', 100, 0, 0),
(21, 'Eight', '', 104, 'English-2', 100, 0, 0),
(22, 'Eight', '', 105, 'Math', 100, 0, 0),
(23, 'Eight', '', 106, 'Social Science', 100, 0, 0),
(24, 'Eight', '', 107, 'Science', 100, 0, 0),
(25, 'Eight', '', 108, 'Religion', 100, 0, 0),
(26, 'Eight', '', 109, 'ICT', 100, 0, 0),
(27, 'Nine', 'Science', 101, 'Bangla-1', 100, 0, 0),
(28, 'Nine', 'Science', 102, 'Bangla-2', 100, 0, 0),
(31, 'Nine', 'Science', 103, 'English-1', 100, 0, 0),
(32, 'Nine', 'Science', 104, 'English-2', 100, 0, 0),
(33, 'Nine', 'Science', 106, 'Social Science', 100, 0, 0),
(34, 'Nine', 'Science', 105, 'Math', 100, 0, 0),
(35, 'Nine', 'Science', 107, 'Physics', 100, 0, 0),
(36, 'Nine', 'Science', 108, 'Chemistry', 100, 0, 0),
(37, 'Nine', 'Science', 109, 'Bilogy', 100, 0, 0),
(38, 'Nine', 'Science', 1010, 'Religion', 100, 0, 0),
(39, 'Nine', 'Science', 1011, 'ICT', 100, 0, 0),
(40, 'Nine', 'Commerce', 101, 'Bangla-1', 100, 0, 0),
(41, 'Nine', 'Commerce', 102, 'Bangla-2', 100, 0, 0),
(42, 'Nine', 'Commerce', 103, 'English-1', 100, 0, 0),
(43, 'Nine', 'Commerce', 104, 'English-2', 100, 0, 0),
(44, 'Nine', 'Commerce', 105, 'Math', 100, 0, 0),
(45, 'Nine', 'Commerce', 106, 'Social Science', 100, 0, 0),
(46, 'Nine', 'Commerce', 107, 'Economic', 100, 0, 0),
(47, 'Nine', 'Commerce', 108, 'Accountig', 100, 0, 0),
(48, 'Nine', 'Commerce', 109, 'Business Management', 100, 0, 0),
(49, 'Nine', 'Commerce', 1010, 'Religion', 100, 0, 0),
(50, 'Nine', 'Commerce', 1011, 'ICT', 100, 0, 0),
(51, 'Nine', 'Arts', 101, 'Bangla-1', 100, 0, 0),
(52, 'Nine', 'Arts', 102, 'Bangla-2', 100, 0, 0),
(53, 'Nine', 'Arts', 103, 'English-1', 100, 0, 0),
(54, 'Nine', 'Arts', 104, 'English-2', 100, 0, 0),
(55, 'Nine', 'Arts', 105, 'Math', 100, 0, 0),
(56, 'Nine', 'Arts', 106, 'Economic', 100, 0, 0),
(57, 'Nine', 'Arts', 107, 'georgaphy', 100, 0, 0),
(58, 'Nine', 'Arts', 109, 'Religion', 100, 0, 0),
(59, 'Nine', 'Arts', 1010, 'ICT', 100, 0, 0),
(60, 'Ten', 'Science', 101, 'Bangla-1', 100, 0, 0),
(61, 'Ten', 'Science', 102, 'Bangla-2', 100, 0, 0),
(62, 'Ten', 'Science', 103, 'English-1', 100, 0, 0),
(63, 'Ten', 'Science', 104, 'English-2', 100, 0, 0),
(64, 'Ten', 'Science', 105, 'Math', 100, 0, 0),
(65, 'Ten', 'Science', 106, 'Social science', 100, 0, 0),
(66, 'Ten', 'Science', 107, 'Physics', 100, 0, 0),
(67, 'Ten', 'Science', 108, 'Chymistry', 100, 0, 0),
(68, 'Ten', 'Science', 109, 'Biology', 100, 0, 0),
(69, 'Ten', 'Science', 1010, 'ICT', 100, 0, 0),
(70, 'Ten', 'Science', 1011, 'Religions', 100, 0, 0),
(71, 'Ten', 'Commerce', 101, 'Bangla-1', 100, 0, 0),
(72, 'Ten', 'Commerce', 102, 'Bangla-2', 100, 0, 0),
(73, 'Ten', 'Commerce', 103, 'English-1', 100, 0, 0),
(74, 'Ten', 'Commerce', 104, 'English-2', 100, 0, 0),
(75, 'Ten', 'Commerce', 105, 'Math', 100, 0, 0),
(76, 'Ten', 'Commerce', 106, 'Business Management System', 100, 0, 0),
(77, 'Ten', 'Commerce', 107, 'Social science', 100, 0, 0),
(78, 'Ten', 'Commerce', 108, 'Accounting', 100, 0, 0),
(79, 'Ten', 'Commerce', 109, 'Religions', 100, 0, 0),
(80, 'Ten', 'Commerce', 1010, 'ICT', 100, 0, 0),
(81, 'Ten', 'Arts', 101, 'Bangla-1', 100, 0, 0),
(82, 'Ten', 'Arts', 102, 'Bangla-2', 100, 0, 0),
(83, 'Ten', 'Arts', 104, 'English-2', 100, 0, 0),
(84, 'Ten', 'Arts', 105, 'Math', 100, 0, 0),
(85, 'Ten', 'Arts', 106, 'Social science', 100, 0, 0),
(86, 'Ten', 'Arts', 108, 'Economic', 100, 0, 0),
(87, 'Ten', 'Arts', 109, 'Geography', 100, 0, 0),
(88, 'Ten', 'Arts', 1010, 'Religions', 100, 0, 0),
(89, 'Ten', 'Arts', 1011, 'ICT', 100, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `holiday` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `day`, `month`, `holiday`) VALUES
(1, 26, 3, 'Independence day'),
(2, 16, 12, 'Victory day'),
(3, 25, 12, 'Crismas day'),
(4, 21, 2, 'International Mother Language Day'),
(5, 14, 4, 'Bengali New Year'),
(6, 1, 5, 'International Labour Day'),
(7, 29, 4, 'Buddha purnima');

-- --------------------------------------------------------

--
-- Table structure for table `class_eight_results`
--

CREATE TABLE `class_eight_results` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `sub_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `sub_mark` varchar(255) NOT NULL,
  `point` varchar(255) CHARACTER SET latin1 NOT NULL,
  `grade` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_eight_results`
--

INSERT INTO `class_eight_results` (`id`, `roll`, `sub_name`, `sub_mark`, `point`, `grade`) VALUES
(1, 1, 'Bangla-1', '100', '5', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `class_eight_students`
--

CREATE TABLE `class_eight_students` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) CHARACTER SET utf16 NOT NULL,
  `birth_date` date NOT NULL,
  `mobile` varchar(255) CHARACTER SET latin1 NOT NULL,
  `result` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_eight_students`
--

INSERT INTO `class_eight_students` (`id`, `roll`, `student_name`, `father_name`, `mother_name`, `gender`, `image`, `birth_date`, `mobile`, `result`, `address`) VALUES
(1, 1, 'Mintu  Islam', 'Sumon Mia', 'Jinnat Begum', 'Male', 'upload/1b8ce80169b96e9c25181c79d0c294.jpg', '2007-11-13', '01785378074', '5.00', 'kurigram , kurigram , kurigram , kurigram '),
(2, 2, 'Khalid  Islam', 'Sumon Mia', 'Jinnat Begum', 'Male', 'upload/755491c6fad57c1062ad602a4c65d7.jpg', '2007-11-13', '01785378075', '4.85', 'kurigram , kurigram , kurigram , kurigram '),
(3, 3, 'Md Khalid Islam	', 'Md Jamal Ahmed', 'Most Momana Begum', 'Male', 'upload/c93e4630539b3bc014f9c4340bd0f0.jpg', '2003-11-12', '01730237553', '4.00', 'Dabalaya,  Chinnai,  Rajarhut,  Kurigram'),
(4, 4, 'Md Mominul Islam	', 'Md Jamal Ahmed', 'Most Momana Begum', 'Male', 'upload/52ebcab39948f0e2965f8c97228d69.jpg', '2003-11-12', '01730237558', '4.00', 'Dabalaya,  Chinnai,  Rajarhut,  Kurigram'),
(5, 5, 'Md Kobir Islam', 'Md Mmaun Islam', 'Most Misty Begum', 'Male', 'upload/439f445671aff61b6b904fef6848dd.jpg', '2002-11-19', '01785306987', '4.60', 'kurigram, kurigram, kurigram, kurigram'),
(6, 6, 'Md Simul Islam', 'Md Mmaun Islam', 'Most Misty Begum', 'Male', 'upload/1b3cebd6fcf0f0fc53cd1a847e6fdd.jpg', '2002-11-19', '01785306980', '4.60', 'kurigram, kurigram, kurigram, kurigram'),
(7, 7, 'Md Suomn Islam', 'Md Mmaun Islam', 'Most Misty Begum', 'Male', 'upload/229515689cf70911d4291bfe4c7c1f.jpg', '2002-11-19', '01785306989', '4.40', 'kurigram, kurigram, kurigram, kurigram'),
(8, 8, 'Md Sadik Islam', 'Md Mmaun Islam', 'Most Misty Begum', 'Male', 'upload/63b66cadf3dd6eb3c3af9d53388605.jpg', '2002-11-19', '01785306983', '4.48', 'kurigram, kurigram, kurigram, kurigram'),
(9, 9, 'Md Sipon Islam', 'Md Mmaun Islam', 'Most Misty Begum', 'Male', 'upload/304db3a911b1ba378525a206c5bd4c.jpg', '2002-11-19', '01785306982', '4.43', 'kurigram, kurigram, kurigram, kurigram'),
(10, 10, 'Md Mamunur Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', 'Male', 'upload/2f84c7861448aafeae06bd9ca98879.jpg', '2018-11-21', '01730233033', '4.8', 'Dabalaya, Chinnai, Rajarhut, Kurigram'),
(11, 11, 'Md Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', 'Male', 'upload/aa203adcf4537a5c609d1a428ec65b.jpg', '2018-11-21', '0173023303', '4.8', 'Dabalaya, Chinnai, Rajarhut, Kurigram'),
(12, 12, 'Md Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', 'Male', 'upload/3399c0ad83c02f2eddd1a69cfcc2cb.jpg', '2018-11-21', '01730233034', '4.8', 'Dabalaya, Chinnai, Rajarhut, Kurigram');

-- --------------------------------------------------------

--
-- Table structure for table `class_nine_results`
--

CREATE TABLE `class_nine_results` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `stu_group` varchar(255) CHARACTER SET latin1 NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `sub_mark` varchar(255) CHARACTER SET latin1 NOT NULL,
  `point` varchar(255) CHARACTER SET latin1 NOT NULL,
  `grade` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_nine_results`
--

INSERT INTO `class_nine_results` (`id`, `roll`, `stu_group`, `sub_name`, `sub_mark`, `point`, `grade`) VALUES
(1, 205617, 'Science', 'Physics', '67', '3.5', 'A-'),
(2, 1, 'Science', 'Bangla-1', '100', '5', 'A+'),
(3, 1, 'Science', 'Bangla-2', '79', '4', 'A'),
(4, 1, 'Science', 'English-1', '78', '4', 'A'),
(5, 1, 'Science', 'English-2', '90', '5', 'A+'),
(6, 1, 'Science', 'Social Science', '85', '5', 'A+'),
(7, 1, 'Science', 'Math', '97', '5', 'A+'),
(8, 1, 'Science', 'Physics', '95', '5', 'A+'),
(9, 1, 'Science', 'Chemistry', '79', '4', 'A'),
(10, 1, 'Science', 'Bilogy', '90', '5', 'A+'),
(11, 1, 'Science', 'Religion', '83', '5', 'A+'),
(12, 1, 'Science', 'ICT', '84', '5', 'A+'),
(13, 2, 'Science', 'Bangla-1', '86', '5', 'A+'),
(14, 2, 'Science', 'Bangla-2', '85', '5', 'A+'),
(15, 2, 'Science', 'English-1', '75', '4', 'A'),
(16, 2, 'Science', 'English-2', '71', '4', 'A'),
(17, 2, 'Science', 'Social Science', '80', '5', 'A+'),
(18, 2, 'Science', 'Math', '87', '5', 'A+'),
(19, 2, 'Science', 'Physics', '90', '5', 'A+'),
(20, 2, 'Science', 'Chemistry', '70', '4', 'A'),
(21, 2, 'Science', 'Bilogy', '80', '5', 'A+'),
(22, 2, 'Science', 'Religion', '65', '3.5', 'A-'),
(23, 2, 'Science', 'ICT', '85', '5', 'A+'),
(24, 3, 'Science', 'Bangla-1', '85', '5', 'A+'),
(25, 3, 'Science', 'Bangla-2', '68', '3.5', 'A-'),
(26, 3, 'Science', 'English-1', '65', '3.5', 'A-'),
(27, 3, 'Science', 'Social Science', '85', '5', 'A+'),
(28, 3, 'Science', 'Math', '85', '5', 'A+'),
(29, 3, 'Science', 'Physics', '20', '0', 'F'),
(30, 3, 'Science', 'Chemistry', '76', '4', 'A'),
(31, 3, 'Science', 'Bilogy', '40', '2', 'C'),
(32, 3, 'Science', 'Religion', '40', '2', 'C'),
(33, 3, 'Science', 'ICT', '32', '0', 'F'),
(34, 5, 'Commerce', 'Accountig', '80', '5', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `class_nine_students`
--

CREATE TABLE `class_nine_students` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `student_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `birth_date` date NOT NULL,
  `mobile` varchar(255) CHARACTER SET latin1 NOT NULL,
  `stu_group` varchar(255) CHARACTER SET latin1 NOT NULL,
  `result` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_nine_students`
--

INSERT INTO `class_nine_students` (`id`, `roll`, `student_name`, `father_name`, `mother_name`, `gender`, `image`, `birth_date`, `mobile`, `stu_group`, `result`, `address`) VALUES
(10, 1, 'Saminur Islam', 'Nahid Islam', 'Sriya Akter', 'Male', 'upload/129eed097a87da7b805ccde5a11e8a.jpg', '2005-11-21', '01750061281', 'Commerce', '4.7', 'kurigram , kurigram , kurigram , kurigram '),
(11, 7, 'Habib Islam', 'Sumon Islam', 'Jinnat Begum', 'Male', 'upload/dd5063bdb5aa7decd32f58ebb0888e.jpg', '2005-11-21', '01750061381', 'Commerce', '4.7', 'kurigram ,  kurigram ,  kurigram ,  kurigram '),
(12, 3, 'Bipul Islam', 'Sumon Islam', 'Jinnat Begum', 'Male', 'upload/562166c7e6119c81738ee096d8d014.jpg', '2005-11-21', '017500619081', 'Commerce', '4.67', 'kurigram , kurigram , kurigram , kurigram '),
(13, 4, 'Joni Islam', 'Nal Islam', 'Sriya Akter', 'Male', 'upload/58a209dde6cccb7f4f8ebe732e47b8.jpg', '2005-11-21', '017500619581', 'Commerce', '4.63', 'kurigram , kurigram , kurigram , kurigram '),
(14, 5, 'Limon Islam', 'Abu Islam', 'Jomula Akter', 'Male', 'upload/bfb4cc639f9b47d0fed5e879d0908c.jpg', '2005-11-21', '017500619681', 'Commerce', '4.65', 'kurigram , kurigram , kurigram , kurigram '),
(15, 6, 'Ricta Begum', 'Sumon Mia', 'Jinnat Begum', 'Female', 'upload/146fae443724b0ee436f087b0ec952.jpg', '2006-11-13', '01750067281', 'Commerce', '4.49', 'kurigram , kurigram , kurigram , kurigram '),
(16, 1, 'Mahabul Islam', 'Motaher Islam', 'Nisat Begum ', 'Male', 'upload/e5d36c124466677b8d7c8972b6f894.jpg', '2007-11-20', '01750005281', 'Arts', '5.00', 'kurigram , kurigram , kurigram , kurigram '),
(17, 2, 'Robiul  Islam', 'Sopon Islam', 'Aki Begum ', 'Male', 'upload/5fbd5d46d2fcb12a2d0e0024aace2b.jpg', '2007-11-20', '01750015281', 'Arts', '4.98', 'kurigram , kurigram , kurigram , kurigram '),
(18, 3, 'Ripon  Islam', 'Rehanul Islam', 'Bristy Begum ', 'Male', 'upload/138e988fb82262aae3779271d3773b.jpg', '2007-11-20', '01750025281', 'Arts', '4.90', 'kurigram , kurigram , kurigram , kurigram '),
(19, 4, 'Alomgir  Islam', 'Habib Islam', 'Bilkis Begum ', 'Male', 'upload/01aa743205791dcd4107c733e24d6f.jpg', '2007-11-20', '01750035281', 'Arts', '4.95', 'kurigram , kurigram , kurigram , kurigram '),
(20, 5, 'Minar Islam', 'Shahinur Islam', 'Binna Begum ', 'Male', 'upload/814ed2d31698aa26e679117d5c906e.jpg', '2007-11-20', '01750045281', 'Arts', '4.85', 'kurigram , kurigram , kurigram , kurigram '),
(21, 6, 'Mukul Islam', 'Shahinur Islam', 'Binna Begum ', 'Male', 'upload/15bebd425fd911344f18cd37f6c53e.jpg', '2007-11-20', '01750055281', 'Arts', '4.88', 'kurigram , kurigram , kurigram , kurigram ');

-- --------------------------------------------------------

--
-- Table structure for table `class_seven_results`
--

CREATE TABLE `class_seven_results` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `sub_mark` varchar(255) NOT NULL,
  `point` varchar(255) CHARACTER SET latin1 NOT NULL,
  `grade` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_seven_results`
--

INSERT INTO `class_seven_results` (`id`, `roll`, `sub_name`, `sub_mark`, `point`, `grade`) VALUES
(1, 1, 'Bangla-1', '79', '4', 'A'),
(2, 1, 'Bangla-2', '80', '5', 'A+'),
(3, 1, 'English', '100', '5', 'A+'),
(4, 1, 'English-2', '85', '5', 'A+'),
(5, 1, 'Math', '90', '5', 'A+'),
(6, 1, 'Social Science', '79', '4', 'A'),
(7, 1, 'Religion', '80', '5', 'A+'),
(8, 1, 'ICT', '90', '5', 'A+'),
(9, 2, 'Bangla-1', '79', '4', 'A'),
(10, 2, 'Bangla-2', '80', '5', 'A+'),
(11, 2, 'English', '84', '5', 'A+'),
(12, 2, 'English-2', '67', '3.5', 'A-'),
(13, 2, 'Math', '95', '5', 'A+'),
(14, 2, 'Social Science', '68', '3.5', 'A-'),
(15, 2, 'Science', '55', '3', 'B'),
(16, 2, 'Religion', '85', '5', 'A+'),
(17, 2, 'ICT', '80', '5', 'A+'),
(18, 3, 'Bangla-1', '79', '4', 'A'),
(19, 3, 'Bangla-2', '70', '4', 'A'),
(20, 3, 'English', '57', '3', 'B'),
(21, 3, 'English-2', '58', '3', 'B'),
(22, 3, 'Math', '65', '3.5', 'A-'),
(23, 3, 'Social Science', '26', '0', 'F'),
(24, 3, 'Science', '30', '0', 'F'),
(25, 3, 'Religion', '70', '4', 'A'),
(26, 3, 'ICT', '39', '1', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `class_seven_students`
--

CREATE TABLE `class_seven_students` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `gender` varchar(255) CHARACTER SET ucs2 NOT NULL,
  `image` text NOT NULL,
  `birth_date` date NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `result` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_seven_students`
--

INSERT INTO `class_seven_students` (`id`, `roll`, `student_name`, `father_name`, `mother_name`, `gender`, `image`, `birth_date`, `mobile`, `result`, `address`) VALUES
(1, 1, 'Mijanur Islam', 'Nahid Islam', 'Sriya Akter', 'Male', 'upload/c073beff99d0e965e0e49af83a361f.jpg', '1996-11-21', '01750065281', '5.00', 'kurigram , kurigram , kurigram , kurigram '),
(2, 2, 'Narayon Chandro roy', 'kartik sarker', 'susmita sarker', 'Male', 'upload/5e953450e191fed973af81171c80ee.jpg', '2006-11-23', '01750065282', '4.89', 'kurigram , kurigram , kurigram , kurigram '),
(3, 3, 'plabon', 'Minal Bormon', 'Aroti Roy', 'Male', 'upload/7f73d56394267834075d115ffd5e87.jpg', '2006-11-15', '01785378074', '4.8', 'kurigram , kurigram , kurigram , kurigram '),
(4, 4, 'Dalim roy', 'Prodip Bormon', 'Mina Roy', 'Male', 'upload/c1e1ac2aeba435c7182530fa3d1a8d.jpg', '2006-11-15', '01785378071', '4.8', 'kurigram , kurigram , kurigram , kurigram '),
(5, 5, 'Mirtunjoy roy', 'Poritosh Roy', 'Sahti Roy', 'Male', 'upload/d0c53d2cbb74fb71541b7aac7476da.jpg', '2006-11-15', '01785378072', '4.98', 'kurigram , kurigram , kurigram , kurigram '),
(6, 6, 'Mijanur Islam', 'Nahid Islam', 'Sriya Akter', 'Male', 'upload/ec68fb53193f211db37df62dbcad05.jpg', '1996-11-21', '01750065284', '5.00', 'kurigram , kurigram , kurigram , kurigram '),
(7, 7, 'Bilal  Islam', 'Didder Islam', 'Sriya Akter', 'Male', 'upload/2bb368001fe56e5d0ff4b94953a380.jpg', '1996-11-21', '01750065285', '4.85', 'kurigram , kurigram , kurigram , kurigram '),
(8, 8, 'Asad Islam', 'Aminul Islam', 'Mohona Akter', 'Male', 'upload/4e1cd26ec0637d185ccc6f84a87166.jpg', '1996-11-21', '01750065286', '4.86', 'kurigram , kurigram , kurigram , kurigram '),
(9, 9, 'Mynul  Islam', 'Rakib Islam', 'Ellina  Akter', 'Male', 'upload/15654bf971dad1bec2ad14504de717.jpg', '1996-11-21', '01750065287', '4.75', 'kurigram , kurigram , kurigram , kurigram '),
(10, 10, 'Forad Islam', 'Fikrul Islam', 'Sibana  Akter', 'Male', 'upload/cecec4900e260ba21c056acaf28cb9.jpg', '1996-11-21', '01750065289', '4.70', 'kurigram , kurigram , kurigram , kurigram '),
(11, 11, 'Md Mamunur Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', 'Male', 'upload/45c8f846318d6e45dd755a7d6743fa.jpg', '2003-11-13', '01730233038', '4.90', 'Dabalaya,   Chinnai,   Rajarhut,   Kurigram'),
(12, 12, 'Md Nunnobe ', 'Md Masud Rahman', 'Most MonowaraBegum', 'Male', 'upload/ef1e1fc5b3f5f211b37ce57e668b68.jpg', '2003-11-13', '01730233031', '4.45', 'Dabalaya,   Chinnai,   Rajarhut,   Kurigram'),
(13, 13, 'Md Nunnobe  MIa', 'Md Masud Rahman', 'Most MonowaraBegum', 'Male', 'upload/bd00cb1c84a07c6fd464c6baf9a8ea.jpg', '2003-11-13', '01730233035', '4.91', 'Dabalaya,  Chinnai,  Rajarhut,  Kurigram');

-- --------------------------------------------------------

--
-- Table structure for table `class_six_results`
--

CREATE TABLE `class_six_results` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `sub_mark` varchar(255) NOT NULL,
  `point` varchar(255) CHARACTER SET latin1 NOT NULL,
  `grade` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_six_results`
--

INSERT INTO `class_six_results` (`id`, `roll`, `sub_name`, `sub_mark`, `point`, `grade`) VALUES
(1, 205617, 'Bangla', '67', '3.5', 'A-'),
(3, 1, 'English-1', '40', '2', 'C'),
(4, 1, 'Math', '79', '4', 'A'),
(5, 1, 'Bangla-2', '50', '3', 'B'),
(6, 1, 'Social science', '100', '5', 'A+'),
(7, 1, 'Science', '79', '4', 'A'),
(8, 1, 'Religions', '40', '2', 'C'),
(9, 1, 'ICT', '100', '5', 'A+'),
(10, 2, 'Bangla', '100', '5', 'A+'),
(11, 2, 'English-1', '65', '3.5', 'A-'),
(12, 2, 'Math', '55', '3', 'B'),
(13, 2, 'Bangla-2', '56', '3', 'B'),
(14, 2, 'Social science', '79', '4', 'A'),
(15, 2, 'Science', '79', '4', 'A'),
(16, 2, 'Religions', '79', '4', 'A'),
(17, 2, 'ICT', '20', '0', 'F'),
(18, 3, 'Bangla', '79', '4', 'A'),
(19, 3, 'English-1', '40', '2', 'C'),
(20, 3, 'Math', '80', '5', 'A+'),
(21, 3, 'Bangla-2', '60', '3.5', 'A-'),
(22, 3, 'Social science', '85', '5', 'A+'),
(23, 3, 'Science', '40', '2', 'C'),
(24, 3, 'Religions', '79', '4', 'A'),
(25, 3, 'ICT', '80', '5', 'A+'),
(26, 9, 'Bangla', '90', '5', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `class_six_students`
--

CREATE TABLE `class_six_students` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `gender` varchar(255) CHARACTER SET utf32 NOT NULL,
  `image` varchar(255) NOT NULL,
  `birth_date` varchar(255) CHARACTER SET latin1 NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL,
  `address` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_six_students`
--

INSERT INTO `class_six_students` (`id`, `roll`, `student_name`, `father_name`, `mother_name`, `gender`, `image`, `birth_date`, `mobile`, `result`, `address`) VALUES
(1, 1, 'Md Mamunur Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', 'Male', 'upload/4f8b63e3a790f70be8753b55d17292.jpg', '1998-11-29', '01751359832', '5.00', 'Dabalaya,   Chinnai,   Rajarhut,   kurigram'),
(2, 2, 'Elon Musk', 'Hanry Musk', 'Martinez ', 'Male', 'upload/283e4afc74c943af55b583febc0be6.jpg', '2004-11-16', '4114777323765', '4.89', 'Kurigram Sadar,  Pourasova,  Kurigram Sadar,  Kurigram'),
(3, 3, 'Arifa Akter', 'Md Mamun Islam', 'Most Rickta  Begum', 'Female', 'upload/6c1ca4bf8d1dc8e751008a3d6d0ec3.jpg', '2007-11-21', '01785326980', '4.98', 'kurigram,   kurigram,   kurigram,   kurigram'),
(4, 4, 'Most Asa Moni ', 'Md Monir Islam', 'Most Hasina Begum', 'Female', 'upload/590bbb787d635a95bedd91bb200f47.jpg', '2018-11-15', '01758693254', '5.00', 'kurigram,  kurigram,  kurigram,  kurigram'),
(5, 5, 'Simul Islam', 'Didar Islam', 'Most Jahanara Begum', 'Male', 'upload/dd526ab12340a11ab7044bb88d9642.jpg', '2018-11-20', '01785321981', '1.00', 'kurigram, kurigram, kurigram, kurigram'),
(6, 6, 'Md Kobir Islam', 'Md Monir Islam', 'Most Hasina Begum', 'Male', 'upload/3ddd00abbfd310d676b4194e39790c.jpg', '2006-11-16', '01785326998', '5.00', 'kurigram, kurigram, kurigram, kurigram'),
(7, 7, 'Most Sristy Akter', 'Md Jobed Islam', 'Most Mina Begum', 'Female', 'upload/646d7dde07836b63ae73812f24c522.jpg', '2006-11-09', '01785326941', '4', 'kurigram,  kurigram,  kurigram,  kurigram'),
(8, 8, 'Bithi Begum', 'Md Pikul Islam', 'Most Misty Begum', 'Female', 'upload/f9ff9458c4a2e7f355326474f84c1f.jpg', '2007-11-13', '01781326987', '4.89', 'kurigram, kurigram, kurigram, kurigram'),
(9, 9, 'Mousumi Akter ', 'Simul Islam', 'Most Hasina Begum', 'Female', 'upload/df857d1d8a73c9232818fafa51c48f.jpg', '2008-11-19', '01685326980', '5.00', 'kurigram, kurigram, kurigram, kurigram'),
(10, 10, 'Jannat akter', 'Miju Islam', 'Nila Begum', 'Female', 'upload/5b6efb73ad43f51cbe3fe5545e473c.jpg', '2008-11-11', '01885326980', '3', 'Rajerhat,  kurigram,  kurigram,  kurigram'),
(11, 11, 'Sultana parvin', 'Md Mamun Islam', 'Most Rickta  Begum', 'Female', 'upload/b158fc33b53f09129703984df3c723.jpg', '2008-11-11', '01785386982', '4', 'kurigram, kurigram, kurigram, kurigram'),
(12, 12, 'Md Mamunur Rashid', 'Md Mijanur Rahman', 'Most Momana Begum', 'Male', 'upload/c7ecca25bb6d12a5d390833b20b8db.jpg', '2004-11-17', '01751359839', '4.89', 'Dabalaya,  Chinnai,  Rajarhut,  Kurigram'),
(13, 13, 'Md RakibRashid', 'Md Mijanur Rahman', 'Most Momana Begum', 'Male', 'upload/ba317c774b21e8c76cb0af1f0368af.jpg', '2004-11-17', '01751359830', '4.80', 'Dabalaya,  Chinnai,  Rajarhut,  Kurigram'),
(14, 14, 'Md Mamunur Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', 'Male', 'upload/18f1af76af37189a982bba209db6d0.jpg', '2018-11-07', '01730233032', '5.00', 'Dabalaya, Chinnai, Rajarhut, Kurigram');

-- --------------------------------------------------------

--
-- Table structure for table `class_ten_results`
--

CREATE TABLE `class_ten_results` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `stu_group` varchar(255) CHARACTER SET latin1 NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `sub_mark` varchar(255) CHARACTER SET latin1 NOT NULL,
  `point` varchar(255) CHARACTER SET latin1 NOT NULL,
  `grade` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_ten_results`
--

INSERT INTO `class_ten_results` (`id`, `roll`, `stu_group`, `sub_name`, `sub_mark`, `point`, `grade`) VALUES
(1, 1, 'science', 'Bangla', '80', '5.00', 'A+'),
(2, 1, 'science', 'English', '70', '4.50', 'A'),
(3, 1, 'science', 'Mathematics', '96', '5.00', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `class_ten_students`
--

CREATE TABLE `class_ten_students` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `mobile` varchar(255) CHARACTER SET latin1 NOT NULL,
  `stu_group` varchar(255) CHARACTER SET latin1 NOT NULL,
  `result` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_ten_students`
--

INSERT INTO `class_ten_students` (`id`, `roll`, `student_name`, `father_name`, `mother_name`, `gender`, `image`, `birth_date`, `mobile`, `stu_group`, `result`, `address`) VALUES
(32, 1, 'Md Habibur Rahman', 'Md Mijanur Rahman', 'Most Momana Begum', 'Male', 'upload/c669f65e9e39606b3a1b572693024b.jpg', '2005-11-09', '01751359836', 'Science', '5.00', 'Dabalaya, Chinnai, Rajarhut, Kurigram'),
(33, 2, 'Md HassanRahman', 'Md MominRahman', 'Most Momana Begum', 'Male', 'upload/398f7cc85682c43f85f3d4f22ba40b.jpg', '2005-11-09', '01751359835', 'Science', '5.00', 'Dabalaya, Chinnai, Rajarhut, Kurigram'),
(34, 3, 'Partho Roy', 'Minal Bormon', 'Susmita sarker', 'Male', 'upload/022563b84b212a4b4b0b668545f846.jpg', '2004-11-12', '01750065211', 'Science', '5.00', 'kurigram , kurigram , kurigram , kurigram '),
(35, 4, 'Halim Islam', 'Finjamun Islam', 'Tayeba Begum', 'Male', 'upload/08713de6f0989d59f9fe26398d5be3.jpg', '2005-11-10', '01750065221', 'Science', '4.98', 'kurigram , kurigram , kurigram , kurigram '),
(36, 5, 'Sikon Islam', 'Ekramul Mia', 'Momota Begm', 'Male', 'upload/fbfed989e97f762cf52d8d1043ff01.jpg', '2008-11-13', '01750065271', 'Science', '4.79', 'kurigram , kurigram , kurigram , kurigram '),
(37, 6, 'Rakib Islam ', 'Minal Islam', 'Bilkis Begum', 'Male', 'upload/8ca79819ce165783b16a3cebe6f5cb.jpg', '2006-11-15', '01750065231', 'Science', '4.69', 'kurigram , kurigram , kurigram , kurigram '),
(38, 7, 'Naim  Islam ', 'Asraful Islam', 'Hasina Begum', 'Male', 'upload/007a8a413f537cc5cacd862ab531d0.jpg', '2006-11-15', '01750065261', 'Science', '4.68', 'kurigram , kurigram , kurigram , kurigram '),
(39, 8, 'Zahid  Islam ', 'Asif Islam', 'Silpi Begum', 'Male', 'upload/af98ed39c79414514ae0ae5d8af49c.jpg', '2006-11-15', '01750065241', 'Science', '4.60', 'kurigram , kurigram , kurigram , kurigram '),
(40, 9, 'Anwr Islam', 'Sujon Islam', 'Anoyara Begum', 'Male', 'upload/0a556162f20be7960dcb17c9393f58.jpg', '2004-11-10', '01750065291', 'Science', '4.45', 'kurigram , kurigram , kurigram , kurigram '),
(41, 10, 'Md Mamunur Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', 'Male', 'upload/c80caef3218033ba74f118c66e1567.jpg', '2018-11-22', '01751359837', 'Science', '4.00', 'Dabalaya, Chinnai, Rajarhut, Kurigram'),
(42, 11, 'Md Mamunur Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', 'Male', 'upload/0b2e0fa2981c25f03dc66e1c0909e9.jpg', '2018-11-22', '0175135983', 'Science', '4.00', 'Dabalaya, Chinnai, Rajarhut, Kurigram');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `description` text,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `image` text,
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `old_students`
--

CREATE TABLE `old_students` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `student_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `father_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `mother_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `gender` varchar(255) CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `birth_date` date NOT NULL,
  `mobile` varchar(255) CHARACTER SET latin1 NOT NULL,
  `stu_group` varchar(255) CHARACTER SET latin1 NOT NULL,
  `result` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `old_students`
--

INSERT INTO `old_students` (`id`, `roll`, `student_name`, `father_name`, `mother_name`, `gender`, `image`, `birth_date`, `mobile`, `stu_group`, `result`, `address`) VALUES
(1, 1, 'Habib Islam', 'Nahid Islam', 'Sriya Akter', 'Male', 'upload/ea30afc22b1b6c16dd69db2545ef65.jpg', '2005-11-11', '01750165281', 'Science', '5.00', 'kurigram , kurigram , kurigram , kurigram '),
(2, 2, 'Sohanur Islam', 'Mamun Islam', 'Jinnat Begum', 'Male', 'upload/b945699661e53373101f44edb8767e.jpg', '2005-11-11', '01750265281', 'Science', '4.98', 'kurigram , kurigram , kurigram , kurigram '),
(3, 3, 'Poritosh saker', 'Minal Bormon', 'Aroti Roy', 'Male', 'upload/a5109d5a335af3d9309db3dad0c85c.jpg', '2005-11-17', '01750465281', 'Science', '4.89', 'kurigram , kurigram , kurigram , kurigram '),
(4, 4, 'Mukul Islam', 'Nahid Islam', 'Sriya Akter', 'Male', 'upload/1fd2ce91e375d2448242314abe57ff.jpg', '2006-11-14', '01750665281', 'Science', '4.8', 'kurigram , kurigram , kurigram , kurigram '),
(5, 5, 'Simul Islam', 'Nahid Islam', 'Sriya Akter', 'Male', 'upload/18b05a0ad584040d8b0bcff105ec9b.jpg', '2006-11-14', '01750865281', 'Science', '4.59', 'kurigram , kurigram , kurigram , kurigram '),
(6, 6, 'Mukul Islam', 'Nahid Islam', 'Sriya Akter', 'Male', 'upload/6cc70b26c39a93cf30f3154ea0ddf2.jpg', '2006-11-01', '01780378072', 'Science', '5.00', 'kurigram , kurigram , kurigram , kurigram '),
(7, 7, 'Joni Islam', 'Nahid Islam', 'Sriya Akter', 'Male', 'upload/9b54b9a7d8768ed99144f0f6688907.jpg', '2006-11-01', '017801378072', 'Science', '4.98', 'kurigram , kurigram , kurigram , kurigram '),
(8, 8, 'Gopal Roy', 'kartik sarker', 'Aroti Roy', 'Male', 'upload/475802b2a9470d5bee30d5aa8f9efd.jpg', '2005-11-09', '01750065084', 'Science', '5.00', 'kurigram , kurigram , kurigram , kurigram '),
(9, 9, 'Robin Roy', 'kartik sarker', 'Aroti Roy', 'Male', 'upload/5f4b42710151f210afb724f970e4c3.jpg', '2005-11-09', '01750065184', 'Science', '4.98', 'kurigram , kurigram , kurigram , kurigram '),
(10, 10, 'Limon Roy', 'kartik sarker', 'Aroti Roy', 'Male', 'upload/e91fd182669b19a85c7ac3f2b39b8e.jpg', '2005-11-09', '01750065284', 'Science', '4.89', 'kurigram , kurigram , kurigram , kurigram '),
(11, 11, 'Plabon  Roy', 'kartik sarker', 'Aroti Roy', 'Male', 'upload/002b5824e162541105827b560c27fd.jpg', '2005-11-09', '01750065594', 'Science', '4.88', 'kurigram , kurigram , kurigram , kurigram '),
(12, 12, 'Ruhidash Roy', 'kartik sarker', 'Aroti Roy', 'Male', 'upload/17cf2d635155f87ff229a7f511c294.jpg', '2005-11-09', '01750065384', 'Science', '4.85', 'kurigram , kurigram , kurigram , kurigram '),
(13, 13, 'Bidan Roy', 'kartik sarker', 'Aroti Roy', 'Male', 'upload/f255812d4153371ad3dcd047873bd0.jpg', '2005-11-09', '01750065484', 'Science', '4.8', 'kurigram , kurigram , kurigram , kurigram '),
(14, 14, 'Bickrom Roy', 'kartik sarker', 'Aroti Roy', 'Male', 'upload/68d5b852130d3d958dc19049c18172.jpg', '2005-11-09', '01750065494', 'Science', '4.8', 'kurigram , kurigram , kurigram , kurigram '),
(15, 15, 'Debasis  Roy', 'kartik sarker', 'Aroti Roy', 'Male', 'upload/752f612f8b5fd4d4ef9e48344b9f48.jpg', '2005-11-09', '01750065894', 'Science', '4.00', 'kurigram , kurigram , kurigram , kurigram '),
(16, 1, 'Chandon Roy', 'Minal Bormon', 'Aroti Roy', 'Male', 'upload/786f3a79fb6ac2b110e85f9912ba43.jpg', '2005-11-09', '01751065281', 'Commerce', '5.00', 'kurigram , kurigram , kurigram , kurigram '),
(17, 2, 'Md Mamunur Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', 'Male', 'upload/2ea1696e2499fe1638842b9f8824eb.jpg', '2018-11-22', '01751359834', 'Commerce', '5.00', 'Dabalaya, Chinnai, Rajarhut, Kurigram'),
(18, 3, 'Md Mamunur Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', 'Male', 'upload/d05527a996d467595ed4b12e70b021.jpg', '2018-11-22', '01751359830', 'Commerce', '5.00', 'Dabalaya, Chinnai, Rajarhut, Kurigram'),
(19, 4, 'Kartik  Roy', 'Minal Bormon', 'Aroti Roy', 'Male', 'upload/69a0200e5b0e03cf86c355daedc0c8.jpg', '2005-11-09', '01752065281', 'Commerce', '4.98', 'kurigram , kurigram , kurigram , kurigram '),
(20, 5, 'Limon Islam', 'Sumon Mia', 'Jinnat Begum', 'Male', 'upload/e932dfd6a57428a67d33ed518a4d81.jpg', '2007-11-06', '01755065281', 'Commerce', '4.85', 'kurigram , kurigram , kurigram , kurigram '),
(21, 6, 'Md Mamunur Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', 'Male', 'upload/36f9255bf62cc8799c69751b7f23ca.jpg', '2018-11-22', '01751359832', 'Commerce', '3.00', 'Dabalaya, Chinnai, Rajarhut, Kurigram'),
(22, 1, 'Dipu Roy', 'Minal Bormon', 'Aroti Roy', 'Male', 'upload/cf72a6d049eecee50f82dee77ee5b6.jpg', '2018-11-03', '01720563981', 'Arts', '5.00', 'kurigram , kurigram , kurigram , kurigram '),
(23, 2, 'Raj Roy', 'Minal Bormon', 'Aroti Roy', 'Male', 'upload/56242a15b243fa88b4559ed625a1d9.jpg', '2018-11-03', '01720563982', 'Arts', '4.98', 'kurigram , kurigram , kurigram , kurigram '),
(24, 3, 'Joy Roy', 'Minal Bormon', 'Aroti Roy', 'Male', 'upload/19542e9ce905cce33cd36eeac8454e.jpg', '2018-11-03', '01720563983', 'Arts', '4.89', 'kurigram , kurigram , kurigram , kurigram '),
(25, 4, 'Ram Roy', 'Minal Bormon', 'Aroti Roy', 'Male', 'upload/6692bbb5cc38427e559678b17a7e0a.jpg', '2018-11-03', '01720563987', 'Arts', '4.67', 'kurigram , kurigram , kurigram , kurigram '),
(26, 5, 'Sumon Roy', 'Minal Bormon', 'Aroti Roy', 'Male', 'upload/2462611791526ea10aac9df99fbc0a.jpg', '2018-11-03', '01720563988', 'Arts', '4.64', 'kurigram , kurigram , kurigram , kurigram '),
(27, 6, 'Bithi Roy', 'Minal Bormon', 'Aroti Roy', 'Male', 'upload/4086eaea7b9712adb58a64a55d38fa.jpg', '2018-11-03', '01720563984', 'Arts', '4.56', 'kurigram , kurigram , kurigram , kurigram '),
(28, 7, 'Gopal Roy', 'Minal Bormon', 'Aroti Roy', 'Male', 'upload/ae8bde7d995915e6a00ac18d8748cb.jpg', '2018-11-03', '01720563986', 'Arts', '4.54', 'kurigram , kurigram , kurigram , kurigram '),
(29, 8, 'Aki Roy', 'Minal Bormon', 'Aroti Roy', 'Male', 'upload/fc5eb81e0490f91e314a2d19329793.jpg', '2018-11-03', '01720563985', 'Arts', '4.50', 'kurigram , kurigram , kurigram , kurigram ');

-- --------------------------------------------------------

--
-- Table structure for table `online_admission`
--

CREATE TABLE `online_admission` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `image` text NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `online_admission`
--

INSERT INTO `online_admission` (`id`, `student_name`, `father_name`, `mother_name`, `gender`, `image`, `birth_date`, `mobile`, `address`) VALUES
(9, 'Md Mamunur Rashid', 'Md Mijanur ', 'Most Misty Begum', 'male', '../soft/uploadmfhandler (2)_0b5.jpg', '11/08/2018', '01785326981', 'kurigram,Najira ,kurigram,Kurigram,kurigram'),
(11, 'Masud  Rana', 'Bilal Islam', 'Bilkis Begum', 'male', '../soft/upload2014-05-13_53725871135ff_HornHeadshotLores_28e.jpg', '11/08/2000', '01751359843', 'kurigram,kurigram,kurigram,kurigram'),
(12, 'Munna  Islam', 'Bilal Islam', 'Bilkis Begum', 'male', '../soft/uploadcollegestudent-300x169_27b.jpg', '11/08/2000', '01751359849', 'kurigram,kurigram,kurigram,kurigram'),
(13, 'Sumon Islam', 'Bilal Islam', 'Bilkis Begum', 'male', '../soft/uploadcollegestudent-300x169_a6a.jpg', '11/08/2000', '01751359845', 'kurigram,kurigram,kurigram,kurigram');

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_group` varchar(255) DEFAULT NULL,
  `day` varchar(255) NOT NULL,
  `1st_period` varchar(255) DEFAULT NULL,
  `2nd_period` varchar(255) DEFAULT NULL,
  `3rd_period` varchar(255) DEFAULT NULL,
  `4th_period` varchar(255) DEFAULT NULL,
  `5th_period` varchar(255) DEFAULT NULL,
  `6th_period` varchar(255) DEFAULT NULL,
  `7th_period` varchar(255) DEFAULT NULL,
  `8th_period` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`id`, `class_name`, `class_group`, `day`, `1st_period`, `2nd_period`, `3rd_period`, `4th_period`, `5th_period`, `6th_period`, `7th_period`, `8th_period`) VALUES
(1, 'Six', '', 'Sat', 'Bangla,Md Kamal Ahmed', 'English,A. M. Harun ar Rashid', 'Math,Md Asraful Islam ', 'Agriculture,Most Mohona Begum', 'Bangla 2nd,Md Kamal Ahmed', 'Social Science,Derek J. Arnold', 'General Science,Most Mohona Begum', 'Religion Studies,Most Mohona Begum'),
(2, 'Six', '', 'Sun', 'Bangla,A. M. Harun ar Rashid', 'English -1,Md Asraful Islam ', 'Math,Most Bilkis Begum', 'Islam ,Bikash Chandro Roy', 'Physical education,Derek J. Arnold', 'English -2,Most Bilkis Begum', 'Bangla-2,Most Bilkis Begum', 'Science,Derek J. Arnold'),
(3, 'Seven', '', 'Sat', 'Bangla,A. M. Harun ar Rashid', 'English -1,Md Asraful Islam ', 'Math,Most Bilkis Begum', 'Islam ,Bikash Chandro Roy', 'Physical education,Derek J. Arnold', 'English -2,Most Bilkis Begum', 'Bangla-2,Most Bilkis Begum', 'Science,Derek J. Arnold'),
(4, 'Eight', '', 'Sat', 'Bangla,A. M. Harun ar Rashid', 'English -1,Md Asraful Islam ', 'Math,Most Bilkis Begum', 'Islam ,Bikash Chandro Roy', 'Physical education,Derek J. Arnold', 'English -2,Most Bilkis Begum', 'Bangla-2,Most Bilkis Begum', 'Science,Derek J. Arnold'),
(5, 'Six', '', 'Mon', 'Bangla,A. M. Harun ar Rashid', 'English -1,Md Asraful Islam ', 'Math,Most Bilkis Begum', 'Islam ,Bikash Chandro Roy', 'Physical education,Derek J. Arnold', 'English -2,Most Bilkis Begum', 'Bangla-2,Most Bilkis Begum', 'Science,Derek J. Arnold'),
(6, 'Eight', '', 'Thu', 'Bangla,A. M. Harun ar Rashid', 'English -1,Md Asraful Islam ', 'Math,Most Bilkis Begum', 'Islam ,Bikash Chandro Roy', 'Physical education,Derek J. Arnold', 'English -2,Most Bilkis Begum', 'Bangla-2,Most Bilkis Begum', 'Science,Derek J. Arnold'),
(7, 'Seven', '', 'Wed', 'Bangla,A. M. Harun ar Rashid', 'English -1,Md Asraful Islam ', 'Math,Most Bilkis Begum', 'Islam ,Bikash Chandro Roy', 'Physical education,Derek J. Arnold', 'English -2,Most Bilkis Begum', 'Bangla-2,Most Bilkis Begum', 'Science,Derek J. Arnold'),
(8, 'Six', '', 'Thu', 'Bangla,A. M. Harun ar Rashid', 'English -1,Md Asraful Islam ', 'Math,Most Bilkis Begum', 'Islam ,Bikash Chandro Roy', 'Physical education,Derek J. Arnold', 'English -2,Most Bilkis Begum', 'Bangla-2,Most Bilkis Begum', 'Science,Derek J. Arnold'),
(9, 'Six', '', 'Tue', 'Islam ,Derek J. Arnold', 'English -1,Most Mohona Begum', 'Math,Md Asraful Islam ', 'Science,A. M. Harun ar Rashid', 'Physical education,Md Kamal Ahmed', 'Bangla-2,Md Kamal Ahmed', 'English -2,Most Bilkis Begum', 'General Science,Md Asraful Islam '),
(10, 'Six', '', 'Wed', 'Islam ,Derek J. Arnold', 'English -1,Most Mohona Begum', 'Math,Md Asraful Islam ', 'Science,A. M. Harun ar Rashid', 'Physical education,Md Kamal Ahmed', 'Bangla-2,Md Kamal Ahmed', 'English -2,Most Bilkis Begum', 'General Science,Md Asraful Islam '),
(11, 'Seven', '', 'Thu', 'Islam ,Derek J. Arnold', 'English -1,A. M. Harun ar Rashid', 'Math,Md Kamal Ahmed', 'Science,A. M. Harun ar Rashid', 'Physical education,Md Asraful Islam ', 'Bangla-2,Most Bilkis Begum', 'English -2,A. M. Harun ar Rashid', 'Realigion,A. M. Harun ar Rashid'),
(12, 'Seven', '', 'Sun', 'Bangla,Most Mohona Begum', 'English -1,Most Bilkis Begum', 'Math,Md Kamal Ahmed', 'Science,A. M. Harun ar Rashid', 'Physical education,Most Bilkis Begum', 'Bangla-2,Most Bilkis Begum', 'English -2,A. M. Harun ar Rashid', 'Realigion,Most Bilkis Begum'),
(13, 'Seven', '', 'Mon', 'Bangla,Md Asraful Islam ', 'English -1,Most Bilkis Begum', 'Math,Md Asraful Islam ', 'Science,A. M. Harun ar Rashid', 'Physical education,A. M. Harun ar Rashid', 'Bangla-2,Most Bilkis Begum', 'English -2,Most Bilkis Begum', 'Realigion,Most Bilkis Begum'),
(14, 'Seven', '', 'Tue', 'Bangla,Md Asraful Islam ', 'English -1,Most Bilkis Begum', 'Math,Md Asraful Islam ', 'Science,A. M. Harun ar Rashid', 'Physical education,A. M. Harun ar Rashid', 'Bangla-2,Most Bilkis Begum', 'English -2,Most Bilkis Begum', 'Realigion,Most Bilkis Begum'),
(15, 'Eight', '', 'Wed', 'Bangla,Bikash Chandro Roy', 'English -1,Most Bilkis Begum', 'Math,A. M. Harun ar Rashid', 'Science,A. M. Harun ar Rashid', 'Physical education,A. M. Harun ar Rashid', 'Bangla-2,Md Asraful Islam ', 'English -2,Most Bilkis Begum', 'Realigion,A. M. Harun ar Rashid'),
(16, 'Eight', '', 'Mon', 'Bangla,Bikash Chandro Roy', 'English -1,Most Bilkis Begum', 'Math,A. M. Harun ar Rashid', 'Science,A. M. Harun ar Rashid', 'Physical education,A. M. Harun ar Rashid', 'Bangla-2,Md Asraful Islam ', 'English -2,Most Bilkis Begum', 'Realigion,A. M. Harun ar Rashid'),
(17, 'Eight', '', 'Sun', 'Bangla,Most Bilkis Begum', 'English -1,Most Bilkis Begum', 'Math,A. M. Harun ar Rashid', 'Science,A. M. Harun ar Rashid', 'Physical education,Md Kamal Ahmed', 'Bangla-2,Md Kamal Ahmed', 'English -2,Md Asraful Islam ', 'Realigion,Md Asraful Islam '),
(18, 'Nine', 'Science', 'Sat', 'Bangla,Most Bilkis Begum', 'English -1,Most Bilkis Begum', 'Math,A. M. Harun ar Rashid', 'Physics,A. M. Harun ar Rashid', 'Chemistry,Md Kamal Ahmed', 'Bangla-2,Md Kamal Ahmed', 'English -2,Md Asraful Islam ', 'Realigion,Md Asraful Islam '),
(19, 'Nine', 'Science', 'Sun', 'Bangla,A. M. Harun ar Rashid', 'English -1,Most Mohona Begum', 'Math,A. M. Harun ar Rashid', 'Physics,Md Asraful Islam ', 'Physical education,Md Kamal Ahmed', 'English -2,Most Mohona Begum', 'Math,Md Asraful Islam ', 'Realigion,Most Bilkis Begum'),
(20, 'Nine', 'Science', 'Tue', 'Bangla,Md Kamal Ahmed', 'English,A. M. Harun ar Rashid', 'Math,Md Asraful Islam ', 'Science,Derek J. Arnold', 'Physics,Md Asraful Islam ', 'biology,Md Asraful Islam ', 'Bangla-2,Md Kamal Ahmed', 'Realigion,Derek J. Arnold'),
(21, 'Nine', 'Science', 'Wed', 'Bangla,Md Asraful Islam ', 'English,A. M. Harun ar Rashid', 'Math,Md Kamal Ahmed', 'Islam ,Derek J. Arnold', 'Math,A. M. Harun ar Rashid', 'Math,Md Kamal Ahmed', 'English -2,A. M. Harun ar Rashid', 'Realigion,Bikash Chandro Roy'),
(22, 'Ten', 'Commerce', 'Sat', 'Bangla,Md Kamal Ahmed', 'English,Md Kamal Ahmed', 'Math,Md Kamal Ahmed', 'Science,Most Mohona Begum', 'Math,Md Kamal Ahmed', 'Math,Md Asraful Islam ', 'Bangla-2,Md Kamal Ahmed', 'General Science,Most Bilkis Begum'),
(23, 'Nine', 'Science', 'Thu', 'Bangla,A. M. Harun ar Rashid', 'English,Most Bilkis Begum', 'Math,Most Mohona Begum', 'Islam ,Derek J. Arnold', 'Physics,Md Asraful Islam ', 'biology,Most Bilkis Begum', 'Math,Most Mohona Begum', 'Realigion,Md Asraful Islam '),
(24, 'Nine', 'Science', 'Mon', 'Bangla,A. M. Harun ar Rashid', 'English,Most Mohona Begum', 'Math,Most Mohona Begum', 'Islam ,Most Bilkis Begum', 'Physical education,Md Asraful Islam ', 'biology,Md Asraful Islam ', 'Math,Most Bilkis Begum', 'Realigion,Most Bilkis Begum'),
(25, 'Nine', 'Arts', 'Sat', 'Bangla,Md Asraful Islam ', 'English,Derek J. Arnold', 'Math,Most Bilkis Begum', 'Science,A. M. Harun ar Rashid', 'Physical education,Md Kamal Ahmed', 'English -2,A. M. Harun ar Rashid', 'Bangla-2,A. M. Harun ar Rashid', 'Political Science,A. M. Harun ar Rashid'),
(26, 'Nine', 'Arts', 'Sun', 'Bangla,Md Kamal Ahmed', 'English,A. M. Harun ar Rashid', 'Math,Most Bilkis Begum', 'Islam ,Most Mohona Begum', 'Math,A. M. Harun ar Rashid', 'Math,Md Kamal Ahmed', 'Math,Md Kamal Ahmed', 'Political Science,Most Bilkis Begum'),
(27, 'Nine', 'Arts', 'Mon', 'Bangla,A. M. Harun ar Rashid', 'English,Md Kamal Ahmed', 'Math,Md Kamal Ahmed', 'Islam ,Most Mohona Begum', 'Physical education,Md Kamal Ahmed', 'English -2,A. M. Harun ar Rashid', 'Bangla-2,A. M. Harun ar Rashid', 'Political Science,Most Bilkis Begum'),
(28, 'Nine', 'Arts', 'Tue', 'Islam ,Md Kamal Ahmed', 'English,Md Asraful Islam ', 'Math,Most Bilkis Begum', 'Islam ,Most Mohona Begum', 'Physical education,A. M. Harun ar Rashid', 'English -2,Md Asraful Islam ', 'Math,Most Bilkis Begum', 'Political Science,Most Bilkis Begum'),
(29, 'Nine', 'Arts', 'Wed', 'Bangla,Md Asraful Islam ', 'English -1,Most Bilkis Begum', 'Math,Most Bilkis Begum', 'Islam ,Most Mohona Begum', 'Physical education,A. M. Harun ar Rashid', 'English -2,Md Asraful Islam ', 'Math,A. M. Harun ar Rashid', 'Political Science,Most Bilkis Begum'),
(30, 'Nine', 'Arts', 'Thu', 'Bangla,Md Asraful Islam ', 'English,Md Asraful Islam ', 'Math,A. M. Harun ar Rashid', 'Science,Md Asraful Islam ', 'Math,Md Kamal Ahmed', 'English -2,Md Asraful Islam ', 'Bangla-2,Derek J. Arnold', 'Science,Bikash Chandro Roy'),
(31, 'Nine', 'Commerce', 'Sun', 'Islam ,Md Kamal Ahmed', 'English,Most Mohona Begum', 'Math,A. M. Harun ar Rashid', 'Accounting ,Most Mohona Begum', 'Physical education,A. M. Harun ar Rashid', 'English -2,Most Bilkis Begum', 'Bangla-2,Md Asraful Islam ', 'General Science,Most Bilkis Begum'),
(32, 'Nine', 'Commerce', 'Mon', 'Bangla,Md Kamal Ahmed', 'English,A. M. Harun ar Rashid', 'Math,Md Kamal Ahmed', 'Accounting ,Most Bilkis Begum', 'Business Manage,Md Kamal Ahmed', 'English -2,A. M. Harun ar Rashid', 'Math,Md Asraful Islam ', 'Realigion,Most Mohona Begum'),
(33, 'Nine', 'Commerce', 'Tue', 'Bangla,A. M. Harun ar Rashid', 'English,Most Mohona Begum', 'Math,Md Asraful Islam ', 'Accounting ,Most Bilkis Begum', 'Business Manage,A. M. Harun ar Rashid', 'Math,Md Asraful Islam ', 'Bangla-2,Most Bilkis Begum', 'Science,Most Bilkis Begum'),
(34, 'Nine', 'Commerce', 'Wed', 'Bangla,Most Bilkis Begum', 'English -1,Most Bilkis Begum', 'Math,Most Bilkis Begum', 'Accounting ,Most Mohona Begum', 'Math,A. M. Harun ar Rashid', 'English -2,Md Asraful Islam ', 'English -2,Most Mohona Begum', 'Political Science,Most Bilkis Begum'),
(35, 'Nine', 'Commerce', 'Thu', 'Bangla,A. M. Harun ar Rashid', 'English,A. M. Harun ar Rashid', 'Math,Md Asraful Islam ', 'Accounting ,Most Mohona Begum', 'Physical education,A. M. Harun ar Rashid', 'biology,Most Mohona Begum', 'Math,Md Asraful Islam ', 'General Science,Most Bilkis Begum');

-- --------------------------------------------------------

--
-- Table structure for table `routine_class_time`
--

CREATE TABLE `routine_class_time` (
  `id` int(11) NOT NULL,
  `1_period` varchar(255) NOT NULL,
  `2_period` varchar(255) NOT NULL,
  `3_period` varchar(255) NOT NULL,
  `4_period` varchar(255) NOT NULL,
  `5_period` varchar(255) NOT NULL,
  `6_period` varchar(255) NOT NULL,
  `7_period` varchar(255) NOT NULL,
  `8_period` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `routine_class_time`
--

INSERT INTO `routine_class_time` (`id`, `1_period`, `2_period`, `3_period`, `4_period`, `5_period`, `6_period`, `7_period`, `8_period`) VALUES
(1, '8:00-8:45', '9:00-9:45', '10:00-10:45', '11:00-11:45', '12:00-12:45', '1:00-1:45', '2:00-2:45', '3:00-3:45');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `shifted_status` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_logo` varchar(255) NOT NULL,
  `welcome_messege` text NOT NULL,
  `principle_image` text NOT NULL,
  `principle_message` text NOT NULL,
  `school_address` text NOT NULL,
  `school_phone` varchar(100) NOT NULL,
  `school_email` varchar(255) NOT NULL,
  `school_image` text NOT NULL,
  `school_about` text NOT NULL,
  `facebook_link` text NOT NULL,
  `youtube_link` text NOT NULL,
  `principle_sign` text NOT NULL,
  `register_sign` text NOT NULL,
  `additional_sign` text NOT NULL,
  `slider_image_1` text NOT NULL,
  `slider_image_2` text NOT NULL,
  `slider_image_3` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `shifted_status`, `school_name`, `school_logo`, `welcome_messege`, `principle_image`, `principle_message`, `school_address`, `school_phone`, `school_email`, `school_image`, `school_about`, `facebook_link`, `youtube_link`, `principle_sign`, `register_sign`, `additional_sign`, `slider_image_1`, `slider_image_2`, `slider_image_3`) VALUES
(1, 92, 'Polytechnic Institute Secondery School', 'upload/logo1_f79.jpg', 'Polytechnic Institute Secondary School, Kurigram. Patrick Henry Academy is committed to an environment where everyone is treated with dignity and respect. Explore our website and learn more about the school that we love so much! ', 'upload/images (26)_2ee.jpg', 'Dear Students, Staff and Parents:\r\n\r\nWelcome to the 2018-2019 school year! Our commitment at Polytechnic Institute Secondary School High School is to provide a safe and intellectually challenging environment that will empower students to become innovative thinkers, creative problem solvers and inspired learners prepared to thrive in the twenty-first century.\r\n\r\nHigh standards and expectations for each student in regard to academic performance, co-curricular participation, and responsible citizenship are the foundation of our school. It is with pride that we hold these high standards and ask each of our students to commit to maintaining the extraordinary record of achievement and contribution that has been the legacy of Weston High School students. It is the contribution of our students to our school community that makes Weston High School an exceptional learning community. Full participation in academic and co-curricular programs and a willingness to act responsibly as an individual within our educational environment are the factors that enable all to have a successful and enjoyable year.', 'Kurigram,sador-7665', '01857945632', 'principle@gmail.com', 'upload/maxresdefault_305.jpg', 'Our school is so beautiful  and environment is suitable for study.', 'http://bit.ly/2zB18lF', 'https://www.youtube.com/channel/UCHeq4DXU6Z3TLSfJD2tNhTg', 'upload/podarSign_843.png', 'upload/studentSign_ae3.png', 'upload/studentSign_d8d.png', 'upload/junior-school-slider-1_98d.jpg', 'upload/maxresdefaghjult_95a.jpg', 'upload/BodyImage-Farnboro-01_b08.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendance`
--

CREATE TABLE `staff_attendance` (
  `id` int(11) NOT NULL,
  `staff_id` text CHARACTER SET latin1 NOT NULL,
  `attendance_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_attendance`
--

INSERT INTO `staff_attendance` (`id`, `staff_id`, `attendance_date`) VALUES
(1, '203001,203002,203003', '2018-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `students_attendances`
--

CREATE TABLE `students_attendances` (
  `id` int(11) NOT NULL,
  `roll` varchar(255) CHARACTER SET latin1 NOT NULL,
  `class` varchar(255) CHARACTER SET latin1 NOT NULL,
  `attendance_date` date NOT NULL,
  `teacher_id` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students_attendances`
--

INSERT INTO `students_attendances` (`id`, `roll`, `class`, `attendance_date`, `teacher_id`) VALUES
(9, '1,2,3', 'Ten(Commerce)', '2018-11-03', '102001'),
(10, '1,3,4', 'Nine(Commerce)', '2018-11-03', '102001'),
(11, '1,2,3,4', 'Nine(Science)', '2018-11-03', '102001'),
(12, '1,2,4', 'Six', '2018-11-03', '102001'),
(13, '1,2,3,7,9,10,13', 'Seven', '2018-11-03', '102001'),
(14, '1,3,9', 'Seven', '2018-11-05', ''),
(15, '1,2,3,4', 'Eight', '2018-11-03', '102001'),
(16, '1,2,3', 'Ten(Arts)', '2018-11-03', '102001'),
(17, '1,2,3,4,5,6,7,8,9,10,13,14', 'Six', '2018-11-13', '102001'),
(18, '1,3,5', 'Nine(Commerce)', '2018-11-16', '102001'),
(19, '1,2,3', 'Nine(Commerce)', '2018-11-07', '');

-- --------------------------------------------------------

--
-- Table structure for table `students_fees`
--

CREATE TABLE `students_fees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `roll` int(11) NOT NULL,
  `class` varchar(255) CHARACTER SET latin1 NOT NULL,
  `fees` varchar(255) CHARACTER SET latin1 NOT NULL,
  `stu_group` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `fees_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students_fees`
--

INSERT INTO `students_fees` (`id`, `name`, `roll`, `class`, `fees`, `stu_group`, `fees_date`) VALUES
(1, 'Md Kobir Islam', 2, 'Six', '100', '', '2018-11-03 06:01:21'),
(2, 'Md Kobir Islam', 2, 'Six', '100', '', '2018-11-03 06:10:22'),
(3, 'Md Mamunur Rashid', 1, 'Nine', '500', 'Science', '2018-11-04 04:56:22'),
(4, 'Md Mamunur Rashid', 1, 'Six', '100', '', '2018-11-04 05:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `student_monthly_fees`
--

CREATE TABLE `student_monthly_fees` (
  `id` int(11) NOT NULL,
  `class` varchar(255) CHARACTER SET latin1 NOT NULL,
  `fees` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_monthly_fees`
--

INSERT INTO `student_monthly_fees` (`id`, `class`, `fees`) VALUES
(1, 'Six', '1000'),
(2, 'Seven', '1000'),
(3, 'Eight', '1000'),
(4, 'Nine(Science)', '1000'),
(5, 'Nine(Commerce)', '1000'),
(6, 'Nine(Arts)', '1000'),
(7, 'Ten(Science)', '1000'),
(8, 'Ten(Commerce)', '1000'),
(9, 'Ten(Arts)', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'adminName', 'info@highschool.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance`
--

CREATE TABLE `teacher_attendance` (
  `id` int(11) NOT NULL,
  `teacher_id` text CHARACTER SET latin1 NOT NULL,
  `attendance_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`id`, `teacher_id`, `attendance_date`) VALUES
(1, '102001', '2018-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `total_communication`
--

CREATE TABLE `total_communication` (
  `id` int(11) NOT NULL,
  `mobile` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `total_communication`
--

INSERT INTO `total_communication` (`id`, `mobile`, `email`, `description`) VALUES
(1, '01730233032', 'mamunur200020@gmail.com', 'Hi Mamun,\r\nSMS From KPISMS'),
(2, '01785990416', '', 'test message'),
(3, '01774596411', '', 'hello'),
(4, '01774596411', '', 'http://www.kpisms.com/w/home'),
(5, '01744821576', '', 'You have got $1 million dollar from international switch bank. So receive this money from Bangladesh Bank.\r\nYou created account number: 495394594659'),
(6, '01738054889', '', 'hello'),
(7, '01730233032', 'mamunur200020@gmail.com', 'hello student or teachers'),
(8, '+8801750084645', '', 'test sms'),
(9, '01776537394', '', ' Hey Jaan! I Miss You & also\r\n I love You....\r\nJanPL');

-- --------------------------------------------------------

--
-- Table structure for table `total_complain`
--

CREATE TABLE `total_complain` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `total_complain`
--

INSERT INTO `total_complain` (`id`, `subject`, `mobile`, `description`, `status`) VALUES
(5, NULL, '01773166233', 'dfghakhf', 0),
(6, NULL, 'roymrinal462@gmail.com', 'dear friend mamun....absulutly nice website....', 0),
(4, NULL, '01730233032', '5t546y5y5 56y645 67y', 1),
(7, NULL, 'fghfgh', ' vbvcbv', 0);

-- --------------------------------------------------------

--
-- Table structure for table `total_staff`
--

CREATE TABLE `total_staff` (
  `id` int(11) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `gender` varchar(255) CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `birth_date` date NOT NULL,
  `mobile` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `address` text NOT NULL,
  `national_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `education` text NOT NULL,
  `designation` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `total_staff`
--

INSERT INTO `total_staff` (`id`, `staff_name`, `father_name`, `mother_name`, `gender`, `image`, `birth_date`, `mobile`, `email`, `address`, `national_id`, `education`, `designation`) VALUES
(203001, 'Akhi Akter ', 'Mr Joseph Doe', 'Loren Doe', 'Female', 'upload/33a5574ca9fd96fbbae8f6c42f72fc.jpg', '2018-11-07', '01445121545', 'akiakter45454@gmail.com', 'kurigram, Najira ,  kurigram,    kurigram', '789678345435656', 'J.S.C', 'Cooker'),
(203002, 'Najmul Hasan', 'Nahid Hasan', 'Momota Begum', 'Male', 'upload/261212310e53def72592960cd2a75f.jpg', '1995-11-16', '01885326981', 'najmul@gmail.com', 'kurigram, kurigram, kurigram, kurigram', '123456987321', 'S.S.S', 'Pion'),
(203003, 'Jahid Hasan', 'Md Pikul Islam', 'Most Mina Begum', 'Male', 'upload/38ad2626a2a43bb95d6f0b71bec450.jpg', '1997-11-13', '01785326903', 'jahid566@gmail.com', 'kurigram,Najira , kurigram, kurigram, kurigram', '123654123667', 'J.S.C', 'Sweeper'),
(203004, 'Most Momena Begum', 'Md Jamal Ahmed', 'Most Momana Begum', 'Male', 'upload/13eb158378ee8675a0eefa7ee2dd72.png', '1990-11-08', '01730233033', 'momena@gmail.com', 'Nagira,Munsipara, kurigram, Kurigram, Kurigram', '12324343455454475489', 'HSC', 'Peon'),
(203005, 'Md Kamal Hossain', 'Md Jamal Ahmed', 'Most Momana Begum', 'Male', 'upload/ba04f414ab469ba1ec43f6a70fa88e.png', '1990-11-08', '01730233030', 'momena@gmail.com', 'Nagira,Munsipara, kurigram, Kurigram, Kurigram', '12324343455454475489', 'HSC', 'Peon');

-- --------------------------------------------------------

--
-- Table structure for table `total_teachers`
--

CREATE TABLE `total_teachers` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `birth_date` date NOT NULL,
  `mobile` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` text NOT NULL,
  `national_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `education` text NOT NULL,
  `designation` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '123456'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `total_teachers`
--

INSERT INTO `total_teachers` (`id`, `teacher_name`, `father_name`, `mother_name`, `gender`, `image`, `birth_date`, `mobile`, `email`, `address`, `national_id`, `education`, `designation`, `password`) VALUES
(102001, 'Md Kamal Ahmed', 'Md Jamal Ahmed', 'Most Momana Begum', 'Male', 'upload/0ea8ff3661c8b56ae21dc30a45e1af.jpg', '1990-11-27', '01730233032', 'mamunur200020@gmail.com', 'Dabalaya,     Chinnai,     Rajarhut,     Kurigram', '00054504565654504', 'Bsc in math', 'Principle', '123456'),
(102002, 'A. M. Harun ar Rashid', 'Md Monir Islam babu', 'Most Jahanara Begum', 'Male', 'upload/3a3b81efd6fee2a00ceb6ebee30ecf.jpg', '1990-11-22', '01785326993', 'harun9988@gmail.com', 'kurigram,Najira , kurigram, kurigram, kurigram', '123654123654', 'B.C.S  English', 'Principle', '123456'),
(102003, 'Md Asraful Islam ', 'Md Jobed Islam', 'Most Bilkis Begum', 'Male', 'upload/0d9c41a9c7c319b3a6ef9eeac1bb5f.jpg', '1990-11-08', '0178536981', 'asraful8799@gmail.com', 'Rajerhat, kurigram, kurigram, kurigram', '123654123657', 'B.S.C in physics', 'Asistant Principle', '123456'),
(102004, 'Most Bilkis Begum', 'Md Asad Islam', 'Most Rickta  Begum', 'Female', 'upload/a2e9dd8469c9e0f2c665dd2c9044e9.jpg', '1990-11-19', '01745326982', 'bilkis7896@gmail.com', 'kurigram,  Nilaram,  kurigram,  kurigram', '123654123659', 'B.S.C in chemistry', 'Asistant Teacher', '123456'),
(102005, 'Most Mohona Begum', 'Md Anwr Islam', 'Most Silpi Begum', 'Female', 'upload/4c088ae3fb1d1197069e0c23bb3d61.jpg', '1991-11-13', '01785366983', 'mohona5465@gmail.com', 'kurigram,  kurigram,  kurigram,  kurigram', '123654123658', 'B.S.C  in bangla ', 'Asistant Teacher', '123456'),
(102006, 'Derek J. Arnold', 'Md Pikul Islam', 'Most Misty Begum', 'Male', 'upload/74c463d4d3988e61f7370ec9533c63.jpg', '1990-11-20', '01785926987', 'derek988@gmail.com', 'kurigram, kurigram, kurigram, kurigram', '123654123645', 'B.S.C in  math', 'Asistant Teacher', '123456'),
(102007, 'Bikash Chandro Roy', 'Bidash Chandro Roy', 'Binoti Rani Roy', 'Male', 'upload/77acae4098dbc548ad687ce42a0bd3.jpg', '1992-11-19', '01785326182', 'bikash@gmail.com', 'kurigram, kurigram, kurigram, kurigram', '123644123658', 'B.S.C in religion', 'Asistant Teacher', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_students`
--
ALTER TABLE `admission_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_eight_results`
--
ALTER TABLE `class_eight_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_eight_students`
--
ALTER TABLE `class_eight_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_nine_results`
--
ALTER TABLE `class_nine_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_nine_students`
--
ALTER TABLE `class_nine_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_seven_results`
--
ALTER TABLE `class_seven_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_seven_students`
--
ALTER TABLE `class_seven_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_six_results`
--
ALTER TABLE `class_six_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_six_students`
--
ALTER TABLE `class_six_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_ten_results`
--
ALTER TABLE `class_ten_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_ten_students`
--
ALTER TABLE `class_ten_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `old_students`
--
ALTER TABLE `old_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_admission`
--
ALTER TABLE `online_admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routine_class_time`
--
ALTER TABLE `routine_class_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_attendances`
--
ALTER TABLE `students_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_fees`
--
ALTER TABLE `students_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_monthly_fees`
--
ALTER TABLE `student_monthly_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_communication`
--
ALTER TABLE `total_communication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_complain`
--
ALTER TABLE `total_complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_staff`
--
ALTER TABLE `total_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_teachers`
--
ALTER TABLE `total_teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission_students`
--
ALTER TABLE `admission_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class_eight_results`
--
ALTER TABLE `class_eight_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class_eight_students`
--
ALTER TABLE `class_eight_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `class_nine_results`
--
ALTER TABLE `class_nine_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `class_nine_students`
--
ALTER TABLE `class_nine_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `class_seven_results`
--
ALTER TABLE `class_seven_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `class_seven_students`
--
ALTER TABLE `class_seven_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `class_six_results`
--
ALTER TABLE `class_six_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `class_six_students`
--
ALTER TABLE `class_six_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `class_ten_results`
--
ALTER TABLE `class_ten_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class_ten_students`
--
ALTER TABLE `class_ten_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `old_students`
--
ALTER TABLE `old_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `online_admission`
--
ALTER TABLE `online_admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `routine_class_time`
--
ALTER TABLE `routine_class_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students_attendances`
--
ALTER TABLE `students_attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `students_fees`
--
ALTER TABLE `students_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_monthly_fees`
--
ALTER TABLE `student_monthly_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `total_communication`
--
ALTER TABLE `total_communication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `total_complain`
--
ALTER TABLE `total_complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `total_staff`
--
ALTER TABLE `total_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203006;

--
-- AUTO_INCREMENT for table `total_teachers`
--
ALTER TABLE `total_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102008;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

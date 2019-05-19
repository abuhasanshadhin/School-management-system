-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2018 at 04:11 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `high_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission_students`
--

CREATE TABLE `admission_students` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `father_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mother_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` text NOT NULL,
  `birth_date` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 NOT NULL,
  `result` int(11) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission_students`
--

INSERT INTO `admission_students` (`id`, `student_name`, `father_name`, `mother_name`, `gender`, `image`, `birth_date`, `mobile`, `result`, `address`) VALUES
(2, 'Md Mamunur Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', '', 'upload/b45bf29df1b9442a6bddf908d1f482.jpg', '2018-10-18', '01730233032', 5, 'Dabalaya, Chinnai, Rajarhut, Kurigram'),
(3, 'Md Mamunur Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', 'Male', 'upload/1e73ac17cfbe5fba2a991470a728a3.jpg', '1998-29-11', '01730233032', 5, 'Dabalaya, Chinnai, Rajarhut, Kurigram');

-- --------------------------------------------------------

--
-- Table structure for table `class_eight_results`
--

CREATE TABLE `class_eight_results` (
  `id` int(11) NOT NULL,
  `roll` varchar(255) CHARACTER SET utf8 NOT NULL,
  `student_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `sub_mark` varchar(255) CHARACTER SET utf8 NOT NULL,
  `point` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_eight_students`
--

CREATE TABLE `class_eight_students` (
  `id` int(11) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `student_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `father_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mother_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf16 NOT NULL,
  `birth_date` date NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_nine_results`
--

CREATE TABLE `class_nine_results` (
  `id` int(11) NOT NULL,
  `roll` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sub_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sub_mark` varchar(255) NOT NULL,
  `point` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `stu_group` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_nine_students`
--

CREATE TABLE `class_nine_students` (
  `id` int(11) NOT NULL,
  `roll` varchar(255) CHARACTER SET utf8 NOT NULL,
  `student_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `father_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mother_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `birth_date` date NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `stu_group` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_nine_students`
--

INSERT INTO `class_nine_students` (`id`, `roll`, `student_name`, `father_name`, `mother_name`, `gender`, `image`, `birth_date`, `mobile`, `stu_group`, `result`, `address`) VALUES
(1, '1', 'Md Mamunur Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', 'Male', 'upload/d31f55a4572bc2706ae8028d67390a.png', '1998-11-29', '01730233033', 'Commerce', '5.00', 'Dabalaya, Chinnai, Rajarhut, Kurigram'),
(2, '2', 'Md Mamunur Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', 'Male', 'upload/78d8fa0cf3f89ed808b8391e16ac40.png', '1998-11-29', '01730233033', 'Commerce', '5.00', 'Dabalaya, Chinnai, Rajarhut, Kurigram'),
(3, '3', 'Md Mamunur Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', 'Male', 'upload/0f99f487352fb1bc7e35d3897c458b.png', '1998-11-11', '01730233032', 'Science', '5.00', 'Dabalaya, Chinnai, Rajarhut, Kurigram');

-- --------------------------------------------------------

--
-- Table structure for table `class_seven_results`
--

CREATE TABLE `class_seven_results` (
  `id` int(11) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `sub_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sub_mark` varchar(255) CHARACTER SET utf8 NOT NULL,
  `point` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_seven_students`
--

CREATE TABLE `class_seven_students` (
  `id` int(11) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `student_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `father_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mother_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(255) CHARACTER SET ucs2 NOT NULL,
  `image` text CHARACTER SET utf8 NOT NULL,
  `birth_date` date NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 NOT NULL,
  `result` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_six_results`
--

CREATE TABLE `class_six_results` (
  `id` int(11) NOT NULL,
  `roll` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sub_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sub_mark` varchar(255) CHARACTER SET utf8 NOT NULL,
  `point` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_six_students`
--

CREATE TABLE `class_six_students` (
  `id` int(11) NOT NULL,
  `roll` varchar(255) CHARACTER SET utf8 NOT NULL,
  `student_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `father_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mother_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(255) CHARACTER SET utf32 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 NOT NULL,
  `result` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_six_students`
--

INSERT INTO `class_six_students` (`id`, `roll`, `student_name`, `father_name`, `mother_name`, `gender`, `image`, `birth_date`, `mobile`, `result`, `address`) VALUES
(1, '1', 'Md Mamunur Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', 'Male', 'upload/b8f6168c06fea8cbb30a0d252dd0f6.jpg', '1998-29-11', '01730233032', '5.00', 'Dabalaya, Chinnai, Rajarhut, Kurigram'),
(2, '2', 'Md Mamunur Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', 'Male', 'upload/b09fc842076fb61197a44388532d47.jpg', '1998-11-29', '01730233032', '5.00', 'Dabalaya, Chinnai, Rajarhut, Kurigram');

-- --------------------------------------------------------

--
-- Table structure for table `class_ten_results`
--

CREATE TABLE `class_ten_results` (
  `id` int(11) NOT NULL,
  `roll` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sub_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sub_mark` varchar(255) NOT NULL,
  `point` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `stu_group` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_ten_students`
--

CREATE TABLE `class_ten_students` (
  `id` int(11) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `student_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `father_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mother_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `birth_date` date NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `stu_group` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_ten_students`
--

INSERT INTO `class_ten_students` (`id`, `roll`, `student_name`, `father_name`, `mother_name`, `gender`, `image`, `birth_date`, `mobile`, `stu_group`, `result`, `address`) VALUES
(1, '1', 'Md Mamunur Rashid', 'Md Mijanur Rahman', 'Most Lucky Begum', 'Female', 'upload/690cbc889ee0ca2aaff721c4179f8f.jpeg', '1998-11-29', '01730233032', 'Arts', '5.00', 'Dabalaya, Chinnai, Rajarhut, Kurigram');

-- --------------------------------------------------------

--
-- Table structure for table `students_attendances`
--

CREATE TABLE `students_attendances` (
  `id` int(11) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `attendance_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students_fees`
--

CREATE TABLE `students_fees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL,
  `student_group` varchar(255) NOT NULL,
  `fees_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_monthly_fees`
--

CREATE TABLE `student_monthly_fees` (
  `id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teachers_attendance`
--

CREATE TABLE `teachers_attendance` (
  `id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `teachers_id` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `total_staff`
--

CREATE TABLE `total_staff` (
  `id` int(11) NOT NULL,
  `staff_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `father_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mother_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `national_id` varchar(255) NOT NULL,
  `education` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `total_teachers`
--

CREATE TABLE `total_teachers` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `father_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mother_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `national_id` varchar(255) NOT NULL,
  `education` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_students`
--
ALTER TABLE `admission_students`
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
-- Indexes for table `teachers_attendance`
--
ALTER TABLE `teachers_attendance`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `class_eight_results`
--
ALTER TABLE `class_eight_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class_eight_students`
--
ALTER TABLE `class_eight_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class_nine_results`
--
ALTER TABLE `class_nine_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class_nine_students`
--
ALTER TABLE `class_nine_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `class_seven_results`
--
ALTER TABLE `class_seven_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class_seven_students`
--
ALTER TABLE `class_seven_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class_six_results`
--
ALTER TABLE `class_six_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class_six_students`
--
ALTER TABLE `class_six_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `class_ten_results`
--
ALTER TABLE `class_ten_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class_ten_students`
--
ALTER TABLE `class_ten_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `students_attendances`
--
ALTER TABLE `students_attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students_fees`
--
ALTER TABLE `students_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_monthly_fees`
--
ALTER TABLE `student_monthly_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teachers_attendance`
--
ALTER TABLE `teachers_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `total_staff`
--
ALTER TABLE `total_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `total_teachers`
--
ALTER TABLE `total_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

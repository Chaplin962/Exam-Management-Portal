-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2022 at 02:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_list`
--

CREATE TABLE `admin_list` (
  `id` int(25) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`id`, `email`) VALUES
(22, 'toemptest@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE `student_list` (
  `id` int(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `courses_no` int(2) NOT NULL DEFAULT 0,
  `course_1` varchar(255) NOT NULL DEFAULT '-',
  `course_2` varchar(255) NOT NULL DEFAULT '-',
  `course_3` varchar(255) NOT NULL DEFAULT '-',
  `course_4` varchar(255) NOT NULL DEFAULT '-',
  `course_5` varchar(255) NOT NULL DEFAULT '-',
  `course_6` varchar(255) NOT NULL DEFAULT '-',
  `course_7` varchar(255) NOT NULL DEFAULT '-',
  `course_8` varchar(255) NOT NULL DEFAULT '-',
  `course_9` varchar(255) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`id`, `email`, `student_id`, `name`, `courses_no`, `course_1`, `course_2`, `course_3`, `course_4`, `course_5`, `course_6`, `course_7`, `course_8`, `course_9`) VALUES
(8, '19bcs004@iiitdwd.ac.in', '19bcs004', '', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(9, '19bcs003@iiitdwd.ac.in', '19bcs003', '', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_list`
--

CREATE TABLE `teacher_list` (
  `id` int(25) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_list`
--

INSERT INTO `teacher_list` (`id`, `name`, `email`) VALUES
(4, 'arya', 'toabhishekarya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_sign`
--

CREATE TABLE `user_sign` (
  `id` int(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `signstatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sign`
--

INSERT INTO `user_sign` (`id`, `email`, `password`, `role`, `signstatus`) VALUES
(4, 'toabhishekarya@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'Teacher', 1),
(7, '19bcs088@iiitdwd.ac.in', '0cc175b9c0f1b6a831c399e269772661', 'Student', 1),
(8, 'toemptest@gmail.com', 'a57c2e82f05ebce22109b3ada72a3f65', 'Admin', 0),
(9, '19bcs003@iiitdwd.ac.in', 'd31a02f2c96079fc338e171626d412f0', 'Student', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_list`
--
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_list`
--
ALTER TABLE `teacher_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sign`
--
ALTER TABLE `user_sign`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_list`
--
ALTER TABLE `admin_list`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher_list`
--
ALTER TABLE `teacher_list`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sign`
--
ALTER TABLE `user_sign`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 29, 2023 at 04:04 PM
-- Server version: 10.3.38-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friendsi_db_sipi_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `fees_deposit`
--

CREATE TABLE `fees_deposit` (
  `s_no` int(250) NOT NULL,
  `date` varchar(30) NOT NULL,
  `user_id` int(250) NOT NULL,
  `technology` varchar(60) NOT NULL,
  `admission_year` varchar(20) NOT NULL,
  `current_semester` varchar(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `clg_id` varchar(20) NOT NULL,
  `roll_no` int(50) NOT NULL,
  `mobile_number` varchar(25) NOT NULL,
  `deposit_category` varchar(60) NOT NULL,
  `deposit_amount` int(50) NOT NULL,
  `comment` varchar(220) NOT NULL,
  `deposit_challan_no` int(250) NOT NULL,
  `inserter_id` int(35) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marks_db`
--

CREATE TABLE `marks_db` (
  `id` int(11) NOT NULL,
  `user_id` int(250) NOT NULL,
  `roll_no` int(250) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `technology` varchar(25) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `marks` int(100) NOT NULL,
  `inserter_id` int(35) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE `student_list` (
  `id` int(250) NOT NULL,
  `user_id` int(250) NOT NULL,
  `technology` varchar(25) NOT NULL,
  `admision_Year` varchar(20) NOT NULL,
  `current_semester` varchar(10) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `clg_id` varchar(20) NOT NULL,
  `roll_no` int(50) NOT NULL,
  `mobile_number` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `inserter_id` int(35) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stu_atten`
--

CREATE TABLE `stu_atten` (
  `id` int(255) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `att_date` varchar(200) NOT NULL,
  `technology` varchar(60) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `roll_no` int(255) NOT NULL,
  `stu_name` varchar(200) NOT NULL,
  `atten_status` varchar(20) NOT NULL,
  `att_month` varchar(10) NOT NULL,
  `att_year` varchar(10) NOT NULL,
  `inserter_id` int(35) NOT NULL,
  `insert_date_time` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject_by_semester`
--

CREATE TABLE `subject_by_semester` (
  `s_no` int(255) NOT NULL,
  `technology` varchar(30) NOT NULL DEFAULT 'RAC',
  `semester` varchar(20) NOT NULL DEFAULT '7th',
  `book_name` varchar(90) NOT NULL,
  `inserter_id` int(35) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `sno` int(200) NOT NULL,
  `type` int(1) NOT NULL DEFAULT 1,
  `w_type` int(5) NOT NULL,
  `user_id` int(20) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `technology` varchar(20) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL DEFAULT 'support@sipi.com',
  `position` varchar(20) NOT NULL DEFAULT 'JR Instructor',
  `inserter_id` int(35) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fees_deposit`
--
ALTER TABLE `fees_deposit`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `marks_db`
--
ALTER TABLE `marks_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stu_atten`
--
ALTER TABLE `stu_atten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_by_semester`
--
ALTER TABLE `subject_by_semester`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fees_deposit`
--
ALTER TABLE `fees_deposit`
  MODIFY `s_no` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks_db`
--
ALTER TABLE `marks_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stu_atten`
--
ALTER TABLE `stu_atten`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_by_semester`
--
ALTER TABLE `subject_by_semester`
  MODIFY `s_no` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `sno` int(200) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

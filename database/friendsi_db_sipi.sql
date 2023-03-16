-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2023 at 04:46 PM
-- Server version: 10.3.37-MariaDB-cll-lve
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
-- Database: `friendsi_db_sipi`
--

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
  `insert_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks_db`
--

INSERT INTO `marks_db` (`id`, `user_id`, `roll_no`, `user_name`, `semester`, `technology`, `subject`, `marks`, `insert_date`) VALUES
(37, 3225, 20, 'Talha', '4th', 'Computer', 'Web Development', 70, '2023-03-06 23:11:48'),
(38, 5251, 20, 'Talha', '4th', 'Computer', 'Web Development', 15, '2023-03-06 23:11:53'),
(39, 9294, 20, 'MR Computer', '4th', 'Computer', 'Web Development', 74, '2023-03-06 23:11:56'),
(40, 6269, 12, 'Xxx', '4th', 'Computer', 'Web Development', 56, '2023-03-06 23:11:59'),
(47, 6621, 88, 'MD Mafuz Alam', '7th', 'Computer', 'Cyber Security & Ethics', 60, '2023-03-09 01:39:24'),
(48, 7062, 89, 'MD Yeamin', '7th', 'Computer', 'Cyber Security & Ethics', 56, '2023-03-09 01:39:27'),
(49, 1953, 26, 'MD Suvo', '7th', 'Computer', 'Cyber Security & Ethics', 85, '2023-03-09 01:39:30'),
(50, 7991, 63, 'MD Sihan', '7th', 'Computer', 'Cyber Security & Ethics', 56, '2023-03-09 01:39:32'),
(51, 9061, 29, 'MD Munna', '7th', 'Computer', 'Cyber Security & Ethics', 56, '2023-03-09 01:39:35'),
(52, 4119, 91, 'Afsana Haque Riya', '7th', 'Computer', 'Cyber Security & Ethics', 45, '2023-03-09 01:39:38'),
(53, 6621, 88, 'MD Mafuz Alam', '7th', 'Computer', 'System Analysis & Design', 65, '2023-03-09 10:08:22'),
(54, 7062, 89, 'MD Yeamin', '7th', 'Computer', 'System Analysis & Design', 26, '2023-03-09 10:08:26'),
(55, 1953, 26, 'MD Suvo', '7th', 'Computer', 'System Analysis & Design', 49, '2023-03-09 10:08:29'),
(56, 7991, 63, 'MD Sihan', '7th', 'Computer', 'System Analysis & Design', 59, '2023-03-09 10:08:32'),
(57, 9061, 29, 'MD Munna', '7th', 'Computer', 'System Analysis & Design', 63, '2023-03-09 10:08:35'),
(58, 4119, 91, 'Afsana Haque Riya', '7th', 'Computer', 'System Analysis & Design', 47, '2023-03-09 10:08:38');

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
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`id`, `user_id`, `technology`, `admision_Year`, `current_semester`, `user_name`, `gender`, `clg_id`, `roll_no`, `mobile_number`, `email`, `insert_date`, `last_update`) VALUES
(1, 6621, 'Computer', '18-19', '7th', 'MD Mafuz Alam', 'Male', '395/18', 88, '01747503257', 'everythinggood885@gmail.com', '2023-03-08 13:06:21', '2023-03-08 19:39:04'),
(2, 7062, 'Computer', '18-19', '7th', 'MD Yeamin', 'Male', '396/18', 89, '01725841246', 'yeaminh849@gmail.com', '2023-03-08 13:09:49', '2023-03-08 19:39:04'),
(3, 1953, 'Computer', '18-19', '7th', 'MD Suvo', 'Male', '15/18', 26, '0111111111', 'suvo@sipi.com', '2023-03-08 13:10:56', '2023-03-08 19:39:04'),
(4, 7991, 'Computer', '18-19', '7th', 'MD Sihan', 'Male', '185/18', 63, '0177777777', 'sihan@sipi.com', '2023-03-08 13:11:38', '2023-03-08 19:39:04'),
(5, 9061, 'Computer', '18-19', '7th', 'MD Munna', 'Male', '345/18', 29, '01555555555', 'munna@sipi.com', '2023-03-08 13:14:39', '2023-03-08 19:39:04'),
(6, 4119, 'Computer', '18-19', '7th', 'Afsana Haque Riya', 'Female', '399/18', 91, '0166666666666', 'riya@sipi.com', '2023-03-08 13:15:32', '2023-03-08 19:39:04'),
(7, 9479, 'Graphic', '18-19', '8th', 'MD Graphic', 'Male', '185/18', 29, '01555555555', 'graphic@sipi.com', '2023-03-10 11:02:07', '2023-03-10 05:02:07'),
(8, 1444, 'Graphic', '18-19', '8th', 'MD Graphic 1', 'Male', '175/18', 46, '01555555565', 'graphic1@sipi.com', '2023-03-10 11:02:37', '2023-03-10 05:02:37'),
(9, 5747, 'Graphic', '18-19', '8th', 'MD Graphic 2', 'Male', '178/18', 48, '01555555578', 'graphic2@sipi.com', '2023-03-10 11:03:12', '2023-03-10 05:03:12'),
(10, 5744, 'RAC', '18-19', '8th', 'MD RAC', 'Male', '458/18', 36, '016666666666', 'rac@sipi.com', '2023-03-10 11:03:55', '2023-03-10 05:03:55'),
(11, 7454, 'RAC', '18-19', '8th', 'MD RAC 1', 'Male', '423/18', 27, '016666666666', 'rac2@sipi.com', '2023-03-10 11:04:31', '2023-03-10 05:04:31'),
(12, 8026, 'Civil', '18-19', '8th', 'MD Civil', 'Male', '712/18', 41, '0177777777', 'civil@sipi.com', '2023-03-10 11:05:03', '2023-03-10 05:05:03'),
(13, 7994, 'Civil', '18-19', '8th', 'MD Civil 1', 'Male', '278/18', 72, '01777777776', 'civil1@sipi.com', '2023-03-10 11:06:09', '2023-03-10 05:06:09'),
(14, 8295, 'Electronic', '18-19', '8th', 'MD Electronic', 'Male', '412/18', 26, '0188888888', 'electronic@sipi.com', '2023-03-10 11:09:15', '2023-03-10 05:09:15'),
(15, 8703, 'Electronic', '18-19', '8th', 'Ms Electronic 1', 'Female', '418/18', 19, '0188888889', 'electronic1@sipi.com', '2023-03-10 11:09:59', '2023-03-10 05:09:59'),
(16, 8437, 'Electrical', '18-19', '8th', 'MD Electrical', 'Male', '438/18', 75, '01999999999', 'electrical@sipi.com', '2023-03-10 11:11:36', '2023-03-10 05:11:36'),
(17, 6160, 'Electrical', '18-19', '8th', 'MD Electrical 1', 'Male', '468/18', 95, '01999999998', 'electrical1@sipi.com', '2023-03-10 11:12:10', '2023-03-10 05:12:10'),
(18, 5478, 'Electrical', '18-19', '8th', 'MD Electrical 1', 'Male', '468/18', 95, '01999999998', 'electrical1@sipi.com', '2023-03-10 11:14:52', '2023-03-10 05:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `stu_atten`
--

CREATE TABLE `stu_atten` (
  `id` int(255) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `att_date` varchar(200) NOT NULL,
  `roll_no` int(255) NOT NULL,
  `stu_name` varchar(200) NOT NULL,
  `atten_status` varchar(20) NOT NULL,
  `att_month` varchar(10) NOT NULL,
  `att_year` varchar(10) NOT NULL,
  `insert_date_time` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stu_atten`
--

INSERT INTO `stu_atten` (`id`, `user_id`, `att_date`, `roll_no`, `stu_name`, `atten_status`, `att_month`, `att_year`, `insert_date_time`) VALUES
(1, 6621, '10-03-2023', 88, 'MD Mafuz Alam', '1', '3', '2023', '2023-03-10 15:36:53.182276'),
(2, 7062, '10-03-2023', 89, 'MD Yeamin', '1', '3', '2023', '2023-03-10 15:36:54.553042'),
(3, 1953, '10-03-2023', 26, 'MD Suvo', '1', '3', '2023', '2023-03-10 15:36:55.406168'),
(4, 7991, '10-03-2023', 63, 'MD Sihan', '1', '3', '2023', '2023-03-10 15:36:56.437224'),
(5, 9061, '10-03-2023', 29, 'MD Munna', '1', '3', '2023', '2023-03-10 15:36:58.565890'),
(6, 4119, '10-03-2023', 91, 'Afsana Haque Riya', '1', '3', '2023', '2023-03-10 15:37:00.739122'),
(7, 6621, '10-03-2023', 88, 'MD Mafuz Alam', '0', '3', '2023', '2023-03-10 15:37:14.312368');

-- --------------------------------------------------------

--
-- Table structure for table `subject_by_semester`
--

CREATE TABLE `subject_by_semester` (
  `s_no` int(255) NOT NULL,
  `technology` varchar(30) NOT NULL DEFAULT 'RAC',
  `semester` varchar(20) NOT NULL DEFAULT '7th',
  `book_name` varchar(35) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_by_semester`
--

INSERT INTO `subject_by_semester` (`s_no`, `technology`, `semester`, `book_name`, `insert_date`, `last_update`) VALUES
(1, 'Computer', '1st', 'Mathematics 1', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(2, 'Computer', '1st', 'Computer application', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(3, 'Computer', '1st', 'Physics 1', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(4, 'Computer', '1st', 'Electrical engineering fundamentals', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(5, 'Computer', '1st', 'English', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(6, 'Computer', '1st', 'Physical education & life skills de', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(7, 'Computer', '1st', 'Bangla', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(8, 'Computer', '2nd', 'Database Application', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(9, 'Computer', '2nd', 'Mathematics 2', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(10, 'Computer', '2nd', 'IT support System-I', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(11, 'Computer', '2nd', 'Physics 2', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(12, 'Computer', '2nd', 'Graphics Design-I', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(13, 'Computer', '2nd', 'Communicative English', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(14, 'Computer', '2nd', 'Analog Electronics', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(15, 'Computer', '3rd', 'Programming Essentials', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(16, 'Computer', '3rd', 'Mathematics 3', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(17, 'Computer', '3rd', 'Web Design', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(18, 'Computer', '3rd', 'Chemistry', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(19, 'Computer', '3rd', 'Graphics design‐II', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(20, 'Computer', '3rd', 'Social Science', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(21, 'Computer', '3rd', 'IT support System‐II', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(22, 'Computer', '4th', 'Object-Oriented Programming', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(23, 'Computer', '4th', 'Web Development', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(24, 'Computer', '4th', 'Data Structure & Algorithm', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(25, 'Computer', '4th', 'Computer Peripherals', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(26, 'Computer', '4th', 'Data Communication System', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(27, 'Computer', '4th', 'Business Organization & Communicati', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(28, 'Computer', '4th', 'The principle of Digital Electronic', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(29, 'Computer', '5th', 'Programming in Java', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(30, 'Computer', '5th', 'Surveillance Security System', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(31, 'Computer', '5th', 'Web Development Project', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(32, 'Computer', '5th', 'Operating Systems application', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(33, 'Computer', '5th', 'PCB Design and Circuit Making', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(34, 'Computer', '5th', 'Accounting Theory & Practice', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(35, 'Computer', '5th', 'Sequential Logic System', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(36, 'Computer', '6th', 'Principals of Software Engineering', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(37, 'Computer', '6th', 'Microcontroller Application', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(38, 'Computer', '6th', 'Microprocessor & Interfacing', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(39, 'Computer', '6th', 'Optional Subject', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(40, 'Computer', '6th', 'Database Management System', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(41, 'Computer', '6th', 'Industrial Management', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(42, 'Computer', '6th', 'Environmental Studies', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(43, 'Computer', '7th', 'System Analysis & Design', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(44, 'Computer', '7th', 'E‐Commerce & CMS', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(45, 'Computer', '7th', 'Network Administration & Services', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(46, 'Computer', '7th', 'Cyber Security & Ethics', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(47, 'Computer', '7th', 'Innovation & Entrepreneurship', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(48, 'Computer', '7th', 'Apps Development Project', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(49, 'Computer', '7th', 'Optional Subject‐II', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(50, 'Electronics', '1st', 'Basic Electronics', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(51, 'Electronics', '1st', 'Engineering Drawing', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(52, 'Electronics', '1st', 'Electrical Engineering Fundamentals', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(53, 'Electronics', '1st', 'Mathematics‐1', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(54, 'Electronics', '1st', 'Social Science', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(55, 'Electronics', '1st', 'Physical education & Life Skill Dev', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(56, 'Electronics', '2nd', 'Electronic Devices and Circuits', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(57, 'Electronics', '2nd', 'Computer Application', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(58, 'Electronics', '2nd', 'Physics‐1', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(59, 'Electronics', '2nd', 'Mathematics‐2', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(60, 'Electronics', '2nd', 'Bangla', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(61, 'Electronics', '2nd', 'English', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(62, 'Electronics', '3rd', 'Advanced Electronic Devices and Cir', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(63, 'Electronics', '3rd', 'PCB Design and Prototyping', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(64, 'Electronics', '3rd', 'Electronic Appliances', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(65, 'Electronics', '3rd', 'Basic Communication Engineering', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(66, 'Electronics', '3rd', 'Physics‐2', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(67, 'Electronics', '3rd', 'Mathematics‐3', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(68, 'Electronics', '3rd', 'Communicative English', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(69, 'Electronics', '4th', 'Electrical Circuits & Machine', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(70, 'Electronics', '4th', 'Principles of Digital Electronics', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(71, 'Electronics', '4th', 'Industrial Electronics', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(72, 'Electronics', '4th', 'Networks, Filters, and Transmission', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(73, 'Electronics', '4th', 'Electronic Servicing‐1', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(74, 'Electronics', '4th', 'Programming Essentials', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(75, 'Electronics', '4th', 'Business Organization & Communicati', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(76, 'Electronics', '5th', 'Television & Radio Engineering', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(77, 'Electronics', '5th', 'Electronic Measuring Instruments', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(78, 'Electronics', '5th', 'Advanced Communication Engineering', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(79, 'Electronics', '5th', 'Advanced Digital Electronics', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(80, 'Electronics', '5th', 'Electronic Servicing‐2', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(81, 'Electronics', '5th', 'Environmental Studies', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(82, 'Electronics', '5th', 'Accounting Theory & Practice', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(83, 'Electronics', '6th', 'Electronic Measurements', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(84, 'Electronics', '6th', 'TV Broadcasting and Studio', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(85, 'Electronics', '6th', 'Instrumentation & Process Control', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(86, 'Electronics', '6th', 'Microprocessor and Interfacing', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(87, 'Electronics', '6th', 'Microcontroller & embedded system', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(88, 'Electronics', '6th', 'Electronic Project ‐1', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(89, 'Electronics', '6th', 'Industrial Management', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(90, 'Electronics', '7th', 'Computer Control & Robotics', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(91, 'Electronics', '7th', 'Microwave Radar & Navigation Aids', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(92, 'Electronics', '7th', 'Bio‐Medical Instrument', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(93, 'Electronics', '7th', 'Industrial Automation & PLC', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(94, 'Electronics', '7th', 'Project‐2', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(95, 'Electronics', '7th', 'Innovation & Entrepreneurship', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(96, 'Mechanical', '1st', 'Engineering Drawing', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(97, 'Mechanical', '1st', 'Mechanical Engineering Materials', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(98, 'Mechanical', '1st', 'Electrical Engineering Fundamentals', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(99, 'Mechanical', '1st', 'Bangla', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(100, 'Mechanical', '1st', 'Physical Education & Life Skill Dev', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(101, 'Mechanical', '1st', 'Mathematics‐1', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(102, 'Mechanical', '1st', 'Chemistry', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(103, 'Mechanical', '2nd', 'Advanced Mechanical Engineering Dra', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(104, 'Mechanical', '2nd', 'Machine Shop Practice‐1', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(105, 'Mechanical', '2nd', 'Mechanical Workshop Practice', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(106, 'Mechanical', '2nd', 'English', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(107, 'Mechanical', '2nd', 'Mathematics‐2', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(108, 'Mechanical', '2nd', 'Physics‐1', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(109, 'Mechanical', '2nd', 'Social Science', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(110, 'Mechanical', '3rd', 'Machine Shop Practice‐2', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(111, 'Mechanical', '3rd', 'Electronic Engineering Fundamentals', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(112, 'Mechanical', '3rd', 'Communicative English', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(113, 'Mechanical', '3rd', 'Mathematics‐3', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(114, 'Mechanical', '3rd', 'Physics‐2', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(115, 'Mechanical', '3rd', 'Computer Application', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(116, 'Mechanical', '3rd', 'Foundry & Pattern Making', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(117, 'Mechanical', '4th', 'Engineering Mechanics', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(118, 'Mechanical', '4th', 'Metallurgy', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(119, 'Mechanical', '4th', 'Machine Shop Practice‐3', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(120, 'Mechanical', '4th', 'Electrical Circuits & Machines', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(121, 'Mechanical', '4th', 'Environmental Studies', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(122, 'Mechanical', '4th', 'Programming Essentials', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(123, 'Mechanical', '4th', 'Business Organization & Communicati', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(124, 'Mechanical', '5th', 'Hydraulics & Hydraulic Machineries', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(125, 'Mechanical', '5th', 'Mechanical Estimating& Costing', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(126, 'Mechanical', '5th', 'Advance Welding‐1', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(127, 'Mechanical', '5th', 'CAD & CAM', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(128, 'Mechanical', '5th', 'Manufacturing Process', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(129, 'Mechanical', '5th', 'Accounting Theory & Practice', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(130, 'Mechanical', '6th', 'Thermodynamics & Heat Engine', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(131, 'Mechanical', '6th', 'Mechanical Measurement & Metrology', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(132, 'Mechanical', '6th', 'Plant Engineering', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(133, 'Mechanical', '6th', 'The strength of Materials', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(134, 'Mechanical', '6th', 'Advance Welding‐2', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(135, 'Mechanical', '6th', 'Industrial Management', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(136, 'Mechanical', '7th', 'Design of Machine Elements', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(137, 'Mechanical', '7th', 'Tool Design', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(138, 'Mechanical', '7th', 'Heat Treatment of Metal', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(139, 'Mechanical', '7th', 'Mechanical Engineering Project', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(140, 'Mechanical', '7th', 'Production Planning & Control', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(141, 'Mechanical', '7th', 'Mechatronics & PLC', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(142, 'Mechanical', '7th', 'Innovation & Entrepreneurship', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(143, 'RAC', '1st', 'Engineering Drawing', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(144, 'RAC', '1st', 'Bangla', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(145, 'RAC', '1st', 'English', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(146, 'RAC', '1st', 'Physics‐1', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(147, 'RAC', '1st', 'Mathematics‐1', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(148, 'RAC', '1st', 'Basic Workshop Practice', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(149, 'RAC', '1st', 'Refrigeration and Air Conditioning ', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(150, 'RAC', '2nd', 'Communicative English', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(151, 'RAC', '2nd', 'Physics‐2', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(152, 'RAC', '2nd', 'Mathematics‐2', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(153, 'RAC', '2nd', 'Social Science', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(154, 'RAC', '2nd', 'Electrical Engineering Fundamentals', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(155, 'RAC', '2nd', 'Refrigeration Engineering Drawing', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(156, 'RAC', '3rd', 'Refrigeration cycles and Components', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(157, 'RAC', '3rd', 'Electronic Engineering Fundamentals', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(158, 'RAC', '3rd', 'Computer Application', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(159, 'RAC', '3rd', 'Mathematics‐3', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(160, 'RAC', '3rd', 'Chemistry', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(161, 'RAC', '3rd', 'Physical Education & Life Skill Dev', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(162, 'RAC', '4th', 'Domestic Refrigeration and Air Cond', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(163, 'RAC', '4th', 'Automotive Engines and their System', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(164, 'RAC', '4th', 'Cooling and Heating Load Calculatio', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(165, 'RAC', '4th', 'Maintenance of RAC Equipment', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(166, 'RAC', '4th', 'Engineering Mechanics', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(167, 'RAC', '4th', 'Environmental Studies', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(168, 'RAC', '4th', 'Business Organization and communica', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(169, 'RAC', '5th', 'Electrical Machines in RAC', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(170, 'RAC', '5th', 'RAC Circuits and controls', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(171, 'RAC', '5th', 'Piping and Duct Works', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(172, 'RAC', '5th', 'Commercial and Industrial Refrigera', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(173, 'RAC', '5th', 'Power Plant Engineering', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(174, 'RAC', '5th', 'Engineering Thermodynamics', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(175, 'RAC', '5th', 'Accounting Theory & Practice', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(176, 'RAC', '6th', 'Advanced Refrigeration and Air cond', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(177, 'RAC', '6th', 'RAC Plants for Food Processing & Pr', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(178, 'RAC', '6th', 'RAC Plant Operation', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(179, 'RAC', '6th', 'Low-Temperature Refrigeration', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(180, 'RAC', '6th', 'Fluid Mechanics and machinery', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(181, 'RAC', '6th', 'Industrial Management', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(182, 'RAC', '7th', 'RAC System Analysis', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(183, 'RAC', '7th', 'RAC Project', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(184, 'RAC', '7th', 'Troubleshooting & repairing of RAC ', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(185, 'RAC', '7th', 'Transport Refrigeration And Air con', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(186, 'RAC', '7th', 'Commercial and Industrial Air condi', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(187, 'RAC', '7th', 'Installation of RAC Plants', '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(188, 'RAC', '7th', 'Innovation & Entrepreneurship', '2023-03-05 15:21:58', '2023-03-05 09:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `sno` int(200) NOT NULL,
  `type` int(1) NOT NULL DEFAULT 1,
  `user_id` int(20) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `technology` varchar(20) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL DEFAULT 'support@sipi.com',
  `position` varchar(20) NOT NULL DEFAULT 'JR Instructor',
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`sno`, `type`, `user_id`, `user_name`, `technology`, `mobile_number`, `email`, `position`, `insert_date`, `last_update`) VALUES
(1, 1, 38079, 'M. A. Sattar', 'Computer', '01711529418', 'principal@sipi.com	', 'Principal', '2023-03-10 11:15:35', '2023-03-10 05:39:17'),
(2, 1, 69867, 'Mohammad Shahjahan', 'Computer', '01111111111', 'director@sipi.com	', 'Director', '2023-03-10 11:16:06', '2023-03-10 05:39:11'),
(3, 1, 35338, 'MD Shahin', 'Computer', '01581113821', 'shahin@sipi.com', 'CI', '2023-03-10 11:45:23', '2023-03-10 05:45:23'),
(4, 1, 49999, 'Masud Rana', 'Computer', '01521381834', 'masudrana@sipi.com', 'JR Instractor', '2023-03-10 11:45:46', '2023-03-10 05:45:46');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `marks_db`
--
ALTER TABLE `marks_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `stu_atten`
--
ALTER TABLE `stu_atten`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject_by_semester`
--
ALTER TABLE `subject_by_semester`
  MODIFY `s_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `sno` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

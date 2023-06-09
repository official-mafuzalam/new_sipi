-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 12:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

--
-- Dumping data for table `fees_deposit`
--

INSERT INTO `fees_deposit` (`s_no`, `date`, `user_id`, `technology`, `admission_year`, `current_semester`, `user_name`, `clg_id`, `roll_no`, `mobile_number`, `deposit_category`, `deposit_amount`, `comment`, `deposit_challan_no`, `inserter_id`, `insert_date`) VALUES
(1, '2023-03-18', 3487, 'Computer', '18-19', '8th', 'MD Mafuz Alam', '395/18', 88, '01747503257', 'Semester Fees', 8500, 'Due 15000', 66584827, 86094, '2023-03-18 01:49:10'),
(2, '2023-03-18', 3487, 'Computer', '18-19', '8th', 'MD Mafuz Alam', '395/18', 88, '01747503257', 'Tuition Fees', 12000, 'Due 3000', 81577693, 10000, '2023-03-18 01:51:24'),
(3, '2023-03-23', 3487, 'Computer', '18-19', '8th', 'MD Mafuz Alam', '395/18', 88, '01747503257', 'Form Fill-Up Fees', 2500, 'Due 200', 11294427, 86094, '2023-03-23 02:17:25'),
(4, '2023-03-29', 3487, 'Computer', '18-19', '8th', 'MD Mafuz Alam', '395/18', 88, '01747503257', 'Semester Fees', 8500, 'Due 200', 31413216, 10000, '2023-03-29 00:21:32');

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

--
-- Dumping data for table `marks_db`
--

INSERT INTO `marks_db` (`id`, `user_id`, `roll_no`, `user_name`, `semester`, `technology`, `subject`, `marks`, `inserter_id`, `insert_date`) VALUES
(1, 9991, 53, 'MD Computer', '1st', 'Computer', 'Mathematics 1', 65, 10000, '2023-03-18 02:04:30'),
(2, 9991, 53, 'MD Computer', '1st', 'Computer', 'Mathematics 1', 50, 61457, '2023-03-23 01:38:34');

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

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`id`, `user_id`, `technology`, `admision_Year`, `current_semester`, `user_name`, `gender`, `clg_id`, `roll_no`, `mobile_number`, `email`, `inserter_id`, `insert_date`, `last_update`) VALUES
(1, 3487, 'Computer', '18-19', '8th', 'MD Mafuz Alam', 'Male', '395/18', 88, '01747503257', 'official.mafuz@gmail.com', 10000, '2023-03-18 01:48:26', '2023-03-28 17:24:27'),
(3, 7544, 'Graphic', '20-21', '5th', 'MD Graphic', 'Male', '529/20', 42, '01666666666', 'gra@sipi.com', 10000, '2023-03-18 02:13:18', '2023-03-17 20:13:18');

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

--
-- Dumping data for table `stu_atten`
--

INSERT INTO `stu_atten` (`id`, `user_id`, `att_date`, `technology`, `semester`, `roll_no`, `stu_name`, `atten_status`, `att_month`, `att_year`, `inserter_id`, `insert_date_time`) VALUES
(1, 1330, '2023-03-26', 'Computer', '1st', 1, 'MD Computer', '1', '3', '2023', 61457, '2023-03-26 16:37:09.526287'),
(2, 4099, '2023-03-26', 'Computer', '1st', 3, 'MD Computer 1', '1', '3', '2023', 61457, '2023-03-26 16:37:11.801090'),
(3, 3564, '2023-03-26', 'Computer', '1st', 5, 'MS Computer 2', '0', '3', '2023', 61457, '2023-03-26 16:37:12.908485'),
(4, 1330, '2023-03-26', 'Computer', '1st', 1, 'MD Computer', '0', '3', '2023', 61457, '2023-03-26 16:37:17.294750'),
(5, 4099, '2023-03-26', 'Computer', '1st', 3, 'MD Computer 1', '1', '3', '2023', 61457, '2023-03-26 16:37:18.677808'),
(6, 3564, '2023-03-26', 'Computer', '1st', 5, 'MS Computer 2', '1', '3', '2023', 61457, '2023-03-26 16:37:19.512763'),
(7, 1330, '2023-03-26', 'Computer', '1st', 1, 'MD Computer', '1', '3', '2023', 61457, '2023-03-26 16:37:22.244189'),
(8, 4099, '2023-03-26', 'Computer', '1st', 3, 'MD Computer 1', '1', '3', '2023', 61457, '2023-03-26 16:37:23.886202'),
(9, 3564, '2023-03-26', 'Computer', '1st', 5, 'MS Computer 2', '1', '3', '2023', 61457, '2023-03-26 16:37:25.089840'),
(10, 1330, '2023-03-26', 'Computer', '1st', 1, 'MD Computer', '1', '3', '2023', 61457, '2023-03-26 16:37:27.414385'),
(11, 4099, '2023-03-26', 'Computer', '1st', 3, 'MD Computer 1', '0', '3', '2023', 61457, '2023-03-26 16:37:28.399173'),
(12, 3564, '2023-03-26', 'Computer', '1st', 5, 'MS Computer 2', '1', '3', '2023', 61457, '2023-03-26 16:37:30.362710');

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

--
-- Dumping data for table `subject_by_semester`
--

INSERT INTO `subject_by_semester` (`s_no`, `technology`, `semester`, `book_name`, `inserter_id`, `insert_date`, `last_update`) VALUES
(1, 'Computer', '1st', 'Mathematics 1', 10000, '2023-03-05 15:21:58', '2023-03-28 18:30:25'),
(2, 'Computer', '1st', 'Computer application', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(3, 'Computer', '1st', 'Physics 1', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(4, 'Computer', '1st', 'Electrical engineering fundamentals', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(5, 'Computer', '1st', 'English', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(6, 'Computer', '1st', 'Physical Education & life skills development', 68721, '2023-03-05 15:21:58', '2023-03-17 19:00:05'),
(7, 'Computer', '1st', 'Bangla', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(8, 'Computer', '2nd', 'Database Application', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(9, 'Computer', '2nd', 'Mathematics 2', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(10, 'Computer', '2nd', 'IT support System-I', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(11, 'Computer', '2nd', 'Physics 2', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(12, 'Computer', '2nd', 'Graphics Design-I', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(13, 'Computer', '2nd', 'Communicative English', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(14, 'Computer', '2nd', 'Analog Electronics', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(15, 'Computer', '3rd', 'Programming Essentials', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(16, 'Computer', '3rd', 'Mathematics 3', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(17, 'Computer', '3rd', 'Web Design', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(18, 'Computer', '3rd', 'Chemistry', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(19, 'Computer', '3rd', 'Graphics design-II', 0, '2023-03-05 15:21:58', '2023-03-11 17:40:15'),
(20, 'Computer', '3rd', 'Social Science', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(21, 'Computer', '3rd', 'IT support System-II', 0, '2023-03-05 15:21:58', '2023-03-11 17:40:23'),
(22, 'Computer', '4th', 'Object-Oriented Programming', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(23, 'Computer', '4th', 'Web Development', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(24, 'Computer', '4th', 'Data Structure & Algorithm', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(25, 'Computer', '4th', 'Computer Peripherals', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(26, 'Computer', '4th', 'Data Communication System', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(27, 'Computer', '4th', 'Business Organization & Communication', 0, '2023-03-05 15:21:58', '2023-03-11 17:40:43'),
(28, 'Computer', '4th', 'The Principle of Digital Electronic', 0, '2023-03-05 15:21:58', '2023-03-16 19:48:28'),
(29, 'Computer', '5th', 'Programming in Java', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(30, 'Computer', '5th', 'Surveillance Security System', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(31, 'Computer', '5th', 'Web Development Project', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(32, 'Computer', '5th', 'Operating Systems application', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(33, 'Computer', '5th', 'PCB Design and Circuit Making', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(34, 'Computer', '5th', 'Accounting Theory & Practice', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(35, 'Computer', '5th', 'Sequential Logic System', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(36, 'Computer', '6th', 'Principals of Software Engineering', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(37, 'Computer', '6th', 'Microcontroller Application', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(38, 'Computer', '6th', 'Microprocessor & Interfacing', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(39, 'Computer', '6th', 'Optional Subject', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(40, 'Computer', '6th', 'Database Management System', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(41, 'Computer', '6th', 'Industrial Management', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(42, 'Computer', '6th', 'Environmental Studies', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(43, 'Computer', '7th', 'System Analysis & Design', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(44, 'Computer', '7th', 'E-Commerce & CMS', 0, '2023-03-05 15:21:58', '2023-03-11 17:41:26'),
(45, 'Computer', '7th', 'Network Administration & Services', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(46, 'Computer', '7th', 'Cyber Security & Ethics', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(47, 'Computer', '7th', 'Innovation & Entrepreneurship', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(48, 'Computer', '7th', 'Apps Development Project', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(49, 'Computer', '7th', 'Optional Subject‐II', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(50, 'Electronics', '1st', 'Basic Electronics', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(51, 'Electronics', '1st', 'Engineering Drawing', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(52, 'Electronics', '1st', 'Electrical Engineering Fundamentals', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(53, 'Electronics', '1st', 'Mathematics‐1', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(54, 'Electronics', '1st', 'Social Science', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(55, 'Electronics', '1st', 'Physical education & Life Skill Dev', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(56, 'Electronics', '2nd', 'Electronic Devices and Circuits', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(57, 'Electronics', '2nd', 'Computer Application', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(58, 'Electronics', '2nd', 'Physics‐1', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(59, 'Electronics', '2nd', 'Mathematics‐2', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(60, 'Electronics', '2nd', 'Bangla', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(61, 'Electronics', '2nd', 'English', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(62, 'Electronics', '3rd', 'Advanced Electronic Devices and Cir', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(63, 'Electronics', '3rd', 'PCB Design and Prototyping', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(64, 'Electronics', '3rd', 'Electronic Appliances', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(65, 'Electronics', '3rd', 'Basic Communication Engineering', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(66, 'Electronics', '3rd', 'Physics‐2', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(67, 'Electronics', '3rd', 'Mathematics‐3', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(68, 'Electronics', '3rd', 'Communicative English', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(69, 'Electronics', '4th', 'Electrical Circuits & Machine', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(70, 'Electronics', '4th', 'Principles of Digital Electronics', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(71, 'Electronics', '4th', 'Industrial Electronics', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(72, 'Electronics', '4th', 'Networks, Filters, and Transmission', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(73, 'Electronics', '4th', 'Electronic Servicing‐1', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(74, 'Electronics', '4th', 'Programming Essentials', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(75, 'Electronics', '4th', 'Business Organization & Communicati', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(76, 'Electronics', '5th', 'Television & Radio Engineering', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(77, 'Electronics', '5th', 'Electronic Measuring Instruments', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(78, 'Electronics', '5th', 'Advanced Communication Engineering', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(79, 'Electronics', '5th', 'Advanced Digital Electronics', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(80, 'Electronics', '5th', 'Electronic Servicing‐2', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(81, 'Electronics', '5th', 'Environmental Studies', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(82, 'Electronics', '5th', 'Accounting Theory & Practice', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(83, 'Electronics', '6th', 'Electronic Measurements', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(84, 'Electronics', '6th', 'TV Broadcasting and Studio', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(85, 'Electronics', '6th', 'Instrumentation & Process Control', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(86, 'Electronics', '6th', 'Microprocessor and Interfacing', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(87, 'Electronics', '6th', 'Microcontroller & embedded system', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(88, 'Electronics', '6th', 'Electronic Project ‐1', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(89, 'Electronics', '6th', 'Industrial Management', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(90, 'Electronics', '7th', 'Computer Control & Robotics', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(91, 'Electronics', '7th', 'Microwave Radar & Navigation Aids', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(92, 'Electronics', '7th', 'Bio‐Medical Instrument', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(93, 'Electronics', '7th', 'Industrial Automation & PLC', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(94, 'Electronics', '7th', 'Project‐2', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(95, 'Electronics', '7th', 'Innovation & Entrepreneurship', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(96, 'Mechanical', '1st', 'Engineering Drawing', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(97, 'Mechanical', '1st', 'Mechanical Engineering Materials', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(98, 'Mechanical', '1st', 'Electrical Engineering Fundamentals', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(99, 'Mechanical', '1st', 'Bangla', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(100, 'Mechanical', '1st', 'Physical Education & Life Skill Dev', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(101, 'Mechanical', '1st', 'Mathematics‐1', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(102, 'Mechanical', '1st', 'Chemistry', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(103, 'Mechanical', '2nd', 'Advanced Mechanical Engineering Dra', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(104, 'Mechanical', '2nd', 'Machine Shop Practice‐1', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(105, 'Mechanical', '2nd', 'Mechanical Workshop Practice', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(106, 'Mechanical', '2nd', 'English', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(107, 'Mechanical', '2nd', 'Mathematics‐2', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(108, 'Mechanical', '2nd', 'Physics‐1', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(109, 'Mechanical', '2nd', 'Social Science', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(110, 'Mechanical', '3rd', 'Machine Shop Practice‐2', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(111, 'Mechanical', '3rd', 'Electronic Engineering Fundamentals', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(112, 'Mechanical', '3rd', 'Communicative English', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(113, 'Mechanical', '3rd', 'Mathematics‐3', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(114, 'Mechanical', '3rd', 'Physics‐2', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(115, 'Mechanical', '3rd', 'Computer Application', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(116, 'Mechanical', '3rd', 'Foundry & Pattern Making', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(117, 'Mechanical', '4th', 'Engineering Mechanics', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(118, 'Mechanical', '4th', 'Metallurgy', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(119, 'Mechanical', '4th', 'Machine Shop Practice‐3', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(120, 'Mechanical', '4th', 'Electrical Circuits & Machines', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(121, 'Mechanical', '4th', 'Environmental Studies', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(122, 'Mechanical', '4th', 'Programming Essentials', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(123, 'Mechanical', '4th', 'Business Organization & Communicati', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(124, 'Mechanical', '5th', 'Hydraulics & Hydraulic Machineries', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(125, 'Mechanical', '5th', 'Mechanical Estimating& Costing', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(126, 'Mechanical', '5th', 'Advance Welding‐1', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(127, 'Mechanical', '5th', 'CAD & CAM', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(128, 'Mechanical', '5th', 'Manufacturing Process', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(129, 'Mechanical', '5th', 'Accounting Theory & Practice', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(130, 'Mechanical', '6th', 'Thermodynamics & Heat Engine', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(131, 'Mechanical', '6th', 'Mechanical Measurement & Metrology', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(132, 'Mechanical', '6th', 'Plant Engineering', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(133, 'Mechanical', '6th', 'The strength of Materials', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(134, 'Mechanical', '6th', 'Advance Welding‐2', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(135, 'Mechanical', '6th', 'Industrial Management', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(136, 'Mechanical', '7th', 'Design of Machine Elements', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(137, 'Mechanical', '7th', 'Tool Design', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(138, 'Mechanical', '7th', 'Heat Treatment of Metal', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(139, 'Mechanical', '7th', 'Mechanical Engineering Project', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(140, 'Mechanical', '7th', 'Production Planning & Control', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(141, 'Mechanical', '7th', 'Mechatronics & PLC', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(142, 'Mechanical', '7th', 'Innovation & Entrepreneurship', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(143, 'RAC', '1st', 'Engineering Drawing', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(144, 'RAC', '1st', 'Bangla', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(145, 'RAC', '1st', 'English', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(146, 'RAC', '1st', 'Physics-1', 0, '2023-03-05 15:21:58', '2023-03-11 17:41:37'),
(147, 'RAC', '1st', 'Mathematics-1', 0, '2023-03-05 15:21:58', '2023-03-11 17:41:49'),
(148, 'RAC', '1st', 'Basic Workshop Practice', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(149, 'RAC', '1st', 'Refrigeration and Air Conditioning ', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(150, 'RAC', '2nd', 'Communicative English', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(151, 'RAC', '2nd', 'Physics-2', 0, '2023-03-05 15:21:58', '2023-03-11 17:42:00'),
(152, 'RAC', '2nd', 'Mathematics-2', 0, '2023-03-05 15:21:58', '2023-03-11 17:42:08'),
(153, 'RAC', '2nd', 'Social Science', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(154, 'RAC', '2nd', 'Electrical Engineering Fundamentals', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(155, 'RAC', '2nd', 'Refrigeration Engineering Drawing', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(156, 'RAC', '3rd', 'Refrigeration cycles and Components', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(157, 'RAC', '3rd', 'Electronic Engineering Fundamentals', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(158, 'RAC', '3rd', 'Computer Application', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(159, 'RAC', '3rd', 'Mathematics-3', 0, '2023-03-05 15:21:58', '2023-03-11 17:42:27'),
(160, 'RAC', '3rd', 'Chemistry', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(161, 'RAC', '3rd', 'Physical Education & Life Skill Development', 0, '2023-03-05 15:21:58', '2023-03-11 17:42:39'),
(162, 'RAC', '4th', 'Domestic Refrigeration and Air Conddition', 0, '2023-03-05 15:21:58', '2023-03-11 17:42:57'),
(163, 'RAC', '4th', 'Automotive Engines and their System', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(164, 'RAC', '4th', 'Cooling and Heating Load Calculatio', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(165, 'RAC', '4th', 'Maintenance of RAC Equipment', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(166, 'RAC', '4th', 'Engineering Mechanics', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(167, 'RAC', '4th', 'Environmental Studies', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(168, 'RAC', '4th', 'Business Organization and communica', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(169, 'RAC', '5th', 'Electrical Machines in RAC', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(170, 'RAC', '5th', 'RAC Circuits and controls', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(171, 'RAC', '5th', 'Piping and Duct Works', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(172, 'RAC', '5th', 'Commercial and Industrial Refrigera', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(173, 'RAC', '5th', 'Power Plant Engineering', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(174, 'RAC', '5th', 'Engineering Thermodynamics', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(175, 'RAC', '5th', 'Accounting Theory & Practice', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(176, 'RAC', '6th', 'Advanced Refrigeration and Air cond', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(177, 'RAC', '6th', 'RAC Plants for Food Processing & Pr', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(178, 'RAC', '6th', 'RAC Plant Operation', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(179, 'RAC', '6th', 'Low-Temperature Refrigeration', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(180, 'RAC', '6th', 'Fluid Mechanics and machinery', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(181, 'RAC', '6th', 'Industrial Management', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(182, 'RAC', '7th', 'RAC System Analysis', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(183, 'RAC', '7th', 'RAC Project', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(184, 'RAC', '7th', 'Troubleshooting & repairing of RAC ', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(185, 'RAC', '7th', 'Transport Refrigeration And Air con', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(186, 'RAC', '7th', 'Commercial and Industrial Air condi', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(187, 'RAC', '7th', 'Installation of RAC Plants', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35'),
(188, 'RAC', '7th', 'Innovation & Entrepreneurship', 0, '2023-03-05 15:21:58', '2023-03-05 09:22:35');

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
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`sno`, `type`, `w_type`, `user_id`, `user_name`, `technology`, `mobile_number`, `email`, `position`, `inserter_id`, `insert_date`, `last_update`) VALUES
(1, 1, 1, 10000, 'M. A. Sattar', 'Computer', '01711529418', 'principal@sipi.com', 'Principal', 10000, '2023-03-18 01:36:58', '2023-03-17 19:53:13'),
(2, 1, 1, 10001, 'Mohammad Shahjahan', 'Computer', '01777777777', 'diractor@sipi.com', 'Principal', 0, '2023-03-18 01:37:09', '2023-03-17 19:38:50'),
(3, 1, 3, 61457, 'MD Shahin', 'Computer', '01581113821', 'cmt.ci@sipi.com', 'CI', 10000, '2023-03-18 01:40:16', '2023-03-17 19:42:17'),
(5, 1, 4, 86094, 'Accountants', 'Others', '01111111111', 'acc@sipi.com', 'Accountants', 10000, '2023-03-18 01:41:47', '2023-03-17 19:44:36'),
(6, 1, 3, 74896, 'MR RAC Sir', 'RAC', '015555555555', 'rac.ci@sipi.com', 'CI', 10000, '2023-03-23 01:45:57', '2023-03-22 19:46:03'),
(7, 1, 3, 78172, 'MR CMT Teacher', 'Computer', '0150251056', 'cmt.jr.1@sipi.com', 'JR Instructor', 10000, '2023-03-28 23:44:55', '2023-03-28 17:48:03');

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
  MODIFY `s_no` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marks_db`
--
ALTER TABLE `marks_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stu_atten`
--
ALTER TABLE `stu_atten`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subject_by_semester`
--
ALTER TABLE `subject_by_semester`
  MODIFY `s_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `sno` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

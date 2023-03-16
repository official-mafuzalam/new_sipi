-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 06:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
(1, 6621, 'Computer', '18-19', '8th', 'MD Mafuz Alam', 'Male', '395/18', 88, '01747503257', 'offical.mafuz.alam@gmail.com', '2023-03-08 13:06:21', '2023-03-11 17:20:26'),
(2, 7062, 'Computer', '18-19', '8th', 'MD Yeamin', 'Male', '396/18', 89, '01725841246', 'yeaminh849@gmail.com', '2023-03-08 13:09:49', '2023-03-11 17:20:26'),
(3, 1953, 'Computer', '18-19', '8th', 'MD Suvo', 'Male', '15/18', 26, '0111111111', 'suvo@sipi.com', '2023-03-08 13:10:56', '2023-03-11 17:20:26'),
(4, 7991, 'Computer', '18-19', '8th', 'MD Sihan', 'Male', '185/18', 63, '0177777777', 'sihan@sipi.com', '2023-03-08 13:11:38', '2023-03-11 17:20:26'),
(5, 9061, 'Computer', '18-19', '8th', 'MD Munna', 'Male', '345/18', 29, '01555555555', 'munna@sipi.com', '2023-03-08 13:14:39', '2023-03-11 17:20:26'),
(6, 4119, 'Computer', '18-19', '8th', 'Afsana Haque Riya', 'Female', '399/18', 91, '0166666666666', 'riya@sipi.com', '2023-03-08 13:15:32', '2023-03-11 17:20:26'),
(7, 9479, 'Graphic', '18-19', '8th', 'MD Graphic', 'Male', '185/18', 29, '01555555555', 'graphic@sipi.com', '2023-03-10 11:02:07', '2023-03-11 17:20:33'),
(8, 1444, 'Graphic', '18-19', '8th', 'MD Graphic 1', 'Male', '175/18', 46, '01555555565', 'graphic1@sipi.com', '2023-03-10 11:02:37', '2023-03-11 17:20:33'),
(9, 5747, 'Graphic', '18-19', '8th', 'MD Graphic 2', 'Male', '178/18', 48, '01555555578', 'graphic2@sipi.com', '2023-03-10 11:03:12', '2023-03-11 17:20:33'),
(10, 5744, 'RAC', '18-19', '8th', 'MD RAC', 'Male', '458/18', 36, '016666666666', 'rac@sipi.com', '2023-03-10 11:03:55', '2023-03-11 17:20:42'),
(11, 7454, 'RAC', '18-19', '8th', 'MD RAC 1', 'Male', '423/18', 27, '016666666666', 'rac2@sipi.com', '2023-03-10 11:04:31', '2023-03-11 17:20:42'),
(12, 8026, 'Civil', '18-19', '8th', 'MD Civil', 'Male', '712/18', 41, '0177777777', 'civil@sipi.com', '2023-03-10 11:05:03', '2023-03-11 17:20:50'),
(13, 7994, 'Civil', '18-19', '8th', 'MD Civil 1', 'Male', '278/18', 72, '01777777776', 'civil1@sipi.com', '2023-03-10 11:06:09', '2023-03-11 17:20:50'),
(14, 8295, 'Electronic', '18-19', '8th', 'MD Electronic', 'Male', '412/18', 26, '0188888888', 'electronic@sipi.com', '2023-03-10 11:09:15', '2023-03-11 17:21:00'),
(15, 8703, 'Electronic', '18-19', '8th', 'Ms Electronic 1', 'Female', '418/18', 19, '0188888889', 'electronic1@sipi.com', '2023-03-10 11:09:59', '2023-03-11 17:21:00'),
(16, 8437, 'Electrical', '18-19', '8th', 'MD Electrical', 'Male', '438/18', 75, '01999999999', 'electrical@sipi.com', '2023-03-10 11:11:36', '2023-03-11 17:21:10'),
(17, 6160, 'Electrical', '18-19', '8th', 'MD Electrical 1', 'Male', '468/18', 95, '01999999998', 'electrical1@sipi.com', '2023-03-10 11:12:10', '2023-03-11 17:21:10'),
(18, 5478, 'Electrical', '18-19', '8th', 'MD Electrical 1', 'Male', '468/18', 95, '01999999998', 'electrical1@sipi.com', '2023-03-10 11:14:52', '2023-03-11 17:21:10'),
(19, 3037, 'Mechanical', '20-21', '6th', 'MD Mechanical', 'Male', '175/18', 65, '01333333333', 'mechanical@sipi.com', '2023-03-11 00:44:58', '2023-03-11 17:19:20'),
(20, 4482, 'Computer', '22-23', '1st', 'MD Computer 1', 'Male', '178/22', 53, '01555555555', 'computer1@sipi.com', '2023-03-11 23:22:31', '2023-03-11 17:22:31'),
(21, 2840, 'Computer', '22-23', '1st', 'MS Computer 2', 'Female', '176/22', 42, '01555555556', 'computer2@sipi.com', '2023-03-11 23:23:12', '2023-03-11 17:23:12'),
(22, 3956, 'Graphic', '22-23', '1st', 'MD Graphic', 'Male', '158/22', 63, '0133333333', 'graphic1@sipi.com', '2023-03-11 23:23:52', '2023-03-11 17:23:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

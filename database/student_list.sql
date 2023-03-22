-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2023 at 02:38 AM
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
-- Database: `friendsi_db_sipi`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE `student_list` (
  `id` int(250) NOT NULL,
  `user_id` int(250) NOT NULL,
  `technology` varchar(60) NOT NULL,
  `admision_Year` varchar(30) NOT NULL,
  `current_semester` varchar(30) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `clg_id` varchar(30) NOT NULL,
  `roll_no` int(30) NOT NULL,
  `mobile_number` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `inserter_id` int(30) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`id`, `user_id`, `technology`, `admision_Year`, `current_semester`, `user_name`, `gender`, `clg_id`, `roll_no`, `mobile_number`, `email`, `inserter_id`, `insert_date`, `last_update`) VALUES
(1, 9039, 'Computer', '18-19', 'Others', 'MD Mafuz Alam', 'Male', '395/18', 88, '01747503257', 'everythinggood885@gmail.com', 10000, '2023-03-23 00:15:27', '2023-03-22 12:15:27'),
(2, 1330, 'Computer', '22-23', '1st', 'MD Computer', 'Male', '101/22', 1, '01777777777', 'computer@sipi.com', 10000, '2023-03-23 00:17:07', '2023-03-22 18:57:02'),
(3, 4099, 'Computer', '22-23', '1st', 'MD Computer 1', 'Male', '103/22', 3, '01777777778', 'computer1@sipi.com', 61457, '2023-03-23 00:17:41', '2023-03-22 18:59:36'),
(4, 3564, 'Computer', '22-23', '1st', 'MS Computer 2', 'Female', '105/22', 5, '01777777779', 'computer2@sipi.com', 61457, '2023-03-23 00:18:11', '2023-03-22 18:59:43'),
(5, 6860, 'RAC', '22-23', '1st', 'MD RAC', 'Male', '201/22', 1, '01666666666', 'rac@sipi.com', 74973, '2023-03-23 00:19:34', '2023-03-22 19:00:26'),
(6, 5322, 'RAC', '22-23', '1st', 'MD RAC 1', 'Male', '203/22', 3, '01666666667', 'rac1@sipi.com', 74973, '2023-03-23 00:20:03', '2023-03-22 19:00:32'),
(7, 1125, 'Civil', '22-23', '1st', 'MD Civil', 'Male', '301/22', 1, '01567891234', 'civil@sipi.com', 93433, '2023-03-23 00:37:30', '2023-03-22 12:37:30'),
(8, 2521, 'Civil', '22-23', '1st', 'MD Civil 1', 'Male', '303/22', 3, '01567891235', 'civil1@sipi.com', 93433, '2023-03-23 00:38:48', '2023-03-22 12:38:48'),
(9, 2486, 'Electronic', '22-23', '1st', 'MD Electronic', 'Male', '401/22', 2, '01678912345', 'electronic@sipi.com', 86094, '2023-03-23 01:02:21', '2023-03-22 20:35:10'),
(10, 7853, 'Electronic', '22-23', '1st', 'MD Electronic 1', 'Male', '403/22', 3, '01678912346', 'electronic1@sipi.com', 80777, '2023-03-23 01:02:55', '2023-03-22 19:02:55');

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
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

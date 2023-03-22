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
(1, 1, 1, 10000, 'M. A. Sattar', 'Computer', '01711529418', 'principal@sipi.com', 'Principal', 0, '2023-03-18 01:36:58', '2023-03-22 18:35:26'),
(2, 1, 1, 10001, 'Mohammad Shahjahan', 'Computer', '01777777777', 'diractor@sipi.com', 'Principal', 0, '2023-03-18 01:37:09', '2023-03-17 19:38:50'),
(3, 1, 3, 61457, 'MD Shahin', 'Computer', '01581113821', 'cmt.ci@sipi.com', 'CI', 10000, '2023-03-18 01:40:16', '2023-03-17 19:42:17'),
(4, 1, 3, 23039, 'MR Masood Rana', 'Computer', '01521381834', 'cmt.jr@sipi.com', 'JR Instructor', 10000, '2023-03-18 01:40:42', '2023-03-17 19:43:45'),
(5, 1, 4, 86094, 'Accountants', 'Others', '01111111111', 'acc@sipi.com', 'Accountants', 10000, '2023-03-18 01:41:47', '2023-03-17 19:44:36'),
(6, 1, 3, 74973, 'MR RAC Sir', 'RAC', '01732165498', 'rac.ci@sipi.com', 'CI', 10000, '2023-03-23 00:22:01', '2023-03-22 18:33:46'),
(7, 1, 3, 91118, 'MR RAC Sir 1', 'RAC', '01732165497', 'rac.jr@sipi.com', 'JR Instructor', 10000, '2023-03-23 00:23:00', '2023-03-22 18:34:37'),
(8, 1, 3, 93433, 'MR Civil Sir', 'Civil', '01345678912', 'civil.ci@sipi.com', 'CI', 10000, '2023-03-23 00:23:36', '2023-03-22 18:34:44'),
(9, 1, 3, 16877, 'MR Civil Sir 1', 'Civil', '01345678913', 'civil.jr@sipi.com', 'JR Instructor', 10000, '2023-03-23 00:23:59', '2023-03-22 18:34:51'),
(10, 1, 3, 80777, 'MR Electronic Sir', 'Electronic', '01456789123', 'electronic.ci@sipi.com', 'CI', 10000, '2023-03-23 00:24:43', '2023-03-22 18:34:56'),
(11, 1, 3, 63454, 'MR Electronic Sir 1', 'Electronic', '01456789124', 'electronic.jr@sipi.com', 'JR Instructor', 10000, '2023-03-23 00:25:15', '2023-03-22 18:35:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `sno` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

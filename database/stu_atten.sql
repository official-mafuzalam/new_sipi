-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 09:15 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stu_atten`
--
ALTER TABLE `stu_atten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stu_atten`
--
ALTER TABLE `stu_atten`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

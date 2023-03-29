-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 29, 2023 at 04:05 PM
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

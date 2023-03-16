-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2023 at 04:45 PM
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 01:25 PM
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
  `insert_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees_deposit`
--

INSERT INTO `fees_deposit` (`s_no`, `user_id`, `technology`, `admission_year`, `current_semester`, `user_name`, `clg_id`, `roll_no`, `mobile_number`, `deposit_category`, `deposit_amount`, `comment`, `deposit_challan_no`, `insert_date`) VALUES
(1, 6621, 'Computer', '18-19', '6th', 'MD Mafuz Alam', '395/18', 88, '01747503257', 'Semester Fees', 8500, 'Due 15000', 95495607, '2023-03-15 16:29:26'),
(2, 7062, 'Computer', '18-19', '6th', 'MD Yeamin', '396/18', 89, '01725841246', 'Semester Fees', 8500, 'Due 13000', 79479509, '2023-03-15 16:44:43'),
(3, 6621, 'Computer', '18-19', '6th', 'MD Mafuz Alam', '395/18', 88, '01747503257', 'Tuition Fees', 12000, 'Due 3000', 90193845, '2023-03-15 16:45:19'),
(4, 6621, 'Computer', '18-19', '6th', 'MD Mafuz Alam', '395/18', 88, '01747503257', 'Form Fill-Up Fees', 2500, 'Due 500', 70979256, '2023-03-15 16:47:24'),
(5, 7062, 'Computer', '18-19', '6th', 'MD Yeamin', '396/18', 89, '01725841246', 'Form Fill-Up Fees', 2500, 'Due10000', 81062399, '2023-03-15 16:48:05'),
(6, 7062, 'Computer', '18-19', '6th', 'MD Yeamin', '396/18', 89, '01725841246', 'Tuition Fees', 12000, 'Due 5000', 29135614, '2023-03-15 16:48:22'),
(7, 6621, 'Computer', '18-19', '6th', 'MD Mafuz Alam', '395/18', 88, '01747503257', 'Mid Term Fees', 600, 'Due 1000', 76392542, '2023-03-15 17:03:40'),
(8, 6621, 'Computer', '18-19', '6th', 'MD Mafuz Alam', '395/18', 88, '01747503257', 'Referred Exam Fees', 800, 'Due 1200', 89922718, '2023-03-15 17:05:16'),
(9, 6621, 'Computer', '18-19', '6th', 'MD Mafuz Alam', '395/18', 88, '01747503257', 'Referred Exam Fees', 800, 'Due 1000', 83894499, '2023-03-15 17:39:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fees_deposit`
--
ALTER TABLE `fees_deposit`
  ADD PRIMARY KEY (`s_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fees_deposit`
--
ALTER TABLE `fees_deposit`
  MODIFY `s_no` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

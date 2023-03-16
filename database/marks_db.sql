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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marks_db`
--
ALTER TABLE `marks_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marks_db`
--
ALTER TABLE `marks_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

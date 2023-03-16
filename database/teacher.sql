-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 02:05 PM
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
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`sno`, `type`, `w_type`, `user_id`, `user_name`, `technology`, `mobile_number`, `email`, `position`, `insert_date`, `last_update`) VALUES
(3, 1, 3, 35338, 'MD Shahin', 'Computer', '01581113821', 'cmt.ci@sipi.com', 'CI', '2023-03-10 11:45:23', '2023-03-16 12:14:07'),
(4, 1, 4, 49999, 'Masood Rana', 'Computer', '01521381834', 'cmt.jr@sipi.com', 'JR Instructor', '2023-03-10 11:45:46', '2023-03-16 12:14:30'),
(5, 1, 3, 69983, 'MR Graphic Sir', 'Graphic', '017777777', 'g.ci@sipi.com', 'CI', '2023-03-11 23:25:32', '2023-03-16 12:14:12'),
(6, 1, 4, 12732, 'MR Graphic Sir 1', 'Graphic', '01555555556', 'g.jr@sipi.com', 'JR Instructor', '2023-03-11 23:26:03', '2023-03-16 12:14:33'),
(7, 1, 3, 14216, 'MR RAC Sir', 'RAC', '01555555555', 'rac.ci@sipi.com', 'CI', '2023-03-11 23:26:25', '2023-03-16 12:14:16'),
(8, 1, 4, 66270, 'MR RAC Sir 1', 'RAC', '01555555556', 'rac.jr@sipi.com', 'JR Instructor', '2023-03-11 23:26:50', '2023-03-16 12:14:37'),
(9, 1, 3, 68164, 'MR Civil Sir', 'Civil', '0166666666', 'civil.ci@sipi.com', 'CI', '2023-03-11 23:27:21', '2023-03-16 12:14:19'),
(10, 1, 0, 12089, 'MR Civil Sir 1', 'Civil', '0166666666', 'civil.jr@sipi.com', 'JR Instructor', '2023-03-11 23:28:27', '2023-03-11 17:28:27'),
(11, 1, 0, 51305, 'MR Electronic Sir', 'Electronic', '0144444444', 'e.ci@sipi.com', 'CI', '2023-03-11 23:29:08', '2023-03-11 17:29:08'),
(12, 1, 10, 24676, 'MR Electronic Sir 1', 'Electronic', '0144444444', 'e.jr@sipi.com', 'JR Instructor', '2023-03-11 23:29:41', '2023-03-16 13:02:49'),
(13, 1, 0, 21819, 'MR Electrical Sir', 'Electrical', '0155555555', 'ele.ci@sipi.com', 'CI', '2023-03-11 23:30:43', '2023-03-11 17:31:25'),
(14, 1, 0, 77825, 'MR Electrical Sir 1', 'Electrical', '0155555555', 'ele.jr@sipi.com', 'JR Instructor', '2023-03-11 23:31:14', '2023-03-11 17:31:14'),
(15, 1, 0, 61761, 'MR Mechanical Sir', 'Mechanical', '0177777777', 'm.ci@sipi.com', 'CI', '2023-03-11 23:32:23', '2023-03-11 17:32:23'),
(16, 1, 1, 68721, 'M. A. Sattar', 'Computer', '01711529418', 'principal@sipi.com', 'Others', '2023-03-16 18:58:56', '2023-03-16 13:04:36');

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
  MODIFY `sno` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

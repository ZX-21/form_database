-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 05:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form_post`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(255) NOT NULL,
  `sender_firstname` varchar(255) NOT NULL,
  `sender_lastname` varchar(255) NOT NULL,
  `sender_phone` varchar(10) NOT NULL,
  `sender_address` varchar(255) NOT NULL,
  `sender_province` varchar(255) NOT NULL,
  `sender_amphoe` varchar(255) NOT NULL,
  `sender_subdistrict` varchar(255) NOT NULL,
  `sender_postcode` varchar(5) NOT NULL,
  `sender_date` date NOT NULL,
  `reciever_firstname` varchar(255) NOT NULL,
  `receiver_lastname` varchar(255) NOT NULL,
  `receiver_phone` varchar(10) NOT NULL,
  `receiver_address` varchar(255) NOT NULL,
  `receiver_province` varchar(255) NOT NULL,
  `receiver_amphoe` varchar(255) NOT NULL,
  `receiver_subdistrict` varchar(255) NOT NULL,
  `receiver_postcode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `sender_firstname`, `sender_lastname`, `sender_phone`, `sender_address`, `sender_province`, `sender_amphoe`, `sender_subdistrict`, `sender_postcode`, `sender_date`, `reciever_firstname`, `receiver_lastname`, `receiver_phone`, `receiver_address`, `receiver_province`, `receiver_amphoe`, `receiver_subdistrict`, `receiver_postcode`) VALUES
(5, 'aaa', 'aaa', '444', 'aaa', '4', '1303', '130304', '0101', '2024-11-16', 'bbb', 'bbbb', '5050', 'bbb', '72', '9204', '920403', '505'),
(6, 'aaa', 'aaa', '444', 'aaa', '4', '1303', '130304', '0101', '2024-11-16', 'bbb', 'bbbb', '5050', 'bbb', '72', '9204', '920403', '505'),
(7, 'aaa', 'aaa', '444', 'aaa', '4', '1303', '130304', '0101', '2024-11-16', 'bbb', 'bbbb', '5050', 'bbb', '72', '9204', '920403', '505'),
(8, 'ddd', 'ddd', '777', 'ddd', '3', '1206', '120606', '555', '2024-11-28', 'eee', 'eee', '555', 'eee', '19', '3019', '301903', '999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

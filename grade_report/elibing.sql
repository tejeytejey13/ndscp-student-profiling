-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2023 at 04:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elibing`
--
CREATE DATABASE IF NOT EXISTS `elibing` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `elibing`;

-- --------------------------------------------------------

--
-- Table structure for table `intermentform`
--

DROP TABLE IF EXISTS `intermentform`;
CREATE TABLE `intermentform` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `purok` varchar(255) NOT NULL,
  `deceased` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `deathdate` date NOT NULL,
  `desired_date` date NOT NULL,
  `desired_time` time(6) NOT NULL,
  `cur_date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `intermentform`
--

INSERT INTO `intermentform` (`user_id`, `user_name`, `role`, `id`, `relationship`, `barangay`, `purok`, `deceased`, `age`, `deathdate`, `desired_date`, `desired_time`, `cur_date_time`) VALUES
(0, '', 'client', 6, '', 'b19', 'prk1', 'nn', 22, '2023-09-09', '2023-09-29', '19:45:00.000000', '2023-09-23 19:04:26'),
(0, '', 'client', 7, '', 'b14', 'prk1', 'dd', 0, '2023-09-21', '0000-00-00', '00:00:00.000000', '2023-09-23 19:04:26'),
(0, '', 'client', 8, 'ss', 'b17', 'prk1', 'ss', 11, '2023-09-26', '2023-09-22', '07:54:00.000000', '2023-09-23 19:04:26'),
(9, 'Admin Admin Test', 'admin', 14, 'Son', 'b1', 'prk2', 'awd', 0, '2023-09-23', '2023-09-23', '21:47:00.000000', '2023-09-23 21:42:57'),
(9, 'Admin Admin Test', 'admin', 15, 'Son', 'b1', 'prk2', 'awdawd', 0, '2023-09-23', '2023-09-23', '21:47:00.000000', '2023-09-23 21:50:09'),
(8, '1 Test Test', 'staff', 16, 'Daughter', 'b15', 'prk2', 'Client test', 10, '2023-09-23', '2023-09-23', '21:02:00.000000', '2023-09-23 22:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `renewal`
--

DROP TABLE IF EXISTS `renewal`;
CREATE TABLE `renewal` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dateofdeath` date NOT NULL,
  `transacdate` date NOT NULL,
  `month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `renewal`
--

INSERT INTO `renewal` (`id`, `name`, `dateofdeath`, `transacdate`, `month`) VALUES
(0, 'hahaha', '0000-00-00', '0000-00-00', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `midname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `conpassword` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `cur_date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `midname`, `address`, `email`, `contactno`, `password`, `conpassword`, `role`, `cur_date_time`) VALUES
(8, 'Test', '1', 'Test', 'Gensan', 'Test@gmail.com', '09123456789', 'test12345', 'test12345', 'client', '2023-09-23 18:54:00'),
(9, 'Test', 'Admin', 'Admin', 'admin', 'admin@gmail.com', 'admin', '123', '123', 'admin', '2023-09-23 18:54:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `intermentform`
--
ALTER TABLE `intermentform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renewal`
--
ALTER TABLE `renewal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `intermentform`
--
ALTER TABLE `intermentform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

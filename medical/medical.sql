-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 07:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin-type` enum('admin','super_admin') NOT NULL DEFAULT 'admin',
  `adminadd_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin-type`, `adminadd_date`) VALUES
(1, 'Mohamed', 'm.elzeiny00636@dmu.edu.eg', '$2y$10$X/U6AxyWapUJSCO2vl9Ja.m3cyU2sIYoGDiIhlkFXD6RueAqxKazy', 'admin', '2022-01-07 19:02:39'),
(2, 'Salama', 'mohamed938461@gmail.com', '$2y$10$u/KMn3vMDf27of806FODM.JUbnLCzWvQwzHWGI2IGocdmeJQGSjjW', 'admin', '2022-01-07 19:04:31'),
(11, 'Ali', 'mohamed938461@gmail.com', '123456', 'admin', '2022-01-07 19:24:26'),
(12, 'Mohamed', 'mohamed938461@gmail.com', '$2y$10$NAot8C/ADgLPNqqW2.2hcupCo9rU7I3KWJvehRYY3KOblRCaXNZH6', 'admin', '2022-01-08 18:09:37'),
(13, 'Mohamed', 'mohamed938461@gmail.com', '$2y$10$UeSJZY8Y1iRV3m.JrPDkYOn0UZhMTxJttjf1auQOIAO6lj8sve7Ee', 'admin', '2022-01-08 18:09:57'),
(14, 'Mohamed', 'm.elzeiny00636@dmu.edu.eg', '$2y$10$RAZcG0rjh.zfRp6y0YODdeAU5ZCn8J3.Vc5RKDW64BasCzce/uE3W', 'admin', '2022-01-09 17:28:09'),
(15, 'Mohamed', 'm.elzeiny00636@dmu.edu.eg', '$2y$10$P0gHQtPFIi53VrQp234VWut8BcQQbMO7HCJFE4Numauqeq5tIcWXC', 'admin', '2022-01-09 21:18:22'),
(16, 'ali', 'm.elzeiny00636@dmu.edu.eg', '$2y$10$m7j9Duqm/rsLgWImDSqRMOWyxL8n4Z.NUmFX4NpMdG6HD7AgLpWee', 'admin', '2022-01-09 21:31:56'),
(17, 'Mohamed', 'm.elzeiny00636@dmu.edu.eg', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin', '2022-01-09 21:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `cityadd_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `cityadd_date`) VALUES
(1, 'Alex', '2022-01-09 22:07:39'),
(2, 'Alex', '2022-01-09 22:07:56'),
(3, 'Cairo', '2022-01-09 22:08:14'),
(4, 'cairo', '2022-01-10 15:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_name` varchar(100) NOT NULL,
  `order_phone` varchar(20) NOT NULL,
  `order_email` varchar(50) NOT NULL,
  `order-note` text NOT NULL,
  `order-serv-id` int(11) NOT NULL,
  `order-city-id` int(11) NOT NULL,
  `orderadd-date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `servisies`
--

CREATE TABLE `servisies` (
  `serv_id` int(11) NOT NULL,
  `serv_name` varchar(100) NOT NULL,
  `servadd_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `servisies`
--

INSERT INTO `servisies` (`serv_id`, `serv_name`, `servadd_date`) VALUES
(1, 'Nurse', '2022-01-09 22:16:23'),
(2, '30boor', '2022-01-10 17:19:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order-city-id` (`order-city-id`),
  ADD KEY `order-serv-id` (`order-serv-id`);

--
-- Indexes for table `servisies`
--
ALTER TABLE `servisies`
  ADD PRIMARY KEY (`serv_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `servisies`
--
ALTER TABLE `servisies`
  MODIFY `serv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`order-serv-id`) REFERENCES `servisies` (`serv_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`order-city-id`) REFERENCES `cities` (`city_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

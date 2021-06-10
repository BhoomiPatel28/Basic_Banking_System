-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 11:11 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basic_banking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `ID` int(255) NOT NULL,
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `balance` int(255) NOT NULL,
  `date_time` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`ID`, `sender`, `receiver`, `balance`, `date_time`) VALUES
(1, 'Bhoomi', 'Punit', 88, '2021-06-10 11:18:29.076414'),
(4, 'Pakhi', 'Punit', 737, '2021-06-10 11:51:23.449751'),
(5, 'Karan', 'Krisha', 411, '2021-06-10 11:56:52.134752'),
(7, 'Punit', 'Bhoomi', 100, '2021-06-10 12:11:47.215172'),
(8, 'Bhoomi', 'Punit', 100, '2021-06-10 12:12:09.082768'),
(9, 'Punit', 'Krisha', 537, '2021-06-10 12:16:58.792963'),
(12, 'Saloni', 'Bhoomi', 100, '2021-06-10 14:15:32.199920');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_money`
--

CREATE TABLE `transfer_money` (
  `ID` int(255) NOT NULL,
  `account_no` int(15) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `balance` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer_money`
--

INSERT INTO `transfer_money` (`ID`, `account_no`, `first_name`, `last_name`, `mobile_no`, `email`, `balance`) VALUES
(1, 1234567891, 'Bhoomi', 'Patel', '7886324511', 'bhoomipatel@gmail.com', 45488),
(2, 1234567892, 'Punit', 'Patidar', '9372567322', 'punitpatidar@gmail.com', 33037),
(3, 1234567893, 'Saloni', 'Parmar', '9338326732', 'saloniparmar@gmail.com', 34600),
(5, 1234567894, 'Pakhi', 'Dube', '9736276723', 'pakhidube@gmail.com', 42000),
(6, 1234567895, 'Karan', 'Luthara', '9273724531', 'karanluthara@gmail.com', 233000),
(7, 1234567896, 'Krisha', 'Shah', '9472232451', 'krishashah@gmail.com', 36933),
(8, 1234567897, 'Krupa', 'Akbari', '9523234551', 'krupaakbari@gmail.com', 34000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transfer_money`
--
ALTER TABLE `transfer_money`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `account_no` (`account_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transfer_money`
--
ALTER TABLE `transfer_money`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 12:46 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(25, 'bhoomipatel28', 'bhoomipatel11153@gmail.com', '6de97323dc58900d1f9f454634725587'),
(26, 'punit15dancer', 'punitpatidar@gmail.com', 'a261c90b936a02d175b317b21bab25a9'),
(27, 'saloni#1231', 'saloniparmar@gmail.com', 'dec8d4bfd8e553a81c769a1a0d4b5515'),
(28, 'pakhi#12', 'pakhidube@gmail.com', '0987ddfc8449eb12bdbd0f476367c692'),
(29, 'karan_134', 'karanluthara@gmail.com', '586fa440aac2c9f0f3a0331e302b4c8c'),
(30, 'krisha_shah_12', 'krishashah@gmail.com', '332634eee6d697428f2d30cb10fc3731'),
(31, 'krupa156', 'krupaakbari@gmail.com', 'fad0b46789f61644c3f3de74ef7f563a'),
(32, 'Ruhi21', 'ruhimakwana@gmail.com', '1060b29e7a3fe31afe753900cdd3c3cc'),
(33, 'Dheeraj_12', 'dheerajdhupar@gmail.com', 'fa62d0cc89c745a8df5cb9c7447bd563');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

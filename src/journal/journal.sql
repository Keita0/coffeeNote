-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 09:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeenote`
--

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `coffeeId` int(11) NOT NULL,
  `image` longblob DEFAULT NULL,
  `aroma` varchar(100) NOT NULL,
  `flavor` varchar(100) NOT NULL,
  `roaster` varchar(50) NOT NULL,
  `roastdate` datetime NOT NULL,
  `producer` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `origin` varchar(30) NOT NULL,
  `region` varchar(30) NOT NULL,
  `altitude` int(11) NOT NULL,
  `varietal` varchar(50) NOT NULL,
  `farm` varchar(50) NOT NULL,
  `lot` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `water` float NOT NULL,
  `coffee` float NOT NULL,
  `cwratio` float NOT NULL,
  `method` varchar(50) NOT NULL,
  `extractiontime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`coffeeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `coffeeId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

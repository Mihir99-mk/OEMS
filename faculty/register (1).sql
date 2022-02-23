-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 05:47 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `rId` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`rId`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'vivek', 'patel', 'Mihirkhode99@gmail.com', 'vfgsdfbgfd'),
(2, 'vivek', 'patel', 'Mihirkhode99@gmail.com', 'vfgsdfbgfd'),
(3, 'vivek', 'patel', 'Mihirkhode99@gmail.com', 'mihiedwcd'),
(4, 'Mihir', 'Patel', 'Mihirkhode99@gmail.co0', 'mihirndss'),
(5, 'Mihir', 'khode', 'Mihirkhode7@gmail.com', '@Mihir123'),
(6, 'sanket ', 'khode', 'sanket9@gmail.com', 'sanket'),
(7, 'sanket ', 'khode', 'sanket9@gmail.com', 'sanket'),
(8, 'vivek', 'patel', 'Mihirkhode99@gmail.com', 'wsdefrgbh'),
(9, 'Mihir', 'Patel', 'Mihirkhode99@gmail.com', 'nk,mncdsnm'),
(10, 'mihiwsd', 'edrftger', 'wedrftg@gmail.com', 'edrftgyh6uj7i'),
(11, 'trgyhuji', 'edrftgyhuj', 'Mihirkhode99@gmail.com', 'dcfvgbhnj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`rId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `rId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

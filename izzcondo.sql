-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 08:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `izzcondo`
--

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unitId` int(4) NOT NULL,
  `unitBlock` char(1) NOT NULL,
  `unitNumber` int(2) NOT NULL,
  `unitFloor` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unitId`, `unitBlock`, `unitNumber`, `unitFloor`) VALUES
(1, 'B', 10, 25),
(2, 'A', 4, 18),
(3, 'B', 6, 14),
(4, 'B', 13, 27),
(5, 'A', 15, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(6) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userPass` varchar(30) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userRole` varchar(6) NOT NULL,
  `unitId` int(4) NOT NULL,
  `paymentStatus` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userPass`, `userEmail`, `userRole`, `unitId`, `paymentStatus`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', 0, 'paid'),
(2, 'user', 'user', 'user@gmail.com', 'user', 1, 'paid'),
(3, 'Izz Danish', '123', 'izzdanishadam@gmail.com', 'user', 4, 'pending'),
(4, 'Hiew Wei Lik', '1234', 'cnbtorture69@gmail.com', 'admin', 2, 'overdue'),
(5, 'CF', 'cfnotepad', 'notepaduser@gmail.com', 'user', 3, 'overdue'),
(6, 'Vickram', '12345', 'dndnd@gmail.com', 'user', 5, 'unpaid'),
(7, 'CY', 'designer', 'designer@wix.com', 'user', 1, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unitId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

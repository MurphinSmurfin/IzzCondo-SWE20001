-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 08:43 AM
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
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `header` text NOT NULL,
  `title` text NOT NULL,
  `date` text NOT NULL,
  `description` text NOT NULL,
  `announcementId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`header`, `title`, `date`, `description`, `announcementId`) VALUES
('Gym Renovation Announcement', 'Gym Renovation 13/11 - 21/11', '23/11/2023', 'We are sorry to inform you that the gym will be shutdown temporarily due to renovation until further notice.', 3),
('Water Disruption Announcement', 'Water Shortage', '23/11/2023', 'A pipe burst was located and is currently being fixed. Sorry for the inconvenience', 4),
('Booking System Down', 'Booking System Under Maintenance', '23/11/2023', 'Please proceed to Main Office to book facilities.', 5),
('Maintenance on Pool', 'Pool Maintenance on December', '23/11/2023', 'Pool will be closed for maintenance on December 2023.', 6);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingId` int(11) NOT NULL,
  `bookingVenue` text NOT NULL,
  `bookingDate` date NOT NULL,
  `bookingTime` time NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingId`, `bookingVenue`, `bookingDate`, `bookingTime`, `userId`) VALUES
(1, 'Badminton', '2023-10-06', '14:54:00', 2),
(2, 'Basketball', '2023-11-23', '05:07:00', 3),
(3, 'Basketball', '2023-11-23', '17:06:00', 3),
(4, 'Basketball', '2023-11-23', '19:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `inboxId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `subject` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`inboxId`, `userId`, `subject`, `content`) VALUES
(1, 2, 'Plumbing Issue', 'Okay! Sending plumbers on your way!'),
(3, 3, 'Plumbing Maintenance Request', 'Plumbers are on the way! They brought Mario.'),
(4, 3, 'Parking Request Approved', 'Your parking request for Block B, Floor 3 has been approved. Your parking slot will be in B-3-8.'),
(5, 3, 'Stuck Cat', 'Mario on the way to take your cat out.');

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

CREATE TABLE `parking` (
  `parkingId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `block` varchar(1) NOT NULL,
  `floor` int(11) NOT NULL,
  `unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`parkingId`, `userId`, `block`, `floor`, `unit`) VALUES
(1, 1, 'A', 2, 10),
(2, 2, 'B', 3, 4),
(3, 3, 'A', 4, 9),
(4, 4, 'A', 2, 7),
(5, 5, 'B', 3, 5),
(6, 6, 'B', 4, 1),
(7, 7, 'B', 3, 2),
(8, 2, 'B', 1, 5),
(9, 2, 'B', 3, 3),
(10, 2, 'B', 3, 6),
(11, 3, 'B', 3, 8),
(13, 3, 'B', 1, 11),
(14, 2, 'A', 2, 12),
(15, 3, 'A', 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `requestId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `requestType` text NOT NULL,
  `problem` text NOT NULL,
  `description` text NOT NULL,
  `unitId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`requestId`, `userId`, `requestType`, `problem`, `description`, `unitId`) VALUES
(1, 2, 'Maintenance Request', 'Plumbing Issue', 'test', 1),
(2, 3, 'Maintenance Request', 'Plumbing Issue', '2323', 4),
(4, 2, 'Maintenance Request', 'Pest Issue', 'blegh pests', 1),
(5, 3, 'Parking Request', 'n/a', 'Block B, Floor 3', 4),
(6, 3, 'Maintenance Request', 'Plumbing Issue', 'Help my cat is stuck in the sink', 4),
(7, 3, 'Parking Request', 'n/a', 'Block A, Floor 2', 4);

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
(7, 'CY', 'designer', 'designer@wix.com', 'user', 1, 'pending'),
(9, 'Faizal', 'doesntmatter', 'faizal@gmail.com', 'user', 3, 'paid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcementId`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingId`),
  ADD UNIQUE KEY `bookingId` (`bookingId`),
  ADD UNIQUE KEY `bookingId_2` (`bookingId`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`inboxId`);

--
-- Indexes for table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`parkingId`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`requestId`);

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
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcementId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `inboxId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parking`
--
ALTER TABLE `parking`
  MODIFY `parkingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `requestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

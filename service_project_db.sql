-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 03:42 PM
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
-- Database: `service_project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ServiceID` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Blurb` varchar(100) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Organizer` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Rating` int(11) DEFAULT NULL,
  `MaxUserCount` int(255) NOT NULL,
  `StartDate` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndDate` date NOT NULL,
  `EndTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ServiceID`, `Name`, `Blurb`, `Description`, `Organizer`, `Location`, `Rating`, `MaxUserCount`, `StartDate`, `StartTime`, `EndDate`, `EndTime`) VALUES
(1, 'Dane County', 'service project', 'big service project in dane county', 'organizer', 'location', 5, 10, '2023-11-03', '20:35:36', '2023-11-11', '21:35:36'),
(2, 'Test Service', 'this is a test blurb', 'this is a test description', 'Tester Test', 'Testington', 3, 5, '2016-11-22', '12:38:28', '2023-09-22', '04:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `Picture` varchar(300) DEFAULT NULL,
  `State` varchar(25) DEFAULT NULL,
  `Username` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Password`, `FirstName`, `LastName`, `Picture`, `State`, `Username`) VALUES
(5, '', '', '', NULL, '', ''),
(6, '', '', '', NULL, '', ''),
(7, '', '', '', NULL, '', ''),
(8, '', '', '', NULL, '', ''),
(9, '', '', '', NULL, '', ''),
(10, '', '', '', NULL, '', ''),
(11, '', '', '', NULL, '', ''),
(12, '', '', '', NULL, '', ''),
(13, '', '', '', NULL, '', ''),
(14, '', '', '', NULL, '', ''),
(15, '', '', '', NULL, '', ''),
(16, '', '', '', NULL, '', ''),
(17, '', '', '', NULL, '', ''),
(18, '', '', '', NULL, '', ''),
(19, '', '', '', NULL, '', ''),
(21, 'asdasd', 'asdas', 'asdasd', NULL, 'CA', 'lsullivan@edgewood.edu'),
(22, 'testpassword', 'test_first_name', 'test_last_name', NULL, NULL, 'testAccount');

-- --------------------------------------------------------

--
-- Table structure for table `userprojects`
--

CREATE TABLE `userprojects` (
  `ServiceID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ServiceID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `userprojects`
--
ALTER TABLE `userprojects`
  ADD KEY `ServiceID` (`ServiceID`),
  ADD KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userprojects`
--
ALTER TABLE `userprojects`
  ADD CONSTRAINT `userprojects_ibfk_1` FOREIGN KEY (`ServiceID`) REFERENCES `service` (`ServiceID`),
  ADD CONSTRAINT `userprojects_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

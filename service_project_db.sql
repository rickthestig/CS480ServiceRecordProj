-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 10:37 PM
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
(1, 'Dane County', 'service project', 'big service project in dane county', 'organizer', 'Wisconsin', 5, 10, '2023-11-03', '20:35:36', '2023-11-11', '21:35:36'),
(2, 'Test Service', 'this is a test blurb', 'this is a test description', 'Tester Test', 'Testington', 3, 5, '2016-11-22', '12:38:28', '2023-09-22', '04:15:42'),
(3, 'Trash Pickup', 'Come pickup trash!', 'We go through the city of madison and collect a lot of trash', 'Alexis Davis', 'Wisconsin', 3, 15, '2023-12-12', '06:00:13', '2024-02-14', '04:00:13'),
(4, 'Meal Preppy', 'We are preparing meals for the homeless', 'We are preparing breakfast, lunch, and dinner for the homless', 'Blue Berry', 'Arkansas', 5, 25, '2024-03-15', '13:02:41', '2024-07-13', '15:09:41'),
(5, 'Clothing Drive', 'Donate your clothes and help give them out!', 'We help give clothes to those in need. We drive around our volunteers to hand deliver the warm clothes for the winter.', 'Joe Biden', 'White House', 2, 5, '2024-06-22', '15:10:44', '2026-12-16', '15:10:44'),
(6, 'Service Each Other', 'We provide care to those in need.', 'We welcome any and everyone to volunteer to provide care to our patients. This care includes talking with them.', 'ICare', 'Pennsylvania', 1, 25, '2024-03-08', '06:00:13', '2024-12-28', '15:09:41'),
(7, 'We Clean Toilets', 'Fan of the satisfying bathroom cleaning? Visit our page!', 'Want to go door to door and clean run down neighborhood bathrooms, and freshen them up with new appliances if needed!', 'Albert Simmons', 'California', 4, 15, '2022-12-21', '15:10:44', '2026-12-16', '04:00:13'),
(8, 'Doggies for Kids', 'We offer therapy dogs for kids to play with', 'Come be a volunteer at Doggies for Kids to become a dog owner and spread the love they give off to children in need.', 'Bethany Albright', 'Utah', 2, 10, '2023-11-09', '15:10:44', '2024-07-13', '00:52:03'),
(9, 'WaterForHomeless', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lui Gean', 'New York', 4, 10, '2024-11-09', '12:10:44', '2027-07-13', '00:52:03'),
(10, 'Christmas Meal Prep', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Garret Simmons', 'Virginia', 5, 10, '2023-12-24', '12:10:44', '2023-12-25', '00:52:03'),
(11, 'Winter Crafts', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Baba Booey', 'North Carolina', 1, 10, '2023-12-24', '12:10:44', '2023-12-25', '00:52:03'),
(12, 'Negative Service', 'Someone has to have a 0 rating :(', 'help', 'Negative Nancy', 'Wisconsin', 0, 15, '2023-11-09', '06:00:13', '2026-12-16', '15:10:44');

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
(23, 'password', 'first', 'last', 'picture', NULL, 'test@ec.edu');

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
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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

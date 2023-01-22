-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 03:11 PM
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
-- Database: `pars`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(10) NOT NULL,
  `clientID` int(10) NOT NULL,
  `flightNumber` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Origin` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Destination` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `NumOfSeats` int(5) NOT NULL,
  `addDate` date NOT NULL,
  `addTime` time NOT NULL,
  `user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `editDate` date DEFAULT NULL,
  `editTime` time DEFAULT NULL,
  `editUser` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `clientID`, `flightNumber`, `Origin`, `Destination`, `NumOfSeats`, `addDate`, `addTime`, `user`, `editDate`, `editTime`, `editUser`) VALUES
(19, 35, 'PR312', 'MNL', 'HKG', 1, '2023-01-22', '21:42:34', 'admin', NULL, NULL, NULL),
(20, 36, 'CX709', 'HKG', 'BKK', 1, '2023-01-22', '21:48:54', 'jonas', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookingr`
--

CREATE TABLE `bookingr` (
  `bookingID` int(10) NOT NULL,
  `clientID` int(10) NOT NULL,
  `flightNumber1` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `flightNumber2` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Origin1` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Destination1` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Origin2` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Destination2` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `NumOfSeats` int(5) NOT NULL,
  `addDate` date NOT NULL,
  `addTime` time NOT NULL,
  `user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookingr`
--

INSERT INTO `bookingr` (`bookingID`, `clientID`, `flightNumber1`, `flightNumber2`, `Origin1`, `Destination1`, `Origin2`, `Destination2`, `NumOfSeats`, `addDate`, `addTime`, `user`) VALUES
(10, 33, 'PR312', 'TG621', 'MNL', 'HKG', 'MNL', 'BKK', 2, '2023-01-22', '21:18:08', 'admin'),
(11, 37, '5J907', 'PR612', 'MNL', 'CEB', 'DVO', 'CRK', 1, '2023-01-22', '21:50:14', 'jonas');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flightNumber` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Origin` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Destination` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `dateDepartOrigin` date NOT NULL,
  `timeDepartOrigin` time NOT NULL,
  `dateArriveDestination` date NOT NULL,
  `timeArriveDestination` time NOT NULL,
  `Type` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `AircraftModel` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flightNumber`, `Origin`, `Destination`, `dateDepartOrigin`, `timeDepartOrigin`, `dateArriveDestination`, `timeArriveDestination`, `Type`, `AircraftModel`) VALUES
('PR312', 'MNL', 'HKG', '2022-12-06', '19:00:00', '2022-12-06', '23:30:00', 'I', 'A330'),
('TG621', 'MNL', 'BKK', '2022-12-18', '20:00:00', '2022-12-18', '23:00:00', 'I', 'A320'),
('CX709', 'HKG', 'BKK', '2022-12-19', '20:00:00', '2022-12-19', '23:00:00', 'I', 'A330'),
('5J907', 'MNL', 'CEB', '2022-12-20', '12:00:00', '2022-12-20', '14:00:00', 'D', 'A320'),
('PR612', 'DVO', 'CRK', '2022-12-21', '15:30:00', '2022-12-21', '18:30:00', 'D', 'A330');

-- --------------------------------------------------------

--
-- Table structure for table `flightarchive`
--

CREATE TABLE `flightarchive` (
  `flightNumber` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Origin` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Destination` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `dateDepartOrigin` date NOT NULL,
  `timeDepartOrigin` time NOT NULL,
  `dateArriveDestination` date NOT NULL,
  `timeArriveDestination` time NOT NULL,
  `Type` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `AircraftModel` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flight_seat`
--

CREATE TABLE `flight_seat` (
  `clientID` int(10) DEFAULT NULL,
  `passengerID` int(10) DEFAULT NULL,
  `flightNumber` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `SeatClass` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Seat` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `bookingID` int(10) DEFAULT NULL,
  `bookingrID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `flight_seat`
--

INSERT INTO `flight_seat` (`clientID`, `passengerID`, `flightNumber`, `SeatClass`, `Seat`, `bookingID`, `bookingrID`) VALUES
(33, 33, 'PR312', 'J', 'G1', NULL, 10),
(33, 33, 'TG621', 'J', 'B1', NULL, 10),
(33, 34, 'PR312', 'J', 'D1', NULL, 10),
(33, 34, 'TG621', 'J', 'A1', NULL, 10),
(35, 35, 'PR312', 'J', 'A1', 19, NULL),
(36, 36, 'CX709', 'Y', 'C31', 20, NULL),
(37, 37, '5J907', 'P', 'A7', NULL, 11),
(37, 37, 'PR612', 'P', 'K23', NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `flight_seatarchive`
--

CREATE TABLE `flight_seatarchive` (
  `clientID` int(10) DEFAULT NULL,
  `flightNumber` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `flightSeatClass` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `flightSeatNumber` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pnr`
--

CREATE TABLE `pnr` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(70) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `MiddleName` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `LastName` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Gender` varchar(3) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Birthday` date NOT NULL,
  `Age` int(3) NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `ContactNum` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Nationality` varchar(5) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `addDate` date NOT NULL,
  `addTime` time NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `pnr`
--

INSERT INTO `pnr` (`ID`, `FirstName`, `MiddleName`, `LastName`, `Gender`, `Birthday`, `Age`, `Email`, `ContactNum`, `Nationality`, `addDate`, `addTime`, `user`) VALUES
(33, 'Kobe', 'Bean', 'Bryant', 'M', '2023-01-08', 40, 'kobe@kobe.com', '09569210432', 'USA', '2023-01-22', '21:18:08', 'admin'),
(34, 'Kenneth', '', 'Uy', 'M', '2001-06-20', 21, 'kenneth@gmail.com', '09151792760', 'PHL', '2023-01-22', '21:18:08', 'admin'),
(35, 'LeBron', '', 'James', 'M', '2023-01-08', 35, 'lbj@yahoo.com', '09569210432', 'USA', '2023-01-22', '21:42:34', 'admin'),
(36, 'Damian', '', 'Lillard', 'M', '2023-01-14', 34, 'dl@hotmail.com', '09569210432', 'USA', '2023-01-22', '21:48:54', 'jonas'),
(37, 'DeMar', '', 'DeRozan', 'M', '2023-01-01', 33, 'dr@dr.com', '09569210432', 'USA', '2023-01-22', '21:50:14', 'jonas');

-- --------------------------------------------------------

--
-- Table structure for table `pnr_flight`
--

CREATE TABLE `pnr_flight` (
  `ID` int(10) NOT NULL,
  `flightNumber` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Type` varchar(5) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `ssr` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `user` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `pnr_flight`
--

INSERT INTO `pnr_flight` (`ID`, `flightNumber`, `Type`, `ssr`, `remarks`, `user`) VALUES
(33, 'PR312', 'ADT', '  JPML ', '', 'admin'),
(33, 'TG621', 'ADT', '  JPML ', '', 'admin'),
(34, 'PR312', 'ADT', '  CHML ', '', 'admin'),
(34, 'TG621', 'ADT', '  CHML ', '', 'admin'),
(35, 'PR312', 'ADT', '   ', '', 'admin'),
(36, 'CX709', 'ADT', '   ', '', 'jonas'),
(37, '5J907', 'ADT', 'DEAF  FPML ', '', 'jonas'),
(37, 'PR612', 'ADT', 'DEAF  FPML ', '', 'jonas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(10) NOT NULL,
  `userFirstName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `userMiddleName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `userLastName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `userType` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userFirstName`, `userMiddleName`, `userLastName`, `username`, `password`, `userType`) VALUES
(1, '', '', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'A'),
(2, 'Sean', 'Uy', 'Santos', 'sean', '9b938710211168f2902f9ed4357cd05c', 'U'),
(4, 'Jonas', '', 'Napiza', 'jonas', '1e0a158c429c9e2564d5e12f5e960d97', 'U'),
(5, 'Neil', '', 'Ong', 'neil', 'ddf10d41d5d840f6a7d0079028ddd3d6', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `user_1stpass`
--

CREATE TABLE `user_1stpass` (
  `userID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_sign_in_log`
--

CREATE TABLE `user_sign_in_log` (
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sign_in_log`
--

INSERT INTO `user_sign_in_log` (`username`, `date`, `time`) VALUES
('admin', '2022-12-16', '23:16:36'),
('sean', '2022-12-16', '23:21:02'),
('admin', '2022-12-16', '23:23:06'),
('sean', '2022-12-16', '23:54:51'),
('admin', '2022-12-16', '23:56:53'),
('admin', '2022-12-17', '01:23:03'),
('admin', '2022-12-18', '13:57:47'),
('admin', '2022-12-18', '14:35:26'),
('admin', '2022-12-18', '15:10:07'),
('admin', '2022-12-18', '16:17:14'),
('sean', '2022-12-18', '17:00:56'),
('admin', '2022-12-18', '17:12:35'),
('sean', '2022-12-18', '19:06:08'),
('admin', '2022-12-18', '19:13:37'),
('sean', '2022-12-18', '22:23:16'),
('admin', '2022-12-18', '22:39:59'),
('sean', '2022-12-18', '23:14:17'),
('admin', '2022-12-18', '23:18:11'),
('sean', '2022-12-19', '00:37:03'),
('admin', '2022-12-19', '01:43:18'),
('admin', '2022-12-19', '13:36:46'),
('admin', '2022-12-20', '12:42:09'),
('admin', '2022-12-20', '13:17:54'),
('sean', '2022-12-20', '14:13:06'),
('admin', '2022-12-20', '14:19:50'),
('admin', '2022-12-20', '15:34:25'),
('admin', '2022-12-28', '17:14:38'),
('sean', '2023-01-04', '14:18:56'),
('admin', '2023-01-04', '14:19:03'),
('admin', '2023-01-04', '16:17:03'),
('admin', '2023-01-04', '17:44:01'),
('admin', '2023-01-04', '17:47:10'),
('admin', '2023-01-04', '18:00:01'),
('admin', '2023-01-04', '18:39:01'),
('admin', '2023-01-04', '18:52:34'),
('admin', '2023-01-04', '18:58:39'),
('admin', '2023-01-04', '19:00:39'),
('admin', '2023-01-04', '19:01:50'),
('admin', '2023-01-04', '19:02:09'),
('admin', '2023-01-04', '19:28:13'),
('admin', '2023-01-04', '19:51:19'),
('admin', '2023-01-04', '23:23:18'),
('admin', '2023-01-05', '00:02:18'),
('admin', '2023-01-05', '00:09:08'),
('admin', '2023-01-05', '13:44:36'),
('admin', '2023-01-05', '21:31:34'),
('admin', '2023-01-05', '22:30:29'),
('admin', '2023-01-05', '22:36:51'),
('admin', '2023-01-05', '22:40:40'),
('admin', '2023-01-06', '15:24:47'),
('admin', '2023-01-06', '15:57:24'),
('admin', '2023-01-07', '16:54:45'),
('admin', '2023-01-07', '18:25:28'),
('admin', '2023-01-07', '18:28:28'),
('admin', '2023-01-07', '18:36:04'),
('admin', '2023-01-07', '18:36:45'),
('admin', '2023-01-07', '18:49:11'),
('admin', '2023-01-07', '18:49:18'),
('admin', '2023-01-11', '17:02:33'),
('admin', '2023-01-12', '15:21:38'),
('admin', '2023-01-20', '14:39:33'),
('admin', '2023-01-20', '15:04:54'),
('admin', '2023-01-21', '12:34:02'),
('admin', '2023-01-21', '12:42:29'),
('admin', '2023-01-21', '14:17:59'),
('admin', '2023-01-21', '14:33:17'),
('admin', '2023-01-21', '21:33:52'),
('admin', '2023-01-21', '21:34:00'),
('admin', '2023-01-22', '00:04:00'),
('admin', '2023-01-22', '00:16:11'),
('admin', '2023-01-22', '00:53:32'),
('admin', '2023-01-22', '01:29:27'),
('admin', '2023-01-22', '11:50:18'),
('jonas', '2023-01-22', '11:51:17'),
('admin', '2023-01-22', '11:51:50'),
('jonas', '2023-01-22', '11:53:07'),
('jonas', '2023-01-22', '11:53:23'),
('jonas', '2023-01-22', '11:55:36'),
('admin', '2023-01-22', '11:55:43'),
('jonas', '2023-01-22', '11:55:50'),
('admin', '2023-01-22', '12:02:26'),
('jonas', '2023-01-22', '12:02:35'),
('admin', '2023-01-22', '12:02:48'),
('jonas', '2023-01-22', '12:03:23'),
('admin', '2023-01-22', '12:05:21'),
('jonas', '2023-01-22', '12:05:46'),
('admin', '2023-01-22', '12:08:37'),
('jonas', '2023-01-22', '12:12:21'),
('jonas', '2023-01-22', '12:12:38'),
('jonas', '2023-01-22', '12:12:56'),
('admin', '2023-01-22', '12:13:01'),
('neil', '2023-01-22', '12:13:55'),
('neil', '2023-01-22', '12:14:05'),
('admin', '2023-01-22', '12:14:08'),
('admin', '2023-01-22', '15:22:36'),
('jonas', '2023-01-22', '15:23:04'),
('jonas', '2023-01-22', '15:23:19'),
('jonas', '2023-01-22', '15:23:37'),
('admin', '2023-01-22', '15:23:39'),
('jonas', '2023-01-22', '15:24:26'),
('admin', '2023-01-22', '15:24:39'),
('admin', '2023-01-22', '17:19:08'),
('admin', '2023-01-22', '17:42:02'),
('admin', '2023-01-22', '18:12:02'),
('admin', '2023-01-22', '18:44:44'),
('admin', '2023-01-22', '18:51:20'),
('admin', '2023-01-22', '19:20:21'),
('admin', '2023-01-22', '21:14:01'),
('jonas', '2023-01-22', '21:43:45'),
('jonas', '2023-01-22', '21:43:56'),
('admin', '2023-01-22', '21:50:25'),
('admin', '2023-01-22', '21:57:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `clientID` (`clientID`,`flightNumber`);

--
-- Indexes for table `bookingr`
--
ALTER TABLE `bookingr`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `clientID` (`clientID`,`flightNumber1`);

--
-- Indexes for table `flight_seat`
--
ALTER TABLE `flight_seat`
  ADD KEY `flightNumber` (`flightNumber`,`clientID`);

--
-- Indexes for table `flight_seatarchive`
--
ALTER TABLE `flight_seatarchive`
  ADD KEY `flightNumber` (`flightNumber`,`clientID`);

--
-- Indexes for table `pnr`
--
ALTER TABLE `pnr`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bookingr`
--
ALTER TABLE `bookingr`
  MODIFY `bookingID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pnr`
--
ALTER TABLE `pnr`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

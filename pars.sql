-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 06:38 PM
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
  `flightNumber` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `bookingOrigin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bookingDestination` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bookingNumOfSeats` int(5) NOT NULL,
  `addBookingDate` date NOT NULL,
  `addBookingTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `clientID`, `flightNumber`, `bookingOrigin`, `bookingDestination`, `bookingNumOfSeats`, `addBookingDate`, `addBookingTime`) VALUES
(3, 9, 'TG621', 'MNL', 'BKK', 2, '2022-12-14', '19:48:28'),
(4, 9, 'TG621', 'MNL', 'BKK', 2, '2022-12-14', '19:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientID` int(10) NOT NULL,
  `clientFirstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `clientMiddleName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `clientLastName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `clientGender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `clientBirthday` date NOT NULL,
  `clientAge` int(3) NOT NULL,
  `clientEmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `clientContactNum` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `clientNationality` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `clientType` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addClientDate` date NOT NULL,
  `addClientTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientID`, `clientFirstName`, `clientMiddleName`, `clientLastName`, `clientGender`, `clientBirthday`, `clientAge`, `clientEmail`, `clientContactNum`, `clientNationality`, `clientType`, `addClientDate`, `addClientTime`) VALUES
(9, 'Sean Kenneth', 'Uy', 'Santos', 'M', '2001-06-20', 21, 'sean@gmail.com', '09569210432', 'PHL', 'N', '2022-12-14', '17:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flightNumber` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `flightOrigin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `flightDestination` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dateDepartOrigin` date NOT NULL,
  `timeDepartOrigin` time NOT NULL,
  `dateArriveDestination` date NOT NULL,
  `timeArriveDestination` time NOT NULL,
  `flightType` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `flightAircraftModel` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flightNumber`, `flightOrigin`, `flightDestination`, `dateDepartOrigin`, `timeDepartOrigin`, `dateArriveDestination`, `timeArriveDestination`, `flightType`, `flightAircraftModel`) VALUES
('TG621', 'MNL', 'BKK', '2022-12-05', '20:30:00', '2022-12-05', '23:30:00', 'I', 'A320'),
('PR312', 'MNL', 'HKG', '2022-12-06', '19:00:00', '2022-12-06', '23:30:00', 'I', 'A330');

-- --------------------------------------------------------

--
-- Table structure for table `flightarchive`
--

CREATE TABLE `flightarchive` (
  `flightNumber` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `flightOrigin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `flightDestination` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dateDepartOrigin` date NOT NULL,
  `timeDepartOrigin` time NOT NULL,
  `dateArriveDestination` date NOT NULL,
  `timeArriveDestination` time NOT NULL,
  `flightType` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `flightAircraftModel` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `flightarchive`
--

INSERT INTO `flightarchive` (`flightNumber`, `flightOrigin`, `flightDestination`, `dateDepartOrigin`, `timeDepartOrigin`, `dateArriveDestination`, `timeArriveDestination`, `flightType`, `flightAircraftModel`) VALUES
('CX709', 'HKG', 'BKK', '2022-12-05', '19:00:00', '2022-12-05', '23:30:00', 'I', 'A320');

-- --------------------------------------------------------

--
-- Table structure for table `flight_seat`
--

CREATE TABLE `flight_seat` (
  `passengerID` int(10) DEFAULT NULL,
  `clientID` int(10) DEFAULT NULL,
  `flightNumber` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `flightSeatClass` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `flightSeatNumber` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `flight_seat`
--

INSERT INTO `flight_seat` (`passengerID`, `clientID`, `flightNumber`, `flightSeatClass`, `flightSeatNumber`, `remarks`) VALUES
(NULL, 9, 'TG621', 'Y', 'B31', 'Needs you uwu'),
(NULL, 9, 'TG621', 'Y', 'E31', 'Needs you uwu'),
(14, 9, 'TG621', 'Y', 'D31', 'Needs you too uwu');

-- --------------------------------------------------------

--
-- Table structure for table `flight_seatarchive`
--

CREATE TABLE `flight_seatarchive` (
  `passengerID` int(10) DEFAULT NULL,
  `clientID` int(10) DEFAULT NULL,
  `flightNumber` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `flightSeatClass` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `flightSeatNumber` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `clientID` int(10) NOT NULL,
  `passengerID` int(10) NOT NULL,
  `passengerFirstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `passengerMiddleName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `passengerLastName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `passengerGender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `passengerBirthday` date NOT NULL,
  `passengerAge` int(3) NOT NULL,
  `passengerEmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `passengerContactNum` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `passengerNationality` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `passengerType` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addPassengerDate` date NOT NULL,
  `addPassengerTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`clientID`, `passengerID`, `passengerFirstName`, `passengerMiddleName`, `passengerLastName`, `passengerGender`, `passengerBirthday`, `passengerAge`, `passengerEmail`, `passengerContactNum`, `passengerNationality`, `passengerType`, `addPassengerDate`, `addPassengerTime`) VALUES
(9, 14, 'Neil Matthew', 'Apuli', 'Ong', 'M', '2022-12-26', 21, 'neil@gmail.com', '09171592760', 'PHL', 'H', '2022-12-14', '19:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(10) NOT NULL,
  `userFirstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `userMiddleName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `userLastName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userType` varchar(13) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userFirstName`, `userMiddleName`, `userLastName`, `username`, `password`, `userType`) VALUES
(1, '', '', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'A'),
(2, 'Sean Kenneth', 'Uy', 'Santos', 'sean', '9b938710211168f2902f9ed4357cd05c', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `user_sign_in_log`
--

CREATE TABLE `user_sign_in_log` (
  `username` varchar(30) NOT NULL,
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
('admin', '2022-12-17', '01:23:03');

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
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `flight_seat`
--
ALTER TABLE `flight_seat`
  ADD KEY `passengerID` (`passengerID`),
  ADD KEY `flightNumber` (`flightNumber`,`clientID`);

--
-- Indexes for table `flight_seatarchive`
--
ALTER TABLE `flight_seatarchive`
  ADD KEY `passengerID` (`passengerID`),
  ADD KEY `flightNumber` (`flightNumber`,`clientID`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`passengerID`),
  ADD KEY `clientID` (`clientID`);

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
  MODIFY `bookingID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `passengerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

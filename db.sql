-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2018 at 10:56 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelreservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'root', '123');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingID` int(11) NOT NULL,
  `fName` varchar(15) NOT NULL,
  `lName` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `checkInDate` date NOT NULL,
  `chekOutDate` date NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `reqs` text NOT NULL,
  `price` float NOT NULL,
  `roomType` varchar(15) NOT NULL,
  `noRooms` int(11) NOT NULL,
  `statusPayment` varchar(10) NOT NULL,
  `dateSpan` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingID`, `fName`, `lName`, `email`, `checkInDate`, `chekOutDate`, `telephone`, `reqs`, `price`, `roomType`, `noRooms`, `statusPayment`, `dateSpan`) VALUES
(1, 'chamod', 'nimsara', 'chamodnimsara@something.com', '2018-02-21', '2018-02-23', '0127564783', 'nothing ', 10000, 'Deluxe Room', 2, 'paid', '21,22,23'),
(2, 'Jon', 'Snow', 'JonSnow@gmail.com', '2018-06-08', '2018-06-15', '0896786543', 'winter is coming', 525000, 'Deluxe Room', 3, 'paid', '8,9,10,11,12,13,14,15'),
(6, 'Rielly', 'Nathan', 'Nathen@yahoo.com', '2018-06-16', '2018-06-17', '1231231231', '', 20000, 'Executive Room', 1, 'bookedonly', '16,17'),
(5, 'brian', 'Conner', 'brian@gmail.com', '2018-06-07', '2018-06-09', '0986785674', 'ocen view ', 40000, 'Executive Room', 2, 'bookedonly', '7,8,9'),
(12, 'Dexter ', 'Morgan', 'DexterMorgan@gmail.com', '2018-06-06', '2018-06-09', '9086752341', 'i comming for  you .... watch you back', 15000, 'Deluxe Room', 1, 'paid', '6,7,8,9'),
(14, 'Sansa', 'Stark', 'sansa@winterisComming.com', '2018-06-06', '2018-06-08', '0987123456', '', 10000, 'Deluxe Room', 1, 'paid', '6,7,8,9'),
(16, 'demon', 'wolf', 'demon@gmail.com', '2018-06-08', '2018-06-09', '123123123', 'nothing', 5000, 'Deluxe Room', 1, 'paid', '8,9'),
(45, 'asdasd', 'sdads', 'das@asd.com', '2018-06-11', '2018-06-14', '1231231231', 'asda', 15000, 'Deluxe Room', 1, 'bookedonly', '11,12,13,14'),
(52, 'asdsad', 'asdas', 'das@asd.com', '2018-06-11', '2018-06-14', '2341231231', 'sdas', 15000, 'Deluxe Room', 1, 'paid', '11,12,13,14'),
(58, 'chamod', 'nimsara', 'chamod@gmail.com', '2018-06-11', '2018-06-14', '1231231231', 'i  just wanna ...', 15000, 'Deluxe Room', 1, 'bookedonly', '11,12,13,14'),
(59, 'asd', 'asdas', 'qwe2@sadhj.com', '2018-06-12', '2018-06-14', '1231231231', 'asdsdasd', 30000, 'Premium Room', 1, 'bookedonly', '12,13,14'),
(56, 'asdsad', 'asdas', 'das@asd.com', '2018-06-11', '2018-06-14', '2341231231', 'sdas', 15000, 'Deluxe Room', 1, 'paid', '11,12,13,14');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `rID` int(11) NOT NULL,
  `type` varchar(15) NOT NULL,
  `fullAmount` int(11) NOT NULL,
  `availableAmount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rID`, `type`, `fullAmount`, `availableAmount`) VALUES
(1, 'Deluxe Room', 20, 8),
(2, 'Executive Room', 10, 7),
(3, 'Premium Room', 10, 9),
(4, 'Superior Room', 8, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`rID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `rID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

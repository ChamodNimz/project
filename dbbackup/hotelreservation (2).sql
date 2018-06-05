-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 04, 2018 at 07:34 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'root', '123');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `bookingID` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`bookingID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingID`, `fName`, `lName`, `email`, `checkInDate`, `chekOutDate`, `telephone`, `reqs`, `price`, `roomType`, `noRooms`, `statusPayment`) VALUES
(1, 'chamod', 'nimsara', 'chamodnimsara@something.com', '2018-02-21', '2018-02-23', '0127564783', 'nothing ', 10000, 'Deluxe Room', 2, 'paid'),
(2, 'Jon', 'Snow', 'JonSnow@gmail.com', '2018-06-08', '2018-06-15', '0896786543', 'winter is coming', 525000, 'Deluxe Room', 3, 'paid'),
(6, 'Rielly', 'Nathan', 'Nathen@yahoo.com', '2018-06-15', '2018-06-17', '1231231231', '', 20000, 'Executive Room', 1, 'bookedonly'),
(5, 'brian', 'Conner', 'brian@gmail.com', '2018-06-07', '2018-06-09', '0986785674', 'ocen view ', 40000, 'Executive Room', 2, 'bookedonly'),
(7, 'Brian', 'Tarth', 'Brian@yahoo.com', '2018-06-13', '2018-06-15', '1231231231', 'nothing my lord', 100000, 'Superior Room', 2, 'bookedonly'),
(8, 'Joffrey', 'Barathian', 'Joffery@yahoo.com', '2018-06-07', '2018-06-09', '1234567980', 'i am the rogue king', 20000, 'Deluxe Room', 2, 'bookedonly');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `rID` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(15) NOT NULL,
  `fullAmount` int(11) NOT NULL,
  `availableAmount` int(11) NOT NULL,
  PRIMARY KEY (`rID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rID`, `type`, `fullAmount`, `availableAmount`) VALUES
(1, 'Deluxe Room', 20, 18),
(2, 'Executive Room', 10, 10),
(3, 'Premium Room', 10, 10),
(4, 'Superior Room', 8, 8);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

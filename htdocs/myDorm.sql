-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2017 at 12:20 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myDorm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `telephone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `electricRate` int(100) NOT NULL,
  `waterRate` int(100) NOT NULL,
  `username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`telephone`, `address`, `electricRate`, `waterRate`, `username`, `password`) VALUES
('081-234-5678', '123/456 Charongkrung Rd., Ladkrabang, Bangkok, Thailand 10520', 8, 18, 'admin', 'mydorm');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomID` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `userID` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomID`, `userID`, `price`) VALUES
('1101', '0001', 4500),
('1102', '0002', 4500),
('1103', '0003', 5000),
('1104', '0004', 5000),
('1105', '0005', 5000),
('1106', '0006', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `personalID` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `contract` date NOT NULL,
  `picture` text COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `moveout` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `name`, `nickname`, `personalID`, `address`, `contract`, `picture`, `total`, `moveout`) VALUES
('0001', 'titlez', 'ilovese', 'Jeerakitti Niamlarp', 'Title', '1234567890123', '132/36 Rama XI rd., Samsen-Nai, Phayathai, Bangkok, Thailand 10400', '2018-08-31', 'url', 0, '2017-12-27'),
('0002', 'mormix', 'ilikese', 'Tuchchapol Tuanghirunvimon', 'Mix', '3210987654321', '24 soi petkasem 62/1 bangkae bangkok 10160', '2018-06-30', 'url', 0, NULL),
('0003', 'mew_maro', 'lazygirl', 'Mew Maro', 'Mew', '1092355555000', 'Sapran loi', '2018-02-28', 'url', 0, NULL),
('0004', 'nut_eieiza', 'javaboss', 'Nut TheJavaBoy', 'Nut', '1111111111111', 'ESL', '2018-03-31', 'url', 5812, NULL),
('0005', 'meenza', 'meeneiei', 'Meen Eiei', 'Meen', '2222222222222', 'Mai roo ah', '2018-03-31', 'url', 0, NULL),
('0006', 'monandchin', 'cinnamon', 'Mon Chin', 'Cinnamon', '5555555555555', 'Make', '2018-01-31', 'url', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

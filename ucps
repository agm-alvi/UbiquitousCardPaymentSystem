-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2019 at 07:39 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ubiquitous_card`
--

-- --------------------------------------------------------

--
-- Table structure for table `filling_station`
--

CREATE TABLE `filling_station` (
  `sl` int(10) NOT NULL,
  `ID` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `u_Name` varchar(50) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parking_lot`
--

CREATE TABLE `parking_lot` (
  `sl` int(10) NOT NULL,
  `ID` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `u_Name` varchar(50) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `toll_booth`
--

CREATE TABLE `toll_booth` (
  `sl` int(10) NOT NULL,
  `ID` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `u_Name` varchar(50) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` varchar(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `Name`, `Balance`) VALUES
('3F AD 4D 29', 'AAA', 5000),
('71 F3 3D 08', 'CCC', 5000),
('A1 F4 78 D5', 'DDD', 5000),
('41 24 9D D5', 'EEE', 5000),
('C1 7B E5 D5', 'FFF', 5000),
('B0 77 BB 25', 'BBB', 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filling_station`
--
ALTER TABLE `filling_station`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `Name` (`sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filling_station`
--
ALTER TABLE `filling_station`
  MODIFY `sl` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

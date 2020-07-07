-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2020 at 12:04 AM
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
-- Database: `ucps`
--

-- --------------------------------------------------------

--
-- Table structure for table `filling_station`
--

CREATE TABLE `filling_station` (
  `sl` int(10) NOT NULL,
  `ID` int(10) NOT NULL,
  `u_id` varchar(10) NOT NULL,
  `u_Name` varchar(50) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `trx_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parking_lot`
--

CREATE TABLE `parking_lot` (
  `sl` int(10) NOT NULL,
  `ID` int(10) NOT NULL,
  `u_id` varchar(10) NOT NULL,
  `u_Name` varchar(50) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `trx_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `toll_booth`
--

CREATE TABLE `toll_booth` (
  `sl` int(10) UNSIGNED ZEROFILL NOT NULL,
  `ID` int(10) NOT NULL,
  `u_id` varchar(12) NOT NULL,
  `u_Name` varchar(50) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `trx_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toll_booth`
--

INSERT INTO `toll_booth` (`sl`, `ID`, `u_id`, `u_Name`, `Amount`, `Date`, `Time`, `trx_id`) VALUES
(0000000128, 24, '71 F3 3D 08', 'XYZ', 300, '2020-03-25', '18:32:23', 'TB24-005-20032518322'),
(0000000129, 35, '3F AD 4D 29', 'Jahid Hasan Alvi', 500, '2020-03-25', '18:42:44', 'TB35-001-20032518424'),
(0000000130, 14, 'B0 77 BB 25', 'Ekhtear Uddin Khan', 300, '2020-03-25', '18:44:50', 'TB14-002-20032518445'),
(0000000131, 72, '41 24 9D D5', 'PQR', 700, '2020-03-26', '21:53:40', 'TB72-006-20032621534');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `sl` int(10) NOT NULL,
  `u_id` varchar(12) NOT NULL,
  `u_Name` varchar(50) NOT NULL,
  `Amount` int(10) NOT NULL,
  `trx_field` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `trx_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`sl`, `u_id`, `u_Name`, `Amount`, `trx_field`, `Date`, `Time`, `trx_id`) VALUES
(106, '71 F3 3D 08', 'XYZ', 300, 'Toll Booth 24', '2020-03-25', '18:32:23', 'TB24-005-20032518322'),
(107, '3F AD 4D 29', 'Jahid Hasan Alvi', 500, 'Toll Booth 35', '2020-03-25', '18:42:44', 'TB35-001-20032518424'),
(108, 'B0 77 BB 25', 'Ekhtear Uddin Khan', 300, 'Toll Booth 14', '2020-03-25', '18:44:50', 'TB14-002-20032518445'),
(109, '41 24 9D D5', 'PQR', 700, 'Toll Booth 72', '2020-03-26', '21:53:40', 'TB72-006-20032621534');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filling_station`
--
ALTER TABLE `filling_station`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `Name` (`sl`),
  ADD UNIQUE KEY `trx_id` (`trx_id`);

--
-- Indexes for table `parking_lot`
--
ALTER TABLE `parking_lot`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `sl` (`sl`),
  ADD UNIQUE KEY `trx_id` (`trx_id`);

--
-- Indexes for table `toll_booth`
--
ALTER TABLE `toll_booth`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `sl` (`sl`),
  ADD UNIQUE KEY `trx_id` (`trx_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `sl` (`sl`),
  ADD UNIQUE KEY `trx_id` (`trx_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filling_station`
--
ALTER TABLE `filling_station`
  MODIFY `sl` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parking_lot`
--
ALTER TABLE `parking_lot`
  MODIFY `sl` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `toll_booth`
--
ALTER TABLE `toll_booth`
  MODIFY `sl` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `sl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

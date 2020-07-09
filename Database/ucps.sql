-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2020 at 01:54 AM
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
-- Table structure for table `card_recharge`
--

CREATE TABLE `card_recharge` (
  `sl` int(10) NOT NULL,
  `ID` int(10) NOT NULL,
  `u_id` varchar(15) NOT NULL,
  `u_Name` varchar(50) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `trx_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card_recharge`
--

INSERT INTO `card_recharge` (`sl`, `ID`, `u_id`, `u_Name`, `Amount`, `Date`, `Time`, `trx_id`) VALUES
(2, 24, '3F AD 4D 29', 'Jahid Hasan Alvi', 1000, '2020-03-25', '19:06:12', 'CR024-001-200325190612');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `u_sl` varchar(10) NOT NULL,
  `u_id` varchar(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Balance` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`u_sl`, `u_id`, `Name`, `Balance`, `username`, `password`) VALUES
('001', '3F AD 4D 29', 'Jahid Hasan Alvi', 5500, 'alvi', 'abcd'),
('002', 'B0 77 BB 25', 'Ekhtear Uddin Khan', 4700, 'ekhtear', 'efgh'),
('003', 'A1 F4 78 D5', 'Asha Das', 4100, 'asha', 'ijkl'),
('004', 'C1 7B E5 D5', 'UVW', 5000, '', ''),
('005', '71 F3 3D 08', 'XYZ', 1700, '', ''),
('006', '41 24 9D D5', 'PQR', 4300, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `filling_station`
--

CREATE TABLE `filling_station` (
  `sl` int(10) NOT NULL,
  `ID` int(10) NOT NULL,
  `u_id` varchar(15) NOT NULL,
  `u_Name` varchar(50) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `trx_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parking_lot`
--

CREATE TABLE `parking_lot` (
  `sl` int(10) NOT NULL,
  `ID` int(10) NOT NULL,
  `u_id` varchar(15) NOT NULL,
  `u_Name` varchar(50) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `trx_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `toll_booth`
--

CREATE TABLE `toll_booth` (
  `sl` int(10) UNSIGNED ZEROFILL NOT NULL,
  `ID` int(10) NOT NULL,
  `u_id` varchar(15) NOT NULL,
  `u_Name` varchar(50) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `trx_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toll_booth`
--

INSERT INTO `toll_booth` (`sl`, `ID`, `u_id`, `u_Name`, `Amount`, `Date`, `Time`, `trx_id`) VALUES
(0000000129, 603, '3F AD 4D 29', 'Jahid Hasan Alvi', 500, '2020-03-25', '18:42:44', 'TB603-001-200325184244'),
(0000000130, 615, 'B0 77 BB 25', 'Ekhtear Uddin Khan', 300, '2020-03-25', '18:44:50', 'TB615-002-200325184450'),
(0000000134, 615, 'A1 F4 78 D5', 'Asha Das', 900, '2020-03-27', '02:11:55', 'TB615-003-200327021155');

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
  `trx_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`sl`, `u_id`, `u_Name`, `Amount`, `trx_field`, `Date`, `Time`, `trx_id`) VALUES
(107, '3F AD 4D 29', 'Jahid Hasan Alvi', 500, 'Toll Booth 603', '2020-03-25', '18:42:44', 'TB603-001-200325184244'),
(108, 'B0 77 BB 25', 'Ekhtear Uddin Khan', 300, 'Toll Booth 615', '2020-03-25', '18:44:50', 'TB615-002-200325184450'),
(112, 'A1 F4 78 D5', 'Asha Das', 900, 'Toll Booth 615', '2020-03-27', '02:11:55', 'TB615-003-200327021155');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) NOT NULL,
  `Field` varchar(20) NOT NULL,
  `Thana` varchar(20) NOT NULL,
  `District` varchar(50) NOT NULL,
  `Division` varchar(50) NOT NULL,
  `username` int(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `Field`, `Thana`, `District`, `Division`, `username`, `password`) VALUES
(1, 'Toll Booth', 'Gendaria', 'Dhaka', 'Dhaka', 30111615, 'asdfg'),
(2, 'Parking Lot', 'Vatara', 'Dhaka', 'Dhaka', 30143205, 'qwert'),
(3, 'Filling Station', 'Mirpur Model', 'Dhaka', 'Dhaka', 30122404, 'zxcvb'),
(4, 'Recharge Center', 'Shyampur', 'Dhaka', 'Dhaka', 30136002, 'poiuy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_recharge`
--
ALTER TABLE `card_recharge`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `Name` (`sl`),
  ADD UNIQUE KEY `trx_id` (`trx_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD UNIQUE KEY `u_sl` (`u_sl`);
ALTER TABLE `customers` ADD FULLTEXT KEY `u_sl_2` (`u_sl`);

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
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card_recharge`
--
ALTER TABLE `card_recharge`
  MODIFY `sl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `sl` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `sl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

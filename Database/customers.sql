-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 11:58 PM
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
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `u_sl` varchar(10) NOT NULL,
  `u_id` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Balance` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `hNs_no` varchar(200) NOT NULL,
  `thana` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `zip_code` int(5) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`u_sl`, `u_id`, `name`, `Balance`, `username`, `password`, `contact_no`, `email`, `gender`, `hNs_no`, `thana`, `district`, `zip_code`, `country`) VALUES
('000', '000', 'admin', 0, 'admin', 'admin', '00000000000', 'null', '', 'null', 'null', 'null', 0, 'null'),
('001', '3F AD 4D 29', 'Jahid Hasan Alvi', 5500, 'alvi', 'abcd', '01822933773', 'jahidhasanalvi007@gmail.com', 'Male', '15/1 Faridabad Lane,  Besides Faridabad High School', 'Gendaria', 'Dhaka', 1204, 'Bangladesh'),
('002', 'B0 77 BB 25', 'Ekhtear Uddin Khan', 4700, 'ekhtear', 'efgh', '0', '', 'Male', '', '', '', 0, ''),
('003', 'A1 F4 78 D5', 'Asha Das', 4800, 'asha', 'ijkl', '0', '', 'Female', '', '', '', 0, ''),
('005', '71 F3 3D 08', 'Auni', 1700, 'auni', 'nta', '0', '', 'Female', '', '', '', 0, ''),
('006', '41 24 9D D5', 'PQR', 4300, '', '', '0', '', '', '', '', '', 0, ''),
('010', 'C1 7B E5 D5', 'Tanjila Farah', 5000, 'tnf', 'tnf', '0', '', 'Female', '', '', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD UNIQUE KEY `u_sl` (`u_sl`);
ALTER TABLE `customers` ADD FULLTEXT KEY `u_sl_2` (`u_sl`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 12, 2018 at 02:15 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vacationsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `employeeid` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `status` binary(1) NOT NULL,
  `emptype` varchar(45) NOT NULL,
  `personal` int(11) NOT NULL,
  `sick` int(11) NOT NULL,
  `vacation` int(11) NOT NULL,
  `startdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeid`, `name`, `lastname`, `status`, `emptype`, `personal`, `sick`, `vacation`, `startdate`) VALUES
(2, 'Berkay', 'Surmeli', 0x31, 'W-2', 3, 3, 15, '2014-10-24'),
(3, 'Andac', 'Erdem', 0x31, 'W-2', 3, 3, 15, '2011-10-24'),
(4, 'Erick', 'Hernandez', 0x31, 'W-2', 3, 3, 15, '2007-10-24'),
(5, 'Baris', 'Kavukcu', 0x31, 'W-2', 3, 3, 15, '2012-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `vacation`
--

DROP TABLE IF EXISTS `vacation`;
CREATE TABLE `vacation` (
  `vacationid` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `type` varchar(45) NOT NULL,
  `employee_employeeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vacation`
--

INSERT INTO `vacation` (`vacationid`, `startdate`, `enddate`, `type`, `employee_employeeid`) VALUES
(1, '2018-10-10', '2018-10-12', 'sick', 2),
(2, '2018-10-15', '2018-10-17', 'sick', 3),
(3, '2018-09-10', '2018-09-14', 'vacation', 3),
(4, '2018-07-09', '2018-10-09', 'personal', 4),
(5, '2018-06-11', '2018-06-15', 'vacation', 2),
(6, '2018-07-25', '2018-10-26', 'personal', 5),
(7, '2018-09-10', '2018-09-13', 'vacation', 2),
(8, '2018-09-07', '2018-09-12', 'vacation', 2),
(9, '2018-07-23', '2018-07-27', 'vacation', 3),
(10, '2018-09-24', '2018-09-30', 'vacation', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeid`),
  ADD UNIQUE KEY `employeeid_UNIQUE` (`employeeid`);

--
-- Indexes for table `vacation`
--
ALTER TABLE `vacation`
  ADD PRIMARY KEY (`vacationid`),
  ADD UNIQUE KEY `vacationid_UNIQUE` (`vacationid`),
  ADD KEY `fk_vacation_employee_idx` (`employee_employeeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vacation`
--
ALTER TABLE `vacation`
  MODIFY `vacationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vacation`
--
ALTER TABLE `vacation`
  ADD CONSTRAINT `fk_vacation_employee` FOREIGN KEY (`employee_employeeid`) REFERENCES `employee` (`employeeid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

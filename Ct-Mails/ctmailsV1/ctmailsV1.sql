-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2014 at 05:50 PM
-- Server version: 5.5.34-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ctmailsV1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Details`
--

CREATE TABLE IF NOT EXISTS `Details` (
  `Slot` text NOT NULL,
  `Code` varchar(10) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Prof` varchar(60) NOT NULL,
  `Credits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Details`
--

INSERT INTO `Details` (`Slot`, `Code`, `Subject`, `Prof`, `Credits`) VALUES
('A', 'MA211', 'SPECIAL FUNCTIONS AND STATISTICS', 'DR.R.RAVINDRAN', 3),
('B', 'EC217', 'APPLIED ELECTRONICS ENGINEERING', 'HOD', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

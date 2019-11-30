-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 06:20 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loanproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `qanda`
--

CREATE TABLE `qanda` (
  `Email` varchar(50) NOT NULL,
  `Question` text NOT NULL,
  `MessageID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qanda`
--

INSERT INTO `qanda` (`Email`, `Question`, `MessageID`) VALUES
('hoppas98@outlook.com', 'how could I create an account?', 2),
('Hoppas98@outlook.com ', 'Hi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Mobile_Phone` varchar(11) NOT NULL,
  `National_ID` varchar(14) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Job` varchar(50) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`FirstName`, `LastName`, `Email`, `Mobile_Phone`, `National_ID`, `Address`, `Job`, `User_ID`, `Password`, `Status`) VALUES
('Mohamed', 'Adel', 'hoppas98@outlook.com', '01004540095', '12345678912345', 'elshorouk', 'manager', 10, '123', 'Client'),
('nada', 'Hany', 'nada@gmail.com', '0123456789', '12345678912348', 'elshorouk', 'manager', 11, '123', 'Client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qanda`
--
ALTER TABLE `qanda`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qanda`
--
ALTER TABLE `qanda`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

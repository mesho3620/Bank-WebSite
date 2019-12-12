-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 10:25 PM
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
('hoppas98@outlook.com', '12wd', 3);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `User_ID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Mobile_Phone` varchar(11) NOT NULL,
  `National_ID` varchar(14) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Job` varchar(50) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`User_ID`, `FirstName`, `LastName`, `Email`, `Password`, `Mobile_Phone`, `National_ID`, `Address`, `Job`, `Status`) VALUES
(12, 'Mohamed', 'Hoppas', 'hoppas98@outlook.com', '123', '01004540095', '12345678912344', 'elshorouk', 'Manager', 'Client'),
(33, 'Mohamed', 'Adel', 'Mohamed@manager.com', '123', '01000000000', '00000000000000', 'Elshouk', 'Manager', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `request_loan`
--

CREATE TABLE `request_loan` (
  `FullName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile_Phone` varchar(11) NOT NULL,
  `National_ID` varchar(14) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Job` varchar(50) NOT NULL,
  `Loan_Status` varchar(50) NOT NULL,
  `Amount` varchar(6) NOT NULL,
  `Salary` varchar(7) NOT NULL,
  `HR_letter` text NOT NULL,
  `Request_Number` int(7) NOT NULL,
  `National_ID_Photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_loan`
--

INSERT INTO `request_loan` (`FullName`, `Email`, `Mobile_Phone`, `National_ID`, `Address`, `Job`, `Loan_Status`, `Amount`, `Salary`, `HR_letter`, `Request_Number`, `National_ID_Photo`) VALUES
('Mohamed Hoppas', 'hoppas98@outlook.com', '01004540095', '12345678912344', 'elshorouk', 'Manager', 'Accept', '500000', '200', 'df jnvn', 21, '1.jpg'),
('Mohamed Hoppas', 'hoppas98@outlook.com', '01004540095', '12345678912344', 'elshorouk', 'Manager', 'Waiting', '50000', '5000', 'klsvnes', 23, 'Screenshot (90).png');

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
-- Indexes for table `request_loan`
--
ALTER TABLE `request_loan`
  ADD PRIMARY KEY (`Request_Number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qanda`
--
ALTER TABLE `qanda`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `request_loan`
--
ALTER TABLE `request_loan`
  MODIFY `Request_Number` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

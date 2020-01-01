-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 05:03 PM
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
-- Table structure for table `messageclient`
--

CREATE TABLE `messageclient` (
  `UserID` int(11) NOT NULL,
  `MessageCl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messageclient`
--

INSERT INTO `messageclient` (`UserID`, `MessageCl`) VALUES
(12, 'hi'),
(12, 'hi'),
(12, 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `message_us`
--

CREATE TABLE `message_us` (
  `FullName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `MessageID` int(11) NOT NULL,
  `Message_Tx` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('hoppas98@outlook.com', '12wd', 3),
('hoppas98@outlook.com', 'ijrd9', 4);

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
('Omar Adel', 'omar@yahoo.com', '01009210095', '12345678912346', 'Elshoroul', 'TA', 'Accept', '50000', '5000', 'kfmsk', 26, 'Screenshot (110).png'),
('Mohamed Hoppas', 'hoppas98@outlook.com', '01004540095', '12345678912344', 'elshorouk', 'Manager', 'Waiting', '25000', '8000', 'nkjojlk', 27, 'Screenshot (110).png'),
('Mohamed Hoppas', 'hoppas98@outlook.com', '01004540095', '12345678912344', 'elshorouk', 'TA', 'Reject', '50000', '2000', 'nmgho', 28, 'Screenshot (110).png'),
('Mohamed Hoppas', 'hoppas98@outlook.com', '01004540095', '12345678912344', 'madinty', 'TA', 'Accept', '20000', '5000', 'jfjd', 29, '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `FirstName`, `LastName`, `Email`, `Password`, `Mobile_Phone`, `National_ID`, `Address`, `Job`, `Status`) VALUES
(12, 'Mohamed', 'Hoppas', 'hoppas98@outlook.com', '123', '01004540095', '12345678912344', 'madinty', 'TA', 'Client'),
(13, 'Mohamed', 'Adel', 'mohamed@manager.com', '123', '01004540092', '12345678987569', 'Elshorouk', 'Manager', 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message_us`
--
ALTER TABLE `message_us`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `qanda`
--
ALTER TABLE `qanda`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `request_loan`
--
ALTER TABLE `request_loan`
  ADD PRIMARY KEY (`Request_Number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message_us`
--
ALTER TABLE `message_us`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qanda`
--
ALTER TABLE `qanda`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request_loan`
--
ALTER TABLE `request_loan`
  MODIFY `Request_Number` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

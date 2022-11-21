-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 11:21 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handog2`
--

-- --------------------------------------------------------

--
-- Table structure for table `donationdrives`
--

CREATE TABLE `donationdrives` (
  `drive_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `donation_name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `completion_target` date NOT NULL,
  `date_opened` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount_needed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donationdrives`
--

INSERT INTO `donationdrives` (`drive_ID`, `user_ID`, `donation_name`, `description`, `completion_target`, `date_opened`, `amount_needed`) VALUES
(3, 6, 'drive1', 'this is a drive', '2022-11-30', '2022-11-21 03:47:05', 40),
(4, 6, 'drive 2', 'this is my drive 2', '2022-11-28', '2022-11-21 04:07:40', 5000),
(5, 7, 'drive ni renz', 'kay renz ra ni', '2023-02-28', '2022-11-21 04:08:25', 60),
(6, 8, 'WWE', 'wrestling ni sya', '2023-04-30', '2022-11-21 04:09:29', 60000),
(7, 9, 'cmsc127', 'need funds', '2023-01-18', '2022-11-21 04:10:16', 10000),
(8, 6, 'drive 3', 'test drive', '2022-11-30', '2022-11-21 05:49:16', 50);

-- --------------------------------------------------------

--
-- Table structure for table `donationtable`
--

CREATE TABLE `donationtable` (
  `donation_ID` int(11) NOT NULL,
  `donation_amount` int(11) NOT NULL,
  `donated_to` int(11) NOT NULL,
  `donated_by` int(11) NOT NULL,
  `message` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donationtable`
--

INSERT INTO `donationtable` (`donation_ID`, `donation_amount`, `donated_to`, `donated_by`, `message`) VALUES
(23, 500, 5, 6, 'god bless'),
(24, 500, 5, 6, 'kind words'),
(25, 500000, 6, 6, 'Kind words');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `user_ID` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `about_me` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`user_ID`, `first_name`, `last_name`, `user_email`, `user_pass`, `about_me`) VALUES
(6, 'francis', 'Celeste', 'francis14@gmail.com', 'franics', NULL),
(7, 'Renz', 'Catalan', 'renzgwapo@gmail.com', 'zner', NULL),
(8, 'John', 'Cena', 'JCena@gmail.com', 'youcantseeme', NULL),
(9, 'michael', 'William', 'MWilliam@yahoo.com', '27words', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donationdrives`
--
ALTER TABLE `donationdrives`
  ADD PRIMARY KEY (`drive_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `donationtable`
--
ALTER TABLE `donationtable`
  ADD PRIMARY KEY (`donation_ID`),
  ADD KEY `donated_to` (`donated_to`),
  ADD KEY `donated_by` (`donated_by`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donationdrives`
--
ALTER TABLE `donationdrives`
  MODIFY `drive_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donationtable`
--
ALTER TABLE `donationtable`
  MODIFY `donation_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donationdrives`
--
ALTER TABLE `donationdrives`
  ADD CONSTRAINT `donationdrives_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `usertable` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donationtable`
--
ALTER TABLE `donationtable`
  ADD CONSTRAINT `donationtable_ibfk_1` FOREIGN KEY (`donated_to`) REFERENCES `donationdrives` (`drive_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

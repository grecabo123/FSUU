-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 03:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fsuu`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `account_type_ID` int(11) NOT NULL,
  `account_type` char(255) DEFAULT NULL,
  `account_type_approver` char(255) DEFAULT NULL,
  `account_type_requester` char(255) DEFAULT NULL,
  `ProfileID_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`account_type_ID`, `account_type`, `account_type_approver`, `account_type_requester`, `ProfileID_fk`) VALUES
(1, 'Admin', NULL, NULL, 3),
(2, 'Admin', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressID` int(11) NOT NULL,
  `city` char(255) DEFAULT NULL,
  `ProfileID_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `attachmentsID` int(11) NOT NULL,
  `file_name` char(255) DEFAULT NULL,
  `file_link` char(255) DEFAULT NULL,
  `attachment_type` char(255) DEFAULT NULL,
  `file_directory` char(255) DEFAULT NULL,
  `ProfileID_fk` int(11) DEFAULT NULL,
  `ClearanceTermID__fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clearance_status`
--

CREATE TABLE `clearance_status` (
  `clearance_status_ID` int(11) NOT NULL,
  `status_type` char(45) DEFAULT NULL,
  `ProfileID_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clearance_year`
--

CREATE TABLE `clearance_year` (
  `ClearanceTermID` int(11) NOT NULL,
  `date_time` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `student_id` int(11) NOT NULL,
  `elementary_school_name` char(255) DEFAULT NULL,
  `elementary_year_graduated` char(255) DEFAULT NULL,
  `high_school_name` char(255) DEFAULT NULL,
  `high_school_graduate` char(255) DEFAULT NULL,
  `tertiary_school_name` char(255) DEFAULT NULL,
  `tertiary_school_graduate` char(255) DEFAULT NULL,
  `post_school_name` char(255) DEFAULT NULL,
  `post_school_graduate` char(255) DEFAULT NULL,
  `Profile_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` int(11) NOT NULL,
  `department` varchar(50) DEFAULT NULL,
  `person_position` varchar(45) DEFAULT NULL,
  `OfficeID_fk` int(11) DEFAULT NULL,
  `AddressID_fk` int(11) DEFAULT NULL,
  `ProfileID_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `officeID` int(11) NOT NULL,
  `office_name` varchar(255) DEFAULT NULL,
  `assigned` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `ProfileID` int(11) NOT NULL,
  `first_name` char(255) DEFAULT NULL,
  `middle_name` char(255) DEFAULT NULL,
  `last_name` char(255) DEFAULT NULL,
  `age` int(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `Birthdate` char(255) DEFAULT NULL,
  `Birthplace` char(255) DEFAULT NULL,
  `Email` char(255) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `password` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`ProfileID`, `first_name`, `middle_name`, `last_name`, `age`, `gender`, `Birthdate`, `Birthplace`, `Email`, `contact`, `password`) VALUES
(1, '', 'd', '', 23, 'dw', 'd', 'd', '', 2, ''),
(2, 'GEORGIE', 'dw', 'RECABO', 23, 'd', 'a', 'a', 'georgie.recabo@urios.edu.ph', 21, ''),
(3, 'Alyssa', 'Pancipanci', 'Ave', 21, 'Female', 'April 17 2000', 'Manggagoy', 'alyssaave17@gmail.com', 123, '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `course` char(255) DEFAULT NULL,
  `Year` int(20) DEFAULT NULL,
  `father_name` char(255) DEFAULT NULL,
  `mother_name` char(255) DEFAULT NULL,
  `parent_address` char(50) NOT NULL,
  `ProfileID_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`account_type_ID`),
  ADD KEY `account_type_ibfk_1` (`ProfileID_fk`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`),
  ADD KEY `ProfileID_fk` (`ProfileID_fk`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`attachmentsID`),
  ADD KEY `ProfileID_fk` (`ProfileID_fk`),
  ADD KEY `ClearanceTermID__fk` (`ClearanceTermID__fk`);

--
-- Indexes for table `clearance_status`
--
ALTER TABLE `clearance_status`
  ADD PRIMARY KEY (`clearance_status_ID`),
  ADD KEY `ProfileID_fk` (`ProfileID_fk`);

--
-- Indexes for table `clearance_year`
--
ALTER TABLE `clearance_year`
  ADD PRIMARY KEY (`ClearanceTermID`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `Profile_fk` (`Profile_fk`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`),
  ADD KEY `OfficeID_fk` (`OfficeID_fk`),
  ADD KEY `AddressID_fk` (`AddressID_fk`),
  ADD KEY `ProfileID_fk` (`ProfileID_fk`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`officeID`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`ProfileID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `ProfileID_fk` (`ProfileID_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `account_type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `attachmentsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clearance_status`
--
ALTER TABLE `clearance_status`
  MODIFY `clearance_status_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clearance_year`
--
ALTER TABLE `clearance_year`
  MODIFY `ClearanceTermID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `officeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `ProfileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_type`
--
ALTER TABLE `account_type`
  ADD CONSTRAINT `account_type_ibfk_1` FOREIGN KEY (`ProfileID_fk`) REFERENCES `profile` (`ProfileID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`ProfileID_fk`) REFERENCES `profile` (`ProfileID`);

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_ibfk_1` FOREIGN KEY (`ProfileID_fk`) REFERENCES `profile` (`ProfileID`),
  ADD CONSTRAINT `attachments_ibfk_2` FOREIGN KEY (`ClearanceTermID__fk`) REFERENCES `clearance_year` (`ClearanceTermID`);

--
-- Constraints for table `clearance_status`
--
ALTER TABLE `clearance_status`
  ADD CONSTRAINT `clearance_status_ibfk_1` FOREIGN KEY (`ProfileID_fk`) REFERENCES `profile` (`ProfileID`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`Profile_fk`) REFERENCES `profile` (`ProfileID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`OfficeID_fk`) REFERENCES `office` (`officeID`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`AddressID_fk`) REFERENCES `address` (`addressID`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`ProfileID_fk`) REFERENCES `profile` (`ProfileID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`ProfileID_fk`) REFERENCES `profile` (`ProfileID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

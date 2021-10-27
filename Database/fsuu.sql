-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 07:22 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

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
(2, 'Admin', NULL, NULL, 2),
(3, 'admin', NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressID` int(11) NOT NULL,
  `city` char(255) DEFAULT NULL,
  `ProfileID_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressID`, `city`, `ProfileID_fk`) VALUES
(1, 'awd', 4);

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
-- Table structure for table `collegiate`
--

CREATE TABLE `collegiate` (
  `ID` int(11) NOT NULL,
  `student_id` int(30) NOT NULL,
  `Course` char(50) DEFAULT NULL,
  `first_name` char(50) DEFAULT NULL,
  `middle_name` char(50) DEFAULT NULL,
  `last_name` char(50) DEFAULT NULL,
  `date_of_birth` char(255) DEFAULT NULL,
  `place_of_birth` char(50) DEFAULT NULL,
  `citizenship` char(50) DEFAULT NULL,
  `gender` char(20) DEFAULT NULL,
  `civil_status` char(50) DEFAULT NULL,
  `Spouse` char(50) DEFAULT NULL,
  `home_address` char(20) DEFAULT NULL,
  `father_name` char(50) DEFAULT NULL,
  `mother_name` char(50) DEFAULT NULL,
  `parent_address` char(50) DEFAULT NULL,
  `elementary_grad` char(100) DEFAULT NULL,
  `elementary_year` int(10) DEFAULT NULL,
  `high_school_grad` char(50) DEFAULT NULL,
  `high_school_year` int(10) DEFAULT NULL,
  `Profile_fk` int(11) DEFAULT NULL,
  `email` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collegiate`
--

INSERT INTO `collegiate` (`ID`, `student_id`, `Course`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `place_of_birth`, `citizenship`, `gender`, `civil_status`, `Spouse`, `home_address`, `father_name`, `mother_name`, `parent_address`, `elementary_grad`, `elementary_year`, `high_school_grad`, `high_school_year`, `Profile_fk`, `email`) VALUES
(12, 1515, 'awjd', 'waod', 'awod', 'awopd', 'kawod', 'oawd', 'pawd', 'awid', 'aopwd', 'aopdw', 'awdop', 'awd', 'awod', 'awod', 'ad', 23, 'awd', 23, 4, 'artamay1@gmail.com');

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

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`student_id`, `elementary_school_name`, `elementary_year_graduated`, `high_school_name`, `high_school_graduate`, `tertiary_school_name`, `tertiary_school_graduate`, `post_school_name`, `post_school_graduate`, `Profile_fk`) VALUES
(1, 'awd', '231', 'awd', '23', 'awdawd', '12', 'awd', '32', 4);

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
(3, 'Alyssa', 'Pancipanci', 'Ave', 21, 'Female', 'April 17 2000', 'Manggagoy', 'alyssaave17@gmail.com', 123, ''),
(4, 'Georgie', 'dawd', 'Recabo', 21, 'Male', 'awd', 'awd', 'artamay1@gmail.com', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_form`
--

CREATE TABLE `status_form` (
  `id` int(11) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `Profile_fk` int(11) DEFAULT NULL,
  `email` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_form`
--

INSERT INTO `status_form` (`id`, `status`, `Profile_fk`, `email`) VALUES
(6, 4, 4, 'artamay1@gmail.com'),
(7, 4, 4, 'artamay1@gmail.com');

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
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `course`, `Year`, `father_name`, `mother_name`, `parent_address`, `ProfileID_fk`) VALUES
(1, 'BSIT', 2013, 'awd', 'awd', 'awd', 4);

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
-- Indexes for table `collegiate`
--
ALTER TABLE `collegiate`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Profile_fk` (`Profile_fk`);

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
-- Indexes for table `status_form`
--
ALTER TABLE `status_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Profile_fk` (`Profile_fk`);

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
  MODIFY `account_type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `collegiate`
--
ALTER TABLE `collegiate`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `ProfileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_form`
--
ALTER TABLE `status_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `collegiate`
--
ALTER TABLE `collegiate`
  ADD CONSTRAINT `collegiate_ibfk_1` FOREIGN KEY (`Profile_fk`) REFERENCES `profile` (`ProfileID`);

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
-- Constraints for table `status_form`
--
ALTER TABLE `status_form`
  ADD CONSTRAINT `status_form_ibfk_1` FOREIGN KEY (`Profile_fk`) REFERENCES `profile` (`ProfileID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`ProfileID_fk`) REFERENCES `profile` (`ProfileID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

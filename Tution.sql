-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 23, 2020 at 07:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Tution`
--

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE `Courses` (
  `CourseId` int(20) NOT NULL,
  `CourseName` varchar(30) NOT NULL,
  `CourseDescribtion` varchar(200) NOT NULL,
  `Durarion` int(11) NOT NULL,
  `imageName` varchar(100) NOT NULL,
  `UserName` varchar(20) CHARACTER SET ascii NOT NULL,
  `category` varchar(30) NOT NULL,
  `fees` int(11) NOT NULL,
  `fullCourseDescribtion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Enrollment`
--

CREATE TABLE `Enrollment` (
  `EntrollmentId` int(11) NOT NULL,
  `PaymentId` int(11) NOT NULL,
  `UserName` varchar(20) CHARACTER SET ascii NOT NULL,
  `CourseId` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Lecturer`
--

CREATE TABLE `Lecturer` (
  `LecturerId` int(20) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `PhoneNumber` int(20) DEFAULT NULL,
  `UserName` varchar(20) CHARACTER SET ascii NOT NULL,
  `AboutMe` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `PaymentId` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Date` date NOT NULL,
  `UserName` varchar(20) CHARACTER SET ascii NOT NULL,
  `Paid` int(1) NOT NULL DEFAULT 0,
  `CourseId` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `StudentId` int(20) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `PhoneNumber` int(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `AboutMe` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COMMENT='student details table';

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserName` varchar(20) CHARACTER SET ascii NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Courses`
--
ALTER TABLE `Courses`
  ADD PRIMARY KEY (`CourseId`),
  ADD KEY `UserName` (`UserName`);

--
-- Indexes for table `Enrollment`
--
ALTER TABLE `Enrollment`
  ADD PRIMARY KEY (`EntrollmentId`),
  ADD KEY `UserName` (`UserName`),
  ADD KEY `PaymentId` (`PaymentId`),
  ADD KEY `CourseId` (`CourseId`);

--
-- Indexes for table `Lecturer`
--
ALTER TABLE `Lecturer`
  ADD PRIMARY KEY (`LecturerId`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`PaymentId`) USING HASH,
  ADD KEY `UserName` (`UserName`),
  ADD KEY `CourseId` (`CourseId`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`StudentId`) USING HASH,
  ADD UNIQUE KEY `USERNAME` (`UserName`) USING BTREE;

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Courses`
--
ALTER TABLE `Courses`
  MODIFY `CourseId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `Enrollment`
--
ALTER TABLE `Enrollment`
  MODIFY `EntrollmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `Lecturer`
--
ALTER TABLE `Lecturer`
  MODIFY `LecturerId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `PaymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `StudentId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Courses`
--
ALTER TABLE `Courses`
  ADD CONSTRAINT `Courses_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `User` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Enrollment`
--
ALTER TABLE `Enrollment`
  ADD CONSTRAINT `Enrollment_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `User` (`UserName`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Enrollment_ibfk_2` FOREIGN KEY (`PaymentId`) REFERENCES `Payment` (`PaymentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Lecturer`
--
ALTER TABLE `Lecturer`
  ADD CONSTRAINT `Lecturer_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `User` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `Payment_ibfk_2` FOREIGN KEY (`UserName`) REFERENCES `User` (`UserName`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Payment_ibfk_3` FOREIGN KEY (`CourseId`) REFERENCES `Courses` (`CourseId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `User` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

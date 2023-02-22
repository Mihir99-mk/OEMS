-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2022 at 01:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oems`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `bid` int(11) NOT NULL,
  `facId` int(11) NOT NULL,
  `className` varchar(25) NOT NULL,
  `years` year(4) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`bid`, `facId`, `className`, `years`, `timestamp`) VALUES
(72, 150, 'BCA2021', 2021, '2022-10-19 19:02:12'),
(74, 150, 'BCA2022', 2022, '2022-10-19 19:02:12'),
(75, 150, 'BCOM2022', 2022, '2022-10-19 19:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `facultyuser`
--

CREATE TABLE `facultyuser` (
  `FacId` int(11) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `EmailId` varchar(32) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `createdDate` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facultyuser`
--

INSERT INTO `facultyuser` (`FacId`, `FirstName`, `LastName`, `EmailId`, `Password`, `createdDate`) VALUES
(148, 'sanket', 'khode', 'sanket@gmail.com', '81c6fa745434534c4a96', '2022-08-17 14:47:34.130853'),
(149, 'cddc', 'ccvx', 'cmc@gmail.com', 'c3d6ebaec84ae7a23309', '2022-08-21 14:09:27.583746'),
(150, 'mihir', 'khode', 'mihir@gmail.com', '25603f465e5f1bb27633', '2022-10-04 15:45:24.196868');

-- --------------------------------------------------------

--
-- Table structure for table `queanswer`
--

CREATE TABLE `queanswer` (
  `qaId` int(11) NOT NULL,
  `queId` int(11) NOT NULL,
  `answer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queanswer`
--

INSERT INTO `queanswer` (`qaId`, `queId`, `answer`) VALUES
(55, 117, '8'),
(57, 119, 'dm'),
(59, 121, 'mm'),
(60, 122, 'dk');

-- --------------------------------------------------------

--
-- Table structure for table `quesmarks`
--

CREATE TABLE `quesmarks` (
  `qmId` int(11) NOT NULL,
  `queId` int(11) NOT NULL,
  `marks` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quesmarks`
--

INSERT INTO `quesmarks` (`qmId`, `queId`, `marks`) VALUES
(53, 117, 1),
(55, 119, 1),
(57, 121, 1),
(58, 122, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quesoptions`
--

CREATE TABLE `quesoptions` (
  `OId` int(11) NOT NULL,
  `queId` int(11) NOT NULL,
  `option1` varchar(60) DEFAULT NULL,
  `option2` varchar(60) DEFAULT NULL,
  `option3` varchar(60) DEFAULT NULL,
  `option4` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quesoptions`
--

INSERT INTO `quesoptions` (`OId`, `queId`, `option1`, `option2`, `option3`, `option4`) VALUES
(65, 117, '4', 'mm', '20', '8'),
(67, 119, 'dmcm', 'dm', 'mdm', 'dm'),
(69, 121, 'xmm', 'mm', 'm', 'mll'),
(70, 122, 'mdm', 'kd,', 'mdm', 'dk');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `queId` int(11) NOT NULL,
  `QId` int(11) NOT NULL,
  `questions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`queId`, `QId`, `questions`) VALUES
(117, 57, 'what is 4*2 ?'),
(119, 57, 'dcmcxm'),
(121, 60, 'c,'),
(122, 60, 'cjdm');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `QId` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `quizTitle` varchar(186) NOT NULL,
  `qdescription` varchar(255) NOT NULL,
  `QizDate` date NOT NULL,
  `QizStatTime` time(6) NOT NULL,
  `QizEndTime` time(6) NOT NULL,
  `duration` int(11) NOT NULL,
  `QizCreated` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `TotalMark` int(3) NOT NULL,
  `active` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`QId`, `bid`, `quizTitle`, `qdescription`, `QizDate`, `QizStatTime`, `QizEndTime`, `duration`, `QizCreated`, `TotalMark`, `active`) VALUES
(57, 72, 'vf', 'dfg', '2022-10-22', '20:40:00.000000', '22:40:00.000000', 120, '2022-10-19 12:26:13.100591', 20, 'yes'),
(59, 72, 'cmm', 'MCM', '2022-10-22', '16:51:00.000000', '17:51:00.000000', 60, '2022-10-20 07:22:02.105283', 20, 'yes'),
(60, 74, 'cmMDM', 'dm', '2022-10-21', '16:48:00.000000', '17:48:00.000000', 60, '2022-10-20 08:18:36.056752', 20, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `quizmarks`
--

CREATE TABLE `quizmarks` (
  `qmid` int(11) NOT NULL,
  `QId` int(11) NOT NULL,
  `studId` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `conduct` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizmarks`
--

INSERT INTO `quizmarks` (`qmid`, `QId`, `studId`, `marks`, `conduct`) VALUES
(33, 60, 1765, 2, 'true'),
(34, 60, 1766, 1, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudId` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `StudFirstName` varchar(55) DEFAULT NULL,
  `StudLastName` varchar(55) DEFAULT NULL,
  `StudEmail` varchar(200) DEFAULT NULL,
  `StudPassword` varchar(20) DEFAULT NULL,
  `Gender` enum('male','female','other') NOT NULL,
  `active` enum('Yes','No') NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudId`, `bid`, `StudFirstName`, `StudLastName`, `StudEmail`, `StudPassword`, `Gender`, `active`, `createdDate`) VALUES
(1765, 74, 'jeni', 'patel', 'jenipatel@gmail.com', 'jeni123', 'female', 'Yes', '2022-10-19 18:46:31'),
(1766, 74, 'sanket', 'khode', 'sanket@gmail.com', 'Sanket123', 'male', 'Yes', '2022-10-24 12:52:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `facId` (`facId`);

--
-- Indexes for table `facultyuser`
--
ALTER TABLE `facultyuser`
  ADD PRIMARY KEY (`FacId`);

--
-- Indexes for table `queanswer`
--
ALTER TABLE `queanswer`
  ADD PRIMARY KEY (`qaId`),
  ADD UNIQUE KEY `queId` (`queId`);

--
-- Indexes for table `quesmarks`
--
ALTER TABLE `quesmarks`
  ADD PRIMARY KEY (`qmId`),
  ADD UNIQUE KEY `queId` (`queId`);

--
-- Indexes for table `quesoptions`
--
ALTER TABLE `quesoptions`
  ADD PRIMARY KEY (`OId`),
  ADD KEY `queId` (`queId`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`queId`),
  ADD KEY `QId` (`QId`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`QId`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `quizmarks`
--
ALTER TABLE `quizmarks`
  ADD PRIMARY KEY (`qmid`),
  ADD KEY `QId` (`QId`),
  ADD KEY `studId` (`studId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudId`),
  ADD KEY `bid` (`bid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `facultyuser`
--
ALTER TABLE `facultyuser`
  MODIFY `FacId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `queanswer`
--
ALTER TABLE `queanswer`
  MODIFY `qaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `quesmarks`
--
ALTER TABLE `quesmarks`
  MODIFY `qmId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `quesoptions`
--
ALTER TABLE `quesoptions`
  MODIFY `OId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `queId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `QId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `quizmarks`
--
ALTER TABLE `quizmarks`
  MODIFY `qmid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1767;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`facId`) REFERENCES `facultyuser` (`FacId`) ON DELETE CASCADE;

--
-- Constraints for table `queanswer`
--
ALTER TABLE `queanswer`
  ADD CONSTRAINT `queanswer_ibfk_1` FOREIGN KEY (`queId`) REFERENCES `question` (`queId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quesmarks`
--
ALTER TABLE `quesmarks`
  ADD CONSTRAINT `quesmarks_ibfk_1` FOREIGN KEY (`queId`) REFERENCES `question` (`queId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quesoptions`
--
ALTER TABLE `quesoptions`
  ADD CONSTRAINT `quesoptions_ibfk_1` FOREIGN KEY (`queId`) REFERENCES `question` (`queId`) ON DELETE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`QId`) REFERENCES `quiz` (`QId`) ON DELETE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `batch` (`bid`) ON DELETE CASCADE;

--
-- Constraints for table `quizmarks`
--
ALTER TABLE `quizmarks`
  ADD CONSTRAINT `quizmarks_ibfk_1` FOREIGN KEY (`QId`) REFERENCES `quiz` (`QId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quizmarks_ibfk_2` FOREIGN KEY (`studId`) REFERENCES `student` (`StudId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `bid` FOREIGN KEY (`bid`) REFERENCES `batch` (`bid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

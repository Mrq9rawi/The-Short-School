/* Name: Christian Shingiro Student No.: 7537202 */
/* Name: Mohammad Abdullah Student No.: 8773900*/
/* Name: Alexander Mykitschak Student No.: 6245344 */
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 04:49 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mykitschakshingiroabdullah_teamshort`
--
CREATE DATABASE IF NOT EXISTS `mykitschakshingiroabdullah_teamshort` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mykitschakshingiroabdullah_teamshort`;

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `campus_id` int(3) NOT NULL,
  `campus_name` varchar(50) NOT NULL,
  `address` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`campus_id`, `campus_name`, `address`) VALUES
(0, 'Online', NULL),
(100, 'Kitchener', '123 Fake St'),
(120, 'Guelph', '234 Albert St'),
(130, 'Waterloo', '765 Gerald Ave'),
(140, 'Barrie', '523 Gelman St'),
(150, 'Paris', '634 Home St');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` varchar(8) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `campus_id` int(3) NOT NULL,
  `program_id` varchar(8) NOT NULL,
  `faculty_id` int(7) NOT NULL,
  `session_time` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `campus_id`, `program_id`, `faculty_id`, `session_time`) VALUES
('FTNS4000', 'Fitness (Important)', 150, 'PROG5100', 1724930, 'Friday, 11:00'),
('GRPH1500', 'Web Graphic Design', 130, 'PROG5100', 1548954, 'Wednesday, 8:00'),
('MGMT6000', 'Project Management', 0, 'PROG5000', 1923850, 'Monday, 7:00'),
('PROG1000', 'HTML', 120, 'PROG5000', 1748302, 'Tuesday, 7:00'),
('PROG1100', 'CSS', 120, 'PROG5000', 1724930, 'Wednesday, 7:00'),
('PROG1200', 'Web Design', 120, 'PROG5000', 1784395, 'Thursday, 7:00'),
('PROG2000', 'PHP', 100, 'PROG5100', 1432654, 'Monday, 8:00'),
('PROG2100', 'Database Design ', 150, 'PROG5100', 1854729, 'Tuesday, 8:00'),
('PROG3000', 'RUBY', 0, 'PROG5100', 1724930, 'Thursday, 12:00'),
('PROG9000', 'Capstone Project - Front End', 0, 'PROG5000', 1654927, 'Friday, 7:00');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(7) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `first_name`, `last_name`) VALUES
(1345876, 'Terry', 'Robbins'),
(1432654, 'Jerry', 'Jackson'),
(1438257, 'Jonathan', 'Professorson'),
(1548954, 'Tony', 'Soprano'),
(1654927, 'Walter', 'White'),
(1724930, 'Doug', 'Bowser'),
(1748302, 'Chad', 'Warden'),
(1784395, 'Cloud', 'Strife'),
(1854729, 'Jillian', 'Anderson'),
(1923850, 'Robert', 'Knight');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_ID` varchar(8) NOT NULL,
  `program_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_ID`, `program_name`) VALUES
('DSGN5000', 'Web Design'),
('HIST6000', 'World History'),
('MUSC7000', 'Music Performance'),
('PROG5000', 'Front-End Programming'),
('PROG5100', 'Back-End Programming');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(7) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `program_id` varchar(8) NOT NULL,
  `gpa` decimal(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `program_id`, `gpa`) VALUES
(6154287, 'Vince', 'McMahon', 'PROG5100', '1.4'),
(6154872, 'Alejandro', 'Myki', 'PROG5000', '3.0'),
(6187549, 'Randy', 'Savage', 'PROG5000', '3.2'),
(6198754, 'John', 'Cena', 'PROG5100', '4.0'),
(6349838, 'Alexi', 'Laiho', 'PROG5000', '2.0'),
(6489781, 'Hulk', 'Hogan', 'PROG5000', '1.0'),
(6521478, 'Alex', 'Alexsson', 'PROG5000', '3.3'),
(6874512, 'Steve', 'Austin', 'PROG5100', '2.3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`campus_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `courses_ibfk_1` (`program_id`),
  ADD KEY `courses_ibfk_3` (`campus_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `students_ibfk_1` (`program_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_ID`),
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`),
  ADD CONSTRAINT `courses_ibfk_3` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`campus_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

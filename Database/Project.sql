-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 02:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biw2019/2020_sec5`
--

-- --------------------------------------------------------

--
-- Table structure for table `courseinfo`
--

CREATE TABLE `courseinfo` (
  `id` int(11) NOT NULL,
  `Course_ID` varchar(8) NOT NULL,
  `Course_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseinfo`
--

INSERT INTO `courseinfo` (`id`, `Course_ID`, `Course_Name`) VALUES
(7, '', ''),
(2, 'BIW20310', 'Web Designing'),
(3, 'BIW23011', 'Java Programming'),
(5, 'BIW32102', 'Network And Security');

-- --------------------------------------------------------

--
-- Table structure for table `databaseuser`
--

CREATE TABLE `databaseuser` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `userid` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `databaseuser`
--

INSERT INTO `databaseuser` (`id`, `username`, `password`, `status`, `userid`) VALUES
(1, 'admin', '12345', 'admin', ''),
(2, 'AI180038', '12345678', 'student', 'AI180038'),
(3, 'hazalila', '123456789', 'lecturer', 'LI480039'),
(4, 'sapari', '123456789a', 'lecturer', 'LI500213'),
(5, 'AI180037', 'qwerty', 'student', 'AI180037');

-- --------------------------------------------------------

--
-- Table structure for table `lecturerinfo`
--

CREATE TABLE `lecturerinfo` (
  `id` int(11) NOT NULL,
  `Lect_ID` varchar(8) NOT NULL,
  `Lect_Name` varchar(50) NOT NULL,
  `Lect_Email` varchar(50) NOT NULL,
  `Lect_Phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturerinfo`
--

INSERT INTO `lecturerinfo` (`id`, `Lect_ID`, `Lect_Name`, `Lect_Email`, `Lect_Phone`) VALUES
(1, 'LI470035', 'Luqman Najat Al-Akbar bin Qayyum', 'najathensem@gmail.com', '067991745'),
(4, 'LI480039', 'Nur Hazalila binti Sapawi', 'hazalilacool@gmail.com', '067574434'),
(5, 'LI500213', 'Ahmad Mansor Sapari bin Haji Kakap', 'mistersapari@gmail.com', '067749321'),
(3, 'LI550067', 'Nur Nurul binti Nara', 'nurululz@gmail.com', '067543445'),
(8, 'LI550078', 'Ahmad Hambali bin Ali', 'humble-li@gmail.com', '067856666');

-- --------------------------------------------------------

--
-- Table structure for table `quizmultiplechoice`
--

CREATE TABLE `quizmultiplechoice` (
  `id` int(11) NOT NULL,
  `lect_name` varchar(150) NOT NULL,
  `course_name` varchar(150) NOT NULL,
  `question` varchar(500) NOT NULL,
  `realanswer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizmultiplechoice`
--

INSERT INTO `quizmultiplechoice` (`id`, `lect_name`, `course_name`, `question`, `realanswer`) VALUES
(1, 'Nur Hazalila binti Sapawi', 'Network And Security', 'Which cable carries light?A)Coaxial CableB)Twisted Pair CableC)USB CableD)Fibre Optic Cable', 'D'),
(2, 'Nur Hazalila binti Sapawi', 'Network And Security', 'How many router required to connect 3 PC? A) 1 B) 2 C) 3 D) 4', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `quiztruefalse`
--

CREATE TABLE `quiztruefalse` (
  `id` int(11) NOT NULL,
  `lect_name` varchar(150) NOT NULL,
  `Course_Name` varchar(50) NOT NULL,
  `question` varchar(500) NOT NULL,
  `realanswer` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiztruefalse`
--

INSERT INTO `quiztruefalse` (`id`, `lect_name`, `Course_Name`, `question`, `realanswer`) VALUES
(1, 'Nur Hazalila binti Sapawi', 'Network and Security', 'Wifi with 802.11g has the speed of light.', 'false'),
(2, 'Nur Hazalila binti Sapawi', 'Network And Security', 'Fibre-optic cable carrys light', 'true'),
(9, 'Nur Hazalila binti Sapawi', 'Java Programming', 'int is a float data types', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `registercourse`
--

CREATE TABLE `registercourse` (
  `id` int(11) NOT NULL,
  `student_ID` varchar(150) NOT NULL,
  `course_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registercourse`
--

INSERT INTO `registercourse` (`id`, `student_ID`, `course_name`) VALUES
(7, 'AI180038', 'Java Programming'),
(8, 'AI180038', 'Network And Security'),
(12, 'AI180038', 'Web Designing');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `id` int(11) NOT NULL,
  `Student_ID` varchar(8) NOT NULL,
  `Student_Name` varchar(50) NOT NULL,
  `Student_Email` varchar(50) NOT NULL,
  `Student_Phone` varchar(10) NOT NULL,
  `Student_GPA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `Student_ID`, `Student_Name`, `Student_Email`, `Student_Phone`, `Student_GPA`) VALUES
(1, 'AI180037', 'ROSNAH MAD ARIS BINTI ARIWATAN', 'rosnahbawang@gmail.com', '0176545543', 3.5),
(3, 'AI180038', 'Fikri Arif bin Azman', 'fikria322@gmail.com', '0196776223', 3.6);

-- --------------------------------------------------------

--
-- Table structure for table `studentscore`
--

CREATE TABLE `studentscore` (
  `id` int(100) NOT NULL,
  `Student_ID` varchar(8) NOT NULL,
  `course_name` varchar(150) NOT NULL,
  `Lab_Score` float NOT NULL,
  `Quiz1_Score` float NOT NULL,
  `Quiz2_Score` float NOT NULL,
  `Test1_Score` float NOT NULL,
  `Test2_Score` float NOT NULL,
  `Project_Score` float NOT NULL,
  `Final_Score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_multiplechoice_marks`
--

CREATE TABLE `student_multiplechoice_marks` (
  `id` int(11) NOT NULL,
  `student_ID` varchar(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `course_name` varchar(150) NOT NULL,
  `marks` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_multiplechoice_marks`
--

INSERT INTO `student_multiplechoice_marks` (`id`, `student_ID`, `student_name`, `course_name`, `marks`) VALUES
(1, 'AI180038', 'Fikri Arif bin Azman', 'Network And Security', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_quiztruefalse`
--

CREATE TABLE `student_quiztruefalse` (
  `id` int(11) NOT NULL,
  `student_ID` varchar(8) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `answer` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_quiztruefalse_marks`
--

CREATE TABLE `student_quiztruefalse_marks` (
  `id` int(11) NOT NULL,
  `student_ID` varchar(8) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_quiztruefalse_marks`
--

INSERT INTO `student_quiztruefalse_marks` (`id`, `student_ID`, `student_name`, `course_name`, `marks`) VALUES
(311, 'AI180038', 'Fikri Arif bin Azman', 'Java Programming', 1),
(312, 'AI180038', 'Fikri Arif bin Azman', 'Network And Security', 2);

-- --------------------------------------------------------

--
-- Table structure for table `workload`
--

CREATE TABLE `workload` (
  `id` int(11) NOT NULL,
  `lect_name` varchar(100) NOT NULL,
  `course_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workload`
--

INSERT INTO `workload` (`id`, `lect_name`, `course_name`) VALUES
(9, 'Luqman Najat Al-Akbar bin Qayyum', 'Web Designing'),
(10, 'Nur Nurul binti Nara', 'Network And Security'),
(12, 'Nur Hazalila binti Sapawi', 'Network And Security'),
(13, 'Nur Hazalila binti Sapawi', 'Java Programming'),
(14, 'Luqman Najat Al-Akbar bin Qayyum', 'Web Designing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courseinfo`
--
ALTER TABLE `courseinfo`
  ADD PRIMARY KEY (`Course_ID`),
  ADD UNIQUE KEY `Course_Name` (`Course_Name`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `databaseuser`
--
ALTER TABLE `databaseuser`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `lecturerinfo`
--
ALTER TABLE `lecturerinfo`
  ADD PRIMARY KEY (`Lect_ID`),
  ADD UNIQUE KEY `Lect_Name` (`Lect_Name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `quizmultiplechoice`
--
ALTER TABLE `quizmultiplechoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `quiztruefalse`
--
ALTER TABLE `quiztruefalse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `registercourse`
--
ALTER TABLE `registercourse`
  ADD PRIMARY KEY (`course_name`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`Student_ID`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `studentscore`
--
ALTER TABLE `studentscore`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_CourseID` (`course_name`),
  ADD KEY `Fk_StudentID` (`Student_ID`);

--
-- Indexes for table `student_multiplechoice_marks`
--
ALTER TABLE `student_multiplechoice_marks`
  ADD PRIMARY KEY (`course_name`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `student_quiztruefalse`
--
ALTER TABLE `student_quiztruefalse`
  ADD KEY `id` (`id`);

--
-- Indexes for table `student_quiztruefalse_marks`
--
ALTER TABLE `student_quiztruefalse_marks`
  ADD PRIMARY KEY (`course_name`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `workload`
--
ALTER TABLE `workload`
  ADD KEY `id` (`id`),
  ADD KEY `Fk_CourseName` (`course_name`),
  ADD KEY `Fk_LectName` (`lect_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courseinfo`
--
ALTER TABLE `courseinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `databaseuser`
--
ALTER TABLE `databaseuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lecturerinfo`
--
ALTER TABLE `lecturerinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quizmultiplechoice`
--
ALTER TABLE `quizmultiplechoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiztruefalse`
--
ALTER TABLE `quiztruefalse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `registercourse`
--
ALTER TABLE `registercourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `studentscore`
--
ALTER TABLE `studentscore`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_multiplechoice_marks`
--
ALTER TABLE `student_multiplechoice_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_quiztruefalse`
--
ALTER TABLE `student_quiztruefalse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_quiztruefalse_marks`
--
ALTER TABLE `student_quiztruefalse_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT for table `workload`
--
ALTER TABLE `workload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentscore`
--
ALTER TABLE `studentscore`
  ADD CONSTRAINT `Fk_StudentID` FOREIGN KEY (`Student_ID`) REFERENCES `studentinfo` (`Student_ID`) ON DELETE CASCADE;

--
-- Constraints for table `workload`
--
ALTER TABLE `workload`
  ADD CONSTRAINT `Fk_CourseName` FOREIGN KEY (`course_name`) REFERENCES `courseinfo` (`Course_Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_LectName` FOREIGN KEY (`lect_name`) REFERENCES `lecturerinfo` (`Lect_Name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

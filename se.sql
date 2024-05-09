-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 01:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `UserID`) VALUES
(10, 19),
(11, 20),
(12, 33);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `AssignmentID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Max_Score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `CertificateID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `Submit_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` int(11) NOT NULL,
  `CourseName` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `InstructorID` int(11) NOT NULL,
  `Start_Date` datetime NOT NULL,
  `End_Date` datetime NOT NULL,
  `Image` varchar(500) NOT NULL,
  `AdminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseName`, `Description`, `InstructorID`, `Start_Date`, `End_Date`, `Image`, `AdminID`) VALUES
(48, 'physics', 'i love Physics', 8, '2024-05-28 00:00:00', '2024-05-30 00:00:00', './images/12-16-14physics_icon.jpg', 12),
(49, 'math', 'i love MATH', 7, '2024-05-07 00:00:00', '2024-06-19 00:00:00', './images/12-21-34mathj.jpg', 12),
(50, 'computer network', 'i love Computer network', 9, '2024-05-15 00:00:00', '2024-05-30 00:00:00', './images/12-36-32network.jpg', 12),
(51, 'statistics', 'i love statistics', 1, '2024-05-20 00:00:00', '2024-05-29 00:00:00', './images/12-45-27stat.jpg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `EnrollmentID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_questions`
--

CREATE TABLE `evaluation_questions` (
  `EvalQID` int(11) NOT NULL,
  `Content` text NOT NULL,
  `AdminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_member`
--

CREATE TABLE `faculty_member` (
  `FacultyID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `AdminID` int(11) NOT NULL,
  `Department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_member`
--

INSERT INTO `faculty_member` (`FacultyID`, `UserID`, `AdminID`, `Department`) VALUES
(1, 21, 11, 'CS'),
(5, 31, 11, 'IT'),
(6, 32, 11, 'AI'),
(7, 34, 12, 'CS'),
(8, 37, 12, 'IT'),
(9, 38, 12, 'AI');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `InstructorID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `EvalQID` int(11) NOT NULL,
  `Content` text NOT NULL,
  `Feedback_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `GradeID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `AssignmentID` int(11) NOT NULL,
  `Grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `MessageID` int(11) NOT NULL,
  `SenderID` int(11) NOT NULL,
  `ReceiverID` int(11) NOT NULL,
  `Content` text NOT NULL,
  `Timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RatingID` int(11) NOT NULL,
  `Rate` int(11) NOT NULL,
  `Rate_Date` datetime NOT NULL,
  `FeedbackID` int(11) NOT NULL,
  `InstructorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `AdminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `UserID`, `AdminID`) VALUES
(20220208, 27, 11),
(20220209, 28, 11),
(20220210, 29, 11),
(20220211, 35, 12),
(20220212, 36, 12),
(20220213, 39, 12),
(20220214, 40, 12);

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `StudentID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`StudentID`, `CourseID`) VALUES
(20220211, 48),
(20220211, 49),
(20220214, 49);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` varchar(10) NOT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `Email`, `Password`, `Role`, `Gender`) VALUES
(19, 'test', 'test@gmail.com', '$2y$10$FHtKq.I1EvLJF38gywsXCutnoPada81XCts7uwGI5XlWVT5062uKS', 'Admin', 'Male'),
(20, 'anas', 'anas@gmail.com', '$2y$10$.PVePFt9xTKugwVQHLyzpO2sAxMlc0bo8Tfmvs6JwcB.UTpU33PfW', 'Admin', 'Male'),
(21, 'amr', 'amr@gmail.com', '$2y$10$upObS3yEFOtZjiS8MDu01OHr9ih/Deu2we78Pfb1bpELe0IJnVSx.', 'Teacher', 'Male'),
(27, 'roy', 'roy@gmail.com', '$2y$10$6ry7NRC9Rs3RnkMwRM70z.i3/8BU1Y6m6AFrz2ayqFoqFTqaYTJre', 'Student', 'Male'),
(28, 'Nora', 'Nora@gmail.com', '$2y$10$NedPIcNRr87k/Lq0ZW4U0O/HINsImcAPkZkgmlg.CSvR9ovO6bgRu', 'Student', 'Female'),
(29, 'max', 'max@gmail.com', '$2y$10$pM601DwJ2DYcHLq2KjDAMu/00AlinHjONNAYTGrSgf8s2odOeJOYu', 'Student', 'Male'),
(31, 'mohamed', 'mohamed@gmail.com', '$2y$10$h7juGI.CtxqhSOIQiYRJAuMkINEegiI2cLxiT74oBeWEJOXZoxkvy', 'Teacher', 'Male'),
(32, 'ahmed', 'ahmed@gmail.com', '$2y$10$CxTNDif4b418s8MRii5wneRq9z3hjfbTis5TzqYi4TN.5kN71Whi.', 'Teacher', 'Male'),
(33, 'admin', 'admin@gmail.com', '$2y$10$.JrvcXHzwgia7yFNKCK.aeue8pCXvsD7.2az83Xvqgi11nobDgecm', 'Admin', 'NULL'),
(34, 'samir', 'samir@gmail.com', '$2y$10$jl/IOc2UQWIzdthx0pnZx.lNOZPfu8Bk3L/Zb1Ld4VaPA0kV1vPJO', 'Teacher', 'Male'),
(35, 'nami', 'nami@gmail.com', '$2y$10$K9MxrmmBXZDt641ropuGjOKkoriSclEevGByJXBmzFXTRx4yr3qVi', 'Student', 'Female'),
(36, 'teemo', 'teemo@gmail.com', '$2y$10$WrZpI4S6xfs7aJ4DUeDSS.jNBOZ1uXPb3fmdzR3EP3I9w2ROOk/b.', 'Student', 'Male'),
(37, 'mundo', 'mundo@gmail.com', '$2y$10$LcqFkSDln2PFPi6C3mr67.y75YTznWcBOaYWbYgLtL5Y226LPcM72', 'Teacher', 'Male'),
(38, 'samira', 'samira@gmail.com', '$2y$10$Vk7GWZDyvbNxUkkf.95uUevTqKIPq/NWilcBuVVdt.BYgX/0gLD2C', 'Teacher', 'Female'),
(39, 'draven', 'draven@gmail.com', '$2y$10$CRwxg5/W7dNqWKvXKRkHjuwhVt7lJ3Nv/2pyI9Q9wsMgyxi927yC2', 'Student', 'Male'),
(40, 'lulu', 'lulu@gmail.com', '$2y$10$ZQi90LpzC7R4NbAjO/TxSOYjwHtaM0bhfsn.D0RUjZ9YnxuuwjNd2', 'Student', 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`AssignmentID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`CertificateID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`),
  ADD UNIQUE KEY `CourseName` (`CourseName`),
  ADD KEY `InstructorID` (`InstructorID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`EnrollmentID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `evaluation_questions`
--
ALTER TABLE `evaluation_questions`
  ADD PRIMARY KEY (`EvalQID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `faculty_member`
--
ALTER TABLE `faculty_member`
  ADD PRIMARY KEY (`FacultyID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD KEY `InstructorID` (`InstructorID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `EvalQID` (`EvalQID`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`GradeID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `AssignmentID` (`AssignmentID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`MessageID`),
  ADD KEY `SenderID` (`SenderID`),
  ADD KEY `ReceiverID` (`ReceiverID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RatingID`),
  ADD KEY `FeedbackID` (`FeedbackID`),
  ADD KEY `InstructorID` (`InstructorID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD UNIQUE KEY `StudentID` (`StudentID`,`CourseID`),
  ADD KEY `student_course_ibfk_2` (`CourseID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `AssignmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `CertificateID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `EnrollmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation_questions`
--
ALTER TABLE `evaluation_questions`
  MODIFY `EvalQID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty_member`
--
ALTER TABLE `faculty_member`
  MODIFY `FacultyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `GradeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20220215;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`);

--
-- Constraints for table `certificate`
--
ALTER TABLE `certificate`
  ADD CONSTRAINT `certificate_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`),
  ADD CONSTRAINT `certificate_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`InstructorID`) REFERENCES `faculty_member` (`FacultyID`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`);

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`),
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`);

--
-- Constraints for table `evaluation_questions`
--
ALTER TABLE `evaluation_questions`
  ADD CONSTRAINT `evaluation_questions_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`);

--
-- Constraints for table `faculty_member`
--
ALTER TABLE `faculty_member`
  ADD CONSTRAINT `faculty_member_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `faculty_member_ibfk_2` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`InstructorID`) REFERENCES `faculty_member` (`FacultyID`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`),
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`EvalQID`) REFERENCES `evaluation_questions` (`EvalQID`);

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `grade_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`),
  ADD CONSTRAINT `grade_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`),
  ADD CONSTRAINT `grade_ibfk_3` FOREIGN KEY (`AssignmentID`) REFERENCES `assignment` (`AssignmentID`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`SenderID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`ReceiverID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`FeedbackID`) REFERENCES `feedback` (`FeedbackID`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`InstructorID`) REFERENCES `faculty_member` (`FacultyID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`);

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student_course_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 05:17 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(5) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Permission` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Username`, `Password`, `Permission`) VALUES
(1, 'admin', 'admin', 1),
(5, 'admin1', 'admin1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ClassID` int(5) NOT NULL,
  `ClassName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassID`, `ClassName`) VALUES
(1, 'class1'),
(2, 'class2');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `GradeID` int(5) UNSIGNED NOT NULL,
  `StudentID` int(5) UNSIGNED NOT NULL,
  `SubjectID` int(5) UNSIGNED NOT NULL,
  `Grade` float NOT NULL,
  `TeacherID` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`GradeID`, `StudentID`, `SubjectID`, `Grade`, `TeacherID`) VALUES
(1, 2, 1, 8.8, 1),
(5, 9, 2, 8, 1),
(6, 9, 3, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `NewsID` int(5) NOT NULL,
  `Title` mediumtext NOT NULL,
  `Description` longtext NOT NULL,
  `image` varchar(500) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `CreateDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`NewsID`, `Title`, `Description`, `image`, `Status`, `CreateDate`) VALUES
(12, 'See the \'cool\' new campus of the University of Greenwich (Vietnam) in Saigon', '<p>After a period of setup and preparation, Cong Hoa new facility with an area of more than 6000m2 was put into operation.\r\n\r\nWhile waiting for you to return to school, I would like to send parents and children contact information at the new campus!\r\n</p><p>\r\n1. Address: Cong Hoa Building, No. 20 Cong Hoa, Ward 12, Tan Binh District, HCM.**\r\n</p><p>\r\n2. Hotline:\r\n\r\n+ Mobile: 034.7939.251**\r\n\r\n+ Fixed: 028.7300.6622**\r\n</p><p>\r\nI hope you all have a safe, relaxing weekend (from July 5 to July 11, 2021) and always follow the 5K measures to protect the health of yourself and the community!\r\n\r\nSee you at the new campus!</p>', 'newSchool.jpg', 'Active', '2021-07-15'),
(13, 'The best thing of University of Greenwich', '<p><font color=\"#000000\">We all know that Greenwich in the UK is one of the top universities, also among the top universities in the world, so there is no doubt about the content taught here. Each content and lecture is standardized, and there are also adjustments to be more suitable with domestic standards. In addition, the quality of teachers is also guaranteed, all of whom are educated and trained abroad,...</font></p><p><font color=\"#000000\">Coming to the University of Greenwich, you will have more opportunities to foster the skills you lack, the most important of which are leadership skills or public responsibility. Through extracurricular activities, competitions, supplementary study programs, you find what you lack and can completely improve these things. These are highly appreciated by students because nowadays not only professional knowledge but also personal skills or the ability to adapt to this change are of great importance.</font></p><p><font color=\"#000000\">From the time they are still in the program, students have had many training opportunities at large companies and enterprises. This makes it easier for students to visualize and have an overall view. Thereby being aware of what you still need to add to be able to work in those environments. This is an important step for the school to be able to train high-quality human resources in the future.</font></p>', 'student.jpg', 'Active', '2021-07-08'),
(16, 'testtttt123123123', 'testtttt123123123', 'headNews.jpg', 'Disable', '2021-07-29'),
(18, 'Interesting series of online events of the Clubs.', '<p>The epidemic situation in Ho Chi Minh City is extremely complicated, but the clubs do not sit still. The clubs of the University of Greenwich are still active online with many meaningful events, let take a look at what the clubs are doing</p><p>Come to Media Club and send special messages through the program \"Love Radio\", share the love and meaning to the doctors and nurses who are working day and night to save Vietnam from danger. , because a Vietnamese country said \"no\" to Covid through broadcast episode 02 - Silent \"soldiers\".</p>', 'CLB-Media.jpg', 'Active', '2021-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(5) UNSIGNED NOT NULL,
  `Full_name` varchar(30) NOT NULL,
  `Date_of_birth` date NOT NULL,
  `ClassID` int(5) NOT NULL,
  `SchoolYear` varchar(5) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `ContactNumber` varchar(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `Full_name`, `Date_of_birth`, `ClassID`, `SchoolYear`, `Email`, `ContactNumber`, `Username`, `Password`) VALUES
(2, 'Bui Cong Thuan', '2001-11-01', 2, '2021', 'thuan@gmail.com', '12345678', 'thuan2611', '123456'),
(9, 'Test', '2021-07-01', 1, '2021', 'aabbaa', '12347042', 'student', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SubjectID` int(5) UNSIGNED NOT NULL,
  `SubjectName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectID`, `SubjectName`) VALUES
(1, 'Subject1'),
(2, 'IT'),
(3, 'Literature');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `TeacherID` int(5) UNSIGNED NOT NULL,
  `TeacherName` varchar(30) NOT NULL,
  `ContactNumber` varchar(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Permission` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TeacherID`, `TeacherName`, `ContactNumber`, `Username`, `Password`, `Permission`) VALUES
(1, 'John', '12345678', 'teacher', 'teacher', 0),
(2, 'Viet', '1234', 'Viet', 'Viet123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassID`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`GradeID`),
  ADD KEY `StudentID` (`StudentID`,`SubjectID`,`TeacherID`),
  ADD KEY `SubjectID` (`SubjectID`),
  ADD KEY `TeacherID` (`TeacherID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`NewsID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `ClassID` (`ClassID`) USING BTREE;

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SubjectID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`TeacherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ClassID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `GradeID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `NewsID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SubjectID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `grade_ibfk_1` FOREIGN KEY (`SubjectID`) REFERENCES `subject` (`SubjectID`),
  ADD CONSTRAINT `grade_ibfk_2` FOREIGN KEY (`TeacherID`) REFERENCES `teacher` (`TeacherID`),
  ADD CONSTRAINT `grade_ibfk_3` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ClassID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2019 at 06:31 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlsv`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `ID` int(11) NOT NULL,
  `Username` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pass` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Is_teacher` smallint(1) NOT NULL,
  `Name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` int(11) NOT NULL,
  `Email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Khoa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ID`, `Username`, `Pass`, `Is_teacher`, `Name`, `Phone`, `Email`, `Khoa`, `Avatar`) VALUES
(6, 'admin', 'admin', 1, 'Le van admin', 987654321, 'admin@gmail.com', 'CNTT', 'user1.png'),
(7, 'dung', 'dung', 0, 'Ha Manh Dung', 113131, '113@gmail.com', 'ATTT', 'Penguins.jpg'),
(25, 'test', '', 1, 'Nguyen Thi Test 1', 191, '191@gmail.com', 'chinh tri', 'COVER.png'),
(26, 'dell', 'dell', 1, 'Nguyen Van Dell', 2147483647, '112233445566@gmail.com', 'The chat', NULL),
(27, 'dung123456', 'dung123456', 0, 'dung123456', 112233, '112233445566@gmail.com', 'sa', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `ID` int(11) NOT NULL,
  `file_path` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_user_id` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ID`, `file_path`, `teacher_user_id`) VALUES
(2, 'bai tap 1.doc', 'admin'),
(3, 'mysql_tutorial.pdf', 'dell'),
(4, 'bai tap 1.doc', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `ID` int(11) NOT NULL,
  `user_id_sent` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id_receive` text COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`ID`, `user_id_sent`, `user_id_receive`, `message`) VALUES
(7, 'admin', '26', 'hell122'),
(8, 'dung', '6', 'hello dung day 123'),
(9, 'dung', '6', 'alo alo 123 a@'),
(10, 'admin', '7', 'uh tao la Admin day '),
(11, 'admin', '25', '123456'),
(12, 'test', '24', 'alo tao ddaay \r\n'),
(13, 'test', '6', '123456'),
(14, 'admin', '25', '123'),
(15, 'demo', '25', '123'),
(17, 'dung', '25', 'dfasfasfdsd');

-- --------------------------------------------------------

--
-- Table structure for table `student_upload`
--

CREATE TABLE `student_upload` (
  `ID` int(11) NOT NULL,
  `student_user_id` text COLLATE utf8_unicode_ci NOT NULL,
  `file_path` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `exam_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_upload`
--

INSERT INTO `student_upload` (`ID`, `student_user_id`, `file_path`, `exam_id`) VALUES
(3, 'admin', 'giai bai tap 1.DOC', 0),
(4, 'demo', 'mysql_tutorial.pdf', 0),
(5, 'admin', 'bai 2.DOC', 0),
(6, 'dell', 'mysql_tutorial.pdf', 0),
(7, 'dung', 'giai bai tap 1.DOC', 0),
(9, 'dung', '123.DOC', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_upload`
--
ALTER TABLE `student_upload`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student_upload`
--
ALTER TABLE `student_upload`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 10:57 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ewsd_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicyear`
--

CREATE TABLE `academicyear` (
  `AcademicYearID` int(11) NOT NULL,
  `Year` varchar(15) NOT NULL,
  `Term` varchar(50) NOT NULL,
  `ClosureDate` date NOT NULL,
  `FinalClosureDate` date NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `academicyear`
--

INSERT INTO `academicyear` (`AcademicYearID`, `Year`, `Term`, `ClosureDate`, `FinalClosureDate`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, '2021-2022', 'First term', '2021-12-22', '2022-01-04', 1, '2021-03-11 22:48:00', 1, '2021-03-11 22:48:00'),
(2, '2021-2022', 'Second term & Third term', '2022-04-12', '2022-04-19', 1, '2021-03-11 22:51:49', 1, '2021-03-11 22:51:49'),
(3, '2022-2023', 'First term', '2022-12-23', '2023-01-03', 2, '2022-03-27 01:42:36', 2, '2022-03-27 01:42:36'),
(4, '2022-2023', 'Second term & Third term', '2023-04-05', '2023-04-13', 2, '2022-03-27 01:43:22', 2, '2023-04-06 03:10:13'),
(5, '2023-2024', 'First term', '2023-12-22', '2024-01-05', 1, '2023-04-06 08:45:39', 1, '2023-04-06 08:45:39'),
(6, '2023-2024', 'Second term & Third term', '2024-04-12', '2024-04-19', 1, '2023-04-06 08:46:16', 1, '2023-04-08 01:07:39'),
(7, '2024-2025', 'First term', '2024-12-20', '2025-01-03', 2, '2023-04-07 22:17:20', 2, '2023-04-07 22:17:20'),
(8, '2024-2025', 'Second term & Third term', '2025-04-11', '2025-04-18', 2, '2023-04-07 22:18:10', 2, '2023-04-07 22:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `AdministratorID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`AdministratorID`, `Name`, `Email`, `Password`) VALUES
(1, 'Rio', 'rio@gmail.com', '$2y$10$jQWzPrqDUNAhBW7faxFoTuuS5Z9BbYuZeG0nWTJzsnvEM9DZy1BNi'),
(2, 'Leo', 'leo@gmail.com', '$2y$10$sbxzguasRrUMlNKaM7OHn.IfsAtO9afKvmvHQDbZzrrPNywMb6Ju.');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL,
  `CategoryStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`, `CategoryStatus`) VALUES
(1, 'Teaching and Learning', '0'),
(2, 'Student Support', '0'),
(5, 'Infrastructure', '0'),
(6, 'Administrative Processes', '0'),
(7, 'Community Engagement', '0'),
(8, 'Research and Innovation', '0'),
(9, 'Diversity, Equity, and Inclusion', '0');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `CommentID` int(11) NOT NULL,
  `Comment` varchar(255) NOT NULL,
  `CommentedTime` datetime NOT NULL,
  `CommentedBy` int(11) NOT NULL,
  `CommentedOn` int(11) NOT NULL,
  `CisAnonymous` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`CommentID`, `Comment`, `CommentedTime`, `CommentedBy`, `CommentedOn`, `CisAnonymous`) VALUES
(1, 'Lorem ipsum dolor sit amet.', '2023-04-07 23:38:00', 6, 1, 'false'),
(2, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:22:11', 7, 2, 'true'),
(3, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:22:37', 8, 3, 'false'),
(4, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:22:37', 9, 4, 'true'),
(5, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:22:37', 6, 5, 'false'),
(6, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:22:37', 7, 6, 'true'),
(7, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:22:37', 8, 7, 'false'),
(8, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:22:37', 9, 8, 'true'),
(9, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 6, 9, 'false'),
(10, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 7, 10, 'true'),
(11, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 8, 11, 'false'),
(12, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 9, 12, 'true'),
(13, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 6, 13, 'false'),
(14, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 7, 14, 'true'),
(15, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 8, 15, 'false'),
(16, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 9, 1, 'true'),
(17, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 6, 1, 'false'),
(18, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 7, 2, 'true'),
(19, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 8, 2, 'false'),
(20, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 9, 3, 'true'),
(21, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 6, 3, 'false'),
(22, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 7, 4, 'true'),
(23, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 8, 4, 'false'),
(24, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 9, 5, 'true'),
(25, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 6, 5, 'false'),
(26, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 7, 6, 'true'),
(27, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 8, 6, 'false'),
(28, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 9, 7, 'true'),
(29, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 6, 7, 'false'),
(30, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 7, 8, 'true'),
(31, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 8, 8, 'false'),
(32, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 9, 9, 'true'),
(33, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 6, 9, 'false'),
(34, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 7, 10, 'true'),
(35, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:23:26', 8, 10, 'false'),
(36, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:29:27', 9, 11, 'true'),
(37, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:29:27', 6, 11, 'false'),
(38, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:29:27', 7, 12, 'true'),
(39, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:29:27', 8, 12, 'false'),
(40, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:29:27', 9, 13, 'true'),
(41, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:29:27', 6, 13, 'false'),
(42, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:29:27', 7, 14, 'true'),
(43, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:29:27', 8, 14, 'false'),
(44, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:29:27', 9, 15, 'true'),
(45, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:29:27', 9, 15, 'false'),
(46, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 6, 1, 'true'),
(47, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 7, 1, 'false'),
(48, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 8, 1, 'true'),
(49, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 9, 2, 'false'),
(50, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 6, 2, 'true'),
(51, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 7, 3, 'false'),
(52, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 8, 4, 'true'),
(53, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 9, 4, 'false'),
(54, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 6, 5, 'true'),
(55, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 7, 5, 'false'),
(56, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 8, 5, 'true'),
(57, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 9, 6, 'false'),
(58, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 6, 7, 'true'),
(59, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 7, 7, 'false'),
(60, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 8, 8, 'true'),
(61, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 9, 8, 'false'),
(62, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 6, 8, 'true'),
(63, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 7, 9, 'false'),
(64, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 8, 9, 'true'),
(65, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 9, 10, 'false'),
(66, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 6, 11, 'true'),
(67, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 7, 11, 'false'),
(68, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 8, 12, 'true'),
(69, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:41:15', 9, 12, 'false'),
(70, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:43:31', 6, 12, 'true'),
(71, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:43:31', 7, 13, 'false'),
(72, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:43:31', 8, 13, 'true'),
(73, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:43:31', 9, 14, 'false'),
(74, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:43:31', 6, 15, 'true'),
(75, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:43:31', 7, 15, 'false'),
(76, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:43:31', 8, 1, 'true'),
(77, 'Lorem ipsum dolor sit amet.', '2023-04-08 02:43:31', 9, 3, 'false'),
(78, 'Lorem ipsum dolor sit amet.', '2023-04-08 21:18:13', 8, 14, 'false'),
(79, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 6, 1, 'true'),
(80, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 7, 1, 'false'),
(81, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 6, 2, 'false'),
(82, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 7, 2, 'true'),
(83, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 8, 2, 'false'),
(84, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 9, 2, 'false'),
(85, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 6, 3, 'true'),
(86, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 9, 4, 'false'),
(87, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 8, 16, 'false'),
(88, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 9, 16, 'false'),
(89, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 6, 16, 'false'),
(90, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 7, 15, 'true'),
(91, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 6, 10, 'true'),
(92, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 7, 7, 'false'),
(93, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 8, 9, 'true'),
(94, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 9, 13, 'false'),
(95, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 7, 7, 'true'),
(96, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 6, 14, 'false'),
(97, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 9, 13, 'true'),
(98, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 8, 16, 'false'),
(99, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 9, 13, 'true'),
(100, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 9, 11, 'false'),
(101, 'Lorem ipsum dolor sit amet.', '2023-04-09 00:17:31', 8, 12, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` int(11) NOT NULL,
  `DepartmentName` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `DepartmentName`) VALUES
(1, 'All Departments'),
(2, 'Computer Science'),
(4, 'Psychiatry'),
(5, 'Business Management'),
(6, 'Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `idea`
--

CREATE TABLE `idea` (
  `IdeaID` int(11) NOT NULL,
  `AcademicYearID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `IdeaTitle` varchar(100) NOT NULL,
  `IdeaDetails` varchar(255) NOT NULL,
  `AttachmentFile` text NOT NULL,
  `isAnonymous` varchar(20) NOT NULL,
  `UploadedBy` int(11) NOT NULL,
  `UploadedOn` datetime NOT NULL,
  `Views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `idea`
--

INSERT INTO `idea` (`IdeaID`, `AcademicYearID`, `CategoryID`, `IdeaTitle`, `IdeaDetails`, `AttachmentFile`, `isAnonymous`, `UploadedBy`, `UploadedOn`, `Views`) VALUES
(1, 1, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, similique.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum quo eligendi saepe dignissimos vel dicta cumque officiis aspernatur nisi ullam.', 'files/test1.pdf', 'false', 6, '2023-04-07 23:07:15', 31),
(2, 1, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, similique.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum quo eligendi saepe dignissimos vel dicta cumque officiis aspernatur nisi ullam.', 'files/test2.docx', 'true', 7, '2023-04-07 23:13:04', 22),
(3, 2, 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, similique.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum quo eligendi saepe dignissimos vel dicta cumque officiis aspernatur nisi ullam.', 'files/test3.docx', 'false', 8, '2023-04-07 23:15:49', 29),
(4, 2, 6, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, similique.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum quo eligendi saepe dignissimos vel dicta cumque officiis aspernatur nisi ullam.', 'files/test4.pdf', 'true', 9, '2023-04-07 23:17:35', 18),
(5, 3, 7, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, similique.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum quo eligendi saepe dignissimos vel dicta cumque officiis aspernatur nisi ullam.', 'files/test5.pdf', 'false', 6, '2023-04-07 23:19:02', 30),
(6, 3, 8, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, similique.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum quo eligendi saepe dignissimos vel dicta cumque officiis aspernatur nisi ullam.', 'files/test6.docx', 'true', 7, '2023-04-07 23:19:45', 29),
(7, 4, 9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, quidem.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio pariatur neque obcaecati aliquid architecto quidem hic reiciendis nisi, natus explicabo.', 'files/test7.pdf', 'false', 8, '2023-04-08 01:44:27', 30),
(8, 4, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, quidem.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio pariatur neque obcaecati aliquid architecto quidem hic reiciendis nisi, natus explicabo.', 'files/test8.pdf', 'true', 9, '2023-04-08 01:47:29', 25),
(9, 5, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, quidem.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio pariatur neque obcaecati aliquid architecto quidem hic reiciendis nisi, natus explicabo.', 'files/test9.pdf', 'false', 6, '2023-04-08 01:48:02', 16),
(10, 5, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, quidem.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio pariatur neque obcaecati aliquid architecto quidem hic reiciendis nisi, natus explicabo.', 'files/test10.pdf', 'true', 7, '2023-04-08 01:49:10', 10),
(11, 5, 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, quidem.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio pariatur neque obcaecati aliquid architecto quidem hic reiciendis nisi, natus explicabo.', 'files/test11.pdf', 'false', 8, '2023-04-08 01:52:29', 9),
(12, 6, 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, quidem.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio pariatur neque obcaecati aliquid architecto quidem hic reiciendis nisi, natus explicabo.', 'files/test12.pdf', 'true', 9, '2023-04-08 01:53:51', 8),
(13, 6, 8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, quidem.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio pariatur neque obcaecati aliquid architecto quidem hic reiciendis nisi, natus explicabo.', 'files/test13.pdf', 'false', 6, '2023-04-08 01:59:00', 10),
(14, 6, 9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, quidem.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio pariatur neque obcaecati aliquid architecto quidem hic reiciendis nisi, natus explicabo.', 'files/test14.docx', 'true', 7, '2023-04-08 02:00:03', 22),
(15, 7, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, quidem.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio pariatur neque obcaecati aliquid architecto quidem hic reiciendis nisi, natus explicabo.', 'files/test15.docx', 'false', 8, '2023-04-08 02:00:47', 20),
(16, 6, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, similique.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum quo eligendi saepe dignissimos vel dicta cumque officiis aspernatur nisi ullam.', 'files/test16.docx', 'false', 8, '2023-04-08 21:03:39', 13);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `IdeaID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Reaction` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`IdeaID`, `UserID`, `Reaction`) VALUES
(1, 6, 'like'),
(1, 7, 'dislike'),
(1, 8, 'like'),
(1, 9, 'dislike'),
(2, 6, 'dislike'),
(2, 7, 'like'),
(2, 8, 'dislike'),
(2, 9, 'like'),
(3, 6, 'like'),
(3, 7, 'dislike'),
(3, 8, 'like'),
(3, 9, 'dislike'),
(4, 6, 'dislike'),
(4, 7, 'like'),
(4, 8, 'dislike'),
(4, 9, 'like'),
(5, 6, 'like'),
(5, 7, 'dislike'),
(5, 8, 'like'),
(5, 9, 'dislike'),
(6, 6, 'dislike'),
(6, 7, 'like'),
(6, 8, 'dislike'),
(6, 9, 'like'),
(7, 6, 'like'),
(7, 7, 'dislike'),
(7, 8, 'like'),
(7, 9, 'dislike'),
(8, 6, 'dislike'),
(8, 7, 'like'),
(8, 8, 'dislike'),
(8, 9, 'like'),
(9, 6, 'like'),
(9, 7, 'dislike'),
(9, 8, 'like'),
(9, 9, 'dislike'),
(10, 6, 'dislike'),
(10, 7, 'like'),
(10, 8, 'dislike'),
(10, 9, 'like'),
(11, 6, 'like'),
(11, 7, 'dislike'),
(11, 8, 'like'),
(11, 9, 'dislike'),
(12, 6, 'dislike'),
(12, 7, 'like'),
(12, 8, 'dislike'),
(12, 9, 'like'),
(13, 6, 'like'),
(13, 7, 'dislike'),
(13, 8, 'like'),
(13, 9, 'dislike'),
(14, 6, 'dislike'),
(14, 7, 'like'),
(14, 8, 'dislike'),
(14, 9, 'like'),
(15, 6, 'like'),
(15, 7, 'dislike'),
(15, 8, 'like'),
(15, 9, 'like'),
(16, 6, 'like'),
(16, 7, 'like'),
(16, 8, 'like'),
(16, 9, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleID`, `RoleName`) VALUES
(1, 'QA Manager'),
(2, 'QA Coordinator'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `DepartmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Name`, `Email`, `Password`, `RoleID`, `DepartmentID`) VALUES
(1, 'Arthur', 'arthur@gmail.com', '$2y$10$2woq27dERpLpdsPvEEn8IuAqHz9xkyzUJSk2HCAOCevdKGCgdIpBm', 1, 1),
(2, 'Esther', 'esther@gmail.com', '$2y$10$IRU3tpG2OkGKzr754L1gq.cWQLvUQkA88saq4N1vI24Uc1Pg7kQLS', 2, 2),
(3, 'Mia', 'mia@gmail.com', '$2y$10$2gvq5GhA740CKkHOxJH5.ON3H0YkovTOGMNNPvPeW8l88lDsgN6d.', 2, 4),
(4, 'Daniel', 'daniel@gmail.com', '$2y$10$B2dKXN3H9nNXrpx411Qql.8mit91kXoZI3ur/YoVkn3lOLpNpkmlO', 2, 5),
(5, 'Adam', 'adam@gmail.com', '$2y$10$D3sC0Giw5cDfdIuGQ8xlfuit5fGwu61albbehJ3typY6pXz0T9gOa', 2, 6),
(6, 'Ella', 'ella@gmail.com', '$2y$10$zPNgXV0YpICVIhf.JLYEfOyruUG/hXCpK6gaJPz7oAUahvM1eFihi', 3, 2),
(7, 'Andrew', 'andrew@gmail.com', '$2y$10$tMsMcZ00fgBojse1XIxpRuB1b2djwVvDbFCFm.PryvneeOvyNunsC', 3, 4),
(8, 'Mark', 'mark@gmail.com', '$2y$10$ej7SBhpRfQ4VUA7fPm/XUuYI1eocBY4D1fdOukNxNKDB8joF0tgYK', 3, 5),
(9, 'Steve', 'steve@gmail.com', '$2y$10$.MzPfSibP7p264kjogDM1.TXCbRT6LNzVK.p1vf6dR/f4LIg.ZcJi', 3, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academicyear`
--
ALTER TABLE `academicyear`
  ADD PRIMARY KEY (`AcademicYearID`),
  ADD KEY `CreatedBy` (`CreatedBy`),
  ADD KEY `UpdatedBy` (`UpdatedBy`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`AdministratorID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `CommentedBy` (`CommentedBy`),
  ADD KEY `CommentedOn` (`CommentedOn`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `idea`
--
ALTER TABLE `idea`
  ADD PRIMARY KEY (`IdeaID`),
  ADD KEY `AcademicYearID` (`AcademicYearID`),
  ADD KEY `UploadedBy` (`UploadedBy`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD UNIQUE KEY `IdeaID` (`IdeaID`,`UserID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `RoleID` (`RoleID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academicyear`
--
ALTER TABLE `academicyear`
  MODIFY `AcademicYearID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `AdministratorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `idea`
--
ALTER TABLE `idea`
  MODIFY `IdeaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academicyear`
--
ALTER TABLE `academicyear`
  ADD CONSTRAINT `academicyear_ibfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `administrator` (`AdministratorID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `academicyear_ibfk_2` FOREIGN KEY (`UpdatedBy`) REFERENCES `administrator` (`AdministratorID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`CommentedBy`) REFERENCES `user` (`UserID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`CommentedOn`) REFERENCES `idea` (`IdeaID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `idea`
--
ALTER TABLE `idea`
  ADD CONSTRAINT `idea_ibfk_1` FOREIGN KEY (`AcademicYearID`) REFERENCES `academicyear` (`AcademicYearID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `idea_ibfk_2` FOREIGN KEY (`UploadedBy`) REFERENCES `user` (`UserID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `idea_ibfk_3` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `role` (`RoleID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 14, 2017 at 02:27 PM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `courseid` int(10) NOT NULL,
  `coursename` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `coursename`, `username`) VALUES
(101, 'Computer Science', 'sheetal'),
(102, 'Physics', 'rani'),
(103, 'Chemistry', 'raj'),
(104, 'Programming', 'sheetal');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('raj', 'raj123'),
('rani', 'rani123'),
('sheetal', 'sheetal123');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE IF NOT EXISTS `query` (
  `username` varchar(20) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `studentid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `msq1` int(11) NOT NULL,
  `msq2` int(11) NOT NULL,
  `msq3` int(11) NOT NULL,
  `esq1` int(11) NOT NULL,
  `esq2` int(11) NOT NULL,
  `esq3` int(11) NOT NULL,
  `esq4` int(11) NOT NULL,
  `esq5` int(11) NOT NULL,
  `assignment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `courseid`, `project`, `msq1`, `msq2`, `msq3`, `esq1`, `esq2`, `esq3`, `esq4`, `esq5`, `assignment`) VALUES
(2001, 101, 15, 4, 3, 5, 9, 9, 10, 8, 10, 7),
(2002, 101, 15, 3, 2, 2, 8, 7, 6, 9, 9, 7),
(2003, 101, 15, 5, 5, 5, 10, 10, 10, 10, 10, 10),
(2001, 102, 20, 4, 4, 3, 3, 8, 8, 6, 7, 8),
(2005, 101, 19, 3, 4, 5, 8, 7, 8, 9, 8, 8),
(2004, 102, 23, 5, 5, 5, 10, 10, 10, 9, 9, 10),
(2002, 104, 22, 4, 3, 4, 8, 8, 7, 9, 9, 8),
(2004, 104, 24, 4, 4, 4, 9, 9, 9, 9, 9, 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

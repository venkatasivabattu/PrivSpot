-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 01:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `privdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dairy`
--

CREATE TABLE `dairy` (
  `did` int(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `uname` varchar(20) NOT NULL,
  `data` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dairy`
--

INSERT INTO `dairy` (`did`, `date`, `uname`, `data`) VALUES
(13, '2023-04-06', 'a', 'hfhfg  vgg b'),
(14, '2020-04-15', 'a', 'hv'),
(15, '2023-04-05', 'a', 'n'),
(17, '2023-04-03', 'a', 'hg'),
(18, '2023-04-02', 'a', '2023-04-02'),
(19, '2023-04-01', 'a', '2023-04-02'),
(20, '2023-03-01', 'a', '2023-04-02'),
(21, '2023-03-02', 'a', 'mb'),
(22, '2023-03-03', 'a', 'gv'),
(23, '2023-03-04', 'a', 'hxvc'),
(24, '2023-03-05', 'a', 'jhg'),
(25, '2023-03-06', 'a', '2023-03-01'),
(26, '2023-03-07', 'a', '2023-03-01'),
(27, '2023-03-08', 'a', 'nji'),
(28, '2023-03-09', 'a', '2023-03-01'),
(29, '2023-03-10', 'a', '2023-03-10'),
(30, '2023-03-11', 'a', '2023-03-10'),
(31, '2023-03-12', 'a', '2023-03-10'),
(32, '2023-03-13', 'a', '2023-03-10'),
(33, '2023-04-07', 'a', 'today is jhgdgh hvfbhbv m '),
(36, '2023-04-19', 'a', ''),
(37, '2023-04-20', 'a', ' '),
(38, '2023-04-22', 'a', 'hb'),
(40, '2023-04-30', 'anjalianjali', 'bf, bn bbc bccv v\r\nhvh vg bgggv hdft f nbnb');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `nid` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `data` varchar(1000) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `uname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`nid`, `title`, `data`, `date`, `uname`) VALUES
(13, 'hi', 'good korning mesage', '2023-04-24 16:35:04', 'a'),
(14, 'hi', 'hgft gfgf bv ', '2023-04-30 17:06:14', 'anjalianjali');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `qid` int(10) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `quote` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`qid`, `uname`, `quote`) VALUES
(14, 'a', 'All is Well'),
(16, 'anjalianjali', ' if you want something you should work hard');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `tid` int(10) NOT NULL,
  `task` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `uname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`tid`, `task`, `date`, `status`, `uname`) VALUES
(11, ' ', '2023-04-23 15:08:59', 1, 'a'),
(12, 'preparation', '2023-04-23 15:14:15', 1, 'a'),
(13, 'eating', '2023-04-23 15:17:11', 0, 'a'),
(14, 'i want to see movie', '2023-04-30 20:37:05', 1, 'anjalianjali'),
(15, ' dinner', '2023-04-30 20:38:36', 0, 'anjalianjali');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `uname` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `dob`, `gender`, `address`, `phone`, `email`, `uname`, `password`) VALUES
('boss', '2023-04-25', 'male', '', 0, '', 'a', '1'),
('william', '2023-03-17', 'male', 'hii', 899, 'ij@jj.vn', 'aaaabbbb', '899'),
('william', '2023-03-17', 'male', 'hii', 899, 'ij@jj.vn', 'aaaabbbb5', '899'),
('anjali', '2023-04-04', 'female', 'fhbhgbh hbgh', 78767885, 'hfv@hvf.hbv', 'anjalianjali', '78767885');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dairy`
--
ALTER TABLE `dairy`
  ADD PRIMARY KEY (`did`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`nid`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`qid`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dairy`
--
ALTER TABLE `dairy`
  MODIFY `did` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `nid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `qid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `tid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dairy`
--
ALTER TABLE `dairy`
  ADD CONSTRAINT `dairy_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `users` (`uname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `users` (`uname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `quotes_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `users` (`uname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `todo_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `users` (`uname`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 05, 2019 at 08:48 AM
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
-- Database: `lawyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$h5M5IO4ckHflOGfMFHGmp.mMXFFtMr3vApXeh48.gkgbkXn921IE6');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `case_id` int(200) NOT NULL,
  `description` text NOT NULL,
  `casetype_id` int(200) NOT NULL,
  `uid` int(200) NOT NULL,
  `lid` int(200) NOT NULL,
  `cid` int(200) NOT NULL,
  `date` date NOT NULL,
  `active_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`case_id`, `description`, `casetype_id`, `uid`, `lid`, `cid`, `date`, `active_status`) VALUES
(1, 'posiofjkn', 1, 1, 1, 1, '0000-00-00', 1),
(2, 'ljsdgpifp9ushdb;of', 2, 2, 2, 2, '0000-00-00', 1),
(3, '                                nlsvcn ladv oadv ', 1, 1, 1, 1, '2019-09-11', 1),
(4, '                                nlsdhv lsdh lv', 1, 1, 1, 1, '2019-09-04', 1),
(5, '                                sd;lihabd;lv', 1, 1, 1, 1, '2019-09-18', 1),
(6, '                                heloo', 1, 1, 3, 1, '2019-09-25', 1),
(7, '                                something fishy', 1, 10, 1, 1, '2019-11-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `casetype`
--

CREATE TABLE `casetype` (
  `casetype_id` int(200) NOT NULL,
  `casetype` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `casetype`
--

INSERT INTO `casetype` (`casetype_id`, `casetype`, `description`) VALUES
(1, 'Criminal case', 'lsdhlvlap adlv;ladnv aldivxj o;adv l                                ');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(200) NOT NULL,
  `case_id` int(200) NOT NULL,
  `user` tinyint(1) NOT NULL,
  `comment` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `case_id`, `user`, `comment`) VALUES
(527, 2, 1, ' fdjlksa'),
(528, 1, 0, '                                fdsalkj'),
(529, 1, 0, '                                fdlsa'),
(530, 1, 0, '                                fdsa'),
(531, 2, 0, '                                fdsa'),
(532, 2, 0, '                                this comment\r\n'),
(533, 1, 0, '                                hello'),
(534, 1, 1, '                                axnvz;'),
(535, 1, 0, '                                axnvz;'),
(536, 7, 0, '                                Case started');

-- --------------------------------------------------------

--
-- Table structure for table `courts`
--

CREATE TABLE `courts` (
  `cid` int(200) NOT NULL,
  `court_name` text NOT NULL,
  `place` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courts`
--

INSERT INTO `courts` (`cid`, `court_name`, `place`) VALUES
(1, 'District Court', 'Kottayam'),
(2, 'High Court', 'Eranakulam'),
(3, 'District Court', 'Eranakulam'),
(4, 'Supreme Court ', 'NewDelhi');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `hid` int(200) NOT NULL,
  `lid` int(200) NOT NULL,
  `case_id` int(200) NOT NULL,
  `history` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`hid`, `lid`, `case_id`, `history`, `date`) VALUES
(1, 1, 1, 'Case Won', '0000-00-00'),
(2, 1, 1, '                                    hello', '0000-00-00'),
(3, 2, 1, '                                mnlsdnv', '0000-00-00'),
(4, 2, 1, '                                zcvkbjblzdv', '0000-00-00'),
(5, 1, 1, '                                    hello', '0000-00-00'),
(6, 1, 1, '                             nlsb;fkgdv       ', '0000-00-00'),
(7, 2, 1, '                                zcvkbjblzdv', '0000-00-00'),
(8, 2, 1, 'bkjs;df oidlhz;v                                 ', '2019-09-03'),
(9, 2, 1, '                                adlxjvbgka ', '2019-09-18'),
(10, 2, 2, '                                shodhvoin;vzn', '2019-09-26'),
(11, 2, 2, '                                shodhvoin;vzn', '2019-09-26'),
(12, 2, 2, '                                shodhvoin;vzn', '2019-09-26');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_details`
--

CREATE TABLE `lawyer_details` (
  `lid` int(200) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `speciality` text NOT NULL,
  `experience` text NOT NULL,
  `fees` text NOT NULL,
  `phone` text NOT NULL,
  `gender` varchar(200) NOT NULL,
  `dob` text NOT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lawyer_details`
--

INSERT INTO `lawyer_details` (`lid`, `name`, `email`, `password`, `speciality`, `experience`, `fees`, `phone`, `gender`, `dob`, `approved`) VALUES
(1, 'Sony', 'mailsonytom@gmail.com', '$2y$10$9mhcf7RF2s8fwhMzvmQ9qOsqRDM7H8bPMmMLcULg4VY36bGZS/0Re', 'Criminal Case', 'two years', '10000', '8078518030', 'male', '13/08/1999', 1),
(3, 'Tony', 'tom@gmail.com', '$2y$10$vmrO5Pyy3zEXQ7xHRyYOh.QMB54MMUOLxPUPHIo698h.kNqNWOF8i', 'Civil case', '4yrs ', '10000', '90987987687', 'Male', '09/90/1990', 1),
(4, 'Rince philip', 'rince12@gmail.com', '$2y$10$uZzYiXsuBkVA6zAi3f9qouK..swGLwNJeDB0ci8o/RY2FPMUxdLnK', 'Civil case', '4 ', '', '', 'Male', '', 1),
(5, 'Rince philip', 'rince123@gmail.com', '$2y$10$NGuPxI2HQzlWHcBdC9IUDe7T9wAh3w7.yZHiWbPao1s9ltMbCIeY2', 'Civil case', '4yrs ', '10000', '9293456716', 'Male', '1986-11-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `uid` int(200) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`uid`, `name`, `email`, `password`, `phone`) VALUES
(1, 'Saran Sasi', 'saransasi@gmail.com', '$2y$10$URGHXgnIg.vOPx.npv91xOOtfJyRDQPdjuU/tAvGPXQu27KoyJdPe', '9009899876'),
(9, 'Sony', 'sony222@gmail.com', '$2y$10$yavL7D1O.zaSV1Ls32NYh.dqftxxoVMYq6bj9Y7/8HAi5BtwCcIpC', '0987654432'),
(10, 'Subin', 'subin12@gmail.com', '$2y$10$s5n26ecD9qgl28NRfAIp7O/jrXcQJTzDx0k99p8zbf2K9VhGjTnAK', '9899767691');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `casetype`
--
ALTER TABLE `casetype`
  ADD PRIMARY KEY (`casetype_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `courts`
--
ALTER TABLE `courts`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `lawyer_details`
--
ALTER TABLE `lawyer_details`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `case_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `casetype`
--
ALTER TABLE `casetype`
  MODIFY `casetype_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=537;

--
-- AUTO_INCREMENT for table `courts`
--
ALTER TABLE `courts`
  MODIFY `cid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `hid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lawyer_details`
--
ALTER TABLE `lawyer_details`
  MODIFY `lid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `uid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

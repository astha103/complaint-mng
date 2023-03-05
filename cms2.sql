-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2022 at 12:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`, `date`) VALUES
(1, 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-01-19 04:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryDescription` varchar(100) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(1, 'E-commerce', ' E-commerce', '2022-01-23 04:33:58', NULL),
(3, 'general', ' gfhhgfh', '2022-01-23 05:00:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaintremark`
--

CREATE TABLE `complaintremark` (
  `id` int(5) NOT NULL,
  `complaintNumber` int(5) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaintremark`
--

INSERT INTO `complaintremark` (`id`, `complaintNumber`, `status`, `remark`, `remarkDate`) VALUES
(2, 2, 'in process', ' dewas', '2022-02-03 04:15:52'),
(3, 4, 'closed', ' degh gfhgf', '2022-02-03 13:38:35'),
(4, 6, 'closed', ' sdf dfsfsa ', '2022-02-03 04:19:04'),
(5, 6, 'in process', ' rtrt ttre e', '2022-03-11 14:04:20'),
(6, 7, 'in process', '  ghgf', '2022-03-12 07:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(5) NOT NULL,
  `stateName` varchar(100) NOT NULL,
  `stateDescription` varchar(100) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `stateName`, `stateDescription`, `postingDate`, `updationDate`) VALUES
(2, 'Punjab', ' pnbhhh', '2022-01-25 04:06:11', NULL),
(3, 'Haryana', ' Haryana', '2022-01-25 04:06:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(5) NOT NULL,
  `categoryid` int(5) NOT NULL,
  `subcategory` varchar(100) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(6, 1, 'Online Shopping', '2022-01-24 04:34:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `complaintNumber` int(5) NOT NULL,
  `userId` int(5) NOT NULL,
  `category` int(5) NOT NULL,
  `subcategory` varchar(10) NOT NULL,
  `complaintType` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `noc` varchar(100) NOT NULL,
  `complaintDetails` varchar(100) NOT NULL,
  `complaintFile` varchar(1000) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'not process',
  `lastUpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcomplaints`
--

INSERT INTO `tblcomplaints` (`complaintNumber`, `userId`, `category`, `subcategory`, `complaintType`, `state`, `noc`, `complaintDetails`, `complaintFile`, `regDate`, `status`, `lastUpdationDate`) VALUES
(2, 1, 1, 'Online Sho', 'General', 'Haryana', 'dewas', ' f sdafdsdsfdsfs a', '', '2022-02-03 04:15:52', 'in process', NULL),
(3, 1, 1, 'Online Sho', 'General', 'Punjab', 'fg gfdfd', ' fdg sdgfd', '', '2022-02-03 13:38:35', 'closed', NULL),
(4, 6, 1, 'Online Sho', 'General', 'Punjab', 'sdfasd sad asdc', ' fd fdgfdgsdfg fdfd f gf', '', '2022-02-03 04:18:19', 'in process', NULL),
(5, 6, 1, 'Online Sho', 'General', 'Haryana', 'dewas', '  ghjg f ghjghhgh  gj', '', '2022-03-11 14:04:19', 'in process', NULL),
(6, 4, 1, 'Online Sho', 'General', 'Haryana', 'hjghhg', ' hjhj gj', '', '2022-02-03 04:19:04', 'closed', NULL),
(7, 7, 1, 'Online Sho', 'General', 'Punjab', 'technical', ' ghg hdfdfg hg dh g', '', '2022-03-12 07:21:16', 'in process', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contactNo` bigint(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `userImage` varchar(1000) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updationDate` date NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `userEmail`, `password`, `contactNo`, `address`, `State`, `country`, `pincode`, `userImage`, `regDate`, `updationDate`, `status`) VALUES
(1, 'ravi', 'ravi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 4434534344, 'Dewas', 'mp', 'india', '545454', 'upload/telephone.jpg', '2022-01-23 04:11:47', '0000-00-00', '1'),
(4, 'ajay', 'ajay@mail.com', '202cb962ac59075b964b07152d234b70', 4434534344, '', '', '', '', '', '2022-02-01 03:50:03', '0000-00-00', '1'),
(5, 'neha', 'neha@gmail.com', '202cb962ac59075b964b07152d234b70', 4434534344, '', '', '', '', '', '2022-02-01 03:53:15', '0000-00-00', '1'),
(6, 'jay', 'jay@gmail.com', '202cb962ac59075b964b07152d234b70', 4434534377, '', '', '', '', '', '2022-02-01 03:53:36', '0000-00-00', '1'),
(7, 'sunil', 'sunil@gmail.com', '202cb962ac59075b964b07152d234b70', 1234567890, '', '', '', '', '', '2022-03-12 07:19:37', '0000-00-00', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintremark`
--
ALTER TABLE `complaintremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`complaintNumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complaintremark`
--
ALTER TABLE `complaintremark`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `complaintNumber` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

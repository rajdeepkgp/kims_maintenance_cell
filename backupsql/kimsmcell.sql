-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 07:15 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kimsmcell`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'adminkims@123');

-- --------------------------------------------------------

--
-- Table structure for table `grievancecell`
--

CREATE TABLE `grievancecell` (
  `id` int(250) NOT NULL,
  `orderno` varchar(250) NOT NULL,
  `odatetime` date NOT NULL,
  `unit` varchar(250) NOT NULL,
  `reportby` varchar(250) NOT NULL,
  `actionby` varchar(250) NOT NULL,
  `tecallotted` varchar(250) NOT NULL,
  `cdatetime` datetime(6) NOT NULL,
  `locationn` varchar(250) NOT NULL,
  `ncomplaint` varchar(250) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `incharge` varchar(250) NOT NULL,
  `creationdate` datetime(6) DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `itemdetails`
--

CREATE TABLE `itemdetails` (
  `id` int(250) NOT NULL,
  `cdate` date NOT NULL,
  `item` varchar(250) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `fitted` varchar(250) NOT NULL,
  `usitem` varchar(250) NOT NULL,
  `newunuseitem` varchar(250) NOT NULL,
  `pusername` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `orderno` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'kims', 'kims@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grievancecell`
--
ALTER TABLE `grievancecell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemdetails`
--
ALTER TABLE `itemdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grievancecell`
--
ALTER TABLE `grievancecell`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itemdetails`
--
ALTER TABLE `itemdetails`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

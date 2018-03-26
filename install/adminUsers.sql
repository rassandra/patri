-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2018 at 10:36 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `andra_patri`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminUsers`
--

CREATE TABLE `adminUsers` (
  `id` int(11) NOT NULL,
  `county` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `resset_hash` varchar(50) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `data_last_login` datetime DEFAULT NULL,
  `is_suspended` tinyint(1) NOT NULL,
  `is_dismised` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminUsers`
--

INSERT INTO `adminUsers` (`id`, `county`, `email`, `password`, `resset_hash`, `first_name`, `last_name`, `data_last_login`, `is_suspended`, `is_dismised`) VALUES
(3, '', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', '', '', 'test', NULL, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminUsers`
--
ALTER TABLE `adminUsers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `county` (`county`,`first_name`,`last_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminUsers`
--
ALTER TABLE `adminUsers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

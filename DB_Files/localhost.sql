-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2019 at 07:16 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mamadb`
--
CREATE DATABASE IF NOT EXISTS `mamadb` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `mamadb`;

-- --------------------------------------------------------

--
-- Table structure for table `bills_waste`
--

CREATE TABLE `bills_waste` (
  `id` int(11) NOT NULL,
  `fname` text COLLATE utf8_unicode_ci NOT NULL,
  `nid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `appnum` int(3) NOT NULL,
  `days` int(11) NOT NULL,
  `persons` int(11) NOT NULL,
  `p_perce` int(11) NOT NULL DEFAULT '0',
  `d_perce` int(11) DEFAULT '0',
  `t_perce` int(11) NOT NULL DEFAULT '0',
  `payment` int(2) NOT NULL,
  `paid` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills_water`
--

CREATE TABLE `bills_water` (
  `id` int(11) NOT NULL,
  `fname` text COLLATE utf8_unicode_ci NOT NULL,
  `nid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `appnum` int(3) NOT NULL,
  `days` int(11) NOT NULL,
  `persons` int(11) NOT NULL,
  `p_perce` int(11) NOT NULL DEFAULT '0',
  `d_perce` int(11) NOT NULL DEFAULT '0',
  `t_perce` int(11) NOT NULL DEFAULT '0',
  `payment` int(2) NOT NULL,
  `paid` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(11) NOT NULL,
  `fname` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `nid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tel` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `pnumber` int(11) NOT NULL,
  `indate` text COLLATE utf8_unicode_ci NOT NULL,
  `outdate` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) NOT NULL,
  `appnum` int(3) NOT NULL,
  `days` double NOT NULL DEFAULT '0',
  `p_perce` double NOT NULL DEFAULT '0',
  `d_perce` double NOT NULL DEFAULT '0',
  `t_perce` double NOT NULL DEFAULT '0',
  `payment` double NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills_waste`
--
ALTER TABLE `bills_waste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills_water`
--
ALTER TABLE `bills_water`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills_waste`
--
ALTER TABLE `bills_waste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bills_water`
--
ALTER TABLE `bills_water`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2019 at 12:27 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
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

-- --------------------------------------------------------

--
-- Table structure for table `bills_waste`
--

CREATE TABLE `bills_waste` (
  `id` int(11) NOT NULL,
  `fname` text COLLATE utf8_unicode_ci NOT NULL,
  `nid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `appnum` int(3) NOT NULL,
  `fromdate` text COLLATE utf8_unicode_ci,
  `todate` text COLLATE utf8_unicode_ci,
  `comments` text COLLATE utf8_unicode_ci,
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
  `fromdate` text COLLATE utf8_unicode_ci,
  `todate` text COLLATE utf8_unicode_ci,
  `comments` text COLLATE utf8_unicode_ci,
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

--
-- Dumping data for table `bills_water`
--

INSERT INTO `bills_water` (`id`, `fname`, `nid`, `appnum`, `fromdate`, `todate`, `comments`, `days`, `persons`, `p_perce`, `d_perce`, `t_perce`, `payment`, `paid`, `term`, `timestamp`) VALUES
(6, 'بی بی حفیظه', 'صفحه ۱۳۸ جلد اول ۱۳۸۹ شماره ۶۸۶ شماره تدکره ۲۹۰۳۶۶', 1, '2018-12-22', '2019-01-20', 'برج جدی ۱۳۹۷', 29, 3, 11, 23, 34, 306, 0, 1, '2019-01-24 19:19:34'),
(7, 'عنایت الله', 'صفحه ۱۷۴ جلد ۴ شماره تذکره ۷۳۰۸۴۸', 2, '2018-12-22', '2019-01-20', 'برج جدی ۱۳۹۷', 29, 7, 26, 23, 49, 441, 0, 1, '2019-01-24 19:19:34'),
(8, 'رجب ولد جمعه خان', 'صفحه ۱۳۵ جلد اول شماره تذکره ۲۸۰۲۴۰۹', 3, '2018-12-22', '2019-01-20', 'برج جدی ۱۳۹۷', 29, 6, 22, 23, 45, 405, 0, 1, '2019-01-24 19:19:34'),
(9, 'عبدالناصر ولد محمد اسلم', 'صفحه ۱۴ جلدمتفرقه ۶۴ شماره ۷۰ شماره تذکره ۱۵۸۵۲۰', 4, '2018-12-22', '2019-01-20', 'برج جدی ۱۳۹۷', 29, 5, 19, 23, 42, 378, 0, 1, '2019-01-24 19:19:34'),
(10, 'خیرمحمد خاطر', '۱۲۳۱۲۳۱۲۳', 6, '2018-12-22', '2019-01-20', 'برج جدی ۱۳۹۷', 10, 6, 22, 8, 30, 270, 0, 1, '2019-01-24 19:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(11) NOT NULL,
  `fname` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `nid` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tel` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `pnumber` int(11) NOT NULL,
  `indate` text COLLATE utf8_unicode_ci NOT NULL,
  `outdate` text COLLATE utf8_unicode_ci NOT NULL,
  `fromdate` text COLLATE utf8_unicode_ci,
  `todate` text COLLATE utf8_unicode_ci,
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
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `fname`, `nid`, `province`, `tel`, `email`, `pnumber`, `indate`, `outdate`, `fromdate`, `todate`, `status`, `appnum`, `days`, `p_perce`, `d_perce`, `t_perce`, `payment`, `timestamp`) VALUES
(1, 'بی بی حفیظه', 'صفحه ۱۳۸ جلد اول ۱۳۸۹ شماره ۶۸۶ شماره تدکره ۲۹۰۳۶۶', '  پنجشیر ولسوالی سفید چهر ', '۰۷۰۰۰۰۰۰۰', 'email@email.com', 3, '2018-08-11', '2019-08-10', '2018-12-22', '2019-01-20', 1, 1, 364, 7, 41, 48, 306, '2019-01-24 19:29:04'),
(2, 'عنایت الله', 'صفحه ۱۷۴ جلد ۴ شماره تذکره ۷۳۰۸۴۸', 'میدان ورک ولسوالی سیداباد', '۰۷۰۰۲۴۴۱۸۸', 'email@email.com', 7, '2018-08-28', '2019-01-24', '2018-12-22', '2019-01-20', 1, 2, 149, 17, 17, 34, 441, '2019-01-24 19:29:04'),
(3, 'رجب ولد جمعه خان', 'صفحه ۱۳۵ جلد اول شماره تذکره ۲۸۰۲۴۰۹', 'کندز ولسوالی خان اباد', '۰۷۸۰۷۲۱۵۶۵', 'email@email.com', 6, '2018-06-10', '2019-01-24', '2018-12-22', '2019-01-20', 1, 3, 228, 14, 26, 40, 405, '2019-01-24 19:29:04'),
(4, 'عبدالناصر ولد محمد اسلم', 'صفحه ۱۴ جلدمتفرقه ۶۴ شماره ۷۰ شماره تذکره ۱۵۸۵۲۰', 'بدخشان ولسوالی فیض اباد', '۰۷۹۹۲۷۷۵۸۲', 'email@email.com', 5, '2018-11-06', '2019-01-24', '2018-12-22', '2019-01-20', 1, 4, 79, 12, 9, 21, 378, '2019-01-24 19:29:04'),
(5, 'بی بی حسیبه ولد علیشا خان', 'صفحه۸۹۲ جلد ۱۷۸ شماره تذکره ۲۹۷۱۳۳۷۴', 'پنجشیر ولسوالی سفید چهر', '۰۷۰۰۰۰۰۰۰۰', 'email@email.com', 3, '2018-11-30', '2019-01-24', NULL, NULL, 0, 5, 55, 7, 6, 13, 0, '2019-01-24 16:33:33'),
(6, 'خیرمحمد خاطر', '۱۲۳۱۲۳۱۲۳', 'بدخشان ولسوالی درواز', '۰۷۲۸۹۹۰۱۰۱', 'email@email.com', 6, '2019-01-10', '2019-01-24', '2018-12-22', '2019-01-20', 1, 6, 14, 14, 2, 16, 270, '2019-01-24 19:29:04'),
(7, 'هدایت الله ظاهری', '۱۲۳۱۲۳۱۳۱۳۱۱', 'کابل', '۰۷۰۰۲۷۷۳۹۵', 'email@email.com', 8, '2019-01-21', '2019-01-24', '2018-12-22', '2019-01-20', 0, 15, 3, 19, 0, 19, 0, '2019-01-24 17:39:21'),
(8, 'حیات الله', '۱۰۳۰۰۱۴', 'کابل', '۰۷۳۰۶۰۸۸۸۸', 'hayatullah.ibrah@gmail.com', 4, '2019-01-30', '2019-01-24', NULL, NULL, 0, 14, -6, 10, -1, 9, 0, '2019-01-24 16:34:26');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

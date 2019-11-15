-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2019 at 05:52 PM
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
-- Database: `currencyconverter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_preferences`
--

CREATE TABLE `admin_preferences` (
  `id` tinyint(1) NOT NULL,
  `user_panel` tinyint(1) NOT NULL DEFAULT '0',
  `sidebar_form` tinyint(1) NOT NULL DEFAULT '0',
  `messages_menu` tinyint(1) NOT NULL DEFAULT '0',
  `notifications_menu` tinyint(1) NOT NULL DEFAULT '0',
  `tasks_menu` tinyint(1) NOT NULL DEFAULT '0',
  `user_menu` tinyint(1) NOT NULL DEFAULT '1',
  `ctrl_sidebar` tinyint(1) NOT NULL DEFAULT '0',
  `transition_page` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_preferences`
--

INSERT INTO `admin_preferences` (`id`, `user_panel`, `sidebar_form`, `messages_menu`, `notifications_menu`, `tasks_menu`, `user_menu`, `ctrl_sidebar`, `transition_page`) VALUES
(1, 0, 0, 0, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `currency_name` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `currency_name`, `created_at`, `updated_at`) VALUES
(1, 'USD', '2019-08-24 19:37:58', '0000-00-00 00:00:00'),
(2, 'BDT', '2019-08-24 19:37:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `exchanges`
--

CREATE TABLE `exchanges` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gateway_send` int(11) DEFAULT NULL,
  `send_account` varchar(255) NOT NULL,
  `gateway_receive` int(11) DEFAULT NULL,
  `gateway_account` varchar(255) NOT NULL,
  `amount_send` varchar(255) DEFAULT NULL,
  `amount_receive` varchar(255) DEFAULT NULL,
  `rate_from` varchar(255) DEFAULT NULL,
  `rate_to` varchar(255) DEFAULT NULL,
  `referral_id` varchar(255) NOT NULL DEFAULT '0',
  `note` text,
  `status` int(11) NOT NULL DEFAULT '0',
  `expired` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exchanges`
--

INSERT INTO `exchanges` (`id`, `user_id`, `gateway_send`, `send_account`, `gateway_receive`, `gateway_account`, `amount_send`, `amount_receive`, `rate_from`, `rate_to`, `referral_id`, `note`, `status`, `expired`, `created_at`, `updated_at`) VALUES
(18, 1, 26, 'qqqqqqqqqqqqqqqqqq', 58, '0178462232', '10', '820', '1', '82', '0', '', 0, 0, '2019-09-09 02:20:41', '2019-09-09 02:43:55'),
(3, 2, 54, '', 58, '01784622362', '10', '900', '1', '90', '0', NULL, 0, 0, '2019-09-06 03:20:59', '2019-09-06 03:20:59'),
(4, 2, 54, '', 58, '01784622362', '10', '900', '1', '90', '0', NULL, 0, 0, '2019-09-06 03:22:02', '2019-09-06 03:22:02'),
(5, 2, 54, '', 58, '121', '10', '900', '1', '90', '0', NULL, 0, 0, '2019-09-06 03:23:10', '2019-09-06 03:23:10'),
(6, 2, 54, '', 58, '01784622362', '10', '900', '1', '90', '0', NULL, 0, 0, '2019-09-06 03:24:10', '2019-09-06 03:24:10'),
(7, 2, 54, '', 58, '01784622362', '10', '900', '1', '90', '0', NULL, 0, 0, '2019-09-06 03:40:30', '2019-09-06 03:40:30'),
(8, 2, 54, '', 58, 'asa', '10', '900', '1', '90', '0', NULL, 0, 0, '2019-09-06 03:40:54', '2019-09-06 03:40:54'),
(9, 2, 54, '', 58, 'sdfsdf', '10', '900', '1', '90', '0', NULL, 0, 0, '2019-09-06 03:42:18', '2019-09-06 03:42:18'),
(10, 2, 54, '', 58, '01784622362', '10', '900', '1', '90', '0', NULL, 0, 0, '2019-09-06 03:44:38', '2019-09-06 03:44:38'),
(11, 2, 54, '', 58, 'asa', '10', '900', '1', '90', '0', NULL, 0, 0, '2019-09-06 03:45:46', '2019-09-06 03:45:46'),
(12, 2, 54, '', 58, 'adasd', '10', '900', '1', '90', '0', 'ddddddddddd', 2, 0, '2019-09-06 03:46:10', '2019-09-09 02:17:51'),
(13, 2, 54, '', 58, 'adas', '10', '900', '1', '90', '0', NULL, 2, 0, '2019-09-06 03:46:30', '2019-09-08 00:52:04'),
(14, 2, 54, '', 58, 'sdfsdf', '11', '990', '1', '90', '0', '', 1, 0, '2019-09-06 04:01:42', '2019-09-09 02:17:34'),
(15, 2, 54, 'sdf', 60, 'sdfsd', '11', '970.2', '1', '90', '0', '', 3, 0, '2019-09-06 04:02:21', '2019-09-09 02:43:34'),
(16, 2, 54, 'sdf', 58, 'sdfsd', '11', '990', '1', '90', '0', NULL, 1, 0, '2019-09-06 04:03:06', '2019-09-06 04:03:04'),
(17, 2, 54, 'sdfsdfsdf', 58, '01784622362', '10', '900', '1', '90', '0', NULL, 1, 0, '2019-09-06 04:12:16', '2019-09-06 04:12:02'),
(19, 1, 26, '', 58, 'sdfsdf', '10', '820', '1', '82', '0', NULL, 0, 0, '2019-09-09 02:44:16', '2019-09-09 02:44:16'),
(20, 1, 26, 'asdddddddddd', 58, '01257888', '10', '820', '1', '82', '0', NULL, 1, 0, '2019-09-24 00:44:39', '2019-09-24 00:44:45'),
(21, 7, 26, 'asdasd', 58, 'ad', '100', '8200', '1', '82', '0', NULL, 1, 0, '2019-09-24 00:45:57', '2019-09-24 00:45:59'),
(22, 1, 26, '1', 58, '41', '10', '820', '1', '82', '0', NULL, 1, 0, '2019-09-24 01:45:37', '2019-09-24 01:45:40'),
(23, 1, 26, 'sss', 58, '444', '100', '8200', '1', '82', '0', NULL, 1, 0, '2019-09-24 01:57:01', '2019-09-24 01:57:04'),
(24, 1, 26, 'sdf', 58, '232', '100', '8200', '1', '82', '0', NULL, 1, 0, '2019-09-24 01:58:08', '2019-09-24 01:58:10'),
(25, 1, 26, 'asd', 58, 'q232', '100', '8200', '1', '82', '0', NULL, 1, 0, '2019-09-24 01:59:19', '2019-09-24 01:59:21'),
(26, 1, 26, 'sdf', 58, '1212121212', '100', '8200', '1', '82', '0', NULL, 1, 0, '2019-09-24 02:00:14', '2019-09-24 02:00:17'),
(27, 1, 26, '7878', 58, '12121212', '112', '9184', '1', '82', '0', NULL, 1, 0, '2019-09-24 02:00:37', '2019-09-24 02:00:40'),
(28, 1, 57, '211111111', 54, '2', '10000', '98', '100', '1', '0', '', 3, 0, '2019-09-24 02:02:51', '2019-09-24 02:06:34'),
(29, 1, 57, '', 54, 'dsfsdf', '11100', '108.78', '100', '1', '0', NULL, 0, 0, '2019-09-26 13:17:15', '0000-00-00 00:00:00'),
(30, 1, 26, '54654', 57, '452', '10', '820', '1', '82', '0', NULL, 1, 0, '2019-09-26 13:19:36', '0000-00-00 00:00:00'),
(31, 1, 26, '2132', 58, '017846223625', '10', '820', '1', '82', '0', NULL, 1, 0, '2019-09-27 04:05:08', '0000-00-00 00:00:00'),
(32, 1, 26, '', 58, '232', '11', '902', '1', '82', '0', '', 2, 0, '2019-09-27 04:06:40', '0000-00-00 00:00:00'),
(33, 1, 26, '', 58, '465', '10', '820', '1', '82', '0', '', 2, 0, '2019-09-27 04:10:18', '0000-00-00 00:00:00'),
(34, 1, 26, '', 58, 'asdsa', '11', '902', '1', '82', '0', NULL, 0, 0, '2019-09-27 04:11:58', '0000-00-00 00:00:00'),
(35, 1, 54, '', 60, 'dsfsd', '11', '970.2', '1', '90', '0', NULL, 0, 0, '2019-09-27 04:12:54', '0000-00-00 00:00:00'),
(36, 1, 26, '', 58, 'sdf', '11', '902', '1', '82', '0', NULL, 0, 0, '2019-09-27 04:13:29', '0000-00-00 00:00:00'),
(37, 1, 26, '', 58, 'sdf', '10', '820', '1', '82', '0', NULL, 0, 0, '2019-09-27 04:16:11', '0000-00-00 00:00:00'),
(38, 1, 26, '', 58, 'sdf', '10', '820', '1', '82', '0', NULL, 0, 0, '2019-09-27 04:18:14', '0000-00-00 00:00:00'),
(39, 1, 26, '', 58, '1', '11', '902', '1', '82', '0', NULL, 0, 0, '2019-09-27 04:18:35', '0000-00-00 00:00:00'),
(40, 1, 26, '', 58, '1', '11', '902', '1', '82', '0', NULL, 0, 0, '2019-09-27 04:19:28', '0000-00-00 00:00:00'),
(41, 1, 26, '', 58, '1', '10', '820', '1', '82', '0', NULL, 0, 0, '2019-09-27 04:21:35', '0000-00-00 00:00:00'),
(42, 1, 26, '', 58, '12', '10', '820', '1', '82', '0', NULL, 0, 0, '2019-09-27 04:23:23', '0000-00-00 00:00:00'),
(43, 1, 26, '', 58, 'qwqw', '11', '902', '1', '82', '0', NULL, 0, 0, '2019-09-27 04:24:10', '0000-00-00 00:00:00'),
(44, 1, 26, '', 58, 'dfsdfsd', '11', '902', '1', '82', '0', NULL, 0, 0, '2019-09-27 04:24:32', '0000-00-00 00:00:00'),
(45, 1, 26, '', 58, 'sdf', '11', '902', '1', '82', '0', NULL, 0, 0, '2019-09-27 04:25:09', '0000-00-00 00:00:00'),
(46, 1, 26, '', 58, 'q1w', '10', '820', '1', '82', '0', NULL, 0, 0, '2019-09-27 04:25:41', '0000-00-00 00:00:00'),
(47, 1, 26, '', 58, 'wewew', '11', '902', '1', '82', '0', NULL, 0, 0, '2019-09-27 07:36:51', '0000-00-00 00:00:00'),
(48, 16, 60, '', 54, 'sdfsd', '10000', '100', '100', '1', '0', '', 1, 0, '2019-09-28 02:26:53', '0000-00-00 00:00:00'),
(49, 16, 60, '', 54, 'sdfsdf', '11088', '112', '99', '1', '0', NULL, 0, 0, '2019-09-28 02:27:29', '0000-00-00 00:00:00'),
(50, 16, 26, '', 58, 'sfds', '11', '902', '1', '82', '0', NULL, 1, 0, '2019-09-28 02:27:57', '0000-00-00 00:00:00'),
(51, 16, 26, '', 58, 'sfsd', '11', '902', '1', '82', '0', NULL, 0, 0, '2019-09-28 02:29:20', '0000-00-00 00:00:00'),
(52, 16, 26, '', 58, 'sdfsd', '111', '9102', '1', '82', '0', NULL, 0, 0, '2019-09-28 02:30:46', '0000-00-00 00:00:00'),
(53, 16, 26, '', 58, 'sdfds', '11', '902', '1', '82', '0', '', 1, 0, '2019-09-28 02:31:16', '0000-00-00 00:00:00'),
(54, 16, 26, '', 58, 'sdfsd', '111', '9102', '1', '82', '0', NULL, 0, 0, '2019-09-28 02:32:55', '0000-00-00 00:00:00'),
(55, 16, 26, '', 58, 'sdf', '11', '902', '1', '82', '0', '', 2, 0, '2019-09-28 02:33:12', '0000-00-00 00:00:00'),
(56, 16, 26, '', 58, 'sdf', '11', '902', '1', '82', '0', NULL, 0, 0, '2019-09-28 02:33:44', '0000-00-00 00:00:00'),
(57, 16, 26, 'sdf', 58, 'sdf', '100', '8200', '1', '82', '0', '', 2, 0, '2019-09-28 02:37:23', '0000-00-00 00:00:00'),
(58, 16, 54, 'sdf', 60, 'sdfsd', '100', '8820', '1', '90', '0', '', 0, 0, '2019-09-28 02:37:39', '0000-00-00 00:00:00'),
(59, 16, 60, 'sdf', 54, 'sdf', '10000', '100', '100', '1', '0', '', 2, 0, '2019-09-28 02:37:54', '0000-00-00 00:00:00'),
(60, 1, 26, '', 58, '2321', '11', '902', '1', '82', '0', NULL, 0, 0, '2019-10-01 12:44:08', '0000-00-00 00:00:00'),
(61, 1, 26, '', 58, '3223', '10', '820', '1', '82', '0', NULL, 0, 0, '2019-10-01 12:46:29', '0000-00-00 00:00:00'),
(62, 1, 26, '', 58, '12', '11', '902', '1', '82', '0', NULL, 0, 0, '2019-10-01 12:49:35', '0000-00-00 00:00:00'),
(63, 1, 26, '', 58, '1', '111', '9102', '1', '82', '0', NULL, 0, 0, '2019-10-01 12:50:13', '0000-00-00 00:00:00'),
(64, 1, 26, '', 58, 'aaaaaaaaa', '212', '17384', '1', '82', '0', NULL, 0, 0, '2019-10-08 11:02:26', '0000-00-00 00:00:00'),
(65, 1, 26, '', 58, 'aaaaaaaaa', '212', '17384', '1', '82', '0', NULL, 0, 0, '2019-10-08 11:02:29', '0000-00-00 00:00:00'),
(66, 1, 26, '', 58, 'aaaaaaaaa', '100', '8200', '1', '82', '0', NULL, 0, 0, '2019-10-08 13:27:13', '0000-00-00 00:00:00'),
(67, 1, 26, '', 60, 'aaaaaaaaa', '50', '3920', '1', '80', '0', NULL, 0, 0, '2019-10-08 13:49:06', '0000-00-00 00:00:00'),
(68, 1, 26, '', 58, 'aaaaaaaaa', '3', '246', '1', '82', '0', NULL, 0, 0, '2019-10-08 13:49:58', '0000-00-00 00:00:00'),
(69, 1, 26, '', 60, 'aaaaaaaaa', '11', '862.4', '1', '80', '0', NULL, 0, 0, '2019-10-08 13:53:10', '0000-00-00 00:00:00'),
(70, 1, 26, '', 60, 'aaaaaaaaa', '3', '235.2', '1', '80', '0', NULL, 0, 0, '2019-10-08 13:53:49', '0000-00-00 00:00:00'),
(71, 1, 26, '', 60, 'aaaaaaaaa', '3', '235.2', '1', '80', '0', NULL, 0, 0, '2019-10-08 13:54:51', '0000-00-00 00:00:00'),
(72, 1, 26, '123123', 60, 'aaaaaaaaa', '5', '392', '1', '80', '0', NULL, 1, 0, '2019-10-08 13:58:40', '0000-00-00 00:00:00'),
(73, 1, 26, 'q2132', 57, 'aaaaaaaaa', '6.1', '500', '1', '82', '0', NULL, 1, 0, '2019-10-08 14:00:13', '0000-00-00 00:00:00'),
(74, 1, NULL, '', NULL, 'aaaaaaaaa', '0', '0', '0', '0', '0', NULL, 0, 0, '2019-10-08 14:08:43', '0000-00-00 00:00:00'),
(75, 1, NULL, '', NULL, 'aaaaaaaaa', '0', '0', '0', '0', '0', NULL, 0, 0, '2019-10-08 14:08:44', '0000-00-00 00:00:00'),
(76, 1, NULL, '', NULL, 'aaaaaaaaa', '0', '0', '0', '0', '0', NULL, 0, 0, '2019-10-08 14:08:48', '0000-00-00 00:00:00'),
(77, 1, NULL, '', NULL, 'aaaaaaaaa', '0', '0', '0', '0', '0', NULL, 0, 0, '2019-10-08 14:08:49', '0000-00-00 00:00:00'),
(78, 1, 26, '213', 57, 'aaaaaaaaa', '1', '82', '1', '82', '0', NULL, 1, 0, '2019-10-08 14:13:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `faqandtutorial`
--

CREATE TABLE `faqandtutorial` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf32 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqandtutorial`
--

INSERT INTO `faqandtutorial` (`id`, `title`, `content`, `status`) VALUES
(3, 'sdf', 'sdf', 1),
(6, 'dsfffff', 'sdf', 1),
(7, 'Usdbuysell.Com কী?', 'অনলাইনভিত্তিক ডলার ক্রয়-বিক্রয়ের বিশ্বস্ত প্লাটফর্মগুলির অন্যতম। সাধ্যানুযায়ী গ্রাহকবান্ধব সেবা প্রদান করাই আমাদের লক্ষ্য।', 2);

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `currency` int(10) DEFAULT NULL,
  `reserve` double DEFAULT NULL,
  `min_amount` double DEFAULT NULL,
  `min_received` double DEFAULT NULL,
  `max_amount` double DEFAULT NULL,
  `extra_fee` double DEFAULT NULL,
  `fee` double DEFAULT NULL,
  `allow_send` tinyint(1) DEFAULT NULL,
  `allow_receive` int(11) DEFAULT NULL,
  `buy_price` int(11) NOT NULL,
  `sales_price` int(11) NOT NULL,
  `account` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `external_icon` text,
  `t_message` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `name`, `currency`, `reserve`, `min_amount`, `min_received`, `max_amount`, `extra_fee`, `fee`, `allow_send`, `allow_receive`, `buy_price`, `sales_price`, `account`, `status`, `external_icon`, `t_message`) VALUES
(59, 'Rocket Agent', 2, 10000, 100, 1, 50000, 0, 50, 0, 0, 0, 0, '017491366136', 1, 'assets/temp/img/gicon/allinco_023.png', 'qqqqqssssssssss'),
(26, 'Perfect Money', 1, 11111111755.1, 1, 100, 500, 0, 50, 1, 1, 93, 100, 'U15541467', 1, 'assets/temp/img/gicon/allinco_15.png', 'aaaaaaaaaaaaaaaaaaa'),
(57, 'Rocket Personal', 2, 26447.5, 1, 100, 15000, 2, 50, 1, 1, 1, 1, '017896870408', 1, 'assets/temp/img/gicon/allinco_021.png', ''),
(54, 'Skrill', 1, -473, 5, 100, 500, 0, 50, 1, 1, 0, 0, 'realearn0@gmail.com', 1, 'assets/temp/img/gicon/allinco_161.png', ''),
(60, 'Bkash Agent', 2, 10788, 1, 100, 50000, 2, 50, 1, 1, 0, 0, '01775283657', 1, 'assets/temp/img/gicon/allinco_022.png', ''),
(58, 'Bkash Personal', 2, -34604, 1, 100, 15000, 2, 50, 1, 1, 0, 0, '01749080744', 1, 'assets/temp/img/gicon/allinco_02.png', ''),
(46, 'Neteller', 1, 290, 5, 5, 500, 1, 50, 1, 1, 2, 12, 'aaziz6092@gmail.com', 1, 'assets/temp/img/gicon/allinco_061.png', 'ssss'),
(44, 'Payza', 1, 200, 1, 10, 100, 0, 50, 1, 1, 1, 1, 'ybintehashim@gmail.com', 1, 'assets/temp/img/gicon/allinco_032.png', 'dddddddddddddddddddddddd'),
(101, 'Online Payment', 1, 100, 5, 100, 200, 0, 50, 0, 1, 100, 120, 'এখানে বসান।', 1, 'assets/temp/img/gicon/allinco_04.png', ''),
(80, 'WebMoney', 1, 206.1, 5, 100, 500, 0, 50, 1, 1, 0, 0, 'Z551391230850', 1, 'assets/temp/img/gicon/allinco_031.png', ''),
(72, 'DBBL', 2, 20000, 500, 100, 100000, 0, 50, 1, 1, 0, 0, 'Name: Muhammad Ismail, Account No: 2011510127811, Branch: Amborkhana', 1, 'assets/temp/img/gicon/allinco_091.png', ''),
(86, 'Facebook Ads', 1, 100, 10, 100, 500, 0, 50, 1, 1, 0, 0, 'for Ads information, call us now: 01749080744', 1, 'assets/temp/img/gicon/allinco_03.png', ''),
(89, 'Payeer', 1, 279.35, 5, 100, 500, 0, 50, 1, 1, 0, 0, 'P1005053595', 1, 'assets/temp/img/gicon/allinco_06.png', 'dddddddddddddddddddddddddddd'),
(98, 'Mobile Recharge', 2, 500, 10, 100, 500, 0, 50, 0, 1, 12, 212, 'আমাদের মোবাইল রিচার্জের দরকার নেই :p', 1, 'assets/temp/img/gicon/allinco_16.png', 'dddddddddd'),
(93, 'Google Ads', 1, 100, 10, 100, 500, 0, 50, 0, 1, 0, 0, 'Please enter here your Ad information, (example: Name, Link, tag etc). for more information & help call us now: 01749080744', 1, 'assets/temp/img/gicon/allinco_13.png', ''),
(106, 'Nagad Agent', 2, 300, 100, 100, 100000, 0, 50, 0, 1, 100, 10, '01749136613', 1, 'assets/temp/img/gicon/allinco_1511.png', ''),
(107, 'Nagad Personal', 1, 300, 100, 100, 100000, 0, 50, 0, 1, 1, 88, '01749080744', 1, 'assets/temp/img/gicon/allinco_151.png', 'sssssss');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `bgcolor` char(7) NOT NULL DEFAULT '#607D8B'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `bgcolor`) VALUES
(1, 'admin', 'Administrator', '#F44336'),
(2, 'members', 'General User', '#2196F3');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '127.0.0.1', 'md.jual.ah@gmail.com', 1572664783),
(2, '127.0.0.1', 'md.jual.ah@gmail.com', 1572664784);

-- --------------------------------------------------------

--
-- Table structure for table `public_preferences`
--

CREATE TABLE `public_preferences` (
  `id` int(1) NOT NULL,
  `transition_page` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `public_preferences`
--

INSERT INTO `public_preferences` (`id`, `transition_page`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `gateway_from` int(11) DEFAULT NULL,
  `gateway_to` int(11) DEFAULT NULL,
  `rate_from` varchar(255) DEFAULT NULL,
  `rate_to` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `gateway_from`, `gateway_to`, `rate_from`, `rate_to`) VALUES
(246, 59, 101, '100', '1'),
(247, 57, 101, '100', '1'),
(149, 60, 54, '100', '1'),
(148, 59, 54, '100', '1'),
(147, 60, 46, '100', '1'),
(146, 59, 46, '100', '1'),
(145, 60, 44, '80', '1'),
(144, 59, 44, '80', '1'),
(143, 60, 26, '93', '1'),
(142, 59, 26, '93', '1'),
(248, 72, 101, '100', '1'),
(249, 26, 98, '1', '75'),
(134, 46, 57, '1', '90'),
(135, 46, 58, '1', '90'),
(136, 54, 57, '1', '90'),
(137, 54, 58, '1', '90'),
(250, 46, 98, '1', '90'),
(133, 44, 58, '1', '65'),
(132, 44, 57, '1', '65'),
(129, 26, 57, '1', '82'),
(130, 26, 58, '1', '82'),
(285, 54, 106, '1', '90'),
(286, 46, 106, '1', '90'),
(284, 54, 59, '1', '90'),
(283, 54, 60, '1', '90'),
(282, 46, 60, '1', '90'),
(281, 46, 59, '1', '90'),
(280, 57, 86, '100', '1'),
(279, 107, 101, '100', '1'),
(278, 107, 93, '100', '1'),
(268, 106, 93, '100', '1'),
(269, 106, 101, '100', '1'),
(270, 58, 101, '100', '1'),
(271, 107, 46, '100', '1'),
(272, 107, 54, '100', '1'),
(273, 107, 26, '93', '1'),
(274, 107, 44, '80', '1'),
(275, 107, 80, '90', '1'),
(276, 107, 86, '100', '1'),
(277, 107, 89, '95', '1'),
(267, 106, 86, '100', '1'),
(184, 72, 46, '100', '1'),
(185, 46, 72, '1', '90'),
(186, 72, 26, '93', '1'),
(187, 26, 72, '1', '82'),
(188, 72, 54, '100', '1'),
(189, 54, 72, '1', '90'),
(266, 106, 89, '95', '1'),
(265, 89, 107, '1', '80'),
(264, 106, 80, '90', '1'),
(263, 80, 107, '1', '80'),
(262, 106, 54, '100', '1'),
(195, 80, 58, '1', '80'),
(196, 80, 72, '1', '80'),
(197, 59, 80, '90', '1'),
(198, 60, 80, '90', '1'),
(199, 72, 80, '90', '1'),
(200, 58, 26, '93', '1'),
(201, 58, 44, '80', '1'),
(202, 58, 46, '100', '1'),
(203, 58, 54, '100', '1'),
(245, 60, 101, '100', '1'),
(244, 80, 57, '1', '80'),
(257, 106, 26, '93', '1'),
(256, 72, 98, '1', '1'),
(255, 60, 98, '1', '1'),
(254, 59, 98, '1', '1'),
(253, 89, 98, '1', '75'),
(252, 80, 98, '1', '75'),
(251, 54, 98, '1', '90'),
(214, 58, 80, '90', '1'),
(261, 54, 107, '1', '90'),
(260, 106, 46, '104', '1'),
(243, 57, 93, '100', '1'),
(242, 72, 93, '100', '1'),
(241, 59, 93, '100', '1'),
(240, 60, 93, '100', '1'),
(221, 58, 86, '100', '1'),
(222, 59, 86, '100', '1'),
(223, 60, 86, '100', '1'),
(224, 72, 86, '100', '1'),
(225, 60, 89, '95', '1'),
(226, 59, 89, '95', '1'),
(227, 72, 89, '95', '1'),
(228, 57, 46, '100', '1'),
(259, 46, 107, '1', '90'),
(258, 26, 107, '1', '82'),
(231, 57, 26, '93', '1'),
(232, 57, 80, '90', '1'),
(233, 57, 89, '95', '1'),
(234, 89, 57, '1', '80'),
(235, 89, 58, '1', '80'),
(236, 89, 72, '1', '80'),
(237, 57, 54, '100', '1'),
(238, 58, 89, '95', '1'),
(288, 26, 46, '1', '1'),
(289, 26, 60, '1', '80'),
(290, 57, 57, '121', '.4');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `data` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `data`) VALUES
(1, '{\"name\":\"currencyconverter\",\"notice\":\"NOTE:Your Registered email and number must be verified then your account automatically actavited and you can set up the exchange, you do not have to pay the transfer fee if you buy above $20 \",\"start_time\":\"10.30\",\"end_time\":\"11.30\",\"is_online\":\"1\",\"siteabout\":\"Amaderhelp Is An Online Best Exchange Platform. Easy And Fast E-Currency Exchange.\",\"supportemail\":\"md.jual.ah@gmail.com\",\"skype\":\"jualahmed\",\"facebook\":\"https:\\/\\/www.facebook.com\\/md.jual.ah\",\"linkedin\":\"linkedin\",\"twtter\":\"twtter\",\"youtube\":\"youtube\",\"contactnumber\":\"01784622362\",\"exchangemessage\":\"this is a test messages \",\"importentmessage\":\"importent message\"}'),
(2, '                                                      <p>                                                                                    </p><div><p class=\"text-primary py-2\">Complete: Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution</p><p class=\"text-danger py-2\">Wating: Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution</p><p class=\"text-secondary\">Wating: Ready to go Beyond? Start today with our free</p><p class=\"text-info\">Wating: Ready to go Beyond? Start today with our free</p><p class=\"text-primary py-2\">Complete: Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution</p><p class=\"text-danger py-2\">Wating: Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution</p><p class=\"text-secondary\">Wating: Ready to go Beyond? Start today with our free</p><p class=\"text-info\">Wating: Ready to go Beyond? Start today with our free</p><p class=\"text-primary py-2\">Complete: Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution</p><p class=\"text-danger py-2\">Wating: Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution</p><p class=\"text-secondary\">Wating: Ready to go Beyond? Start today with our free</p><p class=\"text-info\">Wating: Ready to go Beyond? Start today with our free</p><p class=\"text-primary py-2\">Complete: Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution</p><p class=\"text-danger py-2\">Wating: Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution</p><p class=\"text-secondary\">Wating: Ready to go Beyond? Start today with our free</p><p class=\"text-info\">Wating: Ready to go Beyond? Start today with our free</p></div>                                                                           <p></p>                                                  '),
(3, '                                                                                                            <p>আমাদের মধ্যে অনেকেই অনলাইনে ছোট-খাটো কাজ করেন ও&nbsp;</p><p><strong>অল্প পরিমাণ ডলার ইনকাম করেন। আবার অনেক সময় ডোমেইন/হোস্টিং বা অন্য কোনো</strong></p><p>&nbsp;পণ্য পারচেস করার জন্য কারো কারো সামান্য পরিমান ডলারের প্রয়োজন হয়। সেক্ষেত্রে এতো অল্প পরিমাণ ডলার কোনো ব্যাংক বা আর্থিক প্রতিষ্�ানের কাছে বিক্রি করতে পারেন না এবং নিজেদের প্রয়োজন মতো ডলার ব্যাংকের মাধ্যমে কিনতেও পারেন না। তাই ফেসবুকসহ বিভিন্ন সোশ্যাল মিডিয়াতে যোগাযোগ করে কারো কাছ থেকে ডলার কিনতে গিয়ে এবং ইনকাম করা ডলার কারো কাছে বিক্রি করতে গিয়ে প্রায়ই প্রতারণার শিকার হতে হয়। তাদের কথা চিন্তা করেই আমাদের এ প্রয়াস। এখানে ক্রয়-বিক্রয়ের রেট একটু কম/বেশি হলেও আপনারা সম্পূর্ণ নিশ্চিন্তে ক্রয়-বিক্রয় করতে পারবেন। আশা করি আপনারা পাশে থাকবেন এবং প্রয়োজনীয় পরামর্শ দিয়ে আমাদের সাহায্য করবেন। বিশেষ দ্রষ্টব্যঃ আমাদের সেবা গ্রহণ করে অনলাইন জুয়া, অর্থ পাচার (মানি লন্ডারিং), সন্ত্রাসী কর্মকাণ্ড বা এজাতীয় যেকোনো অপরাধজনিত কাজ করা সম্পূর্ণভাবে নিষিদ্ধ। অপরাধের জন্য এ সার্ভিস ব্যবহার করলে USD Buy Sellকর্তৃপক্ষ কোনোভাবেই দায়ী থাকবে না।</p>                                                                                                    '),
(4, '<p>আমাদের মধ্যে অনেকেই অনলাইনে ছোট-খাটো কাজ করেন ও অল্প পরিমাণ ডলার ইনকাম করেন। আবার অনেক সময় ডোমেইন/হোস্টিং বা অন্য কোনো পণ্য পারচেস করার জন্য কারো কারো সামান্য পরিমান ডলারের প্রয়োজন হয়। সেক্ষেত্রে এতো অল্প পরিমাণ ডলার কোনো ব্যাংক বা আর্থিক প্রতিষ্�ানের কাছে বিক্রি করতে পারেন না এবং নিজেদের প্রয়োজন মতো ডলার ব্যাংকের মাধ্যমে কিনতেও পারেন না। তাই ফেসবুকসহ বিভিন্ন সোশ্যাল মিডিয়াতে যোগাযোগ করে কারো কাছ থেকে ডলার কিনতে গিয়ে এবং ইনকাম করা ডলার কারো কাছে বিক্রি করতে গিয়ে প্রায়ই প্রতারণার শিকার হতে হয়। তাদের কথা চিন্তা করেই আমাদের এ প্রয়াস। এখানে ক্রয়-বিক্রয়ের রেট একটু কম/বেশি হলেও আপনারা সম্পূর্ণ নিশ্চিন্তে ক্রয়-বিক্রয় করতে পারবেন। আশা করি আপনারা পাশে থাকবেন এবং প্রয়োজনীয় পরামর্শ দিয়ে আমাদের সাহায্য করবেন। বিশেষ দ্রষ্টব্যঃ আমাদের সেবা গ্রহণ করে অনলাইন জুয়া, অর্থ পাচার (মানি লন্ডারিং), সন্ত্রাসী কর্মকাণ্ড বা এজাতীয় যেকোনো অপরাধজনিত কাজ করা সম্পূর্ণভাবে নিষিদ্ধ। অপরাধের জন্য এ সার্ভিস ব্যবহার করলে USD Buy Sellকর্তৃপক্ষ কোনোভাবেই দায়ী থাকবে না।</p>');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `exchange_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_id`, `type`, `exchange_id`, `status`, `date`, `content`) VALUES
(3, 2, 3, 0, 0, '2019-09-12 02:22:16', 'sdfsdf'),
(4, 2, 1, 0, 0, '2019-09-12 02:22:57', 'sdfdfdfdfdfdfdf'),
(5, 2, 2, 0, 0, '2019-09-12 13:00:01', 'one more Testimonial'),
(6, 2, 1, 0, 0, '2019-09-12 13:00:07', 'One More Testimonial'),
(7, 7, 1, 0, 0, '2019-09-24 00:46:48', 'sdddddddddddddddddd'),
(8, 15, 1, 0, 0, '2019-09-27 00:12:12', 'dsfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `star_lavel` int(11) NOT NULL,
  `exchange_id` int(11) NOT NULL,
  `content` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `id` int(11) NOT NULL,
  `question` text CHARACTER SET utf8 NOT NULL,
  `answer` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `document_verified` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified` tinyint(1) NOT NULL,
  `phone_verified` tinyint(1) NOT NULL,
  `final_verified` tinyint(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `profile` text NOT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `document_1` text NOT NULL,
  `document_2` text NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `address`, `username`, `document_verified`, `email_verified`, `phone_verified`, `final_verified`, `password`, `salt`, `email`, `profile`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `active`, `first_name`, `last_name`, `company`, `phone`, `document_1`, `document_2`, `last_login`, `created_on`) VALUES
(1, '127.0.0.1', '', 'administrator', 0, 0, 0, 0, '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', '200ceb26807d6bf99fd6f4f0d1ca54d4', NULL, NULL, NULL, 1, 'Admin', 'istrator sadddddfffffff', 'ADMIN', '017846223000', '26231432_212902312605132_360853822587639721_n4.jpg', '26231432_212902312605132_360853822587639721_n4.jpg', 1572713355, 1268889823),
(2, '::1', '', 'jual ahmed', 1, 1, 1, 1, '$2y$08$qw8NkLuT4N//cjC2BSjpFOEcW8iC1j/RhJKCL9VJ07h3B3um.fYLm', NULL, 'md.jual.ah@gmail.com', '', '3487ea3999953536be770eae2e5c6e07', NULL, NULL, NULL, 1, 'jualaaaaaaaaaaaaaa', 'ahmed', 'no', '01784622362', '', '', 1569510651, 1567473347),
(3, '::1', '', 'jual ahmed', 0, 0, 0, 0, '$2y$08$XfeuXFeZpJFveOcCHuXxrOxfMyqIxJbolmM.pT.EclDSJVUV4rMWu', NULL, 'md.jual.ah1@gmail.com', '', NULL, 'UwtaNDdlWEZOv5mNXgj8.ua9ce009554282a90f0', 1569508583, NULL, 1, 'jual', 'ahmed', NULL, '01784622362', '', '', NULL, 1567560748),
(4, '::1', '', 'ahmed ahme', 1, 1, 1, 1, '$2y$08$9U4ZQt6itCI9vmJXuddoZ.8Vtqkxu2dOfYM.4Jh2LxiQi2dyWgTXK', NULL, 'md.jual.ah121@gmail.com', '', NULL, NULL, NULL, NULL, 1, 'ahmed', 'AHME', '', '01784622362', '', '', NULL, 1567560812),
(5, '::1', '', 'ahmed ahme', 0, 0, 0, 0, '$2y$08$JHMG52oKLlushTcsLlAhpOCYZ2HJrxoUFYxTRfpjkiptyt8BM7R2S', NULL, 'md.jual.ah121aaa@gmail.com', '', NULL, NULL, NULL, NULL, 1, 'ahmed', 'AHME', NULL, '0178465', '', '', NULL, 1567560884),
(6, '::1', '', 'ahmed jualhsdf', 0, 0, 0, 0, '$2y$08$YB1DB.rHb0j3UVScE0.7/uxQe./eET.QitsaM/4YK9XCtzxWfpIQ6', NULL, 'mdafdf@gmail.com', '', NULL, NULL, NULL, NULL, 1, 'ahmed', 'jualhsdf', '', '017846223621', '', '', 1567561077, 1567561077),
(7, '::1', '', 'atest sdfsdf', 1, 1, 1, 1, '$2y$08$nTL4MTtmLrZOhuIstYJKX.34OHlkHnMGtM/xE6nPEnOmIBiJfVW4m', NULL, 'newtest@gmail.com', '', NULL, NULL, NULL, NULL, 1, 'atest', 'sdfsdf', 'asa', '01784622326', '', '', 1569285946, 1569285946),
(8, '::1', '', 'sdf sdfsdf', 0, 0, 0, 0, '$2y$08$pj0euaSz.Xda3Xh8UvXet.oKivjJ4nwsPQf23FPos4ZnurABK5EMC', NULL, 'admin@sdfd.com', '', NULL, NULL, NULL, NULL, 1, 'sdf', 'sdfsdf', NULL, 'qqqq', '', '', 1569462437, 1569462437),
(9, '::1', '', 'sdfsdf sdfdsfds', 0, 0, 0, 0, '$2y$08$OTTsez.60jEe/yJBkYNYfeD0jJqvLGHog/OG5JzJY.ca7kMNRxJ.S', NULL, 'dsfsdf@gmail.com', '', NULL, NULL, NULL, NULL, 1, 'sdfsdf', 'sdfdsfds', NULL, '017846', '', '', 1569507102, 1569507102),
(10, '::1', '', 'df sdf', 0, 0, 0, 0, '$2y$08$6cu1o3Eu8ImumlT3HYgTgelpJrQc13yyQJZU5wPD1cof.51jVynSS', NULL, 'sdfsdf@gamil.com', '', NULL, NULL, NULL, NULL, 1, 'df', 'sdf', NULL, '874797', '', '', 1569507150, 1569507150),
(11, '::1', '', 'sdfsdf sdfsdf', 0, 0, 0, 0, '$2y$08$CxB5b8vbIaX//duB26aqQuIAj5fUj7yh5vj8KIabXrySTrB.uB5hO', NULL, 'sdfsdfdsf@gamil.com', '', NULL, NULL, NULL, NULL, 1, 'sdfsdf', 'sdfsdf', NULL, '57464', '', '', 1569507243, 1569507243),
(12, '::1', '', 'admindddddddd', 0, 0, 0, 0, '$2y$08$7hh6fm.lrwAe9dRsxdJTIeavIJYw3oFFrchb7pV.zE2C3s1.mMtGO', NULL, 'sdfsdfdf', '', NULL, NULL, NULL, NULL, 1, 'sdfdsf', 'sdfsdf', NULL, 'dsfdsf', '', '', 1569507343, 1569507343),
(13, '::1', '', 'adminsdfsd', 0, 0, 0, 1, '$2y$08$HaBbZ.R4DRpWhrZLVCxxb.d9JtSonIUtdyyKB4bSFdQsJhW.9HxyK', NULL, 'dsfsdfds@gmail.com', '', NULL, NULL, NULL, NULL, 1, 'sdsfsd', 'fdsfsd', '', '01784622362', '', '', 1569511704, 1569511704),
(14, '::1', '', 'dsffsdfsdfsdf', 0, 0, 0, 0, '$2y$08$xGgfOjZNhTZHgm9ksmTSTe/dCWVBoekjeghX6rxf67D85CEHQXRNm', NULL, 'adminwqeqw@gmail.com', '', NULL, NULL, NULL, NULL, 1, 'dsffsdf', 'sdfsdf', NULL, '854654', '', '', 1569542965, 1569542964),
(15, '::1', '', 'sdfsdfsdfsdf', 0, 0, 0, 0, '$2y$08$l8dgBVj/.IlX1vnc3GER9e5U.52tue9jvpaVA/8Yvy.jeZpV1f02.', NULL, 'adminsdfsdf@gmail.com', '', NULL, NULL, NULL, NULL, 1, 'sdfsdf', 'sdfsdf', NULL, '4788', '', '', 1569543081, 1569543080),
(16, '::1', '', 'sdfsdfsdfsdf', 1, 1, 1, 1, '$2y$08$rcwAGKNMUhTo8rgdVjk8GeqAZLZ4IVNn37OhqbvsRbLy/mMwJBhCq', NULL, 'adminsdfsdf@gamil.com', '', NULL, NULL, NULL, NULL, 1, 'sdfsdf', 'sdfsdf', '', '01784622362', '', '', 1569637595, 1569637595),
(17, '::1', 'sdfsdf', 'jualahmed', 0, 0, 0, 0, '$2y$08$0oRMDD4fEoK3LvakESdg6..5dYKw0dpXu1P2eqVF04dEjqtzcAwAe', NULL, 'jualahmed@gmail.com', '', NULL, NULL, NULL, NULL, 1, 'jual', 'ahmed', NULL, '017846235', '', '', 1570408831, 1570408831),
(18, '::1', 'md.jual.ah@gmail.com', 'jualahmed1', 0, 0, 0, 0, '$2y$08$NTrztBX96pKHPGpoTzKyXebWaMcCnKwsoVvIpqwConNqr9VmkF9A.', NULL, 'md.jual.ah11@gmail.com', '', NULL, NULL, NULL, NULL, 1, 'jual', 'ahmed', '', '01784622362', '', '', 1570544160, 1570543660);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(126, 1, 1),
(130, 2, 2),
(3, 3, 2),
(111, 4, 2),
(5, 5, 2),
(96, 6, 2),
(93, 7, 2),
(83, 8, 2),
(84, 9, 2),
(85, 10, 2),
(86, 11, 2),
(87, 12, 2),
(97, 13, 2),
(89, 14, 2),
(90, 15, 2),
(99, 16, 2),
(131, 17, 2),
(133, 18, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_preferences`
--
ALTER TABLE `admin_preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `exchanges`
--
ALTER TABLE `exchanges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqandtutorial`
--
ALTER TABLE `faqandtutorial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_preferences`
--
ALTER TABLE `public_preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_preferences`
--
ALTER TABLE `admin_preferences`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exchanges`
--
ALTER TABLE `exchanges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `faqandtutorial`
--
ALTER TABLE `faqandtutorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `public_preferences`
--
ALTER TABLE `public_preferences`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

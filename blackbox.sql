-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2017 at 02:09 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blackbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `log_id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'logged_in',
  `activity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`log_id`, `username`, `activity`, `status`, `activity_date`) VALUES
(1, 'administrator', 'Logged In', 'logged_in', '2016-09-17 14:38:35'),
(2, 'administrator', 'Logged In', 'logged_in', '2016-09-17 14:41:15'),
(4, 'administrator', 'Logged In', 'logged_in', '2016-09-17 14:42:02'),
(5, 'administrator', 'Logged In', 'logged_in', '2016-09-17 14:42:11'),
(6, 'administrator', 'Logged In', 'logged_in', '2016-09-17 14:42:23'),
(7, 'administrator', 'Logged In', 'logged_in', '2016-09-17 14:42:32'),
(8, 'administrator', 'Logged In', 'logged_in', '2016-09-17 14:42:41'),
(10, 'administrator', 'Logged In', 'logged_in', '2016-09-17 15:24:00'),
(11, 'administrator', 'Logged In', 'logged_in', '2016-09-17 15:24:10'),
(12, 'administrator', 'Logged In', 'logged_in', '2016-09-17 15:24:18'),
(13, 'administrator', 'Logged In', 'logged_in', '2016-09-17 15:24:26'),
(14, 'administrator', 'Logged In', 'logged_in', '2016-09-17 15:24:34'),
(15, 'administrator', 'Logged In', 'logged_in', '2016-09-17 15:24:42'),
(16, 'administrator', 'Logged In', 'logged_in', '2016-09-17 16:07:50'),
(17, 'administrator', 'Logged In', 'logged_in', '2016-09-17 16:10:34'),
(18, 'administrator', 'Logged In', 'logged_in', '2016-09-17 16:12:10'),
(20, 'administrator', 'Logged In', 'logged_in', '2016-09-17 23:56:04'),
(21, 'administrator', 'Logged In', 'logged_in', '2016-09-18 00:03:10'),
(22, 'administrator', 'Logged In', 'logged_in', '2016-09-18 00:06:11'),
(23, 'administrator', 'Logged In', 'logged_in', '2016-09-18 00:07:58'),
(25, 'administrator', 'Logged In', 'logged_in', '2016-09-18 00:10:58'),
(26, 'administrator', 'Logged In', 'logged_in', '2016-09-18 00:11:17'),
(28, 'administrator', 'Logged In', 'logged_in', '2016-09-24 07:15:08'),
(29, 'administrator', 'Logged In', 'logged_in', '2016-09-25 00:49:09'),
(30, 'administrator', 'Logged In', 'logged_in', '2016-09-25 02:39:39'),
(31, 'administrator', 'Logged In', 'logged_in', '2016-09-25 02:39:57'),
(32, 'administrator', 'Logged In', 'logged_in', '2016-09-25 02:40:11'),
(33, 'administrator', 'Logged In', 'logged_in', '2016-09-25 05:15:03'),
(34, 'administrator', 'Logged In', 'logged_in', '2016-09-25 06:00:58'),
(35, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:12:39'),
(36, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:13:06'),
(37, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:13:10'),
(38, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:13:22'),
(39, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:13:46'),
(40, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:13:58'),
(41, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:14:04'),
(42, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:14:09'),
(44, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:14:50'),
(45, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:14:54'),
(46, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:15:32'),
(47, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:15:52'),
(48, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:16:11'),
(49, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:16:28'),
(50, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:16:49'),
(51, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:16:54'),
(52, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:17:12'),
(53, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:17:23'),
(54, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:17:32'),
(55, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:17:54'),
(56, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:18:01'),
(57, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:18:29'),
(59, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:19:22'),
(60, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:19:41'),
(61, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:19:46'),
(62, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:19:59'),
(63, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:20:23'),
(64, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:20:31'),
(65, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:20:43'),
(66, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:20:59'),
(68, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:21:35'),
(70, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:22:03'),
(71, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:22:19'),
(72, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:22:30'),
(73, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:22:47'),
(74, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:22:59'),
(75, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:23:14'),
(76, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:23:25'),
(77, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:23:41'),
(78, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:23:53'),
(79, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:24:04'),
(80, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:24:22'),
(81, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:24:35'),
(82, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:25:03'),
(83, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:25:12'),
(84, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:25:35'),
(85, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:25:50'),
(87, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:28:41'),
(89, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:29:15'),
(90, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:29:35'),
(91, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:30:13'),
(92, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:32:04'),
(93, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:32:46'),
(94, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:33:14'),
(96, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:34:11'),
(97, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:34:36'),
(98, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:36:15'),
(99, 'administrator', 'Logged In', 'logged_in', '2016-09-25 07:37:57'),
(100, 'administrator', 'Logged In', 'logged_in', '2016-09-25 08:19:43'),
(101, 'administrator', 'Logged In', 'logged_in', '2016-09-25 08:20:19'),
(102, 'administrator', 'Logged In', 'logged_in', '2016-09-25 08:20:33'),
(104, 'administrator', 'Logged In', 'logged_in', '2016-09-26 07:01:33'),
(105, 'administrator', 'Logged In', 'logged_in', '2016-09-26 08:29:42'),
(106, 'administrator', 'Logged In', 'logged_in', '2016-09-26 12:40:19'),
(107, 'administrator', 'Logged In', 'logged_in', '2016-09-27 00:00:10'),
(108, 'administrator', 'Logged In', 'logged_in', '2016-09-27 00:01:15'),
(109, 'administrator', 'Logged In', 'logged_in', '2016-09-27 00:01:42'),
(110, 'administrator', 'Logged In', 'logged_in', '2016-09-27 00:02:06'),
(111, 'administrator', 'Logged In', 'logged_in', '2016-09-27 00:02:31'),
(112, 'administrator', 'Logged In', 'logged_in', '2016-09-27 00:02:39'),
(114, 'administrator', 'Logged In', 'logged_in', '2016-09-27 00:05:08'),
(115, 'administrator', 'Logged In', 'logged_in', '2016-09-27 00:05:27'),
(116, 'administrator', 'Logged In', 'logged_in', '2016-09-27 00:05:56'),
(117, 'administrator', 'Logged In', 'logged_in', '2016-09-27 00:06:30'),
(118, 'administrator', 'Logged In', 'logged_in', '2016-09-27 00:06:39'),
(122, 'administrator', 'Logged In', 'logged_in', '2016-09-27 00:08:42'),
(140, 'administrator', 'Logged In', 'logged_in', '2016-09-27 00:16:13'),
(156, 'administrator', 'Succesfully added product "Warm Jackets"', 'added', '2016-10-02 02:52:09'),
(158, 'administrator', 'Succesfully updated product "Awesome Astronaut"', 'updated', '2016-10-02 02:53:41'),
(160, 'administrator', 'Succesfully updated product "Nice Motor"', 'updated', '2016-10-02 01:44:39'),
(163, 'administrator', 'Logged In', 'logged_in', '2016-09-29 00:46:06'),
(168, 'administrator', 'Logged In', 'logged_in', '2016-09-29 01:01:32'),
(169, 'administrator', 'Succesfully added product "Vintage Camera"', 'added', '2016-10-02 01:45:02'),
(170, 'administrator', 'Succesfully added product "Leaf Balls"', 'added', '2016-10-02 01:45:11'),
(177, 'administrator', 'Succesfully updated product "Vintage Camera"', 'updated', '2016-10-02 01:45:20'),
(180, 'administrator', 'Logged In', 'Logged_in', '2016-10-13 08:05:00'),
(182, 'administrator', 'Logged In', 'Logged_in', '2016-10-19 02:41:18'),
(186, 'administrator', 'Logged In', 'Logged_in', '2016-10-23 02:09:19'),
(187, 'administrator', 'Logged In', 'Logged_in', '2016-10-24 07:35:39'),
(188, 'administrator', 'Logged In', 'Logged_in', '2016-10-25 07:20:46'),
(189, 'administrator', 'Logged In', 'Logged_in', '2016-10-26 11:44:32'),
(190, 'administrator', 'Logged In', 'Logged_in', '2016-10-27 03:45:06'),
(191, 'administrator', 'Logged In', 'Logged_in', '2016-10-29 00:43:44'),
(192, 'administrator', 'Added "Rock all night"', 'Added', '2016-10-29 00:47:54'),
(193, 'administrator', 'Added "Caliber"', 'Added', '2016-10-29 00:50:50'),
(194, 'administrator', 'Added "Web developer"', 'Added', '2016-10-29 00:53:46'),
(195, 'administrator', 'Added "Black spider"', 'Added', '2016-10-29 00:56:14'),
(196, 'administrator', 'Added "Outer space"', 'Added', '2016-10-29 00:58:29'),
(197, 'administrator', 'Added "Hard core coder"', 'Added', '2016-10-29 01:01:28'),
(198, 'administrator', 'Logged In', 'Logged_in', '2016-11-13 08:01:14'),
(199, 'administrator', 'Logged In', 'Logged_in', '2016-11-19 07:55:11'),
(200, 'administrator', 'Logged In', 'Logged_in', '2016-11-19 13:58:34'),
(201, 'administrator', 'Logged In', 'Logged_in', '2016-11-26 01:24:03'),
(202, 'administrator', 'Added "Nice shoes"', 'Added', '2016-11-26 01:29:49'),
(203, 'administrator', 'Added "Trafalgar law shoes"', 'Added', '2016-11-26 01:33:54'),
(204, 'administrator', 'Added "Bleach shoes"', 'Added', '2016-11-26 01:37:35'),
(205, 'administrator', 'Added "Naruto shoes"', 'Added', '2016-11-26 01:40:24'),
(206, 'administrator', 'Added "Wild shoes"', 'Added', '2016-11-26 01:45:05'),
(207, 'administrator', 'Added "Shoes nike"', 'Added', '2016-11-26 01:48:18'),
(208, 'administrator', 'Added "Burger shoes"', 'Added', '2016-11-26 01:51:14'),
(209, 'administrator', 'Added "Nice spider shoes"', 'Added', '2016-11-26 01:55:36'),
(210, 'administrator', 'Added "Nice beach shoes"', 'Added', '2016-11-26 01:57:21'),
(211, 'administrator', 'Added "Skateboard shoes"', 'Added', '2016-11-26 01:59:36'),
(212, 'administrator', 'Added "Astronaut shoes"', 'Added', '2016-11-26 02:02:40'),
(213, 'administrator', 'Added "Office shoes"', 'Added', '2016-11-26 02:05:15'),
(214, 'administrator', 'Added "Shoes galaxy"', 'Added', '2016-11-26 02:06:46'),
(215, 'administrator', 'Logged In', 'Logged_in', '2016-11-27 00:09:59'),
(216, 'administrator', 'Logged In', 'Logged_in', '2016-11-27 00:13:01'),
(217, 'administrator', 'Added "Nicce bags"', 'Added', '2016-11-27 00:15:44'),
(218, 'administrator', 'Added "Nice beach bags"', 'Added', '2016-11-27 00:19:08'),
(219, 'administrator', 'Logged In', 'Logged_in', '2016-11-27 00:39:33'),
(220, 'administrator', 'Added "One pice bags"', 'Added', '2016-11-27 00:45:15'),
(221, 'administrator', 'Added "Bleach bags"', 'Added', '2016-11-27 00:47:58'),
(222, 'administrator', 'Added "Sexy bags"', 'Added', '2016-11-27 00:51:50'),
(223, 'administrator', 'Added "Rock bags"', 'Added', '2016-11-27 00:55:02'),
(224, 'administrator', 'Logged In', 'Logged_in', '2016-12-05 12:35:26'),
(225, 'administrator', 'Logged In', 'Logged_in', '2016-12-05 12:46:19'),
(226, 'administrator', 'Logged In', 'Logged_in', '2016-12-05 15:02:24'),
(227, 'administrator', 'Logged In', 'Logged_in', '2016-12-06 00:44:03'),
(228, 'administrator', 'Logged In', 'Logged_in', '2016-12-06 01:59:41'),
(229, 'administrator', 'Logged In', 'Logged_in', '2016-12-06 13:08:44'),
(230, 'administrator', 'Logged In', 'Logged_in', '2016-12-07 05:10:37'),
(231, 'administrator', 'Logged In', 'Logged_in', '2016-12-07 11:22:59'),
(232, 'administrator', 'Logged In', 'Logged_in', '2016-12-07 12:44:34'),
(233, 'administrator', 'Logged In', 'Logged_in', '2016-12-07 14:23:41'),
(234, 'administrator', 'Logged In', 'Logged_in', '2016-12-07 14:48:06'),
(235, 'administrator', 'Logged In', 'Logged_in', '2016-12-09 05:31:58'),
(236, 'administrator', 'Logged In', 'Logged_in', '2016-12-09 05:39:22'),
(237, 'administrator', 'Logged In', 'Logged_in', '2016-12-10 01:04:04'),
(238, 'administrator', 'Logged In', 'Logged_in', '2016-12-10 01:25:56'),
(239, 'administrator', 'Logged In', 'Logged_in', '2016-12-10 01:36:09'),
(240, 'administrator', 'Logged In', 'Logged_in', '2016-12-10 01:36:33'),
(241, 'administrator', 'Logged In', 'Logged_in', '2016-12-10 01:37:07'),
(242, 'administrator', 'Logged In', 'Logged_in', '2016-12-10 01:38:07'),
(243, 'administrator', 'Logged In', 'Logged_in', '2016-12-10 01:38:52'),
(244, 'administrator', 'Logged In', 'Logged_in', '2016-12-10 01:39:26'),
(245, 'administrator', 'Logged In', 'Logged_in', '2016-12-10 01:40:10'),
(246, 'administrator', 'Logged In', 'Logged_in', '2016-12-10 01:42:51'),
(248, 'administrator', 'Logged In', 'Logged_in', '2016-12-10 07:42:09'),
(249, 'administrator', 'Logged In', 'Logged_in', '2016-12-10 08:42:12'),
(250, 'administrator', 'Logged In', 'Logged_in', '2016-12-10 11:40:14'),
(251, 'administrator', 'Logged In', 'Logged_in', '2016-12-10 12:50:11'),
(252, 'administrator', 'Logged In', 'Logged_in', '2016-12-11 00:44:01'),
(253, 'admin', 'Logged In', 'Logged_in', '2016-12-11 01:52:49'),
(254, 'administrator', 'Logged In', 'Logged_in', '2016-12-11 03:20:52'),
(255, 'administrator', 'Logged In', 'Logged_in', '2016-12-17 03:31:08'),
(256, 'administrator', 'Logged In', 'Logged_in', '2016-12-17 03:31:45'),
(257, 'admin', 'Logged In', 'Logged_in', '2016-12-17 03:32:00'),
(258, 'administrator', 'Logged In', 'Logged_in', '2016-12-17 03:33:12'),
(259, 'administrator', 'Logged In', 'Logged_in', '2016-12-17 03:33:49'),
(260, 'admin', 'Logged In', 'Logged_in', '2016-12-17 03:34:15'),
(261, 'administrator', 'Logged In', 'Logged_in', '2016-12-17 03:34:39'),
(262, 'administrator', 'Logged In', 'Logged_in', '2016-12-18 06:39:47'),
(263, 'administrator', 'Added "First Bag Product"', 'Added', '2016-12-18 07:04:24'),
(264, 'administrator', 'Added "Second Bag Product"', 'Added', '2016-12-18 07:07:50'),
(265, 'administrator', 'Logged In', 'Logged_in', '2016-12-18 07:15:56'),
(266, 'administrator', 'Updated"Second Bag Product"', 'Updated', '2016-12-18 07:18:48'),
(267, 'administrator', 'Updated"Second Bag Product"', 'Updated', '2016-12-18 07:25:03'),
(268, 'administrator', 'Updated"Second Bag Product"', 'Updated', '2016-12-18 07:33:54'),
(269, 'administrator', 'Updated"First Bag Product"', 'Updated', '2016-12-18 08:01:48'),
(270, 'administrator', 'Added "Sports first"', 'Added', '2016-12-18 08:05:13'),
(271, 'administrator', 'Logged In', 'Logged_in', '2016-12-18 11:30:23'),
(272, 'administrator', 'Added "Second sports"', 'Added', '2016-12-18 11:35:37'),
(273, 'administrator', 'Logged In', 'Logged_in', '2016-12-18 12:08:35'),
(274, 'administrator', 'Added "First accesories"', 'Added', '2016-12-18 12:12:46'),
(275, 'administrator', 'Added "Second accesories"', 'Added', '2016-12-18 12:17:08'),
(276, 'administrator', 'Updated"Vintage Camera"', 'Updated', '2016-12-18 12:25:29'),
(277, 'administrator', 'Logged In', 'Logged_in', '2016-12-20 11:48:21'),
(278, 'administrator', 'Logged In', 'Logged_in', '2016-12-20 11:49:33'),
(279, 'administrator', 'Logged In', 'Logged_in', '2016-12-21 00:49:57'),
(280, 'administrator', 'Logged In', 'Logged_in', '2016-12-21 04:44:14'),
(281, 'administrator', 'Logged In', 'Logged_in', '2016-12-21 11:43:44'),
(282, 'administrator', 'Logged In', 'Logged_in', '2016-12-21 11:44:28'),
(283, 'administrator', 'Logged In', 'Logged_in', '2016-12-21 12:09:26'),
(284, 'administrator', 'Logged In', 'Logged_in', '2016-12-21 14:56:01'),
(285, 'administrator', 'Logged In', 'Logged_in', '2016-12-22 13:55:34'),
(286, 'administrator', 'Logged In', 'Logged_in', '2016-12-22 14:58:02'),
(287, 'administrator', 'Logged In', 'Logged_in', '2016-12-23 12:02:28'),
(288, 'administrator', 'Logged In', 'Logged_in', '2016-12-25 00:44:15'),
(289, 'administrator', 'Logged In', 'Logged_in', '2016-12-25 13:12:29'),
(290, 'administrator', 'Logged In', 'Logged_in', '2016-12-25 22:52:12'),
(291, 'administrator', 'Logged In', 'Logged_in', '2016-12-25 22:57:56'),
(292, 'administrator', 'Logged In', 'Logged_in', '2016-12-26 01:20:02'),
(293, 'administrator', 'Logged In', 'Logged_in', '2016-12-26 07:34:51'),
(294, 'administrator', 'Logged In', 'Logged_in', '2016-12-26 07:43:16'),
(295, 'administrator', 'Logged In', 'Logged_in', '2016-12-26 07:43:55'),
(296, 'administrator', 'Logged In', 'Logged_in', '2016-12-26 07:45:52'),
(297, 'administrator', 'Logged In', 'Logged_in', '2016-12-26 07:47:14'),
(298, 'administrator', 'Logged In', 'Logged_in', '2016-12-26 07:47:42'),
(299, 'administrator', 'Deleted "Nvbnvbnvbnvbn"', 'Deleted', '2016-12-26 08:04:33'),
(300, 'administrator', 'Logged In', 'Logged_in', '2016-12-26 12:45:08'),
(301, 'administrator', 'Logged In', 'Logged_in', '2016-12-26 13:50:12'),
(302, 'administrator', 'Logged In', 'Logged_in', '2016-12-26 15:05:31'),
(303, 'administrator', 'Logged In', 'Logged_in', '2016-12-27 01:45:50'),
(304, 'administrator', 'Logged In', 'Logged_in', '2016-12-27 02:28:35'),
(305, 'administrator', 'Logged In', 'Logged_in', '2016-12-27 02:59:23'),
(306, 'administrator', 'Logged In', 'Logged_in', '2016-12-27 03:36:43'),
(307, 'administrator', 'Logged In', 'Logged_in', '2016-12-27 05:16:12'),
(308, 'administrator', 'Logged In', 'Logged_in', '2016-12-27 05:18:59'),
(309, 'administrator', 'Logged In', 'Logged_in', '2016-12-27 12:27:43'),
(310, 'administrator', 'Added "First clothing"', 'Added', '2016-12-27 12:53:38'),
(311, 'administrator', 'Logged In', 'Logged_in', '2016-12-28 02:13:43'),
(312, 'administrator', 'Logged In', 'Logged_in', '2016-12-28 06:25:14'),
(313, 'administrator', 'Logged In', 'Logged_in', '2016-12-28 08:40:47'),
(314, 'administrator', 'Logged In', 'Logged_in', '2016-12-29 08:35:18'),
(315, 'administrator', 'Logged In', 'Logged_in', '2016-12-29 13:58:13'),
(316, 'administrator', 'Logged In', 'Logged_in', '2016-12-29 14:29:57'),
(317, 'administrator', 'Added "The SPLATTERPUNK"', 'Added', '2016-12-29 14:39:01'),
(318, 'administrator', 'Added "ROCKETEER"', 'Added', '2016-12-29 15:02:36'),
(319, 'administrator', 'Added "MR. BOOMBASTIK"', 'Added', '2016-12-29 15:07:41'),
(320, 'administrator', 'Added "F*BONE"', 'Added', '2016-12-29 15:15:31'),
(321, 'administrator', 'Added "DREAMCATCHER"', 'Added', '2016-12-29 15:21:49'),
(322, 'administrator', 'Added "SIXTY FIVE HUNDRED"', 'Added', '2016-12-29 15:30:33'),
(323, 'administrator', 'Added "TACTOWN One"', 'Added', '2016-12-29 15:39:59'),
(324, 'administrator', 'Added "RAKENROL"', 'Added', '2016-12-29 15:49:00'),
(325, 'administrator', 'Added "SMOKE"', 'Added', '2016-12-29 15:57:28'),
(326, 'administrator', 'Added "TOZ SKULL"', 'Added', '2016-12-29 16:02:41'),
(327, 'administrator', 'Logged In', 'Logged_in', '2016-12-29 16:10:50'),
(328, 'administrator', 'Added "TRAFALGAR-DEATH"', 'Added', '2016-12-29 16:24:33'),
(329, 'administrator', 'Added "KANEKI CHIBI"', 'Added', '2016-12-29 16:27:31'),
(330, 'administrator', 'Added "SAITAMA FIST"', 'Added', '2016-12-29 16:29:52'),
(331, 'administrator', 'Added "SCOUTING LEGION"', 'Added', '2016-12-29 16:32:26'),
(332, 'administrator', 'Added "COMRO SHIRT"', 'Added', '2016-12-29 16:38:46'),
(333, 'administrator', 'Added "Adidas Superstar"', 'Added', '2016-12-29 16:48:35'),
(334, 'administrator', 'Added "Converse All Star"', 'Added', '2016-12-29 16:56:43'),
(335, 'administrator', 'Added "Satori Big Link V2 Green"', 'Added', '2016-12-29 17:02:01'),
(336, 'administrator', 'Added "BAMBOO™ Skateboards"', 'Added', '2016-12-29 17:05:31'),
(337, 'administrator', 'Added "Blanko Lanyards"', 'Added', '2016-12-29 17:09:47'),
(338, 'administrator', 'Added "Destructo D1 Arto Saari"', 'Added', '2016-12-29 17:13:25'),
(339, 'administrator', 'Added "Destructo Superlite - Red | Mid"', 'Added', '2016-12-29 17:16:32'),
(340, 'administrator', 'Added "Destructo Tony Cervantes promodel"', 'Added', '2016-12-29 17:19:12'),
(341, 'administrator', 'Added "SAMURAI UMBRELLA"', 'Added', '2016-12-29 17:22:51'),
(342, 'administrator', 'Added "Shorty''s Silverados Hardware"', 'Added', '2016-12-29 17:28:42'),
(343, 'administrator', 'Added "KWINTAS"', 'Added', '2016-12-29 17:31:47'),
(344, 'administrator', 'Logged In', 'Logged_in', '2016-12-29 17:40:00'),
(345, 'administrator', 'Logged In', 'Logged_in', '2016-12-29 18:21:38'),
(346, 'administrator', 'Logged In', 'Logged_in', '2017-01-01 03:14:46'),
(348, 'administrator', 'Logged In', 'Logged_in', '2017-01-01 03:37:50'),
(349, 'administrator', 'Logged Out', 'Logged_out', '2017-01-01 03:39:59'),
(350, 'administrator', 'Logged In', 'Logged_in', '2017-01-02 09:03:30'),
(351, 'administrator', 'Logged Out', 'Logged_out', '2017-01-02 09:08:20'),
(352, 'administrator', 'Logged In', 'Logged_in', '2017-01-03 12:04:40'),
(353, 'administrator', 'Logged In', 'Logged_in', '2017-01-03 13:32:20'),
(354, 'administrator', 'Added "Hdasghj"', 'Added', '2017-01-03 17:16:15'),
(355, 'administrator', 'Logged In', 'Logged_in', '2017-01-03 20:03:01'),
(356, 'administrator', 'Deleted "Hdasghj"', 'Deleted', '2017-01-03 20:04:07'),
(357, 'administrator', 'Added "Caps rasta"', 'Added', '2017-01-03 20:07:44'),
(358, 'administrator', 'Added "Bracelet"', 'Added', '2017-01-03 20:11:52'),
(359, 'administrator', 'Logged In', 'Logged_in', '2017-01-04 04:28:53'),
(360, 'administrator', 'Logged Out', 'Logged_out', '2017-01-04 04:29:29'),
(361, 'administrator', 'Logged In', 'Logged_in', '2017-01-04 04:33:32'),
(362, 'administrator', 'Logged Out', 'Logged_out', '2017-01-04 04:33:53'),
(363, 'administrator', 'Logged In', 'Logged_in', '2017-01-04 04:49:56'),
(364, 'administrator', 'Logged Out', 'Logged_out', '2017-01-04 04:54:29'),
(365, 'administrator', 'Logged In', 'Logged_in', '2017-01-04 04:56:43'),
(366, 'administrator', 'Logged Out', 'Logged_out', '2017-01-04 04:57:29'),
(367, 'administrator', 'Logged In', 'Logged_in', '2017-01-04 04:59:26'),
(368, 'administrator', 'Logged Out', 'Logged_out', '2017-01-04 05:05:18'),
(369, 'administrator', 'Logged In', 'Logged_in', '2017-01-04 05:35:27'),
(370, 'administrator', 'Added "Mac test"', 'Added', '2017-01-04 05:38:11'),
(371, 'administrator', 'Added "Wild Flower"', 'Added', '2017-01-04 05:40:33'),
(372, 'administrator', 'Logged In', 'Logged_in', '2017-01-04 05:42:15'),
(373, 'administrator', 'Deleted "Wild%20Flower"', 'Deleted', '2017-01-04 05:43:13'),
(374, 'administrator', 'Logged In', 'Logged_in', '2017-01-16 01:33:14'),
(375, 'administrator', 'Logged In', 'Logged_in', '2017-01-16 01:40:39'),
(376, 'administrator', 'Logged In', 'Logged_in', '2017-01-16 01:46:43'),
(377, 'administrator', 'Logged In', 'Logged_in', '2017-01-16 06:42:41'),
(378, 'administrator', 'Logged In', 'Logged_in', '2017-01-16 06:43:10'),
(379, 'administrator', 'Logged In', 'Logged_in', '2017-01-16 06:45:22'),
(380, 'administrator', 'Logged In', 'Logged_in', '2017-01-16 06:46:12'),
(381, 'administrator', 'Deleted "Mac%20test"', 'Deleted', '2017-01-16 06:47:29'),
(382, 'administrator', 'Logged Out', 'Logged_out', '2017-01-16 06:52:36'),
(383, 'administrator', 'Logged In', 'Logged_in', '2017-01-16 07:18:35'),
(384, 'administrator', 'Logged In', 'Logged_in', '2017-01-16 07:19:26'),
(385, 'administrator', 'Logged In', 'Logged_in', '2017-01-17 07:31:19'),
(386, 'administrator', 'Logged In', 'Logged_in', '2017-01-17 07:47:47'),
(387, 'administrator', 'Logged In', 'Logged_in', '2017-01-21 15:12:32'),
(388, 'administrator', 'Logged In', 'Logged_in', '2017-01-21 15:41:56'),
(389, 'administrator', 'Logged In', 'Logged_in', '2017-01-21 16:34:52'),
(390, 'administrator', 'Updated"TRAFALGAR-DEATH fake"', 'Updated', '2017-01-21 17:28:16'),
(391, 'administrator', 'Logged Out', 'Logged_out', '2017-01-21 17:29:02'),
(392, 'administrator', 'Logged In', 'Logged_in', '2017-01-21 17:30:41'),
(393, 'administrator', 'Updated"TRAFALGAR-DEATH"', 'Updated', '2017-01-21 17:33:00'),
(394, 'administrator', 'Logged Out', 'Logged_out', '2017-01-21 17:36:57'),
(395, 'administrator', 'Logged In', 'Logged_in', '2017-01-22 14:10:04'),
(396, 'administrator', 'Logged Out', 'Logged_out', '2017-01-22 14:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `admin_supervisor`
--

CREATE TABLE `admin_supervisor` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_supervisor`
--

INSERT INTO `admin_supervisor` (`admin_id`, `username`, `password`, `profile`, `date_added`) VALUES
(29, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'anime-hd-desktop-wallpapers-6.jpg', '2016-12-11 01:50:41'),
(30, 'administrator', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'user-12.jpg', '2016-12-27 05:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `chatbox`
--

CREATE TABLE `chatbox` (
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'user',
  `chat_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatbox`
--

INSERT INTO `chatbox` (`chat_id`, `user_id`, `username`, `msg`, `gender`, `profile`, `status`, `chat_date`) VALUES
(1, 16, 'aiken28', 'hello aiken!', 'male', 'anime-hd-desktop-wallpapers-6.jpg', 'admin', '2016-12-27 05:43:39'),
(2, 17, 'markjoseph', 'hello admin, im the new user pls bear with me.. hoorah!', 'male', 'best-wallpapers-hd-6.jpg', 'user', '2016-12-28 06:21:09'),
(3, 17, 'markjoseph', 'hello im mark!', 'male', 'best-wallpapers-hd-6.jpg', 'user', '2016-12-28 06:21:59'),
(4, 17, 'markjoseph', 'hello im brylle!', 'male', 'best-wallpapers-hd-6.jpg', 'user', '2016-12-29 08:34:58'),
(5, 17, 'markjoseph', 'hello!', 'male', 'best-wallpapers-hd-6.jpg', 'admin', '2016-12-29 08:35:49'),
(6, 17, 'markjoseph', 'hello!', 'male', 'best-wallpapers-hd-6.jpg', 'admin', '2017-01-02 09:05:24'),
(7, 17, 'markjoseph', 'defence', 'male', 'best-wallpapers-hd-6.jpg', 'user', '2017-01-04 04:18:22'),
(8, 17, 'markjoseph', 'hello', 'male', 'best-wallpapers-hd-6.jpg', 'admin', '2017-01-21 16:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `title` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `profile` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `title`, `details`, `profile`, `date_created`) VALUES
(1, 'aiken28', '1st feedback', 'nice feedback', 'anime-hd-desktop-wallpapers-6.jpg', '2016-12-10 07:25:43'),
(9, 'aiken28', 'dmasndmasd', 'dsaddsa', 'anime-hd-desktop-wallpapers-6.jpg', '2016-12-10 07:41:28'),
(10, 'aiken28', 'nice aiken here!', 'dhsagd dhasdh dashdhas dhsagda sadhgasdh dsdhgasdh dasdgashd asdhasgdas dasdhasd asdasjdhkasjd asdhasjdhas dasdhasjd asdjashdkjas dasdhasjdhas dasjdhaskd asdkashdaskdasd adjkashdkjasd asdkahsdkas dasdhaskdad dhasdjka dasjdhasjkd', 'anime-hd-desktop-wallpapers-6.jpg', '2016-12-10 08:41:49'),
(11, 'markjoseph', 'hello blackbox!!', 'im a new user here in your website and all i can say is this website i very awesome,, created by me,, mj horrah....', 'best-wallpapers-hd-6.jpg', '2016-12-28 08:53:44'),
(12, 'markjoseph', 'hello blackbox!', 'nice website,..!', 'best-wallpapers-hd-6.jpg', '2017-01-04 04:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oi_no` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `trx_id` varchar(30) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_color` varchar(25) NOT NULL,
  `item_size` varchar(5) NOT NULL,
  `item_prize` decimal(16,2) NOT NULL,
  `item_image` varchar(50) NOT NULL,
  `date_ordered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oi_no`, `order_id`, `item_id`, `trx_id`, `item_name`, `item_qty`, `item_color`, `item_size`, `item_prize`, `item_image`, `date_ordered`) VALUES
(1, 958033545, 7, '7KY69072S89707738', 'TACTOWN One', 1, 'White', 'S', '350.00', '13.jpg', '2017-01-04 04:17:22'),
(2, 1273407301, 7, '432807214', 'TACTOWN One', 1, 'White', 'S', '350.00', '13.jpg', '2017-01-04 04:47:06'),
(3, 1390853536, 8, '160855177', 'RAKENROL', 1, 'Black', 'M', '250.00', '17.jpg', '2017-01-21 14:59:29'),
(4, 1390853536, 9, '160855177', 'SMOKE', 1, 'Grey', 'L', '300.00', '22.jpg', '2017-01-21 14:59:29'),
(5, 939019799, 9, '1024084197', 'SMOKE', 1, 'Black', 'M', '300.00', '22.jpg', '2017-01-22 14:33:09'),
(6, 271644836, 9, '1024084197', 'SMOKE', 1, 'Black', 'M', '300.00', '22.jpg', '2017-01-22 14:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_details` text NOT NULL,
  `prod_spec0` varchar(150) NOT NULL,
  `prod_spec1` varchar(150) NOT NULL,
  `prod_spec2` varchar(150) NOT NULL,
  `prod_spec3` varchar(150) NOT NULL,
  `prod_spec4` varchar(150) NOT NULL,
  `prod_spec5` varchar(150) NOT NULL,
  `prod_spec6` varchar(150) NOT NULL,
  `prod_spec7` varchar(150) NOT NULL,
  `prod_spec8` varchar(150) NOT NULL,
  `prod_spec9` varchar(150) NOT NULL,
  `prod_color0` varchar(15) NOT NULL,
  `prod_color1` varchar(15) NOT NULL,
  `prod_color2` varchar(15) NOT NULL,
  `prod_color3` varchar(15) NOT NULL,
  `prod_color4` varchar(15) NOT NULL,
  `prod_color5` varchar(15) NOT NULL,
  `prod_color6` varchar(15) NOT NULL,
  `prod_color7` varchar(15) NOT NULL,
  `prod_color8` varchar(15) NOT NULL,
  `prod_color9` varchar(15) NOT NULL,
  `prod_category` varchar(20) NOT NULL,
  `prod_subcategory` varchar(25) NOT NULL,
  `cloth_size0` varchar(5) NOT NULL,
  `cloth_size1` varchar(5) NOT NULL,
  `cloth_size2` varchar(5) NOT NULL,
  `cloth_size3` varchar(5) NOT NULL,
  `cloth_size4` varchar(5) NOT NULL,
  `shoe_size0` varchar(5) NOT NULL,
  `shoe_size1` varchar(5) NOT NULL,
  `shoe_size2` varchar(5) NOT NULL,
  `shoe_size3` varchar(5) NOT NULL,
  `shoe_size4` varchar(5) NOT NULL,
  `shoe_size5` varchar(5) NOT NULL,
  `shoe_size6` varchar(5) NOT NULL,
  `shoe_size7` varchar(5) NOT NULL,
  `prod_brand` varchar(25) NOT NULL,
  `prod_price` decimal(16,2) NOT NULL,
  `price_discount` decimal(16,2) NOT NULL,
  `price_off` int(11) NOT NULL,
  `prod_stocks` int(11) NOT NULL,
  `image0` varchar(50) NOT NULL,
  `image1` varchar(50) NOT NULL,
  `image2` varchar(50) NOT NULL,
  `image3` varchar(50) NOT NULL,
  `image4` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_details`, `prod_spec0`, `prod_spec1`, `prod_spec2`, `prod_spec3`, `prod_spec4`, `prod_spec5`, `prod_spec6`, `prod_spec7`, `prod_spec8`, `prod_spec9`, `prod_color0`, `prod_color1`, `prod_color2`, `prod_color3`, `prod_color4`, `prod_color5`, `prod_color6`, `prod_color7`, `prod_color8`, `prod_color9`, `prod_category`, `prod_subcategory`, `cloth_size0`, `cloth_size1`, `cloth_size2`, `cloth_size3`, `cloth_size4`, `shoe_size0`, `shoe_size1`, `shoe_size2`, `shoe_size3`, `shoe_size4`, `shoe_size5`, `shoe_size6`, `shoe_size7`, `prod_brand`, `prod_price`, `price_discount`, `price_off`, `prod_stocks`, `image0`, `image1`, `image2`, `image3`, `image4`, `date_added`) VALUES
(1, 'The SPLATTERPUNK', '-SplatterPunk''s Debut Release on Premium Quality Shirt and Print after making it as an Official Clothing Brand Name.\r\n-1st SplatterPunk Official Shirt.', 'Cotton', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Black', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Clothing', 'Mens Clothing', 'XS', 'S', 'M', 'L', ' ', '', '', '', '', '', '', '', '', 'Blackbox', '450.00', '0.00', 0, 20, '1.jpg', '2.jpg', ' ', ' ', ' ', '2016-12-30 14:39:01'),
(2, 'ROCKETEER', 'Tribe Of Zakki Clothing\r\n-Another Collaboration art from ', 'Cotton', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Black', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Clothing', 'Mens Clothing', 'XS', 'S', 'M', 'L', ' ', '', '', '', '', '', '', '', '', 'Art of Zai and Tribe of Z', '500.00', '0.00', 0, 20, '3.jpg', ' ', ' ', ' ', ' ', '2016-12-30 15:02:36'),
(3, 'MR. BOOMBASTIK', '-Mr. Boombastic is a collaboration piece of ', 'Cotton', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Grey', 'White', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Clothing', 'Mens Clothing', 'XS', 'S', 'M', 'L', ' ', '', '', '', '', '', '', '', '', 'Blackbox', '500.00', '450.00', 10, 20, '4.jpg', ' ', ' ', ' ', ' ', '2016-12-30 15:07:41'),
(4, 'F*BONE', '-1 of 2 Art Pieces Franchise from ', 'Cotton', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Black', 'Red', 'Violet', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Clothing', 'Mens Clothing', 'XS', 'S', 'M', 'L', 'XL', '', '', '', '', '', '', '', '', 'Blackbox', '380.00', '0.00', 0, 20, '5.jpg', '6.jpg', '7.jpg', '8.jpg', ' ', '2016-12-30 15:15:31'),
(5, 'DREAMCATCHER', '-1 of 2 Art Pieces Franchise from ', 'Cotton', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Grey', 'White', 'Black', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Clothing', 'Mens Clothing', 'XS', 'S', 'M', 'L', 'XL', '', '', '', '', '', '', '', '', 'Blackbox', '380.00', '0.00', 0, 20, '9.jpg', '10.jpg', '11.jpg', ' ', ' ', '2016-12-30 15:21:49'),
(6, 'SIXTY FIVE HUNDRED', 'Shirt released on October 2016\n\n-Used by the BlackBox Riders (Skateboarding Team) for the Skate Competition at Ormoc City last October 23, 2016.', 'Cotton', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Black', 'White', 'Red', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Clothing', 'Mens Clothing', 'XL', 'L', 'M', 'S', 'XS', '', '', '', '', '', '', '', '', 'Blackbox', '380.00', '350.00', 8, 20, '12.jpg', ' ', ' ', ' ', ' ', '2016-12-29 15:30:32'),
(7, 'TACTOWN One', '-Shirt Released on November 2016\n\n-Launched @ Cerebro Bar by Zai of Wismalaya under the Band Anniversary event of Scarlet Alley last November 25, 2016.\n\n-Used by ', 'Cotton', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'White', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Clothing', 'Mens Clothing', 'XS', 'S', 'M', 'L', 'XL', '', '', '', '', '', '', '', '', 'Blackbox', '350.00', '0.00', 0, 18, '13.jpg', '14.jpg', '15.jpg', '16.jpg', ' ', '2017-01-04 04:47:06'),
(8, 'RAKENROL', '-Came from the Famous Lines of ', 'Cotton', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'White', 'Black', 'Grey', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Clothing', 'Mens Clothing', 'S', 'XS', 'M', 'L', 'XL', '', '', '', '', '', '', '', '', 'Blackbox', '250.00', '0.00', 0, 19, '17.jpg', '18.jpg', '19.jpg', ' ', ' ', '2017-01-21 14:59:29'),
(9, 'SMOKE', '-One of the BlackBox Pinas'' Favorite piece.\r\n-Trivia: The Smoke Shirt depicts the hardship of having an asthma attack, made by ', 'Cotton', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'White', 'Grey', 'Black', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Clothing', 'Mens Clothing', 'XS', 'S', 'M', 'L', 'XL', '', '', '', '', '', '', '', '', 'Blackbox', '300.00', '0.00', 0, 15, '22.jpg', '20.jpg', '21.jpg', ' ', ' ', '2017-01-22 14:33:10'),
(10, 'TOZ SKULL', '-This was the 1st Shirt released for the ', 'Cotton', 'Silk', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'White', 'Black', 'Gray', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Clothing', 'Mens Clothing', 'S', 'XS', 'M', 'L', 'XL', '', '', '', '', '', '', '', '', 'Blackbox', '300.00', '0.00', 0, 20, '24.jpg', '23.jpg', ' ', ' ', ' ', '2016-12-29 16:02:41'),
(11, 'TRAFALGAR-DEATH', 'Back Pack\r\n(One Piece)', 'Anime One Piece', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Yellow', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Bags', 'Backpack', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Blackbox', '1300.00', '999.99', 23, 1, 'TRFALGAR-DEATH.jpg', '', '', '', '', '2017-01-21 17:35:55'),
(12, 'KANEKI CHIBI', 'Back Pack\r\n(Tokyo Ghoul)', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Light', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Bags', 'Backpack', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Blackbox(tokyo)', '1300.00', '0.00', 0, 1, 'KANEKI CHIBI.jpg', ' ', ' ', ' ', ' ', '2016-12-29 16:27:31'),
(13, 'SAITAMA FIST', '(NEW issue)\r\nBack Pack\r\n(One Punch Man)', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Bags', 'Backpack', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Blackbox(tokyo)', '1600.00', '0.00', 0, 1, 'SAITAMA.jpg', ' ', ' ', ' ', ' ', '2016-12-29 16:29:52'),
(14, 'SCOUTING LEGION', 'Back Pack\r\n(Attack On Titan)', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Darkgreen', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Bags', 'Backpack', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Blackbox(tokyo)', '1300.00', '0.00', 0, 1, 'SCOUTING LEGION.jpg', ' ', ' ', ' ', ' ', '2016-12-29 16:32:25'),
(15, 'COMRO SHIRT', '(Twisted Tounge X BlackBox Pinas)', 'Cotton', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'White', 'Gray', 'Yellow', 'Black', ' ', ' ', ' ', ' ', ' ', ' ', 'Clothing', 'Mens Clothing', 'XS', 'S', 'L', 'M', 'XL', '', '', '', '', '', '', '', '', 'Blackbox', '300.00', '0.00', 0, 20, 'COmro shirts.jpg', ' ', ' ', ' ', ' ', '2016-12-29 16:38:46'),
(16, 'Adidas Superstar', 'Black shoes for awesome men.', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Black', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Shoes', 'Mens Shoes', '', '', '', '', '', ' ', ' ', ' ', ' ', '6', '7', '8', '9', 'Adidas', '900.00', '0.00', 0, 20, 'adidas superstar.jpg', 'adidas superstar 2.jpg', 'adidas supestar 3.jpg', ' ', ' ', '2016-12-29 16:48:35'),
(17, 'Converse All Star', 'Simple shoes for a simple person', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Black', 'White', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Shoes', 'Mens Shoes', '', '', '', '', '', ' ', ' ', ' ', '7', '8', '9', '10', '11', 'Converse', '900.00', '0.00', 0, 9, 'converse all star 2.jpg', 'converse superstar 3.jpg', 'conversee all star.jpg', ' ', ' ', '2017-01-01 03:05:45'),
(18, 'Satori Big Link V2 Green', 'Size: 52mm\r\nHardness: 98a', 'Fiber', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Green', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Sports', 'Skateboard', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Blackbox', '1300.00', '0.00', 0, 20, 'satori big link v2 green.jpg', ' ', ' ', ' ', ' ', '2016-12-29 17:02:01'),
(19, 'BAMBOO™ Skateboards', 'Made in Bamboo.', 'Bamboo', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Black', 'Green', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Sports', 'Skateboard', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Blackbox', '2100.00', '0.00', 0, 20, 'bamboo skate boards.jpg', ' ', ' ', ' ', ' ', '2016-12-29 17:05:31'),
(20, 'Blanko Lanyards', 'Lace for your things.', 'SIlk', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Blue', 'White', 'Black', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Accesories', 'Lanyards', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Blackbox', '180.00', '0.00', 0, 50, 'blanko yards.jpg', ' ', ' ', ' ', ' ', '2016-12-29 17:09:47'),
(21, 'Destructo D1 Arto Saari', 'Side mission Magnesium', 'Magnesium', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Black', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Sports', 'Skateboard', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Blackbox', '2500.00', '0.00', 0, 20, 'destructo D1 arto saari.jpg', ' ', ' ', ' ', ' ', '2016-12-29 17:13:25'),
(22, 'Destructo Superlite - Red | Mid', 'Hollowpoint Kingpin', 'Magnesium', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Red', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Sports', 'Skateboard', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Blacbox', '2500.00', '0.00', 0, 20, 'destructo superlite-red.jpg', ' ', ' ', ' ', ' ', '2016-12-29 17:16:32'),
(23, 'Destructo Tony Cervantes promodel', 'The Rail Killer', 'Magnesium', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Black', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Sports', 'Skateboard', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Blackbox', '2500.00', '0.00', 0, 20, 'destructo tony cervantes promodel.jpg', ' ', ' ', ' ', ' ', '2016-12-29 17:19:12'),
(24, 'SAMURAI UMBRELLA', 'Handle length: 11 inches\r\npole length: 26 inches\r\ncanopy diameter: 38 inches', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Black', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Accesories', 'Anime Merchandise', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Blackbox', '399.00', '0.00', 0, 50, 'samurai umbrella.jpg', ' ', ' ', ' ', ' ', '2016-12-29 17:22:51'),
(25, 'Shorty''s Silverados Hardware', '-Comes with 2 silver bolts to help you tell the nose from the tail\r\n-superior crafted hardware\r\n-comes w/ Allen key', 'Metal', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Black', 'Blue', 'Orange', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Sports', 'Skateboard', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Blackbox', '350.00', '0.00', 0, 20, 'shortys silverados.jpg', ' ', ' ', ' ', ' ', '2016-12-29 17:28:42'),
(26, 'KWINTAS', 'Pendant (made from Carabao Horn/Bamboo), Wax Cord Lace', 'Carabao horn', 'Bamboo', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Black', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Accesories', 'Necklace', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Blackbox', '80.00', '0.00', 0, 50, 'kwintas.jpg', ' ', ' ', ' ', ' ', '2016-12-29 17:31:47'),
(28, 'Caps rasta', 'Ohryt', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Black', 'White', 'Blue', 'Red', 'Gren', 'Green', 'Grey', ' ', ' ', ' ', 'Accesories', 'Caps', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Blackbox', '250.00', '0.00', 0, 30, 'caps 2.jpg', 'caps.jpg', ' ', ' ', ' ', '2017-01-03 20:07:44'),
(29, 'Bracelet', 'Handcrafted', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'Accesories', 'Lanyards', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Blackbox', '80.00', '0.00', 0, 30, 'bracelets handcrafted.jpg', ' ', ' ', ' ', ' ', '2017-01-03 20:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `title` varchar(50) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `details`, `title`, `rating`, `prod_id`, `user_id`, `username`, `profile`, `date_created`) VALUES
(1, 'i want to have this product, please someone give this to me. thnks a lot, mwwwahh....', 'nice product', 'Absolutely Delighted', 1, 16, 'aiken28', 'anime-hd-desktop-wallpapers-6.jpg', '2016-12-27 13:10:50'),
(2, 'nice website here!', '', 'Absolutely Delighted', 1, 17, 'markjoseph', 'best-wallpapers-hd-6.jpg', '2016-12-28 06:22:41'),
(4, 'hello blackbox,, ive been surfing your site and i find it really cool ,, and i love thid tactown shirt,, its really awesome..', 'nice shirt!', 'Absolutely Delighted', 7, 16, 'aiken28', 'anime-hd-desktop-wallpapers-6.jpg', '2017-01-01 05:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(5) NOT NULL,
  `fname` varchar(35) NOT NULL,
  `lname` varchar(35) NOT NULL,
  `mname` varchar(35) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(35) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `shipping_charge` decimal(16,2) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `trx_id` varchar(35) NOT NULL,
  `order_id` varchar(30) NOT NULL,
  `date_ordered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `fname`, `lname`, `mname`, `province`, `city`, `barangay`, `phone_number`, `shipping_charge`, `payment_status`, `payment_method`, `trx_id`, `order_id`, `date_ordered`) VALUES
(1, 'Mark joseph', 'Dagami', 'Gares', 'Leyte', 'Tacloban City', 'Tibak', '999999999', '0.00', 'Completed', 'Paypal', '7KY69072S89707738', '958033545', '2017-01-04 04:17:22'),
(2, 'Mark joseph', 'Dagami', 'Gares', 'Leyte', 'Santa Fe', 'Tibak', '467168204', '145.00', 'Pending', 'Palawan', '432807214', '1273407301', '2017-01-04 04:47:06'),
(3, 'Mark joseph', 'Dagami', 'Gares', 'Leyte', 'Santa Fe', 'Tibak', '555555555', '145.00', 'Pending', 'LBC', '160855177', '1390853536', '2017-01-21 14:59:29'),
(4, 'Mark Joseph', 'Dagami', 'Gares', 'Leyte', 'Santa Fe', 'Tibak', '467168204', '145.00', 'Pending', 'Cebuana', '1024084197', '939019799', '2017-01-22 14:33:09'),
(5, 'Mark Joseph', 'Dagami', 'Gares', 'Leyte', 'Santa Fe', 'Tibak', '467168204', '145.00', 'Pending', 'Cebuana', '1024084197', '271644836', '2017-01-22 14:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emails`
--

CREATE TABLE `tbl_emails` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_submit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_emails`
--

INSERT INTO `tbl_emails` (`id`, `email`, `gender`, `date_submit`) VALUES
(1, 'markjoseph.dagami@gmail.com', 'Man', '2016-12-18 01:15:32'),
(2, 'aiken28@gmail.com', 'Man', '2016-12-26 14:56:14'),
(3, 'jestoni@gmail.com', 'Man', '2016-12-26 14:56:39'),
(4, 'bagares.darryljoseph@gmail.com', 'Man', '2016-12-29 17:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(35) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `middle_name` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `middle_name`, `username`, `email`, `password`, `phone`, `gender`, `profile`, `date_reg`) VALUES
(16, 'Aiken', 'Dagami', 'Roda', 'aiken28', 'aiken28@gmail.com', 'e0fbf20aa15f8a658fbe8cd38b3121a8', '777777777', 'male', 'anime-hd-desktop-wallpapers-6.jpg', '2016-11-24 07:42:56'),
(17, 'Mark Joseph', 'Dagami', 'Gares', 'markjoseph', 'markjoseph.dagami@gmail.com', 'ccc423cd25f3fce569486db4c1da8999', '999999999', 'male', 'best-wallpapers-hd-6.jpg', '2016-12-28 06:19:53'),
(18, 'Darryl', 'Bagares', 'Agrava', 'djbagares07', 'djbagares07@yahoo.com', '00965da44c91324a55e3831b4fbd61d2', '065077572', 'male', '', '2017-01-03 20:00:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `admin_supervisor`
--
ALTER TABLE `admin_supervisor`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `chatbox`
--
ALTER TABLE `chatbox`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oi_no`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `tbl_emails`
--
ALTER TABLE `tbl_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=397;
--
-- AUTO_INCREMENT for table `admin_supervisor`
--
ALTER TABLE `admin_supervisor`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `chatbox`
--
ALTER TABLE `chatbox`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oi_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_emails`
--
ALTER TABLE `tbl_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

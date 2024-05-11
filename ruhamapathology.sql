-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2024 at 08:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruhamapathology`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_actions`
--

CREATE TABLE `admin_menu_actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `admin_menu_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `route` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agentdetails`
--

CREATE TABLE `agentdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `commission_pecentage` double NOT NULL DEFAULT 0,
  `mobile` varchar(255) NOT NULL,
  `hospitaler_kache_pawna` double(12,2) NOT NULL DEFAULT 0.00,
  `address` varchar(255) NOT NULL,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agentdetails`
--

INSERT INTO `agentdetails` (`id`, `name`, `commission_pecentage`, `mobile`, `hospitaler_kache_pawna`, `address`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, 'Not Applicable', 0, 'na', 0.00, 'na', 0, '2022-05-20 09:47:40', '2022-05-20 09:47:40'),
(2, 'SOUTH', 0, '01324166600', 0.00, 'NN', 1, '2022-05-29 19:44:04', '2022-05-29 19:45:59'),
(3, 'ABADUL(Digital)', 0, '01925053623', 60.00, 'Khulna', 0, '2022-06-02 18:50:01', '2024-01-15 15:58:07'),
(4, 'Saharul islam Liton', 0, '01931809021', 0.00, 'Das para,Khulna', 0, '2022-06-02 19:59:03', '2022-06-03 01:06:33'),
(5, 'South zone Hospital', 0, '01324166566', 0.00, 'Khulna', 0, '2022-06-02 19:59:45', '2022-06-02 19:59:45'),
(6, 'Debasis(AGM)', 0, '01645703435', 0.00, 'Khulna', 0, '2022-06-03 01:09:18', '2022-07-16 03:22:59'),
(7, 'Ismayel Hossan', 0, '01997084757', 0.00, 'Boyra,Khulna', 0, '2022-06-03 01:10:56', '2022-06-03 01:10:56'),
(8, 'Susanto Mojumdar', 0, '01921431379', 0.00, 'Pujakola,Khulna', 0, '2022-06-03 01:12:12', '2022-06-03 01:12:12'),
(9, 'Tapon', 0, '01719850043', 0.00, 'Khulna', 0, '2022-06-03 01:13:40', '2022-06-03 01:13:40'),
(10, 'Kobir Hossan', 0, '01961374002', 0.00, 'Pirojpur', 0, '2022-06-03 01:14:41', '2022-06-03 01:14:41'),
(11, 'Dr.Asim', 0, '01736913197', 0.00, 'Nagirpur', 0, '2022-06-03 01:15:56', '2022-06-03 01:15:56'),
(12, 'Dr.Asim', 0, '01736913197', 0.00, 'Nagirpur', 0, '2022-06-03 01:15:56', '2022-06-03 01:15:56'),
(13, 'Mizanur Rahaman', 0, '01818281722', 0.00, 'KMCH', 0, '2022-06-03 01:17:53', '2022-06-03 01:17:53'),
(14, 'Mizan Fokir', 0, '0', 0.00, 'KMCH', 0, '2022-06-03 01:18:29', '2022-06-03 01:18:29'),
(15, 'Mr.Sazol', 0, '01727864079', 0.00, 'KMCH', 0, '2022-06-03 01:19:18', '2022-06-03 01:19:18'),
(16, 'Amir Ali', 0, '01716447575', 0.00, 'KMCH', 0, '2022-06-03 01:19:59', '2024-04-03 06:36:11'),
(17, 'Dr.Sobuj', 0, '01944984623', 0.00, 'Paickgaca', 0, '2022-06-03 01:20:44', '2022-06-03 01:20:44'),
(18, 'Din Islam', 0, '01799486794', 0.00, 'Gopalgonj', 0, '2022-06-03 01:21:56', '2022-06-03 01:21:56'),
(19, 'Regaul Islam', 0, '01860735327', 0.00, 'Pirojpur', 0, '2022-06-03 01:22:53', '2022-06-03 01:22:53'),
(20, 'Jahangir', 0, '01918403067', 0.00, 'Mongla', 0, '2022-06-03 01:23:26', '2022-06-03 01:23:26'),
(21, 'Liton', 0, '01716448474', 0.00, 'Doulotpur', 0, '2022-06-03 01:24:12', '2022-06-03 01:24:12'),
(22, 'Mofiz Mollah', 0, '01765999948', 0.00, 'Gajirhat', 0, '2022-06-03 01:24:52', '2022-06-03 01:24:52'),
(23, 'Jahangir(Driver)', 0, '01918403067', 0.00, 'Mongla', 0, '2022-06-03 01:26:12', '2022-06-03 01:26:12'),
(24, 'Jahangir(Driver)', 0, '01918403067', 0.00, 'Mongla', 0, '2022-06-03 01:26:12', '2022-06-03 01:26:12'),
(25, 'Jahangir', 0, '01719178716', 0.00, 'Bagarhat', 0, '2022-06-03 01:27:15', '2022-06-03 01:27:15'),
(26, 'Kuddus', 0, '01712666723', 0.00, 'Tarokhada', 0, '2022-06-03 01:27:52', '2022-06-03 01:27:52'),
(27, 'Rahomot', 0, '01718646061', 0.00, 'Bagarhat', 0, '2022-06-03 01:29:22', '2022-06-03 01:29:22'),
(28, 'Dr.Safin', 0, '01715684205', 0.00, 'Gajirhat', 0, '2022-06-03 01:30:18', '2022-06-03 01:30:18'),
(29, 'Sumon', 0, '01930338582', 0.00, 'KMCH', 0, '2022-06-03 01:31:04', '2022-06-03 01:31:04'),
(30, 'Sohel(Driver)', 0, '01775927227', 0.00, 'Bagarhat', 0, '2022-06-03 01:32:30', '2022-06-03 01:32:30'),
(31, 'Baschu(Driver)', 0, '01911838780', 0.00, 'Koyra', 0, '2022-06-03 01:33:37', '2022-06-03 01:33:37'),
(32, 'Asaduzzaman(Driver)', 0, '01726067129', 0.00, 'Kesobpur', 0, '2022-06-03 01:34:35', '2022-06-03 01:34:35'),
(33, 'Alamgir Hossain(Driver)', 0, '01960028187', 0.00, 'Nawapara', 0, '2022-06-03 01:35:40', '2024-03-30 19:21:45'),
(34, 'Rakib Hossain(Driver)', 0, '01735352613', 0.00, 'Koyra', 0, '2022-06-03 01:36:34', '2022-06-03 01:36:34'),
(35, 'Hafizur Rahaman(Driver)', 0, '01914103983', 0.00, 'Boyra', 0, '2022-06-03 01:37:38', '2022-06-03 01:37:38'),
(36, 'Dr.Kamalesh Saha', 0, '01717593065', 0.00, 'Khulna', 0, '2022-06-03 01:39:17', '2022-06-03 01:39:17'),
(37, 'Dr.Monika Saha', 0, '01950711630', 0.00, 'Khulna', 0, '2022-06-03 01:40:08', '2022-06-11 20:32:15'),
(38, 'Dr.Monika Saha', 0, '01950711630', 0.00, 'Khulna', 0, '2022-06-03 01:40:08', '2022-06-03 01:40:08'),
(39, 'Dr.Debnath Talukdar', 0, '01711972506', 0.00, 'Khulna', 0, '2022-06-03 01:40:56', '2022-06-03 01:40:56'),
(40, 'Dr.Shibendu Mistry', 0, '01712994743', 0.00, 'Khulna', 0, '2022-06-03 01:42:04', '2022-06-03 01:42:04'),
(41, 'Dr.Milton Mollick', 0, '01715675889', 0.00, 'Khulna', 0, '2022-06-03 01:42:44', '2022-06-03 01:42:44'),
(42, 'Dr.Nirupom Mondal', 0, '01770887755', 0.00, 'Khulna', 0, '2022-06-03 01:44:28', '2022-06-03 01:44:28'),
(43, 'Masud Rana(Driver)', 0, '01733472021', 0.00, 'Bagarhat', 0, '2022-06-03 01:45:35', '2022-06-03 01:45:35'),
(44, 'Raju(Driver)', 0, '01776591590', 0.00, 'Sador Hospital,Bagarhat', 0, '2022-06-03 01:46:51', '2022-06-03 01:46:51'),
(45, 'Litu(Driver)', 0, '01725757121', 0.00, 'Bagarhat', 0, '2022-06-03 01:49:29', '2022-06-03 01:49:29'),
(46, 'Hasan(Driver)', 0, '01936881702', 0.00, 'Koyra', 0, '2022-06-03 01:51:57', '2023-02-10 07:29:34'),
(47, 'Pranto(Driver)', 0, '01795159710', 0.00, 'Bagarhat', 0, '2022-06-03 01:53:04', '2022-06-03 01:53:04'),
(48, 'Masum(Driver)', 0, '01790202212', 0.00, 'Bagarhat', 0, '2022-06-03 01:53:42', '2022-06-03 01:53:42'),
(49, 'Razzak(Drivar)', 0, '01719622675', 0.00, 'Bagarhat', 0, '2022-06-03 01:54:30', '2022-06-03 01:54:30'),
(50, 'Anamul(Driver)', 0, '01407332008', 0.00, 'Nawapara', 0, '2022-06-03 01:55:30', '2023-02-10 06:54:50'),
(51, 'Sumon Sheik', 0, '01734091060', 0.00, 'Pirojpur', 0, '2022-06-03 01:56:06', '2022-06-03 01:56:06'),
(52, 'Anima Clinic(Manager)', 0, '01932633694', 0.00, 'Paickgaca', 0, '2022-06-03 01:57:49', '2022-06-03 01:57:49'),
(53, 'Dr.Sunil', 0, '01712606053', 0.00, 'Takerhat', 0, '2022-06-03 01:58:32', '2022-06-03 01:58:32'),
(54, 'Dipankar', 0, '01701780974', 0.00, 'Dumuria', 0, '2022-06-03 01:59:07', '2022-06-03 01:59:07'),
(55, 'Kamruzzaman', 0, '01829951926', 0.00, 'N', 0, '2022-06-03 02:00:13', '2022-06-03 02:00:13'),
(56, 'Arif(Driver)', 0, '01925676889', 0.00, 'N', 0, '2022-06-03 02:01:07', '2022-06-03 02:01:07'),
(57, 'Arif(Driver)', 0, '01774933344', 0.00, 'Nawapara', 0, '2022-06-03 02:02:00', '2022-06-03 02:02:00'),
(58, 'Atik(Driver)', 0, '01766114011', 0.00, 'Fokirhat', 0, '2022-06-03 02:02:41', '2022-06-03 02:02:41'),
(59, 'Babu(Driver)', 0, '01745952707', 0.00, 'N', 0, '2022-06-03 02:03:17', '2022-06-03 02:03:17'),
(60, 'Borhan(Driver)', 0, '01719712638', 0.00, 'Gopalgonj', 0, '2022-06-03 02:04:14', '2022-06-03 02:05:55'),
(61, 'Rohim(Driver)', 0, '01923398109', 0.00, 'Paickgaca', 0, '2022-06-03 02:05:20', '2022-06-03 02:05:20'),
(62, 'Sultan(Driver)', 0, '01725316135', 0.00, 'N', 0, '2022-06-03 02:06:39', '2022-06-03 02:06:39'),
(63, 'Torikul(Driver)', 0, '01902789512', 0.00, 'N', 0, '2022-06-03 02:07:23', '2022-06-03 02:07:23'),
(64, 'Tuhin(Driver)', 0, '01757528900', 0.00, 'N', 0, '2022-06-03 02:08:10', '2022-06-03 02:08:10'),
(65, 'Rahaman', 0, '01921933690', 0.00, 'Khulna', 0, '2022-06-03 02:08:46', '2022-06-03 02:08:46'),
(66, 'SELF', 0, '01324166608', 0.00, 'SOUTH ZONE', 0, '2022-06-05 01:49:09', '2022-07-18 02:49:52'),
(67, 'Zia', 0, '01324166600', 0.00, 'Khulna', 0, '2022-06-06 04:26:20', '2022-06-06 04:26:20'),
(68, 'Tapash', 0, '01324166600', 0.00, 'Khulna', 0, '2022-06-06 04:28:17', '2022-06-06 04:28:17'),
(69, 'Liga', 0, '01972536114', 0.00, 'KMCH', 0, '2022-06-06 04:30:55', '2022-06-06 04:30:55'),
(70, 'Sifat', 0, '01842345636', 0.00, 'Khulna', 0, '2022-06-06 04:32:02', '2022-10-08 22:19:31'),
(71, 'Maruf Vai', 0, '01920086278', 0.00, 'Khulna', 0, '2022-06-06 04:33:55', '2022-06-06 04:33:55'),
(72, 'Office Cost', 0, '01324166600', 0.00, 'South Zone', 0, '2022-06-06 04:35:35', '2022-06-06 04:35:48'),
(73, 'AROBINDU', 0, '01324166600', 0.00, 'SOUTH ZONE', 0, '2022-07-02 10:34:29', '2022-07-02 10:34:29'),
(74, 'BASAR VAI', 0, '01324166600', 0.00, 'KHULNA', 0, '2022-07-02 10:42:08', '2022-07-02 10:42:08'),
(75, 'FORHAD', 0, '0', 0.00, 'KMCH', 0, '2022-08-14 09:23:27', '2022-08-14 09:23:27'),
(76, 'HASSAN UNIQUE', 0, '0', 0.00, 'UNIQUE', 0, '2022-08-14 09:41:39', '2022-08-14 09:41:39'),
(77, 'JONI UNIQUE', 0, '0', 0.00, 'UNIQUE', 0, '2022-08-14 09:42:12', '2022-08-14 09:42:12'),
(78, 'NASIM', 0, '01324166600', 0.00, 'KMCH', 0, '2022-10-13 02:42:30', '2022-10-13 02:42:30'),
(79, 'SINTIA', 0, '01324166600', 0.00, 'MEDICO LAB', 0, '2022-10-13 08:23:37', '2022-10-13 08:23:37'),
(80, 'CIFAT', 0, '01324166600', 0.00, 'N', 0, '2022-10-14 07:54:44', '2022-10-14 07:54:44'),
(81, 'SANJOY', 0, '01324166600', 0.00, 'N', 0, '2022-10-14 07:55:09', '2022-10-14 07:55:09'),
(82, 'SHIPRA', 0, '01324166600', 0.00, 'KHULNA', 1, '2022-10-16 10:25:18', '2022-10-16 10:28:08'),
(83, 'SHIPRA', 0, '01324166600', 0.00, 'KHULNA', 0, '2022-10-16 10:25:18', '2022-10-16 10:25:18'),
(84, 'SAJOL', 0, '01324166600', 0.00, 'KHULNA', 0, '2022-10-16 10:49:02', '2022-10-16 10:49:02'),
(85, 'ROWSHAN', 0, '01324166600', 0.00, 'KHULNA', 0, '2022-10-17 08:05:20', '2022-10-17 08:05:20'),
(86, 'HAFIZ', 0, '01911251913', 0.00, 'FULBARIGAT', 0, '2022-11-10 04:52:32', '2022-11-10 04:52:32'),
(87, 'DR.KOBIR(AKIJ)', 0, '0', 0.00, 'N', 0, '2022-12-27 08:03:27', '2022-12-27 08:03:27'),
(88, 'SELF', 0, '01324166600', 0.00, 'N', 1, '2022-12-28 06:59:21', '2022-12-28 07:00:02'),
(89, 'DR TUHIN', 0, '0', 0.00, 'N', 0, '2023-01-01 09:10:26', '2023-01-01 09:10:26'),
(90, 'HANNAN', 0, '0', 0.00, 'N', 0, '2023-01-01 09:10:47', '2023-01-01 09:10:47'),
(91, 'SALMA SISTER', 0, 'N', 0.00, 'N', 0, '2023-01-02 10:14:07', '2023-01-02 10:14:07'),
(92, 'PRODIP', 0, '01324166600', 0.00, 'BOYRA', 0, '2023-01-03 02:24:46', '2023-01-03 02:24:46'),
(93, 'SABBIR', 0, '0', 0.00, 'N', 0, '2023-01-04 08:55:28', '2023-01-04 08:55:28'),
(94, 'MR AKBAR', 0, '01753292910', 0.00, 'KHULNA', 0, '2023-01-09 00:21:35', '2023-01-09 00:21:35'),
(95, 'MRS SHIKHA', 0, '01714691098', 0.00, 'KHULNA', 0, '2023-01-09 00:23:04', '2023-01-09 00:23:04'),
(96, 'MD TUHIN', 0, '01984464553', 0.00, 'SARONKHOLA', 0, '2023-01-09 00:34:27', '2023-01-09 00:34:27'),
(97, 'MR SULTAN DRI', 0, '01725316135', 0.00, 'NOUAPARA', 0, '2023-01-09 00:36:17', '2023-01-09 00:36:17'),
(98, 'MR SULTAN DRI', 0, '01725316135', 0.00, 'NOUAPARA', 0, '2023-01-09 00:36:17', '2023-01-09 00:36:17'),
(99, 'MR ARIF DRI', 0, '01774933344', 0.00, 'SABA AMBULANCE', 0, '2023-01-09 00:37:46', '2023-01-09 00:37:46'),
(100, 'MR ABDUL HANNAN', 0, '01742726904', 0.00, 'NAIM DAI:', 0, '2023-01-09 00:40:23', '2023-01-09 00:40:23'),
(101, 'DR NISHAT ABDULLAH', 0, '0', 0.00, 'KHULNA', 0, '2023-01-10 09:49:03', '2023-01-10 09:49:03'),
(102, 'MR BARNAT', 0, 'N', 0.00, 'N', 0, '2023-01-10 10:23:49', '2023-01-10 10:23:49'),
(103, 'MR KAJOL', 0, 'NA', 0.00, 'KHULNA', 0, '2023-01-11 03:01:36', '2023-01-11 03:01:36'),
(104, 'SUVO', 0, '01637083633', 0.00, 'LABONE', 0, '2023-01-15 08:39:07', '2023-01-15 08:39:07'),
(105, 'SUVO', 0, '01637083633', 0.00, 'LABONE', 1, '2023-01-15 08:39:07', '2023-01-15 08:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `agenttransactions`
--

CREATE TABLE `agenttransactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agentdetail_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transitiontype` tinyint(4) NOT NULL DEFAULT 1,
  `comment` varchar(255) DEFAULT NULL,
  `paidorunpaid` tinyint(4) NOT NULL DEFAULT 0,
  `amount` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `receiveableamount` double DEFAULT NULL,
  `paidamount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agenttransactions`
--

INSERT INTO `agenttransactions` (`id`, `agentdetail_id`, `user_id`, `patient_id`, `transitiontype`, `comment`, `paidorunpaid`, `amount`, `discount`, `receiveableamount`, `paidamount`, `created_at`, `updated_at`) VALUES
(19, 52, 1, 7, 1, NULL, 1, 1100, 0, 1100, 100, '2023-02-08 18:00:00', '2023-02-10 07:41:42'),
(20, 52, 1, 8, 1, NULL, 1, 1100, 0, 1100, 100, '2023-02-09 18:00:00', '2023-02-10 07:48:19'),
(21, 52, 1, 7, 1, NULL, 1, 1300, 0, 1300, 300, '2023-02-10 18:00:00', '2023-02-10 07:49:31'),
(22, 52, 1, 8, 1, NULL, 1, 1300, 0, 1300, 200, '2023-02-09 18:00:00', '2023-02-10 07:51:13'),
(23, 16, 1, 5, 1, NULL, 0, 1100, 0, 1100, 0, '2023-02-09 18:00:00', '2023-02-10 08:48:30'),
(24, 3, 1, 1, 1, NULL, 0, 2500, 0, 2500, 0, '2023-02-09 18:00:00', '2023-02-10 14:02:39'),
(25, 33, 1, 4, 1, NULL, 1, 1300, 0, 1300, 100, '2023-02-09 18:00:00', '2023-02-10 14:46:51'),
(30, 3, 1, 4, 1, NULL, 0, 2477, 0, 2477, 0, '2023-02-19 18:00:00', '2023-02-20 11:22:05'),
(34, 3, 1, 1, 1, NULL, 1, NULL, NULL, NULL, 500, '2023-05-30 18:00:00', '2023-05-31 10:07:50'),
(35, 3, 1, 1, 1, NULL, 1, 1100, 0, 1100, 400, NULL, '2023-05-31 10:10:26'),
(36, 3, 1, 1, 1, NULL, 1, NULL, NULL, 1000, 1, '2023-05-30 18:00:00', '2023-05-31 17:42:05'),
(37, 3, 1, 1, 1, NULL, 0, 1400, 0, 1400, 0, '2023-10-03 18:00:00', '2023-10-03 21:30:25'),
(38, 3, 1, 1, 1, NULL, 0, 2000, 0, 2000, 0, '2023-10-03 18:00:00', '2023-10-03 22:28:33'),
(39, 3, 1, 1, 1, NULL, 0, 2600, 0, 2600, 0, '2023-10-03 18:00:00', '2023-10-03 22:40:35'),
(40, 3, 1, 1, 1, NULL, 0, 900, 0, 900, 0, '2023-10-05 18:00:00', '2023-10-06 17:04:57'),
(41, 3, 1, 1, 1, NULL, 0, 1100, 0, 1100, 0, '2023-10-06 18:00:00', '2023-10-07 07:40:26'),
(42, 3, 1, 1, 1, NULL, 0, 300, 0, 300, 0, '2023-10-06 18:00:00', '2023-10-07 08:02:32'),
(43, 3, 1, 1, 1, NULL, 0, 600, 0, 600, 0, '2023-10-06 18:00:00', '2023-10-07 09:20:24'),
(44, 3, 1, 1, 1, NULL, 0, 1000, 0, 1000, 60, '2024-01-14 18:00:00', '2024-01-15 15:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `areacodepolturies`
--

CREATE TABLE `areacodepolturies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `balance_of_businesses`
--

CREATE TABLE `balance_of_businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `balance` double(14,4) NOT NULL DEFAULT 0.0000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balance_of_businesses`
--

INSERT INTO `balance_of_businesses` (`id`, `balance`, `created_at`, `updated_at`) VALUES
(1, 426737.5000, '2023-01-22 17:22:40', '2024-04-28 07:49:11'),
(2, 0.0000, '2023-01-22 17:22:40', '2023-01-22 17:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `buy_return_medicine_from_companies`
--

CREATE TABLE `buy_return_medicine_from_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicinecomapnyname_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` bigint(20) UNSIGNED NOT NULL,
  `unit` double NOT NULL,
  `unit_price` double NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `due` double NOT NULL DEFAULT 0,
  `advance` double NOT NULL DEFAULT 0,
  `comment` varchar(255) DEFAULT NULL,
  `transitiontype` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cabinefeetransitions`
--

CREATE TABLE `cabinefeetransitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cabinelist_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `cabinetransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `starting` date DEFAULT NULL,
  `ending` date DEFAULT NULL,
  `gross_amount` double(12,2) NOT NULL DEFAULT 0.00,
  `paid` double(12,2) NOT NULL DEFAULT 0.00,
  `discount` double(12,2) NOT NULL DEFAULT 0.00,
  `adjust_with_advance` double(12,2) NOT NULL DEFAULT 0.00,
  `due` double(12,2) NOT NULL DEFAULT 0.00,
  `collection_from_previous_seat` double(12,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cabinefeetransitions`
--

INSERT INTO `cabinefeetransitions` (`id`, `cabinelist_id`, `user_id`, `patient_id`, `cabinetransaction_id`, `starting`, `ending`, `gross_amount`, `paid`, `discount`, `adjust_with_advance`, `due`, `collection_from_previous_seat`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 12, 9, '2023-02-06', '2023-02-09', 10800.00, 10800.00, 0.00, 0.00, 0.00, 0.00, '2023-02-11 16:21:19', '2023-02-11 16:21:19'),
(2, 9, 1, 25, 19, '2024-01-03', '2024-01-07', 17500.00, 17000.00, 500.00, 0.00, 0.00, 0.00, '2024-01-09 12:16:45', '2024-01-09 12:16:45'),
(3, 10, 1, 26, 20, '2024-01-09', '2024-01-09', 2700.00, 2000.00, 700.00, 0.00, 0.00, 0.00, '2024-01-09 19:15:59', '2024-01-09 19:15:59'),
(4, 11, 1, 27, 21, '2024-01-10', '2024-01-10', 2700.00, 2000.00, 700.00, 0.00, 0.00, 0.00, '2024-01-09 19:27:44', '2024-01-09 19:27:44'),
(5, 27, 1, 8, NULL, NULL, NULL, 1500.00, 1000.00, 500.00, 0.00, 0.00, 0.00, '2024-01-11 09:53:22', '2024-01-11 09:53:22'),
(6, 2, 1, 12, 9, '2023-02-10', '2024-01-01', 880200.00, 8000.00, 867192.00, 5008.00, 0.00, 0.00, '2024-03-01 11:28:36', '2024-03-01 11:28:36'),
(7, 3, 1, 19, 14, '2023-02-23', '2023-10-01', 596700.00, 50000.00, 546200.00, 500.00, 0.00, 0.00, '2024-02-26 18:00:00', '2024-03-01 12:18:39'),
(8, 12, 1, 19, 25, '2024-02-26', '2024-03-01', 316400.00, 307000.00, 7900.00, 1500.00, 0.00, 307900.00, '2024-02-29 18:00:00', '2024-03-01 12:44:31'),
(9, 3, 38, 31, 26, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2024-04-18 06:01:00', '2024-04-07 06:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `cabinelists`
--

CREATE TABLE `cabinelists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patientname` varchar(255) DEFAULT NULL,
  `price` double(14,4) NOT NULL,
  `booking_status` tinyint(4) NOT NULL DEFAULT 0,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cabinelists`
--

INSERT INTO `cabinelists` (`id`, `serial_no`, `patient_id`, `patientname`, `price`, `booking_status`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, '201', NULL, NULL, 2700.0000, 0, 1, '2022-01-25 07:39:15', '2022-01-25 07:40:37'),
(2, '201', 12, 'm', 2700.0000, 1, 0, '2022-02-05 01:49:21', '2023-02-06 17:51:53'),
(3, '202', 31, 'Abdus Samad', 2700.0000, 1, 0, '2022-02-05 01:49:37', '2024-03-02 13:08:45'),
(4, '211', NULL, NULL, 2700.0000, 0, 1, '2022-02-05 01:50:18', '2022-10-19 09:45:27'),
(5, '212', 20, 'Abdul Qadir', 2700.0000, 1, 0, '2022-02-05 01:50:26', '2023-02-24 11:49:08'),
(6, '213', 17, 'Abdul Sala,', 2700.0000, 1, 0, '2022-02-05 01:50:35', '2023-02-19 11:47:41'),
(7, '301', 21, 'Asif Haider', 2700.0000, 1, 0, '2022-02-05 01:50:50', '2023-02-25 09:04:28'),
(8, '302', 22, 'Saleh', 2700.0000, 1, 0, '2022-02-05 01:50:56', '2023-04-10 16:32:33'),
(9, '303', 25, 'samsu', 3500.0000, 1, 0, '2022-02-05 01:51:05', '2024-01-09 09:59:56'),
(10, '308', 26, 'hasan', 2700.0000, 1, 0, '2022-02-05 01:51:30', '2024-01-09 10:22:33'),
(11, '309', 27, 'jubayer', 2700.0000, 1, 0, '2022-02-05 01:51:45', '2024-01-09 19:18:43'),
(12, 'G/B Male-01', 19, 'Hasan Sabah', 1700.0000, 1, 0, '2022-03-11 12:45:07', '2024-03-01 12:41:36'),
(13, 'G/B Male-02', 32, 'Test Patient', 1700.0000, 1, 0, '2022-03-11 12:45:38', '2024-03-03 17:22:22'),
(14, 'G/B Male-03', NULL, NULL, 1700.0000, 0, 0, '2022-03-11 12:45:58', '2023-01-09 02:17:50'),
(15, 'G/B Male-04', NULL, NULL, 1700.0000, 0, 0, '2022-03-11 12:46:24', '2023-01-14 01:58:31'),
(16, 'G/B Male-05', NULL, NULL, 1700.0000, 0, 0, '2022-03-11 12:46:49', '2023-01-14 01:19:16'),
(17, 'G/B Female-01', 23, 'jasim', 1700.0000, 1, 0, '2022-03-11 12:47:19', '2024-01-08 10:56:55'),
(18, 'G/B Female-02', 28, 'Habib', 1700.0000, 1, 0, '2022-03-11 12:47:44', '2024-01-11 09:59:04'),
(19, 'G/B Female-03', 29, 'kamrul', 1700.0000, 1, 0, '2022-03-11 12:48:14', '2024-03-01 10:37:33'),
(20, 'G/B Female-04', 30, 'Mahmud', 1700.0000, 1, 0, '2022-03-11 12:48:48', '2024-03-01 11:01:57'),
(21, 'Cabin/209', NULL, NULL, 2700.0000, 0, 1, '2022-03-11 12:52:58', '2022-11-30 00:06:31'),
(22, 'Post Operative-01', NULL, NULL, 1700.0000, 0, 0, '2022-03-21 14:27:57', '2022-12-23 09:04:01'),
(23, 'Post Operative-02', NULL, NULL, 1700.0000, 0, 0, '2022-03-21 14:28:28', '2022-11-14 09:26:51'),
(24, 'Post Operative-03', NULL, NULL, 1700.0000, 0, 0, '2022-03-21 14:28:39', '2022-11-12 22:50:24'),
(25, 'Post Operative-04', NULL, NULL, 1700.0000, 0, 0, '2022-03-21 14:28:48', '2022-11-03 08:36:25'),
(26, 'Post Operative-05', NULL, NULL, 1700.0000, 0, 0, '2022-10-19 09:41:41', '2022-11-03 08:24:51'),
(27, '211', 11, 'kh', 2000.0000, 1, 0, '2022-11-28 01:29:57', '2023-02-06 17:32:58'),
(28, '209', 7, 'Abrur rahman', 2000.0000, 1, 0, '2022-12-15 01:13:31', '2024-03-02 12:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `cabinetransactions`
--

CREATE TABLE `cabinetransactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cabinelist_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agentdetail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `refdoctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `diagnosis` varchar(255) DEFAULT NULL,
  `comission` double(12,2) NOT NULL DEFAULT 0.00,
  `starting` date DEFAULT NULL,
  `gross_amount_admisson_fee` double(12,2) NOT NULL DEFAULT 0.00,
  `admissionfee` double(12,2) NOT NULL DEFAULT 0.00,
  `ending` date DEFAULT NULL,
  `tillpaiddate` date DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `vat` double DEFAULT NULL,
  `total_before_vat_dis` double DEFAULT NULL,
  `total_after_vat_dis` double DEFAULT NULL,
  `total_after_adjustment` double DEFAULT NULL,
  `due` double DEFAULT NULL,
  `collection_from_previous_seat` double(12,2) DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cabinetransactions`
--

INSERT INTO `cabinetransactions` (`id`, `cabinelist_id`, `user_id`, `doctor_id`, `agentdetail_id`, `refdoctor_id`, `patient_id`, `diagnosis`, `comission`, `starting`, `gross_amount_admisson_fee`, `admissionfee`, `ending`, `tillpaiddate`, `discount`, `vat`, `total_before_vat_dis`, `total_after_vat_dis`, `total_after_adjustment`, `due`, `collection_from_previous_seat`, `created_at`, `updated_at`) VALUES
(2, 28, 1, NULL, NULL, NULL, 7, NULL, 0.00, '2023-02-05', 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0.00, '2023-02-05 15:17:28', '2023-02-06 17:14:51'),
(3, 27, 1, NULL, NULL, NULL, 8, NULL, 0.00, '2023-02-06', 0.00, 0.00, '2023-02-06', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0.00, '2023-02-06 15:13:31', '2023-02-06 15:14:25'),
(4, 27, 1, NULL, NULL, NULL, 9, NULL, 0.00, '2023-01-30', 0.00, 0.00, '2023-02-03', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0.00, '2023-02-06 17:00:19', '2023-02-06 17:02:21'),
(5, 5, 1, NULL, NULL, NULL, 9, NULL, 0.00, '2023-02-03', 0.00, 0.00, '2023-02-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, '2023-02-06 17:02:21', '2023-02-06 17:07:06'),
(6, 6, 1, NULL, NULL, NULL, 10, NULL, 0.00, '2023-01-30', 0.00, 0.00, '2023-02-03', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0.00, '2023-02-06 17:15:37', '2023-02-06 17:16:33'),
(7, 27, 1, NULL, NULL, NULL, 10, NULL, 0.00, '2023-02-03', 0.00, 0.00, '2023-02-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, '2023-02-06 17:16:33', '2023-02-06 17:17:16'),
(8, 27, 1, NULL, NULL, NULL, 11, NULL, 0.00, '2023-02-06', 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0.00, '2023-02-06 17:32:41', '2023-02-06 17:32:58'),
(9, 2, 1, NULL, NULL, NULL, 12, NULL, 0.00, '2023-02-06', 0.00, 0.00, NULL, '2024-01-01', NULL, NULL, NULL, NULL, NULL, 0, 0.00, '2023-02-06 17:51:53', '2024-03-01 11:28:36'),
(10, 5, 1, NULL, NULL, NULL, 13, NULL, 0.00, '2023-02-10', 0.00, 0.00, '2023-02-18', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0.00, '2023-02-10 11:03:47', '2023-02-18 16:52:46'),
(11, 3, 1, NULL, NULL, NULL, 15, NULL, 0.00, '2023-02-12', 500.00, 500.00, '2023-02-18', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0.00, '2023-02-11 19:30:31', '2023-02-18 14:53:55'),
(12, 6, 1, NULL, NULL, NULL, 17, NULL, 0.00, '2023-02-19', 500.00, 500.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0.00, '2023-02-19 11:47:41', '2023-02-19 11:47:41'),
(14, 3, 1, NULL, NULL, NULL, 19, NULL, 0.00, '2023-02-23', 0.00, 0.00, '2024-02-25', '2023-10-01', NULL, NULL, NULL, NULL, NULL, 0, 0.00, '2023-02-23 16:12:20', '2024-03-01 12:41:36'),
(15, 5, 1, NULL, NULL, NULL, 20, NULL, 0.00, '2023-02-23', 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0.00, '2023-02-24 11:49:08', '2023-02-24 11:49:08'),
(16, 7, 1, NULL, NULL, NULL, 21, NULL, 0.00, '2023-02-24', 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0.00, '2023-02-25 09:04:28', '2023-02-25 09:04:28'),
(17, 8, 1, NULL, NULL, NULL, 22, NULL, 0.00, '2023-04-10', 500.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 500, 0.00, '2023-04-10 16:32:33', '2023-04-10 16:32:33'),
(18, 17, 1, NULL, NULL, NULL, 23, NULL, 0.00, '2024-01-08', 1500.00, 1000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 500, 0.00, '2024-01-08 10:56:55', '2024-01-08 10:56:55'),
(19, 9, 1, NULL, NULL, NULL, 25, NULL, 0.00, '2024-01-03', 800.00, 400.00, NULL, '2024-01-07', NULL, NULL, NULL, NULL, NULL, 400, 0.00, '2024-01-09 09:59:56', '2024-01-09 12:16:45'),
(20, 10, 1, NULL, NULL, NULL, 26, NULL, 0.00, '2024-01-09', 400.00, 400.00, NULL, '2024-01-09', NULL, NULL, NULL, NULL, NULL, 0, 0.00, '2024-01-09 10:22:33', '2024-01-09 19:15:59'),
(21, 11, 1, NULL, NULL, NULL, 27, NULL, 0.00, '2024-01-10', 10000.00, 5000.00, NULL, '2024-01-10', NULL, NULL, NULL, NULL, NULL, 5000, 0.00, '2024-01-09 19:18:43', '2024-01-09 19:27:44'),
(22, 18, 1, NULL, NULL, NULL, 28, NULL, 0.00, '2024-01-11', 1000.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 0.00, '2024-01-11 09:59:04', '2024-01-11 09:59:04'),
(23, 19, 1, NULL, NULL, NULL, 29, NULL, 0.00, '2024-02-29', 230.00, 230.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0.00, '2024-03-01 10:37:33', '2024-03-01 10:37:33'),
(24, 20, 1, NULL, NULL, NULL, 30, NULL, 0.00, '2024-02-29', 50.00, 50.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0.00, '2024-03-01 11:01:57', '2024-03-01 11:01:57'),
(25, 12, 1, NULL, NULL, NULL, 19, NULL, 0.00, '2024-02-26', 0.00, 0.00, NULL, '2024-03-01', NULL, NULL, NULL, NULL, NULL, NULL, 0.00, '2024-03-01 12:41:36', '2024-03-01 12:44:31'),
(26, 3, 1, NULL, NULL, NULL, 31, NULL, 0.00, '2024-02-29', 501.00, 501.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0.00, '2024-03-02 13:08:45', '2024-03-02 13:08:45'),
(27, 13, 1, NULL, NULL, NULL, 32, NULL, 0.00, '2024-03-03', 1101.00, 1000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 101, 0.00, '2024-03-03 12:15:23', '2024-03-03 12:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `cabinetransferhistos`
--

CREATE TABLE `cabinetransferhistos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cabinelist_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `cabinetransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `paid_tiil_date` date DEFAULT NULL,
  `ending` date DEFAULT NULL,
  `due` double(12,2) NOT NULL DEFAULT 0.00,
  `gross_amount_from_previous` double(12,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cabinetransferhistos`
--

INSERT INTO `cabinetransferhistos` (`id`, `cabinelist_id`, `user_id`, `patient_id`, `cabinetransaction_id`, `paid_tiil_date`, `ending`, `due`, `gross_amount_from_previous`, `created_at`, `updated_at`) VALUES
(1, 27, 1, 9, 4, '2023-01-30', '2023-02-03', 10000.00, 10000.00, '2023-02-06 17:02:21', '2023-02-06 17:02:21'),
(2, 6, 1, 10, 6, '2023-01-30', '2023-02-03', 13500.00, 13500.00, '2023-02-06 17:16:33', '2023-02-06 17:16:33'),
(3, 3, 1, 19, 14, '2023-10-01', '2024-02-25', 396900.00, 993600.00, '2024-03-01 12:41:36', '2024-03-01 12:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `cashtransitions`
--

CREATE TABLE `cashtransitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pathologyorderfromotherinsitute_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctorappointmenttransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reportorder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `surgerytransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `serviceorder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cabinefeetransition_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cabinetransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `khoroch_transition_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dhar_shod_othoba_advance_er_mal_buje_pawa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Taka_uttolon_transition_id` bigint(20) UNSIGNED DEFAULT NULL,
  `return_order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `employeesalarytransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `duetransition_id` bigint(20) UNSIGNED DEFAULT NULL,
  `longterminstallerorder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agenttransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctorCommissionTransition_id` bigint(20) UNSIGNED DEFAULT NULL,
  `medicinecompanyorder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `medicine_comapnyer_dena_pawan_shod_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_type` tinyint(4) DEFAULT NULL,
  `customer_type` tinyint(4) DEFAULT NULL,
  `transitionproducttype` tinyint(4) DEFAULT NULL,
  `gorssamount` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `advance_deposit_minus` int(10) DEFAULT NULL,
  `amount_after_discount` double DEFAULT NULL,
  `deposit` double NOT NULL DEFAULT 0,
  `withdrwal` double NOT NULL DEFAULT 0,
  `debit` double DEFAULT NULL,
  `credit` double DEFAULT NULL,
  `description` text DEFAULT NULL,
  `customer_joma` int(10) DEFAULT NULL,
  `customer_baki` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cashtransitions`
--

INSERT INTO `cashtransitions` (`id`, `patient_id`, `user_id`, `doctor_id`, `supplier_id`, `pathologyorderfromotherinsitute_id`, `doctorappointmenttransaction_id`, `order_id`, `reportorder_id`, `surgerytransaction_id`, `serviceorder_id`, `cabinefeetransition_id`, `cabinetransaction_id`, `khoroch_transition_id`, `dhar_shod_othoba_advance_er_mal_buje_pawa_id`, `Taka_uttolon_transition_id`, `return_order_id`, `employeesalarytransaction_id`, `duetransition_id`, `longterminstallerorder_id`, `agenttransaction_id`, `doctorCommissionTransition_id`, `medicinecompanyorder_id`, `medicine_comapnyer_dena_pawan_shod_id`, `company_type`, `customer_type`, `transitionproducttype`, `gorssamount`, `discount`, `advance_deposit_minus`, `amount_after_discount`, `deposit`, `withdrwal`, `debit`, `credit`, `description`, `customer_joma`, `customer_baki`, `created_at`, `updated_at`) VALUES
(323, 32, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 10, 201, 0, NULL, 201, 201, 0, 0, 201, 'Advance Deposit Paid by Test Patient Patinet ID: 32Cabine Admission ID:27', 201, 0, '2024-03-02 18:00:00', '2024-03-03 12:15:24'),
(324, 32, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 9, 1101, 0, NULL, 1101, 1000, 0, 101, 1000, 'Admission Fees Paid by Test Patient Patinet ID: 32Cabine Admission ID:27', 0, 101, '2024-03-02 18:00:00', '2024-03-03 12:15:24'),
(337, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 43, NULL, 299, NULL, NULL, NULL, NULL, NULL, 2, 4, 2, 800, 0, NULL, 800, 0, 800, 0, 0, 'Pahermachy Refund on Cash for Returning Medicine by the Patinet Name: Abrur rahman Patient ID: 7 Return Medicine Trans ID 43 Due Trans ID: 299 Data Entry By: BICTSOFT', NULL, NULL, '2024-03-09 11:29:12', '2024-03-09 11:29:46'),
(338, 11, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 44, NULL, 300, NULL, NULL, NULL, NULL, NULL, 2, 4, 2, 210, 0, NULL, 210, 0, 210, 0, 0, 'Pahermachy Refund on Cash for Returning Medicine by the Patinet Name: Krishna Rani Patient ID: 11 Return Medicine Trans ID 44 Due Trans ID: 300 Data Entry By: BICTSOFT', NULL, NULL, '2024-03-09 11:29:12', '2024-03-09 11:30:08'),
(339, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 246, NULL, 2, NULL, 18, 6, 0, NULL, 6, 0, 0, 0, 0, 'Money Paid to the Medicine Company:ACI Medicine Company Transition Order ID:246', NULL, NULL, '2024-03-09 12:50:37', '2024-03-09 12:50:37'),
(342, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 249, NULL, 2, NULL, 18, 175, 0, NULL, 175, 0, 0, 0, 0, 'Money Paid to the Medicine Company:ACI Medicine Company Transition Order ID:249', NULL, NULL, '2024-03-09 12:57:10', '2024-03-09 12:57:10'),
(343, 30, 1, NULL, NULL, NULL, NULL, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 3, 0, 0, 3, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:Mahmud Patient ID: 30 Medicine Order ID:19', 0, 3, '2024-03-09 12:58:47', '2024-03-09 13:00:10'),
(344, 30, 1, NULL, NULL, NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 35, 0, 0, 35, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:Mahmud Patient ID: 30 Medicine Order ID:20', 0, 35, '2024-03-09 12:58:47', '2024-03-09 13:01:29'),
(345, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 45, NULL, 303, NULL, NULL, NULL, NULL, NULL, 2, 4, 2, 3, 0, NULL, 3, 0, 3, 0, 0, 'Pahermachy Refund on Cash for Returning Medicine by the Patinet Name: Abrur rahman Patient ID: 7 Return Medicine Trans ID 45 Due Trans ID: 303 Data Entry By: BICTSOFT', NULL, NULL, '2024-03-09 13:03:14', '2024-03-09 13:06:12'),
(346, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 46, NULL, 304, NULL, NULL, NULL, NULL, NULL, 2, 4, 2, 35, 0, NULL, 35, 0, 35, 0, 0, 'Pahermachy Refund on Cash for Returning Medicine by the Patinet Name: Abrur rahman Patient ID: 7 Return Medicine Trans ID 46 Due Trans ID: 304 Data Entry By: BICTSOFT', NULL, NULL, '2024-03-09 13:03:14', '2024-03-09 13:06:44'),
(347, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, NULL, 2, NULL, 18, 3, 0, NULL, 3, 0, 0, 0, 0, 'Money Paid to the Medicine Company:ACI Medicine Company Transition Order ID:250', NULL, NULL, '2024-03-09 13:09:30', '2024-03-09 13:09:30'),
(348, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 251, NULL, 2, NULL, 18, 3, 0, NULL, 3, 0, 0, 0, 0, 'Money Paid to the Medicine Company:ACI Medicine Company Transition Order ID:251', NULL, NULL, '2024-03-09 13:09:58', '2024-03-09 13:09:58'),
(349, 33, 1, NULL, NULL, NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 100, 0, 0, 100, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:ruhin Patient ID: 33 Medicine Order ID:21', 0, 100, '2024-03-11 06:07:51', '2024-03-17 06:09:35'),
(350, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 261, NULL, 2, NULL, 18, 200, 0, NULL, 200, 0, 0, 0, 0, 'Money Paid to the Medicine Company:Abid Medicine Company Transition Order ID:261', NULL, NULL, '2024-03-17 06:17:53', '2024-03-17 06:17:53'),
(351, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 262, NULL, 2, NULL, 18, 100, 0, NULL, 100, 0, 0, 0, 0, 'Money Paid to the Medicine Company:Abid Medicine Company Transition Order ID:262', NULL, NULL, '2024-03-17 06:21:23', '2024-03-17 06:21:23'),
(352, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 48, NULL, 307, NULL, NULL, NULL, NULL, NULL, 2, 4, 2, 100, 0, NULL, 100, 0, 100, 0, 0, 'Pahermachy Refund on Cash for Returning Medicine by the Patinet Name: Abrur rahman Patient ID: 7 Return Medicine Trans ID 48 Due Trans ID: 307 Data Entry By: BICTSOFT', NULL, NULL, '2024-03-14 09:07:10', '2024-03-17 09:07:51'),
(353, 33, 1, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 300, 0, 0, 300, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:ruhin Patient ID: 33 Medicine Order ID:22', 0, 300, '2024-03-17 09:09:57', '2024-03-17 09:10:19'),
(354, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 263, NULL, 2, NULL, 18, 200, 0, NULL, 200, 0, 0, 0, 0, 'Money Paid to the Medicine Company:Abid Medicine Company Transition Order ID:263', NULL, NULL, '2024-03-17 09:14:08', '2024-03-17 09:14:08'),
(355, 34, 1, NULL, NULL, NULL, NULL, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 200, 0, 0, 200, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:rafi Patient ID: 34 Medicine Order ID:23', 0, 200, '2024-03-10 18:27:09', '2024-03-17 18:28:52'),
(356, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 265, NULL, 2, NULL, 18, 400, 0, NULL, 400, 0, 0, 0, 0, 'Money Paid to the Medicine Company:Abid Medicine Company Transition Order ID:265', NULL, NULL, '2024-03-17 19:10:13', '2024-03-17 19:10:13'),
(357, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 266, NULL, 2, NULL, 18, 200, 0, NULL, 200, 0, 0, 0, 0, 'Money Paid to the Medicine Company:Abid Medicine Company Transition Order ID:266', NULL, NULL, '2024-03-17 19:11:55', '2024-03-17 19:11:55'),
(359, 34, 1, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 600, 0, 0, 600, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:rafi Patient ID: 34 Medicine Order ID:24', 0, 600, '2024-03-14 19:20:39', '2024-03-17 19:21:31'),
(360, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 267, NULL, 2, NULL, 18, 400, 0, NULL, 400, 0, 0, 0, 0, 'Money Paid to the Medicine Company:Abid Medicine Company Transition Order ID:267', NULL, NULL, '2024-03-17 19:23:20', '2024-03-17 19:23:20'),
(361, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 83, NULL, NULL, 2, NULL, 17, 200, 0, NULL, 200, 0, 200, 0, 0, 'Money Withdrawl for giving Commission/ Share to the Doctor : Dr.Nirupom Mondal;  Doctor  Commission/share  Transitions ID : 83 Data Entry By: BICTSOFT', NULL, NULL, '2024-03-30 14:38:07', '2024-03-30 14:38:07'),
(362, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 84, NULL, NULL, 2, NULL, 17, 200, 0, NULL, 200, 0, 200, 0, 0, 'Money Withdrawl for giving Commission/ Share to the Doctor : Dr.Parthaya Ghosh;  Doctor  Commission/share  Transitions ID : 84 Data Entry By: BICTSOFT', NULL, NULL, '2024-03-30 14:45:47', '2024-03-30 14:45:47'),
(366, 37, 1, NULL, NULL, NULL, NULL, NULL, 142, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 1300, 0, 0, 1300, 0, 0, 0, 0, 'Pathology Bill from Patinet Name:Abrur rahman Patient ID: 37 Pathology Order ID:142', 0, 1300, '2024-03-23 19:22:00', '2024-03-30 19:23:00'),
(369, 17, 38, NULL, NULL, NULL, NULL, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 400, 0, 400, 400, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:Abdul Sala, Patient ID: 17 Medicine Order ID:25', 0, 400, '2024-04-03 07:04:27', '2024-04-03 07:09:52'),
(375, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 269, NULL, 2, NULL, 18, 40000, 0, NULL, 40000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:ACI Medicine Company Transition Order ID:269', NULL, NULL, '2024-04-06 10:03:16', '2024-04-06 10:03:16'),
(376, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 270, NULL, 2, NULL, 18, 4000, 0, NULL, 4000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:ACI Medicine Company Transition Order ID:270', NULL, NULL, '2024-04-06 10:51:02', '2024-04-06 10:51:02'),
(377, 32, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 325, NULL, NULL, NULL, NULL, NULL, 1, 2, 2, 34, 23, NULL, 11, 11, 0, 0, 34, 'Pahermachy Due Payment from Patinet Name: Test Patient Patient ID: 32 Due Trans ID: 325 Data Entry By: main', NULL, NULL, '2024-04-07 05:46:55', '2024-04-07 05:46:55'),
(378, 32, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 326, NULL, NULL, NULL, NULL, NULL, 2, 4, 2, 45, 0, NULL, 45, 0, 45, 0, 0, 'Pahermachy Refund to the Patinet Name: Test Patient Patient ID: 32 Due Trans ID: 326 Data Entry By: main', NULL, NULL, '2024-04-07 05:46:55', '2024-04-07 05:46:55'),
(379, 31, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'Cabine Fees from Patinet Name: Abdus Samad Patient ID: 31 Cabine Fees Trans ID: 9 Data Entry By: main', NULL, NULL, '2024-04-18 06:01:00', '2024-04-07 06:01:35'),
(380, 7, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 6, 1000, 0, NULL, 1000, 0, 0, 1000, 0, 'Service Charge from Patinet Name:Abrur rahman Patient ID: 7 Service Charge Order ID:11', NULL, NULL, '2024-04-12 07:50:00', '2024-04-07 07:50:54'),
(381, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 13, 665, 0, NULL, 665, 0, 665, 0, 0, 'Money Withdrawl for : Oxyzen Buying supplier Name : supplier 1Expenditur Transition ID : 4at the Date: 2024-04-11T17:08 Data Entry By: main', NULL, NULL, '2024-04-07 11:08:03', '2024-04-07 11:08:03'),
(382, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 13, 12, 0, NULL, 12, 0, 12, 0, 0, 'Money Withdrawl for : Oxyzen Buying supplier Name : supplier 1Expenditur Transition ID : 5at the Date: 2024-04-19T17:08 Data Entry By: main', NULL, NULL, '2024-04-07 11:08:29', '2024-04-07 11:08:29'),
(383, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 13, 545, 0, NULL, 545, 0, 545, 0, 0, 'Money Withdrawl for : Oxyzen Buying supplier Name : suppler 2Expenditur Transition ID : 6at the Date: 2024-05-09T17:11 Data Entry By: main', NULL, NULL, '2024-04-07 11:11:32', '2024-04-07 11:11:32'),
(384, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 13, 45, 0, NULL, 45, 0, 45, 0, 0, 'Money Withdrawl for : Oxyzen Buying supplier Name : supplier 1Expenditur Transition ID : 7at the Date: 2024-04-09T17:12 Data Entry By: main', NULL, NULL, '2024-04-07 11:12:04', '2024-04-07 11:12:04'),
(385, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 13, 100, 0, NULL, 100, 0, 100, 0, 0, 'Money Withdrawl for : Oxyzen Buying supplier Name : supplier 1Expenditur Transition ID : 8at the Date: 2024-04-18T17:15 Data Entry By: main', NULL, NULL, '2024-04-07 11:15:23', '2024-04-07 11:15:23'),
(386, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 13, 454, 0, NULL, 454, 0, 454, 0, 0, 'Money Withdrawl for : Carbon-dy-oxide supplier Name : supplier 1Expenditur Transition ID : 9at the Date: 2024-04-25T17:25 Data Entry By: main', NULL, NULL, '2024-04-07 11:25:35', '2024-04-07 11:25:35'),
(387, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 14, 12, 0, NULL, 12, 0, 12, 0, 0, 'Money Withdrawl for Due Payment to the supplier Name : suppler 2Supplier Due Payment Transition ID : 2at the Date: 2024-04-12T17:27 Data Entry By: main', NULL, NULL, '2024-04-07 11:27:46', '2024-04-07 11:27:46'),
(389, NULL, 38, NULL, 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 4, 1300, 260, NULL, 1040, 0, 0, 0, 1040, 'Pathology Test done from :suppler 2 for the Patient ID: 4Patient Name: Hasan Mahmud Pathology Outside-Order ID:5', NULL, NULL, '2024-04-07 11:35:21', '2024-04-07 11:35:21'),
(391, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 2, NULL, 18, 1000, 0, NULL, 1000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:abc1 Medicine Company Transition Order ID:3', NULL, NULL, '2024-04-07 15:05:10', '2024-04-07 15:05:10'),
(392, NULL, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, NULL, 18, 25, 0, NULL, 25, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc1 Medicine Company Transition Order ID:1', NULL, NULL, '2024-04-07 16:00:19', '2024-04-07 16:00:19'),
(393, 7, 40, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 50, 0, 0, 50, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:Abrur rahman Patient ID: 7 Medicine Order ID:30', 0, 50, '2024-04-07 16:02:09', '2024-04-07 16:03:33'),
(394, NULL, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, 2, NULL, 18, 60, 0, NULL, 60, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc1 Medicine Company Transition Order ID:7', NULL, NULL, '2024-04-07 18:21:56', '2024-04-07 18:21:56'),
(395, NULL, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, NULL, 18, 25, 0, NULL, 25, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc1 Medicine Company Transition Order ID:1', NULL, NULL, '2024-04-07 18:32:03', '2024-04-07 18:32:03'),
(396, 7, 40, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 10, 0, 10, 10, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:Abrur rahman Patient ID: 7 Medicine Order ID:1', 0, 10, '2024-04-07 18:40:11', '2024-04-07 18:41:34'),
(397, 11, 40, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 10, 0, 0, 10, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:Krishna Rani Patient ID: 11 Medicine Order ID:2', 0, 10, '2024-04-07 18:46:55', '2024-04-07 18:49:01'),
(398, 7, 40, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 100, 0, 0, 100, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:Abrur rahman Patient ID: 7 Medicine Order ID:3', 0, 100, '2024-04-07 18:46:55', '2024-04-07 18:49:39'),
(399, NULL, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 160, 0, NULL, 160, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-07 18:52:47', '2024-04-07 18:52:47'),
(400, NULL, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 2, NULL, 18, 3200, 0, NULL, 3200, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:3', NULL, NULL, '2024-04-07 18:53:54', '2024-04-07 18:53:54'),
(401, NULL, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 2, NULL, 18, 160, 0, NULL, 160, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:4', NULL, NULL, '2024-04-07 18:55:07', '2024-04-07 18:55:07'),
(402, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 800, 0, NULL, 800, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc1 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-09 07:50:36', '2024-04-09 07:50:36'),
(403, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 4000, 0, NULL, 4000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-09 07:56:54', '2024-04-09 07:56:54'),
(404, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 2, NULL, 18, 4000, 0, NULL, 4000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc1 Medicine Company Transition Order ID:3', NULL, NULL, '2024-04-09 07:58:28', '2024-04-09 07:58:28'),
(405, 1, 38, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 2000, 0, 70, 2000, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:4', 0, 2000, '2024-04-09 08:11:43', '2024-04-09 08:11:58'),
(406, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 2000, 0, NULL, 2000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-09 09:50:42', '2024-04-09 09:50:42'),
(407, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 1200, 0, NULL, 1200, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc1 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-09 09:56:13', '2024-04-09 09:56:13'),
(408, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 2, NULL, 18, 500, 0, NULL, 500, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc3 Medicine Company Transition Order ID:3', NULL, NULL, '2024-04-09 09:58:18', '2024-04-09 09:58:18'),
(409, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 2, NULL, 18, 1200, 0, NULL, 1200, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:4', NULL, NULL, '2024-04-09 10:05:19', '2024-04-09 10:05:19'),
(410, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, 2, NULL, 18, 200, 0, NULL, 200, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:6', NULL, NULL, '2024-04-09 10:15:57', '2024-04-09 10:15:57'),
(411, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, 2, NULL, 18, 240, 0, NULL, 240, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc1 Medicine Company Transition Order ID:7', NULL, NULL, '2024-04-09 10:19:12', '2024-04-09 10:19:12'),
(412, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, 2, NULL, 18, 240, 0, NULL, 240, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc1 Medicine Company Transition Order ID:8', NULL, NULL, '2024-04-09 10:19:54', '2024-04-09 10:19:54'),
(413, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, NULL, 2, NULL, 18, 240, 0, NULL, 240, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc3 Medicine Company Transition Order ID:9', NULL, NULL, '2024-04-09 10:22:03', '2024-04-09 10:22:03'),
(414, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, 2, NULL, 18, 80000, 0, NULL, 80000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:12', NULL, NULL, '2024-04-09 10:29:17', '2024-04-09 10:29:17'),
(415, 1, 38, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 1000, 0, 0, 1000, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:5', 0, 1000, '2024-04-09 10:42:02', '2024-04-09 10:43:52'),
(416, 1, 38, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 50, 0, 0, 50, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:6', 0, 50, '2024-04-09 10:42:02', '2024-04-09 10:46:00'),
(417, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 1000, 0, NULL, 1000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-09 10:58:13', '2024-04-09 10:58:13'),
(418, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 2, NULL, 18, 2000, 0, NULL, 2000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:3', NULL, NULL, '2024-04-09 10:59:05', '2024-04-09 10:59:05'),
(419, 1, 38, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 400, 0, 0, 400, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:7', 0, 400, '2024-04-09 11:24:08', '2024-04-09 11:25:05'),
(420, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 100, 0, NULL, 100, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-09 18:07:03', '2024-04-09 18:07:03'),
(421, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 2, NULL, 18, 250, 0, NULL, 250, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:3', NULL, NULL, '2024-04-09 18:07:54', '2024-04-09 18:07:54'),
(422, 1, 38, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 12100, 0, 0, 12100, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:8', 0, 12100, '2024-04-09 18:13:54', '2024-04-09 18:14:37'),
(423, 1, 38, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 10, 0, 0, 10, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:9', 0, 10, '2024-04-09 19:58:08', '2024-04-09 19:58:38'),
(424, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 1000, 0, NULL, 1000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-10 08:04:40', '2024-04-10 08:04:40'),
(425, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 2, NULL, 18, 600, 0, NULL, 600, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:3', NULL, NULL, '2024-04-10 08:05:14', '2024-04-10 08:05:14'),
(426, 1, 38, NULL, NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 200, 0, 0, 200, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:10', 0, 200, '2024-04-10 08:05:22', '2024-04-10 08:06:08'),
(427, 1, 38, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 600, 0, 0, 600, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:11', 0, 600, '2024-04-16 08:05:22', '2024-04-10 08:07:03'),
(428, 1, 38, NULL, NULL, NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 5, 0, 0, 5, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:12', 0, 5, '2024-04-10 13:15:25', '2024-04-10 13:15:54'),
(429, 7, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 54, NULL, 340, NULL, NULL, NULL, NULL, NULL, 2, 4, 2, 25, 0, NULL, 25, 0, 25, 0, 0, 'Pahermachy Refund on Cash for Returning Medicine by the Patinet Name: Abrur rahman Patient ID: 7 Return Medicine Trans ID 54 Due Trans ID: 340 Data Entry By: main', NULL, NULL, '2024-04-10 13:16:57', '2024-04-10 13:18:13'),
(430, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, NULL, 18, 2000, 0, NULL, 2000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:1', NULL, NULL, '2024-04-13 05:40:44', '2024-04-13 05:40:44'),
(431, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 400, 0, NULL, 400, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-13 05:43:27', '2024-04-13 05:43:27'),
(432, 1, 38, NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 200, 0, 0, 200, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:13', 0, 200, '2024-04-13 05:50:15', '2024-04-13 05:50:33'),
(433, 1, 38, NULL, NULL, NULL, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 1000, 0, 0, 1000, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:14', 0, 1000, '2024-04-13 05:50:15', '2024-04-13 06:09:23'),
(434, 1, 38, NULL, NULL, NULL, NULL, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 400, 0, 0, 400, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:15', 0, 400, '2024-04-13 06:10:18', '2024-04-13 06:10:40'),
(435, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 1200, 0, NULL, 1200, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc3 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-13 06:14:25', '2024-04-13 06:14:25'),
(436, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 1000, 0, NULL, 1000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc3 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-13 06:29:46', '2024-04-13 06:29:46'),
(437, 1, 38, NULL, NULL, NULL, NULL, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 1500, 0, 0, 1500, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:16', 0, 1500, '2024-04-13 06:30:18', '2024-04-13 06:30:45'),
(438, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 600, 0, NULL, 600, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc1 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-13 06:38:22', '2024-04-13 06:38:22'),
(439, 1, 38, NULL, NULL, NULL, NULL, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 1000, 0, 0, 1000, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:17', 0, 1000, '2024-04-13 06:43:25', '2024-04-13 06:43:57'),
(440, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 300, 0, NULL, 300, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc3 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-13 06:53:56', '2024-04-13 06:53:56'),
(441, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 3000, 0, NULL, 3000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-13 08:42:22', '2024-04-13 08:42:22'),
(442, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 2500, 0, NULL, 2500, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc3 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-13 08:47:46', '2024-04-13 08:47:46'),
(443, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 2500, 0, NULL, 2500, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-13 09:06:34', '2024-04-13 09:06:34'),
(444, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 250, 0, NULL, 250, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc1 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-13 09:23:04', '2024-04-13 09:23:04'),
(445, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 2500, 0, NULL, 2500, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-13 10:20:33', '2024-04-13 10:20:33'),
(446, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 2500, 0, NULL, 2500, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc1 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-13 12:33:31', '2024-04-13 12:33:31'),
(447, 1, 38, NULL, NULL, NULL, NULL, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 3000, 0, 0, 3000, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:18', 0, 3000, '2024-04-15 12:43:55', '2024-04-13 12:44:26'),
(448, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 300, 0, NULL, 300, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-13 13:03:10', '2024-04-13 13:03:10'),
(449, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 250, 0, NULL, 250, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc3 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-13 17:48:13', '2024-04-13 17:48:13'),
(450, 1, 38, NULL, NULL, NULL, NULL, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 300, 0, 0, 300, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:19', 0, 300, '2024-04-13 17:48:39', '2024-04-13 17:49:03'),
(451, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 2, NULL, 18, 100, 0, NULL, 100, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc3 Medicine Company Transition Order ID:3', NULL, NULL, '2024-04-13 17:58:06', '2024-04-13 17:58:06'),
(452, 7, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 55, NULL, 348, NULL, NULL, NULL, NULL, NULL, 2, 4, 2, 200, 0, NULL, 200, 0, 200, 0, 0, 'Pahermachy Refund on Cash for Returning Medicine by the Patinet Name: Abrur rahman Patient ID: 7 Return Medicine Trans ID 55 Due Trans ID: 348 Data Entry By: main', NULL, NULL, '2024-04-17 17:58:36', '2024-04-13 18:03:53'),
(453, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, 2, NULL, 18, 400, 0, NULL, 400, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:5', NULL, NULL, '2024-04-13 18:28:43', '2024-04-13 18:28:43'),
(454, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, NULL, 18, 50, 0, NULL, 50, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:2', NULL, NULL, '2024-04-14 08:36:40', '2024-04-14 08:36:40'),
(455, 1, 38, NULL, NULL, NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 75, 0, 0, 75, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:20', 0, 75, '2024-04-07 08:45:43', '2024-04-14 08:46:19'),
(456, 1, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 56, NULL, 350, NULL, NULL, NULL, NULL, NULL, 2, 4, 2, 25, 0, NULL, 25, 0, 25, 0, 0, 'Pahermachy Refund on Cash for Returning Medicine by the Patinet Name: External customer Patient ID: 1 Return Medicine Trans ID 56 Due Trans ID: 350 Data Entry By: main', NULL, NULL, '2024-04-08 08:47:25', '2024-04-14 08:48:33'),
(457, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 2, NULL, 18, 25, 0, NULL, 25, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:3', NULL, NULL, '2024-04-14 08:50:01', '2024-04-14 08:50:01'),
(458, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 2, NULL, 18, 100, 0, NULL, 100, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:4', NULL, NULL, '2024-04-25 05:48:36', '2024-04-25 05:48:36'),
(459, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, 2, NULL, 18, 2000, 0, NULL, 2000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:6', NULL, NULL, '2024-04-25 05:54:14', '2024-04-25 05:54:14'),
(460, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, 2, NULL, 18, 2000, 0, NULL, 2000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc1 Medicine Company Transition Order ID:7', NULL, NULL, '2024-04-25 06:05:39', '2024-04-25 06:05:39'),
(461, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, 2, NULL, 18, 7500, 0, NULL, 7500, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc1 Medicine Company Transition Order ID:8', NULL, NULL, '2024-04-25 06:06:38', '2024-04-25 06:06:38'),
(462, 1, 38, NULL, NULL, NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 2000, 0, 0, 2000, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:21', 0, 2000, '2024-04-25 07:33:02', '2024-04-25 07:37:31'),
(463, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, 2, NULL, 18, 3000, 0, NULL, 3000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc3 Medicine Company Transition Order ID:10', NULL, NULL, '2024-04-25 07:48:36', '2024-04-25 07:48:36'),
(464, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, 2, NULL, 18, 5000, 0, NULL, 5000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:12', NULL, NULL, '2024-04-25 07:59:39', '2024-04-25 07:59:39'),
(465, 1, 38, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 4000, 0, 0, 4000, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:24', 0, 4000, '2024-04-25 08:14:39', '2024-04-25 08:15:01'),
(466, 1, 38, NULL, NULL, NULL, NULL, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 4000, 0, 0, 4000, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:25', 0, 4000, '2024-04-25 08:17:26', '2024-04-25 08:17:53'),
(467, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, NULL, 2, NULL, 18, 4000, 0, NULL, 4000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:13', NULL, NULL, '2024-04-25 08:36:06', '2024-04-25 08:36:06'),
(468, 1, 38, NULL, NULL, NULL, NULL, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 80, 0, 0, 80, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:27', 0, 80, '2024-04-25 11:43:06', '2024-04-25 11:43:31'),
(469, 1, 38, NULL, NULL, NULL, NULL, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 200, 0, 0, 200, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:29', 0, 200, '2024-04-25 11:51:18', '2024-04-25 11:51:36'),
(470, 1, 38, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 200, 0, 0, 200, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:30', 0, 200, '2024-04-25 11:52:44', '2024-04-25 11:52:57'),
(471, 1, 38, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 50, 0, 0, 50, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:33', 0, 50, '2024-04-27 07:49:53', '2024-04-27 07:50:39'),
(472, 1, 38, NULL, NULL, NULL, NULL, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 50, 0, 0, 50, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:35', 0, 50, '2024-04-27 07:52:41', '2024-04-27 07:52:57'),
(473, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, NULL, 2, NULL, 18, 50000, 0, NULL, 50000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:15', NULL, NULL, '2024-04-27 07:55:41', '2024-04-27 07:55:41'),
(474, 1, 38, NULL, NULL, NULL, NULL, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 225, 0, 0, 225, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:36', 0, 225, '2024-04-27 07:56:08', '2024-04-27 07:56:35'),
(475, 1, 38, NULL, NULL, NULL, NULL, 37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 900, 0, 0, 900, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:37', 0, 900, '2024-04-27 07:56:08', '2024-04-27 07:57:24'),
(476, 1, 38, NULL, NULL, NULL, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 450, 0, 0, 450, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:38', 0, 450, '2024-04-27 08:22:33', '2024-04-27 08:23:07'),
(477, 1, 38, NULL, NULL, NULL, NULL, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 320, 0, 0, 320, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:39', 0, 320, '2024-04-27 08:22:33', '2024-04-27 08:23:56'),
(478, 1, 38, NULL, NULL, NULL, NULL, 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 400, 0, 0, 400, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:41', 0, 400, '2024-04-27 08:37:17', '2024-04-27 08:38:01'),
(479, 1, 38, NULL, NULL, NULL, NULL, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 400, 0, 0, 400, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:42', 0, 400, '2024-04-27 08:43:54', '2024-04-27 08:44:39'),
(480, 1, 38, NULL, NULL, NULL, NULL, 43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 400, 0, 0, 400, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:43', 0, 400, '2024-04-27 08:45:08', '2024-04-27 08:45:32'),
(481, 1, 38, NULL, NULL, NULL, NULL, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 400, 0, 0, 400, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:44', 0, 400, '2024-04-27 09:31:23', '2024-04-27 09:31:44'),
(482, 1, 38, NULL, NULL, NULL, NULL, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 4000, 0, 0, 4000, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:45', 0, 4000, '2024-04-02 12:51:21', '2024-04-27 12:51:53'),
(483, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, 2, NULL, 18, 20000, 0, NULL, 20000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:18', NULL, NULL, '2024-04-27 12:53:36', '2024-04-27 12:53:36'),
(484, 1, 38, NULL, NULL, NULL, NULL, 46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 200, 0, 0, 200, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:46', 0, 200, '2024-04-02 19:08:39', '2024-04-27 19:09:12'),
(485, 1, 38, NULL, NULL, NULL, NULL, 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 200, 0, 0, 200, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:47', 0, 200, '2024-04-03 19:16:20', '2024-04-27 19:16:46'),
(486, 1, 38, NULL, NULL, NULL, NULL, 48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 300, 0, 0, 300, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:48', 0, 300, '2024-04-04 19:18:02', '2024-04-27 19:18:23'),
(487, 1, 38, NULL, NULL, NULL, NULL, 49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 300, 0, 0, 300, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:49', 0, 300, '2024-04-06 06:39:06', '2024-04-28 06:39:33'),
(488, 1, 38, NULL, NULL, NULL, NULL, 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 500, 0, 0, 500, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:50', 0, 500, '2024-04-28 06:57:45', '2024-04-28 06:58:25'),
(489, 1, 38, NULL, NULL, NULL, NULL, 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 1500, 0, 0, 1500, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:51', 0, 1500, '2024-04-28 06:57:45', '2024-04-28 06:59:01'),
(490, 1, 38, NULL, NULL, NULL, NULL, 52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 2000, 0, 0, 2000, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:52', 0, 2000, '2024-04-28 07:04:09', '2024-04-28 07:04:31'),
(491, 1, 38, NULL, NULL, NULL, NULL, 53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 4000, 0, 0, 4000, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:53', 0, 4000, '2024-04-28 07:05:38', '2024-04-28 07:05:53'),
(492, 1, 38, NULL, NULL, NULL, NULL, 54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 500, 0, 0, 500, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:54', 0, 500, '2024-04-28 07:07:34', '2024-04-28 07:07:47'),
(493, 1, 38, NULL, NULL, NULL, NULL, 55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 500, 0, 0, 500, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:55', 0, 500, '2024-04-28 07:08:58', '2024-04-28 07:09:19'),
(494, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, NULL, 2, NULL, 18, 10000, 0, NULL, 10000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc2 Medicine Company Transition Order ID:19', NULL, NULL, '2024-04-28 07:10:48', '2024-04-28 07:10:48'),
(495, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, NULL, 2, NULL, 18, 40000, 0, NULL, 40000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc1 Medicine Company Transition Order ID:20', NULL, NULL, '2024-04-28 07:14:17', '2024-04-28 07:14:17'),
(496, 1, 38, NULL, NULL, NULL, NULL, 56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 2000, 0, 0, 2000, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:56', 0, 2000, '2024-04-28 07:16:08', '2024-04-28 07:16:55'),
(497, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, NULL, 2, NULL, 18, 6000, 0, NULL, 6000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc1 Medicine Company Transition Order ID:23', NULL, NULL, '2024-04-28 07:45:01', '2024-04-28 07:45:01'),
(498, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, 2, NULL, 18, 8000, 0, NULL, 8000, 0, 0, 0, 0, 'Money Paid to the Medicine Company:mc1 Medicine Company Transition Order ID:24', NULL, NULL, '2024-04-28 07:45:57', '2024-04-28 07:45:57');
INSERT INTO `cashtransitions` (`id`, `patient_id`, `user_id`, `doctor_id`, `supplier_id`, `pathologyorderfromotherinsitute_id`, `doctorappointmenttransaction_id`, `order_id`, `reportorder_id`, `surgerytransaction_id`, `serviceorder_id`, `cabinefeetransition_id`, `cabinetransaction_id`, `khoroch_transition_id`, `dhar_shod_othoba_advance_er_mal_buje_pawa_id`, `Taka_uttolon_transition_id`, `return_order_id`, `employeesalarytransaction_id`, `duetransition_id`, `longterminstallerorder_id`, `agenttransaction_id`, `doctorCommissionTransition_id`, `medicinecompanyorder_id`, `medicine_comapnyer_dena_pawan_shod_id`, `company_type`, `customer_type`, `transitionproducttype`, `gorssamount`, `discount`, `advance_deposit_minus`, `amount_after_discount`, `deposit`, `withdrwal`, `debit`, `credit`, `description`, `customer_joma`, `customer_baki`, `created_at`, `updated_at`) VALUES
(499, 1, 38, NULL, NULL, NULL, NULL, 57, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 4000, 0, 0, 4000, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:57', 0, 4000, '2024-04-03 07:46:06', '2024-04-28 07:47:29'),
(500, 1, 38, NULL, NULL, NULL, NULL, 58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 5000, 0, 0, 5000, 0, 0, 0, 0, 'Medicine Bill from Patinet Name:External customer Patient ID: 1 Medicine Order ID:58', 0, 5000, '2024-04-04 07:46:06', '2024-04-28 07:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `childmenus`
--

CREATE TABLE `childmenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `rootmenu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coshmas`
--

CREATE TABLE `coshmas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `type` int(2) NOT NULL,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coshmas`
--

INSERT INTO `coshmas` (`id`, `value`, `type`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, 'চক্ষু বিশেষজ্ঞের পরামর্শ ছাড়া চশমা ব্যবহার করবেন না।', 1, 1, '2024-03-12 18:13:43', '2024-04-15 07:46:12'),
(3, 'সপ্তাহে এক দিন পানি দিয়ে চশমা পরিষ্কার করবেন।', 1, 0, '2024-03-12 18:13:43', '2024-03-13 18:13:43'),
(4, 'চশমা বানাবার পর চশমা পরীক্ষা করে নিবেন।', 1, 0, '2024-03-04 18:13:43', '2024-03-12 18:13:43'),
(7, 'red', 3, 0, '2024-04-15 07:59:28', '2024-04-15 07:59:28'),
(9, 'Unifosal', 2, 0, '2024-04-15 08:06:05', '2024-04-15 08:06:05'),
(10, 'mit Bifocal', 2, 0, '2024-04-15 08:06:25', '2024-04-15 08:06:25'),
(11, 'Progressive focal (Varilus)', 2, 0, '2024-04-15 08:06:40', '2024-04-15 08:06:40'),
(12, 'White', 3, 0, '2024-04-15 08:08:22', '2024-04-15 08:08:22'),
(13, 'Photochromatic', 3, 0, '2024-04-15 08:08:35', '2024-04-15 08:08:35'),
(14, 'MC Fiber (UV Protect)', 3, 0, '2024-04-15 08:08:49', '2024-04-15 08:08:49'),
(15, 'BlueCart', 3, 0, '2024-04-15 08:09:03', '2024-04-15 08:09:03'),
(16, 'Distant', 4, 0, '2024-04-15 08:10:37', '2024-04-15 08:10:37'),
(17, 'Reading', 4, 0, '2024-04-15 08:10:51', '2024-04-15 08:10:51'),
(18, 'Constant', 4, 0, '2024-04-15 08:11:04', '2024-04-15 08:11:04'),
(19, 'Fiber', 4, 0, '2024-04-15 08:11:16', '2024-04-15 08:11:16'),
(20, 'Glass', 4, 0, '2024-04-15 08:11:28', '2024-04-15 08:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `coshma_prescriptions`
--

CREATE TABLE `coshma_prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` int(255) DEFAULT NULL,
  `brith` date DEFAULT NULL,
  `preint_id` int(255) NOT NULL,
  `ipd` int(11) DEFAULT NULL,
  `resph` varchar(255) DEFAULT NULL,
  `recyl` int(11) DEFAULT NULL,
  `reaxis` int(11) DEFAULT NULL,
  `rebyes` int(11) DEFAULT NULL,
  `lesph` varchar(255) DEFAULT NULL,
  `lecyl` int(11) DEFAULT NULL,
  `leaxis` int(11) DEFAULT NULL,
  `lebyes` int(255) DEFAULT NULL,
  `add` varchar(255) DEFAULT NULL,
  `diopter` varchar(255) DEFAULT NULL,
  `instructions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`instructions`)),
  `type` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`type`)),
  `color` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`color`)),
  `remarks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`remarks`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coshma_prescriptions`
--

INSERT INTO `coshma_prescriptions` (`id`, `name`, `age`, `brith`, `preint_id`, `ipd`, `resph`, `recyl`, `reaxis`, `rebyes`, `lesph`, `lecyl`, `leaxis`, `lebyes`, `add`, `diopter`, `instructions`, `type`, `color`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'Abdul Sala,', 30, '2024-04-16', 17, 250, 'cxc', 250, 250, 250, 'xcxcx', 250, 250, 250, '250', '250', '[\"1\",\"3\",\"4\"]', '[\"9\",\"10\",\"11\"]', '[\"7\",\"12\",\"13\",\"14\",\"15\"]', '[\"16\",\"17\",\"20\"]', '2024-04-16 09:37:49', '2024-04-16 09:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `dentalserviceodermoney_deposits`
--

CREATE TABLE `dentalserviceodermoney_deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `longterminstallerorder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agentdetail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctorappointmenttransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_amount` double(10,4) DEFAULT NULL,
  `discount` double(10,4) DEFAULT NULL,
  `amount` double(10,4) DEFAULT NULL,
  `pay_by_advance` double(10,4) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dentalservices`
--

CREATE TABLE `dentalservices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `unitprice` double(12,2) NOT NULL,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dhar_shod_othoba_advance_er_mal_buje_pawas`
--

CREATE TABLE `dhar_shod_othoba_advance_er_mal_buje_pawas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `transitiontype` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dhar_shod_othoba_advance_er_mal_buje_pawas`
--

INSERT INTO `dhar_shod_othoba_advance_er_mal_buje_pawas` (`id`, `supplier_id`, `user_id`, `amount`, `comment`, `transitiontype`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, NULL, 1, '2023-02-25 18:00:00', '2023-02-25 19:52:24'),
(2, 2, 38, 12, 'hjh', 1, '2024-04-12 11:27:00', '2024-04-07 11:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `doctorappointmenttransactions`
--

CREATE TABLE `doctorappointmenttransactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `agentdetail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `serialno` int(11) DEFAULT NULL,
  `grossamount` double DEFAULT NULL,
  `fees` double DEFAULT NULL,
  `nogod` double DEFAULT NULL,
  `due` double DEFAULT NULL,
  `adjust_with_advance` double DEFAULT NULL,
  `cancel_serial_no` tinyint(4) NOT NULL DEFAULT 0,
  `doctoroncallforadmittedpartient` tinyint(4) NOT NULL DEFAULT 0,
  `absent` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctorappointmenttransactions`
--

INSERT INTO `doctorappointmenttransactions` (`id`, `doctor_id`, `patient_id`, `user_id`, `agentdetail_id`, `date`, `serialno`, `grossamount`, `fees`, `nogod`, `due`, `adjust_with_advance`, `cancel_serial_no`, `doctoroncallforadmittedpartient`, `absent`, `created_at`, `updated_at`) VALUES
(1, 4, 5, 1, 4, '2023-01-24', 1, 600, 600, 600, 0, 0, 0, 0, 0, '2023-01-24 17:49:17', '2023-01-24 17:49:17'),
(2, 4, 1, 1, 1, '2023-02-11', 1, 600, 600, 600, 0, 0, 0, 0, 0, '2023-02-10 20:00:54', '2023-02-10 20:00:54'),
(3, 4, 10, 1, 1, '2023-12-17', 1, 800, 600, 600, 200, 0, 0, 0, 0, '2023-12-16 20:20:48', '2023-12-16 20:20:48'),
(4, 4, 10, 1, 1, '2023-12-17', 2, 600, 300, 300, 300, 0, 0, 0, 0, '2023-12-17 09:29:40', '2023-12-17 09:29:40'),
(5, 4, 10, 1, 1, '2024-01-03', 1, 600, 300, 300, 300, 0, 0, 0, 0, '2024-01-03 10:41:16', '2024-01-03 10:41:16'),
(6, 4, 10, 1, 1, '2024-01-09', 1, 600, 400, 400, 200, 0, 0, 0, 0, '2024-01-09 13:09:28', '2024-01-09 13:09:28'),
(8, 4, 10, 1, 1, '2024-01-11', 1, 1000, 600, 600, 400, 0, 0, 0, 0, '2024-01-11 10:52:43', '2024-01-11 10:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `Degree` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `workingplace` varchar(255) DEFAULT NULL,
  `commission_pecentage` double NOT NULL DEFAULT 0,
  `first_visit_fees` double NOT NULL,
  `next_visit_fees` double NOT NULL,
  `contact_address_for_serial` varchar(255) DEFAULT NULL,
  `chamber_address` text DEFAULT NULL,
  `visiting_hours` varchar(255) DEFAULT NULL,
  `offday` varchar(255) DEFAULT NULL,
  `headerimage` varchar(255) DEFAULT NULL,
  `footerimage` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `prescriptionheading` text DEFAULT NULL,
  `hospitaler_kache_pawna` double(12,2) NOT NULL DEFAULT 0.00,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `address`, `mobile`, `Degree`, `Department`, `workingplace`, `commission_pecentage`, `first_visit_fees`, `next_visit_fees`, `contact_address_for_serial`, `chamber_address`, `visiting_hours`, `offday`, `headerimage`, `footerimage`, `image`, `prescriptionheading`, `hospitaler_kache_pawna`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, 'Not Applicable', 'Khulna', '01758692663', 'Not Applicable', 'NURO/MEDICHIN', 'NA', 0, 800, 700, 'NA', 'NA', 'NA', 'NA', NULL, NULL, NULL, 'NA', 0.00, 1, '2021-10-20 01:26:22', '2022-01-15 18:55:01'),
(2, 'KMCH', 'Khulna', 'NA', 'NA', 'NA', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 1, '2021-10-20 01:50:36', '2022-01-15 18:54:51'),
(3, 'SELF', 'Khulna', '0', '0', '0', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 1, '2021-10-20 01:50:55', '2022-01-15 18:54:45'),
(4, 'Dr.Nirupom Mondal', 'Khulna Medical', '01324166600', 'MBBS.BCS(Health),MS(Eurology)', 'Kidney,Urethra,Prostate Speciallist', 'KMC', 0, 800, 600, 'NA', NULL, 'NA', 'NA', '20220126200215.jpg', '20220126200215footerimage.jpg', NULL, NULL, 0.00, 0, '2021-10-20 02:44:13', '2022-04-24 14:53:22'),
(5, 'Dr.Debnath Talukder', 'Khulna Medical College Hospital', '01324166600', 'MBBS.BCS(Health),MS(E.N.T) RS, KMCH', 'Nose,Ear,Throat Speciallist', 'KMCH', 0, 800, 600, NULL, NULL, '2.30 PM-4.00 PM & 8.00 PM-9.00 PM', NULL, NULL, NULL, NULL, NULL, 200.00, 0, '2021-10-20 02:49:31', '2024-03-30 14:49:16'),
(6, 'Dr,Parthaya Gosh', 'Khulna Medical', '01324166600', 'MBBS.(S,S,M,C),BCS(Health),FCPS(Medicine)M,A.C,P(America)', 'Medicine,Cardiology,Chest Diseases,Arthritis & Liver Gastroenterology', NULL, 0, 800, 600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1500.00, 1, '2021-10-20 03:14:31', '2022-01-15 18:50:31'),
(7, 'Dr.Parthaya Ghosh', 'Khulna', '01324166600', 'MBBS,BCS(Health),FCPS(Medicine),MACP', 'Medicine,Cardiology,Chest Diseases,Arthritis&Lever Gastroenterology', 'Ex Rp KMCH', 0, 800, 600, NULL, NULL, '8.30 am $ 9.00 pm', NULL, NULL, NULL, NULL, NULL, 0.00, 0, '2021-10-20 03:20:47', '2022-04-10 19:01:53'),
(8, 'Not Applicable', 'NA', 'NA', 'NA', 'NA', 'NA', 0, 0, 0, NULL, 'NA', 'NA', 'NA', NULL, NULL, NULL, 'NA', 0.00, 1, '2022-01-03 15:01:40', '2022-01-15 18:36:28'),
(9, 'DR.Kamalesh Saha', 'Khulna Medical College Hospital', '01324166600', 'MBBS,BCS,(Health) MS(Neurosurgery)', 'Neurosurgery', 'KMCH', 0, 1000, 800, NULL, NULL, '2.30 pm-3.00 pm', NULL, NULL, NULL, NULL, NULL, 0.00, 0, '2022-01-15 19:01:44', '2022-10-14 09:11:29'),
(10, 'DR. Milton Mollick', 'KMCH', '01324166600', 'MBBS,BCS (Health),FCPS,(Surgery)', 'Surgery', 'KMCH', 0, 700, 500, NULL, NULL, '2.30 pm-3.30 pm & 8.30 pm-9.30 pm', NULL, NULL, NULL, NULL, NULL, 0.00, 0, '2022-01-15 19:09:47', '2022-10-22 07:22:20'),
(11, 'DR. Shibendu Mistry', 'KMCH', '01324166600', 'MBBS,BCS(Health),MS(Orthopaedics Surgery)RS, KMCH', 'Orthopaedics Surgery', 'KMCH', 0, 700, 500, NULL, NULL, '2.30 pm-4.00 pm', NULL, NULL, NULL, NULL, NULL, 0.00, 0, '2022-01-15 19:15:29', '2022-07-18 05:06:14'),
(12, 'DR.Monika Saha', 'Generel Hospital Khulna', '01324166600', 'MBBS,BCS,(Health), FCPS (Gynae & Obs)', 'KMCH', 'Generel Hospital Khulna', 0, 700, 500, 'n', 'n', '2.30 PM- 4.00 PM', 'n', NULL, NULL, NULL, 'n', 0.00, 0, '2022-01-15 19:22:28', '2022-12-28 03:35:14'),
(13, 'SELF', 'SOUTH ZONE PVT HOSPITAL', '01324166600', 'NON', 'NON', 'OFFICE', 0, 0, 0, '0', NULL, '0', 'NON', NULL, NULL, NULL, NULL, 0.00, 0, '2022-01-31 00:46:24', '2022-07-02 11:10:59'),
(14, 'South Zone', 'SOUTH ZONE PVT HOSPITAL', '01324166600', 'NON', 'NON', 'OFFICE', 0, 0, 0, '0', NULL, '0', '0', NULL, NULL, NULL, NULL, 0.00, 0, '2022-01-31 00:47:38', '2022-10-11 06:56:36'),
(15, 'KMCH', 'KMCH', '0', '0', '0', '0', 0, 0, 0, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, 0.00, 0, '2022-02-07 02:21:36', '2022-12-17 00:12:28'),
(16, 'Dr. Biswanath Mondal', 'KMCH', '01816889688', 'MBBS,BCS,MS(Ortho)', 'Orthopedic', 'KMCH', 0, 700, 500, '01324166600', 'South Zone Pvt Hospital, Hafiz,Nagar More, Sonadanga,Khulna.', '2.30 pm-3.30 pm', 'Friday', NULL, NULL, NULL, 'Safe Treatment Save Life', 1000.00, 0, '2022-02-07 10:42:50', '2022-05-06 17:28:44'),
(17, 'Dr Bishwajit Mondal', '0', '0', 'MBBS,BCS,FCPS(MED),MD(CARD)', 'N', '0', 0, 0, 0, '0', NULL, '0', '0', NULL, NULL, NULL, NULL, 0.00, 0, '2022-02-23 05:30:39', '2024-01-09 14:03:28'),
(18, 'Dr.Farhadul Islam Tuhin .Mbbs.Bcs,Fcps(m)', 'n', 'n', 'NA', 'NA', 'n', 0, 0, 0, 'N', 'N', 'N', 'N', NULL, NULL, NULL, 'N', 0.00, 0, '2022-03-14 13:49:05', '2022-10-11 07:01:06'),
(19, 'Dr. Feroza', 'NA', 'NA', 'NA', 'NA', 'NA', 0, 0, 0, 'NA', 'NA', 'NA', 'NA', NULL, NULL, NULL, 'NA', 0.00, 0, '2022-07-02 00:57:08', '2022-07-02 00:57:08'),
(20, 'Dr.Arafat Hossain', 'N', 'N', 'Anesthesiologist', 'Anesthesiologist', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-07-18 04:54:51', '2022-10-13 10:30:43'),
(21, 'DR.SUBROTO', 'KMCH', '01', 'MBBS.BCS.FCPS', 'SURGERY', 'KMCH', 0, 700, 500, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 0.00, 1, '2022-08-15 21:51:14', '2022-10-01 04:07:13'),
(22, 'DR.SUBROTO', 'KMCH', '01', 'MBBS.BCS.FCPS', 'SURGERY', 'KMCH', 0, 700, 500, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 0.00, 1, '2022-08-15 21:51:24', '2022-08-17 04:36:31'),
(23, 'DR.SUBROTO', 'KMCH', '01', 'MBBS.BCS.FCPS', 'SURGERY', 'KMCH', 0, 700, 500, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 0.00, 1, '2022-08-15 21:51:24', '2022-08-17 04:36:40'),
(24, 'Dr.Zahid Hossain', 'NA', 'NA', 'MBBS,BCS,MS', 'Urology', 'Abu Nasir', 0, 800, 500, 'NA', NULL, 'na', 'na', NULL, NULL, NULL, NULL, 0.00, 0, '2022-08-17 04:39:10', '2022-08-21 00:42:47'),
(25, 'Dr.Md.Zahirul Huq', 'N', 'N', 'Mbbs(du);Bcs(Health);Fcps(M);Macp(Usa)', 'MEDICINE SAECIALIST', 'KMCH', 0, 700, 600, '0', 'N', '0', '0', NULL, NULL, NULL, 'N', 0.00, 0, '2022-08-21 01:02:28', '2022-10-11 07:04:59'),
(26, 'Dr Dipankar Ghosh', 'N', '01324166600', 'MBBS BCS MS(NEUROSARGERY)', 'N', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-09-14 04:20:01', '2023-02-20 09:07:33'),
(27, 'Dr.Subroto Mondal', 'N', 'N', 'MBBS,BCS,FCPS,(SUR)', 'N0', 'N', 0, 0, 0, '0', NULL, '0', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-09-26 10:20:40', '2022-10-11 07:02:38'),
(28, 'Dr.A S M Humayun Kobir Apu', 'N', '01324166600', 'MBBS,BCS(H),MS(UROLOGY),MEMBER(AUA)', 'UROLOGY', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-11 07:14:06', '2022-10-11 07:14:35'),
(29, 'Dr.Palash Kumar Dey', 'N', '01324166600', 'MBBS,BCS(H),FCPS(SURGERY)', 'SURGERY', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-11 07:16:14', '2022-10-11 07:16:14'),
(30, 'Dr.Rana Kumar Biswas', 'N', '01324166600', 'MBBS,BCS(H),DCH(DU),FCPS(Paed),MD(Paed G)BSMMU', 'GASTROENTEROLOGY', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-11 07:19:34', '2022-10-11 07:19:34'),
(31, 'Dr.Palash Tarafdar', 'N', '01324166600', 'MBBS,BCS(H),MD(Nephrology)', 'NEPHROLOGY', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-11 07:21:32', '2022-10-11 07:21:32'),
(32, 'Dr.Himel Saha', 'N\\', '01324166600', 'MBBS,BCS(H),D(Card)', 'CARD', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-11 07:23:54', '2022-10-11 07:23:54'),
(33, 'Dr.Md.Taiyabur Rahaman', 'N', '01324166600', 'MBBS,BCS(H),D-Ortho,BSMMU', 'ORTHO', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-11 07:25:41', '2022-10-11 07:25:41'),
(34, 'Prof.Dr.Poritosh Kumar Chowdhury', 'N', '01324166600', 'MBBS,BCS(H),DTCD,PGT(M&HEART)', 'MEDICINE', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-11 07:32:06', '2022-10-11 07:32:06'),
(35, 'Dr.Mrinal Khanti Sana', 'N', '01324166600', 'MBBS,BCS(H),FCPS(M),CCD,MACP(USA)', 'MEDICINE', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-11 07:34:11', '2022-10-11 07:34:11'),
(36, 'Dr.Sahdeb Kumar Das', 'N', '01324166600', 'MBBS,BCS(H),MCPS(S),MS(Pediatric Surgeon)', 'SURGERY', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-11 07:36:28', '2022-10-11 07:36:28'),
(37, 'Dr.Debasish Sarkar', 'N', '01324166600', 'MBBS,CCD(Berdem),PGT(H),FCGP(*F-M)', 'N', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-11 07:38:56', '2022-10-11 07:38:56'),
(38, 'Dr.Anirudha Sarder', 'N', '01324166600', 'MBBS,FCPS(Surgery)', 'SURGERY', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-11 07:40:31', '2022-10-11 07:40:31'),
(39, 'Dr.Md.Younus Ali', 'N', '01324166600', 'MBBS(Dhaka),BCS(H),DDV(BSMMU)', 'N', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-11 07:42:38', '2022-10-11 07:42:38'),
(40, 'Dr.Siddhartha Baowaly', 'N', '01324166600', 'MBBS,BCS(H),MD(Nephrology)', 'N', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-11 07:44:35', '2022-10-11 07:44:35'),
(41, 'Dr.Misskatus Shalhin', 'N', '01324166600', 'MBBS,BCS,DDV(BSMMU)', 'N', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-11 07:45:59', '2022-10-11 07:45:59'),
(42, 'Dr.Siddhartha Baowaly', 'N', '01324166600', 'MBBS,BCS(H),MD NEPHROLOGY', 'NEPHROLOGY', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-13 10:20:29', '2022-10-13 10:20:29'),
(43, 'Dr.Debasish Sarkar', 'N', '01324166600', 'MBBS(DU),FCGP(F.Medicine),MD(Cardiology)', 'CARDIOLOGY', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-14 03:49:31', '2022-10-14 03:49:31'),
(44, 'Dr TARUN', 'N', '01324166600', 'MBBS,DME', 'ALTROSONO GRAFHY', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-14 07:58:46', '2022-10-14 07:58:46'),
(45, 'Dr Abdullah Al Mamun', 'N', '01324166600', 'MBBS,BCS(H),DDV(BSMMEU)', 'DERMATOLOGIST', 'N', 0, 0, 0, '0', NULL, 'N', 'N', '20230203225417.png', '20230203225609footerimage.png', NULL, NULL, 999.00, 0, '2022-10-14 08:00:21', '2024-04-07 07:50:54'),
(46, 'Dr Samim', 'N', '0', 'MBBS,DA', 'ANSTHAYSIA', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-14 08:02:45', '2022-10-22 07:22:20'),
(47, 'Dr Kanchan', 'N', '0', 'MBBS,DA', 'ANSTHAYSIA', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-14 08:03:38', '2022-10-14 09:11:29'),
(48, 'Dr GP Mojumdar', 'N', '0', 'MBBS,DA', 'N', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-14 08:04:29', '2022-10-14 08:04:29'),
(49, 'Jahangir', 'N', '0', 'DA', 'ANSTHAYSIA', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-14 08:05:21', '2022-10-14 08:05:21'),
(50, 'Dr Shwapan', 'N', '0', 'MBBS,DA', 'N', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-14 08:06:05', '2022-10-14 08:06:05'),
(51, 'Dr Rajib', 'N', '0', 'MBBS,DA', 'ANSTHAYSIA', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 1, '2022-10-14 08:06:55', '2024-03-30 14:12:51'),
(52, 'Dr Monjur Rahaman', 'N', '0', 'MBBS,DA', 'ANSTHAYSIA', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-10-14 08:07:57', '2022-10-14 08:07:57'),
(53, 'DR.MAMUN', 'SOUTH ZONE', '01324166600', 'MBBS', 'ALTRASONOLOGIST', 'N', 0, 0, 0, '0', NULL, 'N', 'N', NULL, NULL, NULL, NULL, 0.00, 0, '2022-12-17 00:21:23', '2022-12-17 00:21:23'),
(54, 'DR MOUSUMI PAL', 'SOUTH ZONE', '01712487278', 'MBBS,BCS,MCPS', 'PROSUTI AND GAINI DOCTOR', 'SOUTH ZONE', 0, 700, 600, '0132466600', NULL, '0', '0', NULL, NULL, NULL, NULL, 0.00, 0, '2023-01-08 07:12:23', '2023-01-08 07:12:23'),
(55, 'MD', 'KHULNA', 'N', 'MBBS', 'SUR', 'N', 0, 800, 700, NULL, NULL, '2 PM', NULL, '20230203204108.png', '20230203204108footerimage.PNG', NULL, NULL, 0.00, 0, '2023-01-10 10:59:58', '2024-03-30 13:23:00'),
(56, 'DR ASM HUMAYUN KOBIR APU', 'KHULNA', 'NA', 'MS(URO)', 'UROLOGY', 'KHULNA', 0, 800, 800, NULL, NULL, '1 PM', NULL, '20230213014840.png', '20230213014840footerimage.png', NULL, NULL, 0.00, 0, '2023-01-11 03:47:02', '2024-04-03 06:32:08'),
(57, 'Hasanuzzaman', 'BD', '0191919', 'MBBS', 'Urology', 'Dhaka', 0, 500, 500, '0191919', 'Dhaka', '8pm', 'Friday', '20230601001256.png', '20230601001256footerimage.png', NULL, 'Dhaka', -200.00, 0, '2023-02-08 18:36:30', '2023-05-31 18:12:56'),
(58, 'Test', 'Addres', '01890024840', 'fgfdgfdg', 'fgfdgfdg', 'gfgdgfd', 0, 1500, 1500, '065658999', 'fdgfdgdfg', 'fgfdgfd', 'fdgfg', '20240330174847.png', '20240330174847footerimage.png', NULL, 'fgdfgfdg', 0.00, 0, '2024-03-30 11:48:47', '2024-03-30 11:48:47'),
(59, 'vcvcv123', 'cvcv', '01890021498', 'cvcv', 'cvcvc', 'cvcv', 0, 150, 150, 'vcv', 'vcv', 'cvc', 'cvcv', '20240330194305.png', '20240330194305footerimage.png', NULL, 'cvcvcv', 0.00, 0, '2024-03-30 12:03:39', '2024-03-30 13:43:05'),
(60, 'asdsads2', 'fdf', '01890024840', 'df', 'dffd', 'dfdf', 0, 202, 202, '565', 'dfdfd', 'fdf', 'dfdfd', '20240330194415.png', '20240330194415footerimage.png', NULL, 'fdfdf', 0.00, 0, '2024-03-30 13:27:39', '2024-03-30 13:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_commission_transitions`
--

CREATE TABLE `doctor_commission_transitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `collection` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `receiveablecollection` double DEFAULT NULL,
  `amount` double NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `transitiontype` tinyint(4) NOT NULL DEFAULT 1,
  `paidorunpaid` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_commission_transitions`
--

INSERT INTO `doctor_commission_transitions` (`id`, `doctor_id`, `user_id`, `patient_id`, `collection`, `discount`, `receiveablecollection`, `amount`, `comment`, `transitiontype`, `paidorunpaid`, `created_at`, `updated_at`) VALUES
(11, 45, 1, 4, 3800, 0, 3800, 0, NULL, 1, 0, '2023-02-09 18:00:00', '2023-02-10 11:36:59'),
(12, 45, 1, 7, 1300, 0, 1300, 0, NULL, 1, 0, '2023-02-09 18:00:00', '2023-02-10 14:00:59'),
(13, 56, 1, 14, 2500, 0, 2500, 0, NULL, 1, 0, '2023-02-09 18:00:00', '2023-02-10 14:03:48'),
(14, 17, 1, 4, 1100, 0, 1100, 400, NULL, 1, 1, '2023-02-09 18:00:00', '2023-02-10 14:47:43'),
(15, 56, 1, 4, 1300, 0, 1300, 0, NULL, 1, 0, '2023-02-09 18:00:00', '2023-02-10 14:49:10'),
(16, 56, 1, 4, 1100, 0, 1100, 300, NULL, 1, 1, '2023-02-09 18:00:00', '2023-02-10 14:50:36'),
(17, 45, 1, 12, NULL, NULL, NULL, 0, NULL, 7, 0, '2023-02-11 19:45:33', '2023-02-11 19:45:33'),
(18, 45, 1, 12, NULL, NULL, NULL, 0, NULL, 6, 0, '2023-02-11 19:45:33', '2023-02-11 19:45:33'),
(19, 45, 1, 16, 6200, 200, 6000, 300, NULL, 1, 1, '2023-02-12 18:00:00', '2023-02-12 20:28:03'),
(20, 26, 1, 5, 5100, 0, 5100, 300, NULL, 1, 1, '2023-05-30 18:00:00', '2023-05-30 20:17:52'),
(21, 45, 1, 4, 1300, 0, 1300, 0, NULL, 1, 0, '2023-02-17 18:00:00', '2023-02-17 09:58:09'),
(32, 45, 1, 5, 2477, 0, 2477, 0, NULL, 1, 0, '2023-02-19 18:00:00', '2023-02-20 10:11:42'),
(34, 45, 1, 21, 100, 0, 100, 0, NULL, 1, 0, '2023-02-24 18:00:00', '2023-02-25 09:05:20'),
(36, 45, 1, 1, 1277, 0, 1277, 0, NULL, 1, 0, '2023-03-31 18:00:00', '2023-04-01 13:08:20'),
(37, 45, 1, 1, 1100, 0, 1100, 200, NULL, 1, 1, '2023-05-30 18:00:00', '2023-05-30 20:17:28'),
(38, 4, 1, 10, NULL, NULL, NULL, 10, NULL, 1, 1, '2023-05-30 18:00:00', '2023-05-31 17:17:38'),
(39, 4, 1, 10, NULL, NULL, 1200, 100, NULL, 1, 1, '2023-05-30 18:00:00', '2023-05-31 17:24:45'),
(40, 45, 1, 1, 1100, 100.00000999999999, 999.99999, 0, NULL, 1, 0, '2023-06-04 18:00:00', '2023-06-05 01:18:50'),
(41, 45, 1, 1, 1500, 300, 1200, 0, NULL, 1, 0, '2023-06-04 18:00:00', '2023-06-05 02:14:16'),
(42, 45, 1, 1, 2400, 400, 2000, 0, NULL, 1, 0, '2023-06-05 18:00:00', '2023-06-06 03:21:02'),
(43, 45, 1, 1, 100, 25, 75, 0, NULL, 1, 0, '2023-06-05 18:00:00', '2023-06-06 03:39:43'),
(44, 45, 1, 1, 2500, 500, 2000, 0, NULL, 1, 0, '2023-06-05 18:00:00', '2023-06-06 03:54:02'),
(45, 45, 1, 21, 100, 0, 100, 0, NULL, 1, 0, '2023-07-08 18:00:00', '2023-07-09 17:06:41'),
(46, 45, 1, 4, 600, 0, 600, 0, NULL, 1, 0, '2023-10-06 18:00:00', '2023-10-07 06:29:52'),
(47, 45, 1, 1, 1100, 0, 1100, 0, NULL, 1, 0, '2023-12-15 18:00:00', '2023-12-16 12:11:20'),
(48, 45, 1, 1, NULL, NULL, NULL, 0, NULL, 7, 0, '2023-12-16 17:21:58', '2023-12-16 17:21:58'),
(49, 45, 1, 1, NULL, NULL, NULL, 0, NULL, 6, 0, '2023-12-16 17:21:58', '2023-12-16 17:21:58'),
(50, 45, 1, 1, 1100, 0, 1100, 0, NULL, 1, 0, '2023-12-16 18:00:00', '2023-12-16 19:58:19'),
(51, 45, 1, 1, NULL, NULL, NULL, 0, NULL, 7, 0, '2023-12-16 20:02:18', '2023-12-16 20:02:18'),
(52, 45, 1, 1, NULL, NULL, NULL, 0, NULL, 6, 0, '2023-12-16 20:02:18', '2023-12-16 20:02:18'),
(53, 45, 1, 1, 1100, 0, 1100, 0, NULL, 1, 0, '2024-01-01 18:00:00', '2024-01-02 11:34:12'),
(54, 45, 1, 1, 1100, 0, 1100, 0, NULL, 1, 0, '2024-01-02 18:00:00', '2024-01-03 10:35:04'),
(55, 45, 1, 1, NULL, NULL, NULL, 0, NULL, 7, 0, '2024-01-03 11:05:38', '2024-01-03 11:05:38'),
(56, 45, 1, 1, NULL, NULL, NULL, 0, NULL, 6, 0, '2024-01-03 11:05:38', '2024-01-03 11:05:38'),
(57, 45, 1, 1, 1000, 0, 1000, 0, NULL, 1, 0, '2024-01-04 09:47:06', '2024-01-04 09:47:06'),
(58, 45, 1, 1, 2400, 240, 2160, 0, NULL, 1, 0, '2024-01-03 18:00:00', '2024-01-04 09:53:24'),
(59, 45, 1, 1, 1100, 0, 1100, 0, NULL, 1, 0, '2024-01-03 18:00:00', '2024-01-04 12:08:05'),
(60, 45, 1, 1, 1100, 0, 1100, 0, NULL, 1, 0, '2024-01-04 18:00:00', '2024-01-05 09:47:53'),
(61, 45, 1, 1, 1000, 0, 1000, 0, NULL, 1, 0, '2024-01-05 09:49:29', '2024-01-05 09:49:29'),
(62, 45, 1, 1, 2400, 200, 2200, 0, NULL, 1, 0, '2024-01-07 18:00:00', '2024-01-08 09:37:54'),
(63, 45, 1, 1, 2400, 200, 2200, 0, NULL, 1, 0, '2024-01-08 18:00:00', '2024-01-09 09:57:36'),
(64, 17, 1, 1, NULL, NULL, NULL, 0, NULL, 7, 0, '2024-01-09 14:03:28', '2024-01-09 14:03:28'),
(65, 45, 1, 1, NULL, NULL, NULL, 0, NULL, 6, 0, '2024-01-09 14:03:28', '2024-01-09 14:03:28'),
(66, 45, 1, 1, 2400, 0, 2400, 0, NULL, 1, 0, '2024-01-09 18:00:00', '2024-01-09 18:58:54'),
(67, 56, 1, 1, NULL, NULL, NULL, 0, NULL, 7, 0, '2024-01-09 19:01:54', '2024-01-09 19:01:54'),
(68, 45, 1, 1, NULL, NULL, NULL, 0, NULL, 6, 0, '2024-01-09 19:01:54', '2024-01-09 19:01:54'),
(69, 45, 1, 1, 1100, 901, 199, 0, NULL, 1, 0, '2024-01-10 18:00:00', '2024-01-11 11:36:28'),
(70, 45, 1, 1, 1000, 0, 1000, 999, NULL, 1, 0, '2024-01-14 18:00:00', '2024-01-15 15:54:42'),
(71, 45, 1, 1, NULL, NULL, NULL, 0, NULL, 7, 0, '2024-01-14 18:00:00', '2024-01-15 17:13:42'),
(72, 45, 1, 1, NULL, NULL, NULL, 0, NULL, 6, 0, '2024-01-14 18:00:00', '2024-01-15 17:13:42'),
(73, 45, 1, 7, 1100, 0, 1100, 50, NULL, 1, 1, '2024-03-01 18:00:00', '2024-03-02 11:46:06'),
(74, 45, 1, 7, 1300, 0, 1300, 0, NULL, 1, 0, '2024-03-01 18:00:00', '2024-03-02 12:04:03'),
(75, 45, 1, 7, 1300, 0, 1300, 0, NULL, 1, 0, '2024-03-01 18:00:00', '2024-03-02 12:16:55'),
(76, 45, 1, 7, 1100, 0, 1100, 0, NULL, 1, 0, '2024-03-01 18:00:00', '2024-03-02 12:25:04'),
(83, 4, 1, 17, NULL, NULL, 1200, 200, 'fdfgfgdgfdgfd', 2, 1, '2024-03-30 14:41:00', '2024-03-30 14:38:07'),
(84, 7, 1, 20, NULL, NULL, 100, 200, 'nbnvbnbv', 6, 1, '2024-03-08 14:45:00', '2024-03-30 14:45:47'),
(86, 5, 1, 17, NULL, NULL, 300, 200, 'vbcvcv', 7, 0, '2024-03-14 14:49:00', '2024-03-30 14:49:16'),
(88, 45, 1, 37, 1300, 0, 1300, 0, NULL, 1, 0, '2024-03-23 19:22:00', '2024-03-30 19:23:00'),
(90, 45, 38, 7, 1000, 0, 1000, 0, NULL, 1, 0, '2024-04-12 07:50:00', '2024-04-07 07:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `duetransitions`
--

CREATE TABLE `duetransitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctorappointmenttransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reportorder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `surgerytransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `serviceorder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cabinefeetransition_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cabinetransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `return_order_id` bigint(20) DEFAULT NULL,
  `totalamount` double DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `discountondue` double DEFAULT 0,
  `comment` varchar(255) DEFAULT NULL,
  `transitiontype` tinyint(4) DEFAULT NULL,
  `transitionproducttype` tinyint(4) DEFAULT NULL,
  `duepaidfor` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `duetransitions`
--

INSERT INTO `duetransitions` (`id`, `patient_id`, `user_id`, `doctor_id`, `doctorappointmenttransaction_id`, `order_id`, `reportorder_id`, `surgerytransaction_id`, `serviceorder_id`, `cabinefeetransition_id`, `cabinetransaction_id`, `return_order_id`, `totalamount`, `amount`, `discountondue`, `comment`, `transitiontype`, `transitionproducttype`, `duepaidfor`, `created_at`, `updated_at`) VALUES
(119, 12, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 97.5, 97.5, 0, NULL, 4, 4, 1, '2023-02-23 19:21:58', '2023-02-23 19:21:58'),
(120, 12, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 71, 71, 0, NULL, 4, 5, 1, '2023-02-24 10:25:28', '2023-02-24 10:25:28'),
(121, 12, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 70, 70, 0, NULL, 4, 6, 1, '2023-02-24 10:26:51', '2023-02-24 10:26:51'),
(123, 12, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 470, 470, 0, NULL, 4, 8, 1, '2023-02-24 10:49:49', '2023-02-24 10:49:49'),
(124, 12, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 470, 470, 0, NULL, 4, 9, 1, '2023-02-24 11:05:25', '2023-02-24 11:05:25'),
(125, 12, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 470, 470, 0, NULL, 4, 10, 1, '2023-02-24 11:07:39', '2023-02-24 11:07:39'),
(129, 20, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 70, 70, 0, NULL, 4, 2, 1, '2023-02-24 12:34:58', '2023-02-24 12:34:58'),
(130, 20, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 70, 70, 0, NULL, 4, 2, 1, '2023-02-24 15:35:16', '2023-02-24 15:35:16'),
(131, 20, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 70, 70, 0, 'Cash back for Returning Medicine to the customer:Abdul Qadir', 7, 2, 1, '2023-02-24 16:01:06', '2023-02-24 16:01:06'),
(133, 20, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, 470, 470, 0, NULL, 4, 2, 1, '2023-02-24 16:03:12', '2023-02-24 16:03:12'),
(134, 20, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 70, 70, 0, NULL, 4, 2, 1, '2023-02-24 16:06:13', '2023-02-24 16:06:13'),
(135, 20, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 70, 70, 0, NULL, 4, 2, 1, '2023-02-24 23:08:55', '2023-02-24 23:08:55'),
(136, 20, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 350, 350, 0, NULL, 4, 2, 1, '2023-02-24 23:10:22', '2023-02-24 23:10:22'),
(141, 21, 1, NULL, NULL, NULL, 98, NULL, NULL, NULL, NULL, NULL, 100, 100, 0, 'Pathology Test', 2, 4, NULL, '2023-02-25 09:05:20', '2023-07-09 17:04:57'),
(149, 7, 1, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 70, 70, 0, 'Medicine sale Due: from Patinet ID: 7 Medicine Order ID: 4', 2, 2, 1, '2023-02-25 12:51:52', '2023-02-25 12:51:52'),
(150, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, 70, 70, 0, 'Cash back for Returning Medicine to the customer:Abrur rahman', 7, 2, 1, '2023-02-26 18:17:00', '2023-02-26 18:17:00'),
(151, 12, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 29, 400, 400, 0, NULL, 4, 2, 1, '2023-02-26 18:24:08', '2023-02-26 18:24:08'),
(152, 1, 1, NULL, NULL, NULL, 101, NULL, NULL, NULL, NULL, NULL, 77, 77, 0, 'Pathology Test', 2, 4, NULL, '2023-04-01 13:08:20', '2023-04-01 13:23:45'),
(153, 22, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, NULL, 500, 500, 0, 'Admission fees Due for the customerSaleh', 2, 9, NULL, '2023-04-10 16:32:33', '2023-04-10 16:32:33'),
(154, 1, 1, NULL, NULL, NULL, 102, NULL, NULL, NULL, NULL, NULL, 900, 900, 0, 'Pathology Test', 2, 4, NULL, '2023-05-30 20:16:42', '2023-05-30 20:16:42'),
(155, 1, 1, NULL, NULL, NULL, 103, NULL, NULL, NULL, NULL, NULL, 1100, 1100, 0, 'Pathology Test', 2, 4, NULL, '2023-05-31 10:04:54', '2023-05-31 10:04:54'),
(156, 1, 1, NULL, NULL, NULL, 104, NULL, NULL, NULL, NULL, NULL, 100, 100, 0, 'Pathology Test', 2, 4, NULL, '2023-05-31 10:10:13', '2023-05-31 10:10:13'),
(162, 1, 1, NULL, NULL, NULL, 105, NULL, NULL, NULL, NULL, NULL, 199.99999000000003, 199.99999000000003, 0, 'Pathology Test', 2, 4, NULL, '2023-06-05 01:18:50', '2023-06-05 01:18:50'),
(163, 1, 1, NULL, NULL, NULL, 106, NULL, NULL, NULL, NULL, NULL, 200, 200, 0, 'Pathology Test', 2, 4, NULL, '2023-06-05 02:14:16', '2023-06-05 02:14:16'),
(164, 1, 1, NULL, NULL, NULL, 107, NULL, NULL, NULL, NULL, NULL, 1000, 1000, 0, 'Pathology Test', 2, 4, NULL, '2023-06-06 03:21:02', '2023-06-06 03:21:02'),
(165, 1, 1, NULL, NULL, NULL, 108, NULL, NULL, NULL, NULL, NULL, 75, 75, 0, 'Pathology Test', 2, 4, NULL, '2023-06-06 03:39:43', '2023-07-09 16:08:31'),
(166, 1, 1, NULL, NULL, NULL, 109, NULL, NULL, NULL, NULL, NULL, 1000, 1000, 0, 'Pathology Test', 2, 4, NULL, '2023-06-06 03:54:02', '2023-07-09 16:15:47'),
(167, 21, 1, NULL, NULL, NULL, 110, NULL, NULL, NULL, NULL, NULL, 100, 100, 0, 'Pathology Test', 2, 4, NULL, '2023-07-09 17:06:41', '2023-07-09 17:06:41'),
(168, 1, 1, NULL, NULL, NULL, 111, NULL, NULL, NULL, NULL, NULL, 1400, 1400, 0, 'Pathology Test', 2, 4, NULL, '2023-10-03 21:30:25', '2023-10-03 21:30:25'),
(169, 1, 1, NULL, NULL, NULL, 112, NULL, NULL, NULL, NULL, NULL, 2000, 2000, 0, 'Pathology Test', 2, 4, NULL, '2023-10-03 22:28:33', '2023-10-03 22:28:33'),
(170, 1, 1, NULL, NULL, NULL, 113, NULL, NULL, NULL, NULL, NULL, 2600, 2600, 0, 'Pathology Test', 2, 4, NULL, '2023-10-03 22:40:35', '2023-10-03 22:40:35'),
(171, 1, 1, NULL, NULL, NULL, 114, NULL, NULL, NULL, NULL, NULL, 600, 600, 0, 'Pathology Test', 2, 4, NULL, '2023-10-06 17:04:57', '2023-10-06 17:07:30'),
(172, 4, 1, NULL, NULL, NULL, 115, NULL, NULL, NULL, NULL, NULL, 600, 600, 0, 'Pathology Test', 2, 4, NULL, '2023-10-07 06:29:52', '2023-10-07 06:29:52'),
(173, 1, 1, NULL, NULL, NULL, 116, NULL, NULL, NULL, NULL, NULL, 1100, 1100, 0, 'Pathology Test', 2, 4, NULL, '2023-10-07 07:40:26', '2023-10-07 07:40:26'),
(174, 1, 1, NULL, NULL, NULL, 117, NULL, NULL, NULL, NULL, NULL, 300, 300, 0, 'Pathology Test', 2, 4, NULL, '2023-10-07 08:02:32', '2023-10-07 08:02:32'),
(175, 1, 1, NULL, NULL, NULL, 118, NULL, NULL, NULL, NULL, NULL, 600, 600, 0, 'Pathology Test', 2, 4, NULL, '2023-10-07 09:20:24', '2023-10-07 09:20:24'),
(176, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 10, 0, ' Pathology Due Payment', 1, 4, NULL, '2023-10-17 07:33:45', '2023-10-17 07:33:45'),
(177, 1, 1, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, 13, 13, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 5', 2, 2, 1, '2023-12-15 22:02:48', '2023-12-15 22:02:48'),
(178, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 10, 0, ' Phermachy Due Payment', 1, 2, NULL, '2023-12-15 22:04:52', '2023-12-15 22:04:52'),
(179, 1, 1, NULL, NULL, NULL, 119, NULL, NULL, NULL, NULL, NULL, 1000, 1000, 0, 'Pathology Test', 2, 4, NULL, '2023-12-16 12:11:20', '2023-12-16 12:11:20'),
(180, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, 22, 0, ' Pathology Due Payment', 1, 4, NULL, '2023-12-16 12:11:58', '2023-12-16 12:11:58'),
(181, 1, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 23000, 22000, 0, 'Surgery', 2, 3, NULL, '2023-12-16 17:21:58', '2023-12-16 17:21:58'),
(182, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2000, 2000, 0, ' Surgery Due Payment', 1, 3, NULL, '2023-12-16 17:22:33', '2023-12-16 17:22:33'),
(183, 1, 1, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, 60, 60, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 6', 2, 2, 1, '2023-12-16 19:42:47', '2023-12-16 19:42:47'),
(184, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 5, 0, ' Phermachy Due Payment', 1, 2, NULL, '2023-12-16 19:43:14', '2023-12-16 19:43:14'),
(185, 1, 1, NULL, NULL, NULL, 120, NULL, NULL, NULL, NULL, NULL, 1000, 1000, 0, 'Pathology Test', 2, 4, NULL, '2023-12-16 19:58:19', '2023-12-16 19:58:19'),
(186, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, 20, 0, ' Pathology Due Payment', 1, 4, NULL, '2023-12-16 19:58:42', '2023-12-16 19:58:42'),
(187, 1, 1, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, 22000, 21900, 0, 'Surgery', 2, 3, NULL, '2023-12-16 20:02:18', '2023-12-16 20:02:18'),
(188, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 900, 900, 0, ' Surgery Due Payment', 1, 3, NULL, '2023-12-16 20:02:59', '2023-12-16 20:02:59'),
(189, 10, 1, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 600, 200, 0, NULL, 2, 5, NULL, '2023-12-16 20:20:48', '2023-12-16 20:20:48'),
(190, 10, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 10, 0, ' Doctor Due Payment', 1, 5, NULL, '2023-12-16 20:23:02', '2023-12-16 20:23:02'),
(191, 10, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, 20, 0, ' Doctor Due Payment', 1, 5, NULL, '2023-12-16 20:23:54', '2023-12-16 20:23:54'),
(192, 10, 1, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 300, 300, 0, NULL, 2, 5, NULL, '2023-12-17 09:29:40', '2023-12-17 09:29:40'),
(193, 1, 1, NULL, NULL, NULL, 121, NULL, NULL, NULL, NULL, NULL, 1100, 1100, 0, 'Pathology Test', 2, 4, NULL, '2024-01-02 11:34:12', '2024-01-02 11:34:12'),
(194, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 300, 300, 0, ' Pathology Due Payment', 1, 4, NULL, '2024-01-02 11:48:00', '2024-01-02 11:48:00'),
(195, 1, 1, NULL, NULL, NULL, 122, NULL, NULL, NULL, NULL, NULL, 1000, 1000, 0, 'Pathology Test', 2, 4, NULL, '2024-01-03 10:35:04', '2024-01-03 10:35:04'),
(196, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 10, 0, ' Pathology Due Payment', 1, 4, NULL, '2024-01-03 10:36:21', '2024-01-03 10:36:21'),
(197, 10, 1, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 300, 300, 0, NULL, 2, 5, NULL, '2024-01-03 10:41:16', '2024-01-03 10:41:16'),
(198, 10, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 100, 0, ' Doctor Due Payment', 1, 5, NULL, '2024-01-03 10:42:18', '2024-01-03 10:42:18'),
(199, 1, 1, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, 22000, 20000, 0, 'Surgery', 2, 3, NULL, '2024-01-03 11:05:38', '2024-01-03 11:05:38'),
(200, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 1000, 0, ' Surgery Due Payment', 1, 3, NULL, '2024-01-03 11:06:37', '2024-01-03 11:06:37'),
(201, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 10, 0, ' Phermachy Due Payment', 1, 2, NULL, '2024-01-03 11:21:04', '2024-01-03 11:21:04'),
(202, 7, 1, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, 200, 200, 0, 'Medicine sale Due: from Patinet ID: 7 Medicine Order ID: 7', 2, 2, 1, '2024-01-03 11:55:39', '2024-01-03 11:55:39'),
(203, 1, 1, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 1000, 900, 0, 'Service Due', 2, 6, NULL, '2024-01-04 09:47:06', '2024-01-04 09:47:06'),
(204, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 100, 0, ' Service Due Payment', 1, 6, NULL, '2024-01-04 09:48:20', '2024-01-04 09:48:20'),
(205, 1, 1, NULL, NULL, NULL, 123, NULL, NULL, NULL, NULL, NULL, 1160, 1160, 0, 'Pathology Test', 2, 4, NULL, '2024-01-04 09:53:24', '2024-01-04 09:53:24'),
(206, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, 50, 0, ' Pathology Due Payment', 1, 4, NULL, '2024-01-04 10:02:02', '2024-01-04 10:02:02'),
(207, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 110, 100, 10, ' Pathology Due Payment', 1, 4, NULL, '2024-01-04 10:05:43', '2024-01-04 10:05:43'),
(208, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 90, 10, ' Pathology Due Payment', 1, 4, NULL, '2024-01-04 10:08:27', '2024-01-04 10:08:27'),
(209, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 90, 80, 10, ' Pathology Due Payment', 1, 4, NULL, '2024-01-04 10:10:09', '2024-01-04 10:10:09'),
(210, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 800, 700, 100, ' Pathology Due Payment', 1, 4, NULL, '2024-01-04 10:19:20', '2024-01-04 10:19:20'),
(211, 1, 1, NULL, NULL, NULL, 124, NULL, NULL, NULL, NULL, NULL, 1100, 1100, 0, 'Pathology Test', 2, 4, NULL, '2024-01-04 12:08:05', '2024-01-04 12:08:05'),
(212, 1, 1, NULL, NULL, NULL, 125, NULL, NULL, NULL, NULL, NULL, 1000, 1000, 0, 'Pathology Test', 2, 4, NULL, '2024-01-05 09:47:53', '2024-01-05 09:47:53'),
(213, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, 50, 0, ' Pathology Due Payment', 1, 4, NULL, '2024-01-05 09:48:22', '2024-01-05 09:48:22'),
(214, 1, 1, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, 1000, 920, 0, 'Service Due', 2, 6, NULL, '2024-01-05 09:49:29', '2024-01-05 09:49:29'),
(215, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 30, 0, ' Service Due Payment', 1, 6, NULL, '2024-01-05 09:54:05', '2024-01-05 09:54:05'),
(216, 1, 1, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, 900, 100, 0, 'Service Due', 2, 6, NULL, '2024-01-05 09:56:03', '2024-01-05 09:56:03'),
(217, 1, 1, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, 1000, 1000, 0, 'Service Due', 2, 6, NULL, '2024-01-05 10:00:46', '2024-01-05 10:00:46'),
(218, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, 10, 10, ' Service Due Payment', 1, 6, NULL, '2024-01-05 10:58:22', '2024-01-05 10:58:22'),
(219, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 70, 60, 10, ' Service Due Payment', 1, 6, NULL, '2024-01-05 10:59:29', '2024-01-05 10:59:29'),
(220, 1, 1, NULL, NULL, NULL, 126, NULL, NULL, NULL, NULL, NULL, 1800, 1800, 0, 'Pathology Test', 2, 4, NULL, '2024-01-08 09:37:54', '2024-01-08 09:37:54'),
(221, 1, 1, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, 900, 700, 0, 'Service Due', 2, 6, NULL, '2024-01-08 09:39:13', '2024-01-08 09:39:13'),
(222, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60, 50, 10, ' Pathology Due Payment', 1, 4, NULL, '2024-01-08 09:39:49', '2024-01-08 09:39:49'),
(223, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60, 50, 10, ' Service Due Payment', 1, 6, NULL, '2024-01-08 09:39:49', '2024-01-08 09:39:49'),
(224, 23, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, 500, 500, 0, 'Admission fees Due for the customerjasim', 2, 9, NULL, '2024-01-08 10:56:55', '2024-01-08 10:56:55'),
(225, 23, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 500, 400, 100, ' Admission Fees Due Payment', 1, 9, NULL, '2024-01-08 11:40:35', '2024-01-08 11:40:35'),
(226, 24, 1, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, 400, 400, 0, 'Medicine sale Due: from Patinet ID: 24 Medicine Order ID: 8', 2, 2, 1, '2024-01-08 12:34:28', '2024-01-08 12:34:28'),
(227, 1, 1, NULL, NULL, NULL, 127, NULL, NULL, NULL, NULL, NULL, 2000, 2000, 0, 'Pathology Test', 2, 4, NULL, '2024-01-09 09:57:36', '2024-01-09 09:57:36'),
(228, 25, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, NULL, 400, 400, 0, 'Admission fees Due for the customersamsu', 2, 9, NULL, '2024-01-09 09:59:56', '2024-01-09 09:59:56'),
(229, 25, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 200, 200, 0, ' Admission Fees Due Payment', 1, 9, NULL, '2024-01-09 10:16:50', '2024-01-09 10:16:50'),
(230, 1, 1, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, 40, 40, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 9', 2, 2, 1, '2024-01-09 10:23:52', '2024-01-09 10:23:52'),
(231, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, 20, 0, ' Phermachy Due Payment', 1, 2, NULL, '2024-01-09 10:24:12', '2024-01-09 10:24:12'),
(232, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, 10, 10, ' Phermachy Due Payment', 1, 2, NULL, '2024-01-09 11:10:29', '2024-01-09 11:10:29'),
(233, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 60, 50, 10, ' Pathology Due Payment', 1, 4, NULL, '2024-01-09 11:25:59', '2024-01-09 11:25:59'),
(234, 25, 1, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 17500, 17000, 500, 'Due Payment for Cabine ', 1, 1, NULL, '2024-01-09 12:16:45', '2024-01-09 12:16:45'),
(235, 10, 1, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 400, 200, 0, NULL, 2, 5, NULL, '2024-01-09 13:09:28', '2024-01-09 13:09:28'),
(236, 10, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 870, 800, 70, ' Doctor Due Payment', 1, 5, NULL, '2024-01-09 13:11:13', '2024-01-09 13:11:13'),
(237, 1, 1, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, 20000, 18000, 0, 'Surgery', 2, 3, NULL, '2024-01-09 14:03:28', '2024-01-09 14:03:28'),
(238, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10000, 8000, 2000, ' Surgery Due Payment', 1, 3, NULL, '2024-01-09 14:04:06', '2024-01-09 14:04:06'),
(239, 1, 1, NULL, NULL, NULL, 128, NULL, NULL, NULL, NULL, NULL, 1999, 1999, 0, 'Pathology Test', 2, 4, NULL, '2024-01-09 18:58:54', '2024-01-11 11:48:36'),
(240, 7, 1, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, 8, 8, 0, 'Medicine sale Due: from Patinet ID: 7 Medicine Order ID: 10', 2, 2, 1, '2024-01-09 18:59:41', '2024-01-09 18:59:41'),
(242, 1, 1, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, 16000, 14000, 0, 'Surgery', 2, 3, NULL, '2024-01-09 19:01:54', '2024-01-09 19:01:54'),
(243, 1, 1, NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, 1800, 1000, 0, 'Service Due', 2, 6, NULL, '2024-01-09 19:02:52', '2024-01-09 19:02:52'),
(244, 1, 1, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, 1800, 800, 0, 'Service Due', 2, 6, NULL, '2024-01-09 19:14:38', '2024-01-09 19:14:38'),
(245, 26, 1, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 2700, 2000, 700, 'Due Payment for Cabine ', 1, 1, NULL, '2024-01-09 19:15:59', '2024-01-09 19:15:59'),
(246, 27, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21, NULL, 5000, 5000, 0, 'Admission fees Due for the customerjubayer', 2, 9, NULL, '2024-01-09 19:18:44', '2024-01-09 19:18:44'),
(247, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 730, 700, 30, ' Pathology Due Payment', 1, 4, NULL, '2024-01-09 19:25:30', '2024-01-09 19:25:30'),
(248, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 20, 10, ' Phermachy Due Payment', 1, 2, NULL, '2024-01-09 19:25:30', '2024-01-09 19:25:30'),
(249, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 140, 100, 40, ' Service Due Payment', 1, 6, NULL, '2024-01-09 19:25:30', '2024-01-09 19:25:30'),
(250, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2000, 1800, 200, ' Surgery Due Payment', 1, 3, NULL, '2024-01-09 19:25:30', '2024-01-09 19:25:30'),
(251, 27, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5000, 4000, 1000, ' Admission Fees Due Payment', 1, 9, NULL, '2024-01-09 19:27:14', '2024-01-09 19:27:14'),
(252, 27, 1, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, 2700, 2000, 700, 'Due Payment for Cabine ', 1, 1, NULL, '2024-01-09 19:27:44', '2024-01-09 19:27:44'),
(253, 10, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 200, 180, 20, ' Doctor Due Payment', 1, 5, NULL, '2024-01-09 19:42:00', '2024-01-09 19:42:00'),
(254, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 110, 100, 10, ' Pathology Due Payment', 1, 4, NULL, '2024-01-10 18:00:00', '2024-01-11 09:30:36'),
(255, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, 8, 2, ' Phermachy Due Payment', 1, 2, NULL, '2024-01-10 18:00:00', '2024-01-11 09:30:36'),
(256, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 110, 100, 10, ' Service Due Payment', 1, 6, NULL, '2024-01-10 18:00:00', '2024-01-11 09:30:36'),
(257, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 110, 100, 10, ' Surgery Due Payment', 1, 3, NULL, '2024-01-10 18:00:00', '2024-01-11 09:30:36'),
(258, 8, 1, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, 1500, 1000, 500, 'Due Payment for Cabine ', 1, 1, NULL, '2024-01-10 18:00:00', '2024-01-11 09:53:23'),
(259, 28, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, 1000, 1000, 0, 'Admission fees Due for the customerHabib', 2, 9, NULL, '2024-01-11 09:59:04', '2024-01-11 09:59:04'),
(260, 28, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 500, 500, ' Admission Fees Due Payment', 1, 9, NULL, '2024-01-10 18:00:00', '2024-01-11 10:00:19'),
(261, 10, 1, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 600, 400, 0, NULL, 2, 5, NULL, '2024-01-11 10:52:43', '2024-01-11 10:52:43'),
(262, 10, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 400, 300, 100, ' Doctor Due Payment', 1, 5, NULL, '2024-01-10 18:00:00', '2024-01-11 10:53:27'),
(263, 1, 1, NULL, NULL, NULL, 129, NULL, NULL, NULL, NULL, NULL, 8.549999999999997, 8.549999999999997, 0, 'Pathology Test', 2, 4, NULL, '2024-01-10 18:00:00', '2024-01-15 15:45:29'),
(264, 7, 1, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 'Medicine sale Due: from Patinet ID: 7 Medicine Transition ID: 11', 2, 2, 1, '2024-01-13 11:18:29', '2024-01-13 11:32:38'),
(265, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 35, 1400, 1400, 0, 'Cash back for Returning Medicine to the customer:Abrur rahmane', 7, 2, 1, '2024-01-11 18:00:00', '2024-01-13 12:22:39'),
(266, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 36, 1400, 1400, 0, 'Cash back for Returning Medicine to the customer:Abrur rahmane', 7, 2, 1, NULL, '2024-01-13 12:25:23'),
(267, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 37, 1400, 1400, 0, 'Cash back for Returning Medicine to the customer:Abrur rahmane', 7, 2, 1, NULL, '2024-01-13 12:27:18'),
(268, 7, 1, NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, 4200, 4200, 0, 'Medicine sale Due: from Patinet ID: 7 Medicine Order ID: 12', 2, 2, 1, '2024-01-14 18:00:00', '2024-01-15 15:19:54'),
(269, 12, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 38, 70, 70, 0, 'Cash back for Returning Medicine to the customer:Rokeya Khatun', 7, 2, 1, '2024-01-12 18:00:00', '2024-01-13 12:52:13'),
(270, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 39, 1, 1, 0, 'Cash back for Returning Medicine to the customer:Abrur rahmane', 7, 2, 1, '2024-01-12 18:00:00', '2024-01-13 13:30:16'),
(271, 19, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, 8000, 8000, 0, 'Cash back for Returning Medicine to the customer:Ibn Sina', 7, 2, 1, '2024-01-12 18:00:00', '2024-01-13 13:31:32'),
(272, 12, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41, 20, 20, 0, 'Cash back for Returning Medicine to the customer:Rokeya Khatun', 7, 2, 1, '2024-01-11 18:00:00', '2024-01-13 13:46:18'),
(273, 25, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 42, 10.5, 10.5, 0, 'Cash back for Returning Medicine to the customer:samsu', 7, 2, 1, '2024-01-11 18:00:00', '2024-01-13 13:46:58'),
(275, 1, 1, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, 1000, 1000, 0, 'Service Due', 2, 6, NULL, '2024-01-14 18:00:00', '2024-01-15 15:54:43'),
(276, 1, 1, NULL, NULL, NULL, NULL, NULL, 10, NULL, NULL, NULL, 1000, 1000, 0, 'Service Due', 2, 6, NULL, '2024-01-14 18:00:00', '2024-01-15 15:58:08'),
(277, 1, 1, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, 22000, 22000, 0, 'Surgery', 2, 3, NULL, '2024-01-14 18:00:00', '2024-01-15 17:13:42'),
(278, 30, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, 501, 501, 0, NULL, 5, NULL, NULL, '2024-02-28 18:00:00', '2024-03-01 11:01:57'),
(279, 12, 1, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, 880200, 13008, 867192, 'Due Payment for Cabine ', 1, 1, NULL, '2024-03-01 11:28:36', '2024-03-01 11:28:36'),
(280, 19, 1, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, 596700, 50500, 546200, 'Due Payment for Cabine ', 1, 1, NULL, '2024-02-26 18:00:00', '2024-03-01 12:18:39'),
(281, 19, 1, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, 316400, 308500, 7900, 'Due Payment for Cabine ', 1, 1, NULL, '2024-02-29 18:00:00', '2024-03-01 12:44:31'),
(282, 29, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5001, 5001, 0, 'Advance Deposit by the Patientkamrul', 5, NULL, NULL, '2024-03-02 18:00:00', '2024-03-01 12:52:48'),
(283, 7, 1, NULL, NULL, NULL, 131, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 'Pathology Test from Patient ID: 7 Pathology Order ID: 131', 2, 4, NULL, '2024-03-01 18:00:00', '2024-03-02 12:15:52'),
(284, 7, 1, NULL, NULL, NULL, 132, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 'Pathology Test from Patient ID: 7 Pathology Order ID: 132', 2, 4, NULL, '2024-03-01 18:00:00', '2024-03-02 12:17:49'),
(285, 7, 1, NULL, NULL, NULL, 133, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 'Pathology Test from Patient ID: 7 Pathology Order ID: 133', 2, 4, NULL, '2024-03-01 18:00:00', '2024-03-02 12:32:10'),
(287, 31, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, NULL, 1091, 1091, 0, NULL, 5, NULL, NULL, '2024-02-28 18:00:00', '2024-03-02 13:08:45'),
(288, 32, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, NULL, 201, 201, 0, NULL, 5, NULL, NULL, '2024-03-02 18:00:00', '2024-03-03 12:15:24'),
(289, 32, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, NULL, 101, 101, 0, 'Admission fees Due for the customerTest Patient', 2, 9, NULL, '2024-03-02 18:00:00', '2024-03-03 12:15:24'),
(299, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 43, 800, 800, 0, 'Cash back for Returning Medicine to the customer:Abrur rahman', 7, 2, 1, '2024-03-09 11:29:12', '2024-03-09 11:29:46'),
(300, 11, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 44, 210, 210, 0, 'Cash back for Returning Medicine to the customer:Krishna Rani', 7, 2, 1, '2024-03-09 11:29:12', '2024-03-09 11:30:08'),
(301, 30, 1, NULL, NULL, 19, NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 0, 'Medicine sale Due: from Patinet ID: 30 Medicine Order ID: 19', 2, 2, 1, '2024-03-09 12:58:47', '2024-03-09 13:00:10'),
(302, 30, 1, NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, 35, 35, 0, 'Medicine sale Due: from Patinet ID: 30 Medicine Order ID: 20', 2, 2, 1, '2024-03-09 12:58:47', '2024-03-09 13:01:29'),
(303, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 45, 3, 3, 0, 'Cash back for Returning Medicine to the customer:Abrur rahman', 7, 2, 1, '2024-03-09 13:03:14', '2024-03-09 13:06:12'),
(304, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 46, 35, 35, 0, 'Cash back for Returning Medicine to the customer:Abrur rahman', 7, 2, 1, '2024-03-09 13:03:14', '2024-03-09 13:06:44'),
(305, 33, 1, NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, NULL, 100, 100, 0, 'Medicine sale Due: from Patinet ID: 33 Medicine Order ID: 21', 2, 2, 1, '2024-03-11 06:07:51', '2024-03-17 06:09:35'),
(307, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 48, 100, 100, 0, 'Cash back for Returning Medicine to the customer:Abrur rahman', 7, 2, 1, '2024-03-14 09:07:10', '2024-03-17 09:07:51'),
(308, 33, 1, NULL, NULL, 22, NULL, NULL, NULL, NULL, NULL, NULL, 300, 300, 0, 'Medicine sale Due: from Patinet ID: 33 Medicine Order ID: 22', 2, 2, 1, '2024-03-17 09:09:57', '2024-03-17 09:10:19'),
(309, 34, 1, NULL, NULL, 23, NULL, NULL, NULL, NULL, NULL, NULL, 200, 200, 0, 'Medicine sale Due: from Patinet ID: 34 Medicine Order ID: 23', 2, 2, 1, '2024-03-10 18:27:09', '2024-03-17 18:28:52'),
(314, 34, 1, NULL, NULL, 24, NULL, NULL, NULL, NULL, NULL, NULL, 600, 600, 0, 'Medicine sale Due: from Patinet ID: 34 Medicine Order ID: 24', 2, 2, 1, '2024-03-14 19:20:39', '2024-03-17 19:21:31'),
(317, 37, 1, NULL, NULL, NULL, 142, NULL, NULL, NULL, NULL, NULL, 1300, 1300, 0, 'Pathology Test', 2, 4, NULL, '2024-03-23 19:22:00', '2024-03-30 19:23:00'),
(325, 32, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34, 11, 23, 'zxz', 1, 2, NULL, '2024-04-07 05:46:55', '2024-04-07 05:46:55'),
(326, 32, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 45, 45, 0, 'zxz', 3, 2, NULL, '2024-04-07 05:46:55', '2024-04-07 05:46:55'),
(327, 31, 38, NULL, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, 0, 0, 0, 'Due Payment for Cabine ', 1, 1, NULL, '2024-04-18 06:01:00', '2024-04-07 06:01:35'),
(328, 7, 40, NULL, NULL, 30, NULL, NULL, NULL, NULL, NULL, NULL, 50, 50, 0, 'Medicine sale Due: from Patinet ID: 7 Medicine Order ID: 30', 2, 2, 1, '2024-04-07 16:02:09', '2024-04-07 16:03:33'),
(329, 11, 40, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 10, 10, 0, 'Medicine sale Due: from Patinet ID: 11 Medicine Order ID: 2', 2, 2, 1, '2024-04-07 18:46:55', '2024-04-07 18:49:01'),
(330, 7, 40, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 100, 100, 0, 'Medicine sale Due: from Patinet ID: 7 Medicine Order ID: 3', 2, 2, 1, '2024-04-07 18:46:55', '2024-04-07 18:49:39'),
(331, 1, 38, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 1930, 1930, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 4', 2, 2, 1, '2024-04-09 08:11:43', '2024-04-09 08:11:58'),
(332, 1, 38, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 1000, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 5', 2, 2, 1, '2024-04-09 10:42:02', '2024-04-09 10:43:52'),
(333, 1, 38, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, 50, 50, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 6', 2, 2, 1, '2024-04-09 10:42:02', '2024-04-09 10:46:00'),
(334, 1, 38, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, 400, 400, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 7', 2, 2, 1, '2024-04-09 11:24:08', '2024-04-09 11:25:05'),
(335, 1, 38, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, 12100, 12100, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 8', 2, 2, 1, '2024-04-09 18:13:54', '2024-04-09 18:14:37'),
(336, 1, 38, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, 10, 10, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 9', 2, 2, 1, '2024-04-09 19:58:08', '2024-04-09 19:58:38'),
(337, 1, 38, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, 200, 200, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 10', 2, 2, 1, '2024-04-10 08:05:22', '2024-04-10 08:06:08'),
(338, 1, 38, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, 600, 600, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 11', 2, 2, 1, '2024-04-16 08:05:22', '2024-04-10 08:07:03'),
(339, 1, 38, NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, 5, 5, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 12', 2, 2, 1, '2024-04-10 13:15:25', '2024-04-10 13:15:54'),
(340, 7, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 54, 25, 25, 0, 'Cash back for Returning Medicine to the customer:Abrur rahman', 7, 2, 1, '2024-04-10 13:16:57', '2024-04-10 13:18:13'),
(341, 1, 38, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, 200, 200, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 13', 2, 2, 1, '2024-04-13 05:50:15', '2024-04-13 05:50:33'),
(342, 1, 38, NULL, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 1000, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 14', 2, 2, 1, '2024-04-13 05:50:15', '2024-04-13 06:09:23'),
(343, 1, 38, NULL, NULL, 15, NULL, NULL, NULL, NULL, NULL, NULL, 400, 400, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 15', 2, 2, 1, '2024-04-13 06:10:18', '2024-04-13 06:10:40'),
(344, 1, 38, NULL, NULL, 16, NULL, NULL, NULL, NULL, NULL, NULL, 1500, 1500, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 16', 2, 2, 1, '2024-04-13 06:30:18', '2024-04-13 06:30:45'),
(345, 1, 38, NULL, NULL, 17, NULL, NULL, NULL, NULL, NULL, NULL, 1000, 1000, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 17', 2, 2, 1, '2024-04-13 06:43:25', '2024-04-13 06:43:57'),
(346, 1, 38, NULL, NULL, 18, NULL, NULL, NULL, NULL, NULL, NULL, 3000, 3000, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 18', 2, 2, 1, '2024-04-15 12:43:55', '2024-04-13 12:44:26'),
(347, 1, 38, NULL, NULL, 19, NULL, NULL, NULL, NULL, NULL, NULL, 300, 300, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 19', 2, 2, 1, '2024-04-13 17:48:39', '2024-04-13 17:49:03'),
(348, 7, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 55, 200, 200, 0, 'Cash back for Returning Medicine to the customer:Abrur rahman', 7, 2, 1, '2024-04-17 17:58:36', '2024-04-13 18:03:53'),
(349, 1, 38, NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, 75, 75, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 20', 2, 2, 1, '2024-04-07 08:45:43', '2024-04-14 08:46:19'),
(350, 1, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 56, 25, 25, 0, 'Cash back for Returning Medicine to the customer:External customer', 7, 2, 1, '2024-04-08 08:47:25', '2024-04-14 08:48:33'),
(351, 1, 38, NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, NULL, 2000, 2000, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 21', 2, 2, 1, '2024-04-25 07:33:02', '2024-04-25 07:37:31'),
(354, 1, 38, NULL, NULL, 24, NULL, NULL, NULL, NULL, NULL, NULL, 4000, 4000, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 24', 2, 2, 1, '2024-04-25 08:14:39', '2024-04-25 08:15:01'),
(355, 1, 38, NULL, NULL, 25, NULL, NULL, NULL, NULL, NULL, NULL, 4000, 4000, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 25', 2, 2, 1, '2024-04-25 08:17:26', '2024-04-25 08:17:53'),
(356, 1, 38, NULL, NULL, 26, NULL, NULL, NULL, NULL, NULL, NULL, 80, 80, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 26', 2, 2, 1, '2024-04-25 11:35:31', '2024-04-25 11:36:02'),
(357, 1, 38, NULL, NULL, 27, NULL, NULL, NULL, NULL, NULL, NULL, 80, 80, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 27', 2, 2, 1, '2024-04-25 11:43:06', '2024-04-25 11:43:31'),
(358, 1, 38, NULL, NULL, 28, NULL, NULL, NULL, NULL, NULL, NULL, 200, 200, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 28', 2, 2, 1, '2024-04-25 11:44:50', '2024-04-25 11:45:10'),
(359, 1, 38, NULL, NULL, 29, NULL, NULL, NULL, NULL, NULL, NULL, 200, 200, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 29', 2, 2, 1, '2024-04-25 11:51:18', '2024-04-25 11:51:36'),
(360, 1, 38, NULL, NULL, 30, NULL, NULL, NULL, NULL, NULL, NULL, 200, 200, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 30', 2, 2, 1, '2024-04-25 11:52:44', '2024-04-25 11:52:57'),
(361, 1, 38, NULL, NULL, 31, NULL, NULL, NULL, NULL, NULL, NULL, 800, 800, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 31', 2, 2, 1, '2024-04-25 11:54:09', '2024-04-25 11:54:27'),
(362, 1, 38, NULL, NULL, 32, NULL, NULL, NULL, NULL, NULL, NULL, 900, 900, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 32', 2, 2, 1, '2024-04-27 07:47:04', '2024-04-27 07:47:54'),
(363, 1, 38, NULL, NULL, 33, NULL, NULL, NULL, NULL, NULL, NULL, 50, 50, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 33', 2, 2, 1, '2024-04-27 07:49:53', '2024-04-27 07:50:39'),
(365, 1, 38, NULL, NULL, 35, NULL, NULL, NULL, NULL, NULL, NULL, 50, 50, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 35', 2, 2, 1, '2024-04-27 07:52:41', '2024-04-27 07:52:57'),
(366, 1, 38, NULL, NULL, 36, NULL, NULL, NULL, NULL, NULL, NULL, 225, 225, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 36', 2, 2, 1, '2024-04-27 07:56:08', '2024-04-27 07:56:35'),
(367, 1, 38, NULL, NULL, 37, NULL, NULL, NULL, NULL, NULL, NULL, 900, 900, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 37', 2, 2, 1, '2024-04-27 07:56:08', '2024-04-27 07:57:24'),
(368, 1, 38, NULL, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, 450, 450, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 38', 2, 2, 1, '2024-04-27 08:22:33', '2024-04-27 08:23:07'),
(369, 1, 38, NULL, NULL, 39, NULL, NULL, NULL, NULL, NULL, NULL, 320, 320, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 39', 2, 2, 1, '2024-04-27 08:22:33', '2024-04-27 08:23:56'),
(371, 1, 38, NULL, NULL, 41, NULL, NULL, NULL, NULL, NULL, NULL, 400, 400, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 41', 2, 2, 1, '2024-04-27 08:37:17', '2024-04-27 08:38:01'),
(372, 1, 38, NULL, NULL, 42, NULL, NULL, NULL, NULL, NULL, NULL, 400, 400, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 42', 2, 2, 1, '2024-04-27 08:43:54', '2024-04-27 08:44:39'),
(373, 1, 38, NULL, NULL, 43, NULL, NULL, NULL, NULL, NULL, NULL, 400, 400, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 43', 2, 2, 1, '2024-04-27 08:45:08', '2024-04-27 08:45:32'),
(374, 1, 38, NULL, NULL, 44, NULL, NULL, NULL, NULL, NULL, NULL, 400, 400, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 44', 2, 2, 1, '2024-04-27 09:31:23', '2024-04-27 09:31:44'),
(375, 1, 38, NULL, NULL, 45, NULL, NULL, NULL, NULL, NULL, NULL, 4000, 4000, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 45', 2, 2, 1, '2024-04-02 12:51:21', '2024-04-27 12:51:53'),
(376, 1, 38, NULL, NULL, 46, NULL, NULL, NULL, NULL, NULL, NULL, 200, 200, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 46', 2, 2, 1, '2024-04-02 19:08:39', '2024-04-27 19:09:12'),
(377, 1, 38, NULL, NULL, 47, NULL, NULL, NULL, NULL, NULL, NULL, 200, 200, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 47', 2, 2, 1, '2024-04-03 19:16:20', '2024-04-27 19:16:46'),
(378, 1, 38, NULL, NULL, 48, NULL, NULL, NULL, NULL, NULL, NULL, 300, 300, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 48', 2, 2, 1, '2024-04-04 19:18:02', '2024-04-27 19:18:23'),
(379, 1, 38, NULL, NULL, 49, NULL, NULL, NULL, NULL, NULL, NULL, 300, 300, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 49', 2, 2, 1, '2024-04-06 06:39:06', '2024-04-28 06:39:33'),
(380, 1, 38, NULL, NULL, 50, NULL, NULL, NULL, NULL, NULL, NULL, 500, 500, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 50', 2, 2, 1, '2024-04-28 06:57:45', '2024-04-28 06:58:25'),
(381, 1, 38, NULL, NULL, 51, NULL, NULL, NULL, NULL, NULL, NULL, 1500, 1500, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 51', 2, 2, 1, '2024-04-28 06:57:45', '2024-04-28 06:59:01'),
(382, 1, 38, NULL, NULL, 52, NULL, NULL, NULL, NULL, NULL, NULL, 2000, 2000, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 52', 2, 2, 1, '2024-04-28 07:04:09', '2024-04-28 07:04:31'),
(383, 1, 38, NULL, NULL, 53, NULL, NULL, NULL, NULL, NULL, NULL, 4000, 4000, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 53', 2, 2, 1, '2024-04-28 07:05:38', '2024-04-28 07:05:53'),
(384, 1, 38, NULL, NULL, 54, NULL, NULL, NULL, NULL, NULL, NULL, 500, 500, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 54', 2, 2, 1, '2024-04-28 07:07:34', '2024-04-28 07:07:47'),
(385, 1, 38, NULL, NULL, 55, NULL, NULL, NULL, NULL, NULL, NULL, 500, 500, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 55', 2, 2, 1, '2024-04-28 07:08:58', '2024-04-28 07:09:19'),
(386, 1, 38, NULL, NULL, 56, NULL, NULL, NULL, NULL, NULL, NULL, 2000, 2000, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 56', 2, 2, 1, '2024-04-28 07:16:08', '2024-04-28 07:16:55'),
(387, 1, 38, NULL, NULL, 57, NULL, NULL, NULL, NULL, NULL, NULL, 4000, 4000, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 57', 2, 2, 1, '2024-04-03 07:46:06', '2024-04-28 07:47:29'),
(388, 1, 38, NULL, NULL, 58, NULL, NULL, NULL, NULL, NULL, NULL, 5000, 5000, 0, 'Medicine sale Due: from Patinet ID: 1 Medicine Order ID: 58', 2, 2, 1, '2024-04-04 07:46:06', '2024-04-28 07:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `employeedetails`
--

CREATE TABLE `employeedetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `salary` double NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employeedetails`
--

INSERT INTO `employeedetails` (`id`, `name`, `designation`, `salary`, `mobile`, `address`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, 'Dr Tusar Alam', 'Pathology Doctor', 20000, '01324166600', 'SOUTH ZONE', 1, '2022-08-01 07:08:41', '2023-01-14 22:51:09'),
(2, 'Chayan Mondal', 'MD', 30000, '01324166566', 'South Zone', 0, '2023-01-14 22:57:13', '2023-01-14 22:57:13'),
(3, 'Priyotosh Ghosh', 'GM', 15000, '01324166605', 'South Zone', 0, '2023-01-14 22:59:38', '2023-01-14 22:59:38'),
(4, 'Prodip Ghosh', 'Manager', 16000, '01324166600', 'South Zone', 0, '2023-01-14 23:00:12', '2023-01-14 23:00:12'),
(5, 'Dr.Tusar Alam', 'Pathology Doctor', 20000, '01784618626', 'South Zone', 0, '2023-01-14 23:01:05', '2023-01-14 23:01:05'),
(6, 'Dr.Sadia', 'Medical Officer', 26000, '01797997742', 'South Zone', 0, '2023-01-14 23:02:07', '2023-01-14 23:32:08'),
(7, 'Dr.Palash', 'Duty Doctor', 8000, '01533134348', 'South Zone', 0, '2023-01-14 23:02:58', '2023-01-14 23:02:58'),
(8, 'Dr.Ruma', 'Duty Doctor', 8000, '01798312433', 'South Zone', 0, '2023-01-14 23:03:45', '2023-01-14 23:03:45'),
(9, 'Dr.Sornali', 'Duty Doctor', 8000, '01913454982', 'South Zone', 0, '2023-01-14 23:05:00', '2023-01-14 23:05:00'),
(10, 'Ismayel Hossain', 'X-ray', 7000, '01997084757', 'South Zone', 0, '2023-01-14 23:06:23', '2023-01-14 23:06:23'),
(11, 'Chinmay Biswas', 'Pharmacy', 7500, '01914772871', 'South Zone', 0, '2023-01-14 23:07:06', '2023-01-14 23:07:06'),
(12, 'Puja Kundu', 'Lab Incharge', 10000, '01643210920', 'South Zone', 0, '2023-01-14 23:07:52', '2023-01-14 23:07:52'),
(13, 'Eitu', 'Lab Tecenition', 8000, '01707715360', 'South Zone', 0, '2023-01-14 23:08:30', '2023-01-14 23:08:30'),
(14, 'Raju', 'Lab Assistant', 3000, '01403962522', 'South Zone', 0, '2023-01-14 23:09:18', '2023-01-14 23:09:18'),
(15, 'Horiproshad', 'OT Incharge', 9000, '01720271388', 'South Zone', 0, '2023-01-14 23:10:10', '2023-01-14 23:10:10'),
(16, 'Asma Akter', 'OT Sister', 8000, '01946410192', 'South Zone', 0, '2023-01-14 23:11:01', '2023-01-14 23:11:01'),
(17, 'Beauty', 'OT Sister', 7000, '01608162493', 'South Zone', 0, '2023-01-14 23:12:49', '2023-01-14 23:12:49'),
(18, 'Rubina', 'Sister', 7000, '01324166614', 'South Zone', 0, '2023-01-14 23:13:48', '2023-01-14 23:13:48'),
(19, 'Mariya', 'Sister', 6000, '01324166600', 'South Zone', 0, '2023-01-14 23:15:24', '2023-01-14 23:15:24'),
(20, 'Monika', 'Sister', 7000, '01915722342', 'South Zone', 0, '2023-01-14 23:16:00', '2023-01-14 23:16:00'),
(21, 'Mitali', 'Sister', 6000, '01731233764', 'South Zone', 0, '2023-01-14 23:16:34', '2023-01-14 23:16:34'),
(22, 'Ratna', 'Sister', 6000, '01777870279', 'South Zone', 0, '2023-01-14 23:17:07', '2023-01-14 23:17:07'),
(23, 'Priyanka', 'Sister', 6000, '01823058508', 'South Zone', 0, '2023-01-14 23:17:40', '2023-01-14 23:17:40'),
(24, 'Oishi', 'Doctor Attendance', 6000, '01999805843', 'South Zone', 0, '2023-01-14 23:18:23', '2023-01-14 23:18:23'),
(25, 'Shanta', 'Doctor Attendance', 5000, '01913245637', 'South Zone', 0, '2023-01-14 23:19:09', '2023-01-14 23:19:09'),
(26, 'Hasibul', 'Word Boy', 5000, '01408880782', 'South Zone', 0, '2023-01-14 23:19:51', '2023-01-14 23:19:51'),
(27, 'Animash', 'Word Boy', 5000, '01768152668', 'South Zone', 0, '2023-01-14 23:20:30', '2023-01-14 23:20:30'),
(28, 'Akash', 'Word Boy', 5000, '01892148519', 'South Zone', 0, '2023-01-14 23:21:07', '2023-01-14 23:21:07'),
(29, 'Emon', 'Word Boy', 5000, '01324166600', 'South Zone', 0, '2023-01-14 23:21:33', '2023-01-14 23:21:33'),
(30, 'Monowara', 'Khala', 5000, '01759051539', 'South Zone', 0, '2023-01-14 23:22:13', '2023-01-14 23:22:13'),
(31, 'Parveen', 'Khala', 5000, '01948162478', 'South Zone', 0, '2023-01-14 23:22:45', '2023-01-14 23:22:45'),
(32, 'Naznin', 'Khala', 5000, '01947283465', 'South Zone', 0, '2023-01-14 23:23:56', '2023-01-14 23:23:56'),
(33, 'Riziya', 'Khala', 5000, '01950784258', 'South Zone', 0, '2023-01-14 23:24:41', '2023-01-14 23:24:41'),
(34, 'Sheuly', 'Khala', 5000, '01324166600', 'South Zone', 0, '2023-01-14 23:26:32', '2023-01-14 23:26:32'),
(35, 'Sonia Begum', 'Khala', 5000, '01924302259', 'South Zone', 0, '2023-01-14 23:28:06', '2023-01-14 23:28:06'),
(36, 'Morsheda', 'Receptionist', 8000, '01640078697', 'South Zone', 0, '2023-01-14 23:31:55', '2023-01-14 23:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `employeelists`
--

CREATE TABLE `employeelists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employeesalarytransactions`
--

CREATE TABLE `employeesalarytransactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employeedetails_id` bigint(20) UNSIGNED NOT NULL,
  `starting` date DEFAULT NULL,
  `ending` date DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `totalsalary` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `month_year` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employeesalarytransactions`
--

INSERT INTO `employeesalarytransactions` (`id`, `employeedetails_id`, `starting`, `ending`, `month`, `year`, `totalsalary`, `created_at`, `updated_at`, `month_year`) VALUES
(2, 27, '2023-02-13', NULL, '2', '2023', 5000, '2023-02-12 20:24:40', '2023-02-12 20:24:40', 'FEB-2023'),
(3, 17, '2023-02-13', NULL, '2', '2023', 3000, '2023-02-12 20:25:07', '2023-02-12 20:25:07', 'FEB-2023');

-- --------------------------------------------------------

--
-- Table structure for table `externalcosts`
--

CREATE TABLE `externalcosts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `cost` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `externalcosts`
--

INSERT INTO `externalcosts` (`id`, `name`, `cost`, `created_at`, `updated_at`) VALUES
(1, 'gfg', 445, '2024-04-20 10:28:00', '2024-04-07 10:28:23'),
(2, 'cxc', 545, '2024-04-19 10:32:00', '2024-04-07 10:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finalreports`
--

CREATE TABLE `finalreports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `due` double NOT NULL,
  `totalvat` double(14,4) NOT NULL,
  `totaldiscount` double(14,4) NOT NULL DEFAULT 0.0000,
  `totalservicecharge_after_adjusting_vat_tax` double(14,4) NOT NULL DEFAULT 0.0000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finalreports`
--

INSERT INTO `finalreports` (`id`, `patient_id`, `user_id`, `due`, `totalvat`, `totaldiscount`, `totalservicecharge_after_adjusting_vat_tax`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 500, 0.0000, 100.0000, 3100.0000, '2023-02-05 15:18:35', '2023-02-05 15:18:35'),
(2, 8, 1, 0, 0.0000, 0.0000, 2000.0000, '2023-02-06 15:14:04', '2023-02-06 15:14:04'),
(3, 9, 1, 0, 0.0000, 0.0000, 20800.0000, '2023-02-06 17:06:36', '2023-02-06 17:06:36'),
(4, 10, 1, 0, 0.0000, 0.0000, 21500.0000, '2023-02-06 17:17:06', '2023-02-06 17:17:06'),
(5, 15, 1, 0, 0.0000, 0.0000, 18900.0000, '2023-02-18 14:53:35', '2023-02-18 14:53:35'),
(6, 13, 1, 0, 0.0000, 0.0000, 24300.0000, '2023-02-18 16:52:34', '2023-02-18 16:52:34'),
(7, 21, 1, 100, 0.0000, 0.0000, 367300.0000, '2023-07-09 16:45:31', '2023-07-09 16:45:31'),
(8, 30, 1, 0, 0.0000, 0.0000, 5100.0000, '2024-03-02 12:58:38', '2024-03-02 12:58:38'),
(9, 31, 1, 0, 0.0000, 0.0000, 8100.0000, '2024-03-02 13:09:50', '2024-03-02 13:09:50'),
(10, 32, 1, 101, 0.0000, 0.0000, 1700.0000, '2024-03-03 12:16:29', '2024-03-03 12:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `khorocer_khads`
--

CREATE TABLE `khorocer_khads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` double(8,2) DEFAULT NULL,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khorocer_khads`
--

INSERT INTO `khorocer_khads` (`id`, `name`, `quantity`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, 'Oxyzen Buying', 1274.00, 0, '2022-06-02 18:12:19', '2024-04-07 11:15:23'),
(2, 'Nitrogen Buying', NULL, 0, '2022-06-02 18:15:21', '2022-06-02 18:15:21'),
(3, 'Carbon-dy-oxide', -4.00, 0, '2022-06-02 18:15:35', '2024-04-07 11:25:35'),
(4, 'X-Ray Plate', NULL, 0, '2022-06-02 18:15:50', '2022-06-02 18:15:50'),
(5, 'Ultrasonography Film', NULL, 0, '2022-06-02 18:16:50', '2022-06-02 18:16:50'),
(6, 'Printing Paper', NULL, 0, '2022-06-02 18:17:08', '2022-06-02 18:17:08'),
(7, 'Report Printing Paper', NULL, 0, '2022-06-02 18:17:29', '2022-06-02 18:17:29'),
(8, 'Doctor Pad', NULL, 0, '2022-06-02 18:17:48', '2022-06-02 18:17:48'),
(9, 'Electricity Bill', NULL, 0, '2022-06-02 18:18:51', '2022-06-02 18:18:51'),
(10, 'Internet Bill', NULL, 0, '2022-06-02 18:19:01', '2022-06-02 18:19:01'),
(11, 'Mobile Cost', NULL, 0, '2022-06-02 18:19:11', '2022-06-02 18:19:11'),
(12, 'Office Entertainment Cost', NULL, 0, '2022-06-02 18:20:34', '2022-06-02 18:20:34'),
(13, 'Pattrol', NULL, 0, '2022-06-03 03:58:28', '2022-06-03 03:58:28'),
(14, 'Paper Bill', NULL, 0, '2022-06-04 04:36:35', '2022-06-04 04:36:35'),
(15, 'Doctor Salary', NULL, 0, '2022-06-04 04:38:01', '2022-06-04 04:38:01'),
(16, 'Pathology Regant', NULL, 0, '2022-06-06 02:35:39', '2022-06-06 02:36:10'),
(17, 'Prodipon', NULL, 0, '2022-06-06 02:37:23', '2022-06-06 02:37:23'),
(18, 'Entertainment', NULL, 0, '2022-06-06 02:38:47', '2022-06-06 02:38:47'),
(19, 'Battery', NULL, 0, '2022-06-07 04:30:49', '2022-06-07 04:30:49'),
(20, 'Licence', NULL, 0, '2022-06-07 04:31:31', '2022-06-07 04:31:31'),
(21, 'USG PAPER', NULL, 0, '2022-07-01 10:02:02', '2022-07-05 09:23:25'),
(22, 'm', NULL, 1, '2022-07-01 15:23:10', '2022-07-01 15:23:14'),
(23, 'PATHOLOGY REAGENT', NULL, 1, '2022-07-05 09:24:11', '2022-07-05 10:33:52'),
(24, 'DISEL', NULL, 0, '2022-07-05 10:33:43', '2022-07-05 10:33:43'),
(25, 'DISEL', NULL, 1, '2022-07-05 10:34:26', '2022-08-21 01:09:31'),
(26, 'HUMANTARIAN AID', NULL, 0, '2022-07-05 10:35:12', '2022-07-05 10:35:12'),
(27, 'LUB OIL & KULANT', NULL, 0, '2022-07-05 10:36:01', '2022-07-05 10:36:01'),
(28, 'PHOTOCOPY', NULL, 0, '2022-07-05 10:36:29', '2022-07-05 10:36:29'),
(29, 'TRANSPORT COST', NULL, 0, '2022-07-05 10:42:33', '2022-07-05 10:42:33'),
(30, 'MEDICINE COST BY HOSPITAL', NULL, 0, '2022-07-19 07:21:35', '2022-07-19 07:21:35'),
(31, 'HAND WASH', NULL, 0, '2022-08-16 08:30:12', '2022-08-16 08:30:12'),
(32, 'HOSPITAL MANAGMENT', NULL, 0, '2022-08-16 08:31:38', '2022-08-16 08:31:38'),
(33, 'OT ENTERTAINMENT', NULL, 0, '2022-10-14 08:22:14', '2022-10-14 08:22:14'),
(34, 'AL-AMIN TEA STALL', NULL, 0, '2022-10-15 09:03:33', '2022-10-15 09:03:33'),
(35, 'Room Spry', NULL, 0, '2022-10-16 02:04:59', '2022-10-16 02:04:59'),
(36, 'MEDICEN COST (SURGERY)', NULL, 0, '2022-11-08 09:47:35', '2022-11-08 09:47:35'),
(37, 'Software Bill', NULL, 0, '2022-12-04 08:19:13', '2022-12-04 08:19:28'),
(38, 'TA', NULL, 0, '2022-12-24 09:48:50', '2022-12-24 09:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `khoroch_transitions`
--

CREATE TABLE `khoroch_transitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `khorocer_khad_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `unit` double(14,4) NOT NULL,
  `unit_price` double(14,4) NOT NULL,
  `amount` double(14,4) NOT NULL,
  `due` double(14,4) NOT NULL DEFAULT 0.0000,
  `advance` double(14,4) NOT NULL DEFAULT 0.0000,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khoroch_transitions`
--

INSERT INTO `khoroch_transitions` (`id`, `user_id`, `khorocer_khad_id`, `supplier_id`, `comment`, `unit`, `unit_price`, `amount`, `due`, `advance`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, NULL, 1.0000, 5000.0000, 5000.0000, 100.0000, 0.0000, 0, '2023-02-12 18:00:00', '2023-02-12 20:23:16'),
(2, 1, 1, 2, NULL, 1.0000, 30.0000, 30.0000, 0.0000, 0.0000, 0, '2023-05-30 18:00:00', '2023-05-31 17:47:44'),
(3, 1, 2, 3, NULL, 1.0000, 20.0000, 20.0000, 0.0000, 0.0000, 0, '2023-05-30 18:00:00', '2023-05-31 17:47:59'),
(4, 38, 1, 1, NULL, 10.0000, 66.5000, 665.0000, 6565.0000, 0.0000, 0, '2024-04-11 11:08:00', '2024-04-07 11:08:03'),
(5, 38, 1, 1, NULL, 1212.0000, 0.0099, 12.0000, 21.0000, 0.0000, 0, '2024-04-19 11:08:00', '2024-04-07 11:08:29'),
(6, 38, 1, 2, NULL, 45.0000, 12.1111, 545.0000, 545.0000, 0.0000, 0, '2024-05-09 11:11:00', '2024-04-07 11:11:31'),
(7, 38, 1, 1, NULL, 5.0000, 9.0000, 45.0000, 454.0000, 0.0000, 0, '2024-04-09 11:12:00', '2024-04-07 11:12:04'),
(8, 38, 1, 1, NULL, 2.0000, 50.0000, 100.0000, 200.0000, 0.0000, 0, '2024-04-18 11:15:00', '2024-04-07 11:15:23'),
(9, 38, 3, 1, NULL, 4.0000, 113.5000, 454.0000, 54.0000, 0.0000, 1, '2024-04-25 11:25:00', '2024-04-07 11:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `longterminstallations`
--

CREATE TABLE `longterminstallations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `longterminstallerorder_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctorappointmenttransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dentalservice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_price` double(10,4) DEFAULT NULL,
  `totaldiscount` double(10,4) NOT NULL,
  `receiveable_amount` double(10,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `longterminstallerorders`
--

CREATE TABLE `longterminstallerorders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctorappointmenttransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agentdetail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Code` varchar(255) DEFAULT NULL,
  `flag` tinyint(4) NOT NULL DEFAULT 0,
  `gross_amount` double(10,4) DEFAULT NULL,
  `totaldiscount` double(10,4) NOT NULL,
  `receiveable_amount` double(10,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `makepathologytestreports`
--

CREATE TABLE `makepathologytestreports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reportlist_id` bigint(20) UNSIGNED NOT NULL,
  `pathology_test_component_id` bigint(20) UNSIGNED NOT NULL,
  `result` varchar(255) NOT NULL,
  `reportorder_id` bigint(20) UNSIGNED NOT NULL,
  `test_no` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `makepathologytestreports`
--

INSERT INTO `makepathologytestreports` (`id`, `patient_id`, `doctor_id`, `user_id`, `reportlist_id`, `pathology_test_component_id`, `result`, `reportorder_id`, `test_no`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 45, 9, '3', 114, 1, '2023-10-06 17:23:37', '2023-10-06 17:23:37'),
(2, 1, 1, 1, 46, 10, '3', 114, 1, '2023-10-06 17:23:37', '2023-10-06 17:23:37'),
(5, 1, NULL, 1, 46, 10, '2', 117, 3, '2023-10-07 08:02:57', '2023-10-07 08:02:57'),
(6, 1, NULL, 1, 45, 9, '2', 118, 4, '2023-10-07 09:20:59', '2023-10-07 09:20:59'),
(7, 1, NULL, 1, 45, 124, '3', 118, 4, '2023-10-07 09:20:59', '2023-10-07 09:20:59'),
(8, 1, NULL, 1, 46, 10, '1', 118, 4, '2023-10-07 09:20:59', '2023-10-07 09:20:59'),
(9, 1, NULL, 1, 45, 9, '1', 118, 5, '2023-12-13 07:38:55', '2023-12-13 07:38:55'),
(10, 1, NULL, 1, 45, 124, '1', 118, 5, '2023-12-13 07:38:55', '2023-12-13 07:38:55'),
(11, 1, NULL, 1, 46, 10, '2', 118, 5, '2023-12-13 07:38:55', '2023-12-13 07:38:55'),
(12, 1, NULL, 1, 45, 9, '1', 118, 6, '2023-12-13 07:51:21', '2023-12-13 07:51:21'),
(13, 1, NULL, 1, 45, 124, '1', 118, 6, '2023-12-13 07:51:21', '2023-12-13 07:51:21'),
(14, 1, NULL, 1, 46, 10, '2', 118, 6, '2023-12-13 07:51:21', '2023-12-13 07:51:21'),
(15, 1, NULL, 1, 45, 9, '1', 118, 7, '2023-12-13 07:53:25', '2023-12-13 07:53:25'),
(16, 1, NULL, 1, 45, 124, '1', 118, 7, '2023-12-13 07:53:25', '2023-12-13 07:53:25'),
(17, 1, NULL, 1, 46, 10, '2', 118, 7, '2023-12-13 07:53:25', '2023-12-13 07:53:25'),
(18, 1, NULL, 1, 45, 9, '1', 118, 8, '2023-12-13 07:54:06', '2023-12-13 07:54:06'),
(19, 1, NULL, 1, 45, 124, '1', 118, 8, '2023-12-13 07:54:06', '2023-12-13 07:54:06'),
(20, 1, NULL, 1, 46, 10, '2', 118, 8, '2023-12-13 07:54:06', '2023-12-13 07:54:06'),
(21, 1, NULL, 1, 45, 9, '1', 118, 9, '2023-12-13 07:54:30', '2023-12-13 07:54:30'),
(22, 1, NULL, 1, 45, 124, '2', 118, 9, '2023-12-13 07:54:30', '2023-12-13 07:54:30'),
(23, 1, NULL, 1, 46, 10, '3', 118, 9, '2023-12-13 07:54:30', '2023-12-13 07:54:30'),
(24, 1, NULL, 1, 45, 9, '1', 118, 10, '2023-12-13 08:00:14', '2023-12-13 08:00:14'),
(25, 1, NULL, 1, 45, 124, '2', 118, 10, '2023-12-13 08:00:14', '2023-12-13 08:00:14'),
(26, 1, NULL, 1, 46, 10, '1', 118, 10, '2023-12-13 08:00:14', '2023-12-13 08:00:14'),
(27, 1, NULL, 1, 45, 9, '3', 118, 11, '2023-12-13 08:04:59', '2023-12-13 08:04:59'),
(28, 1, NULL, 1, 45, 124, '1', 118, 11, '2023-12-13 08:04:59', '2023-12-13 08:04:59'),
(29, 1, NULL, 1, 46, 10, '2', 118, 11, '2023-12-13 08:04:59', '2023-12-13 08:04:59'),
(30, 1, NULL, 1, 45, 9, '2', 118, 12, '2023-12-13 08:07:14', '2023-12-13 08:07:14'),
(31, 1, NULL, 1, 45, 124, '2', 118, 12, '2023-12-13 08:07:14', '2023-12-13 08:07:14'),
(32, 1, NULL, 1, 46, 10, '1', 118, 12, '2023-12-13 08:07:14', '2023-12-13 08:07:14'),
(33, 1, NULL, 1, 45, 9, '2', 118, 13, '2023-12-13 08:08:53', '2023-12-13 08:08:53'),
(34, 1, NULL, 1, 45, 124, '1', 118, 13, '2023-12-13 08:08:53', '2023-12-13 08:08:53'),
(35, 1, NULL, 1, 46, 10, '2', 118, 13, '2023-12-13 08:08:53', '2023-12-13 08:08:53'),
(36, 1, NULL, 1, 45, 9, '3', 118, 14, '2023-12-13 08:10:58', '2023-12-13 08:10:58'),
(37, 1, NULL, 1, 45, 124, '3', 118, 14, '2023-12-13 08:10:58', '2023-12-13 08:10:58'),
(38, 1, NULL, 1, 46, 10, '2', 118, 14, '2023-12-13 08:10:58', '2023-12-13 08:10:58'),
(39, 1, NULL, 1, 45, 9, '3', 118, 15, '2023-12-13 08:11:19', '2023-12-13 08:11:19'),
(40, 1, NULL, 1, 45, 124, '3', 118, 15, '2023-12-13 08:11:19', '2023-12-13 08:11:19'),
(41, 1, NULL, 1, 46, 10, '2', 118, 15, '2023-12-13 08:11:19', '2023-12-13 08:11:19'),
(42, 1, NULL, 1, 45, 9, '2', 118, 16, '2023-12-13 08:12:31', '2023-12-13 08:12:31'),
(43, 1, NULL, 1, 45, 124, '1', 118, 16, '2023-12-13 08:12:31', '2023-12-13 08:12:31'),
(44, 1, NULL, 1, 46, 10, '2', 118, 16, '2023-12-13 08:12:31', '2023-12-13 08:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `medicinecomapnynames`
--

CREATE TABLE `medicinecomapnynames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `agent_name` varchar(255) NOT NULL,
  `agent_mobile` varchar(255) NOT NULL,
  `due` double NOT NULL DEFAULT 0,
  `openingbalance` double NOT NULL DEFAULT 0,
  `advance` double NOT NULL DEFAULT 0,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicinecomapnynames`
--

INSERT INTO `medicinecomapnynames` (`id`, `name`, `agent_name`, `agent_mobile`, `due`, `openingbalance`, `advance`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, 'mc1', 'mc1', '05664654', 65415, 0, 0, 0, '2024-04-07 15:14:40', '2024-04-28 07:45:57'),
(2, 'mc2', 'czxc', '4656', 198095, 0, 0, 0, '2024-04-07 15:15:41', '2024-04-28 07:10:48'),
(3, 'mc3', 'mc3', '2312', 8890, 0, 0, 0, '2024-04-07 15:16:17', '2024-04-25 07:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `medicinecompanyorders`
--

CREATE TABLE `medicinecompanyorders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `medicinecomapnyname_id` bigint(20) UNSIGNED NOT NULL,
  `totalbeforediscount` double(10,2) DEFAULT NULL,
  `due` double(12,2) DEFAULT NULL,
  `pay_in_cash` double(12,2) NOT NULL,
  `total` double(12,2) NOT NULL,
  `discount` double(10,2) NOT NULL DEFAULT 0.00,
  `transitiontype` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicinecompanyorders`
--

INSERT INTO `medicinecompanyorders` (`id`, `user_id`, `medicinecomapnyname_id`, `totalbeforediscount`, `due`, `pay_in_cash`, `total`, `discount`, `transitiontype`, `created_at`, `updated_at`) VALUES
(1, 38, 3, 0.00, 0.00, 0.00, 0.00, 0.00, 3, '2024-04-05 08:35:00', '2024-04-14 08:35:55'),
(2, 38, 2, 50.00, 50.00, 0.00, 50.00, 0.00, 1, '2024-04-06 08:36:00', '2024-04-14 08:36:40'),
(3, 38, 2, 25.00, 25.00, 0.00, 25.00, 0.00, 2, '2024-04-09 08:49:00', '2024-04-14 08:50:01'),
(4, 38, 2, 100.00, 100.00, 0.00, 100.00, 0.00, 1, '2024-04-25 05:48:00', '2024-04-25 05:48:36'),
(5, 38, 3, 0.00, 0.00, 0.00, 0.00, 0.00, 3, '2024-04-25 05:52:00', '2024-04-25 05:52:56'),
(6, 38, 2, 2000.00, 2000.00, 0.00, 2000.00, 0.00, 1, '2024-04-25 05:54:00', '2024-04-25 05:54:14'),
(7, 38, 1, 2000.00, 2000.00, 0.00, 2000.00, 0.00, 1, '2024-04-24 06:05:00', '2024-04-25 06:05:39'),
(8, 38, 1, 7500.00, 7500.00, 0.00, 7500.00, 0.00, 1, '2024-04-18 06:06:00', '2024-04-25 06:06:38'),
(9, 38, 3, 0.00, 0.00, 0.00, 0.00, 0.00, 3, '2024-04-25 07:46:00', '2024-04-25 07:47:53'),
(10, 38, 3, 3000.00, 3000.00, 0.00, 3000.00, 0.00, 1, '2024-04-25 07:48:00', '2024-04-25 07:48:36'),
(11, 38, 3, 0.00, 0.00, 0.00, 0.00, 0.00, 3, '2024-04-25 07:58:00', '2024-04-25 07:58:47'),
(12, 38, 2, 5000.00, 5000.00, 0.00, 5000.00, 0.00, 1, '2024-04-02 07:59:00', '2024-04-25 07:59:39'),
(13, 38, 2, 4000.00, 4000.00, 0.00, 4000.00, 0.00, 1, '2024-04-07 08:34:00', '2024-04-25 08:36:06'),
(14, 38, 3, 0.00, 0.00, 0.00, 0.00, 0.00, 3, '2024-04-25 09:04:00', '2024-04-25 09:05:16'),
(15, 38, 2, 50000.00, 50000.00, 0.00, 50000.00, 0.00, 1, '2024-04-28 07:55:00', '2024-04-27 07:55:41'),
(16, 38, 3, 0.00, 0.00, 0.00, 0.00, 0.00, 3, '2024-04-27 12:47:00', '2024-04-27 12:48:05'),
(17, 38, 3, 0.00, 0.00, 0.00, 0.00, 0.00, 3, '2024-04-27 12:48:00', '2024-04-27 12:48:30'),
(18, 38, 2, 20000.00, 20000.00, 0.00, 20000.00, 0.00, 1, '2024-04-03 12:52:00', '2024-04-27 12:53:36'),
(19, 38, 2, 10000.00, 10000.00, 0.00, 10000.00, 0.00, 1, '2024-04-07 07:10:00', '2024-04-28 07:10:48'),
(20, 38, 1, 40000.00, 40000.00, 0.00, 40000.00, 0.00, 1, '2024-04-29 07:13:00', '2024-04-28 07:14:17'),
(21, 38, 3, 0.00, 0.00, 0.00, 0.00, 0.00, 3, '2024-04-01 07:30:00', '2024-04-28 07:31:01'),
(22, 38, 3, 0.00, 0.00, 0.00, 0.00, 0.00, 3, '2024-04-01 07:31:00', '2024-04-28 07:31:46'),
(23, 38, 1, 6000.00, 6000.00, 0.00, 6000.00, 0.00, 1, '2024-04-02 07:44:00', '2024-04-28 07:45:01'),
(24, 38, 1, 8000.00, 8000.00, 0.00, 8000.00, 0.00, 1, '2024-04-03 07:45:00', '2024-04-28 07:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine_category_id` bigint(20) UNSIGNED NOT NULL,
  `medicinecomapnyname_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `Genericname` varchar(255) DEFAULT NULL,
  `Strength` varchar(255) DEFAULT NULL,
  `stock` double(12,2) NOT NULL,
  `unitprice` double(12,2) NOT NULL,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `medicine_category_id`, `medicinecomapnyname_id`, `name`, `Genericname`, `Strength`, `stock`, `unitprice`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, 'Rolac 30mg', NULL, NULL, 0.00, 55.00, 1, '2021-11-02 02:10:19', '2023-02-23 10:29:20'),
(2, 3, NULL, 'Etorac 60mg', NULL, NULL, 0.00, 95.00, 1, '2021-11-02 02:11:58', '2022-02-07 10:31:38'),
(3, 2, NULL, 'kkk', NULL, NULL, 0.00, 100.00, 1, '2021-11-03 06:36:47', '2023-02-19 17:18:14'),
(4, 3, NULL, 'Trizon 1mg', NULL, NULL, 0.00, 190.00, 0, '2021-11-19 05:13:05', '2023-02-23 10:29:20'),
(5, 3, NULL, 'Trizon 2mg', NULL, NULL, 0.00, 300.00, 0, '2021-11-19 05:22:16', '2022-11-24 00:36:01'),
(6, 3, NULL, 'Etorac 30mg', NULL, NULL, 0.00, 55.00, 0, '2021-11-19 05:24:16', '2023-01-11 06:42:34'),
(7, 3, NULL, 'Winop 30mg', NULL, NULL, 0.00, 55.00, 0, '2021-11-19 05:25:16', '2023-01-19 00:10:01'),
(8, 3, NULL, 'Amikin 500', NULL, NULL, 0.00, 48.00, 0, '2021-11-19 05:26:24', '2024-01-13 14:30:13'),
(9, 3, NULL, 'Tazid 500 mg', NULL, NULL, 0.00, 130.00, 0, '2021-11-19 05:26:55', '2021-11-19 06:04:26'),
(10, 3, NULL, 'Disopan 1', NULL, NULL, 0.00, 150.00, 0, '2021-11-19 05:32:44', '2022-03-14 14:41:42'),
(11, 3, NULL, 'Metadaxan', NULL, NULL, 0.00, 22.00, 0, '2021-11-19 05:36:08', '2023-01-11 01:57:54'),
(12, 3, NULL, 'Intamicin 80', NULL, NULL, 0.00, 12.00, 0, '2021-11-19 05:39:40', '2023-01-06 01:41:21'),
(13, 11, NULL, 'Arlin 600', NULL, NULL, 0.00, 450.00, 0, '2021-11-19 05:49:30', '2022-08-30 22:42:13'),
(14, 3, NULL, 'Maxima 40', NULL, NULL, 0.00, 90.00, 0, '2021-11-19 06:07:23', '2023-01-15 02:38:22'),
(15, 3, NULL, 'Esonix 40mg', NULL, NULL, 0.00, 110.00, 0, '2021-11-19 06:07:57', '2023-01-19 00:10:01'),
(16, 3, NULL, 'Fluclox 250mg', NULL, NULL, 0.00, 35.00, 0, '2021-11-19 06:08:44', '2022-09-06 04:01:15'),
(17, 3, NULL, 'Trizon 500 mg', NULL, NULL, 0.00, 130.00, 0, '2021-11-19 06:09:22', '2023-01-03 05:39:28'),
(18, 3, NULL, 'Cefixon 1mg', NULL, NULL, 0.00, 250.00, 0, '2021-11-19 06:10:02', '2022-06-18 21:06:50'),
(19, 3, NULL, 'A-Flox 500', NULL, NULL, 0.00, 45.00, 0, '2021-11-19 06:12:13', '2024-01-09 10:23:52'),
(20, 3, NULL, 'Exephin 1mg', NULL, NULL, 0.00, 215.00, 0, '2021-11-19 06:12:58', '2023-01-18 23:40:26'),
(21, 3, NULL, 'Kilbac 750 mg', NULL, NULL, 0.00, 125.00, 0, '2021-11-19 06:30:20', '2023-01-09 23:08:14'),
(22, 3, NULL, 'Kilbac 1.5gm', NULL, NULL, 0.00, 200.00, 0, '2021-11-19 06:31:41', '2022-12-20 09:18:58'),
(23, 3, NULL, 'Famicef 750mg', NULL, NULL, 0.00, 120.00, 0, '2021-11-19 06:32:43', '2022-12-08 09:33:47'),
(24, 3, NULL, 'I-Penam 1mg', NULL, NULL, 0.00, 1300.00, 0, '2021-11-19 06:34:16', '2022-12-24 01:36:44'),
(26, 11, NULL, 'Flamyd Iv 100  ml', NULL, NULL, 0.00, 53.00, 0, '2021-11-19 06:38:10', '2022-09-14 08:10:45'),
(27, 3, NULL, 'Famicef 1.5 mg', NULL, NULL, 0.00, 201.00, 0, '2021-11-19 06:39:38', '2022-10-24 00:48:38'),
(28, 11, NULL, 'Beuflox Iv 100ml', NULL, NULL, 0.00, 70.00, 0, '2021-11-19 06:41:52', '2022-05-22 16:53:39'),
(29, 3, NULL, 'Fulspec 1mg', NULL, NULL, 0.00, 1200.00, 0, '2021-11-19 06:43:00', '2022-12-09 07:49:58'),
(30, 3, NULL, 'Fulspec 500mg', NULL, NULL, 0.00, 654.00, 0, '2021-11-19 06:43:48', '2022-11-29 23:37:33'),
(31, 3, NULL, 'Ultrapime 1mg', NULL, NULL, 0.00, 550.00, 0, '2021-11-19 06:44:23', '2022-11-29 23:43:34'),
(32, 11, NULL, 'Prosol Iv', NULL, NULL, 0.00, 350.00, 0, '2021-11-19 06:54:31', '2021-11-19 06:54:31'),
(33, 11, NULL, 'Linzolid 600', NULL, NULL, 0.00, 450.00, 0, '2021-11-19 06:56:35', '2022-11-07 10:05:59'),
(34, 11, NULL, 'Maltofer 500', NULL, NULL, 0.00, 700.00, 0, '2021-11-19 06:58:02', '2022-02-08 04:53:33'),
(35, 11, NULL, 'Maltofer 1mg', NULL, NULL, 0.00, 1300.00, 0, '2021-11-19 06:59:07', '2021-11-19 06:59:07'),
(36, 11, NULL, 'Hi- Vol', NULL, NULL, 0.00, 655.00, 0, '2021-11-19 07:01:47', '2022-07-26 08:06:34'),
(37, 11, NULL, 'Moxibac', NULL, NULL, 0.00, 350.00, 0, '2021-11-19 07:02:42', '2022-06-07 01:00:53'),
(38, 11, NULL, 'Dirozyl 100ml', NULL, NULL, 0.00, 85.00, 0, '2021-11-19 08:21:14', '2023-01-19 00:10:01'),
(39, 11, NULL, 'Nalepsin 100ml', NULL, NULL, 0.00, 70.00, 0, '2021-11-19 08:22:02', '2022-12-09 07:49:58'),
(40, 5, NULL, 'Marlox Plus', NULL, NULL, 0.00, 110.00, 0, '2021-11-19 08:24:27', '2022-11-06 06:56:48'),
(41, 4, NULL, 'Magfin 100ml', NULL, NULL, 0.00, 95.00, 0, '2021-11-19 08:27:45', '2022-09-03 23:14:03'),
(42, 4, NULL, 'Urikal 100ml', NULL, NULL, 0.00, 120.00, 0, '2021-11-19 08:28:33', '2023-01-11 06:26:47'),
(43, 4, NULL, 'Urikal 200ml', NULL, NULL, 0.00, 200.00, 0, '2021-11-19 08:29:23', '2022-10-19 09:36:07'),
(44, 5, NULL, 'Inolac 100ml', NULL, NULL, 0.00, 120.00, 0, '2021-11-19 08:30:26', '2022-07-02 09:24:56'),
(45, 11, NULL, 'Metro Iv 100ml', NULL, NULL, 0.00, 53.00, 0, '2021-11-19 08:31:05', '2022-09-14 01:20:37'),
(46, 11, NULL, 'Filmet 100ml', NULL, NULL, 0.00, 54.00, 0, '2021-11-19 08:31:31', '2022-06-25 23:25:46'),
(47, 12, NULL, 'Cotton 400', NULL, NULL, 0.00, 50.00, 0, '2021-11-19 08:34:15', '2022-04-20 21:27:19'),
(48, 12, NULL, 'Windel Plus', NULL, NULL, 0.00, 20.00, 0, '2021-11-19 08:42:25', '2023-01-04 23:40:56'),
(49, 12, NULL, 'Sanitary Pad', NULL, NULL, 0.00, 50.00, 0, '2021-11-19 08:53:12', '2023-01-03 22:45:48'),
(50, 12, NULL, 'Hexisol 250ml', NULL, NULL, 0.00, 130.00, 0, '2021-11-19 08:55:12', '2023-01-15 02:38:22'),
(51, 12, NULL, 'Hexiscrub', NULL, NULL, 0.00, 300.00, 1, '2021-11-19 08:55:52', '2022-04-08 20:04:18'),
(52, 12, NULL, 'Baby weight teshu', NULL, NULL, 0.00, 100.00, 0, '2021-11-19 08:56:59', '2021-11-19 09:00:48'),
(53, 12, NULL, 'Saline Set', NULL, NULL, 0.00, 35.00, 0, '2021-11-20 00:40:52', '2023-01-18 23:09:27'),
(54, 12, NULL, 'Blood Set', NULL, NULL, 0.00, 40.00, 0, '2021-11-20 00:42:11', '2023-01-11 09:09:28'),
(55, 12, NULL, 'Spinal Nedel', NULL, NULL, 0.00, 150.00, 0, '2021-11-20 01:05:06', '2023-01-15 02:38:22'),
(56, 12, NULL, 'Cannula 26', NULL, NULL, 0.00, 50.00, 0, '2021-11-20 01:05:41', '2022-11-18 08:52:21'),
(57, 12, NULL, 'Vasofix Cannula 18', NULL, NULL, 0.00, 120.00, 0, '2021-11-20 01:08:35', '2022-06-15 18:15:34'),
(58, 3, NULL, 'G Ketamine', NULL, NULL, 0.00, 97.00, 1, '2021-11-20 01:11:05', '2022-03-15 07:04:16'),
(59, 3, NULL, 'Cyclid 2ml', NULL, NULL, 0.00, 30.00, 0, '2021-11-20 01:12:19', '2022-05-07 21:51:46'),
(60, 12, NULL, 'Jasocaine jelly', NULL, NULL, 0.00, 120.00, 0, '2021-11-20 01:22:41', '2023-01-12 08:38:25'),
(61, 3, NULL, 'Intrax', NULL, NULL, 0.00, 50.00, 0, '2021-11-20 01:26:17', '2022-07-15 23:41:50'),
(62, 3, NULL, 'Amisure', NULL, NULL, 0.00, 60.00, 0, '2021-11-20 01:27:01', '2022-12-20 10:13:23'),
(63, 3, NULL, 'D- Dopamin', NULL, NULL, 0.00, 45.00, 0, '2021-11-20 01:27:47', '2022-04-19 12:45:37'),
(64, 3, NULL, 'Onaseron', NULL, NULL, 0.00, 25.00, 1, '2021-11-20 01:29:39', '2022-03-14 14:51:49'),
(65, 3, NULL, 'Bupi (Vial)', NULL, NULL, 0.00, 100.00, 0, '2021-11-20 01:31:01', '2023-01-04 08:42:16'),
(66, 3, NULL, 'K MM Baby', NULL, NULL, 0.00, 20.00, 0, '2021-11-20 01:34:21', '2023-01-03 22:29:38'),
(67, 12, NULL, 'Cannula 18', NULL, NULL, 0.00, 20.00, 0, '2021-11-20 01:37:07', '2023-01-15 02:38:22'),
(68, 12, NULL, 'Cannula 20', NULL, NULL, 0.00, 20.00, 0, '2021-11-20 01:37:40', '2023-01-18 23:40:26'),
(69, 12, NULL, 'Cannula 22', NULL, NULL, 0.00, 20.00, 0, '2021-11-20 01:38:30', '2023-01-18 23:09:27'),
(70, 12, NULL, 'Cannula 24', NULL, NULL, 0.00, 30.00, 0, '2021-11-20 01:40:03', '2023-01-08 08:35:46'),
(71, 3, NULL, 'Remifen', NULL, NULL, 0.00, 200.00, 0, '2021-11-20 01:41:11', '2022-02-09 02:57:53'),
(72, 12, NULL, 'D/S 50cc', NULL, NULL, 0.00, 20.00, 0, '2021-11-20 01:42:32', '2023-01-01 08:02:15'),
(73, 12, NULL, 'D/S 10cc', NULL, NULL, 0.00, 10.00, 0, '2021-11-20 01:43:19', '2023-01-12 07:51:31'),
(74, 3, NULL, 'Ultracaine Heavy', NULL, NULL, 0.00, 35.00, 1, '2021-11-20 01:46:56', '2022-03-16 04:42:20'),
(75, 3, NULL, 'Exephin 2gm', NULL, NULL, 0.00, 340.00, 0, '2022-02-07 10:07:26', '2022-12-12 22:56:14'),
(76, 3, NULL, 'Carba bac 1mg', NULL, NULL, 0.00, 1200.00, 0, '2022-02-07 10:08:51', '2022-03-14 11:58:26'),
(77, 5, NULL, 'Askorel 100ml', NULL, NULL, 0.00, 80.00, 0, '2022-02-08 04:45:46', '2022-12-15 01:25:37'),
(78, 13, NULL, 'Basok', NULL, NULL, 0.00, 65.00, 0, '2022-02-08 04:54:57', '2022-11-13 23:04:38'),
(79, 5, NULL, 'Tulos', NULL, NULL, 0.00, 140.00, 0, '2022-02-08 04:57:17', '2022-09-03 23:14:03'),
(80, 5, NULL, 'Asynta Max', NULL, NULL, 0.00, 250.00, 0, '2022-02-08 05:04:26', '2022-08-01 01:13:58'),
(81, 5, NULL, 'KT', NULL, NULL, 0.00, 30.00, 0, '2022-02-08 05:05:26', '2022-09-09 00:13:56'),
(82, 13, NULL, 'Ulfate', NULL, NULL, 0.00, 400.00, 0, '2022-02-08 05:06:48', '2022-02-08 05:06:48'),
(84, 5, NULL, 'Pepnor', NULL, NULL, 0.00, 80.00, 0, '2022-02-08 05:08:12', '2022-02-08 05:08:12'),
(95, 3, NULL, 'Tyclav 1.2', NULL, NULL, 0.00, 300.00, 0, '2022-02-08 05:13:13', '2022-08-02 00:38:52'),
(96, 3, NULL, 'Pantonix 40', NULL, NULL, 0.00, 100.00, 0, '2022-02-08 05:26:12', '2023-01-18 06:52:18'),
(97, 3, NULL, 'Intasone', NULL, NULL, 0.00, 50.00, 0, '2022-02-08 05:37:23', '2023-01-09 23:36:38'),
(98, 3, NULL, 'Intafenac Plus', NULL, NULL, 0.00, 9.50, 1, '2022-02-08 05:43:51', '2024-04-27 12:47:24'),
(99, 2, NULL, 'Inclox 500', NULL, NULL, 0.00, 10.00, 0, '2022-02-08 05:49:39', '2022-07-26 02:17:25'),
(100, 12, NULL, 'ET Tube 7', NULL, NULL, 0.00, 120.00, 0, '2022-02-09 00:18:10', '2022-12-24 10:11:27'),
(101, 12, NULL, 'ET Tube 7.5', NULL, NULL, 0.00, 120.00, 0, '2022-02-09 00:18:39', '2022-12-13 06:12:20'),
(102, 12, NULL, 'ET Tube 6.5', NULL, NULL, 0.00, 120.00, 0, '2022-02-09 00:19:27', '2022-11-24 23:25:57'),
(103, 12, NULL, 'ET Tube 6.5', NULL, NULL, 0.00, 60.00, 1, '2022-02-09 00:19:54', '2022-03-15 05:46:29'),
(104, 12, NULL, 'ET Tube 3', NULL, NULL, 0.00, 120.00, 0, '2022-02-09 00:20:26', '2022-11-09 00:27:45'),
(105, 12, NULL, 'ET Tube 4.5', NULL, NULL, 0.00, 120.00, 0, '2022-02-09 00:20:51', '2022-10-17 06:55:40'),
(106, 12, NULL, 'ET Tube 2.5', NULL, NULL, 0.00, 120.00, 0, '2022-02-09 00:21:18', '2022-11-05 05:27:49'),
(107, 12, NULL, 'Soft Roll 4\'\'', NULL, NULL, 0.00, 30.00, 0, '2022-02-09 00:27:45', '2022-05-10 17:35:27'),
(108, 12, NULL, 'Soft Roll 6\'\'', NULL, NULL, 0.00, 30.00, 0, '2022-02-09 00:28:29', '2023-01-12 01:12:24'),
(109, 12, NULL, 'Pop Bandage', NULL, NULL, 0.00, 180.00, 0, '2022-02-09 00:30:10', '2023-02-23 10:29:25'),
(110, 12, NULL, 'Roll Bandage', NULL, NULL, 0.00, 10.00, 0, '2022-02-09 00:31:14', '2023-02-23 10:29:25'),
(111, 12, NULL, 'Corton 400', NULL, NULL, 0.00, 75.00, 0, '2022-02-09 00:32:41', '2022-11-14 03:36:52'),
(112, 12, NULL, 'Betadin 100ml', NULL, NULL, 0.00, 110.00, 0, '2022-02-09 00:35:54', '2023-01-06 02:05:58'),
(113, 12, NULL, 'Methylene Blue 100ml', NULL, NULL, 0.00, 95.00, 0, '2022-02-09 00:38:17', '2022-11-17 01:24:14'),
(114, 12, NULL, 'Hyperoxi   H2o2', NULL, NULL, 0.00, 35.00, 0, '2022-02-09 00:40:14', '2023-02-23 10:29:25'),
(115, 3, NULL, 'Helopid', NULL, NULL, 0.00, 11.00, 0, '2022-02-09 00:49:32', '2023-01-18 06:52:18'),
(116, 3, NULL, 'Filin', NULL, NULL, 0.00, 10.00, 0, '2022-02-09 01:09:03', '2022-02-09 01:09:03'),
(117, 3, NULL, 'Barbit', NULL, NULL, 0.00, 16.00, 0, '2022-02-09 01:12:18', '2022-12-29 08:37:14'),
(118, 3, NULL, 'Periset', NULL, NULL, 0.00, 30.00, 0, '2022-02-09 01:14:39', '2023-01-14 22:58:33'),
(119, 3, NULL, 'Timozin', NULL, NULL, 0.00, 20.00, 0, '2022-02-09 01:44:06', '2023-01-12 06:14:04'),
(120, 3, NULL, 'Myolax Plus', NULL, NULL, 0.00, 34.00, 0, '2022-02-09 01:45:57', '2022-03-15 06:19:25'),
(122, 3, NULL, 'onaseron', NULL, NULL, 0.00, 25.00, 0, '2022-02-09 01:51:27', '2022-09-21 00:49:57'),
(123, 3, NULL, 'Jasocaine 2%', NULL, NULL, 0.00, 90.00, 0, '2022-02-09 01:53:48', '2023-01-09 22:24:46'),
(124, 3, NULL, 'Jasocaine A 2%', NULL, NULL, 0.00, 120.00, 0, '2022-02-09 01:54:24', '2023-01-09 22:07:37'),
(125, 3, NULL, 'Cyclid', NULL, NULL, 0.00, 30.00, 1, '2022-02-09 01:55:24', '2022-03-15 06:42:33'),
(126, 3, NULL, 'paloxiron 1.5', NULL, NULL, 0.00, 75.00, 0, '2022-02-09 01:56:09', '2022-12-16 23:02:06'),
(127, 3, NULL, 'G-Ketamine', NULL, NULL, 0.00, 140.00, 0, '2022-02-09 01:57:41', '2022-05-31 03:32:09'),
(128, 12, NULL, 'Medi Tulle', NULL, NULL, 0.00, 45.00, 0, '2022-02-09 02:00:04', '2023-01-15 02:38:22'),
(129, 12, NULL, 'Romo Bage 14', NULL, NULL, 0.00, 520.00, 0, '2022-02-09 02:02:12', '2022-12-16 23:49:17'),
(130, 12, NULL, 'Acos', NULL, NULL, 0.00, 560.00, 0, '2022-02-09 02:03:22', '2023-01-12 08:35:57'),
(131, 12, NULL, 'Crap Bandage', NULL, NULL, 0.00, 50.00, 0, '2022-02-09 02:04:49', '2022-12-24 01:23:29'),
(132, 12, NULL, 'Micropore 2\'\'', NULL, NULL, 0.00, 120.00, 0, '2022-02-09 02:07:18', '2023-01-17 02:40:26'),
(133, 12, NULL, 'Micropore 1\'\'', NULL, NULL, 0.00, 85.00, 0, '2022-02-09 02:09:08', '2022-08-15 09:37:38'),
(134, 3, NULL, 'D/W', NULL, NULL, 0.00, 10.00, 0, '2022-02-09 02:25:25', '2023-01-04 08:42:16'),
(135, 3, NULL, 'Atropine', NULL, NULL, 0.00, 7.00, 1, '2022-02-09 02:27:55', '2022-03-16 04:54:52'),
(136, 3, NULL, 'Ephidin', NULL, NULL, 0.00, 35.00, 0, '2022-02-09 02:31:14', '2023-01-15 02:38:22'),
(137, 3, NULL, 'Ultracaine Heavy', NULL, NULL, 0.00, 30.00, 0, '2022-02-09 02:46:58', '2022-09-01 06:13:33'),
(138, 3, NULL, 'Opifen', NULL, NULL, 0.00, 80.00, 0, '2022-02-09 02:53:34', '2023-01-15 02:38:22'),
(139, 3, NULL, 'Calcium Gluconate', NULL, NULL, 0.00, 20.00, 0, '2022-02-09 02:55:10', '2022-12-14 10:09:49'),
(140, 3, NULL, 'Metherspan', NULL, NULL, 0.00, 10.00, 0, '2022-02-09 02:59:54', '2022-12-21 06:49:19'),
(141, 12, NULL, 'Oroclean', NULL, NULL, 0.00, 75.00, 0, '2022-02-09 03:06:52', '2022-02-09 03:06:52'),
(142, 3, NULL, 'G-ergometrine', NULL, NULL, 0.00, 8.00, 0, '2022-02-09 03:08:40', '2022-02-09 09:05:09'),
(143, 3, NULL, 'G-Thiopental', NULL, NULL, 0.00, 50.00, 0, '2022-02-09 03:16:09', '2022-07-13 07:00:28'),
(144, 3, NULL, 'Sedil', NULL, NULL, 0.00, 20.00, 0, '2022-02-09 06:10:18', '2023-01-11 06:09:35'),
(145, 3, NULL, 'Osteo -D', NULL, NULL, 0.00, 120.00, 0, '2022-02-09 06:11:02', '2022-02-09 06:11:02'),
(146, 3, NULL, 'Nalbun 2', NULL, NULL, 0.00, 100.00, 0, '2022-02-09 06:15:55', '2023-01-14 22:58:33'),
(147, 12, NULL, 'BP Blead 10', NULL, NULL, 0.00, 10.00, 0, '2022-02-09 06:21:44', '2023-01-04 07:21:46'),
(148, 12, NULL, 'BP Blead 11', NULL, NULL, 0.00, 10.00, 0, '2022-02-09 06:22:13', '2023-01-15 02:38:22'),
(149, 12, NULL, 'BP Blead 12', NULL, NULL, 0.00, 10.00, 0, '2022-02-09 06:22:39', '2022-11-08 09:44:23'),
(150, 12, NULL, 'BP Blead 15', NULL, NULL, 0.00, 10.00, 0, '2022-02-09 06:23:12', '2023-01-04 07:14:16'),
(151, 12, NULL, 'BP Blead 22', NULL, NULL, 0.00, 10.00, 0, '2022-02-09 06:23:39', '2022-08-21 06:34:24'),
(152, 12, NULL, 'BP Blead 20', NULL, NULL, 0.00, 10.00, 0, '2022-02-09 06:24:08', '2023-01-15 02:38:22'),
(153, 12, NULL, 'Hexicord', NULL, NULL, 0.00, 40.00, 0, '2022-02-09 06:24:53', '2023-01-03 22:29:38'),
(154, 12, NULL, 'Hexiscrub 250ml', NULL, NULL, 0.00, 300.00, 0, '2022-02-09 06:25:33', '2022-12-24 01:05:47'),
(155, 12, NULL, 'Cord clamp', NULL, NULL, 0.00, 25.00, 0, '2022-02-09 06:26:45', '2023-01-14 01:19:26'),
(156, 3, NULL, 'Lasix', NULL, NULL, 0.00, 20.00, 0, '2022-02-09 06:28:07', '2023-01-03 22:37:49'),
(157, 3, NULL, 'Vargon', NULL, NULL, 0.00, 15.00, 0, '2022-02-09 06:30:35', '2022-04-11 19:39:07'),
(158, 3, NULL, 'Avil', NULL, NULL, 0.00, 25.00, 0, '2022-02-09 06:31:45', '2023-01-18 06:52:18'),
(159, 13, NULL, 'Omenix 40', NULL, NULL, 0.00, 10.00, 0, '2022-02-09 06:33:37', '2022-03-15 08:00:12'),
(160, 3, NULL, 'Iraset', NULL, NULL, 0.00, 40.00, 0, '2022-02-09 06:34:45', '2023-01-18 06:52:18'),
(161, 12, NULL, 'Urine Bag', NULL, NULL, 0.00, 40.00, 0, '2022-02-09 06:42:26', '2023-01-15 08:08:54'),
(162, 11, NULL, 'D/A 10%', NULL, NULL, 0.00, 105.00, 0, '2022-02-09 09:42:50', '2022-11-06 08:54:36'),
(163, 11, NULL, 'N/S 500ml', NULL, NULL, 0.00, 67.00, 1, '2022-02-09 09:43:49', '2022-08-02 06:54:52'),
(164, 11, NULL, 'N/S 1000ml', NULL, NULL, 0.00, 87.00, 1, '2022-02-09 09:46:47', '2022-03-16 12:40:45'),
(165, 11, NULL, 'H/S 1000ml', NULL, NULL, 0.00, 91.00, 1, '2022-02-09 09:50:17', '2022-03-16 04:58:24'),
(166, 11, NULL, 'C/S 1000ml', NULL, NULL, 0.00, 91.00, 0, '2022-02-09 09:53:29', '2022-02-09 09:53:29'),
(167, 3, NULL, 'Suxa', NULL, NULL, 0.00, 20.00, 1, '2022-02-09 09:56:50', '2022-04-11 19:06:36'),
(168, 11, NULL, 'DNS 1000ml', NULL, NULL, 0.00, 101.00, 1, '2022-02-09 09:57:24', '2022-03-17 11:04:03'),
(169, 3, NULL, 'Vencuron', NULL, NULL, 0.00, 200.00, 0, '2022-02-09 09:58:23', '2022-08-31 00:25:35'),
(170, 3, NULL, 'Nor q', NULL, NULL, 0.00, 300.00, 0, '2022-02-09 10:03:11', '2022-12-21 06:25:07'),
(171, 3, NULL, 'Pofol', NULL, NULL, 0.00, 250.00, 1, '2022-02-09 10:04:17', '2022-03-23 19:19:56'),
(172, 12, NULL, 'Hand Gloves 7.5', NULL, NULL, 0.00, 30.00, 0, '2022-02-09 10:07:55', '2022-08-26 01:43:13'),
(173, 12, NULL, 'Hand Gloves 7', NULL, NULL, 0.00, 30.00, 0, '2022-02-09 10:08:30', '2023-01-18 06:52:33'),
(174, 12, NULL, 'Hand Gloves 6.5', NULL, NULL, 0.00, 30.00, 0, '2022-02-09 10:10:20', '2023-01-11 09:05:29'),
(175, 12, NULL, 'Hand Gloves 6', NULL, NULL, 0.00, 30.00, 0, '2022-02-09 10:10:54', '2022-08-27 06:58:41'),
(176, 12, NULL, 'Comfit Gloves 7.5', NULL, NULL, 0.00, 70.00, 0, '2022-02-09 10:11:35', '2023-01-04 08:42:16'),
(177, 12, NULL, 'Comfit Gloves 7', NULL, NULL, 0.00, 70.00, 0, '2022-02-09 10:12:13', '2023-01-18 09:37:08'),
(178, 12, NULL, 'Orthopedics Gloves', NULL, NULL, 0.00, 150.00, 0, '2022-02-09 10:14:15', '2023-01-15 02:38:22'),
(179, 3, NULL, 'Furotil 1.5g', NULL, NULL, 0.00, 250.00, 0, '2022-03-14 13:14:47', '2022-07-15 22:35:59'),
(180, 3, NULL, 'Winop 60mg', NULL, NULL, 0.00, 95.00, 0, '2022-03-14 14:39:39', '2022-12-20 10:13:23'),
(181, 12, NULL, 'D/S 3cc', NULL, NULL, 0.00, 5.00, 0, '2022-03-14 14:55:49', '2023-01-15 08:08:54'),
(182, 12, NULL, 'D/S 5cc', NULL, NULL, 0.00, 5.00, 0, '2022-03-14 14:59:57', '2023-01-19 00:10:01'),
(183, 12, NULL, 'Rose gut', NULL, NULL, 0.00, 100.00, 0, '2022-03-14 15:04:36', '2022-03-14 15:04:36'),
(184, 12, NULL, 'vicryl 5-0 R/B', NULL, NULL, 0.00, 450.00, 0, '2022-03-14 15:07:07', '2022-08-26 00:08:28'),
(185, 12, NULL, 'Vicryl 0 R/B', NULL, NULL, 0.00, 400.00, 0, '2022-03-14 15:08:36', '2023-01-09 23:36:38'),
(186, 12, NULL, 'Vicryl 2-0 R/B', NULL, NULL, 0.00, 420.00, 0, '2022-03-14 15:09:28', '2023-01-09 22:24:46'),
(187, 12, NULL, 'Vicryl 2-0 C/B', NULL, NULL, 0.00, 600.00, 0, '2022-03-14 15:10:11', '2023-01-04 07:02:46'),
(188, 12, NULL, 'Vicryl os6', NULL, NULL, 0.00, 620.00, 0, '2022-03-14 15:10:45', '2022-12-15 06:52:56'),
(189, 12, NULL, 'Vicryl 3-0 C/B', NULL, NULL, 0.00, 580.00, 0, '2022-03-14 15:13:22', '2022-10-27 22:40:24'),
(190, 12, NULL, 'Vicryl 5-0 C/B', NULL, NULL, 0.00, 420.00, 1, '2022-03-14 15:15:38', '2022-03-18 05:22:02'),
(191, 12, NULL, 'Vicryl 4-0 R/B', NULL, NULL, 0.00, 450.00, 0, '2022-03-14 15:17:00', '2023-01-04 07:02:46'),
(192, 12, NULL, 'Vicryl 1 R/B', NULL, NULL, 0.00, 450.00, 0, '2022-03-14 15:18:11', '2022-12-06 23:53:47'),
(193, 12, NULL, 'Vicryl 5-0 C/B', NULL, NULL, 0.00, 580.00, 0, '2022-03-14 15:19:12', '2022-12-24 01:23:29'),
(194, 12, NULL, 'Ethilon 2-0 C/B', NULL, NULL, 0.00, 300.00, 0, '2022-03-14 15:23:12', '2023-01-12 06:32:58'),
(195, 12, NULL, 'Truglyde 1-0 R/B', NULL, NULL, 0.00, 300.00, 0, '2022-03-14 15:24:45', '2023-01-12 06:33:49'),
(196, 12, NULL, 'Truglyde 1', NULL, NULL, 0.00, 300.00, 0, '2022-03-14 15:25:13', '2023-02-23 10:29:25'),
(197, 12, NULL, 'Truglyde 2-0 R/B', NULL, NULL, 0.00, 320.00, 0, '2022-03-14 15:26:13', '2023-01-03 22:29:38'),
(198, 12, NULL, 'Catgut 1-0 R/B', NULL, NULL, 0.00, 380.00, 0, '2022-03-14 15:27:35', '2023-01-04 07:02:46'),
(199, 12, NULL, 'Catgut 1', NULL, NULL, 0.00, 380.00, 0, '2022-03-14 15:28:09', '2023-02-23 10:29:25'),
(200, 12, NULL, 'Catgut 3-0 R/B', NULL, NULL, 0.00, 450.00, 0, '2022-03-14 15:29:49', '2023-01-03 22:29:38'),
(201, 12, NULL, 'Polysorb 1-0 C/B', NULL, NULL, 0.00, 450.00, 0, '2022-03-14 15:30:34', '2022-10-30 00:38:39'),
(202, 12, NULL, 'Ethilon 1-0 C/B', NULL, NULL, 0.00, 250.00, 0, '2022-03-14 15:31:35', '2022-11-10 23:12:37'),
(203, 12, NULL, 'Prolene 1-0 C/B', NULL, NULL, 0.00, 380.00, 0, '2022-03-14 15:35:52', '2023-01-07 05:41:42'),
(204, 12, NULL, 'Prolene 1 R/B', NULL, NULL, 0.00, 380.00, 0, '2022-03-14 15:36:34', '2022-11-18 07:06:47'),
(205, 12, NULL, 'Prolene 1 C/B', NULL, NULL, 0.00, 380.00, 0, '2022-03-14 15:42:31', '2022-10-17 02:00:34'),
(206, 12, NULL, 'Prolene 2-0 C/B', NULL, NULL, 0.00, 380.00, 0, '2022-03-14 15:43:18', '2023-01-12 08:35:57'),
(207, 12, NULL, 'Prolene 4-0 C/B', NULL, NULL, 0.00, 380.00, 0, '2022-03-14 15:43:44', '2022-11-08 06:47:19'),
(208, 12, NULL, 'Prolene 2-0 R/B', NULL, NULL, 0.00, 380.00, 0, '2022-03-14 15:44:22', '2022-11-14 08:05:56'),
(209, 12, NULL, 'Trusynth 3-0 R/B', NULL, NULL, 0.00, 250.00, 0, '2022-03-14 16:18:53', '2022-03-14 16:18:53'),
(210, 12, NULL, 'Mersilk 2-0 C/B', NULL, NULL, 0.00, 250.00, 0, '2022-03-14 16:19:52', '2022-03-14 16:23:31'),
(211, 12, NULL, 'Mersilk 1-0 R/B', NULL, NULL, 0.00, 250.00, 0, '2022-03-14 16:20:34', '2022-03-14 16:23:15'),
(212, 12, NULL, 'Mersilk 1-0 C/B', NULL, NULL, 0.00, 250.00, 0, '2022-03-14 16:21:15', '2022-03-14 16:22:50'),
(213, 12, NULL, 'Mersilk 1 C/B', NULL, NULL, 0.00, 250.00, 0, '2022-03-14 16:21:44', '2022-03-14 16:22:35'),
(214, 12, NULL, 'Bonewax 2.5g', NULL, NULL, 0.00, 550.00, 0, '2022-03-14 16:24:12', '2023-01-15 08:30:57'),
(215, 12, NULL, 'D/S 20 cc', NULL, NULL, 0.00, 15.00, 0, '2022-03-14 16:47:28', '2023-01-02 06:32:54'),
(216, 12, NULL, 'Than Goj', NULL, NULL, 0.00, 220.00, 0, '2022-03-15 05:38:57', '2022-12-24 10:11:27'),
(217, 12, NULL, 'ET Tube 8', NULL, NULL, 0.00, 120.00, 0, '2022-03-15 05:47:27', '2022-10-17 06:55:24'),
(218, 12, NULL, 'ET tube 6', NULL, NULL, 0.00, 120.00, 0, '2022-03-15 05:48:06', '2022-10-17 06:55:17'),
(219, 12, NULL, 'ET tube 5.5', NULL, NULL, 0.00, 120.00, 0, '2022-03-15 05:48:49', '2022-12-06 04:02:05'),
(220, 12, NULL, 'ET tube 5', NULL, NULL, 0.00, 120.00, 0, '2022-03-15 05:49:08', '2022-10-17 06:55:02'),
(221, 12, NULL, 'Traction Kit', NULL, NULL, 0.00, 250.00, 0, '2022-03-15 05:56:37', '2022-03-15 05:56:37'),
(222, 12, NULL, 'Romo Bag 16', NULL, NULL, 0.00, 520.00, 0, '2022-03-15 05:58:38', '2022-11-30 23:06:50'),
(223, 12, NULL, 'Romo Bag 12', NULL, NULL, 0.00, 420.00, 0, '2022-03-15 05:58:57', '2022-03-15 05:58:57'),
(224, 12, NULL, 'Catheter 16', NULL, NULL, 0.00, 50.00, 0, '2022-03-15 06:00:09', '2023-01-15 08:08:54'),
(225, 12, NULL, 'Catheter 14', NULL, NULL, 0.00, 50.00, 0, '2022-03-15 06:01:05', '2023-01-03 22:29:38'),
(226, 12, NULL, 'Bardia Catheter 18', NULL, NULL, 0.00, 220.00, 0, '2022-03-15 06:02:34', '2022-04-08 19:51:35'),
(227, 12, NULL, 'Silicone Catheter 8', NULL, NULL, 0.00, 400.00, 0, '2022-03-15 06:05:46', '2022-03-15 06:05:46'),
(228, 12, NULL, 'Chaker tube 12', NULL, NULL, 0.00, 150.00, 0, '2022-03-15 06:07:04', '2022-12-06 04:02:05'),
(229, 12, NULL, 'Chest Drain tube 28', NULL, NULL, 0.00, 220.00, 0, '2022-03-15 06:09:59', '2022-10-17 02:00:34'),
(230, 12, NULL, 'Chest Drain tube 24', NULL, NULL, 0.00, 220.00, 0, '2022-03-15 06:11:05', '2022-05-07 13:50:12'),
(231, 3, NULL, 'Halopid', NULL, NULL, 0.00, 11.00, 0, '2022-03-15 06:21:19', '2023-01-18 06:52:18'),
(232, 12, NULL, 'Hemo clip', NULL, NULL, 0.00, 230.00, 0, '2022-03-15 07:06:06', '2022-12-03 03:26:35'),
(233, 12, NULL, 'Titanium clip', NULL, NULL, 0.00, 400.00, 0, '2022-03-15 07:12:40', '2022-12-03 03:26:35'),
(234, 3, NULL, 'Atropine', NULL, NULL, 0.00, 10.00, 0, '2022-03-15 07:54:26', '2023-01-09 23:36:38'),
(235, 3, NULL, 'G-Ergometrine', NULL, NULL, 0.00, 7.00, 0, '2022-03-15 07:58:49', '2022-03-15 07:58:49'),
(236, 3, NULL, 'k mm adult', NULL, NULL, 0.00, 20.00, 0, '2022-03-15 08:23:32', '2022-11-28 22:55:32'),
(237, 3, NULL, 'G-Neostigmine', NULL, NULL, 0.00, 10.00, 0, '2022-03-15 08:29:16', '2022-12-21 06:25:07'),
(238, 3, NULL, 'Bupi Heavy', NULL, NULL, 0.00, 30.00, 0, '2022-03-15 08:44:14', '2023-01-15 02:38:22'),
(239, 3, NULL, 'Glucose 25%', NULL, NULL, 0.00, 10.00, 0, '2022-03-15 08:49:26', '2023-01-03 22:29:38'),
(240, 11, NULL, 'CS 1000 ml', NULL, NULL, 0.00, 92.00, 0, '2022-03-15 08:53:19', '2022-03-15 13:34:22'),
(241, 11, NULL, 'Sterisol 2000ml', NULL, NULL, 0.00, 165.00, 0, '2022-03-15 08:54:47', '2022-10-18 08:09:09'),
(242, 12, NULL, 'Pin remover', NULL, NULL, 0.00, 450.00, 0, '2022-03-15 08:59:30', '2022-03-15 08:59:30'),
(243, 12, NULL, 'Feeding tube 16', NULL, NULL, 0.00, 35.00, 0, '2022-03-15 09:03:47', '2022-11-15 23:30:52'),
(244, 12, NULL, 'Drain tube 18', NULL, NULL, 0.00, 30.00, 0, '2022-03-15 09:04:26', '2022-09-27 06:42:33'),
(245, 12, NULL, 'Feeding tube 5', NULL, NULL, 0.00, 35.00, 0, '2022-03-15 09:08:52', '2022-06-27 10:33:28'),
(246, 12, NULL, 'Drain tube 16', NULL, NULL, 0.00, 35.00, 0, '2022-03-15 09:09:24', '2022-12-13 06:12:20'),
(247, 12, NULL, 'Drain tube 14', NULL, NULL, 0.00, 35.00, 0, '2022-03-15 09:11:15', '2023-01-04 07:47:03'),
(248, 12, NULL, 'Feeding tube 6', NULL, NULL, 0.00, 35.00, 0, '2022-03-15 09:11:38', '2022-08-25 10:58:13'),
(249, 12, NULL, 'Drain tube 12', NULL, NULL, 0.00, 35.00, 0, '2022-03-15 09:12:00', '2022-12-21 09:41:25'),
(250, 12, NULL, 'Feeding tube 8', NULL, NULL, 0.00, 35.00, 0, '2022-03-15 09:12:57', '2022-11-18 01:56:43'),
(251, 12, NULL, 'Feeding tube 7', NULL, NULL, 0.00, 35.00, 0, '2022-03-15 09:13:18', '2022-09-14 10:32:42'),
(252, 11, NULL, 'H/S 1000 ml', NULL, NULL, 0.00, 92.00, 0, '2022-03-15 13:29:52', '2023-01-15 02:38:22'),
(253, 11, NULL, 'DNS 1000 ml', NULL, NULL, 0.00, 101.00, 0, '2022-03-15 13:30:48', '2023-01-14 22:58:33'),
(254, 11, NULL, 'DA 5% 1000 ml', NULL, NULL, 0.00, 105.00, 0, '2022-03-15 13:36:22', '2022-12-19 08:13:37'),
(255, 11, NULL, 'N/S 500 ml', NULL, NULL, 0.00, 70.00, 0, '2022-03-15 13:37:09', '2022-11-24 23:25:57'),
(256, 11, NULL, 'Babysol 500 ml', NULL, NULL, 0.00, 72.00, 0, '2022-03-15 13:37:53', '2023-01-10 02:14:04'),
(257, 11, NULL, 'Normalin 3% 500 ml', NULL, NULL, 0.00, 83.00, 0, '2022-03-15 13:38:42', '2022-04-17 15:33:54'),
(258, 11, NULL, 'Baby Saline 500 ml', NULL, NULL, 0.00, 72.00, 0, '2022-03-15 13:39:22', '2022-12-06 04:02:05'),
(259, 11, NULL, 'N/S 1000 ml', NULL, NULL, 0.00, 87.00, 0, '2022-03-15 13:42:36', '2023-01-18 06:52:18'),
(260, 11, NULL, 'DA 10% 1000 ml', NULL, NULL, 0.00, 105.00, 1, '2022-03-15 13:43:51', '2022-07-03 00:10:45'),
(261, 11, NULL, 'C/S 1000 ml', NULL, NULL, 0.00, 92.00, 0, '2022-03-15 13:45:14', '2022-11-23 22:46:06'),
(262, 3, NULL, 'PPI 40 mg', NULL, NULL, 0.00, 90.00, 0, '2022-03-15 16:02:25', '2023-01-07 05:41:42'),
(263, 12, NULL, 'Canofix', NULL, NULL, 0.00, 10.00, 0, '2022-03-16 04:51:37', '2023-01-18 23:40:26'),
(264, 11, NULL, 'Hemogect 500 mg', NULL, NULL, 0.00, 700.00, 0, '2022-03-16 05:30:39', '2022-03-16 05:30:39'),
(265, 3, NULL, 'Traxyl 500 ml', NULL, NULL, 0.00, 60.00, 0, '2022-03-16 05:31:30', '2022-11-03 23:41:31'),
(266, 3, NULL, 'Caprogen DS 500 mg', NULL, NULL, 0.00, 650.00, 0, '2022-03-16 05:50:09', '2022-03-16 05:50:09'),
(267, 3, NULL, 'Visceralgine', NULL, NULL, 0.00, 20.00, 0, '2022-03-16 05:51:09', '2022-04-01 16:05:24'),
(268, 11, NULL, 'Napa 100 ml', NULL, NULL, 0.00, 150.00, 0, '2022-03-16 05:51:35', '2022-10-21 01:56:09'),
(269, 3, NULL, 'Fluclox 250 mg', NULL, NULL, 0.00, 35.00, 0, '2022-03-16 05:52:11', '2022-03-16 05:52:11'),
(270, 14, NULL, 'Trocer', NULL, NULL, 0.00, 250.00, 0, '2022-03-16 05:58:36', '2022-03-16 05:58:36'),
(271, 1, NULL, 'Calvimax D', NULL, NULL, 0.00, 150.00, 0, '2022-03-16 05:59:39', '2022-06-21 03:05:46'),
(272, 1, NULL, 'Proviten Gold', NULL, NULL, 0.00, 285.00, 0, '2022-03-16 06:00:28', '2022-07-20 07:35:33'),
(273, 1, NULL, 'Proviten Silver', NULL, NULL, 0.00, 185.00, 0, '2022-03-16 06:01:04', '2022-10-30 01:03:20'),
(274, 1, NULL, 'Napa Extra', NULL, NULL, 0.00, 2.50, 0, '2022-03-16 06:02:05', '2022-11-15 06:30:08'),
(275, 1, NULL, 'Rosutin 5', NULL, NULL, 0.00, 10.00, 0, '2022-03-16 06:03:18', '2022-03-16 06:03:18'),
(276, 1, NULL, 'Atova 10', NULL, NULL, 0.00, 10.00, 0, '2022-03-16 06:04:58', '2022-09-04 03:58:42'),
(277, 1, NULL, 'Atova 20', NULL, NULL, 0.00, 18.00, 0, '2022-03-16 06:05:51', '2022-05-23 22:45:22'),
(278, 1, NULL, 'Amdocal 5', NULL, NULL, 0.00, 5.00, 0, '2022-03-16 06:07:27', '2023-02-25 10:34:05'),
(279, 1, NULL, 'Filmet 400', NULL, NULL, 0.00, 1.50, 0, '2022-03-16 06:08:06', '2022-09-08 23:35:55'),
(280, 1, NULL, 'Napadol', NULL, NULL, 0.00, 8.00, 0, '2022-03-16 06:08:55', '2022-08-27 22:28:41'),
(281, 10, NULL, 'Drise 40000', NULL, NULL, 0.00, 35.00, 0, '2022-03-16 06:09:27', '2022-08-24 06:37:22'),
(282, 1, NULL, 'Napa Extend', NULL, NULL, 0.00, 1.50, 0, '2022-03-16 06:10:46', '2022-10-17 23:37:09'),
(283, 1, NULL, 'Linzolid 400', NULL, NULL, 0.00, 60.00, 0, '2022-03-16 06:12:34', '2022-12-12 07:34:31'),
(284, 1, NULL, 'Linzolid 600', NULL, NULL, 0.00, 85.00, 0, '2022-03-16 06:13:09', '2022-11-18 07:14:50'),
(285, 1, NULL, 'Corabon D', NULL, NULL, 0.00, 10.00, 0, '2022-03-16 06:14:11', '2022-12-16 02:28:05'),
(286, 1, NULL, 'Thyronor', NULL, NULL, 0.00, 3.00, 0, '2022-03-16 06:15:55', '2022-03-16 06:15:55'),
(287, 1, NULL, 'Thyronor 50', NULL, NULL, 0.00, 2.50, 0, '2022-03-16 06:16:51', '2022-03-16 06:16:51'),
(288, 1, NULL, 'Thyronor 25', NULL, NULL, 0.00, 1.50, 0, '2022-03-16 06:17:32', '2022-08-17 02:06:19'),
(289, 1, NULL, 'Corabon DX', NULL, NULL, 0.00, 15.00, 0, '2022-03-16 06:18:56', '2022-10-12 09:11:41'),
(290, 10, NULL, 'Delanix 30', NULL, NULL, 0.00, 9.00, 0, '2022-03-16 06:20:49', '2022-08-17 04:50:03'),
(291, 10, NULL, 'Delanzo 60', NULL, NULL, 0.00, 15.00, 0, '2022-03-16 06:23:30', '2022-03-16 06:23:30'),
(292, 1, NULL, 'Dydron 10', NULL, NULL, 0.00, 30.00, 0, '2022-03-16 06:24:10', '2022-06-14 02:46:45'),
(293, 1, NULL, 'Dekalin VT 10', NULL, NULL, 0.00, 35.00, 0, '2022-03-16 06:24:59', '2022-03-16 06:24:59'),
(294, 10, NULL, 'Delanzo 30', NULL, NULL, 0.00, 10.00, 0, '2022-03-16 07:41:32', '2022-04-09 15:05:09'),
(295, 1, NULL, 'Magnox 365', NULL, NULL, 0.00, 5.00, 0, '2022-03-16 07:43:34', '2022-03-16 07:43:34'),
(296, 1, NULL, 'Traxyl 500', NULL, NULL, 0.00, 24.00, 0, '2022-03-16 07:45:36', '2022-03-16 07:45:36'),
(297, 1, NULL, 'Visceralgine 50 mg', NULL, NULL, 0.00, 9.00, 0, '2022-03-16 07:46:50', '2022-06-12 03:58:31'),
(298, 10, NULL, 'Zifocap', NULL, NULL, 0.00, 6.00, 0, '2022-03-16 07:53:04', '2022-06-22 10:11:04'),
(299, 1, NULL, 'Ceevit 250 mg', NULL, NULL, 0.00, 2.00, 0, '2022-03-16 07:54:23', '2023-02-23 10:29:36'),
(300, 10, NULL, 'Traxyl 500 mg', NULL, NULL, 0.00, 23.50, 0, '2022-03-16 11:43:54', '2022-07-26 09:33:41'),
(301, 1, NULL, 'Visecralyine', NULL, NULL, 0.00, 8.00, 0, '2022-03-16 11:44:40', '2022-03-16 11:44:40'),
(302, 10, NULL, 'Cetisoft', NULL, NULL, 0.00, 4.00, 0, '2022-03-16 11:46:36', '2022-10-14 00:29:24'),
(303, 10, NULL, 'Maxima 40 mg', NULL, NULL, 0.00, 10.00, 0, '2022-03-16 11:47:05', '2023-01-04 07:59:05'),
(304, 10, NULL, 'PPI 40 mg', NULL, NULL, 0.00, 8.00, 0, '2022-03-16 11:47:29', '2022-12-20 09:11:01'),
(305, 10, NULL, 'PPI 20 mg', NULL, NULL, 0.00, 5.00, 0, '2022-03-16 11:47:53', '2023-01-14 02:41:22'),
(306, 10, NULL, 'Esonix 20 mg', NULL, NULL, 0.00, 7.00, 0, '2022-03-16 11:48:19', '2022-05-31 17:18:22'),
(307, 10, NULL, 'Rosonix 20 mg', NULL, NULL, 0.00, 5.00, 0, '2022-03-16 11:48:43', '2022-03-16 11:48:43'),
(308, 10, NULL, 'Maxima 20 mg', NULL, NULL, 0.00, 7.00, 0, '2022-03-16 11:49:09', '2023-01-18 06:18:09'),
(309, 10, NULL, 'Delanix 60 mg', NULL, NULL, 0.00, 16.00, 0, '2022-03-16 11:50:15', '2022-03-16 11:50:15'),
(310, 1, NULL, 'Maxima 20 mg', NULL, NULL, 0.00, 5.00, 0, '2022-03-16 11:55:43', '2022-12-12 02:21:54'),
(311, 1, NULL, 'Esonix 20 mg', NULL, NULL, 0.00, 6.00, 0, '2022-03-16 11:56:12', '2022-05-31 17:20:56'),
(312, 1, NULL, 'Pantonix 20 mg', NULL, NULL, 0.00, 7.00, 0, '2022-03-16 11:56:37', '2023-01-18 06:52:18'),
(313, 1, NULL, 'Pantonix 40 mg', NULL, NULL, 0.00, 9.00, 0, '2022-03-16 11:57:04', '2022-12-27 00:55:20'),
(314, 10, NULL, 'Winpain 50 mg', NULL, NULL, 0.00, 7.50, 0, '2022-03-16 11:57:39', '2022-03-16 11:57:39'),
(315, 1, NULL, 'Marlox Plus', NULL, NULL, 0.00, 3.00, 0, '2022-03-16 11:58:05', '2022-12-12 22:56:14'),
(316, 1, NULL, 'Flamyd 500 mg', NULL, NULL, 0.00, 2.00, 0, '2022-03-16 11:58:37', '2023-01-14 01:41:56'),
(317, 1, NULL, 'Winop 10 mg', NULL, NULL, 0.00, 10.00, 0, '2022-03-16 12:01:53', '2023-01-14 06:06:08'),
(318, 1, NULL, 'Etorac 10 mg', NULL, NULL, 0.00, 10.00, 0, '2022-03-16 12:02:22', '2022-12-19 05:36:11'),
(319, 1, NULL, 'Ziflu 20 mg', NULL, NULL, 0.00, 1.50, 0, '2022-03-16 12:02:52', '2022-03-16 12:02:52'),
(320, 10, NULL, 'Inclox 500 mg', NULL, NULL, 0.00, 10.00, 1, '2022-03-16 12:03:25', '2022-07-20 06:19:49'),
(321, 1, NULL, 'Kilbac 250 mg', NULL, NULL, 0.00, 25.00, 0, '2022-03-16 12:03:52', '2022-08-20 05:57:54'),
(322, 1, NULL, 'Kilbac 500 mg', NULL, NULL, 0.00, 45.00, 0, '2022-03-16 12:04:54', '2022-08-22 05:57:45'),
(323, 1, NULL, 'Famicef 500 mg', NULL, NULL, 0.00, 45.00, 0, '2022-03-16 12:05:35', '2022-12-21 08:51:06'),
(324, 10, NULL, 'Fix-A 200 mg', NULL, NULL, 0.00, 35.00, 0, '2022-03-16 12:06:10', '2022-07-16 09:57:25'),
(325, 10, NULL, 'Fix-A Ds 400 mg', NULL, NULL, 0.00, 50.00, 0, '2022-03-16 12:06:45', '2023-01-11 05:51:34'),
(326, 1, NULL, 'Intracal 400 mg', NULL, NULL, 0.00, 8.00, 0, '2022-03-16 12:07:45', '2022-03-16 12:07:45'),
(327, 2, NULL, 'A-Flox 500 mg', NULL, NULL, 0.00, 10.50, 0, '2022-03-16 12:08:23', '2024-01-13 13:46:58'),
(328, 10, NULL, 'A-Flox 250 mg', NULL, NULL, 0.00, 6.00, 0, '2022-03-16 12:08:53', '2024-01-13 11:25:59'),
(329, 10, NULL, 'Intrax 500 mg', NULL, NULL, 0.00, 16.00, 0, '2022-03-16 12:09:39', '2022-12-14 23:54:14'),
(330, 1, NULL, 'Famiclav 250 mg', NULL, NULL, 0.00, 30.00, 0, '2022-03-16 12:11:06', '2022-07-15 23:22:03'),
(331, 1, NULL, 'Famiclav 500 mg', NULL, NULL, 0.00, 50.00, 0, '2022-03-16 12:12:34', '2023-01-09 06:31:48'),
(332, 1, NULL, 'Fenofex 120 mg', NULL, NULL, 0.00, 8.00, 0, '2022-03-16 12:13:07', '2022-12-15 06:45:03'),
(333, 1, NULL, 'Dirozyl 400 mg', NULL, NULL, 0.00, 2.27, 0, '2022-03-16 12:14:16', '2022-12-04 08:17:10'),
(334, 1, NULL, 'Ecosprin 75 mg', NULL, NULL, 0.00, 0.63, 0, '2022-03-16 12:16:43', '2022-11-21 22:38:25'),
(335, 1, NULL, 'Edeloss 20/50 mg', NULL, NULL, 0.00, 8.00, 0, '2022-03-16 12:18:06', '2022-12-27 00:55:20'),
(336, 1, NULL, 'Diaryl 2', NULL, NULL, 0.00, 9.00, 0, '2022-03-16 12:18:59', '2022-03-16 12:18:59'),
(337, 10, NULL, 'Emixef 200 mg', NULL, NULL, 0.00, 35.00, 0, '2022-03-16 12:20:04', '2022-11-07 10:05:59'),
(338, 10, NULL, 'Emixef 400 mg', NULL, NULL, 0.00, 50.00, 0, '2022-03-16 12:20:44', '2022-12-21 06:29:40'),
(339, 1, NULL, 'Ecosprin Plus', NULL, NULL, 0.00, 12.00, 0, '2022-03-16 12:21:34', '2022-06-04 18:16:54'),
(340, 1, NULL, 'Disopan 1', NULL, NULL, 0.00, 9.00, 0, '2022-03-16 12:22:34', '2022-11-03 01:20:16'),
(341, 1, NULL, 'Duopres 5/40', NULL, NULL, 0.00, 14.00, 0, '2022-03-16 12:23:15', '2022-03-27 19:52:07'),
(342, 1, NULL, 'Duopres 5/20', NULL, NULL, 0.00, 8.00, 0, '2022-03-16 12:24:16', '2022-11-18 06:18:46'),
(343, 1, NULL, 'Disopan 0.5', NULL, NULL, 0.00, 7.00, 0, '2022-03-16 12:25:06', '2023-01-11 05:51:34'),
(344, 1, NULL, 'Disopan 2', NULL, NULL, 0.00, 11.50, 0, '2022-03-16 12:25:34', '2022-11-14 07:16:56'),
(345, 1, NULL, 'Don A', NULL, NULL, 0.00, 3.50, 0, '2022-03-16 12:25:54', '2023-01-14 02:04:50'),
(346, 1, NULL, 'Fixocard 50 mg', NULL, NULL, 0.00, 6.00, 0, '2022-03-16 12:26:25', '2022-09-14 01:20:37'),
(347, 1, NULL, 'Feelnor 35 MR', NULL, NULL, 0.00, 6.00, 0, '2022-03-16 12:29:51', '2022-03-16 12:29:51'),
(348, 1, NULL, 'Dclot 75 mg', NULL, NULL, 0.00, 11.00, 0, '2022-03-16 12:30:52', '2022-03-16 12:30:52'),
(349, 1, NULL, 'Febustal 40 mg', NULL, NULL, 0.00, 12.00, 0, '2022-03-16 12:31:39', '2022-03-16 12:31:39'),
(350, 1, NULL, 'Duocard 10 mg', NULL, NULL, 0.00, 9.00, 0, '2022-03-16 12:32:15', '2022-03-16 12:32:15'),
(351, 1, NULL, 'Cefaclav 500 mg', NULL, NULL, 0.00, 50.00, 0, '2022-03-16 12:57:00', '2022-11-07 10:05:59'),
(352, 1, NULL, 'Cefaclav 250 mg', NULL, NULL, 0.00, 30.00, 0, '2022-03-16 12:57:39', '2022-08-05 22:59:54'),
(353, 1, NULL, 'Coralex DX', NULL, NULL, 0.00, 15.00, 0, '2022-03-16 12:58:45', '2023-01-14 01:41:56'),
(354, 1, NULL, 'Deslor', NULL, NULL, 0.00, 4.00, 0, '2022-03-16 12:59:16', '2022-04-01 22:16:36'),
(355, 1, NULL, 'Coralex', NULL, NULL, 0.00, 10.00, 0, '2022-03-16 13:00:01', '2023-01-14 22:42:06'),
(356, 1, NULL, 'Cipro-A 500 mg', NULL, NULL, 0.00, 15.00, 0, '2022-03-16 13:00:51', '2023-01-11 08:06:56'),
(357, 1, NULL, 'Cipro-A 250 mg', NULL, NULL, 0.00, 8.50, 0, '2022-03-16 13:02:53', '2022-03-16 13:02:53'),
(358, 1, NULL, 'Beuflox 500 mg', NULL, NULL, 0.00, 15.00, 0, '2022-03-16 13:23:27', '2022-11-23 22:46:06'),
(359, 1, NULL, 'Seasonix', NULL, NULL, 0.00, 4.00, 0, '2022-03-16 13:24:22', '2022-03-16 15:39:21'),
(360, 1, NULL, 'Dinogest', NULL, NULL, 0.00, 50.00, 0, '2022-03-16 13:25:04', '2022-06-14 02:46:19'),
(361, 1, NULL, 'Amlopin 5', NULL, NULL, 0.00, 5.00, 0, '2022-03-16 13:26:00', '2022-09-30 08:46:35'),
(362, 1, NULL, 'Amloten 50', NULL, NULL, 0.00, 6.00, 0, '2022-03-16 13:27:18', '2023-02-12 18:46:39'),
(363, 1, NULL, 'Cortan 20', NULL, NULL, 0.00, 6.26, 0, '2022-03-16 13:28:18', '2022-07-16 09:57:25'),
(364, 1, NULL, 'A-Fenac 50', NULL, NULL, 10.00, 1.00, 0, '2022-03-16 13:29:26', '2024-04-25 05:48:36'),
(365, 1, NULL, 'Cytomis 200', NULL, NULL, 0.00, 15.00, 0, '2022-03-16 13:29:59', '2023-01-03 22:29:38'),
(366, 1, NULL, 'Amlopin 10', NULL, NULL, 0.00, 7.00, 0, '2022-03-16 13:30:51', '2022-09-12 23:01:22'),
(367, 1, NULL, 'Balovir 40', NULL, NULL, 0.00, 360.00, 0, '2022-03-16 13:31:37', '2022-03-16 13:31:37'),
(368, 1, NULL, 'Azin 250', NULL, NULL, 0.00, 25.00, 0, '2022-03-16 13:32:11', '2022-08-18 07:09:38'),
(369, 1, NULL, 'Clindacin 150', NULL, NULL, 0.00, 8.00, 0, '2022-03-16 13:36:56', '2022-08-31 01:06:28'),
(370, 1, NULL, 'Azin 500', NULL, NULL, 0.00, 35.00, 0, '2022-03-16 13:37:17', '2022-09-11 09:23:34'),
(371, 5, NULL, 'Fast', NULL, NULL, 0.00, 20.00, 0, '2022-03-16 13:37:50', '2022-03-16 13:37:50'),
(372, 3, NULL, 'Hypnofast', NULL, NULL, 0.00, 150.00, 0, '2022-03-16 13:38:22', '2023-01-18 05:54:27'),
(373, 10, NULL, 'Bexitrol F', NULL, NULL, 0.00, 12.00, 0, '2022-03-16 13:39:36', '2022-03-16 13:39:36'),
(374, 1, NULL, 'Napro-A Plus 375', NULL, NULL, 0.00, 9.00, 0, '2022-03-16 13:40:22', '2022-07-17 10:30:12'),
(375, 1, NULL, 'Napro-A Plus 500', NULL, NULL, 0.00, 13.00, 0, '2022-03-16 13:41:12', '2022-12-24 01:36:44'),
(376, 12, NULL, 'Betadine 1000 ml', NULL, NULL, 0.00, 770.00, 0, '2022-03-16 15:58:26', '2022-11-08 09:04:23'),
(377, 12, NULL, 'Supp Voltalin 50 mg', NULL, NULL, 0.00, 60.00, 0, '2022-03-16 16:02:51', '2023-01-19 00:10:01'),
(378, 3, NULL, 'Parinox 60 ml', NULL, NULL, 0.00, 575.00, 0, '2022-03-16 16:03:53', '2022-06-07 01:00:53'),
(379, 3, NULL, 'Linda DS', NULL, NULL, 0.00, 30.00, 0, '2022-03-16 16:06:24', '2022-12-19 08:13:37'),
(380, 3, NULL, 'Pofol', NULL, NULL, 0.00, 280.00, 0, '2022-03-16 16:07:19', '2023-01-09 23:36:38'),
(381, 3, NULL, 'Relaxton', NULL, NULL, 0.00, 100.00, 0, '2022-03-16 16:08:27', '2022-11-09 00:27:45'),
(382, 12, NULL, 'A-Fenac 50 mg', NULL, NULL, 0.00, 14.00, 0, '2022-03-16 16:11:09', '2024-01-09 18:59:41'),
(383, 12, NULL, 'Supp Napa 500', NULL, NULL, 0.00, 8.00, 0, '2022-03-16 16:13:00', '2022-11-18 07:14:50'),
(384, 3, NULL, 'Suxa', NULL, NULL, 0.00, 35.00, 0, '2022-03-16 16:14:59', '2022-12-21 06:25:07'),
(385, 12, NULL, 'Supp Glysup 2.30', NULL, NULL, 0.00, 5.00, 0, '2022-03-16 16:17:16', '2023-01-17 08:52:15'),
(386, 3, NULL, 'Labecard', NULL, NULL, 0.00, 100.00, 0, '2022-03-16 16:17:47', '2023-01-07 10:35:40'),
(387, 3, NULL, 'Duratocin', NULL, NULL, 0.00, 150.00, 0, '2022-03-16 16:18:13', '2023-01-04 07:02:46'),
(388, 3, NULL, 'Vencuron-10', NULL, NULL, 0.00, 300.00, 0, '2022-03-16 16:19:02', '2022-10-27 22:40:24'),
(389, 3, NULL, 'Rocuron', NULL, NULL, 0.00, 300.00, 0, '2022-03-16 16:19:24', '2022-04-11 19:17:52'),
(390, 3, NULL, 'Maxsulin R 100 IU', NULL, NULL, 0.00, 415.00, 0, '2022-03-16 16:21:46', '2022-10-27 23:10:26'),
(391, 3, NULL, 'Maxsulin 30/70', NULL, NULL, 0.00, 415.00, 0, '2022-03-16 16:22:29', '2022-03-16 16:22:29'),
(392, 12, NULL, 'Feeding tube 18', NULL, NULL, 0.00, 35.00, 0, '2022-03-18 05:07:36', '2022-11-29 23:32:30'),
(393, 12, NULL, 'Vicryl 3-0 R/B', NULL, NULL, 0.00, 550.00, 0, '2022-03-19 12:49:10', '2023-01-04 07:14:16'),
(394, 1, NULL, 'Monas 10', NULL, NULL, 0.00, 16.00, 0, '2022-03-20 06:43:30', '2022-12-20 09:11:01'),
(395, 2, NULL, 't', NULL, NULL, 0.00, 1.00, 1, '2022-03-21 10:27:40', '2022-03-21 10:31:34'),
(396, 11, NULL, 'Normalin 2000 ml', NULL, NULL, 0.00, 117.00, 0, '2022-03-23 18:44:21', '2022-10-31 08:21:07'),
(397, 1, NULL, 'Zolium 0.5', NULL, NULL, 0.00, 3.00, 0, '2022-03-23 18:56:03', '2024-03-09 13:09:30'),
(398, 1, NULL, 'Zolim 0.25', NULL, NULL, 0.00, 1.50, 1, '2022-03-23 18:58:10', '2022-03-23 19:20:59'),
(399, 1, NULL, 'Zolim 0.25', NULL, NULL, 0.00, 1.50, 1, '2022-03-23 18:58:11', '2022-03-23 19:21:15'),
(400, 1, NULL, 'Zolim 0.25', NULL, NULL, 0.00, 1.50, 1, '2022-03-23 18:58:11', '2022-03-23 19:21:10'),
(401, 1, NULL, 'Zolim 0.25', NULL, NULL, 0.00, 1.50, 1, '2022-03-23 18:58:11', '2022-03-23 19:21:05'),
(402, 1, NULL, 'Zolim 0.25', NULL, NULL, 0.00, 1.50, 1, '2022-03-23 18:58:12', '2022-03-23 19:21:41'),
(403, 1, NULL, 'Zolim 0.25', NULL, NULL, 0.00, 1.50, 1, '2022-03-23 18:58:12', '2022-03-23 19:21:46'),
(404, 1, NULL, 'Zolim 0.25', NULL, NULL, 0.00, 1.50, 0, '2022-03-23 18:58:12', '2024-03-09 13:09:58'),
(405, 1, NULL, 'Zolim 0.25', NULL, NULL, 0.00, 1.50, 1, '2022-03-23 18:58:13', '2022-03-23 19:21:22'),
(406, 1, NULL, 'Zolim 0.25', NULL, NULL, 0.00, 1.50, 1, '2022-03-23 18:58:13', '2022-03-23 19:21:29'),
(407, 1, NULL, 'Zolim 0.25', NULL, NULL, 0.00, 1.50, 1, '2022-03-23 18:58:13', '2022-03-23 19:21:33'),
(408, 3, NULL, 'Oricef 1 gm', NULL, NULL, 0.00, 320.00, 0, '2022-03-23 19:50:35', '2023-02-23 10:29:30'),
(409, 3, NULL, 'Oricef 2 gm', NULL, NULL, 0.00, 490.00, 0, '2022-03-23 19:51:17', '2023-01-19 00:10:01'),
(410, 12, NULL, 'Onetime Gloves', NULL, NULL, 0.00, 500.00, 0, '2022-03-23 20:00:14', '2022-08-29 10:28:02'),
(411, 12, NULL, 'Siger Belt', NULL, NULL, 0.00, 250.00, 0, '2022-03-23 20:42:26', '2022-05-14 17:55:11'),
(412, 1, NULL, 'Famicef 250 mg', NULL, NULL, 0.00, 25.00, 0, '2022-03-23 22:24:25', '2022-05-09 22:27:39'),
(413, 1, NULL, 'Leptic 0.5 mg', NULL, NULL, 0.00, 7.00, 0, '2022-03-27 20:04:08', '2023-01-18 23:40:26'),
(414, 1, NULL, 'Hypnofast 7.5 mg', NULL, NULL, 0.00, 8.00, 0, '2022-03-27 20:36:37', '2022-12-16 02:28:05'),
(415, 12, NULL, 'Prolin 3-0 R/B', NULL, NULL, 0.00, 380.00, 0, '2022-03-28 12:59:45', '2022-12-13 06:35:40'),
(416, 12, NULL, 'Prolin 3-0 C/B', NULL, NULL, 0.00, 380.00, 0, '2022-03-28 13:00:27', '2023-01-04 07:14:16'),
(417, 1, NULL, 'Reservix 100', NULL, NULL, 0.00, 5.00, 0, '2022-03-28 15:09:08', '2023-01-04 07:59:05'),
(418, 1, NULL, 'Myolax 50', NULL, NULL, 0.00, 7.00, 0, '2022-03-28 15:16:20', '2022-12-15 01:25:37'),
(419, 1, NULL, 'Napa 500 mg', NULL, NULL, 0.00, 1.00, 0, '2022-04-01 22:14:37', '2022-10-29 02:53:57'),
(420, 3, NULL, 'Fructin 500', NULL, NULL, 0.00, 95.00, 0, '2022-04-03 13:39:29', '2022-04-03 13:58:54'),
(421, 2, NULL, 'Clindacin 300', NULL, NULL, 0.00, 15.00, 0, '2022-04-04 12:16:54', '2022-12-13 23:42:37'),
(422, 3, NULL, 'Anadol 100', NULL, NULL, 0.00, 20.00, 0, '2022-04-05 12:11:52', '2023-01-07 05:41:42'),
(423, 1, NULL, 'Bicozin', NULL, NULL, 0.00, 90.00, 0, '2022-04-05 12:12:34', '2023-01-18 23:40:26'),
(424, 12, NULL, '3w Cathetar 16', NULL, NULL, 288.00, 400.00, 0, '2022-04-05 12:20:15', '2024-04-25 07:37:31'),
(425, 12, NULL, '3w Cathetar 18', NULL, NULL, 0.00, 400.00, 0, '2022-04-05 12:20:48', '2024-03-08 11:15:43'),
(426, 1, NULL, 'Arlin 600', NULL, NULL, 0.00, 85.00, 0, '2022-04-05 12:25:29', '2022-12-13 23:42:37'),
(427, 11, NULL, 'Mannitol 20%', NULL, NULL, 0.00, 155.00, 0, '2022-04-08 15:48:02', '2023-01-18 06:52:18'),
(428, 12, NULL, 'orsaline-N', NULL, NULL, 0.00, 5.00, 0, '2022-04-08 15:52:08', '2023-01-12 01:14:06'),
(429, 12, NULL, 'Bardia Cather 16', NULL, NULL, 0.00, 220.00, 0, '2022-04-08 19:52:48', '2022-11-21 06:18:08'),
(430, 12, NULL, 'Cather 18', NULL, NULL, 0.00, 60.00, 0, '2022-04-08 19:54:24', '2022-08-31 00:25:35'),
(431, 3, NULL, 'Xamic', NULL, NULL, 0.00, 55.00, 0, '2022-04-10 12:24:30', '2022-12-13 23:42:37'),
(432, 3, NULL, 'Algin', NULL, NULL, 0.00, 35.00, 0, '2022-04-10 12:24:56', '2023-01-11 06:42:34'),
(433, 3, NULL, 'Sergel 40 mg', NULL, NULL, 0.00, 100.00, 0, '2022-04-10 14:42:04', '2023-01-07 05:49:19'),
(434, 1, NULL, 'Tenil', NULL, NULL, 0.00, 5.00, 0, '2022-04-11 11:37:31', '2023-01-03 22:45:48'),
(435, 1, NULL, 'Timozin', NULL, NULL, 0.00, 6.00, 0, '2022-04-11 12:59:40', '2022-04-11 14:04:38'),
(436, 3, NULL, 'Ceftron 500 mg', NULL, NULL, 0.00, 180.00, 0, '2022-04-11 19:12:45', '2022-04-11 19:12:45'),
(437, 3, NULL, 'Ceftron 1 gm', NULL, NULL, 0.00, 250.00, 0, '2022-04-11 19:13:18', '2022-10-17 23:37:09'),
(438, 12, NULL, 'Gell Fome', NULL, NULL, 0.00, 300.00, 0, '2022-04-11 19:19:17', '2022-12-21 06:25:07'),
(439, 12, NULL, 'Vicryl 4-0 C/B', NULL, NULL, 0.00, 580.00, 0, '2022-04-11 20:05:32', '2022-11-09 00:27:45'),
(440, 11, NULL, 'Babysol JR', NULL, NULL, 0.00, 73.00, 0, '2022-04-14 14:16:02', '2022-12-06 23:37:37'),
(441, 1, NULL, 'Orbapin 5/20 mg', NULL, NULL, 0.00, 8.00, 0, '2022-04-15 12:36:51', '2022-12-13 00:40:09'),
(442, 12, NULL, 'Mesh', NULL, NULL, 0.00, 2500.00, 0, '2022-04-16 11:31:56', '2022-04-16 11:44:04'),
(443, 1, NULL, 'Neugalin 50 mg', NULL, NULL, 0.00, 14.50, 0, '2022-04-17 21:24:33', '2023-01-14 22:42:06'),
(444, 1, NULL, 'Neugalin 75 mg', NULL, NULL, 0.00, 16.00, 0, '2022-04-17 21:25:45', '2022-12-16 23:27:36'),
(445, 1, NULL, 'TPC', NULL, NULL, 0.00, 8.00, 0, '2022-04-17 21:27:20', '2023-01-14 22:42:06'),
(446, 1, NULL, 'Losart 50 mg', NULL, NULL, 0.00, 8.00, 0, '2022-04-17 21:30:51', '2023-01-09 23:01:36'),
(447, 12, NULL, 'Tramo guider 0.35', NULL, NULL, 0.00, 1800.00, 0, '2022-04-22 19:53:09', '2022-04-26 12:12:28'),
(448, 12, NULL, 'DJ Stand 6', NULL, NULL, 0.00, 350.00, 0, '2022-04-22 19:54:08', '2022-04-26 12:12:28'),
(449, 12, NULL, 'Vicryl 1 C/B', NULL, NULL, 0.00, 580.00, 0, '2022-04-22 19:56:27', '2022-08-15 02:32:07'),
(450, 1, NULL, 'Bizoran 5/40', NULL, NULL, 0.00, 20.00, 0, '2022-04-30 15:17:36', '2022-08-14 09:21:37'),
(451, 3, NULL, 'Esonix 20', NULL, NULL, 0.00, 70.00, 0, '2022-05-01 11:05:55', '2023-01-04 07:21:46'),
(452, 3, NULL, 'Oxiton DS', NULL, NULL, 0.00, 26.00, 0, '2022-05-07 12:46:46', '2022-05-07 12:46:46'),
(453, 3, NULL, 'Rolac 30 mg', NULL, NULL, 0.00, 55.00, 1, '2022-05-07 12:47:38', '2022-10-17 01:43:17'),
(454, 3, NULL, 'Rolac 60 mg', NULL, NULL, 0.00, 95.00, 0, '2022-05-07 12:48:08', '2022-12-06 23:53:47'),
(455, 1, NULL, 'Rolac 10 mg', NULL, NULL, 0.00, 12.00, 1, '2022-05-07 12:49:02', '2022-07-02 09:25:51'),
(456, 3, NULL, 'Paloxi', NULL, NULL, 0.00, 75.00, 0, '2022-05-09 16:42:21', '2022-12-26 09:01:08'),
(457, 1, NULL, 'Sodiclor 300 mg', NULL, NULL, 0.00, 3.00, 0, '2022-05-09 16:42:54', '2022-05-10 19:35:06'),
(458, 2, NULL, 'Sergel 20 mg', NULL, NULL, 0.00, 7.00, 0, '2022-05-09 21:52:14', '2022-12-24 01:36:44'),
(459, 10, NULL, 'Sergel 40 mg', NULL, NULL, 0.00, 10.00, 0, '2022-05-09 21:52:43', '2023-01-03 22:45:48'),
(460, 3, NULL, 'Dexa', NULL, NULL, 0.00, 25.00, 0, '2022-05-09 21:54:34', '2022-09-13 00:19:48'),
(461, 1, NULL, 'Periset 8mg', NULL, NULL, 0.00, 9.00, 0, '2022-05-09 22:28:41', '2022-11-18 00:15:14'),
(462, 1, NULL, 'Bilan 20mg', NULL, NULL, 0.00, 13.00, 0, '2022-05-09 22:33:05', '2022-05-09 22:33:05'),
(463, 10, NULL, 'DDR 30 mg', NULL, NULL, 0.00, 8.00, 0, '2022-05-09 22:42:00', '2022-07-02 04:31:00'),
(464, 2, NULL, 'DDR 60mg', NULL, NULL, 0.00, 14.00, 0, '2022-05-09 22:43:05', '2022-08-27 01:57:58'),
(465, 3, NULL, 'Perkinil', NULL, NULL, 0.00, 35.00, 0, '2022-05-10 14:25:31', '2023-02-23 10:29:36'),
(466, 1, NULL, 'Napa Rapid 500mg', NULL, NULL, 0.00, 1.00, 0, '2022-05-10 21:55:40', '2022-07-13 09:27:26'),
(467, 1, NULL, 'pladex A', NULL, NULL, 0.00, 12.00, 0, '2022-05-13 20:49:04', '2022-05-13 20:55:00'),
(468, 1, NULL, 'Cerevas 10', NULL, NULL, 0.00, 4.00, 0, '2022-05-13 20:50:54', '2022-05-13 20:55:00'),
(469, 2, NULL, 'cognix 500', NULL, NULL, 0.00, 60.00, 0, '2022-05-13 20:51:46', '2022-05-13 20:55:00'),
(470, 12, NULL, 'Sargin pad', NULL, NULL, 0.00, 150.00, 0, '2022-05-14 17:47:36', '2022-11-07 10:46:03'),
(471, 12, NULL, 'Nabanol Oinement', NULL, NULL, 0.00, 50.00, 0, '2022-05-14 17:48:10', '2022-05-27 16:41:36'),
(472, 1, NULL, 'Furktil 500mg', NULL, NULL, 0.00, 55.00, 0, '2022-05-14 17:49:22', '2022-05-14 17:55:11'),
(473, 1, NULL, 'Ornid', NULL, NULL, 0.00, 7.00, 0, '2022-05-14 17:51:39', '2022-05-14 17:55:11'),
(474, 12, NULL, 'Proline Mash 3\"X6\"', NULL, NULL, 0.00, 3000.00, 0, '2022-05-16 19:31:51', '2022-11-12 09:39:43'),
(475, 12, NULL, '3w cathetar 22', NULL, NULL, 0.00, 450.00, 0, '2022-05-18 14:33:48', '2024-01-08 12:34:28'),
(476, 12, NULL, 'Back Traction', NULL, NULL, 0.00, 250.00, 0, '2022-05-21 01:39:16', '2022-12-13 08:23:56'),
(477, 12, NULL, 'Supp Voltalin 25mg', NULL, NULL, 0.00, 40.00, 0, '2022-05-21 01:40:41', '2022-11-27 07:50:14'),
(478, 12, NULL, 'Cathter 8', NULL, NULL, 0.00, 200.00, 0, '2022-05-21 03:48:15', '2022-05-21 03:48:15'),
(479, 12, NULL, 'Cathter 10', NULL, NULL, 0.00, 200.00, 0, '2022-05-21 03:48:41', '2022-05-24 02:14:31'),
(480, 12, NULL, 'Cathter 6', NULL, NULL, 0.00, 200.00, 0, '2022-05-21 03:49:08', '2022-05-21 03:49:08'),
(481, 3, NULL, 'Superpime 1gm', NULL, NULL, 0.00, 551.00, 0, '2022-05-23 23:47:38', '2022-11-08 07:41:37'),
(482, 1, NULL, 'Iracet 500mg', NULL, NULL, 0.00, 30.00, 0, '2022-05-26 01:33:39', '2023-01-09 23:01:36'),
(483, 1, NULL, 'Nimocal 30', NULL, NULL, 0.00, 5.00, 0, '2022-05-29 17:27:39', '2023-02-23 10:29:36'),
(484, 3, NULL, 'Emistat 4ml', NULL, NULL, 0.00, 32.00, 0, '2022-05-31 20:50:59', '2023-01-15 02:38:22'),
(485, 12, NULL, 'Proline 4-0 R/B', NULL, NULL, 0.00, 380.00, 0, '2022-05-31 20:53:47', '2022-11-02 10:10:32'),
(486, 12, NULL, 'Proline 4-0 C/B', NULL, NULL, 0.00, 380.00, 0, '2022-06-04 04:05:47', '2022-09-23 00:44:20'),
(487, 1, NULL, 'Beklo 10', NULL, NULL, 0.00, 9.50, 0, '2022-06-04 04:07:30', '2022-06-04 04:33:40'),
(488, 1, NULL, 'Methipred 8mg', NULL, NULL, 0.00, 10.00, 0, '2022-06-04 04:08:49', '2023-01-14 01:41:56'),
(489, 15, NULL, 'Bactrocin 2%', NULL, NULL, 0.00, 140.00, 0, '2022-06-05 02:19:10', '2022-11-29 23:32:30'),
(490, 1, NULL, 'Comet 500', NULL, NULL, 0.00, 4.00, 0, '2022-06-05 02:20:13', '2022-11-11 06:47:09'),
(491, 1, NULL, 'Folita 5', NULL, NULL, 0.00, 9.00, 0, '2022-06-05 02:20:56', '2022-06-05 02:20:56'),
(492, 1, NULL, 'G-Calbo', NULL, NULL, 0.00, 300.00, 0, '2022-06-05 02:21:30', '2022-11-17 09:52:43'),
(493, 1, NULL, 'Neuro-B', NULL, NULL, 0.00, 240.00, 0, '2022-06-05 02:22:09', '2023-01-07 22:32:34');
INSERT INTO `medicines` (`id`, `medicine_category_id`, `medicinecomapnyname_id`, `name`, `Genericname`, `Strength`, `stock`, `unitprice`, `softdelete`, `created_at`, `updated_at`) VALUES
(494, 2, NULL, 'Zif-CI', NULL, NULL, 0.00, 4.00, 0, '2022-06-05 02:23:15', '2022-11-21 06:05:33'),
(495, 3, NULL, 'Ferisen 500mg/10ml', NULL, NULL, 0.00, 710.00, 0, '2022-06-05 02:31:39', '2022-06-05 02:31:39'),
(496, 3, NULL, 'Ferisen 1g/20ml', NULL, NULL, 0.00, 1300.00, 0, '2022-06-05 02:32:17', '2022-12-24 09:08:29'),
(497, 2, NULL, 'wq', NULL, NULL, 0.00, 10.00, 1, '2022-06-06 01:43:28', '2022-06-06 01:50:32'),
(498, 1, NULL, 'Clopid AS', NULL, NULL, 0.00, 12.00, 0, '2022-06-06 03:53:16', '2022-06-07 01:00:53'),
(499, 3, NULL, 'Alexa 40 ml', NULL, NULL, 0.00, 425.00, 0, '2022-06-07 00:51:17', '2022-06-07 01:00:53'),
(500, 1, NULL, 'Frenxit', NULL, NULL, 0.00, 5.00, 0, '2022-06-08 19:46:36', '2022-12-04 09:49:30'),
(501, 12, NULL, 'Viodin Mouth Wash', NULL, NULL, 0.00, 35.00, 0, '2022-06-09 02:05:33', '2022-06-10 18:44:48'),
(502, 16, NULL, 'Antazol 1%', NULL, NULL, 0.00, 11.00, 0, '2022-06-09 02:06:10', '2022-06-10 18:44:48'),
(503, 10, NULL, 'Finix 10 mg', NULL, NULL, 0.00, 4.00, 0, '2022-06-09 02:07:11', '2022-09-28 23:21:55'),
(504, 5, NULL, 'Milk of Megnesia', NULL, NULL, 0.00, 60.00, 0, '2022-06-10 18:07:45', '2022-08-27 22:35:35'),
(505, 12, NULL, 'Marsilk 2-0 C/B', NULL, NULL, 0.00, 300.00, 0, '2022-06-10 18:16:37', '2022-11-18 01:56:43'),
(506, 3, NULL, 'Dopamine 5ml', NULL, NULL, 0.00, 70.00, 0, '2022-06-14 02:39:22', '2022-09-22 01:29:48'),
(507, 1, NULL, 'Kontab', NULL, NULL, 0.00, 7.00, 0, '2022-06-14 02:40:37', '2022-12-28 00:52:41'),
(508, 1, NULL, 'Lynes', NULL, NULL, 0.00, 130.00, 0, '2022-06-14 02:43:56', '2022-08-20 08:38:54'),
(509, 3, NULL, 'Roxadex 5 mg', NULL, NULL, 0.00, 29.00, 0, '2022-06-14 02:45:41', '2022-06-15 16:56:38'),
(510, 12, NULL, 'Feeding Tube 12', NULL, NULL, 0.00, 35.00, 0, '2022-06-14 02:49:47', '2022-06-14 02:49:47'),
(511, 3, NULL, 'Toradolin 30mg', NULL, NULL, 0.00, 130.00, 0, '2022-06-15 04:22:32', '2023-01-14 01:45:28'),
(512, 3, NULL, 'Solupred 1mg', NULL, NULL, 0.00, 1000.00, 0, '2022-06-15 04:23:30', '2022-06-15 04:25:39'),
(513, 3, NULL, 'Rofecin 2gm', NULL, NULL, 0.00, 682.00, 0, '2022-06-15 17:40:57', '2022-10-20 01:32:03'),
(514, 12, NULL, 'Anema', NULL, NULL, 0.00, 250.00, 1, '2022-06-16 20:12:16', '2022-07-26 07:27:04'),
(515, 3, NULL, 'Ceftron 2gm', NULL, NULL, 0.00, 350.00, 0, '2022-06-16 23:29:13', '2022-10-08 03:20:05'),
(516, 12, NULL, 'Supp Anadol 100', NULL, NULL, 0.00, 16.00, 0, '2022-06-16 23:35:41', '2022-12-26 09:01:08'),
(517, 12, NULL, 'Glysup 1.15', NULL, NULL, 0.00, 3.00, 0, '2022-06-18 19:10:48', '2022-09-18 07:49:11'),
(518, 1, NULL, 'Rosuva 10', NULL, NULL, 0.00, 20.00, 0, '2022-06-18 19:12:01', '2022-08-31 08:29:30'),
(519, 1, NULL, 'Tryptin 10', NULL, NULL, 0.00, 2.00, 0, '2022-06-18 19:13:07', '2022-12-15 01:25:37'),
(520, 1, NULL, 'Zimzx 500mg', NULL, NULL, 0.00, 35.00, 0, '2022-06-18 19:14:01', '2024-03-09 13:06:44'),
(521, 1, NULL, 'Vefend 200', NULL, NULL, 0.00, 110.00, 0, '2022-06-18 19:15:50', '2022-06-18 19:15:50'),
(522, 12, NULL, 'Traction', NULL, NULL, 0.00, 250.00, 0, '2022-06-19 01:16:06', '2022-06-21 11:07:24'),
(523, 12, NULL, 'Proline mash 6\'\'x6\'\'', NULL, NULL, 0.00, 5000.00, 0, '2022-06-19 03:11:26', '2022-10-18 02:26:56'),
(524, 3, NULL, 'Gentin 80', NULL, NULL, 0.00, 14.00, 0, '2022-06-19 05:00:17', '2022-10-26 01:16:43'),
(525, 2, NULL, 'Flugal 50', NULL, NULL, 0.00, 8.00, 0, '2022-06-20 08:59:29', '2022-06-20 08:59:29'),
(526, 5, NULL, 'Pico Plus', NULL, NULL, 0.00, 150.00, 0, '2022-06-20 09:01:44', '2022-06-21 22:27:37'),
(527, 1, NULL, 'Omenix 20', NULL, NULL, 0.00, 5.00, 0, '2022-06-20 09:02:06', '2022-06-20 09:02:06'),
(528, 1, NULL, 'Milam 7.5', NULL, NULL, 0.00, 12.00, 0, '2022-06-20 09:06:41', '2022-12-04 09:49:30'),
(529, 1, NULL, 'Norium 10', NULL, NULL, 0.00, 7.00, 0, '2022-06-20 09:07:48', '2022-12-04 23:32:45'),
(530, 1, NULL, 'Reelife', NULL, NULL, 0.00, 8.00, 0, '2022-06-20 09:08:51', '2022-10-16 23:39:12'),
(531, 1, NULL, 'Tufnil', NULL, NULL, 0.00, 10.00, 0, '2022-06-20 09:09:36', '2022-12-15 08:36:35'),
(532, 1, NULL, 'Xinc B', NULL, NULL, 0.00, 105.00, 0, '2022-06-20 09:10:35', '2022-12-10 05:55:48'),
(533, 1, NULL, 'Fenadin 120', NULL, NULL, 0.00, 8.00, 0, '2022-06-20 09:12:42', '2022-12-07 07:22:34'),
(534, 1, NULL, 'Furoclav 500', NULL, NULL, 0.00, 50.00, 0, '2022-06-20 09:13:46', '2022-08-24 00:43:08'),
(535, 3, NULL, 'Kain 10ml', NULL, NULL, 0.00, 110.00, 0, '2022-06-20 09:14:27', '2023-01-04 07:21:46'),
(536, 1, NULL, 'Maxpro Mups 20mg', NULL, NULL, 0.00, 10.00, 0, '2022-06-20 09:16:03', '2022-11-10 10:30:56'),
(537, 1, NULL, 'Neurobest', NULL, NULL, 0.00, 8.00, 0, '2022-06-20 09:16:40', '2022-11-15 08:08:53'),
(538, 1, NULL, 'Rolac 10mg', NULL, NULL, 0.00, 12.00, 0, '2022-06-20 09:20:11', '2022-11-15 08:08:53'),
(539, 1, NULL, 'Thyrox 50mg', NULL, NULL, 0.00, 2.00, 0, '2022-06-20 09:22:04', '2022-10-30 02:15:27'),
(540, 3, NULL, 'Xamic 500mg', NULL, NULL, 0.00, 20.00, 1, '2022-06-20 09:23:22', '2022-07-30 05:40:49'),
(541, 1, NULL, 'Osartil 50 Plus', NULL, NULL, 0.00, 8.00, 0, '2022-06-20 09:40:33', '2023-01-18 06:52:18'),
(542, 1, NULL, 'Cerevas 5', NULL, NULL, 0.00, 4.00, 0, '2022-06-21 02:46:59', '2022-08-18 06:28:27'),
(543, 1, NULL, 'Cogniz 500', NULL, NULL, 0.00, 50.00, 0, '2022-06-21 02:47:35', '2022-06-21 02:54:18'),
(544, 1, NULL, 'Cinaron Plus', NULL, NULL, 0.00, 2.00, 0, '2022-06-21 02:48:05', '2022-12-04 23:32:45'),
(545, 1, NULL, 'Linatab M 2.5/500', NULL, NULL, 0.00, 12.00, 0, '2022-06-21 02:49:04', '2022-06-21 02:54:18'),
(546, 1, NULL, 'Quiet XR 50', NULL, NULL, 0.00, 8.00, 0, '2022-06-21 22:07:59', '2022-12-27 00:55:20'),
(547, 12, NULL, 'Vicryl 6-0 C/B', NULL, NULL, 0.00, 620.00, 0, '2022-06-23 00:53:52', '2022-07-15 01:52:10'),
(548, 1, NULL, 'Cinaron 15', NULL, NULL, 0.00, 1.00, 0, '2022-06-23 00:58:18', '2022-06-23 00:58:18'),
(549, 12, NULL, 'Anema', NULL, NULL, 0.00, 250.00, 0, '2022-06-23 01:01:08', '2022-12-12 07:52:18'),
(550, 3, NULL, 'Vaxitet IG 0.5ml', NULL, NULL, 0.00, 80.00, 0, '2022-06-24 01:06:28', '2022-11-07 10:05:59'),
(551, 3, NULL, 'Vaxitet 0.5ml', NULL, NULL, 0.00, 60.00, 0, '2022-06-24 01:08:22', '2022-11-07 10:05:59'),
(552, 12, NULL, 'Hemoclip', NULL, NULL, 0.00, 1200.00, 0, '2022-06-24 07:36:21', '2022-09-16 00:43:54'),
(553, 2, NULL, 'Anadol 100', NULL, NULL, 0.00, 12.00, 0, '2022-06-25 10:40:27', '2022-09-27 07:06:03'),
(554, 12, NULL, 'Taitonium Clip', NULL, NULL, 0.00, 300.00, 0, '2022-06-27 01:15:11', '2022-06-29 10:31:34'),
(555, 12, NULL, 'Feeding Tube', NULL, NULL, 0.00, 35.00, 0, '2022-06-27 10:34:33', '2022-10-09 22:32:59'),
(556, 2, NULL, 'Anadol', NULL, NULL, 0.00, 8.00, 0, '2022-06-27 10:36:42', '2023-01-10 02:35:09'),
(557, 15, NULL, 'Betadin Oinment', NULL, NULL, 0.00, 50.00, 0, '2022-06-27 10:39:52', '2023-01-15 02:38:22'),
(558, 3, NULL, 'Livofet 2ml', NULL, NULL, 0.00, 250.00, 0, '2022-06-29 11:06:24', '2022-06-29 11:08:07'),
(559, 12, NULL, 'ET Tube', NULL, NULL, 0.00, 120.00, 0, '2022-06-29 23:03:17', '2022-10-17 06:54:51'),
(560, 3, NULL, 'Oxyton DS', NULL, NULL, 0.00, 25.00, 0, '2022-07-02 22:53:14', '2023-01-03 22:37:49'),
(561, 12, NULL, 'Monopolar Cord', NULL, NULL, 0.00, 350.00, 0, '2022-07-14 07:29:44', '2022-12-21 06:25:07'),
(562, 1, NULL, 'LEO 500 MG', NULL, NULL, 0.00, 13.00, 0, '2022-07-15 23:14:07', '2022-08-26 01:23:57'),
(563, 1, NULL, 'Rupex', NULL, NULL, 0.00, 10.00, 0, '2022-07-17 23:59:59', '2022-10-30 03:48:52'),
(564, 12, NULL, 'BLOOD BAG', NULL, NULL, 0.00, 250.00, 0, '2022-07-18 06:42:33', '2022-12-13 06:26:38'),
(565, 1, NULL, 'Algin 50mg', NULL, NULL, 0.00, 8.00, 0, '2022-07-18 08:36:32', '2023-02-12 18:46:39'),
(566, 1, NULL, 'Normens 5mg', NULL, NULL, 0.00, 6.00, 0, '2022-07-18 08:42:20', '2022-07-18 08:42:20'),
(567, 1, NULL, 'NAPRO-A 500', NULL, NULL, 0.00, 9.00, 0, '2022-07-20 06:36:43', '2022-11-20 08:56:13'),
(568, 1, NULL, 'NEUGALIN XR 165', NULL, NULL, 0.00, 35.00, 0, '2022-07-20 06:39:04', '2022-07-20 06:39:04'),
(569, 3, NULL, 'ARBECIN', NULL, NULL, 0.00, 150.00, 0, '2022-07-24 07:07:52', '2023-01-03 22:29:38'),
(570, 12, NULL, 'ACOS(COMBO)', NULL, NULL, 0.00, 800.00, 0, '2022-07-27 07:40:15', '2022-12-21 06:25:07'),
(571, 1, NULL, 'Levoxin 500', NULL, NULL, 0.00, 15.00, 0, '2022-07-27 10:10:09', '2022-12-15 06:45:03'),
(572, 10, NULL, 'Xamic 500mg', NULL, NULL, 0.00, 22.00, 0, '2022-07-30 05:41:48', '2022-12-14 23:54:14'),
(573, 11, NULL, 'N/S 100 ML', NULL, NULL, 0.00, 47.00, 0, '2022-07-31 07:51:34', '2022-12-06 06:07:56'),
(574, 11, NULL, 'N/S 250 ML', NULL, NULL, 0.00, 56.00, 0, '2022-07-31 07:54:24', '2022-07-31 07:54:24'),
(575, 11, NULL, 'PEDISOL DS(APN)', NULL, NULL, 0.00, 80.00, 0, '2022-07-31 07:56:16', '2023-01-10 02:14:04'),
(576, 3, NULL, 'MOXACALAV 1.2', NULL, NULL, 0.00, 300.00, 0, '2022-08-02 06:47:28', '2022-09-10 00:52:58'),
(577, 2, NULL, 'Maxpro 20 mg', NULL, NULL, 0.00, 7.00, 0, '2022-08-03 01:58:35', '2023-01-14 01:41:56'),
(578, 2, NULL, 'Maxpro 40mg', NULL, NULL, 0.00, 10.00, 0, '2022-08-03 01:59:14', '2022-11-17 00:22:05'),
(579, 1, NULL, 'Maxpro 40mg', NULL, NULL, 0.00, 9.00, 0, '2022-08-03 02:02:27', '2022-11-16 07:48:57'),
(580, 1, NULL, 'Maxpro 20mg', NULL, NULL, 0.00, 7.00, 0, '2022-08-03 02:05:13', '2022-10-20 01:13:05'),
(581, 3, NULL, 'Othera 40mg', NULL, NULL, 0.00, 100.00, 0, '2022-08-03 02:25:17', '2022-11-08 06:06:28'),
(582, 3, NULL, 'Fluclox 500', NULL, NULL, 0.00, 45.00, 0, '2022-08-03 02:26:01', '2022-09-01 06:28:35'),
(583, 2, NULL, 'Fluclox 500mg', NULL, NULL, 0.00, 11.00, 0, '2022-08-03 02:29:32', '2022-11-14 23:38:30'),
(584, 1, NULL, 'Carva 75', NULL, NULL, 0.00, 0.80, 0, '2022-08-09 09:23:27', '2022-08-09 09:30:21'),
(585, 1, NULL, 'BIOFOL 5', NULL, NULL, 0.00, 9.00, 0, '2022-08-10 23:08:30', '2022-12-12 22:56:14'),
(586, 1, NULL, 'EDELOSS 40/50', NULL, NULL, 0.00, 10.00, 0, '2022-08-10 23:11:09', '2022-12-26 09:01:08'),
(587, 2, NULL, 'MEDICINE', NULL, NULL, 0.00, 0.00, 1, '2022-08-11 07:17:29', '2022-08-11 07:18:41'),
(588, 15, NULL, 'Micoral Geel', NULL, NULL, 0.00, 60.00, 0, '2022-08-13 22:55:37', '2022-08-13 22:55:37'),
(589, 1, NULL, 'Ceevit DS', NULL, NULL, 0.00, 3.50, 0, '2022-08-14 08:28:33', '2023-01-14 23:31:47'),
(590, 1, NULL, 'DULOX 30MG', NULL, NULL, 0.00, 10.00, 0, '2022-08-15 00:20:23', '2022-08-15 00:36:55'),
(591, 1, NULL, 'DULOX 20MG', NULL, NULL, 0.00, 7.00, 0, '2022-08-15 00:21:10', '2022-08-15 00:36:55'),
(592, 2, NULL, 'MICROGEST 100MG', NULL, NULL, 0.00, 15.00, 0, '2022-08-20 09:42:55', '2022-08-23 11:04:49'),
(593, 12, NULL, 'MUSK', NULL, NULL, 0.00, 200.00, 0, '2022-08-21 01:06:57', '2022-08-21 01:08:22'),
(594, 12, NULL, 'HEAD MUSK', NULL, NULL, 0.00, 350.00, 0, '2022-08-21 01:07:41', '2022-08-21 01:07:41'),
(595, 3, NULL, 'CLINDACIN 300MG', NULL, NULL, 0.00, 40.00, 0, '2022-08-24 02:07:58', '2022-12-12 22:56:14'),
(596, 1, NULL, 'METHIGIC 4', NULL, NULL, 0.00, 5.00, 0, '2022-08-28 01:02:17', '2022-11-21 05:07:20'),
(597, 1, NULL, 'CALBORAL D', NULL, NULL, 0.00, 330.00, 0, '2022-08-28 01:03:27', '2022-08-28 01:03:27'),
(598, 3, NULL, 'Neuro-B', NULL, NULL, 0.00, 30.00, 0, '2022-08-30 22:31:44', '2022-08-31 02:01:35'),
(599, 12, NULL, 'T Tube 6', NULL, NULL, 0.00, 850.00, 0, '2022-08-30 22:32:38', '2022-08-31 00:25:35'),
(600, 12, NULL, 'water Bag', NULL, NULL, 0.00, 200.00, 0, '2022-08-31 10:28:54', '2022-09-01 02:05:45'),
(601, 3, NULL, 'Minolac 30', NULL, NULL, 0.00, 55.00, 0, '2022-09-03 23:04:55', '2022-10-25 09:48:25'),
(602, 3, NULL, 'CEFTIZONE 1GM', NULL, NULL, 0.00, 250.00, 0, '2022-09-05 00:23:31', '2022-11-27 00:43:15'),
(603, 3, NULL, 'CEFTIZONE 2GM', NULL, NULL, 0.00, 400.00, 0, '2022-09-05 00:24:33', '2022-12-21 06:25:07'),
(604, 3, NULL, 'MAXPRO 40MG', NULL, NULL, 0.00, 90.00, 0, '2022-09-05 00:26:11', '2022-12-13 23:42:37'),
(605, 3, NULL, 'MAXPRO 40MG', NULL, NULL, 0.00, 90.00, 1, '2022-09-05 00:26:11', '2022-09-13 00:33:06'),
(606, 3, NULL, 'ROLAC 30MG', NULL, NULL, 0.00, 55.00, 0, '2022-09-05 00:27:00', '2022-11-29 23:18:56'),
(607, 3, NULL, 'Tracid', NULL, NULL, 0.00, 65.00, 0, '2022-09-05 09:44:58', '2022-10-16 22:41:36'),
(608, 12, NULL, 'Feet Anima', NULL, NULL, 0.00, 250.00, 0, '2022-09-05 22:11:15', '2022-12-14 09:53:06'),
(609, 3, NULL, 'Rofecen1 mg', NULL, NULL, 0.00, 361.00, 0, '2022-09-06 09:08:25', '2023-01-03 22:29:38'),
(610, 1, NULL, 'Pregaba 50', NULL, NULL, 0.00, 15.00, 0, '2022-09-12 00:54:57', '2022-11-13 00:26:57'),
(611, 3, NULL, 'Clamox 1.2', NULL, NULL, 0.00, 300.00, 0, '2022-09-12 00:55:39', '2022-09-13 08:19:48'),
(612, 3, NULL, 'Clamox 1.2', NULL, NULL, 0.00, 300.00, 1, '2022-09-12 00:55:39', '2022-09-12 00:57:59'),
(613, 4, NULL, 'Mom', NULL, NULL, 0.00, 60.00, 0, '2022-09-12 00:56:12', '2022-10-22 01:18:06'),
(614, 3, NULL, 'Neopenam 1mg', NULL, NULL, 0.00, 1350.00, 0, '2022-09-12 09:00:29', '2022-12-09 07:49:58'),
(615, 12, NULL, 'HELOTHIN', NULL, NULL, 0.00, 700.00, 0, '2022-09-14 09:02:38', '2022-09-14 10:21:35'),
(616, 12, NULL, 'HELOTHIN', NULL, NULL, 0.00, 300.00, 0, '2022-09-14 09:02:55', '2022-12-21 06:25:07'),
(617, 3, NULL, 'DOPAMET 80', NULL, NULL, 0.00, 110.00, 0, '2022-09-18 10:44:16', '2022-09-19 01:10:59'),
(618, 4, NULL, 'GAVISUS', NULL, NULL, 0.00, 250.00, 0, '2022-09-19 09:51:16', '2022-10-22 00:35:35'),
(619, 3, NULL, 'TRIZIDIM 1 gm', NULL, NULL, 0.00, 216.00, 0, '2022-09-19 09:53:11', '2022-11-08 09:44:23'),
(620, 1, NULL, 'Entacyd Plus', NULL, NULL, 0.00, 2.00, 0, '2022-09-20 06:16:49', '2022-09-20 06:16:49'),
(621, 4, NULL, 'Entacyd Plus', NULL, NULL, 0.00, 80.00, 0, '2022-09-20 06:17:27', '2022-11-27 02:10:36'),
(622, 12, NULL, 'Hexisol 50ml', NULL, NULL, 0.00, 40.00, 0, '2022-09-22 23:10:38', '2022-10-14 00:29:24'),
(623, 3, NULL, 'Meropen 1mg', NULL, NULL, 0.00, 1300.00, 0, '2022-09-25 10:04:59', '2022-10-18 23:56:17'),
(624, 12, NULL, 'WATER SEAL BAG', NULL, NULL, 0.00, 200.00, 0, '2022-10-02 01:44:46', '2022-10-17 02:00:34'),
(625, 12, NULL, 'All Salicon NG tube', NULL, NULL, 0.00, 220.00, 0, '2022-10-09 00:39:46', '2022-10-14 03:25:53'),
(626, 12, NULL, '10 CM', NULL, NULL, 8.00, 70.00, 0, '2022-10-09 00:40:57', '2024-04-27 08:23:56'),
(627, 11, NULL, 'Lipfit 500ml', NULL, NULL, 0.00, 1100.00, 0, '2022-10-09 00:56:05', '2022-10-09 00:56:05'),
(628, 3, NULL, 'Vomiren 0.25', NULL, NULL, 0.00, 100.00, 0, '2022-10-16 06:42:07', '2023-01-15 09:03:41'),
(629, 1, NULL, 'Comet XR 500mg', NULL, NULL, 0.00, 6.00, 0, '2022-10-17 07:07:31', '2022-10-17 07:08:53'),
(630, 3, NULL, 'Frusin', NULL, NULL, 0.00, 8.00, 0, '2022-10-17 10:04:31', '2022-10-20 01:13:05'),
(631, 11, NULL, 'DNS 500 ML', NULL, NULL, 0.00, 75.00, 0, '2022-10-19 09:37:59', '2023-01-04 08:42:16'),
(632, 12, NULL, 'Insulin d/s', NULL, NULL, 0.00, 10.00, 0, '2022-10-26 01:05:44', '2023-01-03 22:29:38'),
(633, 3, NULL, 'Etorac 60', NULL, NULL, 0.00, 95.00, 0, '2022-10-29 06:49:14', '2022-12-16 23:49:17'),
(634, 12, NULL, 'Proline 5-0(R/B)', NULL, NULL, 0.00, 450.00, 0, '2022-11-02 10:08:36', '2022-12-07 09:55:03'),
(635, 3, NULL, 'Budicort 0.5', NULL, NULL, 0.00, 40.00, 0, '2022-11-20 04:11:57', '2023-01-04 23:40:56'),
(636, 1, NULL, 'Omidon 10mg', NULL, NULL, 0.00, 3.50, 0, '2022-11-22 04:56:48', '2023-01-12 01:14:06'),
(637, 1, NULL, 'Omidon 10mg', NULL, NULL, 0.00, 3.50, 1, '2022-11-22 04:56:49', '2022-11-22 05:01:46'),
(638, 12, NULL, 'Microburet Set JMI', NULL, NULL, 0.00, 250.00, 0, '2022-12-06 23:31:58', '2022-12-06 23:37:37'),
(639, 3, NULL, 'Fructin 10', NULL, NULL, 0.00, 97.00, 0, '2022-12-06 23:35:32', '2022-12-09 07:49:58'),
(640, 15, NULL, 'Diclogel  Gel', NULL, NULL, 0.00, 97.00, 0, '2022-12-12 22:41:16', '2022-12-12 22:56:14'),
(641, 3, NULL, 'Exephin 500mg', NULL, NULL, 0.00, 149.00, 0, '2022-12-12 22:42:45', '2023-01-08 09:38:47'),
(642, 1, NULL, 'Emistat 8mg', NULL, NULL, 0.00, 11.00, 0, '2022-12-19 05:34:23', '2022-12-19 05:38:28'),
(643, 2, NULL, 'Mydocalm 500', NULL, NULL, 0.00, 9.00, 1, '2023-01-03 10:00:59', '2024-04-09 10:34:08'),
(644, 1, NULL, 'Mydocalm 50', NULL, NULL, 0.00, 9.50, 0, '2023-01-03 10:00:59', '2023-02-23 19:30:04'),
(645, 10, NULL, 'Cavinton 50', NULL, NULL, 0.00, 10.00, 1, '2023-01-03 10:02:09', '2024-04-09 07:39:29'),
(646, 1, NULL, 'ccc', NULL, NULL, 0.00, 23.00, 1, '2023-05-31 17:52:36', '2023-05-31 17:58:56'),
(647, 2, NULL, 'ttt', NULL, NULL, 0.00, 12.00, 1, '2023-05-31 17:58:25', '2023-05-31 17:58:52'),
(648, 10, NULL, 'test123', NULL, NULL, 0.00, 10.00, 1, '2024-03-12 18:09:42', '2024-04-07 15:53:34'),
(649, 16, NULL, 'marer123', NULL, NULL, 0.00, 10.00, 1, '2024-03-13 09:44:40', '2024-04-07 15:53:38'),
(650, 11, NULL, 'test123', NULL, NULL, 0.00, 10.00, 1, '2024-03-13 09:47:11', '2024-04-07 15:53:27'),
(651, 2, NULL, 'test', NULL, NULL, 0.00, 100.00, 1, '2024-03-13 09:48:11', '2024-04-07 15:53:43'),
(652, 16, NULL, 'ruhin', NULL, NULL, 100.00, 100.00, 1, '2024-03-15 09:37:16', '2024-04-07 15:53:48'),
(653, 2, NULL, 'ABC', NULL, NULL, 10.00, 100.00, 1, '2024-03-17 06:06:53', '2024-04-07 15:53:52'),
(654, 16, NULL, 'EFG', NULL, NULL, 7.00, 200.00, 1, '2024-03-17 18:24:21', '2024-04-07 15:53:22'),
(655, 11, NULL, 'Test', NULL, NULL, 500.00, 100.00, 1, '2024-04-03 07:16:06', '2024-04-07 15:53:16'),
(656, 2, NULL, 'testing', NULL, NULL, 100.00, 10.00, 1, '2024-04-07 15:03:44', '2024-04-07 15:04:13'),
(657, 2, NULL, 'ctest', NULL, NULL, 100.00, 10.00, 1, '2024-04-07 15:28:37', '2024-04-07 15:37:01'),
(658, 2, NULL, 'ctest', NULL, NULL, 100.00, 5.00, 1, '2024-04-07 15:51:17', '2024-04-07 15:52:47'),
(659, 2, NULL, 'ctest', NULL, NULL, 10.00, 10.00, 1, '2024-04-07 15:52:38', '2024-04-07 15:53:12'),
(660, 2, NULL, 'mtest1', NULL, NULL, 15.00, 5.00, 1, '2024-04-07 15:54:41', '2024-04-07 18:30:38'),
(661, 2, NULL, 'xcxc', NULL, NULL, 20.00, 21.00, 1, '2024-04-07 17:54:40', '2024-04-07 18:30:43'),
(662, 2, NULL, 'xcxc', NULL, NULL, 20.00, 21.00, 1, '2024-04-07 17:54:47', '2024-04-07 18:30:49'),
(663, 2, NULL, 'xcxc', NULL, NULL, 0.00, 0.00, 1, '2024-04-07 17:57:12', '2024-04-07 18:30:53'),
(664, 2, NULL, 'dsd', NULL, NULL, 10.00, 10.00, 1, '2024-04-07 18:05:39', '2024-04-07 18:30:57'),
(665, 2, NULL, 'ppp', NULL, NULL, 10.00, 200.00, 1, '2024-04-07 18:09:43', '2024-04-07 18:30:34'),
(666, 16, NULL, 'dfdf', NULL, NULL, 30.00, 20.00, 1, '2024-04-07 18:10:40', '2024-04-07 18:30:29'),
(667, 2, NULL, 'cx', NULL, NULL, 20.00, 100.00, 1, '2024-04-07 18:13:11', '2024-04-07 18:30:25'),
(668, 16, NULL, 'test4', NULL, NULL, 10.00, 300.00, 1, '2024-04-07 18:13:59', '2024-04-07 18:30:21'),
(669, 16, NULL, 'ruhin', NULL, NULL, 7.00, 30.00, 1, '2024-04-07 18:14:46', '2024-04-07 18:30:17'),
(670, 2, NULL, 'mm', NULL, NULL, 10.00, 30.00, 1, '2024-04-07 18:16:51', '2024-04-07 18:30:12'),
(671, 2, NULL, 'Test1', NULL, NULL, 76.00, 5.00, 1, '2024-04-07 18:31:18', '2024-04-09 07:39:19'),
(672, 2, NULL, 'Test2', NULL, NULL, 26.00, 20.00, 1, '2024-04-07 18:51:15', '2024-04-09 07:39:23'),
(673, 2, NULL, 'abc', NULL, NULL, 5.00, 10.00, 1, '2024-04-08 07:43:15', '2024-04-09 07:39:13'),
(674, 2, NULL, 'revotil 0.5', NULL, NULL, 100.00, 8.00, 1, '2024-04-09 07:39:57', '2024-04-09 07:40:24'),
(675, 2, NULL, 'Revotil 0.5', NULL, NULL, 100.00, 8.00, 1, '2024-04-09 07:42:37', '2024-04-09 07:48:14'),
(676, 2, NULL, 'Revotil 0.5', NULL, NULL, 200.00, 8.00, 1, '2024-04-09 07:48:45', '2024-04-09 07:53:06'),
(677, 16, NULL, 'afrin7.7', NULL, NULL, 100.00, 40.00, 1, '2024-04-09 07:53:54', '2024-04-09 07:54:17'),
(678, 16, NULL, 'Afrin 7.7', NULL, NULL, 100.00, 40.00, 1, '2024-04-09 07:55:23', '2024-04-09 09:21:27'),
(679, 2, NULL, 'cidil', NULL, NULL, 100.00, 3.00, 1, '2024-04-09 09:22:13', '2024-04-09 09:54:33'),
(680, 2, NULL, 'tiptin 20', NULL, NULL, 300.00, 10.00, 1, '2024-04-09 09:28:28', '2024-04-09 09:54:28'),
(681, 2, NULL, 'tipten 20', NULL, NULL, 340.00, 12.00, 1, '2024-04-09 09:55:11', '2024-04-09 10:34:02'),
(682, 2, NULL, 'tipten 20', NULL, NULL, 50.00, 300.00, 1, '2024-04-09 10:11:18', '2024-04-09 10:11:43'),
(683, 15, NULL, 'test', NULL, NULL, 200.00, 100.00, 1, '2024-04-09 10:23:09', '2024-04-09 10:33:56'),
(684, 11, NULL, 'test123', NULL, NULL, 200.00, 200.00, 1, '2024-04-09 10:28:19', '2024-04-09 10:33:52'),
(685, 11, NULL, 'test333', NULL, NULL, 100.00, 5.00, 1, '2024-04-09 10:30:05', '2024-04-09 10:33:47'),
(686, 2, NULL, 'tiptin 20', NULL, NULL, 200.00, 5.00, 1, '2024-04-09 10:35:01', '2024-04-09 10:36:58'),
(687, 2, NULL, 'revotil 0.5', NULL, NULL, 95.00, 10.00, 1, '2024-04-09 10:37:43', '2024-04-09 10:56:20'),
(688, 2, NULL, 'test123', NULL, NULL, 380.00, 20.00, 1, '2024-04-09 10:56:57', '2024-04-09 18:05:21'),
(689, 2, NULL, 'napas', NULL, NULL, 145.00, 2.00, 1, '2024-04-09 18:05:44', '2024-04-13 05:41:31'),
(690, 15, NULL, 'pepar', NULL, NULL, 80.00, 20.00, 1, '2024-04-10 08:03:43', '2024-04-13 05:41:35'),
(691, 2, NULL, 'A', NULL, NULL, 14.00, 5.00, 1, '2024-04-10 13:13:31', '2024-04-13 05:41:27'),
(692, 16, NULL, 'Rainujall 2.5', NULL, NULL, 40.00, 20.00, 1, '2024-04-13 05:42:14', '2024-04-13 06:27:38'),
(693, 16, NULL, 'afrin 2.9', NULL, NULL, 50.00, 40.00, 1, '2024-04-13 06:13:07', '2024-04-13 06:27:34'),
(694, 2, NULL, 'fax2.9', NULL, NULL, 15.00, 100.00, 1, '2024-04-13 06:28:38', '2024-04-13 06:36:20'),
(695, 16, NULL, 'visa 3.3', NULL, NULL, 0.00, 20.00, 1, '2024-04-13 06:37:05', '2024-04-13 06:51:09'),
(696, 2, NULL, 'test', NULL, NULL, 50.00, 10.00, 1, '2024-04-13 06:51:49', '2024-04-13 08:39:45'),
(697, 16, NULL, 'test', NULL, NULL, 50.00, 100.00, 1, '2024-04-13 08:40:03', '2024-04-13 08:45:12'),
(698, 15, NULL, 'marer', NULL, NULL, 50.00, 100.00, 1, '2024-04-13 08:45:42', '2024-04-13 08:53:33'),
(699, 3, NULL, 'test123', NULL, NULL, 50.00, 100.00, 1, '2024-04-13 08:54:05', '2024-04-13 09:19:01'),
(700, 3, NULL, 'oooo123', NULL, NULL, 25.00, 10.00, 1, '2024-04-13 09:19:21', '2024-04-13 09:19:33'),
(701, 3, NULL, 'nnnn 0.9', NULL, NULL, 50.00, 10.00, 1, '2024-04-13 09:20:10', '2024-04-13 10:13:09'),
(702, 2, NULL, 'marer', NULL, NULL, 25.00, 100.00, 1, '2024-04-13 10:00:24', '2024-04-13 10:13:05'),
(703, 2, NULL, 'med', NULL, NULL, 50.00, 100.00, 1, '2024-04-13 10:13:36', '2024-04-13 12:32:08'),
(704, 11, NULL, 'mmm 0.2', NULL, NULL, 20.00, 100.00, 1, '2024-04-13 12:32:34', '2024-04-13 13:01:41'),
(705, 2, NULL, 'Revotil 0.7', NULL, NULL, 50.00, 12.00, 1, '2024-04-13 13:02:20', '2024-04-13 17:46:30'),
(706, 2, NULL, 'tipten 2.5', NULL, NULL, 30.00, 10.00, 1, '2024-04-13 17:47:04', '2024-04-14 08:35:15'),
(707, 2, NULL, 'test', NULL, NULL, 40.00, 20.00, 1, '2024-04-13 18:27:32', '2024-04-14 08:35:10'),
(708, 2, NULL, 'marer 0.9', NULL, NULL, 5.00, 5.00, 1, '2024-04-14 08:35:55', '2024-04-25 05:50:59'),
(709, 2, NULL, 'testing', NULL, NULL, 700.00, 10.00, 1, '2024-04-25 05:52:56', '2024-04-25 07:47:03'),
(710, 2, NULL, 'tafnil', NULL, NULL, 200.00, 20.00, 1, '2024-04-25 07:47:53', '2024-04-25 07:58:25'),
(711, 16, NULL, 'Afrin', NULL, NULL, 920.00, 40.00, 1, '2024-04-25 07:58:47', '2024-04-27 12:47:34'),
(712, 2, NULL, 'cidil', NULL, NULL, 923.00, 5.00, 1, '2024-04-25 09:05:16', '2024-04-27 12:47:44'),
(713, 2, NULL, 'test1', NULL, NULL, 100.00, 10.00, 1, '2024-04-27 12:48:05', '2024-04-28 07:30:14'),
(714, 2, NULL, 'test2', NULL, NULL, 1000.00, 10.00, 1, '2024-04-27 12:48:30', '2024-04-28 07:30:10'),
(715, 2, NULL, 'marer1', NULL, NULL, 50.00, 20.00, 0, '2024-04-28 07:31:01', '2024-04-28 07:49:11'),
(716, 2, NULL, 'marer2', NULL, NULL, 100.00, 20.00, 0, '2024-04-28 07:31:46', '2024-04-28 07:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `medicinetransitions`
--

CREATE TABLE `medicinetransitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `unit` double(10,2) DEFAULT NULL,
  `vat` double(10,2) DEFAULT NULL,
  `pay_by_cash` double(10,2) DEFAULT NULL,
  `amount` double(14,4) DEFAULT NULL,
  `adjust` double(10,2) DEFAULT NULL,
  `pay_by_adv` double(10,2) DEFAULT NULL,
  `unitprice` double(10,4) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `totalvat` double(10,2) DEFAULT NULL,
  `totaldiscount` double(10,2) DEFAULT NULL,
  `due` double(10,2) DEFAULT NULL,
  `Total_cost` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicinetransitions`
--

INSERT INTO `medicinetransitions` (`id`, `medicine_id`, `user_id`, `patient_id`, `order_id`, `unit`, `vat`, `pay_by_cash`, `amount`, `adjust`, `pay_by_adv`, `unitprice`, `discount`, `totalvat`, `totaldiscount`, `due`, `Total_cost`, `created_at`, `updated_at`) VALUES
(1, 715, NULL, NULL, 57, 200.00, 0.00, NULL, 4000.0000, 4000.00, NULL, 20.0000, 0.00, 0.00, 0.00, NULL, NULL, '2024-04-03 07:46:06', '2024-04-28 07:47:29'),
(2, 715, NULL, NULL, 58, 250.00, 0.00, NULL, 5000.0000, 5000.00, NULL, 20.0000, 0.00, 0.00, 0.00, NULL, NULL, '2024-04-04 07:46:06', '2024-04-28 07:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_categories`
--

CREATE TABLE `medicine_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_categories`
--

INSERT INTO `medicine_categories` (`id`, `name`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, 'Tablet', 0, '2021-11-02 02:04:01', '2021-11-02 02:04:01'),
(2, 'Capsul', 0, '2021-11-02 02:04:20', '2021-11-02 02:04:20'),
(3, 'Injection', 0, '2021-11-02 02:04:46', '2021-11-02 02:04:46'),
(4, 'Syrup', 0, '2021-11-02 02:05:10', '2021-11-18 09:24:47'),
(5, 'Suspension', 1, '2021-11-02 02:05:23', '2021-11-03 06:39:10'),
(6, 'Saline NS', 1, '2021-11-02 02:05:58', '2021-11-03 06:39:02'),
(7, 'Saline DNS', 1, '2021-11-02 02:06:35', '2021-11-03 06:38:53'),
(8, 'Saline HS', 1, '2021-11-02 02:07:07', '2021-11-03 06:34:00'),
(9, 'Saline 5% DA', 1, '2021-11-02 02:09:00', '2021-11-03 06:33:55'),
(10, 'Capsul', 1, '2021-11-03 06:26:15', '2021-11-03 06:30:15'),
(11, 'Infusion', 0, '2021-11-19 05:09:55', '2021-11-19 05:09:55'),
(12, 'surgical items', 0, '2021-11-19 05:10:41', '2021-11-19 05:10:41'),
(13, 'Suspension', 0, '2021-11-19 08:25:20', '2021-11-25 04:38:48'),
(14, 'Spray', 0, '2022-03-16 05:54:21', '2022-03-16 05:54:21'),
(15, 'Ointment', 0, '2022-06-05 02:18:08', '2022-06-05 02:18:08'),
(16, 'Drop', 0, '2022-06-08 02:44:42', '2022-06-08 02:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_comapnyer_dena_pawan_shods`
--

CREATE TABLE `medicine_comapnyer_dena_pawan_shods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicinecomapnyname_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `comment` varchar(255) DEFAULT NULL,
  `transitiontype` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_comapnyer_dena_pawan_shods`
--

INSERT INTO `medicine_comapnyer_dena_pawan_shods` (`id`, `medicinecomapnyname_id`, `user_id`, `amount`, `discount`, `comment`, `transitiontype`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 1720, 0, '0', 1, '2022-08-13 12:00:00', '2022-08-14 09:44:15'),
(2, 2, 1, 1000, 0, '0', 1, '2022-08-13 12:00:00', '2022-08-14 09:44:31'),
(3, 5, 1, 2422, 0, NULL, 1, '2022-09-25 12:00:00', '2022-09-26 10:18:23'),
(4, 9, 1, 2965, 0, NULL, 1, '2022-09-25 12:00:00', '2022-09-26 10:18:39'),
(5, 2, 1, 1500, 0, 'OLD BILL', 1, '2022-10-12 12:00:00', '2022-10-13 09:35:45'),
(7, 2, 1, 3350, 0, NULL, 1, '2022-10-14 12:00:00', '2022-10-15 11:32:08'),
(8, 3, 1, 2000, 0, NULL, 1, '2022-10-14 12:00:00', '2022-10-15 11:32:22'),
(9, 9, 1, 690, 0, NULL, 1, '2022-10-14 12:00:00', '2022-10-15 11:32:49'),
(10, 9, 1, 1715, 0, NULL, 1, '2022-10-15 12:00:00', '2022-10-16 10:12:51'),
(11, 9, 1, 450, 0, NULL, 1, '2022-10-15 12:00:00', '2022-10-16 10:13:15'),
(12, 3, 1, 1000, 0, NULL, 1, '2022-10-15 12:00:00', '2022-10-16 10:13:33'),
(13, 9, 1, 7000, 0, NULL, 1, '2022-10-16 12:00:00', '2022-10-17 07:01:19'),
(14, 6, 1, 808, 0, NULL, 1, '2022-10-16 12:00:00', '2022-10-17 07:09:27'),
(15, 11, 1, 1500, 0, NULL, 1, '2022-10-16 12:00:00', '2022-10-17 08:12:18'),
(16, 13, 1, 3000, 0, NULL, 1, '2022-10-16 12:00:00', '2022-10-17 08:12:26'),
(17, 2, 1, 2000, 0, NULL, 1, '2022-10-16 12:00:00', '2022-10-17 09:55:04'),
(19, 11, 1, 2892, 0, 'NA', 1, '2022-10-17 12:00:00', '2022-10-18 10:53:44'),
(21, 2, 1, 1750, 0, NULL, 1, '2022-10-18 12:00:00', '2022-10-19 06:51:27'),
(22, 3, 1, 2000, 0, NULL, 1, '2022-10-18 12:00:00', '2022-10-19 06:51:49'),
(23, 2, 1, 1900, 0, NULL, 1, '2022-10-18 12:00:00', '2022-10-19 09:38:40'),
(24, 2, 1, 1000, 0, NULL, 1, '2022-11-02 12:00:00', '2022-11-03 08:52:23'),
(26, 2, 1, 2000, 0, NULL, 1, '2022-11-04 12:00:00', '2022-11-05 09:38:27'),
(27, 18, 1, 2000, 0, NULL, 1, '2022-11-04 12:00:00', '2022-11-05 09:39:01'),
(28, 7, 1, 2700, 0, NULL, 1, '2022-11-04 12:00:00', '2022-11-05 09:39:30'),
(30, 2, 1, 2000, 0, 'NA', 1, '2022-11-06 12:00:00', '2022-11-07 10:57:26'),
(31, 5, 1, 1500, 0, 'NA', 1, '2022-11-06 12:00:00', '2022-11-07 10:57:48'),
(32, 18, 1, 1600, 0, 'NA', 1, '2022-11-06 12:00:00', '2022-11-07 10:58:11'),
(33, 7, 1, 3535, 0, 'NA', 1, '2022-11-06 12:00:00', '2022-11-07 10:59:01'),
(36, 2, 1, 3000, 0, 'NA', 1, '2022-11-09 12:00:00', '2022-11-10 10:58:11'),
(37, 2, 1, 3187, 0, NULL, 1, '2022-11-11 12:00:00', '2022-11-12 10:55:10'),
(38, 5, 1, 1400, 0, '0', 1, '2022-11-12 12:00:00', '2022-11-13 09:09:36'),
(39, 3, 1, 2700, 0, '0', 1, '2022-11-12 12:00:00', '2022-11-13 09:09:53'),
(40, 9, 1, 2230, 0, '0', 1, '2022-11-12 12:00:00', '2022-11-13 09:10:11'),
(41, 11, 1, 1392, 0, '0', 1, '2022-11-12 12:00:00', '2022-11-13 09:43:25'),
(42, 2, 1, 3024, 0, NULL, 1, '2022-12-02 12:00:00', '2022-12-03 10:58:35'),
(43, 5, 1, 3000, 0, NULL, 1, '2022-12-02 12:00:00', '2022-12-03 10:59:03'),
(45, 5, 1, 2000, 0, NULL, 1, '2022-12-03 12:00:00', '2022-12-04 10:11:05'),
(46, 2, 1, 2000, 0, NULL, 1, '2022-12-04 12:00:00', '2022-12-05 08:36:14'),
(47, 7, 1, 2810, 0, NULL, 1, '2022-12-04 12:00:00', '2022-12-05 08:36:43'),
(48, 2, 1, 3000, 0, NULL, 1, '2022-12-05 12:00:00', '2022-12-06 09:30:39'),
(49, 19, 1, 1250, 0, NULL, 1, '2022-12-05 12:00:00', '2022-12-06 09:31:33'),
(50, 7, 1, 5250, 0, NULL, 1, '2022-12-06 12:00:00', '2022-12-07 03:15:33'),
(51, 4, 1, 4800, 0, NULL, 1, '2022-12-06 12:00:00', '2022-12-07 10:13:20'),
(52, 5, 1, 2000, 0, NULL, 1, '2022-12-06 12:00:00', '2022-12-07 10:13:36'),
(53, 2, 1, 4000, 0, NULL, 1, '2022-12-07 12:00:00', '2022-12-08 09:23:00'),
(57, 5, 1, 3000, 0, NULL, 1, '2022-12-09 12:00:00', '2022-12-10 10:28:55'),
(59, 9, 1, 1350, 0, NULL, 1, '2022-12-09 12:00:00', '2022-12-10 10:36:31'),
(60, 5, 1, 2000, 0, NULL, 1, '2022-12-10 12:00:00', '2022-12-11 09:23:00'),
(61, 7, 1, 5370, 0, NULL, 1, '2022-12-10 12:00:00', '2022-12-11 09:47:00'),
(63, 2, 1, 2000, 0, NULL, 1, '2022-12-10 12:00:00', '2022-12-11 09:47:32'),
(66, 2, 1, 1000, 0, NULL, 1, '2022-12-11 12:00:00', '2022-12-12 10:22:01'),
(67, 9, 1, 520, 0, NULL, 1, '2022-12-11 12:00:00', '2022-12-12 10:22:27'),
(68, 11, 1, 2000, 0, NULL, 1, '2022-12-12 12:00:00', '2022-12-13 08:21:49'),
(69, 5, 1, 3900, 0, NULL, 1, '2022-12-12 12:00:00', '2022-12-13 08:49:38'),
(70, 2, 1, 2000, 0, NULL, 1, '2022-12-12 12:00:00', '2022-12-13 10:17:23'),
(71, 2, 1, 1000, 0, NULL, 1, '2022-12-13 12:00:00', '2022-12-14 09:28:20'),
(72, 9, 1, 1700, 0, NULL, 1, '2022-12-13 12:00:00', '2022-12-14 09:31:09'),
(73, 7, 1, 7090, 0, NULL, 1, '2022-12-13 12:00:00', '2022-12-14 09:31:34'),
(74, 2, 1, 2000, 0, NULL, 1, '2022-12-19 12:00:00', '2022-12-20 10:05:01'),
(75, 7, 1, 4600, 0, NULL, 1, '2022-12-19 12:00:00', '2022-12-20 10:05:11'),
(77, 4, 1, 2410, 0, NULL, 1, '2022-12-20 12:00:00', '2022-12-21 09:30:10'),
(78, 2, 1, 1545, 0, NULL, 1, '2022-12-23 12:00:00', '2022-12-24 09:35:35'),
(79, 5, 1, 1298, 0, NULL, 1, '2022-12-23 12:00:00', '2022-12-24 09:35:52'),
(81, 7, 1, 2200, 0, NULL, 1, '2022-12-23 12:00:00', '2022-12-24 10:07:53'),
(82, 5, 1, 380, 0, NULL, 1, '2022-12-25 12:00:00', '2022-12-26 08:14:59'),
(83, 2, 1, 2000, 0, NULL, 1, '2022-12-25 12:00:00', '2022-12-26 09:34:19'),
(84, 2, 1, 2000, 0, NULL, 1, '2022-12-26 12:00:00', '2022-12-27 08:10:09'),
(85, 5, 1, 4000, 0, NULL, 1, '2022-12-26 12:00:00', '2022-12-27 08:10:21'),
(86, 5, 1, 4000, 0, NULL, 1, '2022-12-27 12:00:00', '2022-12-28 08:36:46'),
(87, 2, 1, 4000, 0, NULL, 1, '2022-12-27 12:00:00', '2022-12-28 08:50:59'),
(88, 9, 1, 400, 0, NULL, 1, '2022-12-28 12:00:00', '2022-12-29 07:39:03'),
(89, 18, 1, 3600, 0, NULL, 1, '2022-12-31 12:00:00', '2023-01-01 09:01:15'),
(90, 2, 1, 1500, 0, NULL, 1, '2023-01-01 12:00:00', '2023-01-02 10:25:51'),
(91, 5, 1, 1000, 0, NULL, 1, '2023-01-02 12:00:00', '2023-01-03 09:59:33'),
(92, 2, 1, 4000, 0, NULL, 1, '2023-01-03 12:00:00', '2023-01-04 08:57:53'),
(94, 2, 1, 3000, 0, NULL, 1, '2023-01-07 12:00:00', '2023-01-08 10:17:09'),
(95, 5, 1, 2000, 0, NULL, 1, '2023-01-07 12:00:00', '2023-01-08 10:17:25'),
(96, 9, 1, 190, 0, NULL, 1, '2023-01-07 12:00:00', '2023-01-08 10:32:27'),
(97, 9, 1, 100, 0, NULL, 1, '2023-01-07 12:00:00', '2023-01-08 10:52:43'),
(99, 2, 1, 2000, 0, NULL, 1, '2023-01-08 12:00:00', '2023-01-09 09:13:11'),
(100, 4, 1, 1030, 0, NULL, 1, '2023-01-08 12:00:00', '2023-01-09 09:13:37'),
(101, 7, 1, 1100, 0, NULL, 1, '2023-01-09 12:00:00', '2023-01-10 09:30:48'),
(102, 2, 1, 2000, 0, NULL, 1, '2023-01-09 12:00:00', '2023-01-10 09:42:52'),
(103, 5, 1, 2000, 0, NULL, 1, '2023-01-09 12:00:00', '2023-01-10 09:43:11'),
(104, 7, 1, 2000, 0, NULL, 1, '2023-01-09 12:00:00', '2023-01-10 09:43:44'),
(105, 5, 1, 2760, 0, NULL, 1, '2023-01-10 12:00:00', '2023-01-11 09:08:39'),
(106, 2, 1, 2000, 0, NULL, 1, '2023-01-10 12:00:00', '2023-01-11 09:09:01'),
(107, 9, 1, 2550, 0, NULL, 1, '2023-01-11 12:00:00', '2023-01-12 08:43:29'),
(108, 7, 1, 5000, 0, NULL, 1, '2023-01-11 12:00:00', '2023-01-12 08:43:53'),
(109, 20, 1, 765, 0, NULL, 1, '2023-01-11 12:00:00', '2023-01-12 08:49:39'),
(110, 12, 1, 1700, 0, NULL, 1, '2023-01-13 12:00:00', '2023-01-14 10:21:18'),
(111, 4, 1, 2429, 0, NULL, 1, '2023-01-13 12:00:00', '2023-01-14 10:21:29'),
(112, 2, 1, 2000, 0, NULL, 1, '2023-01-13 12:00:00', '2023-01-14 10:21:40'),
(113, 13, 1, 1000, 0, NULL, 1, '2023-01-13 12:00:00', '2023-01-14 10:21:51'),
(114, 7, 1, 2000, 0, NULL, 1, '2023-01-13 12:00:00', '2023-01-14 10:48:15'),
(115, 2, 1, 2000, 0, NULL, 1, '2023-01-14 12:00:00', '2023-01-15 08:55:54'),
(116, 5, 1, 2000, 0, NULL, 1, '2023-01-14 12:00:00', '2023-01-15 08:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_company_transitions`
--

CREATE TABLE `medicine_company_transitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` bigint(20) UNSIGNED NOT NULL,
  `medicinecompanyorder_id` bigint(20) UNSIGNED NOT NULL,
  `Quantity` double(14,4) NOT NULL,
  `unit_price` double(14,4) NOT NULL,
  `remaining` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `transitiontype` tinyint(1) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_company_transitions`
--

INSERT INTO `medicine_company_transitions` (`id`, `medicine_id`, `medicinecompanyorder_id`, `Quantity`, `unit_price`, `remaining`, `created_at`, `transitiontype`, `updated_at`) VALUES
(1, 715, 21, 100.0000, 20.0000, 0, '2024-04-01 07:30:00', 3, '2024-04-28 07:47:29'),
(2, 716, 22, 100.0000, 20.0000, 100, '2024-04-01 07:31:00', 3, '2024-04-28 07:31:46'),
(3, 715, 23, 200.0000, 30.0000, 0, '2024-04-02 07:44:00', 1, '2024-04-28 07:49:11'),
(4, 715, 24, 200.0000, 40.0000, 50, '2024-04-03 07:45:00', 1, '2024-04-28 07:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `menuactions`
--

CREATE TABLE `menuactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `childmenu_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(731, '2022_01_25_160546_create_refundtransition_controllers_table', 5),
(1559, '2014_10_12_000000_create_users_table', 6),
(1560, '2014_10_12_100000_create_password_resets_table', 6),
(1561, '2019_08_19_000000_create_failed_jobs_table', 6),
(1562, '2021_08_16_181240_create_medicines_table', 6),
(1563, '2021_08_18_125604_create_medicine_categories_table', 6),
(1564, '2021_09_05_100122_create_orders_table', 6),
(1565, '2021_09_16_232640_create_returnmedicinetransactions_table', 6),
(1566, '2021_09_16_232739_create_return_orders_table', 6),
(1567, '2021_09_18_025707_create_employeelists_table', 6),
(1568, '2021_09_18_071630_create_cabinelists_table', 6),
(1569, '2021_09_18_083650_create_cabinetransactions_table', 6),
(1570, '2021_09_20_141159_create_employeedetails_table', 6),
(1571, '2021_09_20_190816_create_employeesalarytransactions_table', 6),
(1572, '2021_09_21_091604_create_reportlists_table', 6),
(1573, '2021_09_21_110407_create_reportorders_table', 6),
(1574, '2021_09_21_124656_create_agentdetails_table', 6),
(1575, '2021_09_21_131815_create_agenttransactions_table', 6),
(1576, '2021_09_21_192533_create_externalcosts_table', 6),
(1577, '2021_09_24_122321_create_doctors_table', 6),
(1578, '2021_09_24_223711_create_doctorappointmenttransactions_table', 6),
(1579, '2021_09_27_115219_create_makepathologytestreports_table', 6),
(1580, '2021_09_28_064413_create_surgerylists_table', 6),
(1581, '2021_09_29_011309_create_medicinecomapnynames_table', 6),
(1582, '2021_10_03_075419_create_finalreports_table', 6),
(1583, '2021_10_03_091022_create_duetransitions_table', 6),
(1584, '2021_10_05_140151_create_khorocer_khads_table', 6),
(1585, '2021_10_05_140746_create_khoroch_transitions_table', 6),
(1586, '2021_10_05_141957_create_suppliers_table', 6),
(1587, '2021_10_07_130345_create_dhar_shod_othoba_advance_er_mal_buje_pawas_table', 6),
(1588, '2021_10_08_074429_create_doctor_commission_transitions_table', 6),
(1589, '2021_10_08_131143_create_buy_return_medicine_from_companies_table', 6),
(1590, '2021_10_10_094328_create_taka_uttolon_transitions_table', 6),
(1591, '2021_10_10_100116_create_sharepartners_table', 6),
(1592, '2021_10_11_132144_create_balance_of_businesses_table', 6),
(1593, '2021_10_12_145406_create_medicine_company_transitions_table', 6),
(1594, '2021_10_13_122047_create_pathology_test_components_table', 6),
(1595, '2021_10_17_141036_create_sompods_table', 6),
(1596, '2021_10_17_155116_create_medicine_comapnyer_dena_pawan_shods_table', 6),
(1597, '2021_10_24_140328_create_patientbooks_table', 6),
(1598, '2021_11_01_172654_create_servicelistinhospitals_table', 6),
(1599, '2021_11_02_215451_create_servicetransitions_table', 6),
(1600, '2021_11_10_043306_create_prescriptions_table', 6),
(1601, '2021_11_10_043340_create_prescriptionmedicinelists_table', 6),
(1602, '2021_11_10_043415_create_prescriptionusages_table', 6),
(1603, '2021_11_10_180320_create_prescriptionkhabaragepores_table', 6),
(1604, '2021_11_26_141312_create_serviceorders_table', 6),
(1605, '2021_11_27_230130_create_patientfinalhisabs_table', 6),
(1606, '2021_12_22_150859_create_areacodepolturies_table', 6),
(1607, '2021_12_26_164027_create_productcompanytransitions_table', 6),
(1608, '2021_12_26_164201_create_productcompanyorders_table', 6),
(1609, '2022_01_13_164401_create_cabinefeetransitions_table', 6),
(1610, '2022_01_25_172314_create_refundtransitions_table', 6),
(1611, '2022_05_17_204931_create_cabinetransferhistos_table', 6),
(1612, '2022_05_22_163703_create_longterminstallations_table', 6),
(1613, '2022_05_22_183722_create_dentalservices_table', 6),
(1614, '2022_05_23_013242_create_longterminstallerorders_table', 6),
(1615, '2022_05_23_162606_create_dentalserviceodermoney_deposits_table', 6),
(1616, '2022_06_08_092807_create_cashtransitions_table', 6),
(1617, '2022_06_13_000759_create_pathologyorderfromotherinsitutes_table', 6),
(1618, '2022_06_13_000915_create_pathologytransitionfromotherinstitues_table', 6),
(1619, '2022_07_17_022525_create_medicinecompanyorders_table', 6),
(1620, '2022_12_02_230043_create_reagents_table', 6),
(1621, '2021_08_16_181219_create_patients_table', 7),
(1622, '2021_08_25_053832_create_medicinetransitions_table', 7),
(1623, '2021_09_21_105942_create_reporttransactions_table', 7),
(1624, '2021_09_28_072020_create_surgerytransactions_table', 7),
(1626, '2023_01_30_001822_create_settings_table', 8),
(1629, '2023_02_19_204549_create_reagents_table', 9),
(1632, '2023_02_20_221722_create_reagent_transactions_table', 10),
(1633, '2023_02_20_221741_create_reagent_orders_table', 10),
(1634, '2024_03_06_173052_create__create_virtual_table_table', 11),
(1636, '2024_03_23_142633_create_coshmas_table', 12),
(1637, '0000_00_00_000000_create_websockets_statistics_entries_table', 13),
(1638, '2024_03_26_133159_create_coshma_prescriptions_table', 14),
(1639, '2024_03_29_173050_create_permission_tables', 15),
(1658, '2024_03_30_004212_create_admin_menus_table', 16),
(1663, '2024_03_30_012427_create_admin_menu_actions_table', 17),
(1670, '2024_04_04_111538_create_rootmenus_table', 18),
(1671, '2024_04_04_111601_create_childmenus_table', 18),
(1672, '2024_04_08_143252_create_menuactions_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(26, 'App\\Models\\User', 40);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `discountrefernceid` int(11) DEFAULT NULL,
  `totalbeforediscount` double(10,2) DEFAULT NULL,
  `due` double(12,2) DEFAULT NULL,
  `pay_in_cash` double(12,2) NOT NULL,
  `pay_by_adv` double(12,2) NOT NULL,
  `total` double(12,2) NOT NULL,
  `discount` double(10,2) NOT NULL DEFAULT 0.00,
  `refundamount` double(10,2) NOT NULL DEFAULT 0.00,
  `refundbyuser` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `patient_id`, `discountrefernceid`, `totalbeforediscount`, `due`, `pay_in_cash`, `pay_by_adv`, `total`, `discount`, `refundamount`, `refundbyuser`, `created_at`, `updated_at`) VALUES
(1, 40, 7, NULL, 10.00, 0.00, 0.00, 10.00, 10.00, 0.00, 0.00, NULL, '2024-04-07 18:40:11', '2024-04-07 18:41:34'),
(2, 40, 11, NULL, 10.00, 10.00, 0.00, 0.00, 10.00, 0.00, 0.00, NULL, '2024-04-07 18:46:55', '2024-04-07 18:49:01'),
(3, 40, 7, NULL, 100.00, 100.00, 0.00, 0.00, 100.00, 0.00, 0.00, NULL, '2024-04-07 18:46:55', '2024-04-07 18:49:39'),
(4, 38, 1, NULL, 2000.00, 1930.00, 0.00, 70.00, 2000.00, 0.00, 0.00, NULL, '2024-04-09 08:11:43', '2024-04-09 08:11:58'),
(5, 38, 1, NULL, 1000.00, 1000.00, 0.00, 0.00, 1000.00, 0.00, 0.00, NULL, '2024-04-09 10:42:02', '2024-04-09 10:43:52'),
(6, 38, 1, NULL, 50.00, 50.00, 0.00, 0.00, 50.00, 0.00, 0.00, NULL, '2024-04-09 10:42:02', '2024-04-09 10:46:00'),
(7, 38, 1, NULL, 400.00, 400.00, 0.00, 0.00, 400.00, 0.00, 0.00, NULL, '2024-04-09 11:24:08', '2024-04-09 11:25:05'),
(8, 38, 1, NULL, 12100.00, 12100.00, 0.00, 0.00, 12100.00, 0.00, 0.00, NULL, '2024-04-09 18:13:54', '2024-04-09 18:14:37'),
(9, 38, 1, NULL, 10.00, 10.00, 0.00, 0.00, 10.00, 0.00, 0.00, NULL, '2024-04-09 19:58:08', '2024-04-09 19:58:38'),
(10, 38, 1, NULL, 200.00, 200.00, 0.00, 0.00, 200.00, 0.00, 0.00, NULL, '2024-04-10 08:05:22', '2024-04-10 08:06:08'),
(11, 38, 1, NULL, 600.00, 600.00, 0.00, 0.00, 600.00, 0.00, 0.00, NULL, '2024-04-16 08:05:22', '2024-04-10 08:07:03'),
(12, 38, 1, NULL, 5.00, 5.00, 0.00, 0.00, 5.00, 0.00, 0.00, NULL, '2024-04-10 13:15:25', '2024-04-10 13:15:54'),
(13, 38, 1, NULL, 200.00, 200.00, 0.00, 0.00, 200.00, 0.00, 0.00, NULL, '2024-04-13 05:50:15', '2024-04-13 05:50:33'),
(14, 38, 1, NULL, 1000.00, 1000.00, 0.00, 0.00, 1000.00, 0.00, 0.00, NULL, '2024-04-13 05:50:15', '2024-04-13 06:09:23'),
(15, 38, 1, NULL, 400.00, 400.00, 0.00, 0.00, 400.00, 0.00, 0.00, NULL, '2024-04-13 06:10:18', '2024-04-13 06:10:40'),
(16, 38, 1, NULL, 1500.00, 1500.00, 0.00, 0.00, 1500.00, 0.00, 0.00, NULL, '2024-04-13 06:30:18', '2024-04-13 06:30:45'),
(17, 38, 1, NULL, 1000.00, 1000.00, 0.00, 0.00, 1000.00, 0.00, 0.00, NULL, '2024-04-13 06:43:25', '2024-04-13 06:43:57'),
(18, 38, 1, NULL, 3000.00, 3000.00, 0.00, 0.00, 3000.00, 0.00, 0.00, NULL, '2024-04-15 12:43:55', '2024-04-13 12:44:26'),
(19, 38, 1, NULL, 300.00, 300.00, 0.00, 0.00, 300.00, 0.00, 0.00, NULL, '2024-04-13 17:48:39', '2024-04-13 17:49:03'),
(20, 38, 1, NULL, 75.00, 75.00, 0.00, 0.00, 75.00, 0.00, 0.00, NULL, '2024-04-07 08:45:43', '2024-04-14 08:46:19'),
(21, 38, 1, NULL, 2000.00, 2000.00, 0.00, 0.00, 2000.00, 0.00, 0.00, NULL, '2024-04-25 07:33:02', '2024-04-25 07:37:31'),
(24, 38, 1, NULL, 4000.00, 4000.00, 0.00, 0.00, 4000.00, 0.00, 0.00, NULL, '2024-04-25 08:14:39', '2024-04-25 08:15:01'),
(25, 38, 1, NULL, 4000.00, 4000.00, 0.00, 0.00, 4000.00, 0.00, 0.00, NULL, '2024-04-25 08:17:26', '2024-04-25 08:17:53'),
(26, 38, 1, NULL, 80.00, 80.00, 0.00, 0.00, 80.00, 0.00, 0.00, NULL, '2024-04-25 11:35:31', '2024-04-25 11:36:02'),
(27, 38, 1, NULL, 80.00, 80.00, 0.00, 0.00, 80.00, 0.00, 0.00, NULL, '2024-04-25 11:43:06', '2024-04-25 11:43:31'),
(28, 38, 1, NULL, 200.00, 200.00, 0.00, 0.00, 200.00, 0.00, 0.00, NULL, '2024-04-25 11:44:50', '2024-04-25 11:45:10'),
(29, 38, 1, NULL, 200.00, 200.00, 0.00, 0.00, 200.00, 0.00, 0.00, NULL, '2024-04-25 11:51:18', '2024-04-25 11:51:36'),
(30, 38, 1, NULL, 200.00, 200.00, 0.00, 0.00, 200.00, 0.00, 0.00, NULL, '2024-04-25 11:52:44', '2024-04-25 11:52:57'),
(31, 38, 1, NULL, 800.00, 800.00, 0.00, 0.00, 800.00, 0.00, 0.00, NULL, '2024-04-25 11:54:09', '2024-04-25 11:54:27'),
(32, 38, 1, NULL, 900.00, 900.00, 0.00, 0.00, 900.00, 0.00, 0.00, NULL, '2024-04-27 07:47:04', '2024-04-27 07:47:54'),
(33, 38, 1, NULL, 50.00, 50.00, 0.00, 0.00, 50.00, 0.00, 0.00, NULL, '2024-04-27 07:49:53', '2024-04-27 07:50:39'),
(35, 38, 1, NULL, 50.00, 50.00, 0.00, 0.00, 50.00, 0.00, 0.00, NULL, '2024-04-27 07:52:41', '2024-04-27 07:52:57'),
(36, 38, 1, NULL, 225.00, 225.00, 0.00, 0.00, 225.00, 0.00, 0.00, NULL, '2024-04-27 07:56:08', '2024-04-27 07:56:35'),
(37, 38, 1, NULL, 900.00, 900.00, 0.00, 0.00, 900.00, 0.00, 0.00, NULL, '2024-04-27 07:56:08', '2024-04-27 07:57:24'),
(38, 38, 1, NULL, 450.00, 450.00, 0.00, 0.00, 450.00, 0.00, 0.00, NULL, '2024-04-27 08:22:33', '2024-04-27 08:23:07'),
(39, 38, 1, NULL, 320.00, 320.00, 0.00, 0.00, 320.00, 0.00, 0.00, NULL, '2024-04-27 08:22:33', '2024-04-27 08:23:56'),
(41, 38, 1, NULL, 400.00, 400.00, 0.00, 0.00, 400.00, 0.00, 0.00, NULL, '2024-04-27 08:37:17', '2024-04-27 08:38:01'),
(42, 38, 1, NULL, 400.00, 400.00, 0.00, 0.00, 400.00, 0.00, 0.00, NULL, '2024-04-27 08:43:54', '2024-04-27 08:44:39'),
(43, 38, 1, NULL, 400.00, 400.00, 0.00, 0.00, 400.00, 0.00, 0.00, NULL, '2024-04-27 08:45:08', '2024-04-27 08:45:32'),
(44, 38, 1, NULL, 400.00, 400.00, 0.00, 0.00, 400.00, 0.00, 0.00, NULL, '2024-04-27 09:31:23', '2024-04-27 09:31:44'),
(45, 38, 1, NULL, 4000.00, 4000.00, 0.00, 0.00, 4000.00, 0.00, 0.00, NULL, '2024-04-02 12:51:21', '2024-04-27 12:51:53'),
(46, 38, 1, NULL, 200.00, 200.00, 0.00, 0.00, 200.00, 0.00, 0.00, NULL, '2024-04-02 19:08:39', '2024-04-27 19:09:12'),
(47, 38, 1, NULL, 200.00, 200.00, 0.00, 0.00, 200.00, 0.00, 0.00, NULL, '2024-04-03 19:16:20', '2024-04-27 19:16:46'),
(48, 38, 1, NULL, 300.00, 300.00, 0.00, 0.00, 300.00, 0.00, 0.00, NULL, '2024-04-04 19:18:02', '2024-04-27 19:18:23'),
(49, 38, 1, NULL, 300.00, 300.00, 0.00, 0.00, 300.00, 0.00, 0.00, NULL, '2024-04-06 06:39:06', '2024-04-28 06:39:33'),
(50, 38, 1, NULL, 500.00, 500.00, 0.00, 0.00, 500.00, 0.00, 0.00, NULL, '2024-04-28 06:57:45', '2024-04-28 06:58:25'),
(51, 38, 1, NULL, 1500.00, 1500.00, 0.00, 0.00, 1500.00, 0.00, 0.00, NULL, '2024-04-28 06:57:45', '2024-04-28 06:59:01'),
(52, 38, 1, NULL, 2000.00, 2000.00, 0.00, 0.00, 2000.00, 0.00, 0.00, NULL, '2024-04-28 07:04:09', '2024-04-28 07:04:31'),
(53, 38, 1, NULL, 4000.00, 4000.00, 0.00, 0.00, 4000.00, 0.00, 0.00, NULL, '2024-04-28 07:05:38', '2024-04-28 07:05:53'),
(54, 38, 1, NULL, 500.00, 500.00, 0.00, 0.00, 500.00, 0.00, 0.00, NULL, '2024-04-28 07:07:34', '2024-04-28 07:07:47'),
(55, 38, 1, NULL, 500.00, 500.00, 0.00, 0.00, 500.00, 0.00, 0.00, NULL, '2024-04-28 07:08:58', '2024-04-28 07:09:19'),
(56, 38, 1, NULL, 2000.00, 2000.00, 0.00, 0.00, 2000.00, 0.00, 0.00, NULL, '2024-04-28 07:16:08', '2024-04-28 07:16:55'),
(57, 38, 1, NULL, 4000.00, 4000.00, 0.00, 0.00, 4000.00, 0.00, 0.00, NULL, '2024-04-03 07:46:06', '2024-04-28 07:47:29'),
(58, 38, 1, NULL, 5000.00, 5000.00, 0.00, 0.00, 5000.00, 0.00, 0.00, NULL, '2024-04-04 07:46:06', '2024-04-28 07:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pathologyorderfromotherinsitutes`
--

CREATE TABLE `pathologyorderfromotherinsitutes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `due` double(10,2) DEFAULT NULL,
  `pay_in_cash` double(10,2) NOT NULL,
  `totalbeforediscount` double(10,2) DEFAULT NULL,
  `total` double(10,2) NOT NULL,
  `discount` double(10,2) NOT NULL DEFAULT 0.00,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pathologyorderfromotherinsitutes`
--

INSERT INTO `pathologyorderfromotherinsitutes` (`id`, `patient_id`, `user_id`, `supplier_id`, `due`, `pay_in_cash`, `totalbeforediscount`, `total`, `discount`, `remark`, `created_at`, `updated_at`) VALUES
(5, 4, 38, 2, 1040.00, 0.00, 1300.00, 1040.00, 260.00, 'xcxcxx', '2024-04-07 11:35:21', '2024-04-07 11:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `pathologytransitionfromotherinstitues`
--

CREATE TABLE `pathologytransitionfromotherinstitues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reportlist_id` bigint(20) UNSIGNED NOT NULL,
  `pathologyorderfromotherinsitute_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit` double(10,4) NOT NULL,
  `discount` double(10,4) DEFAULT NULL,
  `totaldiscount` double(10,4) NOT NULL,
  `amount` double(10,4) NOT NULL,
  `adjust` double(10,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unitprice` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pathologytransitionfromotherinstitues`
--

INSERT INTO `pathologytransitionfromotherinstitues` (`id`, `reportlist_id`, `pathologyorderfromotherinsitute_id`, `supplier_id`, `unit`, `discount`, `totaldiscount`, `amount`, `adjust`, `created_at`, `updated_at`, `unitprice`) VALUES
(2, 554, 5, 2, 1.0000, 20.0000, 260.0000, 1300.0000, 1040.0000, '2024-04-07 11:35:21', '2024-04-07 11:35:21', 1300);

-- --------------------------------------------------------

--
-- Table structure for table `pathology_test_components`
--

CREATE TABLE `pathology_test_components` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reportlist_id` bigint(20) UNSIGNED NOT NULL,
  `component_name` varchar(255) NOT NULL,
  `Normalvalue` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pathology_test_components`
--

INSERT INTO `pathology_test_components` (`id`, `reportlist_id`, `component_name`, `Normalvalue`, `unit`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, 171, 'Alpha Feto Protein', '<10.9', 'IU/ml', 0, '2021-12-20 12:04:02', '2021-12-20 12:04:02'),
(2, 74, 'S. ALBUMIN', '3.8-5.4', 'g/dl', 0, '2021-12-20 12:08:46', '2021-12-20 12:08:46'),
(3, 72, 'S. ALKALINE   PHOSPHATES', 'Child. 71-142  Adult. 98-279', 'U/L', 0, '2021-12-20 12:12:34', '2021-12-20 12:12:34'),
(4, 79, 'S. AMYLASE', '< 200', 'IU/L', 0, '2021-12-20 12:15:36', '2021-12-20 12:15:36'),
(5, 9, 'Anti HCV', 'NEGATIVE (-VE)', NULL, 0, '2021-12-20 12:20:05', '2021-12-20 12:20:05'),
(6, 105, 'Anti HIV', 'NEGATIVE (-VE)', NULL, 0, '2021-12-20 12:21:48', '2021-12-20 12:21:48'),
(7, 87, 'ASO Titre', '< 200', 'IU/ML', 0, '2021-12-20 12:22:58', '2021-12-20 12:22:58'),
(8, 10, 'BLOOD GROUPING', NULL, NULL, 0, '2021-12-20 13:20:53', '2021-12-20 13:20:53'),
(9, 45, 'BLEEDING  TIME   (B.T.)', '2-7', 'MINUTES', 0, '2021-12-20 13:24:34', '2021-12-20 13:24:34'),
(10, 46, 'CLOTTING  TIME   (C.T.)', '3-10', 'MINUTES', 0, '2021-12-20 13:25:41', '2021-12-20 13:25:41'),
(11, 176, 'SERUM CA-125  (ELISA METHOD)', 'Healthy & Non Pregnancy subject <35', 'U/ml.', 0, '2021-12-20 14:22:45', '2021-12-20 14:22:45'),
(12, 86, 'D- Dimer', '<0.5', 'mg/L', 0, '2021-12-20 14:30:12', '2021-12-20 14:30:12'),
(13, 4, 'CRP', NULL, NULL, 0, '2021-12-20 14:31:01', '2021-12-20 14:31:01'),
(14, 57, 'S-CREATININE', '0.6-1.4', 'mg/dl', 0, '2021-12-20 14:33:19', '2021-12-20 14:33:19'),
(15, 51, 'FBS', '75-100  5.6', 'mmol/L', 0, '2021-12-20 14:36:37', '2021-12-20 14:36:37'),
(16, 52, '2 Hours after Breakfast           (P.P.B.S)', '75-140 mg/dl <7.8 mmol/L', 'mg/dl mmol/L', 0, '2021-12-20 14:39:42', '2021-12-20 14:39:42'),
(17, 53, 'Random Blood Sugar (RBS)', '75-140  <7.8', 'mg/dl mmol/L', 0, '2021-12-20 14:42:05', '2021-12-20 14:42:05'),
(18, 163, 'TSH', '0.37  - 5.1', 'mIU/ml', 0, '2021-12-20 14:49:29', '2021-12-20 14:49:29'),
(19, 74, 'S. ALBUMIN', '3.8-5.4', 'g/dl', 1, '2021-12-26 12:40:15', '2021-12-26 12:42:39'),
(20, 200, 'URINE FOR AMYLASE', '< 1000', 'U/L', 0, '2021-12-26 12:48:44', '2021-12-26 12:48:44'),
(21, 74, 'URINE FOR  ALBUMIN', '3.8 – 5.1', 'g/dl', 0, '2021-12-26 12:53:26', '2021-12-26 12:53:26'),
(22, 159, 'T3  TSH', '80 – 200', 'ng/dl', 0, '2021-12-26 13:01:21', '2021-12-26 13:01:21'),
(23, 159, 'T4', '50 - 130', 'ng/dl', 0, '2021-12-26 13:01:21', '2021-12-26 13:01:21'),
(24, 159, 'TSH', '0.37  - 5.1', 'mIU/ml', 0, '2021-12-26 13:01:21', '2021-12-26 13:01:21'),
(25, 81, 'SERUM CALCIUM', '8.1-10.4', 'mg/dl', 0, '2022-01-02 11:33:13', '2022-01-02 11:33:13'),
(26, 60, 'S.URIC ACID', '3.2-7.0', 'mg/dl', 0, '2022-01-02 11:35:42', '2022-01-02 11:35:42'),
(27, 173, 'PSA(Quantitative)', 'Male : 0-1 Years=0.2.5 10+Years=1-15', 'ng/ml   ng/ml', 1, '2022-01-02 11:48:40', '2022-01-02 11:49:54'),
(28, 173, 'Prostate Specific Antigen (PSA)', '< 4.00', NULL, 0, '2022-01-02 11:51:01', '2022-01-02 11:51:01'),
(29, 39, 'E.S.R', 'Men: 0-10 ; Women 0-15', 'mm', 0, '2022-01-03 22:59:26', '2022-01-03 22:59:26'),
(30, 39, 'HAEMOGLOBIN', 'Men: 13-18  Women 11.5-16.5', 'gm/dl', 0, '2022-01-03 22:59:26', '2022-01-03 22:59:26'),
(31, 39, 'White Blood Cell  (WBC)', '5,000-11,000', '/cmm', 0, '2022-01-03 22:59:26', '2022-01-03 22:59:26'),
(32, 39, 'Platelets Count (PC)', '1,50,000-3,50,000', '/cmm', 0, '2022-01-03 22:59:26', '2022-01-03 22:59:26'),
(33, 39, 'Red Blood Cell (RBC)', 'M: 4.5-5.5 F: 3.8-5.5', 'Million /cm m', 0, '2022-01-03 22:59:26', '2022-01-03 22:59:26'),
(34, 39, 'Circulating Eosinophils', '240-400', '/cmm', 0, '2022-01-03 22:59:26', '2022-01-03 22:59:26'),
(35, 39, 'Neutrophils', '50-70  %', '%', 0, '2022-01-03 22:59:26', '2022-01-03 22:59:26'),
(36, 39, 'Lymphocytes', '20-40  %', '%', 0, '2022-01-03 22:59:26', '2022-01-03 22:59:26'),
(37, 39, 'Monocytes', '0  -08  %', '%', 0, '2022-01-03 22:59:26', '2022-01-03 22:59:26'),
(38, 39, 'Eosinophils', '0  -06  %', '%', 0, '2022-01-03 22:59:26', '2022-01-03 22:59:26'),
(39, 39, 'Basophils', '0  -06  %', '%', 0, '2022-01-03 22:59:26', '2022-01-03 22:59:26'),
(40, 43, 'Circulating Eosinophils', '240-400', '/cmm', 0, '2022-01-03 23:01:59', '2022-01-03 23:01:59'),
(41, 148, 'Skin Scraping For Fungus', NULL, NULL, 0, '2022-01-03 23:06:55', '2022-01-03 23:06:55'),
(42, 392, 'Dengue  (ICT Method)', NULL, 'NEGATIVE', 0, '2022-01-03 23:11:40', '2022-01-03 23:11:40'),
(43, 41, 'Malaria Parasite  (ICT Method)', 'NEGATIVE', NULL, 0, '2022-01-03 23:13:54', '2022-01-03 23:13:54'),
(44, 30, 'HAEMOGLOBIN', 'Men: 13-18  Women 11.5-16.5', 'gm/dl', 0, '2022-01-03 23:16:53', '2022-01-03 23:16:53'),
(45, 186, 'Urine R/E', NULL, NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(46, 186, 'COLOR', 'Straw', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(47, 186, 'APPEARANCE', 'Clear', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(48, 186, 'SEDIMENT', 'Not Asked', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(49, 186, 'SPACIFIC GRAVITY', 'Not Asked', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(50, 186, 'REACTION', 'Acidic', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(51, 186, 'EXCESS OF PHOSPHATE', 'NIL', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(52, 186, 'ALBUMIN', 'Nil', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(53, 186, 'SUGAER', 'Nil', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(54, 186, 'ACETONE', 'Not done', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(55, 186, 'BILE SALTS', 'Not done', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(56, 186, 'EPITHELIAL CELLS', '00-02/ HPF', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(57, 186, 'PUS CELLS', '01-02/HPF', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(58, 186, 'RBC', 'Not found', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(59, 186, 'Amor Phosphate Crystal', 'Not found', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(60, 186, 'Cystine  Crystals', 'Not found', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(61, 186, 'Calcium Oxalate', 'Not found', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(62, 186, 'Spermatozoa', 'Not found', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(63, 186, 'Granular Cast', 'Not found', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(64, 186, 'Spermatozoa', 'Not found', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(65, 186, 'Granular Cast', 'Not found', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(66, 186, 'Yeast Cell', 'Not found', NULL, 0, '2022-01-05 18:12:31', '2022-01-05 18:12:31'),
(67, 95, 'WIDAL TEST', NULL, NULL, 0, '2022-01-05 18:20:11', '2022-01-05 18:20:11'),
(68, 95, 'LESS THAN', '1:80', NULL, 0, '2022-01-05 18:20:11', '2022-01-05 18:20:11'),
(69, 95, 'LESS THAN', '1:80', NULL, 0, '2022-01-05 18:20:11', '2022-01-05 18:20:11'),
(70, 95, 'LESS THAN', '1:80', NULL, 0, '2022-01-05 18:20:11', '2022-01-05 18:20:11'),
(71, 95, 'LESS THAN', '1:80', NULL, 0, '2022-01-05 18:20:11', '2022-01-05 18:20:11'),
(72, 165, 'FSH', 'Female', NULL, 0, '2022-01-05 18:28:29', '2022-01-05 18:28:29'),
(73, 165, 'Follicular Phase', ': 3.85  - 8.78', 'mIU/ml', 0, '2022-01-05 18:28:29', '2022-01-05 18:28:29'),
(74, 165, 'Midcycle', ': 4.54-22.51', 'mIU/ml', 0, '2022-01-05 18:28:29', '2022-01-05 18:28:29'),
(75, 165, 'Lateral Phase', ':  1.79-5.12', 'mIU/ml', 0, '2022-01-05 18:28:29', '2022-01-05 18:28:29'),
(76, 165, 'Postmenopausal', '16.74-113.59', 'mIU/ml', 0, '2022-01-05 18:28:29', '2022-01-05 18:28:29'),
(77, 92, 'TO', '1:80', 'Agglutination', 0, '2022-01-05 18:40:58', '2022-01-05 18:40:58'),
(78, 92, 'TH', '1:80', 'Agglutination', 0, '2022-01-05 18:40:58', '2022-01-05 18:40:58'),
(79, 92, 'AH', '1:80', 'Agglutination', 0, '2022-01-05 18:40:58', '2022-01-05 18:40:58'),
(80, 92, 'BH', '1:80', 'Agglutination', 0, '2022-01-05 18:40:58', '2022-01-05 18:40:58'),
(81, 92, 'OXK', '1:80', 'Agglutination', 0, '2022-01-05 18:40:58', '2022-01-05 18:40:58'),
(82, 92, 'OX2', '1:80', 'Agglutination', 0, '2022-01-05 18:40:58', '2022-01-05 18:40:58'),
(83, 92, 'OX19', '1:80', 'Agglutination', 0, '2022-01-05 18:40:58', '2022-01-05 18:40:58'),
(84, 92, 'Brucella Abortus', '1:80', 'Agglutination', 0, '2022-01-05 18:40:58', '2022-01-05 18:40:58'),
(85, 92, 'Brucella Malitensis', '1:80', 'Agglutination', 0, '2022-01-05 18:40:58', '2022-01-05 18:40:58'),
(86, 94, 'T.P.H.A', NULL, NULL, 0, '2022-01-05 18:43:11', '2022-01-05 18:43:11'),
(87, 93, 'V.D.R.L', NULL, NULL, 0, '2022-01-05 18:43:49', '2022-01-05 18:43:49'),
(88, 69, 'SGPT', '< 45', 'U/L', 0, '2022-01-05 19:59:13', '2022-01-05 19:59:13'),
(89, 68, 'SGOT', '< 45', 'U/L', 0, '2022-01-05 20:01:07', '2022-01-05 20:01:07'),
(90, 56, 'S.UREA', '30-45', 'mg/dl', 0, '2022-01-05 20:03:55', '2022-01-05 20:03:55'),
(91, 148, 'Skin  scraping for fungus (Microscopy,10%KOH Method)', NULL, NULL, 0, '2022-01-06 17:35:30', '2022-01-06 17:35:30'),
(92, 147, 'Semen', NULL, NULL, 0, '2022-01-06 17:44:54', '2022-01-06 17:44:54'),
(93, 147, 'Volume about', '2.2', 'ml', 0, '2022-01-06 17:44:54', '2022-01-06 17:44:54'),
(94, 147, 'Reaction', 'Alkaline', NULL, 0, '2022-01-06 17:44:54', '2022-01-06 17:44:54'),
(95, 147, 'Color', 'Opaque-white', NULL, 0, '2022-01-06 17:44:54', '2022-01-06 17:44:54'),
(96, 147, 'Consistence', 'Mucoid', NULL, 0, '2022-01-06 17:44:54', '2022-01-06 17:44:54'),
(97, 147, 'Total sperm count', '55', 'million/ml', 0, '2022-01-06 17:44:54', '2022-01-06 17:44:54'),
(98, 147, 'Motility:', '62 %', NULL, 0, '2022-01-06 17:44:54', '2022-01-06 17:44:54'),
(99, 147, 'Actively motile', '54 %', NULL, 0, '2022-01-06 17:44:54', '2022-01-06 17:44:54'),
(100, 147, 'Weakly motile', '18 %', NULL, 0, '2022-01-06 17:44:54', '2022-01-06 17:44:54'),
(101, 147, 'Non motile', '28 %', NULL, 0, '2022-01-06 17:44:54', '2022-01-06 17:44:54'),
(102, 147, 'Morphology', ':-  76 % sperm are normal in structure                        (Head, Neck & Tails are within normal limit).', NULL, 0, '2022-01-06 17:44:54', '2022-01-06 17:44:54'),
(103, 147, 'Epithelial cells', '06-07/ HPF', NULL, 0, '2022-01-06 17:44:54', '2022-01-06 17:44:54'),
(104, 147, 'Pus cells', '05-07/ HPF', NULL, 0, '2022-01-06 17:44:54', '2022-01-06 17:44:54'),
(105, 147, 'RBC', 'Nil', NULL, 0, '2022-01-06 17:44:54', '2022-01-06 17:44:54'),
(106, 147, 'Others', 'Not found', NULL, 0, '2022-01-06 17:44:54', '2022-01-06 17:44:54'),
(107, 75, 'T. Protein', NULL, NULL, 0, '2022-01-11 07:25:49', '2022-01-11 07:25:49'),
(108, 75, '(Adult) :-', '6.6  - 8.7', 'g/dl', 1, '2022-01-11 07:25:49', '2022-01-11 07:26:04'),
(109, 75, '( Up to 6 years) :-', '5.6 - 8.6', 'g/dl', 0, '2022-01-11 07:25:49', '2022-01-11 07:25:49'),
(110, 75, '(Neonates) :-', '5.3-8.9', 'g/dl', 0, '2022-01-11 07:25:49', '2022-01-11 07:25:49'),
(111, 61, 'Lipid Profile', NULL, NULL, 0, '2022-01-12 07:20:14', '2022-01-12 07:20:14'),
(112, 61, 'S-CHOLESTEROL', '<200', 'mg/dl.', 0, '2022-01-12 07:20:14', '2022-01-12 07:20:14'),
(113, 61, 'S-HDL CHOLESTEROL', '>45', 'mg/dl.', 0, '2022-01-12 07:20:14', '2022-01-12 07:20:14'),
(114, 61, 'S-LDL-CHOLESTEROL', '<150', 'mg/dl.', 0, '2022-01-12 07:20:14', '2022-01-12 07:20:14'),
(115, 61, 'S-TRIGLYCERIDE', '<200', 'mg/dl.', 0, '2022-01-12 07:20:14', '2022-01-12 07:20:14'),
(116, 164, 'LH', NULL, NULL, 0, '2022-01-12 07:40:06', '2022-01-12 07:40:06'),
(117, 164, 'Male', ': 0.70-7.4', 'mIU/mL', 0, '2022-01-12 07:40:06', '2022-01-12 07:40:06'),
(118, 164, 'Female', NULL, NULL, 0, '2022-01-12 07:40:06', '2022-01-12 07:40:06'),
(119, 164, 'Follicular Phase', ':  0.5  - 10.5', 'mIU/ml', 0, '2022-01-12 07:40:06', '2022-01-12 07:40:06'),
(120, 164, 'Midcycle', ':  18.4-61.2', 'mIU/ml', 0, '2022-01-12 07:40:06', '2022-01-12 07:40:06'),
(121, 164, 'Lateral Phase', ':  0.5-10.5', 'mIU/ml', 0, '2022-01-12 07:40:06', '2022-01-12 07:40:06'),
(122, 164, 'Postmenopausal', ':  8.2-40.8', 'mIU/ml', 0, '2022-01-12 07:40:06', '2022-01-12 07:40:06'),
(123, 67, 'S-BILIRUBIN', '0.2-1.1', 'mg/dl', 0, '2022-01-12 07:41:48', '2022-01-12 07:41:48'),
(124, 45, 'b', '3', 'm', 0, '2023-10-07 09:19:55', '2023-10-07 09:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `patientbooks`
--

CREATE TABLE `patientbooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patientfinalhisabs`
--

CREATE TABLE `patientfinalhisabs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `gross_amount` double(14,2) DEFAULT NULL,
  `receiveable_amount` double(14,2) DEFAULT NULL,
  `total_discount` double(14,2) DEFAULT NULL,
  `total_due` double(14,2) DEFAULT NULL,
  `refund` double(14,2) DEFAULT NULL,
  `total_Commission` double(14,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patientfinalhisabs`
--

INSERT INTO `patientfinalhisabs` (`id`, `user_id`, `patient_id`, `gross_amount`, `receiveable_amount`, `total_discount`, `total_due`, `refund`, `total_Commission`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 2000.00, 1500.00, 500.00, 500.00, 0.00, 0.00, '2023-02-06 15:14:25', '2024-01-11 09:53:23'),
(2, 1, 9, 20800.00, 20800.00, 0.00, 20800.00, 0.00, 0.00, '2023-02-06 17:07:06', '2023-02-06 17:07:06'),
(3, 1, 10, 21500.00, 21500.00, 0.00, 19900.00, 0.00, 0.00, '2023-02-06 17:17:16', '2024-01-11 10:53:28'),
(4, 1, 15, 19400.00, 19400.00, 0.00, 18900.00, 0.00, 0.00, '2023-02-18 14:53:55', '2023-02-18 14:53:55'),
(5, 1, 13, 24300.00, 24300.00, 0.00, 24300.00, 0.00, 0.00, '2023-02-18 16:52:46', '2023-02-18 16:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guardian_name_rel` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `diagnosisfor` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `due` double NOT NULL DEFAULT 0,
  `dena` double NOT NULL DEFAULT 0,
  `cabinerate` double NOT NULL DEFAULT 0,
  `long_term_installment` double NOT NULL DEFAULT 0,
  `booking_status` tinyint(4) NOT NULL DEFAULT 0,
  `patientbook_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agentdetail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `refdoc_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cabinelist_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cabinetransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cabineserial` varchar(255) DEFAULT NULL,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `guardian_name_rel`, `mobile`, `address`, `diagnosisfor`, `age`, `sex`, `due`, `dena`, `cabinerate`, `long_term_installment`, `booking_status`, `patientbook_id`, `agentdetail_id`, `image`, `doctor_id`, `refdoc_id`, `cabinelist_id`, `cabinetransaction_id`, `cabineserial`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, 'External customer', NULL, 'Ex', 'Ex', NULL, 'Ex', 'Ex', 219010.54539, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2024-04-28 07:49:11'),
(4, 'Hasan Mahmud', NULL, '017123567', 'Dhaka', NULL, '30', 'Male', 14800, 4050, 0, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-01-22 17:27:05', '2023-10-07 06:29:52'),
(5, 'Abdullah Bin Yusuf', NULL, '0171236778', 'Dhaka', NULL, '28', 'Male', 9677, 0, 0, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-01-22 17:30:44', '2023-02-20 10:11:42'),
(6, 'Aminur Rahman', 'Hasan Ahmed', '0129876543', 'Khulna', 'Diarreha', '30', 'Male', 600, 1999, 2700, 0, 0, NULL, NULL, NULL, NULL, 26, 2, NULL, '201', 1, '2023-01-23 17:42:08', '2023-02-06 17:50:04'),
(7, 'Abrur rahman', 'b', '0171234567e', 'Sathkhirae', 'b', '10e', 'Malee', 5857, 5410, 2000, 0, 1, NULL, NULL, NULL, NULL, 45, 28, 2, '209', 0, '2023-02-05 15:17:28', '2024-04-15 11:23:19'),
(8, 'Konika Chatarje', 'hasan', '01919183737', 'Banani, Dhaka', 'H', '23', 'Female', 1900, 0, 2000, 0, 2, NULL, NULL, NULL, NULL, 45, 27, 3, '211', 0, '2023-02-06 15:13:31', '2024-01-11 09:53:23'),
(9, 'kamal Hossain', 'bd', '0198374829', 'Comilla', 'H', '33', 'Male', 0, 0, 2700, 0, 2, NULL, NULL, NULL, NULL, 45, 5, 5, '212', 0, '2023-02-06 17:00:18', '2023-02-12 18:26:04'),
(10, 'Abdul Jabbar', 'b', '0177445929', 'Gulshan, Dhaka', 'H', '50', 'Male', -200, 0, 2000, 0, 2, NULL, NULL, NULL, NULL, 45, 27, 7, '211', 0, '2023-02-06 17:15:37', '2024-03-30 14:35:28'),
(11, 'Krishna Rani', 'a', '0188438488', 'Daultapur, Khulna', 'a', '50', 'Female', 10, 0, 2000, 0, 1, NULL, NULL, NULL, NULL, 45, 27, 8, '211', 0, '2023-02-06 17:32:41', '2024-04-07 18:49:01'),
(12, 'Rokeya Khatun', 'm', '01718893772', 'Manirampur, Jessore', 'm', '40', 'Female', 0, 0.5, 2700, 0, 1, NULL, NULL, NULL, NULL, 45, 2, 9, '201', 0, '2023-02-06 17:51:53', '2024-04-03 07:21:52'),
(13, 'Abul kalam', 'Dhaka', '01884467890', 'Jhenaidah Sadar, Jhenidah', 'Health', '30', 'Male', 0, 0, 2700, 0, 2, NULL, NULL, NULL, NULL, 45, 5, 10, '212', 0, '2023-02-10 11:03:47', '2023-02-18 16:52:46'),
(14, 'Amanullah ahmed', NULL, '01712357896', 'Dhaka', NULL, '33', 'Male', 2500, 0, 0, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-02-10 14:03:48', '2023-02-12 18:21:06'),
(15, 'Hamza bin Yusuf', 'b', '0191967789', 'Paikgacha, Khulna', 'H', '40', 'Male', 0, 0, 2700, 0, 2, NULL, NULL, NULL, NULL, 45, 3, 11, '202', 0, '2023-02-11 19:30:31', '2023-02-18 14:53:54'),
(16, 'Sadekur Rahman', NULL, '01919155667', 'Dhaka', NULL, '30', 'Male', 3000, 0, 0, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-02-12 18:18:39', '2023-02-12 18:20:06'),
(17, 'Abdul Sala,', 'Abul Kalam', '011919', 'Khulna', 'Helath', '30', 'M', 0, 4600, 2700, 0, 1, NULL, NULL, NULL, NULL, 45, 6, 12, '213', 0, '2023-02-19 11:47:41', '2024-04-03 08:10:31'),
(18, 'Abdullah Al Sharif', 'hasan', '01929292', 'BD', 'Health', '40', 'M', 5000, 0, 2700, 0, 0, NULL, NULL, NULL, NULL, 56, 3, NULL, '202', 1, '2023-02-23 16:10:38', '2023-02-23 16:11:36'),
(19, 'Hasan Sabah', 'Hasan Sharif', '0192292992', 'Dhaka', 'Health', '30', 'M', 0, 3500, 1700, 0, 1, NULL, NULL, NULL, NULL, 56, 12, 25, 'G/B Male-01', 0, '2023-02-23 16:12:20', '2024-03-01 12:44:31'),
(20, 'Abdul Qadir', 'Hasan', '0191919', 'BD', 'Health', '30', 'M', 1430, 0, 2700, 0, 1, NULL, NULL, NULL, NULL, 45, 5, 15, '212', 0, '2023-02-24 11:49:08', '2023-02-25 08:54:29'),
(21, 'Asif Haider', 'has', '011919', 'BD', 'Health', '20', 'Male', 200, 0, 2700, 0, 1, NULL, NULL, NULL, NULL, 45, 7, 16, '301', 0, '2023-02-25 09:04:28', '2023-07-09 17:06:41'),
(22, 'Saleh', 'hasan', '019191', 'bd', 'Health', '30', 'M', 500, 0, 2700, 0, 1, NULL, NULL, NULL, NULL, 45, 8, 17, '302', 0, '2023-04-10 16:32:33', '2023-04-10 16:32:33'),
(23, 'jasim', 'hasan', '01919191', 'bd', 'health', '30', 'm', 0, 0, 1700, 0, 1, NULL, NULL, NULL, NULL, 17, 17, 18, 'G/B Female-01', 0, '2024-01-08 10:56:55', '2024-01-08 11:40:35'),
(24, 'asad', NULL, '09865', 'bd', NULL, '87', 'm', 400, 0, 0, 0, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-01-08 12:34:28', '2024-01-08 12:34:28'),
(25, 'samsu', 'hsn', '987666', 'bd', 'health', '67', 'm', 200, 0, 3500, 0, 1, NULL, NULL, NULL, NULL, 45, 9, 19, '303', 0, '2024-01-09 09:59:56', '2024-01-15 13:30:45'),
(26, 'hasan', 'sabir', '099888', 'bd', 'h', '40', 'm', 0, 0, 2700, 0, 1, NULL, NULL, NULL, NULL, 45, 10, 20, '308', 0, '2024-01-09 10:22:33', '2024-01-09 19:15:59'),
(27, 'jubayer', 'k', '9776', 'bd', 'health', '21', 'm', 0, 0, 2700, 0, 1, NULL, NULL, NULL, NULL, 45, 11, 21, '309', 0, '2024-01-09 19:18:43', '2024-01-09 19:27:44'),
(28, 'Habib', 'Haan', '0191919', 'BD', 'Health', '30', 'M', 0, 0, 1700, 0, 1, NULL, NULL, NULL, NULL, 45, 18, 22, 'G/B Female-02', 0, '2024-01-11 09:59:04', '2024-01-11 10:00:19'),
(29, 'kamrul', 'hasan', '01992228', 'bd', 'health', '21', 'm', 0, 5001, 1700, 0, 1, NULL, NULL, NULL, NULL, 45, 19, 23, 'G/B Female-03', 0, '2024-03-01 10:37:33', '2024-03-01 12:52:48'),
(30, 'Mahmud', 'hasan', '9', 'BD', 'h', '9', 'm', 38, 501, 1700, 0, 1, NULL, NULL, NULL, NULL, 45, 20, 24, 'G/B Female-04', 0, '2024-03-01 11:01:57', '2024-03-09 13:01:28'),
(31, 'Abdus Samad', 'hasan', '019292929', 'bd', 'H', '23', 'M', 0, 1091, 2700, 0, 1, NULL, NULL, NULL, NULL, 56, 3, 26, '202', 0, '2024-03-02 13:08:45', '2024-04-07 06:01:35'),
(32, 'Test Patient', 'h', '0111', 'BD', 'H', '30', 'M', 67, 201, 1700, 0, 1, NULL, NULL, NULL, NULL, 45, 13, 27, 'G/B Male-02', 0, '2024-03-03 12:15:23', '2024-04-07 08:18:04'),
(33, 'ruhin', NULL, '01890024840', 'moulvibazer', NULL, '20', 'male', 400, 0, 0, 0, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-03-17 06:09:35', '2024-03-17 09:10:19'),
(34, 'rafi', NULL, 'dfdsfdsf', 'dfsdfds', NULL, 'dsfds', 'sdfd', 800, 0, 0, 0, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-03-17 18:28:52', '2024-03-17 19:21:31'),
(35, 'Krishna Rani', NULL, '0188438488', 'Daultapur, Khulna', NULL, '50', 'Female', 0, 0, 0, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-03-30 19:07:45', '2024-03-30 19:21:45'),
(36, 'Abrur rahman', NULL, '0171234567e', 'Sathkhirae', NULL, '10e', 'Malee', 0, 0, 0, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-03-30 19:21:23', '2024-03-30 19:21:40'),
(37, 'Abrur rahman', NULL, '0171234567e', 'Sathkhirae', NULL, '10e', 'Malee', 1300, 0, 0, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-03-30 19:23:00', '2024-03-30 19:23:00'),
(38, 'Krishna Rani', NULL, '0188438488', 'Daultapur, Khulna', NULL, '50', 'Female', 0, 0, 0, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-03-30 19:26:07', '2024-04-03 06:36:11'),
(39, 'Krishna Rani', NULL, '0188438488', 'Daultapur, Khulna', NULL, '50', 'Female', 0, 0, 0, 0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-03-30 19:33:13', '2024-04-03 06:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(5, 'ignition.healthCheck', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(6, 'ignition.executeSolution', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(7, 'ignition.shareReport', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(8, 'ignition.scripts', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(9, 'ignition.styles', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(10, 'log-viewer.hosts', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(11, 'log-viewer.folders', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(12, 'log-viewer.folders.request-download', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(13, 'log-viewer.folders.clear-cache', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(14, 'log-viewer.folders.delete', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(15, 'log-viewer.files', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(16, 'log-viewer.files.request-download', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(17, 'log-viewer.files.clear-cache', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(18, 'log-viewer.files.delete', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(19, 'log-viewer.files.clear-cache-all', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(20, 'log-viewer.files.delete-multiple-files', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(21, 'log-viewer.logs', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(22, 'log-viewer.folders.download', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(23, 'log-viewer.files.download', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(24, 'log-viewer.index', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(25, 'welcome', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(26, 'login', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(27, 'logout', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(28, 'password.request', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(29, 'password.email', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(30, 'password.reset', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(31, 'password.update', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(32, 'password.confirm', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(33, 'deleteduser.dashboard', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(34, 'reagent.delete', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(35, 'reagent.update', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(36, 'reagent.store', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(37, 'reagent.edit', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(38, 'reagent.index', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(39, 'finalreport.patient_cash_get', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(40, 'finalreport.patient_cash_fetch', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(41, 'pathologyreportmaking.dropdownfortest', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(42, 'pathologyreportmaking.dropdown_list', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(43, 'pathologyreportmaking.pdf', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(44, 'findreportforhandoverreport', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(45, 'pathologyreportmaking.showreport', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(46, 'pathologyreportmaking.deliever', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(47, 'pathologyreportmaking.showreportforspecific', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(48, 'pathologyreportmaking.showreportforspecificid', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(49, 'pathologyreportmaking.fetchpatientorder', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(50, 'pathologyreportmaking.index', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(51, 'pathologyreportmaking.create', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(52, 'pathologyreportmaking.store', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(53, 'pathologyreportmaking.show', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(54, 'pathologyreportmaking.edit', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(55, 'pathologyreportmaking.update', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(56, 'pathologyreportmaking.destroy', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(57, 'reagentransaction.delete', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(58, 'reagentransaction.store', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(59, 'reagentransaction.pdf', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(60, 'reagentransaction.dropdown_list', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(61, 'reagentransaction.index', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(62, 'reportlist.reagent.list', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(63, 'reportlist.index', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(64, 'reportlist.create', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(65, 'reportlist.store', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(66, 'reportlist.show', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(67, 'reportlist.edit', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(68, 'reportlist.update', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(69, 'reportlist.destroy', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(70, 'pathologytestcomponent.mlist', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(71, 'pathologytestcomponent.index', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(72, 'pathologytestcomponent.create', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(73, 'pathologytestcomponent.store', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(74, 'pathologytestcomponent.show', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(75, 'pathologytestcomponent.edit', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(76, 'pathologytestcomponent.update', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(77, 'pathologytestcomponent.destroy', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(78, 'pathology.testcomponent.destroy', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(79, 'phermachy.dashboard', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(80, 'medicinetransition.stock', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(81, 'medicinetransition.fetchtwodate', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(82, 'medicinetransition.datepick', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(83, 'medicinetransition.findmeddue', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(84, 'medicinetransition.mlist', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(85, 'medicinetransition.fetch', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(86, 'medicinetransition.pdf', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(87, 'medicinetransition.index', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(88, 'medicinetransition.create', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(89, 'medicinetransition.store', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(90, 'medicinetransition.show', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(91, 'medicinetransition.edit', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(92, 'medicinetransition.update', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(93, 'medicinetransition.destroy', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(94, 'ReturnmedicinetransactionController.delete', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(95, 'ReturnmedicinetransactionController.pdf', 'web', '2024-04-01 20:39:47', '2024-04-01 20:39:47'),
(96, 'ReturnmedicinetransactionController.mlist', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(97, 'ReturnmedicinetransactionController.fetch', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(98, 'ReturnmedicinetransactionController.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(99, 'ReturnmedicinetransactionController.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(100, 'returnmedicinetransition.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(101, 'returnmedicinetransition.create', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(102, 'returnmedicinetransition.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(103, 'returnmedicinetransition.show', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(104, 'returnmedicinetransition.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(105, 'returnmedicinetransition.update', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(106, 'returnmedicinetransition.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(107, 'medicinecomapny.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(108, 'medicinecomapny.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(109, 'medicinecomapny.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(110, 'medicinecomapnytransition.pdf', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(111, 'medicinecomapnytransition.dropdown_list', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(112, 'medicinecomapnytransition.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(113, 'medicinecomapnytransition.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(114, 'medicinecomapnytransition.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(115, 'medicine.category_list', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(116, 'medicine.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(117, 'medicine.create', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(118, 'medicine.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(119, 'medicine.show', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(120, 'medicine.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(121, 'medicine.update', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(122, 'medicine.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(123, 'medicinecategory.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(124, 'medicinecategory.create', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(125, 'medicinecategory.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(126, 'medicinecategory.show', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(127, 'medicinecategory.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(128, 'medicinecategory.update', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(129, 'medicinecategory.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(130, 'duecolletionphermachy.pdf', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(131, 'duecolletionphermachy.duetransforphermachy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(132, 'duecolletionphermachy.stilldueout', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(133, 'duecolletionphermachy.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(134, 'duecolletionphermachy.create', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(135, 'duecolletionphermachy.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(136, 'duecolletionphermachy.show', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(137, 'duecolletionphermachy.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(138, 'duecolletionphermachy.update', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(139, 'duecolletionphermachy.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(140, 'due.colletion.phermachy.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(141, 'duecollection_inddor.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(142, 'duecollection_inddor.create', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(143, 'duecollection_inddor.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(144, 'duecollection_inddor.show', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(145, 'duecollection_inddor.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(146, 'duecollection_inddor.update', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(147, 'duecollection_inddor.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(148, 'due.collection_inddor.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(149, 'account.dashboard', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(150, 'doctorcommission.paidfordoctor', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(151, 'doctorcommission.paidsenddata', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(152, 'doctorcommission.pdf', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(153, 'doctorcommission.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(154, 'doctorcommission.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(155, 'doctorcommission.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(156, 'pathologytestfromother.mlist', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(157, 'pathologytestfromother.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(158, 'pathologytestfromother.create', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(159, 'pathologytestfromother.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(160, 'pathologytestfromother.show', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(161, 'pathologytestfromother.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(162, 'pathologytestfromother.update', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(163, 'pathologytestfromother.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(164, 'pathology.test.from.other.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(165, 'duepaymenttrans.select', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(166, 'duepaymenttrans.selectfetchuser', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(167, 'duepaymenttrans.date', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(168, 'duepaymenttrans.fetchdate', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(169, 'duepaymenttrans.stilldueout', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(170, 'duepaymenttrans.pdf', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(171, 'duepaymenttrans.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(172, 'duepaymenttrans.create', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(173, 'duepaymenttrans.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(174, 'duepaymenttrans.show', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(175, 'duepaymenttrans.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(176, 'duepaymenttrans.update', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(177, 'duepaymenttrans.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(178, 'cabinetransfer.dropdown_list', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(179, 'cabinetransfer.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(180, 'cabinetransfer.create', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(181, 'cabinetransfer.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(182, 'cabinetransfer.show', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(183, 'cabinetransfer.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(184, 'cabinetransfer.update', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(185, 'cabinetransfer.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(186, 'cabine.transfer.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(187, 'advancedeposit.pdfprint', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(188, 'advancedeposit.dropdown_list', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(189, 'advancedeposit.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(190, 'advancedeposit.create', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(191, 'advancedeposit.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(192, 'advancedeposit.show', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(193, 'advancedeposit.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(194, 'advancedeposit.update', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(195, 'advancedeposit.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(196, 'finalreport.showalldue', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(197, 'finalreport.pdfbill', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(198, 'finalreport.pdf', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(199, 'finalreport.paydue', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(200, 'doctorlist.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(201, 'finalreport.allduepay', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(202, 'finalreport.pdfformreport', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(203, 'finalreport.duepayment_delete', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(204, 'finalreport.duepayment', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(205, 'finalreport.duepayment_patient', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(206, 'finalreport.dueadjustmentbeforerelease', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(207, 'finalreport.outdoor', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(208, 'finalreport.releasedindoor', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(209, 'finalreport.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(210, 'finalreport.create', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(211, 'finalreport.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(212, 'finalreport.show', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(213, 'finalreport.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(214, 'finalreport.update', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(215, 'finalreport.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(216, 'prescription.printprescription', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(217, 'cabinefees.pdf', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(218, 'cabinefees.dropdown_list', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(219, 'cabinefees.fetchinformation', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(220, 'cabinefees.cabinefees_due_pre', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(221, 'cabinefees.trans', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(222, 'cabinefees.pay', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(223, 'cabinefees.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(224, 'cabinefees.create', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(225, 'cabinefees.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(226, 'cabinefees.show', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(227, 'cabinefees.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(228, 'cabinefees.update', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(229, 'cabinefees.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(230, 'final.report.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(231, 'khorochtransition.list', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(232, 'khorochtransition.listfetch', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(233, 'khorochtransition.sompod_pdf', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(234, 'khorochtransition.dropdown_list', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(235, 'khorochtransition.store_sompod', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(236, 'khorochtransition.sompod', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(237, 'khorochtransition.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(238, 'khorochtransition.create', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(239, 'khorochtransition.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(240, 'khorochtransition.show', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(241, 'khorochtransition.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(242, 'khorochtransition.update', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(243, 'khorochtransition.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(244, 'supplier.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(245, 'supplier.create', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(246, 'supplier.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(247, 'supplier.show', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(248, 'supplier.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(249, 'supplier.update', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(250, 'supplier.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(251, 'prescription.doctorregiserforprescriptionpost', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(252, 'prescription.doctorregiserforprescription', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(253, 'khorocer_khad.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(254, 'khorocer_khad.create', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(255, 'khorocer_khad.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(256, 'khorocer_khad.show', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(257, 'khorocer_khad.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(258, 'khorocer_khad.update', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(259, 'khorocer_khad.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(260, 'agentlist.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(261, 'agentlist.create', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(262, 'agentlist.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(263, 'agentlist.show', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(264, 'agentlist.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(265, 'agentlist.update', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(266, 'agentlist.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(267, 'doctorlist.create', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(268, 'doctorlist.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(269, 'doctorlist.show', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(270, 'doctorlist.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(271, 'doctorlist.update', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(272, 'doctorlist.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(273, 'employeelist.index', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(274, 'employeelist.create', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(275, 'employeelist.store', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(276, 'employeelist.show', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(277, 'employeelist.edit', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(278, 'employeelist.update', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(279, 'employeelist.destroy', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(280, 'dentalservice.fetchpatorder', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(281, 'dentalservice.installment', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(282, 'dentalservice.Paitent_unfini', 'web', '2024-04-01 20:39:48', '2024-04-01 20:39:48'),
(283, 'dentalservicecontroller.unfinished', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(284, 'dentalservice.patientlist', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(285, 'dentalservice.dropdown_list', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(286, 'dentalservice.pdf', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(287, 'dentalservice.index', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(288, 'dentalservice.create', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(289, 'dentalservice.store', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(290, 'dentalservice.show', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(291, 'dentalservice.edit', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(292, 'dentalservice.update', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(293, 'dentalservice.destroy', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(294, 'doctortransition.doctorincome', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(295, 'doctortransition.doctorfetch', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(296, 'doctortransition.select', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(297, 'doctortransition.selectfetchuser', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(298, 'doctortransition.selectagent', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(299, 'doctortransition.selectfetchagent', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(300, 'doctortransition.finddoctorpatient', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(301, 'doctortransition.serial', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(302, 'doctortransition.dropdown_list', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(303, 'doctortransition.installment', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(304, 'doctortransition.pdf', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(305, 'doctortransition.index', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(306, 'doctortransition.create', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(307, 'doctortransition.store', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(308, 'doctortransition.show', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(309, 'doctortransition.edit', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(310, 'doctortransition.update', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(311, 'doctortransition.destroy', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(312, 'patientlist.fetcthrecord', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(313, 'patientlist.fetchlist', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(314, 'patientlist.pdf', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(315, 'patientlist.index', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(316, 'patientlist.create', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(317, 'patientlist.store', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(318, 'patientlist.show', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(319, 'patientlist.edit', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(320, 'patientlist.update', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(321, 'patientlist.destroy', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(322, 'reporttransaction.select', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(323, 'reporttransaction.selectfetchuser', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(324, 'reporttransaction.selectrefdoct', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(325, 'reporttransaction.selectfetchrefdoct', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(326, 'reporttransaction.selectagent', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(327, 'reporttransaction.selectfetchagent', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(328, 'reporttransaction.selectfetch', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(329, 'reporttransaction.dailyreport', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(330, 'reporttransaction.pdf', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(331, 'reporttransaction.mlist', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(332, 'reporttransaction.fetch', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(333, 'reporttransaction.refund', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(334, 'reporttransaction.index', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(335, 'reporttransaction.create', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(336, 'reporttransaction.store', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(337, 'reporttransaction.show', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(338, 'reporttransaction.edit', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(339, 'reporttransaction.update', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(340, 'reporttransaction.destroy', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(341, 'reporttransaction.edittrans', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(342, 'report.transaction.destroy', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(343, 'doctor.transition.destroy', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(344, 'employeetransactioncon.month_year_pick', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(345, 'employeetransactioncon.month_year_pick_fetch', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(346, 'employeetransactioncon.datepick', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(347, 'employeetransactioncon.employeesalarymonth', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(348, 'employeetransactioncon.employeeshow', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(349, 'employeetransactioncon.employeesalaryfetch', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(350, 'employeetransactioncon.dropdown_list', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(351, 'employeetransactioncon.index', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(352, 'employeetransactioncon.create', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(353, 'employeetransactioncon.store', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(354, 'employeetransactioncon.show', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(355, 'employeetransactioncon.edit', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(356, 'employeetransactioncon.update', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(357, 'employeetransactioncon.destroy', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(358, 'agenttransaction.fetchreport', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(359, 'agenttransaction.datepick', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(360, 'agenttransaction.selectagent', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(361, 'agenttransaction.agentfetch', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(362, 'agenttransaction.pdf', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(363, 'agenttransaction.paid', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(364, 'agenttransaction.paidsenddata', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(365, 'agenttransaction.dropdown_list', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(366, 'agenttransaction.index', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(367, 'agenttransaction.create', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(368, 'agenttransaction.store', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(369, 'agenttransaction.show', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(370, 'agenttransaction.edit', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(371, 'agenttransaction.update', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(372, 'agenttransaction.destroy', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(373, 'externalcost.index', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(374, 'externalcost.create', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(375, 'externalcost.store', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(376, 'externalcost.show', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(377, 'externalcost.edit', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(378, 'externalcost.update', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(379, 'externalcost.destroy', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(380, 'user.dashboard', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(381, 'prescription.pdf', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(382, 'prescription.dropdownlist', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(383, 'prescription.index', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(384, 'prescription.create', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(385, 'prescription.store', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(386, 'prescription.show', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(387, 'prescription.edit', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(388, 'prescription.update', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(389, 'prescription.destroy', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(390, 'prescriptionusages.index', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(391, 'prescriptionusages.create', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(392, 'prescriptionusages.store', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(393, 'prescriptionusages.show', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(394, 'prescriptionusages.edit', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(395, 'prescriptionusages.update', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(396, 'prescriptionusages.destroy', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(397, 'prescriptionusagestwo.index', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(398, 'prescriptionusagestwo.create', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(399, 'prescriptionusagestwo.store', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(400, 'prescriptionusagestwo.show', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(401, 'prescriptionusagestwo.edit', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(402, 'prescriptionusagestwo.update', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(403, 'prescriptionusagestwo.destroy', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(404, 'relesepatient', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(405, 'relesepatientdeatilsindividual', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(406, 'cabinelist.index', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(407, 'cabinelist.create', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(408, 'cabinelist.store', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(409, 'cabinelist.show', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(410, 'cabinelist.edit', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(411, 'cabinelist.update', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(412, 'cabinelist.destroy', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(413, 'surgerylist.index', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(414, 'surgerylist.create', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(415, 'surgerylist.store', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(416, 'surgerylist.show', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(417, 'surgerylist.edit', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(418, 'surgerylist.update', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(419, 'surgerylist.destroy', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(420, 'surgerytansition.dropdown_list', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(421, 'surgerytansition.pdf', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(422, 'surgerytansition.index', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(423, 'surgerytansition.create', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(424, 'surgerytansition.store', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(425, 'surgerytansition.show', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(426, 'surgerytansition.edit', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(427, 'surgerytansition.update', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(428, 'surgerytansition.destroy', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(429, 'servicelist.dropdown_list', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(430, 'servicelist.index', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(431, 'servicelist.create', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(432, 'servicelist.store', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(433, 'servicelist.show', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(434, 'servicelist.edit', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(435, 'servicelist.update', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(436, 'servicelist.destroy', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(437, 'servicetranstion.select', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(438, 'servicetranstion.selectfetchuser', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(439, 'servicetranstion.selectrefdoct', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(440, 'servicetranstion.selectfetchrefdoct', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(441, 'servicetranstion.selectagent', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(442, 'servicetranstion.selectfetchagent', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(443, 'servicetranstion.selectfetch', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(444, 'servicetranstion.dailyreport', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(445, 'servicetranstion.pdf', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(446, 'servicetranstion.mlist', 'web', '2024-04-01 20:39:49', '2024-04-01 20:39:49'),
(447, 'servicetranstion.fetch', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(448, 'servicetranstion.storeinsert', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(449, 'servicetranstion.index', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(450, 'servicetranstion.create', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(451, 'servicetranstion.store', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(452, 'servicetranstion.show', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(453, 'servicetranstion.edit', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(454, 'servicetranstion.update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(455, 'servicetranstion.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(456, 'service.transtion.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(457, 'bookingpatient.index', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(458, 'bookingpatient.create', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(459, 'bookingpatient.store', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(460, 'bookingpatient.show', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(461, 'bookingpatient.edit', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(462, 'bookingpatient.update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(463, 'bookingpatient.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(464, 'cabinetransaction.details_of_individual_booking_patient', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(465, 'cabinetransaction.showbookingpatient', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(466, 'cabinetransaction.release_a_patient_from_cabin', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(467, 'cabinetransaction.makecabinebillpdf', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(468, 'cabinetransaction.admitbill', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(469, 'cabinetransaction.dropdown_list', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(470, 'cabinetransaction.index', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(471, 'cabinetransaction.create', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(472, 'cabinetransaction.store', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(473, 'cabinetransaction.show', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(474, 'cabinetransaction.edit', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(475, 'cabinetransaction.update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(476, 'cabinetransaction.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(477, 'supplier_due_advance_pay_or_get.dropdown_list', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(478, 'supplier_due_advance_pay_or_get.index', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(479, 'supplier_due_advance_pay_or_get.transition', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(480, 'supplier_due_advance_pay_or_get.store', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(481, 'supplier_due_advance_pay_or_get.update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(482, 'supplier_due_advance_pay_or_get.delete', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(483, 'medcinercompanydenapawanshod.dropdown_list', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(484, 'medcinercompanydenapawanshod.transition', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(485, 'medcinercompanydenapawanshod.index', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(486, 'medcinercompanydenapawanshod.create', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(487, 'medcinercompanydenapawanshod.store', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(488, 'medcinercompanydenapawanshod.show', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(489, 'medcinercompanydenapawanshod.edit', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(490, 'medcinercompanydenapawanshod.update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(491, 'medcinercompanydenapawanshod.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(492, 'dueofpatient.dueofoutdorpat', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(493, 'dueofpatient.fontpage', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(494, 'dueofpatient.showduetransition', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(495, 'dueofpatient.dueshowoutdor', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(496, 'admin.dashboard', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(497, 'setting.edt', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(498, 'setting', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(499, 'setting.update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(500, 'medicinetransition.editr', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(501, 'medicine.transition.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(502, 'showuserlist.index', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(503, 'showuserlist.create', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(504, 'showuserlist.store', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(505, 'showuserlist.show', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(506, 'showuserlist.edit', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(507, 'showuserlist.update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(508, 'showuserlist.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(509, 'patient.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(510, 'dental.service.update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(511, 'dental.service.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(512, 'surgery.tansition.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(513, 'employee.list.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(514, 'doctor.list.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(515, 'agent.list.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(516, 'cabine.transaction.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(517, 'employee.transactioncon.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(518, 'agent.transaction.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(519, 'external.cost.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(520, 'medciner.company.denapawanshod.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(521, 'supplier.destroy/', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(522, 'khoroch.transition.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(523, 'takauttolon.dropdown_list', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(524, 'takauttolon.index', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(525, 'takauttolon.create', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(526, 'takauttolon.store', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(527, 'takauttolon.show', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(528, 'takauttolon.edit', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(529, 'takauttolon.update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(530, 'takauttolon.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(531, 'medicinecomapny.update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(532, 'medicinecomapny.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(533, 'medicinecomapnytransition.update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(534, 'medicinecomapnytransition.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(535, 'businesspartner.index', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(536, 'businesspartner.create', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(537, 'businesspartner.store', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(538, 'businesspartner.show', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(539, 'businesspartner.edit', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(540, 'businesspartner.update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(541, 'businesspartner.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(542, 'business.partner.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(543, 'joma_uttolon_statement_today', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(544, 'joma_uttolon_statement_yesterday', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(545, 'joma_uttolon_statement_month', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(546, 'joma_uttolon_statement_year', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(547, 'joma_uttolon_statement_lastmonth', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(548, 'outdoordoctortranstion.doctorstatementoday', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(549, 'outdoordoctortranstion.doctorstatementyesterday', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(550, 'outdoordoctortranstion.doctorstatementthismonth', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(551, 'outdoordoctortranstion.doctorstatementthisyear', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(552, 'outdoordoctorbtwtwodate', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(553, 'due.paymenttrans.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(554, 'incomestatementtoday.todaystatment', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(555, 'incomestatementyesterday.incomestatementyesterday', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(556, 'thismonthstatment.thismonthstatment', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(557, 'thisyearstatment.thisyearstatment', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(558, 'incomestatementlastmonth.incomestatementlastmonth', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(559, 'incomestatbtwtwodate', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(560, 'balance', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(561, 'productcompanytrans.dropdownlist', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(562, 'productcompanytrans.index', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(563, 'productcompanytrans.create', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(564, 'productcompanytrans.store', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(565, 'productcompanytrans.show', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(566, 'productcompanytrans.edit', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(567, 'productcompanytrans.update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(568, 'productcompanytrans.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(569, 'product.companytrans.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(570, 'balancesheetforcompany.pdf', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(571, 'balancesheetforcompany.index', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(572, 'balancesheetforcompany.create', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(573, 'balancesheetforcompany.store', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(574, 'balancesheetforcompany.show', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(575, 'balancesheetforcompany.edit', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(576, 'balancesheetforcompany.update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(577, 'balancesheetforcompany.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(578, 'balance.sheetfor.company.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(579, 'virtualtable.index', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(580, 'showmedicne', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(581, 'show.medicne.pdf.print', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(582, 'coshmainstructions.index', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(583, 'coshmainstructions.store', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(584, 'coshma.edit', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(585, 'coshma.update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(586, 'coshma.instructions.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(587, 'coshma.index', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(588, 'coshma.delate', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(589, 'print.coshma.Preection', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(590, 'user.index', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(591, 'user.create', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(592, 'user.store', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(593, 'user.show', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(594, 'user.edit', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(595, 'user.update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(596, 'user.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(597, 'user.password', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(598, 'user.password-update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(599, 'role.index', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(600, 'role.create', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(601, 'role.store', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(602, 'role.show', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(603, 'role.edit', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(604, 'role.update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(605, 'role.destroy', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(606, 'rolePermission.edit', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50'),
(607, 'rolePermission.update', 'web', '2024-04-01 20:39:50', '2024-04-01 20:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptionkhabaragepores`
--

CREATE TABLE `prescriptionkhabaragepores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `khabaragebapore` varchar(255) NOT NULL,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptionkhabaragepores`
--

INSERT INTO `prescriptionkhabaragepores` (`id`, `khabaragebapore`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, 'খাবার আগে', 0, '2023-02-03 13:58:40', '2023-02-03 13:58:40'),
(2, 'খাবার পরে', 0, '2023-02-12 19:36:16', '2023-02-12 19:36:16'),
(3, 'খাবার ১ ঘন্টা আগে', 0, '2023-02-12 19:36:30', '2023-02-12 19:36:30'),
(4, 'খাবার ১ ঘন্টা পরে', 0, '2023-02-12 19:36:39', '2023-02-12 19:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptionmedicinelists`
--

CREATE TABLE `prescriptionmedicinelists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prescription_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_category_id` bigint(20) UNSIGNED NOT NULL,
  `prescriptionusages_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prescriptionkhabaragepore_id` bigint(20) UNSIGNED DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptionmedicinelists`
--

INSERT INTO `prescriptionmedicinelists` (`id`, `prescription_id`, `medicine_id`, `medicine_category_id`, `prescriptionusages_id`, `prescriptionkhabaragepore_id`, `day`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 475, 2, 1, 1, '৭', 'কাকা', '2023-02-03 14:00:37', '2023-02-03 14:00:37'),
(2, 2, 499, 2, 1, 3, '১', 'খালি পেটে সকালে', '2023-02-12 19:41:54', '2023-02-12 19:41:54'),
(3, 2, 556, 3, 2, 1, NULL, 'মাংশে নিতে হবে', '2023-02-12 19:41:54', '2023-02-12 19:41:54'),
(4, 3, 626, 2, 1, 1, '৩', 'খাবার আগে', '2023-05-31 18:14:57', '2023-05-31 18:14:57'),
(5, 3, 424, 16, 2, 2, '২', 'খাবার পরে', '2023-05-31 18:14:57', '2023-05-31 18:14:57'),
(6, 4, 424, 2, 1, 1, '2', 'uyuytyuty', '2024-03-21 07:54:36', '2024-03-21 07:54:36'),
(7, 4, 425, 11, 2, 2, '5', 'jhjgjgjh', '2024-03-21 07:54:36', '2024-03-21 07:54:36'),
(8, 5, 424, 14, 3, 2, '2', 'ghghgf', '2024-03-21 07:57:58', '2024-03-21 07:57:58'),
(9, 5, 626, 2, 1, 2, '5', 'gfhghfg', '2024-03-21 07:57:58', '2024-03-21 07:57:58'),
(10, 6, 424, 16, 2, 1, '3', 'gfdggfd', '2024-03-21 07:58:55', '2024-03-21 07:58:55'),
(11, 7, 424, 11, 1, 1, '5', 'cxvxc', '2024-03-21 08:27:53', '2024-03-21 08:27:53'),
(12, 8, 424, 16, 1, 2, '2', 'gfgfdgfdg', '2024-03-21 08:58:13', '2024-03-21 08:58:13'),
(13, 9, 425, 16, 3, 1, '15', 'comment', '2024-03-21 10:10:27', '2024-03-21 10:10:27'),
(14, 9, 424, 11, 2, 2, '15', 'comment', '2024-03-21 10:10:27', '2024-03-21 10:10:27'),
(15, 9, 424, 14, 2, 2, '15', 'comment', '2024-03-21 10:10:27', '2024-03-21 10:10:27'),
(16, 10, 424, 3, 1, 2, '5', 'cvcxvcxv', '2024-03-21 18:23:20', '2024-03-21 18:23:20'),
(17, 11, 626, 11, 1, 1, '235', 'comment', '2024-03-22 09:45:35', '2024-03-22 09:45:35'),
(18, 12, 475, 3, 3, 3, '20', 'xcvcxvxcv', '2024-03-22 09:48:59', '2024-03-22 09:48:59'),
(19, 13, 475, 11, 2, 3, '5', 'fghfdgfd', '2024-03-22 09:56:08', '2024-03-22 09:56:08'),
(20, 14, 424, 11, 2, 2, '5', 'dfssdf', '2024-03-22 18:08:02', '2024-03-22 18:08:02'),
(21, 15, 424, 16, 1, 2, 'bcvbcvb', 'vcbcvbcv', '2024-03-22 18:09:04', '2024-03-22 18:09:04'),
(22, 16, 424, 2, 2, 2, '5', NULL, '2024-03-22 18:12:26', '2024-03-22 18:12:26'),
(23, 17, 424, 16, 1, 2, '1', '1', '2024-03-22 18:32:34', '2024-03-22 18:32:34'),
(24, 18, 424, 16, 1, 1, '4', '4', '2024-03-22 18:33:37', '2024-03-22 18:33:37'),
(25, 19, 424, 16, 1, 2, '56', 'cvxc', '2024-03-22 18:35:52', '2024-03-22 18:35:52'),
(26, 20, 424, 2, 1, 2, '25', 'xcx', '2024-03-22 18:37:51', '2024-03-22 18:37:51'),
(27, 21, 424, 16, 1, 1, '5', '45', '2024-03-22 18:39:01', '2024-03-22 18:39:01'),
(28, 22, 424, 2, 1, 1, '55', '55', '2024-03-22 18:45:20', '2024-03-22 18:45:20'),
(29, 23, 424, 16, 2, 2, '55', 'jjio', '2024-03-22 18:46:41', '2024-03-22 18:46:41'),
(30, 24, 424, 16, 1, 1, '122', '1212', '2024-03-22 19:00:26', '2024-03-22 19:00:26'),
(31, 25, 424, 2, 1, 1, NULL, NULL, '2024-03-22 19:01:58', '2024-03-22 19:01:58'),
(32, 26, 424, 16, 1, 2, '25', '30', '2024-03-22 19:03:09', '2024-03-22 19:03:09'),
(33, 27, 424, 16, 1, 3, '25', 'cxvcxv', '2024-03-22 19:06:12', '2024-03-22 19:06:12'),
(34, 28, 424, 16, 1, 1, NULL, NULL, '2024-03-22 19:08:32', '2024-03-22 19:08:32'),
(35, 29, 424, 11, 2, 2, '552', 'gfdg', '2024-03-22 19:09:32', '2024-03-22 19:09:32'),
(36, 30, 626, 16, 1, 1, '50', 'xczx', '2024-03-22 19:12:36', '2024-03-22 19:12:36'),
(37, 31, 475, 16, 1, 2, 'cvxc', 'cvx', '2024-03-22 19:13:57', '2024-03-22 19:13:57'),
(38, 32, 626, 16, 1, 1, '20', 'vcbc', '2024-03-22 19:14:52', '2024-03-22 19:14:52'),
(39, 33, 424, 11, 1, 1, '56', 'fgfdg', '2024-03-22 19:15:57', '2024-03-22 19:15:57'),
(40, 34, 424, 16, 2, 2, '45', '4545', '2024-03-22 19:19:24', '2024-03-22 19:19:24'),
(41, 35, 425, 16, 2, 3, '25', 'fgdfg', '2024-03-23 08:34:59', '2024-03-23 08:34:59'),
(42, 36, 425, 11, 1, 2, '256', 'gfgfg', '2024-03-24 05:56:46', '2024-03-24 05:56:46'),
(43, 37, 424, 16, 1, 3, '545', '4545', '2024-03-24 05:58:11', '2024-03-24 05:58:11'),
(44, 1, 424, 16, 2, 2, '5', 'comment', '2024-03-24 06:14:01', '2024-03-24 06:14:01'),
(45, 1, 425, 2, 2, 1, '6', 'comment', '2024-03-24 06:14:01', '2024-03-24 06:14:01'),
(46, 2, 424, 3, 1, 1, '5', '545', '2024-03-24 06:16:23', '2024-03-24 06:16:23'),
(47, 3, 424, 3, 2, 2, '15', 'comment', '2024-03-24 06:21:07', '2024-03-24 06:21:07'),
(48, 4, 626, 11, 2, 1, '15', 'fddfdf', '2024-03-24 06:22:37', '2024-03-24 06:22:37'),
(49, 5, 424, 2, 1, 1, '45', '4545', '2024-03-24 06:23:42', '2024-03-24 06:23:42'),
(50, 6, 626, 2, 1, 1, '545', '54554', '2024-03-24 06:25:33', '2024-03-24 06:25:33'),
(51, 7, 424, 11, 2, 3, '56', 'gxgfgfg', '2024-03-24 06:27:40', '2024-03-24 06:27:40'),
(52, 8, 424, 16, 1, 1, '12', '545', '2024-03-24 06:48:12', '2024-03-24 06:48:12'),
(53, 9, 424, 16, 1, 1, 'fgg', 'fgg', '2024-03-24 06:49:01', '2024-03-24 06:49:01'),
(54, 10, 424, 16, 1, 1, 'fgg', 'fgg', '2024-03-24 06:49:01', '2024-03-24 06:49:01'),
(55, 11, 626, 2, 1, 2, '25', '5445', '2024-03-24 06:51:01', '2024-03-24 06:51:01'),
(56, 12, 424, 16, 2, 1, '5', '45', '2024-03-24 06:53:49', '2024-03-24 06:53:49'),
(57, 13, 424, 11, 1, 1, 'bvb', 'bvvb', '2024-03-24 06:55:38', '2024-03-24 06:55:38'),
(58, 14, 424, 2, 2, 2, '52', 'xczx', '2024-03-24 06:56:31', '2024-03-24 06:56:31'),
(59, 15, 424, 16, 1, 1, 'vc', 'vcv', '2024-03-24 07:00:43', '2024-03-24 07:00:43'),
(60, 16, 424, 2, 1, 2, 'bvb', 'vbvb', '2024-03-24 07:03:48', '2024-03-24 07:03:48'),
(61, 17, 424, 16, 1, 2, 'gfg', '988', '2024-03-24 07:06:50', '2024-03-24 07:06:50'),
(62, 18, 626, 16, 2, 2, '545', '4545', '2024-03-24 07:10:04', '2024-03-24 07:10:04'),
(63, 19, 424, 11, 2, 1, '444445', '454545', '2024-03-24 07:28:11', '2024-03-24 07:28:11'),
(64, 1, 425, 11, 2, 1, '56', '5454', '2024-03-24 07:32:08', '2024-03-24 07:32:08'),
(65, 2, 424, 11, 2, 2, '6', 'p[[]p][', '2024-03-24 07:35:45', '2024-03-24 07:35:45'),
(66, 3, 425, 11, 1, 2, '56', 'ghfgh', '2024-03-24 07:36:41', '2024-03-24 07:36:41'),
(67, 4, 424, 16, 1, 2, 'vbv', 'vbv', '2024-03-24 07:37:01', '2024-03-24 07:37:01'),
(68, 5, 424, 16, 1, 2, '5656', 'jmiljlk', '2024-03-24 07:39:00', '2024-03-24 07:39:00'),
(69, 6, 424, 16, 2, 3, '445', '45454', '2024-03-24 07:49:55', '2024-03-24 07:49:55'),
(70, 7, 424, 16, 1, 1, 'sd', 'dsd', '2024-03-24 07:50:19', '2024-03-24 07:50:19'),
(71, 8, 424, 16, 1, 2, '545', '545', '2024-03-24 07:51:04', '2024-03-24 07:51:04'),
(72, 9, 424, 3, 1, 2, 'hgh', 'ghgh', '2024-03-24 07:51:39', '2024-03-24 07:51:39'),
(73, 10, 425, 11, 2, 2, '45', '5454', '2024-03-24 07:56:02', '2024-03-24 07:56:02'),
(74, 11, 425, 16, 1, 2, 'cxc', 'cxc', '2024-03-24 07:56:31', '2024-03-24 07:56:31'),
(75, 12, 424, 16, 1, 2, '54', '4545', '2024-03-24 07:58:17', '2024-03-24 07:58:17'),
(86, 23, 424, 11, 2, 2, '562', 'xcxc', '2024-03-28 09:16:54', '2024-03-28 09:16:54'),
(87, 24, 626, 2, 2, 1, NULL, NULL, '2024-03-28 10:43:19', '2024-03-28 10:43:19'),
(88, 25, 424, 16, 3, 2, '45', '545', '2024-03-28 10:45:34', '2024-03-28 10:45:34'),
(89, 26, 425, 16, 3, 3, '212', '212', '2024-03-28 10:47:08', '2024-03-28 10:47:08'),
(90, 27, 424, 16, 2, 3, '545', '4545', '2024-03-28 10:51:20', '2024-03-28 10:51:20'),
(91, 28, 425, 2, 2, 1, '45', 'vcv', '2024-03-28 17:44:48', '2024-03-28 17:44:48'),
(92, 29, 425, 2, 2, 1, '45', 'vcv', '2024-03-28 17:44:55', '2024-03-28 17:44:55'),
(93, 30, 425, 2, 2, 1, '45', 'vcv', '2024-03-28 17:44:58', '2024-03-28 17:44:58'),
(94, 31, 626, 16, 3, 1, 'zx', 'zxzx', '2024-03-28 17:47:03', '2024-03-28 17:47:03'),
(95, 32, 626, 16, 3, 1, 'zx', 'zxzx', '2024-03-28 17:47:06', '2024-03-28 17:47:06'),
(96, 33, 626, 2, 2, 1, '56', NULL, '2024-03-28 17:48:00', '2024-03-28 17:48:00'),
(97, 34, 626, 2, 2, 2, '545', '545', '2024-03-28 17:49:24', '2024-03-28 17:49:24'),
(98, 35, 626, 16, 3, 2, '56', 'dfdf', '2024-03-28 17:52:25', '2024-03-28 17:52:25'),
(99, 36, 424, 11, 2, 1, NULL, NULL, '2024-03-28 17:53:17', '2024-03-28 17:53:17'),
(100, 37, 626, 16, 2, 1, '25', 'xcxc', '2024-03-28 18:10:20', '2024-03-28 18:10:20'),
(101, 38, 424, 16, NULL, NULL, NULL, NULL, '2024-03-28 18:11:49', '2024-03-28 18:11:49'),
(102, 39, 424, 16, NULL, NULL, NULL, NULL, '2024-03-28 18:13:34', '2024-03-28 18:13:34'),
(103, 42, 475, 3, 3, 3, NULL, NULL, '2024-03-28 18:52:17', '2024-03-28 18:52:17'),
(104, 43, 364, 3, 2, 1, NULL, NULL, '2024-03-28 18:53:56', '2024-03-28 18:53:56'),
(105, 44, 424, 3, 2, 2, NULL, NULL, '2024-03-28 19:13:52', '2024-03-28 19:13:52'),
(106, 45, 424, 16, 3, 1, NULL, NULL, '2024-03-28 19:15:47', '2024-03-28 19:15:47'),
(107, 46, 475, 16, 2, 2, NULL, NULL, '2024-03-28 19:16:40', '2024-03-28 19:16:40'),
(108, 47, 475, 3, 2, 2, NULL, NULL, '2024-03-28 19:18:08', '2024-03-28 19:18:08'),
(109, 48, 626, 16, 2, 1, '566', 'bxcv', '2024-03-30 15:07:23', '2024-03-30 15:07:23'),
(110, 49, 626, 16, 2, 1, '566', 'bxcv', '2024-03-30 15:07:27', '2024-03-30 15:07:27'),
(111, 50, 425, 16, 3, 1, 'cf', 'fgf', '2024-03-30 15:08:14', '2024-03-30 15:08:14'),
(112, 52, 424, 2, NULL, NULL, NULL, NULL, '2024-04-10 13:47:22', '2024-04-10 13:47:22'),
(113, 53, 424, 2, 3, 2, '656', '6989', '2024-04-10 13:47:54', '2024-04-10 13:47:54'),
(114, 54, 424, 2, 3, 2, '656', '6989', '2024-04-10 13:48:59', '2024-04-10 13:48:59'),
(115, 55, 425, 16, 2, 1, '20', 'hjggjgj', '2024-04-10 13:50:59', '2024-04-10 13:50:59'),
(116, 56, 424, 2, 2, 2, '15', 'mAHWmOJdH9', '2024-04-14 10:04:55', '2024-04-14 10:04:55'),
(117, 57, 424, 2, 2, 2, '15', 'mAHWmOJdH9', '2024-04-14 10:05:41', '2024-04-14 10:05:41'),
(118, 58, 424, 11, 2, 2, '15', 'y982useous', '2024-04-15 08:42:21', '2024-04-15 08:42:21'),
(119, 59, 626, 2, 2, 2, '15', 'mkXEUpQVku', '2024-04-15 08:47:46', '2024-04-15 08:47:46'),
(120, 4, 424, 16, 2, 2, '15', 'dfdfdsf', '2024-04-15 11:22:14', '2024-04-15 11:22:14'),
(121, 1, 425, 2, 3, 2, '20', 'fgfgfg', '2024-04-16 07:29:52', '2024-04-16 07:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `meettingtimefornext` varchar(255) DEFAULT NULL,
  `history` text DEFAULT NULL,
  `investigation` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `user_id`, `patient_id`, `meettingtimefornext`, `history`, `investigation`, `created_at`, `updated_at`) VALUES
(1, 38, 20, '30', 'cxzccxzcx', 'xcxzcxcxc', '2024-04-16 07:29:52', '2024-04-16 07:29:52'),
(2, 38, 20, '15', '2RehQCpWki', 'BqshBp1hrk', '2024-04-16 07:37:15', '2024-04-16 07:37:15'),
(3, 38, 20, '15', '2RehQCpWki', 'BqshBp1hrk', '2024-04-16 07:41:20', '2024-04-16 07:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptionusages`
--

CREATE TABLE `prescriptionusages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usage` varchar(255) NOT NULL,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptionusages`
--

INSERT INTO `prescriptionusages` (`id`, `usage`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, '১+০+১', 1, '2023-02-03 13:58:06', '2024-03-26 19:35:50'),
(2, '০+০+১', 0, '2023-02-12 19:35:33', '2023-02-12 19:35:33'),
(3, '১+১+১', 0, '2023-02-12 19:35:40', '2024-03-26 20:14:05'),
(4, 'xzxzx', 1, '2024-03-24 11:20:06', '2024-03-24 11:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `productcompanyorders`
--

CREATE TABLE `productcompanyorders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicinecomapnyname_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `discount` double NOT NULL DEFAULT 0,
  `amountafterdiscount` double NOT NULL DEFAULT 0,
  `serialno` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `debit` double NOT NULL DEFAULT 0,
  `credit` double NOT NULL DEFAULT 0,
  `balance` double NOT NULL DEFAULT 0,
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productcompanytransitions`
--

CREATE TABLE `productcompanytransitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicinecomapnyname_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` bigint(20) UNSIGNED NOT NULL,
  `productcompanyorder_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `unirprice` double NOT NULL,
  `quantity` double NOT NULL,
  `amount` double NOT NULL,
  `discountpercentage` double NOT NULL DEFAULT 0,
  `discount` double NOT NULL DEFAULT 0,
  `finalamountafterdiscount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reagents`
--

CREATE TABLE `reagents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reagents`
--

INSERT INTO `reagents` (`id`, `name`, `quantity`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, 'B', 416, 0, '2023-02-19 15:33:51', '2024-04-03 06:15:09'),
(2, 'C', 31, 0, '2023-02-19 15:33:51', '2023-02-25 16:17:49'),
(3, 'kkv', 900, 1, '2023-02-19 16:08:45', '2023-02-19 17:29:20'),
(4, 'A', 90, 0, '2023-02-19 18:22:17', '2023-12-16 12:48:17'),
(5, 'D', 1, 0, '2023-02-20 10:09:42', '2023-02-20 10:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `reagent_orders`
--

CREATE TABLE `reagent_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price_amount` int(11) DEFAULT NULL,
  `paid` int(11) DEFAULT NULL,
  `due` int(11) DEFAULT NULL,
  `type` tinyint(4) DEFAULT 1,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reagent_orders`
--

INSERT INTO `reagent_orders` (`id`, `price_amount`, `paid`, `due`, `type`, `supplier_id`, `user_id`, `created_at`, `updated_at`) VALUES
(10, 7, 0, 7, 1, 5, 1, '2023-02-22 18:00:00', '2023-02-23 10:54:50'),
(15, 5, 0, 5, 1, 3, 1, '2023-02-24 18:00:00', '2023-02-25 12:56:14'),
(16, 4, 0, 4, 1, 3, 1, '2023-02-24 18:00:00', '2023-02-25 13:16:50'),
(17, 15, 0, 15, 1, 3, 1, '2023-02-24 18:00:00', '2023-02-25 16:17:49'),
(18, 3, 0, 3, 1, 1, 1, '2023-02-24 18:00:00', '2023-02-25 16:19:07'),
(19, 10, 5, 5, 1, 3, 1, '2023-02-25 18:00:00', '2023-02-25 19:32:29'),
(20, 12, 10, 2, 2, 3, 1, '2023-02-25 18:00:00', '2023-02-25 22:36:42'),
(21, 10, 0, 10, 2, 3, 1, '2023-12-15 18:00:00', '2023-12-16 12:47:24'),
(22, 12, 10, 2, 2, 3, 1, '2023-12-15 18:00:00', '2023-12-16 12:48:17'),
(23, 20, 0, 20, 1, 3, 38, '2024-04-17 06:15:00', '2024-04-03 06:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `reagent_transactions`
--

CREATE TABLE `reagent_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reagent_id` bigint(20) UNSIGNED NOT NULL,
  `reagent_order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_amount` int(11) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reagent_transactions`
--

INSERT INTO `reagent_transactions` (`id`, `reagent_id`, `reagent_order_id`, `quantity`, `price_amount`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 1, 10, 50, 7, NULL, '2023-02-22 18:00:00', '2023-02-23 10:54:50'),
(20, 4, 15, 5, 5, NULL, '2023-02-24 18:00:00', '2023-02-25 12:56:14'),
(21, 4, 16, 1, 2, NULL, '2023-02-24 18:00:00', '2023-02-25 13:16:50'),
(22, 1, 16, 1, 2, NULL, '2023-02-24 18:00:00', '2023-02-25 13:16:50'),
(23, 1, 17, 1, 12, NULL, '2023-02-24 18:00:00', '2023-02-25 16:17:49'),
(24, 2, 17, 1, 3, NULL, '2023-02-24 18:00:00', '2023-02-25 16:17:49'),
(25, 1, 18, 10, 1, NULL, '2023-02-24 18:00:00', '2023-02-25 16:19:07'),
(26, 4, 18, 10, 2, NULL, '2023-02-24 18:00:00', '2023-02-25 16:19:07'),
(27, 4, 19, 5, 5, NULL, '2023-02-25 18:00:00', '2023-02-25 19:32:29'),
(28, 1, 19, 5, 5, NULL, '2023-02-25 18:00:00', '2023-02-25 19:32:29'),
(29, 4, 20, 5, 5, NULL, '2023-02-25 18:00:00', '2023-02-25 22:36:42'),
(30, 1, 20, 3, 7, NULL, '2023-02-25 18:00:00', '2023-02-25 22:36:43'),
(31, 4, 21, 1, 10, NULL, '2023-12-15 18:00:00', '2023-12-16 12:47:24'),
(32, 4, 22, 1, 12, NULL, '2023-12-15 18:00:00', '2023-12-16 12:48:17'),
(33, 1, 23, 2, 20, NULL, '2024-04-17 06:15:00', '2024-04-03 06:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `refundtransitions`
--

CREATE TABLE `refundtransitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `doctorappointmenttransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reportorder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `surgerytransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `serviceorder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `duetransition_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reportlists`
--

CREATE TABLE `reportlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `unitprice` double(10,2) NOT NULL,
  `related_reagents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`related_reagents`)),
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reportlists`
--

INSERT INTO `reportlists` (`id`, `name`, `unitprice`, `related_reagents`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, 'CBC(Hb%,TC,DC,ESR,RBC,Platelet,MCV,MCH,MCHC)', 800.00, NULL, 1, '2021-10-19 19:16:10', '2022-09-05 03:21:50'),
(2, 'RBS', 100.00, NULL, 1, '2021-10-19 19:16:18', '2021-12-19 05:29:19'),
(3, 'S.CRETIN', 500.00, NULL, 1, '2021-10-19 19:16:37', '2021-10-23 22:07:55'),
(4, 'CRP', 800.00, NULL, 0, '2021-10-19 19:49:37', '2021-10-19 19:49:37'),
(5, 'X -RAY RT LEG B/V', 800.00, NULL, 1, '2021-10-19 22:14:42', '2022-10-08 09:46:10'),
(6, 'CHEST P/A VIEW', 600.00, NULL, 1, '2021-10-19 22:18:09', '2022-10-08 09:21:46'),
(7, 'ECG', 500.00, NULL, 0, '2021-10-19 22:20:20', '2022-09-11 03:18:59'),
(8, 'HBS(Ag)', 600.00, NULL, 1, '2021-10-19 22:20:51', '2022-11-20 00:25:28'),
(9, 'Anti HCV', 1200.00, NULL, 1, '2021-10-19 22:21:37', '2022-01-31 00:26:17'),
(10, 'Blood Grouping', 200.00, NULL, 0, '2021-10-19 22:23:05', '2022-09-11 02:02:43'),
(11, 'Blood for Hb%', 120.00, NULL, 1, '2021-10-23 11:42:53', '2021-12-19 05:11:11'),
(12, 'Blood for DC Of WBC', 120.00, NULL, 1, '2021-10-23 11:43:54', '2021-10-23 11:44:41'),
(13, 'Blood for DC Of WBC', 200.00, NULL, 0, '2021-10-23 11:43:54', '2022-10-02 04:22:56'),
(14, 'Blood For TC WBC', 200.00, NULL, 0, '2021-10-23 11:45:13', '2022-10-02 05:04:38'),
(15, 'Blood for ESR', 120.00, NULL, 1, '2021-10-23 11:45:50', '2021-12-19 05:11:04'),
(16, 'Blood for RBC Count', 300.00, NULL, 0, '2021-10-23 11:46:51', '2022-10-02 05:03:54'),
(17, 'Blood for Platelet Count', 300.00, NULL, 1, '2021-10-23 11:48:04', '2021-12-19 05:11:55'),
(18, 'Blood for PCV', 300.00, NULL, 0, '2021-10-23 11:48:37', '2022-10-02 05:03:24'),
(19, 'Blood for PCV,MCV,MCH,MCHC', 500.00, NULL, 0, '2021-10-23 11:49:30', '2022-10-02 05:03:32'),
(20, 'Peripheral Blood Film(PBF)', 600.00, NULL, 1, '2021-10-23 21:54:12', '2021-12-19 05:28:29'),
(21, 'Malarial Parasist(MP)(ICT)', 400.00, NULL, 1, '2021-10-23 21:56:16', '2021-12-19 05:25:34'),
(22, 'Blood for Reticulocyte Count', 200.00, NULL, 1, '2021-10-23 21:57:19', '2021-12-19 05:12:09'),
(23, 'Blood for Circulating Edinophil Count (TCE)', 200.00, NULL, 1, '2021-10-23 21:58:40', '2021-12-19 05:10:41'),
(24, 'Blood Grouping & RH Factor', 200.00, NULL, 0, '2021-10-23 22:01:15', '2022-09-11 03:19:17'),
(25, 'Blood Bleeding Time (BT)', 200.00, NULL, 1, '2021-10-23 22:02:15', '2021-12-19 05:10:02'),
(26, 'Blood Clotting Time (CT)', 200.00, NULL, 1, '2021-10-23 22:03:17', '2021-12-19 05:10:08'),
(27, 'Serum Prothombin Time', 900.00, NULL, 0, '2021-10-23 22:04:04', '2022-09-05 01:46:31'),
(28, 'Aldehyde Test', 200.00, NULL, 1, '2021-10-23 22:04:56', '2022-09-11 02:06:48'),
(29, 'Bone Marrow', 3500.00, NULL, 0, '2021-10-23 22:07:03', '2022-10-02 05:07:32'),
(30, 'Blood for HB%', 200.00, NULL, 0, '2021-10-31 00:45:36', '2022-09-11 01:51:08'),
(31, 'Blood for TC of WBC', 120.00, NULL, 1, '2021-10-31 00:46:37', '2021-12-19 05:12:16'),
(32, 'Blood for DC of WEB', 120.00, NULL, 1, '2021-10-31 00:47:15', '2021-12-19 05:10:58'),
(33, 'Blood for ESR', 200.00, NULL, 0, '2021-10-31 00:47:41', '2022-10-02 04:23:09'),
(34, 'Blood for HB% Tc.Dc.ESR.(CBC).(CP)', 500.00, NULL, 0, '2021-10-31 00:49:42', '2022-09-05 03:22:12'),
(35, 'Blood for RBC Count', 150.00, NULL, 1, '2021-10-31 00:50:29', '2021-12-19 05:12:01'),
(36, 'Blood for Platelet Count', 400.00, NULL, 0, '2021-10-31 00:52:12', '2022-10-02 04:23:44'),
(37, 'Blood for PCV', 200.00, NULL, 1, '2021-10-31 00:52:38', '2021-12-19 05:11:32'),
(38, 'Blood for  PCV,MCV,MCH,MCHC', 400.00, NULL, 0, '2021-10-31 00:53:03', '2021-10-31 00:53:03'),
(39, 'Blood for CBC(Hb%,TC,DC,ESR,RBC,Platelet,MCV,MCH,MCHC', 900.00, NULL, 0, '2021-10-31 00:53:25', '2022-09-05 03:20:45'),
(40, 'Peripheral Blood Film(PBF)', 700.00, NULL, 0, '2021-10-31 00:53:59', '2022-10-02 05:05:37'),
(41, 'Malarial Parasist (MP)(ICT)', 400.00, NULL, 0, '2021-10-31 00:54:18', '2021-10-31 00:54:18'),
(42, 'Blood for Reticulocyte Count', 300.00, NULL, 0, '2021-10-31 00:54:41', '2022-10-02 05:04:16'),
(43, 'Blood for Circulating Edinophil Count (TCE)', 200.00, NULL, 0, '2021-10-31 00:55:02', '2021-10-31 00:55:02'),
(44, 'Blood Grouping & Rh Factor', 100.00, NULL, 1, '2021-10-31 00:55:23', '2021-12-19 05:12:33'),
(45, 'Blood Bleeding Time (BT)', 300.00, NULL, 0, '2021-10-31 00:55:41', '2022-09-05 01:44:05'),
(46, 'Blood Clotting Time(CT)', 300.00, NULL, 0, '2021-10-31 00:56:00', '2022-09-05 01:44:35'),
(47, 'Serum Prothombin Time', 800.00, NULL, 1, '2021-10-31 00:56:37', '2022-06-04 20:54:11'),
(48, 'Aldehyde Test', 200.00, NULL, 1, '2021-10-31 00:57:05', '2021-12-19 05:08:32'),
(49, 'Bone Marrow', 3000.00, NULL, 1, '2021-10-31 00:57:32', '2021-12-19 05:12:52'),
(50, 'Blood Cross Matching', 500.00, NULL, 1, '2021-10-31 00:58:01', '2022-08-19 05:41:03'),
(51, 'FBS', 200.00, NULL, 0, '2021-10-31 00:58:22', '2022-09-05 01:47:06'),
(52, 'Blood Suger(2 hour after Breakfast) PPBS', 100.00, NULL, 1, '2021-10-31 00:58:45', '2022-08-21 00:13:42'),
(53, 'Random Blood Suger(RBS)', 100.00, NULL, 1, '2021-10-31 00:59:24', '2022-08-21 00:14:01'),
(54, 'Blood Suger( 2 After 75gm Glucose Drink)', 200.00, NULL, 0, '2021-10-31 01:00:11', '2022-09-11 03:19:29'),
(55, 'Blood Suger (GTT)', 500.00, NULL, 0, '2021-10-31 01:00:48', '2022-09-05 01:42:38'),
(56, 'Blood Urea', 500.00, NULL, 0, '2021-10-31 01:01:12', '2022-10-02 04:24:37'),
(57, 'Serum Creatinine', 500.00, NULL, 0, '2021-10-31 01:01:47', '2022-09-05 00:40:12'),
(58, 'Blood Urea Nitrigen(BUN)', 500.00, NULL, 0, '2021-10-31 01:02:14', '2022-10-02 05:05:13'),
(59, 'Creatinine Clearance Rate-CCR', 700.00, NULL, 0, '2021-10-31 01:03:52', '2021-10-31 01:03:52'),
(60, 'Serum Uric Acide', 800.00, NULL, 0, '2021-10-31 01:04:16', '2022-09-04 23:54:30'),
(61, 'Lipid Profile', 1300.00, NULL, 0, '2021-10-31 01:04:42', '2022-09-04 23:56:15'),
(62, 'Serum Cholesterol', 400.00, NULL, 0, '2021-10-31 01:05:17', '2022-09-05 00:00:21'),
(63, 'Serum TG', 400.00, NULL, 0, '2021-10-31 01:05:42', '2022-09-05 00:05:59'),
(64, 'Serum HDL-Cholesterol', 400.00, NULL, 0, '2021-10-31 01:06:08', '2022-09-05 00:03:31'),
(65, 'Serum LDL-Cholesterol', 600.00, NULL, 0, '2021-10-31 01:06:42', '2022-09-05 00:04:29'),
(66, 'LFT/Liver Function Test(Billirubin,SGOT,SGPT,Alkaline Phosphates)', 1400.00, NULL, 0, '2021-10-31 01:07:03', '2022-09-05 00:09:23'),
(67, 'Serum Billirubin', 400.00, NULL, 0, '2021-10-31 01:07:21', '2022-09-05 00:11:57'),
(68, 'SGOT(AST)', 500.00, NULL, 0, '2021-10-31 01:07:45', '2022-09-05 00:13:08'),
(69, 'SGPT(ALT)', 500.00, NULL, 0, '2021-10-31 01:08:12', '2022-09-05 00:14:22'),
(70, 'SGPT(ALT)', 400.00, NULL, 1, '2021-10-31 01:09:31', '2022-01-10 22:51:43'),
(71, 'SGPT(ALT)', 400.00, NULL, 1, '2021-10-31 01:10:56', '2022-01-10 22:51:40'),
(72, 'Serum Alkaline Phosphates', 600.00, NULL, 0, '2021-10-31 01:11:20', '2022-09-05 00:15:01'),
(73, 'Serum Peotein', 600.00, NULL, 0, '2021-10-31 01:11:38', '2022-10-02 05:13:11'),
(74, 'Serum Albumin', 600.00, NULL, 0, '2021-10-31 01:12:23', '2022-09-05 00:33:11'),
(75, 'Serum protein', 600.00, NULL, 0, '2021-10-31 01:12:54', '2022-09-05 00:32:31'),
(76, 'Serum C.P.K', 1300.00, NULL, 0, '2021-10-31 01:13:40', '2022-09-05 00:34:14'),
(77, 'Serum CK-MB', 1300.00, NULL, 0, '2021-10-31 01:14:03', '2022-09-05 00:36:01'),
(78, 'Serum L.D.H', 1300.00, NULL, 0, '2021-10-31 01:14:27', '2022-10-02 05:14:27'),
(79, 'Serum Amylase', 1500.00, NULL, 0, '2021-10-31 01:14:57', '2022-09-11 07:29:45'),
(80, 'Serum Acid Phosphates', 1100.00, NULL, 0, '2021-10-31 01:15:33', '2022-09-05 00:41:43'),
(81, 'Serum Calcium', 900.00, NULL, 0, '2021-10-31 01:15:57', '2022-09-05 00:34:42'),
(82, 'Serum Phosphates', 1300.00, NULL, 0, '2021-10-31 16:27:58', '2022-09-05 00:42:27'),
(83, 'Serum Electrolytes (Na,K,CI,CO2)', 1300.00, NULL, 0, '2021-10-31 16:28:17', '2022-09-05 00:43:11'),
(84, 'Serum Lithium', 1100.00, NULL, 0, '2021-10-31 16:29:15', '2022-10-02 05:15:23'),
(85, 'HBAIC', 1200.00, NULL, 1, '2021-10-31 16:29:47', '2022-09-11 02:00:00'),
(86, 'D.Dimer', 1200.00, NULL, 1, '2021-10-31 16:30:14', '2022-01-26 03:20:13'),
(87, 'ASO Titer', 400.00, NULL, 1, '2021-10-31 16:30:38', '2022-08-19 05:38:48'),
(88, 'RA/RF', 400.00, NULL, 0, '2021-10-31 16:31:00', '2021-10-31 16:31:00'),
(89, 'CRP', 600.00, NULL, 1, '2021-10-31 16:31:33', '2021-12-19 05:14:22'),
(90, 'CRP Titer', 1300.00, NULL, 0, '2021-10-31 16:31:51', '2022-09-11 02:41:48'),
(91, 'Rose walter Test', 700.00, NULL, 0, '2021-10-31 16:32:14', '2022-10-02 05:21:19'),
(92, 'Febrile Antigen/Triple Antigen', 1200.00, NULL, 0, '2021-10-31 16:32:44', '2021-10-31 16:32:44'),
(93, 'VDRL', 500.00, NULL, 0, '2021-10-31 16:33:10', '2021-10-31 16:33:10'),
(94, 'T.P.H.A', 600.00, NULL, 0, '2021-10-31 16:33:39', '2021-10-31 16:33:39'),
(95, 'Widal Test', 400.00, NULL, 0, '2021-10-31 16:33:57', '2021-10-31 16:33:57'),
(96, 'HBS Ag Test', 400.00, NULL, 1, '2021-10-31 16:34:15', '2022-09-11 02:00:43'),
(97, 'HBS Ag (Elisa Method)', 1200.00, NULL, 0, '2021-10-31 16:34:40', '2021-10-31 16:34:40'),
(98, 'HBE Ag Test', 1000.00, NULL, 0, '2021-10-31 16:40:42', '2021-10-31 16:40:42'),
(99, 'Anti HBE(Total)', 1000.00, NULL, 1, '2021-10-31 16:41:11', '2022-09-11 02:07:32'),
(100, 'Mantoux Test', 400.00, NULL, 0, '2021-10-31 16:41:49', '2021-10-31 16:41:49'),
(101, 'A.N.F', 1000.00, NULL, 1, '2021-10-31 16:42:12', '2022-09-11 02:06:41'),
(102, 'Hexagon TB', 700.00, NULL, 0, '2021-10-31 16:42:41', '2021-10-31 16:42:41'),
(103, 'Pregnancy Test', 200.00, NULL, 0, '2021-10-31 16:43:00', '2021-10-31 16:43:00'),
(104, 'Anti DNA (Anti Ds DNA)', 1200.00, NULL, 1, '2021-10-31 16:43:19', '2022-09-11 02:07:28'),
(105, 'HIV Test/Aids Test', 1200.00, NULL, 0, '2021-10-31 16:43:44', '2021-10-31 16:43:44'),
(106, 'Desngu', 1200.00, NULL, 0, '2021-10-31 16:44:01', '2021-10-31 16:44:01'),
(107, 'CF-for Filaria', 1200.00, NULL, 0, '2021-10-31 16:44:25', '2021-10-31 16:44:25'),
(108, 'CF-for Kala Zar', 1200.00, NULL, 0, '2021-10-31 16:44:57', '2021-10-31 16:44:57'),
(109, 'Urine for micro Albumin', 1200.00, NULL, 0, '2021-10-31 16:45:16', '2021-10-31 16:45:16'),
(110, 'RH-Antibody Titry', 1400.00, NULL, 0, '2021-10-31 16:45:36', '2021-10-31 16:45:36'),
(111, 'H-Pylori (IGG)', 1000.00, NULL, 0, '2021-10-31 16:45:52', '2021-10-31 16:45:52'),
(112, 'Complements-C3', 1200.00, NULL, 0, '2021-10-31 16:46:10', '2021-10-31 16:46:10'),
(113, 'Complements-C4', 1200.00, NULL, 0, '2021-10-31 16:46:29', '2021-10-31 16:46:29'),
(114, 'Anti TB-IGA', 1200.00, NULL, 1, '2021-10-31 16:46:47', '2022-09-11 02:08:27'),
(115, 'Anti TB-IGG', 1200.00, NULL, 1, '2021-10-31 16:47:05', '2022-09-11 02:08:30'),
(116, 'Anti TB-IGM', 1200.00, NULL, 1, '2021-10-31 16:49:16', '2021-12-19 05:09:15'),
(117, 'Immunoglobulin IGA', 1200.00, NULL, 0, '2021-10-31 16:49:39', '2021-10-31 16:49:39'),
(118, 'Immunoglobulin IGE', 1200.00, NULL, 0, '2021-10-31 16:50:01', '2021-10-31 16:50:01'),
(119, 'Immunoglobulin IGG', 1200.00, NULL, 0, '2021-10-31 16:50:19', '2021-10-31 16:50:19'),
(120, 'Immunoglobulin IGM', 1200.00, NULL, 0, '2021-10-31 16:50:42', '2021-10-31 16:50:42'),
(121, 'Anti HCV (HCV ab)', 1200.00, NULL, 1, '2021-10-31 16:51:41', '2022-09-11 02:07:37'),
(122, 'Anti HBs(HBs ab)', 1200.00, NULL, 1, '2021-10-31 16:52:02', '2022-09-11 02:07:34'),
(123, 'Bloob for C/S', 1600.00, NULL, 0, '2021-10-31 16:52:28', '2022-10-02 04:26:20'),
(124, 'PUS for C/S', 700.00, NULL, 0, '2021-10-31 16:52:54', '2021-10-31 16:52:54'),
(125, 'Pus for Gram Stam', 500.00, NULL, 0, '2021-10-31 16:53:15', '2021-10-31 16:53:15'),
(126, 'Sputum C/S', 800.00, NULL, 0, '2021-10-31 16:53:35', '2022-10-02 04:26:42'),
(127, 'Sputum Esonophil Count', 300.00, NULL, 0, '2021-10-31 16:53:57', '2021-10-31 16:53:57'),
(128, 'Sputum R/E', 300.00, NULL, 0, '2021-10-31 16:54:23', '2021-10-31 16:54:23'),
(129, 'Sputum A.F.B', 300.00, NULL, 0, '2021-10-31 16:55:15', '2021-10-31 16:55:15'),
(130, 'Throat Swab C/S', 700.00, NULL, 0, '2021-10-31 16:55:37', '2021-10-31 16:55:37'),
(131, 'Urethral Smear G.C (Collection Charge-100/-)', 500.00, NULL, 0, '2021-10-31 16:56:00', '2021-10-31 16:56:00'),
(132, 'Throat Swab Gram Stain', 500.00, NULL, 0, '2021-10-31 16:56:35', '2021-10-31 16:56:35'),
(133, 'P.S G/C (Collection Charge-100/-)', 500.00, NULL, 0, '2021-10-31 16:57:05', '2021-10-31 16:57:05'),
(134, 'Vaginal Swab C/S', 700.00, NULL, 0, '2021-10-31 16:59:56', '2021-10-31 16:59:56'),
(135, 'Vaginal Swab Gram Stain(Collection Charge-100/-)', 700.00, NULL, 0, '2021-10-31 17:00:22', '2021-10-31 17:00:22'),
(136, 'Eye Swab C/S', 700.00, NULL, 0, '2021-10-31 17:00:43', '2021-10-31 17:00:43'),
(137, 'C.S.F for C/S', 700.00, NULL, 0, '2021-10-31 17:01:02', '2021-10-31 17:01:02'),
(138, 'C.S.F for Cytology', 500.00, NULL, 0, '2021-10-31 17:01:21', '2021-10-31 17:01:21'),
(139, 'C.S.F for Biochemistry', 500.00, NULL, 0, '2021-10-31 17:01:43', '2021-10-31 17:01:43'),
(140, 'C.S.F for Maligment Cell', 1200.00, NULL, 0, '2021-10-31 17:02:06', '2021-10-31 17:02:06'),
(141, 'C.S.F for Gram Stain', 500.00, NULL, 0, '2021-10-31 17:02:30', '2021-10-31 17:02:30'),
(142, 'Pleural Fluid C/S', 700.00, NULL, 0, '2021-10-31 17:02:47', '2021-10-31 17:02:47'),
(143, 'Pleural Fluid Cytology', 500.00, NULL, 0, '2021-10-31 17:03:09', '2021-10-31 17:03:09'),
(144, 'Pleural Fluid Biochemistry', 500.00, NULL, 0, '2021-10-31 17:03:46', '2021-10-31 17:03:46'),
(145, 'Pleural Fluid Maligment Cell', 1200.00, NULL, 0, '2021-10-31 17:04:10', '2021-10-31 17:04:10'),
(146, 'Pleural Fluid Gram Stain', 500.00, NULL, 0, '2021-10-31 17:04:26', '2021-10-31 17:04:26'),
(147, 'Semen Analysis', 1000.00, NULL, 0, '2021-10-31 17:04:44', '2022-02-04 02:34:16'),
(148, 'Skin Acraping Fungus(Collection Charge-100/-)', 800.00, NULL, 0, '2021-10-31 17:05:15', '2022-09-19 06:52:59'),
(149, 'Ascitic Fluid C/S (Collection Charge-100/-)', 700.00, NULL, 0, '2021-10-31 17:05:39', '2021-10-31 17:05:39'),
(150, 'Ascitic Fluid Cytology', 500.00, NULL, 0, '2021-10-31 17:06:12', '2021-10-31 17:06:12'),
(151, 'Ascitic Fluid Biochemistry', 500.00, NULL, 0, '2021-10-31 17:06:37', '2021-10-31 17:06:37'),
(152, 'Ascitic Fluid Maligment Cell', 1200.00, NULL, 0, '2021-10-31 17:06:54', '2021-10-31 17:06:54'),
(153, 'Ascitic Fluid Gram Stain', 500.00, NULL, 0, '2021-10-31 17:07:14', '2021-10-31 17:07:14'),
(154, 'Synovioal Fluid C/S', 700.00, NULL, 0, '2021-10-31 17:08:01', '2021-10-31 17:08:01'),
(155, 'Synovioal Fluid Cytology', 500.00, NULL, 0, '2021-10-31 17:08:28', '2021-10-31 17:08:28'),
(156, 'Synovioal Fluid Biochemistry', 500.00, NULL, 0, '2021-10-31 17:08:47', '2021-10-31 17:08:47'),
(157, 'Synovioal Fluid Gram Stain', 500.00, NULL, 0, '2021-10-31 17:09:04', '2021-10-31 17:09:04'),
(158, 'Wound Swab For C/S', 700.00, NULL, 0, '2021-10-31 17:15:23', '2021-10-31 17:15:23'),
(159, 'T3,T4,TSH', 1700.00, NULL, 0, '2021-10-31 17:15:43', '2022-09-05 01:35:49'),
(160, 'Free-T3', 1300.00, NULL, 0, '2021-10-31 17:16:14', '2022-09-24 02:46:33'),
(161, 'Free-T4', 1300.00, NULL, 0, '2021-10-31 17:16:31', '2022-09-24 02:46:59'),
(162, 'Free-T4', 1200.00, NULL, 1, '2021-10-31 17:17:21', '2021-12-19 05:24:05'),
(163, 'Free-TSH', 900.00, NULL, 0, '2021-10-31 17:17:40', '2022-09-05 01:32:55'),
(164, 'LH', 1300.00, NULL, 0, '2021-10-31 17:18:05', '2022-09-24 02:44:27'),
(165, 'FSH', 1300.00, NULL, 0, '2021-10-31 17:18:24', '2022-09-24 02:44:45'),
(166, 'Estrogen', 1200.00, NULL, 0, '2021-10-31 17:18:48', '2021-10-31 17:18:48'),
(167, 'Progesterone', 1200.00, NULL, 0, '2021-10-31 17:19:07', '2021-10-31 17:19:07'),
(168, 'Prolactine', 1300.00, NULL, 0, '2021-10-31 17:19:25', '2022-09-24 02:43:35'),
(169, 'Testosterone', 1300.00, NULL, 0, '2021-10-31 17:19:46', '2022-10-02 05:59:52'),
(170, 'Cortisol(one Sample)', 1200.00, NULL, 0, '2021-10-31 17:20:11', '2021-10-31 17:20:11'),
(171, 'Alfa Fato Protein', 1400.00, NULL, 1, '2021-10-31 17:25:25', '2022-09-11 02:06:56'),
(172, 'Circinoma Embryonic Antigen(CEA)', 1400.00, NULL, 0, '2021-10-31 17:25:49', '2021-10-31 17:25:49'),
(173, 'Prostatic Antigen(PSA)', 1400.00, NULL, 0, '2021-10-31 17:26:16', '2021-10-31 17:26:16'),
(174, 'Seram Beta Heg', 1400.00, NULL, 0, '2021-10-31 17:26:33', '2021-10-31 17:26:33'),
(175, 'Urinary Beta HCG', 1400.00, NULL, 0, '2021-10-31 17:26:48', '2022-09-05 01:49:34'),
(176, 'CA-125', 1400.00, NULL, 0, '2021-10-31 17:27:09', '2021-10-31 17:27:09'),
(177, 'CA-15.3', 1400.00, NULL, 0, '2021-10-31 17:27:24', '2021-10-31 17:27:24'),
(178, 'CA-19.9', 1400.00, NULL, 0, '2021-10-31 17:27:40', '2021-10-31 17:27:40'),
(179, 'CA-242', 1400.00, NULL, 0, '2021-10-31 17:28:02', '2021-10-31 17:28:02'),
(180, 'Serum ttegretol Level', 1400.00, NULL, 0, '2021-10-31 17:28:32', '2021-10-31 17:28:32'),
(181, 'Serum Cyclosorine Level', 1400.00, NULL, 0, '2021-10-31 17:28:49', '2021-10-31 17:28:49'),
(182, 'Serum Gardenal Level', 1400.00, NULL, 0, '2021-10-31 17:29:34', '2021-10-31 17:29:34'),
(183, 'Serum parcetamol Level', 1400.00, NULL, 0, '2021-10-31 17:30:00', '2021-10-31 17:30:00'),
(184, 'Cocaine Test(From Urine)', 1400.00, NULL, 0, '2021-10-31 17:30:21', '2021-10-31 17:30:21'),
(185, 'Troponin-1', 1600.00, NULL, 0, '2021-10-31 17:30:40', '2022-09-24 02:45:36'),
(186, 'Urine for R/E,M/E', 300.00, NULL, 0, '2021-10-31 17:31:36', '2022-10-02 04:31:29'),
(187, 'Urine for Sugar', 200.00, NULL, 0, '2021-10-31 17:32:00', '2022-09-11 03:22:49'),
(188, 'Urine Protein/Albumin', 200.00, NULL, 0, '2021-10-31 17:32:20', '2022-09-11 03:23:22'),
(189, 'Urine Benz.Jones Protein', 300.00, NULL, 0, '2021-10-31 17:32:40', '2022-10-02 04:38:22'),
(190, 'Urine Specifc Gravity', 200.00, NULL, 0, '2021-10-31 17:33:00', '2022-09-11 03:23:43'),
(191, 'Urine Acetone', 200.00, NULL, 0, '2021-10-31 17:33:16', '2022-09-11 03:24:53'),
(192, 'Urine Bile Pigment', 200.00, NULL, 0, '2021-10-31 17:33:44', '2022-09-11 03:23:08'),
(193, 'Urine Urobilinogen', 200.00, NULL, 0, '2021-10-31 17:33:59', '2022-09-11 03:23:32'),
(194, 'Urine Creatine', 400.00, NULL, 0, '2021-10-31 17:34:16', '2022-10-02 04:29:44'),
(195, 'Urine Pregnancy', 300.00, NULL, 0, '2021-10-31 17:34:36', '2022-10-02 04:29:33'),
(196, 'Urine 24 hours Urine Total protein', 1000.00, NULL, 0, '2021-10-31 17:34:53', '2022-10-02 04:29:07'),
(197, 'Urine for Gram Stain', 600.00, NULL, 0, '2021-10-31 17:35:22', '2022-10-02 04:28:34'),
(198, 'Urine for A F B', 300.00, NULL, 0, '2021-10-31 17:35:44', '2022-10-02 04:28:48'),
(199, 'Urine for C/S', 800.00, NULL, 0, '2021-10-31 17:36:05', '2022-09-11 03:22:59'),
(200, 'Urine Amylase', 1400.00, NULL, 0, '2021-10-31 17:36:29', '2022-10-02 04:31:01'),
(201, 'Stool R/E,M/E', 400.00, NULL, 0, '2021-10-31 17:46:19', '2022-10-02 04:38:50'),
(202, 'Stool O.B.T', 400.00, NULL, 0, '2021-10-31 17:46:42', '2022-10-02 04:39:52'),
(203, 'Stool R.S/Reducing Substance', 200.00, NULL, 0, '2021-10-31 17:47:00', '2022-10-02 04:39:25'),
(204, 'Stool Floation Method', 300.00, NULL, 0, '2021-10-31 17:47:18', '2022-10-02 04:39:08'),
(205, 'Stool Culture Sensitive C/S', 800.00, NULL, 0, '2021-10-31 17:47:33', '2022-10-02 04:39:40'),
(206, 'E.C.G (12 lead)', 400.00, NULL, 1, '2021-10-31 17:47:51', '2021-12-19 05:20:00'),
(207, 'Ecocardiography(B/W)', 1000.00, NULL, 1, '2021-10-31 17:48:16', '2021-12-19 05:21:30'),
(208, 'Ecocardiography(C)', 1500.00, NULL, 0, '2021-10-31 17:48:38', '2021-10-31 17:48:38'),
(209, 'Color Doppler Echo', 2500.00, NULL, 1, '2021-10-31 17:49:28', '2021-12-19 05:14:00'),
(210, 'Digital E.E.G', 3000.00, NULL, 1, '2021-10-31 17:50:02', '2021-12-19 05:14:55'),
(211, 'E.T.T', 3500.00, NULL, 0, '2021-10-31 17:50:24', '2021-10-31 17:50:24'),
(212, 'Endoscopy of Upper GI Tract(Normal)', 800.00, NULL, 1, '2021-10-31 17:50:42', '2021-12-19 05:23:12'),
(213, 'Video Endoscopy of Upper GI Tract', 1500.00, NULL, 0, '2021-10-31 17:50:58', '2021-10-31 17:50:58'),
(214, 'Video Colonoscopy(Without Medicine)', 5000.00, NULL, 1, '2021-10-31 17:51:18', '2022-01-10 22:58:42'),
(215, 'Normal Colonoscopy (Without Medicine)', 3200.00, NULL, 1, '2021-10-31 17:51:40', '2021-12-19 05:26:12'),
(216, 'Endoscopy Biopsy(Taking)', 3000.00, NULL, 0, '2021-10-31 17:52:04', '2021-10-31 17:52:04'),
(217, 'Digital Both Brest', 2000.00, NULL, 1, '2021-10-31 17:52:30', '2021-12-19 05:14:44'),
(218, 'Digital Left Brest', 1000.00, NULL, 1, '2021-10-31 17:52:51', '2021-12-19 05:15:05'),
(219, 'Digital Right Brest', 1000.00, NULL, 1, '2021-10-31 17:53:10', '2022-10-08 09:22:17'),
(220, 'X-Ray P.N.S', 300.00, NULL, 1, '2021-10-31 17:54:01', '2021-10-31 18:13:49'),
(221, 'X-Ray Skull (B/V)', 500.00, NULL, 1, '2021-10-31 17:54:22', '2021-10-31 18:13:43'),
(222, 'X-Ray Chest P/A View', 400.00, NULL, 1, '2021-10-31 17:54:40', '2021-10-31 18:13:36'),
(223, 'X-Ray Chest A/P', 400.00, NULL, 1, '2021-10-31 17:55:00', '2021-10-31 18:13:22'),
(224, 'X-Ray Chest Left/Right View (B/V)', 400.00, NULL, 1, '2021-10-31 17:55:24', '2021-10-31 18:13:15'),
(225, 'X-Ray Chest Oblique View-Right/Left(B/V)', 400.00, NULL, 1, '2021-10-31 17:55:41', '2021-10-31 18:13:09'),
(226, 'X-Ray K.U.B Abdomen Ereet Posture', 400.00, NULL, 1, '2021-10-31 17:55:57', '2021-10-31 18:13:03'),
(227, 'X-Ray Cervical Spine(B/V)', 500.00, NULL, 1, '2021-10-31 17:56:16', '2021-10-31 18:12:57'),
(228, 'X-Ray Dorso Lumber Spine( B/V)', 500.00, NULL, 1, '2021-10-31 17:56:34', '2021-10-31 18:12:46'),
(229, 'X-Ray Lumbo Sacral Spine(B/V)', 500.00, NULL, 1, '2021-10-31 17:56:51', '2021-10-31 18:12:40'),
(230, 'X-Ray Pelvis With both hop joints(A/P)', 400.00, NULL, 1, '2021-10-31 17:57:08', '2021-10-31 18:12:35'),
(231, 'X-Ray Pelvis With both hop joints(B/V)', 500.00, NULL, 1, '2021-10-31 17:57:29', '2021-10-31 18:12:30'),
(232, 'X-Ray Pelvis With both S.I joint(A/P)', 400.00, NULL, 1, '2021-10-31 17:57:57', '2021-10-31 18:12:24'),
(233, 'X-Ray P.N.S', 600.00, NULL, 1, '2021-10-31 18:16:37', '2022-10-08 09:39:36'),
(234, 'X-Ray Skull (B/V)', 800.00, NULL, 1, '2021-10-31 18:16:48', '2022-10-08 09:38:20'),
(235, 'X-Ray Chest P/A View', 600.00, NULL, 1, '2021-10-31 18:17:18', '2022-10-08 09:44:44'),
(236, 'X-Ray Chest A/P', 600.00, NULL, 1, '2021-10-31 18:17:45', '2022-10-08 09:45:53'),
(237, 'X-Ray Chest Left (B/V)', 800.00, NULL, 1, '2021-10-31 18:18:52', '2022-10-08 09:45:56'),
(238, 'X-Ray Right (B/V)', 800.00, NULL, 1, '2021-10-31 18:19:29', '2022-10-08 09:38:59'),
(239, 'X-Ray Chest Oblique View-Right (B/V)', 800.00, NULL, 1, '2021-10-31 18:20:47', '2022-10-08 09:45:03'),
(240, 'X-Ray Chest Oblique Left(B/V)', 800.00, NULL, 1, '2021-10-31 18:21:23', '2022-10-08 09:45:59'),
(241, 'X-Ray K.U.B Abdomen Ereet Posture', 800.00, NULL, 1, '2021-10-31 18:21:55', '2022-10-08 09:41:36'),
(242, 'X-Ray Cervical Spine(B/V)', 800.00, NULL, 1, '2021-10-31 18:22:20', '2022-10-08 09:45:51'),
(243, 'X-Ray Dorso Lumber Spine( B/V)', 800.00, NULL, 1, '2021-10-31 18:22:44', '2022-10-08 09:44:24'),
(244, 'X-Ray Lumber Sacral Spine(B/V)', 900.00, NULL, 1, '2021-10-31 18:23:11', '2022-10-08 09:40:02'),
(245, 'X-Ray Pelvis With both hop joints(A/P)', 800.00, NULL, 1, '2021-10-31 18:23:57', '2022-10-08 09:39:21'),
(246, 'X-Ray Pelvis With both hop joints(B/V)', 800.00, NULL, 1, '2021-10-31 18:24:23', '2022-10-08 09:39:14'),
(247, 'X-Ray Pelvis With both S.I joint(A/P)', 800.00, NULL, 1, '2021-10-31 18:24:48', '2022-10-08 09:39:07'),
(248, 'X-Ray Leg (B/V)', 800.00, NULL, 1, '2021-10-31 18:25:26', '2022-10-08 09:40:58'),
(249, 'X-Ray Leg (B/V)', 600.00, NULL, 1, '2021-10-31 18:25:26', '2022-01-10 23:02:53'),
(250, 'X-Ray Leg (B/V)', 600.00, NULL, 1, '2021-10-31 18:25:27', '2022-01-10 23:02:57'),
(251, 'X-Ray Leg (B/V)', 600.00, NULL, 1, '2021-10-31 18:25:27', '2022-01-10 23:03:02'),
(252, 'X-Ray Femur(B/V)', 600.00, NULL, 1, '2021-10-31 18:25:58', '2021-12-19 05:50:08'),
(253, 'X-Ray Thigh Hip(B/V)', 600.00, NULL, 1, '2021-10-31 18:26:24', '2021-12-19 05:54:28'),
(254, 'X-Ray Knee Right(B/V)', 800.00, NULL, 1, '2021-10-31 18:27:02', '2022-10-08 09:41:29'),
(255, 'X-Ray Ankle-Right (B/V)', 600.00, NULL, 1, '2021-10-31 18:40:41', '2021-12-19 05:35:40'),
(256, 'X-Ray Ankle Left(B/V)', 600.00, NULL, 1, '2021-10-31 18:40:59', '2021-12-19 05:34:24'),
(257, 'X-Ray Ankle-Right/Left(B/V)', 1200.00, NULL, 1, '2021-10-31 18:41:13', '2021-12-19 05:35:46'),
(258, 'X-Ray Wrist-Right/Left(B/V)', 1200.00, NULL, 1, '2021-10-31 18:41:53', '2021-12-19 05:53:18'),
(259, 'X-Ray Wrist-Right (B/V)', 600.00, NULL, 1, '2021-10-31 18:42:08', '2021-12-19 05:53:40'),
(260, 'X-Ray Wrist Left(B/V)', 600.00, NULL, 1, '2021-10-31 18:42:26', '2021-12-19 05:54:00'),
(261, 'X-Ray Elbow-Right/Left(B/V)', 1200.00, NULL, 1, '2021-10-31 18:43:01', '2021-12-19 05:49:12'),
(262, 'X-Ray Elbow-Right (B/V)', 600.00, NULL, 1, '2021-10-31 18:43:21', '2021-12-19 05:49:34'),
(263, 'X-Ray Elbow Left(B/V)', 600.00, NULL, 1, '2021-10-31 18:43:34', '2021-12-19 05:49:01'),
(264, 'X-Ray Shoulder joint-Right/Left(B/V)', 1200.00, NULL, 1, '2021-10-31 18:44:05', '2022-10-08 09:38:34'),
(265, 'X-Ray Shoulder joint-Right (B/V)', 600.00, NULL, 1, '2021-10-31 18:44:25', '2022-10-08 09:38:41'),
(266, 'X-Ray Shoulder joint Left(B/V)', 600.00, NULL, 1, '2021-10-31 18:44:42', '2022-10-08 09:38:51'),
(267, 'X-Ray Hand Right/Left (B/V)', 1200.00, NULL, 1, '2021-10-31 18:45:04', '2022-10-08 09:42:08'),
(268, 'X-Ray Hand Right (B/V)', 600.00, NULL, 1, '2021-10-31 18:45:16', '2022-10-08 09:42:17'),
(269, 'X-Ray Hand Left (B/V)', 600.00, NULL, 1, '2021-10-31 18:45:37', '2022-10-08 09:42:33'),
(270, 'USG of Pelvis Organ & Adnexa(4D)', 1500.00, NULL, 0, '2021-10-31 18:47:45', '2021-10-31 18:47:45'),
(271, 'USG of Pelvis Organ & Adnexa', 1500.00, NULL, 0, '2021-10-31 18:48:06', '2021-10-31 18:48:06'),
(272, 'USG Left back of the Knee', 1500.00, NULL, 0, '2021-10-31 18:48:43', '2022-10-02 04:55:07'),
(273, 'USG of Whole Abdomen and MCC PVR', 1500.00, NULL, 0, '2021-10-31 18:49:09', '2022-10-02 05:00:49'),
(274, 'USG of Thyroid-2D', 1500.00, NULL, 0, '2021-10-31 18:49:24', '2021-10-31 18:49:24'),
(275, 'USG  KUB,PVR', 1500.00, NULL, 0, '2021-10-31 18:49:39', '2022-10-02 04:54:02'),
(276, 'USG of KUB,PVR & Uroflowmetry', 1500.00, NULL, 0, '2021-10-31 18:50:01', '2021-10-31 18:50:01'),
(277, 'USG of KUB,PELVIS & PVR', 1500.00, NULL, 0, '2021-10-31 18:50:27', '2022-10-02 04:58:54'),
(278, 'USG KUB & Lower Abdomen', 1500.00, NULL, 0, '2021-10-31 18:50:48', '2022-10-02 04:54:12'),
(279, 'USG Chest', 1500.00, NULL, 0, '2021-10-31 18:51:05', '2021-10-31 18:51:05'),
(280, 'USG of UT & Adnexa', 1500.00, NULL, 0, '2021-10-31 18:51:22', '2022-10-02 05:00:29'),
(281, 'USG Lower Abdomen with PVR', 1500.00, NULL, 0, '2021-10-31 18:51:37', '2022-10-02 04:57:12'),
(282, 'USG Lower Abdomen & Prostate', 1500.00, NULL, 0, '2021-10-31 18:51:53', '2022-10-02 04:55:14'),
(283, 'USG of L/A', 1500.00, NULL, 0, '2021-10-31 18:52:08', '2022-09-05 02:47:13'),
(284, 'USG of Upper Abdomen(B/W)', 1500.00, NULL, 0, '2021-10-31 18:52:26', '2022-10-02 05:00:12'),
(285, 'USG KUB & PROSTATE', 1500.00, NULL, 0, '2021-10-31 18:52:41', '2022-10-02 04:54:41'),
(286, 'USG KUB & Lower Abdomen', 1500.00, NULL, 0, '2021-10-31 18:53:01', '2022-10-02 04:54:34'),
(287, 'USG GUIDED OF FNAC With Collection', 4000.00, NULL, 0, '2021-10-31 18:53:20', '2022-09-05 03:02:16'),
(288, 'USG of TVS', 2000.00, NULL, 0, '2021-10-31 18:53:36', '2022-09-05 02:50:07'),
(289, 'USG of HBS(B/W)', 1500.00, NULL, 0, '2021-10-31 18:53:53', '2022-10-02 04:58:04'),
(290, 'USG of KUB(B/W)', 1500.00, NULL, 0, '2021-10-31 18:54:08', '2022-10-02 04:59:22'),
(291, 'USG of Both Breast (B/W)', 2500.00, NULL, 0, '2021-10-31 18:54:29', '2022-09-05 02:54:45'),
(292, 'USG of KUB', 1500.00, NULL, 0, '2021-10-31 18:55:00', '2022-10-02 04:58:14'),
(293, 'USG of KUB and PVR(B/W)', 1500.00, NULL, 0, '2021-10-31 18:55:18', '2022-10-02 04:58:38'),
(294, 'USG of KUB and PVR ©', 1500.00, NULL, 0, '2021-10-31 18:55:35', '2022-10-02 04:58:24'),
(295, 'USG of HBS', 1500.00, NULL, 0, '2021-10-31 18:55:51', '2022-10-02 04:57:52'),
(296, 'USG of Prostate & PV', 1500.00, NULL, 0, '2021-10-31 18:56:09', '2022-09-05 02:53:41'),
(297, 'USG of KUB,Prostate & PVR', 1500.00, NULL, 0, '2021-10-31 18:56:27', '2022-09-05 02:53:59'),
(298, 'Stool R/E,M/E', 300.00, NULL, 1, '2021-10-31 19:07:29', '2022-01-10 22:43:56'),
(299, 'Stool O.B.T', 300.00, NULL, 1, '2021-10-31 19:07:52', '2022-01-10 22:43:46'),
(300, 'Stool R.S/Reducing Substance', 100.00, NULL, 1, '2021-10-31 19:08:32', '2022-01-10 22:43:51'),
(301, 'Stool Floation Method', 200.00, NULL, 1, '2021-10-31 19:09:00', '2022-01-10 22:43:41'),
(302, 'Stool Culture Sensitive C/S', 700.00, NULL, 1, '2021-10-31 19:09:17', '2022-01-10 22:43:32'),
(303, 'E.C.G (12 lead)', 400.00, NULL, 0, '2021-10-31 19:09:32', '2021-10-31 19:09:32'),
(304, 'Ecocardiography(B/W)', 2000.00, NULL, 0, '2021-10-31 19:10:26', '2021-10-31 19:10:26'),
(305, 'Ecocardiography(C', 1500.00, NULL, 1, '2021-10-31 19:10:43', '2021-12-19 05:21:58'),
(306, 'Color Doppler Echo', 2500.00, NULL, 0, '2021-10-31 19:11:20', '2021-10-31 19:11:20'),
(307, 'Digital E.E.G', 3000.00, NULL, 0, '2021-10-31 19:11:38', '2021-10-31 19:11:38'),
(308, 'E.T.T', 3500.00, NULL, 1, '2021-10-31 19:11:54', '2021-12-19 05:20:44'),
(309, 'Endoscopy of Upper GI Tract(Normal)', 1000.00, NULL, 0, '2021-10-31 19:12:15', '2021-10-31 19:12:15'),
(310, 'Video Endoscopy of Upper GI Tract', 1500.00, NULL, 1, '2021-10-31 19:12:30', '2022-01-10 22:59:00'),
(311, 'Video Colonoscopy(Without Medicine', 5000.00, NULL, 0, '2021-10-31 19:12:45', '2021-10-31 19:12:45'),
(312, 'Normal Colonoscopy (Without Medicine)', 3200.00, NULL, 0, '2021-10-31 19:13:00', '2021-10-31 19:13:00'),
(313, 'Endoscopy Biopsy(Taking)', 3000.00, NULL, 1, '2021-10-31 19:13:17', '2021-12-19 05:22:30'),
(314, 'Digital Both Brest', 2000.00, NULL, 1, '2021-10-31 19:14:21', '2022-10-08 09:19:53'),
(315, 'Digital Left Brest', 1000.00, NULL, 1, '2021-10-31 19:14:42', '2022-10-08 09:20:23'),
(316, 'Digital Right Brest', 1000.00, NULL, 1, '2021-10-31 19:14:55', '2021-12-19 05:15:15'),
(317, 'FNAC WITH COLLECTION(2000+1000)', 3000.00, NULL, 0, '2021-10-31 19:16:21', '2022-09-05 02:58:59'),
(318, 'USG GUIDED WITH COLLECTION(1500+1000+800', 3300.00, NULL, 0, '2021-10-31 19:16:39', '2021-10-31 19:16:39'),
(319, 'CT GUIDED FNAC', 7500.00, NULL, 0, '2021-10-31 19:17:05', '2022-09-05 02:57:43'),
(320, 'HISTOPAHOLOGY LARGE', 2500.00, NULL, 0, '2021-10-31 19:17:19', '2022-09-05 03:03:17'),
(321, 'HISTOPAHOLOGY MEDIUM', 1800.00, NULL, 0, '2021-10-31 19:17:44', '2022-09-05 03:03:00'),
(322, 'BONE MARROW', 3000.00, NULL, 1, '2021-10-31 19:18:23', '2021-12-19 05:13:00'),
(323, 'PAPS', 1000.00, NULL, 0, '2021-10-31 19:18:40', '2021-10-31 19:18:40'),
(324, 'MALIGNANT', 1000.00, NULL, 0, '2021-10-31 19:18:59', '2021-10-31 19:18:59'),
(325, 'X-Ray Forearm Right/Left(B/V', 1200.00, NULL, 1, '2021-10-31 19:19:31', '2022-10-08 09:42:48'),
(326, 'X-Ray Forearm Right (B/V', 600.00, NULL, 1, '2021-10-31 19:19:45', '2022-10-08 09:42:58'),
(327, 'X-Ray Forearm Left(B/V', 600.00, NULL, 1, '2021-10-31 19:20:01', '2022-10-08 09:43:05'),
(328, 'Digital X-Ray Ba-Shallow of Oesopgagus', 3000.00, NULL, 1, '2021-10-31 19:20:59', '2022-10-08 09:28:34'),
(329, 'Digital X-Ray Cystogram/retrograde Cysto Urothrogram(with contrast', 4500.00, NULL, 1, '2021-10-31 19:21:19', '2022-10-08 09:26:51'),
(330, 'Digital X-Ray T.Tube Cholingiogram (With Contrast)', 4000.00, NULL, 1, '2021-10-31 19:21:43', '2022-10-08 09:25:59'),
(331, 'Digital X-Ray Hystero-Salpingography (With Contrast)', 4500.00, NULL, 1, '2021-10-31 19:22:06', '2022-10-08 09:24:52'),
(332, 'Anti TB-IGM', 1200.00, NULL, 1, '2021-10-31 19:22:48', '2022-09-11 02:08:32'),
(333, 'X-Ray Arm Right/Left(B/V)', 1200.00, NULL, 1, '2021-10-31 19:25:22', '2021-12-19 05:38:02'),
(334, 'X-Ray Arm Right/Left(B/V)', 1200.00, NULL, 1, '2021-10-31 19:25:22', '2021-12-19 05:38:21'),
(335, 'X-Ray Arm Right (B/V)', 600.00, NULL, 1, '2021-10-31 19:25:38', '2022-10-08 09:40:30'),
(336, 'X-Ray Arm Left(B/V)', 600.00, NULL, 1, '2021-10-31 19:25:53', '2021-12-19 05:38:26'),
(337, 'X-Ray I.V.U/I.V.P (Without Contrast)', 1200.00, NULL, 1, '2021-10-31 19:26:44', '2022-10-08 09:41:58'),
(338, 'Digital X-Ray P.N.S', 600.00, NULL, 1, '2021-10-31 19:27:55', '2022-10-08 09:25:34'),
(339, 'Digital X-Ray Skull(B/V)', 700.00, NULL, 1, '2021-10-31 19:28:19', '2022-10-08 09:25:54'),
(340, 'Digital X-Ray Chest P/A View', 700.00, NULL, 1, '2021-10-31 19:28:35', '2022-10-08 09:30:32'),
(341, 'Digital X-Ray Chest A/P', 700.00, NULL, 1, '2021-10-31 19:28:49', '2022-10-08 09:28:15'),
(342, 'Digital X-Ray Chest Left/Right View(B/V) one side only', 1200.00, NULL, 1, '2021-10-31 19:29:07', '2022-10-08 09:28:01'),
(343, 'Digital X-Ray Chest Left View(B/V) one side only', 600.00, NULL, 1, '2021-10-31 19:29:22', '2022-10-08 09:28:06'),
(344, 'Digital X-Ray Chest Right View(B/V) one side only', 600.00, NULL, 1, '2021-10-31 19:29:40', '2022-10-08 09:26:54'),
(345, 'Digital X-Ray Chest Oblique View-Right/Left(B/V) one side only', 1200.00, NULL, 1, '2021-10-31 19:30:09', '2022-10-08 09:27:46'),
(346, 'Digital X-Ray Chest Oblique View-Right (B/V) one side only', 600.00, NULL, 1, '2021-10-31 19:30:47', '2022-10-08 09:27:50'),
(347, 'Digital X-Ray Chest Oblique View Left(B/V) one side only', 600.00, NULL, 1, '2021-10-31 19:31:00', '2022-10-08 09:27:56'),
(348, 'Digital X-Ray K.U.B Abdomen Ereet Posture', 700.00, NULL, 1, '2021-10-31 19:31:38', '2022-10-08 09:25:11'),
(349, 'Digital X-Ray Cervical Spine (B/V)', 600.00, NULL, 1, '2021-10-31 19:32:03', '2022-10-08 09:30:28'),
(350, 'Digital X-Ray Dorso Lumber Spine (B/V)', 900.00, NULL, 1, '2021-10-31 19:32:20', '2022-10-08 09:26:47'),
(351, 'Digital X-Ray Lumber Sacral Spine(B/V)', 900.00, NULL, 1, '2021-10-31 19:32:40', '2022-10-08 09:25:22'),
(352, 'Digital X-Ray Pelvis With both hop joints(A/P)', 900.00, NULL, 1, '2021-10-31 19:33:05', '2022-10-08 09:25:38'),
(353, 'Digital X-Ray Pelvis With both hop joints(B/V)', 900.00, NULL, 1, '2021-10-31 19:33:34', '2022-10-08 09:25:43'),
(354, 'Digital X-Ray Pelvis With both S.I Joint(A/P)', 900.00, NULL, 1, '2021-10-31 19:33:54', '2022-10-08 09:25:47'),
(355, 'Digital X-Ray Leg (B/V)', 800.00, NULL, 1, '2021-10-31 19:34:26', '2022-10-08 09:25:19'),
(356, 'Digital X-Ray Femur(B/V)', 700.00, NULL, 1, '2021-10-31 19:34:41', '2022-10-08 09:26:25'),
(357, 'Digital X-Ray Thigh Hip(B/V)', 700.00, NULL, 1, '2021-10-31 19:34:56', '2022-10-08 09:26:02'),
(358, 'Digital X-Ray Knee Right(B/V)', 800.00, NULL, 1, '2021-10-31 19:35:11', '2022-10-08 09:25:14'),
(359, 'Digital X-Ray Ankle-Right/Left(B/V)', 1200.00, NULL, 1, '2021-10-31 19:35:30', '2022-10-08 09:23:22'),
(360, 'Digital X-Ray Ankle-Right (B/V)', 600.00, NULL, 1, '2021-10-31 19:35:47', '2022-10-08 09:23:06'),
(361, 'Digital X-Ray Ankle Left(B/V)', 600.00, NULL, 1, '2021-10-31 19:36:18', '2022-10-08 09:22:44'),
(362, 'Digital X-Ray Ankle Left(B/V)', 600.00, NULL, 1, '2021-10-31 19:36:19', '2021-12-19 05:34:52'),
(363, 'Digital X-Ray Ankle Left(B/V)', 600.00, NULL, 1, '2021-10-31 19:36:20', '2021-12-19 05:15:36'),
(364, 'Digital X-Ray Ankle Left(B/V)', 600.00, NULL, 1, '2021-10-31 19:36:20', '2021-12-19 05:15:51'),
(365, 'Digital X-Ray Wrist-Right/Left(B/V)', 1200.00, NULL, 1, '2021-10-31 19:36:43', '2022-10-08 09:26:13'),
(366, 'Digital X-Ray Wrist-Right (B/V)', 600.00, NULL, 1, '2021-10-31 19:37:00', '2022-10-08 09:26:09'),
(367, 'Digital X-Ray Wrist Left(B/V)', 600.00, NULL, 1, '2021-10-31 19:37:17', '2022-10-08 09:26:06'),
(368, 'Digital X-Ray Elbow-Right/Left(B/V)', 1200.00, NULL, 1, '2021-10-31 19:37:33', '2022-10-08 09:26:31'),
(369, 'Digital X-Ray Elbow-Right (B/V)', 600.00, NULL, 1, '2021-10-31 19:37:50', '2022-10-08 09:26:35'),
(370, 'Digital X-Ray Elbow Left(B/V)', 600.00, NULL, 1, '2021-10-31 19:38:06', '2022-10-08 09:26:41'),
(371, 'Digital X-Ray Shoulder joint Right/Left(B/V)', 700.00, NULL, 1, '2021-10-31 19:39:41', '2022-10-08 09:25:50'),
(372, 'Digital X-Ray Hand Right/Left(B/V)', 700.00, NULL, 1, '2021-10-31 19:40:09', '2022-10-08 09:24:47'),
(373, 'Digital X-Ray Forearm Right/Left(B/V)', 700.00, NULL, 1, '2021-10-31 19:40:31', '2022-10-08 09:26:18'),
(374, 'Digital X-Ray Arm Right/Left(B/V)', 1200.00, NULL, 1, '2021-10-31 19:40:57', '2022-10-08 09:24:03'),
(375, 'Digital X-Ray Arm Right (B/V)', 600.00, NULL, 1, '2021-10-31 19:41:14', '2022-10-08 09:23:54'),
(376, 'Digital X-Ray Arm Left(B/V)', 600.00, NULL, 1, '2021-10-31 19:41:27', '2022-10-08 09:23:40'),
(377, 'Digital X-Ray I.V.U/I.V.P (without contrast)2500/=+1200/=contrast', 3800.00, NULL, 1, '2021-10-31 19:41:52', '2022-10-08 09:25:01'),
(378, 'Digital X-Ray I.V.U with MCU 2500/=+1200/= contrast', 3800.00, NULL, 1, '2021-10-31 19:42:42', '2022-10-08 09:24:57'),
(379, 'Digital X-Ray M.C.U with R.C.U 2500/=+1200/=Contrast', 3800.00, NULL, 1, '2021-10-31 19:43:22', '2022-10-08 09:25:29'),
(380, 'Digital X-Ray Fistulogram 2000/=+1200/= Contrast', 3300.00, NULL, 1, '2021-10-31 19:43:48', '2022-10-08 09:26:22'),
(381, 'Digital X-Ray Ba-Enema(Double single contrast)', 2800.00, NULL, 1, '2021-10-31 19:44:07', '2022-10-08 09:28:48'),
(382, 'Digital X-Ray Ba-Follow Through of Intestine', 2800.00, NULL, 1, '2021-10-31 19:44:24', '2022-10-08 09:24:33'),
(383, 'Digital X-Ray Ba-Meal S/D', 1500.00, NULL, 1, '2021-10-31 19:45:59', '2022-10-08 09:28:59'),
(384, 'X-Ray Myelogram for Lumber.Dorsal & Cervical10(Add Contrast)', 3100.00, NULL, 1, '2021-10-31 19:47:52', '2022-10-08 09:39:55'),
(385, 'X-Ray O.C.G (with Contrast)', 600.00, NULL, 1, '2021-10-31 19:48:19', '2022-10-08 09:39:47'),
(386, 'X-Ray T.Tube Cholingiogram(With Contrast)', 1600.00, NULL, 1, '2021-10-31 19:49:27', '2022-10-08 09:38:12'),
(387, 'X-Ray Cystogram/retrograde Cysto Urothogram(With Contrast)', 2500.00, NULL, 1, '2021-10-31 19:49:43', '2022-10-08 09:44:34'),
(388, 'X-Ray Ba-Shallow of Oesopgagus', 900.00, NULL, 1, '2021-10-31 19:50:01', '2022-10-08 09:45:46'),
(389, 'X-Ray Ba-Follow Through', 1500.00, NULL, 1, '2021-10-31 19:50:18', '2022-10-08 09:45:38'),
(390, 'X-Ray Ba-meal S/D', 700.00, NULL, 1, '2021-10-31 19:50:41', '2022-10-08 09:45:42'),
(391, 'X-Ray Ba-Enema(Single With Contrast)', 1000.00, NULL, 1, '2021-10-31 19:51:00', '2022-10-08 09:45:34'),
(392, 'Dengue  (ICT Method)', 1000.00, NULL, 0, '2022-01-03 17:09:32', '2022-01-03 17:09:32'),
(393, 'D-Dimer', 2500.00, NULL, 0, '2022-01-26 03:19:38', '2022-10-02 05:18:28'),
(394, 'S.CREATENINE', 500.00, NULL, 1, '2022-01-31 00:01:19', '2022-10-02 05:06:48'),
(395, 'USG OF W/A', 1500.00, NULL, 0, '2022-01-31 00:01:40', '2022-09-05 02:44:48'),
(396, 'USG OF P/P', 1500.00, NULL, 0, '2022-01-31 00:01:58', '2022-09-14 04:02:05'),
(397, 'S.TSH', 900.00, NULL, 0, '2022-01-31 00:02:19', '2022-09-05 01:34:21'),
(398, 'CBC', 900.00, NULL, 0, '2022-01-31 00:02:34', '2022-09-05 03:21:06'),
(399, 'XRAY L/S', 800.00, NULL, 1, '2022-01-31 00:02:59', '2022-10-08 09:37:00'),
(400, 'RBS', 200.00, NULL, 0, '2022-01-31 00:03:09', '2022-09-05 01:41:16'),
(401, 'PPBS', 200.00, NULL, 0, '2022-01-31 00:03:22', '2022-09-05 01:47:31'),
(402, 'HBA1C', 1300.00, NULL, 0, '2022-01-31 00:03:43', '2022-10-02 05:15:44'),
(403, 'XRAY SOULDER B/W', 800.00, NULL, 1, '2022-01-31 00:04:06', '2022-10-08 09:32:45'),
(404, 'HB%', 120.00, NULL, 1, '2022-01-31 00:04:35', '2022-09-11 02:00:07'),
(405, 'URINE R/M/E', 200.00, NULL, 1, '2022-01-31 00:04:52', '2022-10-02 04:32:11'),
(406, 'ECG', 400.00, NULL, 1, '2022-01-31 00:05:25', '2022-09-11 03:18:51'),
(407, 'ANTI HCV', 1200.00, NULL, 1, '2022-01-31 00:05:42', '2022-09-11 02:07:35'),
(408, 'XRAY PELVIS', 500.00, NULL, 1, '2022-01-31 00:06:20', '2022-10-08 09:33:38'),
(409, 'CRP (Quantative)', 1500.00, NULL, 0, '2022-01-31 00:06:55', '2022-10-02 05:20:51'),
(410, 'CXR Chest P/A VIEW', 800.00, NULL, 1, '2022-01-31 00:07:28', '2022-10-08 09:20:41'),
(411, 'BLOOD GROUPING', 100.00, NULL, 1, '2022-01-31 00:07:43', '2022-08-21 00:13:29'),
(412, 'RA Test', 500.00, NULL, 0, '2022-01-31 00:08:04', '2022-10-02 05:20:09'),
(413, 'S.Electrolytes', 1500.00, NULL, 0, '2022-01-31 00:08:28', '2022-10-02 05:54:27'),
(414, 'D-DIMER', 2500.00, NULL, 1, '2022-01-31 00:09:05', '2022-10-02 05:18:32'),
(415, 'URINE AMYLES', 1400.00, NULL, 1, '2022-01-31 00:09:58', '2022-10-02 04:28:08'),
(416, 'CRP', 700.00, NULL, 1, '2022-01-31 00:10:14', '2022-09-11 02:41:26'),
(417, 'XRAY KUB', 800.00, NULL, 1, '2022-01-31 00:10:47', '2022-10-08 09:37:08'),
(418, 'USG OF KUB+PROSTATE+MCC+PVR', 1500.00, NULL, 0, '2022-01-31 00:11:54', '2022-01-31 00:11:54'),
(419, 'S.BELIRUBIN', 400.00, NULL, 0, '2022-01-31 00:12:25', '2022-01-31 00:12:25'),
(420, 'S. PROLACTIN', 1300.00, NULL, 1, '2022-01-31 00:13:17', '2022-10-02 05:57:26'),
(421, 'USG OF BOTH BREAST', 2500.00, NULL, 0, '2022-01-31 00:13:47', '2022-09-05 02:55:18'),
(422, 'LFT', 1400.00, NULL, 0, '2022-01-31 00:14:26', '2022-09-05 00:10:38'),
(423, 'TROPONINE -I', 1600.00, NULL, 1, '2022-01-31 00:14:50', '2022-10-02 05:52:37'),
(424, 'HBSAG', 400.00, NULL, 1, '2022-01-31 00:15:24', '2022-11-20 00:25:32'),
(425, 'SGPT', 500.00, NULL, 0, '2022-01-31 00:16:27', '2022-09-05 00:13:55'),
(426, 'LEPID PROFAIL', 1200.00, NULL, 0, '2022-01-31 00:17:16', '2022-01-31 00:17:16'),
(427, 'ECHO', 1800.00, NULL, 0, '2022-01-31 00:18:00', '2022-10-02 05:52:01'),
(428, 'XRAY RT FOOT B/V', 800.00, NULL, 1, '2022-02-02 22:21:23', '2022-10-08 09:33:08'),
(429, 'XRAY LT ANKEL & FOOT B/V', 800.00, NULL, 1, '2022-02-04 01:22:49', '2022-10-08 09:36:32'),
(430, 'XRAY TIFIA & FIBULA', 800.00, NULL, 1, '2022-02-04 03:14:25', '2022-10-08 09:32:39'),
(431, 'XRAY OF LT ELBOW', 800.00, NULL, 1, '2022-02-04 03:20:39', '2022-10-08 09:34:00'),
(432, 'S.TSH', 800.00, NULL, 1, '2022-02-05 01:29:38', '2022-09-05 01:34:43'),
(433, 'S.LH', 1300.00, NULL, 0, '2022-02-05 01:31:39', '2022-09-24 02:44:34'),
(434, 'S.FSH', 1300.00, NULL, 0, '2022-02-05 01:32:26', '2022-09-24 02:44:52'),
(435, 'S.PRELECTIN', 1200.00, NULL, 0, '2022-02-05 01:33:43', '2022-02-05 01:33:43'),
(436, 'TVS', 1800.00, NULL, 0, '2022-02-05 01:33:53', '2022-02-05 01:33:53'),
(437, 'xray Of Leg (B/V)', 800.00, NULL, 1, '2022-02-06 04:39:21', '2022-10-08 09:34:15'),
(438, 'xray of hip joint', 800.00, NULL, 1, '2022-02-06 06:56:15', '2022-10-08 09:34:29'),
(439, 'IVU', 3700.00, NULL, 1, '2022-02-06 21:17:30', '2022-10-08 09:31:09'),
(440, 'XRAY OF ABDOMEN', 800.00, NULL, 1, '2022-02-06 21:32:14', '2022-10-08 09:35:56'),
(441, 'XRAY OF SPINE B/V', 800.00, NULL, 1, '2022-02-07 00:54:52', '2022-10-08 09:33:45'),
(442, 'XRAY BOTH KNEE B/V', 1600.00, NULL, 1, '2022-02-07 00:55:17', '2022-10-08 09:37:53'),
(443, 'S.T3', 800.00, NULL, 0, '2022-02-07 01:03:47', '2022-02-07 01:03:47'),
(444, 'S.T4', 800.00, NULL, 0, '2022-02-07 01:04:07', '2022-02-07 01:04:07'),
(445, 'S.T3,S.T4,S.TSH', 1700.00, NULL, 0, '2022-02-07 01:04:42', '2022-09-05 01:33:46'),
(446, 'XRAY LT HAND B/V', 800.00, NULL, 1, '2022-02-07 02:22:21', '2022-10-08 09:36:18'),
(447, 'XRAY OF CERVICAL SPINE', 800.00, NULL, 1, '2022-02-07 02:38:57', '2022-10-08 09:34:50'),
(448, 'XRAY LS SPINE B/V', 800.00, NULL, 1, '2022-02-08 01:33:00', '2022-10-08 09:36:39'),
(449, 'XRAY PELVIS A/P VIEW', 800.00, NULL, 1, '2022-02-08 01:33:28', '2022-10-08 09:33:31'),
(450, 'XRAY L/S DYNAMIC VIEW', 1800.00, NULL, 1, '2022-02-09 01:30:05', '2022-10-08 09:36:47'),
(451, 'FT3', 1200.00, NULL, 0, '2022-02-09 01:40:33', '2022-02-09 01:40:33'),
(452, 'FT4', 1200.00, NULL, 0, '2022-02-09 01:40:46', '2022-02-09 01:40:46'),
(453, 'FT3,FT4,TSH', 3200.00, NULL, 1, '2022-02-09 01:41:17', '2022-03-20 06:38:35'),
(454, 'X-RAY IVU', 4000.00, NULL, 1, '2022-02-09 01:41:34', '2022-10-08 09:41:44'),
(455, 'XRAY LT HAND', 600.00, NULL, 1, '2022-02-11 02:29:44', '2022-10-08 09:36:25'),
(456, 'XRAY OF HAND', 600.00, NULL, 1, '2022-02-11 03:17:35', '2022-10-08 09:34:36'),
(457, 'Vitamin D-3 Lavel', 4500.00, NULL, 0, '2022-02-12 05:36:19', '2022-10-02 05:17:25'),
(458, 'X-RAY Pelvic With Both Hip Joint (A/P)', 800.00, NULL, 1, '2022-02-12 05:36:58', '2022-10-08 09:39:29'),
(459, 'X RAY OF SKALL B/V', 800.00, NULL, 1, '2022-02-12 05:37:22', '2022-10-08 09:46:14'),
(460, 'XRAY OF LEG INCLUDING KNEE AND ANKLE JOINT', 800.00, NULL, 1, '2022-02-12 09:12:19', '2022-10-08 09:34:07'),
(461, 'XRAY OF ARM INCLUDING SHOULDER JOINT', 800.00, NULL, 1, '2022-02-12 09:13:01', '2022-10-08 09:35:40'),
(462, 'MT TEST', 500.00, NULL, 0, '2022-02-14 02:54:09', '2022-02-14 02:54:09'),
(463, 'URINE FOR PT', 200.00, NULL, 0, '2022-02-15 13:16:15', '2022-09-11 03:24:34'),
(464, 'HLAB27', 5000.00, NULL, 0, '2022-02-16 11:55:25', '2022-02-16 11:55:25'),
(465, 'USG OF RT BREAST', 1200.00, NULL, 1, '2022-02-20 05:14:17', '2022-09-05 02:53:02'),
(466, 'XRAY LT WRIST B/V', 800.00, NULL, 1, '2022-02-20 06:23:05', '2022-10-08 09:36:03'),
(467, 'S.TRIGLYCRIDE', 400.00, NULL, 0, '2022-02-21 05:05:25', '2022-02-21 05:05:25'),
(468, 'CBC & PBF', 1500.00, NULL, 0, '2022-02-24 07:22:42', '2022-02-24 07:22:42'),
(469, 'XRAY OF KNEE B/V', 800.00, NULL, 1, '2022-02-24 08:02:31', '2022-10-08 09:34:22'),
(470, 'XRAY OF FOOT B/V', 800.00, NULL, 1, '2022-02-24 08:02:58', '2022-10-08 09:34:42'),
(471, 'XRAY OF ANKEL B/V', 800.00, NULL, 1, '2022-02-24 08:03:16', '2022-10-08 09:35:48'),
(472, 'S.MAGNATIUM', 1500.00, NULL, 0, '2022-03-01 04:33:31', '2022-03-01 04:35:50'),
(473, 'URINE R/M/E & C/S', 1300.00, NULL, 0, '2022-03-01 08:38:56', '2022-03-01 08:38:56'),
(474, 'XRY KUB', 800.00, NULL, 1, '2022-03-01 08:39:24', '2022-10-08 09:32:33'),
(475, 'RBS & CUS', 200.00, NULL, 0, '2022-03-01 08:40:56', '2022-09-05 01:42:13'),
(476, 'SCRINING FUNGAS', 600.00, NULL, 0, '2022-03-02 13:51:14', '2022-03-02 13:51:14'),
(477, 'HB% ELECTROPHORESIS', 2000.00, NULL, 0, '2022-03-03 03:47:01', '2022-03-03 03:47:01'),
(478, 'FERRITIN', 1200.00, NULL, 0, '2022-03-03 03:47:24', '2022-03-03 03:47:24'),
(479, 'XRAY LT SHOLDER B/V', 800.00, NULL, 1, '2022-03-05 05:55:10', '2022-10-08 09:36:10'),
(480, 'XRAY C/S B/V', 800.00, NULL, 1, '2022-03-05 05:55:43', '2022-10-08 09:37:46'),
(481, 'XRAY ELBOW', 800.00, NULL, 1, '2022-03-06 06:20:35', '2022-10-08 09:37:23'),
(482, 'XRAY SHOLDER', 800.00, NULL, 1, '2022-03-06 06:20:50', '2022-10-08 09:32:52'),
(483, 'XRAY DORSOL SPINE', 900.00, NULL, 1, '2022-03-16 07:19:56', '2022-10-08 09:37:30'),
(484, 'XRAY RT WRIST B/V', 800.00, NULL, 1, '2022-03-16 07:21:01', '2022-10-08 09:33:00'),
(485, 'XRAY RT ELBOW B/V', 800.00, NULL, 1, '2022-03-16 07:50:44', '2022-10-08 09:33:15'),
(486, 'xray femar b/w view', 800.00, NULL, 1, '2022-03-16 08:50:54', '2022-10-08 09:37:15'),
(487, '24 HOURS URINARY PROTIN', 1200.00, NULL, 1, '2022-03-18 10:55:11', '2022-09-11 02:06:37'),
(488, 'LOCAL', 2000.00, NULL, 1, '2022-03-22 10:40:25', '2022-07-05 10:57:54'),
(489, 'CA- 15-3', 1500.00, NULL, 0, '2022-03-22 14:40:13', '2022-03-22 14:40:13'),
(490, 'XRAY', 800.00, NULL, 1, '2022-03-22 15:00:37', '2022-10-08 09:38:04'),
(491, 'FT3 ,FT4,TSH', 3300.00, NULL, 0, '2022-03-23 14:30:15', '2022-03-23 14:30:15'),
(492, 'XRAY D/L & L/S BOTH VIEW', 1600.00, NULL, 1, '2022-03-23 14:51:00', '2022-10-08 09:37:37'),
(493, 'CT-SCAN OF HEAD', 4000.00, NULL, 0, '2022-03-27 13:47:12', '2022-03-27 13:47:12'),
(494, 'CT-SCAN OF BRIN', 4000.00, NULL, 0, '2022-03-27 13:47:34', '2022-03-27 13:47:34'),
(495, 'S CELCIUM', 800.00, NULL, 0, '2022-03-28 14:46:11', '2022-03-28 14:46:11'),
(496, 'S.BHCG', 2500.00, NULL, 0, '2022-03-29 19:16:36', '2022-03-29 19:16:36'),
(497, 'S Ferritin', 1200.00, NULL, 0, '2022-04-01 14:39:12', '2022-04-01 14:39:12'),
(498, 'X-RAY DYNAMIC VIEW', 900.00, NULL, 1, '2022-04-02 16:35:11', '2022-10-08 09:43:14'),
(499, 'IGE LEVEL', 1200.00, NULL, 0, '2022-04-03 14:14:23', '2022-04-03 14:14:23'),
(500, 'LOCAL', 500.00, NULL, 1, '2022-04-08 14:51:59', '2022-07-05 10:57:49'),
(501, 'Uriflowmetry', 1500.00, NULL, 0, '2022-04-09 15:07:29', '2022-04-09 15:07:29'),
(502, 'BATA HCG', 1500.00, NULL, 0, '2022-04-10 15:54:01', '2022-04-10 15:54:01'),
(503, 'UROFLOWMETRY', 1500.00, NULL, 0, '2022-04-15 12:59:58', '2022-04-15 12:59:58'),
(504, 'SPSA', 1500.00, NULL, 0, '2022-04-15 13:00:15', '2022-04-15 13:00:15'),
(505, 'OXYGEN 1 HOUR', 300.00, NULL, 0, '2022-04-15 13:06:29', '2022-04-15 13:06:29'),
(506, 'S IRON PROFILE', 2500.00, NULL, 0, '2022-04-18 10:45:45', '2022-04-18 10:45:45'),
(507, 'ANTI CCP', 2800.00, NULL, 1, '2022-04-23 19:03:15', '2022-09-11 02:07:20'),
(508, 'USG', 1500.00, NULL, 0, '2022-05-22 17:23:35', '2022-10-02 04:53:46'),
(509, 'SKIN SCRAPNG FUNGAS TEST', 800.00, NULL, 1, '2022-05-22 20:53:37', '2022-09-19 06:53:03'),
(510, 'XRAY RGU MCU', 4000.00, NULL, 1, '2022-05-23 21:30:01', '2022-10-08 09:33:24'),
(511, 'USG OF KUB,MCC,PVR', 1500.00, NULL, 0, '2022-05-29 17:03:54', '2022-10-02 04:58:46'),
(512, 'Eosinophil count', 300.00, NULL, 0, '2022-05-29 19:52:04', '2022-05-29 19:52:04'),
(513, 'D21-PROGESTERONE', 1500.00, NULL, 0, '2022-06-05 00:59:31', '2022-06-05 00:59:31'),
(514, 'ACTH LEVEL', 1500.00, NULL, 1, '2022-06-17 23:28:34', '2022-09-11 02:06:45'),
(515, 'FBS STRIP', 200.00, NULL, 0, '2022-06-22 01:24:16', '2022-09-11 02:31:55'),
(516, 'PPBS STRIP', 200.00, NULL, 0, '2022-06-22 01:24:30', '2022-09-05 01:47:48'),
(517, 'RBS STRIP', 200.00, NULL, 0, '2022-06-22 01:34:44', '2022-09-11 02:31:34'),
(518, 'SERUM AMH', 5000.00, NULL, 0, '2022-06-27 03:11:51', '2022-06-27 03:11:51'),
(519, 'ANA', 1200.00, NULL, 1, '2022-07-05 03:15:33', '2022-09-11 02:07:17'),
(520, 'ANTI CPK', 1500.00, NULL, 1, '2022-07-07 03:35:07', '2022-09-11 02:07:24'),
(521, 'LAIFACE', 1500.00, NULL, 0, '2022-07-14 01:29:09', '2022-07-14 01:29:09'),
(522, 'Bicar Bonate', 800.00, NULL, 0, '2022-07-16 08:32:40', '2022-07-16 08:32:40'),
(523, 'LOCAL', 1000.00, NULL, 0, '2022-07-27 10:29:31', '2022-07-27 10:29:31'),
(524, 'USG OF RIGHT BREAST', 1500.00, NULL, 0, '2022-07-28 03:12:59', '2022-09-05 02:52:38'),
(525, 'USG OF LEFT BREAST', 1500.00, NULL, 0, '2022-07-28 03:13:19', '2022-09-05 02:51:42'),
(526, 'C 125', 1500.00, NULL, 0, '2022-08-09 08:30:03', '2022-08-09 08:30:03'),
(527, 'OXYGEN', 300.00, NULL, 1, '2022-08-12 23:09:22', '2022-08-12 23:10:51'),
(528, 'ASO Titer', 600.00, NULL, 0, '2022-08-19 05:38:23', '2022-10-02 05:19:20'),
(529, 'Blood Cross Matching', 500.00, NULL, 0, '2022-08-19 05:40:45', '2022-08-19 05:40:45'),
(530, 'NS1', 500.00, NULL, 0, '2022-08-21 23:40:37', '2022-08-21 23:40:37'),
(531, 'XRAY OF PNS', 700.00, NULL, 1, '2022-08-21 23:41:59', '2022-10-08 09:33:52'),
(532, 'S. HLA-B27', 5000.00, NULL, 0, '2022-08-27 02:39:15', '2022-08-27 02:39:15'),
(533, 'ANTI D TITER', 1200.00, NULL, 1, '2022-08-31 07:21:19', '2022-09-11 02:07:26'),
(534, 'FNAC', 3000.00, NULL, 0, '2022-09-05 03:00:21', '2022-09-24 02:40:43'),
(535, 'HISTOPATHOLOGY SMALL', 1500.00, NULL, 0, '2022-09-05 03:04:12', '2022-09-05 03:04:12'),
(536, 'Sputum For AFB(Fasting Caugh)', 700.00, NULL, 0, '2022-09-08 03:32:47', '2022-09-08 03:32:47'),
(537, 'Anti HEV', 1200.00, NULL, 1, '2022-09-08 03:33:58', '2022-09-11 02:07:42'),
(538, 'Anti HAV', 1200.00, NULL, 1, '2022-09-08 03:34:29', '2022-09-11 02:07:30'),
(539, 'Febrile Antigen', 1300.00, NULL, 0, '2022-09-11 02:09:52', '2022-09-11 02:09:52'),
(540, 'Triple Antigen', 1300.00, NULL, 0, '2022-09-11 02:10:16', '2022-09-11 02:10:16'),
(541, 'VDRL', 600.00, NULL, 0, '2022-09-11 02:10:38', '2022-09-11 02:10:38'),
(542, 'T.P.H.A', 700.00, NULL, 0, '2022-09-11 02:11:15', '2022-09-11 02:11:15'),
(543, 'Widal Test', 500.00, NULL, 0, '2022-09-11 02:11:39', '2022-09-11 02:11:39');
INSERT INTO `reportlists` (`id`, `name`, `unitprice`, `related_reagents`, `softdelete`, `created_at`, `updated_at`) VALUES
(544, 'HBS Ag Test', 600.00, NULL, 0, '2022-09-11 02:12:19', '2022-11-20 00:25:21'),
(545, 'HBS Ag(Elisa Method)', 1300.00, NULL, 0, '2022-09-11 02:12:58', '2022-09-11 02:12:58'),
(546, 'HBE Ag Test', 1100.00, NULL, 0, '2022-09-11 02:13:27', '2022-09-11 02:13:27'),
(547, 'Anti HBE(Total)', 1100.00, NULL, 0, '2022-09-11 02:14:09', '2022-09-11 02:14:09'),
(548, 'Mantoux Test', 500.00, NULL, 0, '2022-09-11 02:14:56', '2022-09-11 02:14:56'),
(549, 'A.N.F', 1100.00, 'null', 0, '2022-09-11 02:15:10', '2023-09-30 21:56:25'),
(550, 'Hexagon TB', 800.00, NULL, 0, '2022-09-11 02:15:31', '2022-09-11 02:15:31'),
(551, 'Pregnancy Test', 300.00, NULL, 0, '2022-09-11 02:16:10', '2022-09-11 02:16:10'),
(552, 'Anti DNA(Anti Ds DNa)', 1300.00, NULL, 0, '2022-09-11 02:16:49', '2022-09-11 02:16:49'),
(553, 'HIV Test', 1300.00, NULL, 0, '2022-09-11 02:17:17', '2022-09-11 02:17:17'),
(554, 'Aids Test', 1300.00, 'null', 0, '2022-09-11 02:17:33', '2023-09-30 21:56:34'),
(555, 'Dengue Test', 1300.00, NULL, 0, '2022-09-11 02:17:53', '2022-09-11 02:17:53'),
(556, 'CF-For Filaria', 1300.00, NULL, 0, '2022-09-11 02:18:26', '2022-09-11 02:18:26'),
(557, 'CF-For Kala Zar', 1300.00, NULL, 0, '2022-09-11 02:18:50', '2022-09-11 02:18:50'),
(558, 'Urine For Micro Albumin', 1300.00, NULL, 0, '2022-09-11 02:19:22', '2022-09-11 02:19:22'),
(559, 'RH-Antibody Titry', 1600.00, NULL, 0, '2022-09-11 02:20:01', '2022-09-11 02:20:01'),
(560, 'H-Pylori(IGG)', 1200.00, NULL, 0, '2022-09-11 02:22:16', '2022-09-11 02:22:16'),
(561, 'Complements-C3', 1300.00, NULL, 0, '2022-09-11 02:22:46', '2022-09-11 02:22:46'),
(562, 'Complements-C4', 1300.00, NULL, 0, '2022-09-11 02:23:07', '2022-09-11 02:23:07'),
(563, 'Anti TB-IGA', 1200.00, NULL, 0, '2022-09-11 02:23:50', '2022-09-11 02:23:50'),
(564, 'Anti TB-IGG', 1300.00, NULL, 0, '2022-09-11 02:24:12', '2022-09-11 02:24:12'),
(565, 'Anti TB-IGM', 1300.00, NULL, 0, '2022-09-11 02:24:35', '2022-09-11 02:24:35'),
(566, 'Immunoglobulin IGA', 1300.00, NULL, 0, '2022-09-11 02:25:08', '2022-09-11 02:25:08'),
(567, 'Immunoglobulin IGE', 1300.00, NULL, 0, '2022-09-11 02:25:37', '2022-09-11 02:25:37'),
(568, 'Immunoglobulin IGG', 1300.00, NULL, 0, '2022-09-11 02:26:08', '2022-09-11 02:26:08'),
(569, 'Immunoglobulin IGM', 1300.00, NULL, 0, '2022-09-11 02:26:30', '2022-09-11 02:26:30'),
(570, 'Anti HBs(HBs ab)', 1300.00, NULL, 0, '2022-09-11 02:27:01', '2022-09-11 02:27:01'),
(571, 'Anti HCV', 1400.00, NULL, 0, '2022-09-11 05:52:07', '2022-09-11 05:52:07'),
(572, 'S.Lipase', 1500.00, NULL, 0, '2022-09-11 07:28:06', '2022-09-11 07:28:06'),
(573, 'S.Lipase', 1500.00, NULL, 0, '2022-09-11 07:28:06', '2022-09-11 07:28:06'),
(574, 'S.Magenesium Level', 1500.00, NULL, 0, '2022-09-22 23:41:19', '2022-09-22 23:41:19'),
(575, 'Urine Bile Salts', 200.00, NULL, 0, '2022-10-02 04:33:44', '2022-10-02 04:33:44'),
(576, 'XRAY OF CHEST P/A VIEW', 800.00, NULL, 0, '2022-10-08 09:47:48', '2022-10-08 11:04:49'),
(577, 'XRAY OF CHEST A/P VIEW', 800.00, NULL, 0, '2022-10-08 09:48:24', '2022-10-08 11:04:41'),
(578, 'XRAY OF CHEST P/A VIEW WITH LATERAL VIEW', 1400.00, NULL, 0, '2022-10-08 09:50:55', '2022-10-08 09:50:55'),
(579, 'XRAY OF CHEST A/P VIEW WITH LATERAL VIEW', 1400.00, NULL, 1, '2022-10-08 09:52:02', '2022-10-08 09:52:57'),
(580, 'XRAY OF CHEST A/P VIEW WITH LATERAL VIEW', 1400.00, NULL, 1, '2022-10-08 09:52:02', '2022-10-08 09:53:03'),
(581, 'XRAY OF CHEST A/P VIEW WITH LATERAL VIEW', 1400.00, NULL, 1, '2022-10-08 09:52:27', '2022-10-08 09:53:10'),
(582, 'XRAY OF CHEST A/P VIEW WITH LATERAL VIEW', 1400.00, NULL, 1, '2022-10-08 09:52:27', '2022-10-08 09:53:18'),
(583, 'XRAY OF CHEST A/P VIEW WITH LATERAL VIEW', 1400.00, NULL, 1, '2022-10-08 09:52:27', '2022-10-08 09:53:30'),
(584, 'XRAY OF CHEST A/P VIEW WITH LATERAL VIEW', 1400.00, NULL, 0, '2022-10-08 09:52:27', '2022-10-08 09:52:27'),
(585, 'XRAY OF CHEST P/A VIEW WITH RIGHT OBLIQUE VIEW', 1400.00, NULL, 0, '2022-10-08 09:55:34', '2022-10-08 09:55:34'),
(586, 'XRAY OF CHEST P/A VIEW WITH LEFT OBLIQUE VIEW', 1400.00, NULL, 0, '2022-10-08 09:56:00', '2022-10-08 09:56:00'),
(587, 'XRAY OF CHEST P/A VIEW WITH RIGHT OBLIQUE VIEW WITH LEFT OBLIQUE VIEW', 2100.00, NULL, 0, '2022-10-08 09:57:22', '2022-10-08 09:57:22'),
(588, 'XRAY OF CHEST A/P VIEW WITH RIGHT OBLIQUE VIEW WITH LEFT OBLIQUE VIEW', 2100.00, NULL, 0, '2022-10-08 09:57:46', '2022-10-08 09:57:46'),
(589, 'XRAY OF CHEST A/P VIEW WITH RIGHT OBLIQUE VIEW', 1400.00, NULL, 0, '2022-10-08 09:58:14', '2022-10-08 09:58:14'),
(590, 'XRAY OF CHEST P/A VIEW WITH  LEFT OBLIQUE VIEW', 1400.00, NULL, 0, '2022-10-08 09:58:59', '2022-10-08 09:58:59'),
(591, 'XRAY OF LUMBAR SPINE B/V', 800.00, NULL, 0, '2022-10-08 10:01:29', '2022-10-08 10:01:29'),
(592, 'XRAY OF LUMBAR SPINE B/V WITH DYNAMIC B/V', 1600.00, NULL, 0, '2022-10-08 10:02:22', '2022-10-08 10:02:22'),
(593, 'XRAY OF  DYNAMIC B/V', 800.00, NULL, 0, '2022-10-08 10:02:44', '2022-10-08 10:02:44'),
(594, 'XRAY OF LUMBO SACRAL SPINE B/V', 800.00, NULL, 0, '2022-10-08 10:04:12', '2022-10-08 10:04:12'),
(595, 'XRAY OF DORSAL SPINE B/V', 800.00, NULL, 0, '2022-10-08 10:04:38', '2022-10-08 10:04:38'),
(596, 'XRAY OF THORACO LUMBER SPINE B/V', 800.00, NULL, 0, '2022-10-08 10:08:16', '2022-10-08 10:08:16'),
(597, 'XRAY PLAIN KUB REGION', 800.00, NULL, 0, '2022-10-08 10:09:28', '2022-10-08 10:09:28'),
(598, 'XRAY OF ABDOMIN A/P VIEW', 800.00, NULL, 0, '2022-10-08 10:10:08', '2022-10-08 10:10:08'),
(599, 'XRAY OF ABDOMIN ERRECT POSTURE A/P VIEW', 800.00, NULL, 0, '2022-10-08 10:11:26', '2022-10-08 10:11:26'),
(600, 'XRAY OF RIGHT WRIST JOINT B/V', 800.00, NULL, 0, '2022-10-08 10:16:34', '2022-10-08 10:16:34'),
(601, 'XRAY OF RIGHT FOREARM  B/V', 800.00, NULL, 0, '2022-10-08 10:18:07', '2022-10-08 11:03:26'),
(602, 'XRAY OF RIGHT ELBOW JOINT B/V', 800.00, NULL, 0, '2022-10-08 10:19:20', '2022-10-08 11:03:05'),
(603, 'XRAY OF RIGHT HEND B/V', 800.00, NULL, 0, '2022-10-08 10:19:50', '2022-10-08 11:03:33'),
(604, 'XRAY OF RIGHT ARAM  B/V', 800.00, NULL, 0, '2022-10-08 10:20:22', '2022-10-08 11:02:51'),
(605, 'XRAY OF RIGHT SHOLDER JOINT B/V', 800.00, NULL, 0, '2022-10-08 10:20:53', '2022-10-08 11:03:58'),
(606, 'XRAY OF RIGHT CLAVICAL  B/V', 800.00, NULL, 0, '2022-10-08 10:21:31', '2022-10-08 11:02:58'),
(607, 'XRAY OF LEFT WRIST JOINT B/V', 800.00, NULL, 0, '2022-10-08 10:22:40', '2022-10-08 11:06:00'),
(608, 'XRAY OF LEFT FOREARM B/V', 800.00, NULL, 0, '2022-10-08 10:23:44', '2022-10-08 11:05:25'),
(609, 'XRAY OF LEFT ELBOW JOINT B/V', 800.00, NULL, 0, '2022-10-08 10:24:07', '2022-10-08 11:05:14'),
(610, 'XRAY OF LEFT HEND B/V', 800.00, NULL, 0, '2022-10-08 10:24:35', '2022-10-08 11:05:31'),
(611, 'XRAY OF LEFT ARAM B/V', 800.00, NULL, 0, '2022-10-08 10:24:54', '2022-10-08 11:05:00'),
(612, 'XRAY OF LEFT SHOLDER JOINT B/V', 800.00, NULL, 0, '2022-10-08 10:25:09', '2022-10-08 11:05:48'),
(613, 'XRAY OF LEFT CALVICAL  B/V', 800.00, NULL, 0, '2022-10-08 10:25:37', '2022-10-08 11:05:06'),
(614, 'XRAY OF RIGHT FOOT B/V', 800.00, NULL, 0, '2022-10-08 10:26:17', '2022-10-08 11:03:19'),
(615, 'XRAY OF RIGHT ANKLE JOINT B/V', 800.00, NULL, 0, '2022-10-08 10:27:06', '2022-10-08 11:02:43'),
(616, 'XRAY OF RIGHT LEG B/V', 800.00, NULL, 0, '2022-10-08 10:27:38', '2022-10-08 11:03:46'),
(617, 'XRAY OF RIGHT KNEE JOINT B/V', 800.00, NULL, 0, '2022-10-08 10:28:28', '2022-10-08 11:03:40'),
(618, 'XRAY OF RIGHT FEMUR B/V', 800.00, NULL, 0, '2022-10-08 10:29:45', '2022-10-08 11:03:12'),
(619, 'XRAY OF RIGHT HIP JOINT B/V', 800.00, NULL, 0, '2022-10-08 10:30:54', '2022-10-08 10:30:54'),
(620, 'XRAY OF LEFT FOOT B/V', 800.00, NULL, 0, '2022-10-08 10:31:26', '2022-10-08 10:31:26'),
(621, 'XRAY OF LEFT ANKLE JOINT B/V', 800.00, NULL, 0, '2022-10-08 10:31:48', '2022-10-08 10:31:48'),
(622, 'XRAY OF LEFT LEG B/V', 800.00, NULL, 0, '2022-10-08 10:32:06', '2022-10-08 10:32:06'),
(623, 'XRAY OF LEFT KNEE JOINT B/V', 800.00, NULL, 0, '2022-10-08 10:32:31', '2022-10-08 10:32:31'),
(624, 'XRAY OF LEFT FEMUR B/V', 800.00, NULL, 0, '2022-10-08 10:32:50', '2022-10-08 10:32:50'),
(625, 'XRAY OF LEFT HIP JOINT B/V', 800.00, NULL, 0, '2022-10-08 10:33:45', '2022-10-08 10:33:45'),
(626, 'XRAY OF LEFT THIGH B/V', 800.00, NULL, 0, '2022-10-08 10:36:09', '2022-10-08 10:36:09'),
(627, 'XRAY OF RIGHT THIGH B/V', 800.00, NULL, 0, '2022-10-08 10:36:24', '2022-10-08 10:36:24'),
(628, 'XRAY OF HIP JOINT  A/P VIEW', 800.00, NULL, 0, '2022-10-08 10:37:18', '2022-10-08 10:37:18'),
(629, 'XRAY OF HIP JOINT  B/V', 800.00, NULL, 0, '2022-10-08 10:37:42', '2022-10-08 10:37:42'),
(630, 'XRAY OF CERVICAL SPINE B/V', 800.00, NULL, 0, '2022-10-08 10:42:31', '2022-10-08 10:42:31'),
(631, 'XRAY OF NECK B/V', 800.00, NULL, 0, '2022-10-08 10:43:07', '2022-10-08 10:43:07'),
(632, 'XRAY OF NASOPHARYNX-LATERAL VIEW', 800.00, NULL, 0, '2022-10-08 10:48:07', '2022-10-08 10:48:07'),
(633, 'XRAY OF NASOPHARYNX-LATERAL VIEW WITH OPAN MOUTH', 800.00, NULL, 0, '2022-10-08 10:48:54', '2022-10-08 10:48:54'),
(634, 'XRAY OF SKULL B/V', 800.00, NULL, 0, '2022-10-08 10:50:01', '2022-10-08 10:50:01'),
(635, 'XRAY OF P.N.S OM VIEW', 800.00, NULL, 0, '2022-10-08 10:52:16', '2022-10-08 10:52:16'),
(636, 'IVU', 4000.00, NULL, 0, '2022-10-11 02:01:44', '2022-10-11 02:01:44'),
(637, 'USG OF DUPLEX SCAN OF RIGHT LOWER LIMB VESSELS', 3000.00, NULL, 0, '2022-10-11 03:41:46', '2022-10-11 03:41:46'),
(638, 'BIOPSY FROM LESION', 5000.00, NULL, 0, '2022-10-11 03:42:41', '2022-10-11 03:42:41'),
(639, 'ANTI CCP AB', 2500.00, NULL, 0, '2022-10-11 04:21:37', '2022-10-11 04:21:37'),
(640, 'S.PTH', 2500.00, NULL, 0, '2022-10-23 09:04:43', '2022-10-23 09:04:43'),
(641, 'TPHA', 2500.00, NULL, 0, '2022-10-29 04:27:15', '2022-10-29 04:27:15'),
(642, 'APTT', 1500.00, NULL, 0, '2022-11-01 03:49:26', '2022-11-01 03:49:26'),
(643, 'TORCH', 14000.00, NULL, 0, '2022-11-05 04:26:08', '2022-11-05 04:26:08'),
(644, 'SERUM IGG', 1500.00, NULL, 0, '2022-11-12 06:46:07', '2022-11-12 06:46:07'),
(645, 'SERUM IGM', 1500.00, NULL, 0, '2022-11-12 06:46:39', '2022-11-12 06:46:39'),
(646, 'Anti HBc(TOTAL)', 1300.00, NULL, 0, '2022-11-18 03:50:05', '2022-11-18 03:50:05'),
(647, 'XRAY OF KUB', 800.00, NULL, 0, '2022-11-19 02:52:00', '2022-11-19 02:52:00'),
(648, 'XRAY OF FORAM B/V', 800.00, NULL, 0, '2022-11-19 02:52:48', '2022-11-19 02:52:48'),
(649, 'S. AMYLASE', 1400.00, NULL, 0, '2022-11-19 05:27:04', '2022-11-19 05:27:04'),
(650, 'Blood Transfusion', 1500.00, NULL, 0, '2022-11-22 06:11:31', '2022-11-22 06:11:31'),
(651, 'Urine For PCR', 1000.00, NULL, 0, '2022-11-29 02:56:06', '2022-11-29 02:56:06'),
(652, 'S Prothombin Time', 1200.00, NULL, 0, '2023-01-07 23:08:48', '2023-01-07 23:08:48'),
(653, 'BLOOD TRANSFUTION', 1000.00, NULL, 0, '2023-01-11 08:40:55', '2023-01-11 08:40:55'),
(654, 'AAA', 77.00, '[\"1\",\"2\"]', 1, '2023-02-19 19:57:33', '2023-09-30 21:56:16'),
(655, 'AA', 12.00, 'null', 1, '2023-09-30 21:56:00', '2023-09-30 21:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `reportorders`
--

CREATE TABLE `reportorders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_commission_transition_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discountrefernceid` int(11) DEFAULT NULL,
  `agentdetail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agenttransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `refdoctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `commission` double(10,2) NOT NULL DEFAULT 0.00,
  `due` double(10,2) DEFAULT NULL,
  `pay_in_cash` double(10,2) NOT NULL,
  `pay_by_adv` double(10,2) DEFAULT NULL,
  `totalbeforediscount` double(10,2) DEFAULT NULL,
  `total` double(10,2) NOT NULL,
  `discount` double(10,2) NOT NULL DEFAULT 0.00,
  `refundamount` double(10,2) NOT NULL DEFAULT 0.00,
  `refundbyuser_id` bigint(20) UNSIGNED DEFAULT NULL,
  `refunddate` date DEFAULT NULL,
  `refundbyuser` int(11) DEFAULT NULL,
  `specialconsessionamount` double(10,2) NOT NULL DEFAULT 0.00,
  `specialconsessionbyuser` bigint(20) UNSIGNED DEFAULT NULL,
  `specialconsessiondate` date DEFAULT NULL,
  `specialconsession` tinyint(4) NOT NULL DEFAULT 0,
  `remark` text DEFAULT NULL,
  `deliverydate` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `refund` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reportorders`
--

INSERT INTO `reportorders` (`id`, `user_id`, `doctor_id`, `doctor_commission_transition_id`, `discountrefernceid`, `agentdetail_id`, `agenttransaction_id`, `refdoctor_id`, `patient_id`, `commission`, `due`, `pay_in_cash`, `pay_by_adv`, `totalbeforediscount`, `total`, `discount`, `refundamount`, `refundbyuser_id`, `refunddate`, `refundbyuser`, `specialconsessionamount`, `specialconsessionbyuser`, `specialconsessiondate`, `specialconsession`, `remark`, `deliverydate`, `status`, `refund`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, 45, 4, 0.00, 1000.00, 100.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-01-22', 0, 0, '2023-01-21 18:00:00', '2023-01-22 17:27:05'),
(2, 1, NULL, NULL, NULL, NULL, NULL, 45, 5, 0.00, 2000.00, 400.00, 0.00, 2400.00, 2400.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-01-23', 0, 0, '2023-01-22 18:00:00', '2023-01-22 17:30:44'),
(3, 1, NULL, NULL, NULL, NULL, NULL, 45, 1, 0.00, 1000.00, 100.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-01-23', 0, 0, '2023-01-22 18:00:00', '2023-01-23 03:29:51'),
(4, 1, NULL, NULL, NULL, NULL, NULL, 45, 1, 0.00, 1000.00, 100.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-01-23', 0, 0, '2023-01-22 18:00:00', '2023-01-23 03:32:52'),
(5, 1, NULL, NULL, NULL, NULL, NULL, 45, 1, 0.00, 600.00, 500.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-01-23', 0, 0, '2023-01-23 18:00:00', '2023-01-23 03:33:26'),
(6, 1, NULL, NULL, NULL, NULL, NULL, 45, 1, 0.00, 800.00, 300.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-01-24', 0, 0, '2023-01-23 18:00:00', '2023-01-23 03:36:59'),
(7, 1, NULL, NULL, NULL, NULL, NULL, 45, 1, 0.00, 500.00, 7000.00, 0.00, 7500.00, 7500.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-01-24', 0, 0, '2023-01-24 18:00:00', '2023-01-24 03:32:32'),
(8, 1, NULL, NULL, NULL, NULL, NULL, 45, 4, 0.00, 300.00, 1000.00, 0.00, 1300.00, 1300.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-01-25', 0, 0, '2023-01-24 18:00:00', '2023-01-24 03:46:30'),
(9, 1, NULL, NULL, NULL, NULL, NULL, 45, 5, 0.00, 800.00, 500.00, 0.00, 1300.00, 1300.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-01-24', 0, 0, '2023-01-23 18:00:00', '2023-01-24 03:55:12'),
(10, 1, NULL, NULL, NULL, 3, 1, 13, 5, 0.00, 1100.00, 0.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-01-24', 0, 0, '2023-01-24 18:00:00', '2023-01-24 03:56:44'),
(11, 1, NULL, NULL, NULL, 3, 2, 13, 4, 0.00, 1100.00, 0.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-01-24', 0, 0, '2023-01-23 18:00:00', '2023-01-24 03:57:53'),
(12, 1, NULL, NULL, NULL, NULL, NULL, 45, 1, 0.00, 2400.00, 0.00, 0.00, 2400.00, 2400.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-01-25', 0, 0, '2023-01-24 18:00:00', '2023-01-25 16:46:11'),
(13, 1, NULL, NULL, NULL, NULL, NULL, 45, 1, 0.00, 2500.00, 0.00, 0.00, 2400.00, 2500.00, -100.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-01-31', 0, 0, '2023-01-30 18:00:00', '2023-01-31 16:05:33'),
(14, 1, NULL, NULL, NULL, NULL, NULL, 45, 7, 0.00, 500.00, 500.00, 0.00, 1100.00, 1000.00, 100.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-05', 0, 0, '2023-02-04 18:00:00', '2023-02-05 15:18:24'),
(15, 1, NULL, NULL, NULL, 3, 3, 45, 6, 0.00, 600.00, 500.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-05', 0, 0, '2023-02-04 18:00:00', '2023-02-05 15:24:27'),
(16, 1, NULL, NULL, NULL, 33, 4, 45, 5, 500.00, 2000.00, 400.00, 0.00, 2400.00, 2400.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-05', 0, 0, '2023-02-04 18:00:00', '2023-02-05 15:26:26'),
(17, 1, NULL, NULL, NULL, NULL, NULL, 45, 1, 0.00, 4000.00, 900.00, 0.00, 4900.00, 4900.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-07', 0, 0, '2023-02-06 18:00:00', '2023-02-07 16:10:24'),
(28, 1, NULL, NULL, NULL, NULL, NULL, 45, 1, 0.00, 6200.00, 0.00, 0.00, 6200.00, 6200.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-08', 0, 0, '2023-02-07 18:00:00', '2023-02-07 18:36:16'),
(60, 1, NULL, NULL, NULL, 52, 19, NULL, 7, 100.00, 100.00, 1000.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-10', 0, 0, '2023-02-08 18:00:00', '2023-02-10 07:41:42'),
(61, 1, NULL, NULL, NULL, 52, 20, NULL, 8, 100.00, 600.00, 500.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-10', 0, 0, '2023-02-09 18:00:00', '2023-02-10 07:48:19'),
(62, 1, NULL, NULL, NULL, 52, 21, NULL, 7, 300.00, 300.00, 1000.00, 0.00, 1300.00, 1300.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-11', 0, 0, '2023-02-10 18:00:00', '2023-02-10 07:49:31'),
(63, 1, NULL, NULL, NULL, 52, 22, NULL, 8, 0.00, 1300.00, 0.00, 0.00, 1300.00, 1300.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-10', 0, 0, '2023-02-09 18:00:00', '2023-02-10 07:50:21'),
(68, 1, NULL, NULL, NULL, 16, 23, NULL, 5, 0.00, 1100.00, 0.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-10', 0, 0, '2023-02-09 18:00:00', '2023-02-10 08:48:30'),
(69, 1, 45, 11, NULL, NULL, NULL, 45, 4, 0.00, 3800.00, 0.00, 0.00, 3800.00, 3800.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-10', 0, 0, '2023-02-09 18:00:00', '2023-02-10 11:36:59'),
(70, 1, 45, 12, NULL, NULL, NULL, 45, 7, 0.00, 1300.00, 0.00, 0.00, 1300.00, 1300.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-10', 0, 0, '2023-02-09 18:00:00', '2023-02-10 14:00:59'),
(71, 1, NULL, NULL, NULL, 3, 24, NULL, 1, 0.00, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-10', 0, 0, '2023-02-09 18:00:00', '2023-02-10 14:02:39'),
(72, 1, 56, 13, NULL, NULL, NULL, 56, 14, 0.00, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-10', 0, 0, '2023-02-09 18:00:00', '2023-02-10 14:03:48'),
(73, 1, NULL, NULL, NULL, 33, 25, NULL, 4, 100.00, 800.00, 500.00, 0.00, 1300.00, 1300.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-10', 0, 0, '2023-02-09 18:00:00', '2023-02-10 14:46:51'),
(74, 1, 17, 14, NULL, NULL, NULL, 17, 4, 400.00, 1100.00, 0.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-10', 0, 0, '2023-02-09 18:00:00', '2023-02-10 14:47:44'),
(75, 1, 56, 15, NULL, NULL, NULL, 56, 4, 0.00, 1300.00, 0.00, 0.00, 1300.00, 1300.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-10', 0, 0, '2023-02-09 18:00:00', '2023-02-10 14:49:10'),
(76, 1, 56, 16, NULL, NULL, NULL, 56, 4, 300.00, 1100.00, 0.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-10', 0, 0, '2023-02-09 18:00:00', '2023-02-10 14:50:36'),
(77, 1, 45, 19, NULL, NULL, NULL, 45, 16, 0.00, 3000.00, 3000.00, 0.00, 6200.00, 6000.00, 200.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-12', 0, 0, '2023-02-11 18:00:00', '2023-02-12 18:18:40'),
(78, 1, 26, 20, NULL, NULL, NULL, 26, 5, 0.00, 200.00, 5000.00, 0.00, 5200.00, 5200.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-13', 0, 0, '2023-02-12 18:00:00', '2023-02-20 08:38:22'),
(79, 1, 45, 21, NULL, NULL, NULL, 45, 4, 0.00, 1400.00, 0.00, 0.00, 1400.00, 1400.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-18', 0, 0, '2023-02-17 18:00:00', '2023-02-20 08:43:40'),
(93, 1, 45, 32, NULL, NULL, NULL, 45, 5, 0.00, 2477.00, 0.00, 0.00, 2477.00, 2477.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-20', 0, 0, '2023-02-19 18:00:00', '2023-02-20 10:11:42'),
(96, 1, NULL, NULL, NULL, 3, 30, NULL, 4, 0.00, 2400.00, 0.00, 0.00, 2400.00, 2400.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-20', 0, 0, '2023-02-19 18:00:00', '2023-02-20 11:44:25'),
(97, 1, NULL, NULL, NULL, 3, 31, NULL, 20, 0.00, 1100.00, 0.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-24', 0, 0, '2023-02-23 18:00:00', '2023-02-24 11:49:42'),
(98, 1, 45, 34, NULL, NULL, NULL, 45, 21, 0.00, 100.00, 0.00, 0.00, 1100.00, 100.00, 1000.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-02-25', 0, 0, '2023-02-24 18:00:00', '2023-07-09 17:04:57'),
(101, 1, 45, 36, NULL, NULL, NULL, 45, 1, 0.00, 77.00, 1300.00, 0.00, 1377.00, 1377.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-04-01', 0, 0, '2023-03-31 18:00:00', '2023-04-01 13:23:45'),
(102, 1, 45, 37, NULL, NULL, NULL, 45, 1, 0.00, 900.00, 200.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-05-31', 0, 0, '2023-05-30 18:00:00', '2023-05-30 20:16:42'),
(103, 1, NULL, NULL, NULL, 3, 33, NULL, 1, 0.00, 1100.00, 0.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-05-31', 0, 0, '2023-05-30 18:00:00', '2023-05-31 10:04:54'),
(104, 1, NULL, NULL, NULL, 3, 35, NULL, 1, 0.00, 100.00, 1000.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-05-31', 0, 0, '2023-05-30 18:00:00', '2023-05-31 10:10:13'),
(105, 1, 45, 40, NULL, NULL, NULL, 45, 1, 0.00, 200.00, 800.00, 0.00, 1100.00, 1000.00, 100.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-06-05', 0, 0, '2023-06-04 18:00:00', '2023-06-05 01:18:50'),
(106, 1, 45, 41, NULL, NULL, NULL, 45, 1, 0.00, 200.00, 1000.00, 0.00, 1500.00, 1200.00, 300.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-06-05', 0, 0, '2023-06-04 18:00:00', '2023-06-05 02:14:16'),
(107, 1, 45, 42, NULL, NULL, NULL, 45, 1, 0.00, 1000.00, 1000.00, 0.00, 2400.00, 2000.00, 400.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-06-06', 0, 0, '2023-06-05 18:00:00', '2023-06-06 03:21:02'),
(108, 1, 45, 43, NULL, NULL, NULL, 45, 1, 0.00, 75.00, 0.00, 0.00, 100.00, 75.00, 25.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-06-06', 0, 0, '2023-06-05 18:00:00', '2023-07-09 16:08:31'),
(109, 1, 45, 44, NULL, NULL, NULL, 45, 1, 0.00, 1000.00, 1000.00, 0.00, 2500.00, 2000.00, 500.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-06-06', 0, 0, '2023-06-05 18:00:00', '2023-07-09 16:15:47'),
(110, 1, 45, 45, NULL, NULL, NULL, 45, 21, 0.00, 100.00, 0.00, 0.00, 100.00, 100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-07-09', 0, 0, '2023-07-08 18:00:00', '2023-07-09 17:06:41'),
(111, 1, NULL, NULL, NULL, 3, 37, NULL, 1, 0.00, 1400.00, 0.00, 0.00, 1400.00, 1400.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-10-04', 0, 0, '2023-10-03 18:00:00', '2023-10-03 21:30:25'),
(112, 1, NULL, NULL, NULL, 3, 38, NULL, 1, 0.00, 2000.00, 0.00, 0.00, 2000.00, 2000.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-10-04', 0, 0, '2023-10-03 18:00:00', '2023-10-03 22:28:33'),
(113, 1, NULL, NULL, NULL, 3, 39, NULL, 1, 0.00, 2600.00, 0.00, 0.00, 2600.00, 2600.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-10-04', 0, 0, '2023-10-03 18:00:00', '2023-10-03 22:40:35'),
(114, 1, NULL, NULL, NULL, 3, 40, NULL, 1, 0.00, 600.00, 0.00, 0.00, 600.00, 600.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-10-06', 0, 0, '2023-10-05 18:00:00', '2023-10-06 17:24:27'),
(116, 1, NULL, NULL, NULL, 3, 41, NULL, 1, 0.00, 1100.00, 0.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-10-07', 0, 0, '2023-10-06 18:00:00', '2023-10-07 07:40:26'),
(117, 1, NULL, NULL, NULL, 3, 42, NULL, 1, 0.00, 300.00, 0.00, 0.00, 300.00, 300.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-10-07', 0, 0, '2023-10-06 18:00:00', '2023-10-07 08:02:32'),
(118, 1, NULL, NULL, NULL, 3, 43, NULL, 1, 0.00, 600.00, 0.00, 0.00, 600.00, 600.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-10-07', 0, 0, '2023-10-06 18:00:00', '2023-10-07 09:20:24'),
(119, 1, 45, 47, NULL, NULL, NULL, 45, 1, 0.00, 1000.00, 100.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-12-16', 0, 0, '2023-12-15 18:00:00', '2023-12-16 12:11:20'),
(120, 1, 45, 50, NULL, NULL, NULL, 45, 1, 0.00, 1000.00, 100.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2023-12-17', 0, 0, '2023-12-16 18:00:00', '2023-12-16 19:58:19'),
(121, 1, 45, 53, NULL, NULL, NULL, 45, 1, 0.00, 1100.00, 0.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2024-01-02', 0, 0, '2024-01-01 18:00:00', '2024-01-02 11:34:12'),
(122, 1, 45, 54, NULL, NULL, NULL, 45, 1, 0.00, 1000.00, 100.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2024-01-03', 0, 0, '2024-01-02 18:00:00', '2024-01-03 10:35:04'),
(123, 1, 45, 58, NULL, NULL, NULL, 45, 1, 0.00, 1160.00, 1000.00, 0.00, 2400.00, 2160.00, 240.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2024-01-04', 0, 0, '2024-01-03 18:00:00', '2024-01-04 09:53:24'),
(124, 1, 45, 59, NULL, NULL, NULL, 45, 1, 0.00, 1100.00, 0.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2024-01-04', 0, 0, '2024-01-03 18:00:00', '2024-01-04 12:08:05'),
(125, 1, 45, 60, NULL, NULL, NULL, 45, 1, 0.00, 1000.00, 100.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2024-01-05', 0, 0, '2024-01-04 18:00:00', '2024-01-05 09:47:53'),
(126, 1, 45, 62, NULL, NULL, NULL, 45, 1, 0.00, 1800.00, 400.00, 0.00, 2400.00, 2200.00, 200.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2024-01-08', 0, 0, '2024-01-07 18:00:00', '2024-01-08 09:37:54'),
(127, 1, 45, 63, NULL, NULL, NULL, 45, 1, 0.00, 2000.00, 200.00, 0.00, 2400.00, 2200.00, 200.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2024-01-09', 0, 0, '2024-01-08 18:00:00', '2024-01-09 09:57:36'),
(128, 1, 45, 66, NULL, NULL, NULL, 45, 1, 0.00, 1999.00, 401.00, 0.00, 2400.00, 2400.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2024-01-11', 0, 0, '2024-01-10 18:00:00', '2024-01-11 11:48:36'),
(129, 1, 45, 69, NULL, NULL, NULL, 45, 1, 0.00, 8.55, 100.00, 0.00, 600.00, 108.55, 491.45, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2024-01-11', 0, 0, '2024-01-10 18:00:00', '2024-01-15 15:45:29'),
(130, 1, 45, 73, NULL, NULL, NULL, 45, 7, 50.00, 0.00, 500.00, 600.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2024-03-02', 0, 0, '2024-03-01 18:00:00', '2024-03-02 11:46:06'),
(131, 1, 45, 74, NULL, NULL, NULL, 45, 7, 0.00, 0.00, 401.00, 0.00, 1300.00, 1300.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2024-03-02', 0, 0, '2024-03-01 18:00:00', '2024-03-02 12:15:52'),
(132, 1, 45, 75, NULL, NULL, NULL, 45, 7, 0.00, 0.00, 300.00, 0.00, 1300.00, 1300.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2024-03-02', 0, 0, '2024-03-01 18:00:00', '2024-03-02 12:17:49'),
(133, 1, 45, 76, NULL, NULL, NULL, 45, 7, 0.00, 800.00, 300.00, 0.00, 1100.00, 1100.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, NULL, '2024-03-02', 0, 0, '2024-03-01 18:00:00', '2024-03-02 12:32:10'),
(142, 1, 45, 88, NULL, NULL, NULL, 45, 37, 0.00, 1300.00, 0.00, 0.00, 1300.00, 1300.00, 0.00, 0.00, NULL, NULL, NULL, 0.00, NULL, NULL, 0, 'cxcxc', '2024-03-01', 0, 0, '2024-03-23 19:22:00', '2024-03-30 19:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `reporttransactions`
--

CREATE TABLE `reporttransactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reportlist_id` bigint(20) UNSIGNED NOT NULL,
  `reportorder_id` int(10) UNSIGNED NOT NULL,
  `serialnumber` int(11) DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit` double(10,4) NOT NULL,
  `vat` double(10,4) DEFAULT NULL,
  `totalvat` double(10,4) NOT NULL,
  `unitprice` double(10,4) DEFAULT NULL,
  `discount` double(10,4) DEFAULT NULL,
  `totaldiscount` double(10,4) NOT NULL,
  `amount` double(10,4) NOT NULL,
  `adjust` double(10,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reporttransactions`
--

INSERT INTO `reporttransactions` (`id`, `reportlist_id`, `reportorder_id`, `serialnumber`, `patient_id`, `doctor_id`, `unit`, `vat`, `totalvat`, `unitprice`, `discount`, `totaldiscount`, `amount`, `adjust`, `created_at`, `updated_at`) VALUES
(1, 549, 1, NULL, 4, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-01-21 18:00:00', '2023-01-22 17:27:05'),
(2, 549, 2, NULL, 5, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-01-22 18:00:00', '2023-01-22 17:30:44'),
(3, 554, 2, NULL, 5, NULL, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-01-22 18:00:00', '2023-01-22 17:30:44'),
(4, 549, 3, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-01-22 18:00:00', '2023-01-23 03:29:51'),
(5, 549, 4, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-01-22 18:00:00', '2023-01-23 03:32:52'),
(6, 549, 5, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-01-23 18:00:00', '2023-01-23 03:33:26'),
(7, 549, 6, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-01-23 18:00:00', '2023-01-23 03:36:59'),
(8, 549, 7, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-01-24 18:00:00', '2023-01-24 03:32:33'),
(9, 554, 7, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-01-24 18:00:00', '2023-01-24 03:32:33'),
(10, 639, 7, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 2500.0000, 0.0000, 0.0000, 2500.0000, 2500.0000, '2023-01-24 18:00:00', '2023-01-24 03:32:33'),
(11, 552, 7, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-01-24 18:00:00', '2023-01-24 03:32:33'),
(12, 646, 7, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-01-24 18:00:00', '2023-01-24 03:32:33'),
(13, 552, 8, NULL, 4, NULL, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-01-24 18:00:00', '2023-01-24 03:46:30'),
(14, 552, 9, NULL, 5, NULL, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-01-23 18:00:00', '2023-01-24 03:55:12'),
(15, 549, 10, NULL, 5, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-01-24 18:00:00', '2023-01-24 03:56:44'),
(16, 549, 11, NULL, 4, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-01-23 18:00:00', '2023-01-24 03:57:53'),
(17, 549, 12, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-01-24 18:00:00', '2023-01-25 16:46:11'),
(18, 554, 12, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-01-24 18:00:00', '2023-01-25 16:46:11'),
(19, 549, 13, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-01-30 18:00:00', '2023-01-31 16:05:33'),
(20, 554, 13, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-01-30 18:00:00', '2023-01-31 16:05:33'),
(21, 549, 14, NULL, 7, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 9.0909, 100.0000, 1000.0000, 1000.0000, '2023-02-04 18:00:00', '2023-02-05 15:18:24'),
(22, 549, 15, NULL, 6, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-02-04 18:00:00', '2023-02-05 15:24:27'),
(23, 549, 16, NULL, 5, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-02-04 18:00:00', '2023-02-05 15:26:26'),
(24, 554, 16, NULL, 5, NULL, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-02-04 18:00:00', '2023-02-05 15:26:26'),
(25, 549, 17, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-02-06 18:00:00', NULL),
(26, 554, 17, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-02-06 18:00:00', NULL),
(27, 639, 17, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 2500.0000, 0.0000, 0.0000, 2500.0000, 2500.0000, '2023-02-06 18:00:00', NULL),
(62, 549, 28, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-02-07 18:00:00', '2023-02-07 18:36:16'),
(63, 554, 28, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-02-07 18:00:00', '2023-02-07 18:36:16'),
(64, 639, 28, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 2500.0000, 0.0000, 0.0000, 2500.0000, 2500.0000, '2023-02-07 18:00:00', '2023-02-07 18:36:16'),
(65, 552, 28, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-02-07 18:00:00', '2023-02-07 18:36:16'),
(125, 549, 60, NULL, 7, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-02-08 18:00:00', '2023-02-10 07:41:42'),
(126, 549, 61, NULL, 8, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-02-09 18:00:00', '2023-02-10 07:48:19'),
(127, 552, 62, NULL, 7, NULL, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-02-10 18:00:00', '2023-02-10 07:49:31'),
(128, 552, 63, NULL, 8, NULL, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-02-09 18:00:00', '2023-02-10 07:50:21'),
(133, 549, 68, NULL, 5, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-02-09 18:00:00', '2023-02-10 08:48:30'),
(134, 639, 69, NULL, 4, 45, 1.0000, 0.0000, 0.0000, 2500.0000, 0.0000, 0.0000, 2500.0000, 2500.0000, '2023-02-09 18:00:00', '2023-02-10 11:36:59'),
(135, 552, 69, NULL, 4, 45, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-02-09 18:00:00', '2023-02-10 11:36:59'),
(136, 554, 70, NULL, 7, 45, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-02-09 18:00:00', '2023-02-10 14:00:59'),
(137, 639, 71, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 2500.0000, 0.0000, 0.0000, 2500.0000, 2500.0000, '2023-02-09 18:00:00', '2023-02-10 14:02:39'),
(138, 639, 72, NULL, 14, 56, 1.0000, 0.0000, 0.0000, 2500.0000, 0.0000, 0.0000, 2500.0000, 2500.0000, '2023-02-09 18:00:00', '2023-02-10 14:03:49'),
(139, 554, 73, NULL, 4, NULL, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-02-09 18:00:00', '2023-02-10 14:46:51'),
(140, 549, 74, NULL, 4, 17, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-02-09 18:00:00', '2023-02-10 14:47:44'),
(141, 554, 75, NULL, 4, 56, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-02-09 18:00:00', '2023-02-10 14:49:10'),
(142, 549, 76, NULL, 4, 56, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-02-09 18:00:00', '2023-02-10 14:50:36'),
(143, 549, 77, NULL, 16, 45, 1.0000, 0.0000, 0.0000, 1100.0000, 3.2258, 35.4839, 1064.5161, 1064.5161, '2023-02-11 18:00:00', '2023-02-12 18:18:40'),
(144, 554, 77, NULL, 16, 45, 1.0000, 0.0000, 0.0000, 1300.0000, 3.2258, 41.9355, 1258.0645, 1258.0645, '2023-02-11 18:00:00', '2023-02-12 18:18:40'),
(145, 639, 77, NULL, 16, 45, 1.0000, 0.0000, 0.0000, 2500.0000, 3.2258, 80.6453, 2419.3547, 2419.3547, '2023-02-11 18:00:00', '2023-02-12 18:18:40'),
(146, 552, 77, NULL, 16, 45, 1.0000, 0.0000, 0.0000, 1300.0000, 3.2258, 41.9355, 1258.0645, 1258.0645, '2023-02-11 18:00:00', '2023-02-12 18:18:40'),
(172, 570, 78, NULL, NULL, 26, 1.0000, 0.0000, 0.0000, NULL, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-02-12 18:00:00', '2023-02-20 08:38:22'),
(173, 552, 78, NULL, NULL, 26, 1.0000, 0.0000, 0.0000, NULL, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-02-12 18:00:00', '2023-02-20 08:38:22'),
(174, 646, 78, NULL, NULL, 26, 1.0000, 0.0000, 0.0000, NULL, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-02-12 18:00:00', '2023-02-20 08:38:22'),
(175, 554, 78, NULL, NULL, 26, 1.0000, 0.0000, 0.0000, NULL, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-02-12 18:00:00', '2023-02-20 08:38:22'),
(176, 571, 79, NULL, NULL, 45, 1.0000, 0.0000, 0.0000, NULL, 0.0000, 0.0000, 1400.0000, 1400.0000, '2023-02-17 18:00:00', '2023-02-20 08:43:40'),
(182, 549, 93, NULL, 5, 45, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-02-19 18:00:00', '2023-02-20 10:11:42'),
(183, 654, 93, NULL, 5, 45, 1.0000, 0.0000, 0.0000, 77.0000, 0.0000, 0.0000, 77.0000, 77.0000, '2023-02-19 18:00:00', '2023-02-20 10:11:42'),
(184, 554, 93, NULL, 5, 45, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-02-19 18:00:00', '2023-02-20 10:11:42'),
(198, 549, 96, NULL, NULL, NULL, 1.0000, 0.0000, 0.0000, NULL, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-02-19 18:00:00', '2023-02-20 11:44:26'),
(199, 554, 96, NULL, NULL, NULL, 1.0000, 0.0000, 0.0000, NULL, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-02-19 18:00:00', '2023-02-20 11:44:26'),
(200, 549, 97, NULL, 20, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-02-23 18:00:00', '2023-02-24 11:49:42'),
(209, 549, 101, NULL, NULL, 45, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2023-03-31 18:00:00', '2023-04-01 13:23:45'),
(210, 654, 101, NULL, NULL, 45, 1.0000, 0.0000, 0.0000, 77.0000, 0.0000, 0.0000, 77.0000, 77.0000, '2023-03-31 18:00:00', '2023-04-01 13:23:45'),
(211, 549, 102, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-05-30 18:00:00', '2023-05-30 20:16:42'),
(212, 549, 103, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-05-30 18:00:00', '2023-05-31 10:04:54'),
(213, 549, 104, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-05-30 18:00:00', '2023-05-31 10:10:13'),
(214, 549, 105, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1100.0000, 9.0909, 100.0000, 1000.0000, 1000.0000, '2023-06-04 18:00:00', '2023-06-05 01:18:50'),
(215, 549, 106, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1500.0000, 0.0000, 300.0000, 1500.0000, 1200.0000, '2023-06-04 18:00:00', '2023-06-05 02:14:16'),
(216, 549, 107, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1100.0000, 16.6667, 183.3334, 1100.0000, 916.6666, '2023-06-05 18:00:00', '2023-06-06 03:21:02'),
(217, 554, 107, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1300.0000, 16.6667, 216.6667, 1300.0000, 1083.3333, '2023-06-05 18:00:00', '2023-06-06 03:21:02'),
(221, 654, 108, NULL, NULL, 45, 1.0000, 0.0000, 0.0000, 100.0000, 25.0000, 25.0000, 77.0000, 75.0000, '2023-06-05 18:00:00', '2023-07-09 16:08:31'),
(222, 639, 109, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 2500.0000, 0.0000, 500.0000, 2500.0000, 2000.0000, '2023-06-05 18:00:00', '2023-07-09 16:15:47'),
(225, 549, 98, NULL, 21, 45, 1.0000, 0.0000, 0.0000, 100.0000, 0.0000, 0.0000, 1100.0000, 100.0000, '2023-02-24 18:00:00', '2023-07-09 17:04:57'),
(226, 549, 110, NULL, 21, 45, 1.0000, 0.0000, 0.0000, 100.0000, 0.0000, 0.0000, 100.0000, 100.0000, '2023-07-08 18:00:00', '2023-07-09 17:06:41'),
(227, 171, 111, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1400.0000, 0.0000, 0.0000, 1400.0000, 1400.0000, '2023-10-03 18:00:00', '2023-10-03 21:30:26'),
(228, 571, 112, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1400.0000, 0.0000, 0.0000, 1400.0000, 1400.0000, '2023-10-03 18:00:00', '2023-10-03 22:28:33'),
(229, 528, 112, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 600.0000, 0.0000, 0.0000, 600.0000, 600.0000, '2023-10-03 18:00:00', '2023-10-03 22:28:33'),
(230, 9, 113, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1400.0000, 0.0000, 0.0000, 1400.0000, 1400.0000, '2023-10-03 18:00:00', '2023-10-03 22:40:35'),
(231, 105, 113, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1200.0000, 0.0000, 0.0000, 1200.0000, 1200.0000, '2023-10-03 18:00:00', '2023-10-03 22:40:35'),
(237, 45, 114, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 300.0000, 0.0000, 0.0000, 300.0000, 300.0000, '2023-10-05 18:00:00', '2023-10-06 17:07:30'),
(238, 46, 114, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 300.0000, 0.0000, 0.0000, 300.0000, 300.0000, '2023-10-05 18:00:00', '2023-10-06 17:07:30'),
(241, 549, 116, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-10-06 18:00:00', '2023-10-07 07:40:26'),
(242, 46, 117, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 300.0000, 0.0000, 0.0000, 300.0000, 300.0000, '2023-10-06 18:00:00', '2023-10-07 08:02:32'),
(243, 45, 118, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 300.0000, 0.0000, 0.0000, 300.0000, 300.0000, '2023-10-06 18:00:00', '2023-10-07 09:20:24'),
(244, 46, 118, NULL, 1, NULL, 1.0000, 0.0000, 0.0000, 300.0000, 0.0000, 0.0000, 300.0000, 300.0000, '2023-10-06 18:00:00', '2023-10-07 09:20:24'),
(245, 549, 119, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-12-15 18:00:00', '2023-12-16 12:11:20'),
(246, 549, 120, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2023-12-16 18:00:00', '2023-12-16 19:58:19'),
(247, 549, 121, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2024-01-01 18:00:00', '2024-01-02 11:34:12'),
(248, 549, 122, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2024-01-02 18:00:00', '2024-01-03 10:35:04'),
(249, 549, 123, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1100.0000, 10.0000, 110.0000, 1100.0000, 990.0000, '2024-01-03 18:00:00', '2024-01-04 09:53:24'),
(250, 554, 123, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1300.0000, 10.0000, 130.0000, 1300.0000, 1170.0000, '2024-01-03 18:00:00', '2024-01-04 09:53:24'),
(251, 549, 124, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2024-01-03 18:00:00', '2024-01-04 12:08:05'),
(252, 549, 125, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2024-01-04 18:00:00', '2024-01-05 09:47:53'),
(253, 549, 126, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1100.0000, 8.3333, 91.6666, 1100.0000, 1008.3334, '2024-01-07 18:00:00', '2024-01-08 09:37:54'),
(254, 554, 126, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1300.0000, 8.3333, 108.3333, 1300.0000, 1191.6667, '2024-01-07 18:00:00', '2024-01-08 09:37:54'),
(255, 549, 127, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1100.0000, 8.3333, 91.6666, 1100.0000, 1008.3334, '2024-01-08 18:00:00', '2024-01-09 09:57:36'),
(256, 554, 127, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1300.0000, 8.3333, 108.3333, 1300.0000, 1191.6667, '2024-01-08 18:00:00', '2024-01-09 09:57:36'),
(260, 549, 128, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2024-01-10 18:00:00', '2024-01-11 11:48:36'),
(261, 554, 128, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2024-01-10 18:00:00', '2024-01-11 11:48:36'),
(263, 528, 129, NULL, 1, 45, 1.0000, 0.0000, 0.0000, 600.0000, 81.9091, 491.4500, 600.0000, 108.5500, '2024-01-10 18:00:00', '2024-01-15 15:45:29'),
(264, 549, 130, NULL, 7, 45, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2024-03-01 18:00:00', '2024-03-02 11:46:06'),
(267, 554, 131, NULL, 7, 45, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2024-03-01 18:00:00', '2024-03-02 12:15:52'),
(269, 554, 132, NULL, 7, 45, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2024-03-01 18:00:00', '2024-03-02 12:17:49'),
(271, 549, 133, NULL, 7, 45, 1.0000, 0.0000, 0.0000, 1100.0000, 0.0000, 0.0000, 1100.0000, 1100.0000, '2024-03-01 18:00:00', '2024-03-02 12:32:10'),
(282, 552, 142, NULL, 37, 45, 1.0000, 0.0000, 0.0000, 1300.0000, 0.0000, 0.0000, 1300.0000, 1300.0000, '2024-03-23 19:22:00', '2024-03-30 19:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `returnmedicinetransactions`
--

CREATE TABLE `returnmedicinetransactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` bigint(20) UNSIGNED NOT NULL,
  `return_order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit` double(14,4) NOT NULL,
  `vat` double(14,4) DEFAULT NULL,
  `totalvat` double(14,4) NOT NULL,
  `discount` double(14,4) DEFAULT NULL,
  `totaldiscount` double(10,4) NOT NULL,
  `amount` double(14,4) NOT NULL,
  `adjust` double(14,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `return_orders`
--

CREATE TABLE `return_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `total_cost_before_initial_vat_and_discount` double(14,4) DEFAULT NULL,
  `total` double(14,4) NOT NULL,
  `adjustment` double(14,4) NOT NULL,
  `transitiontype` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_orders`
--

INSERT INTO `return_orders` (`id`, `user_id`, `patient_id`, `total_cost_before_initial_vat_and_discount`, `total`, `adjustment`, `transitiontype`, `created_at`, `updated_at`) VALUES
(28, 1, 7, 70.0000, 70.0000, 0.0000, 1, '2023-02-26 18:17:00', '2023-02-26 18:17:00'),
(29, 1, 12, 400.0000, 400.0000, 0.0000, 2, '2023-02-26 18:24:08', '2023-02-26 18:24:08'),
(35, 1, 7, 1400.0000, 1400.0000, 0.0000, 1, '2024-01-11 18:00:00', '2024-01-13 12:22:39'),
(36, 1, 7, 1400.0000, 1400.0000, 0.0000, 1, NULL, '2024-01-13 12:25:23'),
(37, 1, 7, 1400.0000, 1400.0000, 0.0000, 1, NULL, '2024-01-13 12:27:18'),
(38, 1, 12, 70.0000, 70.0000, 0.0000, 1, '2024-01-12 18:00:00', '2024-01-13 12:52:13'),
(39, 1, 7, 1.0000, 1.0000, 0.0000, 1, '2024-01-13 13:30:16', '2024-01-13 13:30:16'),
(40, 1, 19, 8000.0000, 8000.0000, 0.0000, 1, '2024-01-13 13:31:31', '2024-01-13 13:31:31'),
(41, 1, 12, 20.0000, 20.0000, 0.0000, 1, '2024-01-11 18:00:00', '2024-01-13 13:46:17'),
(42, 1, 25, 10.5000, 10.5000, 0.0000, 1, '2024-01-11 18:00:00', '2024-01-13 13:46:58'),
(43, 1, 7, 800.0000, 800.0000, 0.0000, 1, '2024-03-09 11:29:12', '2024-03-09 11:29:46'),
(44, 1, 11, 210.0000, 210.0000, 0.0000, 1, '2024-03-09 11:29:12', '2024-03-09 11:30:08'),
(45, 1, 7, 3.0000, 3.0000, 0.0000, 1, '2024-03-09 13:03:14', '2024-03-09 13:06:12'),
(46, 1, 7, 35.0000, 35.0000, 0.0000, 1, '2024-03-09 13:03:14', '2024-03-09 13:06:44'),
(48, 1, 7, 100.0000, 100.0000, 0.0000, 1, '2024-03-14 09:07:10', '2024-03-17 09:07:51'),
(54, 38, 7, 25.0000, 25.0000, 0.0000, 1, '2024-04-10 13:16:57', '2024-04-10 13:18:13'),
(55, 38, 7, 200.0000, 200.0000, 0.0000, 1, '2024-04-17 17:58:36', '2024-04-13 18:03:53'),
(56, 38, 1, 25.0000, 25.0000, 0.0000, 1, '2024-04-08 08:47:25', '2024-04-14 08:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(15, 'System Admin', 'web', '2024-03-31 13:52:02', '2024-03-31 13:52:02'),
(26, 'Test', 'web', '2024-04-03 07:57:30', '2024-04-03 07:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(579, 26),
(580, 26);

-- --------------------------------------------------------

--
-- Table structure for table `rootmenus`
--

CREATE TABLE `rootmenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rootmenus`
--

INSERT INTO `rootmenus` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(7, 'xcxc', 1, '2024-04-23 12:32:39', '2024-04-23 12:32:39'),
(8, 'fdfdf', 1, '2024-04-23 12:55:07', '2024-04-23 12:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `servicelistinhospitals`
--

CREATE TABLE `servicelistinhospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `servicename` varchar(255) NOT NULL,
  `price` double(14,4) NOT NULL,
  `service_type` tinyint(4) NOT NULL DEFAULT 0,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servicelistinhospitals`
--

INSERT INTO `servicelistinhospitals` (`id`, `servicename`, `price`, `service_type`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, 'Plaster', 2000.0000, 0, 0, '2022-07-05 10:58:48', '2023-01-14 23:40:29'),
(2, 'Drainage', 1000.0000, 0, 0, '2022-07-22 06:37:17', '2023-01-14 23:38:47'),
(3, 'Service Charge', 1000.0000, 0, 0, '2022-10-15 09:13:56', '2023-01-14 23:40:11'),
(4, 'Ambulance', 1000.0000, 0, 0, '2022-10-22 07:20:45', '2023-01-14 23:39:16'),
(5, 'Ex Cabin Charge', 1000.0000, 1, 0, '2023-01-16 05:08:10', '2023-01-16 05:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `serviceorders`
--

CREATE TABLE `serviceorders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_commission_transition_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discountrefernceid` int(11) DEFAULT NULL,
  `agentdetail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agenttransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `refdoctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `refundamount` double(10,2) NOT NULL DEFAULT 0.00,
  `refundbyuser_id` bigint(20) UNSIGNED DEFAULT NULL,
  `refunddate` date DEFAULT NULL,
  `refundbyuser` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `refund` tinyint(4) NOT NULL DEFAULT 0,
  `total` double(12,2) NOT NULL,
  `discount` double(12,2) DEFAULT NULL,
  `receiveableamount` double(12,2) DEFAULT NULL,
  `paid` double(12,2) NOT NULL,
  `due_adjust_from_advance` double(12,2) NOT NULL,
  `due` double(12,2) NOT NULL,
  `commission` double(12,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serviceorders`
--

INSERT INTO `serviceorders` (`id`, `patient_id`, `user_id`, `doctor_id`, `doctor_commission_transition_id`, `discountrefernceid`, `agentdetail_id`, `agenttransaction_id`, `refdoctor_id`, `remark`, `refundamount`, `refundbyuser_id`, `refunddate`, `refundbyuser`, `status`, `refund`, `total`, `discount`, `receiveableamount`, `paid`, `due_adjust_from_advance`, `due`, `commission`, `created_at`, `updated_at`) VALUES
(1, 12, 1, NULL, NULL, NULL, NULL, NULL, 45, NULL, 0.00, NULL, NULL, NULL, 0, 0, 1000.00, 0.00, 1000.00, 0.00, 0.00, 1000.00, 0.00, '2023-02-11 18:00:00', '2023-02-11 19:43:16'),
(2, 1, 1, 45, 57, NULL, NULL, NULL, 45, NULL, 0.00, NULL, NULL, NULL, 0, 0, 1000.00, 0.00, 1000.00, 100.00, 0.00, 900.00, 0.00, '2024-01-03 18:00:00', '2024-01-04 09:47:06'),
(3, 1, 1, 45, 61, NULL, NULL, NULL, 45, NULL, 0.00, NULL, NULL, NULL, 0, 0, 1000.00, 0.00, 1000.00, 80.00, 0.00, 920.00, 0.00, '2024-01-04 18:00:00', '2024-01-05 09:49:29'),
(4, 1, 1, NULL, NULL, NULL, NULL, NULL, 45, NULL, 0.00, NULL, NULL, NULL, 0, 0, 1000.00, 100.00, 900.00, 800.00, 0.00, 100.00, 0.00, '2024-01-04 18:00:00', '2024-01-05 09:56:03'),
(5, 1, 1, NULL, NULL, NULL, NULL, NULL, 45, NULL, 0.00, NULL, NULL, NULL, 0, 0, 1800.00, 800.00, 1000.00, 0.00, 0.00, 1000.00, 0.00, '2024-01-04 18:00:00', '2024-01-05 10:00:46'),
(6, 1, 1, NULL, NULL, NULL, NULL, NULL, 45, NULL, 0.00, NULL, NULL, NULL, 0, 0, 1000.00, 100.00, 900.00, 200.00, 0.00, 700.00, 0.00, '2024-01-07 18:00:00', '2024-01-08 09:39:13'),
(7, 1, 1, NULL, NULL, NULL, NULL, NULL, 45, NULL, 0.00, NULL, NULL, NULL, 0, 0, 2000.00, 200.00, 1800.00, 800.00, 0.00, 1000.00, 0.00, '2024-01-09 18:00:00', '2024-01-09 19:02:52'),
(8, 1, 1, NULL, NULL, NULL, NULL, NULL, 45, NULL, 0.00, NULL, NULL, NULL, 0, 0, 2000.00, 200.00, 1800.00, 1000.00, 0.00, 800.00, 0.00, '2024-01-09 18:00:00', '2024-01-09 19:14:38'),
(9, 1, 1, 45, 70, NULL, NULL, NULL, 45, NULL, 0.00, NULL, NULL, NULL, 0, 0, 1000.00, 0.00, 1000.00, 0.00, 0.00, 1000.00, 999.00, '2024-01-14 18:00:00', '2024-01-15 15:54:43'),
(10, 1, 1, NULL, NULL, NULL, 3, 44, 45, NULL, 0.00, NULL, NULL, NULL, 0, 0, 1000.00, 0.00, 1000.00, 0.00, 0.00, 1000.00, 60.00, '2024-01-14 18:00:00', '2024-01-15 15:58:08'),
(11, 7, 38, 45, 90, NULL, NULL, NULL, 56, 'gfgfgbnb', 0.00, NULL, NULL, NULL, 0, 0, 1000.00, 0.00, 1000.00, 0.00, 1000.00, 0.00, 0.00, '2024-04-12 07:50:00', '2024-04-07 07:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `servicetransitions`
--

CREATE TABLE `servicetransitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serviceorder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `servicelistinhospital_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `charge` double(14,2) NOT NULL,
  `discount` double(14,2) DEFAULT NULL,
  `receiveable_amount` double(14,2) DEFAULT NULL,
  `unit` double(14,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servicetransitions`
--

INSERT INTO `servicetransitions` (`id`, `serviceorder_id`, `servicelistinhospital_id`, `user_id`, `charge`, `discount`, `receiveable_amount`, `unit`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 1000.00, 0.00, 1000.00, 1.0000, '2023-02-11 18:00:00', '2023-02-11 19:43:16'),
(2, 2, 4, 1, 1000.00, 0.00, 1000.00, 1.0000, '2024-01-03 18:00:00', '2024-01-04 09:47:06'),
(3, 3, 4, 1, 1000.00, 0.00, 1000.00, 1.0000, '2024-01-04 18:00:00', '2024-01-05 09:49:30'),
(4, 4, 4, 1, 1000.00, 100.00, 1000.00, 1.0000, '2024-01-04 18:00:00', '2024-01-05 09:56:03'),
(5, 5, 4, 1, 1000.00, 444.44, 1000.00, 1.0000, '2024-01-04 18:00:00', '2024-01-05 10:00:46'),
(6, 5, 2, 1, 800.00, 355.56, 800.00, 1.0000, '2024-01-04 18:00:00', '2024-01-05 10:00:46'),
(7, 6, 4, 1, 1000.00, 100.00, 1000.00, 1.0000, '2024-01-07 18:00:00', '2024-01-08 09:39:13'),
(8, 7, 4, 1, 1000.00, 100.00, 1000.00, 1.0000, '2024-01-09 18:00:00', '2024-01-09 19:02:52'),
(9, 7, 2, 1, 1000.00, 100.00, 1000.00, 1.0000, '2024-01-09 18:00:00', '2024-01-09 19:02:52'),
(10, 8, 4, 1, 1000.00, 100.00, 1000.00, 1.0000, '2024-01-09 18:00:00', '2024-01-09 19:14:38'),
(11, 8, 2, 1, 1000.00, 100.00, 1000.00, 1.0000, '2024-01-09 18:00:00', '2024-01-09 19:14:38'),
(12, 9, 4, 1, 1000.00, 0.00, 1000.00, 1.0000, '2024-01-14 18:00:00', '2024-01-15 15:54:43'),
(13, 10, 4, 1, 1000.00, 0.00, 1000.00, 1.0000, '2024-01-14 18:00:00', '2024-01-15 15:58:08'),
(14, 11, 2, 38, 1000.00, 0.00, 1000.00, 1.0000, '2024-04-12 07:50:00', '2024-04-07 07:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `address`, `mobile`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Khulna City Medical College Hospital', '33, KDA Avenue, Hotel Royal Mor, Khulna Sadar, Khulna.\r\nReg No:234555 Diagnostic center Reg:689990', '0000000001', 'logo.jpg', NULL, '2023-02-18 13:03:57'),
(2, 'BICTSOFT', 'bictsoft', '000000000', 'logo,jpg', NULL, NULL),
(3, 'BICTSOFT', 'bictsoft', '000000000', 'logo,jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sharepartners`
--

CREATE TABLE `sharepartners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `joma` double NOT NULL DEFAULT 0,
  `uttholon` double NOT NULL DEFAULT 0,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sharepartners`
--

INSERT INTO `sharepartners` (`id`, `name`, `mobile`, `address`, `joma`, `uttholon`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, 'owner', 'n', 'n', 2201, 2100, 0, '2024-01-01 19:35:42', '2024-01-03 09:25:49'),
(2, 'Asad', 'N', 'N', 2500, 0, 0, '2024-01-03 09:24:44', '2024-01-03 09:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `sompods`
--

CREATE TABLE `sompods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `due` double DEFAULT NULL,
  `advance` double DEFAULT NULL,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `mobile`, `due`, `advance`, `softdelete`, `created_at`, `updated_at`) VALUES
(1, 'supplier 1', 'BD', 'na', 6202, 0, 0, '2023-01-25 16:18:12', '2024-04-07 11:25:35'),
(2, 'suppler 2', 'BD', 'na', 2528, 0, 0, '2023-01-28 11:40:15', '2024-04-07 11:35:21'),
(3, 'hasan', 'bd', 'na', 245, 0, 0, '2023-01-28 11:42:57', '2024-04-03 06:15:09'),
(4, 'supplier 1', 'BD', 'na', 110, NULL, 0, '2023-01-28 11:49:28', '2023-01-28 11:49:28'),
(5, 'BB1', 'BD', 'na', 113, NULL, 0, '2023-01-28 11:49:46', '2023-02-23 10:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `surgerylists`
--

CREATE TABLE `surgerylists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `softdelete` tinyint(4) NOT NULL DEFAULT 0,
  `pre_operative_charge` double(12,2) NOT NULL DEFAULT 0.00,
  `Surgeon_charge` double(12,2) NOT NULL DEFAULT 0.00,
  `anesthesia_charge` double(12,2) NOT NULL DEFAULT 0.00,
  `assistant_charge` double(12,2) NOT NULL DEFAULT 0.00,
  `ot_charge` double(12,2) NOT NULL DEFAULT 0.00,
  `o2_no2_charge` double(12,2) NOT NULL DEFAULT 0.00,
  `c_arme_charge` double(12,2) NOT NULL DEFAULT 0.00,
  `post_operative_charge` double(12,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surgerylists`
--

INSERT INTO `surgerylists` (`id`, `name`, `softdelete`, `pre_operative_charge`, `Surgeon_charge`, `anesthesia_charge`, `assistant_charge`, `ot_charge`, `o2_no2_charge`, `c_arme_charge`, `post_operative_charge`, `created_at`, `updated_at`) VALUES
(1, 'plid operation', 0, 7500.00, 2500.00, 1000.00, 3000.00, 3000.00, 2000.00, 2000.00, 1000.00, '2022-06-20 09:36:41', '2023-02-12 19:10:34'),
(2, 'Caesarean', 0, 5000.00, 2000.00, 3000.00, 1000.00, 3000.00, 2000.00, 4000.00, 5000.00, '2022-06-24 23:49:40', '2023-02-12 19:09:42'),
(3, 'HESTOKTOMI', 0, 2000.00, 3000.00, 4000.00, 5000.00, 2500.00, 3000.00, 1500.00, 2000.00, '2022-07-02 11:06:31', '2023-02-12 19:09:07'),
(4, 'FEMUR NAILING', 0, 3500.00, 2000.00, 1500.00, 2500.00, 1000.00, 1000.00, 3500.00, 2000.00, '2022-07-18 04:57:06', '2023-02-12 19:08:24'),
(5, 'LAB CALL', 0, 3500.00, 2500.00, 1000.00, 2000.00, 2500.00, 1500.00, 2300.00, 1200.00, '2022-08-21 08:47:56', '2023-02-12 19:07:45'),
(6, 'MEDICINE', 0, 5000.00, 3000.00, 3000.00, 2000.00, 4000.00, 5000.00, 7000.00, 5000.00, '2022-10-14 09:05:41', '2023-02-12 19:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `surgerytransactions`
--

CREATE TABLE `surgerytransactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surgerylist_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_commission_transition_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agentdetail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agenttransaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comission` double(12,2) NOT NULL DEFAULT 0.00,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `refdoc_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Surgeon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Surgeontransid` bigint(20) UNSIGNED DEFAULT NULL,
  `anesthesiologist_id` bigint(20) UNSIGNED DEFAULT NULL,
  `anesthesiologisttransid` bigint(20) UNSIGNED DEFAULT NULL,
  `pre_operative_charge` double(12,2) NOT NULL DEFAULT 0.00,
  `Surgeon_charge` double(12,2) NOT NULL DEFAULT 0.00,
  `anesthesia_charge` double(12,2) NOT NULL DEFAULT 0.00,
  `assistant_charge` double(12,2) NOT NULL DEFAULT 0.00,
  `ot_charge` double(12,2) NOT NULL DEFAULT 0.00,
  `o2_no2_charge` double(12,2) NOT NULL DEFAULT 0.00,
  `c_arme_charge` double(12,2) NOT NULL DEFAULT 0.00,
  `post_operative_charge` double(12,2) NOT NULL DEFAULT 0.00,
  `miscellaneous_expenses` double(12,2) DEFAULT 0.00,
  `surgeon_fees` double(12,2) DEFAULT 0.00,
  `anesthesiologist_fees` double(12,2) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `surgerydate` date DEFAULT NULL,
  `due` double(12,2) NOT NULL DEFAULT 0.00,
  `commission` double(12,2) DEFAULT 0.00,
  `pay_in_cash` double(12,2) NOT NULL DEFAULT 0.00,
  `totalvat` double(14,4) NOT NULL DEFAULT 0.0000,
  `totaldiscount` double(14,4) NOT NULL DEFAULT 0.0000,
  `total_cost_before_initial_vat_and_discount` double(14,2) DEFAULT NULL,
  `total_cost_after_initial_vat_and_discount` double(14,2) NOT NULL,
  `adjust_with_advance` double(14,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surgerytransactions`
--

INSERT INTO `surgerytransactions` (`id`, `surgerylist_id`, `doctor_id`, `doctor_commission_transition_id`, `agentdetail_id`, `agenttransaction_id`, `comission`, `patient_id`, `user_id`, `refdoc_id`, `Surgeon_id`, `Surgeontransid`, `anesthesiologist_id`, `anesthesiologisttransid`, `pre_operative_charge`, `Surgeon_charge`, `anesthesia_charge`, `assistant_charge`, `ot_charge`, `o2_no2_charge`, `c_arme_charge`, `post_operative_charge`, `miscellaneous_expenses`, `surgeon_fees`, `anesthesiologist_fees`, `remark`, `surgerydate`, `due`, `commission`, `pay_in_cash`, `totalvat`, `totaldiscount`, `total_cost_before_initial_vat_and_discount`, `total_cost_after_initial_vat_and_discount`, `adjust_with_advance`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, 0.00, 12, 1, 45, 45, 17, 45, 18, 0.00, 0.00, 0.00, 0.00, 600.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2023-02-12', 600.00, 0.00, 0.00, 0.0000, 0.0000, 600.00, 600.00, 0.00, '2023-02-11 18:00:00', '2023-02-11 19:45:33'),
(2, 3, NULL, NULL, NULL, NULL, 0.00, 1, 1, 45, 45, 48, 45, 49, 2000.00, 3000.00, 4000.00, 5000.00, 2500.00, 3000.00, 1500.00, 2000.00, 0.00, 0.00, 0.00, NULL, '2023-12-16', 22000.00, 0.00, 1000.00, 0.0000, 0.0000, 23000.00, 23000.00, 0.00, '2023-12-15 18:00:00', '2023-12-16 17:21:58'),
(3, 1, NULL, NULL, NULL, NULL, 0.00, 1, 1, 45, 45, 51, 45, 52, 7500.00, 2500.00, 1000.00, 3000.00, 3000.00, 2000.00, 2000.00, 1000.00, 0.00, 0.00, 0.00, NULL, '2023-12-17', 21900.00, 0.00, 100.00, 0.0000, 0.0000, 22000.00, 22000.00, 0.00, '2023-12-16 18:00:00', '2023-12-16 20:02:18'),
(4, 1, NULL, NULL, NULL, NULL, 0.00, 1, 1, 45, 45, 55, 45, 56, 7500.00, 2500.00, 1000.00, 3000.00, 3000.00, 2000.00, 2000.00, 1000.00, 0.00, 0.00, 0.00, NULL, '2024-01-03', 20000.00, 0.00, 2000.00, 0.0000, 0.0000, 22000.00, 22000.00, 0.00, '2024-01-02 18:00:00', '2024-01-03 11:05:38'),
(5, 1, NULL, NULL, NULL, NULL, 0.00, 1, 1, 26, 17, 64, 45, 65, 7500.00, 2500.00, 1000.00, 3000.00, 3000.00, 2000.00, 2000.00, 1000.00, 0.00, 0.00, 0.00, NULL, '2024-01-09', 18000.00, 0.00, 2000.00, 0.0000, 2000.0000, 22000.00, 20000.00, 0.00, '2024-01-08 18:00:00', '2024-01-09 14:03:28'),
(6, 5, NULL, NULL, NULL, NULL, 0.00, 1, 1, 45, 56, 67, 45, 68, 3500.00, 2500.00, 1000.00, 2000.00, 2500.00, 1500.00, 2300.00, 1200.00, 0.00, 0.00, 0.00, NULL, '2024-01-10', 14000.00, 0.00, 2000.00, 0.0000, 500.0000, 16500.00, 16000.00, 0.00, '2024-01-09 18:00:00', '2024-01-09 19:01:54'),
(7, 1, NULL, NULL, NULL, NULL, 500.00, 1, 1, 45, 45, 71, 45, 72, 7500.00, 2500.00, 1000.00, 3000.00, 3000.00, 2000.00, 2000.00, 1000.00, 0.00, 0.00, 0.00, NULL, '2024-01-15', 22000.00, 0.00, 0.00, 0.0000, 0.0000, 22000.00, 22000.00, 0.00, '2024-01-14 18:00:00', '2024-01-15 17:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `taka_uttolon_transitions`
--

CREATE TABLE `taka_uttolon_transitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sharepartner_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `transitiontype` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taka_uttolon_transitions`
--

INSERT INTO `taka_uttolon_transitions` (`id`, `sharepartner_id`, `amount`, `comment`, `transitiontype`, `created_at`, `updated_at`) VALUES
(1, 1, 1200, NULL, 2, '2024-01-01 19:36:02', '2024-01-01 19:36:02'),
(2, 1, 100, NULL, 1, '2024-01-01 19:36:53', '2024-01-01 19:36:53'),
(3, 1, 1, NULL, 2, '2024-01-01 18:00:00', '2024-01-02 09:48:42'),
(4, 1, 1000, NULL, 2, '2024-01-02 18:00:00', '2024-01-03 09:20:51'),
(5, 1, 2000, NULL, 1, '2024-01-02 18:00:00', '2024-01-03 09:22:06'),
(7, 2, 2500, NULL, 2, '2024-01-02 18:00:00', '2024-01-03 09:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 2,
  `image` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `user_name` varchar(255) NOT NULL,
  `doctor_id` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `role`, `image`, `status`, `user_name`, `doctor_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(38, 'main', 'main@gmail.com', 'dfdf', 1, 'dfdf', 1, 'System Admin', '1', '2024-04-18 14:17:02', '$2y$10$drXmQoIUhALRJ5Mgf9.sY.afGfsyY1xsGNVo/LSZzQFxrm8l0HyPK', '5GhGhOo8sRbo2bc31SnqizIf5YPDRFnreoiEMEVMXRgxt0fa99rcpTdYeJTO', '2024-04-02 16:42:02', '2024-04-02 16:42:02'),
(40, 'test', 'test@gmail.com', 'cxc', 1, NULL, 1, 'test', '1', NULL, '$2y$10$ECQOPn1S4K8G9utdf2A8xeez8v42K/7rKjTzbEMWMRJzVMlpKKtbe', NULL, '2024-04-03 07:59:03', '2024-04-03 07:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(255) NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menu_actions`
--
ALTER TABLE `admin_menu_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agentdetails`
--
ALTER TABLE `agentdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agenttransactions`
--
ALTER TABLE `agenttransactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areacodepolturies`
--
ALTER TABLE `areacodepolturies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balance_of_businesses`
--
ALTER TABLE `balance_of_businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy_return_medicine_from_companies`
--
ALTER TABLE `buy_return_medicine_from_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabinefeetransitions`
--
ALTER TABLE `cabinefeetransitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabinelists`
--
ALTER TABLE `cabinelists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabinetransactions`
--
ALTER TABLE `cabinetransactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabinetransferhistos`
--
ALTER TABLE `cabinetransferhistos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashtransitions`
--
ALTER TABLE `cashtransitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `childmenus`
--
ALTER TABLE `childmenus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `childmenus_route_unique` (`route`);

--
-- Indexes for table `coshmas`
--
ALTER TABLE `coshmas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coshma_prescriptions`
--
ALTER TABLE `coshma_prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalserviceodermoney_deposits`
--
ALTER TABLE `dentalserviceodermoney_deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentalservices`
--
ALTER TABLE `dentalservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dhar_shod_othoba_advance_er_mal_buje_pawas`
--
ALTER TABLE `dhar_shod_othoba_advance_er_mal_buje_pawas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorappointmenttransactions`
--
ALTER TABLE `doctorappointmenttransactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_commission_transitions`
--
ALTER TABLE `doctor_commission_transitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duetransitions`
--
ALTER TABLE `duetransitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeedetails`
--
ALTER TABLE `employeedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeelists`
--
ALTER TABLE `employeelists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeesalarytransactions`
--
ALTER TABLE `employeesalarytransactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `externalcosts`
--
ALTER TABLE `externalcosts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `finalreports`
--
ALTER TABLE `finalreports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khorocer_khads`
--
ALTER TABLE `khorocer_khads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khoroch_transitions`
--
ALTER TABLE `khoroch_transitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `longterminstallations`
--
ALTER TABLE `longterminstallations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `longterminstallerorders`
--
ALTER TABLE `longterminstallerorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makepathologytestreports`
--
ALTER TABLE `makepathologytestreports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicinecomapnynames`
--
ALTER TABLE `medicinecomapnynames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicinecompanyorders`
--
ALTER TABLE `medicinecompanyorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicinetransitions`
--
ALTER TABLE `medicinetransitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicinetransitions_order_id_foreign` (`order_id`);

--
-- Indexes for table `medicine_categories`
--
ALTER TABLE `medicine_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_comapnyer_dena_pawan_shods`
--
ALTER TABLE `medicine_comapnyer_dena_pawan_shods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_company_transitions`
--
ALTER TABLE `medicine_company_transitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuactions`
--
ALTER TABLE `menuactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menuactions_route_unique` (`route`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pathologyorderfromotherinsitutes`
--
ALTER TABLE `pathologyorderfromotherinsitutes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pathologytransitionfromotherinstitues`
--
ALTER TABLE `pathologytransitionfromotherinstitues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pathology_test_components`
--
ALTER TABLE `pathology_test_components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientbooks`
--
ALTER TABLE `patientbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientfinalhisabs`
--
ALTER TABLE `patientfinalhisabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_refdoc_id_foreign` (`refdoc_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `prescriptionkhabaragepores`
--
ALTER TABLE `prescriptionkhabaragepores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptionmedicinelists`
--
ALTER TABLE `prescriptionmedicinelists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptionusages`
--
ALTER TABLE `prescriptionusages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productcompanyorders`
--
ALTER TABLE `productcompanyorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productcompanytransitions`
--
ALTER TABLE `productcompanytransitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reagents`
--
ALTER TABLE `reagents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reagent_orders`
--
ALTER TABLE `reagent_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reagent_transactions`
--
ALTER TABLE `reagent_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refundtransitions`
--
ALTER TABLE `refundtransitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportlists`
--
ALTER TABLE `reportlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportorders`
--
ALTER TABLE `reportorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reporttransactions`
--
ALTER TABLE `reporttransactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reporttransactions_reportorder_id_foreign` (`reportorder_id`);

--
-- Indexes for table `returnmedicinetransactions`
--
ALTER TABLE `returnmedicinetransactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_orders`
--
ALTER TABLE `return_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `rootmenus`
--
ALTER TABLE `rootmenus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rootmenus_name_unique` (`name`);

--
-- Indexes for table `servicelistinhospitals`
--
ALTER TABLE `servicelistinhospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serviceorders`
--
ALTER TABLE `serviceorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicetransitions`
--
ALTER TABLE `servicetransitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sharepartners`
--
ALTER TABLE `sharepartners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sompods`
--
ALTER TABLE `sompods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surgerylists`
--
ALTER TABLE `surgerylists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surgerytransactions`
--
ALTER TABLE `surgerytransactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surgerytransactions_refdoc_id_foreign` (`refdoc_id`),
  ADD KEY `surgerytransactions_surgeon_id_foreign` (`Surgeon_id`),
  ADD KEY `surgerytransactions_anesthesiologist_id_foreign` (`anesthesiologist_id`);

--
-- Indexes for table `taka_uttolon_transitions`
--
ALTER TABLE `taka_uttolon_transitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menu_actions`
--
ALTER TABLE `admin_menu_actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agentdetails`
--
ALTER TABLE `agentdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `agenttransactions`
--
ALTER TABLE `agenttransactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `areacodepolturies`
--
ALTER TABLE `areacodepolturies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `balance_of_businesses`
--
ALTER TABLE `balance_of_businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buy_return_medicine_from_companies`
--
ALTER TABLE `buy_return_medicine_from_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cabinefeetransitions`
--
ALTER TABLE `cabinefeetransitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cabinelists`
--
ALTER TABLE `cabinelists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cabinetransactions`
--
ALTER TABLE `cabinetransactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cabinetransferhistos`
--
ALTER TABLE `cabinetransferhistos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cashtransitions`
--
ALTER TABLE `cashtransitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=501;

--
-- AUTO_INCREMENT for table `childmenus`
--
ALTER TABLE `childmenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coshmas`
--
ALTER TABLE `coshmas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `coshma_prescriptions`
--
ALTER TABLE `coshma_prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dentalserviceodermoney_deposits`
--
ALTER TABLE `dentalserviceodermoney_deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dentalservices`
--
ALTER TABLE `dentalservices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dhar_shod_othoba_advance_er_mal_buje_pawas`
--
ALTER TABLE `dhar_shod_othoba_advance_er_mal_buje_pawas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctorappointmenttransactions`
--
ALTER TABLE `doctorappointmenttransactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `doctor_commission_transitions`
--
ALTER TABLE `doctor_commission_transitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `duetransitions`
--
ALTER TABLE `duetransitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT for table `employeedetails`
--
ALTER TABLE `employeedetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `employeelists`
--
ALTER TABLE `employeelists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employeesalarytransactions`
--
ALTER TABLE `employeesalarytransactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `externalcosts`
--
ALTER TABLE `externalcosts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finalreports`
--
ALTER TABLE `finalreports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `khorocer_khads`
--
ALTER TABLE `khorocer_khads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `khoroch_transitions`
--
ALTER TABLE `khoroch_transitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `longterminstallations`
--
ALTER TABLE `longterminstallations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `longterminstallerorders`
--
ALTER TABLE `longterminstallerorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `makepathologytestreports`
--
ALTER TABLE `makepathologytestreports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `medicinecomapnynames`
--
ALTER TABLE `medicinecomapnynames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicinecompanyorders`
--
ALTER TABLE `medicinecompanyorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=717;

--
-- AUTO_INCREMENT for table `medicinetransitions`
--
ALTER TABLE `medicinetransitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine_categories`
--
ALTER TABLE `medicine_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `medicine_comapnyer_dena_pawan_shods`
--
ALTER TABLE `medicine_comapnyer_dena_pawan_shods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `medicine_company_transitions`
--
ALTER TABLE `medicine_company_transitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menuactions`
--
ALTER TABLE `menuactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1673;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `pathologyorderfromotherinsitutes`
--
ALTER TABLE `pathologyorderfromotherinsitutes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pathologytransitionfromotherinstitues`
--
ALTER TABLE `pathologytransitionfromotherinstitues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pathology_test_components`
--
ALTER TABLE `pathology_test_components`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `patientbooks`
--
ALTER TABLE `patientbooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patientfinalhisabs`
--
ALTER TABLE `patientfinalhisabs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=608;

--
-- AUTO_INCREMENT for table `prescriptionkhabaragepores`
--
ALTER TABLE `prescriptionkhabaragepores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prescriptionmedicinelists`
--
ALTER TABLE `prescriptionmedicinelists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prescriptionusages`
--
ALTER TABLE `prescriptionusages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productcompanyorders`
--
ALTER TABLE `productcompanyorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productcompanytransitions`
--
ALTER TABLE `productcompanytransitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reagents`
--
ALTER TABLE `reagents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reagent_orders`
--
ALTER TABLE `reagent_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `reagent_transactions`
--
ALTER TABLE `reagent_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `refundtransitions`
--
ALTER TABLE `refundtransitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reportlists`
--
ALTER TABLE `reportlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=656;

--
-- AUTO_INCREMENT for table `reportorders`
--
ALTER TABLE `reportorders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `reporttransactions`
--
ALTER TABLE `reporttransactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `returnmedicinetransactions`
--
ALTER TABLE `returnmedicinetransactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_orders`
--
ALTER TABLE `return_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `rootmenus`
--
ALTER TABLE `rootmenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `servicelistinhospitals`
--
ALTER TABLE `servicelistinhospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `serviceorders`
--
ALTER TABLE `serviceorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `servicetransitions`
--
ALTER TABLE `servicetransitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sharepartners`
--
ALTER TABLE `sharepartners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sompods`
--
ALTER TABLE `sompods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `surgerylists`
--
ALTER TABLE `surgerylists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surgerytransactions`
--
ALTER TABLE `surgerytransactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `taka_uttolon_transitions`
--
ALTER TABLE `taka_uttolon_transitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medicinetransitions`
--
ALTER TABLE `medicinetransitions`
  ADD CONSTRAINT `medicinetransitions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_refdoc_id_foreign` FOREIGN KEY (`refdoc_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `reporttransactions`
--
ALTER TABLE `reporttransactions`
  ADD CONSTRAINT `reporttransactions_reportorder_id_foreign` FOREIGN KEY (`reportorder_id`) REFERENCES `reportorders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `surgerytransactions`
--
ALTER TABLE `surgerytransactions`
  ADD CONSTRAINT `surgerytransactions_anesthesiologist_id_foreign` FOREIGN KEY (`anesthesiologist_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `surgerytransactions_refdoc_id_foreign` FOREIGN KEY (`refdoc_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `surgerytransactions_surgeon_id_foreign` FOREIGN KEY (`Surgeon_id`) REFERENCES `doctors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

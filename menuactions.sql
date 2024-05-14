-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 14, 2024 at 08:52 PM
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

--
-- Dumping data for table `menuactions`
--

INSERT INTO `menuactions` (`id`, `childmenu_id`, `name`, `route`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Edit', 'doctorlist.edit', 1, '2024-05-10 18:05:16', '2024-05-10 18:05:16'),
(2, 1, 'Delate', 'doctorlist.delate', 1, '2024-05-10 18:05:16', '2024-05-10 18:05:16'),
(3, 2, 'Edit', 'doctortransition.edit', 1, '2024-05-10 18:13:53', '2024-05-10 18:13:53'),
(4, 2, 'Delate', 'doctortransition.delate', 1, '2024-05-10 18:13:53', '2024-05-10 18:13:53'),
(5, 4, 'Add', 'doctorcommission.store', 1, '2024-05-10 18:24:51', '2024-05-10 18:24:51'),
(6, 4, 'Delate', 'doctorcommission.delate', 1, '2024-05-10 18:24:51', '2024-05-10 18:24:51'),
(7, 4, 'Paid', 'doctorcommission.paidsenddata', 1, '2024-05-10 18:24:51', '2024-05-10 18:24:51'),
(8, 5, 'Delate', 'prescription.delate', 1, '2024-05-10 18:32:38', '2024-05-10 18:32:38'),
(9, 5, 'Print', 'prescription.pdf', 1, '2024-05-10 18:32:38', '2024-05-10 18:32:38'),
(10, 7, 'Edit', 'coshma.edit', 1, '2024-05-10 18:43:13', '2024-05-10 18:43:13'),
(11, 7, 'Delate', 'coshma.delate', 1, '2024-05-10 18:43:13', '2024-05-10 18:43:13'),
(12, 7, 'Print', 'print.coshma.Preection', 1, '2024-05-10 18:43:13', '2024-05-10 18:43:13'),
(13, 8, 'Edit', 'coshmainstructions.edit', 1, '2024-05-10 18:48:32', '2024-05-10 18:48:32'),
(14, 8, 'Delate', 'coshmainstructions.delate', 1, '2024-05-10 18:48:32', '2024-05-10 18:48:32'),
(15, 9, 'Edit', 'prescriptionusages.edit', 1, '2024-05-10 18:51:47', '2024-05-10 18:51:47'),
(16, 9, 'Delate', 'prescriptionusages.delate', 1, '2024-05-10 18:51:47', '2024-05-10 18:51:47'),
(17, 10, 'Add', 'prescriptionusagestwo.store', 1, '2024-05-10 18:57:02', '2024-05-10 18:57:02'),
(18, 10, 'Edit', 'prescriptionusagestwo.edit', 1, '2024-05-10 18:57:02', '2024-05-10 18:57:02'),
(19, 10, 'Delate', 'prescriptionusagestwo.delate', 1, '2024-05-10 18:57:02', '2024-05-10 18:57:02'),
(20, 21, 'Add', 'dentalservice.fetchpatorder', 1, '2024-05-11 18:19:26', '2024-05-11 18:19:26'),
(21, 21, 'Print', 'doctortransition.pdf', 1, '2024-05-11 18:19:26', '2024-05-11 18:19:26'),
(23, 23, 'Add', 'reportlist.store', 1, '2024-05-11 18:24:33', '2024-05-11 18:24:33'),
(24, 23, 'Edit', 'reportlist.edit', 1, '2024-05-11 18:24:33', '2024-05-11 18:24:33'),
(25, 23, 'Delate', 'reportlist.delate', 1, '2024-05-11 18:24:33', '2024-05-11 18:24:33'),
(26, 24, 'Add', 'pathologytestcomponent,store', 1, '2024-05-11 18:27:03', '2024-05-11 18:27:03'),
(27, 24, 'Delate', 'pathologytestcomponent,delate', 1, '2024-05-11 18:27:03', '2024-05-11 18:27:03'),
(28, 25, 'Add', 'reagent.store', 1, '2024-05-11 18:32:32', '2024-05-11 18:32:32'),
(29, 25, 'Edit', 'reagent.edit', 1, '2024-05-11 18:32:32', '2024-05-11 18:32:32'),
(30, 25, 'Delate', 'reagent.delate', 1, '2024-05-11 18:32:32', '2024-05-11 18:32:32'),
(31, 26, 'Add', 'reagentransaction.store', 1, '2024-05-11 18:39:09', '2024-05-11 18:39:09'),
(32, 26, 'Print', 'reagentransaction.pdf', 1, '2024-05-11 18:39:09', '2024-05-11 18:39:09'),
(33, 26, 'Delate', 'reagentransaction.delate', 1, '2024-05-11 18:39:09', '2024-05-11 18:39:09'),
(34, 27, 'Add', 'pathologyreportmaking.fetchpatientorder', 1, '2024-05-11 18:49:55', '2024-05-11 18:49:55'),
(35, 27, 'Print', 'pathologyreportmaking.pdf', 1, '2024-05-11 18:49:55', '2024-05-11 18:49:55'),
(36, 27, 'Delate', 'pathologyreportmaking.destroy', 1, '2024-05-11 18:49:55', '2024-05-11 18:49:55'),
(37, 31, 'Add', 'reporttransaction.store', 1, '2024-05-11 19:03:36', '2024-05-11 19:03:36'),
(38, 31, 'Edit', 'reporttransaction.edit', 1, '2024-05-11 19:03:36', '2024-05-11 19:03:36'),
(39, 31, 'Delate', 'reporttransaction.delate', 1, '2024-05-11 19:03:36', '2024-05-11 19:03:36'),
(40, 31, 'Print', 'reporttransaction.pdf', 1, '2024-05-11 19:03:36', '2024-05-11 19:03:36'),
(41, 36, 'Add', 'pathologytestfromother.store', 1, '2024-05-11 19:25:17', '2024-05-11 19:25:17'),
(42, 36, 'Delate', 'pathologytestfromother.delate', 1, '2024-05-11 19:25:17', '2024-05-11 19:25:17'),
(43, 37, 'Add', 'cabinelist.store', 1, '2024-05-12 13:02:00', '2024-05-12 13:02:00'),
(44, 37, 'Edit', 'cabinelist.edit', 1, '2024-05-12 13:02:00', '2024-05-12 13:02:00'),
(45, 37, 'Delate', 'cabinelist.delate', 1, '2024-05-12 13:02:00', '2024-05-12 13:02:00'),
(46, 38, 'Print', 'cabinefees.pdf', 1, '2024-05-13 05:21:49', '2024-05-13 05:21:49'),
(47, 38, 'Delate', 'cabinefees.delate', 1, '2024-05-13 05:21:49', '2024-05-13 05:21:49'),
(48, 38, 'Add', 'cabinefees.store', 1, '2024-05-13 05:21:49', '2024-05-13 05:21:49'),
(49, 39, 'Add', 'cabinetransfer.store', 1, '2024-05-13 05:23:37', '2024-05-13 05:23:37'),
(50, 40, 'Add', 'servicelist.store', 1, '2024-05-13 05:25:26', '2024-05-13 05:25:26'),
(51, 40, 'Edit', 'servicelist.edit', 1, '2024-05-13 05:25:26', '2024-05-13 05:25:26'),
(52, 40, 'Delate', 'servicelist.delate', 1, '2024-05-13 05:25:26', '2024-05-13 05:25:26'),
(53, 41, 'Add', 'servicetranstion.store', 1, '2024-05-13 05:35:11', '2024-05-13 05:35:11'),
(54, 41, 'Delate', 'servicetranstion.delate', 1, '2024-05-13 05:35:11', '2024-05-13 05:35:11'),
(55, 41, 'Print', 'servicetranstion.pdf', 1, '2024-05-13 05:35:11', '2024-05-13 05:35:11'),
(56, 42, 'Edit', 'patientlist.edit', 1, '2024-05-13 05:41:04', '2024-05-13 05:41:04'),
(57, 42, 'Delate', 'patientlist.delate', 1, '2024-05-13 05:41:04', '2024-05-13 05:41:04'),
(58, 42, 'Print', 'patientlist.pdf', 1, '2024-05-13 05:41:04', '2024-05-13 05:41:04'),
(59, 43, 'Submit', 'patientlist.fetcthrecord', 1, '2024-05-13 05:46:52', '2024-05-13 05:46:52'),
(60, 44, 'Add', 'advancedeposit.store', 1, '2024-05-13 05:50:30', '2024-05-13 05:50:30'),
(61, 44, 'Delate', 'advancedeposit.delate', 1, '2024-05-13 05:50:30', '2024-05-13 05:50:30'),
(62, 44, 'Print', 'advancedeposit.pdfprint', 1, '2024-05-13 05:50:30', '2024-05-13 05:50:30'),
(63, 45, 'Add', 'cabinetransaction.store', 1, '2024-05-13 05:54:10', '2024-05-13 05:54:10'),
(64, 45, 'Edit', 'cabinetransaction.edit', 1, '2024-05-13 05:54:10', '2024-05-13 05:54:10'),
(65, 45, 'Delate', 'cabinetransaction.delate', 1, '2024-05-13 05:54:10', '2024-05-13 05:54:10'),
(66, 45, 'Print', 'cabinetransaction.admitbill', 1, '2024-05-13 05:54:10', '2024-05-13 05:54:10'),
(67, 46, 'Print', 'finalreport.pdfbill', 1, '2024-05-13 05:55:55', '2024-05-13 05:55:55'),
(68, 47, 'Print', 'finalreport.pdfformreport', 1, '2024-05-13 06:00:20', '2024-05-13 06:00:20'),
(69, 47, 'Release', 'finalreport.pdf', 1, '2024-05-13 06:00:20', '2024-05-13 06:00:20'),
(70, 48, 'Add', 'finalreport.allduepay', 1, '2024-05-13 07:06:30', '2024-05-13 07:06:30'),
(71, 48, 'Print', 'duepaymenttrans.pdf', 1, '2024-05-13 07:06:30', '2024-05-13 07:06:30'),
(72, 48, 'Edit', 'duepaymenttrans.edit', 1, '2024-05-13 07:06:30', '2024-05-13 07:06:30'),
(73, 48, 'Delate', 'duepaymenttrans.delate', 1, '2024-05-13 07:06:30', '2024-05-13 07:06:30'),
(75, 53, 'Edit', 'surgerylist.edit', 1, '2024-05-13 07:27:19', '2024-05-13 07:27:19'),
(76, 53, 'Delate', 'surgerylist.delate', 1, '2024-05-13 07:27:19', '2024-05-13 07:27:19'),
(77, 53, 'Add', 'surgerylist.store', 1, '2024-05-13 07:27:19', '2024-05-13 07:27:19'),
(78, 54, 'Add', 'surgerytansition.store', 1, '2024-05-13 07:35:06', '2024-05-13 07:35:06'),
(79, 54, 'Print', 'surgerytansition.pdf', 1, '2024-05-13 07:35:06', '2024-05-13 07:35:06'),
(80, 54, 'Edit', 'surgerytansition.edit', 1, '2024-05-13 07:35:06', '2024-05-13 07:35:06'),
(81, 54, 'Delate', 'surgerytansition.delate', 1, '2024-05-13 07:35:06', '2024-05-13 07:35:06'),
(82, 55, 'Add', 'agentlist.store', 1, '2024-05-14 04:59:53', '2024-05-14 04:59:53'),
(83, 55, 'Edit', 'agentlist.edit', 1, '2024-05-14 04:59:53', '2024-05-14 04:59:53'),
(84, 55, 'Delate', 'agentlist.delate', 1, '2024-05-14 04:59:53', '2024-05-14 04:59:53'),
(85, 56, 'Add', 'agenttransaction.store', 1, '2024-05-14 05:11:07', '2024-05-14 05:11:07'),
(86, 56, 'Delate', 'agenttransaction.delate', 1, '2024-05-14 05:11:07', '2024-05-14 05:11:07'),
(87, 56, 'Paid', 'agenttransaction.paid', 1, '2024-05-14 05:11:07', '2024-05-14 05:11:07'),
(88, 57, 'Add', 'employeelist.store', 1, '2024-05-14 05:14:33', '2024-05-14 05:14:33'),
(89, 57, 'Edit', 'employeelist.edit', 1, '2024-05-14 05:14:33', '2024-05-14 05:14:33'),
(90, 57, 'Delate', 'employeelist.delate', 1, '2024-05-14 05:14:33', '2024-05-14 05:14:33'),
(91, 58, 'Add', 'employeetransactioncon.store', 1, '2024-05-14 05:16:34', '2024-05-14 05:16:34'),
(92, 58, 'Edit', 'employeetransactioncon.edit', 1, '2024-05-14 05:16:34', '2024-05-14 05:16:34'),
(93, 58, 'Delate', 'employeetransactioncon.delate', 1, '2024-05-14 05:16:34', '2024-05-14 05:16:34'),
(94, 62, 'Add', 'externalcost.store', 1, '2024-05-14 05:24:08', '2024-05-14 05:24:08'),
(95, 62, 'Edit', 'externalcost.edit', 1, '2024-05-14 05:24:08', '2024-05-14 05:24:08'),
(96, 62, 'Delate', 'externalcost.delate', 1, '2024-05-14 05:24:08', '2024-05-14 05:24:08'),
(97, 63, 'Add', 'role.store', 1, '2024-05-14 05:33:09', '2024-05-14 05:33:09'),
(98, 63, 'Edit', 'role.edit', 1, '2024-05-14 05:33:09', '2024-05-14 05:33:09'),
(99, 63, 'Delate', 'role.delate', 1, '2024-05-14 05:33:09', '2024-05-14 05:33:09'),
(100, 63, 'Permission', 'rolePermission.update', 1, '2024-05-14 05:33:09', '2024-05-14 05:33:09'),
(101, 64, 'Add', 'user.store', 1, '2024-05-14 05:44:42', '2024-05-14 05:44:42'),
(102, 64, 'Edit', 'user.edit', 1, '2024-05-14 05:44:42', '2024-05-14 05:44:42'),
(103, 64, 'Delate', 'user.delate', 1, '2024-05-14 05:44:42', '2024-05-14 05:44:42'),
(104, 66, 'Add', 'khorocer_khad.store', 1, '2024-05-14 05:52:16', '2024-05-14 05:52:16'),
(105, 66, 'Edit', 'khorocer_khad.edit', 1, '2024-05-14 05:52:16', '2024-05-14 05:52:16'),
(106, 66, 'Delate', 'khorocer_khad.delate', 1, '2024-05-14 05:52:16', '2024-05-14 05:52:16'),
(107, 69, 'Add', 'supplier.store', 1, '2024-05-14 06:18:44', '2024-05-14 06:18:44'),
(108, 69, 'Edit', 'supplier.edit', 1, '2024-05-14 06:18:44', '2024-05-14 06:18:44'),
(109, 69, 'Delete', 'supplier.destroy', 1, '2024-05-14 06:18:44', '2024-05-14 06:18:44'),
(110, 70, 'Delete', 'supplier_due_advance_pay_or_get.destroy', 1, '2024-05-14 10:05:24', '2024-05-14 10:05:24'),
(111, 71, 'Add', 'khorochtransition.add', 1, '2024-05-14 10:08:11', '2024-05-14 10:08:11'),
(112, 71, 'Edit', 'khorochtransition.edit', 1, '2024-05-14 10:08:11', '2024-05-14 10:08:11'),
(113, 71, 'Delate', 'khorochtransition.destroy', 1, '2024-05-14 10:08:11', '2024-05-14 10:08:11'),
(114, 74, 'Add', 'businesspartner.store', 1, '2024-05-14 10:35:10', '2024-05-14 10:35:10'),
(115, 74, 'Edit', 'businesspartner.edit', 1, '2024-05-14 10:35:10', '2024-05-14 10:35:10'),
(116, 74, 'Delate', 'businesspartner.destroy', 1, '2024-05-14 10:35:10', '2024-05-14 10:35:10'),
(117, 75, 'Add', 'takauttolon.store', 1, '2024-05-14 10:36:54', '2024-05-14 10:36:54'),
(118, 75, 'Delete', 'takauttolon.destroy', 1, '2024-05-14 10:36:54', '2024-05-14 10:36:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menuactions`
--
ALTER TABLE `menuactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menuactions_route_unique` (`route`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menuactions`
--
ALTER TABLE `menuactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

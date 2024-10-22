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

--
-- Dumping data for table `childmenus`
--

INSERT INTO `childmenus` (`id`, `name`, `route`, `status`, `rootmenu_id`, `created_at`, `updated_at`) VALUES
(1, 'ডাক্তারের নাম ডাটাবেজে যুক্ত করেন', 'doctorlist.index', 1, 1, '2024-05-10 18:05:16', '2024-05-10 18:05:16'),
(2, 'ডাক্তারের সিরিয়াল কাটুন', 'doctortransition.index', 1, 1, '2024-05-10 18:13:53', '2024-05-10 18:13:53'),
(3, 'ডাক্তারের কাছে আসা রোগীর তালিকা প্রিন্ট করেন', 'doctortransition.finddoctorpatient', 1, 1, '2024-05-10 18:17:38', '2024-05-10 18:17:38'),
(4, 'ডাক্তাদের কমিশন/ শেয়ারের টাকা দেন', 'doctorcommission.index', 1, 1, '2024-05-10 18:24:51', '2024-05-10 18:24:51'),
(5, 'প্রেসক্রিপশন তৈরি', 'prescription.index', 1, 1, '2024-05-10 18:32:38', '2024-05-10 18:32:38'),
(6, 'প্রেসক্রিপশন প্রিন্ট করেন', 'prescription.printprescription', 1, 1, '2024-05-10 18:34:41', '2024-05-10 18:34:41'),
(7, 'চশমার প্রেস্কিপসন দেখুন', 'coshma.index', 1, 1, '2024-05-10 18:43:13', '2024-05-10 18:43:13'),
(8, 'চশমার নির্দেশনা যুক্ত করোন', 'coshmainstructions.index', 1, 1, '2024-05-10 18:48:32', '2024-05-10 18:48:32'),
(9, 'ব্যাবহার বিধি যুক্ত করেন-১', 'prescriptionusages.index', 1, 1, '2024-05-10 18:51:47', '2024-05-10 18:51:47'),
(10, 'ব্যাবহার বিধি যুক্ত করেন-2 ( খাবার আগে /পরে )', 'prescriptionusagestwo.index', 1, 1, '2024-05-10 18:57:02', '2024-05-10 18:57:02'),
(11, 'ডাক্তার রেজিস্ট্রেশন', 'prescription.doctorregiserforprescription', 1, 1, '2024-05-10 18:59:45', '2024-05-10 18:59:45'),
(12, 'কোন ডাক্তারের কাছে আসা রোগীদের তালিকা', 'doctortransition.doctorincome', 1, 1, '2024-05-10 19:01:56', '2024-05-10 19:01:56'),
(13, 'কোন এম্পলি কর্তৃক আউটডোর ডাক্তারের কালেকশন', 'doctortransition.select', 1, 1, '2024-05-10 19:04:20', '2024-05-10 19:04:20'),
(14, 'কোন এজেন্ট কর্তৃক আউটডোর কোন ডাক্তারের কাছে পাঠানো রোগীর তালিকা', 'doctortransition.selectagent', 1, 1, '2024-05-10 19:05:46', '2024-05-10 19:05:46'),
(15, 'আজকে আউটডোরে ডাক্তারদের রোগী থেকে আয়', 'outdoordoctortranstion.doctorstatementoday', 1, 1, '2024-05-10 19:08:03', '2024-05-10 19:08:03'),
(16, 'গতকাল আউটডোরে ডাক্তারদের রোগী থেকে আয়', 'doctorstatementyesterday', 1, 1, '2024-05-10 19:08:58', '2024-05-10 19:08:58'),
(17, 'চলতি মাসে আউটডোরে ডাক্তারদের রোগী থেকে আয়', 'outdoordoctortranstion.doctorstatementthismonth', 1, 1, '2024-05-10 19:10:45', '2024-05-10 19:10:45'),
(18, 'চলতি বছরে আউটডোরে ডাক্তারদের রোগী থেকে আয়', 'outdoordoctortranstion.doctorstatementthisyear', 1, 1, '2024-05-10 19:12:43', '2024-05-10 19:12:43'),
(19, 'যে কোন দুই তারিখের মধ্যবর্তী সময়ে আউটডোরে রোগী থেকে আয়', 'picktwodatefordoctortransition', 1, 1, '2024-05-10 19:25:08', '2024-05-10 19:25:08'),
(20, '**** Unfinished Tasks', 'dentalservicecontroller.unfinished', 1, 2, '2024-05-11 18:04:48', '2024-05-11 18:04:48'),
(21, 'কোন প্যাসেন্টের লং টার্ম ট্রিটমেন্টের খরচ পরিষোধের রিপোর্ট দেখেন', 'dentalservice.Paitent_unfini', 1, 2, '2024-05-11 18:19:26', '2024-05-11 18:19:26'),
(23, 'প্যাথোলজি টেস্টের নাম, মূল্য ডাটাবেজে যুক্ত করেন', 'reportlist.index', 1, 3, '2024-05-11 18:24:33', '2024-05-11 18:24:33'),
(24, 'প্যাথোলজি টেস্টে কম্পনেন্টের নাম, নরমাল ভ্যালু ডাটাবেজে যুক্ত করেন', 'pathologytestcomponent,index', 1, 3, '2024-05-11 18:27:03', '2024-05-11 18:27:03'),
(25, 'রিএজেন্টের নাম', 'reagent.index', 1, 3, '2024-05-11 18:32:32', '2024-05-11 18:32:32'),
(26, 'রিএজেন্টের ক্রয় ও ক্রয়-ফেরত', 'reagentransaction.index', 1, 3, '2024-05-11 18:39:09', '2024-05-11 18:39:09'),
(27, 'প্যাথলজি টেস্টের রিপোর্ট তৈরি করুন', 'pathologyreportmaking.index', 1, 3, '2024-05-11 18:49:55', '2024-05-11 18:49:55'),
(28, 'হ্যান্ড ওভার না হওয়া , প্যাথলজির রিপোর্ট প্রিন্ট করুন', 'pathologyreportmaking.showreport', 1, 3, '2024-05-11 18:53:51', '2024-05-11 18:53:51'),
(29, 'হ্যান্ড ওভার হওয়া প্যাথলজি রিপোর্ট এর লিস্ট', 'findreportforhandoverreport', 1, 3, '2024-05-11 18:56:07', '2024-05-11 18:56:07'),
(30, 'কোন প্যাসেন্টের অতীতের প্যাথলজি রিপোর্ট খুজে বের করুন তার মোবাইল নম্বর দিয়ে', 'pathologyreportmaking.showreportforspecific', 1, 3, '2024-05-11 18:58:22', '2024-05-11 18:58:22'),
(31, 'কাস্টমার থেকে বিল নেন ও ভাউচার প্রিন্ট করেন', 'reporttransaction.index', 1, 3, '2024-05-11 19:03:36', '2024-05-11 19:03:36'),
(32, 'যে কোন তারিখের প্যাথলজির সকল ট্রাঞ্জিশন দেখুন', 'pathologytranspicktwodate.index', 1, 3, '2024-05-11 19:14:53', '2024-05-11 19:14:53'),
(33, 'কোন নির্দিষ্ট এম্পলয়ি কর্তৃক নেয়া প্যাথলজির সকল কালেকশন দেখুন', 'reporttransaction.select', 1, 3, '2024-05-11 19:16:18', '2024-05-11 19:16:18'),
(34, 'রেফারেন্স ডাক্তার কর্তৃক পাঠানো প্যাসেন্টের ট্রাঞ্জিশন', 'reporttransaction.selectrefdoct', 1, 3, '2024-05-11 19:18:23', '2024-05-11 19:18:23'),
(35, 'এজেন্ট কর্তৃক পাঠানো প্যাসেন্টের ট্রাঞ্জিশন', 'reporttransaction.selectagent', 1, 3, '2024-05-11 19:20:10', '2024-05-11 19:20:10'),
(36, 'বাইরের ডায়াগোনেস্টিক থেকে টেস্ট করা বাবদ খরচ', 'pathologytestfromother.index', 1, 3, '2024-05-11 19:25:17', '2024-05-11 19:25:17'),
(37, 'তালিকায় নতুন কেবিন/বেড যুক্ত করেন', 'cabinelist.index', 1, 5, '2024-05-12 13:02:00', '2024-05-12 13:02:00'),
(38, 'কেবিন ভাড়া আদায়', 'cabinefees.index', 1, 5, '2024-05-13 05:21:49', '2024-05-13 05:21:49'),
(39, 'সিট ট্রান্সফার', 'cabinetransfer.index', 1, 5, '2024-05-13 05:23:37', '2024-05-13 05:23:37'),
(40, 'সার্ভিস সমূহের মূল্য তালিকা', 'servicelist.index', 1, 5, '2024-05-13 05:25:26', '2024-05-13 05:25:26'),
(41, 'প্যাসেন্টের নতুন সার্ভিস চার্জ যুক্ত করেন', 'servicetranstion.index', 1, 5, '2024-05-13 05:35:11', '2024-05-13 05:35:11'),
(42, 'রোগীর লিস্ট', 'patientlist.index', 1, 6, '2024-05-13 05:41:04', '2024-05-13 05:41:04'),
(43, 'রোগীর রেকর্ড', 'patientlist.fetchlist', 1, 6, '2024-05-13 05:46:52', '2024-05-13 05:46:52'),
(44, 'অগ্রিম গ্রহণ', 'advancedeposit.index', 1, 6, '2024-05-13 05:50:30', '2024-05-13 05:50:30'),
(45, 'ইনডোরে রোগী ভর্তি এবং ফাঁকা বেড এর তালিক দেখেন', 'cabinetransaction.index', 1, 6, '2024-05-13 05:54:10', '2024-05-13 05:54:10'),
(46, 'রিলিজ হওয়া রোগির ফাইনাল রিপোর্ট', 'bookingpatient.index', 1, 6, '2024-05-13 05:55:55', '2024-05-13 05:55:55'),
(47, 'ভর্তি থাকা রোগিদের তালিকা দেখুন, রিলিজ করুন ও বিল প্রিন্ট করুন', 'finalreport.index', 1, 6, '2024-05-13 06:00:20', '2024-05-13 06:00:20'),
(48, 'বকেয়া আদায় করুন', 'finalreport.duepayment', 1, 6, '2024-05-13 07:06:30', '2024-05-13 07:06:30'),
(49, 'ডিউ পেমেন্ট ট্রাঞ্জিশন', 'duepaymenttrans.index', 1, 6, '2024-05-13 07:18:31', '2024-05-13 07:18:31'),
(50, 'যে সব প্যাসেন্টের কাছে টাকা পান তাদের তালিকা প্রিন্ট করেন', 'duepaymenttrans.stilldueout', 1, 6, '2024-05-13 07:21:05', '2024-05-13 07:21:05'),
(51, 'কোন ডেটের ডিউ কালেকশন', 'duepaymenttrans.date', 1, 6, '2024-05-13 07:22:00', '2024-05-13 07:22:00'),
(52, 'এম্পলয়ি কর্তৃক কোন ডেটের ডিউ কালেকশন', 'duepaymenttrans.select', 1, 6, '2024-05-13 07:22:43', '2024-05-13 07:22:43'),
(53, 'হাসপাতালে হওয়া সার্জারিসমূহের তালিকা ও সেবা মূল্য নির্ধারণ', 'surgerylist.index', 1, 7, '2024-05-13 07:27:19', '2024-05-13 07:27:19'),
(54, '**** সার্জারির সেবা মূল্য বাবদ রোগী থেকে অর্থ গ্রহণ ও ভাউচার প্রিন্ট', 'surgerytansition.index', 1, 7, '2024-05-13 07:35:06', '2024-05-13 07:35:06'),
(55, 'এজেন্টদের তালিকা', 'agentlist.index', 1, 8, '2024-05-14 04:59:53', '2024-05-14 04:59:53'),
(56, 'এজেন্টকে কমিশন দেন', 'agenttransaction.index', 1, 8, '2024-05-14 05:11:07', '2024-05-14 05:11:07'),
(57, 'কর্মচারী , কর্মকরতাদের তালিকা', 'employeelist.index', 1, 9, '2024-05-14 05:14:33', '2024-05-14 05:14:33'),
(58, 'কর্মচারী , কর্মকরতাদের বেতন', 'employeetransactioncon.index', 1, 9, '2024-05-14 05:16:34', '2024-05-14 05:16:34'),
(59, 'এম্পলয়িদের বেতনের লেজার সিট', 'employeeshow.index', 1, 9, '2024-05-14 05:17:43', '2024-05-14 05:17:43'),
(60, 'কোন দুই ডেটের মধ্যে দেয়া এম্পলয়িদের বেতনের সিট', 'employeetransactioncon.datepick', 1, 9, '2024-05-14 05:19:55', '2024-05-14 05:19:55'),
(61, 'কোন মাসে দেয়া এম্পলয়িদের বেতনের সিট', 'employeetransactioncon.month_year_pick', 1, 9, '2024-05-14 05:21:16', '2024-05-14 05:21:16'),
(62, 'খুচরা খরচ', 'externalcost.index', 1, 13, '2024-05-14 05:24:08', '2024-05-14 05:24:08'),
(63, 'রোল এন্ড প্যারমিশন', 'role.index', 1, 12, '2024-05-14 05:33:09', '2024-05-14 05:33:09'),
(64, 'নতুন ইউজার যুক্ত করে রোল এসাইন করোন', 'user.index', 1, 12, '2024-05-14 05:44:42', '2024-05-14 05:44:42'),
(65, 'রোল এবং প্যারমিশন এর রাউট যুক্ত করোন', 'adminmenu.index', 1, 12, '2024-05-14 05:46:05', '2024-05-14 05:46:05'),
(66, 'খরচের খাত তৈরি করেন।', 'khorocer_khad.index', 1, 14, '2024-05-14 05:52:16', '2024-05-14 05:52:16'),
(67, 'সম্পদ ক্রয়/ খরচ', 'khorochtransition.sompod', 1, 14, '2024-05-14 06:11:40', '2024-05-14 06:11:40'),
(68, 'সম্পদের তালিকা', 'khorochtransition.sompod_pdf', 1, 14, '2024-05-14 06:16:49', '2024-05-14 06:16:49'),
(69, 'সাপ্লাইয়ার তালিকা ও বিবরণ', 'supplier.index', 1, 14, '2024-05-14 06:18:44', '2024-05-14 06:18:44'),
(70, 'সাপ্লাইয়ারের কাছে থেকে দেনা আদায় করেন ও পাওনা মিটিয়ে দেন ।', 'supplier_due_advance_pay_or_get.index', 1, 14, '2024-05-14 10:05:24', '2024-05-14 10:05:24'),
(71, 'খরচের করুন / পূর্বের খরচ দেখেন', 'khorochtransition.index', 1, 14, '2024-05-14 10:08:11', '2024-05-14 10:08:11'),
(72, 'কমিশন রিপোর্ট দেখুন', 'agenttransaction.datepick', 1, 14, '2024-05-14 10:26:41', '2024-05-14 10:26:41'),
(73, 'দুই ডেটের মধ্যবর্তী সময়ে, কোন একটি নির্দিষ্ট খরচের ডিটেইলস দেখুন', 'khorochtransition.list', 1, 14, '2024-05-14 10:27:36', '2024-05-14 10:27:36'),
(74, '**** পার্টনারদের নামের তালিকা ও তাদের মোট বিনিয়োগ ও টাকা উত্তোলনের হিসাব।', 'businesspartner.index', 1, 11, '2024-05-14 10:35:10', '2024-05-14 10:35:10'),
(75, '**** টাকা জমা/ উত্তোলন সংক্রান্ত সকল ট্রাঞ্জিশন', 'takauttolon.index', 1, 11, '2024-05-14 10:36:54', '2024-05-14 10:36:54'),
(76, '**** আজকের দিনে টাকা উত্তোলন ও টাকা জমা/বিনিয়োগের হিসাব ।', 'joma_uttolon_statement_today', 1, 11, '2024-05-14 10:38:52', '2024-05-14 10:38:52'),
(77, '**** গতকালের টাকা উত্তোলন ও টাকা জমা/বিনিয়োগের হিসাব ।', 'joma_uttolon_statement_yesterday', 1, 11, '2024-05-14 10:39:26', '2024-05-14 10:39:26'),
(78, '**** চলতি মাসের টাকা উত্তোলন ও টাকা জমা/বিনিয়োগের হিসাব ।', 'joma_uttolon_statement_month', 1, 11, '2024-05-14 10:40:03', '2024-05-14 10:40:03'),
(79, 'গত মাসের টাকা উত্তোলন ও টাকা জমা/বিনিয়োগের হিসাব ।', 'joma_uttolon_statement_lastmonth', 1, 11, '2024-05-14 10:41:01', '2024-05-14 10:41:01'),
(80, 'চলতি বছরের টাকা উত্তোলন ও টাকা জমা/বিনিয়োগের হিসাব ।', 'joma_uttolon_statement_year', 1, 11, '2024-05-14 10:42:14', '2024-05-14 10:42:14'),
(81, 'সকল ট্রানজেকশন এর ভার্চুয়াল টেবিল দেখুন।', 'virtualtable.index', 1, 10, '2024-05-14 18:28:37', '2024-05-14 18:28:37'),
(82, 'তারিখ অনুযায়ী মেডিসিন এর ট্রানজেকশন দেখুন', 'showmedicne', 1, 10, '2024-05-14 18:30:00', '2024-05-14 18:30:00'),
(83, '**** মেডিসিন বিক্রয় - বিক্রয় ফেরত - ডিউ কালেকশন রিপোর্ট দেখেন', 'medicinetransition.datepick', 1, 1, '2024-05-14 18:32:38', '2024-05-14 18:32:38'),
(84, '**** মেডিসিন স্টক দেখুন', 'medicinetransition.stock', 1, 1, '2024-05-14 18:34:30', '2024-05-14 18:34:30'),
(85, 'কোন প্যাসেন্টের ক্যাশ ট্রাঞ্জিশন দেখুন', 'finalreport.patient_cash_get', 1, 1, '2024-05-14 18:42:10', '2024-05-14 18:42:10'),
(86, '****আজকের দিনের আয় ব্যায়ের হিসাব', 'incomestatementtoday.todaystatment', 1, 10, '2024-05-14 18:47:02', '2024-05-14 18:47:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `childmenus`
--
ALTER TABLE `childmenus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `childmenus_route_unique` (`route`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `childmenus`
--
ALTER TABLE `childmenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

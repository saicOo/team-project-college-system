-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 08:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alert_msgss`
--

CREATE TABLE `alert_msgss` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `msg_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `std_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dept_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_capacity_num` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `minimum_degree` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_admins_table', 1),
(2, '2022_02_19_093357_create_alert_msgss_table', 1),
(3, '2022_02_19_093357_create_departments_table', 1),
(4, '2022_02_19_093357_create_private_qas_table', 1),
(5, '2022_02_19_093357_create_public_qas_table', 1),
(6, '2022_02_19_093357_create_student_desires_table', 1),
(7, '2022_02_19_093357_create_student_detailss_table', 1),
(8, '2022_02_19_093407_create_foreign_keys', 1),
(9, '2014_10_12_000000_create_users_table', 2),
(10, '2014_10_12_100000_create_password_resets_table', 2),
(11, '2019_08_19_000000_create_failed_jobs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `private_qas`
--

CREATE TABLE `private_qas` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `private_q` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `private_ans` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `std_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `public_qas`
--

CREATE TABLE `public_qas` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `public_qa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `public_ans` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_desires`
--

CREATE TABLE `student_desires` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `desire_1_id` int(10) UNSIGNED NOT NULL,
  `desire_2_id` int(10) UNSIGNED DEFAULT NULL,
  `desire_3_id` int(10) UNSIGNED NOT NULL,
  `std_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_detailss`
--

CREATE TABLE `student_detailss` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` decimal(5,2) NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `partial_payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `full_payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `dept_id` int(10) UNSIGNED DEFAULT NULL,
  `std_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `alert_msgss`
--
ALTER TABLE `alert_msgss`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alert_msgss_std_id_foreign` (`std_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `private_qas`
--
ALTER TABLE `private_qas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `private_qas_std_id_foreign` (`std_id`);

--
-- Indexes for table `public_qas`
--
ALTER TABLE `public_qas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_desires`
--
ALTER TABLE `student_desires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_desires_desire_1_id_foreign` (`desire_1_id`),
  ADD KEY `student_desires_desire_2_id_foreign` (`desire_2_id`),
  ADD KEY `student_desires_desire_3_id_foreign` (`desire_3_id`),
  ADD KEY `student_desires_std_id_foreign` (`std_id`);

--
-- Indexes for table `student_detailss`
--
ALTER TABLE `student_detailss`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_detailss_dept_id_foreign` (`dept_id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alert_msgss`
--
ALTER TABLE `alert_msgss`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `private_qas`
--
ALTER TABLE `private_qas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `public_qas`
--
ALTER TABLE `public_qas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_desires`
--
ALTER TABLE `student_desires`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_detailss`
--
ALTER TABLE `student_detailss`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alert_msgss`
--
ALTER TABLE `alert_msgss`
  ADD CONSTRAINT `alert_msgss_std_id_foreign` FOREIGN KEY (`std_id`) REFERENCES `student_detailss` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `private_qas`
--
ALTER TABLE `private_qas`
  ADD CONSTRAINT `private_qas_std_id_foreign` FOREIGN KEY (`std_id`) REFERENCES `student_detailss` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_desires`
--
ALTER TABLE `student_desires`
  ADD CONSTRAINT `student_desires_desire_1_id_foreign` FOREIGN KEY (`desire_1_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_desires_desire_2_id_foreign` FOREIGN KEY (`desire_2_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_desires_desire_3_id_foreign` FOREIGN KEY (`desire_3_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_desires_std_id_foreign` FOREIGN KEY (`std_id`) REFERENCES `student_detailss` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_detailss`
--
ALTER TABLE `student_detailss`
  ADD CONSTRAINT `student_detailss_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_detailss_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

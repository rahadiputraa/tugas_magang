-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 13, 2024 at 06:15 AM
-- Server version: 5.7.33
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rahadi_magang_persuratan`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2024_09_08_155830_create_tbl_admins_table', 1),
(13, '2024_09_08_155831_create_tbl_users_table', 1),
(14, '2024_09_08_155832_create_tbl_jenis_surat_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admins`
--

CREATE TABLE `tbl_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admins`
--

INSERT INTO `tbl_admins` (`id`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@example.com', '$2y$12$HmU1miSyigRZVR.ydXYEs.AluTfOynfTzF03kr.tq6aYSeywvzxs6', '2024-09-13 04:18:42', '2024-09-13 04:18:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_surat`
--

CREATE TABLE `tbl_jenis_surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jenis_surat`
--

INSERT INTO `tbl_jenis_surat` (`id`, `judul`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Surat Keputusan', '2024-09-13 04:18:42', '2024-09-13 04:18:42', NULL),
(2, 'Surat Peraturan ', '2024-09-13 04:18:42', '2024-09-13 04:18:42', NULL),
(3, 'Surat SOP\r\n', NULL, NULL, NULL),
(4, 'Surat Memorandom', NULL, NULL, NULL),
(5, 'Surat Edaran', NULL, NULL, NULL),
(6, 'Surat Rekomendasi Compliance', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_label`
--

CREATE TABLE `tbl_label` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_label`
--

INSERT INTO `tbl_label` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Label 1', NULL, NULL),
(2, 'Label 2', NULL, NULL),
(3, 'Label 3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat`
--

CREATE TABLE `tbl_surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type_surat` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `labels` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_surat`
--

INSERT INTO `tbl_surat` (`id`, `judul`, `no_surat`, `id_type_surat`, `file`, `labels`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Contoh Surat', 'SK/001', 1, 'path_to_file.pdf', NULL, '2024-09-08 08:07:21', '2024-09-08 08:07:21', NULL),
(2, 'adsad', 'asdsads', 2, '1725866860--file.png', NULL, '2024-09-08 23:27:40', '2024-09-08 23:27:40', NULL),
(3, 'Contoh Surat', 'SK/001', 1, 'path_to_file.pdf', NULL, '2024-09-13 04:18:42', '2024-09-13 04:18:42', NULL),
(4, 'asdsad', 'sadsada', 1, '1726204432--file.pdf', 'labelsLabel2, labelsasdasd, labelsdsadasdad', '2024-09-13 05:13:52', '2024-09-13 05:13:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user@example.com', '$2y$12$GvEa6h5PqVjrUcBO7/I3FuGfXTZVjB5OjHuNWOgfnid3QJR6c0YJe', '2024-09-13 04:18:42', '2024-09-13 04:18:42', NULL),
(2, 'rahadi@gmail.com', '$2y$12$0qp8yAJU5.Bth6OK6MnRZ.3fXIIFDCWJyIkrW/hceDltXKtos185m', '2024-09-13 05:59:35', '2024-09-13 05:59:35', NULL);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_admins_email_unique` (`email`);

--
-- Indexes for table `tbl_jenis_surat`
--
ALTER TABLE `tbl_jenis_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_label`
--
ALTER TABLE `tbl_label`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_users_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_jenis_surat`
--
ALTER TABLE `tbl_jenis_surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_label`
--
ALTER TABLE `tbl_label`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

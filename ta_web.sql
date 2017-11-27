-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2017 at 01:58 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `job_title`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'paska', 'paskaadil@gmail.com', 'Staf', '$2y$10$tJkeBU42h6INx0UlSXy4zOR7s/rG9B6x0pnERq3brBy7LNdoVJXaG', 'aUqSZohCzeQ2bK1UoOeh0DSdxOWsjf7WPTV8DE79K6azgi06A3EuuDtInW2e', '2017-11-22 07:34:10', '2017-11-22 07:34:10');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_16_090637_create_admins_table', 1),
(5, '2017_11_22_164057_tabel_pemesanans', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesans`
--

CREATE TABLE `pesans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobil` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesans`
--

INSERT INTO `pesans` (`id`, `name`, `nik`, `alamat`, `no_telp`, `mobil`, `created_at`, `updated_at`) VALUES
(5, 'abc', '1213123123123', 'karanganyar', '087835576036', 'Honda Jazz Amiin', '2017-11-23 02:45:46', '2017-11-25 04:00:31'),
(6, 'paska', '123123123', 'karanganyar', '0878787667', 'avanza', '2017-11-25 09:17:28', '2017-11-25 09:17:28'),
(13, 'asdsad', '23132232312323', 'dfds', '23232323232323', 'xenia', '2017-11-25 10:12:45', '2017-11-25 10:12:45'),
(18, 'anugrha', '23742834893', 'karanganyar', '00872132132', 'mobilio', '2017-11-26 04:55:15', '2017-11-26 04:55:15'),
(19, 'Paska Anugrah Adil', '3313323334232', 'karanganyar', '0873834738928', 'Honda Jazz', '2017-11-26 10:56:05', '2017-11-26 10:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'devian', 'devian@yahoo.com', '$2y$10$5zboONq.gcROF4Zn1qHKauaeCdWesBe.HcBeCSt9G4QLgsCeGZrkO', 'iaTXLoaafkEak5cogQNnO5vLoK0j5arzyyvbEXwXqjtfXkuE5RmqFikUbJBr', '2017-11-19 20:04:50', '2017-11-19 20:04:50'),
(2, 'paska', 'paskaadil@gmail.com', '$2y$10$53kIJnr5A2naa2X.d2Tww.Wr9OmrBLL.xDAUQRimIPfYa8KGBA3i6', 'AVubOL06QJsPkjVlp10zzD6lhwX9nxb5eQTnZ5eHaBdNTrRZAfZXBzEG0mez', '2017-11-21 02:02:33', '2017-11-21 02:02:33'),
(3, 'devian', 'devian12@yahoo.com', '$2y$10$vTJjesWJc3XisYQejRo01uADKhlHnI3j2T8SOah/fFoiyvCsBSM7m', 'F4Clrtpx6vRxOFEn1yPdbQUolxYLvrNNwBBxTbq6kgQiRTnMkOygMVgmJtvM', '2017-11-21 21:27:28', '2017-11-21 21:27:28'),
(4, 'indra', 'indra@gmail.com', '$2y$10$MzKAE0K4JFNZhpTL3JcUmuIJO6F5FBkatyjx0qChoH7aTK5BGzdE6', 'CvILO5P0cR7vkuRYnPOBiRskQ5CqvN2aqZNJEhiK5tNrSjBiiTZwQJpIBLtb', '2017-11-26 11:04:04', '2017-11-26 11:04:04');

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
-- Indexes for table `pesans`
--
ALTER TABLE `pesans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pemesanans_nik_unique` (`nik`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pesans`
--
ALTER TABLE `pesans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
